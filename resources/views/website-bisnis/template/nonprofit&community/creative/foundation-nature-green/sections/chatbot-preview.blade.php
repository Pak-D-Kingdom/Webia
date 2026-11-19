{{-- Pratinjau GreenBot di beranda (mengikuti panel pada desain). Klik pertanyaan = membuka GreenBot. --}}
<aside class="fh-botprev" aria-label="Pratinjau {{ $cfg['brand']['bot'] }}">
    <div class="fh-botprev__top">
        <img class="fh-botprev__mascot" src="{{ $img('mascot.jpg') }}" alt="Maskot robot {{ $cfg['brand']['bot'] }}" width="124" height="140" loading="lazy">
        <div class="fh-bubble">
            <strong>{{ $cfg['chatbot']['greeting'] }}</strong>
            <span>{{ $cfg['chatbot']['intro'] }}</span>
        </div>
    </div>
    <ul class="fh-botprev__chips">
        @foreach ($cfg['chatbot']['suggestions'] as $q)
            <li>
                <button type="button" class="fh-chip" data-fh-ask="{{ $q }}"><span class="fh-chip__ic">{{ $icon('chat') }}</span>{{ $q }}</button>
            </li>
        @endforeach
    </ul>
    <form class="fh-botprev__form" data-fh-ask-form novalidate>
        <label class="fh-sr" for="fh-prev-input">Tulis pertanyaan Anda</label>
        <input id="fh-prev-input" type="text" maxlength="200" autocomplete="off" placeholder="{{ $cfg['chatbot']['placeholder'] }}">
        <button type="submit" aria-label="Kirim pertanyaan">{{ $icon('send') }}</button>
    </form>
</aside>
