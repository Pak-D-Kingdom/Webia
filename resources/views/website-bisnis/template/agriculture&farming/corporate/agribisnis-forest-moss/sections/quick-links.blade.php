<section class="quick" aria-label="Menu cepat">
    <img class="deco deco--leaf-l" src="{{ asset($cfg['img']['leaf']) }}" alt="" aria-hidden="true">
    <img class="deco deco--leaf-r" src="{{ asset($cfg['img']['leaf']) }}" alt="" aria-hidden="true">
    <div class="container">
        <ul class="quick__grid">
            @foreach($cfg['quick'] as $q)
                <li>
                    <a class="quick__card" href="{{ route($q['route']) }}">
                        <span class="quick__ic"><svg class="ic" aria-hidden="true"><use href="#i-{{ $q['icon'] }}"/></svg></span>
                        <span class="quick__tx"><b>{{ $q['title'] }}</b><small>{{ $q['text'] }}</small></span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
