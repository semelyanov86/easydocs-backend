<?php

declare(strict_types=1);

namespace App\Actions\Documents;

use App\Actions\Files\AssociateFileWithModelAction;
use App\Actions\Folders\GetFolderByIdAction;
use App\DTO\DocumentData;
use App\Models\Document;
use App\Models\User;
use Lorisleiva\Actions\Action;
use Symfony\Component\HttpFoundation\Response;

final class UpdateDocumentAction extends Action
{
    public function handle(DocumentData $data, User $user): Document
    {
        /** @var Document $documentModel */
        $documentModel = Document::findOrFail($data->id)->first();
        if ($documentModel->user_id !== $user->id && $documentModel->group_id !== $user->group_id && $documentModel->is_private) {
            abort(Response::HTTP_FORBIDDEN, 'You are not allowed to edit this document');
        }
        $documentModel->name = $data->name;
        $documentModel->description = $data->description;
        if ($data->seedms_id) {
            $documentModel->seedms_id = $data->seedms_id;
        }
        if ($documentModel->folder_id !== $data->folder_id) {
            $documentModel->folder_id = $data->folder_id;
            $folder = GetFolderByIdAction::run($data->folder_id, $user);
            $data->is_private = $folder->is_private;
        }
        if ($data->file && $data->fileName) {
            $documentModel->version++;
        }

        $documentModel->save();

        if ($data->sequence) {
            $documentModel->move($data->sequence);
        }
        $documentModel->syncTags($data->tags);

        if ($data->file && $data->fileName) {
            return AssociateFileWithModelAction::run(
                content: $data->file,
                fileName: $data->fileName,
                version: $documentModel->version,
                model: $documentModel
            );
        }

        return $documentModel;
    }
}
