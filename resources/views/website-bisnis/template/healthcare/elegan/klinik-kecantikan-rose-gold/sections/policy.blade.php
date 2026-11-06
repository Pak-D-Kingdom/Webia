{{-- Kebijakan. $full=false: 3 kartu ringkas | $full=true: halaman Kebijakan --}}
@php $full = $full ?? false; @endphp

@if (! $full)
<section class="rg-section rg-section--tight" id="kebijakan" aria-labelledby="rgPolTitle">
    <div class="rg-container">
        <div class="rg-policy-head">
            <h2 id="rgPolTitle" class="rg-h3">Kebijakan &amp; Ketentuan</h2>
            <a class="rg-btn rg-btn--outline rg-btn--sm" href="{{ route($rp . 'policy') }}">Lihat Semua Kebijakan <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </div>
        <ul class="rg-policy-grid">
            @foreach ($c['policy'] as $p)
                <li>
                    <a class="rg-card rg-pol" href="{{ route($rp . 'policy') }}#{{ $p['id'] }}">
                        <span class="rg-roundicon"><i class="bi {{ $p['icon'] }}" aria-hidden="true"></i></span>
                        <div>
                            <h3>{{ $p['title'] }}</h3>
                            <p>{{ $p['summary'] }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@else
<section class="rg-section" aria-label="Isi kebijakan">
    <div class="rg-container rg-policy-full">
        <nav class="rg-card rg-toc" aria-label="Daftar isi">
            <p class="rg-toc__title">Daftar isi</p>
            <ul>
                @foreach ($c['policy'] as $p)
                    <li><a href="#{{ $p['id'] }}" data-toc><i class="bi {{ $p['icon'] }}" aria-hidden="true"></i>{{ $p['title'] }}</a></li>
                @endforeach
            </ul>
        </nav>
        <div class="rg-policy-body">
            @foreach ($c['policy'] as $p)
                <article class="rg-card rg-doc-text" id="{{ $p['id'] }}">
                    <header>
                        <span class="rg-roundicon"><i class="bi {{ $p['icon'] }}" aria-hidden="true"></i></span>
                        <h2 class="rg-h3">{{ $p['title'] }}</h2>
                    </header>
                    <p class="rg-lead">{{ $p['summary'] }}</p>
                    <ol>
                        @foreach ($p['items'] as $it)<li>{{ $it }}</li>@endforeach
                    </ol>
                </article>
            @endforeach
            <p class="rg-note"><i class="bi bi-info-circle" aria-hidden="true"></i>Pertanyaan tentang kebijakan ini? Hubungi {{ $c['contact']['email'] }}.</p>
        </div>
    </div>
</section>
@endif
