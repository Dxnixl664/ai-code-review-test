<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminOrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_orders_index_can_be_rendered(): void
    {
        $user = User::factory()->create();
        Order::factory()->count(10)->create();

        $response = $this->actingAs($user)->get('/admin/orders');

        $response->assertOk();
    }
}
