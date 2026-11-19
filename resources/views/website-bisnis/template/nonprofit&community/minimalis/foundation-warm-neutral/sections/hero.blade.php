<div class="hf-herowrap">
    <section class="hf-hero" aria-labelledby="hf-hero-title">
        <svg class="hf-hero__leaves" viewBox="0 0 140 240" aria-hidden="true"><use href="#deco-leaves"/></svg>

        <div class="hf-container hf-hero__inner">
            <div class="hf-hero__copy">
                <p class="hf-script hf-hero__script">{{ $f['hero']['script'] }}</p>
                <h1 class="hf-hero__title" id="hf-hero-title">{{ $f['hero']['title_a'] }} <span class="hf-hl">{{ $f['hero']['highlight'] }}</span><br>{{ $f['hero']['title_b'] }}</h1>
                <p class="hf-hero__text">{{ $f['hero']['text'] }}</p>
                <div class="hf-hero__cta">
                    <a class="hf-btn hf-btn--dark hf-btn--lg" href="{{ route($rp.'donation') }}">{{ $f['hero']['primary'] }} <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                    <a class="hf-btn hf-btn--text" href="{{ route($rp.'mission-vision') }}">{{ $f['hero']['secondary'] }} <svg class="hf-i hf-i--play" aria-hidden="true"><use href="#i-play"/></svg></a>
                </div>
            </div>
        </div>

        <div class="hf-hero__media">
            <img class="hf-hero__photo" src="{{ asset($img.'/hero-children.jpg') }}" width="2830" height="655" alt="Empat anak tersenyum dan saling merangkul di taman" fetchpriority="high">
            <p class="hf-hero__quote hf-script">
                {{ $f['hero']['quote'] }}
                <svg class="hf-hero__quote-heart" viewBox="0 0 40 36" aria-hidden="true"><use href="#deco-heart"/></svg>
            </p>
        </div>
    </section>

</div>
