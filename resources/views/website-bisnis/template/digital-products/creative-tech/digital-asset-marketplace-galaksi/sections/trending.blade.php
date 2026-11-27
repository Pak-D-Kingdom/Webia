<section class="section" id="trending">
    <div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => 'Trending Assets', 'title' => 'Sedang <span class="gt">Naik Daun</span>', 'desc' => 'Aset dengan lonjakan unduhan tertinggi dalam 7 hari terakhir.', 'arrows' => 'carTrending', 'href' => $u('explore-assets') . '?sort=popular'])
        <div class="carousel" id="carTrending">
            @foreach ($all->filter(fn ($a) => in_array('trending', $a['flags']))->sortByDesc('sales')->values()->take(8) as $a)
                @include($v . '.partials.asset-card', ['a' => $a, 'rank' => $loop->iteration])
            @endforeach
        </div>
    </div>
</section>
