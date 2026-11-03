<section class="band" aria-label="AI Assistant, inquiry dan penawaran">
    <div class="container band__grid">
        <article class="band__ai" id="ai">
            <img class="band__robot" src="{{ asset($cfg['img']['robot']) }}" alt="Maskot AI Assistant Green Harvest" loading="lazy" width="480" height="488">
            <div class="band__ai-tx">
                <h2>{{ $cfg['ai']['title'] }}<br>{{ $cfg['ai']['title2'] }}</h2>
                <p>{{ $cfg['ai']['text'] }}</p>
                <button class="btn btn--lime btn--pill btn--sm" type="button" data-chat-open><span>{{ $cfg['ai']['btn'] }}</span><svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg></button>
            </div>
        </article>

        <article class="band__inq" id="inquiry">
            <h2><a href="{{ route('agribisnis.inquiry') }}">{{ $cfg['inquiry']['title'] }}</a></h2>
            <p>{{ $cfg['inquiry']['sub'] }}</p>
            @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.form-inquiry', ['full' => false, 'suffix' => 'Home'])
        </article>

        <article class="band__quote" id="penawaran" style="--quote-img: url('{{ asset($cfg['img']['gandum']) }}')">
            <div class="band__quote-tx">
                <h2><a href="{{ route('agribisnis.penawaran') }}">{{ $cfg['quote']['title'] }}</a></h2>
                <p>{{ $cfg['quote']['sub'] }}</p>
                <a class="btn btn--white btn--pill btn--sm" href="{{ route('agribisnis.penawaran') }}"><span>{{ $cfg['quote']['btn'] }}</span><svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
        </article>
    </div>
</section>
