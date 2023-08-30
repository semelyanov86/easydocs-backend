<?php

declare(strict_types=1);

namespace App\Actions\Documents;

use App\Actions\Files\AssociateFileWithModelAction;
use App\Actions\Folders\GetFolderByIdAction;
use App\DTO\DocumentData;
use App\Models\Document;
use App\Models\User;
use App\States\Created;
use Lorisleiva\Actions\Action;

final class CreateDocumentAction extends Action
{
    public function handle(DocumentData $data): Document
    {
        if (! $data->fileName || ! $data->file) {
            abort(422, 'File name and File fields is required for this operation');
        }

        $data->state = Created::class;
        $userModel = User::findOrFail($data->user_id);

        $folder = GetFolderByIdAction::run($data->folder_id, $userModel);
        $data->is_private = $folder->is_private;

        /** @var Document $document */
        $document = Document::create($data->toArray());
        $document->attachTags($data->tags);

        return AssociateFileWithModelAction::run(
            content: $data->file,
            fileName: $data->fileName,
            version: 1,
            model: $document
        );
    }
}
