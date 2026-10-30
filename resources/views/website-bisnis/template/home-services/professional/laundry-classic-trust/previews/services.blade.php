<article class="card card--photo b-show">
    <img src="{{ $img('folded-clothes.svg') }}" alt="Pakaian terlipat rapi" loading="lazy">
    <div class="card--photo__txt">
        <h2>Layanan Laundry Lengkap &amp; Profesional</h2>
        <p>Dari pakaian sehari-hari hingga item khusus, semua kami tangani dengan penuh perhatian.</p>
        <a class="btn btn--white btn--sm" href="{{ $url('services') }}">Lihat Semua Layanan <svg class="ic"><use href="#i-arrow"/></svg></a>
    </div>
</article>

<section class="card b-serv" aria-labelledby="pv-serv">
    <header class="card__head">
        <div><h2 id="pv-serv">Layanan Laundry</h2><p>Pilihan layanan untuk kebutuhan Anda.</p></div>
        <a class="link" href="{{ $url('services') }}">Lihat Semua <svg class="ic"><use href="#i-arrow"/></svg></a>
    </header>
    <ul class="tiles tiles--5">
        @foreach ($c['services'] as $s)
            <li><a class="tile" href="{{ $url('services') }}#{{ $s['slug'] }}">
                <span class="tile__ic"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                <strong>{{ $s['name'] }}</strong><small>({{ $s['variant'] }})</small>
            </a></li>
        @endforeach
    </ul>
</section>
