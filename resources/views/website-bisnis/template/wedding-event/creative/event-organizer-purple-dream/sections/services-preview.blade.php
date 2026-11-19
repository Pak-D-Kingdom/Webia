<section class="eo-svc" id="layanan-preview" aria-labelledby="eo-svc-title">
    <div class="eo-container eo-svc__row">
        <div class="eo-svc__intro">
            <h2 class="eo-serif-title" id="eo-svc-title">Our<br>Event Services</h2>
            <p>Solusi lengkap untuk<br>berbagai kebutuhan acara Anda.</p>
            <a class="eo-btn eo-btn--dark eo-btn--sm" href="{{ url($eo['base'].'/layanan') }}">Lihat Semua Layanan <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
        <ul class="eo-svc__grid">
            @foreach($eo['services'] as $svc)
            <li>
                <a class="eo-svc-card" href="{{ url($eo['base'].'/layanan#'.$svc['slug']) }}">
                    <img class="eo-svc-card__ico" src="{{ asset($eo['assets']['img']) }}/{{ $svc['icon'] }}" alt="" width="64" height="61" loading="lazy">
                    <span class="eo-svc-card__name">{!! $svc['short'] !!}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <img class="eo-svc__flora" src="{{ asset($eo['assets']['img']) }}/flora-card.svg" alt="" aria-hidden="true" loading="lazy">
</section>
