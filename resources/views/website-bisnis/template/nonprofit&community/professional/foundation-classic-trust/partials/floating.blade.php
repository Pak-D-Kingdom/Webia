@php $wa = 'https://wa.me/' . $fd['contact']['whatsapp'] . '?text=' . rawurlencode('Halo Harapan Untuk Negeri Foundation, saya ingin bertanya tentang program dan donasi.'); @endphp
@include($fdBase . '.partials.chat-box', ['mode' => 'float'])
<div class="fd-float" data-fd-float>
    <div class="fd-hint" data-fd-hint hidden role="note">
        <button type="button" class="fd-hint__x" data-fd-hint-close aria-label="Tutup sapaan"><svg class="fd-ico"><use href="#fd-i-close"/></svg></button>
        <img src="{{ $i('bot-head.svg') }}" alt="" width="52" height="45">
        <div>
            <b>Halo, ada yang bisa dibantu?</b>
            <p>Tanya HarapanBot seputar program dan donasi.</p>
            <div class="fd-hint__chips">
                <button type="button" data-fd-chat-ask="Bagaimana cara berdonasi?">Cara berdonasi</button>
                <button type="button" data-fd-chat-ask="Program apa saja yang tersedia?">Program kami</button>
            </div>
        </div>
    </div>
    <a class="fd-wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="fd-wa__ico"><svg class="fd-ico"><use href="#fd-i-whatsapp"/></svg></span>
        <span class="fd-wa__label">Chat WhatsApp</span>
    </a>
    <button type="button" class="fd-botbtn" data-fd-chat-toggle aria-label="Buka HarapanBot, asisten FAQ program dan donasi" aria-expanded="false" aria-controls="fd-chat">
        <span class="fd-botbtn__ring" aria-hidden="true"></span>
        <span class="fd-botbtn__face"><img src="{{ $i('bot-head.svg') }}" alt="" width="62" height="54"></span>
        <span class="fd-botbtn__badge" aria-hidden="true">1</span>
        <span class="fd-botbtn__label">Tanya HarapanBot</span>
    </button>
</div>
