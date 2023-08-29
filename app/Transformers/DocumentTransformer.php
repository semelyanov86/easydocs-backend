<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Models\Document;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;

final class DocumentTransformer extends TransformerAbstract
{
    /** @var string[] */
    protected array $defaultIncludes = ['media'];

    /** @var string[] */
    protected array $availableIncludes = ['folder', 'group', 'user', 'media'];

    /**
     * @return array<string, int|string>
     */
    public function transform(Document $document): array
    {
        return [
            'id' => (int) $document->id,
            'name' => $document->name,
            'description' => $document->description,
            'date_valid' => $document->date_valid?->format('Y-m-d'),
            'sequence' => (int) $document->sequence,
            'state' => $document->state->name(),
            'state_color' => $document->state->color(),
            'folder_id' => $document->folder_id,
            'public_link' => $document->public_link,
            'is_private' => $document->is_private,
            'version' => (int) $document->version,
            'created_at' => $document->created_at,
            'updated_at' => $document->updated_at,
        ];
    }

    public function includeFolder(Document $document): Item
    {
        return $this->item($document->folder, new FolderTransformer);
    }

    public function includeGroup(Document $document): Item
    {
        return $this->item($document->group, new GroupTransformer);
    }

    public function includeUser(Document $document): Item
    {
        return $this->item($document->user, new UsersTransformer);
    }

    public function includeMedia(Document $document): \League\Fractal\Resource\Collection
    {
        return $this->collection($document->getMedia(Document::COLLECTION_NAME), new MediaTransformer());
    }
}
