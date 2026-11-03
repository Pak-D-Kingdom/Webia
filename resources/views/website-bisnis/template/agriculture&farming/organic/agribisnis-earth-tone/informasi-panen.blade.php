@extends('website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.layouts.app')

@section('title', 'Informasi Tanaman & Panen - ' . $data['brand']['name'])
@section('page_key', 'panen')

@section('content')
    @include($v . '.sections.page-banner', [
        'bannerKey'   => 'panen',
        'bannerTitle' => $data['harvest']['title'],
        'bannerText'  => $data['harvest']['text'],
        'bannerImg'   => 'harvest-bg.jpg',
    ])

    <section class="inner">
        <div class="inner__wrap">
            <header class="inner__head">
                <h2>Kalender Tanam &amp; Panen</h2>
                <p>Jadwal indikatif per komoditas. Waktu aktual dapat bergeser mengikuti sentra produksi dan cuaca.</p>
            </header>

            <ul class="legend" aria-label="Keterangan kalender">
                <li><i class="dot dot--plant"></i>Musim tanam</li>
                <li><i class="dot dot--harvest"></i>Musim panen</li>
                <li><i class="dot dot--both"></i>Tanam &amp; panen</li>
            </ul>

            <div class="table-scroll" tabindex="0" role="region" aria-label="Kalender tanam dan panen">
                <table class="calendar">
                    <thead>
                        <tr>
                            <th scope="col">Komoditas</th>
                            @foreach ($data['months'] as $m)<th scope="col">{{ $m }}</th>@endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['harvest']['calendar'] as $row)
                            @php $comm = collect($data['commodities'])->firstWhere('slug', $row['slug']); @endphp
                            <tr>
                                <th scope="row"><img src="{{ $img }}/{{ $comm['image'] }}" alt="" width="28" height="28" loading="lazy">{{ $comm['name'] }}</th>
                                @for ($m = 1; $m <= 12; $m++)
                                    @php
                                        $p = in_array($m, $row['plant'], true);
                                        $h = in_array($m, $row['harvest'], true);
                                        $cls = $p && $h ? 'both' : ($h ? 'harvest' : ($p ? 'plant' : ''));
                                        $txt = $p && $h ? 'Tanam dan panen' : ($h ? 'Panen' : ($p ? 'Tanam' : 'Tidak ada'));
                                    @endphp
                                    <td class="{{ $cls }}"><span class="sr-only">{{ $txt }}</span></td>
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <header class="inner__head inner__head--spaced">
                <h2>Tips Budidaya per Komoditas</h2>
            </header>
            <ul class="tip-grid">
                @foreach ($data['harvest']['calendar'] as $row)
                    @php $comm = collect($data['commodities'])->firstWhere('slug', $row['slug']); @endphp
                    <li class="tip-card">
                        <img src="{{ $img }}/{{ $comm['image'] }}" alt="" width="56" height="56" loading="lazy">
                        <div>
                            <h3>{{ $comm['name'] }}</h3>
                            <p>{{ $row['tip'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>

            <header class="inner__head inner__head--spaced">
                <h2>Cara Kami Menjaga Kualitas</h2>
            </header>
            <ul class="feature-grid">
                @foreach ($data['harvest']['tips'] as $t)
                    <li class="feature-card">
                        <span class="feature-card__icon"><svg class="ico"><use href="#i-sprout"></use></svg></span>
                        <h3>{{ $t['title'] }}</h3>
                        <p>{{ $t['text'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
