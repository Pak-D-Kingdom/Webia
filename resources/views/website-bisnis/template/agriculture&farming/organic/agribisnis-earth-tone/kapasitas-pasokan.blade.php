@extends('website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.layouts.app')

@section('title', 'Kapasitas Pasokan - ' . $data['brand']['name'])
@section('page_key', 'kapasitas')

@section('content')
    @include($v . '.sections.page-banner', [
        'bannerKey'   => 'kapasitas',
        'bannerTitle' => $data['capacity']['title'],
        'bannerText'  => $data['capacity']['text'],
    ])

    @php
        $total = collect($data['commodities'])->sum('capacity');
        $max   = max(1, collect($data['commodities'])->max('capacity'));
    @endphp

    <section class="inner">
        <div class="inner__wrap">
            <div class="split">
                <article class="card card--capacity card--capacity-lg">
                    <h2>Total Kapasitas</h2>
                    <p>{{ $data['capacity']['text'] }}</p>
                    <div class="metric">
                        <span class="metric__icon metric__icon--plain"><svg class="ico"><use href="#i-package"></use></svg></span>
                        <div><strong>{{ $data['capacity']['value'] }}</strong><small>{{ $data['capacity']['unit'] }}</small></div>
                    </div>
                    <p class="muted">Gabungan {{ number_format($total, 0, ',', '.') }} ton per tahun dari seluruh komoditas (estimasi).</p>
                    <a class="btn btn--primary btn--sm" href="{{ $u['penawaran'] }}">Minta Penawaran <svg class="ico"><use href="#i-arrow"></use></svg></a>
                </article>

                <article class="card">
                    <h2>Ringkasan Pasokan</h2>
                    <dl class="kv kv--stack">
                        @foreach ($data['capacity']['facts'] as $f)
                            <div><dt>{{ $f['label'] }}</dt><dd>{{ $f['value'] }}</dd></div>
                        @endforeach
                    </dl>
                </article>
            </div>

            <header class="inner__head inner__head--spaced">
                <h2>Kapasitas per Komoditas</h2>
                <p>Estimasi volume tahunan. Ketersediaan aktual mengikuti musim panen dan kontrak berjalan.</p>
            </header>
            <ul class="bars" data-bars>
                @foreach ($data['commodities'] as $c)
                    <li class="bar">
                        <div class="bar__label">
                            <img src="{{ $img }}/{{ $c['image'] }}" alt="" width="32" height="32" loading="lazy">
                            <strong>{{ $c['name'] }}</strong>
                        </div>
                        <div class="bar__track" role="img" aria-label="{{ $c['name'] }}: {{ number_format($c['capacity'], 0, ',', '.') }} ton per tahun">
                            <span class="bar__fill" style="--w: {{ round($c['capacity'] / $max * 100) }}%"></span>
                        </div>
                        <span class="bar__value">{{ number_format($c['capacity'], 0, ',', '.') }} ton</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
