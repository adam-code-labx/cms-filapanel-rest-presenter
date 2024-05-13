<?php

namespace App\Api\StarterKits\Filament\Admin\Resources\Comments\Presenters\Comments;

use App\Api\StarterKits\Filament\Admin\Resources\Comments\Presenters\Comments\Data\CommentData;
use App\Models\Comment as CommentModel;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use XtendPackages\RESTPresenter\Concerns\InteractsWithPresenter;
use XtendPackages\RESTPresenter\Contracts\Presentable;

class CommentPresenter implements Presentable
{
    use InteractsWithPresenter;

    public function __construct(
        protected Request $request,
        protected ?CommentModel $model,
    ) {}

    public function transform(): CommentData | Data
    {
        return CommentData::from($this->model);
    }
}
