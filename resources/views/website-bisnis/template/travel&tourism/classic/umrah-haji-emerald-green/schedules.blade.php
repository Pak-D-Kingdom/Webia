@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'Jadwal Keberangkatan — Nur Rahmat Travel')
@section('description', 'Jadwal keberangkatan umrah dan haji Nur Rahmat Travel beserta status ketersediaan kursi.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'schedules'])

    <section class="uh-section">
        <div class="uh-container">
            <div class="uh-toolbar">
                <div class="uh-filter" role="group" aria-label="Filter jenis paket" data-uh-filter="schedules">
                    <button type="button" class="uh-chip is-active" data-filter="all" aria-pressed="true">Semua</button>
                    <button type="button" class="uh-chip" data-filter="umrah" aria-pressed="false">Umrah</button>
                    <button type="button" class="uh-chip" data-filter="haji" aria-pressed="false">Haji</button>
                </div>
                <label class="uh-select">
                    <span class="uh-select__label">Bulan</span>
                    <select data-uh-month aria-label="Filter bulan keberangkatan">
                        <option value="all">Semua bulan</option>
                        @foreach (array_unique(array_column($uh['schedules'], 'month')) as $m)
                            <option value="{{ $m }}">{{ $m }}</option>
                        @endforeach
                    </select>
                    <svg class="uh-i" aria-hidden="true"><use href="#i-chevron-down"/></svg>
                </label>
            </div>

            <div class="uh-card uh-card--flat">
                <div class="uh-table-wrap">
                    <table class="uh-table uh-table--full" data-uh-filter-list="schedules">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Paket</th>
                                <th scope="col">Durasi</th>
                                <th scope="col">Sisa Kursi</th>
                                <th scope="col">Status</th>
                                <th scope="col"><span class="uh-sr">Aksi</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($uh['schedules'] as $row)
                                <tr data-type="{{ $row['type'] }}" data-month="{{ $row['month'] }}">
                                    <td data-label="Tanggal"><strong>{{ $row['date'] }}</strong></td>
                                    <td data-label="Paket">{{ $row['package'] }}</td>
                                    <td data-label="Durasi">{{ $row['duration'] }}</td>
                                    <td data-label="Sisa Kursi">{{ $row['seats'] }}</td>
                                    <td data-label="Status"><span class="uh-status uh-status--{{ $row['tone'] }}">{{ $row['status'] }}</span></td>
                                    <td class="uh-table__action">
                                        @if ($row['tone'] === 'full')
                                            <span class="uh-muted">Daftar tunggu</span>
                                        @else
                                            <a class="uh-btn uh-btn--outline uh-btn--sm" href="{{ $wa('Assalamualaikum Nur Rahmat Travel, saya ingin mendaftar paket '.$row['package'].' keberangkatan '.$row['date'].'.') }}" target="_blank" rel="noopener noreferrer"><span>Daftar</span></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="uh-empty" data-uh-empty hidden>Belum ada jadwal untuk filter ini.</p>
            </div>
            <p class="uh-note">Sisa kursi dapat berubah sewaktu-waktu. Konfirmasi ketersediaan terbaru melalui WhatsApp atau AI Assistant.</p>
        </div>
    </section>
@endsection
