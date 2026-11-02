@php $preview = $preview ?? false; @endphp

@if ($preview)
<section class="ta-section ta-dest" aria-labelledby="dest-title">
    <div class="ta-container ta-dest__grid">
        <div class="ta-dest__intro">
            <img class="ta-dest__leaf" src="{{ $img('leaf-tl.png') }}" alt="" aria-hidden="true" loading="lazy">
            <span class="ta-ico-circle"><svg class="ta-i" aria-hidden="true"><use href="#i-leaf"/></svg></span>
            <p class="ta-eyebrow">Jelajahi Destinasi</p>
            <h2 class="ta-title" id="dest-title">Destinasi Populer</h2>
            <p class="ta-lead">Temukan destinasi impianmu di berbagai penjuru dunia, dari keindahan alam hingga kekayaan budaya.</p>
            <a class="ta-btn ta-btn--primary" href="{{ $r('destinasi') }}">Lihat Semua Destinasi <svg class="ta-i ta-i--sm" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        </div>

        <ul class="ta-dest__cards">
            @foreach ($cfg['destinations'] as $d)
                <li>
                    <a class="ta-dcard" href="{{ $r('destinasi') }}#{{ $d['slug'] }}">
                        <img src="{{ $img($d['image']) }}" alt="{{ $d['name'] }}, {{ $d['country'] }}" loading="lazy">
                        <span class="ta-dcard__label">
                            <svg class="ta-i ta-dcard__pin" aria-hidden="true"><use href="#i-pin"/></svg>
                            <span><strong>{{ $d['name'] }}</strong><small>{{ $d['country'] }}</small></span>
                            <span class="ta-dcard__go" aria-hidden="true"><svg class="ta-i" aria-hidden="true"><use href="#i-arrow-right"/></svg></span>
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@else
<section class="ta-section" aria-label="Katalog destinasi">
    <div class="ta-container">
        <div class="ta-filter" data-ta-filter role="group" aria-label="Filter destinasi">
            <button type="button" class="ta-chip is-active" data-filter="all">Semua</button>
            <button type="button" class="ta-chip" data-filter="Domestik">Domestik</button>
            <button type="button" class="ta-chip" data-filter="Internasional">Internasional</button>
        </div>

        <div class="ta-dfull" data-ta-filter-list>
            @foreach ($cfg['destinations'] as $d)
                <article class="ta-dfull__item" id="{{ $d['slug'] }}" data-cat="{{ $d['group'] }}">
                    <div class="ta-dfull__media">
                        <img src="{{ $img($d['image']) }}" alt="{{ $d['name'] }}, {{ $d['country'] }}" loading="lazy">
                        <span class="ta-tag ta-tag--float">{{ $d['group'] }}</span>
                    </div>
                    <div class="ta-dfull__body">
                        <p class="ta-dfull__loc"><svg class="ta-i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $d['country'] }}</p>
                        <h3>{{ $d['name'] }}</h3>
                        <p>{{ $d['description'] }}</p>
                        <ul class="ta-taglist">
                            @foreach ($d['highlights'] as $h)
                                <li>{{ $h }}</li>
                            @endforeach
                        </ul>
                        <dl class="ta-dfull__meta">
                            <div><dt>Waktu terbaik</dt><dd>{{ $d['best_time'] }}</dd></div>
                            <div><dt>Mulai dari</dt><dd>@if ($d['from_price']) Rp {{ number_format($d['from_price'], 0, ',', '.') }} @else Hubungi kami @endif</dd></div>
                        </dl>
                        <div class="ta-actions">
                            @if ($d['package'])
                                <a class="ta-btn ta-btn--primary ta-btn--sm" href="{{ $r('paket-tour') }}?destinasi={{ $d['slug'] }}">Lihat Paket</a>
                            @endif
                            <a class="ta-btn ta-btn--ghost ta-btn--sm" href="{{ $r('booking-inquiry') }}?destinasi={{ $d['slug'] }}">Tanya Destinasi</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif
