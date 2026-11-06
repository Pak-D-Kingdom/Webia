@php $preview = $preview ?? false; @endphp

@if ($preview)
<div class="ta-pkg" aria-labelledby="pkg-title">
    <div class="ta-pkg__intro">
        <img class="ta-pkg__leaf" src="{{ $img('leaf-pkg.png') }}" alt="" aria-hidden="true" loading="lazy">
        <p class="ta-eyebrow">Paket Tour</p>
        <h2 class="ta-title" id="pkg-title">Paket Tour Unggulan</h2>
        <p class="ta-lead">Pilih paket tour terbaik dengan itinerary yang sudah dirancang khusus untuk pengalaman tak terlupakan.</p>
        <a class="ta-btn ta-btn--outline" href="{{ $r('paket-tour') }}">Lihat Semua Paket <svg class="ta-i ta-i--sm" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
    </div>
    <ul class="ta-pkg__cards">
        @foreach ($cfg['packages'] as $p)
            <li>
                <a class="ta-pcard" href="{{ $r('paket-tour') }}#{{ $p['slug'] }}">
                    <span class="ta-pcard__media">
                        <img src="{{ $img($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy">
                        @if ($p['badge'])<span class="ta-pcard__badge"><svg class="ta-i" aria-hidden="true"><use href="#i-star"/></svg>{{ $p['badge'] }}</span>@endif
                    </span>
                    <span class="ta-pcard__body">
                        <strong class="ta-pcard__name">{{ $p['name'] }}</strong>
                        <small class="ta-pcard__dur">{{ $p['duration'] }}</small>
                        <b class="ta-pcard__price">Rp {{ number_format($p['price'], 0, ',', '.') }}</b>
                        <span class="ta-pcard__fac">
                            <span><svg class="ta-i" aria-hidden="true"><use href="#i-hotel"/></svg>{{ $p['hotel'] }}</span>
                            <span><svg class="ta-i" aria-hidden="true"><use href="#i-bus"/></svg>{{ $p['transport'] }}</span>
                        </span>
                        <span class="ta-pcard__go" aria-hidden="true"><svg class="ta-i" aria-hidden="true"><use href="#i-arrow-right"/></svg></span>
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
@else
<section class="ta-section" aria-label="Daftar paket tour">
    <div class="ta-container">
        <form class="ta-search ta-search--bar" data-ta-pkgfilter action="{{ $r('paket-tour') }}" method="get" role="search" aria-label="Cari paket tour">
            <label class="ta-search__field">
                <svg class="ta-i" aria-hidden="true"><use href="#i-search"/></svg>
                <span class="ta-search__body">
                    <small>Destinasi</small>
                    <select name="destinasi" data-ta-select data-pkg-dest>
                        <option value="">Semua destinasi</option>
                        @foreach ($cfg['search_options'] as $slug => $label)
                            <option value="{{ $slug }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </span>
            </label>
            <label class="ta-search__field">
                <svg class="ta-i" aria-hidden="true"><use href="#i-calendar"/></svg>
                <span class="ta-search__body">
                    <small>Tanggal Keberangkatan</small>
                    <span class="ta-datefield is-empty">
                        <input type="date" name="tanggal" data-pkg-date aria-label="Tanggal keberangkatan">
                        <em class="ta-datefield__ph">Pilih tanggal</em>
                        <svg class="ta-i ta-datefield__chev" aria-hidden="true"><use href="#i-chev-down"/></svg>
                    </span>
                </span>
            </label>
            <label class="ta-search__field">
                <svg class="ta-i" aria-hidden="true"><use href="#i-user"/></svg>
                <span class="ta-search__body">
                    <small>Jumlah Peserta</small>
                    <select name="peserta" data-ta-select data-pkg-pax>
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" @selected($i === 2)>{{ $i }} Orang</option>
                        @endfor
                    </select>
                </span>
            </label>
            <button class="ta-btn ta-btn--primary ta-search__btn" type="submit">
                <svg class="ta-i" aria-hidden="true"><use href="#i-search"/></svg>Cari Paket
                <svg class="ta-i ta-i--sm" aria-hidden="true"><use href="#i-arrow-right"/></svg>
            </button>
        </form>

        <p class="ta-result" data-pkg-result hidden></p>

        <div class="ta-pfull" data-pkg-list>
            @foreach ($cfg['packages'] as $p)
                <article class="ta-pk" id="{{ $p['slug'] }}" data-destination="{{ $p['destination'] }}">
                    <div class="ta-pk__media">
                        <img src="{{ $img($p['image']) }}" alt="{{ $p['name'] }}" loading="lazy">
                        @if ($p['badge'])<span class="ta-pcard__badge"><svg class="ta-i" aria-hidden="true"><use href="#i-star"/></svg>{{ $p['badge'] }}</span>@endif
                        <div class="ta-pk__chips">
                            <span><svg class="ta-i" aria-hidden="true"><use href="#i-clock"/></svg>{{ $p['duration'] }}</span>
                            <span><svg class="ta-i" aria-hidden="true"><use href="#i-hotel"/></svg>{{ $p['hotel'] }}</span>
                            <span><svg class="ta-i" aria-hidden="true"><use href="#i-bus"/></svg>{{ $p['transport'] }}</span>
                        </div>
                    </div>
                    <div class="ta-pk__body">
                        <p class="ta-pk__loc"><svg class="ta-i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $p['destination_name'] }}</p>
                        <h3>{{ $p['name'] }}</h3>
                        <p class="ta-pk__sum">{{ $p['summary'] }}</p>
                        <ul class="ta-pk__inc">
                            @foreach ($p['includes'] as $inc)
                                <li><svg class="ta-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $inc }}</li>
                            @endforeach
                        </ul>
                        <div class="ta-pk__foot">
                            <p class="ta-pk__price"><small>Mulai dari</small><b>Rp {{ number_format($p['price'], 0, ',', '.') }}</b><small>per orang</small></p>
                            <div class="ta-actions">
                                <a class="ta-btn ta-btn--ghost ta-btn--sm" href="{{ $r('itinerary') }}#{{ $p['slug'] }}">Lihat Itinerary</a>
                                <a class="ta-btn ta-btn--primary ta-btn--sm" href="{{ $r('booking-inquiry') }}?paket={{ $p['slug'] }}">Pesan Paket</a>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="ta-empty" data-pkg-empty hidden>
            <p>Belum ada paket terjadwal untuk destinasi ini.</p>
            <a class="ta-btn ta-btn--primary ta-btn--sm" href="{{ $r('booking-inquiry') }}" data-pkg-empty-link>Kirim Inquiry</a>
        </div>
    </div>
</section>
@endif
