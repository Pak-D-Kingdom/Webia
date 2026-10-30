@php $ai = $site['ai']; @endphp
<section class="lg-ai" aria-labelledby="lg-ai-title">
    <div class="lg-wrap lg-ai__in">
        <div class="lg-ai__girl">
            <img src="{{ $img('courier-girl.png') }}" alt="Kurir Energi Cargo" loading="lazy">
        </div>

        <div class="lg-ai__helper">
            <p>{{ $ai['helper']['text'] }}</p>
            <button type="button" class="lg-btn lg-btn--primary lg-btn--xs" data-bot-open>{{ $ai['helper']['cta'] }}<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></button>
        </div>

        <div class="lg-ai__card">
            <div class="lg-ai__intro">
                <h2 id="lg-ai-title"><a href="{{ $to('ai-assistant') }}">{{ $ai['title'] }}</a></h2>
                <p>{{ $ai['text'] }}</p>
            </div>
            <ul class="lg-ai__qs">
                @foreach ($ai['questions'] as $q)
                    <li>
                        <button type="button" data-bot-ask="{{ $q }}">
                            <span><svg class="lg-ic" aria-hidden="true"><use href="#i-chat"></use></svg></span>{{ $q }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="lg-ai__robot">
            <img src="{{ $img('robot-mascot.png') }}" alt="Maskot AI Assistant Energi Cargo" loading="lazy">
        </div>
    </div>
</section>
