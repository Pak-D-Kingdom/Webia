{{-- Hero: teks + statistik + pencarian | ilustrasi | kartu Kursus Populer --}}
<section class="hero" aria-labelledby="hero-title">
    <div class="hero__bg" aria-hidden="true">
        <img class="hero__plants hero__plants--l" src="{{ $img }}hero-plants-left.jpg" alt="">
        <img class="hero__plants hero__plants--r" src="{{ $img }}hero-plants-right.jpg" alt="">
        <i class="deco deco--star bi bi-star-fill d1"></i>
        <i class="deco deco--star bi bi-star-fill d2"></i>
        <i class="deco deco--heart bi bi-heart-fill d3"></i>
        <i class="deco deco--plus bi bi-plus-lg d4"></i>
        <i class="deco deco--heart bi bi-heart-fill d5"></i>
        <span class="deco deco--blob d6"></span>
    </div>

    <div class="container hero__in">
        <div class="hero__copy" data-reveal>
            <span class="pill"><i class="bi bi-star-fill" aria-hidden="true"></i>{{ $t['hero']['badge'] }}</span>
            <h1 id="hero-title" class="hero__title">
                <span class="hero__line">{{ $t['hero']['title_1'] }}</span>
                <span class="hero__line"><span class="c-cyan">{{ $t['hero']['title_cyan'] }}</span> <span class="c-pink">{{ $t['hero']['title_pink'] }}</span></span>
            </h1>
            <p class="hero__desc">{{ $t['hero']['desc'] }}</p>

            <ul class="stats">
                @foreach ($t['hero']['stats'] as $s)
                    <li class="stat">
                        <span class="stat__icon tone-{{ $s['tone'] }}"><i class="bi {{ $s['icon'] }}" aria-hidden="true"></i></span>
                        <span class="stat__txt"><strong>{{ $s['title'] }}</strong><small>{{ $s['text'] }}</small></span>
                    </li>
                @endforeach
            </ul>

            <form class="search search--hero" action="{{ route($rp.'programs') }}" method="get" role="search">
                <div class="search__box">
                    <span class="search__ico" aria-hidden="true"><i class="bi bi-search"></i></span>
                    <label class="sr-only" for="hero-q">Cari kursus</label>
                    <input id="hero-q" class="search__input" type="search" name="q" placeholder="{{ $t['hero']['search_placeholder'] }}" autocomplete="off" data-suggest>
                    <button class="search__btn" type="submit"><span>Cari</span><i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>

        <div class="hero__art" data-reveal>
            <img src="{{ $img }}hero-girl.jpg" alt="Siswi belajar online memakai laptop dan headphone" width="732" height="552">
        </div>

        <aside class="popular" data-reveal aria-labelledby="popular-title">
            <header class="panel__head">
                <h2 id="popular-title"><i class="bi bi-fire c-orange" aria-hidden="true"></i> Kursus Populer</h2>
                <a class="link-more" href="{{ route($rp.'programs') }}">Lihat Semua <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </header>
            <ul class="popular__grid">
                @foreach ($t['popular'] as $c)
                    <li>
                        <a class="tile tone-{{ $c['tone'] }}" href="{{ route($rp.'programs', ['cat' => $c['category']]) }}">
                            <img src="{{ $img.$c['image'] }}" alt="" width="52" height="52" loading="lazy">
                            <span>{{ $c['title'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>
</section>
