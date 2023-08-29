<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Models\Document;
use League\Fractal\TransformerAbstract;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final class MediaTransformer extends TransformerAbstract
{
    /**
     * @return array<string, string|int>
     */
    public function transform(Media $media): array
    {
        return [
            'uuid' => $media->uuid,
            'type' => $media->type,
            'extension' => $media->extension,
            'humanReadableSize' => $media->humanReadableSize,
            'originalUrl' => $media->originalUrl,
            'id' => (int) $media->id,
            'name' => $media->name,
            'file_name' => $media->file_name,
            'mime_type' => $media->mime_type,
            'size' => (int) $media->size,
            'version' => $media->getCustomProperty(Document::VERSION_PROPERTY),
            'order_column' => (int) $media->order_column,
            'created_at' => $media->created_at,
            'updated_at' => $media->updated_at,
        ];
    }
}
