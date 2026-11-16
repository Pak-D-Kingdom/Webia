@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'Tim Pembimbing — Nur Rahmat Travel')
@section('description', 'Kenali muthawwif dan tim pembimbing Nur Rahmat Travel yang berpengalaman dan tersertifikasi.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'team'])

    <section class="uh-section">
        <div class="uh-container">
            <div class="uh-teamgrid">
                @foreach ($uh['guides']['items'] as $g)
                    <article class="uh-gcard">
                        <span class="uh-gcard__photo"><img src="{{ $img($g['image']) }}" alt="Foto {{ $g['name'] }}" width="148" height="148" loading="lazy"><b class="uh-gcard__years"><span>{{ $g['years'] }}</span> th</b></span>
                        <h2 class="uh-gcard__name">{{ $g['name'] }}</h2>
                        <p class="uh-gcard__role">{{ $g['role'] }}</p>
                        <ul class="uh-gcard__meta">
                            <li><svg class="uh-i" aria-hidden="true"><use href="#i-guide"/></svg>{{ $g['exp'] }}</li>
                            <li><svg class="uh-i" aria-hidden="true"><use href="#i-message"/></svg>Bahasa: {{ $g['langs'] }}</li>
                        </ul>
                        <p class="uh-gcard__bio">{{ $g['bio'] }}</p>
                        <a class="uh-btn uh-btn--outline uh-btn--sm" href="{{ $wa('Assalamualaikum Nur Rahmat Travel, saya ingin berkonsultasi mengenai pendampingan bersama '.$g['name'].'.') }}" target="_blank" rel="noopener noreferrer">
                            <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
                            <span>Konsultasi</span>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
