<section class="eo-sec">
    <div class="eo-container">
        @include($eo['view'].'partials.section-head', ['heading' => 'Dipercaya oleh brand ternama', 'sub' => 'Perusahaan lintas industri mempercayakan acara pentingnya kepada tim Eventora.'])

        <ul class="eo-stats" data-reveal>
            @foreach($eo['stats'] as $stat)
            <li>
                <strong><span data-eo-count="{{ $stat['value'] }}">{{ $stat['value'] }}</span>{{ $stat['suffix'] }}</strong>
                <span>{{ $stat['label'] }}</span>
            </li>
            @endforeach
        </ul>

        <ul class="eo-logos">
            @foreach($eo['clients'] as $client)
            <li class="eo-logo" data-reveal>
                <span class="eo-logo__img"><img src="{{ asset($eo['assets']['img']) }}/{{ $client['logo'] }}" alt="{{ $client['name'] }}" height="46" loading="lazy"></span>
                <span class="eo-logo__name">{{ $client['name'] }}</span>
                <span class="eo-logo__sector">{{ $client['sector'] }}</span>
            </li>
            @endforeach
        </ul>
        <p class="eo-note">Logo merek ditampilkan sebagai referensi tampilan. Gunakan aset logo resmi dari masing-masing klien sebelum dipublikasikan.</p>
    </div>
</section>
