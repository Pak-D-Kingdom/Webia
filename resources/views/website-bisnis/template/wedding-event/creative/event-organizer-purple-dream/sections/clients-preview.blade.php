<section class="eo-clients" aria-labelledby="eo-clients-title">
    <img class="eo-clients__flora eo-clients__flora--l" src="{{ asset($eo['assets']['img']) }}/flora-hero.svg" alt="" aria-hidden="true" loading="lazy">
    <img class="eo-clients__flora eo-clients__flora--r" src="{{ asset($eo['assets']['img']) }}/flora-peach.svg" alt="" aria-hidden="true" loading="lazy">
    <div class="eo-container eo-clients__row">
        <h2 class="eo-clients__title" id="eo-clients-title">Trusted by<br>Our Clients</h2>
        <div class="eo-marquee" data-eo-marquee>
            <ul class="eo-marquee__track">
                @foreach($eo['clients'] as $client)
                <li><img src="{{ asset($eo['assets']['img']) }}/{{ $client['logo'] }}" alt="{{ $client['name'] }}" height="40" loading="lazy"></li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
