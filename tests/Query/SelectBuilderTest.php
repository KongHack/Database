<?php

declare(strict_types=1);

namespace GCWorld\Database\Tests\Query;

use GCWorld\Database\Query\Exception\DuplicateJoinConflictException;
use GCWorld\Database\Query\Exception\DuplicateParameterConflictException;
use GCWorld\Database\Query\Exception\QueryBuilderException;
use GCWorld\Database\Query\PredicateGroup;
use GCWorld\Database\Query\SelectBuilder;
use PHPUnit\Framework\TestCase;

final class SelectBuilderTest extends TestCase
{
    public function testBuildsCompleteSelectStatement(): void
    {
        $builder = (new SelectBuilder())
            ->distinct()
            ->select('u.id')
            ->addSelect('u.email')
            ->from('users', 'u')
            ->leftJoin('profiles', 'p', 'p.user_id = u.id')
            ->where('u.status = :status')
            ->andWhere('p.visible = :visible')
            ->groupBy('u.id')
            ->addGroupBy('u.email')
            ->having('COUNT(p.id) >= :minimum_profiles')
            ->orderBy('u.id DESC')
            ->addOrderBy('u.email ASC')
            ->limit(25)
            ->offset(50)
            ->setParams([
                ':status' => 'active',
                'visible' => true,
                'minimum_profiles' => 1,
            ]);

        self::assertSame(
            'SELECT DISTINCT u.id, u.email FROM users u LEFT JOIN (profiles p) ON (p.user_id = u.id) '
                . 'WHERE u.status = :status AND p.visible = :visible GROUP BY u.id, u.email '
                . 'HAVING COUNT(p.id) >= :minimum_profiles ORDER BY u.id DESC, u.email ASC LIMIT 25 OFFSET 50',
            $builder->getSql(),
        );
        self::assertSame(
            ['status' => 'active', 'visible' => true, 'minimum_profiles' => 1],
            $builder->getParams(),
        );
    }

    public function testDefaultsToAllColumns(): void
    {
        self::assertSame('SELECT * FROM jobs', (new SelectBuilder())->from('jobs')->getSql());
    }

    public function testSelectGroupAndOrderMethodsReplacePreviousValues(): void
    {
        $builder = (new SelectBuilder())
            ->select('discarded')
            ->select('kept')
            ->from('records')
            ->groupBy('discarded')
            ->groupBy('kept')
            ->orderBy('discarded')
            ->orderBy('kept');

        self::assertSame(
            'SELECT kept FROM records GROUP BY kept ORDER BY kept',
            $builder->getSql(),
        );
    }

    public function testWhereAndHavingReplacePreviousPredicates(): void
    {
        $builder = (new SelectBuilder())
            ->from('records')
            ->where('discarded = 1')
            ->where('kept = 1')
            ->having('discarded = 1')
            ->having('kept = 1');

        self::assertSame(
            'SELECT * FROM records WHERE kept = 1 HAVING kept = 1',
            $builder->getSql(),
        );
    }

    public function testBuildsGroupedWhereAndHavingPredicates(): void
    {
        $builder = (new SelectBuilder())
            ->select('department_id', 'COUNT(*) AS total')
            ->from('members')
            ->where('active = :active')
            ->andWhereGroup(static function (PredicateGroup $group): void {
                $group
                    ->where('role = :student')
                    ->orWhere('role = :administrator');
            })
            ->groupBy('department_id')
            ->havingGroup(static function (PredicateGroup $group): void {
                $group
                    ->where('COUNT(*) > :minimum')
                    ->andWhereGroup(static function (PredicateGroup $nested): void {
                        $nested
                            ->where('MAX(active) = 1')
                            ->orWhere('MAX(invited) = 1');
                    });
            });

        self::assertSame(
            'SELECT department_id, COUNT(*) AS total FROM members WHERE active = :active '
                . 'AND (role = :student OR role = :administrator) GROUP BY department_id '
                . 'HAVING (COUNT(*) > :minimum AND (MAX(active) = 1 OR MAX(invited) = 1))',
            $builder->getSql(),
        );
    }

    public function testIdenticalJoinDeclarationIsIdempotent(): void
    {
        $builder = (new SelectBuilder())
            ->from('users', 'u')
            ->innerJoin('teams', 't', 't.id = u.team_id')
            ->innerJoin('teams', 't', 't.id = u.team_id');

        self::assertSame(
            'SELECT * FROM users u INNER JOIN (teams t) ON (t.id = u.team_id)',
            $builder->getSql(),
        );
        self::assertCount(1, $builder->getJoins());
    }

