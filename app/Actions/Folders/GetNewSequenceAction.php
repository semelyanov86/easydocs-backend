<?php

declare(strict_types=1);

namespace App\Actions\Folders;

use App\Models\Folder;
use Lorisleiva\Actions\Action;

final class GetNewSequenceAction extends Action
{
    public function handle(int $parent_id): int
    {
        $folder = Folder::where('parent_id', $parent_id)->first();
        if (! $folder) {
            return 1;
        }

        return $folder->sequence + 1;
    }
}
