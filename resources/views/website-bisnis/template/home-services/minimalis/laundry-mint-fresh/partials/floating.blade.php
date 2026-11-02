@php
    $bot = $c['chatbot'];
    $wa  = 'https://wa.me/' . $c['contact']['whatsapp'] . '?text=' . rawurlencode('Halo ' . $c['brand']['name'] . ', saya ingin bertanya tentang layanan laundry.');

    // Data chatbot: konten statis dari config, diproses di sisi browser (tanpa backend).
    $faqData = [];
    foreach ($bot['faq'] as $f) {
        $faqData[] = [
            'key'      => $f['key'],
            'label'    => implode(' ', $f['label']),
            'keywords' => $f['keywords'],
            'answer'   => $f['answer'],
            'url'      => $r($f['link']),
            'linkText' => $f['link_label'],
        ];
    }
    $priceData = [];
    foreach ($c['prices']['item'] as $p) {
        $priceData[] = ['name' => $p['name'], 'price' => $p['price'], 'unit' => 'item'];
    }
    foreach ($c['prices']['kg'] as $p) {
        $priceData[] = ['name' => $p['name'], 'price' => $p['price'], 'unit' => 'kg'];
    }
    $chatData = [
        'welcome'  => $bot['welcome'],
        'fallback' => $bot['fallback'],
        'whatsapp' => $c['contact']['whatsapp'],
        'faq'      => $faqData,
        'hours'    => ['answer' => $bot['hours_answer'], 'keywords' => $bot['hours_keywords'], 'url' => $r('jam'), 'linkText' => 'Lihat Jam Operasional'],
        'prices'   => $priceData,
        'priceUrl' => $r('harga'),
    ];
@endphp

<div class="lw-float">
    <p class="lw-teaser" data-lw-teaser hidden><span>{{ $bot['teaser'] }}</span></p>

    {{-- Tombol AI Chatbot --}}
    <button class="lw-fab lw-fab--bot" type="button" aria-label="Buka chat {{ $bot['name'] }}" aria-expanded="false" aria-controls="lw-chat" data-lw-chat-open>
        <span class="lw-fab__label"><b>Tanya {{ $bot['name'] }}</b><small>Harga &amp; proses laundry</small></span>
        <span class="lw-fab__disc">
            <span class="lw-fab__orbit" aria-hidden="true"></span>
            <i class="lw-bub lw-bub--1" aria-hidden="true"></i>
            <i class="lw-bub lw-bub--2" aria-hidden="true"></i>
            <i class="lw-bub lw-bub--3" aria-hidden="true"></i>
            <img src="{{ $img($c['img']['robot']) }}" alt="" width="64" height="64">
            <span class="lw-fab__ai" aria-hidden="true">AI</span>
            <span class="lw-fab__dot" aria-hidden="true"></span>
        </span>
    </button>

    {{-- Tombol WhatsApp --}}
    <a class="lw-fab lw-fab--wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="lw-fab__label"><b>Chat WhatsApp</b><small>Balas dalam hitungan menit</small></span>
        <span class="lw-fab__disc">
            <span class="lw-fab__ring" aria-hidden="true"></span>
            <span class="lw-fab__ring lw-fab__ring--2" aria-hidden="true"></span>
            <svg class="lw-i"><use href="#i-whatsapp"/></svg>
        </span>
    </a>
</div>

<section class="lw-chat" id="lw-chat" role="dialog" aria-modal="false" aria-labelledby="lw-chat-title" hidden>
    <header class="lw-chat__head">
        <span class="lw-chat__avatar"><img src="{{ $img($c['img']['robot']) }}" alt="" width="46" height="46"></span>
        <div>
            <h2 id="lw-chat-title">{{ $bot['name'] }} <span>AI</span></h2>
            <p><span class="lw-chat__live" aria-hidden="true"></span>Online · harga &amp; proses laundry</p>
        </div>
        <button type="button" class="lw-chat__close" aria-label="Tutup chat" data-lw-chat-close><svg class="lw-i"><use href="#i-close"/></svg></button>
    </header>

    <div class="lw-chat__log" data-lw-chat-log role="log" aria-live="polite"></div>

    <div class="lw-chat__chips" data-lw-chat-chips>
        @foreach ($bot['faq'] as $f)
            <button type="button" data-lw-chat-topic="{{ $f['key'] }}">{{ implode(' ', $f['label']) }}</button>
        @endforeach
    </div>

    <form class="lw-chat__form" data-lw-chat-form autocomplete="off">
        <label class="lw-sr" for="lw-chat-input">Tulis pertanyaan</label>
        <input id="lw-chat-input" type="text" name="q" placeholder="Tanya harga atau proses laundry…" maxlength="160" required>
        <button type="submit" aria-label="Kirim"><svg class="lw-i"><use href="#i-send"/></svg></button>
    </form>
</section>

<script type="application/json" id="lw-chat-data">{!! json_encode($chatData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) !!}</script>
