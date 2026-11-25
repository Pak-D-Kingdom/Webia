<section class="bca-section bca-tone-ink" id="services-preview" aria-labelledby="bca-svc-h">
    <div class="bca-wrap">
        <div class="bca-shead">
            <span class="bca-label">Creative Services</span>
            <h2 class="bca-h2" id="bca-svc-h">Tujuh layanan, <mark class="bca-hl">satu cara pandang.</mark></h2>
            <p class="bca-lead bca-muted">Dari strategi sampai kampanye, semuanya dikerjakan tim yang sama agar pesan merek Anda tidak tercecer.</p>
        </div>
        <ul class="bca-svc-list">
            @foreach($site['services'] as $s)
                <li class="bca-svc bca-reveal" data-tone="{{ $s['color'] }}" style="--bca-d:{{ $loop->index * 0.05 }}s">
                    <a href="{{ route($site['routes']['services']) }}#{{ $s['key'] }}">
                        <span class="bca-svc__icon">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => $s['icon']])</span>
                        <h3>{{ $s['title'] }}</h3>
                        <p>{{ $s['short'] }}</p>
                        <span class="bca-svc__go" aria-hidden="true">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</span>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="bca-more"><a class="bca-btn" href="{{ route($site['routes']['services']) }}">Lihat semua layanan @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a></div>
    </div>
</section>
