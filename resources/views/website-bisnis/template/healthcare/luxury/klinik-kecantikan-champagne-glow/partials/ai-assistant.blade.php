{{-- AI Information Assistant — panel chat (dibuka lewat tombol kucing GlowCat). Frontend statis, jawaban dari config. --}}
<section class="cg-ai" id="cg-ai" data-cg-ai role="dialog" aria-modal="false" aria-labelledby="cg-ai-title" hidden>
    <img class="cg-ai__cat" src="{{ $img }}/ai-cat.png" alt="" width="190" height="168" loading="lazy" decoding="async">

    <button type="button" class="cg-ai__close" data-cg-ai-close aria-label="Tutup asisten">
        <i class="bi bi-x-lg" aria-hidden="true"></i>
    </button>

    <header class="cg-ai__head">
        <h2 id="cg-ai-title">{{ $c['assistant']['title'] }}</h2>
        <p>{{ $c['assistant']['subtitle'] }}</p>
    </header>

    <div class="cg-ai__log" data-cg-ai-log aria-live="polite" tabindex="0">
        <p class="cg-msg cg-msg--bot">{{ $c['assistant']['greeting'] }}</p>
    </div>

    <ul class="cg-ai__chips" data-cg-ai-chips>
        @foreach ($c['assistant']['quick'] as $q)
            <li>
                <svg class="cg-ai__orn" aria-hidden="true"><use href="#ic-orn"/></svg>
                <button type="button" class="cg-chip" data-cg-ai-ask="{{ $q }}">{{ $q }}</button>
            </li>
        @endforeach
    </ul>

    <form class="cg-ai__form" data-cg-ai-form autocomplete="off">
        <label class="cg-sr" for="cg-ai-input">Pertanyaan Anda</label>
        <input id="cg-ai-input" type="text" name="q" maxlength="200" placeholder="{{ $c['assistant']['placeholder'] }}" data-cg-ai-input>
        <button type="submit" class="cg-ai__send" aria-label="Kirim pertanyaan"><i class="bi bi-send-fill" aria-hidden="true"></i></button>
    </form>
    <p class="cg-ai__note">{{ $c['assistant']['disclaimer'] }}</p>
</section>
