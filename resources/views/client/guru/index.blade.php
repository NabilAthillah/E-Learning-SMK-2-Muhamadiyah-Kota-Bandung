@extends('layouts.master')
@section('content')
<section>
    <div class="px-[100px] py-6">
        <!-- Header -->
        <div class="flex items-center justify-center gap-2 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-[40px] h-[40px]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
            </svg>
            <h2 class="font-bold text-[20px] md:text-[36px] text-[#041D4D]">Staf Pengajar</h2>
        </div>

        <!-- Grid isi guru -->
        <div class="flex flex-wrap gap-6 justify-center">
            @foreach ($guru as $walkel)
                <div class="w-full sm:w-1/3 md:w-1/4">
                    <div class="flex flex-col items-center gap-3 bg-white shadow-md h-[300px] rounded-[8px] overflow-hidden">
                        <img src="{{ asset('/assets/profile.jpg') }}" alt=""
                            class="w-full h-[250px] object-cover object-center">
                        <div class="flex flex-col gap-1">
                            <h6 class="font-bold text-[16px] md:text-2xl text-[#041D4D]">{{ $walkel->nama ?? 'Tidak ada nama' }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
