<section class="sec">
    <div class="lw-wrap">
        <nav class="chipnav" aria-label="Lompat ke layanan">
            @foreach ($c['services'] as $s)
                <a href="#{{ $s['slug'] }}"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg>{{ $s['name'] }}</a>
            @endforeach
        </nav>

        <div class="svcs">
            @foreach ($c['services'] as $s)
                <article class="svc" id="{{ $s['slug'] }}">
                    <header class="svc__head">
                        <span class="bub bub--lg"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                        <div><h2>{{ $s['name'] }}</h2><span class="svc__tag">{{ $s['variant'] }}</span></div>
                    </header>
                    <p>{{ $s['desc'] }}</p>
                    <ul class="checks">@foreach ($s['features'] as $f)<li><svg class="ic"><use href="#i-check"/></svg>{{ $f }}</li>@endforeach</ul>
                    <div class="svc__foot">
                        <div class="svc__price"><small>Mulai dari</small><b>{{ $s['from'] }}</b></div>
                        <span class="svc__time"><svg class="ic"><use href="#i-clock"/></svg>{{ $s['time'] }}</span>
                    </div>
                    <div class="svc__act">
                        <a class="btn btn--navy btn--sm" href="{{ $url('contact') }}?layanan={{ $s['slug'] }}">Pesan Layanan <svg class="ic"><use href="#i-arrow"/></svg></a>
                        <a class="link" href="{{ $url('prices') }}">Lihat harga</a>
                    </div>
                </article>
            @endforeach
        </div>

        <article class="card card--photo band">
            <img src="{{ $img('hero-photo.jpg') }}" alt="Mesin cuci dan keranjang handuk bersih" loading="lazy">
            <div class="card--photo__txt">
                <h2>Layanan Laundry Lengkap &amp; Profesional</h2>
                <p>Dari pakaian sehari-hari hingga item khusus, semua kami tangani dengan penuh perhatian. Tambahkan <a href="{{ $url('options') }}">service option</a> untuk hasil lebih maksimal.</p>
                <a class="btn btn--white btn--sm" href="{{ $url('contact') }}">Pesan Sekarang <svg class="ic"><use href="#i-arrow"/></svg></a>
            </div>
        </article>
    </div>
</section>
