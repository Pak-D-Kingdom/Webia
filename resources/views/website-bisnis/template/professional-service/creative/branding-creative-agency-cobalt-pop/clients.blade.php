@php($site = config('template.professional-service.creative.branding-creative-agency-cobalt-pop.branding-creative-agency'))
@php($current = 'clients')
@extends('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.layouts.app')

@section('title', 'Our Clients')

@section('content')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.page-header', ['tone' => 'coral', 'crumb' => 'Our Clients', 'title' => 'Klien dari berbagai industri.', 'lead' => 'Dari toko roti sampai layanan keuangan, setiap klien membawa tantangan yang berbeda dan itu yang membuat kami terus belajar.'])

    <section class="bca-section bca-tone-paper" aria-labelledby="bca-cp-h" data-bca-filter-scope>
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Klien</span><h2 class="bca-h2" id="bca-cp-h">Delapan belas merek yang <mark class="bca-hl">pernah kami bantu.</mark></h2></div>
            <div class="bca-filter" role="group" aria-label="Filter industri">
                @foreach($site['client_groups'] as $g)
                    <button type="button" data-bca-filter="{{ $g }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $g }}</button>
                @endforeach
            </div>
            <p class="bca-pf-count" aria-live="polite" data-bca-count-label></p>
            <ul class="bca-cmosaic">
                @foreach($site['clients'] as $c)
                    <li class="bca-cbox bca-reveal" data-t="{{ $loop->index % 5 }}" data-bca-category="{{ $c['group'] }}" style="--bca-d:{{ ($loop->index % 6) * 0.05 }}s">
                        <img src="{{ asset($site['asset_base'] . 'logos/client-' . $c['key'] . '.png') }}" alt="Logo {{ $c['name'] }}" loading="lazy">
                        <span class="bca-cbox__meta"><b>{{ $c['name'] }}</b><small>{{ $c['industry'] }}</small></span>
                    </li>
                @endforeach
            </ul>
            <p class="bca-muted" style="margin-top:28px">Nama dan logo klien adalah contoh fiktif untuk keperluan template.</p>
        </div>
    </section>

    <section class="bca-section bca-tone-tint" aria-labelledby="bca-cm-h">
        <div class="bca-wrap">
            <div class="bca-shead"><span class="bca-label">Mitra</span><h2 class="bca-h2" id="bca-cm-h">Jaringan di balik <mark class="bca-hl">hasil akhir.</mark></h2><p class="bca-lead">Percetakan, fotografer, dan tim teknis yang bekerja bersama kami agar yang dirancang di layar sama baiknya saat diproduksi.</p></div>
            <ul class="bca-partners">
                @foreach($site['partners'] as $c)
                    <li class="bca-partner bca-reveal" style="--bca-d:{{ $loop->index * 0.06 }}s">
                        <img src="{{ asset($site['asset_base'] . 'logos/partner-' . $c['key'] . '.png') }}" alt="Logo {{ $c['name'] }}" loading="lazy">
                        <span><b>{{ $c['name'] }}</b><small>{{ $c['role'] }}</small></span>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
