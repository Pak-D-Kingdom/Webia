<section id="menu-preview" class="panel" aria-labelledby="t-menu">
    <div class="sec-head">
        <h2 id="t-menu">Menu Pilihan</h2>
        <a class="link" href="{{ route('webia.fnb.minimalis.menu') }}">Lihat Semua Menu <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </div>
    <div class="menu-grid menu-grid--4">
        @foreach (collect(config('cafe.menu'))->where('fav', true) as $m)
            @include("$v.partials.menu-card", ['m' => $m])
        @endforeach
    </div>
</section>
