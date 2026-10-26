<div class="topbar">
    <div class="container topbar__in">
        <ul class="topbar__info">
            @foreach ($skin['topbar']['info'] as $i)
                <li><i class="bi {{ $i['icon'] }}" aria-hidden="true"></i><span>{{ $i['text'] }}</span></li>
            @endforeach
        </ul>
        <ul class="topbar__social">
            @foreach ($skin['social'] as $s)
                <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener" aria-label="{{ $s['label'] }}"><i class="bi {{ $s['icon'] }}"></i></a></li>
            @endforeach
        </ul>
    </div>
</div>
