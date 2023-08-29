<?php

declare(strict_types=1);

namespace App\Actions\Documents;

use App\Models\Document;
use App\Models\User;
use Lorisleiva\Actions\Action;

final class CheckDocumentPermissionsAction extends Action
{
    public function handle(Document $document, User $user): bool
    {
        if ($user->id === $document->user_id) {
            return true;
        }
        if (! $document->folder?->is_private && $user->group_id === $document->group_id) {
            return true;
        }

        return false;
    }
}
