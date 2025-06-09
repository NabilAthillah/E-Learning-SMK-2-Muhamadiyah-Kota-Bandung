@extends('layouts.master')
@section('content')
<section class="relative w-full min-h-screen">
    {{-- Gambar utama --}}
    <div class="relative h-[60vh] md:h-[75vh] rounded-lg">
        <div>
            <img src="{{ asset('/storage/assets/img/carousel_4.png')  }}"
                class="absolute block h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover object-center" alt="...">
        </div>
    </div>

    {{-- Deskripsi --}}
    <div class="px-4 sm:px-6 md:px-[80px] lg:px-[150px] py-8">
        <h2 class="font-bold text-[28px] md:text-[36px] text-black py-6">Halal Bihalal</h2>
        <p class="text-[16px] md:text-[20px] text-black py-6">
            Halal bihalal di sekolah adalah sebuah tradisi berkumpul dan bersilaturahmi yang biasanya dilaksanakan setelah momen Idul Fitri. Acara ini bertujuan untuk mempererat hubungan antar siswa, guru, dan staf sekolah dengan saling memaafkan atas kesalahan yang terjadi selama masa belajar dan beraktivitas bersama.
            Dalam halal bihalal sekolah, biasanya diadakan kegiatan seperti doa bersama, sambutan dari kepala sekolah, dan sesi saling berjabat tangan sambil mengucapkan permohonan maaf dan saling mendoakan kebaikan. Acara ini juga menjadi kesempatan untuk menumbuhkan rasa kekeluargaan dan semangat kebersamaan di lingkungan sekolah.
            Halal bihalal di sekolah bukan hanya sekadar tradisi, tetapi juga merupakan momen penting untuk membangun suasana positif, meningkatkan toleransi, dan menanamkan nilai-nilai kebersamaan serta saling menghargai antar seluruh warga sekolah.
        </p>
    </div>

    {{-- Galeri Foto --}}
    <div class="flex flex-col md:flex-row flex-wrap justify-center bg-[#041D4D] gap-6 py-8 px-4">
        <div class="flex flex-col items-center bg-white shadow-md w-full md:w-[350px] rounded-[8px]">
            <img src="{{ asset('/storage/assets/img/aktifitas_1.jpg') }}" alt=""
                class="w-full h-[250px] md:h-[350px] object-cover object-center">
        </div>
        <div class="flex flex-col items-center bg-white shadow-md w-full md:w-[350px] rounded-[8px]">
            <img src="{{ asset('/storage/assets/img/aktifitas_2.jpg') }}" alt=""
                class="w-full h-[250px] md:h-[350px] object-cover object-center">
        </div>
        <div class="flex flex-col items-center bg-white shadow-md w-full md:w-[350px] rounded-[8px]">
            <img src="{{ asset('/storage/assets/img/aktifitas_3.jpg') }}" alt=""
                class="w-full h-[250px] md:h-[350px] object-cover object-center">
        </div>
    </div>
</section>
@endsection
