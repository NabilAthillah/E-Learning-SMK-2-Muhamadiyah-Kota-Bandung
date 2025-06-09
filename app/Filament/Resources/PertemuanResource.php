<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelasResource\RelationManagers\SiswaRelationManager;
use App\Filament\Resources\PertemuanResource\Pages;
use App\Filament\Resources\PertemuanResource\RelationManagers;
use App\Filament\Resources\PertemuanResource\RelationManagers\TugasSiswaRelationManager;
use App\Models\Pertemuan;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PertemuanResource extends Resource
{
    protected static ?string $model = Pertemuan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $label = 'Pertemuan';
    protected static ?string $navigationLabel = 'Pertemuan';
    protected static ?string $modelLabel = 'Pertemuan';
    protected static ?string $pluralModelLabel = 'Pertemuan';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('tanggal')->native(false)->required(),
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\TextArea::make('description')
                    ->required(),
                SpatieMediaLibraryFileUpload::make('attachment')
                    ->collection('file_pertemuan')
                    ->multiple()
                    ->maxSize(10240)
                    ->preserveFilenames()
                    ->downloadable(),
            ])->columns(1)
        ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            TugasSiswaRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPertemuans::route('/'),
            'create' => Pages\CreatePertemuan::route('/create'),
            'edit' => Pages\EditPertemuan::route('/{record}/edit'),
            'view' => Pages\ViewPertemuan::route('/{record}/view'),
        ];
    }
}
