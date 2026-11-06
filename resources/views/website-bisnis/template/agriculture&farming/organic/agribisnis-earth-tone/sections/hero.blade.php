<section class="hero" id="beranda" aria-labelledby="heroTitle">
    <img class="hero__bg" src="{{ $img }}/hero-bg.jpg" alt="Petani memantau ladang komoditas dengan tablet di kaki pegunungan" fetchpriority="high">
    <div class="hero__veil" aria-hidden="true"></div>

    <div class="hero__inner">
        <div class="hero__copy">
            <p class="eyebrow">{{ $data['hero']['eyebrow'] }}</p>
            <h1 id="heroTitle">
                <span class="hero__t1">{{ $data['hero']['title_1'] }}</span>
                <span class="hero__t2">{{ $data['hero']['title_2'] }}</span>
            </h1>
            <p class="hero__text">{{ $data['hero']['text'] }}</p>
            <div class="hero__actions">
                <a class="btn btn--primary" href="{{ $u['komoditas'] }}">Lihat Katalog Komoditas <svg class="ico"><use href="#i-arrow"></use></svg></a>
                <a class="btn btn--ghost" href="#tentang" data-scroll="#tentang">Tentang Kami</a>
            </div>
        </div>

        <p class="hero__script" aria-hidden="true"><span>Dari Alam</span><span>untuk Dunia</span></p>

        <aside class="ai-card" aria-label="{{ $data['hero']['ai_title'] }}">
            <div class="ai-card__art">
                <img src="{{ $img }}/mascot-farmer.png" alt="Maskot petani AgroHarvest memegang tablet" width="206" height="138">
            </div>
            <h2>{{ $data['hero']['ai_title'] }}</h2>
            <p>{{ $data['hero']['ai_text'] }}</p>
            <button class="btn btn--primary btn--sm" type="button" data-chat-open>Chat Sekarang <svg class="ico"><use href="#i-arrow"></use></svg></button>
        </aside>
    </div>
</section>
