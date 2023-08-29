<?php

declare(strict_types=1);

namespace App\Actions\Folders;

use App\Models\Folder;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Action;

final class GetPrivateFoldersAction extends Action
{
    /**
     * @return Collection<int, Folder>
     */
    public function handle(): Collection
    {
        return Folder::whereNot('is_private', true)->get();
    }
}
