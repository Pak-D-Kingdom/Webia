@extends($v.'.layouts.app')

@section('title', 'Laporan Dampak - '.$f['brand']['name'].' '.$f['brand']['suffix'])
@section('body_class', 'page-inner page-impact')

@section('content')
    @include($v.'.partials.page-header', ['crumb' => 'Dampak', 'title' => 'Laporan Dampak Kami', 'lead' => $f['impact']['subtitle']])

    <div class="hf-container hf-page">
        <section class="hf-section hf-section--tight" data-reveal>
            <ul class="hf-grid hf-grid--3 hf-bigstats">
                @foreach($f['impact']['stats'] as $s)
                    <li class="hf-card hf-card--pad">
                        <strong class="hf-bigstat"><span data-count="{{ $s['value'] }}">{{ $s['display'] }}</span>{{ $s['suffix'] }}</strong>
                        <span>{{ $s['label'] }}</span>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="hf-split hf-split--map" data-reveal>
            <div class="hf-card hf-card--pad hf-impactmap">
                <h2 class="hf-h3">Sebaran program di Indonesia</h2>
                @include($v.'.partials.map')
            </div>
            <div class="hf-card hf-card--pad">
                <h2 class="hf-h3">Penerima manfaat per tahun</h2>
                <ul class="hf-bars" aria-label="Grafik penerima manfaat per tahun">
                    @foreach($f['impact']['years'] as $y)
                        <li style="--h: {{ $y['height'] }}%">
                            <span class="hf-bars__val">{{ $y['value'] }}</span>
                            <span class="hf-bars__bar"></span>
                            <span class="hf-bars__year">{{ $y['year'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section class="hf-section" data-reveal>
            <div class="hf-split">
                <div class="hf-card hf-card--pad">
                    <h2 class="hf-h3">Kontribusi per program</h2>
                    <ul class="hf-progress">
                        @foreach($f['impact']['breakdown'] as $b)
                            <li>
                                <div class="hf-progress__row"><span>{{ $b['label'] }}</span><strong>{{ $b['percent'] }}%</strong></div>
                                <div class="hf-progress__track"><span style="--w: {{ $b['percent'] }}%"></span></div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="hf-card hf-card--pad">
                    <h2 class="hf-h3">Lebih dari angka</h2>
                    <ul class="hf-grid hf-grid--3 hf-extra">
                        @foreach($f['impact']['extra'] as $e)
                            <li><strong>{{ $e['value'] }}</strong><span>{{ $e['label'] }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <section class="hf-section" data-reveal>
            <header class="hf-section__head"><span class="hf-eyebrow">Cerita lapangan</span><h2 class="hf-h2">Perubahan yang terlihat nyata</h2></header>
            <div class="hf-grid hf-grid--2">
                @foreach($f['impact']['stories'] as $st)
                    <article class="hf-card hf-card--pad hf-story">
                        <svg class="hf-i hf-value__icon" aria-hidden="true"><use href="#i-heart"/></svg>
                        <h3 class="hf-h3">{{ $st['title'] }}</h3>
                        <p>{{ $st['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="hf-cta" data-reveal>
            <div><h2 class="hf-h2">Ingin melihat laporan keuangannya?</h2><p>Kami membuka laporan penggunaan dana secara transparan.</p></div>
            <div class="hf-cta__actions"><a class="hf-btn hf-btn--dark" href="{{ route($rp.'transparency') }}">Lihat Laporan <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a></div>
        </section>
    </div>
@endsection
