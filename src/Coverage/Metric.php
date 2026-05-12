<?php

declare(strict_types=1);

namespace Haspadar\Parason\Coverage;

/**
 * A pair of "total" and "covered" counts for one coverage dimension
 * (lines, branches, or methods).
 */
interface Metric
{
    /**
     * Total number of countable items in this dimension.
     */
    public function total(): int;

    /**
     * Number of items actually covered by tests.
     */
    public function covered(): int;
}
