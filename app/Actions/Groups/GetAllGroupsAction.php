<?php

declare(strict_types=1);

namespace App\Actions\Groups;

use App\Models\Group;
use Illuminate\Pagination\LengthAwarePaginator;
use Lorisleiva\Actions\Action;

final class GetAllGroupsAction extends Action
{
    /**
     * @return LengthAwarePaginator<Group>
     */
    public function handle(): LengthAwarePaginator
    {
        return Group::with('users')->paginate();
    }
}
