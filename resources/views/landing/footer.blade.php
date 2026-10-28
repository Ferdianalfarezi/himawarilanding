@php($contact = config('school.contact'))

<footer class="relative overflow-hidden bg-cream pt-24 pb-10">
    <x-deco.wave class="absolute inset-x-0 -top-px h-16 w-full rotate-180 sm:h-20" />

    <div class="pointer-events-none absolute -right-16 -bottom-16 w-72 opacity-50" data-rotate="0.05" aria-hidden="true">
        <x-deco.sun class="w-full" />
    </div>

    <div class="container-x relative grid gap-12 md:grid-cols-2 lg:grid-cols-[2fr_1fr_1fr_1.5fr]">
        <div data-reveal="up">
            <img src="{{ asset('images/logo.png') }}" alt="Himawari Islamic Preschool" class="h-16 w-auto">
            <p class="mt-5 max-w-sm leading-relaxed text-ink/75">{{ config('school.tagline') }}</p>
            <a href="{{ $contact['instagram'] }}" target="_blank" rel="noopener" class="mt-6 inline-flex items-center gap-2 font-bold text-leaf-dark transition hover:text-sun">
                <span class="grid size-10 place-items-center rounded-full bg-white"><x-icon name="instagram" class="size-5" /></span>
                {{ $contact['instagram_handle'] }}
            </a>
        </div>

        <div data-reveal="up" data-delay="100">
            <h4 class="text-lg text-leaf-dark">Explore</h4>
            <ul class="mt-4 space-y-2 font-semibold text-ink/75">
                <li><a href="#home" class="transition hover:text-sun">Home</a></li>
                <li><a href="#programs" class="transition hover:text-sun">Programs</a></li>
                <li><a href="#curriculum" class="transition hover:text-sun">Curriculum</a></li>
            </ul>
        </div>

        <div data-reveal="up" data-delay="200">
            <h4 class="text-lg text-leaf-dark">About</h4>
            <ul class="mt-4 space-y-2 font-semibold text-ink/75">
                <li><a href="#about" class="transition hover:text-sun">About Us</a></li>
                <li><a href="#why-choose-us" class="transition hover:text-sun">Why Choose Us</a></li>
                <li><a href="#faq" class="transition hover:text-sun">FAQ</a></li>
            </ul>
        </div>

        <div data-reveal="up" data-delay="300">
            <h4 class="text-lg text-leaf-dark">{{ __('Hubungi Kami') }}</h4>
            <a href="{{ $contact['phone_link'] }}" class="mt-4 flex items-center gap-2 text-xl font-extrabold transition hover:text-sun">
                <x-icon name="phone" class="size-5 text-sun" /> {{ $contact['phone'] }}
            </a>
            <p class="mt-3 text-sm leading-relaxed text-ink/70">{{ $contact['address'] }}</p>        </div>
    </div>

    <div class="container-x relative mt-16 border-t border-ink/10 pt-8 text-center text-sm text-ink/60">
        &copy; {{ date('Y') }} {{ config('school.name') }}. All rights reserved.
    </div>
</footer>
