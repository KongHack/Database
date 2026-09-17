<?php

declare(strict_types=1);

namespace GCWorld\Database\Tests\Query;

use GCWorld\Database\Query\Exception\QueryBuilderException;
use GCWorld\Database\Query\Join;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class JoinTest extends TestCase
{
    public function testNormalizesStructuralValues(): void
    {
        $join = new Join(' left ', ' members ', ' student ', ' student.id = shared.student_id ');

        self::assertSame('LEFT', $join->type);
        self::assertSame('members', $join->table);
        self::assertSame('student', $join->alias);
        self::assertSame('student.id = shared.student_id', $join->on);
        self::assertSame('student', $join->identity());
        self::assertSame(
            'LEFT JOIN (members student) ON (student.id = shared.student_id)',
            $join->render(),
        );
    }

    public function testRendersUnaliasedJoinWithParentheses(): void
    {
        $join = new Join('INNER', 'settings', null, 'settings.user_id = users.id');

        self::assertSame(
            'INNER JOIN (settings) ON (settings.user_id = users.id)',
            $join->render(),
        );
    }

    /**
     * @return iterable<string, array{string, string, ?string, string, string}>
     */
    public static function invalidJoinProvider(): iterable
    {
        yield 'unsupported type' => ['RIGHT', 'members', 'm', 'm.id = 1', 'Unsupported JOIN type'];
        yield 'empty table' => ['LEFT', '', 'm', 'm.id = 1', 'JOIN table cannot be empty'];
        yield 'empty alias' => ['LEFT', 'members', '', 'm.id = 1', 'JOIN alias cannot be empty'];
        yield 'empty condition' => ['LEFT', 'members', 'm', '', 'JOIN condition cannot be empty'];
    }

    #[DataProvider('invalidJoinProvider')]
    public function testRejectsInvalidDefinition(
        string $type,
        string $table,
        ?string $alias,
        string $on,
        string $message,
    ): void {
        $this->expectException(QueryBuilderException::class);
        $this->expectExceptionMessage($message);

        new Join($type, $table, $alias, $on);
    }
}
