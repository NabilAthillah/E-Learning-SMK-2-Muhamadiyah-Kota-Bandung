@extends('layouts.master')
@section('content')
    <div id="default-carousel" class="relative w-full h-[calc(100vh-74px)]" data-carousel="slide">
        <div class="relative h-[calc(100vh-74px)] overflow-hidden rounded-lg">
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('/storage/assets/img/carousel_3.avif')  }}"
                    class="absolute block h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover object-center" alt="...">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('/storage/assets/img/carousel_4.png')  }}"
                    class="absolute block h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover object-center" alt="...">
            </div>
        </div>
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
        </div>
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30">
                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30">
                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <section class="flex flex-col items-center justify-center gap-5 px-[100px] py-6">
        <div class="flex items-center gap-2">
            <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect x="0.5" y="0.5" width="40" height="40" fill="url(#pattern0_7_57)" />
                <defs>
                    <pattern id="pattern0_7_57" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_7_57" transform="scale(0.0078125)" />
                    </pattern>
                    <image id="image0_7_57" width="128" height="128" preserveAspectRatio="none"
                        xlink:href="data:image/png;base64,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" />
                </defs>
            </svg>
            <h2 class="font-bold text-[36px] text-black">Apa itu E-Learning ?</h2>
        </div>
        <p class="text-[20px] text-black">E-Learning <span class="italic">(electronic learning)</span> adalah metode
            pembelajaran yang memanfaatkan teknologi digital dan internet
            untuk mengakses materi pendidikan di mana saja dan kapan saja. eLearning memungkinkan siswa dan pengajar untuk
            berinteraksi secara online melalui video, modul, kuis, forum diskusi, dan tugas digital, tanpa harus bertatap
            muka secara langsung</p>
    </section>

    <section class="flex flex-col justify-center items-center gap-5 px-[110px] py-9 bg-[#f5f5f9]">
        <div class="flex items-center gap-2">
            <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect y="0.5" width="40" height="40" fill="url(#pattern0_7_88)" />
                <defs>
                    <pattern id="pattern0_7_88" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_7_88" transform="scale(0.0078125)" />
                    </pattern>
                    <image id="image0_7_88" width="128" height="128" preserveAspectRatio="none"
                        xlink:href="data:image/png;base64,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" />
                </defs>
            </svg>
            <h2 class="font-bold text-[36px] text-black">Fitur E-Learning</h2>
        </div>
        <div class="grid grid-cols-3 gap-auto justify-between w-full">
            <div
                class="flex flex-col items-center justify-self-center gap-3 p-6 bg-white shadow-md w-[300px] rounded-[8px]">
                <img src="{{ asset('/storage/assets/img/fitur_1.png') }}" alt="" class="w-[150px] h-[150px]">
                <div class="flex flex-col gap-2">
                    <h6 class="font-semibold text-[24px] text-[#041D4D]">E-Learning</h6>
                    <p class="font-light text-[16px] text-black">Memudahkan guru dan siswa belajar dari mana saja, kapan
                        saja, lewat internet.</p>
                </div>
            </div>
            <div
                class="flex flex-col items-center justify-self-center gap-3 p-6 bg-white shadow-md w-[300px] rounded-[8px]">
                <img src="{{ asset('/storage/assets/img/fitur_2.png') }}" alt="" class="w-[150px] h-[150px]">
                <div class="flex flex-col gap-2">
                    <h6 class="font-semibold text-[24px] text-[#041D4D]">Kursus</h6>
                    <p class="font-light text-[16px] text-black">Memudahkan guru untuk mengunggah materi pembelajaran
                        seperti video, dokumen, atau tugas. Siswa bisa langsung mengakses semua materi tersebut dengan mudah
                        dan belajar sesuai waktu mereka sendiri.</p>
                </div>
            </div>
            <div
                class="flex flex-col items-center justify-self-center gap-3 p-6 bg-white shadow-md w-[300px] rounded-[8px]">
                <img src="{{ asset('/storage/assets/img/fitur_3.png') }}" alt="" class="w-[150px] h-[150px]">
                <div class="flex flex-col gap-2">
                    <h6 class="font-semibold text-[24px] text-[#041D4D]">Aktivitas Sekolah</h6>
                    <p class="font-light text-[16px] text-black">Memudahkan siswa dan guru untuk melihat aktivitas di
                        sekolah.</p>
                </div>
            </div>
    </section>

    <section class="flex flex-col items-center p-6 bg-[#041D4D] shadow-md w-full">
        <div class="flex gap-4 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="white" class="w-[40px] h-[40px]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
            </svg>
            <h2 class="font-bold text-[36px] text-white">
                Aktifitas Terbaru
            </h2>
        </div>

        <div class="flex gap-12 pt-8">
            <div class="flex flex-col items-center justify-self-center gap-3 bg-white shadow-md w-[350px] rounded-[8px]">
                <img src="{{ asset('/storage/assets/img/aktifitas_1.jpg') }}" alt="" class="w-[350px] h-[350px] object-cover object-center rounded-[8px_8px_0px_0px]">
                <div class="flex flex-col gap-2 p-6">
                    <h6 class="font-bold text-2xl text-[#041D4D] ">Halal Bihalal</h6>
                    <p class="font-semibold text-[16px] text-[#041D4D]">Rabu, 9 April 2025</p>
                </div>
            </div>
            <div class="flex flex-col items-center justify-self-center gap-3 bg-white shadow-md w-[350px] rounded-[8px]">
                <img src="{{ asset('/storage/assets/img/aktifitas_2.jpg') }}" alt="" class="w-[350px] h-[350px] object-cover object-center rounded-[8px_8px_0px_0px]">
                <div class="flex flex-col gap-2 p-6">
                    <h6 class="font-bold text-2xl text-[#041D4D] ">Halal Bihalal</h6>
                    <p class="font-semibold text-[16px] text-[#041D4D]">Rabu, 9 April 2025</p>
                </div>
            </div>
            <div class="flex flex-col items-center justify-self-center gap-3 bg-white shadow-md w-[350px] rounded-[8px]">
                <img src="{{ asset('/storage/assets/img/aktifitas_3.jpg') }}" alt="" class="w-[350px] h-[350px] object-cover object-center rounded-[8px_8px_0px_0px]">
                <div class="flex flex-col gap-2 p-6">
                    <h6 class="font-bold text-2xl text-[#041D4D] ">Halal Bihalal</h6>
                    <p class="font-semibold text-[16px] text-[#041D4D]">Rabu, 9 April 2025</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="flex flex-col items-center justify-center gap-5 px-[100px] py-6">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[40px] h-[40px]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                  </svg>
                <h2 class="font-bold text-[36px] text-[#041D4D]">Kursus / Mata Pelajaran</h2>
            </div>
            <div class="flex gap-12">
                <div class="flex flex-col items-center justify-self-center gap-3 bg-white shadow-md w-[350px]  h-[300px] rounded-[8px]">
                    <img src="{{ asset('/storage/assets/img/aktifitas_1.jpg') }}" alt="" class="w-[350px] h-[250px] object-cover object-center rounded-[8px_8px_0px_0px]">
                    <div class="flex flex-col gap-2">
                        <h6 class="font-bold text-2xl text-[#041D4D] ">Matematika</h6>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-self-center gap-3 bg-white shadow-md w-[350px]  h-[300px] rounded-[8px]">
                    <img src="{{ asset('/storage/assets/img/aktifitas_2.jpg') }}" alt="" class="w-[350px] h-[250px] object-cover object-center rounded-[8px_8px_0px_0px]">
                    <div class="flex flex-col gap-2">
                        <h6 class="font-bold text-2xl text-[#041D4D]">Matematika</h6>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-self-center gap-3 bg-white shadow-md w-[350px]  h-[300px] rounded-[8px]">
                    <img src="{{ asset('/storage/assets/img/aktifitas_3.jpg') }}" alt="" class="w-[350px] h-[250px] object-cover object-center rounded-[8px_8px_0px_0px]">
                    <div class="flex flex-col gap-2">
                        <h6 class="font-bold text-2xl text-[#041D4D] ">Matematika</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
