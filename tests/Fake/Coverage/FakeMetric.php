<?php

declare(strict_types=1);

namespace Haspadar\Parason\Tests\Fake\Coverage;

use Haspadar\Parason\Coverage\Metric;
use Override;
use Primus\Number\Number;
use Primus\Number\NumberOf;

final readonly class FakeMetric implements Metric
{
    public function __construct(private int $total, private int $covered) {}

    #[Override]
    public function total(): Number
    {
        return new NumberOf($this->total);
    }

    #[Override]
    public function covered(): Number
    {
        return new NumberOf($this->covered);
    }
}
