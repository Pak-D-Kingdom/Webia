{{-- Tour packages. $mode: 'preview' | 'full' --}}
@php
    $full    = ($mode ?? 'preview') === 'full';
    $items   = $full ? $t['packages'] : array_slice($t['packages'], 0, 4);
    $regions = array_values(array_unique(array_column($t['packages'], 'region')));
    // Paket yang punya itinerary -> ke halaman Itinerary; selain itu -> Inquiry
    $detail  = fn ($p) => isset($t['itineraries'][$p['slug']])
        ? $url('itinerary') . '#' . $p['slug']
        : $url('inquiry') . '?paket=' . urlencode($p['name']);
@endphp

@if (! $full)
    <section class="ga-pk" aria-labelledby="ga-pk-title">
        <div class="ga-pk__head">
            <span class="ga-emblem ga-emblem--soft">{!! $icon('crown') !!}</span>
            <div>
                <h2 id="ga-pk-title">Paket Tour Unggulan</h2>
                <p>Paket tour terbaik dengan fasilitas premium dan pengalaman tak terlupakan.</p>
                <a class="ga-link" href="{{ $url('paket') }}">Lihat Semua Paket</a>
            </div>
        </div>
        <ul class="ga-pk__cards">
            @foreach ($items as $p)
                <li>
                    <article class="ga-pcard">
                        <img src="{{ $img($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy" decoding="async">
                        <div class="ga-pcard__body">
                            <h3>{{ $p['name'] }}</h3>
                            <p class="ga-muted">{{ $p['duration'] }}</p>
                            <ul class="ga-pfac">
                                <li>{!! $icon('bed') !!}<span>Hotel</span><span class="ga-stars" aria-label="Hotel bintang {{ $p['stars'] }}">{{ str_repeat('★', $p['stars']) }}</span></li>
                                <li>{!! $icon('plane') !!}<span>Transportasi</span></li>
                                <li>{!! $icon('fork') !!}<span>Makan</span></li>
                            </ul>
                            <p class="ga-price">{{ $idr($p['price']) }}</p>
                            <a class="ga-btn ga-btn--gold ga-btn--xs" href="{{ $detail($p) }}">Lihat Detail {!! $icon('arrow') !!}</a>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
    </section>
@else
    <section class="ga-block" aria-label="Daftar paket tour">
        <div class="ga-container">
            <div class="ga-filter" role="group" aria-label="Filter wilayah" data-filter-group>
                <button type="button" class="is-active" data-filter="all">Semua</button>
                @foreach ($regions as $r)
                    <button type="button" data-filter="{{ $r }}">{{ $r }}</button>
                @endforeach
            </div>

            <ul class="ga-pgrid">
                @foreach ($items as $p)
                    <li data-filter-item data-value="{{ $p['region'] }}">
                        <article class="ga-pcard ga-pcard--full">
                            <img src="{{ $img($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy" decoding="async">
                            <div class="ga-pcard__body">
                                <p class="ga-tag">{{ $p['destination'] }}</p>
                                <h3>{{ $p['name'] }}</h3>
                                <p class="ga-muted">{{ $p['duration'] }}</p>
                                <ul class="ga-checks">
                                    @foreach ($p['highlights'] as $hl)<li>{!! $icon('check') !!}<span>{{ $hl }}</span></li>@endforeach
                                </ul>
                                <ul class="ga-pfac ga-pfac--row">
                                    <li>{!! $icon('bed') !!}<span>Hotel</span><span class="ga-stars" aria-label="Hotel bintang {{ $p['stars'] }}">{{ str_repeat('★', $p['stars']) }}</span></li>
                                    <li>{!! $icon('plane') !!}<span>Transportasi</span></li>
                                    <li>{!! $icon('fork') !!}<span>Makan</span></li>
                                </ul>
                                <div class="ga-pcard__foot">
                                    <p class="ga-price">{{ $idr($p['price']) }} <small>/ orang</small></p>
                                    <div class="ga-actions">
                                        <a class="ga-btn ga-btn--gold ga-btn--xs" href="{{ $detail($p) }}">Lihat Detail</a>
                                        <a class="ga-btn ga-btn--ghost ga-btn--xs" href="{{ $url('inquiry') }}?paket={{ urlencode($p['name']) }}&destinasi={{ urlencode($p['destination']) }}">Inquiry</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif
