{{-- AI FAQ: asisten belajar (jawaban statis dari config, tanpa backend) --}}
<section id="ai-faq" class="panel aibox" aria-labelledby="ai-title" data-chat>
    <div class="aibox__top">
        <img class="aibox__robot" src="{{ $img }}ai-robot.jpg" alt="" width="306" height="282" loading="lazy">
        <div class="aibox__bubble">
            <h2 id="ai-title"><i class="bi bi-stars" aria-hidden="true"></i> {{ $t['ai']['name'] }}</h2>
            <p>{{ $t['ai']['intro'] }}</p>
        </div>
    </div>
    <div class="chat__log" data-chat-log role="log" aria-live="polite"></div>
    <div class="chat__chips" data-chat-chips>
        @foreach ($t['ai']['quick'] as $qi)
            <button type="button" class="chip-q" data-q="{{ $qi }}">{{ $t['ai']['faq'][$qi]['q'] }}</button>
        @endforeach
    </div>
    <form class="chat__form" data-chat-form autocomplete="off">
        <label class="sr-only" for="faq-input">Pertanyaan</label>
        <input id="faq-input" type="text" name="message" placeholder="{{ $t['ai']['placeholder'] }}" maxlength="200">
        <button type="submit" aria-label="Kirim"><i class="bi bi-send-fill" aria-hidden="true"></i></button>
    </form>
</section>
