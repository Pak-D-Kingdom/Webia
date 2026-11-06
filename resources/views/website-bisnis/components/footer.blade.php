<footer class="webia-footer">
    <div class="webia-footer-container">

        <div class="webia-footer-main">
            <a href="{{ route('home') }}" class="webia-footer-brand">
                <span class="webia-brand-mark">W</span>
                <span>
                    <strong>WEBIA</strong>
                    <small>by D-KREASI</small>
                </span>
            </a>

            <p class="webia-footer-description">
                Solusi pembuatan website bisnis untuk membantu brand,
                UMKM, dan perusahaan membangun kehadiran digital.
            </p>
        </div>

        <div class="webia-footer-links">
            <h3>Layanan</h3>
            <a href="{{ route('home') }}#paket-website">
                Paket Website
            </a>
            <a href="{{ route('home') }}#keunggulan-website">
                Keunggulan
            </a>
            <a href="{{ route('home') }}#faq-website">
                Pertanyaan Umum
            </a>
            <a href="{{ route('home') }}#kategori-website">
                Kategori Bisnis
            </a>

            <a href="{{ route('home') }}#koleksi-template">
                Galeri Template
            </a>
            <a href="{{ config('webia.dkreasi_url') ?: '#' }}"
                @if (config('webia.dkreasi_url')) target="_blank" rel="noopener noreferrer" @endif>
                Jelajahi D-KREASI Homebase ↗
            </a>
        </div>

        <div class="webia-footer-links">
            <h3>Informasi</h3>
            <a href="{{ config('webia.dkreasi_url') ?: '#' }}"
                @if (config('webia.dkreasi_url')) target="_blank" rel="noopener noreferrer" @endif>
                D-KREASI Homebase
            </a>
        </div>

    </div>

    <div class="webia-footer-bottom">
        <p>
            &copy; {{ date('Y') }} WEBIA by D-KREASI.
            Seluruh hak cipta dilindungi.
        </p>
    </div>
</footer>
