<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MataPelajaranResource\Pages;
use App\Filament\Resources\MataPelajaranResource\RelationManagers;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MataPelajaranResource extends Resource
{
    protected static ?string $model = MataPelajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Mata Pelajaran';

    protected static ?string $navigationGroup = 'Class Management';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasPermissionTo('view all mata_pelajaran');
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasPermissionTo('view all mata_pelajaran');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required(),
                Group::make([
                    Select::make('hari')
                        ->options([
                            'senin' => 'Senin',
                            'selasa' => 'Selasa',
                            'rabu' => 'Rabu',
                            'kamis' => 'Kamis',
                            'jumat' => 'Jum`at',
                            'sabtu' => 'Sabtu',
                        ])
                        ->native(false)
                        ->required(),
                    TimePicker::make('jam')
                        ->seconds(false)
                        ->required(),
                    Select::make('pengajar_id')
                        ->label('Pengajar')
                        ->options(
                            User::all()->mapWithKeys(function ($pengajar) {
                                $label = $pengajar->nomor_induk
                                    ? "{$pengajar->nomor_induk} - {$pengajar->name}"
                                    : $pengajar->name;

                                return [
                                    $pengajar->id => $label,
                                ];
                            })
                        )
                        ->native(false)
                        ->required(),
                ])->columns(2),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable(),
                TextColumn::make('hari')->searchable(),
                TextColumn::make('jam')->searchable(),
                TextColumn::make('pengajar.name')->searchable(),
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
            'view' => Pages\ViewMataPelajaran::route('/{record}')
        ];
    }
}
