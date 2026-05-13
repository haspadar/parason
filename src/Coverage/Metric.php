<?php

declare(strict_types=1);

namespace Haspadar\Parason\Coverage;

use Primus\Number\Number;

/**
 * A pair of "total" and "covered" counts for one coverage dimension
 * (lines, branches, or methods).
 */
interface Metric
{
    /**
     * Total number of countable items in this dimension.
     */
    public function total(): Number;

    /**
     * Number of items actually covered by tests.
     */
    public function covered(): Number;
}
