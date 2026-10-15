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
                <a class="lm-link" href="{{ $m['all_url'] }}">Lihat Semua Menu <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </header>

            <div class="lm-tabs" role="group" aria-label="Kategori menu">
                @foreach ($m['categories'] as $key => $label)
                    <button class="lm-tab {{ $loop->first ? 'is-active' : '' }}" type="button" data-filter="{{ $key }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $label }}</button>
                @endforeach
            </div>

            <ul class="lm-products" id="menu-grid" data-limit="{{ $m['home_limit'] }}">
                @foreach ($m['items'] as $item)
                    <li class="lm-product" data-category="{{ $item['category'] }}" @if ($loop->iteration > $m['home_limit']) hidden @endif>
                        <figure class="lm-media">
                            <img src="{{ $img($item['image']) }}" alt="{{ $item['name'] }}" loading="lazy" width="320" height="240">
                        </figure>
                        <div class="lm-product__body">
                            <h3>{{ $item['name'] }}</h3>
                            <p>{{ $rp($item['price']) }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
            <p class="lm-empty" hidden>Menu untuk kategori ini segera hadir.</p>
        </div>

        @include("$v.sections.promo-card")
    </div>
</section>
