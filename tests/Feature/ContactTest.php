<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_submit_the_contact_form(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/contact', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'message' => 'Hello there!',
        ]);

        $response->assertRedirect(route('contact.create'));
        $this->assertDatabaseHas('contact_messages', ['email' => 'jane@example.com']);
    }

    public function test_contact_form_requires_a_valid_email(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/contact', [
            'name' => 'Jane Doe',
            'email' => 'not-an-email',
            'message' => 'Hello there!',
        ]);

        $response->assertSessionHasErrors('email');
    }
}
