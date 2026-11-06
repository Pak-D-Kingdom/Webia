{{-- LAYANAN --}}
<section class="cp-services" id="layanan" aria-labelledby="cp-services-title">
    <div class="cp-container">
        <div class="cp-head">
            <div>
                <h2 class="cp-title" id="cp-services-title">Layanan</h2>
                <p class="cp-subtitle">Solusi Lengkap untuk Kebutuhan Anda</p>
            </div>
        </div>

        <ul class="cp-services__grid">
            @foreach ($services as $service)
                <li class="cp-service">
                    <span class="cp-service__icon">{!! $icon($service['icon']) !!}</span>
                    <div>
                        <h3 class="cp-service__title">{{ $service['title'] }}</h3>
                        <p class="cp-service__desc">{{ $service['desc'] }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
