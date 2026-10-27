{{-- Dokter & Staff. $full=false: preview | $full=true: halaman Dokter --}}
@php $full = $full ?? false; $di = $c['doctors_intro']; @endphp

@if (! $full)
<section class="rg-panel rg-doctors" id="dokter" aria-labelledby="rgDocTitle">
    <div class="rg-doctors__intro">
        <p class="rg-eyebrow rg-eyebrow--soft">{{ $di['eyebrow'] }}</p>
        <h2 id="rgDocTitle" class="rg-h2">{{ $di['title'] }}</h2>
        <p class="rg-lead">{{ $di['text'] }}</p>
        <a class="rg-btn rg-btn--outline" href="{{ route($rp . 'doctors') }}">Lihat Semua Dokter <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
    </div>
    <ul class="rg-doc-grid">
        @foreach ($c['doctors'] as $d)
            <li>
                <a class="rg-card rg-doc" href="{{ route($rp . 'doctors') }}#{{ $d['slug'] }}">
                    <span class="rg-doc__img"><img src="{{ asset($c['images_dir'] . '/' . $d['image']) }}" alt="{{ $d['name'] }}" loading="lazy" width="545" height="395"></span>
                    <h3>{{ $d['name'] }}</h3>
                    <p>{{ $d['role'] }}</p>
                    <span class="rg-pill">{{ $d['tag'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</section>
@else
<section class="rg-section" aria-labelledby="rgDocTitle">
    <div class="rg-container">
        <div class="rg-toolbar">
            <div class="rg-chips" role="group" aria-label="Filter tim" data-rg-filter="#rgDocList">
                <button type="button" class="rg-chip is-active" data-filter="*">Semua</button>
                <button type="button" class="rg-chip" data-filter="dokter">Dokter</button>
                <button type="button" class="rg-chip" data-filter="therapist">Therapist</button>
            </div>
            <label class="rg-searchbox">
                <i class="bi bi-search" aria-hidden="true"></i>
                <span class="rg-sr">Cari dokter</span>
                <input type="search" placeholder="Cari nama atau keahlian..." data-rg-search="#rgDocList">
            </label>
        </div>

        <ul class="rg-doc-full" id="rgDocList">
            @foreach ($c['doctors'] as $d)
                <li id="{{ $d['slug'] }}" data-cat="{{ \Illuminate\Support\Str::slug($d['tag']) }}" data-text="{{ strtolower($d['name'] . ' ' . $d['role'] . ' ' . $d['focus']) }}">
                    <article class="rg-card rg-docx">
                        <div class="rg-docx__img"><img src="{{ asset($c['images_dir'] . '/' . $d['image']) }}" alt="{{ $d['name'] }}" loading="lazy" width="545" height="395"></div>
                        <div class="rg-docx__body">
                            <span class="rg-pill">{{ $d['tag'] }}</span>
                            <h2 class="rg-h3">{{ $d['name'] }}</h2>
                            <p class="rg-docx__role">{{ $d['role'] }}</p>
                            <p>{{ $d['bio'] }}</p>
                            <dl class="rg-dl">
                                <div><dt>Pengalaman</dt><dd>{{ $d['exp'] }}</dd></div>
                                <div><dt>Fokus</dt><dd>{{ $d['focus'] }}</dd></div>
                                <div><dt>Praktik</dt><dd>{{ count($d['days']) > 5 ? 'Senin – Sabtu' : implode(', ', $d['days']) }}, {{ $d['time'] }}</dd></div>
                            </dl>
                            <a class="rg-btn rg-btn--outline rg-btn--sm" href="{{ route($rp . 'appointment') }}?dokter={{ $d['slug'] }}">Booking dengan {{ \Illuminate\Support\Str::before($d['name'], ',') }}</a>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
        <p class="rg-empty" data-filter-empty hidden><i class="bi bi-search-heart" aria-hidden="true"></i> Dokter tidak ditemukan.</p>
    </div>
</section>
@endif
