{{-- Destination catalog. $mode: 'preview' (beranda) | 'page' (halaman sendiri) --}}
@php $full = ($mode ?? 'preview') === 'page'; @endphp

@if (! $full)
    <section class="ta-section ta-section--leaf" aria-labelledby="ta-dest-title">
        <div class="ta-container ta-dests">
            <div class="ta-dests__intro">
                <p class="ta-eyebrow ta-eyebrow--icon">{{ $icon('plane') }} Destination Catalog</p>
                <h2 class="ta-h2" id="ta-dest-title">Destinasi Populer</h2>
                <p>Jelajahi keindahan alam, budaya, dan destinasi eksotis di berbagai belahan dunia.</p>
                <a class="ta-btn ta-btn--outline ta-btn--sm" href="{{ $routes['destinasi'] }}">Lihat Semua Destinasi {{ $icon('arrow') }}</a>
                <svg class="ta-flightpath" viewBox="0 0 160 70" aria-hidden="true">
                    <path d="M4 62C30 14 80 6 118 24" fill="none" stroke="#7fd3d6" stroke-width="1.6" stroke-dasharray="3 5" stroke-linecap="round"/>
                </svg>
            </div>

            <ul class="ta-dest-grid">
                @foreach ($ta['destinations'] as $d)
                    <li>
                        <a class="ta-dest" href="{{ $routes['paket-tour'] }}?dest={{ $d['slug'] }}" aria-label="Paket tour {{ $d['name'] }}, {{ $d['country'] }}">
                            <img src="{{ $img($d['image']) }}" alt="" loading="lazy">
                            <span class="ta-dest__label">
                                {{ $icon('pin') }}
                                <span><strong>{{ $d['name'] }}</strong><small>{{ $d['country'] }}</small></span>
                            </span>
                            <span class="ta-dest__go" aria-hidden="true">{{ $icon('arrow') }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@else
    <section class="ta-section" aria-label="Katalog destinasi">
        <div class="ta-container">
            <div class="ta-toolbar" data-ta-filter data-param="type">
                <div class="ta-chips" role="group" aria-label="Filter jenis destinasi">
                    <button type="button" class="ta-chip is-active" data-filter="*" aria-pressed="true">Semua</button>
                    <button type="button" class="ta-chip" data-filter="domestik" aria-pressed="false">Domestik</button>
                    <button type="button" class="ta-chip" data-filter="internasional" aria-pressed="false">Internasional</button>
                </div>
                <p class="ta-count" data-ta-count aria-live="polite"></p>

                <ul class="ta-grid ta-grid--dest" data-ta-items>
                    @foreach ($ta['destinations'] as $d)
                        <li class="ta-dcard" data-cat="{{ $d['type'] }}">
                            <a class="ta-dcard__media" href="{{ $routes['paket-tour'] }}?dest={{ $d['slug'] }}" tabindex="-1" aria-hidden="true">
                                <img src="{{ $img($d['image']) }}" alt="" loading="lazy">
                                <span class="ta-tag">{{ $d['type'] === 'domestik' ? 'Domestik' : 'Internasional' }}</span>
                            </a>
                            <div class="ta-dcard__body">
                                <h3>{{ $icon('pin') }} {{ $d['name'] }}, <span>{{ $d['country'] }}</span></h3>
                                <p>{{ $d['summary'] }}</p>
                                <ul class="ta-pills">
                                    @foreach ($d['highlights'] as $h)<li>{{ $h }}</li>@endforeach
                                </ul>
                                <p class="ta-dcard__best">{{ $icon('calendar') }} Waktu terbaik: <strong>{{ $d['best'] }}</strong></p>
                                <a class="ta-btn ta-btn--outline ta-btn--sm" href="{{ $routes['paket-tour'] }}?dest={{ $d['slug'] }}">Lihat Paket {{ $icon('arrow') }}</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif
