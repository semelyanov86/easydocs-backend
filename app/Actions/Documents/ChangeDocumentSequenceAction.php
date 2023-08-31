<?php

declare(strict_types=1);

namespace App\Actions\Documents;

use App\Models\Document;
use App\Models\User;
use Lorisleiva\Actions\Action;

final class ChangeDocumentSequenceAction extends Action
{
    public function handle(int $id, int $sequence, User $user): Document
    {
        $document = GetDocumentByIdAction::run($id, $user);
        $document->move($sequence);

        return $document;
    }
}
