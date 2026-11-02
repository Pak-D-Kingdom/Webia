@php $d = $f['dimension']; $cats = collect($f['categories'])->keyBy('key'); @endphp
<section class="rf-section">
    <div class="rf-container rf-dimgrid" data-rf-dim>
        <div class="rf-card rf-dimcard">
            <label class="rf-field">Pilih produk
                <select data-rf-dim-select>
                    @foreach ($f['products'] as $p)
                        <option value="{{ $p['id'] }}" @selected($p['id'] === 'kursi-makan-lawu')>{{ $p['name'] }}</option>
                    @endforeach
                </select>
            </label>
            <div class="rf-dimcard__stage">
                <img class="rf-dimcard__photo" data-rf-dim-photo src="{{ $img($d['image']) }}" alt="Foto produk terpilih" loading="lazy">
                <div class="rf-dimcard__svg" data-rf-dim-svg role="img" aria-label="Diagram ukuran produk"></div>
            </div>
            <ul class="rf-dimcard__figures" data-rf-dim-figures></ul>
            <div class="rf-dimcard__cta">
                <a class="rf-btn rf-btn--solid" href="{{ $r('custom-design') }}">Ubah ukuran produk {!! $icon('arrow-right') !!}</a>
            </div>
        </div>

        <div>
            <div class="rf-card rf-tablecard">
                <h2>Ukuran standar produk</h2>
                <div class="rf-tablewrap">
                    <table class="rf-table">
                        <thead><tr><th scope="col">Produk</th><th scope="col">Kategori</th><th scope="col">P × L × T (cm)</th></tr></thead>
                        <tbody>
                            @foreach ($f['products'] as $p)
                                <tr>
                                    <th scope="row"><button type="button" class="rf-linkbtn" data-rf-dim-pick="{{ $p['id'] }}">{{ $p['name'] }}</button></th>
                                    <td>{{ $cats[$p['category']]['label'] }}</td>
                                    <td>{{ implode(' × ', $p['dims']) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="rf-card rf-tips">
                <h2>Panduan ukuran ergonomis</h2>
                <dl>
                    @foreach ($d['tips'] as $t)
                        <div><dt>{{ $t['label'] }}</dt><dd>{{ $t['value'] }}</dd></div>
                    @endforeach
                </dl>
            </div>
        </div>
    </div>
</section>
