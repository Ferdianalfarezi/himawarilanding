<section id="faq" class="relative overflow-hidden py-24 lg:py-32">
    <div class="pointer-events-none absolute top-24 -left-12 w-40 opacity-40" data-speed="0.25" data-rotate="0.05" aria-hidden="true">
        <x-deco.leaf class="w-full" />
    </div>
    <div class="pointer-events-none absolute right-[8%] bottom-24 w-10" data-speed="-0.35" aria-hidden="true">
        <x-deco.heart color="#FAA51A" class="w-full animate-float" />
    </div>

    <div class="container-x grid gap-14 lg:grid-cols-[4fr_7fr]">
        <div class="lg:flex lg:flex-col lg:items-start">
            <span class="eyebrow" data-reveal="up">FAQ</span>
            <h2 class="mt-5 text-4xl text-leaf sm:text-5xl" data-reveal="up" data-delay="100">
                {{ __('Pertanyaan yang') }} <span class="text-sun">{{ __('sering ditanyakan') }}</span>
            </h2>
            <p class="mt-5 text-lg text-ink/75" data-reveal="up" data-delay="200">
                {{ __('Belum menemukan jawabannya? Tanyakan langsung ke tim kami lewat WhatsApp.') }}
            </p>
            {{-- Maskot detektif rata kanan; balon chat-nya adalah tombol WhatsApp --}}
            <div class="mt-10 flex w-full items-start justify-end gap-1 lg:mt-auto lg:pt-10" data-reveal="up" data-delay="300">
                <a href="{{ config('school.contact.whatsapp') }}" target="_blank" rel="noopener"
                   class="group relative mt-8 inline-flex shrink-0 items-center gap-2 rounded-3xl rounded-br-md bg-sun px-4 py-3 text-sm font-bold whitespace-nowrap sm:px-5 sm:py-3.5 sm:text-base lg:px-4 lg:py-3 lg:text-sm xl:px-5 xl:py-3.5 xl:text-base text-white shadow-lg shadow-sun/30 transition duration-300 hover:-translate-y-0.5 hover:bg-sun-dark">
                    <x-icon name="whatsapp" class="size-5" /> {{ __('Tanya via WhatsApp') }}
                    {{-- ekor balon mengarah ke detektif --}}
                    <span class="absolute -right-2 bottom-2 size-4 rotate-45 rounded-sm bg-sun transition duration-300 group-hover:bg-sun-dark" aria-hidden="true"></span>
                </a>
                <img src="{{ asset('images/detective-web.png') }}" alt="" aria-hidden="true" draggable="false"
                     class="-mr-4 w-36 shrink-0 origin-bottom sm:-mr-6 lg:-mr-14 transition-[rotate] duration-500 ease-out hover:rotate-[8deg] sm:w-64 lg:w-48 xl:w-64" loading="lazy">
            </div>
        </div>

        <div class="space-y-4" data-stagger="100">
            @foreach (config('school.faqs') as $faq)
                <div class="faq-item rounded-3xl bg-cream transition {{ $loop->first ? 'is-open' : '' }}" data-reveal="up">
                    <button type="button" class="flex w-full items-center justify-between gap-6 p-6 text-left sm:px-8" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                        <span class="text-lg font-extrabold sm:text-xl">{{ __($faq['question']) }}</span>
                        <span class="faq-icon grid size-10 shrink-0 place-items-center rounded-full bg-white text-sun-dark transition duration-300">
                            <x-icon name="plus" class="size-5" />
                        </span>
                    </button>
                    <div class="faq-body">
                        <div class="overflow-hidden">
                            <p class="px-6 pb-6 text-lg leading-relaxed text-ink/75 sm:px-8">{{ __($faq['answer']) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
