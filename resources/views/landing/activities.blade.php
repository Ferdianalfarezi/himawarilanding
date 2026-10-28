@php
    /**
     * Kartu dikelompokkan jadi kolom bento yang berulang: tinggi, tumpuk dua, lebar, tumpuk dua.
     *
     * @var array<int, array{type: string, items: array<int, array<string, string>>}> $columns
     */
    $pattern = [
        ['type' => 'tall', 'size' => 1],
        ['type' => 'stack', 'size' => 2],
        ['type' => 'wide', 'size' => 1],
        ['type' => 'stack', 'size' => 2],
    ];
    $columnWidths = [
        'tall' => 'w-[17rem] sm:w-80',
        'stack' => 'w-[17rem] sm:w-96',
        'wide' => 'w-[20rem] sm:w-[34rem]',
    ];

    $activities = array_values(config('school.activities'));
    $columns = [];
    $position = 0;

    while ($position < count($activities)) {
        $slot = $pattern[count($columns) % count($pattern)];
        $columns[] = ['type' => $slot['type'], 'items' => array_slice($activities, $position, $slot['size'])];
        $position += $slot['size'];
    }

    $number = 0;
@endphp

<section id="activities" class="relative overflow-hidden py-24 lg:py-32" data-carousel>
    <div class="container-x">
        <div class="flex flex-wrap items-end justify-between gap-6">
            <div class="max-w-2xl">
                <span class="eyebrow" data-reveal="up">Our Activity</span>
                <h2 class="mt-5 text-4xl text-leaf sm:text-5xl" data-reveal="up" data-delay="100">
                    {{ __('Hari-hari yang') }} <span class="text-sun">{{ __('penuh warna.') }}</span>
                </h2>
                <p class="mt-5 text-lg text-ink/75" data-reveal="up" data-delay="200">
                    {{ __('Intip keseruan kegiatan si kecil di Himawari. Geser untuk melihat lebih banyak.') }}
                </p>
            </div>

            <div class="flex gap-3" data-reveal="up" data-delay="300">
                <button type="button" class="grid size-12 place-items-center rounded-full border-2 border-leaf text-leaf transition hover:bg-leaf hover:text-white disabled:pointer-events-none disabled:opacity-30" data-carousel-prev aria-label="{{ __('Kegiatan sebelumnya') }}">
                    <x-icon name="arrow-right" class="size-5 rotate-180" />
                </button>
                <button type="button" class="grid size-12 place-items-center rounded-full bg-sun text-white shadow-lg transition hover:bg-sun-dark disabled:pointer-events-none disabled:opacity-30" data-carousel-next aria-label="{{ __('Kegiatan berikutnya') }}">
                    <x-icon name="arrow-right" class="size-5" />
                </button>
            </div>
        </div>
    </div>

    <div class="activity-track mt-14 flex cursor-grab snap-x snap-mandatory gap-5 overflow-x-auto pb-6 select-none" data-carousel-track data-stagger="100">
        @foreach ($columns as $column)
            <div class="{{ $columnWidths[$column['type']] }} flex h-[30rem] shrink-0 snap-start flex-col gap-5 sm:h-[36rem]">
                @foreach ($column['items'] as $activity)
                    @php($number++)
                    <article class="group relative min-h-0 flex-1 overflow-hidden rounded-[2rem] bg-cream shadow-lg" data-reveal="zoom">
                        <img src="{{ asset($activity['image']) }}" alt="{{ __(':title di Himawari', ['title' => __($activity['title'])]) }}" draggable="false"
                             class="absolute inset-0 size-full object-cover transition duration-700 group-hover:scale-110" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-ink/70 via-ink/10 to-transparent"></div>

                        <span class="absolute top-4 left-4 grid size-10 place-items-center rounded-full bg-white/90 text-sun-dark shadow backdrop-blur transition duration-500 group-hover:rotate-12">
                            <x-icon :name="$activity['icon']" class="size-5" />
                        </span>
                        <span class="absolute top-4 right-4 rounded-full bg-sun px-3 py-1 text-xs font-black text-white shadow">
                            {{ str_pad((string) $number, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <div class="absolute inset-x-4 bottom-4 flex flex-wrap items-end justify-between gap-2">
                            <h3 class="max-w-[16rem] text-xl leading-tight font-extrabold text-white drop-shadow">{{ __($activity['title']) }}</h3>
                            <span class="rounded-full bg-white/90 px-3 py-1.5 text-xs font-bold text-leaf-dark shadow backdrop-blur transition duration-500 group-hover:-translate-y-1">
                                {{ __($activity['tag']) }}
                            </span>
                        </div>
                    </article>
                @endforeach
            </div>
        @endforeach
    </div>

    <div class="container-x">
        <div class="h-1.5 overflow-hidden rounded-full bg-cream-dark" aria-hidden="true">
            <div class="h-full origin-left scale-x-0 rounded-full bg-leaf transition-transform duration-300" data-carousel-progress></div>
        </div>
    </div>
</section>
