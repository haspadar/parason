<?php

declare(strict_types=1);

namespace Haspadar\Parason\Coverage;

use Override;
use Primus\Number\Number;
use Primus\Number\NumberOf;

/**
 * A metric with no data: zero total, zero covered.
 *
 * Neutral element when summing metrics across files.
 */
final readonly class EmptyMetric implements Metric
{
    #[Override]
    public function total(): Number
    {
        return new NumberOf(0);
    }

    #[Override]
    public function covered(): Number
    {
        return new NumberOf(0);
    }
}
