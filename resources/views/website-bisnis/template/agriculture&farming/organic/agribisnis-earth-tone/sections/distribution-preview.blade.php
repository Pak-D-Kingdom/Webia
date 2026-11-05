<article class="card card--dist reveal" aria-labelledby="distPrevTitle">
    <div class="card__titlerow">
        <span class="title-icon"><svg class="ico"><use href="#i-globe"></use></svg></span>
        <div>
            <h2 id="distPrevTitle">{{ $data['distribution']['title'] }}</h2>
            <p>{{ $data['distribution']['text'] }}</p>
        </div>
    </div>
    <figure class="dist-map">
        <img src="{{ $img }}/map-indonesia.png" alt="Peta persebaran distribusi di Indonesia dan Asia" loading="lazy">
        <figcaption>{{ $data['distribution']['label'] }}</figcaption>
    </figure>
    <a class="link-arrow" href="{{ $u['distribusi'] }}">Lihat Peta <svg class="ico"><use href="#i-arrow"></use></svg></a>
</article>
