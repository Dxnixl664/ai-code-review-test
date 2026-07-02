<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderCancellationTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_cancel_a_pending_order(): void
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['status' => 'pending']);

        $response = $this->actingAs($user)->post("/orders/{$order->id}/cancel");

        $response->assertRedirect();
        $this->assertEquals('cancelled', $order->fresh()->status);
    }

    public function test_admin_can_cancel_a_pending_order(): void
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['status' => 'pending']);

        $response = $this->actingAs($user)->post("/admin/orders/{$order->id}/cancel");

        $response->assertRedirect();
        $this->assertEquals('cancelled', $order->fresh()->status);
    }
}
