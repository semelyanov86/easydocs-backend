<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Documents\ChangeDocumentSequenceAction;
use App\Actions\Documents\CreateDocumentAction;
use App\Actions\Documents\DeleteDocumentAction;
use App\Actions\Documents\GetAllDocumentsAction;
use App\Actions\Documents\GetDocumentByIdAction;
use App\Actions\Documents\GetDocumentsFromFolderAction;
use App\Actions\Documents\UpdateDocumentAction;
use App\DTO\DocumentData;
use App\Http\Requests\IndexDocumentsRequest;
use App\Http\Requests\PartlyUpdateDocumentRequest;
use App\Transformers\DocumentTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Symfony\Component\HttpFoundation\Response;

final class DocumentController extends Controller
{
    public function index(IndexDocumentsRequest $request, GetAllDocumentsAction $action): JsonResponse
    {
        $user = $request->user();
        abort_if(! $user, 403, 'No user found');
        $documents = $action->handle($user, $request->integer('size'));

        return fractal()->collection($documents, new DocumentTransformer())->paginateWith(new IlluminatePaginatorAdapter($documents))->respond();
    }

    public function indexFromFolder(IndexDocumentsRequest $request, int $folderId, GetDocumentsFromFolderAction $action): JsonResponse
    {
        $user = $request->user();
        abort_if(! $user, 403, 'No user found');
        $documents = $action->handle($folderId, $user);

        return fractal()->collection($documents, new DocumentTransformer())->respond();
    }

    public function store(Request $request, DocumentData $data, CreateDocumentAction $action): JsonResponse
    {
        $user = $request->user();
        abort_if(! $user, 403, 'No user found');
        $data->user_id = $user->id;
        $data->group_id = $user->group_id;

        $document = $action->handle($data);

        return fractal($document, new DocumentTransformer())->respond(Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id, DocumentData $data, UpdateDocumentAction $action): JsonResponse
    {
        $user = $request->user();
        abort_if(! $user, 403, 'No user found');
        $data->id = $id;
        $data->user_id = $user->id;
        $data->group_id = $user->group_id;

        $document = $action->handle($data, $user);

        return fractal($document, new DocumentTransformer())->respond(Response::HTTP_ACCEPTED);
    }

    public function updateSequence(PartlyUpdateDocumentRequest $request, int $id, ChangeDocumentSequenceAction $action): JsonResponse
    {
        $user = $request->user();
        if (! $user) {
            abort(403, 'No user found');
        }
        $document = $action->handle($id, $request->integer('sequence'), $user);

        return fractal($document, new DocumentTransformer())->respond(Response::HTTP_ACCEPTED);
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
