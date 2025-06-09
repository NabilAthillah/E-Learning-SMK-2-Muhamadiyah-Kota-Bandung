<?php

namespace App\Filament\Resources\LearningResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PertemuansRelationManager extends RelationManager
{
    protected static string $relationship = 'pertemuans';

    public function form(Form $form): Form
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
                    ->preserveFilenames(),
            ])->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn($record) => route('filament.dashboard.resources.pertemuans.view', ['record' => $record->id]))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make()
                ->url(fn($record) => route('filament.dashboard.resources.pertemuans.edit', ['record' => $record->id])),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
