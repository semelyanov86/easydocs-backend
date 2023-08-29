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
        if (! $data->sequence) {
            /** @var ?Document $latestDocument */
            $latestDocument = Document::latest('sequence')->first();
            if (! $latestDocument) {
                $data->sequence = 1;
            } else {
                $data->sequence = $latestDocument->sequence + 1;
            }
        }
        $data->state = Created::class;
        $userModel = User::findOrFail($data->user_id);

        $folder = GetFolderByIdAction::run($data->folder_id, $userModel);
        $data->is_private = $folder->is_private;

        $document = Document::create($data->toArray());

        return AssociateFileWithModelAction::run(
            content: $data->file,
            fileName: $data->fileName,
            version: 1,
            model: $document
        );
    }
}
