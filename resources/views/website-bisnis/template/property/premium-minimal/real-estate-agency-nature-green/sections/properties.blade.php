@php
    $items = $items ?? $t['properties'];
    if (isset($limit)) { $items = array_slice($items, 0, $limit); }
    $isPreview = !empty($preview);
@endphp
<section class="panel" id="properties" aria-labelledby="h-properties">
    @if ($isPreview)
        <header class="panel__head">
            <div>
                <h2 id="h-properties" class="panel__title">Property Listing</h2>
                <p class="panel__sub">Temukan properti terbaik sesuai kebutuhan Anda</p>
            </div>
            <a class="link-all" href="{{ $r('properties') }}">Lihat Semua <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </header>
    @else
        <h2 id="h-properties" class="sr-only">Daftar properti</h2>
    @endif

    <div class="cards {{ $isPreview ? '' : 'cards--page' }}">
        @foreach ($items as $p)
            <article class="card">
                <div class="card__media media">
                    <img src="{{ $img($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy" data-fallback>
                    <span class="badge">For Sale</span>
                    <button class="fav" type="button" aria-pressed="false" aria-label="Simpan {{ $p['name'] }}" data-fav><svg class="i" aria-hidden="true"><use href="#i-heart"/></svg></button>
                </div>
                <div class="card__body">
                    <h3><a href="{{ $r('property', ['slug' => $p['slug']]) }}">{{ $p['name'] }}</a></h3>
                    <p class="card__loc"><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $p['city'] }}</p>
                    <ul class="card__meta" aria-label="Spesifikasi singkat">
                        <li><svg class="i" aria-hidden="true"><use href="#i-bed"/></svg><span class="sr-only">Kamar tidur</span>{{ $p['beds'] }}</li>
                        <li><svg class="i" aria-hidden="true"><use href="#i-bath"/></svg><span class="sr-only">Kamar mandi</span>{{ $p['baths'] }}</li>
                        <li><svg class="i" aria-hidden="true"><use href="#i-area"/></svg><span class="sr-only">Luas tanah</span>{{ $p['land'] }} m²</li>
                    </ul>
                    <div class="card__foot">
                        <strong>{{ $p['price'] }}</strong>
                        <a class="round-btn" href="{{ $r('property', ['slug' => $p['slug']]) }}" aria-label="View details: {{ $p['name'] }}"><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    @if (empty($items))
        <p class="empty">Properti tidak ditemukan. <a href="{{ $r('properties') }}">Tampilkan semua properti</a></p>
    @endif
</section>
