{{-- Jendela chat. $mode = 'float' | 'inline' --}}
@php $inline = ($mode ?? 'float') === 'inline'; @endphp
<section class="fd-chat {{ $inline ? 'fd-chat--inline' : 'fd-chat--float' }}" @unless($inline) id="fd-chat" hidden @else data-fd-chat-inline @endunless aria-label="HarapanBot — FAQ program dan donasi">
    <div class="fd-chat__head">
        <img class="fd-chat__avatar" src="{{ $i('bot-head.png') }}" alt="" width="48" height="48">
        <div><b>HarapanBot</b><small>Online · FAQ program &amp; donasi</small></div>
        @unless($inline)
            <button type="button" class="fd-chat__close" data-fd-chat-close aria-label="Tutup chat"><svg class="fd-ico"><use href="#fd-i-close"/></svg></button>
        @endunless
    </div>
    <div class="fd-chat__body" role="log" aria-live="polite"></div>
    <div class="fd-chat__chips" aria-label="Pertanyaan cepat"></div>
    <form class="fd-chat__form" autocomplete="off">
        <input type="text" placeholder="Tulis pertanyaan Anda…" aria-label="Tulis pertanyaan Anda" maxlength="200">
        <button type="submit" class="fd-sendbtn" aria-label="Kirim"><svg class="fd-ico"><use href="#fd-i-send"/></svg></button>
    </form>
</section>
