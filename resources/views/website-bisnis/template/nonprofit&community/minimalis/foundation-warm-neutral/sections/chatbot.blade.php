{{-- Pratinjau AI Chatbot di beranda (kartu HopeBot pada hero). Pertanyaan dijawab oleh panel HopeBot. --}}
<aside class="hf-botcard" data-chat-card aria-label="HopeBot - asisten FAQ program dan donasi">
    <div class="hf-botcard__top">
        <span class="hf-botcard__mascot">@include($v.'.partials.mascot', ['view' => 'full', 'cls' => ''])</span>
        <div class="hf-botcard__bubble">
            <strong>Halo! Saya <br>{{ $f['chatbot']['name'] }}!</strong>
            <p>{{ $f['chatbot']['intro'] }}</p>
        </div>
    </div>
    <ul class="hf-botcard__list">
        @foreach($f['chatbot']['quick'] as $q)
            <li><button type="button" class="hf-botcard__q" data-ask="{{ $q }}"><span class="hf-botcard__qicon" aria-hidden="true"><svg class="hf-i" viewBox="0 0 24 24"><use href="#i-chat"/></svg></span>{{ $q }}</button></li>
        @endforeach
    </ul>
    <form class="hf-botcard__form" data-chat-card-form autocomplete="off">
        <input type="text" name="q" placeholder="{{ $f['chatbot']['placeholder'] }}" aria-label="Tulis pertanyaan Anda" maxlength="200">
        <button type="submit" aria-label="Kirim pertanyaan"><svg class="hf-i" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
</aside>
