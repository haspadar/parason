<?php

declare(strict_types=1);

namespace Haspadar\Parason\Coverage;

use Override;

/**
 * A metric with no data: zero total, zero covered.
 *
 * Neutral element when summing metrics across files.
 */
final readonly class EmptyMetric implements Metric
{
    #[Override]
    public function total(): int
    {
        return 0;
    }

    #[Override]
    public function covered(): int
    {
        return 0;
    }
}
