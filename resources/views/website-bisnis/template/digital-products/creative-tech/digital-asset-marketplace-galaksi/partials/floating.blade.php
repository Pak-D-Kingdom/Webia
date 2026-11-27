{{-- Floating WhatsApp (kanan-bawah) + Floating AI FAQ (di atas WhatsApp) + panel chat. Disembunyikan di Hero via JS. --}}
<a class="fab fab-wa hide" id="fabWa" href="https://wa.me/{{ $dam['whatsapp']['number'] }}?text={{ rawurlencode($dam['whatsapp']['message']) }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
    <span class="tip">Chat WhatsApp</span>
    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.5 3.5A11.8 11.8 0 0 0 12 0C5.4 0 .1 5.3.1 11.9c0 2.1.6 4.1 1.6 5.9L0 24l6.4-1.7a11.9 11.9 0 0 0 5.6 1.4c6.6 0 11.9-5.3 11.9-11.9 0-3.2-1.2-6.2-3.4-8.3zM12 21.7c-1.8 0-3.5-.5-5.1-1.4l-.4-.2-3.8 1 1-3.7-.2-.4a9.8 9.8 0 0 1-1.5-5.2c0-5.4 4.4-9.8 9.9-9.8 2.6 0 5.1 1 6.9 2.9a9.7 9.7 0 0 1 2.9 6.9c0 5.4-4.4 9.9-9.7 9.9zm5.4-7.4c-.3-.1-1.8-.9-2-1-.3-.1-.5-.1-.7.1l-1 1.2c-.2.2-.4.2-.7.1-1.8-.9-2.9-1.6-4-3.6-.3-.5.3-.5.9-1.6.1-.2 0-.4 0-.5l-.9-2.2c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1.1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5 1.9.8 2.6.9 3.6.7.6-.1 1.8-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.1-.3-.2-.6-.3z"/></svg>
</a>

<div class="fab fab-ai hide" id="fabAi">
    <div class="bubble" id="aiBubble">Bingung soal lisensi? Tanya Nova!</div>
    <button type="button" id="aiToggle" aria-label="Buka asisten FAQ AI Nova" aria-expanded="false" aria-controls="chatPanel">
        @include($v . '.partials.mascot', ['mid' => 'fab'])
    </button>
    <span class="badge-dot" aria-hidden="true"></span>
</div>

<section class="chat" id="chatPanel" aria-label="Asisten FAQ AI Nova" aria-hidden="true">
    <header class="chat-head">
        @include($v . '.partials.mascot', ['mid' => 'chat'])
        <div><strong>{{ $dam['ai']['name'] }}</strong><small><i></i> Online · {{ $dam['ai']['role'] }}</small></div>
        <button type="button" class="icon-btn" style="margin-left:auto;background:rgba(255,255,255,.12)" data-chat-close aria-label="Tutup chat">{{ $ic('close') }}</button>
    </header>
    <div class="chat-body" id="chatBody"></div>
    <div class="quick" id="chatQuick"></div>
    <form class="chat-form" id="chatForm" autocomplete="off">
        <input type="text" id="chatInput" placeholder="Tulis pertanyaanmu…" aria-label="Pesan">
        <button type="submit" aria-label="Kirim">{{ $ic('send') }}</button>
    </form>
</section>
