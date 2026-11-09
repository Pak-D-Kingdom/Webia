@extends('website-bisnis.template.travel&tourism.elegan.umrah-haji-navy-champagne-gold.layout')

@section('title', 'Tim Pembimbing — Al Hijrah Travel')

@section('content')
@include($v . '.partials.page-hero', ['eyebrow' => 'TIM KAMI', 'title' => 'Tim Pembimbing', 'desc' => 'Didampingi oleh muthawwif berpengalaman dan profesional di bidangnya.', 'bg' => 'hero.svg'])

<section class="uh-section">
    <div class="uh-container">
        <div class="uh-team">
            @foreach ($d['team'] as $i => $t)
                <article class="uh-member" data-reveal style="--d:{{ ($i % 3) * .08 }}s">
                    <span class="uh-member__img"><img src="{{ $img($t['image']) }}" alt="{{ $t['name'] }}" loading="lazy"></span>
                    <h3>{{ $t['name'] }}</h3>
                    <b>{{ $t['role'] }}</b>
                    <p>{{ $t['bio'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
@include($v . '.partials.cta')
@endsection
