@extends($v . '.layout')

@section('title', 'Jumlah Pesanan Minimum — AgroTrade')
@section('description', 'Ketentuan jumlah pesanan minimum (MOQ), pembayaran, Incoterms, dan waktu produksi komoditas AgroTrade.')

@section('content')
@php $img = fn ($f) => asset($agro['img_path'] . '/' . $f); $m = $agro['moq']; @endphp

@include($v . '.partials.page-hero', [
    'ph_title' => 'Jumlah Pesanan Minimum',
    'ph_lead'  => $m['text'],
    'ph_icon'  => 'box',
])

<section class="container section">
    <div class="split">
        <article class="card card--leaf bigstat">
            <span class="bigico"><svg class="i" aria-hidden="true"><use href="#i-box"/></svg></span>
            <div>
                <small>{{ $m['prefix'] }}</small>
                <strong>{{ $m['headline'] }}</strong>
                <p>Berlaku untuk sebagian besar komoditas. Beberapa komoditas memiliki minimum berbeda sesuai karakter produk dan kemasan.</p>
            </div>
        </article>

        <article class="card terms">
            <h2>Ketentuan Pemesanan</h2>
            <dl class="kv kv--rows">
                @foreach ($m['terms'] as $t)
                    <div><dt>{{ $t[0] }}</dt><dd>{{ $t[1] }}</dd></div>
                @endforeach
            </dl>
        </article>
    </div>
</section>

<section class="container section section--tight">
    <div class="sec-head"><h2>Minimum Order per Komoditas</h2></div>
    <div class="table-wrap" tabindex="0" role="region" aria-label="Tabel minimum order, geser untuk melihat semua kolom">
        <table class="data">
            <thead>
                <tr><th scope="col">Komoditas</th><th scope="col">Minimum order</th><th scope="col">Kemasan</th><th scope="col">Kapasitas per tahun</th><th scope="col"><span class="sr-only">Aksi</span></th></tr>
            </thead>
            <tbody>
                @foreach ($agro['commodities'] as $c)
                    <tr>
                        <th scope="row"><span class="cal__name"><svg class="i" aria-hidden="true"><use href="#i-{{ $c['icon'] }}"/></svg>{{ $c['name'] }}</span></th>
                        <td><b>{{ $c['moq'] }}</b></td>
                        <td>{{ $c['packaging'] }}</td>
                        <td>{{ $c['capacity'] }}</td>
                        <td><a class="link-amber link-amber--sm" href="{{ route('agribisnis.penawaran') }}?komoditas={{ $c['slug'] }}">Minta penawaran <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<section class="container section section--tight">
    <div class="sec-head"><h2>Estimasi Waktu Pengerjaan</h2></div>
    <ul class="grid grid--3 stepcards">
        @foreach ($m['lead'] as $l)
            <li class="info-card info-card--plain">
                <span class="info-card__ico"><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg></span>
                <p>{{ $l }}</p>
            </li>
        @endforeach
    </ul>
</section>

@include($v . '.partials.cta-band', [
    'cta_title' => 'Siap memesan dalam jumlah besar?',
    'cta_text'  => 'Kirim kebutuhan Anda dan dapatkan penawaran dalam 1 x 24 jam kerja.',
])
@endsection
