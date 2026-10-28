{{-- Panel chat melayang (dibuka dari tombol AI Chat). Logika di furniture.js --}}
<section class="fm-chat" id="fm-chat" data-fm-chat="panel" aria-label="{{ $cfg['ai']['name'] }}" hidden>
    <header class="fm-chat__head">
        <span class="fm-chat__avatar">@include($ns.'.partials.robot')</span>
        <div class="fm-chat__who">
            <strong>{{ $cfg['ai']['name'] }}</strong>
            <small><i class="fm-dot" aria-hidden="true"></i> FAQ produk &amp; custom furniture</small>
        </div>
        <button type="button" class="fm-iconbtn fm-iconbtn--light" data-fm-chat-close aria-label="Tutup chat"><svg class="fm-i" aria-hidden="true"><use href="#i-x"/></svg></button>
    </header>
    @include($ns.'.partials.chat-window', ['uid' => 'panel'])
</section>
