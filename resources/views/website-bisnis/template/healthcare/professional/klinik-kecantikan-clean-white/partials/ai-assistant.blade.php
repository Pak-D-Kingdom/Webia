{{--
    AI Information Assistant (statis / rule-based, tanpa backend)
    Launcher: avatar robot dari desain UI + cincin denyut, melayang, dan gelembung "Halo!"
    Panel   : header, sapaan, quick reply, maskot, input, dan baris tombol pintasan (sesuai desain UI)
--}}
@php $ai = $clinic['assistant']; @endphp

<div class="gl-ai" data-gl-ai>
    <button type="button" class="gl-ai__launcher" data-gl-ai-open aria-expanded="false" aria-controls="gl-ai-panel" aria-label="Buka {{ $ai['name'] }}">
        <span class="gl-ai__bubble" data-gl-ai-bubble>Halo! <span aria-hidden="true">👋</span></span>
        <span class="gl-ai__orb">
            <span class="gl-ai__pulse" aria-hidden="true"></span>
            <span class="gl-ai__pulse gl-ai__pulse--2" aria-hidden="true"></span>
            <img src="{{ $img($ai['avatar']) }}" alt="" width="64" height="64" decoding="async">
            <span class="gl-ai__status" aria-hidden="true"></span>
        </span>
    </button>

    <section class="gl-ai__panel" id="gl-ai-panel" role="dialog" aria-modal="false" aria-labelledby="gl-ai-title" hidden>
        <header class="gl-ai__head">
            <span class="gl-ai__avatar"><img src="{{ $img($ai['avatar']) }}" alt="" width="48" height="48" decoding="async"></span>
            <div class="gl-ai__headtext">
                <h2 id="gl-ai-title">{{ $ai['name'] }}</h2>
                <p>{{ $ai['subtitle'] }}</p>
            </div>
            <button type="button" class="gl-ai__close" data-gl-ai-close aria-label="Tutup asisten">
                <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-x"/></svg>
            </button>
        </header>

        <div class="gl-ai__body" data-gl-ai-body>
            <div class="gl-ai__log" data-gl-ai-log role="log" aria-live="polite" aria-relevant="additions">
                <div class="gl-ai__msg gl-ai__msg--bot"><p>{{ $ai['greeting'] }}</p></div>
            </div>

            <div class="gl-ai__stage">
                <ul class="gl-ai__chips" data-gl-ai-chips>
                    @foreach ($ai['chips'] as $chip)
                        <li>
                            <button type="button" class="gl-ai__chip" data-gl-ai-intent="{{ $chip['intent'] }}" data-label="{{ $chip['label'] }}">
                                <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-{{ $chip['icon'] }}"/></svg>
                                <span>{{ $chip['label'] }}</span>
                            </button>
                        </li>
                    @endforeach
                </ul>
                <img class="gl-ai__mascot" src="{{ $img($ai['mascot']) }}" alt="" loading="lazy" decoding="async">
            </div>
        </div>

        <form class="gl-ai__form" data-gl-ai-form autocomplete="off">
            <label class="gl-sr" for="gl-ai-input">Pertanyaan Anda</label>
            <input id="gl-ai-input" type="text" name="q" maxlength="200" placeholder="{{ $ai['placeholder'] }}" data-gl-ai-input>
            <button type="submit" class="gl-ai__send" aria-label="Kirim pertanyaan">
                <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-send"/></svg>
            </button>
        </form>

        <ul class="gl-ai__shortcuts" aria-label="Pintasan topik">
            @foreach ($ai['shortcuts'] as $s)
                <li>
                    <button type="button" class="gl-ai__short" data-gl-ai-intent="{{ $s['intent'] }}" data-label="{{ $s['label'] }}" aria-label="{{ $s['label'] }}" title="{{ $s['label'] }}">
                        <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-{{ $s['icon'] }}"/></svg>
                    </button>
                </li>
            @endforeach
        </ul>
        <p class="gl-ai__note">{{ $ai['disclaimer'] }}</p>
    </section>
</div>
