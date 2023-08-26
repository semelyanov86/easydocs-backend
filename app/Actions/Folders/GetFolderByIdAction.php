<?php

declare(strict_types=1);

namespace App\Actions\Folders;

use App\Models\Folder;
use App\Models\User;
use Lorisleiva\Actions\Action;

final class GetFolderByIdAction extends Action
{
    public function handle(int $id, User $user): Folder
    {
        /** @var ?Folder $folder */
        $folder = Folder::descendantsAndSelf($id)->toTree()->first();
        if (! $folder) {
            abort(404);
        }
        abort_if(! $folder->isViewAllowed($user->id, $user->group_id), 403, 'You are not allowed to view this folder');

        return $folder;
    }
}
