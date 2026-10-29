@php $lt = $f['lead_times']; @endphp
<section class="rf-section">
    <div class="rf-container rf-leadgrid">
        <div>
            <header class="rf-sechead rf-sechead--left"><h2>Tahapan produksi</h2><p>Dari konsultasi hingga furniture terpasang di rumah Anda.</p></header>
            <ol class="rf-timeline">
                @foreach ($lt['steps'] as $s)
                    <li>
                        <span class="rf-timeline__dot" aria-hidden="true"></span>
                        <div class="rf-card">
                            <h3>{{ $s['title'] }} <b>{{ $s['days'] }}</b></h3>
                            <p>{{ $s['text'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>

        <aside class="rf-card rf-estimator" data-rf-lead>
            <span class="rf-icondisc">{!! $icon('clock') !!}</span>
            <h2>Hitung estimasi</h2>
            <label class="rf-field">Jenis produk
                <select data-rf-lead-type>@foreach ($lt['types'] as $k => $t)<option value="{{ $k }}">{{ $t['label'] }}</option>@endforeach</select>
            </label>
            <label class="rf-field">Jumlah unit
                <select data-rf-lead-qty>
                    <option value="1-4">1–4 unit</option><option value="5-10">5–10 unit</option>
                    <option value="11-30">11–30 unit</option><option value="30+">Lebih dari 30 unit</option>
                </select>
            </label>
            <label class="rf-check"><input type="checkbox" data-rf-lead-custom> <span>Desain custom (di luar katalog)</span></label>
            <label class="rf-field">Mulai produksi sekitar<input type="date" data-rf-lead-start></label>
            <div class="rf-estimator__result" aria-live="polite">
                <p>Estimasi produksi</p>
                <strong data-rf-lead-days>—</strong>
                <span data-rf-lead-date></span>
            </div>
            <a class="rf-btn rf-btn--solid rf-btn--block" href="{{ $r('quotation') }}">Minta Penawaran {!! $icon('arrow-right') !!}</a>
            <p class="rf-note">Estimasi dalam hari kerja dan dapat berubah sesuai antrean workshop.</p>
        </aside>
    </div>
</section>

<section class="rf-section rf-section--tint">
    <div class="rf-container">
        <div class="rf-card rf-tablecard">
            <h2>Estimasi per jenis produk</h2>
            <div class="rf-tablewrap">
                <table class="rf-table">
                    <thead><tr><th scope="col">Jenis produk</th><th scope="col">Produksi (hari kerja)</th></tr></thead>
                    <tbody>@foreach ($lt['types'] as $t)<tr><th scope="row">{{ $t['label'] }}</th><td>{{ $t['min'] }}–{{ $t['max'] }} hari</td></tr>@endforeach</tbody>
                </table>
            </div>
        </div>
    </div>
</section>
