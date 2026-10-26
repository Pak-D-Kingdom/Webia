<ul class="services">
    @foreach ($skin['services'] as $s)
        <li>
            <span class="services__ic"><i class="bi {{ $s['icon'] }}"></i></span>
            <span><b>{{ $s['title'] }}</b><small>{{ $s['text'] }}</small></span>
        </li>
    @endforeach
</ul>
