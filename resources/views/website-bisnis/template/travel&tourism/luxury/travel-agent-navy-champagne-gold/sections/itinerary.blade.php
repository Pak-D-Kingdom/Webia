{{-- Itinerary. $mode: 'preview' (kartu Bali 3 hari) | 'full' (tab per paket) --}}
@php $full = ($mode ?? 'preview') === 'full'; @endphp

@if (! $full)
    @php $first = $t['itineraries']['bali']; $shown = array_slice($first['days'], 0, 3); @endphp
    <section class="ga-card ga-itc" aria-labelledby="ga-itc-title">
        <header class="ga-card__head">
            <span class="ga-emblem ga-emblem--soft ga-emblem--sm">{!! $icon('calendar') !!}</span>
            <div>
                <h2 id="ga-itc-title">Itinerary Perjalanan</h2>
                <p>Rincian perjalanan lengkap, dari hari pertama hingga hari terakhir.</p>
            </div>
        </header>
        <p class="ga-itc__tag">{!! $icon('route') !!}<span>{{ $first['label'] }}</span></p>
        <ol class="ga-itc__list">
            @foreach ($shown as $i => $day)
                <li>
                    <span class="ga-itc__dot">{{ $i + 1 }}</span>
                    <div>
                        <span class="ga-itc__lbl">Hari {{ $i + 1 }}</span>
                        <strong>{{ $day['title'] }}</strong>
                        <small>{{ $day['desc'] }}</small>
                    </div>
                </li>
            @endforeach
        </ol>
        @if (count($first['days']) > count($shown))
            <p class="ga-itc__more">+ {{ count($first['days']) - count($shown) }} hari lainnya di halaman Itinerary</p>
        @endif
        <a class="ga-btn ga-btn--outline ga-btn--sm" href="{{ $url('itinerary') }}">Lihat Detail Itinerary {!! $icon('arrow') !!}</a>
    </section>
@else
    <section class="ga-block" aria-label="Itinerary per paket">
        <div class="ga-container">
            <div class="ga-tabs" data-tabs>
                <div class="ga-tabs__list" role="tablist" aria-label="Pilih paket tour">
                    @foreach ($t['itineraries'] as $key => $it)
                        <button type="button" role="tab" id="tab-{{ $key }}" aria-controls="panel-{{ $key }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}" data-tab="{{ $key }}"
                                @if (! $loop->first) tabindex="-1" @endif>{{ $it['label'] }}</button>
                    @endforeach
                </div>

                @foreach ($t['itineraries'] as $key => $it)
                    @php $pkg = collect($t['packages'])->firstWhere('slug', $key); @endphp
                    <div class="ga-tabs__panel" role="tabpanel" id="panel-{{ $key }}" aria-labelledby="tab-{{ $key }}" tabindex="0" @if (! $loop->first) hidden @endif>
                        <div class="ga-itin">
                            <ol class="ga-timeline">
                                @foreach ($it['days'] as $i => $day)
                                    <li>
                                        <span class="ga-day">Hari {{ $i + 1 }}</span>
                                        <div><h3>{{ $day['title'] }}</h3><p>{{ $day['desc'] }}</p></div>
                                    </li>
                                @endforeach
                            </ol>

                            @if ($pkg)
                                <aside class="ga-itin__aside">
                                    <img src="{{ $img($pkg['image']) }}" alt="{{ $pkg['name'] }}" loading="lazy" decoding="async">
                                    <div class="ga-itin__aside-body">
                                        <h3>{{ $pkg['name'] }}</h3>
                                        <p class="ga-muted">{{ $pkg['duration'] }}</p>
                                        <p class="ga-price">{{ $idr($pkg['price']) }} <small>/ orang</small></p>
                                        <a class="ga-btn ga-btn--gold ga-btn--sm" href="{{ $url('inquiry') }}?paket={{ urlencode($pkg['name']) }}&destinasi={{ urlencode($pkg['destination']) }}">Booking Paket Ini</a>
                                        <button class="ga-btn ga-btn--ghost ga-btn--sm" type="button" data-ai-open data-ai-ask="itinerary {{ $pkg['destination'] }}">Tanya AI Assistant</button>
                                    </div>
                                </aside>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
