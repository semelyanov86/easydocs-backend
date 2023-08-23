<?php

declare(strict_types=1);

namespace App\Actions\Users;

use App\Actions\Files\FileSaverAction;
use App\DTO\UserData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Action;

final class UpdateUserAction extends Action
{
    public function handle(UserData $data): User
    {
        $user = User::findOrFail($data->id);
        $user->name = $data->name;
        $user->email = $data->email;
        if ($data->password) {
            $user->password = Hash::make($data->password);
        }
        if ($data->avatar) {
            $user->avatar = FileSaverAction::run($data->avatar);
        } else {
            $user->avatar = null;
        }
        $user->save();

        return $user;
    }
}
