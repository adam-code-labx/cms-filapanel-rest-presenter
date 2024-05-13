<?php

namespace Tests\StarterKits\Filament\Admin\Resources\Posts;

use App\Api\StarterKits\Filament\Admin\Resources\Posts\Presenters\Posts\Data\PostData as DataResponse;
use App\Models\Post as Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class PostResourceTest extends TestCase
{
    use RefreshDatabase;

    protected Collection $posts;

    /**
     * Setup the test
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->posts = Post::factory(10)->create();
    }

    /**
     * Test to show a single post
     *
     * @return void
     */
    public function test_can_show_a_post()
    {
        $post = $this->posts->random();

        $response = $this->json(
            method: 'GET',
            uri: route('api.v1.filament.posts.show', $post->id),
            headers: [
                'x-rest-presenter-api-key' => config('rest-presenter.auth.key'),
                'x-rest-presenter' => 'Post'
            ],
        );

        $response->assertStatus(200);

        $this->assertEquals(
            expected: DataResponse::from($post)->toArray(),
            actual: $response->json(),
            message: 'Response data is in the expected format',
        );
    }

    /**
     * Test to list all posts
     *
     * @return void
     */
    public function test_can_list_all_posts()
    {
        $response = $this->json(
            method: 'GET',
            uri: route('api.v1.filament.posts.index'),
            headers: [
                'x-rest-presenter-api-key' => config('rest-presenter.auth.key'),
                'x-rest-presenter' => 'Post'
            ],
        );

        $response->assertStatus(200);

        $this->assertEquals(
            expected: DataResponse::collect($this->posts)->toArray(),
            actual: $response->json(),
            message: 'Response data is in the expected format',
        );
    }
}
