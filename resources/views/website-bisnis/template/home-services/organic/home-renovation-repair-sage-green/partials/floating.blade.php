{{-- Tombol melayang bundar: AI Chatbot (Service & Estimate FAQ) + WhatsApp, beserta panel chat bertab. --}}
<div class="hr-chat__veil" data-chat-veil hidden></div>

<section class="hr-chat" id="hrChat" data-chat data-tab="chat" role="dialog" aria-label="AI Chatbot Renovaku" aria-hidden="true" hidden>
    <header class="hr-chat__head">
        <span class="hr-chat__avatar">@include($vp.'robot')</span>
        <div class="hr-chat__who">
            <strong>Asisten Renovaku</strong>
            <small><i class="hr-dot"></i> Online · Service &amp; Estimate FAQ</small>
        </div>
        <div class="hr-chat__tools">
            <button type="button" data-chat-reset aria-label="Mulai percakapan baru" title="Mulai ulang">{{ $i('refresh') }}</button>
            <button type="button" data-chat-close aria-label="Tutup chat" title="Tutup">{{ $i('close') }}</button>
        </div>
    </header>

    <div class="hr-chat__views">
        {{-- Tab 1: Obrolan --}}
        <div class="hr-view is-on" data-view="chat" role="tabpanel" aria-label="Obrolan">
            <div class="hr-chat__log" data-chat-log aria-live="polite">
                <div class="hr-welcome" data-chat-welcome>
                    <div class="hr-welcome__hero">
                        <span class="hr-welcome__bot">@include($vp.'robot')</span>
                        <div>
                            <strong>Halo, saya asisten Renovaku!</strong>
                            <p>Tanya seputar layanan, paket, proyek, atau hitung estimasi biaya renovasi Anda.</p>
                        </div>
                    </div>
                    <div class="hr-welcome__grid">
                        @foreach ($cfg['js']['actions'] as $act)
                            <button type="button" data-chat-ask="{{ $act['ask'] }}"><span>{{ $i($act['icon']) }}</span>{{ $act['label'] }}</button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="hr-chat__quick" data-chat-quick></div>
            <form class="hr-chat__form" data-chat-form autocomplete="off">
                <label class="sr-only" for="hrChatInput">Pertanyaan Anda</label>
                <input id="hrChatInput" type="text" data-chat-input placeholder="Tulis pertanyaan Anda…" maxlength="200" enterkeyhint="send">
                <button type="submit" aria-label="Kirim pertanyaan">{{ $i('send') }}</button>
            </form>
        </div>

        {{-- Tab 2: Kalkulator estimasi --}}
        <div class="hr-view" data-view="estimate" role="tabpanel" aria-label="Estimasi biaya" hidden>
            <div class="hr-calc" data-calc data-min="{{ $cfg['js']['calc']['min_area'] }}" data-max="{{ $cfg['js']['calc']['max_area'] }}">
                <div class="hr-calc__body">
                <header class="hr-calc__head">
                    <span class="hr-calc__ico">{{ $i('invoice') }}</span>
                    <div><h3>Hitung estimasi biaya</h3><p>Perkiraan awal. Biaya final ditentukan setelah survei lokasi.</p></div>
                </header>

                <div class="hr-calc__block">
                    <p class="hr-calc__label" id="calcTypeLbl">1. Jenis pekerjaan</p>
                    <div class="hr-calc__chips" role="group" aria-labelledby="calcTypeLbl">
                        @foreach ($cfg['js']['estimate'] as $key => $r)
                            <button type="button" class="hr-calc__chip {{ $loop->first ? 'is-on' : '' }}" data-calc-type="{{ $key }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $r['label'] }}</button>
                        @endforeach
                    </div>
                </div>

                <div class="hr-calc__block">
                    <div class="hr-calc__row">
                        <label class="hr-calc__label" for="calcArea">2. Luas area</label>
                        <output class="hr-calc__area" data-calc-area-out for="calcArea">{{ $cfg['js']['calc']['default_area'] }} m²</output>
                    </div>
                    <div class="hr-calc__slider">
                        <button type="button" data-calc-step="-1" aria-label="Kurangi luas">{{ $i('minus') }}</button>
                        <input id="calcArea" type="range" min="{{ $cfg['js']['calc']['min_area'] }}" max="{{ $cfg['js']['calc']['max_area'] }}" step="1" value="{{ $cfg['js']['calc']['default_area'] }}" data-calc-area>
                        <button type="button" data-calc-step="1" aria-label="Tambah luas">{{ $i('plus') }}</button>
                    </div>
                </div>

                <div class="hr-calc__block">
                    <p class="hr-calc__label" id="calcTierLbl">3. Tingkat finishing</p>
                    <div class="hr-calc__seg" role="group" aria-labelledby="calcTierLbl">
                        @foreach ($cfg['js']['estimate_tiers'] as $tier)
                            <button type="button" class="{{ $loop->first ? 'is-on' : '' }}" data-calc-tier="{{ $tier['id'] }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $tier['label'] }}</button>
                        @endforeach
                    </div>
                </div>

                </div>
                <div class="hr-calc__foot">
                <div class="hr-calc__result" aria-live="polite">
                    <small>Perkiraan biaya</small>
                    <b data-calc-range>—</b>
                    <span class="hr-calc__bar"><i data-calc-bar></i></span>
                    <small data-calc-note>—</small>
                </div>

                <div class="hr-calc__actions">
                    <a class="hr-btn hr-btn--primary hr-btn--xs" href="{{ $go('booking-survei') }}">{{ $i('calendar') }}<span>Survei</span></a>
                    <a class="hr-btn hr-btn--light hr-btn--xs" href="{{ $go('permintaan-penawaran') }}">{{ $i('file') }}<span>Penawaran</span></a>
                    <a class="hr-btn hr-btn--wa hr-btn--xs" data-calc-wa href="https://wa.me/{{ $cfg['site']['whatsapp'] }}" target="_blank" rel="noopener noreferrer">{{ $i('whatsapp') }}<span>WhatsApp</span></a>
                </div>
                </div>
            </div>
        </div>

        {{-- Tab 3: FAQ --}}
        <div class="hr-view" data-view="faq" role="tabpanel" aria-label="FAQ" hidden>
            <div class="hr-faqv">
                <label class="hr-faqv__search">{{ $i('search') }}<input type="search" data-faqv-q placeholder="Cari pertanyaan, mis. garansi…" autocomplete="off" aria-label="Cari pertanyaan"></label>
                <ul class="hr-faqv__list" data-faqv-list></ul>
                <p class="hr-faqv__empty" data-faqv-empty hidden>Tidak ada pertanyaan yang cocok. <button type="button" data-faqv-ask>Tanya langsung ke asisten</button></p>
            </div>
        </div>
    </div>

    <nav class="hr-chat__tabs" role="tablist" aria-label="Menu asisten">
        <span class="hr-chat__ind" aria-hidden="true"></span>
        <button type="button" role="tab" data-chat-tab="chat" aria-selected="true">{{ $i('bot') }}<span>Obrolan</span></button>
        <button type="button" role="tab" data-chat-tab="estimate" aria-selected="false">{{ $i('sliders') }}<span>Estimasi</span></button>
        <button type="button" role="tab" data-chat-tab="faq" aria-selected="false">{{ $i('info') }}<span>FAQ</span></button>
    </nav>
    <p class="hr-chat__foot">Estimasi bersifat perkiraan awal. <a href="https://wa.me/{{ $cfg['site']['whatsapp'] }}?text={{ rawurlencode('Halo Renovaku, saya ingin bertanya seputar layanan renovasi.') }}" target="_blank" rel="noopener noreferrer">Chat tim via WhatsApp</a></p>
