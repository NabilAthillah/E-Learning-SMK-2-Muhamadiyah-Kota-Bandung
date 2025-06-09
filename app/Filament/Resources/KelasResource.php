<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelasResource\Pages;
use App\Filament\Resources\KelasResource\RelationManagers;
use App\Filament\Resources\KelasResource\RelationManagers\MataPelajaranRelationManager;
use App\Filament\Resources\KelasResource\RelationManagers\MataPelajaransRelationManager;
use App\Filament\Resources\KelasResource\RelationManagers\SiswaRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\UsersRelationManager;
use App\Models\Kelas;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

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
                TextInput::make('nama')
                    ->required(),
                Select::make('tingkat')
                    ->options([
                        'X' => 'X',
                        'XI' => 'XI',
                        'XII' => 'XII',
                    ])
                    ->native(false)
                    ->required(),
                Select::make('wali_kelas_id')
                    ->label('Wali Kelas')
                    ->options(
                        User::whereHas('roles', function ($query) {
                            $query->where('name', 'wali_kelas');
                        })->pluck('nama', 'id')
                    )
                    ->native(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $user = auth()->user();

                if ($user->hasRole('wali_kelas')) {
                    $query->where('wali_kelas_id', $user->id);
                }
            })
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama')
                    ->formatStateUsing(function ($state, $record) {
                        return $record->tingkat . ' ' . $record->nama;
                    })
                    ->searchable(),
                TextColumn::make('waliKelas.nama')
                    ->label('Wali Kelas')
            ])
            ->filters([
                SelectFilter::make('tingkat')->options([
                    'X' => 'X',
                    'XI' => 'XI',
                    'XII' => 'XII',
                ])
                    ->multiple(),
                SelectFilter::make('wali_kelas')
                    ->label('Wali Kelas')
                    ->relationship('waliKelas', 'nama')
                    ->searchable()
                    ->multiple()
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
            SiswaRelationManager::class,
            MataPelajaranRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
        ];
    }
}
