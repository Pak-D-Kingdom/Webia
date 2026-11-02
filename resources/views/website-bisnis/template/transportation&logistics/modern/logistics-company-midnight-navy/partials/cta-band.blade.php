@php $rp = $site['route_prefix']; @endphp
<section class="lc-ctaband" aria-label="Ajakan konsultasi">
    <div class="lc-wrap lc-ctaband__in">
        <div>
            <h2>{{ $site['quotation']['title'] }}</h2>
            <p>{{ $site['quotation']['subtitle'] }}</p>
        </div>
        <a class="lc-btn lc-btn--primary" href="{{ route($rp . 'quotation') }}">{{ $site['quotation']['button'] }}
            <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-arrow"></use></svg>
        </a>
    </div>
</section>
