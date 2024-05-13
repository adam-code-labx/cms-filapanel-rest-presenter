<?php

namespace App\Api\StarterKits\Filament\Admin\Resources\Pages\Presenters\Pages\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\Optional as TypeScriptOptional;

/** @typescript */
class PageData extends Data
{
    public function __construct(
        public string $id,
		#[TypeScriptOptional]
		public ?string $slug,
		#[TypeScriptOptional]
		public ?string $title,
		#[TypeScriptOptional]
		public ?string $content,
		public int $author_id,
		#[TypeScriptOptional]
		public ?Carbon $created_at,
		#[TypeScriptOptional]
		public ?Carbon $updated_at,
    ) {
    }
}
