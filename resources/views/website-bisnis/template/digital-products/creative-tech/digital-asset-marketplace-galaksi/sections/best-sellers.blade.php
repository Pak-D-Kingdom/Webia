<section class="section" id="best-sellers">
    <div class="wrap">
        <div class="grid gap-10 lg:grid-cols-[1.5fr_1fr] items-start">
            <div>
                @include($v . '.partials.section-head', ['eyebrow' => 'Best Sellers', 'title' => 'Paling <span class="gt">Laris</span> Sepanjang Masa'])
                <div class="grid gap-3">
                    @foreach ($all->filter(fn ($a) => $a['price'] > 0)->sortByDesc('sales')->take(6)->values() as $a)
                        <div class="best-row reveal" style="--d:{{ $loop->index * .06 }}s">
                            <span class="n">{{ $loop->iteration }}</span>
                            <a href="{{ $aurl($a) }}"><img src="{{ $img($a['img']) }}" alt="{{ $a['title'] }}" width="92" height="58" loading="lazy"></a>
                            <div><h4><a href="{{ $aurl($a) }}">{{ $a['title'] }}</a></h4><small>{{ $cat($a)['name'] }} · {{ number_format($a['sales'], 0, ',', '.') }} terjual</small></div>
                            <div class="flex items-center gap-3"><b class="price" style="font-size:17px">{{ $rp($a['price']) }}</b><button type="button" class="add-btn" data-add="{{ $a['id'] }}" aria-label="Tambah ke keranjang">{{ $ic('cart', 'ico-sm') }}</button></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="glass glow-border p-8 text-center reveal reveal-r" style="position:sticky;top:calc(var(--nav-h) + 16px)">
                @include($v . '.partials.mascot', ['mid' => 'bs', 'mclass' => 'mascot-hello mx-auto'])
                <h3 class="text-2xl mt-4">Tidak yakin memilih?</h3>
                <p class="muted mt-2">Tanya Nova, asisten AI kami, untuk rekomendasi aset dan jawaban seputar lisensi.</p>
                <button type="button" class="btn btn-primary mt-6" data-chat-open>{{ $ic('chat', 'ico-sm') }} Tanya Nova</button>
            </div>
        </div>
    </div>
</section>
