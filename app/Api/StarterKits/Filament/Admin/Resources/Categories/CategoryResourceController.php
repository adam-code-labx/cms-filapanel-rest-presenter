<?php

namespace App\Api\StarterKits\Filament\Admin\Resources\Categories;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use XtendPackages\RESTPresenter\Resources\ResourceController;

class CategoryResourceController extends ResourceController
{
    protected static string $model = Category::class;

    public static bool $isAuthenticated = false;

    public function index(Request $request): Collection
    {
        $categories = $this->getModelQueryInstance()->get();

        return $categories->map(
            fn (Category $category) => $this->present($request, $category),
        );
    }

    public function show(Request $request, Category $category): Data
    {
        return $this->present($request, $category);
    }

    public function filters(): array
    {
        return [
            
        ];
    }

    public function presenters(): array
    {
        return [
            'category' => Presenters\Categories\CategoryPresenter::class,
        ];
    }
}
