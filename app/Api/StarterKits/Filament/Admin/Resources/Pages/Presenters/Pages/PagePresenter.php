<?php

namespace App\Api\StarterKits\Filament\Admin\Resources\Pages\Presenters\Pages;

use App\Api\StarterKits\Filament\Admin\Resources\Pages\Presenters\Pages\Data\PageData;
use App\Models\Page as PageModel;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use XtendPackages\RESTPresenter\Concerns\InteractsWithPresenter;
use XtendPackages\RESTPresenter\Contracts\Presentable;

class PagePresenter implements Presentable
{
    use InteractsWithPresenter;

    public function __construct(
        protected Request $request,
        protected ?PageModel $model,
    ) {}

    public function transform(): PageData | Data
    {
        return PageData::from($this->model);
    }
}
