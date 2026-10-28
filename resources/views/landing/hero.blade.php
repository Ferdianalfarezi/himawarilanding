<section id="home" class="relative overflow-hidden bg-cream pt-32 pb-28 lg:min-h-screen lg:pt-40 lg:pb-40">
    {{-- Ornamen latar: tiap lapis bergerak dengan kecepatan berbeda saat scroll --}}
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute -top-24 -right-24 w-80 opacity-90 sm:w-[28rem]" data-speed="-0.25">
            <div data-mouse="20"><x-deco.sun class="w-full animate-spin-slow" /></div>
        </div>

        <div class="absolute top-36 left-[8%] w-40 opacity-80" data-speed-x="-0.35" data-speed="0.1">
            <x-deco.cloud class="w-full" />
        </div>
        <div class="absolute top-[60%] right-[38%] hidden w-28 opacity-70 lg:block" data-speed-x="0.3">
            <x-deco.cloud class="w-full" />
        </div>

        <div class="absolute bottom-24 -left-8 w-32 sm:w-44" data-speed="0.35" data-rotate="0.04">
            <div data-mouse="-30"><x-deco.leaf class="w-full animate-wiggle" /></div>
        </div>
        <div class="absolute top-28 left-[46%] hidden w-14 lg:block" data-speed="0.5">
            <div data-mouse="40"><x-deco.leaf color="#FAA51A" class="w-full animate-float" /></div>
        </div>
        <div class="absolute bottom-40 left-[40%] w-8" data-speed="-0.4">
            <x-deco.heart class="w-full animate-float-slow" />
        </div>
        <div class="absolute top-1/2 left-[4%] w-6" data-speed="0.6">
            <x-deco.heart color="#8CC643" class="w-full animate-float" />
        </div>

        {{-- titik-titik --}}
        <div class="absolute top-44 right-[10%] hidden grid-cols-6 gap-3 opacity-40 sm:grid" data-speed="0.2">
            @foreach (range(1, 24) as $dot)
                <span class="size-1.5 rounded-full bg-leaf"></span>
            @endforeach
        </div>
    </div>

    <div class="container-x relative grid items-center gap-14 lg:grid-cols-2">
        <div class="relative z-10">
            <span class="eyebrow" data-reveal="down">
                <x-deco.heart class="size-4" color="#FAA51A" /> Islamic Montessori Preschool
            </span>

            <h1 class="mt-6 text-5xl text-leaf sm:text-6xl lg:text-7xl" data-reveal="up" data-delay="100">
                A lifetime of
                <span class="relative inline-block text-sun">
                    confidence
                    <svg class="draw-line absolute -bottom-3 left-0 w-full" viewBox="0 0 300 20" fill="none" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M3 14 C 60 2, 120 2, 160 10 S 260 18, 297 6" stroke="#8CC643" stroke-width="6" stroke-linecap="round" />
                    </svg>
                </span>
                starts here
            </h1>

            <p class="mt-8 max-w-xl text-lg leading-relaxed text-ink/80 sm:text-xl" data-reveal="up" data-delay="250">
                <strong class="text-ink">Fun, Friends, Learning.</strong>
                {{ __('Preschool berbasis Islamic Montessori di bawah supervisi psikolog — tempat si kecil tumbuh ceria, mandiri, dan percaya diri.') }}
            </p>

            <div class="mt-10 flex flex-wrap items-center gap-4" data-reveal="up" data-delay="400">
                <a href="#about" class="btn-sun px-8 py-4 text-lg">
                    Learn why <x-icon name="arrow-right" class="size-5" />
                </a>
            </div>
        </div>

        {{-- Foto utama dengan bentuk blob --}}
        <div class="relative mx-auto w-full max-w-lg">
            <div data-speed="0.08">
                <div class="relative" data-reveal="zoom" data-delay="200">
                    <div class="blob absolute -inset-4 rotate-6 bg-sun-light/60"></div>
                    <div class="blob-2 absolute -inset-2 -rotate-3 bg-leaf/70"></div>
                    <img src="{{ asset('images/toddler.jpg') }}" alt="{{ __('Anak-anak bermain dan belajar di Himawari') }}"
                         class="blob relative aspect-square w-full object-cover shadow-2xl" fetchpriority="high">
                </div>
            </div>
        </div>
    </div>

    <x-deco.wave class="absolute inset-x-0 -bottom-px h-16 w-full sm:h-24" />
</section>
