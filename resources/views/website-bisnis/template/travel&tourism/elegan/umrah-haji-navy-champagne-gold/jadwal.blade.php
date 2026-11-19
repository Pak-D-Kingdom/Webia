@extends('website-bisnis.template.travel&tourism.elegan.umrah-haji-navy-champagne-gold.layout')

@section('title', 'Jadwal Keberangkatan — Al Hijrah Travel')

@section('content')
@include($v . '.partials.page-hero', ['eyebrow' => 'JADWAL RESMI', 'title' => 'Jadwal Keberangkatan', 'desc' => 'Cek jadwal keberangkatan terbaru dan pilih tanggal yang sesuai dengan rencana Anda.', 'bg' => 'itinerary-skyline.svg', 'chips' => [count($d['schedules']) . ' jadwal tersedia', 'Seat terbatas', 'Maskapai pilihan']])

<section class="uh-section">
    <div class="uh-container" data-filter-scope>
        <div class="uh-toolbar uh-toolbar--stack">
            <div class="uh-toolbar__row">
                <span class="uh-toolbar__label">Jenis</span>
                <div class="uh-chips" data-filter-key="type" role="group" aria-label="Filter jenis">
                    <button type="button" class="is-active" data-filter="all">Semua</button>
                    <button type="button" data-filter="umrah">Umrah</button>
                    <button type="button" data-filter="haji">Haji</button>
                </div>
            </div>
            <div class="uh-toolbar__row">
                <span class="uh-toolbar__label">Paket</span>
                <div class="uh-select" data-select data-filter-key="pkg">
                    <button type="button" class="uh-select__btn" aria-haspopup="listbox" aria-expanded="false"><span class="uh-select__label">Semua Paket</span><svg class="uh-ico uh-select__caret" aria-hidden="true"><use href="#i-caret"/></svg></button>
                    <ul class="uh-select__menu" role="listbox" aria-label="Pilih paket">
                        <li role="option" tabindex="-1" class="is-active" aria-selected="true" data-filter="all" data-label="Semua Paket"><span>Semua Paket</span><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg></li>
                        @foreach ($d['packages'] as $p)
                            <li role="option" tabindex="-1" aria-selected="false" data-filter="{{ \Illuminate\Support\Str::slug($p['name']) }}" data-label="{{ $p['name'] }}"><span>{{ $p['name'] }}</span><svg class="uh-ico" aria-hidden="true"><use href="#i-check"/></svg></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="uh-toolbar__row">
                <span class="uh-toolbar__label">Status</span>
                <div class="uh-chips" data-filter-key="status" role="group" aria-label="Filter ketersediaan">
                    <button type="button" class="is-active" data-filter="all">Semua</button>
                    <button type="button" data-filter="tersedia">Tersedia</button>
                    <button type="button" data-filter="hampir-penuh">Hampir Penuh</button>
                    <button type="button" data-filter="penuh">Penuh</button>
                </div>
            </div>
            <div class="uh-toolbar__row uh-toolbar__row--end">
                <span class="uh-toolbar__note" data-filter-count aria-live="polite">{{ count($d['schedules']) }} jadwal</span>
                <button type="button" class="uh-reset" data-filter-reset>Reset filter</button>
            </div>
        </div>

        <div class="uh-card uh-card--flat">
            <div class="uh-sched uh-sched--full" role="table" aria-label="Daftar jadwal keberangkatan">
                <div class="uh-sched__row uh-sched__row--head" role="row">
                    <span role="columnheader">Keberangkatan</span><span role="columnheader">Durasi</span><span role="columnheader" class="uh-hide-sm">Maskapai</span><span role="columnheader" class="uh-hide-sm">Sisa Seat</span><span role="columnheader">Status</span><span role="columnheader" class="uh-hide-sm"></span>
                </div>
                @foreach ($d['schedules'] as $s)
                    @php $st = \Illuminate\Support\Str::slug($s['status']); $pct = $s['quota'] ? round(($s['quota'] - $s['seats']) / $s['quota'] * 100) : 100; @endphp
                    <div class="uh-sched__row" role="row" data-filter-item data-type="{{ $s['type'] }}" data-pkg="{{ \Illuminate\Support\Str::slug($s['pkg']) }}" data-status="{{ $st }}">
                        <span role="cell" class="uh-sched__main"><b>{{ $s['date'] }}</b><small>{{ $s['pkg'] }}</small></span>
                        <span role="cell">{{ $s['days'] }}</span>
                        <span role="cell" class="uh-sched__air uh-hide-sm"><svg class="uh-ico" aria-hidden="true"><use href="#i-plane"/></svg>{{ $s['airline'] }}</span>
                        <span role="cell" class="uh-seat uh-hide-sm"><i style="--w:{{ $pct }}%"></i><small>{{ $s['seats'] }} dari {{ $s['quota'] }} seat</small></span>
                        <span role="cell"><em class="uh-pill uh-pill--{{ $st === 'tersedia' ? 'ok' : ($st === 'penuh' ? 'full' : 'low') }}">{{ $s['status'] }}</em></span>
                        <span role="cell" class="uh-hide-sm">
                            @if ($st !== 'penuh')
                                <a class="uh-btn uh-btn--gold uh-btn--xs" href="{{ $wa('Assalamu\'alaikum, saya ingin mendaftar ' . $s['pkg'] . ' keberangkatan ' . $s['date'] . '.') }}" target="_blank" rel="noopener">Daftar</a>
                            @else
                                <a class="uh-btn uh-btn--ghost uh-btn--xs" href="{{ $wa('Assalamu\'alaikum, saya ingin masuk daftar tunggu ' . $s['pkg'] . ' ' . $s['date'] . '.') }}" target="_blank" rel="noopener">Waiting List</a>
                            @endif
                        </span>
                    </div>
                @endforeach
            </div>
            <p class="uh-empty" data-filter-empty hidden>Tidak ada jadwal yang cocok dengan filter ini.</p>
        </div>
        <p class="uh-note">Jadwal dapat berubah sesuai ketersediaan penerbangan dan kebijakan otoritas Arab Saudi.</p>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
