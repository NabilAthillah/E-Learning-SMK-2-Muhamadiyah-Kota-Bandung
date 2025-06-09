<?php

namespace App\Filament\Pages;

use App\Models\Pertemuan;
use App\Models\TugasSiswa;
use Auth;
use Carbon\Carbon;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class PertemuanPage extends Page implements HasForms
{
    use InteractsWithForms;

    public Pertemuan|null $record = null;

    public string $kelas = '';
    public string $mata_pelajaran = '';
    public ?string $judul = null;
    public ?string $description = null;

    public $attachment = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.pertemuan-page';

    protected static bool $shouldRegisterNavigation = false;

    public static function canAccess(): bool
    {
        return auth()->user()->hasRole(['superadmin', 'siswa']);
    }

    public function mount(): void
    {
        $recordId = request()->query('record');

        $pertemuan = Pertemuan::with('pengajaran', 'pengajaran.mata_pelajaran', 'pengajaran.kelas')->find($recordId);
        // dd($pertemuan);
        if (!$pertemuan) {
            abort(404);
        }

        $this->record = $pertemuan;

        $this->kelas = $pertemuan->pengajaran->kelas->tingkat . ' ' . $pertemuan->pengajaran->kelas->nama;
        $this->mata_pelajaran = $pertemuan->pengajaran->mata_pelajaran->nama;
        $this->judul = $pertemuan->title;
        $this->description = $pertemuan->description;
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('judul')->label('Judul Pertemuan')->disabled(),
            Textarea::make('description')->label('Deskripsi')->disabled()->rows(5),
            SpatieMediaLibraryFileUpload::make('attachment')
                ->label('Upload Tugas')
                ->collection('tugas_siswa_temp')
                ->multiple()
                ->preserveFilenames()
                ->maxSize(10240)
                ->default(fn() => $this->getTugas())
                ->dehydrated(false),
        ];
    }

    public function submit()
    {
        if (!empty($this->attachment)) {
            $tugas = TugasSiswa::create([
                'pertemuan_id' => $this->record->id,
                'siswa_id' => Auth::id(),
                'komentar' => '',
                'nilai' => 100,
                'feedback' => '',
                'submitted_at' => Carbon::now(),
            ]);

            foreach ($this->attachment as $uploadedFile) {
                $tugas->addMedia($uploadedFile->getRealPath())
                    ->usingFileName($uploadedFile->getClientOriginalName())
                    ->toMediaCollection('tugas_siswa_temp');
            }

            $this->attachment = [];
            $this->form->fill();

            Notification::make()
                ->title('Saved successfully')
                ->success()
                ->send();
        } else {
            Notification::make()
                ->title('Tidak ada file yang diupload')
                ->error()
                ->send();
        }
    }

    public function getAttachments()
    {
        return $this->record?->getMedia('file_pertemuan') ?? collect();
    }

    public function getTugas()
    {
        $tugas = TugasSiswa::where([
            ['pertemuan_id', '=', $this->record->id],
            ['siswa_id', '=', auth()->id()],
        ])->orderBy('created_at', 'desc')->first();

        return $tugas?->getMedia('tugas_siswa_temp') ?? collect();
    }

    public function getTitle(): string
    {
        return $this->record->pengajaran->kelas->tingkat . ' ' . $this->record->pengajaran->kelas->nama . ' > ' . $this->record->pengajaran->mata_pelajaran->nama;
    }
}
