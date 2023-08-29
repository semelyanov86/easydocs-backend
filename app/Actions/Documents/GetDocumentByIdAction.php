<?php

declare(strict_types=1);

namespace App\Actions\Documents;

use App\Models\Document;
use App\Models\User;
use Lorisleiva\Actions\Action;
use Symfony\Component\HttpFoundation\Response;

final class GetDocumentByIdAction extends Action
{
    public function handle(int $id, User $user): Document
    {
        $document = Document::with('folder')->findOrFail($id);

        abort_unless(CheckDocumentPermissionsAction::run($document, $user), Response::HTTP_FORBIDDEN, 'You do not have permissions to read document');

        return $document;
    }
}
