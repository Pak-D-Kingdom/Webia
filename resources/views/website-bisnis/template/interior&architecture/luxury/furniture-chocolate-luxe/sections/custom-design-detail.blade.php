@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
    $c = $f['custom_design'];
@endphp
<section class="lf-section">
    <div class="lf-container">
        <div class="lf-split">
            <figure class="lf-split__media">
                <img src="{{ $a($c['image']) }}" alt="Sketsa desain kursi custom dan sampel material" loading="lazy">
            </figure>
            <div class="lf-options">
                @foreach ($c['options'] as $opt)
                    <article class="lf-option">
                        <span class="lf-option__icon"><svg class="ic"><use href="#i-{{ $opt['icon'] }}"/></svg></span>
                        <div>
                            <h2 class="lf-option__title">{{ $opt['title'] }}</h2>
                            <p>{{ $opt['text'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="lf-flow">
            <h2 class="lf-flow__title lf-serif">Dari ide menjadi furniture</h2>
            <ol class="lf-flow__list">
                @foreach ($c['steps'] as $i => $step)
                    <li><span class="lf-flow__num">{{ $i + 1 }}</span><span>{{ $step }}</span></li>
                @endforeach
            </ol>
            <div class="lf-actions lf-actions--center">
                <a class="lf-btn lf-btn--brown" href="{{ $r('order') }}">Mulai Desain Custom <svg class="ic"><use href="#i-arrow"/></svg></a>
            </div>
        </div>
    </div>
</section>
