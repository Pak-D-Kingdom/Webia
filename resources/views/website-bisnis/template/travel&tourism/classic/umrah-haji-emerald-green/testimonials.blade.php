@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'Testimoni Jemaah — Nur Rahmat Travel')
@section('description', 'Kisah nyata jemaah yang telah merasakan layanan umrah dan haji Nur Rahmat Travel.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'testimonials'])

    <section class="uh-section">
        <div class="uh-container">
            <div class="uh-tssum">
                <div class="uh-tssum__score">
                    <strong>{{ $uh['testimonials']['rating'] }}</strong>
                    <p class="uh-stars" role="img" aria-label="Penilaian 5 dari 5">
                        <svg class="uh-i" aria-hidden="true"><use href="#i-star"/></svg>
                        <svg class="uh-i" aria-hidden="true"><use href="#i-star"/></svg>
                        <svg class="uh-i" aria-hidden="true"><use href="#i-star"/></svg>
                        <svg class="uh-i" aria-hidden="true"><use href="#i-star"/></svg>
                        <svg class="uh-i" aria-hidden="true"><use href="#i-star"/></svg>
                    </p>
                </div>
                <p class="uh-tssum__text">{{ $uh['testimonials']['rating_label'] }}</p>
                <a class="uh-btn uh-btn--outline uh-btn--sm" href="{{ $wa('Assalamualaikum Nur Rahmat Travel, saya ingin membagikan pengalaman umrah/haji saya.') }}" target="_blank" rel="noopener noreferrer"><svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg><span>Bagikan pengalaman Anda</span></a>
            </div>
            <div class="uh-tsgrid">
                @foreach ($uh['testimonials']['items'] as $t)
                    <figure class="uh-tscard">
                        <span class="uh-tscard__mark" aria-hidden="true"><svg class="uh-i"><use href="#i-quote"/></svg></span>
                        <blockquote class="uh-tscard__text"><p>{{ $t['text'] }}</p></blockquote>
                        <p class="uh-stars" role="img" aria-label="Penilaian 5 dari 5">
                            <svg class="uh-i" aria-hidden="true"><use href="#i-star"/></svg>
                            <svg class="uh-i" aria-hidden="true"><use href="#i-star"/></svg>
                            <svg class="uh-i" aria-hidden="true"><use href="#i-star"/></svg>
                            <svg class="uh-i" aria-hidden="true"><use href="#i-star"/></svg>
                            <svg class="uh-i" aria-hidden="true"><use href="#i-star"/></svg>
                        </p>
                        <figcaption class="uh-tscard__cap">
                            <span class="uh-avatar uh-avatar--sm">
                                @if ($t['image'])
                                    <img src="{{ $img($t['image']) }}" alt="Foto {{ $t['name'] }}" width="48" height="48" loading="lazy">
                                @else
                                    <span class="uh-avatar__ini" aria-hidden="true">{{ $t['initials'] }}</span>
                                @endif
                            </span>
                            <span>
                                <strong>{{ $t['name'] }}</strong>
                                <small>{{ $t['role'] }}</small>
                            </span>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>
@endsection
