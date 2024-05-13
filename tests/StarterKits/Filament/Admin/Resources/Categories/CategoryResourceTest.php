<?php

namespace Tests\StarterKits\Filament\Admin\Resources\Categories;

use App\Api\StarterKits\Filament\Admin\Resources\Categories\Presenters\Categories\Data\CategoryData as DataResponse;
use App\Models\Category as Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class CategoryResourceTest extends TestCase
{
    use RefreshDatabase;

    protected Collection $categories;

    /**
     * Setup the test
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->categories = Category::factory(10)->create();
    }

    /**
     * Test to show a single category
     *
     * @return void
     */
    public function test_can_show_a_category()
    {
        $category = $this->categories->random();

        $response = $this->json(
            method: 'GET',
            uri: route('api.v1.filament.categories.show', $category->id),
            headers: [
                'x-rest-presenter-api-key' => config('rest-presenter.auth.key'),
                'x-rest-presenter' => 'Category'
            ],
        );

        $response->assertStatus(200);

        $this->assertEquals(
            expected: DataResponse::from($category)->toArray(),
            actual: $response->json(),
            message: 'Response data is in the expected format',
        );
    }

    /**
     * Test to list all categories
     *
     * @return void
     */
    public function test_can_list_all_categories()
    {
        $response = $this->json(
            method: 'GET',
            uri: route('api.v1.filament.categories.index'),
            headers: [
                'x-rest-presenter-api-key' => config('rest-presenter.auth.key'),
                'x-rest-presenter' => 'Category'
            ],
        );

        $response->assertStatus(200);

        $this->assertEquals(
            expected: DataResponse::collect($this->categories)->toArray(),
            actual: $response->json(),
            message: 'Response data is in the expected format',
        );
    }
}
