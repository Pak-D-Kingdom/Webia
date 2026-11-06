<section class="lw-band" aria-labelledby="lw-band-title">
    <div class="lw-band__bot">
        <img class="lw-band__img lw-band__img--l" src="{{ $img($c['img']['bot_left']) }}" alt="" aria-hidden="true" loading="lazy" width="696" height="357">
        <div class="lw-band__txt">
            <h2 class="lw-card__title" id="lw-band-title">{{ $c['chatbot']['title'] }}</h2>
            <p>{{ $c['chatbot']['sub'] }}</p>
            <button class="lw-btn lw-btn--sm" type="button" data-lw-chat-open>{{ $c['chatbot']['cta'] }} <svg class="lw-i"><use href="#i-arrow"/></svg></button>
        </div>
    </div>

    <div class="lw-band__faq">
        <h2 class="lw-band__faq-title">Pertanyaan yang Sering Ditanyakan</h2>
        <ul class="lw-faq-grid">
            @foreach ($c['chatbot']['faq'] as $f)
                <li>
                    <button type="button" class="lw-faq" data-lw-chat-topic="{{ $f['key'] }}">
                        <span class="lw-ico"><svg class="lw-i"><use href="#i-{{ $f['icon'] }}"/></svg></span>
                        <span>{{ $f['label'][0] }}<br>{{ $f['label'][1] }}</span>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    <img class="lw-band__img lw-band__img--r" src="{{ $img($c['img']['bot_right']) }}" alt="" aria-hidden="true" loading="lazy" width="1173" height="357">
</section>
