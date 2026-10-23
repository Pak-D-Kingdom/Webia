{{-- Promo banner: 1 sampai banyak. Mode, per_view, interval diatur di cafe.php → promo_banner --}}
@php($z = $cafe['promo_banner'])
<div class="lm-promos lm-promos--banner" data-mode="{{ $z['mode'] }}" data-per-view="{{ $z['per_view'] ?? 1 }}" data-min-width="{{ $z['min_width'] ?? 520 }}" data-interval="{{ $z['interval'] }}" style="--lm-min: {{ $z['min_width'] ?? 520 }}px">
    <div class="lm-promos__track">
        @foreach ($z['items'] as $b)
            <article class="lm-banner" aria-labelledby="pb-title-{{ $loop->index }}">
                <div class="lm-banner__visual">
                    <img class="lm-banner__img" src="{{ $img($b['image']) }}" alt="" loading="lazy">
                    <p class="lm-banner__script" aria-hidden="true">{!! implode('<br>', array_map('e', $b['script'])) !!}</p>
                </div>
                <div class="lm-banner__body">
                    <p class="lm-eyebrow lm-eyebrow--gold">{{ $b['eyebrow'] }}</p>
                    <h2 id="pb-title-{{ $loop->index }}">{{ $b['title'] }}</h2>
                    <p>{{ $b['text'] }}</p>
                </div>
            </article>
        @endforeach
    </div>
</div>
