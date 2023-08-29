<?php

declare(strict_types=1);

namespace App\Actions\Documents;

use App\Models\User;
use Lorisleiva\Actions\Action;

final class DeleteDocumentAction extends Action
{
    public function handle(int $id, User $user): void
    {
        $document = GetDocumentByIdAction::run($id, $user);
        $document->delete();
    }
}
