@php
    $mediaItems = $this->record->getMedia('file_pertemuan');
@endphp

@if($mediaItems->isNotEmpty())
    <ul>
        @foreach($mediaItems as $media)
            <li>
                <a href="{{ $media->getUrl() }}" target="_blank" download>
                    {{ $media->file_name }}
                </a>
            </li>
        @endforeach
    </ul>
@else
    <p>Tidak ada file.</p>
@endif