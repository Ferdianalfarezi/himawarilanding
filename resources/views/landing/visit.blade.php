@php($contact = config('school.contact'))

<section id="visit" class="relative overflow-hidden bg-cream pt-10 pb-24 lg:pb-32">
    <div class="container-x">
        <div class="relative overflow-hidden rounded-[3rem] bg-sun px-6 py-14 text-white sm:px-12 lg:px-16 lg:py-20" data-reveal="zoom">
            <div class="pointer-events-none absolute -right-20 -bottom-24 w-80 opacity-30" data-rotate="-0.06" aria-hidden="true">
                <x-deco.sun class="w-full" />
            </div>
            <div class="pointer-events-none absolute top-8 left-1/2 w-24 opacity-90" data-speed-x="0.25" aria-hidden="true">
                <x-deco.cloud class="w-full" />
            </div>

            <div class="relative grid items-center gap-12 lg:grid-cols-2">
                <div>
                    <h2 class="text-4xl sm:text-5xl lg:text-6xl" data-reveal="up" data-delay="150">Come over and look around</h2>
                    <p class="mt-6 text-lg leading-relaxed text-ink/85" data-reveal="up" data-delay="250">
                        {{ __('Kami senang sekali menyambut Ayah dan Bunda. Lihat langsung kelas kami, kenalan dengan para guru, dan rasakan suasananya.') }}
                    </p>
                    <p class="mt-6 flex gap-3 rounded-2xl bg-white/35 p-4 font-semibold text-ink" data-reveal="up" data-delay="350">
                        <x-icon name="map" class="mt-0.5 size-6 shrink-0" />
                        <span>{{ $contact['address'] }}</span>
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4" data-reveal="up" data-delay="450">
                        <a href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener" class="btn-leaf px-8 py-4 text-lg">
                            <x-icon name="chat" class="size-5" /> Contact Us
                        </a>
                        <a href="{{ $contact['maps'] }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full border-2 border-ink/80 px-8 py-4 text-lg font-bold text-ink transition hover:border-white hover:bg-white hover:text-sun-dark">
                            {{ __('Buka Maps') }}
                        </a>
                    </div>
                </div>

                <div data-reveal="left" data-delay="300">
                    <div class="overflow-hidden rounded-[2rem] border-8 border-white/30 shadow-2xl">
                        <iframe src="{{ $contact['maps_embed'] }}" title="{{ __('Lokasi Himawari Islamic School') }}" class="h-80 w-full lg:h-96" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
