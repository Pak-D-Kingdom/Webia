<footer class="footer">
    <div class="container footer__grid">
        <div class="footer__brand">
            <a class="brand" href="{{ route('skincare-warm-neutral.home') }}">
                <img class="brand__leaf" src="{{ asset($skin['img'] . '/logo-leaf.png') }}" alt="" width="44" height="42">
                <span class="brand__txt"><b>{{ $skin['name'] }}</b><small>{{ $skin['tagline'] }}</small></span>
            </a>
        </div>

        <div class="footer__col">
            <h4>Navigasi</h4>
            <ul>
                <li><a href="{{ route('skincare-warm-neutral.home') }}">Beranda</a></li>
                <li><a href="{{ route('skincare-warm-neutral.catalog') }}">Katalog</a></li>
                <li><a href="{{ route('skincare-warm-neutral.price') }}">Harga</a></li>
                <li><a href="{{ route('skincare-warm-neutral.stock') }}">Ketersediaan</a></li>
                <li><a href="{{ route('skincare-warm-neutral.inquiry') }}">Inquiry</a></li>
            </ul>
        </div>

        <div class="footer__col">
            <h4>Kategori</h4>
            <ul>
                @foreach (array_slice($skin['categories'], 1, 5) as $c)
                    <li><a href="{{ route('skincare-warm-neutral.catalog') }}?kategori={{ $c['slug'] }}">{{ $c['label'] }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="footer__col footer__contact">
            <h4>Kontak Kami</h4>
            <ul>
                <li><i class="bi bi-geo-alt-fill"></i><span>{{ $skin['contact']['address'] }}</span></li>
                <li><i class="bi bi-telephone-fill"></i><a href="tel:{{ preg_replace('/\s+/', '', $skin['contact']['phone']) }}">{{ $skin['contact']['phone'] }}</a></li>
                <li><i class="bi bi-envelope-fill"></i><a href="mailto:{{ $skin['contact']['email'] }}">{{ $skin['contact']['email'] }}</a></li>
            </ul>
        </div>

        <div class="footer__col">
            <h4>Ikuti Kami</h4>
            <div class="footer__social">
                @foreach ($skin['social'] as $s)
                    <a href="{{ $s['url'] }}" target="_blank" rel="noopener" aria-label="{{ $s['label'] }}"><i class="bi {{ $s['icon'] }}"></i></a>
                @endforeach
            </div>
        </div>

        <div class="footer__col footer__news">
            <h4>Dapatkan Update Terbaru</h4>
            <form class="news" data-wa-form data-wa-title="Halo {{ $skin['name'] }}, saya ingin mendapatkan update terbaru." novalidate>
                <input type="email" name="email" data-label="Email" placeholder="Masukkan email kamu..." aria-label="Email" required>
                <button type="submit" aria-label="Kirim"><i class="bi bi-send"></i></button>
            </form>
            <p class="form-msg" data-form-msg hidden></p>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container footer__bottom-in">
            <p>{{ $skin['footer']['credit'] }}</p>
        </div>
    </div>
</footer>
