@php
    $slides = [
        ['image' => 'images/ruangkelas-web.jpg', 'title' => 'Ruang Kelas', 'text' => 'Rak dan material belajar yang mudah dijangkau anak.'],
        ['image' => 'images/area-bermain-web.jpg', 'title' => 'Ruang bermain', 'text' => 'Area luas untuk bergerak, bermain, dan bereksplorasi.'],
        ['image' => 'images/area-membaca-web.jpg', 'title' => 'Area Membaca', 'text' => 'Suasana hangat yang membuat si kecil betah.'],
    ];
@endphp

{{-- Section ini "menempel" dan galeri bergeser ke samping selama di-scroll --}}
<section id="facilities" class="relative h-[300vh] bg-cream" data-hscroll>
    <div class="sticky top-0 flex h-screen flex-col justify-center overflow-hidden">
        <div class="pointer-events-none absolute -top-10 right-10 hidden w-52 opacity-70 sm:block" aria-hidden="true" data-rotate="0.08">
            <x-deco.sun class="w-full" />
        </div>

        <div class="container-x relative mb-10 flex flex-wrap items-end justify-between gap-6">
            <div class="max-w-xl">
                <span class="eyebrow" data-reveal="up">Facilities</span>
                <h2 class="mt-5 text-4xl text-leaf sm:text-5xl" data-reveal="up" data-delay="100">
                    {{ __('Ruang yang dirancang untuk') }} <span class="text-sun">{{ __('penjelajah kecil') }}</span>
                </h2>
            </div>
            <div class="h-2 w-48 overflow-hidden rounded-full bg-cream-dark" data-reveal="left">
                <div class="h-full origin-left scale-x-0 rounded-full bg-sun" data-hscroll-bar></div>
            </div>
        </div>

        <div class="overflow-visible pl-4 sm:pl-6 lg:pl-[max(2rem,calc((100vw-80rem)/2+2rem))]">
            <div class="flex w-max gap-6 will-change-transform" data-hscroll-track>
                @foreach ($slides as $slide)
                    <figure class="group relative h-[55vh] w-[80vw] shrink-0 overflow-hidden rounded-[2.5rem] shadow-xl sm:w-[60vw] lg:w-[42vw]">
                        <img src="{{ asset($slide['image']) }}" alt="{{ __($slide['title']) }}" class="size-full object-cover transition duration-700 group-hover:scale-105" loading="lazy">
                        <figcaption class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-ink/80 to-transparent p-8 pt-20 text-white">
                            <span class="text-sm font-bold tracking-widest text-petal uppercase">0{{ $loop->iteration }}</span>
                            <h3 class="mt-1 text-3xl">{{ __($slide['title']) }}</h3>
                            <p class="mt-2 text-white/85">{{ __($slide['text']) }}</p>
                        </figcaption>
                    </figure>
                @endforeach
                <div class="w-4 shrink-0 sm:w-8" aria-hidden="true"></div>
            </div>
        </div>
    </div>
</section>
