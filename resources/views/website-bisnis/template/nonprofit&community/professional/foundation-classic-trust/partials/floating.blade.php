@php $wa = 'https://wa.me/' . $fd['contact']['whatsapp'] . '?text=' . rawurlencode('Halo Harapan Untuk Negeri Foundation, saya ingin bertanya tentang program dan donasi.'); @endphp
@include($fdBase . '.partials.chat-box', ['mode' => 'float'])
<div class="fd-float">
    <a class="fd-wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="fd-wa__tip" data-fd-wa-tip role="note">Ada pertanyaan? Chat kami di WhatsApp <button type="button" aria-label="Tutup">×</button></span>
        <span class="fd-wa__ico"><svg class="fd-ico"><use href="#fd-i-whatsapp"/></svg></span>
        <span class="fd-wa__label">Chat WhatsApp</span>
    </a>
    <button type="button" class="fd-botbtn" data-fd-chat-toggle aria-label="Buka HarapanBot, asisten FAQ" aria-expanded="false" aria-controls="fd-chat">
        <span class="fd-botbtn__ring"></span>
        <img class="fd-botbtn__img" src="{{ $i('bot-head.png') }}" alt="" width="54" height="54">
        <span class="fd-botbtn__dot"></span>
        <span class="fd-botbtn__label">Tanya HarapanBot</span>
    </button>
</div>
