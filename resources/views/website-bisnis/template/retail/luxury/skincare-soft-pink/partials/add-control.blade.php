{{-- Tombol "+ Keranjang" yang berubah jadi stepper jumlah (− 1 +) setelah ditekan.
     Variabel: $p (produk), $mode = 'block' (default) | 'sm' | 'icon'. Disinkronkan oleh skincare.js (renderCart). --}}
@php $mode = $mode ?? 'block'; $out = $p['status'] === 'out'; @endphp
<div class="addctl addctl--{{ $mode }}" data-addctl="{{ $p['id'] }}">
    @if ($mode === 'icon')
        <button class="fav__cart" type="button" data-add="{{ $p['id'] }}" aria-label="Tambah {{ $p['name'] }} ke keranjang" @disabled($out)><i class="bi bi-bag-plus" aria-hidden="true"></i></button>
    @else
        <button class="btn btn--rose {{ $mode === 'sm' ? 'btn--sm' : '' }}" type="button" data-add="{{ $p['id'] }}" @disabled($out)>
            @if ($out) Habis @else <i class="bi bi-plus-lg" aria-hidden="true"></i> Keranjang @endif
        </button>
    @endif
    <div class="stepper" data-stepper hidden role="group" aria-label="Jumlah {{ $p['name'] }}">
        <button type="button" data-cart-dec="{{ $p['id'] }}" aria-label="Kurangi {{ $p['name'] }}"><i class="bi bi-dash-lg" aria-hidden="true"></i></button>
        <span data-step-qty aria-live="polite">1</span>
        <button type="button" data-cart-inc="{{ $p['id'] }}" aria-label="Tambah {{ $p['name'] }}"><i class="bi bi-plus-lg" aria-hidden="true"></i></button>
    </div>
</div>
