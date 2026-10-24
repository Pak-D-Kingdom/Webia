<footer class="footer">
    <div class="container footer__main">
        @include("$v.partials.logo", ['light' => true])
        <nav aria-label="Footer"><ul>
            @foreach (config('cafe.nav') as [$label, $r, $hash])
                <li><a href="{{ route('webia.fnb.minimalis.' . $r) . $hash }}">{{ $label }}</a></li>
            @endforeach
        </ul></nav>
        <div class="social">@include("$v.partials.social")</div>
        <small>© {{ date('Y') }} {{ config('cafe.name') }}. All Rights Reserved.</small>
    </div>
    <div class="footer__credit">© {{ date('Y') }} WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</div>
</footer>
