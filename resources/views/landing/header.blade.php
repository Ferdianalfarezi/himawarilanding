@php
    $menu = [
        ['label' => 'Home', 'href' => '#home', 'section' => 'home'],
        ['label' => 'About', 'section' => 'about', 'sections' => 'about,activities,why-choose-us,testimonials', 'children' => [
            ['label' => 'About Us', 'href' => '#about'],
            ['label' => 'Our Activity', 'href' => '#activities'],
            ['label' => 'Why Choose Us', 'href' => '#why-choose-us'],
            // ['label' => 'Testimonials', 'href' => '#testimonials'], // disembunyikan sementara
        ]],
        ['label' => 'Program', 'section' => 'programs', 'sections' => 'programs,curriculum', 'children' => [
            ['label' => 'Academic Program', 'href' => '#programs'],
            ['label' => 'Curriculum', 'href' => '#curriculum'],
        ]],
        ['label' => 'Facilities', 'href' => '#facilities', 'section' => 'facilities'],
        ['label' => 'FAQ', 'href' => '#faq', 'section' => 'faq'],
        ['label' => 'Contact Us', 'href' => '#contact', 'section' => 'contact', 'sections' => 'visit,contact'],
    ];
    $contact = config('school.contact');
    $languages = [
        ['code' => 'id', 'label' => 'ID', 'href' => route('home'), 'name' => 'Bahasa Indonesia'],
        ['code' => 'en', 'label' => 'EN', 'href' => route('home.en'), 'name' => 'English'],
    ];
@endphp

<header id="site-header" class="fixed inset-x-0 top-0 z-50">
    <div class="header-inner container-x flex items-center justify-between gap-6 py-4 transition-all duration-300">
        <a href="#home" class="shrink-0" aria-label="{{ config('school.name') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Himawari Islamic Preschool" class="header-logo h-14 w-auto transition-all duration-300">
        </a>

        {{-- Menu desktop --}}
        <nav class="hidden lg:block" aria-label="{{ __('Menu utama') }}">
            <ul class="flex items-center gap-1">
                @foreach ($menu as $item)
                    <li class="group relative">
                        @isset($item['children'])
                            <button type="button"
                                    class="nav-link relative flex items-center gap-1 px-3 py-2 text-[17px] font-bold transition hover:text-sun after:absolute after:inset-x-3 after:bottom-0.5 after:h-0.5 after:origin-left after:scale-x-0 after:rounded after:bg-sun after:transition"
                                    data-section="{{ $item['section'] }}" data-sections="{{ $item['sections'] }}" aria-haspopup="true">
                                {{ $item['label'] }}
                                <x-icon name="chevron-down" class="size-4 transition group-hover:rotate-180" />
                            </button>
                            <div class="invisible absolute top-full left-0 pt-3 opacity-0 transition duration-300 group-focus-within:visible group-focus-within:opacity-100 group-hover:visible group-hover:opacity-100">
                                <ul class="min-w-52 translate-y-2 rounded-2xl bg-white p-2 shadow-xl transition duration-300 group-hover:translate-y-0">
                                    @foreach ($item['children'] as $child)
                                        <li>
                                            <a href="{{ $child['href'] }}" class="block rounded-xl px-4 py-2.5 font-semibold transition hover:bg-cream hover:pl-6 hover:text-sun-dark">
                                                {{ $child['label'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <a href="{{ $item['href'] }}"
                               class="nav-link relative block px-3 py-2 text-[17px] font-bold transition hover:text-sun after:absolute after:inset-x-3 after:bottom-0.5 after:h-0.5 after:origin-left after:scale-x-0 after:rounded after:bg-sun after:transition"
                               data-section="{{ $item['section'] }}" @isset($item['sections']) data-sections="{{ $item['sections'] }}" @endisset>
                                {{ $item['label'] }}
                            </a>
                        @endisset
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="ml-auto flex items-center gap-3 lg:ml-0 lg:gap-5">
            <div class="flex items-center rounded-full bg-white p-1 text-sm font-extrabold shadow-sm" role="group" aria-label="{{ __('Pilih bahasa') }}">
                @foreach ($languages as $language)
                    @php($isActive = app()->getLocale() === $language['code'])
                    <a href="{{ $language['href'] }}" hreflang="{{ $language['code'] }}" lang="{{ $language['code'] }}" title="{{ $language['name'] }}"
                       class="rounded-full px-3 py-1.5 transition {{ $isActive ? 'bg-sun text-white' : 'text-ink/60 hover:text-sun-dark' }}"
                       @if ($isActive) aria-current="true" @endif data-lang-link>
                        {{ $language['label'] }}
                    </a>
                @endforeach
            </div>
            <a href="{{ $contact['phone_link'] }}" class="hidden items-center gap-2 rounded-full bg-white py-1 pr-4 pl-1 font-bold text-leaf-dark shadow-sm transition hover:text-sun lg:flex">
                <span class="grid size-9 place-items-center rounded-full bg-leaf-light"><x-icon name="phone" class="size-4" /></span>
                <span>{{ $contact['phone'] }}</span>
            </a>
        </div>

        {{-- Tombol menu mobile --}}
        <button id="menu-toggle" type="button" class="grid size-11 place-items-center rounded-full bg-leaf-dark text-white shadow-lg lg:hidden" aria-label="{{ __('Buka menu') }}" aria-expanded="false" aria-controls="mobile-menu">
            <span class="flex w-5 flex-col gap-1.5">
                <span class="h-0.5 rounded bg-current"></span>
                <span class="h-0.5 rounded bg-current"></span>
                <span class="h-0.5 w-3 rounded bg-current"></span>
            </span>
        </button>
    </div>
</header>

{{-- Menu mobile --}}
<div id="mobile-menu" class="invisible fixed inset-0 z-[65] -translate-y-6 overflow-y-auto bg-cream opacity-0 transition duration-300 lg:hidden">
    <div class="flex min-h-full flex-col px-6 pt-4 pb-10">
        <div class="mb-8 flex items-center justify-between">
            <img src="{{ asset('images/logo.png') }}" alt="Himawari Islamic Preschool" class="h-12 w-auto">
            <button type="button" data-menu-close class="grid size-11 place-items-center rounded-full bg-sun text-white" aria-label="{{ __('Tutup menu') }}">
                <x-icon name="plus" class="size-6 rotate-45" />
            </button>
        </div>
        <ul class="space-y-1">
            @foreach ($menu as $item)
                <li class="border-b border-ink/10">
                    @isset($item['children'])
                        <button type="button" data-submenu-toggle aria-expanded="false" class="flex w-full items-center justify-between py-4 text-2xl font-extrabold">
                            {{ $item['label'] }}
                            <x-icon name="chevron-down" class="size-6 transition" />
                        </button>
                        <ul class="hidden pb-4 pl-4">
                            @foreach ($item['children'] as $child)
                                <li><a href="{{ $child['href'] }}" class="block py-2 text-lg font-semibold text-leaf-dark">{{ $child['label'] }}</a></li>
                            @endforeach
                        </ul>
                    @else
                        <a href="{{ $item['href'] }}" class="block py-4 text-2xl font-extrabold">{{ $item['label'] }}</a>
                    @endisset
                </li>
            @endforeach
        </ul>
        <div class="mt-auto space-y-3 pt-10">
            <a href="{{ $contact['phone_link'] }}" class="btn-ghost w-full"><x-icon name="phone" class="size-5" /> {{ $contact['phone'] }}</a>
        </div>
    </div>
</div>
