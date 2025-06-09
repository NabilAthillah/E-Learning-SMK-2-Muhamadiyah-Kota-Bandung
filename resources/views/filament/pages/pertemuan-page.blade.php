<x-filament-panels::page heading="{{ $this->getTitle() }}">
    <div class="grid-cols-1 md:grid-cols-2" style="display: grid; gap: 40px;">
        <form wire:submit.prevent="submit">
            {{ $this->form->model($this->record) }}

            <div class="mt-4" style="margin-top: 16px;">
                <x-filament::button type="submit" color="primary">
                    Kirim Tugas
                </x-filament::button>
            </div>
            <div class="mt-4" style="margin-top: 16px;">
                @if ($tugas = $this->getTugas())
                    <div class="mt-4 space-y-2">
                        <h3 class="text-lg font-semibold">File yang sudah diupload:</h3>
                        <div style="display: flex; flex-direction: column; gap: 4px;">
                            @foreach ($tugas as $file)
                                <a href="{{ $file->getUrl() }}" target="_blank" class="text-blue-500 underline">
                                    {{ $file->file_name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </form>


        @if ($attachments = $this->getAttachments())
            @if ($attachments->count() > 0)
                <div class="mt-6" style="height: 100%; background-color: white; border-radius: 12px; padding: 24px;">
                    <h3 class="text-lg font-semibold mb-2">Lampiran:</h3>
                    <ul class="list-disc list-inside" style="display: flex; flex-direction: column; gap: 8px; flex-wrap: wrap;">
                        @foreach ($attachments as $attachment)
                            <li>
                                <a href="{{ $attachment->getUrl() }}" target="_blank" class="text-primary-600 hover:underline"
                                    style="word-break: break-all;">
                                    {{ $attachment->file_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif
    </div>
</x-filament-panels::page>