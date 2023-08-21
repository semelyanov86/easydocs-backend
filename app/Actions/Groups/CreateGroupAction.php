<?php

declare(strict_types=1);

namespace App\Actions\Groups;

use App\DTO\GroupData;
use App\Models\Group;
use Lorisleiva\Actions\Action;

final class CreateGroupAction extends Action
{
    public function handle(GroupData $data): Group
    {
        return Group::create($data->toArray());
    }
}
