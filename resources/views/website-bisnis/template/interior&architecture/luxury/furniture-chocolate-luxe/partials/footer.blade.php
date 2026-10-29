@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
    $ft = $f['footer'];
    $nav = [
        ['home', 'Beranda'], ['catalog', 'Katalog'], ['custom-design', 'Custom Design'],
        ['materials', 'Material & Finishing'], ['dimensions', 'Dimensi Produk'], ['gallery', 'Project Gallery'],
    ];
    $info = [
        ['hero', 'Keunggulan Kami'], ['ai-chat', 'FAQ'], ['lead-time', 'Production Lead Time'],
        ['order', 'Custom Order Form'], ['quotation', 'Quotation Request'],
    ];
    $services = ['Garansi Produk', 'Pengiriman', 'Instalasi', 'After Sales'];
@endphp
<footer class="lf-footer">
    <div class="lf-footer__main">
        <div class="lf-footer__visual" style="background-image:url('{{ $a($ft['image']) }}')" aria-hidden="true">
            <span class="lf-footer__visual-brand"><svg aria-hidden="true"><use href="#i-logo"/></svg>{{ $f['brand']['name'] }}</span>
        </div>

        <div class="lf-container lf-footer__grid">
            <div class="lf-footer__about">
                <h2 class="lf-footer__headline">{{ $ft['headline'] }}</h2>
                <p>{{ $ft['text'] }}</p>
                <a class="lf-brand lf-brand--footer" href="{{ $r('home') }}">
                    <svg class="lf-brand__mark" aria-hidden="true"><use href="#i-logo"/></svg>
                    <span class="lf-brand__text"><strong>{{ $f['brand']['name'] }}</strong><small>{{ $f['brand']['tagline'] }}</small></span>
                </a>
            </div>

            <nav class="lf-footer__col" aria-label="Navigasi footer">
                <h3>Navigasi</h3>
                <ul>@foreach ($nav as [$key, $label])<li><a href="{{ $r($key) }}">{{ $label }}</a></li>@endforeach</ul>
            </nav>

            <nav class="lf-footer__col" aria-label="Informasi">
                <h3>Informasi</h3>
                <ul>@foreach ($info as [$key, $label])<li><a href="{{ $r($key) }}">{{ $label }}</a></li>@endforeach</ul>
            </nav>

            <div class="lf-footer__col">
                <h3>Layanan</h3>
                <ul>@foreach ($services as $service)<li>{{ $service }}</li>@endforeach</ul>
            </div>

            <div class="lf-footer__col lf-footer__follow">
                <h3>Ikuti Kami</h3>
                <ul class="lf-social">
                    @foreach ($ft['social'] as $s)
                        <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener" aria-label="{{ $s['label'] }}"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                    @endforeach
                </ul>
            </div>

            <div class="lf-footer__col lf-footer__news">
                <h3>Dapatkan update terbaru</h3>
                <form class="lf-news" data-news-form novalidate>
                    <label class="lf-sr" for="lf-news-email">Email Anda</label>
                    <input id="lf-news-email" type="email" name="email" placeholder="Masukkan email Anda" autocomplete="email" required>
                    <button type="submit" aria-label="Kirim email"><svg class="ic"><use href="#i-arrow"/></svg></button>
                </form>
                <p class="lf-form-msg" data-news-msg role="status" aria-live="polite"></p>
            </div>
        </div>
    </div>

    <div class="lf-footer__bottom">
        <div class="lf-container">
            <p class="lf-footer__credit">{{ $f['brand']['credit'] }}</p>
        </div>
    </div>
</footer>
