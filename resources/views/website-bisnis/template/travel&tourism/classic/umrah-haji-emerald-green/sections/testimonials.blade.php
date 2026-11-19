<section class="uh-card uh-ts" data-uh-slider aria-labelledby="uh-ts-title">
    <header class="uh-card__head">
        <h2 id="uh-ts-title" class="uh-card__title">{{ $uh['testimonials']['title'] }}</h2>
        <a class="uh-card__link" href="{{ $url('testimonials') }}"><span>Lihat Semua Testimoni</span><svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <p class="uh-card__sub">{{ $uh['testimonials']['text'] }}</p>
    </header>

    <div class="uh-ts__stage">
        <button type="button" class="uh-ts__nav uh-ts__nav--prev" data-uh-prev aria-label="Testimoni sebelumnya">
            <svg class="uh-i" aria-hidden="true"><use href="#i-chevron-left"/></svg>
        </button>
        <div class="uh-ts__viewport" aria-live="polite">
            @foreach ($uh['testimonials']['items'] as $i => $t)
                <figure class="uh-ts__slide @if ($i === 0) is-active @endif" data-uh-slide>
                    <span class="uh-avatar">
                        @if ($t['image'])
                            <img src="{{ $img($t['image']) }}" alt="Foto {{ $t['name'] }}" width="64" height="64" loading="lazy">
                        @else
                            <span class="uh-avatar__ini" aria-hidden="true">{{ $t['initials'] }}</span>
                        @endif
                    </span>
                    <div class="uh-ts__content">
                        <blockquote class="uh-ts__quote">
                            <svg class="uh-i" aria-hidden="true"><use href="#i-quote"/></svg>
                            <p>{{ $t['text'] }}</p>
                        </blockquote>
                        <figcaption class="uh-ts__cap">
                            <strong>{{ $t['name'] }}</strong>
                            <span>{{ $t['role'] }}</span>
                        </figcaption>
                    </div>
                </figure>
            @endforeach
        </div>
        <button type="button" class="uh-ts__nav uh-ts__nav--next" data-uh-next aria-label="Testimoni berikutnya">
            <svg class="uh-i" aria-hidden="true"><use href="#i-chevron-right"/></svg>
        </button>
    </div>
</section>
