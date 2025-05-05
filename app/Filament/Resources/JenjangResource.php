<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenjangResource\Pages;
use App\Filament\Resources\JenjangResource\RelationManagers;
use App\Models\Jenjang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenjangResource extends Resource
{
    protected static ?string $model = Jenjang::class;

    protected static ?string $navigationIcon = 'heroicon-s-chart-bar';

    protected static ?string $navigationLabel = 'Jenjang';

    protected static ?string $navigationGroup = 'Class Management';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasPermissionTo('view all jenjang');
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasPermissionTo('view all jenjang');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJenjangs::route('/'),
            'create' => Pages\CreateJenjang::route('/create'),
            'edit' => Pages\EditJenjang::route('/{record}/edit'),
        ];
    }
}
