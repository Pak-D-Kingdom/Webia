{{--
    Policy.  $full = false → daftar "Kebijakan & Informasi" di beranda
             $full = true  → halaman Policy (indeks + isi lengkap)
--}}
@php $full = $full ?? false; @endphp

<section id="policy" class="cg-section cg-policy {{ $full ? 'cg-policy--full' : 'cg-policy--preview cg-card' }}" aria-labelledby="cg-policy-title">
    @unless ($full)
        <h2 id="cg-policy-title" class="cg-card__title">Kebijakan &amp; Informasi</h2>
        <ul class="cg-linklist">
            @foreach ($c['policy'] as $p)
                <li>
                    <a href="{{ route('glow.policy') }}#{{ $p['slug'] }}">
                        <span class="cg-linklist__icon" aria-hidden="true"><i class="bi {{ $p['icon'] }}"></i></span>
                        <span class="cg-linklist__text">{{ $p['title'] }}<small>{{ $p['intro'] }}</small></span>
                    </a>
                </li>
            @endforeach
            <li>
                <a href="{{ route('glow.faq') }}">
                    <span class="cg-linklist__icon" aria-hidden="true"><i class="bi bi-question-circle"></i></span>
                    <span class="cg-linklist__text">FAQ<small>Jawaban untuk pertanyaan yang sering diajukan.</small></span>
                </a>
            </li>
        </ul>
    @else
        <h2 id="cg-policy-title" class="cg-sr">Kebijakan {{ $c['brand']['name'] }}</h2>
        <div class="cg-policy__layout">
            <nav class="cg-policy__index" aria-label="Daftar kebijakan">
                <ul>
                    @foreach ($c['policy'] as $p)
                        <li><a href="#{{ $p['slug'] }}" data-cg-policy-link><i class="bi {{ $p['icon'] }}" aria-hidden="true"></i> {{ $p['title'] }}</a></li>
                    @endforeach
                    <li><a href="{{ route('glow.faq') }}"><i class="bi bi-question-circle" aria-hidden="true"></i> FAQ</a></li>
                </ul>
            </nav>

            <div class="cg-policy__body">
                @foreach ($c['policy'] as $p)
                    <article class="cg-card cg-policy__block" id="{{ $p['slug'] }}">
                        <header class="cg-policy__head">
                            <span class="cg-policy__icon" aria-hidden="true"><i class="bi {{ $p['icon'] }}"></i></span>
                            <div>
                                <h3 class="cg-card__title cg-card__title--lg">{{ $p['title'] }}</h3>
                                <p class="cg-card__sub">{{ $p['intro'] }}</p>
                            </div>
                        </header>
                        <ul class="cg-checklist cg-checklist--plain">
                            @foreach ($p['points'] as $pt)
                                <li><i class="bi bi-dot" aria-hidden="true"></i> {{ $pt }}</li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </div>
    @endunless
</section>
