<?php

declare(strict_types=1);

namespace GCWorld\Database\Tests\Query;

use GCWorld\Database\Query\Exception\DuplicateJoinConflictException;
use GCWorld\Database\Query\Exception\DuplicateParameterConflictException;
use GCWorld\Database\Query\Exception\QueryBuilderException;
use GCWorld\Database\Query\SelectBuilder;
use PHPUnit\Framework\TestCase;

final class SelectBuilderTest extends TestCase
{
    public function testBuildsCompleteSelectStatement(): void
    {
        $builder = (new SelectBuilder())
            ->select('u.id', 'u.email')
            ->from('users', 'u')
            ->leftJoin('profiles', 'p', 'p.user_id = u.id', 'user_profile')
            ->where('u.status = :status')
            ->andWhere('p.visible = :visible')
            ->groupBy('u.id', 'u.email')
            ->orderBy('u.id DESC')
            ->limit(25)
            ->offset(50)
            ->setParams([
                ':status' => 'active',
                'visible' => true,
            ]);

        self::assertSame(
            'SELECT u.id, u.email FROM users u LEFT JOIN profiles p ON p.user_id = u.id '
                . 'WHERE u.status = :status AND p.visible = :visible GROUP BY u.id, u.email '
                . 'ORDER BY u.id DESC LIMIT 25 OFFSET 50',
            $builder->getSql(),
        );
        self::assertSame(['status' => 'active', 'visible' => true], $builder->getParams());
        self::assertTrue($builder->hasJoin('user_profile'));
    }

    public function testDefaultsToAllColumnsAndCombinesWhereClauses(): void
    {
        $builder = (new SelectBuilder())
            ->from('jobs')
            ->where('status = :status')
            ->orWhere('retries < :retries');

        self::assertSame(
            'SELECT * FROM jobs WHERE status = :status OR retries < :retries',
            $builder->getSql(),
        );
    }

    public function testIdenticalJoinWithTheSameKeyIsEmittedOnce(): void
    {
        $builder = (new SelectBuilder())
            ->from('users', 'u')
            ->innerJoin('teams', 't', 't.id = u.team_id', 'team')
            ->innerJoin('teams', 't', '  t.id   =   u.team_id  ', 'team');

        self::assertSame(
            'SELECT * FROM users u INNER JOIN teams t ON t.id = u.team_id',
            $builder->getSql(),
        );
    }

    public function testConflictingJoinKeyIsRejected(): void
    {
        $builder = (new SelectBuilder())
            ->from('users', 'u')
            ->leftJoin('teams', 't', 't.id = u.team_id', 'related');

        $this->expectException(DuplicateJoinConflictException::class);
        $builder->leftJoin('groups', 'g', 'g.id = u.group_id', 'related');
    }

    public function testConflictingParameterValueIsRejected(): void
    {
        $builder = (new SelectBuilder())->setParam(':status', 'active');

        $this->expectException(DuplicateParameterConflictException::class);
        $builder->setParam('status', 'disabled');
    }

    public function testMissingFromTableIsRejected(): void
    {
        $this->expectException(QueryBuilderException::class);
        $this->expectExceptionMessage('Cannot build SELECT without a FROM table');

        (new SelectBuilder())->getSql();
    }

    public function testNegativeLimitIsRejected(): void
    {
        $this->expectException(QueryBuilderException::class);
        $this->expectExceptionMessage('LIMIT cannot be negative');

        (new SelectBuilder())->limit(-1);
    }

    public function testPrepareRequiresDatabaseInstance(): void
    {
        $this->expectException(QueryBuilderException::class);
        $this->expectExceptionMessage('No Database instance is available');

        (new SelectBuilder())->from('users')->prepare();
    }
}
