<article class="card card--commodity" id="komoditas" data-carousel>
    <header class="card__head card__head--row">
        <div>
            <h2 class="card__title">Komoditas Unggulan</h2>
            <p class="card__sub">Produk pertanian pilihan dengan kualitas terbaik.</p>
        </div>
        <a class="link-more" href="{{ route('agribisnis.katalog') }}">Lihat Semua <svg class="ic ic--xs" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </header>
    <div class="carousel">
        <button class="carousel__btn carousel__btn--prev" type="button" aria-label="Sebelumnya" data-carousel-prev><svg class="ic ic--xs" aria-hidden="true"><use href="#i-left"/></svg></button>
        <ul class="carousel__track" data-carousel-track>
            @foreach($cfg['commodities'] as $c)
                <li>
                    <a class="ccard" href="{{ route('agribisnis.katalog') }}#{{ $c['key'] }}">
                        <span class="ccard__img"><img src="{{ asset($cfg['img'][$c['img']]) }}" alt="{{ $c['name'] }} — {{ $c['variant'] }}" loading="lazy" width="291" height="273"></span>
                        <b>{{ $c['name'] }}</b>
                        <small>{{ $c['variant'] }}</small>
                    </a>
                </li>
            @endforeach
        </ul>
        <button class="carousel__btn carousel__btn--next" type="button" aria-label="Berikutnya" data-carousel-next><svg class="ic ic--xs" aria-hidden="true"><use href="#i-right"/></svg></button>
    </div>
</article>
