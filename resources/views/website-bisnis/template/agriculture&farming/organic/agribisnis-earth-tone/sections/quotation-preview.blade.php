<article class="card card--quote" aria-labelledby="quotePrevTitle">
    <div class="card--quote__body">
        <span class="metric__icon metric__icon--orange"><svg class="ico"><use href="#i-doc"></use></svg></span>
        <div class="card--quote__txt">
            <h2 id="quotePrevTitle">{{ $data['quotation']['title'] }}</h2>
            <p>{{ $data['quotation']['text'] }}</p>
            <a class="btn btn--accent btn--sm" href="{{ $u['penawaran'] }}">{{ $data['quotation']['cta'] }} <svg class="ico"><use href="#i-arrow"></use></svg></a>
        </div>
    </div>
</article>
