{{-- PRODUCTION LEAD TIME --}}
@php $preview = $preview ?? false; $l = $cfg['lead_time']; @endphp

@if ($preview)
    <article class="fm-pv fm-pv--mini fm-card" data-fm-reveal>
        <span class="fm-pv__miniico"><img src="{{ $img($l['image']) }}" alt="" loading="lazy" decoding="async"></span>
        <div class="fm-pv__minibody">
            <h2 class="fm-h5">{{ $l['title'] }}</h2>
            <p>{{ $l['text'] }}</p>
            <a class="fm-btn fm-btn--dark fm-btn--xs" href="{{ $route('lead-time') }}">{{ $l['cta'] }}
                <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
    </article>
@else
    <section class="fm-section" data-fm-lead>
        <div class="fm-container fm-lead">
            <form class="fm-card fm-lead__form" data-fm-lead-form onsubmit="return false">
                <h2 class="fm-h4">Hitung estimasi produksi</h2>
                <div class="fm-fg"><label for="lt-type">Jenis furniture</label>
                    <select id="lt-type" name="type">
                        @foreach ($cfg['catalog']['items'] as $it)<option value="{{ $it['slug'] }}">{{ $it['name'] }}</option>@endforeach
                    </select></div>
                <div class="fm-fg"><label for="lt-cx">Tingkat kustomisasi</label>
                    <select id="lt-cx" name="cx">
                        @foreach ($l['complexity'] as $c)<option value="{{ $c['key'] }}">{{ $c['label'] }}</option>@endforeach
                    </select></div>
                <div class="fm-fg"><label for="lt-start">Perkiraan mulai produksi</label><input id="lt-start" name="start" type="date"></div>
                <div class="fm-lead__result" aria-live="polite">
                    <p class="fm-lead__label">Estimasi produksi</p>
                    <p class="fm-lead__days" data-fm-lead-days>–</p>
                    <p class="fm-lead__date" data-fm-lead-date></p>
                </div>
                <p class="fm-note">{{ $l['note'] }}</p>
                <a class="fm-btn fm-btn--dark fm-btn--sm" href="{{ $route('custom-order') }}">Mulai Custom Order
                    <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </form>

            <div class="fm-lead__side">
                <div class="fm-card">
                    <h2 class="fm-h4">Tahapan produksi</h2>
                    <ol class="fm-timeline">
                        @foreach ($l['stages'] as $i => $st)
                            <li><span class="fm-timeline__n">{{ $i + 1 }}</span>
                                <div><strong>{{ $st[0] }}</strong><em>{{ $st[1] }}</em><p>{{ $st[2] }}</p></div></li>
                        @endforeach
                    </ol>
                </div>
                <div class="fm-card">
                    <h2 class="fm-h4">Estimasi per jenis furniture</h2>
                    <div class="fm-tablewrap">
                        <table class="fm-table">
                            <thead><tr><th scope="col">Jenis</th><th scope="col">Ukuran standar</th></tr></thead>
                            <tbody>
                                @foreach ($cfg['catalog']['items'] as $it)
                                    <tr><th scope="row">{{ $it['name'] }}</th><td>{{ $l['days'][$it['slug']][0] }}–{{ $l['days'][$it['slug']][1] }} hari kerja</td></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include($ns.'.partials.cta-band')
@endif
