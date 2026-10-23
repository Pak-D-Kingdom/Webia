{{-- Promo kartu: 1 sampai banyak. Mode, per_view, interval diatur di cafe.php → promo_card --}}
@php($z = $cafe['promo_card'])
<div class="lm-promos lm-promos--card" id="promo" data-mode="{{ $z['mode'] }}" data-per-view="{{ $z['per_view'] ?? 1 }}" data-min-width="{{ $z['min_width'] ?? 320 }}" data-interval="{{ $z['interval'] }}" style="--lm-min: {{ $z['min_width'] ?? 320 }}px">
    <div class="lm-promos__track">
        @foreach ($z['items'] as $p)
            <aside class="lm-promo" aria-labelledby="pc-title-{{ $loop->index }}">
                <img class="lm-promo__img" src="{{ $img($p['image']) }}" alt="" loading="lazy">
                @if (! empty($p['badge']))
                    <span class="lm-promo__badge" aria-hidden="true"><b>{{ $p['badge'][0] }}</b><b>{{ $p['badge'][1] }}</b></span>
                @endif
                <div class="lm-promo__body">
                    <p class="lm-eyebrow lm-eyebrow--gold">{{ $p['eyebrow'] }}</p>
                    <h2 id="pc-title-{{ $loop->index }}">{{ $p['title'] }}</h2>
                    <p class="lm-promo__sub">{{ $p['subtitle'] }}</p>
                    <p class="lm-promo__date">{{ $p['period'] }}</p>
                </div>
            </aside>
        @endforeach
    </div>
</div>
