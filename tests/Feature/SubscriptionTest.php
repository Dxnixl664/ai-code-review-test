<?php

namespace Tests\Feature;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    public function test_only_active_subscriptions_are_shown(): void
    {
        $user = User::factory()->create();
        Subscription::factory()->create(['status' => 'active']);
        Subscription::factory()->create(['status' => 'cancelled']);

        $response = $this->actingAs($user)->get('/subscriptions');

        $response->assertOk();
    }
}
