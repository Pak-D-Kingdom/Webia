{{-- Jendela chat. $mode = 'float' | 'inline' --}}
@php $inline = ($mode ?? 'float') === 'inline'; @endphp
<section class="fd-chat {{ $inline ? 'fd-chat--inline' : 'fd-chat--float' }}" @unless($inline) id="fd-chat" hidden @else data-fd-chat-inline @endunless data-robot="{{ $i('bot.svg') }}" aria-label="HarapanBot — FAQ program dan donasi">
    <div class="fd-chat__head">
        <span class="fd-chat__avatarwrap"><img class="fd-chat__avatar" src="{{ $i('bot-head.svg') }}" alt="" width="52" height="52"><i class="fd-chat__online"></i></span>
        <div class="fd-chat__who"><b>HarapanBot</b><small>Asisten AI · FAQ program &amp; donasi</small></div>
        @unless($inline)
            <button type="button" class="fd-chat__close" data-fd-chat-close aria-label="Tutup chat"><svg class="fd-ico"><use href="#fd-i-close"/></svg></button>
        @endunless
    </div>
    <div class="fd-chat__body" role="log" aria-live="polite" tabindex="0"></div>
    <div class="fd-chat__quick"><span>Pertanyaan cepat</span><div class="fd-chat__chips" aria-label="Pertanyaan cepat"></div></div>
    <form class="fd-chat__form" autocomplete="off">
        <input type="text" placeholder="Tulis pertanyaan Anda…" aria-label="Tulis pertanyaan Anda" maxlength="200">
        <button type="submit" class="fd-sendbtn" aria-label="Kirim"><svg class="fd-ico"><use href="#fd-i-send"/></svg></button>
    </form>
    <p class="fd-chat__note">Jawaban otomatis dari FAQ yayasan. Butuh bantuan langsung? <a href="https://wa.me/{{ $fd['contact']['whatsapp'] }}" target="_blank" rel="noopener">Hubungi via WhatsApp</a></p>
</section>
