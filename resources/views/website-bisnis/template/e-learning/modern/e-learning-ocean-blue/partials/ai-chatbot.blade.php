{{-- AI FAQ · maskot robot E-learna (diambil dari desain UI). Logika di e-learning.js --}}
<div class="el-chat" data-chat>
    <p class="el-chat__nudge" data-chat-nudge hidden>Halo! Ada yang bisa saya bantu? <span aria-hidden="true">👋</span></p>

    <section class="el-chat__panel" id="elChatPanel" role="dialog" aria-modal="false" aria-labelledby="elChatTitle" hidden data-chat-panel>
        <header class="el-chat__head">
            <img class="el-chat__avatar" src="{{ $img('mascot-head.png') }}" alt="" width="40" height="40">
            <div>
                <h2 id="elChatTitle">AI E-learna Assistant</h2>
                <p>Ada yang bisa saya bantu?</p>
            </div>
            <button type="button" class="el-chat__close" aria-label="Tutup AI FAQ" data-chat-close>
                <svg class="el-ico" aria-hidden="true"><use href="#i-close"/></svg>
            </button>
        </header>

        <div class="el-chat__body" data-chat-body tabindex="0" aria-live="polite" aria-label="Percakapan AI FAQ">
            <div class="el-chat__welcome" data-chat-welcome>
                <img class="el-chat__mascot" src="{{ $img('mascot-full.jpg') }}" alt="Maskot robot AI E-learna" width="101" height="169" loading="lazy">
                <div class="el-chat__chips" role="group" aria-label="Pertanyaan cepat">
                    @foreach ($e['faq']['chips'] as $chip)
                        <button type="button" class="el-chat__chip" data-chat-chip="{{ $chip['id'] }}">{{ $chip['label'] }}</button>
                    @endforeach
                </div>
            </div>
            <ol class="el-chat__log" data-chat-log></ol>
        </div>

        <form class="el-chat__form" data-chat-form autocomplete="off">
            <label class="el-sr" for="elChatInput">Tulis pertanyaan Anda</label>
            <input id="elChatInput" type="text" name="message" placeholder="Tulis pertanyaan Anda..." maxlength="200" data-chat-input>
            <button type="submit" class="el-chat__send" aria-label="Kirim pertanyaan"><svg class="el-ico" aria-hidden="true"><use href="#i-send"/></svg></button>
        </form>
    </section>

    <button type="button" class="el-chat__launcher" aria-label="Buka AI FAQ" aria-expanded="false" aria-controls="elChatPanel" data-chat-toggle>
        <span class="el-chat__ring" aria-hidden="true"></span>
        <span class="el-chat__ring el-chat__ring--2" aria-hidden="true"></span>
        <span class="el-chat__orbit" aria-hidden="true"><i></i></span>
        <img src="{{ $img('mascot-head.png') }}" alt="" width="64" height="64">
        <span class="el-chat__tag" aria-hidden="true">AI</span>
    </button>

    @php
        $faqPayload = [
            'greeting' => $e['faq']['greeting'],
            'fallback' => $e['faq']['fallback'],
            'whatsapp' => 'https://wa.me/'.$e['contact']['whatsapp'],
            'items'    => collect($e['faq']['items'])->map(function ($item) {
                $item['url'] = isset($item['route']) ? route($item['route']) : null;
                return $item;
            })->all(),
        ];
    @endphp
    <script type="application/json" id="elFaqData">@json($faqPayload)</script>
</div>
