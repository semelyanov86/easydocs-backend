<?php

declare(strict_types=1);

namespace App\Actions\Folders;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Action;
use Spatie\Activitylog\Models\Activity;

final class GetFolderActivitiesAction extends Action
{
    /**
     * @return Collection<int, Activity>
     */
    public function handle(int $folderId, User $user): Collection
    {
        $folder = GetFolderByIdAction::run($folderId, $user);

        return $folder->activities;
    }
}
