@php($site = config('template.professional-service.creative.branding-creative-agency-cobalt-pop.branding-creative-agency'))
@php($current = 'services')
@extends('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.layouts.app')

@section('title', 'Services')

@section('content')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.page-header', ['tone' => 'yellow', 'crumb' => 'Services', 'title' => 'Layanan kreatif lengkap.', 'lead' => 'Tujuh layanan yang bisa dipesan terpisah atau digabung menjadi satu paket sesuai tahap bisnis Anda.'])

    <div class="bca-jump" data-bca-jump>
        <div class="bca-wrap">
            <nav class="bca-jump__rail" aria-label="Lompat ke layanan">
                @foreach($site['services'] as $s)<a href="#{{ $s['key'] }}" data-bca-spy="{{ $s['key'] }}">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => $s['icon']]){{ $s['title'] }}</a>@endforeach
            </nav>
        </div>
    </div>
    @foreach($site['services'] as $s)
        <section class="bca-svcx bca-tone-paper" id="{{ $s['key'] }}" aria-labelledby="bca-svc-{{ $s['key'] }}">
            <div class="bca-wrap bca-svcx__grid">
                <div class="bca-reveal">
                    <div class="bca-svcx__icon">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => $s['icon']])</div>
                    <h2 id="bca-svc-{{ $s['key'] }}">{{ $s['title'] }}</h2>
                    <p class="bca-lead">{{ $s['long'] }}</p>
                    <h3 class="bca-h3" style="margin:26px 0 8px">Cakupan layanan</h3>
                    <ul class="bca-ticks">@foreach($s['scope'] as $x)<li>{{ $x }}</li>@endforeach</ul>
                    <div class="bca-actions" style="margin-top:26px"><a class="bca-btn bca-btn--sm" href="{{ route($site['routes']['contact']) }}">Diskusikan layanan ini @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a></div>
                </div>
                <aside class="bca-svcx__panel bca-tone-{{ $s['color'] === 'charcoal' ? 'ink' : $s['color'] }} bca-reveal" style="--bca-d:.08s" aria-label="Manfaat {{ $s['title'] }}">
                    <div><h3>Manfaat untuk bisnis Anda</h3><ul class="bca-ticks">@foreach($s['benefits'] as $x)<li>{{ $x }}</li>@endforeach</ul></div>
                    <div><h3>Yang Anda terima</h3><p>{{ $s['deliverables'] }}</p></div>
                </aside>
            </div>
        </section>
    @endforeach
@endsection
