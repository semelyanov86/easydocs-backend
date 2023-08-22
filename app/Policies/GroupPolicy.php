<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view_any_group');
    }

    public function view(User $user, Group $group): bool
    {
        return $user->can('view_group');
    }

    public function create(User $user): bool
    {
        return $user->can('create_group');
    }

    public function update(User $user, Group $group): bool
    {
        return $user->can('update_group');
    }

    public function delete(User $user, Group $group): bool
    {
        return $user->can('delete_group');
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_group');
    }

    public function forceDelete(User $user, Group $group): bool
    {
        return $user->can('force_delete_group');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_group');
    }

    public function restore(User $user, Group $group): bool
    {
        return $user->can('restore_group');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_group');
    }

    public function replicate(User $user, Group $group): bool
    {
        return $user->can('replicate_group');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder_group');
    }
}
