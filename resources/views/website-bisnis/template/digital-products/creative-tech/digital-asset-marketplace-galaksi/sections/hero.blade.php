@php $p1 = $all->first(); $mx = $all->firstWhere('slug', 'cosmos-dashboard-ui-kit'); @endphp
<section class="hero" id="hero">
    <div class="hero-bg" id="heroBg" style="background-image:url('{{ $img('backgrounds/hero-planet-4k.jpg') }}')" aria-hidden="true"></div>
    <div class="wrap">
        <div>
            <span class="pill reveal"><b>BARU</b> Rekomendasi AI &amp; lisensi instan untuk semua aset</span>
            <h1 class="reveal" style="--d:.08s">Temukan Aset Digital dari <span class="gt">Galaksi Kreator</span></h1>
            <p class="lead reveal" style="--d:.16s">Model 3D, UI kit, template web, ilustrasi, ikon, audio, dan motion premium — dikurasi, berlisensi jelas, dan siap diunduh dalam hitungan detik.</p>

            <form class="hero-search reveal" style="--d:.24s" action="{{ $u('explore-assets') }}" method="get" role="search">
                <label class="sf">{{ $ic('search') }}<input type="search" name="q" placeholder="Cari model 3D, UI kit, musik…" autocomplete="off" aria-label="Cari aset" data-open-search-on-focus></label>
                <select name="cat" aria-label="Kategori">
                    <option value="">Semua Kategori</option>
                    @foreach ($dam['categories'] as $slug => $c)<option value="{{ $slug }}">{{ $c['name'] }}</option>@endforeach
                </select>
                <button class="btn btn-primary" type="submit">Cari Aset {{ $ic('arrow', 'ico-sm') }}</button>
            </form>
            <div class="chip-row mt-5 reveal" style="--d:.3s">
                <span class="dim tiny self-center">Populer:</span>
                @foreach (['dashboard', 'spaceship', 'icons', 'ambient', 'laravel'] as $t)<a class="chip" href="{{ $u('explore-assets') }}?q={{ $t }}">{{ $t }}</a>@endforeach
            </div>
            <div class="hero-stats reveal" style="--d:.36s">
                <div><strong data-count="12400" data-suffix="+">0</strong><span>Aset Premium</span></div>
                <div><strong data-count="3800" data-suffix="+">0</strong><span>Kreator Aktif</span></div>
                <div><strong data-count="96" data-suffix="K">0</strong><span>Unduhan</span></div>
            </div>
        </div>

        <div class="hero-float" aria-hidden="true">
            <div class="hf-card hf-1" data-depth="18">
                <img src="{{ $img($p1['img']) }}" alt="" width="1280" height="720">
                <h4>{{ $p1['title'] }}</h4>
                <div class="row"><span class="price" style="font-size:17px">{{ $rp($p1['price']) }}</span><span class="badge b-hot">Trending</span></div>
            </div>
            <div class="hf-card hf-2" data-depth="-14">
                <div class="flex items-center gap-3"><span class="rec-ico" style="width:42px;height:42px;border-radius:13px;background:var(--grad);display:grid;place-items:center">{{ $ic('sparkle') }}</span><div><b>AI Match 98%</b><p class="dim tiny">Cocok untuk proyekmu</p></div></div>
            </div>
            <div class="hf-card hf-3" data-depth="24">
                <img src="{{ $img($mx['img']) }}" alt="" width="1280" height="720">
                <div class="row"><span>{{ $stars($mx['rating']) }}</span><b>{{ number_format($mx['sales'], 0, ',', '.') }} terjual</b></div>
            </div>
        </div>
    </div>
</section>
<div class="marquee" aria-hidden="true">
    <div class="marquee-track">
        @for ($i = 0; $i < 2; $i++)
            @foreach ($dam['categories'] as $c)<span>{{ $ic($c['icon']) }} {{ $c['name'] }}</span>@endforeach
            <span>{{ $ic('shield') }} Lisensi Jelas</span><span>{{ $ic('bolt') }} Unduh Instan</span><span>{{ $ic('crown') }} Kurasi Ketat</span>
        @endfor
    </div>
</div>
