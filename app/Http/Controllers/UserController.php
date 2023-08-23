<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Users\LogoutUserAction;
use App\Actions\Users\UpdateUserAction;
use App\DTO\UserData;
use App\Http\Requests\UserLoginRequest;
use App\Transformers\TokenTransformer;
use App\Transformers\UsersTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

final class UserController extends Controller
{
    public function login(UserLoginRequest $request): JsonResponse
    {
        $data = $request->validated();
        unset($data['token_name']);
        if (Auth::attempt($data)) {
            $token = $request->user()?->createToken($request->token_name);

            if (! $token) {
                abort(403, 'Login and password does not match');
            }

            return fractal($token, new TokenTransformer())->respond(202);
        }

        abort(403, 'Login and password does not match');
    }

    public function logout(Request $request): \Illuminate\Http\Response
    {
        $user = $request->user();
        if (! $user) {
            abort(403, 'Please provide valid access token');
        }

        LogoutUserAction::run($user);

        return response()->noContent();
    }

    public function me(Request $request): JsonResponse
    {
        return fractal($request->user(), new UsersTransformer())->respond();
    }

    public function update(UserData $data, UpdateUserAction $action): JsonResponse
    {
        $user = \request()->user();
        if (! $user) {
            abort(403);
        }
        $data->id = $user->id;
        $user = $action->handle($data);

        return fractal($user, new UsersTransformer())->respond(Response::HTTP_ACCEPTED);
    }
}
