<section class="section" id="new-arrivals">
    <div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => 'New Arrivals', 'title' => 'Baru <span class="gt">Mendarat</span>', 'desc' => 'Rilisan terbaru dari kreator — jadi yang pertama memilikinya.', 'arrows' => 'carNew', 'href' => $u('explore-assets') . '?sort=new'])
        <div class="carousel" id="carNew">
            @foreach ($all->sortBy('days')->take(8) as $a)
                @include($v . '.partials.asset-card', ['a' => $a])
            @endforeach
        </div>
    </div>
</section>
