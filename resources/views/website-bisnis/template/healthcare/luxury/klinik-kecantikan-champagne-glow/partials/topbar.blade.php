{{-- Topbar: alamat, telepon, email, tagline, sosial media --}}
<div class="cg-topbar">
    <div class="cg-container cg-topbar__inner">
        <ul class="cg-topbar__info">
            <li class="cg-topbar__item cg-topbar__item--address">
                <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                <span>{{ $c['contact']['address'] }}</span>
            </li>
            <li class="cg-topbar__item">
                <a href="tel:{{ $c['contact']['phone_raw'] }}">
                    <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                    <span>{{ $c['contact']['phone'] }}</span>
                </a>
            </li>
            <li class="cg-topbar__item cg-topbar__item--email">
                <a href="mailto:{{ $c['contact']['email'] }}">
                    <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                    <span>{{ $c['contact']['email'] }}</span>
                </a>
            </li>
        </ul>

        <p class="cg-topbar__tagline">{{ $c['topbar']['tagline'] }}</p>

        <div class="cg-topbar__social">
            @foreach ($c['social'] as $s)
                <a href="{{ $s['url'] }}" class="cg-icon-btn" aria-label="{{ $s['label'] }}" rel="noopener">
                    <i class="bi {{ $s['icon'] }}" aria-hidden="true"></i>
                </a>
            @endforeach
            <button type="button" class="cg-icon-btn" data-cg-search-open aria-label="Cari di situs">
                <i class="bi bi-search" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>
