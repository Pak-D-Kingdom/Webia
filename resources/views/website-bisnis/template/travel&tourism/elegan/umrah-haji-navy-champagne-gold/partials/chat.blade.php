{{-- Komponen chat: $mode = 'float' (jendela mengambang) atau 'page' (halaman AI Chat) --}}
<div class="uh-chat {{ ($mode ?? 'float') === 'page' ? 'uh-chat--page' : 'uh-chat--float' }}" data-chat="{{ $mode ?? 'float' }}" @if (($mode ?? 'float') === 'float') id="uh-chat" role="dialog" aria-label="AI Chat Al Hijrah Travel" hidden @endif>
    <header class="uh-chat__head">
        <span class="uh-chat__avatar"><img src="{{ $img('bot.svg') }}" alt="" width="46" height="46"></span>
        <div class="uh-chat__who">
            <strong>Asisten AI Al Hijrah</strong>
            <small><i class="uh-dot"></i> Online — FAQ paket &amp; pendaftaran</small>
        </div>
        @if (($mode ?? 'float') === 'float')
            <button type="button" class="uh-iconbtn uh-iconbtn--ghost" data-chat-close aria-label="Tutup chat"><svg class="uh-ico" aria-hidden="true"><use href="#i-x"/></svg></button>
        @endif
    </header>
    <div class="uh-chat__body" data-chat-log aria-live="polite"></div>
    <div class="uh-chat__quick" data-chat-quick>
        @foreach ($d['chat']['quick'] as $q)
            <button type="button" data-chat-ask="{{ $q }}">{{ $q }}</button>
        @endforeach
    </div>
    <form class="uh-chat__form" data-chat-form autocomplete="off">
        <input type="text" data-chat-input placeholder="Tulis pertanyaan Anda..." aria-label="Pertanyaan Anda" maxlength="200">
        <button type="submit" class="uh-chat__send" aria-label="Kirim"><svg class="uh-ico" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
</div>
