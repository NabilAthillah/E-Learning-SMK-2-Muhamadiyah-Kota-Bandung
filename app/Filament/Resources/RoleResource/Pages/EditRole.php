<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        if (auth()->user()->hasPermissionTo('delete role')) {
            return [
                Actions\DeleteAction::make(),
            ];
        } else {
            return [];
        }
    }
}
