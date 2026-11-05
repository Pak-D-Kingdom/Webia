@extends($v . '.layout')

@section('title', 'AI Assistant & FAQ â€” AgroTrade')
@section('description', 'Tanya AgroBot, asisten AI AgroTrade, seputar komoditas, harga, proses pengiriman, sertifikasi, dan peluang kemitraan.')

@section('content')
@php $img = fn ($f) => asset($agro['img_path'] . '/' . $f); $ai = $agro['ai']; @endphp

@include($v . '.partials.page-hero', [
    'ph_title' => 'Tanya AI Assistant',
    'ph_lead'  => $ai['text'],
    'ph_icon'  => 'sparkle',
])

<section class="container section">
    <div class="split split--ai">
        <article class="card botcard">
            <div class="botcard__stage" aria-hidden="true">
                <img src="{{ $img('agrobot.svg') }}" alt="" width="150" height="180">
            </div>
            <div class="botcard__body">
                <h2>Halo, saya AgroBot</h2>
                <p>{{ $ai['welcome'] }}</p>
                <button type="button" class="btn btn--amber" data-chat-open>
                    <svg class="i" aria-hidden="true"><use href="#i-chat"/></svg> Mulai Chat
                </button>
                <ul class="botcard__chips">
                    @foreach ($ai['chips'] as $chip)
                        <li><button type="button" data-chat-ask="{{ $chip }}"><span class="qdot"><svg class="i i--sm" aria-hidden="true"><use href="#i-chat"/></svg></span>{{ $chip }}</button></li>
                    @endforeach
                </ul>
            </div>
        </article>

        <div class="faq">
            <h2>Pertanyaan yang sering diajukan</h2>
            @foreach ($ai['faq'] as $i => $f)
                <details class="faq__item" @if ($i === 0) open @endif>
                    <summary>
                        <span>{{ $f['q'] }}</span>
                        <svg class="i" aria-hidden="true"><use href="#i-chev"/></svg>
                    </summary>
                    <div class="faq__a">
                        <p>{{ $f['a'] }}</p>
                        <a class="link-amber link-amber--sm" href="{{ route('agribisnis-classic-trust.' . $f['page']) }}">{{ $f['cta'] }} <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                    </div>
                </details>
            @endforeach
        </div>
    </div>
</section>

@include($v . '.partials.cta-band', [
    'cta_title' => 'Masih ada pertanyaan?',
    'cta_text'  => 'Tim kami siap membantu lewat WhatsApp pada jam kerja, Senin sampai Jumat pukul 08:00 â€“ 17:00 WIB.',
])
@endsection
