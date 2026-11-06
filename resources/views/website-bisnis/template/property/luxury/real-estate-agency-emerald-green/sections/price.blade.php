{{-- ===================== PRICE (halaman detail properti) ===================== --}}
<section class="rea-price-band" id="price" aria-labelledby="price-title" style="--band-img: url('{{ $img('price-bg.jpg') }}')">
    <div class="rea-container rea-price-band__inner">
        <div class="rea-price-band__main">
            <p class="rea-eyebrow">ASKING PRICE</p>
            <h2 id="price-title" class="rea-sr">Price</h2>
            <p class="rea-price-band__value"><small>{{ $property['price_cur'] }}</small> {{ $property['price'] }}</p>
            <p class="rea-price-band__note">{{ $property['price_note'] }}</p>
            <div class="rea-price-band__actions">
                <a class="rea-btn rea-btn--gold" href="#booking">Book a Viewing {{ $icon('arrow') }}</a>
            </div>
        </div>

        <dl class="rea-price-band__facts">
            @foreach ($property['price_rows'] as $row)
                <div><dt>{{ $row['label'] }}</dt><dd>{{ $row['value'] }}</dd></div>
            @endforeach
        </dl>
    </div>
</section>

<section class="rea-section" aria-labelledby="payment-title">
    <div class="rea-container">
        <header class="rea-sec-head">
            <div class="rea-section-head">
                <p class="rea-eyebrow rea-eyebrow--dark">WAYS TO OWN</p>
                <h2 id="payment-title">Payment Options</h2>
                <p>Talk to our team to find the arrangement that suits you best.</p>
            </div>
        </header>
        <ul class="rea-pay">
            @foreach ($payments as $pay)
                <li class="rea-pay__item">
                    <span class="rea-feature__icon">{{ $icon($pay['icon']) }}</span>
                    <h3>{{ $pay['title'] }}</h3>
                    <p>{{ $pay['text'] }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>
