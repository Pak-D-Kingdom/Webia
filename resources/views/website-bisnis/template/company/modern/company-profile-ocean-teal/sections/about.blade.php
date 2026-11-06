@php $a = $z['about']; @endphp
<section class="ot-section ot-about" id="tentang-kami" aria-labelledby="ot-about-title">
    <div class="ot-container">
        <div class="ot-about__top">
            <div class="ot-about__text">
                <p class="ot-pill">{{ $a['label'] }}</p>
                <h2 id="ot-about-title">{{ $a['label'] }} <span>{{ $a['name'] }}</span></h2>
                @foreach ($a['paragraphs'] as $p)<p>{{ $p }}</p>@endforeach
                <a class="ot-btn ot-btn--primary" href="{{ $url('home', 'layanan') }}">Lihat Layanan Kami<svg class="ot-ic" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
            </div>
            <figure class="ot-about__media">
                <img src="{{ $img($a['image']) }}" alt="{{ $a['image_alt'] }}" width="861" height="510" loading="lazy" decoding="async">
                <button class="ot-play" type="button" data-open="video" data-video="{{ $a['video_url'] }}" aria-label="{{ $a['video_caption'][0] }}">
                    <svg class="ot-ic" aria-hidden="true"><use href="#i-play"/></svg>
                </button>
                <figcaption><strong>{{ $a['video_caption'][0] }}</strong><small>{{ $a['video_caption'][1] }}</small></figcaption>
            </figure>
        </div>

        <div class="ot-about__vm">
            <article class="ot-card">
                <span class="ot-service__icon"><svg class="ot-ic" aria-hidden="true"><use href="#i-eye"/></svg></span>
                <h3>Visi</h3><p>{{ $a['vision'] }}</p>
            </article>
            <article class="ot-card">
                <span class="ot-service__icon"><svg class="ot-ic" aria-hidden="true"><use href="#i-target"/></svg></span>
                <h3>Misi</h3>
                <ul class="ot-checks">
                    @foreach ($a['mission'] as $m)<li><svg class="ot-ic" aria-hidden="true"><use href="#i-check"/></svg>{{ $m }}</li>@endforeach
                </ul>
            </article>
        </div>

        <ul class="ot-about__values">
            @foreach ($a['values'] as $v)
                <li class="ot-service">
                    <span class="ot-service__icon"><svg class="ot-ic" aria-hidden="true"><use href="#i-{{ $v['icon'] }}"/></svg></span>
                    <div><h3>{{ $v['title'] }}</h3><p>{{ $v['text'] }}</p></div>
                </li>
            @endforeach
        </ul>

        <ul class="ot-stats ot-stats--band">
            @foreach ($z['hero']['stats'] as $s)
                <li>
                    <span class="ot-stats__icon"><svg class="ot-ic" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                    <span><strong>{{ $s['value'] }}</strong><small>{{ $s['label'] }}</small></span>
                </li>
            @endforeach
        </ul>
    </div>
</section>
