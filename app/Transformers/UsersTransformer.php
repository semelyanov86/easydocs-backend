<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

final class UsersTransformer extends TransformerAbstract
{
    /** @var string[] */
    protected array $defaultIncludes = ['group'];

    /** @var string[] */
    protected array $availableIncludes = ['group'];

    /**
     * @return array<string, \Carbon\Carbon|int|string|null>
     */
    public function transform(User $user): array
    {
        return [
            'id' => (int) $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'group_id' => (int) $user->group_id,
            'notifications_count' => (int) $user->notifications_count,
            'tokens_count' => (int) $user->tokens_count,
        ];
    }

    public function includeGroup(User $user): ?\League\Fractal\Resource\Item
    {
        $group = $user->group;
        if (! $group) {
            return null;
        }

        return $this->item($group, new GroupTransformer());
    }
}
