@php $mode = $mode ?? 'preview'; @endphp
@if ($mode === 'preview')
<section class="lb-svcstrip" aria-labelledby="lb-svc-title">
    <div class="lb-svcstrip__intro">
        <img class="lb-svcstrip__basket" src="{{ asset($laundry['assets']['img'] . '/basket-plant.webp') }}" alt="" width="104" height="136" loading="lazy">
        <div class="lb-svcstrip__copy">
            <h2 id="lb-svc-title">Layanan Laundry Kami</h2>
            <p>Berbagai pilihan layanan laundry sesuai kebutuhan Anda.</p>
            <a class="lb-btn lb-btn--primary lb-btn--sm" href="{{ route('webia.laundry-baby-blue.layanan') }}">Lihat Semua Layanan <svg class="lb-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
    </div>
    <ul class="lb-svcstrip__list">
        @foreach ($laundry['services'] as $s)
            <li>
                <a class="lb-svc" href="{{ route('webia.laundry-baby-blue.layanan') }}#{{ $s['slug'] }}">
                    <img class="lb-svc__img" src="{{ asset($laundry['assets']['img'] . '/' . $s['img']) }}" alt="" width="92" height="62" loading="lazy">
                    <span class="lb-svc__label">{{ $s['name'] }}@if ($s['sub'])<br>{{ $s['sub'] }}@endif</span>
                </a>
            </li>
        @endforeach
    </ul>
</section>
@else
<section class="lb-section" aria-label="Daftar layanan laundry">
    <div class="lb-container">
        <ul class="lb-svc-grid">
            @foreach ($laundry['services'] as $s)
                @php $pick = trim($s['name'] . ' ' . $s['sub']); @endphp
                <li id="{{ $s['slug'] }}" class="lb-svc-grid__item">
                    <article class="lb-card lb-svc-card">
                        <div class="lb-svc-card__media"><img src="{{ asset($laundry['assets']['img'] . '/' . $s['img']) }}" alt="" width="92" height="62" loading="lazy"></div>
                        <h2 class="lb-svc-card__title">{{ $s['name'] }} @if ($s['sub'])<span>{{ $s['sub'] }}</span>@endif</h2>
                        <p class="lb-svc-card__text">{{ $s['desc'] }}</p>
                        <div class="lb-svc-card__foot">
                            <span class="lb-pricetag">Mulai <strong>{{ $s['from'] }}</strong></span>
                            <a class="lb-btn lb-btn--outline lb-btn--sm" href="{{ route('webia.laundry-baby-blue.order-inquiry') }}?layanan={{ rawurlencode($pick) }}">Order</a>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endif
