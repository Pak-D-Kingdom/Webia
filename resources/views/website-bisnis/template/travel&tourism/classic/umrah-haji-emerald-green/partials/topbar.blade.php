<div class="uh-topbar">
    <div class="uh-container uh-topbar__inner">
        <ul class="uh-topbar__info">
            <li>
                <svg class="uh-i" aria-hidden="true"><use href="#i-pin"/></svg>
                <span>{{ $uh['brand']['address'] }}</span>
            </li>
            <li class="uh-topbar__hours">
                <svg class="uh-i" aria-hidden="true"><use href="#i-clock"/></svg>
                <span>{{ $uh['brand']['hours'] }}</span>
            </li>
            <li class="uh-topbar__mail">
                <a href="mailto:{{ $uh['brand']['email'] }}">
                    <svg class="uh-i" aria-hidden="true"><use href="#i-mail"/></svg>
                    <span>{{ $uh['brand']['email'] }}</span>
                </a>
            </li>
        </ul>

        <div class="uh-topbar__side">
            <ul class="uh-topbar__social" aria-label="Media sosial">
                @foreach ($uh['social'] as $s)
                    <li>
                        <a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['name'] }}">
                            <svg class="uh-i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg>
                        </a>
                    </li>
                @endforeach
            </ul>
            <span class="uh-topbar__sep" aria-hidden="true"></span>
            <div class="uh-lang" data-uh-lang>
                <button type="button" class="uh-lang__btn" aria-haspopup="true" aria-expanded="false" aria-label="Pilih bahasa">
                    <span>ID</span>
                    <svg class="uh-i" aria-hidden="true"><use href="#i-chevron-down"/></svg>
                </button>
                <ul class="uh-lang__menu" hidden>
                    <li><button type="button" class="is-active" aria-current="true">ID · Bahasa Indonesia</button></li>
                    <li><button type="button" disabled>EN · Segera hadir</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>
