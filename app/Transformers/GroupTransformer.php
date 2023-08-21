<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Models\Group;
use League\Fractal\TransformerAbstract;

final class GroupTransformer extends TransformerAbstract
{
    /** @var string[] */
    protected array $defaultIncludes = [];

    /** @var string[] */
    protected array $availableIncludes = ['users'];

    /**
     * @return array<string, \Carbon\Carbon|int|string|null>
     */
    public function transform(Group $group): array
    {
        return [
            'id' => (int) $group->id,
            'name' => $group->name,
            'description' => $group->description,
            'created_at' => $group->created_at,
            'updated_at' => $group->updated_at,
        ];
    }

    public function includeUsers(Group $group): \League\Fractal\Resource\Collection
    {
        $users = $group->users ?? [];

        return $this->collection($users, new UsersTransformer());
    }
}
