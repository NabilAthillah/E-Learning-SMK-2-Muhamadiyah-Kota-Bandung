<?php

namespace App\Filament\Resources\KelasResource\RelationManagers;

use App\Models\Kelas;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MataPelajaransRelationManager extends RelationManager
{
    protected static string $relationship = 'mata_pelajarans';

    protected static ?string $label = 'Mata Pelajaran';

    public function form(Form $form): Form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('hari'),
                Tables\Columns\TextColumn::make('jam'),
                Tables\Columns\TextColumn::make('pengajar.name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()->multiple(),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                    ->url(fn($record) => route('filament.admin.resources.mata-pelajarans.view', ['record' => $record]))
                    ->openUrlInNewTab(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }
}
