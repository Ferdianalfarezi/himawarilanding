{{-- Pita teks yang bergeser mengikuti arah scroll --}}
@php($words = ['Fun', 'Friends', 'Learning', 'Islamic', 'Montessori', 'Play to Learn'])

<div class="relative overflow-hidden bg-white py-16" aria-hidden="true">
    <div class="-mx-10 -rotate-2 bg-leaf py-4">
        <div class="flex w-max gap-10 whitespace-nowrap" data-marquee="1">
            @foreach (range(1, 4) as $repeat)
                @foreach ($words as $word)
                    <span class="flex items-center gap-10 text-3xl font-black text-white uppercase sm:text-4xl">
                        {{ $word }} <x-deco.heart class="size-7" />
                    </span>
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="-mx-10 mt-3 rotate-1 bg-sun py-4">
        <div class="flex w-max gap-10 whitespace-nowrap" data-marquee="-1">
            @foreach (range(1, 4) as $repeat)
                @foreach (array_reverse($words) as $word)
                    <span class="flex items-center gap-10 text-3xl font-black text-white uppercase sm:text-4xl">
                        {{ $word }} <x-deco.leaf class="size-7" color="#ffffff" />
                    </span>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
