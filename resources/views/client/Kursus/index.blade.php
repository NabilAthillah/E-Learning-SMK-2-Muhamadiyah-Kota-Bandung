@extends('layouts.master')
@section('content')
    <div class="flex flex-col items-center justify-center gap-5 px-6 md:px-24 py-6">
        <h1 class="font-bold text-3xl text-[#041D4D]">Kursus / Mata Pelajaran</h1>
    </div>
    <div>
        <div class="font-semibold text-lg px-6 md:px-8 mb-4 text-[#041D4D]">
            Kursus / Mata Pelajaran Baru Dibuka
        </div>

        <div class="flex flex-wrap gap-6 md:gap-12 bg-[#F7F7F7] p-2 px-6 md:px-8 ">
            <div class="items-start justify-start">
                <div class="relative w-[300px] md:w-[350px] h-[215px] md:h-[250px] rounded-xl overflow-hidden shadow-lg">
                    <img src="https://picsum.photos/350/250" alt="Matematika" class="w-full h-full object-cover">

                    <div
                        class="absolute top-3 left-3 bg-[#041D4D] text-white text-sm font-semibold rounded-full px-4 py-1 shadow">
                        Kelas 10
                    </div>

                    <div
                        class="absolute bottom-0 left-0 w-full bg-[#041D4D] text-white text-center py-3 text-base font-medium">
                        Matematika
                    </div>
                </div>
            </div>
        </div>

        {{-- Mata Pelajaran Sedang Diambil --}}
        <div class="flex flex-col bg-[#F7F7F7] py-12">
            <div class="font-semibold text-lg px-6 md:px-8 mb-4 text-[#041D4D]">
                Mata Pelajaran Sedang Diambil
            </div>

            <div class="flex flex-wrap gap-6 md:gap-12 p-2 px-6 md:px-8 ">
                <div class="items-start justify-start">
                    <div class="relative w-[300px] md:w-[350px] h-[215px] md:h-[250px] rounded-xl overflow-hidden shadow-lg">
                        <img src="https://picsum.photos/350/250" alt="Matematika" class="w-full h-full object-cover">

                        <div
                            class="absolute top-3 left-3 bg-[#041D4D] text-white text-sm font-semibold rounded-full px-4 py-1 shadow">
                            Kelas 10
                        </div>

                        <div
                            class="absolute bottom-0 left-0 w-full bg-[#041D4D] text-white text-center py-3 text-base font-medium">
                            Matematika
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
