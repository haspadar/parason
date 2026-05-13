<?php

declare(strict_types=1);

namespace Haspadar\Parason\Tests\Fake\Coverage;

use Haspadar\Parason\Coverage\Metric;
use Override;

final readonly class FakeMetric implements Metric
{
    public function __construct(private int $total, private int $covered)
    {
    }

    #[Override]
    public function total(): int
    {
        return $this->total;
    }

    #[Override]
    public function covered(): int
    {
        return $this->covered;
    }
}
