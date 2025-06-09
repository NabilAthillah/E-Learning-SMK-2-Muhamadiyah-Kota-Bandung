<?php

namespace App\Filament\Pages;

use App\Models\MataPelajaran;
use App\Models\Pertemuan;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables;

class ViewMataPelajaranSaya extends Page implements HasTable
{
    use InteractsWithTable;

    public MataPelajaran|null $record = null;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.view-mata-pelajaran-saya';

    public static function canAccess(): bool
    {
        return auth()->user()->hasRole(['siswa']);
    }

    public function mount(): void
    {
        $recordId = request()->query('record');

        $mataPelajaran = MataPelajaran::with('pengajaran')->find($recordId);

        if (!$mataPelajaran) {
            abort(404);
        }

        $this->record = $mataPelajaran;
    }

    public function getTitle(): string
    {
        return $this->record->pengajaran->first()->kelas->tingkat . ' ' . $this->record->pengajaran->first()->kelas->nama . ' - ' . $this->record->nama;
    }

    public function table(Table $table): Table
    {
        $pengajaranIds = $this->record->pengajaran->pluck('id');

        return $table
            ->query(
                fn() => Pertemuan::query()
                    ->whereIn('pengajaran_id', $pengajaranIds)
            )
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->sortable()
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn($record): string => PertemuanPage::getUrl(['record' => $record->id]))
                    ->openUrlInNewTab(false),
            ]);
    }
}
