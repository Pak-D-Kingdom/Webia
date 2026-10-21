<section class="hero" data-hero aria-roledescription="carousel" aria-label="Properti unggulan">
    <svg class="deco hero__deco" aria-hidden="true"><use href="#i-branch"/></svg>

    @foreach ($t['hero']['slides'] as $i => $s)
        @php $p = collect($t['properties'])->firstWhere('slug', $s['property']); @endphp
        <article class="hero__slide {{ $i === 0 ? 'is-active' : '' }}" data-slide aria-roledescription="slide" aria-label="{{ $i + 1 }} dari {{ count($t['hero']['slides']) }}">
            <div class="container container--nav">
                <div class="hero__copy">
                    <p class="eyebrow">PREMIUM PROPERTY</p>
                    <{{ $i === 0 ? 'h1' : 'h2' }} class="hero__title">{!! nl2br(e($s['title'])) !!}</{{ $i === 0 ? 'h1' : 'h2' }}>
                    <p class="hero__desc">{{ $t['hero']['desc'] }}</p>

                    <ul class="hero__chips">
                        <li><svg class="i" aria-hidden="true"><use href="#i-bed"/></svg><span><b>{{ $p['beds'] }} Bedrooms</b><small>({{ $p['beds'] }} Kamar Tidur)</small></span></li>
                        <li><svg class="i" aria-hidden="true"><use href="#i-bath"/></svg><span><b>{{ $p['baths'] }} Bathrooms</b><small>({{ $p['baths'] }} Kamar Mandi)</small></span></li>
                        <li><svg class="i" aria-hidden="true"><use href="#i-car"/></svg><span><b>{{ $p['carport'] }} Carport</b><small>({{ $p['carport'] }} Mobil)</small></span></li>
                        <li><svg class="i" aria-hidden="true"><use href="#i-area"/></svg><span><b>{{ $p['land'] }} m²</b><small>Luas Tanah</small></span></li>
                    </ul>

                    <a class="btn btn--primary" href="{{ $r('property', ['slug' => $p['slug']]) }}">Lihat Detail Properti <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </div>
            </div>
            <div class="hero__media media">
                <img src="{{ $img($s['image']) }}" alt="{{ $p['name'] }}" data-fallback @if ($i > 0) loading="lazy" @endif>
            </div>
        </article>
    @endforeach

    <p class="hero__script" aria-hidden="true">{!! nl2br(e($t['hero']['script'])) !!}
        <svg viewBox="0 0 220 24" fill="none"><path d="M4 18C60 6 140 4 216 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
    </p>

    <div class="hero__ctrl">
        <button type="button" aria-label="Slide sebelumnya" data-hero-prev><svg class="i" aria-hidden="true"><use href="#i-left"/></svg></button>
        <span aria-live="off"><b data-hero-current>1</b> / <span data-hero-total>{{ count($t['hero']['slides']) }}</span></span>
        <button type="button" aria-label="Slide berikutnya" data-hero-next><svg class="i" aria-hidden="true"><use href="#i-right"/></svg></button>
    </div>
</section>
