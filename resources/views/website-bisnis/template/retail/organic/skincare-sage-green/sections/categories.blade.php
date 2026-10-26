@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
@endphp
<section class="container cats-wrap" aria-label="Kategori produk">
    <div class="cats">
        <svg class="deco deco--cat-l" aria-hidden="true"><use href="#i-branch"/></svg>
        <svg class="deco deco--cat-r" aria-hidden="true"><use href="#i-branch"/></svg>

        <ul class="cats__list">
            @foreach($cfg['categories'] as $c)
                <li>
                    <a class="cat" href="{{ route($cfg['route'] . 'catalog') }}?kategori={{ $c['key'] }}">
                        <span class="cat__ico"><svg class="ico ico--cat" aria-hidden="true"><use href="#i-{{ $c['icon'] }}"/></svg></span>
                        <span class="cat__label">{{ $c['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>

        <form class="search" role="search" action="{{ route($cfg['route'] . 'catalog') }}" method="get">
            <label class="sr-only" for="home-search">Cari produk</label>
            <svg class="ico" aria-hidden="true"><use href="#i-search"/></svg>
            <input id="home-search" type="search" name="cari" placeholder="Cari produk skincare, makeup, dll...">
            <button type="submit" class="sr-only">Cari</button>
        </form>
    </div>
</section>
