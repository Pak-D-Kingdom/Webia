<section class="lm-hero" id="beranda" aria-roledescription="carousel" aria-label="Sorotan {{ $cafe['brand']['name'] }}">
    @foreach ($cafe['slides'] as $s)
        @php($tag = $loop->first ? 'h1' : 'h2')
        <article class="lm-slide {{ $loop->first ? 'is-active' : '' }}" aria-roledescription="slide" aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
            <img class="lm-slide__bg" src="{{ $img($s['image']) }}" alt="" @if ($loop->first) fetchpriority="high" @else loading="lazy" @endif>

            <div class="lm-container lm-slide__in">
                <div class="lm-slide__copy">
                    <p class="lm-eyebrow lm-eyebrow--line">{{ $s['eyebrow'] }}</p>
                    <{{ $tag }} class="lm-hero__title">{{ $s['title'][0] }}<em>{{ $s['title'][1] }}</em></{{ $tag }}>
                    <p class="lm-hero__text">{{ $s['text'] }}</p>
                    <div class="lm-hero__actions">
                        <a class="lm-btn lm-btn--gold" href="#menu">Lihat Menu <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                        <button class="lm-btn lm-btn--ghost" type="button" data-modal-open>
                            <svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg> Reservasi Meja
                        </button>
                    </div>
                </div>
                <p class="lm-hero__script" aria-hidden="true">{!! implode('<br>', array_map('e', $s['script'])) !!}</p>
            </div>
        </article>
    @endforeach

    @if (count($cafe['slides']) > 1)
        <button class="lm-hero__nav lm-hero__nav--prev" type="button" data-slide="prev" aria-label="Slide sebelumnya"><svg class="i" aria-hidden="true"><use href="#i-prev"/></svg></button>
        <button class="lm-hero__nav lm-hero__nav--next" type="button" data-slide="next" aria-label="Slide berikutnya"><svg class="i" aria-hidden="true"><use href="#i-next"/></svg></button>
    @endif
</section>
