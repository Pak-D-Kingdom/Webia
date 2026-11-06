@php
    $p      = $cafe['promo'];
    $items  = $p['items'];
    $count  = count($items);
    $layout = $count > 1 ? ($p['layout'] ?? 'slider') : 'single';
    $pv     = max(1, (int) ($p['per_view'] ?? 1));
@endphp
@if ($count)
<section class="kl-promos kl-promos--{{ $layout }}" id="promo" aria-label="Promo"
         style="--kl-pv-max: {{ $pv }}"
         @if ($layout === 'slider')
             data-kl-promos
             data-autoplay="{{ ($p['autoplay'] ?? false) ? 'true' : 'false' }}"
             data-interval="{{ (int) ($p['interval'] ?? 5500) }}"
             role="region" aria-roledescription="carousel"
         @endif>
    <div class="kl-promos__track" @if ($layout === 'slider') data-kl-promo-track tabindex="0" @endif>
        @foreach ($items as $promo)
            <article class="kl-promo kl-promo--{{ $promo['tone'] ?? 'red' }}" aria-labelledby="kl-promo-{{ $loop->index }}">
                <div class="kl-promo__inner">
                    <div class="kl-promo__content">
                        <p class="kl-promo__badge">{{ $promo['badge'] }}</p>
                        <h2 class="kl-promo__title" id="kl-promo-{{ $loop->index }}">{{ $promo['title'] }}</h2>
                        <p class="kl-promo__sub">{{ $promo['subtitle'] }}</p>
                        <p class="kl-promo__period">{{ $promo['period'] }}</p>
                    </div>
                    <img class="kl-promo__img" src="{{ $img($promo['image']) }}" alt="{{ $promo['image_alt'] ?? '' }}" width="520" height="404" loading="lazy">
                </div>
            </article>
        @endforeach
    </div>

    @if ($layout === 'slider')
        <div class="kl-promos__nav" data-kl-promo-nav hidden>
            <div class="kl-promos__dots" data-kl-promo-dots role="tablist" aria-label="Pilih halaman promo"></div>
            <div class="kl-promos__arrows">
                <button class="kl-promos__arrow" type="button" data-kl-promo-prev aria-label="Promo sebelumnya">
                    <svg class="kl-icon kl-icon--flip" aria-hidden="true"><use href="#kl-i-arrow-right"/></svg>
                </button>
                <button class="kl-promos__arrow" type="button" data-kl-promo-next aria-label="Promo berikutnya">
                    <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-arrow-right"/></svg>
                </button>
            </div>
        </div>
    @endif
</section>
@endif
