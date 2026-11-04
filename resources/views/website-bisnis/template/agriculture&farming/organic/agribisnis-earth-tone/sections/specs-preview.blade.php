<article class="card card--specs" aria-labelledby="specPrevTitle">
    <div class="card__head">
        <div>
            <h2 id="specPrevTitle">{{ $data['specs']['title'] }}</h2>
            <p>{{ $data['specs']['text'] }}</p>
        </div>
        <a class="link-arrow link-arrow--accent" href="{{ $u['spesifikasi'] }}">Lihat Detail <svg class="ico"><use href="#i-arrow"></use></svg></a>
    </div>
    <ul class="spec-tiles">
        @foreach ($data['specs']['headline'] as $s)
            <li class="spec-tile">
                <span class="spec-tile__icon"><svg class="ico"><use href="#i-{{ $s['icon'] }}"></use></svg></span>
                <strong>{{ $s['label'] }}</strong>
                <span>{{ $s['value'] }}</span>
            </li>
        @endforeach
    </ul>
</article>
