<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_a_tag(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/tags', ['name' => 'urgent']);

        $response->assertRedirect(route('tags.index'));
        $this->assertDatabaseHas('tags', ['name' => 'urgent']);
    }

    public function test_updating_a_tag_without_changing_its_name_does_not_fail_validation(): void
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create(['name' => 'urgent']);

        $response = $this->actingAs($user)->put("/tags/{$tag->id}", ['name' => 'urgent']);

        $response->assertRedirect(route('tags.index'));
        $response->assertSessionDoesntHaveErrors();
    }

    public function test_user_can_delete_a_tag(): void
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create();

        $response = $this->actingAs($user)->delete("/tags/{$tag->id}");

        $response->assertRedirect(route('tags.index'));
        $this->assertDatabaseMissing('tags', ['id' => $tag->id]);
    }
}
