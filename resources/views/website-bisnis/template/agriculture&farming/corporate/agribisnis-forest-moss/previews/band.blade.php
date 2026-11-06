<section class="band" aria-label="AI Assistant dan permintaan penawaran">
    <span class="band__glow band__glow--a" aria-hidden="true"></span>
    <span class="band__glow band__glow--b" aria-hidden="true"></span>
    <div class="container band__grid">
        <article class="band__ai" id="ai">
            <div class="band__ai-fig">
                <img class="band__robot" src="{{ asset($cfg['img']['robot']) }}" alt="Maskot AI Assistant Green Harvest" loading="lazy" width="480" height="488">
                <span class="band__online"><i class="dot" aria-hidden="true"></i>Online</span>
            </div>
            <div class="band__ai-tx">
                <h2>{{ $cfg['ai']['title'] }}<br>{{ $cfg['ai']['title2'] }}</h2>
                <p>{{ $cfg['ai']['text'] }}</p>
                <p class="band__label">{{ $cfg['ai']['label'] }}</p>
                <ul class="band__chips">
                    @foreach($cfg['ai']['chips'] as $chip)
                        <li><button class="chip chip--dark" type="button" data-chat-ask="{{ $chip }}">{{ $chip }}</button></li>
                    @endforeach
                </ul>
                <button class="btn btn--lime btn--pill btn--sm" type="button" data-chat-open><span>{{ $cfg['ai']['btn'] }}</span><svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg></button>
            </div>
        </article>

        <article class="band__quote" id="penawaran" style="--quote-img: url('{{ asset($cfg['img']['gandum']) }}')">
            <div class="band__quote-tx">
                <h2><a href="{{ route('agribisnis.penawaran') }}">{{ $cfg['quote']['title'] }}</a></h2>
                <p>{{ $cfg['quote']['sub'] }}</p>
                <ol class="band__steps">
                    @foreach($cfg['quote']['steps'] as $step)
                        <li>{{ $step }}</li>
                    @endforeach
                </ol>
                <a class="btn btn--white btn--pill btn--sm" href="{{ route('agribisnis.penawaran') }}"><span>{{ $cfg['quote']['btn'] }}</span><svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
        </article>
    </div>
</section>
