<?php

declare(strict_types=1);

namespace App\Actions\Folders;

use App\Models\User;
use Lorisleiva\Actions\Action;

final class DeleteFolderAction extends Action
{
    public function handle(int $folderId, User $user): void
    {
        $folder = GetFolderByIdAction::run($folderId, $user);
        if ($folder->children->count() > 0) {
            abort(422, 'Folder has children elements. Can not delete it');
        }
        $folder->delete();
    }
}
