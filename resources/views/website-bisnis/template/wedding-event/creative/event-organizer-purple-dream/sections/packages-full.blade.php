<section class="eo-sec">
    <div class="eo-container">
        @include($eo['view'].'partials.section-head', ['heading' => 'Paket event private & corporate', 'sub' => 'Pilih paket yang paling sesuai. Setiap paket dapat disesuaikan dengan konsep, jumlah tamu, dan anggaran Anda.'])

        <div class="eo-switch" data-eo-pkgswitch role="tablist" aria-label="Jenis paket">
            <button type="button" role="tab" class="is-active" data-type="private" aria-selected="true">Private Event</button>
            <button type="button" role="tab" data-type="corporate" aria-selected="false">Corporate Event</button>
            <span class="eo-switch__thumb" aria-hidden="true"></span>
        </div>

        @foreach($eo['packages'] as $type => $list)
        <div class="eo-pkgset @if($type === 'private') is-active @endif" data-pkgset="{{ $type }}" role="tabpanel">
            <div class="eo-pkgfull">
                @foreach($list as $pkg)
                <article class="eo-pkgcard @if(!empty($pkg['badge'])) eo-pkgcard--hot @endif" @if($type === 'private') id="{{ $pkg['key'] }}" @endif data-reveal>
                    @if(!empty($pkg['badge']))
                    <span class="eo-pkg__badge">{{ $pkg['badge'] }}</span>
                    @endif
                    <img class="eo-pkgcard__ico" src="{{ asset($eo['assets']['img']) }}/{{ $pkg['icon'] }}" alt="" width="84" height="80" loading="lazy">
                    <h3>{{ $pkg['name'] }}</h3>
                    <p class="eo-pkgcard__guests"><svg class="eo-i" aria-hidden="true"><use href="#i-users"/></svg>{{ $pkg['guests'] }}</p>
                    <p class="eo-pkg__from">Mulai dari</p>
                    <p class="eo-pkgcard__price">{{ $pkg['price'] }}</p>
                    <ul class="eo-checks">
                        @foreach($pkg['features'] as $feat)
                        <li><svg class="eo-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $feat }}</li>
                        @endforeach
                    </ul>
                    <a class="eo-btn eo-btn--gold eo-btn--block" href="{{ url($eo['base'].'/penawaran?paket='.$pkg['key'].'&tipe='.$type) }}">Pilih Paket <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </article>
                @endforeach
            </div>

            <div class="eo-table-wrap" data-reveal>
                <table class="eo-table">
                    <caption>Perbandingan paket {{ $type === 'private' ? 'private' : 'corporate' }}</caption>
                    <thead>
                        <tr>
                            <th scope="col">Fitur</th>
                            @foreach($eo['compare']['head'] as $head)
                            <th scope="col">{{ $head }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eo['compare'][$type] as $row)
                        <tr>
                            <th scope="row">{{ $row['label'] }}</th>
                            @foreach($row['vals'] as $val)
                            <td>{{ $val }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
        <p class="eo-note">Harga bersifat indikatif dan dapat berubah menyesuaikan venue, jumlah tamu, serta kebutuhan khusus acara.</p>
    </div>
</section>
