{{-- Tombol melayang: AI Chatbot (Service & Estimate FAQ) + WhatsApp, beserta panel chat. --}}
<div class="hr-chat__veil" data-chat-veil hidden></div>

<section class="hr-chat" id="hrChat" data-chat role="dialog" aria-label="AI Chatbot Renovaku" aria-hidden="true" hidden>
    <header class="hr-chat__head">
        <span class="hr-chat__avatar">@include($vp.'robot')</span>
        <div class="hr-chat__who">
            <strong>Asisten Renovaku</strong>
            <small><i class="hr-dot"></i> Online · Service &amp; Estimate FAQ</small>
        </div>
        <div class="hr-chat__tools">
            <button type="button" data-chat-reset aria-label="Mulai percakapan baru" title="Mulai ulang">{{ $i('refresh') }}</button>
            <button type="button" data-chat-close aria-label="Tutup chat" title="Tutup">{{ $i('minus') }}</button>
        </div>
    </header>

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
    <p class="hr-chat__foot">Estimasi bersifat perkiraan awal. <a href="https://wa.me/{{ $cfg['site']['whatsapp'] }}?text={{ rawurlencode('Halo Renovaku, saya ingin bertanya seputar layanan renovasi.') }}" target="_blank" rel="noopener noreferrer">Chat tim via WhatsApp</a></p>
</section>

<div class="hr-float" data-float>
    <div class="hr-tip" data-chat-tip hidden role="status">
        <button type="button" class="hr-tip__x" data-chat-tip-close aria-label="Tutup saran">{{ $i('close') }}</button>
        <p><strong>Halo!</strong> Mau hitung estimasi biaya renovasi rumah Anda?</p>
        <button type="button" class="hr-tip__go" data-chat-ask="Estimasi Biaya">Hitung sekarang {{ $i('arrow') }}</button>
    </div>

    <button type="button" class="hr-launch" data-chat-toggle aria-expanded="false" aria-controls="hrChat">
        <span class="hr-launch__robot">@include($vp.'robot')<i class="hr-launch__dot" aria-hidden="true"></i></span>
        <span class="hr-launch__text"><strong>Tanya Renovaku</strong><small>AI Chatbot · Service &amp; Estimate FAQ</small></span>
        <span class="hr-launch__chev">{{ $i('arrow-up') }}</span>
        <span class="hr-launch__badge" data-chat-badge aria-hidden="true">1</span>
    </button>

    <a class="hr-wa" href="https://wa.me/{{ $cfg['site']['whatsapp'] }}?text={{ rawurlencode('Halo Renovaku, saya ingin konsultasi renovasi rumah. (dari halaman '.$cfg['pages'][$page]['title'].')') }}" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp Renovaku di {{ $cfg['site']['whatsapp_display'] }}">
        <span class="hr-wa__ico">{{ $i('whatsapp') }}</span>
        <span class="hr-wa__text"><strong>WhatsApp</strong><small>Chat langsung dengan tim</small></span>
    </a>
</div>
