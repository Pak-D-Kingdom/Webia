@extends($v . '.layout')

@section('title', 'Jangkauan Distribusi — AgroTrade')
@section('description', 'Jangkauan distribusi AgroTrade di seluruh wilayah Indonesia dan pasar ekspor internasional, lengkap dengan proses rantai pasok.')

@section('content')
@php $img = fn ($f) => asset($agro['img_path'] . '/' . $f); $d = $agro['distribution']; $p = $agro['process']; @endphp

@include($v . '.partials.page-hero', [
    'ph_title' => 'Jangkauan Distribusi',
    'ph_lead'  => $d['text'],
    'ph_icon'  => 'globe',
])

<section class="container section">
    <div class="split split--map">
        <figure class="card mapcard">
            <div class="dist__map dist__map--lg" role="img" aria-label="Peta jangkauan distribusi Indonesia dan dunia"></div>
            <figcaption>Pengiriman domestik dan ekspor melalui pelabuhan utama Indonesia.</figcaption>
        </figure>
        <div class="card ports">
            <h2>Pelabuhan Pengiriman</h2>
            <ul>
                @foreach ($d['ports'] as $port)
                    <li><svg class="i" aria-hidden="true"><use href="#i-ship"/></svg>{{ $port }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

<section class="container section section--tight">
    <div class="sec-head"><h2>Wilayah Distribusi Domestik</h2></div>
    <div class="grid grid--3">
        @foreach ($d['regions'] as $r)
            <article class="info-card">
                <header class="info-card__head">
                    <span class="info-card__ico"><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg></span>
                    <h3>{{ $r[0] }}</h3>
                </header>
                <p>{{ $r[1] }}</p>
            </article>
        @endforeach
    </div>
</section>

<section class="container section section--tight">
    <div class="sec-head"><h2>Pasar Ekspor</h2></div>
    <div class="grid grid--3">
        @foreach ($d['markets'] as $r)
            <article class="info-card">
                <header class="info-card__head">
                    <span class="info-card__ico"><svg class="i" aria-hidden="true"><use href="#i-globe"/></svg></span>
                    <h3>{{ $r[0] }}</h3>
                </header>
                <p>{{ $r[1] }}</p>
            </article>
        @endforeach
    </div>
</section>

<section class="container section section--tight" id="rantai-pasok">
    <div class="sec-head"><h2>{{ $p['title'] }}</h2></div>
    <p class="lead">{{ $p['text'] }}</p>
    <ol class="timeline">
        @foreach ($p['steps'] as $i => $st)
            <li>
                <span class="timeline__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $st[1] }}"/></svg></span>
                <div>
                    <h3><span class="timeline__n">{{ $i + 1 }}</span>{{ $st[0] }}</h3>
                    <p>{{ $st[2] }}</p>
                </div>
            </li>
        @endforeach
    </ol>
</section>

@include($v . '.partials.cta-band', [
    'cta_title' => 'Kirim ke negara tujuan Anda',
    'cta_text'  => 'Cantumkan negara dan pelabuhan tujuan pada formulir penawaran agar kami bisa menghitung biaya pengiriman.',
])
@endsection
