<section class="ta-hero" style="--ta-hero-img:url('{{ $img('hero.jpg') }}')">
    <div class="ta-hero__media" aria-hidden="true"></div>
    <img class="ta-hero__leaf ta-hero__leaf--tl" src="{{ $img('leaf-tl.png') }}" alt="" aria-hidden="true">
    <svg class="ta-sprig ta-hero__sprig ta-hero__sprig--a" aria-hidden="true"><use href="#ta-sprig"/></svg>
    <svg class="ta-sprig ta-hero__sprig ta-hero__sprig--b" aria-hidden="true"><use href="#ta-sprig"/></svg>

    <div class="ta-container ta-hero__in">
        <div class="ta-hero__copy">
            <p class="ta-eyebrow"><svg class="ta-i" aria-hidden="true"><use href="#i-leaf"/></svg>{{ $cfg['brand']['eyebrow'] }}</p>
            <h1 class="ta-hero__title">
                {{ $cfg['hero']['line_1'] }}
                <span>{!! str_replace(e($cfg['brand']['name']), '<em>' . e($cfg['brand']['name']) . '</em>', e($cfg['hero']['line_2'])) !!}</span>
            </h1>
            <p class="ta-hero__text">{{ $cfg['hero']['text'] }}</p>
        </div>

        <p class="ta-hero__script" aria-hidden="true">{!! implode('<br>', array_map('e', explode(' ', $cfg['hero']['script']))) !!} <svg class="ta-i" aria-hidden="true"><use href="#i-leaf"/></svg></p>

        <a class="ta-hero__badge" href="{{ $r('booking-inquiry') }}">
            <svg class="ta-i" aria-hidden="true"><use href="#ta-logo"/></svg>
            <span>{{ $cfg['hero']['badge'] }}</span>
        </a>

        <form class="ta-search" action="{{ $r('paket-tour') }}" method="get" role="search" aria-label="Cari paket tour">
            <label class="ta-search__field">
                <svg class="ta-i" aria-hidden="true"><use href="#i-search"/></svg>
                <span class="ta-search__body">
                    <small>Destinasi</small>
                    <select name="destinasi" data-ta-select>
                        <option value="">Pilih destinasi</option>
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
                        <input type="date" name="tanggal" min="{{ now()->toDateString() }}" aria-label="Tanggal keberangkatan">
                        <em class="ta-datefield__ph">Pilih tanggal</em>
                        <svg class="ta-i ta-datefield__chev" aria-hidden="true"><use href="#i-chev-down"/></svg>
                    </span>
                </span>
            </label>
            <label class="ta-search__field">
                <svg class="ta-i" aria-hidden="true"><use href="#i-user"/></svg>
                <span class="ta-search__body">
                    <small>Jumlah Peserta</small>
                    <select name="peserta" data-ta-select>
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
    </div>
</section>
