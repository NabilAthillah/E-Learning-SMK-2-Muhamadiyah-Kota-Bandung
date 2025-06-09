<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LearningResource\Pages;
use App\Filament\Resources\LearningResource\RelationManagers;
use App\Filament\Resources\LearningResource\RelationManagers\PertemuansRelationManager;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Pengajaran;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LearningResource extends Resource
{
    protected static ?string $model = Pengajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $label = 'Learning';
    protected static ?string $navigationLabel = 'Learning';
    protected static ?string $modelLabel = 'Learning';
    protected static ?string $pluralModelLabel = 'Learning';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole(['superadmin', 'guru']);
    }

    public static function canAccess(): bool
    {
        return auth()->user()->hasRole(['superadmin', 'guru']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('mapel_id')
                    ->label('Mata Pelajaran')
                    ->options(MataPelajaran::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->native(false)
                    ->required(),
                Select::make('kelas_id')
                    ->label('Kelas')
                    ->options(Kelas::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->native(false)
                    ->required()
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('mata_pelajaran.guru', function ($query) {
                $query->where('id', auth()->id());
            });
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kelas')
                    ->label('Kelas')
                    ->formatStateUsing(function ($state, $record) {
                        return $record->kelas->tingkat . ' ' . $record->kelas->nama;
                    })
                    ->searchable(),
                TextColumn::make('mata_pelajaran.nama')
                    ->searchable(),
                TextColumn::make('mata_pelajaran.guru.nama')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PertemuansRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLearnings::route('/'),
            'create' => Pages\CreateLearning::route('/create'),
            'edit' => Pages\EditLearning::route('/{record}/edit'),
        ];
    }
}
