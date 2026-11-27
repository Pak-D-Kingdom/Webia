<footer class="footer">
    <div class="wrap">
        <div class="footer-grid">
            <div>
                <a href="{{ $u('') }}" class="logo"><span class="logo-mark"><svg viewBox="0 0 24 24">{!! $dam['icons']['logo'] !!}</svg></span><span>Astra<em>ly</em></span></a>
                <p class="muted mt-4 max-w-sm">{{ $dam['brand']['tagline'] }}. Temukan, pratinjau, dan unduh aset digital premium dengan lisensi yang jelas.</p>
                <div class="social">
                    @foreach (['globe', 'chat', 'mail', 'play'] as $s)
                        <a href="#" aria-label="Sosial media">{{ $ic($s) }}</a>
                    @endforeach
                </div>
            </div>
            <div>
                <h4>Jelajahi</h4>
                <ul>
                    @foreach (collect($dam['categories'])->take(6) as $slug => $c)
                        <li><a href="{{ $u('explore-assets') }}?cat={{ $slug }}">{{ $c['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4>Perusahaan</h4>
                <ul>
                    <li><a href="{{ $u('about-us') }}">Tentang Kami</a></li>
                    <li><a href="{{ $u('blog') }}">Blog</a></li>
                    <li><a href="{{ $u('become-a-creator') }}">Jadi Kreator</a></li>
                    <li><a href="{{ $u('subscription-plans') }}">Langganan</a></li>
                    <li><a href="{{ $u('help-center') }}">Pusat Bantuan</a></li>
                    <li><a href="{{ $u('contact-us') }}">Hubungi Kami</a></li>
                    <li><a href="{{ $u('legal') }}">Legal & Lisensi</a></li>
                </ul>
            </div>
            <div>
                <h4>Kontak</h4>
                <ul>
                    <li class="flex gap-3">{{ $ic('mail', 'ico-sm') }} {{ $dam['brand']['email'] }}</li>
                    <li class="flex gap-3">{{ $ic('phone', 'ico-sm') }} {{ $dam['brand']['phone'] }}</li>
                    <li class="flex gap-3">{{ $ic('pin', 'ico-sm') }} {{ $dam['brand']['address'] }}</li>
                </ul>
                <div class="chip-row mt-5"><span class="chip">{{ $ic('shield', 'ico-sm') }} Pembayaran Aman</span><span class="chip">{{ $ic('lock', 'ico-sm') }} Lisensi Resmi</span></div>
            </div>
        </div>
    </div>
    <div class="credit">{{ $dam['credit'] }}</div>
</footer>
