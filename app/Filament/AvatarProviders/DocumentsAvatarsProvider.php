<?php

declare(strict_types=1);

namespace App\Filament\AvatarProviders;

use Filament\AvatarProviders\Contracts\AvatarProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

final class DocumentsAvatarsProvider implements AvatarProvider
{
    public function get(Model|Authenticatable $record): string
    {
        return '/storage/'.$record->getAttributeValue('avatar');
    }
}
