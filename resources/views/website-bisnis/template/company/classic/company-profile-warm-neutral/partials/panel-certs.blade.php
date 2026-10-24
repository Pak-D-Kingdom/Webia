{{-- Panel Sertifikasi (dipakai di Beranda dan Tentang Kami) --}}
<section class="cp-panel" id="sertifikasi" aria-labelledby="cp-cert-title">
    <div class="cp-head cp-head--panel">
        <div>
            <h2 class="cp-panel__title" id="cp-cert-title">Sertifikasi</h2>
            <p class="cp-subtitle">Standar kualitas yang kami pegang</p>
        </div>
        @if ($pageKey !== 'tentang')
            <a class="cp-link" href="{{ $page('tentang') }}#sertifikasi">Lihat Semua {!! $icon('arrow') !!}</a>
        @endif
    </div>
    <ul class="cp-certs">
        @foreach ($certifications as $item)
            <li class="cp-cert">
                <img class="cp-cert__img" src="{{ $img($item['image']) }}" alt="{{ $item['alt'] }}" width="184" height="192" loading="lazy">
                <p class="cp-cert__title">{{ $item['title'] }}</p>
                <p class="cp-cert__meta">{{ $item['meta'] }}</p>
            </li>
        @endforeach
    </ul>
</section>
