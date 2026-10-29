@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
    $m = $f['materials'];
@endphp
<section class="lf-section">
    <div class="lf-container">
        <div class="lf-materials-intro">
            <figure class="lf-materials-intro__img"><img src="{{ $a($m['image']) }}" alt="Sampel kayu solid dan material premium" loading="lazy"></figure>
            <div>
                <h2 class="lf-serif lf-materials-intro__title">Kualitas yang bisa Anda lihat dan rasakan</h2>
                <p>Setiap material kami pilih berdasarkan kekuatan, tampilan, dan kenyamanannya. Tim kami dapat mengirim sampel material untuk membantu Anda memutuskan sebelum produksi.</p>
                <a class="lf-btn lf-btn--brown lf-btn--sm" href="{{ $r('order') }}">Pilih untuk Pesanan Saya <svg class="ic"><use href="#i-arrow"/></svg></a>
            </div>
        </div>

        @foreach ($m['groups'] as $group)
            <div class="lf-matgroup">
                <h2 class="lf-matgroup__title lf-serif">{{ $group['name'] }}</h2>
                <div class="lf-matgrid" style="--cols: {{ count($group['items']) % 3 === 0 ? 3 : min(4, count($group['items'])) }}">
                    @foreach ($group['items'] as $item)
                        <article class="lf-mat">
                            <div class="lf-swatch lf-swatch--{{ $item['type'] }}" style="--c1: {{ $item['c1'] }}; --c2: {{ $item['c2'] }}" role="img" aria-label="Contoh tampilan {{ $item['name'] }}"></div>
                            <h3>{{ $item['name'] }}</h3>
                            <p>{{ $item['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        @endforeach
        <p class="lf-note">Warna pada layar dapat sedikit berbeda dengan produk asli. Minta sampel fisik melalui WhatsApp untuk hasil yang paling akurat.</p>
    </div>
</section>
