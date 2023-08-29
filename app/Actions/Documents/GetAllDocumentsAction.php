<?php

declare(strict_types=1);

namespace App\Actions\Documents;

use App\Models\Document;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Lorisleiva\Actions\Action;

final class GetAllDocumentsAction extends Action
{
    public function handle(User $user, int $perPage = 15): LengthAwarePaginator
    {
        return Document::with('folder')->whereOwnedToUser($user)->paginate($perPage);
    }
}
