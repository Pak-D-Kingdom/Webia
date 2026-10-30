@php $f = $site['freight']; $optIcons = ['box', 'bolt', 'sparkle', 'cube']; @endphp
<article class="lg-panel lg-freight" data-tabs>
    <div class="lg-freight__body">
        <h2 class="lg-panel__title"><a href="{{ $to('opsi-pengiriman') }}">{{ $f['title'] }}</a></h2>
        <p class="lg-panel__text">{{ $f['text'] }}</p>

        <div class="lg-tabs" role="tablist" aria-label="Moda pengiriman">
            @foreach ($f['tabs'] as $key => $tab)
                <button type="button" role="tab" class="lg-tab {{ $key === $f['default'] ? 'is-active' : '' }}" data-tab="{{ $key }}" aria-selected="{{ $key === $f['default'] ? 'true' : 'false' }}">{{ $tab['label'] }}</button>
            @endforeach
        </div>

        @foreach ($f['tabs'] as $key => $tab)
            <ul class="lg-opts" role="tabpanel" data-panel="{{ $key }}" @if ($key !== $f['default']) hidden @endif>
                @foreach ($tab['options'] as $i => $o)
                    <li>
                        <a href="{{ $to('opsi-pengiriman') }}?tab={{ $key }}#opsi">
                            <span class="lg-opts__ic"><svg class="lg-ic" aria-hidden="true"><use href="#i-{{ $optIcons[$i % 4] }}"></use></svg></span>
                            <span class="lg-opts__name">{{ $o['name'] }}</span>
                            <span class="lg-opts__eta">{{ $o['eta'] }}</span>
                            <svg class="lg-ic lg-opts__chev" aria-hidden="true"><use href="#i-chevron-right"></use></svg>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endforeach

        <a class="lg-btn lg-btn--primary lg-btn--sm" data-tab-link data-base="{{ $to('opsi-pengiriman') }}" href="{{ $to('opsi-pengiriman') }}?tab={{ $f['default'] }}#opsi">{{ $f['link'] }}<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></a>
    </div>
    <img class="lg-freight__img" src="{{ $img($f['image']) }}" alt="Pesawat kargo Energi Cargo" loading="lazy">
</article>
