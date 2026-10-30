@php
    $bot = $c['chatbot'];
    $wa  = 'https://wa.me/' . $c['contact']['whatsapp'] . '?text=' . rawurlencode('Halo ' . $c['brand']['name'] . ', saya ingin bertanya tentang layanan laundry.');

    // Data chatbot: konten statis dari config, diproses di sisi browser (tanpa backend).
    $chatData = [
        'welcome'  => $bot['welcome'],
        'fallback' => $bot['fallback'],
        'whatsapp' => $c['contact']['whatsapp'],
        'faq'      => collect($bot['faq'])->map(fn ($f) => [
            'key'      => $f['key'],
            'label'    => implode(' ', $f['label']),
            'keywords' => $f['keywords'],
            'answer'   => $f['answer'],
            'url'      => $r($f['link']),
            'linkText' => $f['link_label'],
        ])->values(),
        'hours'    => ['answer' => $bot['hours_answer'], 'keywords' => $bot['hours_keywords'], 'url' => $r('jam'), 'linkText' => 'Lihat Jam Operasional'],
        'prices'   => collect($c['prices']['item'])->map(fn ($p) => ['name' => $p['name'], 'price' => $p['price'], 'unit' => 'item'])
                        ->merge(collect($c['prices']['kg'])->map(fn ($p) => ['name' => $p['name'], 'price' => $p['price'], 'unit' => 'kg']))->values(),
        'priceUrl' => $r('harga'),
    ];
@endphp

<div class="lw-float">
    <p class="lw-teaser" data-lw-teaser hidden>{{ $bot['teaser'] }}</p>

    <a class="lw-fab lw-fab--wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="lw-fab__ring" aria-hidden="true"></span>
        <svg class="lw-i"><use href="#i-whatsapp"/></svg>
        <span class="lw-fab__tip">Chat WhatsApp</span>
    </a>

    <button class="lw-fab lw-fab--bot" type="button" aria-label="Buka chat {{ $bot['name'] }}" aria-expanded="false" aria-controls="lw-chat" data-lw-chat-open>
        <span class="lw-fab__ring" aria-hidden="true"></span>
        <img src="{{ $img($c['img']['robot']) }}" alt="" width="64" height="64">
        <span class="lw-fab__dot" aria-hidden="true"></span>
    </button>
</div>

<section class="lw-chat" id="lw-chat" role="dialog" aria-modal="false" aria-labelledby="lw-chat-title" hidden>
    <header class="lw-chat__head">
        <img src="{{ $img($c['img']['robot']) }}" alt="" width="46" height="46">
        <div>
            <h2 id="lw-chat-title">{{ $bot['name'] }}</h2>
            <p><span class="lw-chat__live" aria-hidden="true"></span>Asisten harga &amp; proses laundry</p>
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
