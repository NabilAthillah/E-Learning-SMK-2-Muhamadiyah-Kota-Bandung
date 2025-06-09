<?php

namespace App\Filament\Pages;


use App\Models\MataPelajaran;
use Auth;
use Filament\Actions\ViewAction;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;

class MataPelajaranSaya extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.mata-pelajaran-saya';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole(['siswa']);
    }

    public static function canAccess(): bool
    {
        return auth()->user()->hasRole(['siswa']);
    }

    public function table(Table $table): Table
    {

        return $table
            ->query(function () {
                $user = auth()->user();

                return MataPelajaran::whereHas('kelas', function ($query) use ($user) {
                    $query->whereIn('kelas.id', $user->kelas->pluck('id'));
                });
            })
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Mata Pelajaran')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('guru.nama')
                    ->label('Nama Guru')
                    ->sortable()
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn($record): string => ViewMataPelajaranSaya::getUrl(['record' => $record->id]))
                    ->openUrlInNewTab(false),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => self::route('/'),
            'view' => self::route('/{record}/view'),
        ];
    }

    public function getTitle(): string
    {
        $kelasList = auth()->user()->kelas
            ->map(fn($kelas) => $kelas->tingkat . ' ' . $kelas->nama)
            ->join(', ');

        return $kelasList . ' - Mata Pelajaran Saya';
    }
}
