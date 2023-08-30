<?php

declare(strict_types=1);

namespace App\Actions\Folders;

use App\Actions\Documents\ChangeDocsVisibilityAction;
use App\DTO\FolderData;
use App\Models\Folder;
use App\Models\User;
use Lorisleiva\Actions\Action;

final class UpdateFolderAction extends Action
{
    public function handle(FolderData $folderData, User $user): Folder
    {
        $folderModel = GetFolderByIdAction::run($folderData->id, $user);
        $folderModel->name = $folderData->name;
        $folderModel->description = $folderData->description;
        $folderModel->sequence = $folderData->sequence;
        $folderModel->parent_id = $folderData->parent_id;
        if ($folderModel->is_private !== $folderData->is_private) {
            ChangeDocsVisibilityAction::run($folderData);
        }
        $folderModel->is_private = $folderData->is_private;
        $folderModel->save();

        return $folderModel;
    }
}
