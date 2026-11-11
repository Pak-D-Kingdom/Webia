{{-- Maskot robot AI berhelm proyek (SVG animasi: kedip, antena, tubuh melayang). --}}
<svg class="hr-robot {{ $class ?? '' }}" viewBox="0 0 120 124" aria-hidden="true" focusable="false">
    <ellipse class="hr-robot__shadow" cx="60" cy="118" rx="24" ry="4.5" fill="#1d2b1c" opacity=".18"/>
    <g class="hr-robot__body">
        <path d="M33 104c0-15 12-23 27-23s27 8 27 23v8H33z" fill="#fff" stroke="#cfe0c3" stroke-width="2"/>
        <rect x="50" y="93" width="20" height="11" rx="4" fill="#7fa06f"/>
        <circle cx="60" cy="98.5" r="2.4" fill="#fff"/>
        <rect x="20" y="52" width="10" height="22" rx="5" fill="#6f9a5c"/>
        <rect x="90" y="52" width="10" height="22" rx="5" fill="#6f9a5c"/>
        <rect x="28" y="40" width="64" height="48" rx="22" fill="#fff" stroke="#cfe0c3" stroke-width="2"/>
        <rect x="35" y="48" width="50" height="32" rx="15" fill="#1c2a24"/>
        <g class="hr-robot__eyes">
            <ellipse cx="50" cy="63" rx="6" ry="8" fill="#38e1f2"/>
            <ellipse cx="70" cy="63" rx="6" ry="8" fill="#38e1f2"/>
        </g>
        <path d="M54 73q6 4 12 0" stroke="#38e1f2" stroke-width="2.4" fill="none" stroke-linecap="round"/>
        <path d="M25 46c0-18 15-29 35-29s35 11 35 29z" fill="#f5b82e"/>
        <path d="M21 46h78a3.2 3.2 0 0 1 0 6.4H21a3.2 3.2 0 0 1 0-6.4z" fill="#e09a10"/>
        <rect x="54" y="17" width="12" height="29" rx="5" fill="#e09a10"/>
        <path d="M34 36c3-8 10-12 18-13" stroke="#fff" stroke-opacity=".55" stroke-width="3" fill="none" stroke-linecap="round"/>
    </g>
</svg>
