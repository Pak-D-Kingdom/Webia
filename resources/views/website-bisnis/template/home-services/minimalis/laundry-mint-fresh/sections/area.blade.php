<article class="lw-card lw-card--area">
    <div class="lw-area-inner">
        <img class="lw-area-art" src="{{ $img($c['img']['area']) }}" alt="Mobil jemput dan antar FreshWash" loading="lazy" width="450" height="468">
        <div class="lw-area-body">
            <h2 class="lw-card__title"><a href="{{ $r('area') }}">{{ $c['coverage']['title'] }}</a></h2>
            <p>{{ $c['coverage']['sub'] }}</p>
            <span class="lw-badge">{{ $c['coverage']['badge'] }}</span>
            <ul class="lw-radios">
                @foreach ($c['coverage']['areas'] as $a)
                    <li><span class="lw-radio" aria-hidden="true"></span>{{ $a['name'] }} <small>({{ $a['scope'] }})</small></li>
                @endforeach
            </ul>
            <a class="lw-btn lw-btn--sm" href="{{ $r('area') }}">Cek Area Layanan <svg class="lw-i"><use href="#i-arrow"/></svg></a>
        </div>
    </div>
</article>
