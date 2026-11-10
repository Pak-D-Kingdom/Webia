<section class="eo-sec">
    <div class="eo-container">
        @include($eo['view'].'partials.section-head', ['heading' => 'Karya terbaik kami', 'sub' => 'Telusuri acara yang telah kami wujudkan dan temukan inspirasi untuk acara Anda.'])

        <div class="eo-filter" role="group" aria-label="Filter portofolio">
            @foreach($eo['categories'] as $cat)
            <button type="button" class="eo-chip @if($loop->first) is-active @endif" data-eo-filter="{{ $cat['key'] }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $cat['label'] }}</button>
            @endforeach
        </div>

        <div class="eo-gallery" data-eo-gallery>
            @foreach($eo['portfolio'] as $item)
            <article class="eo-shot" data-cat="{{ $item['cat'] }}">
                <button type="button" class="eo-shot__btn" data-eo-lightbox
                        data-title="{{ $item['title'] }}" data-tag="{{ $item['cat_label'] }}"
                        data-meta="{{ $item['place'] }} · {{ $item['year'] }} · {{ $item['guests'] }}"
                        data-text="{{ $item['desc'] }}" data-imgs="{{ asset($eo['assets']['img']) }}/{{ $item['img'] }}">
                    <img src="{{ asset($eo['assets']['img']) }}/{{ $item['img'] }}" alt="{{ $item['title'] }}" width="1200" height="900" loading="lazy">
                    <span class="eo-shot__zoom"><svg class="eo-i" aria-hidden="true"><use href="#i-zoom"/></svg></span>
                    <span class="eo-shot__over">
                        <span class="eo-tag eo-tag--light">{{ $item['cat_label'] }}</span>
                        <strong>{{ $item['title'] }}</strong>
                        <small>{{ $item['place'] }} · {{ $item['year'] }}</small>
                    </span>
                </button>
            </article>
            @endforeach
        </div>
        <p class="eo-empty" data-eo-gallery-empty hidden>Belum ada karya pada kategori ini.</p>
    </div>
</section>
