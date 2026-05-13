<?php

declare(strict_types=1);

namespace Haspadar\Parason\Coverage;

/**
 * Coverage percentage (0..100) computed from a metric.
 *
 * An empty metric (total == 0) is treated as fully covered (100%):
 * there is nothing to cover, so everything that exists is covered.
 */
final readonly class Percent
{
    private const float FULL = 100.0;

    /**
     * Wraps the metric whose covered/total ratio defines the percentage.
     *
     * @param Metric $metric Source metric for the ratio.
     */
    public function __construct(private Metric $metric) {}

    /**
     * Coverage ratio scaled to 0..100.
     */
    public function value(): float
    {
        return $this->metric->total() === 0
            ? self::FULL
            : (float) $this->metric->covered() / (float) $this->metric->total() * self::FULL;
    }
}
