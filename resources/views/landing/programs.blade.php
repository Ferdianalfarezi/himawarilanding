<section id="programs" class="relative overflow-hidden py-24 lg:py-32">
    <div class="container-x">
        <div class="mx-auto max-w-2xl text-center">
            <span class="eyebrow" data-reveal="up">Academic Program</span>
            <h2 class="mt-5 text-4xl text-leaf sm:text-5xl" data-reveal="up" data-delay="100">
                We meet kids <span class="text-sun">where they are.</span>
            </h2>
            <p class="mt-5 text-lg text-ink/75" data-reveal="up" data-delay="200">
                {{ __('Empat program yang disesuaikan dengan tahap tumbuh kembang si kecil.') }}
            </p>
        </div>

        <div class="relative mt-20" data-scroll-path-container>
            {{-- Garis perjalanan yang tergambar saat scroll (desktop) --}}
            <svg class="pointer-events-none absolute top-0 left-1/2 hidden h-full w-40 -translate-x-1/2 lg:block" viewBox="0 0 100 1000" preserveAspectRatio="none" fill="none" aria-hidden="true">
                <path d="M50 0 C 95 100, 5 150, 50 250 S 95 400, 50 500 S 5 650, 50 750 S 95 900, 50 1000" stroke="#EBE5D8" stroke-width="4" stroke-dasharray="2 14" stroke-linecap="round" />
                <path data-scroll-path d="M50 0 C 95 100, 5 150, 50 250 S 95 400, 50 500 S 5 650, 50 750 S 95 900, 50 1000" stroke="#FAA51A" stroke-width="4" stroke-linecap="round" />
            </svg>

            <div class="space-y-20 lg:space-y-28">
                @foreach (config('school.programs') as $program)
                    @php($reverse = $loop->even)
                    <article class="relative grid items-center gap-10 lg:grid-cols-2 lg:gap-32">
                        <div class="{{ $reverse ? 'lg:order-2' : '' }}" data-speed="{{ $reverse ? '-0.06' : '0.06' }}">
                            <div class="group relative" data-reveal="{{ $reverse ? 'right' : 'left' }}">
                                <div class="{{ $reverse ? 'blob-2 bg-sun-light/50' : 'blob bg-leaf/40' }} absolute -inset-3 rotate-3 transition duration-700 group-hover:rotate-12"></div>
                                <img src="{{ asset($program['image']) }}" alt="{{ __('Program :name Himawari', ['name' => $program['name']]) }}"
                                     class="relative aspect-[4/3] w-full rounded-[2.5rem] object-cover shadow-xl transition duration-700 group-hover:scale-[1.02]" loading="lazy">
                                <span class="absolute -top-5 {{ $reverse ? '-left-3' : '-right-3' }} rotate-6 rounded-2xl bg-sun px-5 py-3 text-lg font-black text-white shadow-lg">
                                    {{ __($program['age']) }}
                                </span>
                            </div>
                        </div>

                        {{-- Titik di garis --}}
                        <span class="absolute top-1/2 left-1/2 hidden size-6 -translate-1/2 rounded-full border-4 border-white bg-leaf shadow lg:block" data-reveal="zoom" aria-hidden="true"></span>

                        <div class="{{ $reverse ? 'lg:order-1 lg:text-right' : '' }}">
                            <span class="text-7xl font-black text-cream-dark" data-reveal="up">0{{ $loop->iteration }}</span>
                            <h3 class="-mt-6 text-4xl text-leaf sm:text-5xl" data-reveal="up" data-delay="100">{{ $program['name'] }}</h3>
                            <p class="mt-4 text-lg leading-relaxed text-ink/80" data-reveal="up" data-delay="200">{{ __($program['text']) }}</p>
                            @if ($program['schedule'] || $program['class_size'])
                                <ul class="mt-6 flex flex-wrap gap-3 {{ $reverse ? 'lg:justify-end' : '' }}" data-reveal="up" data-delay="300">
                                    @if ($program['schedule'])
                                        <li class="flex items-center gap-2 rounded-full bg-cream px-4 py-2 text-sm font-bold text-ink/80">
                                            <x-icon name="clock" class="size-4 text-sun-dark" /> {{ $program['schedule'] }}
                                        </li>
                                    @endif
                                    @if ($program['class_size'])
                                        <li class="flex items-center gap-2 rounded-full bg-cream px-4 py-2 text-sm font-bold text-ink/80">
                                            <x-icon name="users" class="size-4 text-leaf-dark" /> {{ __($program['class_size']) }}
                                        </li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
