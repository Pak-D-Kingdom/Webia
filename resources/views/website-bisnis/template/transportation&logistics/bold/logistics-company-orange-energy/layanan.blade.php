@extends($v.'layouts.app')

@section('title', 'Layanan Logistik - '.$site['brand']['name'])

@section('content')
    @include($v.'partials.page-header', ['ph' => [
        'crumb' => 'Layanan',
        'title' => $site['services']['title'],
        'text'  => $site['services']['text'],
        'image' => 'hero-scene.jpg',
    ]])

    <section class="lg-wrap lg-sec">
        <div class="lg-grid lg-grid--3">
            @foreach ($site['services']['items'] as $s)
                <article class="lg-card" id="{{ \Illuminate\Support\Str::slug($s['title']) }}">
                    <div class="lg-card__img">
                        <img src="{{ $img($s['image']) }}" alt="{{ $s['title'] }}" loading="lazy">
                        <span class="lg-card__badge"><svg class="lg-ic" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"></use></svg></span>
                    </div>
                    <div class="lg-card__body">
                        <h2>{{ $s['title'] }}</h2>
                        <p>{{ $s['text'] }}</p>
                        <ul class="lg-check">
                            @foreach ($s['features'] as $feat)
                                <li><svg class="lg-ic" aria-hidden="true"><use href="#i-check"></use></svg>{{ $feat }}</li>
                            @endforeach
                        </ul>
                        <a class="lg-link" href="{{ $to('penawaran') }}?layanan={{ urlencode($s['title']) }}">Minta Penawaran<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    @include($v.'partials.cta-band')
@endsection
