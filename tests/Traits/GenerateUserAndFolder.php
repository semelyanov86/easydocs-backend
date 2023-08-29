<?php

declare(strict_types=1);

namespace Tests\Traits;

use App\Models\Folder;
use App\Models\Group;
use App\Models\User;

trait GenerateUserAndFolder
{
    protected function generateUser(): User
    {
        /** @var Group $group */
        $group = Group::factory()->createOne();

        return User::factory()->createOne([
            'group_id' => $group->id,
        ]);
    }

    protected function generateParentFolder(User $user): Folder
    {
        /** @var Folder $folder */
        $folder = Folder::factory()->createOne([
            'user_id' => $user->id,
            'group_id' => $user->group_id,
            'parent_id' => null,
        ]);

        return $folder;
    }
}
