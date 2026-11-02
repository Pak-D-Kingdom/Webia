{{-- Maskot robot AI WoodenLane (SVG inline, dianimasikan lewat CSS). Param opsional: $class --}}
<svg class="fm-robot {{ $class ?? '' }}" viewBox="0 0 64 64" role="img" aria-label="Maskot AI WoodenLane">
    <g class="fm-robot__antenna">
        <path d="M32 12V7" stroke="#8a6a52" stroke-width="2" stroke-linecap="round"/>
        <circle class="fm-robot__bulb" cx="32" cy="5" r="3" fill="#e8b27a"/>
    </g>
    <rect x="4" y="27" width="8" height="15" rx="4" fill="#8a6a52"/>
    <rect x="52" y="27" width="8" height="15" rx="4" fill="#8a6a52"/>
    <path d="M9 28c0-12 10-17 23-17s23 5 23 17" fill="none" stroke="#a88467" stroke-width="2.4" stroke-linecap="round"/>
    <rect x="9" y="13" width="46" height="42" rx="19" fill="url(#fm-g-shell)" stroke="#d6bfa3" stroke-width="1.4"/>
    <rect x="15" y="22" width="34" height="23" rx="11.5" fill="url(#fm-g-visor)"/>
    <g class="fm-robot__eyes">
        <ellipse class="fm-robot__eye" cx="25" cy="33" rx="3.4" ry="4.4" fill="url(#fm-g-eye)"/>
        <ellipse class="fm-robot__eye" cx="39" cy="33" rx="3.4" ry="4.4" fill="url(#fm-g-eye)"/>
    </g>
    <path d="M29 39.500q3 2.600 6 0" fill="none" stroke="#9fe0ff" stroke-width="1.5" stroke-linecap="round"/>
    <circle cx="18.500" cy="49" r="1.800" fill="#f0b9a0" opacity=".7"/>
    <circle cx="45.500" cy="49" r="1.800" fill="#f0b9a0" opacity=".7"/>
</svg>
