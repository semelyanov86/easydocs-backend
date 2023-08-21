<?php

declare(strict_types=1);

namespace App\Filament\Resources\GroupResource\Pages;

use App\Filament\Resources\GroupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListGroups extends ListRecords
{
    protected static string $resource = GroupResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
