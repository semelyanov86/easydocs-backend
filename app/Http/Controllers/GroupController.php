<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Groups\GetAllGroupsAction;
use App\Actions\Groups\GetGroupByIdAction;
use App\Models\Group;
use App\Transformers\GroupTransformer;

final class GroupController extends Controller
{
    /**
     * @return Group[]
     */
    public function index(GetAllGroupsAction $action): array
    {
        return fractal()->collection($action->handle())->transformWith(new GroupTransformer())->toArray() ?? [];
    }

    public function show(int $id): Group
    {
        return GetGroupByIdAction::run($id);
    }
}
