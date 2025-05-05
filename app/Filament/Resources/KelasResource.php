<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelasResource\Pages;
use App\Filament\Resources\KelasResource\RelationManagers;
use App\Filament\Resources\KelasResource\RelationManagers\MataPelajaransRelationManager;
use App\Models\Jenjang;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Kelas';

    protected static ?string $navigationGroup = 'Class Management';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasPermissionTo('view all kelas');
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasPermissionTo('view all kelas');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('jenjang_id')
                    ->label('Jenjang')
                    ->options(Jenjang::all()->pluck('nama', 'id'))
                    ->searchable(),
                Select::make('jurusan_id')
                    ->label('jurusan')
                    ->options(Jurusan::all()->pluck('nama', 'id'))
                    ->searchable(),
                TextInput::make('nama')->required(),
                Select::make('wali_kelas_id')
                    ->label('Wali Kelas')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Kelas')
                    ->formatStateUsing(function ($record) {
                        return "{$record->jenjang->nama} {$record->jurusan->nama} {$record->nama}";
                    })
                    ->searchable(),
                TextColumn::make('wali_kelas.name')->searchable()
            ])
            ->filters([
                MultiSelectFilter::make('wali_kelas_id')
                    ->label('Wali Kelas')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            MataPelajaransRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
            'view' => Pages\ViewKelas::route('/{record}/view'),
        ];
    }
}
