<?php

namespace App\Filament\Resources\JenjangResource\Pages;

use App\Filament\Resources\JenjangResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJenjang extends CreateRecord
{
    protected static string $resource = JenjangResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()->hasPermissionTo('create jenjang');
    }
}
