<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('school.name') }} – {{ __('Islamic Montessori Preschool di Bekasi') }}</title>
        <meta name="description" content="{{ config('school.tagline') }} {{ __('Program Pretoddler, Toddler, dan Kids di Pondok Melati, Bekasi.') }}">
        <meta name="theme-color" content="#FAA51A">
        <link rel="alternate" hreflang="id" href="{{ route('home') }}">
        <link rel="alternate" hreflang="en" href="{{ route('home.en') }}">
        <link rel="alternate" hreflang="x-default" href="{{ route('home') }}">
        <link rel="icon" href="{{ asset('images/logohima.png') }}" type="image/png">

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div id="scroll-progress" class="fixed inset-x-0 top-0 z-[60] h-1 bg-gradient-to-r from-leaf via-sun-light to-sun"></div>

        @include('landing.header')

        <main class="overflow-x-clip">
            @include('landing.hero')
            @include('landing.about')
            @include('landing.marquee')
            @include('landing.programs')
            @include('landing.activities')
            @include('landing.features')
            @include('landing.curriculum')
            @include('landing.facilities')
            @include('landing.testimonials')
            @include('landing.visit')
            @include('landing.faq')
            @include('landing.contact')
        </main>

        @include('landing.footer')

        <a id="back-to-top" href="#home" aria-label="{{ __('Kembali ke atas') }}"
           class="pointer-events-none fixed right-5 bottom-5 z-40 grid size-12 place-items-center rounded-full bg-leaf text-white opacity-0 shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-leaf-dark">
            <x-icon name="arrow-up" class="size-5" />
        </a>
    </body>
</html>
