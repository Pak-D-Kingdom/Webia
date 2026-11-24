@php($site = config('template.professional-service.creative.branding-creative-agency-cobalt-pop.branding-creative-agency'))
@php($current = 'journal')
@extends('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.layouts.app')

@section('title', 'Creative Journal')

@section('content')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.page-header', ['tone' => 'cobalt', 'crumb' => 'Creative Journal', 'title' => 'Catatan dari meja kerja.', 'lead' => 'Tips desain, tren visual, dan studi kasus dari proyek-proyek kami.'])

    <section class="bca-section bca-tone-paper" aria-labelledby="bca-jp-h" data-bca-filter-scope>
        <div class="bca-wrap">
            <h2 class="bca-sr" id="bca-jp-h">Daftar artikel</h2>
            <div class="bca-toolbar">
                <div class="bca-filter" role="group" aria-label="Filter kategori artikel">
                    @foreach($site['journal_filters'] as $f)
                        <button type="button" data-bca-filter="{{ $f }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $f }}</button>
                    @endforeach
                </div>
                <label class="bca-finder" for="bca-jr-find">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'search'])<input id="bca-jr-find" type="search" placeholder="Cari artikel…" autocomplete="off" data-bca-find aria-label="Cari artikel"><button type="button" data-bca-find-clear aria-label="Hapus kata kunci" hidden>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'close'])</button></label>
            </div>
            <p class="bca-pf-count" aria-live="polite" data-bca-count-label></p>
            <div class="bca-posts bca-posts--page">
                @foreach($site['journal'] as $p)
                    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.post-card', ['p' => $p, 'mode' => 'page', 'lead' => $loop->first])
                @endforeach
            </div>
            <div class="bca-empty" data-bca-empty hidden><b>Tidak ada artikel yang cocok.</b><p>Coba kata lain atau pilih kategori “Semua”.</p></div>
            <p class="bca-muted" style="margin-top:36px">Artikel pada template ini adalah contoh teks demo.</p>
        </div>
    </section>

    @foreach($site['journal'] as $p)
        <dialog class="bca-dialog" id="bca-post-{{ $p['slug'] }}" aria-labelledby="bca-post-{{ $p['slug'] }}-t">
            <button type="button" class="bca-dialog__close" data-bca-close aria-label="Tutup artikel">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'close'])</button>
            <div class="bca-dialog__body">
                <img class="bca-dialog__media" src="{{ asset($site['asset_base'] . $p['image']) }}" width="1200" height="800" loading="lazy" alt="">
                <div class="bca-post__meta"><span class="bca-chip bca-chip--fill">{{ $p['category'] }}</span><span>{{ $p['date'] }}</span><span>{{ $p['read'] }} baca</span></div>
                <h2 class="bca-h3" id="bca-post-{{ $p['slug'] }}-t" style="font-size:clamp(1.7rem,3.4vw,2.4rem)">{{ $p['title'] }}</h2>
                @foreach($p['body'] as $para)<p class="bca-p">{{ $para }}</p>@endforeach
                <div class="bca-actions"><a class="bca-btn bca-btn--sm" href="{{ route($site['routes']['contact']) }}">Punya cerita merek serupa? @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a></div>
            </div>
        </dialog>
    @endforeach
@endsection
