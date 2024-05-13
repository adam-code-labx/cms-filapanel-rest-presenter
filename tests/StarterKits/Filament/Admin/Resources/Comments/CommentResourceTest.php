<?php

namespace Tests\StarterKits\Filament\Admin\Resources\Comments;

use App\Api\StarterKits\Filament\Admin\Resources\Comments\Presenters\Comments\Data\CommentData as DataResponse;
use App\Models\Comment as Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class CommentResourceTest extends TestCase
{
    use RefreshDatabase;

    protected Collection $comments;

    /**
     * Setup the test
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->comments = Comment::factory(10)->create();
    }

    /**
     * Test to show a single comment
     *
     * @return void
     */
    public function test_can_show_a_comment()
    {
        $comment = $this->comments->random();

        $response = $this->json(
            method: 'GET',
            uri: route('api.v1.filament.comments.show', $comment->id),
            headers: [
                'x-rest-presenter-api-key' => config('rest-presenter.auth.key'),
                'x-rest-presenter' => 'Comment'
            ],
        );

        $response->assertStatus(200);

        $this->assertEquals(
            expected: DataResponse::from($comment)->toArray(),
            actual: $response->json(),
            message: 'Response data is in the expected format',
        );
    }

    /**
     * Test to list all comments
     *
     * @return void
     */
    public function test_can_list_all_comments()
    {
        $response = $this->json(
            method: 'GET',
            uri: route('api.v1.filament.comments.index'),
            headers: [
                'x-rest-presenter-api-key' => config('rest-presenter.auth.key'),
                'x-rest-presenter' => 'Comment'
            ],
        );

        $response->assertStatus(200);

        $this->assertEquals(
            expected: DataResponse::collect($this->comments)->toArray(),
            actual: $response->json(),
            message: 'Response data is in the expected format',
        );
    }
}
