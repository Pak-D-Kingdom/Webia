@php $f = $site['fleet']; @endphp
<article class="lg-panel lg-fleet">
    <h2 class="lg-panel__title"><a href="{{ $to('armada-gudang') }}">{{ $f['title'] }}</a></h2>
    <p class="lg-panel__text">{{ $f['text'] }}</p>
    <div class="lg-fleet__mosaic">
        @foreach ($f['gallery'] as $g)
            <a href="{{ $to('armada-gudang') }}" aria-label="{{ $g['caption'] }}">
                <img src="{{ $img($g['image']) }}" alt="{{ $g['caption'] }}" loading="lazy">
            </a>
        @endforeach
    </div>
    <ul class="lg-fleet__list">
        @foreach ($f['items'] as $item)
            <li>
                <a href="{{ $to('armada-gudang') }}#{{ \Illuminate\Support\Str::slug($item['line1'].' '.$item['line2']) }}">
                    <svg class="lg-ic" aria-hidden="true"><use href="#i-{{ $item['icon'] }}"></use></svg>
                    <span>{{ $item['line1'] }}<small>{{ $item['line2'] }}</small></span>
                </a>
            </li>
        @endforeach
    </ul>
</article>
