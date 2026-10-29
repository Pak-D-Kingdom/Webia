@php $c = $f['custom']; @endphp
<section class="rf-section">
    <div class="rf-container rf-config">
        <form class="rf-config__form" data-rf-config novalidate>
            <div class="rf-card rf-fieldset" role="group" aria-labelledby="rf-step-1">
                <h3 class="rf-fieldset__title" id="rf-step-1"><span>Langkah 1</span> Pilih jenis furniture</h3>
                <div class="rf-options rf-options--models">
                    @foreach ($c['models'] as $i => $m)
                        <label class="rf-option">
                            <input type="radio" name="model" value="{{ $m['label'] }}" data-type="{{ $m['key'] }}" @checked($i === 0)>
                            <span class="rf-option__box">{!! $icon($m['icon']) !!}<b>{{ $m['label'] }}</b></span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="rf-card rf-fieldset" role="group" aria-labelledby="rf-step-2">
                <h3 class="rf-fieldset__title" id="rf-step-2"><span>Langkah 2</span> Tentukan ukuran</h3>
                <div class="rf-options rf-options--sizes">
                    @foreach ($c['sizes'] as $i => $s)
                        <label class="rf-option">
                            <input type="radio" name="size" value="{{ $s['label'] }}" data-size="{{ $s['key'] }}" @checked($i === 0)>
                            <span class="rf-option__box"><b>{{ $s['label'] }}</b><small>{{ $s['note'] }}</small></span>
                        </label>
                    @endforeach
                </div>
                <div class="rf-dims" data-rf-dims hidden>
                    <label>Panjang (cm)<input type="number" name="p" min="20" max="500" inputmode="numeric" placeholder="120"></label>
                    <label>Lebar (cm)<input type="number" name="l" min="20" max="500" inputmode="numeric" placeholder="60"></label>
                    <label>Tinggi (cm)<input type="number" name="t" min="20" max="300" inputmode="numeric" placeholder="75"></label>
                </div>
            </div>

            <div class="rf-card rf-fieldset" role="group" aria-labelledby="rf-step-3">
                <h3 class="rf-fieldset__title" id="rf-step-3"><span>Langkah 3</span> Material & finishing</h3>
                <p class="rf-subtitle">Material</p>
                <div class="rf-options rf-options--chips">
                    @foreach ($f['materials'] as $i => $m)
                        <label class="rf-option rf-option--chip">
                            <input type="radio" name="material" value="{{ $m['name'] }}" @checked($i === 0)>
                            <span class="rf-option__box">{{ $m['name'] }}</span>
                        </label>
                    @endforeach
                </div>
                <p class="rf-subtitle">Warna finishing</p>
                <div class="rf-options rf-options--swatches">
                    @foreach ($f['finishings'] as $i => $fin)
                        <label class="rf-option rf-option--swatch" title="{{ $fin['name'] }}">
                            <input type="radio" name="finishing" value="{{ $fin['name'] }}" data-hex="{{ $fin['hex'] }}" @checked($i === 0)>
                            <span class="rf-option__box"><i style="background: {{ $fin['hex'] }}"></i><small>{{ $fin['name'] }}</small></span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="rf-card rf-fieldset" role="group" aria-labelledby="rf-step-4">
                <h3 class="rf-fieldset__title" id="rf-step-4"><span>Langkah 4</span> Tambahan & catatan</h3>
                <p class="rf-subtitle">Tambahan (opsional)</p>
                <div class="rf-options rf-options--chips">
                    @foreach ($c['extras'] as $ex)
                        <label class="rf-option rf-option--chip">
                            <input type="checkbox" name="extras[]" value="{{ $ex }}">
                            <span class="rf-option__box">{{ $ex }}</span>
                        </label>
                    @endforeach
                </div>
                <label class="rf-field">Catatan desain
                    <textarea name="note" rows="3" placeholder="Contoh: sandaran lebih tinggi, ada laci di bagian bawah..."></textarea>
                </label>
            </div>
        </form>

        <aside class="rf-config__summary rf-card" aria-live="polite">
            <p class="rf-script">{{ $c['script'][0] }} {{ $c['script'][1] }}</p>
            <div class="rf-config__art"><img src="{{ $img($c['sketch']) }}" alt="Sketsa kursi lengan kayu rustic" loading="lazy"></div>
            <h2>Ringkasan Desain</h2>
            <dl class="rf-summary" data-rf-summary></dl>
            <div class="rf-config__finish"><i data-rf-swatch></i><span>Finishing</span><b data-rf-swatch-name></b></div>
            <button class="rf-btn rf-btn--solid rf-btn--block" type="button" data-rf-config-next>Lanjut ke Custom Order {!! $icon('arrow-right') !!}</button>
            <p class="rf-note">Pilihan Anda akan terisi otomatis di formulir pemesanan.</p>
        </aside>
    </div>
</section>
