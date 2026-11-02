<section class="ta-section" aria-label="Harga paket">
    <div class="ta-container">
        <p class="ta-notice"><svg class="ta-i" aria-hidden="true"><use href="#i-tag"/></svg>{{ $cfg['prices']['note'] }}</p>

        <div class="ta-tiers">
            @foreach ($cfg['prices']['tiers'] as $t)
                <article class="ta-tier {{ $t['highlight'] ? 'is-featured' : '' }}">
                    @if ($t['highlight'])<span class="ta-tier__flag">Paling diminati</span>@endif
                    <h2>{{ $t['label'] }}</h2>
                    <p class="ta-tier__dur">{{ $t['duration'] }}</p>
                    <p class="ta-tier__price"><small>Mulai dari</small><b>Rp {{ number_format($t['price'], 0, ',', '.') }}</b><small>/ orang</small></p>
                    <p class="ta-tier__for">{{ $t['for'] }}</p>
                    <ul class="ta-checklist">
                        @foreach ($cfg['prices']['included'] as $inc)
                            <li><svg class="ta-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $inc }}</li>
                        @endforeach
                    </ul>
                    <a class="ta-btn {{ $t['highlight'] ? 'ta-btn--primary' : 'ta-btn--outline' }} ta-btn--block" href="{{ $r('booking-inquiry') }}?durasi={{ $t['code'] }}">Tanya Paket Ini</a>
                </article>
            @endforeach
        </div>

        <div class="ta-pricetable-wrap">
            <h2 class="ta-subtitle">Harga per Paket Tour</h2>
            <div class="ta-tablewrap">
                <table class="ta-table">
                    <thead>
                        <tr><th scope="col">Paket</th><th scope="col">Destinasi</th><th scope="col">Durasi</th><th scope="col" class="is-num">Harga / orang</th><th scope="col"><span class="ta-sr">Aksi</span></th></tr>
                    </thead>
                    <tbody>
                        @foreach ($cfg['packages'] as $p)
                            <tr>
                                <th scope="row" data-label="Paket">{{ $p['name'] }}</th>
                                <td data-label="Destinasi">{{ $p['destination_name'] }}</td>
                                <td data-label="Durasi">{{ $p['duration'] }}</td>
                                <td data-label="Harga / orang" class="is-num"><b>Rp {{ number_format($p['price'], 0, ',', '.') }}</b></td>
                                <td><a class="ta-btn ta-btn--primary ta-btn--sm" href="{{ $r('booking-inquiry') }}?paket={{ $p['slug'] }}">Pesan</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="ta-incl">
            <div class="ta-card">
                <h3><svg class="ta-i" aria-hidden="true"><use href="#i-check-circle"/></svg>Sudah termasuk</h3>
                <ul class="ta-checklist">@foreach ($cfg['prices']['included'] as $inc)<li><svg class="ta-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $inc }}</li>@endforeach</ul>
            </div>
            <div class="ta-card">
                <h3><svg class="ta-i" aria-hidden="true"><use href="#i-x"/></svg>Belum termasuk</h3>
                <ul class="ta-checklist ta-checklist--muted">@foreach ($cfg['prices']['excluded'] as $exc)<li><svg class="ta-i" aria-hidden="true"><use href="#i-x"/></svg>{{ $exc }}</li>@endforeach</ul>
                <p class="ta-promo"><svg class="ta-i" aria-hidden="true"><use href="#i-leaf"/></svg>{{ $cfg['prices']['promo'] }}</p>
            </div>
        </div>
    </div>
</section>
