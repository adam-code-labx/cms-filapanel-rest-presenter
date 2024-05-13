<?php

namespace App\Api\StarterKits\Filament\Admin\Resources\Posts\Presenters\Posts;

use App\Api\StarterKits\Filament\Admin\Resources\Posts\Presenters\Posts\Data\PostData;
use App\Models\Post as PostModel;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use XtendPackages\RESTPresenter\Concerns\InteractsWithPresenter;
use XtendPackages\RESTPresenter\Contracts\Presentable;

class PostPresenter implements Presentable
{
    use InteractsWithPresenter;

    public function __construct(
        protected Request $request,
        protected ?PostModel $model,
    ) {}

    public function transform(): PostData | Data
    {
        return PostData::from($this->model);
    }
}
