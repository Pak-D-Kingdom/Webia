@php
    // Data untuk foundation.js (FAQ GreenBot + nomor WhatsApp). Tidak ada data sensitif.
    $botData = [
        'wa'          => $cfg['contact']['whatsapp'],
        'bot'         => $cfg['brand']['bot'],
        'greeting'    => $cfg['chatbot']['greeting'],
        'intro'       => $cfg['chatbot']['intro'],
        'fallback'    => $cfg['chatbot']['fallback'],
        'suggestions' => $cfg['chatbot']['suggestions'],
        'faq'         => array_map(fn ($f) => [
            'q'     => $f['q'],
            'k'     => $f['keywords'],
            'a'     => $f['a'],
            'url'   => $url($f['link']),
            'label' => $f['link_label'],
        ], $cfg['chatbot']['faq']),
    ];
    $showBot = $page !== 'ai-chatbot';
@endphp

<div class="fh-float" data-fh-float>
    <a class="fh-wa" href="{{ $wa('Halo GreenHope Foundation, saya ingin bertanya.') }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp GreenHope">
        <span class="fh-wa__ring" aria-hidden="true"></span>
        <span class="fh-wa__ring fh-wa__ring--2" aria-hidden="true"></span>
        {{ $icon('whatsapp', 'fh-ic fh-wa__icon') }}
        <span class="fh-wa__label">Chat WhatsApp</span>
    </a>

    @if ($showBot)
        <button class="fh-botbtn" type="button" data-fh-bot-toggle aria-expanded="false" aria-controls="fh-bot" aria-label="Buka {{ $cfg['brand']['bot'] }}, asisten FAQ program dan donasi">
            <span class="fh-botbtn__halo" aria-hidden="true"></span>
            <span class="fh-botbtn__orbit" aria-hidden="true"><i></i><i></i><i></i></span>
            <img class="fh-botbtn__img" src="{{ $img('robot-btn.png') }}" alt="" width="64" height="64">
            <span class="fh-botbtn__badge" aria-hidden="true">FAQ</span>
            <span class="fh-botbtn__tip" data-fh-bot-tip aria-hidden="true">Halo! Tanya {{ $cfg['brand']['bot'] }}</span>
        </button>
    @endif
</div>

@if ($showBot)
    <section class="fh-bot" id="fh-bot" data-fh-bot role="dialog" aria-modal="false" aria-label="{{ $cfg['brand']['bot'] }} — FAQ program dan donasi" hidden>
        <header class="fh-bot__head">
            <img class="fh-bot__mascot" src="{{ $img('mascot.png') }}" alt="" width="84" height="94">
            <div class="fh-bot__title">
                <strong>{{ $cfg['brand']['bot'] }}</strong>
                <span>Asisten FAQ Program &amp; Donasi</span>
            </div>
            <button class="fh-bot__close" type="button" data-fh-bot-close aria-label="Tutup {{ $cfg['brand']['bot'] }}">{{ $icon('close') }}</button>
        </header>
        @include($v('partials.chat'), ['chatId' => 'fh-bot-input'])
        <a class="fh-bot__more" href="{{ $url('ai-chatbot') }}">Buka halaman {{ $cfg['brand']['bot'] }} {{ $icon('arrow') }}</a>
    </section>
@endif

<div class="fh-toast" data-fh-toast role="status" aria-live="polite" hidden></div>

<script type="application/json" id="fh-data">{!! json_encode($botData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
