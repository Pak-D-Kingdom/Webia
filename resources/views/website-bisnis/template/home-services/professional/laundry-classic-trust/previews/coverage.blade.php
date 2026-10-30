<section class="card b-cov" aria-labelledby="pv-cov">
    <header class="card__head"><div><h2 id="pv-cov">Jangkauan Pickup &amp; Delivery</h2><p>Kami melayani area di sekitar Surabaya.</p></div></header>
    <div class="cov">
        <div class="cov__map"><img src="{{ $img('map-preview.jpg') }}" alt="Peta area layanan di sekitar Surabaya" loading="lazy"></div>
        <ul class="cov__list">
            @foreach ($c['areas'] as $a)<li>{{ $a['name'] }}</li>@endforeach
        </ul>
    </div>
    <a class="btn btn--navy btn--sm cov__btn" href="{{ $url('coverage') }}">Cek Area Layanan <svg class="ic"><use href="#i-arrow"/></svg></a>
</section>
