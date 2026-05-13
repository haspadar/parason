<?php

declare(strict_types=1);

namespace Haspadar\Parason\Tests\Unit\Coverage;

use Haspadar\Parason\Coverage\EmptyMetric;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class EmptyMetricTest extends TestCase
{
    #[Test]
    public function reportsZeroTotal(): void
    {
        self::assertSame(
            0,
            (new EmptyMetric())->total(),
            'EmptyMetric represents absence of countable items',
        );
    }

    #[Test]
    public function reportsZeroCovered(): void
    {
        self::assertSame(
            0,
            (new EmptyMetric())->covered(),
            'EmptyMetric covers nothing because there is nothing to cover',
        );
    }
}
