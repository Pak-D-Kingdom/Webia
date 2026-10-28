{{-- Layanan. $full=false: preview beranda | $full=true: halaman Layanan --}}
@php
    $full = $full ?? false;
    $si   = $c['services_intro'];
    $cats = collect($c['services'])->pluck('category')->unique()->values();
@endphp

@if (! $full)
<section class="rg-section rg-services" id="layanan" aria-labelledby="rgSvcTitle">
    <div class="rg-container rg-services__grid">
        <div class="rg-services__intro">
            <p class="rg-eyebrow">{{ $si['eyebrow'] }}</p>
            <h2 id="rgSvcTitle" class="rg-h2">{{ $si['title'] }}</h2>
            <p class="rg-lead">{{ $si['text'] }}</p>
            <a class="rg-btn rg-btn--primary" href="{{ route($rp . 'services') }}">Lihat Semua Layanan <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </div>

        <ul class="rg-svc-grid">
            @foreach ($c['services'] as $s)
                <li>
                    <a class="rg-card rg-svc" href="{{ route($rp . 'services') }}#{{ $s['slug'] }}">
                        <span class="rg-svc__img"><img src="{{ asset($c['images_dir'] . '/' . $s['image']) }}" alt="{{ $s['name'] }}" loading="lazy" width="550" height="295"></span>
                        <h3>{{ $s['name'] }}</h3>
                        <p>{{ $s['short'] }}</p>
                        <span class="rg-svc__foot">Mulai dari <strong>Rp {{ number_format($s['price'], 0, ',', '.') }}</strong><i class="bi bi-arrow-right" aria-hidden="true"></i></span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@else
<section class="rg-section" aria-labelledby="rgSvcTitle">
    <div class="rg-container">
        <div class="rg-toolbar">
            <div class="rg-chips" role="group" aria-label="Filter kategori" data-rg-filter="#rgSvcList">
                <button type="button" class="rg-chip is-active" data-filter="*">Semua</button>
                @foreach ($cats as $cat)
                    <button type="button" class="rg-chip" data-filter="{{ \Illuminate\Support\Str::slug($cat) }}">{{ $cat }}</button>
                @endforeach
            </div>
            <label class="rg-searchbox">
                <i class="bi bi-search" aria-hidden="true"></i>
                <span class="rg-sr">Cari layanan</span>
                <input type="search" placeholder="Cari layanan..." data-rg-search="#rgSvcList">
            </label>
        </div>

        <ul class="rg-svc-full" id="rgSvcList">
            @foreach ($c['services'] as $s)
                <li id="{{ $s['slug'] }}" data-cat="{{ \Illuminate\Support\Str::slug($s['category']) }}" data-text="{{ strtolower($s['name'] . ' ' . $s['short'] . ' ' . $s['desc']) }}">
                    <article class="rg-card rg-svcx">
                        <div class="rg-svcx__img"><img src="{{ asset($c['images_dir'] . '/' . $s['image']) }}" alt="{{ $s['name'] }}" loading="lazy" width="550" height="295"></div>
                        <div class="rg-svcx__body">
                            <span class="rg-pill">{{ $s['category'] }}</span>
                            <h2 class="rg-h3">{{ $s['name'] }}</h2>
                            <p>{{ $s['desc'] }}</p>
                            <ul class="rg-checks">
                                @foreach ($s['benefits'] as $b)<li><i class="bi bi-check2-circle" aria-hidden="true"></i>{{ $b }}</li>@endforeach
                            </ul>
                            <div class="rg-svcx__foot">
                                <div>
                                    <small>Mulai dari</small>
                                    <strong>Rp {{ number_format($s['price'], 0, ',', '.') }}</strong>
                                    <span><i class="bi bi-clock" aria-hidden="true"></i>{{ $s['duration'] }}</span>
                                </div>
                                <a class="rg-btn rg-btn--primary rg-btn--sm" href="{{ route($rp . 'appointment') }}?layanan={{ $s['slug'] }}">Booking</a>
                            </div>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
        <p class="rg-empty" data-filter-empty hidden><i class="bi bi-search-heart" aria-hidden="true"></i> Layanan tidak ditemukan. Coba kata kunci lain.</p>
    </div>
</section>
@endif
