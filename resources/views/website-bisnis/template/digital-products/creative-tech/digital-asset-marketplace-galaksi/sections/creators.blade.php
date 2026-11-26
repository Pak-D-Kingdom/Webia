<section class="section" id="creators">
    <div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => 'Featured Creators', 'title' => 'Kreator <span class="gt">Bintang</span>', 'desc' => 'Kenali talenta di balik aset terbaik — dan ikuti karya terbarunya.', 'href' => $u('creator-profile'), 'label' => 'Semua Kreator'])
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach (collect($dam['creators'])->take(8) as $cid => $c)
                <div class="reveal" style="--d:{{ $loop->index % 4 * .08 }}s">@include($v . '.partials.creator-card', ['cid' => $cid, 'c' => $c])</div>
            @endforeach
        </div>
    </div>
</section>
