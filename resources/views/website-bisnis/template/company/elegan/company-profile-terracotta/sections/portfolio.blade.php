@php $p = $c['portfolio']; @endphp
<section id="portofolio" aria-label="{{ $p['title'] }}">
    <ul class="cp-pgrid">
        @foreach ($p['items'] as $i)
            <li class="cp-pitem">
                <div class="cp-thumb cp-ph"><img src="{{ $img($i['img']) }}" alt="{{ $i['t'] }}" loading="lazy" onerror="this.remove()"></div>
                <div class="cp-pitem__body"><strong>{{ $i['t'] }}</strong><small>{{ $i['c'] }}</small></div>
            </li>
        @endforeach
    </ul>
</section>
