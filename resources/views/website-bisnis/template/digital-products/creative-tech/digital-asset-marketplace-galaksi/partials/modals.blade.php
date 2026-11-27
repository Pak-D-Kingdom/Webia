{{-- Preview aset (diisi JS) --}}
<div class="overlay center" id="previewOverlay" role="dialog" aria-modal="true" aria-label="Pratinjau aset">
    <div class="modal" id="previewModal"></div>
</div>
{{-- Simulasi unduhan --}}
<div class="overlay center" id="downloadOverlay" role="dialog" aria-modal="true" aria-label="Unduhan">
    <div class="modal" style="width:min(460px,100%);padding:32px;text-align:center">
        <div class="success-ring" id="dlIcon" style="width:84px;height:84px;margin-bottom:18px">{{ $ic('download', 'ico-lg') }}</div>
        <h3 class="text-2xl" id="dlTitle">Menyiapkan unduhan…</h3>
        <p class="muted mt-2" id="dlName"></p>
        <div class="dl-bar"><i id="dlBar"></i></div>
        <div class="flex justify-between tiny dim"><span id="dlPct">0%</span><span id="dlSize"></span></div>
        <button class="btn btn-ghost btn-block mt-6" data-close-download>Tutup</button>
    </div>
</div>
