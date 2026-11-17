{{-- Parameter: $tone (cobalt|yellow|coral|ink), $crumb, $title, $lead --}}
<section class="bca-phead bca-phead--{{ $tone }} bca-tone-{{ $tone }}">
    <div class="bca-phead__shapes" aria-hidden="true"><i></i><i></i><i></i></div>
    <div class="bca-wrap">
        <nav class="bca-crumb" aria-label="Breadcrumb">
            <a href="{{ route($site['routes']['home']) }}">Beranda</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page">{{ $crumb }}</span>
        </nav>
        <h1 class="bca-phead__title">{{ $title }}</h1>
        <p class="bca-phead__lead">{{ $lead }}</p>
        <div class="bca-actions">
            <a class="bca-btn bca-btn--paper bca-btn--sm" href="{{ route($site['routes']['home']) }}">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow-left']) Kembali ke Beranda</a>
        </div>
    </div>
</section>
