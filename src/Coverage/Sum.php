<?php

declare(strict_types=1);

namespace Haspadar\Parason\Coverage;

use Override;
use Primus\Number\Number;
use Primus\Number\SumOf;

/**
 * Sum of two metrics as a single metric.
 *
 * Composes recursively: `new Sum(new Sum($left, $middle), $right)` sums three.
 */
final readonly class Sum implements Metric
{
    /**
     * Wraps two operand metrics that will be added pairwise on demand.
     *
     * @param Metric $left First operand of the sum.
     * @param Metric $right Second operand of the sum.
     */
    public function __construct(private Metric $left, private Metric $right) {}

    #[Override]
    public function total(): Number
    {
        return new SumOf($this->left->total(), $this->right->total());
    }

    #[Override]
    public function covered(): Number
    {
        return new SumOf($this->left->covered(), $this->right->covered());
    }
}
