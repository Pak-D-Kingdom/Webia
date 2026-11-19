<section class="uh-card uh-hf" aria-labelledby="uh-hf-title">
    <header class="uh-hf__head">
        <h2 id="uh-hf-title" class="uh-card__title">{{ $uh['hotels']['title'] }}</h2>
        <p class="uh-card__sub">{{ $uh['hotels']['text'] }}</p>
    </header>

    <div class="uh-hf__grid">
        <a class="uh-hf__item" href="{{ $url('hotel-flight') }}#hotel">
            <span class="uh-hf__media"><img src="{{ $img($uh['hotels']['hotel']['image']) }}" alt="Kamar hotel nyaman dekat masjid" width="168" height="85" loading="lazy"></span>
            <span class="uh-hf__body">
                <span class="uh-hf__title"><svg class="uh-i" aria-hidden="true"><use href="#i-hotel"/></svg>{{ $uh['hotels']['hotel']['title'] }}</span>
                <ul>
                    @foreach ($uh['hotels']['hotel']['points'] as $p)
                        <li><svg class="uh-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $p }}</li>
                    @endforeach
                </ul>
            </span>
        </a>
        <a class="uh-hf__item" href="{{ $url('hotel-flight') }}#pesawat">
            <span class="uh-hf__media"><img src="{{ $img($uh['hotels']['plane']['image']) }}" alt="Pesawat terbang di atas awan" width="168" height="85" loading="lazy"></span>
            <span class="uh-hf__body">
                <span class="uh-hf__title"><svg class="uh-i" aria-hidden="true"><use href="#i-plane"/></svg>{{ $uh['hotels']['plane']['title'] }}</span>
                <ul>
                    @foreach ($uh['hotels']['plane']['points'] as $p)
                        <li><svg class="uh-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $p }}</li>
                    @endforeach
                </ul>
            </span>
        </a>
    </div>
</section>
<a class="uh-arch" href="{{ $url('hotel-flight') }}" aria-label="{{ $uh['hotels']['art_title'] }}">
    <img src="{{ $img('ibadah-nyaman.jpg') }}" alt="{{ $uh['hotels']['art_title'] }}" width="146" height="186" loading="lazy">
</a>
