<section class="section" id="featured">
    <div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => 'Featured Assets', 'title' => 'Aset <span class="gt">Pilihan</span> Minggu Ini', 'desc' => 'Aset paling diminati dengan kualitas teruji dan ulasan terbaik dari komunitas.', 'href' => $u('explore-assets'), 'label' => 'Jelajahi Semua'])
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($all->filter(fn ($a) => in_array('featured', $a['flags']))->take(8) as $a)
                <div class="reveal" style="--d:{{ $loop->index % 4 * .08 }}s">@include($v . '.partials.asset-card', ['a' => $a])</div>
            @endforeach
        </div>
        <div class="mt-12 reveal">@include($v . '.partials.ai-recommend')</div>
    </div>
</section>
