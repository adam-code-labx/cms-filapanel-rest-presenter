<?php

namespace Tests\StarterKits\Filament\Admin\Resources\Pages;

use App\Api\StarterKits\Filament\Admin\Resources\Pages\Presenters\Pages\Data\PageData as DataResponse;
use App\Models\Page as Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class PageResourceTest extends TestCase
{
    use RefreshDatabase;

    protected Collection $pages;

    /**
     * Setup the test
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->pages = Page::factory(10)->create();
    }

    /**
     * Test to show a single page
     *
     * @return void
     */
    public function test_can_show_a_page()
    {
        $page = $this->pages->random();

        $response = $this->json(
            method: 'GET',
            uri: route('api.v1.filament.pages.show', $page->id),
            headers: [
                'x-rest-presenter-api-key' => config('rest-presenter.auth.key'),
                'x-rest-presenter' => 'Page'
            ],
        );

        $response->assertStatus(200);

        $this->assertEquals(
            expected: DataResponse::from($page)->toArray(),
            actual: $response->json(),
            message: 'Response data is in the expected format',
        );
    }

    /**
     * Test to list all pages
     *
     * @return void
     */
    public function test_can_list_all_pages()
    {
        $response = $this->json(
            method: 'GET',
            uri: route('api.v1.filament.pages.index'),
            headers: [
                'x-rest-presenter-api-key' => config('rest-presenter.auth.key'),
                'x-rest-presenter' => 'Page'
            ],
        );

        $response->assertStatus(200);

        $this->assertEquals(
            expected: DataResponse::collect($this->pages)->toArray(),
            actual: $response->json(),
            message: 'Response data is in the expected format',
        );
    }
}
