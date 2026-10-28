{{-- AI CHATBOT (FAQ produk & custom) --}}
@php $preview = $preview ?? false; $a = $cfg['ai']; @endphp

@if ($preview)
    <article class="fm-pv fm-pv--ai fm-card" data-fm-reveal>
        <header class="fm-ai__head">
            <span class="fm-ai__avatar">@include($ns.'.partials.robot')</span>
            <div><h2 class="fm-h5">{{ $a['name'] }}</h2><p>{{ $a['text'] }}</p></div>
        </header>
        <div class="fm-ai__scene">
            <img src="{{ $img($a['image']) }}" alt="Robot asisten WoodenLane duduk di sofa" loading="lazy" decoding="async">
            <span class="fm-ai__bubble" aria-hidden="true">{{ $a['bubble'] }}</span>
        </div>
        <ul class="fm-ai__chips">
            @foreach ($a['quick'] as $qk)
                <li><button type="button" class="fm-qchip" data-fm-ask="{{ $qk }}">{{ $qk }}</button></li>
            @endforeach
        </ul>
        <form class="fm-ai__form" data-fm-ai-preview autocomplete="off">
            <label class="fm-sr" for="fm-ai-pv-input">Tanya asisten</label>
            <input id="fm-ai-pv-input" type="text" placeholder="{{ $a['placeholder'] }}" maxlength="200">
            <button type="submit" aria-label="Kirim"><svg class="fm-i" aria-hidden="true"><use href="#i-send"/></svg></button>
        </form>
        <a class="fm-ai__more" href="{{ $route('ai-chatbot') }}">Buka halaman AI Chatbot <svg class="fm-i fm-i--xs" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </article>
@else
    <section class="fm-section">
        <div class="fm-container fm-aipage">
            <div class="fm-chatpage fm-card" data-fm-chat="page">
                <header class="fm-chat__head fm-chat__head--page">
                    <span class="fm-chat__avatar">@include($ns.'.partials.robot')</span>
                    <div class="fm-chat__who"><strong>{{ $a['name'] }}</strong><small><i class="fm-dot" aria-hidden="true"></i> FAQ produk &amp; custom furniture</small></div>
                </header>
                @include($ns.'.partials.chat-window', ['uid' => 'page'])
            </div>

            <aside class="fm-aipage__side">
                <div class="fm-card fm-aipage__scene">
                    <img src="{{ $img($a['image']) }}" alt="Robot asisten WoodenLane" loading="lazy" decoding="async">
                    <span class="fm-ai__bubble" aria-hidden="true">{{ $a['bubble'] }}</span>
                </div>
                <div class="fm-card">
                    <h2 class="fm-h4">Pertanyaan populer</h2>
                    <ul class="fm-ai__chips fm-ai__chips--col">
                        @foreach ($a['quick'] as $qk)
                            <li><button type="button" class="fm-qchip" data-fm-ask-page="{{ $qk }}">{{ $qk }}</button></li>
                        @endforeach
                    </ul>
                    <p class="fm-note">Jawaban bersifat otomatis seputar produk &amp; custom furniture. Untuk detail lebih lanjut, hubungi kami lewat WhatsApp.</p>
                </div>
            </aside>
        </div>
    </section>
@endif
