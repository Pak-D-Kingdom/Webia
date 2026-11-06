@extends($v.'.layouts.app')

@section('title', 'Transparansi Keuangan - '.$f['brand']['name'].' '.$f['brand']['suffix'])
@section('body_class', 'page-inner page-transparency')

@section('content')
    @include($v.'.partials.page-header', ['crumb' => 'Transparansi', 'title' => 'Laporan Transparansi Keuangan', 'lead' => $f['transparency']['summary']])

    <div class="hf-container hf-page">
        <section class="hf-section hf-section--tight" data-reveal>
            <ul class="hf-grid hf-grid--3 hf-bigstats">
                @foreach($f['transparency']['totals'] as $t)
                    <li class="hf-card hf-card--pad"><strong class="hf-bigstat">{{ $t['value'] }}</strong><span>{{ $t['label'] }}</span></li>
                @endforeach
            </ul>
        </section>

        <section class="hf-split" data-reveal>
            <div class="hf-card hf-card--pad">
                <h2 class="hf-h3">Alokasi penggunaan dana</h2>
                <div class="hf-donutwrap">
                    <div class="hf-donut" data-donut="@foreach($f['transparency']['allocation'] as $a){{ $a['percent'] }}:{{ $a['color'] }}@if(!$loop->last),@endif @endforeach" role="img" aria-label="Diagram alokasi dana: program 82 persen"><span><strong>82%</strong>untuk program</span></div>
                    <ul class="hf-legend">
                        @foreach($f['transparency']['allocation'] as $a)
                            <li><i style="background: {{ $a['color'] }}"></i><span>{{ $a['label'] }}</span><strong>{{ $a['percent'] }}%</strong></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="hf-media hf-media--report">
                <img src="{{ asset($img.'/report-illustration.jpg') }}" width="828" height="405" alt="Buku laporan keuangan dengan grafik dan kaca pembesar" loading="lazy">
            </div>
        </section>

        <section class="hf-section" id="laporan" data-reveal>
            <header class="hf-section__head"><span class="hf-eyebrow">Dokumen</span><h2 class="hf-h2">Laporan yang dapat diunduh</h2></header>
            <ul class="hf-reports">
                @foreach($f['transparency']['reports'] as $r)
                    <li class="hf-card hf-report-row">
                        <svg class="hf-art hf-art--md" viewBox="0 0 48 48" aria-hidden="true"><use href="#ic-doc"/></svg>
                        <div class="hf-report-row__info"><strong>{{ $r['title'] }}</strong><span>{{ $r['type'] }} &middot; {{ $r['period'] }} &middot; {{ $r['size'] }}</span></div>
                        <a class="hf-btn hf-btn--ghost hf-btn--sm" href="#" data-soon="Dokumen {{ $r['title'] }} akan tersedia pada versi produksi."><svg class="hf-i" aria-hidden="true"><use href="#i-download"/></svg> Unduh</a>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="hf-section" data-reveal>
            <ul class="hf-grid hf-grid--3">
                @foreach($f['transparency']['principles'] as $p)
                    <li class="hf-card hf-card--pad hf-value"><svg class="hf-i hf-value__icon" aria-hidden="true"><use href="#i-check"/></svg><h3 class="hf-h3">{{ $p['title'] }}</h3><p>{{ $p['text'] }}</p></li>
                @endforeach
            </ul>
        </section>

        <section class="hf-cta" data-reveal>
            <div><h2 class="hf-h2">Ada pertanyaan tentang penggunaan dana?</h2><p>Tanyakan langsung pada tim kami atau HopeBot.</p></div>
            <div class="hf-cta__actions"><a class="hf-btn hf-btn--dark" href="{{ route($rp.'chatbot') }}">Tanya HopeBot <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a></div>
        </section>
    </div>
@endsection
