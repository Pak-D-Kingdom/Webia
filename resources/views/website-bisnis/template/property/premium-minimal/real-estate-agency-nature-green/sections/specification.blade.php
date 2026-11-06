@php
    $items = [
        ['area',     'Luas Tanah',     $property['land'].' m²'],
        ['home',     'Luas Bangunan',  $property['building'].' m²'],
        ['bed',      'Kamar Tidur',    $property['beds']],
        ['bath',     'Kamar Mandi',    $property['baths']],
        ['car',      'Carport',        $property['carport'].' Mobil'],
        ['file',     'Sertifikat',     $property['certificate']],
        ['calendar', 'Tahun Dibangun', $property['year']],
        ['bolt',     'Listrik',        $property['power']],
    ];
@endphp
<section class="panel" id="specification" aria-labelledby="h-spec">
    <header class="panel__head">
        <div>
            <h2 id="h-spec" class="panel__title">Spesifikasi Properti</h2>
            <p class="panel__sub">Detail lengkap properti Anda</p>
        </div>
    </header>
    <ul class="spec spec--wide">
        @foreach ($items as [$icon, $label, $value])
            <li class="spec__item">
                <span class="spec__ico"><svg class="i" aria-hidden="true"><use href="#i-{{ $icon }}"/></svg></span>
                <span><small class="spec__lab">{{ $label }}</small><b class="spec__val">{{ $value }}</b></span>
            </li>
        @endforeach
    </ul>
</section>
