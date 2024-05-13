<?php

namespace App\Api\StarterKits\Filament\Admin\Resources\Pages;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use XtendPackages\RESTPresenter\Resources\ResourceController;

class PageResourceController extends ResourceController
{
    protected static string $model = Page::class;

    public static bool $isAuthenticated = false;

    public function index(Request $request): Collection
    {
        $pages = $this->getModelQueryInstance()->get();

        return $pages->map(
            fn (Page $page) => $this->present($request, $page),
        );
    }

    public function show(Request $request, Page $page): Data
    {
        return $this->present($request, $page);
    }

    public function filters(): array
    {
        return [
            
        ];
    }

    public function presenters(): array
    {
        return [
            'page' => Presenters\Pages\PagePresenter::class,
        ];
    }
}
