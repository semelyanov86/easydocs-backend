<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Models\Folder;
use League\Fractal\TransformerAbstract;

final class FolderTransformer extends TransformerAbstract
{
    /** @var string[] */
    protected array $availableIncludes = ['children'];

    /** @var string[] */
    protected array $defaultIncludes = ['children'];

    /**
     * @return array<string, bool|\Carbon\Carbon|int|string|null>
     */
    public function transform(Folder $folder): array
    {
        return [
            'id' => (int) $folder->id,
            'name' => $folder->name,
            'description' => $folder->description,
            'user_id' => (int) $folder->user_id,
            'group_id' => (int) $folder->group_id,
            'sequence' => (int) $folder->sequence,
            'is_private' => (bool) $folder->is_private,
            'parent_id' => $folder->parent_id,
            'created_at' => $folder->created_at,
            'updated_at' => $folder->updated_at,
        ];
    }

    public function includeChildren(Folder $folder): \League\Fractal\Resource\Collection
    {
        return $this->collection($folder->children, new self());
    }
}
