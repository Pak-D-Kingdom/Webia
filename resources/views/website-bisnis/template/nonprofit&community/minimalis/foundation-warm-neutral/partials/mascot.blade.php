{{-- Maskot HopeBot. Variabel: $view ('full' | 'head'), $cls --}}
<svg class="hb hb--{{ $view }} {{ $cls }}" @if($view === 'head') viewBox="14 0 192 152" @else viewBox="0 0 220 262" @endif xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Maskot HopeBot">
    <g class="hb-float">
        @if($view !== 'head')
        <g class="hb-plant">
            <path d="M44 250c-18-2-28-14-28-30 16 1 28 12 28 30z" fill="url(#g-green)"/>
            <path d="M52 252c0-18 10-30 28-34 1 16-10 30-28 34z" fill="#6E9440"/>
        </g>
        <path d="M80 152h60a16 16 0 0 1 16 16v50a22 22 0 0 1-22 22H86a22 22 0 0 1-22-22v-50a16 16 0 0 1 16-16z" fill="url(#g-white)" stroke="#E4DCCB" stroke-width="2"/>
        <path d="M86 158h48" stroke="#D9C49A" stroke-width="5" stroke-linecap="round"/>
        <path class="hb-heart" d="M110 218s-15-9-15-20a8.500 8.500 0 0 1 15-5 8.500 8.500 0 0 1 15 5c0 11-15 20-15 20z" fill="url(#g-gold)" stroke="#8B5E14" stroke-width="2"/>
        <path d="M76 168c-14 6-18 22-14 34" stroke="#EEE8DC" stroke-width="14" stroke-linecap="round" fill="none"/>
        <circle cx="62" cy="206" r="8" fill="#F6F1E7"/>
        <g class="hb-arm">
            <path d="M144 170c20 0 30 6 34-18" stroke="#EEE8DC" stroke-width="14" fill="none" stroke-linecap="round"/>
            <circle cx="178" cy="148" r="9" fill="#F6F1E7"/>
            <path d="M178 142v-18" stroke="#F6F1E7" stroke-width="7" stroke-linecap="round"/>
        </g>
        @endif
        <g class="hb-head">
            <path d="M44 90C38 26 74 8 110 8s72 18 66 82" fill="none" stroke="#D9C49A" stroke-width="8" stroke-linecap="round"/>
            <rect x="42" y="30" width="136" height="112" rx="52" fill="url(#g-white)" stroke="#E4DCCB" stroke-width="2"/>
            <rect x="26" y="74" width="24" height="48" rx="12" fill="url(#g-gold)"/>
            <rect x="170" y="74" width="24" height="48" rx="12" fill="url(#g-gold)"/>
            <circle cx="38" cy="98" r="5" fill="#FFF2D0"/>
            <circle cx="182" cy="98" r="5" fill="#FFF2D0"/>
            <rect x="58" y="52" width="104" height="72" rx="32" fill="#14181C"/>
            <path d="M72 63c14-6 40-8 62-2" stroke="#ffffff" stroke-opacity=".2" stroke-width="5" fill="none" stroke-linecap="round"/>
            <g class="hb-eyes" fill="none" stroke="#7FF5E1" stroke-width="5" stroke-linecap="round">
                <path d="M80 96q9-16 18 0"/>
                <path d="M122 96q9-16 18 0"/>
            </g>
            <path class="hb-smile" d="M100 108q10 8 20 0" fill="none" stroke="#7FF5E1" stroke-width="3.500" stroke-linecap="round"/>
        </g>
    </g>
</svg>
