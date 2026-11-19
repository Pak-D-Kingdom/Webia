<section class="eo-sec">
    <div class="eo-container">
        @include($eo['view'].'partials.section-head', ['heading' => 'Proyek yang pernah kami wujudkan', 'sub' => 'Setiap proyek punya cerita. Berikut sebagian acara yang telah kami rancang dan jalankan.'])

        @foreach($eo['projects'] as $proj)
        @if($proj['featured'])
        <article class="eo-feature" data-reveal>
            <figure class="eo-feature__media">
                <img src="{{ asset($eo['assets']['img']) }}/{{ $proj['img'] }}" alt="{{ $proj['title'] }}" width="1200" height="900" loading="lazy">
                <button type="button" class="eo-frame__play" data-eo-highlight
                        data-title="{{ $proj['title'] }}" data-tag="{{ $proj['cat'] }}" data-meta="{{ $proj['venue'] }} · {{ $proj['date'] }}" data-text="{{ $proj['desc'] }}"
                        data-imgs="{{ asset($eo['assets']['img']) }}/{{ $proj['img'] }}|{{ asset($eo['assets']['img']) }}/polaroid-venue.jpg|{{ asset($eo['assets']['img']) }}/gal-wedding-rose.jpg|{{ asset($eo['assets']['img']) }}/gal-wedding-gold.jpg"
                        aria-label="Putar sorotan proyek {{ $proj['title'] }}">
                    <i class="eo-frame__ring"></i><svg class="eo-i" aria-hidden="true"><use href="#i-play"/></svg>
                </button>
            </figure>
            <div class="eo-feature__body">
                <span class="eo-tag">Proyek Unggulan · {{ $proj['cat'] }}</span>
                <h3>{{ $proj['title'] }}</h3>
                <p>{{ $proj['desc'] }}</p>
                <dl class="eo-facts">
                    <div><dt>Klien</dt><dd>{{ $proj['client'] }}</dd></div>
                    <div><dt>Waktu</dt><dd>{{ $proj['date'] }}</dd></div>
                    <div><dt>Lokasi</dt><dd>{{ $proj['venue'] }}</dd></div>
                    <div><dt>Tamu</dt><dd>{{ $proj['guests'] }}</dd></div>
                </dl>
                <ul class="eo-checks eo-checks--2">
                    @foreach($proj['highlights'] as $hl)
                    <li><svg class="eo-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $hl }}</li>
                    @endforeach
                </ul>
            </div>
        </article>
        @endif
        @endforeach

        <div class="eo-projgrid">
            @foreach($eo['projects'] as $proj)
            @if(!$proj['featured'])
            <article class="eo-proj" data-reveal>
                <figure class="eo-proj__media">
                    <img src="{{ asset($eo['assets']['img']) }}/{{ $proj['img'] }}" alt="{{ $proj['title'] }}" width="1200" height="900" loading="lazy">
                    <span class="eo-tag eo-tag--light">{{ $proj['cat'] }}</span>
                </figure>
                <div class="eo-proj__body">
                    <h3>{{ $proj['title'] }}</h3>
                    <p>{{ $proj['desc'] }}</p>
                    <ul class="eo-proj__meta">
                        <li><svg class="eo-i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $proj['venue'] }}</li>
                        <li><svg class="eo-i" aria-hidden="true"><use href="#i-calendar"/></svg>{{ $proj['date'] }}</li>
                        <li><svg class="eo-i" aria-hidden="true"><use href="#i-users"/></svg>{{ $proj['guests'] }}</li>
                    </ul>
                    <button type="button" class="eo-link eo-link--btn" data-eo-lightbox
                            data-title="{{ $proj['title'] }}" data-tag="{{ $proj['cat'] }}" data-meta="{{ $proj['venue'] }} · {{ $proj['date'] }} · {{ $proj['guests'] }}"
                            data-text="{{ $proj['desc'] }}" data-imgs="{{ asset($eo['assets']['img']) }}/{{ $proj['img'] }}">Lihat detail <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
                </div>
            </article>
            @endif
            @endforeach
        </div>
    </div>
</section>
