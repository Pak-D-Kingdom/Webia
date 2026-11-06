<article class="card card--capacity reveal" style="--d:.18s" aria-labelledby="capPrevTitle">
    <h2 id="capPrevTitle">{{ $data['capacity']['title'] }}</h2>
    <p>{{ $data['capacity']['text'] }}</p>
    <div class="metric">
        <span class="metric__icon metric__icon--plain"><svg class="ico"><use href="#i-package"></use></svg></span>
        <div>
            <strong>{{ $data['capacity']['value'] }}</strong>
            <small>{{ $data['capacity']['unit'] }}</small>
        </div>
    </div>
    <a class="btn btn--primary btn--xs" href="{{ $u['kapasitas'] }}">Lihat Kapasitas <svg class="ico"><use href="#i-arrow"></use></svg></a>
</article>
