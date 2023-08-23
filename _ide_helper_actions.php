<?php

namespace App\Actions\Files;

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