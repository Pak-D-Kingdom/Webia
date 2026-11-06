{{--
    Kebijakan
    $full = false → preview beranda (4 kartu ringkas)
    $full = true  → halaman Kebijakan (navigasi samping + isi lengkap)
--}}
@php $full = $full ?? false; @endphp

@if (! $full)
    <section class="gl-section gl-policy" id="kebijakan" aria-labelledby="gl-policy-title">
        <div class="gl-container">
            <div class="gl-section__head">
                <p class="gl-eyebrow">Kebijakan</p>
                <h2 class="gl-title" id="gl-policy-title">Kebijakan & Ketentuan Klinik</h2>
                <p class="gl-lead">Transparansi dan keamanan data Anda adalah prioritas kami.</p>
            </div>

            <ul class="gl-grid gl-grid--4">
                @foreach ($clinic['policies'] as $p)
                    <li>
                        <a class="gl-card gl-policycard" href="{{ route('klinik-kecantikan.policy') }}#{{ $p['slug'] }}">
                            <span class="gl-panel__icon"><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-{{ $p['icon'] }}"/></svg></span>
                            <h3 class="gl-card__title">{{ $p['title'] }}</h3>
                            <p class="gl-card__text">{{ $p['short'] }}</p>
                            <span class="gl-link">Baca selengkapnya <svg class="gl-ic gl-ic--sm" aria-hidden="true"><use href="#gl-i-arrow-right"/></svg></span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@else
    <section class="gl-section gl-policy gl-policy--full" aria-label="Isi kebijakan">
        <div class="gl-container gl-policy__layout">
            <nav class="gl-policy__nav" aria-label="Daftar kebijakan" data-gl-policy-nav>
                <ul>
                    @foreach ($clinic['policies'] as $p)
                        <li><a href="#{{ $p['slug'] }}">
                            <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-{{ $p['icon'] }}"/></svg>{{ $p['title'] }}
                        </a></li>
                    @endforeach
                </ul>
            </nav>

            <div class="gl-policy__content">
                @foreach ($clinic['policies'] as $p)
                    <article class="gl-card gl-policyitem" id="{{ $p['slug'] }}" data-gl-policy>
                        <header class="gl-policyitem__head">
                            <span class="gl-panel__icon"><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-{{ $p['icon'] }}"/></svg></span>
                            <div>
                                <h2 class="gl-card__title">{{ $p['title'] }}</h2>
                                <p class="gl-card__text">{{ $p['short'] }}</p>
                            </div>
                        </header>
                        <ul class="gl-checklist">
                            @foreach ($p['items'] as $item)
                                <li><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-check"/></svg>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
