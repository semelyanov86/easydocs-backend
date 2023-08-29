<?php

declare(strict_types=1);

namespace App\Actions\Files;

use App\Models\Document;
use Lorisleiva\Actions\Action;

final class AssociateFileWithModelAction extends Action
{
    public function handle(string $content, string $fileName, int $version, Document $model): Document
    {
        /** @var int $position */
        $position = strpos($content, ';');
        $extension = explode('/', explode(':', substr($content, 0, $position))[1])[1];
        $model->addMediaFromBase64($content)
            ->usingFileName($fileName.'-'.$version.'.'.$extension)
            ->withCustomProperties([Document::VERSION_PROPERTY => $version])
            ->toMediaCollection(Document::COLLECTION_NAME);

        return $model;
    }
}
