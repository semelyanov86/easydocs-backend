<?php

declare(strict_types=1);

namespace App\Actions\Documents;

use App\DTO\FolderData;
use App\Models\Document;
use Lorisleiva\Actions\Action;

final class ChangeDocsVisibilityAction extends Action
{
    public function handle(FolderData $folderData): void
    {
        Document::where('folder_id', $folderData->id)->update(['is_private' => $folderData->is_private]);
    }
}
