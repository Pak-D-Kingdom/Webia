<article class="lw-card lw-card--steps">
    <header class="lw-card__head lw-card__head--ico">
        <span class="lw-ico lw-ico--lg"><svg class="lw-i"><use href="#i-form"/></svg></span>
        <div>
            <h2 class="lw-card__title">{{ $c['steps']['title'] }}</h2>
            <p>{{ $c['steps']['sub'] }}</p>
        </div>
    </header>
    <ol class="lw-steps-mini">
        @foreach ($c['steps']['items'] as $s)
            <li>
                <span class="lw-ico lw-ico--round"><svg class="lw-i"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                <strong>{{ $loop->iteration }}. {{ $s['name'] }}</strong>
                <small>{{ $s['desc'] }}</small>
            </li>
        @endforeach
    </ol>
    <a class="lw-link" href="{{ $r('cara') }}">Lihat Panduan Lengkap <svg class="lw-i"><use href="#i-arrow"/></svg></a>
</article>
