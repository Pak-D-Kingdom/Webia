@php $p = $site['process']; @endphp
<article class="lg-proc">
    <h2 class="lg-panel__title"><a href="{{ $to('proses-pengiriman') }}">{{ $p['title'] }}</a></h2>
    <p class="lg-panel__text">{{ $p['text'] }}</p>
    <ol class="lg-proc__steps">
        @foreach ($p['steps'] as $i => $s)
            <li>
                <a href="{{ $to('proses-pengiriman') }}#langkah-{{ $i + 1 }}">
                    <span class="lg-proc__dot">
                        @if ($s['icon'])
                            <svg class="lg-ic" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"></use></svg>
                        @else
                            {{ $i + 1 }}
                        @endif
                    </span>
                    <b>{{ $s['title'] }}</b>
                    @if ($s['note'])<small>{{ $s['note'] }}</small>@endif
                </a>
            </li>
        @endforeach
    </ol>
</article>
