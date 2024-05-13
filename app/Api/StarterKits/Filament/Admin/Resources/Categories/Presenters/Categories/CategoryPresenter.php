<?php

namespace App\Api\StarterKits\Filament\Admin\Resources\Categories\Presenters\Categories;

use App\Api\StarterKits\Filament\Admin\Resources\Categories\Presenters\Categories\Data\CategoryData;
use App\Models\Category as CategoryModel;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use XtendPackages\RESTPresenter\Concerns\InteractsWithPresenter;
use XtendPackages\RESTPresenter\Contracts\Presentable;

class CategoryPresenter implements Presentable
{
    use InteractsWithPresenter;

    public function __construct(
        protected Request $request,
        protected ?CategoryModel $model,
    ) {}

    public function transform(): CategoryData | Data
    {
        return CategoryData::from($this->model);
    }
}
