<section id="why-choose-us" class="relative overflow-hidden bg-cream py-24 lg:py-32">
    <x-deco.wave class="absolute inset-x-0 -top-px h-16 w-full rotate-180 sm:h-24" />

    <div class="pointer-events-none absolute -bottom-20 -left-20 w-72 opacity-60" data-rotate="0.06" aria-hidden="true">
        <x-deco.sun class="w-full" />
    </div>

    <div class="container-x relative">
        <div class="mx-auto max-w-2xl text-center">
            <span class="eyebrow" data-reveal="up">Why Choose Us</span>
            <h2 class="mt-5 text-4xl text-leaf sm:text-5xl" data-reveal="up" data-delay="100">
                {{ __('Tempat tumbuh yang') }} <span class="text-sun">{{ __('aman & menyenangkan') }}</span>
            </h2>
            <p class="mt-5 text-lg text-ink/75" data-reveal="up" data-delay="200">
                {{ __('Empat hal yang membuat orang tua merasa tenang menitipkan si kecil di Himawari.') }}
            </p>
        </div>

        <div class="mt-16 grid gap-6 sm:grid-cols-2 lg:grid-cols-4" data-stagger="140">
            @foreach (config('school.features') as $feature)
                @php($isSun = $feature['color'] === 'sun')
                <article class="group relative rounded-[2rem] bg-white p-8 shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-xl {{ $loop->even ? 'lg:mt-12' : '' }}"
                         data-reveal="up">
                    <div class="grid size-16 place-items-center rounded-2xl transition duration-500 group-hover:rotate-12 group-hover:scale-110 {{ $isSun ? 'bg-sun/15 text-sun-dark' : 'bg-leaf-light text-leaf-dark' }}">
                        <x-icon :name="$feature['icon']" class="size-8" />
                    </div>
                    <h3 class="mt-6 text-2xl {{ $isSun ? 'text-sun-dark' : 'text-leaf-dark' }}">{{ __($feature['title']) }}</h3>
                    <p class="mt-3 leading-relaxed text-ink/75">{{ __($feature['text']) }}</p>
                    <span class="absolute right-6 bottom-6 text-6xl font-black text-ink/5 transition group-hover:text-sun/20">0{{ $loop->iteration }}</span>
                </article>
            @endforeach
        </div>
    </div>
    <x-deco.wave class="absolute inset-x-0 -bottom-px h-16 w-full sm:h-24" />
</section>
