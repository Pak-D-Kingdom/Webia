<section id="layanan" class="panel panel--services" aria-labelledby="t-svc">
    <div class="sec-head"><h2 id="t-svc">Produk &amp; Layanan</h2></div>
    <div class="services">
        @foreach (config('cafe.services') as [$icon, $title, $desc, $img])
            <article class="svc">
                <div class="thumb thumb--sq"><img src="{{ asset("images/$path/$img") }}" alt="" loading="lazy"></div>
                <div class="item__body"><h3><span class="svc__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $icon }}"/></svg></span>{{ $title }}</h3><p class="desc">{{ $desc }}</p></div>
            </article>
        @endforeach
    </div>
</section>
