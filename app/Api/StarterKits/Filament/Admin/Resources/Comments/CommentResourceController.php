<?php

namespace App\Api\StarterKits\Filament\Admin\Resources\Comments;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use XtendPackages\RESTPresenter\Resources\ResourceController;

class CommentResourceController extends ResourceController
{
    protected static string $model = Comment::class;

    public static bool $isAuthenticated = false;

    public function index(Request $request): Collection
    {
        $comments = $this->getModelQueryInstance()->get();

        return $comments->map(
            fn (Comment $comment) => $this->present($request, $comment),
        );
    }

    public function show(Request $request, Comment $comment): Data
    {
        return $this->present($request, $comment);
    }

    public function filters(): array
    {
        return [
            
        ];
    }

    public function presenters(): array
    {
        return [
            'comment' => Presenters\Comments\CommentPresenter::class,
        ];
    }
}
