<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_post_a_comment(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/comments', [
            'body' => 'Great feature!',
        ]);

        $response->assertRedirect(route('comments.index'));
        $this->assertDatabaseHas('comments', [
            'body' => 'Great feature!',
            'user_id' => $user->id,
        ]);
    }

    public function test_comments_index_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/comments');

        $response->assertOk();
    }
}
