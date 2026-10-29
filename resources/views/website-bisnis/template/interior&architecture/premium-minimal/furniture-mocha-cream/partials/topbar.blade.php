@php $c = $cfg['contact']; @endphp
<div class="fm-topbar">
    <div class="fm-container fm-topbar__in">
        <ul class="fm-topbar__info">
            <li class="fm-topbar__addr"><svg class="fm-i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $c['address'] }}</span></li>
            <li><svg class="fm-i" aria-hidden="true"><use href="#i-clock"/></svg><span>{{ $c['hours'] }}</span></li>
            <li class="fm-topbar__mail"><svg class="fm-i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
        </ul>

        <div class="fm-topbar__actions">
            <button type="button" class="fm-iconbtn" data-fm-search-open aria-label="Cari di WoodenLane">
                <svg class="fm-i" aria-hidden="true"><use href="#i-search"/></svg>
            </button>

            <div class="fm-fav" data-fm-fav>
                <button type="button" class="fm-iconbtn" data-fm-fav-toggle aria-expanded="false" aria-controls="fm-fav-panel" aria-label="Daftar favorit">
                    <svg class="fm-i" aria-hidden="true"><use href="#i-heart"/></svg>
                    <span class="fm-badge" data-fm-fav-count hidden>0</span>
                </button>
                <div class="fm-fav__panel" id="fm-fav-panel" data-fm-fav-panel hidden>
                    <p class="fm-fav__title">Favorit Anda</p>
                    <ul class="fm-fav__list" data-fm-fav-list></ul>
                    <p class="fm-fav__empty" data-fm-fav-empty>Belum ada favorit. Tekan ikon hati pada kartu katalog.</p>
                    <a class="fm-btn fm-btn--dark fm-btn--sm fm-fav__cta" href="{{ $route('quotation') }}" data-fm-fav-quote hidden>Minta Penawaran
                        <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </div>
            </div>

            <a class="fm-btn fm-btn--latte fm-btn--sm fm-topbar__cta" href="https://wa.me/{{ $c['whatsapp'] }}?text={{ rawurlencode($c['whatsapp_greeting']) }}" target="_blank" rel="noopener">
                Hubungi Kami <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg>
            </a>
        </div>
    </div>
</div>
