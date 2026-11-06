{{-- Pita ajakan di bawah halaman dalam --}}
<section class="lw-cta" aria-labelledby="lw-cta-title">
    <div class="lw-container">
        <div class="lw-cta__box">
            <img class="lw-cta__art" src="{{ $img($c['img']['bot_left']) }}" alt="" aria-hidden="true" loading="lazy" width="696" height="357">
            <div class="lw-cta__txt">
                <h2 id="lw-cta-title">{{ $c['cta']['title'] }}</h2>
                <p>{{ $c['cta']['text'] }}</p>
            </div>
            <div class="lw-cta__btns">
                <a class="lw-btn" href="{{ $r('inquiry') }}">{{ $c['cta']['primary'] }} <svg class="lw-i"><use href="#i-arrow"/></svg></a>
                <a class="lw-btn lw-btn--ghost" href="https://wa.me/{{ $c['contact']['whatsapp'] }}" target="_blank" rel="noopener"><svg class="lw-i"><use href="#i-whatsapp"/></svg> {{ $c['cta']['wa'] }}</a>
                <button class="lw-btn lw-btn--ghost" type="button" data-lw-chat-open><svg class="lw-i"><use href="#i-chat"/></svg> {{ $c['cta']['bot'] }}</button>
            </div>
        </div>
    </div>
</section>
