<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MataPelajaranResource\Pages;
use App\Filament\Resources\MataPelajaranResource\RelationManagers;
use App\Filament\Resources\MataPelajaranResource\RelationManagers\KelasRelationManager;
use App\Models\MataPelajaran;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MataPelajaranResource extends Resource
{
    protected static ?string $model = MataPelajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $label = 'Mata Pelajaran';
    protected static ?string $navigationLabel = 'Mata Pelajaran';
    protected static ?string $modelLabel = 'Mata Pelajaran';
    protected static ?string $pluralModelLabel = 'Mata Pelajaran';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole(['superadmin', 'wali_kelas']);
    }

    public static function canAccess(): bool
    {
        return auth()->user()->hasRole(['superadmin', 'wali_kelas']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required(),
                Select::make('pengajar')
                    ->options(User::role('guru')->get()->pluck('nama', 'id'))
                    ->native(false)
                    ->required()
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable(),
                TextColumn::make('guru.nama')->searchable(),
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
            'index' => Pages\ListMataPelajarans::route('/'),
            'create' => Pages\CreateMataPelajaran::route('/create'),
            'edit' => Pages\EditMataPelajaran::route('/{record}/edit'),
        ];
    }
}
