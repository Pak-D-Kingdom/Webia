<section class="card b-hrs" aria-labelledby="pv-hrs">
    <header class="card__head card__head--ic">
        <span class="round"><svg class="ic"><use href="#i-clock"/></svg></span>
        <h2 id="pv-hrs">Jam Operasional</h2>
    </header>
    <p class="hrs__day">Setiap hari</p>
    <p class="hrs__time">{{ $c['hours']['open'] }} - {{ $c['hours']['close'] }}</p>
    <p class="hrs__note">{{ $c['hours']['note'] }}</p>
    <p class="status" data-open-status><span class="status__dot"></span><span data-open-text>Memeriksa...</span></p>
</section>
