@extends($v . '.layout')

@section('title', 'Spesifikasi Produk — AgroTrade')
@section('description', 'Detail kualitas dan standar produk komoditas AgroTrade: kadar air, ukuran, kemurnian, jenis, dan kemasan.')

@section('content')
@php
    $img = fn ($f) => asset($agro['img_path'] . '/' . $f);
    $iconMap = ['air' => 'droplet', 'ukuran' => 'ruler', 'murni' => 'gauge', 'jenis' => 'tag', 'kemasan' => 'box'];
@endphp

@include($v . '.partials.page-hero', [
    'ph_title' => 'Spesifikasi Produk',
    'ph_lead'  => 'Detail kualitas dan standar produk komoditas yang kami pasok untuk pasar domestik dan ekspor.',
    'ph_icon'  => 'gauge',
])

<section class="container section">
    <div class="tabs" id="specTabs" data-tabs>
        <div class="tabs__list" role="tablist" aria-label="Pilih komoditas">
            @foreach ($agro['commodities'] as $i => $c)
                <button type="button" role="tab" class="tabs__tab {{ $i === 0 ? 'is-active' : '' }}"
                        id="tab-{{ $c['slug'] }}" data-tab="{{ $c['slug'] }}"
                        aria-selected="{{ $i === 0 ? 'true' : 'false' }}" aria-controls="spec-{{ $c['slug'] }}">
                    <svg class="i" aria-hidden="true"><use href="#i-{{ $c['icon'] }}"/></svg>{{ $c['name'] }}
                </button>
            @endforeach
        </div>

        @foreach ($agro['commodities'] as $i => $c)
            <article class="tabs__panel spec-panel" role="tabpanel" id="spec-{{ $c['slug'] }}" aria-labelledby="tab-{{ $c['slug'] }}" @if ($i !== 0) hidden @endif>
                <figure class="spec-panel__img">
                    <img src="{{ $img($c['img']) }}" alt="{{ $c['name'] }}" loading="lazy" width="440" height="232">
                </figure>
                <div class="spec-panel__body">
                    <h2>{{ $c['name'] }} <small>{{ $c['tagline'] }}</small></h2>
                    <p>{{ $c['desc'] }}</p>
                    <ul class="spec__list spec__list--page">
                        @foreach ($agro['spec_labels'] as $lab)
                            <li>
                                <span class="spec__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $iconMap[$lab[0]] }}"/></svg></span>
                                <span class="spec__label">{{ $lab[1] }}</span>
                                <span class="spec__value">{{ $c['spec'][$lab[0]] }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <dl class="meta meta--2">
                        <div><dt>Bentuk produk</dt><dd>{{ $c['form'] }}</dd></div>
                        <div><dt>Kemasan tersedia</dt><dd>{{ $c['packaging'] }}</dd></div>
                    </dl>
                    <div class="spec-panel__actions">
                        <a class="btn btn--amber btn--sm" href="{{ route('agribisnis.penawaran') }}?komoditas={{ $c['slug'] }}">Minta Penawaran <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                        <a class="btn btn--ghost-dark btn--sm" href="{{ route('agribisnis.sertifikasi') }}">Lihat Sertifikasi</a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</section>

<section class="container section section--tight">
    <div class="sec-head"><h2>Perbandingan Spesifikasi</h2></div>
    <div class="table-wrap" tabindex="0" role="region" aria-label="Tabel perbandingan spesifikasi, geser untuk melihat semua kolom">
        <table class="data">
            <thead>
                <tr>
                    <th scope="col">Komoditas</th>
                    @foreach ($agro['spec_labels'] as $lab)<th scope="col">{{ $lab[1] }}</th>@endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($agro['commodities'] as $c)
                    <tr>
                        <th scope="row">{{ $c['name'] }}</th>
                        @foreach ($agro['spec_labels'] as $lab)<td>{{ $c['spec'][$lab[0]] }}</td>@endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p class="note">Nilai di atas adalah standar acuan dan dapat disesuaikan dengan kontrak pembelian serta kebutuhan negara tujuan.</p>
</section>

@include($v . '.partials.cta-band', [
    'cta_title' => 'Butuh spesifikasi khusus?',
    'cta_text'  => 'Kami dapat menyesuaikan grade, kadar air, dan kemasan sesuai standar negara tujuan Anda.',
])
@endsection
