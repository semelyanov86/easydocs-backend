<?php

namespace App\Actions\Documents;

/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\App\Models\Document $document, \App\Models\User $user)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\App\Models\Document $document, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\App\Models\Document $document, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \App\Models\Document $document, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \App\Models\Document $document, \App\Models\User $user)
 * @method static dispatchSync(\App\Models\Document $document, \App\Models\User $user)
 * @method static dispatchNow(\App\Models\Document $document, \App\Models\User $user)
 * @method static dispatchAfterResponse(\App\Models\Document $document, \App\Models\User $user)
 * @method static bool run(\App\Models\Document $document, \App\Models\User $user)
 */
class CheckDocumentPermissionsAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\App\DTO\DocumentData $data)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\App\DTO\DocumentData $data)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\App\DTO\DocumentData $data)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \App\DTO\DocumentData $data)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \App\DTO\DocumentData $data)
 * @method static dispatchSync(\App\DTO\DocumentData $data)
 * @method static dispatchNow(\App\DTO\DocumentData $data)
 * @method static dispatchAfterResponse(\App\DTO\DocumentData $data)
 * @method static \App\Models\Document run(\App\DTO\DocumentData $data)
 */
class CreateDocumentAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(int $id, \App\Models\User $user)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(int $id, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(int $id, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, int $id, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, int $id, \App\Models\User $user)
 * @method static dispatchSync(int $id, \App\Models\User $user)
 * @method static dispatchNow(int $id, \App\Models\User $user)
 * @method static dispatchAfterResponse(int $id, \App\Models\User $user)
 * @method static void run(int $id, \App\Models\User $user)
 */
class DeleteDocumentAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\App\Models\User $user, int $perPage = 15)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\App\Models\User $user, int $perPage = 15)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\App\Models\User $user, int $perPage = 15)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \App\Models\User $user, int $perPage = 15)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \App\Models\User $user, int $perPage = 15)
 * @method static dispatchSync(\App\Models\User $user, int $perPage = 15)
 * @method static dispatchNow(\App\Models\User $user, int $perPage = 15)
 * @method static dispatchAfterResponse(\App\Models\User $user, int $perPage = 15)
 * @method static \Illuminate\Contracts\Pagination\LengthAwarePaginator run(\App\Models\User $user, int $perPage = 15)
 */
class GetAllDocumentsAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(int $id, \App\Models\User $user)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(int $id, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(int $id, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, int $id, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, int $id, \App\Models\User $user)
 * @method static dispatchSync(int $id, \App\Models\User $user)
 * @method static dispatchNow(int $id, \App\Models\User $user)
 * @method static dispatchAfterResponse(int $id, \App\Models\User $user)
 * @method static \App\Models\Document run(int $id, \App\Models\User $user)
 */
class GetDocumentByIdAction
{
}
namespace App\Actions\Files;

/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(string $content, string $fileName, int $version, \App\Models\Document $model)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(string $content, string $fileName, int $version, \App\Models\Document $model)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(string $content, string $fileName, int $version, \App\Models\Document $model)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, string $content, string $fileName, int $version, \App\Models\Document $model)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, string $content, string $fileName, int $version, \App\Models\Document $model)
 * @method static dispatchSync(string $content, string $fileName, int $version, \App\Models\Document $model)
 * @method static dispatchNow(string $content, string $fileName, int $version, \App\Models\Document $model)
 * @method static dispatchAfterResponse(string $content, string $fileName, int $version, \App\Models\Document $model)
 * @method static \App\Models\Document run(string $content, string $fileName, int $version, \App\Models\Document $model)
 */
class AssociateFileWithModelAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(string $image_64, string $prefix = '')
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(string $image_64, string $prefix = '')
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(string $image_64, string $prefix = '')
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, string $image_64, string $prefix = '')
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, string $image_64, string $prefix = '')
 * @method static dispatchSync(string $image_64, string $prefix = '')
 * @method static dispatchNow(string $image_64, string $prefix = '')
 * @method static dispatchAfterResponse(string $image_64, string $prefix = '')
 * @method static string run(string $image_64, string $prefix = '')
 */
class FileSaverAction
{
}
namespace App\Actions\Folders;

/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\App\DTO\FolderData $data)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\App\DTO\FolderData $data)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\App\DTO\FolderData $data)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \App\DTO\FolderData $data)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \App\DTO\FolderData $data)
 * @method static dispatchSync(\App\DTO\FolderData $data)
 * @method static dispatchNow(\App\DTO\FolderData $data)
 * @method static dispatchAfterResponse(\App\DTO\FolderData $data)
 * @method static \App\Models\Folder run(\App\DTO\FolderData $data)
 */
class CreateFolderAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(int $folderId, \App\Models\User $user)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(int $folderId, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(int $folderId, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, int $folderId, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, int $folderId, \App\Models\User $user)
 * @method static dispatchSync(int $folderId, \App\Models\User $user)
 * @method static dispatchNow(int $folderId, \App\Models\User $user)
 * @method static dispatchAfterResponse(int $folderId, \App\Models\User $user)
 * @method static void run(int $folderId, \App\Models\User $user)
 */
class DeleteFolderAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\App\Models\User $user)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \App\Models\User $user)
 * @method static dispatchSync(\App\Models\User $user)
 * @method static dispatchNow(\App\Models\User $user)
 * @method static dispatchAfterResponse(\App\Models\User $user)
 * @method static \Illuminate\Database\Eloquent\Collection run(\App\Models\User $user)
 */
class GetAllFoldersAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(int $folderId, \App\Models\User $user)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(int $folderId, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(int $folderId, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, int $folderId, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, int $folderId, \App\Models\User $user)
 * @method static dispatchSync(int $folderId, \App\Models\User $user)
 * @method static dispatchNow(int $folderId, \App\Models\User $user)
 * @method static dispatchAfterResponse(int $folderId, \App\Models\User $user)
 * @method static \Illuminate\Database\Eloquent\Collection run(int $folderId, \App\Models\User $user)
 */
class GetFolderActivitiesAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(int $id, \App\Models\User $user)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(int $id, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(int $id, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, int $id, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, int $id, \App\Models\User $user)
 * @method static dispatchSync(int $id, \App\Models\User $user)
 * @method static dispatchNow(int $id, \App\Models\User $user)
 * @method static dispatchAfterResponse(int $id, \App\Models\User $user)
 * @method static \App\Models\Folder run(int $id, \App\Models\User $user)
 */
class GetFolderByIdAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(int $parent_id)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(int $parent_id)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(int $parent_id)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, int $parent_id)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, int $parent_id)
 * @method static dispatchSync(int $parent_id)
 * @method static dispatchNow(int $parent_id)
 * @method static dispatchAfterResponse(int $parent_id)
 * @method static int run(int $parent_id)
 */
class GetNewSequenceAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob()
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob()
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch()
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean)
 * @method static dispatchSync()
 * @method static dispatchNow()
 * @method static dispatchAfterResponse()
 * @method static \Illuminate\Database\Eloquent\Collection run()
 */
class GetPrivateFoldersAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\App\DTO\FolderData $folderData, \App\Models\User $user)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\App\DTO\FolderData $folderData, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\App\DTO\FolderData $folderData, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \App\DTO\FolderData $folderData, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \App\DTO\FolderData $folderData, \App\Models\User $user)
 * @method static dispatchSync(\App\DTO\FolderData $folderData, \App\Models\User $user)
 * @method static dispatchNow(\App\DTO\FolderData $folderData, \App\Models\User $user)
 * @method static dispatchAfterResponse(\App\DTO\FolderData $folderData, \App\Models\User $user)
 * @method static \App\Models\Folder run(\App\DTO\FolderData $folderData, \App\Models\User $user)
 */
class UpdateFolderAction
{
}
namespace App\Actions\Groups;

/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\App\DTO\GroupData $data)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\App\DTO\GroupData $data)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\App\DTO\GroupData $data)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \App\DTO\GroupData $data)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \App\DTO\GroupData $data)
 * @method static dispatchSync(\App\DTO\GroupData $data)
 * @method static dispatchNow(\App\DTO\GroupData $data)
 * @method static dispatchAfterResponse(\App\DTO\GroupData $data)
 * @method static \App\Models\Group run(\App\DTO\GroupData $data)
 */
class CreateGroupAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob()
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob()
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch()
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean)
 * @method static dispatchSync()
 * @method static dispatchNow()
 * @method static dispatchAfterResponse()
 * @method static \Illuminate\Pagination\LengthAwarePaginator run()
 */
class GetAllGroupsAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(int $id)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(int $id)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(int $id)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, int $id)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, int $id)
 * @method static dispatchSync(int $id)
 * @method static dispatchNow(int $id)
 * @method static dispatchAfterResponse(int $id)
 * @method static \App\Models\Group run(int $id)
 */
class GetGroupByIdAction
{
}
namespace App\Actions\Users;

/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\App\Models\User $user)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \App\Models\User $user)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \App\Models\User $user)
 * @method static dispatchSync(\App\Models\User $user)
 * @method static dispatchNow(\App\Models\User $user)
 * @method static dispatchAfterResponse(\App\Models\User $user)
 * @method static void run(\App\Models\User $user)
 */
class LogoutUserAction
{
}
/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(\App\DTO\UserData $data)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(\App\DTO\UserData $data)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(\App\DTO\UserData $data)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, \App\DTO\UserData $data)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, \App\DTO\UserData $data)
 * @method static dispatchSync(\App\DTO\UserData $data)
 * @method static dispatchNow(\App\DTO\UserData $data)
 * @method static dispatchAfterResponse(\App\DTO\UserData $data)
 * @method static \App\Models\User run(\App\DTO\UserData $data)
 */
class UpdateUserAction
{
}
namespace Lorisleiva\Actions\Concerns;

/**
 * @method void asController()
 */
trait AsController
{
}
/**
 * @method void asListener()
 */
trait AsListener
{
}
/**
 * @method void asJob()
 */
trait AsJob
{
}
/**
 * @method void asCommand(\Illuminate\Console\Command $command)
 */
trait AsCommand
{
}