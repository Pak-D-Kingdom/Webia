@php($r = $e['route'])
@php($h = $e['hero'])
<section class="nl-hero" aria-labelledby="hero-title">
    <div class="nl-container nl-hero__grid">
        <div class="nl-hero__copy">
            <span class="nl-pill"><svg class="ic"><use href="#i-star"/></svg>{{ $h['badge'] }}</span>
            <h1 id="hero-title">{{ $h['title'] }} <span class="nl-grad">{{ $h['title_2'] }}</span></h1>
            <p class="nl-hero__text">{{ $h['text'] }}</p>

            <ul class="nl-feats">
                @foreach($h['features'] as $f)
                    <li>
                        <span class="nl-feats__ic"><svg class="ic"><use href="#i-{{ $f['icon'] }}"/></svg></span>
                        <span><strong>{{ $f['value'] }}</strong><small>{{ $f['label'] }}</small></span>
                    </li>
                @endforeach
            </ul>

            <div class="nl-hero__search">
                <form class="nl-search" action="{{ route($r.'programs') }}" method="get" role="search" data-hero-search>
                    <svg class="ic"><use href="#i-search"/></svg>
                    <label class="nl-sr" for="hero-q">Cari kursus</label>
                    <input id="hero-q" type="search" name="q" placeholder="{{ $h['search'] }}" autocomplete="off"
                           role="combobox" aria-expanded="false" aria-controls="hero-suggest" aria-autocomplete="list" data-suggest-input>
                    <button type="button" class="nl-search__clear" data-clear hidden aria-label="Hapus pencarian"><svg class="ic"><use href="#i-close"/></svg></button>
                    <button type="submit" class="nl-search__go" aria-label="Cari"><svg class="ic"><use href="#i-arrow"/></svg></button>
                </form>
                <ul class="nl-suggest" id="hero-suggest" role="listbox" aria-label="Saran pencarian" hidden data-suggest-list></ul>
                <p class="nl-popular"><span>Populer:</span>
                    @foreach($h['popular'] as $term)<a href="{{ route($r.'programs', ['q' => $term]) }}">{{ $term }}</a>@endforeach
                </p>
            </div>
        </div>

        <div class="nl-hero__art" aria-hidden="true">
            <img src="{{ asset($e['img'].'/hero-student.png') }}" alt="" width="862" height="604" fetchpriority="high">
        </div>

        <aside class="nl-card nl-journey" aria-labelledby="journey-title">
            <div class="nl-head">
                <div>
                    <h2 id="journey-title">{{ $h['journey_title'] }}</h2>
                    <p>{{ $h['journey_text'] }}</p>
                </div>
                <a class="nl-round" href="{{ route($r.'programs') }}" aria-label="Lihat semua program"><svg class="ic"><use href="#i-arrow"/></svg></a>
            </div>
            <ul class="nl-cats">
                @foreach($e['categories'] as $key => $c)
                    <li>
                        <a href="{{ route($r.'programs', ['cat' => $key]) }}">
                            <span class="nl-cats__ic"><svg class="ic"><use href="#i-{{ $c['icon'] }}"/></svg></span>
                            <span>{{ $c['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>
</section>
