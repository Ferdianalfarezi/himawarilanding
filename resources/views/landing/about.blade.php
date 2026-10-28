<section id="about" class="relative overflow-hidden py-24 lg:py-32">
    <div class="pointer-events-none absolute top-20 -right-10 w-40 opacity-30" data-speed="0.3" data-rotate="-0.05" aria-hidden="true">
        <x-deco.leaf class="w-full" />
    </div>

    <div class="container-x grid items-center gap-16 lg:grid-cols-2">
        {{-- Kolase foto --}}
        <div class="relative order-2 mx-auto w-full max-w-xl lg:order-1">
            <div class="relative h-[26rem] sm:h-[32rem]">
                <div class="absolute top-0 left-0 w-3/4" data-speed="0.12">
                    <div data-reveal="left">
                        <img src="{{ asset('images/kids.jpg') }}" alt="{{ __('Guru Himawari bercerita bersama anak-anak') }}"
                             class="aspect-[4/3] w-full rounded-[2rem] object-cover shadow-xl" loading="lazy">
                    </div>
                </div>
                <div class="absolute right-0 bottom-0 w-3/5" data-speed="-0.12">
                    <div data-reveal="up" data-delay="200">
                        <img src="{{ asset('images/pretoddler.jpg') }}" alt="{{ __('Anak Pretoddler di Himawari') }}"
                             class="aspect-square w-full rounded-[2rem] border-8 border-white object-cover shadow-xl" loading="lazy">
                    </div>
                </div>

                {{-- Lencana berputar --}}
                <div class="absolute top-[42%] left-[38%] z-10 -translate-x-1/2" data-reveal="zoom" data-delay="400">
                    <div class="relative grid size-28 place-items-center rounded-full bg-sun shadow-xl sm:size-32">
                        <svg class="absolute inset-0 size-full animate-spin-slow" viewBox="0 0 100 100" aria-hidden="true">
                            <defs><path id="badge-circle" d="M50 50 m-37 0 a37 37 0 1 1 74 0 a37 37 0 1 1 -74 0" /></defs>
                            <text class="fill-white text-[10.5px] font-extrabold tracking-[0.2em] uppercase">
                                <textPath href="#badge-circle">Fun • Friends • Learning •</textPath>
                            </text>
                        </svg>
                        <x-deco.heart class="size-9" color="#ffffff" />
                    </div>
                </div>
            </div>
        </div>

        <div class="order-1 lg:order-2">
            <span class="eyebrow" data-reveal="up">About Us</span>
            <h2 class="mt-5 text-4xl text-leaf sm:text-5xl" data-reveal="up" data-delay="100">
                We are Preschool and <span class="text-sun">childhood</span> is our passion.
            </h2>
            <p class="mt-6 text-lg leading-relaxed text-ink/80" data-reveal="up" data-delay="200">
                {{ __('Himawari berarti bunga matahari. Seperti bunga matahari yang selalu tumbuh menghadap cahaya, kami ingin setiap anak tumbuh hangat, ceria, dan percaya diri. Dengan pendekatan Islamic Montessori dan supervisi psikolog, kami menemani langkah pertama si kecil di dunia sekolah.') }}
            </p>
            <p class="mt-4 text-lg leading-relaxed text-ink/80" data-reveal="up" data-delay="300">
                {{ __('Para pendidik kami bukan sekadar guru — mereka adalah') }} <strong class="text-sun-dark">Our Family!</strong>
            </p>
        </div>
    </div>
</section>
