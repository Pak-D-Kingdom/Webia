<section class="rf-section">
    <div class="rf-container">
        <header class="rf-sechead">
            <h2>Material Pilihan</h2>
            <p>Enam bahan yang paling sering kami pakai, lengkap dengan kekuatan dan tingkat perawatannya.</p>
        </header>
        <div class="rf-grid rf-grid--materials">
            @foreach ($f['materials'] as $m)
                <article class="rf-card rf-material">
                    <div class="rf-material__swatch" style="--tone: {{ $m['tone'] }}; --tone2: {{ $m['tone2'] }}" aria-hidden="true"></div>
                    <h3>{{ $m['name'] }}</h3>
                    <p>{{ $m['text'] }}</p>
                    <dl class="rf-meter">
                        <div><dt>Ketahanan</dt><dd><meter min="0" max="5" value="{{ $m['durability'] }}">{{ $m['durability'] }}/5</meter></dd></div>
                        <div><dt>Perawatan</dt><dd><meter min="0" max="5" value="{{ $m['care'] }}">{{ $m['care'] }}/5</meter></dd></div>
                    </dl>
                    <p class="rf-material__best"><b>Cocok untuk:</b> {{ $m['best'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="rf-section rf-section--tint">
    <div class="rf-container rf-finish" data-rf-finish>
        <div class="rf-finish__preview rf-card">
            <div class="rf-finish__chip" data-rf-finish-chip style="--hex: {{ $f['finishings'][0]['hex'] }}"></div>
            <h3 data-rf-finish-name>{{ $f['finishings'][0]['name'] }}</h3>
            <p data-rf-finish-text>{{ $f['finishings'][0]['text'] }}</p>
            <p class="rf-finish__sheen">Tampilan: <b data-rf-finish-sheen>{{ $f['finishings'][0]['sheen'] }}</b></p>
            <a class="rf-btn rf-btn--solid" href="{{ $r('custom-design') }}">Pakai di Custom Design {!! $icon('arrow-right') !!}</a>
        </div>
        <div>
            <header class="rf-sechead rf-sechead--left">
                <h2>Finishing</h2>
                <p>Pilih warna dan lapisan akhir. Setiap finishing diaplikasikan berlapis lalu dikeringkan penuh.</p>
            </header>
            <ul class="rf-swatches">
                @foreach ($f['finishings'] as $i => $fin)
                    <li>
                        <button type="button" class="rf-swatch {{ $i === 0 ? 'is-active' : '' }}" data-rf-finish-pick="{{ $i }}" aria-pressed="{{ $i === 0 ? 'true' : 'false' }}">
                            <i style="background: {{ $fin['hex'] }}"></i><span>{{ $fin['name'] }}</span>
                        </button>
                    </li>
                @endforeach
            </ul>
            <div class="rf-care rf-card">
                <h3>Tips perawatan</h3>
                <ul>
                    <li>Lap dengan kain lembap, lalu keringkan. Hindari cairan pembersih keras.</li>
                    <li>Jauhkan dari sinar matahari langsung dan sumber panas.</li>
                    <li>Lapis ulang teak oil atau wax setiap 6–12 bulan.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
