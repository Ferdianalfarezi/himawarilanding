<section id="curriculum" class="relative bg-leaf-dark py-24 text-white lg:py-32">
    <x-deco.wave class="absolute inset-x-0 -top-px h-16 w-full rotate-180 sm:h-24" />

    <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
        <div class="absolute top-1/4 -right-16 w-64 opacity-20" data-speed="0.3" data-rotate="0.05">
            <x-deco.leaf color="#ffffff" class="w-full" />
        </div>
        <div class="absolute bottom-10 left-[30%] w-10 opacity-60" data-speed="-0.5">
            <x-deco.heart class="w-full" />
        </div>
    </div>

    <div class="container-x relative grid gap-14 lg:grid-cols-[5fr_7fr]">
        {{-- Kolom kiri menempel saat kartu di kanan di-scroll --}}
        <div class="lg:sticky lg:top-32 lg:self-start">
            <span class="eyebrow bg-white/20 text-white" data-reveal="up">Curriculum</span>
            <h2 class="mt-5 text-4xl sm:text-5xl" data-reveal="up" data-delay="100">
                {{ __('Kurikulum yang memadukan') }} <span class="text-petal">{{ __('hati, pikiran, dan gerak.') }}</span>
            </h2>
            <p class="mt-6 text-lg leading-relaxed text-white/90" data-reveal="up" data-delay="200">
                {{ __('Kami memadukan kurikulum nasional dengan pendekatan Montessori dan sensory integration, dibalut nilai-nilai Islam dalam keseharian.') }}
            </p>

            <div class="mt-8 rounded-3xl bg-white/15 p-6 backdrop-blur" data-reveal="up" data-delay="300">
                <p class="flex items-center gap-2 font-extrabold"><x-icon name="clock" class="size-5" /> {{ __('Jadwal kelas') }}</p>
                <dl class="mt-4 space-y-2 text-white/90">
                    <div class="flex justify-between gap-4 border-b border-white/20 pb-2"><dt>Pretoddler</dt><dd class="font-bold">08.00 – 09.45 WIB</dd></div>
                    <div class="flex justify-between gap-4"><dt>Toddler &amp; Kids</dt><dd class="font-bold">08.30 – 11.00 WIB</dd></div>
                </dl>
            </div>
        </div>

        <div class="space-y-6">
            @foreach (config('school.curriculum') as $pillar)
                <article class="group flex gap-6 rounded-[2rem] bg-white p-8 text-ink shadow-lg transition duration-500 hover:-translate-y-1 hover:shadow-2xl sm:p-10"
                         data-reveal="{{ $loop->odd ? 'right' : 'rotate' }}">
                    <span class="grid size-14 shrink-0 place-items-center rounded-2xl bg-sun text-2xl font-black text-white transition duration-500 group-hover:-rotate-12">
                        {{ $loop->iteration }}
                    </span>
                    <div>
                        <h3 class="text-2xl text-leaf-dark sm:text-3xl">{{ __($pillar['title']) }}</h3>
                        <p class="mt-3 text-lg leading-relaxed text-ink/75">{{ __($pillar['text']) }}</p>
                    </div>
                </article>
            @endforeach

            <article class="flex items-center gap-6 rounded-[2rem] border-2 border-dashed border-white/60 p-8 sm:p-10" data-reveal="up">
                <x-deco.sun class="size-16 shrink-0 animate-spin-slow" />
                <p class="text-xl font-bold">{{ __('Seluruh proses belajar berada di bawah') }} <span class="text-petal">{{ __('supervisi psikolog') }}</span>.</p>
            </article>
        </div>
    </div>

    <x-deco.wave color="#F4F1EA" class="absolute inset-x-0 -bottom-px h-16 w-full sm:h-24" />
</section>
