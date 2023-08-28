<?php

declare(strict_types=1);

namespace App\DTO;

use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Data;

final class FolderData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public ?string $description,
        #[Exists(table: 'users', column: 'id')]
        public ?int $user_id,
        #[Exists(table: 'groups', column: 'id')]
        public ?int $group_id,
        public ?int $sequence,
        public bool $is_private,
        #[Exists(table: 'folders', column: 'id')]
        public ?int $parent_id,
        #[Numeric] #[Nullable]
        public ?int $seedms_id,
    ) {
    }
}
