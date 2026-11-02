<article class="lw-card lw-card--area">
    <img class="lw-area-art" src="{{ $img($c['img']['truck']) }}" alt="Mobil jemput dan antar FreshWash" loading="lazy" width="380" height="240">
    <div class="lw-area-body">
        <h2 class="lw-card__title">{{ $c['coverage']['title'] }}</h2>
        <p>{{ $c['coverage']['sub'] }}</p>
        <span class="lw-badge">{{ $c['coverage']['badge'] }}</span>
        <ul class="lw-radios">
            @foreach ($c['coverage']['areas'] as $a)
                <li><span class="lw-radio" aria-hidden="true"></span>{{ $a['name'] }} <small>({{ $a['scope'] }})</small></li>
            @endforeach
        </ul>
        <a class="lw-btn lw-btn--sm" href="{{ $r('area') }}">Cek Area Layanan <svg class="lw-i"><use href="#i-arrow"/></svg></a>
    </div>
</article>
