<section class="section" id="categories">
    <div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => 'Kategori Populer', 'title' => 'Jelajahi <span class="gt">8 Semesta</span> Aset', 'desc' => 'Dari model 3D hingga kursus video — temukan kategori yang paling pas dengan kebutuhan kreatifmu.', 'href' => $u('categories'), 'label' => 'Semua Kategori'])
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($dam['categories'] as $slug => $c)
                <a href="{{ $u('explore-assets') }}?cat={{ $slug }}" class="cat-card tone-{{ $c['tone'] }} reveal" style="--d:{{ $loop->index % 4 * .08 }}s" data-tilt>
                    <span class="ci">{{ $ic($c['icon'], 'ico-lg') }}</span>
                    <h3>{{ $c['name'] }}</h3>
                    <p>{{ $c['desc'] }}</p>
                    <span class="cnt"><span>{{ $all->where('cat', $slug)->count() * 410 + 120 }}+ aset</span>{{ $ic('arrow', 'ico-sm') }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>
