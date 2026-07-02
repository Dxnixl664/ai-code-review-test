<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_submit_a_support_ticket(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/tickets', [
            'subject' => 'Cannot log in',
            'description' => 'I keep getting an error.',
        ]);

        $response->assertRedirect(route('tickets.create'));
        $this->assertDatabaseHas('tickets', ['subject' => 'Cannot log in']);
    }
}
