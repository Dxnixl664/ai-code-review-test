<?php

namespace Tests\Unit;

use App\Services\PricingService;
use Tests\TestCase;

class PricingServiceTest extends TestCase
{
    public function test_calculates_total_with_tax(): void
    {
        $service = new PricingService();

        $total = $service->calc(10.0, 2, 0.1);

        $this->assertEquals(22.0, $total);
    }
}
