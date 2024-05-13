<?php

namespace App\Api\StarterKits\Filament\Admin\Resources\Comments\Presenters\Comments\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\Optional as TypeScriptOptional;

/** @typescript */
class CommentData extends Data
{
    public function __construct(
        public string $id,
		#[TypeScriptOptional]
		public ?string $content,
		public int $user_id,
		public int $post_id,
		#[TypeScriptOptional]
		public ?Carbon $created_at,
		#[TypeScriptOptional]
		public ?Carbon $updated_at,
    ) {
    }
}
