@php($s = $cafe['services'])
<section class="lm-section lm-services" id="layanan" aria-labelledby="layanan-title">
    <div class="lm-container">
        <header class="lm-services__head">
            <p class="lm-eyebrow">{{ $s['eyebrow'] }}</p>
            <h2 class="lm-title" id="layanan-title">{{ $s['title'] }}</h2>
            <p class="lm-lead">{{ $s['text'] }}</p>
        </header>

        <ul class="lm-services__grid">
            @foreach ($s['items'] as $it)
                <li class="lm-service">
                    <figure class="lm-media">
                        <img src="{{ $img($it['image']) }}" alt="{{ $it['title'] }}" loading="lazy" width="680" height="514">
                    </figure>
                    <div class="lm-service__body">
                        <h3>{{ $it['title'] }}</h3>
                        <p>{{ $it['text'] }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
