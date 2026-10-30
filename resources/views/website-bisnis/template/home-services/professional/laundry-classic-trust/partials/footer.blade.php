<footer class="ft">
    <img class="ft__leaf" src="{{ $img('leaf.svg') }}" alt="" aria-hidden="true" loading="lazy">
    <div class="lw-wrap ft__grid">
        <div class="ft__brand">
            <a class="nb__brand nb__brand--light" href="{{ $url('home') }}">
                <img src="{{ $img($c['brand']['logo']) }}" alt="" width="46" height="46">
                <span><strong>{{ $c['brand']['name'] }}</strong><small>{{ $c['brand']['tagline'] }}</small></span>
            </a>
            <p>{{ $c['hero']['text'] }}</p>
        </div>

        <nav class="ft__col" aria-label="Navigasi footer">
            <h3>Navigasi</h3>
            <ul>
                <li><a href="{{ $url('home') }}">Home</a></li>
                <li><a href="{{ $url('services') }}">Laundry Services</a></li>
                <li><a href="{{ $url('prices') }}">Price List</a></li>
                <li><a href="{{ $url('turnaround') }}">Estimasi Waktu</a></li>
                <li><a href="{{ $url('coverage') }}">Coverage</a></li>
                <li><a href="{{ $url('contact') }}">Contact</a></li>
            </ul>
        </nav>

        <nav class="ft__col" aria-label="Layanan">
            <h3>Layanan</h3>
            <ul>
                @foreach ($c['services'] as $s)
                    <li><a href="{{ $url('services') }}#{{ $s['slug'] }}">{{ $s['name'] }}{{ $s['slug'] === 'bedding' ? ' ' . $s['variant'] : '' }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="ft__col">
            <h3>Kontak Kami</h3>
            <ul class="ft__contact">
                <li><svg class="ic"><use href="#i-pin"/></svg>{{ $c['contact']['address'] }}</li>
                <li><svg class="ic"><use href="#i-phone"/></svg><a href="tel:{{ $c['contact']['phone_tel'] }}">{{ $c['contact']['phone'] }}</a></li>
                <li><svg class="ic"><use href="#i-mail"/></svg><a href="mailto:{{ $c['contact']['email'] }}">{{ $c['contact']['email'] }}</a></li>
            </ul>
        </div>

        <div class="ft__col ft__follow">
            <h3>Ikuti Kami</h3>
            <ul class="ft__social">
                @foreach ($c['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
            <p class="ft__script">{{ $c['brand']['tagline'] }}</p>
        </div>
    </div>

    <div class="ft__credit">
        <div class="lw-wrap"><p>{{ $c['credit'] }}</p></div>
    </div>
</footer>
