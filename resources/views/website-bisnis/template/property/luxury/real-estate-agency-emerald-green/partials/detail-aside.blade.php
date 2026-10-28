{{-- ===================== KARTU SAMPING (sticky, desktop) ===================== --}}
<div class="rea-sidecard">
    <p class="rea-eyebrow">ASKING PRICE</p>
    <p class="rea-sidecard__price"><small>{{ $property['price_cur'] }}</small> {{ $property['price'] }}</p>
    <p class="rea-sidecard__note">{{ $property['price_note'] }}</p>

    <ul class="rea-sidecard__facts">
        @foreach ($property['highlights'] as $h)
            <li>{{ $icon($h['icon']) }}<span>{{ $h['label'] }}</span></li>
        @endforeach
    </ul>

    <a class="rea-btn rea-btn--gold rea-btn--block" href="{{ $route('booking') }}">Book a Viewing {{ $icon('arrow') }}</a>
    <a class="rea-btn rea-btn--ghost rea-btn--block" href="{{ $waUrl }}" target="_blank" rel="noopener">{{ $icon('whatsapp', 'rea-icon--fill') }} Chat on WhatsApp</a>

    <ul class="rea-sidecard__contact">
        <li>{{ $icon('clock') }}<span>{{ $site['hours'] }}</span></li>
        <li>{{ $icon('pin') }}<span>{{ $property['place'] }}</span></li>
    </ul>
</div>
