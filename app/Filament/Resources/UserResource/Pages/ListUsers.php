<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()->hasPermissionTo('view all user');
    }

    protected function getHeaderActions(): array
    {
        if (auth()->user()->hasPermissionTo('create user')) {
            return [
                Actions\CreateAction::make(),
            ];
        } else {
            return [];
        }
    }
}
