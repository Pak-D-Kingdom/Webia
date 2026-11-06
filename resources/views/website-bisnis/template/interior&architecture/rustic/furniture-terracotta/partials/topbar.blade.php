<div class="rf-topbar">
    <div class="rf-container rf-topbar__in">
        <ul class="rf-topbar__info">
            <li class="rf-topbar__addr">{!! $icon('pin') !!}<span>{{ $f['contact']['address'] }}</span></li>
            <li><a href="tel:{{ $f['contact']['phone_raw'] }}">{!! $icon('phone') !!}<span>{{ $f['contact']['phone'] }}</span></a></li>
            <li class="rf-topbar__mail"><a href="mailto:{{ $f['contact']['email'] }}">{!! $icon('mail') !!}<span>{{ $f['contact']['email'] }}</span></a></li>
        </ul>
        <div class="rf-topbar__tools">
            <a class="rf-iconbtn" href="{{ $r('catalog') }}?focus=search" aria-label="Cari produk">{!! $icon('search') !!}</a>
            <a class="rf-iconbtn" href="{{ $r('catalog') }}?fav=1" aria-label="Produk favorit">{!! $icon('heart') !!}<span class="rf-badge" data-rf-wish-count hidden>0</span></a>
            <a class="rf-iconbtn" href="{{ $r('quotation') }}" aria-label="Daftar penawaran">{!! $icon('cart') !!}<span class="rf-badge" data-rf-quote-count hidden>0</span></a>
            <a class="rf-pill" href="{{ $wa }}" target="_blank" rel="noopener">Hubungi Kami {!! $icon('arrow-right') !!}</a>
        </div>
    </div>
</div>
