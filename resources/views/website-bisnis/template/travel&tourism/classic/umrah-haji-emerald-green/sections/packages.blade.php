<section class="uh-card uh-pk" aria-labelledby="uh-pk-title">
    <header class="uh-card__head">
        <h2 id="uh-pk-title" class="uh-card__title">{{ $uh['pages']['packages']['title'] }}</h2>
        <a class="uh-card__link" href="{{ $url('packages') }}"><span>Lihat Semua Paket</span><svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <p class="uh-card__sub">{{ $uh['pages']['packages']['text'] }}</p>
    </header>

    <ul class="uh-pk__grid">
        @foreach ($uh['packages'] as $pkg)
            <li>
                <a class="uh-pk__item" href="{{ $url('packages') }}#{{ $pkg['slug'] }}">
                    <span class="uh-pk__media">
                        <img src="{{ $img($pkg['image']) }}" alt="{{ $pkg['name'] }}" width="105" height="84" loading="lazy">
                        @if ($pkg['ribbon'])
                            <span class="uh-ribbon">{{ $pkg['ribbon'] }}</span>
                        @endif
                    </span>
                    <span class="uh-pk__body">
                        <span class="uh-pk__row">
                            <span class="uh-pk__name">{{ $pkg['name'] }}</span>
                            <span class="uh-pk__go" aria-hidden="true"><svg class="uh-i"><use href="#i-arrow-right"/></svg></span>
                        </span>
                        <span class="uh-pk__meta">{{ $pkg['meta'] }}</span>
                        <span class="uh-pk__price">{{ $pkg['price'] }}</span>
                        <span class="uh-tag">{{ $pkg['tag'] }}</span>
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</section>
