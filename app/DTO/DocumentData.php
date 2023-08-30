<?php

declare(strict_types=1);

namespace App\DTO;

use Spatie\LaravelData\Attributes\Validation\DateFormat;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

final class DocumentData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $description,
        #[DateFormat('Y-m-d')]
        public ?string $date_valid,
        #[Exists('folders', 'id')]
        public int $folder_id,
        #[Exists('users', 'id')]
        public ?int $user_id,
        #[Exists('groups', 'id')]
        public ?int $group_id,
        public ?int $sequence,
        public ?string $state,
        public ?int $seedms_id,
        public ?string $public_link,
        #[Min(20)]
        public ?string $file,
        #[Min(3)]
        public ?string $fileName,
        public int $version = 1,
        public bool $is_private = false,
        /** @var string[] */
        public array $tags = []
    ) {
    }
}
