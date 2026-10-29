{{-- PRODUCT DIMENSIONS --}}
@php $preview = $preview ?? false; $d = $cfg['dimensions']; $s = $d['sample']; @endphp

@if ($preview)
    <article class="fm-pv fm-pv--dims fm-card" data-fm-reveal>
        <div class="fm-pv__lead">
            <p class="fm-eyebrow">{{ $d['eyebrow'] }}</p>
            <h2 class="fm-h3">{{ $d['title'] }}</h2>
            <p class="fm-pv__text">{{ $d['text'] }}</p>
            <a class="fm-btn fm-btn--dark fm-btn--sm" href="{{ $route('dimensions') }}">{{ $d['cta'] }}
                <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
        <svg class="fm-pv__art fm-pv__art--dims" viewBox="0 0 220 190" role="img" aria-label="{{ $s['name'] }} {{ $s['w'] }} x {{ $s['d'] }} x {{ $s['h'] }} cm">
            <g class="fm-dimline">
                <path d="M118 6v44M154 6v44"/><path d="m114 14 4-8 4 8M150 14l4-8 4 8" />
                <path d="M26 56v100M26 56h10M26 156h10"/>
                <path d="M62 176h120M62 170v12M182 170v12"/>
                <path d="M196 70v90M190 70h12M190 160h12"/>
            </g>
            <g class="fm-cab">
                <rect x="62" y="70" width="120" height="80" rx="4" class="fm-cab__body"/>
                <rect x="68" y="76" width="54" height="30" rx="2" class="fm-cab__door"/><rect x="68" y="110" width="54" height="30" rx="2" class="fm-cab__door"/>
                <rect x="126" y="76" width="50" height="64" rx="2" class="fm-cab__door"/>
                <path d="M88 91h10M88 125h10M146 108h10"/>
                <path d="M72 150l-3 14M172 150l3 14" class="fm-cab__leg"/>
            </g>
            <g class="fm-dimtxt">
                <text x="136" y="30" text-anchor="middle">{{ $s['d'] }} cm</text>
                <text x="20" y="110" text-anchor="middle" transform="rotate(-90 20 110)">{{ $s['h'] }} cm</text>
                <text x="122" y="186" text-anchor="middle">{{ $s['w'] }} cm</text>
            </g>
        </svg>
    </article>
@else
    <section class="fm-section" data-fm-dims>
        <div class="fm-container">
            <div class="fm-tabs" role="tablist" aria-label="Kategori furniture">
                @foreach ($d['groups'] as $slug => $g)
                    <button type="button" class="fm-tab {{ $loop->first ? 'is-active' : '' }}" role="tab" data-fm-dim-tab="{{ $slug }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $g['name'] }}</button>
                @endforeach
            </div>

            <div class="fm-dims">
                <figure class="fm-card fm-dims__fig">
                    <svg viewBox="0 0 360 260" class="fm-dimsvg" role="img" aria-label="Diagram ukuran produk" data-fm-dim-svg>
                        <g class="fm-dimline" data-fm-dim-lines></g>
                        <rect class="fm-cab__body" data-fm-dim-rect x="80" y="40" width="200" height="140" rx="6"/>
                        <g class="fm-dimtxt" data-fm-dim-texts></g>
                    </svg>
                    <figcaption data-fm-dim-caption>Pilih tipe pada tabel untuk melihat diagram ukurannya.</figcaption>
                </figure>

                <div class="fm-dims__table fm-card">
                    <h3 class="fm-h4" data-fm-dim-title>{{ array_values($d['groups'])[0]['name'] }}</h3>
                    <div class="fm-tablewrap">
                        <table class="fm-table">
                            <thead><tr><th scope="col">Tipe</th><th scope="col">Panjang</th><th scope="col">Lebar / Dalam</th><th scope="col">Tinggi</th></tr></thead>
                            <tbody data-fm-dim-body>
                                @foreach (array_values($d['groups'])[0]['rows'] as $r)
                                    <tr><th scope="row">{{ $r[0] }}</th><td>{{ $r[1] }} cm</td><td>{{ $r[2] }} cm</td><td>{{ $r[3] }} cm</td></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="fm-note">{{ $d['note'] }}</p>
                    <a class="fm-btn fm-btn--dark fm-btn--sm" href="{{ $route('custom-order') }}">Pesan Ukuran Custom
                        <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </div>
            </div>
        </div>
    </section>

    <section class="fm-section fm-section--tint">
        <div class="fm-container">
            <header class="fm-sechead"><p class="fm-eyebrow">PANDUAN UKURAN</p><h2 class="fm-h2">Tips memilih ukuran yang tepat</h2></header>
            <ol class="fm-steps fm-steps--3">
                @foreach ($d['tips'] as $i => $t)
                    <li class="fm-card fm-step" data-fm-reveal><span class="fm-step__n">{{ $i + 1 }}</span><h3>{{ $t[0] }}</h3><p>{{ $t[1] }}</p></li>
                @endforeach
            </ol>
        </div>
    </section>
    @include($ns.'.partials.cta-band')
@endif
