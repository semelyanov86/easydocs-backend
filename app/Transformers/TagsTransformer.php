<?php

declare(strict_types=1);

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Spatie\Tags\Tag;

final class TagsTransformer extends TransformerAbstract
{
    /**
     * @return array<string, string|int|null>
     */
    public function transform(Tag $tag): array
    {
        return [
            'id' => (int) $tag->id,
            // @phpstan-ignore-next-line
            'name' => (string) $tag->name,
            // @phpstan-ignore-next-line
            'slug' => (string) $tag->slug,
            'created_at' => $tag->created_at?->toJSON(),
            'updated_at' => $tag->updated_at?->toJSON(),
        ];
    }
}
