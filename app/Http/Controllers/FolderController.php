<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Folders\CreateFolderAction;
use App\Actions\Folders\DeleteFolderAction;
use App\Actions\Folders\GetAllFoldersAction;
use App\Actions\Folders\GetFolderActivitiesAction;
use App\Actions\Folders\GetFolderByIdAction;
use App\Actions\Folders\UpdateFolderAction;
use App\DTO\FolderData;
use App\Transformers\ActivityTransformer;
use App\Transformers\FolderTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class FolderController extends Controller
{
    public function index(Request $request, GetAllFoldersAction $action): JsonResponse
    {
        $user = $request->user();
        if (! $user) {
            abort(403, 'No user found');
        }
        $folders = $action->handle($user);

        return fractal()->collection($folders, new FolderTransformer())->respond();
    }

    public function store(FolderData $data, CreateFolderAction $action): JsonResponse
    {
        $user = \request()->user();
        if (! $user) {
            abort(403, 'No user found');
        }
        $data->user_id = $user->id;
        $data->group_id = $user->group_id;

        $folder = $action->handle($data);

        return fractal($folder, new FolderTransformer())->respond(Response::HTTP_CREATED);
    }

    public function show(Request $request, int $id, GetFolderByIdAction $action): JsonResponse
    {
        $user = $request->user();
        abort_if(! $user, 403, 'No user found');
        $folder = $action->handle($id, $user);

        return fractal($folder, new FolderTransformer())->respond();
    }

    public function update(FolderData $data, int $folderId, UpdateFolderAction $action): JsonResponse
    {
        $user = \request()->user();
        abort_if(! $user, 403, 'No user found');
        $data->id = $folderId;
        $folder = $action->handle($data, $user);

        return fractal($folder, new FolderTransformer())->respond(Response::HTTP_ACCEPTED);
    }

    public function destroy(Request $request, int $folder, DeleteFolderAction $action): \Illuminate\Http\Response
    {
        $user = \request()->user();
        abort_if(! $user, 403, 'No user found');

        $action->handle($folder, $user);

        return response()->noContent();
    }

    public function activities(Request $request, int $folder, GetFolderActivitiesAction $action): JsonResponse
    {
        $user = \request()->user();
        abort_if(! $user, 403, 'No user found');
        $activities = $action->handle($folder, $user);

        return fractal()->collection($activities, new ActivityTransformer())->respond();
    }
}
