
<header class="site-header" id="siteHeader">
    <div class="container nav-wrapper">
        <a href="{{ url('/templates/ruby-luxe') }}" class="brand">
            <span class="brand-mark">R</span>
            <span class="brand-copy">
                <strong>RUBY LUXE</strong>
                <small>ORGANIC BEAUTY</small>
            </span>
        </a>

        <button class="menu-toggle"
                id="menuToggle"
                type="button"
                aria-label="Buka navigasi"
                aria-expanded="false"
                aria-controls="mainNav">
            <span></span><span></span><span></span>
        </button>

        <nav class="main-nav" id="mainNav">
            <a href="{{ url('/templates/ruby-luxe') }}">Home</a>
            <a href="{{ url('/templates/ruby-luxe/treatments') }}">Treatments</a>
            <a href="{{ url('/templates/ruby-luxe/products') }}">Skincare</a>
            <a href="{{ url('/templates/ruby-luxe/journal') }}">Journal</a>
            <a href="{{ url('/templates/ruby-luxe/about') }}">Our Story</a>
            <a href="{{ url('/templates/ruby-luxe/contact') }}">Contact</a>
            <a href="{{ url('/templates/ruby-luxe/login') }}"
                class="button button-login nav-login">
                    Login <span>↗</span>
                </a>
            <a href="{{ url('/templates/ruby-luxe/booking') }}"
               class="button button-primary nav-booking">
                Book Appointment <span>↗</span>
            </a>
        </nav>
    </div>

</header>
