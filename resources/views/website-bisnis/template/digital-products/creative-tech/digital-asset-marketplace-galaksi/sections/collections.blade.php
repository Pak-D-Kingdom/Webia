<section class="section" id="collections">
    <div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => 'Collections & Bundles', 'title' => 'Koleksi &amp; <span class="gt">Bundle Hemat</span>', 'desc' => 'Paket aset yang disusun tematik — lebih lengkap, lebih murah.'])
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($dam['collections'] as $col)
                @php $items = collect($col['items'])->map(fn ($s) => $all->firstWhere('slug', $s)); $sum = $items->sum('price'); @endphp
                <div class="bundle-card reveal" style="--d:{{ $loop->index * .08 }}s" data-tilt>
                    <div class="bm"><img src="{{ $img($col['img']) }}" alt="{{ $col['title'] }}" width="1280" height="720" loading="lazy"><span class="badge b-hot" style="position:absolute;top:12px;left:12px">{{ $col['tag'] }}</span></div>
                    <div class="bb">
                        <h3 class="text-xl">{{ $col['title'] }}</h3>
                        <p class="muted" style="font-size:14px">{{ $col['desc'] }}</p>
                        <div class="thumbs">@foreach ($items as $it)<img src="{{ $img($it['img']) }}" alt="{{ $it['title'] }}" width="34" height="34" loading="lazy">@endforeach</div>
                        <div class="flex items-center justify-between mt-2"><span class="price">{{ $rp($col['price']) }}<s>{{ $rp($sum) }}</s></span><button type="button" class="add-btn" data-add-bundle="{{ implode(',', $items->pluck('id')->all()) }}" aria-label="Tambah bundle ke keranjang">{{ $ic('cart', 'ico-sm') }}</button></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
