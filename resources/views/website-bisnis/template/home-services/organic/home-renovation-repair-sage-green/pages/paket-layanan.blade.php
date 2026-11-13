@extends('website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.layouts.app')
@php
    $cfg = config('template.home-services.organic.home-renovation-repair-sage-green.home-renovation-repair')
        ?: require base_path('config/template/home-services/organic/home-renovation-repair-sage-green/home-renovation-repair.php');
    $vp  = 'website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.partials.';
    $img = fn (string $file) => asset($cfg['paths']['images'].'/'.$file);
    $go  = fn (string $name) => route($cfg['route_prefix'].$name);
    $i   = fn (string $name, string $class = '') => new \Illuminate\Support\HtmlString('<svg class="hr-ico '.$class.'" aria-hidden="true" focusable="false"><use href="#i-'.$name.'"></use></svg>');
@endphp

@section('title', 'Paket Layanan — Renovaku')
@section('meta_description', 'Bandingkan Paket Basic, Premium, dan Exclusive dari Renovaku sesuai kebutuhan renovasi Anda.')

@section('content')
@include($vp.'page-hero', [
    'title' => 'Paket Layanan',
    'desc'  => 'Pilih paket terbaik sesuai kebutuhan Anda. Harga di bawah adalah biaya awal; rincian final ditentukan setelah survei lokasi.',
    'image' => 'project-2.jpg',
    'alt'   => 'Rumah dua lantai hasil renovasi Paket Premium',
    'cta'   => ['Minta Penawaran', 'permintaan-penawaran'],
])

<section class="hr-section">
    <div class="hr-container">
        <div class="hr-pkgpage">
            @foreach ($cfg['packages'] as $p)
                <article class="hr-pkgcard {{ $p['popular'] ? 'is-popular' : '' }}" id="{{ $p['id'] }}" data-reveal>
                    @if ($p['popular'])<span class="hr-pkg__badge">Paling Populer</span>@endif
                    <h3>{{ $p['name'] }}</h3>
                    <p class="hr-pkg__tag">{{ $p['tagline'] }}</p>
                    <p class="hr-pkgcard__from">Harga mulai dari</p>
                    <p class="hr-pkgcard__price">{{ $p['price'] }}</p>
                    <ul class="hr-checklist hr-checklist--plain">
                        @foreach ($p['detail'] as $d)<li>{{ $i('check-circle') }}<span>{{ $d }}</span></li>@endforeach
                    </ul>
                    <a class="hr-btn {{ $p['popular'] ? 'hr-btn--gold' : 'hr-btn--primary' }}" href="{{ $go('permintaan-penawaran') }}?paket={{ $p['id'] }}"><span>Pilih Paket</span>{{ $i('arrow') }}</a>
                </article>
            @endforeach
        </div>

        <header class="hr-sechead hr-sechead--sub">
            <h2>Perbandingan paket</h2>
            <p>Geser tabel ke samping di layar kecil.</p>
        </header>
        <div class="hr-tablewrap" data-reveal>
            <table class="hr-table">
                <thead><tr><th scope="col">Fasilitas</th>@foreach ($cfg['packages'] as $p)<th scope="col">{{ $p['name'] }}</th>@endforeach</tr></thead>
                <tbody>
                    @foreach ($cfg['compare'] as $row)
                        <tr>
                            <th scope="row">{{ $row[0] }}</th>
                            @foreach (array_slice($row, 1) as $cell)
                                <td>
                                    @if ($cell === true)<span class="hr-yes">{{ $i('check') }}<span class="sr-only">Termasuk</span></span>
                                    @elseif ($cell === false)<span class="hr-no">—<span class="sr-only">Tidak termasuk</span></span>
                                    @else{{ $cell }}@endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="hr-note">Biaya akhir bergantung pada luas area, kondisi bangunan, dan pilihan material. Estimasi cepat tersedia di AI Chatbot.</p>
    </div>
</section>
@endsection
