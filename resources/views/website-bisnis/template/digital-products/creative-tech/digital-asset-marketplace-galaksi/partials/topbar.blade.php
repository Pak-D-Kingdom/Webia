<div class="topbar">
    <div class="wrap">
        <div class="promo">
            <span class="badge b-hot">{{ $ic('fire', 'ico-sm') }} Promo</span>
            <span>{{ $dam['topbar']['promo'] }}</span>
        </div>
        <nav aria-label="Tautan cepat">
            @foreach ($dam['topbar']['links'] as $l)
                <a href="{{ $u($l[1]) }}">{{ $l[0] }}</a>
            @endforeach
            <a href="https://wa.me/{{ $dam['whatsapp']['number'] }}" target="_blank" rel="noopener">WhatsApp</a>
        </nav>
    </div>
</div>
