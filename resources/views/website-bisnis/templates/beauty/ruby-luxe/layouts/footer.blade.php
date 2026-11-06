
<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            <a href="{{ url('/templates/ruby-luxe') }}" class="brand brand-light">
                <span class="brand-mark">R</span>
                <span class="brand-copy">
                    <strong>RUBY LUXE</strong>
                    <small>ORGANIC BEAUTY</small>
                </span>
            </a>

            <p>
                Thoughtful beauty rituals inspired by nature,
                designed around your individual skincare journey.
            </p>
        </div>

        <div>
            <h3>Explore</h3>
            <a href="{{ url('/templates/ruby-luxe/treatments') }}">Treatments</a>
            <a href="{{ url('/templates/ruby-luxe/products') }}">Skincare Shop</a>
            <a href="{{ url('/templates/ruby-luxe/journal') }}">Beauty Journal</a>
        </div>

        <div>
            <h3>Information</h3>
            <a href="{{ url('/templates/ruby-luxe/about') }}">About Us</a>
            <a href="{{ url('/templates/ruby-luxe/team') }}">Our Team</a>
            <a href="{{ url('/templates/ruby-luxe/faq') }}">FAQs</a>
            <a href="{{ url('/templates/ruby-luxe/contact') }}">Contact</a>
        </div>

        <div>
            <h3>Visit Us</h3>
            <p>Alamat klinik dapat diatur sesuai kebutuhan bisnis.</p>
            <p>Senin–Sabtu · Jam operasional sesuai pengaturan.</p>
            <a href="{{ url('/templates/ruby-luxe/booking') }}"
               class="footer-cta">Schedule a Visit ↗</a>
        </div>
    </div>

    <div class="container footer-bottom">
        <span>© {{ date('Y') }} Ruby Luxe Organic Beauty.</span>
        <span>Beauty, thoughtfully reimagined.</span>
    </div>
</footer>