    public function testSameTableCanBeJoinedUsingDifferentAliases(): void
    {
        $builder = (new SelectBuilder())
            ->from('shared_objects', 'shared')
            ->leftJoin('members', 'student', 'student.id = shared.student_id')
            ->leftJoin('members', 'administrator', 'administrator.id = shared.administrator_id');

        self::assertSame(
            'SELECT * FROM shared_objects shared '
                . 'LEFT JOIN (members student) ON (student.id = shared.student_id) '
                . 'LEFT JOIN (members administrator) ON (administrator.id = shared.administrator_id)',
            $builder->getSql(),
        );
        self::assertCount(2, $builder->getJoins());
    }

    public function testJoinCanBeInspectedByAliasOrTable(): void
    {
        $builder = (new SelectBuilder())
            ->from('users', 'u')
            ->leftJoin('profiles', 'p', 'p.user_id = u.id')
            ->leftJoin('settings', null, 'settings.user_id = u.id');

        self::assertTrue($builder->hasJoin('p'));
        self::assertTrue($builder->hasJoin('settings'));
        self::assertFalse($builder->hasJoin('profiles'));
        self::assertSame('profiles', $builder->getJoin('p')?->table);
        self::assertNull($builder->getJoin('missing'));
    }

    public function testConflictingJoinAliasIsRejected(): void
    {
        $builder = (new SelectBuilder())
            ->from('users', 'u')
            ->leftJoin('teams', 'related', 'related.id = u.team_id');

        $this->expectException(DuplicateJoinConflictException::class);
        $this->expectExceptionMessage('related');

        $builder->leftJoin('groups', 'related', 'related.id = u.group_id');
    }

    public function testConflictingUnaliasedTableJoinIsRejected(): void
    {
        $builder = (new SelectBuilder())
            ->from('users', 'u')
            ->leftJoin('members', null, 'members.id = u.student_id');

        $this->expectException(DuplicateJoinConflictException::class);
        $this->expectExceptionMessage('members');

        $builder->leftJoin('members', null, 'members.id = u.administrator_id');
    }

    public function testSqlFragmentsArePreservedRatherThanParsed(): void
    {
        $builder = (new SelectBuilder())
            ->from('messages', 'm')
            ->leftJoin('labels', 'l', "l.name = 'multiple   spaces'");

        self::assertStringContainsString("l.name = 'multiple   spaces'", $builder->getSql());
    }

    public function testParameterDeclarationIsIdempotent(): void
    {
        $builder = (new SelectBuilder())
            ->setParam(':status', 'active')
            ->setParam('status', 'active');

        self::assertTrue($builder->hasParam('status'));
        self::assertTrue($builder->hasParam(':status'));
        self::assertSame(['status' => 'active'], $builder->getParams());
    }

    public function testConflictingParameterValueIsRejected(): void
    {
        $builder = (new SelectBuilder())->setParam(':status', 'active');

        $this->expectException(DuplicateParameterConflictException::class);
        $builder->setParam('status', 'disabled');
    }

    public function testInvalidParameterNameIsRejected(): void
    {
        $this->expectException(QueryBuilderException::class);
        $this->expectExceptionMessage('Invalid named parameter');

        (new SelectBuilder())->setParam('not-valid', 1);
    }

    public function testOffsetRequiresLimit(): void
    {
        $builder = (new SelectBuilder())->from('users')->offset(10);

        $this->expectException(QueryBuilderException::class);
        $this->expectExceptionMessage('OFFSET requires LIMIT');

        $builder->getSql();
    }

    public function testPaginationCanBeCleared(): void
    {
        $builder = (new SelectBuilder())
            ->from('users')
            ->limit(10)
            ->offset(20)
            ->limit(null)
            ->offset(null);

        self::assertSame('SELECT * FROM users', $builder->getSql());
    }

    public function testMissingFromTableIsRejected(): void
    {
        $this->expectException(QueryBuilderException::class);
        $this->expectExceptionMessage('Cannot build SELECT without a FROM table');

        (new SelectBuilder())->getSql();
    }

    public function testEmptySelectExpressionIsRejected(): void
    {
        $this->expectException(QueryBuilderException::class);
        $this->expectExceptionMessage('SELECT expression cannot be empty');

        (new SelectBuilder())->select('');
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
