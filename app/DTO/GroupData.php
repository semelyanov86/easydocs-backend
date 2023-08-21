<?php

declare(strict_types=1);

namespace App\DTO;

use Spatie\LaravelData\Data;

final class GroupData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public ?string $description,
    ) {
    }
}
