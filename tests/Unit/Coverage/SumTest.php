<?php

declare(strict_types=1);

namespace Haspadar\Parason\Tests\Unit\Coverage;

use Haspadar\Parason\Coverage\EmptyMetric;
use Haspadar\Parason\Coverage\Sum;
use Haspadar\Parason\Tests\Fake\Coverage\FakeMetric;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class SumTest extends TestCase
{
    #[Test]
    public function addsTotals(): void
    {
        self::assertSame(
            48,
            (new Sum(
                new FakeMetric(30, 21),
                new FakeMetric(18, 9),
            ))->total(),
            'Sum reports total as the sum of the two operand totals',
        );
    }

    #[Test]
    public function addsCovered(): void
    {
        self::assertSame(
            30,
            (new Sum(
                new FakeMetric(30, 21),
                new FakeMetric(18, 9),
            ))->covered(),
            'Sum reports covered as the sum of the two operand covered counts',
        );
    }

    #[Test]
    public function leavesLeftUnchangedWhenRightIsEmpty(): void
    {
        self::assertSame(
            42,
            (new Sum(
                new FakeMetric(50, 42),
                new EmptyMetric(),
            ))->covered(),
            'EmptyMetric is the neutral element for Sum',
        );
    }
}
