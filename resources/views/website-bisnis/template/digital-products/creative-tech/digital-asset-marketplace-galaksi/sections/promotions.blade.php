<section class="section-sm" id="promotions">
    <div class="wrap">
        <div class="promo-card reveal reveal-z" style="--img:url('{{ $img('backgrounds/nebula-rose-4k.jpg') }}')">
            <div class="grid gap-10 lg:grid-cols-[1.2fr_1fr] items-center">
                <div>
                    <span class="badge b-sale">{{ $ic('fire', 'ico-sm') }} Flash Sale Galaksi</span>
                    <h2 class="h2 mt-4">Diskon hingga <span class="gt">40%</span> untuk aset pilihan</h2>
                    <p class="lead">Berakhir dalam waktu singkat — amankan aset favoritmu sebelum kehabisan.</p>
                    <div class="countdown" data-countdown="{{ $dam['promos']['ends_in_hours'] }}">
                        @foreach (['Jam' => 'h', 'Menit' => 'm', 'Detik' => 's'] as $l => $k)
                            <div class="cd-box"><strong data-cd="{{ $k }}">00</strong><span>{{ $l }}</span></div>
                        @endforeach
                    </div>
                    <a href="{{ $u('explore-assets') }}?sale=1" class="btn btn-primary btn-lg">Belanja Sekarang {{ $ic('arrow', 'ico-sm') }}</a>
                </div>
                <div class="grid gap-3">
                    @foreach ($dam['promos']['coupons'] as $cp)
                        <div class="coupon"><div><code>{{ $cp[0] }}</code><small>{{ $cp[1] }} · {{ $cp[2] }}</small></div><button type="button" class="btn btn-ghost btn-sm" data-copy="{{ $cp[0] }}">{{ $ic('copy', 'ico-sm') }} Salin</button></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
