@php $ai = $site['ai']; @endphp
<div class="lg-bot" data-bot>
    <section class="lg-bot__panel" data-bot-panel data-chat hidden role="dialog" aria-label="{{ $ai['bot_name'] }}">
        <header class="lg-bot__head">
            <span class="lg-bot__headav"><img src="{{ $img('robot-avatar.png') }}" alt="" width="44" height="44"></span>
            <div>
                <strong>{{ $ai['bot_name'] }}</strong>
                <small><i></i>Online - FAQ pengiriman &amp; logistik</small>
            </div>
            <button type="button" class="lg-iconbtn lg-iconbtn--ghost" data-bot-close aria-label="Tutup chat"><svg class="lg-ic" aria-hidden="true"><use href="#i-close"></use></svg></button>
        </header>
        <div class="lg-chat__msgs" data-chat-messages aria-live="polite"></div>
        <div class="lg-chat__chips" data-chat-chips></div>
        <form class="lg-chat__form" data-chat-form autocomplete="off">
            <label class="lg-sr" for="lg-bot-input">Tulis pertanyaan</label>
            <input id="lg-bot-input" type="text" data-chat-input placeholder="Tulis pertanyaan Anda..." maxlength="200">
            <button type="submit" aria-label="Kirim"><svg class="lg-ic" aria-hidden="true"><use href="#i-send"></use></svg></button>
        </form>
    </section>

    <p class="lg-bot__tip" data-bot-tip hidden>
        <span>Butuh bantuan pengiriman?</span>
        <b class="lg-dots" aria-hidden="true"><i></i><i></i><i></i></b>
    </p>

    <button type="button" class="lg-bot__fab" data-bot-toggle aria-expanded="false" aria-label="Buka AI Chat">
        <span class="lg-bot__glow" aria-hidden="true"></span>
        <span class="lg-bot__avatar" aria-hidden="true"><img src="{{ $img('robot-avatar.png') }}" alt="" width="46" height="46"></span>
        <span class="lg-bot__label"><strong>AI Chat</strong><small>Tanya Logistik</small></span>
        <span class="lg-bot__badge" aria-hidden="true">1</span>
    </button>
</div>
