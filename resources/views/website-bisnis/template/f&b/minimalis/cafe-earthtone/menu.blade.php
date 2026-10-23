@extends("$v.layouts.app")
@section('title', 'Menu – ' . config('cafe.name'))

@section('content')
    <section class="page-hero"><div class="container">
        <p class="crumbs"><a href="{{ route('webia.fnb.minimalis.home') }}">Beranda</a> / Menu</p>
        <h1>Menu {{ config('cafe.name') }}</h1>
        <p>Kopi, minuman segar, makanan, dan camilan favorit — dibuat fresh setiap hari.</p>
    </div></section>

    <section class="container section" aria-label="Daftar menu">
        <div class="toolbar">
            <div class="tabs" role="group" aria-label="Filter kategori">
                @foreach (config('cafe.categories') as $key => $label)
                    <button class="tab" data-filter="{{ $key }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $label }}</button>
                @endforeach
            </div>
            <div class="input search">
                <svg class="i" aria-hidden="true"><use href="#i-search"/></svg>
                <label class="sr" for="menuSearch">Cari menu</label>
                <input id="menuSearch" type="search" placeholder="Cari menu...">
            </div>
        </div>

        <div class="menu-grid menu-grid--full" data-filterable>
            @foreach (config('cafe.menu') as $m)
                @include("$v.partials.menu-card", ['m' => $m, 'full' => true])
            @endforeach
        </div>
        <p id="menuEmpty" class="empty" hidden>Menu tidak ditemukan. Coba kategori atau kata kunci lain.</p>

        <div class="cta-band">
            <div><h2>Mau datang bersama keluarga atau tim?</h2><p>Pesan meja lebih dulu supaya tempat Anda terjamin.</p></div>
            <a class="btn btn--light" href="{{ route('webia.fnb.minimalis.reservasi') }}"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg> Reservasi Meja</a>
        </div>
    </section>
@endsection
