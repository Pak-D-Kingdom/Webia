@php $sv = $cafe['services']; @endphp
<section class="kl-services" id="layanan" aria-labelledby="kl-services-title">
    <header class="kl-section-head">
        <div>
            <h2 class="kl-title" id="kl-services-title">{{ $sv['title'] }}</h2>
            <p class="kl-lead">{{ $sv['subtitle'] }}</p>
        </div>
    </header>

    <ul class="kl-services__grid">
        @foreach ($sv['items'] as $item)
            <li class="kl-service">
                <div class="kl-service__media">
                    <img src="{{ $img($item['image']) }}" alt="{{ $item['alt'] }}" width="600" height="375" loading="lazy">
                </div>
                <div class="kl-service__body">
                    <p class="kl-service__tag">{{ $item['type'] }}</p>
                    <h3 class="kl-service__title">{{ $item['title'] }}</h3>
                    <p class="kl-service__text">{{ $item['text'] }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</section>
