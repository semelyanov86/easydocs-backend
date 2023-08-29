<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Documents\CreateDocumentAction;
use App\Actions\Documents\DeleteDocumentAction;
use App\Actions\Documents\GetDocumentByIdAction;
use App\DTO\DocumentData;
use App\Transformers\DocumentTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class DocumentController extends Controller
{
    public function store(Request $request, DocumentData $data, CreateDocumentAction $action): JsonResponse
    {
        $user = $request->user();
        abort_if(! $user, 403, 'No user found');
        $data->user_id = $user->id;
        $data->group_id = $user->group_id;

        $document = $action->handle($data);

        return fractal($document, new DocumentTransformer())->respond(Response::HTTP_CREATED);
    }

    public function show(Request $request, int $id, GetDocumentByIdAction $action): JsonResponse
    {
        $user = $request->user();
        abort_if(! $user, 403, 'No user found');

        $document = $action->handle($id, $user);

        return fractal($document, new DocumentTransformer())->respond();
    }

    public function destroy(Request $request, int $id, DeleteDocumentAction $action): \Illuminate\Http\Response
    {
        $user = $request->user();
        abort_if(! $user, 403, 'No user found');
        $action->handle($id, $user);

        return response()->noContent();
    }
}
