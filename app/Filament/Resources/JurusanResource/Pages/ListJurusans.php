<?php

namespace App\Filament\Resources\JurusanResource\Pages;

use App\Filament\Resources\JurusanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJurusans extends ListRecords
{
    protected static string $resource = JurusanResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()->hasPermissionTo('view all jurusan');
    }

    protected function getHeaderActions(): array
    {
        if (auth()->user()->hasPermissionTo('create jurusan')) {
            return [
                Actions\CreateAction::make(),
            ];
        } else {
            return [];
        }
    }
}
