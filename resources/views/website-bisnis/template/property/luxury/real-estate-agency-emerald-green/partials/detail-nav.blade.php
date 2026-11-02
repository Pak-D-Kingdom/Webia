{{-- ===================== MENU CEPAT HALAMAN DETAIL (sticky) ===================== --}}
<nav class="rea-detailnav" aria-label="Sections of this property" data-detailnav>
    <div class="rea-container">
        <ul>
            @foreach ($detailCfg['nav'] as $item)
                <li><a href="#{{ $item['id'] }}">{{ $item['label'] }}</a></li>
            @endforeach
        </ul>
    </div>
</nav>
