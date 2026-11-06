@php $s = $z['services']; @endphp
<section class="ot-section ot-services" id="layanan" aria-labelledby="ot-services-title">
    <div class="ot-container">
        <header class="ot-section__head">
            <h2 id="ot-services-title">{{ $s['title'] }}</h2>
            <p>{{ $s['subtitle'] }}</p>
        </header>
        <ul class="ot-services__grid">
            @foreach ($s['items'] as $item)
                <li class="ot-service">
                    <span class="ot-service__icon"><svg class="ot-ic" aria-hidden="true"><use href="#i-{{ $item['icon'] }}"/></svg></span>
                    <div>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
