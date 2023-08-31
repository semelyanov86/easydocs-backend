<?php

declare(strict_types=1);

namespace App\Actions\Documents;

use App\Actions\Folders\GetFolderByIdAction;
use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Action;

final class GetDocumentsFromFolderAction extends Action
{
    /**
     * @return Collection<int, Document>
     */
    public function handle(int $folderId, User $user): Collection
    {
        $folderModel = GetFolderByIdAction::run($folderId, $user);
        /** @var Collection<int, Document> $documents */
        $documents = Document::where('folder_id', $folderModel->id)->orderBy('sequence')->get();

        return $documents;
    }
}
