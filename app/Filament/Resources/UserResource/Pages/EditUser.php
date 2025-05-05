<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        if (auth()->user()->hasPermissionTo('delete user')) {
            return [
                Actions\DeleteAction::make(),
            ];
        } else {
            return [];
        }
    }
}
