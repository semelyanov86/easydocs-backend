<?php

declare(strict_types=1);

namespace App\Actions\Users;

use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;
use Lorisleiva\Actions\Action;

final class LogoutUserAction extends Action
{
    public function handle(User $user): void
    {
        /** @var PersonalAccessToken $token */
        $token = $user->currentAccessToken();
        $token->delete();
    }
}
