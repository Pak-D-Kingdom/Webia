{{-- Harga paket. $full=true → daftar fitur lengkap per paket --}}
@php $full = $full ?? false; @endphp
<section id="pricing" class="{{ $full ? 'block' : 'panel panel--pricing' }}" aria-labelledby="pricing-title">
    @if (! $full)
        <header class="panel__head panel__head--sub">
            <div>
                <h2 id="pricing-title">Harga Paket</h2>
                <p>Pilih paket sesuai dengan kebutuhanmu.</p>
            </div>
            <a class="link-more" href="{{ route($rp.'pricing') }}">Lihat Semua <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </header>
    @else
        <h2 id="pricing-title" class="sr-only">Paket harga</h2>
    @endif

    <div class="plan-grid {{ $full ? 'plan-grid--full' : '' }}">
        @foreach ($t['plans'] as $pl)
            <article class="plan plan--{{ $pl['tone'] }} {{ $pl['popular'] ? 'is-popular' : '' }}">
                @if ($pl['popular'])<span class="plan__flag">Popular</span>@endif
                <h3 class="plan__name">{{ $pl['name'] }}</h3>
                <p class="plan__tag">{{ $pl['tagline'] }}</p>
                <p class="plan__price"><small>Rp</small> <strong>{{ number_format($pl['price'], 0, ',', '.') }}</strong> <span>{{ $pl['period'] }}</span></p>
                @if ($full)
                    <ul class="plan__list">
                        @foreach ($pl['features'] as $f)<li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>{{ $f }}</li>@endforeach
                    </ul>
                @endif
                <a class="btn btn--block btn--{{ $pl['tone'] }}" href="{{ route($rp.'registration', ['plan' => $pl['key']]) }}">Pilih Paket</a>
            </article>
        @endforeach
    </div>
</section>
