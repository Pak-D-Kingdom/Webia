{{-- Hero banner: foto Santorini + headline + badge layanan --}}
@php $h = $t['hero']; @endphp
<section class="ga-hero" aria-labelledby="ga-hero-title">
    <img class="ga-hero__bg" src="{{ $img($h['image']) }}" alt="" fetchpriority="high" decoding="async">
    <span class="ga-hero__shade" aria-hidden="true"></span>
    <svg class="ga-hero__leaf" viewBox="0 0 120 140" aria-hidden="true" focusable="false"><g fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"><path d="M10 138C20 96 40 60 80 20"/><path d="M26 108c-10-2-18-8-22-18 12 0 20 6 22 18zM38 84c-8-4-14-12-14-22 10 4 16 12 14 22zM52 62c-5-7-6-16-2-24 8 6 9 15 2 24zM34 100c10-4 20-3 28 3-8 6-20 6-28-3zM48 78c9-3 18-1 25 6-9 5-19 4-25-6zM64 54c8-3 15-1 21 5-8 4-16 3-21-5z"/></g></svg>

    <div class="ga-container ga-hero__in">
        <div class="ga-hero__copy">
            <p class="ga-eyebrow">{{ $h['eyebrow'] }}</p>
            <h1 id="ga-hero-title">{{ $h['title'] }} <span class="ga-gold">{{ $h['title_gold'] }}</span></h1>
            <p class="ga-hero__text">{{ $h['text'] }}</p>
            <div class="ga-hero__cta">
                <a class="ga-btn ga-btn--gold" href="{{ $url('destinasi') }}">Jelajahi Destinasi {!! $icon('arrow') !!}</a>
                <a class="ga-play" href="{{ $h['video_url'] ?: $url('galeri') }}" @if ($h['video_url']) target="_blank" rel="noopener noreferrer" @endif>
                    <span class="ga-play__btn">{!! $icon('play') !!}</span>
                    <span>Tonton Video</span>
                </a>
            </div>
        </div>

        <p class="ga-hero__script" aria-hidden="true">{{ $h['script'] }}</p>

        <ul class="ga-hero__badges">
            @foreach ($h['badges'] as $b)
                <li><span class="ga-hero__badge-ico">{!! $icon($b['icon']) !!}</span><span>{{ $b['text'] }}</span></li>
            @endforeach
        </ul>
    </div>
</section>
