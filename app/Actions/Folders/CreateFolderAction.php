<?php

declare(strict_types=1);

namespace App\Actions\Folders;

use App\DTO\FolderData;
use App\Models\Folder;
use Lorisleiva\Actions\Action;

final class CreateFolderAction extends Action
{
    public function handle(FolderData $data): Folder
    {
        abort_if(! $data->user_id, 422, 'User id field is required');
        $parent = Folder::whereId($data->parent_id)->firstOrFail();
        if (! $data->sequence) {
            $data->sequence = GetNewSequenceAction::run($data->parent_id);
        }

        return Folder::create($data->toArray(), $parent);
    }
}
