@php($m = $cafe['menu'])
@php($featured = array_values(array_filter($m['items'], fn ($i) => ! empty($i['featured']))))
@php($zc = $cafe['promo_card'])
{{-- Bila promo banyak / bersamaan, zona promo pindah ke baris sendiri selebar penuh --}}
@php($stack = count($zc['items']) > 1 && ($zc['mode'] === 'grid' || ($zc['per_view'] ?? 1) > 1))
<section class="lm-section lm-menu" id="menu" aria-labelledby="menu-title">
    <div class="lm-container lm-menu__wrap {{ $stack ? 'lm-menu__wrap--stack' : '' }}">
        <div class="lm-menu__main">
            <header class="lm-menu__head">
                <div>
                    <p class="lm-eyebrow">{{ $m['eyebrow'] }}</p>
                    <h2 class="lm-title" id="menu-title">{{ $m['title'] }}</h2>
                    <p class="lm-lead">{{ $m['text'] }}</p>
                </div>
                <a class="lm-link" href="{{ $url('menu') }}">Lihat Semua Menu <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </header>

            <ul class="lm-products">
                @foreach ($featured as $item)
                    @include("$v.partials.product-card", ['item' => $item])
                @endforeach
            </ul>
        </div>

        @include("$v.sections.promo-card")
    </div>
</section>
