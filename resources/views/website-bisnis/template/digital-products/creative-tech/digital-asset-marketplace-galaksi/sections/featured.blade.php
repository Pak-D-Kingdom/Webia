<section class="section" id="featured">
    <div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => 'Featured Assets', 'title' => 'Aset <span class="gt">Pilihan</span> Minggu Ini', 'desc' => 'Aset paling diminati dengan kualitas teruji dan ulasan terbaik dari komunitas.', 'href' => $u('explore-assets'), 'label' => 'Jelajahi Semua'])
        @php $sp = $all->first(); $sp2 = $all->firstWhere('slug', 'cosmos-dashboard-ui-kit'); @endphp
        <div class="spot-head reveal"><span class="eyebrow">Sorotan Pekan Ini</span></div>
        <div class="spot-grid">
            <a href="{{ $aurl($sp) }}" class="spot-card reveal" data-tilt>
                <img src="{{ $img($sp['img']) }}" alt="{{ $sp['title'] }}" width="1280" height="720" loading="lazy">
                <div class="spot-body"><div class="flex items-center justify-between gap-3"><span class="badge b-hot">{{ $ic('fire', 'ico-sm') }} Trending</span><span class="dim tiny">{{ $cat($sp)['name'] }}</span></div><h3>{{ $sp['title'] }}</h3><div class="spot-foot"><span class="price">{{ $rp($sp['price']) }}</span><span class="btn btn-ghost btn-sm">Lihat Detail {{ $ic('arrow', 'ico-sm') }}</span></div></div>
            </a>
            <div class="spot-card spot-ai reveal" style="--d:.1s">
                <span class="spot-ico">{{ $ic('sparkle', 'ico-lg') }}</span>
                <h3>AI Match <span class="gt">98%</span></h3>
                <p class="muted">Cocok untuk proyekmu — biarkan AI memilihkan aset yang paling pas.</p>
                <div class="spot-meter"><i></i></div>
                <button type="button" class="btn btn-primary btn-sm" data-scroll-to="[data-ai-rec]">{{ $ic('sparkle', 'ico-sm') }} Coba Rekomendasi AI</button>
            </div>
            <a href="{{ $aurl($sp2) }}" class="spot-card reveal" style="--d:.2s" data-tilt>
                <img src="{{ $img($sp2['img']) }}" alt="{{ $sp2['title'] }}" width="1280" height="720" loading="lazy">
                <div class="spot-body"><div class="flex items-center justify-between gap-3">{{ $stars($sp2['rating']) }}<b>{{ number_format($sp2['sales'], 0, ',', '.') }} terjual</b></div><h3>{{ $sp2['title'] }}</h3><div class="spot-foot"><span class="price">{{ $rp($sp2['price']) }}</span><span class="btn btn-ghost btn-sm">Lihat Detail {{ $ic('arrow', 'ico-sm') }}</span></div></div>
            </a>
        </div>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4 mt-12">
            @foreach ($all->filter(fn ($a) => in_array('featured', $a['flags']))->take(8) as $a)
                <div class="reveal" style="--d:{{ $loop->index % 4 * .08 }}s">@include($v . '.partials.asset-card', ['a' => $a])</div>
            @endforeach
        </div>
        <div class="mt-12 reveal">@include($v . '.partials.ai-recommend')</div>
    </div>
</section>
