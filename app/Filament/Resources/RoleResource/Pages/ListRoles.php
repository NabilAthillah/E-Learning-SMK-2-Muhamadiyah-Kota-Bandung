<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()->hasPermissionTo('view all role');
    }

    protected function getHeaderActions(): array
    {
        if (auth()->user()->hasPermissionTo('create role')) {
            return [
                Actions\CreateAction::make(),
            ];
        } else {
            return [];
        }
    }
}
