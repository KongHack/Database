<?php

declare(strict_types=1);

namespace GCWorld\Database\Tests\Query;

use GCWorld\Database\Query\Exception\QueryBuilderException;
use GCWorld\Database\Query\PredicateGroup;
use PHPUnit\Framework\TestCase;

final class PredicateGroupTest extends TestCase
{
    public function testWhereReplacesExistingPredicates(): void
    {
        $group = (new PredicateGroup())
            ->where('discarded = 1')
            ->orWhere('also_discarded = 1')
            ->where('kept = 1')
            ->andWhere('also_kept = 1');

        self::assertSame('kept = 1 AND also_kept = 1', $group->render());
    }

    public function testRejectsEmptyPredicate(): void
    {
        $this->expectException(QueryBuilderException::class);
        $this->expectExceptionMessage('Predicate cannot be empty');

        (new PredicateGroup())->andWhere('');
    }

    public function testRejectsEmptyPredicateGroup(): void
    {
        $this->expectException(QueryBuilderException::class);
        $this->expectExceptionMessage('Predicate group cannot be empty');

        (new PredicateGroup())->andWhereGroup(static function (): void {
        });
    }
}
