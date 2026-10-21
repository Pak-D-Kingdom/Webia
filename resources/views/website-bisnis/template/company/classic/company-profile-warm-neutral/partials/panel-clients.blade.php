{{-- Panel Klien Kami (dipakai di Beranda dan Tentang Kami) --}}
<section class="cp-panel" id="klien" aria-labelledby="cp-clients-title">
    <div class="cp-head cp-head--panel">
        <div>
            <h2 class="cp-panel__title" id="cp-clients-title">Klien Kami</h2>
            <p class="cp-subtitle">Dipercaya oleh berbagai perusahaan</p>
        </div>
        @if ($pageKey !== 'tentang')
            <a class="cp-link" href="{{ $page('tentang') }}#klien">Lihat Semua {!! $icon('arrow') !!}</a>
        @endif
    </div>
    <div class="cp-clients__viewport" data-cp-clients tabindex="0" role="region" aria-label="Daftar klien">
        <ul class="cp-clients__track">
            @foreach ($clients as $client)
                <li class="cp-client">
                    <img src="{{ $img($client['image']) }}" alt="{{ $client['name'] }}" width="320" height="156" loading="lazy">
                </li>
            @endforeach
        </ul>
    </div>
    <div class="cp-clients__nav">
        <button class="cp-arrowbtn" type="button" data-cp-clients-prev aria-label="Klien sebelumnya">{!! $icon('chevron-left') !!}</button>
        <button class="cp-arrowbtn" type="button" data-cp-clients-next aria-label="Klien berikutnya">{!! $icon('chevron-right') !!}</button>
    </div>
</section>