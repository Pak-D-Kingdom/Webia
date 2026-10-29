<section class="ta-aibanner" aria-labelledby="ai-title">
    <img class="ta-aibanner__art ta-aibanner__art--l" src="{{ $img('ai-banner-left.jpg') }}" alt="Maskot robot penjelajah GreenTrip membaca peta" loading="lazy">
    <img class="ta-aibanner__art ta-aibanner__art--r" src="{{ $img('ai-banner-right.jpg') }}" alt="Foto polaroid pantai dan ransel penjelajah" loading="lazy">

    <div class="ta-container ta-aibanner__in">
        <div class="ta-aicard">
            <header class="ta-aicard__head">
                <span class="ta-aicard__badge" aria-hidden="true">AI</span>
                <div>
                    <h2 id="ai-title">{{ $cfg['ai']['title'] }}</h2>
                    <p>{{ $cfg['ai']['subtitle'] }}</p>
                </div>
            </header>
            @include($ns . '.partials.ai-chat', ['variant' => 'inline', 'cid' => 'chat-home'])
            <a class="ta-aicard__more" href="{{ $r('asisten-ai') }}">Buka halaman Asisten AI <svg class="ta-i ta-i--sm" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        </div>
    </div>
</section>
