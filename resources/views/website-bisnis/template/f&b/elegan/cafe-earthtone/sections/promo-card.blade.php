{{-- Promo kartu: 1 sampai banyak. Mode & isi diatur di cafe.php → promo_card --}}
@php($z = $cafe['promo_card'])
<div class="lm-promos lm-promos--card" id="promo" data-mode="{{ $z['mode'] }}" data-interval="{{ $z['interval'] }}">
    @foreach ($z['items'] as $p)
        <aside class="lm-promo {{ $loop->first ? 'is-active' : '' }}" aria-labelledby="pc-title-{{ $loop->index }}">
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
