<section class="sec">
    <div class="lw-wrap">
        <div class="grid grid--svc">
            @foreach ($c['services'] as $s)
                <article class="svc" id="{{ $s['slug'] }}">
                    <header class="svc__head">
                        <span class="tile__ic tile__ic--lg"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                        <div><h2>{{ $s['name'] }} <small>({{ $s['variant'] }})</small></h2><p class="svc__meta"><span><svg class="ic"><use href="#i-clock"/></svg>{{ $s['time'] }}</span><span><svg class="ic"><use href="#i-premium"/></svg>Mulai {{ $s['from'] }}</span></p></div>
                    </header>
                    <p>{{ $s['desc'] }}</p>
                    <ul class="checks">@foreach ($s['features'] as $f)<li><svg class="ic"><use href="#i-check"/></svg>{{ $f }}</li>@endforeach</ul>
                    <div class="svc__act">
                        <a class="btn btn--navy btn--sm" href="{{ $url('contact') }}?layanan={{ $s['slug'] }}">Pesan Layanan <svg class="ic"><use href="#i-arrow"/></svg></a>
                        <a class="link" href="{{ $url('prices') }}">Lihat harga</a>
                    </div>
                </article>
            @endforeach
        </div>

        <article class="card card--photo band">
            <img src="{{ $img('folded-clothes.svg') }}" alt="Pakaian terlipat rapi" loading="lazy">
            <div class="card--photo__txt">
                <h2>Layanan Laundry Lengkap &amp; Profesional</h2>
                <p>Dari pakaian sehari-hari hingga item khusus, semua kami tangani dengan penuh perhatian. Tambahkan <a href="{{ $url('options') }}">service option</a> untuk hasil lebih maksimal.</p>
                <a class="btn btn--white btn--sm" href="{{ $url('contact') }}">Pesan Sekarang <svg class="ic"><use href="#i-arrow"/></svg></a>
            </div>
        </article>
    </div>
</section>
