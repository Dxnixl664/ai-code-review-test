<?php

namespace Tests\Unit;

use App\Services\ShippingService;
use Tests\TestCase;

class ShippingServiceTest extends TestCase
{
    public function test_free_shipping_over_threshold(): void
    {
        $service = new ShippingService();

        $this->assertEquals(0, $service->fee(60, 1));
    }

    public function test_base_fee_for_light_order_under_threshold(): void
    {
        $service = new ShippingService();

        $this->assertEquals(4.99, $service->fee(20, 1));
    }
}
