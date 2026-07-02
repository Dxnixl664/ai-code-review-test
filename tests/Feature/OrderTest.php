<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_history_can_be_rendered(): void
    {
        $user = User::factory()->create();
        Order::factory()->count(15)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get('/orders');

        $response->assertOk();
    }

    public function test_order_history_paginates(): void
    {
        $user = User::factory()->create();
        Order::factory()->count(15)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get('/orders?page=2');

        $response->assertOk();
    }
}
