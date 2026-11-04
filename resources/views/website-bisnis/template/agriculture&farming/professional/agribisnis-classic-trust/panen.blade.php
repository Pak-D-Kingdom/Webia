@extends($v . '.layout')

@section('title', 'Informasi Tanaman & Panen — AgroTrade')
@section('description', 'Kalender tanam dan panen komoditas AgroTrade untuk membantu Anda merencanakan pembelian sepanjang tahun.')

@section('content')
@php
    $img = fn ($f) => asset($agro['img_path'] . '/' . $f);
    $range = function (array $ms) use ($agro) {
        sort($ms);
        $out = [];
        $start = null;
        $prev = null;
        foreach ($ms as $m) {
            if ($start === null) { $start = $prev = $m; continue; }
            if ($m === $prev + 1) { $prev = $m; continue; }
            $out[] = [$start, $prev];
            $start = $prev = $m;
        }
        if ($start !== null) { $out[] = [$start, $prev]; }
        return implode(' & ', array_map(function ($r) use ($agro) {
            return $r[0] === $r[1]
                ? $agro['months'][$r[0] - 1]
                : $agro['months'][$r[0] - 1] . ' – ' . $agro['months'][$r[1] - 1];
        }, $out));
    };
@endphp

@include($v . '.partials.page-hero', [
    'ph_title' => 'Informasi Tanaman & Panen',
    'ph_lead'  => 'Data terkini seputar musim tanam, panen, dan potensi hasil untuk membantu Anda merencanakan pembelian.',
    'ph_icon'  => 'sprout',
])

<section class="container section">
    <div class="sec-head">
        <h2>Kalender Tanam &amp; Panen</h2>
        <ul class="legend" aria-label="Keterangan">
            <li><span class="swatch swatch--plant"></span>Musim tanam / perawatan</li>
            <li><span class="swatch swatch--harv"></span>Musim panen</li>
        </ul>
    </div>

    <div class="table-wrap" tabindex="0" role="region" aria-label="Kalender tanam dan panen, geser untuk melihat semua bulan">
        <table class="cal">
            <thead>
                <tr>
                    <th scope="col">Komoditas</th>
                    @foreach ($agro['months'] as $m)<th scope="col">{{ $m }}</th>@endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($agro['commodities'] as $c)
                    <tr id="{{ $c['slug'] }}">
                        <th scope="row">
                            <span class="cal__name"><svg class="i" aria-hidden="true"><use href="#i-{{ $c['icon'] }}"/></svg>{{ $c['name'] }}</span>
                        </th>
                        @foreach ($agro['months'] as $idx => $m)
                            @php $n = $idx + 1; @endphp
                            @if (in_array($n, $c['harvest_months']))
                                <td class="is-harv"><span class="sr-only">Panen</span></td>
                            @elseif (in_array($n, $c['plant']))
                                <td class="is-plant"><span class="sr-only">Tanam / perawatan</span></td>
                            @else
                                <td><span class="sr-only">—</span></td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<section class="container section section--tight">
    <div class="sec-head"><h2>Ringkasan per Komoditas</h2></div>
    <div class="grid grid--3">
        @foreach ($agro['commodities'] as $c)
            <article class="info-card">
                <header class="info-card__head">
                    <span class="info-card__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $c['icon'] }}"/></svg></span>
                    <h3>{{ $c['name'] }}</h3>
                </header>
                <dl class="kv">
                    <div><dt>Musim tanam / perawatan</dt><dd>{{ $range($c['plant']) }}</dd></div>
                    <div><dt>Musim panen</dt><dd>{{ $range($c['harvest_months']) }}</dd></div>
                    <div><dt>Sentra produksi</dt><dd>{{ $c['origin'] }}</dd></div>
                    <div><dt>Potensi pasokan</dt><dd>{{ $c['capacity'] }} per tahun</dd></div>
                </dl>
                <p class="info-card__note">{{ $c['note'] }}</p>
            </article>
        @endforeach
    </div>
</section>

@include($v . '.partials.cta-band', [
    'cta_title' => 'Rencanakan pembelian sesuai musim panen',
    'cta_text'  => 'Kontrak jadwal pasokan bulanan atau tahunan agar stok komoditas Anda selalu terjaga.',
])
@endsection
