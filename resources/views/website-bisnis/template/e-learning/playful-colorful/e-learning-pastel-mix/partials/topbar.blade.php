{{-- Topbar: alamat, email, jam operasional, sosial media, telepon --}}
<div class="topbar">
    <div class="container topbar__in">
        <ul class="topbar__info">
            <li class="topbar__item topbar__item--addr"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i><span>{{ $t['contact']['address'] }}</span></li>
            <li class="topbar__item topbar__item--mail"><i class="bi bi-envelope-fill" aria-hidden="true"></i><a href="mailto:{{ $t['contact']['email'] }}">{{ $t['contact']['email'] }}</a></li>
            <li class="topbar__item"><i class="bi bi-clock-fill" aria-hidden="true"></i><span>{{ $t['contact']['hours'] }}</span></li>
        </ul>
        <div class="topbar__side">
            <ul class="social" aria-label="Sosial media">
                @foreach ($t['socials'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener"><i class="bi {{ $s['icon'] }}" aria-hidden="true"></i></a></li>
                @endforeach
            </ul>
            <a class="topbar__phone" href="tel:{{ $t['contact']['phone_e164'] }}"><i class="bi bi-telephone-fill" aria-hidden="true"></i>{{ $t['contact']['phone'] }}</a>
        </div>
    </div>
</div>
