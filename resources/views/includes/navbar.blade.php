<nav class="sticky top-0 left-0 w-full flex items-center justify-between px-10 py-3 bg-white shadow-md z-50">
    <a href="{{ route('client.home') }}" class="flex items-center gap-3">
        <img src="{{ asset('/storage/assets/img/logo.png') }}" alt="Logo SMK 2 Muhammadiyah Cibiru - Kota Bandung"
            class="w-[50px] h-[50px]">
        <h3 class="font-bold text-[18px] text-[#041D4D]">SMK Muhammadiyah 2</h3>
    </a>

    <div class="hidden md:flex items-center gap-3">
        <div class="flex items-center gap-4">
            <a href="/">Home</a>
            <a href="/kursus">Kursus</a>
            <a href="/guru">Guru</a>
        </div>
        <div class="w-[2px] h-[24px] bg-black"></div>
        @if (auth()->user())
            <div class="flex items-center gap-1">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="16" height="16" fill="url(#pattern0_3_28)" />
                    <defs>
                        <pattern id="pattern0_3_28" patternContentUnits="objectBoundingBox" width="1"
                            height="1">
                            <use xlink:href="#image0_3_28" transform="scale(0.0078125)" />
                        </pattern>
                        <image id="image0_3_28" width="128" height="128" preserveAspectRatio="none"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
                <p class="text-[14px] text-black">Halo, <strong>{{ auth()->user()?->nama }}</strong></p>
                
                <a href="/logout" class="px-5 py-1 bg-red-500 rounded ml-5 text-white hover:bg-red-600">Logout</a>
            </div>
        @else
            <a href="{{ route('filament.dashboard.auth.login') }}"
                class="font-bold text-[14px] text-white px-6 py-2 bg-[#1E1D61] border-[1px] border-[#1E1D61] rounded-[4px]">Sign
                In</a>
        @endif
    </div>

    <button id="hamburgerBtn" class="md:hidden flex flex-col gap-1.5 focus:outline-none" aria-label="Toggle menu">
        <span class="block w-6 h-[2px] bg-black"></span>
        <span class="block w-6 h-[2px] bg-black"></span>
        <span class="block w-6 h-[2px] bg-black"></span>
    </button>
</nav>

<div id="mobileMenu" class=" fixed top-18 left-0 w-full z-50 hidden md:hidden bg-white shadow-md px-6 py-4">
    <div class="flex flex-col gap-4">
        <a href="/" class="block">Home</a>
        <a href="/kursus" class="block">Kursus</a>
        <a href="/guru" class="block">Guru</a>
        <div class="border-t border-gray-300 my-2"></div>
        @if (auth()->user())
            <div class="flex items-center gap-2">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="16" height="16" fill="url(#pattern0_3_28)" />
                    <defs>
                        <pattern id="pattern0_3_28" patternContentUnits="objectBoundingBox" width="1"
                            height="1">
                            <use xlink:href="#image0_3_28" transform="scale(0.0078125)" />
                        </pattern>
                        <image id="image0_3_28" width="128" height="128" preserveAspectRatio="none"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
                <p class="text-[14px] text-black">Halo, <strong>{{ auth()->user()?->nama }}</strong></p>
            </div>
        @else
            <a href="{{ route('filament.dashboard.auth.login') }}"
                class="font-bold text-[14px] text-white px-6 py-2 bg-[#1E1D61] border-[1px] border-[#1E1D61] rounded-[4px]">Sign
                In</a>
        @endif
    </div>
</div>

<script>
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburgerBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', (event) => {
        const isClickInsideMenu = mobileMenu.contains(event.target);
        const isClickOnButton = hamburgerBtn.contains(event.target);

        if (!isClickInsideMenu && !isClickOnButton) {
            mobileMenu.classList.add('hidden');
        }
    });
</script>
