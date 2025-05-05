<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRole extends ViewRecord
{
    protected static string $resource = RoleResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()->hasPermissionTo('view role');
    }
}
