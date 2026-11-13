@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'Jadwal Keberangkatan — Nur Rahmat Travel')
@section('description', 'Jadwal keberangkatan umrah dan haji Nur Rahmat Travel beserta status ketersediaan kursi.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'schedules'])

    <section class="uh-section">
        <div class="uh-container">
            <div class="uh-toolbar">
                <div class="uh-seg" role="group" aria-label="Filter jenis paket" data-uh-filter="schedules">
                    <span class="uh-seg__thumb" aria-hidden="true"></span>
                    <button type="button" class="uh-seg__btn is-active" data-filter="all" aria-pressed="true"><svg class="uh-i" aria-hidden="true"><use href="#i-sparkle"/></svg><span>Semua</span><b class="uh-seg__count" data-uh-count="all"></b></button>
                    <button type="button" class="uh-seg__btn" data-filter="umrah" aria-pressed="false"><svg class="uh-i" aria-hidden="true"><use href="#i-kaaba"/></svg><span>Umrah</span><b class="uh-seg__count" data-uh-count="umrah"></b></button>
                    <button type="button" class="uh-seg__btn" data-filter="haji" aria-pressed="false"><svg class="uh-i" aria-hidden="true"><use href="#i-mosque"/></svg><span>Haji</span><b class="uh-seg__count" data-uh-count="haji"></b></button>
                </div>
                <div class="uh-selectwrap">
                    <span class="uh-selectwrap__label" id="uh-month-label">Bulan</span>
                    <select class="uh-native" data-uh-select="pill" data-uh-month aria-labelledby="uh-month-label">
                        <option value="all">Semua bulan</option>
                        @foreach (array_unique(array_column($uh['schedules'], 'month')) as $m)
                            <option value="{{ $m }}">{{ $m }}</option>
                        @endforeach
                    </select>
                </div>
                <p class="uh-toolbar__result" aria-live="polite"><strong data-uh-shown>8</strong> jadwal ditampilkan</p>
            </div>

            <div class="uh-schlist" data-uh-filter-list="schedules">
                @foreach ($uh['schedules'] as $row)
                    <article class="uh-sch uh-sch--{{ $row['tone'] }}" data-type="{{ $row['type'] }}" data-month="{{ $row['month'] }}">
                        <div class="uh-sch__date" aria-label="{{ $row['date'] }}">
                            <span class="uh-sch__day">{{ $row['day'] }}</span>
                            <span class="uh-sch__mon">{{ $row['mon_full'] }}</span>
                            <span class="uh-sch__year">{{ $row['year'] }}</span>
                        </div>
                        <div class="uh-sch__main">
                            <h2 class="uh-sch__title">{{ $row['package'] }}</h2>
                            <ul class="uh-sch__meta">
                                <li><svg class="uh-i" aria-hidden="true"><use href="#i-clock"/></svg>{{ $row['duration'] }}</li>
                                <li><svg class="uh-i" aria-hidden="true"><use href="#i-plane"/></svg>Jakarta – Tanah Suci</li>
                                <li class="uh-sch__type">@if ($row['type'] === 'haji') Haji @else Umrah @endif</li>
                            </ul>
                        </div>
                        <div class="uh-sch__seats">
                            <p class="uh-sch__seatrow"><span>Sisa kursi</span><strong>{{ $row['left'] }}<small> / {{ $row['quota'] }}</small></strong></p>
                            <div class="uh-meter" role="img" aria-label="{{ $row['left'] }} kursi tersisa dari {{ $row['quota'] }}">
                                <span class="uh-meter__bar" style="--fill: {{ $row['fill'] }}%"></span>
                            </div>
                        </div>
                        <div class="uh-sch__cta">
                            <span class="uh-status uh-status--{{ $row['tone'] }}">{{ $row['status'] }}</span>
                            @if ($row['tone'] === 'full')
                                <a class="uh-btn uh-btn--outline uh-btn--sm" href="{{ $wa('Assalamualaikum Nur Rahmat Travel, saya ingin masuk daftar tunggu paket '.$row['package'].' keberangkatan '.$row['date'].'.') }}" target="_blank" rel="noopener noreferrer"><span>Daftar tunggu</span></a>
                            @else
                                <a class="uh-btn uh-btn--gold uh-btn--sm" href="{{ $wa('Assalamualaikum Nur Rahmat Travel, saya ingin mendaftar paket '.$row['package'].' keberangkatan '.$row['date'].'.') }}" target="_blank" rel="noopener noreferrer"><span>Daftar</span><svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
            <p class="uh-empty" data-uh-empty hidden>Belum ada jadwal untuk filter ini.</p>

            <ul class="uh-legend" aria-label="Keterangan status">
                <li><span class="uh-status uh-status--ok">Tersedia</span> kursi masih banyak</li>
                <li><span class="uh-status uh-status--warn">Terbatas</span> segera daftar, kursi menipis</li>
                <li><span class="uh-status uh-status--full">Penuh</span> masuk daftar tunggu</li>
            </ul>
            <p class="uh-note">Sisa kursi dapat berubah sewaktu-waktu. Konfirmasi ketersediaan terbaru melalui WhatsApp atau AI Assistant.</p>
        </div>
    </section>
@endsection
