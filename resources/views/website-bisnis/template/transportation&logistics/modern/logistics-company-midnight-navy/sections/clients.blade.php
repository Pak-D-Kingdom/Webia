@php
    $cl   = $site['clients'];
    $rp   = $site['route_prefix'];
    $img  = fn ($f) => asset($site['paths']['images'] . $f);
    $full = $full ?? false;
@endphp
<div class="lc-block lc-clients{{ $full ? ' lc-clients--full' : '' }}">
    @unless ($full)
        <h2 class="lc-block__title lc-block__title--dark"><a href="{{ route($rp . 'clients') }}">{{ $cl['title'] }}</a></h2>
        <p class="lc-block__sub lc-block__sub--dark">{{ $cl['subtitle'] }}</p>
    @endunless

    <div class="lc-clients__row">
        @unless ($full)
            <button class="lc-clients__nav" type="button" data-lc-scroll-prev aria-label="Klien sebelumnya">
                <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-chev-l"></use></svg>
            </button>
        @endunless
        <ul class="lc-clients__track" data-lc-scroller>
            @foreach ($cl['items'] as $c)
                <li class="lc-client">
                    <img src="{{ $img($c['image']) }}" alt="{{ $c['name'] }}" loading="lazy">
                </li>
            @endforeach
        </ul>
        @unless ($full)
            <button class="lc-clients__nav" type="button" data-lc-scroll-next aria-label="Klien berikutnya">
                <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-chev-r"></use></svg>
            </button>
        @endunless
    </div>
</div>
