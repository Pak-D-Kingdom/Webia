{{-- ===================== 2. INFORMASI UTAMA & HARGA ===================== --}}
@php $t = $detailCfg['titles']['overview']; @endphp
<section class="rea-panel" id="overview" aria-labelledby="overview-title">
    <header class="rea-panel__head">
        <div>
            <p class="rea-eyebrow rea-eyebrow--dark">{{ strtoupper($property['badge']) }}</p>
            <h2 id="overview-title">{{ $t['title'] }}</h2>
            <p class="rea-panel__place">{{ $icon('pin') }}<span>{{ $property['place'] }}</span></p>
        </div>
    </header>

    <ul class="rea-tiles">
        @foreach ($property['tiles'] as $tile)
            <li>
                <span class="rea-tiles__icon">{{ $icon($tile['icon']) }}</span>
                <strong>{{ $tile['value'] }}</strong>
                <span>{{ $tile['label'] }}</span>
            </li>
        @endforeach
    </ul>

    <div class="rea-pricebox" style="--band-img: url('{{ $img('price-bg.jpg') }}')">
        <div class="rea-pricebox__main">
            <p class="rea-eyebrow">ASKING PRICE</p>
            <p class="rea-pricebox__value"><small>{{ $property['price_cur'] }}</small> {{ $property['price'] }}</p>
            <p class="rea-pricebox__note">{{ $property['price_note'] }}</p>
            <div class="rea-pricebox__actions">
                <a class="rea-btn rea-btn--gold" href="{{ $route('booking') }}">Book a Viewing {{ $icon('arrow') }}</a>
                <a class="rea-btn rea-btn--ghost" href="{{ $waUrl }}" target="_blank" rel="noopener">{{ $icon('whatsapp', 'rea-icon--fill') }} WhatsApp</a>
            </div>
        </div>
        <dl class="rea-pricebox__facts">
            @foreach (array_slice($property['price_rows'], 1) as $row)
                <div><dt>{{ $row['label'] }}</dt><dd>{{ $row['value'] }}</dd></div>
            @endforeach
        </dl>
    </div>

    <div class="rea-pay2">
        <h3>Ways to own</h3>
        <ul>
            @foreach ($payments as $pay)
                <li>{{ $icon($pay['icon']) }}<div><strong>{{ $pay['title'] }}</strong><span>{{ $pay['text'] }}</span></div></li>
            @endforeach
        </ul>
    </div>
</section>
