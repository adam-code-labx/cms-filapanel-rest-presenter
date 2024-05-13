<?php

namespace App\Api\StarterKits\Filament\Admin\Resources\Posts\Presenters\Posts\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\Optional as TypeScriptOptional;

/** @typescript */
class PostData extends Data
{
    public function __construct(
        public string $id,
		#[TypeScriptOptional]
		public ?string $slug,
		#[TypeScriptOptional]
		public ?string $title,
		#[TypeScriptOptional]
		public ?string $content,
		public int $category_id,
		public int $author_id,
		#[TypeScriptOptional]
		public ?Carbon $created_at,
		#[TypeScriptOptional]
		public ?Carbon $updated_at,
    ) {
    }
}
