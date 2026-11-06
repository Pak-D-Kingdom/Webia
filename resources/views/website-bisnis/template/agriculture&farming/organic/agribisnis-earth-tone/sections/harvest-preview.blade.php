<article class="card card--harvest reveal" aria-labelledby="harvestPrevTitle">
    <img class="card__bgimg" src="{{ $img }}/harvest-bg.jpg" alt="Buah kopi merah matang di pohon" loading="lazy">
    <div class="card--harvest__shade" aria-hidden="true"></div>
    <div class="card--harvest__body">
        <h2 id="harvestPrevTitle">{{ $data['harvest']['title'] }}</h2>
        <p>{{ $data['harvest']['text'] }}</p>
        <a class="btn btn--cream btn--sm" href="{{ $u['panen'] }}">Lihat Info Lengkap <svg class="ico"><use href="#i-arrow"></use></svg></a>
    </div>
</article>
