@php
    $stock = (int) ($stock ?? 0);
    [$sc, $si, $st] = $stock <= 0
        ? ['out', 'bi-x-circle', 'Stok Habis']
        : ($stock <= 10 ? ['low', 'bi-exclamation-circle', 'Stok Terbatas · sisa ' . $stock] : ['in', 'bi-check-circle', 'Stok Tersedia']);
@endphp
<span class="stock stock--{{ $sc }}"><i class="bi {{ $si }}"></i>{{ $st }}</span>
