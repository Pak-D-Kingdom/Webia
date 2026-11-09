@extends('website-bisnis.template.travel&tourism.elegan.umrah-haji-navy-champagne-gold.layout')

@section('title', 'Paket Umrah & Haji — Al Hijrah Travel')

@section('content')
@include($v . '.partials.page-hero', ['eyebrow' => 'PAKET IBADAH', 'title' => 'Paket Umrah & Haji', 'desc' => 'Pilih paket terbaik sesuai kebutuhan dan kenyamanan perjalanan ibadah Anda.', 'bg' => 'hero.svg'])

<section class="uh-section">
    <div class="uh-container" data-filter-scope>
        <div class="uh-toolbar">
            <div class="uh-chips" data-filter-key="type" role="group" aria-label="Filter jenis paket">
                <button type="button" class="is-active" data-filter="all">Semua</button>
                <button type="button" data-filter="umrah">Umrah</button>
                <button type="button" data-filter="haji">Haji</button>
            </div>
            <p class="uh-toolbar__note">{{ count($d['packages']) }} paket tersedia</p>
        </div>

        <div class="uh-pkgs">
            @foreach ($d['packages'] as $p)
                <article class="uh-pkg" id="{{ $p['id'] }}" data-filter-item data-type="{{ $p['types'] }}" data-reveal>
                    <div class="uh-pkg__img">
                        <img src="{{ $img($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy">
                        <span class="uh-badge">{{ $p['badge'] }}</span>
                    </div>
                    <div class="uh-pkg__body">
                        <h2>{{ $p['name'] }}</h2>
                        <p class="uh-pkg__tag">{{ $p['tagline'] }}</p>
                        <dl class="uh-meta">
                            <div><dt>Durasi</dt><dd>{{ $p['days'] }}</dd></div>
                            <div><dt>Maskapai</dt><dd>{{ $p['airline'] }}</dd></div>
                            <div><dt>Rute</dt><dd>{{ $p['route'] }}</dd></div>
                            <div><dt>Hotel</dt><dd>{{ $p['hotel'] }}</dd></div>
                        </dl>
                        <details class="uh-incl">
                            <summary>Fasilitas termasuk <svg class="uh-ico" aria-hidden="true"><use href="#i-caret"/></svg></summary>
                            <ul>
                                @foreach ($p['includes'] as $inc)
                                    <li><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg>{{ $inc }}</li>
                                @endforeach
                            </ul>
                        </details>
                        <div class="uh-pkg__foot">
                            <div class="uh-price"><small>Mulai dari</small><b>{{ $rp($p['price']) }}</b><span>/ pax</span></div>
                            <div class="uh-pkg__btns">
                                <a class="uh-btn uh-btn--gold uh-btn--sm" href="{{ $wa('Assalamu\'alaikum, saya tertarik dengan paket ' . $p['name'] . '.') }}" target="_blank" rel="noopener">Pesan via WhatsApp</a>
                                <a class="uh-btn uh-btn--ghost uh-btn--sm" href="{{ $r('jadwal') }}">Lihat Jadwal</a>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        <p class="uh-empty" data-filter-empty hidden>Belum ada paket pada kategori ini.</p>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
