{{-- Lambang Nur Rahmat Travel (SVG inline, tajam di ukuran apa pun). Pakai: @include('...partials.emblem', ['gid' => 'unik']) --}}
<svg class="uh-emblem" viewBox="0 0 100 112" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="{{ $gid }}-g" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#e6c488"/><stop offset=".55" stop-color="#b98a4e"/><stop offset="1" stop-color="#8e6532"/></linearGradient>
        <linearGradient id="{{ $gid }}-t" x1="0" y1="0" x2="0" y2="1"><stop offset="0" style="stop-color: var(--em-ga, #0f7a5b)"/><stop offset="1" style="stop-color: var(--em-gb, #094536)"/></linearGradient>
        <radialGradient id="{{ $gid }}-h" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="#f3dca4" stop-opacity=".55"/><stop offset="1" stop-color="#f3dca4" stop-opacity="0"/></radialGradient>
    </defs>
    <ellipse class="uh-emblem__halo" cx="50" cy="62" rx="46" ry="48" fill="url(#{{ $gid }}-h)"/>
    <path class="uh-emblem__frame" fill="none" stroke="url(#{{ $gid }}-g)" stroke-width="3.2" stroke-linejoin="round" stroke-linecap="round" d="M50 15C44 18 36 20 29 24C22 28 18 33 17 41C16 49 19 56 17.5 64C16 74 19 84 28 92C36 99 44 102 50 107C56 102 64 99 72 92C81 84 84 74 82.5 64C81 56 84 49 83 41C82 33 78 28 71 24C64 20 56 18 50 15Z"/>
    <circle cx="29.5" cy="30" r="1.9" fill="url(#{{ $gid }}-g)"/><circle cx="70.5" cy="30" r="1.9" fill="url(#{{ $gid }}-g)"/>
    <g class="uh-emblem__star">
        <path fill="url(#{{ $gid }}-g)" d="M53.2 1.6A5.4 5.4 0 1 0 55 11.2A4.3 4.3 0 1 1 53.2 1.6Z"/>
        <path fill="url(#{{ $gid }}-g)" d="M57 3.2l.8 1.7 1.8.3-1.3 1.300.3 1.800-1.600-.9-1.600.9.3-1.800-1.300-1.300 1.800-.3z"/>
    </g>
    <g class="uh-emblem__lantern">
        <path fill="url(#{{ $gid }}-g)" d="M50 14C46 18 43.5 23 44.5 28C45 31 47 33 47 36H53C53 33 55 31 55.5 28C56.5 23 54 18 50 14Z"/>
        <path fill="url(#{{ $gid }}-g)" d="M48 36H52V43H48Z"/>
        <path fill="url(#{{ $gid }}-t)" d="M42.5 51C42.5 45.5 46 42 50 42C54 42 57.5 45.5 57.5 51Z"/>
        <path fill="url(#{{ $gid }}-g)" fill-rule="evenodd" d="M36 90V59C36 53.5 42 51 50 51C58 51 64 53.5 64 59V90ZM43.8 84H56.2V67C56.2 61.5 52.8 57.8 50 56C47.2 57.8 43.8 61.5 43.8 67Z"/>
        <rect x="33.5" y="90" width="33" height="5" rx="1.8" fill="url(#{{ $gid }}-g)"/>
    </g>
    <g class="uh-emblem__tassel uh-emblem__tassel--l">
        <circle cx="27" cy="43" r="2.3" fill="none" stroke="url(#{{ $gid }}-g)" stroke-width="1.5"/>
        <path fill="url(#{{ $gid }}-t)" d="M21.5 50C23.5 46.5 30.5 46.5 32.5 50L34.5 80C30 85 24 85 19.5 80Z"/>
        <path style="fill: var(--em-hi, #3fc29a)" fill-opacity=".55" d="M25 52C26.5 50.5 28.5 50.5 30 52L31 76C28.5 78 26.5 78 24.5 76Z"/>
    </g>
    <g class="uh-emblem__tassel uh-emblem__tassel--r">
        <circle cx="73" cy="43" r="2.3" fill="none" stroke="url(#{{ $gid }}-g)" stroke-width="1.5"/>
        <path fill="url(#{{ $gid }}-t)" d="M67.5 50C69.5 46.5 76.5 46.5 78.5 50L80.5 80C76 85 70 85 65.5 80Z"/>
        <path style="fill: var(--em-hi, #3fc29a)" fill-opacity=".55" d="M70 52C71.5 50.5 73.5 50.5 75 52L76 76C73.5 78 71.5 78 69.5 76Z"/>
    </g>
</svg>
