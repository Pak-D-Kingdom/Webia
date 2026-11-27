@php
    $sats = [['dot', '#22d3ee', 235, 73, 16, 0], ['cube', '#e879f9', 265, 82, 24, -7], ['dot', '#e879f9', 290, 90, 20, -3], ['wave', '#22d3ee', 235, 73, 18, -11], ['film', '#fbbf24', 290, 90, 28, -15], ['dot', '#fbbf24', 265, 82, 13, -5]];
@endphp
<section class="hero" id="hero">
    <div class="hero-bg" id="heroBg" style="background-image:url('{{ $img('backgrounds/hero-planet-4k.jpg') }}')" aria-hidden="true">
        <div class="hero-orbit" id="heroOrbit">
            <span class="orb-glow"></span><span class="orb-pulse"></span><span class="orb-pulse"></span><span class="orb-pulse"></span>
            <svg class="orb-svg" viewBox="-300 -300 600 600">
                <g transform="rotate(18)">
                    <ellipse class="o1" rx="235" ry="73"/><ellipse class="o2" rx="265" ry="82"/><ellipse class="o3" rx="290" ry="90"/>
                    @foreach ($sats as $s)
                        @php $path = 'M' . $s[2] . ',0 A' . $s[2] . ',' . $s[3] . ' 0 1,1 -' . $s[2] . ',0 A' . $s[2] . ',' . $s[3] . ' 0 1,1 ' . $s[2] . ',0'; @endphp
                        @if ($s[0] === 'dot')
                            <g class="sat" style="color:{{ $s[1] }}"><circle r="5" fill="currentColor"/><circle r="11" fill="currentColor" opacity=".2"/><animateMotion dur="{{ $s[4] }}s" begin="{{ $s[5] }}s" repeatCount="indefinite" path="{{ $path }}"/></g>
                        @else
                            <g class="sat" style="color:{{ $s[1] }}"><circle r="16" fill="#120a35" stroke="currentColor" stroke-width="1.6"/><g transform="translate(-8,-8) scale(.67)" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $dam['icons'][$s[0]] !!}</g><animateMotion dur="{{ $s[4] }}s" begin="{{ $s[5] }}s" repeatCount="indefinite" path="{{ $path }}"/></g>
                        @endif
                    @endforeach
                </g>
            </svg>
        </div>
    </div>
    <canvas class="hero-fx" id="heroFx" aria-hidden="true"></canvas>
    <div class="hero-beam" aria-hidden="true"></div>

    <div class="wrap">
        <div class="hero-content">
            <span class="pill reveal"><b>BARU</b> Rekomendasi AI &amp; lisensi instan untuk semua aset</span>
            <h1 class="hero-title" aria-label="Temukan Aset Digital dari Galaksi Kreator">
                @foreach (explode(' ', 'Temukan Aset Digital dari') as $i => $w)<span class="w" style="--i:{{ $i }}" aria-hidden="true">{{ $w }}</span> @endforeach
                <span class="gt-line">@foreach (explode(' ', 'Galaksi Kreator') as $i => $w)<span class="w gw" style="--i:{{ $i + 4 }}" aria-hidden="true">{{ $w }}</span> @endforeach</span>
            </h1>
            <p class="hero-type reveal" style="--d:.2s">Cari <span class="typed" id="heroTyped" data-words="{{ json_encode(['Model 3D', 'UI Kit', 'Template Web', 'Musik & SFX', 'Motion Graphics', 'E-Book & Kursus']) }}">Model 3D</span><i class="caret"></i></p>
            <p class="lead reveal" style="--d:.28s">Model 3D, UI kit, template web, ilustrasi, ikon, audio, dan motion premium — dikurasi, berlisensi jelas, dan siap diunduh dalam hitungan detik.</p>

            <form class="hero-search reveal" style="--d:.36s" action="{{ $u('explore-assets') }}" method="get" role="search" autocomplete="off">
                <label class="sf">{{ $ic('search') }}<input type="search" name="q" id="heroQ" placeholder="Cari model 3D, UI kit, musik gratis…" aria-label="Cari aset" aria-controls="heroSuggest"></label>
                <select name="cat" aria-label="Kategori">
                    <option value="">Semua Kategori</option>
                    @foreach ($dam['categories'] as $slug => $c)<option value="{{ $slug }}">{{ $c['name'] }}</option>@endforeach
                </select>
                <button class="btn btn-primary" type="submit">Cari Aset {{ $ic('arrow', 'ico-sm') }}</button>
                <div class="hero-suggest" id="heroSuggest" role="listbox" hidden></div>
            </form>
            <div class="chip-row mt-5 reveal" style="--d:.44s">
                <span class="dim tiny self-center">Populer:</span>
                @foreach (['dashboard', 'spaceship', 'icons', 'ambient', 'laravel'] as $t)<a class="chip" href="{{ $u('explore-assets') }}?q={{ $t }}">{{ $t }}</a>@endforeach
            </div>
            <div class="hero-stats reveal" style="--d:.52s">
                <div><strong data-count="12400" data-suffix="+">0</strong><span>Aset Premium</span></div>
                <div><strong data-count="3800" data-suffix="+">0</strong><span>Kreator Aktif</span></div>
                <div><strong data-count="96" data-suffix="K">0</strong><span>Unduhan</span></div>
            </div>
        </div>
    </div>
    <button type="button" class="scroll-cue" data-scroll-to="#categories" aria-label="Gulir ke kategori"><span class="mouse"><i></i></span>Gulir</button>
</section>
<div class="marquee" aria-hidden="true">
    <div class="marquee-track">
        @for ($i = 0; $i < 2; $i++)
            @foreach ($dam['categories'] as $c)<span>{{ $ic($c['icon']) }} {{ $c['name'] }}</span>@endforeach
            <span>{{ $ic('shield') }} Lisensi Jelas</span><span>{{ $ic('bolt') }} Unduh Instan</span><span>{{ $ic('crown') }} Kurasi Ketat</span>
        @endfor
    </div>
</div>
