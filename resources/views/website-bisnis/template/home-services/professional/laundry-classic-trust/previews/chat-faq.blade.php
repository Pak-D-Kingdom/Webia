<section class="card card--faq" aria-labelledby="pv-faq">
    <img class="faq__leaf" src="{{ $img('leaf.svg') }}" alt="" aria-hidden="true" loading="lazy">
    <div class="faq__head">
        <img src="{{ $img('bunny-freshbot.png') }}" alt="" loading="lazy">
        <div>
            <h2 id="pv-faq">Punya Pertanyaan?<br>Tanya {{ $c['chatbot']['name'] }}!</h2>
            <p>AI Chatbot kami siap membantu 24/7 untuk semua pertanyaan seputar laundry.</p>
        </div>
    </div>
    <ul class="faq__chips">
        @foreach ($c['chatbot']['chips'] as $chip)
            <li><button type="button" data-bot-ask="{{ $chip }}"><svg class="ic"><use href="#i-chat"/></svg>{{ $chip }}</button></li>
        @endforeach
    </ul>
    <form class="faq__form" data-bot-inline autocomplete="off">
        <input type="text" name="q" placeholder="Tulis pertanyaan Anda..." aria-label="Tulis pertanyaan untuk FreshBot" maxlength="200">
        <button type="submit" aria-label="Kirim"><svg class="ic"><use href="#i-send"/></svg></button>
    </form>
</section>
