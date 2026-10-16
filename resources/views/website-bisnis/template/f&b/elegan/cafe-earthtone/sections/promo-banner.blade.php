{{-- Promo banner: 1 sampai banyak. Mode & isi diatur di cafe.php → promo_banner --}}
@php($z = $cafe['promo_banner'])
<div class="lm-promos lm-promos--banner" data-mode="{{ $z['mode'] }}" data-interval="{{ $z['interval'] }}">
    @foreach ($z['items'] as $b)
        <article class="lm-banner {{ $loop->first ? 'is-active' : '' }}" aria-labelledby="pb-title-{{ $loop->index }}">
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
