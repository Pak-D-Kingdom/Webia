<section class="lw-band" aria-labelledby="lw-band-title">
    <div class="lw-band__bot">
        <img src="{{ $img($c['img']['robot_big']) }}" alt="" loading="lazy" width="300" height="220">
        <div>
            <h2 class="lw-card__title" id="lw-band-title">{{ $c['chatbot']['title'] }}</h2>
            <p>{{ $c['chatbot']['sub'] }}</p>
            <button class="lw-btn" type="button" data-lw-chat-open>{{ $c['chatbot']['cta'] }} <svg class="lw-i"><use href="#i-arrow"/></svg></button>
        </div>
    </div>

    <div class="lw-band__faq">
        <h2 class="lw-band__faq-title">Pertanyaan yang Sering Ditanyakan</h2>
        <ul class="lw-faq-grid">
            @foreach ($c['chatbot']['faq'] as $f)
                <li>
                    <button type="button" class="lw-faq" data-lw-chat-topic="{{ $f['key'] }}">
                        <span class="lw-ico lw-ico--round"><svg class="lw-i"><use href="#i-{{ $f['icon'] }}"/></svg></span>
                        <span>{{ $f['label'][0] }}<br>{{ $f['label'][1] }}</span>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="lw-band__art" aria-hidden="true">
        <img src="{{ $img($c['img']['faq_art']) }}" alt="" loading="lazy" width="340" height="200">
        <span class="lw-script lw-script--bubble">{{ $c['chatbot']['teaser'] }}</span>
    </div>
</section>
