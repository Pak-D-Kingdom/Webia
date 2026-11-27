{{-- Maskot 3D "Nova" — Asset Crate Bot Galaksi (melayang dengan thruster, visor ekspresif, badge unduh, orbit kunci lisensi). Param: $mid --}}
@php($mid = $mid ?? 'm')
<svg class="mascot {{ $mclass ?? '' }}" viewBox="0 0 210 250" role="img" aria-label="Nova, maskot Astraly">
    <defs>
        <linearGradient id="{{ $mid }}-f" x1="0" y1="0" x2=".9" y2="1"><stop offset="0" stop-color="#b79bff"/><stop offset=".55" stop-color="#7240ee"/><stop offset="1" stop-color="#3a1b9c"/></linearGradient>
        <linearGradient id="{{ $mid }}-t" x1="0" y1="1" x2="1" y2="0"><stop offset="0" stop-color="#c9b2ff"/><stop offset="1" stop-color="#f6efff"/></linearGradient>
        <linearGradient id="{{ $mid }}-s" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#4d25bd"/><stop offset="1" stop-color="#1f0d5e"/></linearGradient>
        <linearGradient id="{{ $mid }}-v" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#1a1050"/><stop offset="1" stop-color="#090521"/></linearGradient>
        <linearGradient id="{{ $mid }}-e" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#cffafe"/><stop offset="1" stop-color="#22d3ee"/></linearGradient>
        <linearGradient id="{{ $mid }}-b" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fef3c7"/><stop offset="1" stop-color="#f59e0b"/></linearGradient>
        <linearGradient id="{{ $mid }}-h" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fff"/><stop offset="1" stop-color="#c4b5fd"/></linearGradient>
        <linearGradient id="{{ $mid }}-fl" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#e0f7ff"/><stop offset=".4" stop-color="#22d3ee"/><stop offset="1" stop-color="#8b5cf6" stop-opacity="0"/></linearGradient>
        <radialGradient id="{{ $mid }}-a"><stop offset="0" stop-color="#8b5cf6" stop-opacity=".5"/><stop offset="1" stop-color="#8b5cf6" stop-opacity="0"/></radialGradient>
        <radialGradient id="{{ $mid }}-g"><stop offset="0" stop-color="#a5f3fc"/><stop offset=".5" stop-color="#22d3ee" stop-opacity=".6"/><stop offset="1" stop-color="#22d3ee" stop-opacity="0"/></radialGradient>
        <filter id="{{ $mid }}-bl" x="-50%" y="-50%" width="200%" height="200%"><feGaussianBlur stdDeviation="3"/></filter>
    </defs>
    <circle class="m-glow" cx="105" cy="122" r="104" fill="url(#{{ $mid }}-a)"/>
    <ellipse class="m-shadow" cx="105" cy="240" rx="44" ry="6.5" fill="#000" opacity=".5"/>
    <g transform="rotate(-12 105 128)"><ellipse class="m-ring" cx="105" cy="128" rx="98" ry="24" fill="none" stroke="#22d3ee" stroke-opacity=".5" stroke-width="1.6" stroke-dasharray="3 8" stroke-linecap="round"/></g>
    <g class="m-flame"><path d="M91 188Q105 238 119 188Z" fill="url(#{{ $mid }}-fl)"/><path d="M98 188Q105 218 112 188Z" fill="#fff" opacity=".85"/></g>
    <ellipse cx="105" cy="186" rx="27" ry="7" fill="#1b0b55"/><ellipse cx="105" cy="185" rx="18" ry="4" fill="#22d3ee" opacity=".75"/>
    <path d="M154 84 L178 64 L178 160 L154 180Z" fill="url(#{{ $mid }}-s)" stroke="#341690" stroke-width="6" stroke-linejoin="round"/>
    <path d="M50 84 L74 64 L178 64 L154 84Z" fill="url(#{{ $mid }}-t)" stroke="#d8c9ff" stroke-width="6" stroke-linejoin="round"/>
    <rect x="50" y="84" width="104" height="96" rx="18" fill="url(#{{ $mid }}-f)"/>
    <rect x="52" y="86" width="100" height="92" rx="16" fill="none" stroke="#fff" stroke-opacity=".28" stroke-width="2"/>
    <path d="M56 92Q56 86 62 86H122Q92 112 56 132Z" fill="#fff" opacity=".12"/>
    <line x1="154" y1="90" x2="154" y2="176" stroke="#67e8f9" stroke-width="5" opacity=".6" filter="url(#{{ $mid }}-bl)"/><line x1="154" y1="90" x2="154" y2="176" stroke="#cffafe" stroke-width="2" stroke-linecap="round"/>
    <rect x="62" y="96" width="80" height="50" rx="17" fill="url(#{{ $mid }}-v)" stroke="#22d3ee" stroke-opacity=".55" stroke-width="1.5"/>
    <path d="M64 100H98L78 144H64Z" fill="#fff" opacity=".06"/>
    <g class="m-look">
        <rect x="76" y="106" width="19" height="27" rx="9.5" fill="#22d3ee" opacity=".55" filter="url(#{{ $mid }}-bl)"/><rect x="111" y="106" width="19" height="27" rx="9.5" fill="#22d3ee" opacity=".55" filter="url(#{{ $mid }}-bl)"/>
        <rect class="m-eye" x="78" y="108" width="15" height="23" rx="7.5" fill="url(#{{ $mid }}-e)"/><rect class="m-eye" x="113" y="108" width="15" height="23" rx="7.5" fill="url(#{{ $mid }}-e)"/>
        <circle cx="83" cy="114" r="3" fill="#fff"/><circle cx="118" cy="114" r="3" fill="#fff"/>
    </g>
    <path d="M93 138q12 8 24 0" fill="none" stroke="#22d3ee" stroke-width="3.4" stroke-linecap="round"/>
    <circle cx="71" cy="136" r="5" fill="#f472b6" opacity=".45"/><circle cx="135" cy="136" r="5" fill="#f472b6" opacity=".45"/>
    <circle class="m-led" cx="66" cy="164" r="3" fill="#34d399"/><circle class="m-led m-led2" cx="140" cy="164" r="3" fill="#e879f9"/>
    <circle class="m-pulse" cx="103" cy="163" r="13" fill="none" stroke="#fbbf24" stroke-width="2"/>
    <circle cx="103" cy="163" r="13" fill="url(#{{ $mid }}-b)" stroke="#fff" stroke-opacity=".6" stroke-width="2"/>
    <path d="M103 157v11m-5.5-5.5L103 168l5.5-5.5" fill="none" stroke="#451a03" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
    <line x1="114" y1="64" x2="114" y2="42" stroke="#d8c9ff" stroke-width="4" stroke-linecap="round"/><ellipse cx="114" cy="64" rx="7" ry="2.6" fill="#c4b5fd"/>
    <circle class="m-glow" cx="114" cy="32" r="15" fill="url(#{{ $mid }}-g)"/><circle cx="114" cy="32" r="6" fill="#cffafe"/>
    <path class="m-star" d="M114 6l2.6 6 6 2.6-6 2.6-2.6 6-2.6-6-6-2.6 6-2.6z" fill="#fde68a"/>
    <g class="m-hand"><circle cx="30" cy="130" r="11" fill="url(#{{ $mid }}-h)"/><ellipse cx="27" cy="126" rx="4" ry="3" fill="#fff" opacity=".8"/></g>
    <g class="m-wave"><circle cx="186" cy="118" r="11" fill="url(#{{ $mid }}-h)"/><circle cx="195" cy="108" r="4.5" fill="url(#{{ $mid }}-h)"/><ellipse cx="183" cy="114" rx="4" ry="3" fill="#fff" opacity=".8"/></g>
    <g transform="rotate(-12 105 128)">
        <g><circle r="9" fill="#2a1070" stroke="#fbbf24" stroke-width="1.6"/><g transform="translate(-6,-6) scale(.5)" fill="none" stroke="#fbbf24" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="15" r="4"/><path d="m11 12 9-9M16 7l3 3"/></g><animateMotion dur="10s" repeatCount="indefinite" path="M203,128 A98,24 0 1,1 7,128 A98,24 0 1,1 203,128"/></g>
        <g><circle r="9" fill="#0b2a4a" stroke="#22d3ee" stroke-width="1.6"/><g transform="translate(-6,-6) scale(.5)" fill="none" stroke="#22d3ee" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8zM14 3v5h5"/></g><animateMotion dur="10s" begin="-5s" repeatCount="indefinite" path="M203,128 A98,24 0 1,1 7,128 A98,24 0 1,1 203,128"/></g>
    </g>
</svg>
