<section class="eo-pkgs-panel" aria-labelledby="eo-pkgs-title">
    <header class="eo-pkgs-panel__head">
        <div>
            <h2 id="eo-pkgs-title">Paket Event Kami</h2>
            <p>Pilihan paket lengkap untuk acara Anda.</p>
        </div>
        <a class="eo-link" href="{{ url($eo['base'].'/paket-event') }}">Lihat Semua Paket <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </header>
    <div class="eo-pkgs">
        @foreach($eo['packages']['private'] as $pkg)
        <article class="eo-pkg @if(!empty($pkg['badge'])) eo-pkg--hot @endif">
            @if(!empty($pkg['badge']))
            <span class="eo-pkg__badge">{{ $pkg['badge'] }}</span>
            @endif
            <img class="eo-pkg__ico" src="{{ asset($eo['assets']['img']) }}/{{ $pkg['icon'] }}" alt="" width="46" height="44" loading="lazy">
            <h3>{{ $pkg['name'] }}</h3>
            <p class="eo-pkg__from">Mulai dari</p>
            <p class="eo-pkg__price">{{ $pkg['price'] }}</p>
            <ul class="eo-pkg__list">
                @foreach($pkg['preview'] as $feat)
                <li><svg class="eo-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $feat }}</li>
                @endforeach
            </ul>
            <a class="eo-btn eo-btn--gold eo-btn--xs" href="{{ url($eo['base'].'/penawaran?paket='.$pkg['key'].'&tipe=private') }}">Pilih Paket <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </article>
        @endforeach
    </div>
</section>
