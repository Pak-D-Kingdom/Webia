<button class="hf-fab hf-fab--bot" type="button" data-chat-toggle aria-expanded="false" aria-controls="hf-chat" aria-label="Buka HopeBot, asisten FAQ program dan donasi">
    <span class="hf-fab__ring" aria-hidden="true"></span>
    <span class="hf-fab__avatar">@include($v.'.partials.mascot', ['view' => 'head', 'cls' => ''])</span>
    <span class="hf-fab__dot" aria-hidden="true"></span>
    <span class="hf-fab__hint" aria-hidden="true">Tanya HopeBot</span>
</button>

<section class="hf-chat" id="hf-chat" role="dialog" aria-label="HopeBot - FAQ program dan donasi" hidden>
    <header class="hf-chat__head">
        <span class="hf-chat__avatar">@include($v.'.partials.mascot', ['view' => 'head', 'cls' => ''])</span>
        <div class="hf-chat__title">
            <strong>{{ $f['chatbot']['name'] }}</strong>
            <span><i class="hf-chat__online"></i> Siap membantu program &amp; donasi</span>
        </div>
        <a class="hf-iconbtn hf-iconbtn--light" href="{{ route($rp.'chatbot') }}" aria-label="Buka halaman HopeBot"><svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        <button class="hf-iconbtn hf-iconbtn--light" type="button" data-chat-close aria-label="Tutup chat"><svg class="hf-i" aria-hidden="true"><use href="#i-close"/></svg></button>
    </header>
    <div class="hf-chat__log" data-chat-log aria-live="polite"></div>
    <div class="hf-chat__chips" data-chat-chips>
        @foreach($f['chatbot']['quick'] as $q)
            <button type="button" class="hf-chip" data-ask="{{ $q }}">{{ $q }}</button>
        @endforeach
    </div>
    <form class="hf-chat__form" data-chat-form autocomplete="off">
        <input type="text" data-chat-input placeholder="{{ $f['chatbot']['placeholder'] }}" aria-label="Tulis pertanyaan" maxlength="200">
        <button type="submit" class="hf-chat__send" aria-label="Kirim"><svg class="hf-i" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
</section>
