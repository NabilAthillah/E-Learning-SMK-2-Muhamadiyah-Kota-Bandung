<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use App\Filament\Resources\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPermissions extends ListRecords
{
    protected static string $resource = PermissionResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()->hasPermissionTo('view all permission');
    }

    protected function getHeaderActions(): array
    {
        if (auth()->user()->hasPermissionTo('create permission')) {
            return [
                Actions\CreateAction::make(),
            ];
        } else {
            return [];
        }
    }
}
