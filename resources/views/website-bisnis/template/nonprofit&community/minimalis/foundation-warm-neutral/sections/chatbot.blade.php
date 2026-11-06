{{-- Pratinjau AI Chatbot (program & donasi) di beranda. Berdiri sendiri di antara hero dan kartu, tidak menutupi bagian lain. --}}
<div class="hf-wide hf-botband-wrap">
    <aside class="hf-botband" data-chat-card aria-label="HopeBot - asisten FAQ program dan donasi">
        <div class="hf-botband__intro">
            <span class="hf-botband__mascot">@include($v.'.partials.mascot', ['view' => 'full', 'cls' => ''])</span>
            <div class="hf-botband__bubble">
                <strong>{{ $f['chatbot']['greeting'] }}</strong>
                <p>{{ $f['chatbot']['intro'] }}</p>
            </div>
        </div>
        <ul class="hf-botband__chips" aria-label="Pertanyaan populer">
            @foreach($f['chatbot']['quick'] as $q)
                <li><button type="button" class="hf-botband__q" data-ask="{{ $q }}"><span class="hf-botband__qicon" aria-hidden="true"><svg class="hf-i" viewBox="0 0 24 24"><use href="#i-chat"/></svg></span>{{ $q }}</button></li>
            @endforeach
        </ul>
        <form class="hf-botband__form" data-chat-card-form autocomplete="off">
            <input type="text" name="q" placeholder="{{ $f['chatbot']['placeholder'] }}" aria-label="Tulis pertanyaan Anda" maxlength="200">
            <button type="submit" aria-label="Kirim pertanyaan"><svg class="hf-i" aria-hidden="true"><use href="#i-send"/></svg></button>
        </form>
    </aside>
</div>
