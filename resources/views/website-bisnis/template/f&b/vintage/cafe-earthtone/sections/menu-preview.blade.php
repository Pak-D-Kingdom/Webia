@php
    $m       = $cafe['menu'];
    $menuUrl = route($cafe['routes']['menu']);
    $preview = collect($m['items'])->where('preview', true)->take($m['preview_limit'] ?? 5)->values();
@endphp
<section class="kl-menu-preview" id="menu-andalan" aria-labelledby="kl-menu-title">
    <header class="kl-section-head">
        <div>
            <h2 class="kl-title" id="kl-menu-title">{{ $m['title'] }}</h2>
            <p class="kl-lead">{{ $m['subtitle'] }}</p>
        </div>
        <a class="kl-link" href="{{ $menuUrl }}">
            <span>{{ $m['cta'] }}</span>
            <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-arrow-right"/></svg>
        </a>
    </header>

    <ul class="kl-cards">
        @foreach ($preview as $item)
            <li class="kl-card">
                <div class="kl-card__media">
                    @if ($item['image'])
                        <img src="{{ $img($item['image']) }}" alt="{{ $item['name'] }}" width="276" height="200" loading="lazy">
                    @endif
                </div>
                <div class="kl-card__body">
                    <div class="kl-card__info">
                        <h3 class="kl-card__name">{{ $item['name'] }}</h3>
                        <p class="kl-card__price">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                    </div>
                    <a class="kl-card__add" href="{{ $menuUrl }}?q={{ urlencode($item['name']) }}" aria-label="Lihat {{ $item['name'] }} di halaman menu">
                        <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-arrow-right"/></svg>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
</section>
