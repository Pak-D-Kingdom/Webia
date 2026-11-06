<div class="topbar">
    <div class="container topbar__inner">
        <p class="topbar__item topbar__item--ship"><i class="bi bi-truck" aria-hidden="true"></i> Gratis Ongkir untuk pembelian min. Rp {{ number_format($cfg['free_shipping_min'], 0, ',', '.') }}</p>
        <p class="topbar__item topbar__item--orig"><i class="bi bi-shield-check" aria-hidden="true"></i> 100% Original Product</p>
        <p class="topbar__item topbar__item--care"><i class="bi bi-telephone" aria-hidden="true"></i> Customer Care: {{ $cfg['contact']['phone_display'] }}</p>

        <div class="topbar__right">
            <ul class="topbar__social" aria-label="Media sosial">
                @foreach ($cfg['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener"><i class="bi {{ $s['icon'] }}" aria-hidden="true"></i></a></li>
                @endforeach
            </ul>
            <span class="topbar__cur">IDR <i class="bi bi-chevron-down" aria-hidden="true"></i></span>
            <a class="topbar__search" href="{{ route($rp . 'catalog') }}?focus=search" aria-label="Cari produk"><i class="bi bi-search" aria-hidden="true"></i></a>
        </div>
    </div>
</div>
