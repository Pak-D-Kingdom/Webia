@php
    $groups  = collect($f['project_groups'])->keyBy('key');
    $gcounts = collect($f['projects'])->countBy('group');
    $gtotal  = count($f['projects']);
@endphp
<section class="rf-section" data-rf-gallery>
    <div class="rf-container">
        <div class="rf-filterbar rf-card">
            <div class="rf-filterbar__chips" role="group" aria-label="Filter jenis proyek">
                <button class="rf-chip is-active" type="button" data-rf-gfilter="all" aria-pressed="true">Semua <em>{{ $gtotal }}</em></button>
                @foreach ($f['project_groups'] as $g)
                    <button class="rf-chip" type="button" data-rf-gfilter="{{ $g['key'] }}" aria-pressed="false">{{ $g['label'] }} <em>{{ $gcounts[$g['key']] ?? 0 }}</em></button>
                @endforeach
            </div>
            <div class="rf-filterbar__meta">
                <p class="rf-count" aria-live="polite"><b data-rf-gresult>{{ $gtotal }}</b> proyek ditampilkan</p>
                <button class="rf-reset" type="button" data-rf-greset hidden>{!! $icon('close') !!} Reset filter</button>
            </div>
        </div>

        <div class="rf-masonry" data-rf-gallery-grid>
            @foreach ($f['projects'] as $i => $p)
                <figure class="rf-shot" data-group="{{ $p['group'] }}">
                    <button type="button" data-rf-lightbox="{{ $p['id'] }}" aria-label="Perbesar foto {{ $p['title'] }}">
                        <img src="{{ $img($p['image']) }}" alt="{{ $p['title'] }}, {{ $p['place'] }}" loading="lazy">
                    </button>
                    <figcaption>
                        <b>{{ $p['title'] }}</b>
                        <span>{{ $groups[$p['group']]['label'] }} · {{ $p['place'] }}, {{ $p['year'] }}</span>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>

    <dialog class="rf-modal rf-modal--light" id="rf-lightbox" aria-label="Foto proyek">
        <button class="rf-modal__close" type="button" data-rf-modal-close aria-label="Tutup">{!! $icon('close') !!}</button>
        <button class="rf-lb__nav rf-lb__nav--prev" type="button" data-rf-lb-prev aria-label="Foto sebelumnya">{!! $icon('chevron-left') !!}</button>
        <figure class="rf-lb">
            <img data-rf-lb-img src="" alt="">
            <figcaption data-rf-lb-cap></figcaption>
        </figure>
        <button class="rf-lb__nav rf-lb__nav--next" type="button" data-rf-lb-next aria-label="Foto berikutnya">{!! $icon('chevron-right') !!}</button>
    </dialog>
</section>
