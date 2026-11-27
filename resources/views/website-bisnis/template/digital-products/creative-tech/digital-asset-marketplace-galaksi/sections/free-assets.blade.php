<section class="section" id="free-assets">
    <div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => 'Free Assets', 'title' => 'Aset <span class="gt">Gratis</span> Berkualitas', 'desc' => 'Mulai berkarya tanpa biaya. Lisensi personal, unduh langsung.', 'href' => $u('explore-assets') . '?free=1', 'label' => 'Semua Aset Gratis'])
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($all->where('price', 0)->take(6) as $a)
                <div class="reveal" style="--d:{{ $loop->index % 3 * .08 }}s">@include($v . '.partials.asset-card', ['a' => $a])</div>
            @endforeach
        </div>
    </div>
</section>
