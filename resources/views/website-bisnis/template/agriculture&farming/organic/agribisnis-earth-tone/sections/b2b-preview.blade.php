<article class="card card--b2b" aria-labelledby="b2bPrevTitle">
    <img class="card__bgimg" src="{{ $img }}/harvest-bg.jpg" alt="" aria-hidden="true" loading="lazy">
    <div class="card--b2b__body">
        <span class="metric__icon metric__icon--white"><svg class="ico"><use href="#i-handshake"></use></svg></span>
        <div class="card--b2b__txt">
            <h2 id="b2bPrevTitle">{{ $data['b2b']['title'] }}</h2>
            <p>{{ $data['b2b']['text'] }}</p>
            <a class="btn btn--cream btn--sm" href="{{ $u['b2b'] }}">{{ $data['b2b']['cta'] }} <svg class="ico"><use href="#i-arrow"></use></svg></a>
        </div>
    </div>
</article>
