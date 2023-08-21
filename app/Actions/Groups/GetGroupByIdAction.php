<?php

declare(strict_types=1);

namespace App\Actions\Groups;

use App\Models\Group;
use Lorisleiva\Actions\Action;

final class GetGroupByIdAction extends Action
{
    public function handle(int $id): Group
    {
        return Group::with('users')->findOrFail($id);
    }
}
