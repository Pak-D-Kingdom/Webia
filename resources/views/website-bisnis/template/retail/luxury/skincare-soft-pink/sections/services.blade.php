<section class="services" aria-label="Layanan Belleza">
    <div class="container">
        <ul class="services__list">
            @foreach ($cfg['services'] as $s)
                <li><i class="bi {{ $s['icon'] }}" aria-hidden="true"></i><span><strong>{{ $s['title'] }}</strong>{{ $s['sub'] }}</span></li>
            @endforeach
        </ul>
    </div>
</section>