</section>

<div class="hr-float" data-float>
    <div class="hr-tip" data-chat-tip hidden role="status">
        <button type="button" class="hr-tip__x" data-chat-tip-close aria-label="Tutup saran">{{ $i('close') }}</button>
        <p><strong>Halo!</strong> Mau hitung estimasi biaya renovasi rumah Anda?</p>
        <button type="button" class="hr-tip__go" data-chat-ask="Estimasi Biaya">Hitung sekarang {{ $i('arrow') }}</button>
    </div>

    <button type="button" class="hr-fab hr-fab--chat" data-chat-toggle aria-expanded="false" aria-controls="hrChat" aria-label="Buka AI Chatbot Renovaku">
        <span class="hr-fab__label" aria-hidden="true">Tanya Renovaku</span>
        <span class="hr-fab__face">@include($vp.'robot-head')</span>
        <span class="hr-fab__x" aria-hidden="true">{{ $i('close') }}</span>
        <i class="hr-fab__dot" aria-hidden="true"></i>
        <span class="hr-fab__badge" data-chat-badge aria-hidden="true">1</span>
    </button>

    <a class="hr-fab hr-fab--wa" href="https://wa.me/{{ $cfg['site']['whatsapp'] }}?text={{ rawurlencode('Halo Renovaku, saya ingin konsultasi renovasi rumah. (dari halaman '.$cfg['pages'][$page]['title'].')') }}" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp Renovaku di {{ $cfg['site']['whatsapp_display'] }}">
        <span class="hr-fab__label" aria-hidden="true">Chat WhatsApp</span>
        <span class="hr-fab__wa">{{ $i('whatsapp') }}</span>
    </a>
</div>
