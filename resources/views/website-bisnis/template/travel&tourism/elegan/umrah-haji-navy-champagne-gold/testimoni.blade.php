@extends('website-bisnis.template.travel&tourism.elegan.umrah-haji-navy-champagne-gold.layout')

@section('title', 'Testimoni Jamaah — Al Hijrah Travel')

@section('content')
@include($v . '.partials.page-hero', ['eyebrow' => 'KISAH JAMAAH', 'title' => 'Testimoni Jamaah', 'desc' => 'Kisah nyata dari jamaah yang telah merasakan layanan terbaik kami.', 'bg' => 'banner-baitullah.svg', 'chips' => [count($d['testimonials']) . ' testimoni jamaah', 'Layanan sepenuh hati', 'Pembimbing ramah']])

<section class="uh-section">
    <div class="uh-container">
        @php $avg = array_sum(array_column($d['testimonials'], 'rating')) / count($d['testimonials']); @endphp
        <div class="uh-rating" data-reveal>
            <strong>{{ number_format($avg, 1, ',', '.') }}</strong>
            <div>
                <span class="uh-stars" aria-label="Rata-rata {{ number_format($avg, 1, ',', '.') }} dari 5">@for ($s = 0; $s < 5; $s++)<svg class="uh-ico {{ $s < round($avg) ? 'is-on' : '' }}" aria-hidden="true"><use href="#i-star"/></svg>@endfor</span>
                <small>Rata-rata dari {{ count($d['testimonials']) }} testimoni jamaah</small>
            </div>
            <a class="uh-btn uh-btn--dark uh-btn--sm" href="{{ $wa($d['contact']['wa_text']) }}" target="_blank" rel="noopener">Tanya Pengalaman Jamaah</a>
        </div>
        <div class="uh-testis">
            @foreach ($d['testimonials'] as $i => $t)
                <figure class="uh-tcard" data-reveal style="--d:{{ ($i % 3) * .07 }}s">
                    <span class="uh-tcard__q" aria-hidden="true">&ldquo;</span>
                    <span class="uh-stars" aria-label="{{ $t['rating'] }} dari 5 bintang">@for ($s = 0; $s < 5; $s++)<svg class="uh-ico {{ $s < $t['rating'] ? 'is-on' : '' }}" aria-hidden="true"><use href="#i-star"/></svg>@endfor</span>
                    <blockquote>{{ $t['text'] }}</blockquote>
                    <figcaption>
                        <span class="uh-tcard__img"><img src="{{ $img($t['image']) }}" alt="{{ $t['name'] }}" loading="lazy"></span>
                        <span><b>{{ $t['name'] }}</b><small>{{ $t['role'] }}</small></span>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
