<svg {{ $attributes->merge(['viewBox' => '0 0 200 200', 'aria-hidden' => 'true']) }} xmlns="http://www.w3.org/2000/svg">
    <g fill="#FFE14D">
        @foreach (range(0, 11) as $ray)
            <rect x="94" y="4" width="12" height="34" rx="6" transform="rotate({{ $ray * 30 }} 100 100)" />
        @endforeach
    </g>
    <circle cx="100" cy="100" r="52" fill="#FAA51A" />
    <circle cx="100" cy="100" r="40" fill="#FFC20E" />
</svg>
