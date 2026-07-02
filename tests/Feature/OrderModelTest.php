<?php

namespace Tests\Feature;

use App\Models\Order;
use App\OrderStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_status_casts_to_enum(): void
    {
        $order = Order::factory()->create(['status' => OrderStatus::Shipped]);

        $this->assertInstanceOf(OrderStatus::class, $order->fresh()->status);
        $this->assertEquals(OrderStatus::Shipped, $order->fresh()->status);
    }
}
