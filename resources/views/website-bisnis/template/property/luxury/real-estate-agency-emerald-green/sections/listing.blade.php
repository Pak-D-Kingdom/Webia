{{-- ===================== PROPERTY LISTING (preview di beranda & halaman Property) ===================== --}}
@php
    $isPreview = $preview ?? false;
    $items     = $isPreview ? array_slice($listings, 0, $limit ?? 3) : $listings;
@endphp
<section class="rea-section" id="listing" aria-label="{{ $pages['property']['title'] }}">
    <div class="rea-container">
        @if ($isPreview)
            <header class="rea-sec-head">
                <div class="rea-section-head">
                    <p class="rea-eyebrow rea-eyebrow--dark">PREMIUM PROPERTY</p>
                    <h2>{{ $pages['property']['title'] }}</h2>
                    <p>{{ $pages['property']['subtitle'] }}</p>
                </div>
                <a class="rea-link" href="{{ $route('property') }}">View All Properties {{ $icon('arrow') }}</a>
            </header>
        @endif

        <ul class="rea-listings">
            @foreach ($items as $item)
                <li class="rea-listing">
                    <span class="rea-listing__badge">{{ $item['badge'] }}</span>
                    <a class="rea-listing__media" href="{{ $route('specification') }}" tabindex="-1" aria-hidden="true">
                        <img src="{{ $item['src'] }}" alt="{{ $item['alt'] }}" loading="lazy">
                    </a>
                    <div class="rea-listing__body">
                        <p class="rea-listing__place">{{ $icon('pin') }}<span>{{ $item['place'] }}</span></p>
                        <h3><a href="{{ $route('specification') }}">{{ $item['title'] }}</a></h3>
                        <ul class="rea-listing__meta">
                            @foreach ($item['highlights'] as $h)
                                <li>{{ $icon($h['icon']) }}<span>{{ $h['label'] }}</span></li>
                            @endforeach
                        </ul>
                        <div class="rea-listing__foot">
                            <p class="rea-listing__price"><small>{{ $property['price_cur'] }}</small> {{ $item['price'] }}</p>
                            <a class="rea-btn rea-btn--dark rea-btn--sm" href="{{ $route('specification') }}">View Details {{ $icon('arrow') }}</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
