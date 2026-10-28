@props(['color' => '#ffffff'])
<svg {{ $attributes->merge(['viewBox' => '0 0 1440 120', 'preserveAspectRatio' => 'none', 'aria-hidden' => 'true']) }} xmlns="http://www.w3.org/2000/svg">
    <path d="M0 64 C 240 120, 480 0, 720 40 C 960 80, 1200 120, 1440 56 L1440 120 L0 120 Z" fill="{{ $color }}" />
</svg>
