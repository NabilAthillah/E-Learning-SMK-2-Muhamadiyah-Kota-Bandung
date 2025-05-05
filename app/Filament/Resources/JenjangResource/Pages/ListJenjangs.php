<?php

namespace App\Filament\Resources\JenjangResource\Pages;

use App\Filament\Resources\JenjangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenjangs extends ListRecords
{
    protected static string $resource = JenjangResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()->hasPermissionTo('view all jenjang');
    }

    protected function getHeaderActions(): array
    {
        if (auth()->user()->hasPermissionTo('create jenjang')) {
            return [
                Actions\CreateAction::make(),
            ];
        } else {
            return [];
        }
    }
}
