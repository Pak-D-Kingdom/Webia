@extends('website-bisnis.template.travel&tourism.elegan.umrah-haji-navy-champagne-gold.layout')

@section('title', 'AI Chat — FAQ Paket & Pendaftaran | Al Hijrah Travel')

@section('content')
@include($v . '.partials.page-hero', ['eyebrow' => 'ASISTEN AI', 'title' => 'AI Chat', 'desc' => 'Tanya apa saja tentang paket umrah, haji, jadwal, harga, dan persyaratan pendaftaran.', 'bg' => 'bot.svg', 'chips' => ['Online setiap hari', 'Jawaban instan', 'FAQ paket & pendaftaran'], 'contain' => true])

<section class="uh-section">
    <div class="uh-container uh-chatpage">
        <div data-reveal>
            @include($v . '.partials.chat', ['mode' => 'page'])
        </div>
        <div class="uh-faq" data-reveal style="--d:.08s">
            <h2 class="uh-card__title">Pertanyaan yang Sering Diajukan</h2>
            <p class="uh-card__sub">Ketuk pertanyaan untuk melihat jawabannya, atau tanyakan langsung ke asisten kami.</p>
            @foreach ($d['faq'] as $f)
                <details class="uh-acc">
                    <summary>{{ $f['q'] }} <svg class="uh-ico" aria-hidden="true"><use href="#i-caret"/></svg></summary>
                    <div>
                        <p>{{ $f['a'] }}</p>
                        @if ($f['l'])
                            <a class="uh-link" href="{{ $r($f['l'][0]) }}">{{ $f['l'][1] }} <svg class="uh-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                        @endif
                    </div>
                </details>
            @endforeach
        </div>
    </div>
</section>
@endsection
