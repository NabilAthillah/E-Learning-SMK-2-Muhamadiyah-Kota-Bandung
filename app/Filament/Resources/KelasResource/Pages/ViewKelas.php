<?php

namespace App\Filament\Resources\KelasResource\Pages;

use App\Filament\Resources\KelasResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKelas extends ViewRecord
{
    protected static string $resource = KelasResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()->hasPermissionTo('view all kelas');
    }

    protected function getHeaderActions(): array
    {
        if (auth()->user()->hasPermissionTo('create kelas')) {
            return [
                Actions\CreateAction::make(),
            ];
        } else {
            return [];
        }
    }
}
