<article class="card card--moq" aria-labelledby="moqPrevTitle">
    <h2 id="moqPrevTitle">{{ $data['moq']['title'] }}</h2>
    <p>{{ $data['moq']['text'] }}</p>
    <div class="metric">
        <span class="metric__icon metric__icon--green"><svg class="ico"><use href="#i-sprout"></use></svg></span>
        <div>
            <small>{{ $data['moq']['from'] }}</small>
            <strong>{{ $data['moq']['value'] }}</strong>
        </div>
    </div>
    <a class="btn btn--primary btn--sm" href="{{ $u['moq'] }}">Lihat Detail <svg class="ico"><use href="#i-arrow"></use></svg></a>
</article>
