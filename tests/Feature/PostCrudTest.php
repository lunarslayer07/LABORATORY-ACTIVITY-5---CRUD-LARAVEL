<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_list_displays_posts(): void
    {
        $post = Post::create([
            'title' => 'A first post',
            'body' => 'A first post body.',
        ]);

        $this->get(route('posts.index'))
            ->assertOk()
            ->assertSeeText($post->title)
            ->assertSeeText($post->body);
    }

    public function test_post_can_be_created(): void
    {
        $this->post(route('posts.store'), [
            'title' => 'A new post',
            'body' => 'The post body.',
        ])
            ->assertRedirect(route('posts.index'))
            ->assertSessionHas('success', 'Post created successfully.');

        $this->assertDatabaseHas('posts', [
            'title' => 'A new post',
            'body' => 'The post body.',
        ]);
    }

    public function test_post_creation_validates_required_fields(): void
    {
        $this->from(route('posts.create'))
            ->post(route('posts.store'), [])
            ->assertRedirect(route('posts.create'))
            ->assertSessionHasErrors(['title', 'body']);
    }

    public function test_post_can_be_viewed_and_updated(): void
    {
        $post = Post::create([
            'title' => 'Original title',
            'body' => 'Original body.',
        ]);

        $this->get(route('posts.show', $post))
            ->assertOk()
            ->assertSeeText('Original title')
            ->assertSeeText('Original body.');

        $this->put(route('posts.update', $post), [
            'title' => 'Updated title',
            'body' => 'Updated body.',
        ])
            ->assertRedirect(route('posts.index'))
            ->assertSessionHas('success', 'Post updated successfully.');

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated title',
            'body' => 'Updated body.',
        ]);
    }

    public function test_post_can_be_deleted(): void
    {
        $post = Post::create([
            'title' => 'A post to delete',
            'body' => 'This post will be removed.',
        ]);

        $this->delete(route('posts.destroy', $post))
            ->assertRedirect(route('posts.index'))
            ->assertSessionHas('success', 'Post deleted successfully.');

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
