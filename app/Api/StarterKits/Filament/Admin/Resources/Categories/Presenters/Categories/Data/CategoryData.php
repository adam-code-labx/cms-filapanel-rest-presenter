<?php

namespace App\Api\StarterKits\Filament\Admin\Resources\Categories\Presenters\Categories\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\Optional as TypeScriptOptional;

/** @typescript */
class CategoryData extends Data
{
    public function __construct(
        public string $id,
		#[TypeScriptOptional]
		public ?string $slug,
		#[TypeScriptOptional]
		public ?string $title,
		#[TypeScriptOptional]
		public ?string $description,
		#[TypeScriptOptional]
		public ?Carbon $created_at,
		#[TypeScriptOptional]
		public ?Carbon $updated_at,
    ) {
    }
}
