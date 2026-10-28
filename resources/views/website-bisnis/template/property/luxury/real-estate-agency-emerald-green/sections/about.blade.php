{{-- ===================== ABOUT US (preview di beranda & halaman About Us) ===================== --}}
@php
    $isPreview = $preview ?? false;
    $paras     = $isPreview ? array_slice($about['text'], 0, 1) : $about['text'];
@endphp
<section class="rea-section" id="about" aria-labelledby="about-title">
    <div class="rea-container rea-about">
        <div class="rea-about__media">
            <img src="{{ $about['src'] }}" alt="{{ $about['alt'] }}" loading="lazy">
        </div>
        <div class="rea-about__text">
            <p class="rea-eyebrow rea-eyebrow--dark">{{ strtoupper($about['eyebrow']) }}</p>
            <h2 id="about-title">{{ $about['title'] }}</h2>
            @foreach ($paras as $para)
                <p>{{ $para }}</p>
            @endforeach
            @if ($isPreview)
                <a class="rea-link" href="{{ $route('about') }}">Learn More About Us {{ $icon('arrow') }}</a>
            @else
                <a class="rea-btn rea-btn--dark" href="{{ $route('contact', '#inquiry') }}">Get In Touch {{ $icon('arrow') }}</a>
            @endif
        </div>
    </div>

    @if (! $isPreview)
        <div class="rea-container">
            <ul class="rea-about__strip">
                <li><img src="{{ $img('gallery-2.jpg') }}" alt="Living space" loading="lazy"></li>
                <li><img src="{{ $img('gallery-3.jpg') }}" alt="Bedroom" loading="lazy"></li>
                <li><img src="{{ $img('gallery-4.jpg') }}" alt="Pool and garden" loading="lazy"></li>
            </ul>
        </div>
    @endif
</section>
