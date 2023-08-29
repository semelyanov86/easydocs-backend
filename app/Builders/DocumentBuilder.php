<?php

declare(strict_types=1);

namespace App\Builders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

final class DocumentBuilder extends Builder
{
    public function whereOwnedToUser(User $user): self
    {
        return $this->where('user_id', $user->id)->orWhere(function (Builder $query) use ($user) {
            $query->where('is_private', false)->where('group_id', $user->group_id);
        });
    }
}
