<?php

namespace App\Api\StarterKits\Filament\Admin\Resources\Posts;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use XtendPackages\RESTPresenter\Resources\ResourceController;

class PostResourceController extends ResourceController
{
    protected static string $model = Post::class;

    public static bool $isAuthenticated = false;

    public function index(Request $request): Collection
    {
        $posts = $this->getModelQueryInstance()->get();

        return $posts->map(
            fn (Post $post) => $this->present($request, $post),
        );
    }

    public function show(Request $request, Post $post): Data
    {
        return $this->present($request, $post);
    }

    public function filters(): array
    {
        return [
            
        ];
    }

    public function presenters(): array
    {
        return [
            'post' => Presenters\Posts\PostPresenter::class,
        ];
    }
}
