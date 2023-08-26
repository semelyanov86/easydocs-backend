<?php

declare(strict_types=1);

namespace App\Actions\Folders;

use App\Models\Folder;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Action;

final class GetAllFoldersAction extends Action
{
    /**
     * @return Collection<int, Folder>
     */
    public function handle(User $user): Collection
    {
        // @phpstan-ignore-next-line
        return Folder::with('ancestors')->where('user_id', $user->id)->orWhere('group_id', $user->group_id)->get()->toTree();
    }
}
