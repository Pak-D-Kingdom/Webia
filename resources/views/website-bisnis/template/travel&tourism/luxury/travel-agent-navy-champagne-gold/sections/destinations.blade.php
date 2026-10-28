{{-- Destination catalog. $mode: 'preview' (beranda) | 'full' (halaman Destinasi) --}}
@php
    $full    = ($mode ?? 'preview') === 'full';
    $regions = array_values(array_unique(array_column($t['destinations'], 'region')));
@endphp

@if (! $full)
    <section class="ga-dest" aria-labelledby="ga-dest-title">
        <div class="ga-dest__head">
            <span class="ga-emblem">{!! $icon('compass') !!}</span>
            <div>
                <p class="ga-kicker">Destination Catalog</p>
                <h2 id="ga-dest-title">Destinasi Populer</h2>
                <p>Jelajahi berbagai destinasi eksotis di seluruh dunia, dari pantai tropis hingga kota bersejarah.</p>
                <a class="ga-link" href="{{ $url('destinasi') }}">Lihat Semua Destinasi {!! $icon('arrow') !!}</a>
            </div>
        </div>
        <ul class="ga-dest__cards">
            @foreach ($t['destinations'] as $d)
                <li>
                    <a class="ga-dcard" href="{{ $url('destinasi') }}#{{ $d['slug'] }}">
                        <img src="{{ $img($d['image']) }}" alt="{{ $d['name'] }}, {{ $d['country'] }}" loading="lazy" decoding="async">
                        <span class="ga-dcard__shade" aria-hidden="true"></span>
                        <span class="ga-dcard__pin">{!! $icon('pin') !!}</span>
                        <span class="ga-dcard__name"><strong>{{ $d['name'] }}</strong><small>{{ $d['country'] }}</small></span>
                        <span class="ga-dcard__go">{!! $icon('arrow') !!}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
@else
    <section class="ga-block" aria-label="Katalog destinasi">
        <div class="ga-container">
            <div class="ga-filter" role="group" aria-label="Filter wilayah" data-filter-group>
                <button type="button" class="is-active" data-filter="all">Semua</button>
                @foreach ($regions as $r)
                    <button type="button" data-filter="{{ $r }}">{{ $r }}</button>
                @endforeach
            </div>

            <ul class="ga-dgrid">
                @foreach ($t['destinations'] as $d)
                    <li id="{{ $d['slug'] }}" data-filter-item data-value="{{ $d['region'] }}">
                        <article class="ga-dfull">
                            <div class="ga-dfull__img">
                                <img src="{{ $img($d['image']) }}" alt="{{ $d['name'] }}, {{ $d['country'] }}" loading="lazy" decoding="async">
                                <span class="ga-dcard__shade" aria-hidden="true"></span>
                                <span class="ga-dcard__pin">{!! $icon('pin') !!}</span>
                                <span class="ga-dcard__name"><strong>{{ $d['name'] }}</strong><small>{{ $d['country'] }}</small></span>
                            </div>
                            <div class="ga-dfull__body">
                                <p class="ga-tag">{{ $d['tag'] }}</p>
                                <p>{{ $d['desc'] }}</p>
                                <ul class="ga-pills">
                                    @foreach ($d['highlights'] as $hl)<li>{{ $hl }}</li>@endforeach
                                </ul>
                                <dl class="ga-facts">
                                    <div><dt>Waktu terbaik</dt><dd>{{ $d['best_time'] }}</dd></div>
                                    <div><dt>Mulai dari</dt><dd class="ga-gold-text">{{ $idr($d['from']) }}</dd></div>
                                </dl>
                                <div class="ga-actions">
                                    <a class="ga-btn ga-btn--gold ga-btn--sm" href="{{ $url('paket') }}">Lihat Paket</a>
                                    <a class="ga-btn ga-btn--ghost ga-btn--sm" href="{{ $url('inquiry') }}?destinasi={{ urlencode($d['name']) }}">Inquiry</a>
                                </div>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif
