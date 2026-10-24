@php $p = $z['portfolio']; $items = array_slice($p['items'], 0, $p['preview_count']); @endphp
<article class="ot-card" id="portofolio-preview" data-carousel>
    <header class="ot-card__head">
        <div><h2>{{ $p['title'] }}</h2><p>{{ $p['subtitle'] }}</p></div>
        <a class="ot-link" href="{{ $url('portfolio') }}">Lihat Semua<svg class="ot-ic" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
    </header>
    <div class="ot-carousel">
        <ul class="ot-thumbs" data-track>
            @foreach ($items as $i)
                <li class="ot-thumb">
                    <a href="{{ $url('portfolio') }}" aria-label="{{ $i['title'] }} - {{ $i['category'] }}">
                        <img src="{{ $img($i['image']) }}" alt="" loading="lazy" width="216" height="148">
                        <strong>{{ $i['title'] }}</strong><small>{{ $i['category'] }}</small>
                    </a>
                </li>
            @endforeach
        </ul>
        <button class="ot-carousel__btn" type="button" data-next aria-label="Berikutnya"><svg class="ot-ic" aria-hidden="true"><use href="#i-chev-right"/></svg></button>
    </div>
</article>
