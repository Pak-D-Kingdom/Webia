@php $a = $z['ai_faq']; @endphp
<section class="ot-chat" id="ot-chat" role="dialog" aria-label="{{ $a['title'] }}" hidden data-chat data-greeting="{{ $a['greeting'] }}" data-fallback="{{ $a['fallback'] }}">
    <header class="ot-chat__head">
        <img src="{{ $img('mascot.png') }}" alt="" width="40" height="40">
        <div><strong>{{ $a['title'] }}</strong><small>Asisten {{ $z['brand']['name'] }}</small></div>
        <button class="ot-icon-btn" type="button" data-close-chat aria-label="Tutup chat"><svg class="ot-ic" aria-hidden="true"><use href="#i-close"/></svg></button>
    </header>
    <div class="ot-chat__body" data-chat-log aria-live="polite"></div>
    <div class="ot-chat__chips" data-chat-chips></div>
    <form class="ot-chat__form" data-chat-form>
        <input type="text" name="q" placeholder="{{ $a['placeholder'] }}" aria-label="Pertanyaan Anda" autocomplete="off">
        <button class="ot-icon-btn ot-icon-btn--solid" type="submit" aria-label="Kirim"><svg class="ot-ic" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
    <script type="application/json" data-chat-data>@json($a['items'])</script>
</section>
