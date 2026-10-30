<article class="lw-card lw-card--hours" data-lw-hours data-open="{{ $c['hours']['open'] }}" data-close="{{ $c['hours']['close'] }}">
    <header class="lw-card__head lw-card__head--ico">
        <span class="lw-ico lw-ico--lg"><svg class="lw-i"><use href="#i-calendar"/></svg></span>
        <h2 class="lw-card__title lw-card__title--sm">{{ $c['hours']['title'] }}</h2>
    </header>
    <p class="lw-hours-day">{{ $c['hours']['label'] }}</p>
    <p class="lw-hours-time">{{ $c['hours']['time'] }}</p>
    <p class="lw-status" data-lw-status aria-live="polite"><span class="lw-status__dot"></span><span data-lw-status-text>Memeriksa status…</span></p>
    <p class="lw-hours-note">{{ $c['hours']['note'] }}</p>
</article>
