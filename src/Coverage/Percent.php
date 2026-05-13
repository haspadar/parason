<?php

declare(strict_types=1);

namespace Haspadar\Parason\Coverage;

use Primus\Number\DivOf;
use Primus\Number\MultOf;
use Primus\Number\Number;
use Primus\Number\NumberOf;

/**
 * Coverage percentage (0..100) computed from a metric.
 *
 * An empty metric (total == 0) is treated as fully covered (100%):
 * there is nothing to cover, so everything that exists is covered.
 */
final readonly class Percent
{
    private const int FULL = 100;

    /**
     * Wraps the metric whose covered/total ratio defines the percentage.
     *
     * @param Metric $metric Source metric for the ratio.
     */
    public function __construct(private Metric $metric) {}

    /**
     * Coverage ratio scaled to 0..100.
     */
    public function value(): Number
    {
        return $this->metric->total()->asInt() === 0
            ? new NumberOf(self::FULL)
            : new MultOf(
                new DivOf($this->metric->covered(), $this->metric->total()),
                new NumberOf(self::FULL),
            );
    }
}
