@extends('layouts.master')
@section('content')
    <div class="flex flex-col items-center justify-center gap-5 px-6 md:px-24 py-6">
        <h1 class="font-bold text-3xl text-[#041D4D]">Kursus / Mata Pelajaran</h1>
    </div>
    <div>
        <div class="flex flex-col gap-6 px-6 md:px-8 lg:grid lg:grid-cols-3 lg:gap-6">
            @forelse ($mataPelajaran as $matpel)
                <div class="flex flex-col py-12">
                    <div class="flex flex-wrap gap-6 md:gap-12 px-6 md:px-8">
                        <div class="items-start justify-start">
                            <div
                                class="relative w-[300px] md:w-[350px] h-[215px] md:h-[250px] rounded-xl overflow-hidden shadow-lg">
                                <img src="https://picsum.photos/350/250" alt="Matematika" class="w-full h-full object-cover">

                                @foreach ($kelas as $k)
                                    <div
                                        class="absolute top-3 left-3 bg-[#041D4D] text-white text-sm font-semibold rounded-full px-4 py-1 shadow">
                                        {{ $k->tingkat ?? 'Kelas Tidak Diketahui' }} {{ $k->nama ?? '' }}
                                    </div>
                                @endforeach

                                <div
                                    class="absolute bottom-0 left-0 w-full bg-[#041D4D] text-white text-center py-3 text-base font-medium">
                                    {{ $matpel->nama }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500 py-12 text-lg font-semibold">
                    Tidak ada mata pelajaran tersedia.
                </div>
            @endforelse
    </div>
@endsection
