@php
    /**
     * Post-it ditempel dalam 5 kolom: kolom luar lebih turun dan berisi 2 catatan,
     * kolom tengah lebih tinggi supaya judul muat di bawahnya (seperti papan pegboard).
     *
     * @var array<int, array{size: int, offset: string, speed: string}> $columnLayout
     */
    $columnLayout = [
        ['size' => 2, 'offset' => 'lg:mt-20', 'speed' => '0.06'],
        ['size' => 1, 'offset' => 'lg:mt-6', 'speed' => '-0.04'],
        ['size' => 1, 'offset' => 'lg:mt-0', 'speed' => '0.03'],
        ['size' => 1, 'offset' => 'lg:mt-10', 'speed' => '-0.05'],
        ['size' => 2, 'offset' => 'lg:mt-16', 'speed' => '0.07'],
    ];
    $paperColors = [
        'yellow' => 'bg-[#fff1a6]',
        'green' => 'bg-[#dcefc4]',
        'pink' => 'bg-[#ffd8e1]',
        'blue' => 'bg-[#d5eafa]',
        'orange' => 'bg-[#ffdcb0]',
    ];
    $pinColors = ['#e5484d', '#568f22', '#faa51a', '#3b82f6'];
    $tilts = ['-3deg', '2.5deg', '-1.5deg', '3deg', '-2deg', '1.5deg', '-2.5deg'];

    $testimonials = array_values(config('school.testimonials'));
    $columns = [];
    $position = 0;

    foreach ($columnLayout as $column) {
        $columns[] = $column + ['notes' => array_slice($testimonials, $position, $column['size'])];
        $position += $column['size'];
    }

    $noteIndex = 0;
@endphp

<section id="testimonials" class="relative bg-cream pt-10 pb-16 lg:pb-24">
    <div class="container-x">
        <div class="pegboard relative overflow-hidden rounded-[3rem] shadow-[inset_0_2px_24px_rgba(90,60,20,0.18)] lg:min-h-[57rem]">
            {{-- Judul: di HP tampil di atas, di desktop di tengah bawah papan --}}
            <div class="relative z-10 px-5 pt-14 lg:absolute lg:inset-x-[21%] lg:bottom-12 lg:p-0" data-reveal="zoom">
                <div class="torn-paper mx-auto max-w-xl px-6 py-10 text-center sm:px-10">
                    <span class="masking-tape -top-4 left-6 -rotate-12" aria-hidden="true"></span>
                    <span class="masking-tape -top-4 right-6 rotate-[10deg]" aria-hidden="true"></span>

                    <span class="eyebrow" data-reveal="up" data-delay="150">Testimonials</span>
                    <h2 class="mt-5 text-4xl text-leaf-dark sm:text-5xl" data-reveal="up" data-delay="250">
                        {{ __('Cerita hangat') }}
                        <span class="block text-sun-dark">{{ __('dari Ayah & Bunda') }}</span>
                    </h2>
                    <p class="mx-auto mt-5 max-w-md text-lg text-ink/75" data-reveal="up" data-delay="350">
                        {{ __('Kesan orang tua yang sudah mempercayakan langkah pertama si kecil di Himawari.') }}
                    </p>
                    <a href="{{ config('school.contact.instagram') }}" target="_blank" rel="noopener" class="btn-leaf mt-8" data-reveal="up" data-delay="450">
                        {{ __('Lihat cerita lainnya') }} <x-icon name="arrow-right" class="size-5" />
                    </a>
                </div>
            </div>

            <div class="note-track relative mt-10 flex snap-x snap-mandatory gap-6 overflow-x-auto px-6 pt-6 pb-14 lg:mt-0 lg:grid lg:snap-none lg:grid-cols-5 lg:items-start lg:gap-6 lg:overflow-visible lg:px-10 lg:pt-12 lg:pb-0">
                @foreach ($columns as $column)
                    <div class="contents lg:flex lg:flex-col lg:gap-8 {{ $column['offset'] }}" data-speed="{{ $column['speed'] }}">
                        @foreach ($column['notes'] as $note)
                            @php
                                $tilt = $tilts[$noteIndex % count($tilts)];
                                $pin = $pinColors[$noteIndex % count($pinColors)];
                                $noteIndex++;
                            @endphp
                            <div class="w-60 shrink-0 snap-center lg:w-auto" data-reveal="down" data-delay="{{ $noteIndex * 90 }}">
                                <figure class="post-it group relative {{ $paperColors[$note['color']] ?? $paperColors['yellow'] }} p-3 pb-5" style="--tilt: {{ $tilt }}">
                                    <span class="push-pin" style="--pin: {{ $pin }}" aria-hidden="true"></span>
                                    <img src="{{ asset($note['image']) }}" alt="{{ __($note['name']) }}" draggable="false"
                                         class="aspect-[4/3] w-full rounded-sm object-cover shadow-sm" loading="lazy">
                                    <blockquote class="mt-3 text-[15px] leading-snug font-semibold text-ink/85 italic">
                                        “{{ __($note['quote']) }}”
                                    </blockquote>
                                    <figcaption class="mt-3 border-t border-ink/10 pt-2">
                                        <span class="block text-sm font-extrabold text-ink">{{ __($note['name']) }}</span>
                                        <span class="block text-xs font-semibold text-ink/60">{{ __($note['role']) }}</span>
                                    </figcaption>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
