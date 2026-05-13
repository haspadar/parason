<?php

declare(strict_types=1);

namespace Haspadar\Parason\Tests\Unit\Coverage;

use Haspadar\Parason\Coverage\EmptyMetric;
use Haspadar\Parason\Coverage\Percent;
use Haspadar\Parason\Tests\Fake\Coverage\FakeMetric;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class PercentTest extends TestCase
{
    #[Test]
    public function reportsHundredForEmptyMetric(): void
    {
        self::assertSame(
            100.0,
            (new Percent(new EmptyMetric()))->value()->asFloat(),
            'Empty metric has nothing left uncovered, so the percentage is full',
        );
    }

    #[Test]
    public function reportsHundredForFullyCoveredMetric(): void
    {
        self::assertSame(
            100.0,
            (new Percent(new FakeMetric(40, 40)))->value()->asFloat(),
            'Equal total and covered means every item is covered',
        );
    }

    #[Test]
    public function reportsHalfForHalfCoveredMetric(): void
    {
        self::assertSame(
            50.0,
            (new Percent(new FakeMetric(40, 20)))->value()->asFloat(),
            'Half-covered metric yields fifty percent',
        );
    }

    #[Test]
    public function reportsZeroForUncoveredMetric(): void
    {
        self::assertSame(
            0.0,
            (new Percent(new FakeMetric(40, 0)))->value()->asFloat(),
            'No covered items in a non-empty metric yield zero percent',
        );
    }

    #[Test]
    public function preservesPrecisionForNonRoundRatios(): void
    {
        self::assertEqualsWithDelta(
            12.5,
            (new Percent(new FakeMetric(8, 1)))->value()->asFloat(),
            0.0001,
            'Fractional ratio one-eighth scales to twelve and a half percent',
        );
    }
}
