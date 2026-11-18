@php($site = config('template.professional-service.creative.branding-creative-agency-cobalt-pop.branding-creative-agency'))
@php($current = 'portfolio')
@extends('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.layouts.app')

@section('title', 'Portfolio')

@section('content')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.page-header', ['tone' => 'coral', 'crumb' => 'Portfolio', 'title' => 'Karya yang bicara sendiri.', 'lead' => 'Delapan proyek demo dari berbagai kategori. Pilih kategori untuk menyaring, lalu buka kartu untuk melihat brief, layanan, dan hasilnya.'])

    <section class="bca-section bca-tone-paper" aria-labelledby="bca-pfp-h" data-bca-filter-scope>
        <div class="bca-wrap">
            <h2 class="bca-sr" id="bca-pfp-h">Daftar proyek</h2>
            <div class="bca-filter" role="group" aria-label="Filter kategori">
                @foreach($site['portfolio_filters'] as $f)
                    <button type="button" data-bca-filter="{{ $f }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $f }}</button>
                @endforeach
            </div>
            <p class="bca-pf-count" aria-live="polite" data-bca-count-label></p>
            <div class="bca-pf-grid">
                @foreach($site['portfolio'] as $p)
                    <button type="button" class="bca-pf-item bca-reveal" id="{{ $p['slug'] }}" data-bca-category="{{ $p['category'] }}" data-bca-open="bca-pf-{{ $p['slug'] }}">
                        <span class="bca-pf-item__img">
                            <img src="{{ asset($site['asset_base'] . $p['image']) }}" width="{{ $p['w'] }}" height="{{ $p['h'] }}" loading="lazy" alt="{{ $p['title'] }}: {{ $p['desc'] }}">
                            <span class="bca-pf-item__veil" aria-hidden="true"><span>Detail</span></span>
                        </span>
                        <span class="bca-pf-item__cap">
                            <span class="bca-pf-item__title">{{ $p['title'] }}</span>
                            <span class="bca-post__meta"><span class="bca-chip">{{ $p['category'] }}</span><span>{{ $p['client'] }} · {{ $p['year'] }}</span></span>
                        </span>
                    </button>
                @endforeach
            </div>
            <p class="bca-muted">Semua proyek dan klien di halaman ini adalah contoh fiktif untuk keperluan template.</p>
        </div>
    </section>

    @foreach($site['portfolio'] as $p)
        <dialog class="bca-dialog" id="bca-pf-{{ $p['slug'] }}" aria-labelledby="bca-pf-{{ $p['slug'] }}-t">
            <button type="button" class="bca-dialog__close" data-bca-close aria-label="Tutup detail proyek">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'close'])</button>
            <div class="bca-dialog__body">
                <div class="bca-pf-head">
                    <img class="bca-pf-logo" src="{{ asset($site['asset_base'] . $p['logo']) }}" width="64" height="64" alt="" loading="lazy">
                    <div><span class="bca-chip bca-chip--fill">{{ $p['category'] }}</span><h2 class="bca-h3" id="bca-pf-{{ $p['slug'] }}-t" style="margin-top:6px;font-size:1.9rem">{{ $p['title'] }}</h2></div>
                </div>
                <img class="bca-dialog__media" src="{{ asset($site['asset_base'] . $p['image']) }}" width="{{ $p['w'] }}" height="{{ $p['h'] }}" loading="lazy" alt="{{ $p['title'] }}: {{ $p['desc'] }}">
                <div class="bca-dialog__grid">
                    <div class="bca-stack-p">
                        <p class="bca-lead">{{ $p['desc'] }}</p>
                        <div><h3 class="bca-h3">Brief</h3><p>{{ $p['brief'] }}</p></div>
                        <div><h3 class="bca-h3">Hasil</h3><p>{{ $p['result'] }}</p></div>
                    </div>
                    <dl class="bca-facts">
                        <div><dt>Klien</dt><dd>{{ $p['client'] }}</dd></div>
                        <div><dt>Tahun</dt><dd>{{ $p['year'] }}</dd></div>
                        <div><dt>Kategori</dt><dd>{{ $p['category'] }}</dd></div>
                        <div><dt>Layanan</dt><dd>{{ implode(', ', $p['services']) }}</dd></div>
                    </dl>
                </div>
                <div class="bca-actions"><a class="bca-btn" href="{{ route($site['routes']['contact']) }}">Diskusikan proyek serupa @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a></div>
            </div>
        </dialog>
    @endforeach

    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.pager', ['prev_route' => 'services', 'prev_label' => 'Services', 'next_route' => 'branding', 'next_label' => 'Branding Showcase'])
@endsection
