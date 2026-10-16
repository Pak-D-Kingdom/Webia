@php($m = $cafe['menu'])
<section class="lm-section lm-menu" id="menu" aria-labelledby="menu-title">
    <div class="lm-container lm-menu__wrap">
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
                @foreach (array_slice($m['items'], 0, $m['home_limit']) as $item)
                    @include("$v.partials.product-card", ['item' => $item])
                @endforeach
            </ul>
        </div>

        @include("$v.sections.promo-card")
    </div>
</section>
