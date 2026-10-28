@props(['color' => '#8CC643'])
<svg {{ $attributes->merge(['viewBox' => '0 0 100 100', 'aria-hidden' => 'true']) }} xmlns="http://www.w3.org/2000/svg">
    <path d="M10 90 C 10 40, 40 10, 92 8 C 90 60, 60 90, 10 90 Z" fill="{{ $color }}" />
    <path d="M14 86 C 40 60, 60 40, 84 16" stroke="#ffffff" stroke-opacity=".55" stroke-width="4" stroke-linecap="round" fill="none" />
</svg>
