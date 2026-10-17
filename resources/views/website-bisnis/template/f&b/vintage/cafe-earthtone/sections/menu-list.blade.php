@php $m = $cafe['menu']; @endphp
<section class="kl-menu-list" id="daftar-menu" data-kl-menu aria-label="Daftar menu">
    <div class="kl-menu-list__tools">
        <div class="kl-pills" role="group" aria-label="Filter kategori">
            @foreach ($m['categories'] as $slug => $label)
                <button class="kl-pill {{ $loop->first ? 'is-active' : '' }}" type="button" data-kl-filter="{{ $slug }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $label }}</button>
            @endforeach
        </div>

        <div class="kl-menu-list__search">
            <label class="kl-sr" for="kl-menu-q">Cari menu</label>
            <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-search"/></svg>
            <input class="kl-input" id="kl-menu-q" type="search" placeholder="Cari menu…" data-kl-menu-search autocomplete="off">
        </div>
    </div>

    <p class="kl-menu-list__count" data-kl-menu-count aria-live="polite"></p>

    <ul class="kl-dishes">
        @foreach ($m['items'] as $item)
            <li class="kl-dish" data-kl-dish data-category="{{ $item['category'] }}" data-name="{{ $item['name'] }} {{ $item['desc'] }}">
                <div class="kl-dish__media {{ $item['image'] ? '' : 'is-empty' }}">
                    @if ($item['image'])
                        <img src="{{ $img($item['image']) }}" alt="{{ $item['name'] }}" width="276" height="200" loading="lazy">
                    @else
                        <img class="kl-dish__placeholder" src="{{ $img('feature-1.png') }}" alt="" aria-hidden="true" width="114" height="114" loading="lazy">
                    @endif
                </div>
                <div class="kl-dish__body">
                    <p class="kl-dish__cat">{{ $m['categories'][$item['category']] ?? $item['category'] }}</p>
                    <h3 class="kl-dish__name">{{ $item['name'] }}</h3>
                    <p class="kl-dish__desc">{{ $item['desc'] }}</p>
                    <p class="kl-dish__price">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                </div>
            </li>
        @endforeach
    </ul>

    <p class="kl-menu-list__empty" data-kl-menu-empty hidden>Menu yang Anda cari belum ada. Coba kata kunci lain atau pilih kategori Semua.</p>
</section>
