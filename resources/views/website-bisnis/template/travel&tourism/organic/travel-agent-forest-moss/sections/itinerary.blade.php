@php
    $preview = $preview ?? false;
    $first   = $cfg['packages'][0];
@endphp

@if ($preview)
<aside class="ta-card ta-itin" aria-labelledby="itin-title">
    <header class="ta-card__head">
        <span class="ta-ico-circle ta-ico-circle--sm"><svg class="ta-i" aria-hidden="true"><use href="#i-route"/></svg></span>
        <div>
            <h3 id="itin-title">Itinerary Perjalanan</h3>
            <p>Rincian perjalanan lengkap, dari hari pertama hingga hari terakhir.</p>
        </div>
    </header>
    <ol class="ta-itin__list">
        @foreach (array_slice($first['days'], 0, 3) as $i => $day)
            <li>
                <span class="ta-daypill">Hari {{ $i + 1 }}</span>
                <div>
                    <strong>{{ $day['title'] }}</strong>
                    <small><svg class="ta-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $day['note'] }}</small>
                </div>
            </li>
        @endforeach
    </ol>
    <a class="ta-btn ta-btn--outline ta-btn--sm" href="{{ $r('itinerary') }}">Lihat Detail Itinerary <svg class="ta-i ta-i--sm" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
</aside>
@else
<section class="ta-section" aria-label="Itinerary perjalanan">
    <div class="ta-container" data-ta-tabs>
        <div class="ta-tabs" role="tablist" aria-label="Pilih paket">
            @foreach ($cfg['packages'] as $i => $p)
                <button type="button" role="tab" class="ta-tab {{ $i === 0 ? 'is-active' : '' }}" id="tab-{{ $p['slug'] }}"
                        aria-selected="{{ $i === 0 ? 'true' : 'false' }}" aria-controls="{{ $p['slug'] }}" data-tab="{{ $p['slug'] }}">
                    {{ $p['name'] }}<small>{{ $p['duration'] }}</small>
                </button>
            @endforeach
        </div>

        @foreach ($cfg['packages'] as $i => $p)
            <div class="ta-tabpanel" role="tabpanel" id="{{ $p['slug'] }}" aria-labelledby="tab-{{ $p['slug'] }}" @if ($i !== 0) hidden @endif>
                <div class="ta-itinfull">
                    <aside class="ta-itinfull__side">
                        <img src="{{ $img($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy">
                        <h2>{{ $p['name'] }}</h2>
                        <p>{{ $p['summary'] }}</p>
                        <p class="ta-itinfull__price">Mulai dari <b>Rp {{ number_format($p['price'], 0, ',', '.') }}</b></p>
                        <a class="ta-btn ta-btn--primary ta-btn--block" href="{{ $r('booking-inquiry') }}?paket={{ $p['slug'] }}">Pesan Paket Ini</a>
                    </aside>

                    <ol class="ta-timeline">
                        @foreach ($p['days'] as $n => $day)
                            <li class="ta-timeline__item">
                                <span class="ta-daypill">Hari {{ $n + 1 }}</span>
                                <div class="ta-timeline__card">
                                    <h3>{{ $day['title'] }}</h3>
                                    <p class="ta-timeline__note">{{ $day['note'] }}</p>
                                    <ul>
                                        @foreach ($day['items'] as $it)
                                            <li><svg class="ta-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $it }}</li>
                                        @endforeach
                                    </ul>
                                    <p class="ta-timeline__meal"><svg class="ta-i" aria-hidden="true"><use href="#i-leaf"/></svg>{{ $day['meals'] }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif
