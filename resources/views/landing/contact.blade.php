@php
    $contact = config('school.contact');
    $cards = [
        ['title' => 'Any Questions?', 'text' => 'Ngobrol dengan tim kami lewat WhatsApp.', 'cta' => 'Chat sekarang', 'href' => $contact['whatsapp'], 'icon' => 'chat', 'class' => 'bg-leaf-dark text-white', 'icon_class' => 'bg-white/20'],
        ['title' => 'See it Yourself!', 'text' => 'Temukan lokasi sekolah kami di Google Maps.', 'cta' => 'Lihat lokasi', 'href' => $contact['maps'], 'icon' => 'map', 'class' => 'bg-sun text-ink', 'icon_class' => 'bg-white/40'],
        ['title' => 'Registration Form', 'text' => 'Isi formulir pendaftaran untuk si kecil.', 'cta' => 'Daftar sekarang', 'href' => $contact['registration'], 'icon' => 'form', 'class' => 'bg-white text-ink border-2 border-cream-dark', 'icon_class' => 'bg-leaf-light text-leaf-dark'],
    ];
@endphp

<section id="contact" class="relative pb-24 lg:pb-32">
    <div class="container-x">
        <div class="grid gap-6 md:grid-cols-3" data-stagger="150">
            @foreach ($cards as $card)
                <a href="{{ $card['href'] }}" target="_blank" rel="noopener"
                   class="group relative flex flex-col overflow-hidden rounded-[2rem] p-8 shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-xl {{ $card['class'] }}"
                   data-reveal="flip">
                    <span class="grid size-14 place-items-center rounded-2xl transition duration-500 group-hover:scale-110 group-hover:rotate-12 {{ $card['icon_class'] }}">
                        <x-icon :name="$card['icon']" class="size-7" />
                    </span>
                    <h3 class="mt-6 text-3xl">{{ $card['title'] }}</h3>
                    <p class="mt-2 text-lg opacity-85">{{ __($card['text']) }}</p>
                    <span class="mt-8 inline-flex items-center gap-2 font-bold">
                        {{ __($card['cta']) }}
                        <x-icon name="arrow-right" class="size-5 transition duration-300 group-hover:translate-x-2" />
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>
