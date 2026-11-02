{{-- Topbar: info kontak singkat + sosial media --}}
<div class="rg-topbar" role="complementary" aria-label="Informasi kontak">
    <div class="rg-container rg-topbar__inner">
        <ul class="rg-topbar__list">
            <li><i class="bi bi-telephone" aria-hidden="true"></i><a href="tel:{{ preg_replace('/\s+/', '', $c['contact']['phone']) }}">{{ $c['contact']['phone'] }}</a></li>
            <li class="rg-hide-sm"><i class="bi bi-envelope" aria-hidden="true"></i><a href="mailto:{{ $c['contact']['email'] }}">{{ $c['contact']['email'] }}</a></li>
            <li class="rg-hide-md"><i class="bi bi-clock" aria-hidden="true"></i><span>{{ $c['contact']['hours_short'] }}</span></li>
        </ul>
        <ul class="rg-topbar__social" aria-label="Sosial media">
            @foreach ($c['socials'] as $s)
                <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}"><i class="bi {{ $s['icon'] }}" aria-hidden="true"></i></a></li>
            @endforeach
        </ul>
    </div>
</div>
