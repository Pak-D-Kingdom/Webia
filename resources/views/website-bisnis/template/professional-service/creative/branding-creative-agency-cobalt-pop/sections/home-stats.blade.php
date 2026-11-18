<section class="bca-section bca-tone-coral" id="statistics" aria-labelledby="bca-st-h" style="padding-block:clamp(64px,8vw,110px)">
    <div class="bca-wrap bca-stats-wrap">
        <h2 class="bca-h2 bca-stats-title" id="bca-st-h">Sepuluh tahun, dihitung dari yang sudah selesai.</h2>
        <div class="bca-stats">
            @foreach($site['stats'] as $s)
                <div class="bca-stat bca-reveal" style="--bca-d:{{ $loop->index * 0.08 }}s">
                    <b><span data-bca-count="{{ $s['value'] }}">{{ $s['value'] }}</span><small>{{ $s['suffix'] }}</small></b>
                    <span>{{ $s['label'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
