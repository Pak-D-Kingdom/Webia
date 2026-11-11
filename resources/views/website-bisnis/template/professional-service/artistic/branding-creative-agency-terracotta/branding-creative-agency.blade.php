<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $c['pages'][$page]['title'] }} | {{ $c['brand']['name'] }}</title>
    <meta name="description" content="{{ $c['pages'][$page]['desc'] }}">
    <meta name="theme-color" content="#B05237">
    <link rel="icon" type="image/svg+xml" href="{{ $img('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wdth,wght@12..96,75..100,500..800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ $css }}">
    <script>document.documentElement.classList.add('bca-js')</script>
</head>
<body class="bca">
<a class="bca-skip" href="#bca-main">Lewati ke konten</a>

{{-- TOPBAR --}}
<div class="bca-topbar">
    <div class="bca-wrap bca-topbar__in">
        <p>{{ $c['topbar']['notice'] }}</p>
        <div class="bca-topbar__links">
            <a href="mailto:{{ $c['brand']['email'] }}">{{ $c['brand']['email'] }}</a>
            <a href="tel:+{{ $c['brand']['whatsapp'] }}">{{ $c['brand']['phone'] }}</a>
        </div>
    </div>
</div>

{{-- NAVBAR --}}
<header class="bca-header" id="bca-header">
    <div class="bca-wrap bca-header__in">
        <a class="bca-logo" href="{{ $r('home') }}" aria-label="{{ $c['brand']['name'] }}, ke beranda"><svg class="bca-logo__mark" viewBox="0 0 40 40" aria-hidden="true"><rect width="40" height="40" fill="#B05237"/><g class="sun"><circle cx="20" cy="19" r="9" fill="#EDB85A"/></g><path class="h1" d="M0 28c7-5 13-5 20 0s13 5 20 0v12H0Z"/><path class="h2" d="M0 33c7-4 13-4 20 0s13 4 20 0v7H0Z"/></svg><span class="bca-logo__t"><span class="bca-logo__n">{{ $c['brand']['short'] }}</span><span class="bca-logo__s">{{ $c['brand']['sub'] }}</span></span></a>
        <button class="bca-burger" type="button" aria-expanded="false" aria-controls="bca-nav" data-bca-burger><span></span><span></span><span class="sr">Buka menu</span></button>
        <nav class="bca-nav" id="bca-nav" aria-label="Navigasi utama">
            <ul>
                @foreach($c['nav'] as $k)
                <li><a href="{{ $r($k) }}" class="{{ $page === $k ? 'is-on' : '' }}">{{ $c['pages'][$k]['label'] }}</a></li>
                @endforeach
            </ul>
            <a class="bca-btn bca-btn--solid" href="{{ $r('brief') }}">{{ $c['pages']['brief']['label'] }}</a>
        </nav>
    </div>
</header>

<main id="bca-main">
<!--bca-main-->
@if($page !== 'home')
<section class="bca-pagehead">
    <div class="bca-wrap">
        <ol class="bca-crumb" aria-label="Jejak halaman"><li><a href="{{ $r('home') }}">Beranda</a></li><li aria-current="page">{{ $c['pages'][$page]['label'] }}</li></ol>
        <h1>{{ $c['pages'][$page]['title'] }}</h1>
        <p>{{ $c['pages'][$page]['desc'] }}</p>
    </div>
    <span class="bca-hills bca-hills--back" aria-hidden="true"></span>
    <span class="bca-hills" aria-hidden="true" style="--next:{{ $c['pages'][$page]['next'] }}"></span>
</section>
@endif

{{-- ===================== BERANDA ===================== --}}
@if($page === 'home')
<section class="bca-hero">
    <div class="bca-wrap bca-hero__grid">
        <div class="bca-hero__copy">
            <h1 class="bca-hero__title">@foreach($c['hero']['lines'] as $i => $l)<span style="--i:{{ $i }}">{{ $l }}</span>@endforeach</h1>
            <p class="bca-hero__lead">{{ $c['hero']['lead'] }}</p>
            <div class="bca-hero__cta">
                <a class="bca-btn bca-btn--sun" href="{{ $r('janji') }}">{{ $c['hero']['cta1'] }}</a>
                <a class="bca-btn bca-btn--ghost" href="{{ $r('portofolio') }}">{{ $c['hero']['cta2'] }}</a>
            </div>
            <ul class="bca-facts">@foreach($c['hero']['facts'] as $f)<li><strong>{{ $f['t'] }}</strong><span>{{ $f['d'] }}</span></li>@endforeach</ul>
        </div>
        <div class="bca-hero__art" data-parallax>
            <span class="bca-sunbox" aria-hidden="true"><span class="bca-rays"></span><span class="bca-sun"></span></span>
            <img src="{{ $img('hero-wall.svg') }}" alt="{{ $c['hero']['alt'] }}" width="1000" height="1250" fetchpriority="high">
        </div>
    </div>
</section>

<section class="bca-sec">
    <div class="bca-wrap">
        <div class="bca-sh" data-rv>
            <h2 class="bca-h2">{{ $c['home']['services']['title'] }}</h2>
            <div><p class="bca-lead">{{ $c['home']['services']['text'] }}</p><a class="bca-more" href="{{ $r('layanan') }}">{{ $c['home']['services']['cta'] }}</a></div>
        </div>
        <div class="bca-pcs" data-bca-pcs data-rv>
            @foreach($c['services']['items'] as $i => $s)
            <article class="bca-pc {{ $i == 0 ? 'is-active' : '' }} {{ ($s['dk'] ?? false) ? 'is-dk' : '' }}" style="--c:{{ $s['c'] }}">
                <button class="bca-pc__h" type="button" aria-expanded="{{ $i == 0 ? 'true' : 'false' }}"><span class="bca-pc__t">{{ $s['t'] }}</span></button>
                <div class="bca-pc__b">
                    <p>{{ $s['d'] }}</p>
                    <ul class="bca-pc__list">@foreach($s['list'] as $l)<li>{{ $l }}</li>@endforeach</ul>
                    <p class="bca-pc__price">mulai {{ $s['price'] }}</p>
                    <a class="bca-more" href="{{ $r('layanan') }}">Lihat detail</a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="bca-sec bca-sec--plaster">
    <div class="bca-wrap bca-split">
        <figure class="bca-venn" data-rv><img src="{{ $img('expertise-venn.svg') }}" alt="{{ $c['expertise']['img_alt'] }}" width="800" height="800" loading="lazy"></figure>
        <div data-rv>
            <h2 class="bca-h2">{{ $c['home']['expertise']['title'] }}</h2>
            <p class="bca-lead" style="margin:1rem 0 2rem">{{ $c['home']['expertise']['text'] }}</p>
            <div class="bca-skills">
                @foreach($c['expertise']['skills'] as $s)
                <div class="bca-skill"><div><span>{{ $s['t'] }}</span><span>{{ $s['v'] }}%</span></div><span class="bca-bar"><i style="--v:{{ $s['v'] / 100 }}"></i></span></div>
                @endforeach
            </div>
            <a class="bca-more" style="margin-top:2rem" href="{{ $r('keahlian') }}">{{ $c['home']['expertise']['cta'] }}</a>
        </div>
    </div>
</section>

<section class="bca-sec">
    <div class="bca-wrap">
        <div class="bca-sh" data-rv>
            <h2 class="bca-h2">{{ $c['home']['pricing']['title'] }}</h2>
            <div><p class="bca-lead">{{ $c['home']['pricing']['text'] }}</p><a class="bca-more" href="{{ $r('harga') }}">{{ $c['home']['pricing']['cta'] }}</a></div>
        </div>
        <div class="bca-tks">
            @foreach($c['pricing']['plans'] as $p)
            <article class="bca-tk {{ $p['hot'] ? 'bca-tk--hot' : '' }}" data-rv>
                @if($p['hot'])<span class="bca-tk__badge">Paling dipilih</span>@endif
                <h3>{{ $p['n'] }}</h3>
                <p>{{ $p['d'] }}</p>
                <div class="bca-tk__price">{{ $p['price'] }}<small>{{ $p['unit'] }}</small></div>
                <div class="bca-tk__sep"></div>
                <ul class="bca-tk__list">@foreach($p['list'] as $l)<li>{{ $l }}</li>@endforeach</ul>
                <a class="bca-btn {{ $p['hot'] ? 'bca-btn--sun' : 'bca-btn--ghost' }}" href="{{ $r('janji') }}">Konsultasikan paket ini</a>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="bca-sec bca-sec--plaster">
    <div class="bca-wrap">
        <div class="bca-sh" data-rv>
            <h2 class="bca-h2">{{ $c['home']['portfolio']['title'] }}</h2>
            <div>
                <p class="bca-lead">{{ $c['home']['portfolio']['text'] }}</p>
                <div class="bca-railnav"><button type="button" data-rail="-1" aria-label="Geser ke kiri">&larr;</button><button type="button" data-rail="1" aria-label="Geser ke kanan">&rarr;</button></div>
            </div>
        </div>
        <div class="bca-rail" data-bca-rail tabindex="0" aria-label="Galeri proyek">
            @foreach($c['portfolio']['items'] as $w)
            <article class="bca-card" data-item data-title="{{ $w['title'] }}" data-meta="{{ $w['cat'] }}, {{ $w['client'] }}, {{ $w['year'] }}" data-desc="{{ $w['desc'] }}">
                <button type="button" data-lb>
                    <figure><img src="{{ $img($w['img']) }}" alt="Karya {{ $w['title'] }}" width="800" height="1000" loading="lazy"></figure>
                    <h3>{{ $w['title'] }}</h3><p class="bca-meta">{{ $w['cat'] }}, {{ $w['year'] }}</p>
                </button>
            </article>
            @endforeach
        </div>
        <p style="margin-top:2rem"><a class="bca-more" href="{{ $r('portofolio') }}">{{ $c['home']['portfolio']['cta'] }}</a></p>
    </div>
</section>

<section class="bca-sec bca-sec--dark">
    <div class="bca-wrap bca-split bca-split--l">
        <figure data-rv><img src="{{ $img('studio-desk.svg') }}" alt="Meja studio dengan buku sketsa, kartu warna, secangkir kopi, pensil, dan penggaris" width="1000" height="800" loading="lazy"></figure>
        <div data-rv>
            <h2 class="bca-h2">{{ $c['home']['appointment']['title'] }}</h2>
            <p class="bca-lead" style="margin:1rem 0 1.5rem">{{ $c['home']['appointment']['text'] }}</p>
            <ul class="bca-checks">@foreach($c['appointment']['types'] as $t)<li><strong>{{ $t['t'] }}</strong>, {{ $t['dur'] }}</li>@endforeach</ul>
            <p style="margin:1.5rem 0">Slot terdekat: <span class="bca-next" data-bca-next data-slot="{{ $c['appointment']['slots'][0] }}">memuat jadwal</span></p>
            <a class="bca-btn bca-btn--sun" href="{{ $r('janji') }}">{{ $c['home']['appointment']['cta'] }}</a>
        </div>
    </div>
</section>

<section class="bca-sec">
    <div class="bca-wrap bca-split">
        <div data-rv>
            <h2 class="bca-h2">{{ $c['home']['lead']['title'] }}</h2>
            <p class="bca-lead" style="margin-top:1rem">{{ $c['home']['lead']['text'] }}</p>
            <ul class="bca-checks" style="margin-top:1.25rem">@foreach($c['lead']['checklist'] as $l)<li>{{ $l }}</li>@endforeach</ul>
        </div>
        <form class="bca-miniform" method="get" action="{{ $r('brief') }}" data-rv>
            <label>Nama<input type="text" name="nama" autocomplete="name" required></label>
            <label>WhatsApp<input type="tel" name="whatsapp" autocomplete="tel" inputmode="tel" required></label>
            <label>Kebutuhan utama
                <select name="layanan"><option value="">Pilih layanan</option>@foreach($c['lead']['services'] as $o)<option>{{ $o }}</option>@endforeach</select>
            </label>
            <button class="bca-btn bca-btn--solid" type="submit">{{ $c['home']['lead']['cta'] }}</button>
        </form>
    </div>
</section>

<section class="bca-sec bca-sec--terra">
    <div class="bca-wrap bca-aigrid">
        <div data-rv>
            <div class="bca-bigp">{!! $c['mascot'] !!}</div>
            <h2 class="bca-h2">{{ $c['home']['ai']['title'] }}</h2>
            <p class="bca-lead" style="margin:1rem 0 1.75rem">{{ $c['home']['ai']['text'] }}</p>
            <button class="bca-btn bca-btn--sun" type="button" data-bca-chat-open>{{ $c['home']['ai']['cta'] }}</button>
        </div>
        <div class="bca-mock" data-rv aria-hidden="true">
            <div class="bca-msg bca-msg--me">{{ $c['faq']['items'][3]['q'] }}</div>
            <div class="bca-msg">{{ $c['faq']['items'][3]['a'] }}</div>
            <div class="bca-msg bca-msg--me">{{ $c['faq']['items'][2]['q'] }}</div>
        </div>
    </div>
</section>
@endif

{{-- ===================== LAYANAN ===================== --}}
@if($page === 'layanan')
<section class="bca-sec">
    <div class="bca-wrap">
        <ul class="bca-dos">
            @foreach($c['services']['items'] as $s)
            <li style="--c:{{ $s['c'] }}" data-rv>
                <h3>{{ $s['t'] }}</h3>
                <p>{{ $s['d'] }}</p>
                <ul class="bca-tags">@foreach($s['list'] as $l)<li>{{ $l }}</li>@endforeach</ul>
                <div><span class="bca-price">mulai {{ $s['price'] }}</span><small>{{ $s['time'] }}</small></div>
            </li>
            @endforeach
        </ul>
        <p style="margin-top:2.5rem"><a class="bca-btn bca-btn--solid" href="{{ $r('janji') }}">Konsultasikan layanan</a></p>
    </div>
</section>
@endif

{{-- ===================== KEAHLIAN ===================== --}}
@if($page === 'keahlian')
<section class="bca-sec bca-sec--plaster">
    <div class="bca-wrap bca-split">
        <figure class="bca-venn" data-rv><img src="{{ $img('expertise-venn.svg') }}" alt="{{ $c['expertise']['img_alt'] }}" width="800" height="800"></figure>
        <div class="bca-skills" data-rv>
            @foreach($c['expertise']['skills'] as $s)
            <div class="bca-skill"><div><span>{{ $s['t'] }}</span><span>{{ $s['v'] }}%</span></div><span class="bca-bar"><i style="--v:{{ $s['v'] / 100 }}"></i></span></div>
            @endforeach
        </div>
    </div>
</section>
<section class="bca-sec">
    <div class="bca-wrap">
        <div class="bca-xcards" data-rv>
            @foreach($c['expertise']['cards'] as $x)
            <article class="bca-xcard"><h3>{{ $x['t'] }}</h3><p>{{ $x['d'] }}</p><ul class="bca-tags">@foreach($x['tools'] as $t)<li>{{ $t }}</li>@endforeach</ul></article>
            @endforeach
        </div>
    </div>
</section>
<section class="bca-sec bca-sec--plaster">
    <div class="bca-wrap">
        <h2 class="bca-h2" style="margin-bottom:2rem" data-rv>Industri yang pernah kami temani</h2>
        <ul class="bca-inds" data-rv>@foreach($c['expertise']['industries'] as $n)<li>{{ $n }}</li>@endforeach</ul>
    </div>
</section>
<section class="bca-sec">
    <div class="bca-wrap bca-split bca-split--l">
        <h2 class="bca-h2" data-rv>Penghargaan dan pengakuan</h2>
        <ul class="bca-awards" data-rv>@foreach($c['expertise']['awards'] as $a)<li><strong>{{ $a['y'] }}</strong><span style="color:var(--pinus);font-weight:700">{{ $a['n'] }}</span><span>Proyek {{ $a['p'] }}</span></li>@endforeach</ul>
    </div>
</section>
@endif

{{-- ===================== HARGA & KONSULTASI ===================== --}}
@if($page === 'harga')
<section class="bca-sec">
    <div class="bca-wrap">
        <div class="bca-tks">
            @foreach($c['pricing']['plans'] as $p)
            <article class="bca-tk {{ $p['hot'] ? 'bca-tk--hot' : '' }}" data-rv>
                @if($p['hot'])<span class="bca-tk__badge">Paling dipilih</span>@endif
                <h3>{{ $p['n'] }}</h3>
                <p>{{ $p['d'] }}</p>
                <div class="bca-tk__price">{{ $p['price'] }}<small>{{ $p['unit'] }}</small></div>
                <div class="bca-tk__sep"></div>
                <ul class="bca-tk__list">@foreach($p['list'] as $l)<li>{{ $l }}</li>@endforeach</ul>
                <a class="bca-btn {{ $p['hot'] ? 'bca-btn--sun' : 'bca-btn--ghost' }}" href="{{ $r('janji') }}">Konsultasikan paket ini</a>
            </article>
            @endforeach
        </div>
        <div class="bca-consult" data-rv>
            <div class="bca-consult__body">
                <h2 class="bca-h2">{{ $c['pricing']['consult']['title'] }}</h2>
                <p>{{ $c['pricing']['consult']['text'] }}</p>
                <ul class="bca-pts">@foreach($c['pricing']['consult']['points'] as $t)<li>{{ $t }}</li>@endforeach</ul>
                <a class="bca-btn bca-btn--dark" href="{{ $r('janji') }}">{{ $c['pricing']['consult']['cta'] }}</a>
            </div>
            <img src="{{ $img('studio-desk.svg') }}" alt="Meja studio untuk sesi konsultasi" width="1000" height="800" loading="lazy">
        </div>
    </div>
</section>
<section class="bca-sec bca-sec--plaster">
    <div class="bca-wrap">
        <h2 class="bca-h2" style="margin-bottom:2rem" data-rv>Perbandingan paket</h2>
        <div class="bca-tablewrap" data-rv>
            <table class="bca-table">
                <thead><tr><th scope="col">Cakupan</th>@foreach($c['pricing']['cols'] as $n)<th scope="col">{{ $n }}</th>@endforeach</tr></thead>
                <tbody>@foreach($c['pricing']['rows'] as $row)<tr><th scope="row" style="font-weight:600">{{ $row['t'] }}</th>@foreach($row['v'] as $v)<td>{{ $v }}</td>@endforeach</tr>@endforeach</tbody>
            </table>
        </div>
    </div>
</section>
<section class="bca-sec">
    <div class="bca-wrap bca-split">
        <div data-rv><h2 class="bca-h2" style="margin-bottom:1.5rem">Tambahan opsional</h2><ul class="bca-addons">@foreach($c['pricing']['addons'] as $a)<li><span>{{ $a['t'] }}</span><strong>{{ $a['p'] }}</strong></li>@endforeach</ul></div>
        <div data-rv><h2 class="bca-h2" style="margin-bottom:1.5rem">Ketentuan pembayaran</h2><ul class="bca-terms">@foreach($c['pricing']['terms'] as $t)<li>{{ $t }}</li>@endforeach</ul></div>
    </div>
</section>
@endif

{{-- ===================== PORTOFOLIO ===================== --}}
@if($page === 'portofolio')
<section class="bca-sec">
    <div class="bca-wrap">
        <div class="bca-tabs" data-bca-filter role="group" aria-label="Saring proyek">
            <button class="bca-tab" type="button" data-f="all" aria-pressed="true">Semua</button>
            @foreach($c['portfolio']['cats'] as $k)<button class="bca-tab" type="button" data-f="{{ $k }}" aria-pressed="false">{{ $k }}</button>@endforeach
        </div>
        <div class="bca-pws">
            @foreach($c['portfolio']['items'] as $w)
            <article class="bca-pw" data-cat="{{ $w['cat'] }}" data-item data-title="{{ $w['title'] }}" data-meta="{{ $w['cat'] }}, {{ $w['client'] }}, {{ $w['year'] }}" data-desc="{{ $w['desc'] }}" data-rv>
                <figure><img src="{{ $img($w['img']) }}" alt="Karya {{ $w['title'] }}" width="800" height="1000" loading="lazy"></figure>
                <div class="bca-pw__t">
                    <p class="bca-meta">{{ $w['cat'] }}, {{ $w['year'] }}</p>
                    <h3>{{ $w['title'] }}</h3>
                    <p class="bca-lead">{{ $w['desc'] }}</p>
                    <p><strong>Klien:</strong> {{ $w['client'] }}<br><strong>Peran:</strong> {{ $w['role'] }}</p>
                    <button class="bca-more" type="button" data-lb style="background:none;border-top:0;border-left:0;border-right:0">Lihat lebih besar</button>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================== JANJI TEMU ===================== --}}
@if($page === 'janji')
<section class="bca-sec bca-sec--plaster">
    <div class="bca-wrap">
        <form class="bca-booking" method="post" action="{{ $c['appointment']['action'] }}" novalidate data-bca-form data-bca-booking data-topic="membuat janji temu konsultasi" data-brand="{{ $c['brand']['name'] }}" data-wa="https://wa.me/{{ $c['brand']['whatsapp'] }}" data-slots="{{ json_encode($c['appointment']['slots'], 257) }}">
            @csrf
            <div class="bca-fm bca-fm--panel">
                <div class="bca-ok" role="status" tabindex="-1" hidden>Terima kasih. WhatsApp akan terbuka dengan pesan jadwal yang siap dikirim. Jika tidak terbuka, <a data-wa-fallback href="#" target="_blank" rel="noopener">klik di sini</a>.</div>
                <fieldset class="bca-fs"><legend>Jenis konsultasi</legend>
                    <div class="bca-opts bca-opts--3">
                        @foreach($c['appointment']['types'] as $i => $t)
                        <label class="bca-opt"><input type="radio" name="jenis" value="{{ $t['t'] }}" {{ $i == 0 ? 'checked' : '' }}><span class="bca-opt__c"><strong>{{ $t['t'] }}</strong><small>{{ $t['dur'] }}</small><small>{{ $t['d'] }}</small></span></label>
                        @endforeach
                    </div>
                </fieldset>
                <fieldset class="bca-fs"><legend>Cara bertemu</legend>
                    <div class="bca-chips">
                        @foreach($c['appointment']['modes'] as $i => $m)
                        <label class="bca-opt bca-opt--chip"><input type="radio" name="mode" value="{{ $m }}" {{ $i == 0 ? 'checked' : '' }}><span class="bca-opt__c">{{ $m }}</span></label>
                        @endforeach
                    </div>
                </fieldset>
                <fieldset class="bca-fs"><legend>Pilih tanggal</legend>
                    <div class="bca-dates" data-bca-dates></div>
                    <input type="hidden" name="tanggal" value=""><span class="bca-err" aria-live="polite"></span>
                </fieldset>
                <fieldset class="bca-fs"><legend>Pilih jam (WIB)</legend>
                    <div class="bca-slots" data-bca-slots></div>
                    <input type="hidden" name="waktu" value=""><span class="bca-err" aria-live="polite"></span>
                    <noscript><p>Aktifkan JavaScript untuk memilih jadwal, atau hubungi kami lewat WhatsApp.</p></noscript>
                </fieldset>
                <fieldset class="bca-fs"><legend>Data Anda</legend>
                    <div class="bca-row">
                        <label class="bca-field">Nama<input type="text" name="nama" autocomplete="name" required><span class="bca-err" aria-live="polite"></span></label>
                        <label class="bca-field">WhatsApp<input type="tel" name="whatsapp" autocomplete="tel" inputmode="tel" required><span class="bca-err" aria-live="polite"></span></label>
                    </div>
                    <label class="bca-field">Email<input type="email" name="email" autocomplete="email"><span class="bca-err" aria-live="polite"></span></label>
                    <label class="bca-field">Catatan untuk konsultan<textarea name="catatan"></textarea></label>
                </fieldset>
            </div>
            <aside class="bca-sum" aria-label="Ringkasan janji temu">
                <img src="{{ $img('studio-desk.svg') }}" alt="" width="1000" height="800" loading="lazy">
                <h2>Ringkasan jadwal</h2>
                <dl>
                    <div><dt>Jenis</dt><dd data-sum="jenis">-</dd></div>
                    <div><dt>Durasi</dt><dd data-sum="dur">-</dd></div>
                    <div><dt>Cara</dt><dd data-sum="mode">-</dd></div>
                    <div><dt>Tanggal</dt><dd data-sum="tanggal">Belum dipilih</dd></div>
                    <div><dt>Jam</dt><dd data-sum="waktu">Belum dipilih</dd></div>
                </dl>
                <p style="font-size:.9rem;opacity:.8">{{ $c['appointment']['note'] }}</p>
                <button class="bca-btn bca-btn--sun" type="submit">Kirim jadwal lewat WhatsApp</button>
            </aside>
        </form>
    </div>
</section>
@endif

{{-- ===================== LEAD FORM / BRIEF ===================== --}}
@if($page === 'brief')
<section class="bca-sec bca-sec--plaster">
    <div class="bca-wrap bca-split bca-split--l" style="align-items:start">
        <div class="bca-aside" data-rv>
            <h2 class="bca-h2">Yang membantu kami memulai</h2>
            <ul class="bca-checks">@foreach($c['lead']['checklist'] as $l)<li>{{ $l }}</li>@endforeach</ul>
            <img src="{{ $img('studio-desk.svg') }}" alt="Meja kerja studio Senja Atelier" width="1000" height="800" loading="lazy">
            <p>Lebih suka bicara langsung? <a class="bca-more" href="{{ $r('janji') }}">Buat janji temu</a></p>
        </div>
        <form class="bca-fm bca-fm--panel" method="post" action="{{ $c['lead']['action'] }}" novalidate data-bca-form data-topic="mengirim brief proyek" data-brand="{{ $c['brand']['name'] }}" data-wa="https://wa.me/{{ $c['brand']['whatsapp'] }}" data-rv>
            @csrf
            <div class="bca-ok" role="status" tabindex="-1" hidden>Terima kasih. WhatsApp akan terbuka dengan brief Anda yang siap dikirim. Jika tidak terbuka, <a data-wa-fallback href="#" target="_blank" rel="noopener">klik di sini</a>.</div>
            <div class="bca-row">
                <label class="bca-field">Nama<input type="text" name="nama" autocomplete="name" required><span class="bca-err" aria-live="polite"></span></label>
                <label class="bca-field">Email<input type="email" name="email" autocomplete="email" required><span class="bca-err" aria-live="polite"></span></label>
            </div>
            <div class="bca-row">
                <label class="bca-field">WhatsApp<input type="tel" name="whatsapp" autocomplete="tel" inputmode="tel" required><span class="bca-err" aria-live="polite"></span></label>
                <label class="bca-field">Nama brand atau usaha<input type="text" name="brand" autocomplete="organization"></label>
            </div>
            <label class="bca-field">Industri<select name="industri"><option value="">Pilih industri</option>@foreach($c['lead']['industries'] as $o)<option>{{ $o }}</option>@endforeach</select></label>
            <fieldset class="bca-fs" data-req-one><legend>Layanan yang dibutuhkan</legend>
                <div class="bca-chips">@foreach($c['lead']['services'] as $o)<label class="bca-opt bca-opt--chip"><input type="checkbox" name="layanan[]" value="{{ $o }}"><span class="bca-opt__c">{{ $o }}</span></label>@endforeach</div>
                <span class="bca-err" aria-live="polite"></span>
            </fieldset>
            <div class="bca-row">
                <label class="bca-field">Kisaran anggaran<select name="anggaran"><option value="">Belum ditentukan</option>@foreach($c['lead']['budgets'] as $o)<option>{{ $o }}</option>@endforeach</select></label>
                <label class="bca-field">Rencana mulai<select name="mulai"><option value="">Pilih waktu</option>@foreach($c['lead']['starts'] as $o)<option>{{ $o }}</option>@endforeach</select></label>
            </div>
            <label class="bca-field">Ceritakan proyek Anda<textarea name="deskripsi" required></textarea><span class="bca-err" aria-live="polite"></span></label>
            <label class="bca-field">Tautan referensi (opsional)<input type="url" name="referensi" placeholder="https://"></label>
            <button class="bca-btn bca-btn--solid" type="submit">Kirim brief lewat WhatsApp</button>
            <p class="bca-fnote">Brief dikirim ke tim kami lewat WhatsApp. Data Anda hanya dipakai untuk membalas permintaan ini.</p>
        </form>
    </div>
</section>
@endif
<!--/bca-main-->
</main>

{{-- FOOTER --}}
<footer class="bca-footer">
    <div class="bca-wrap">
        <div class="bca-footer__cta">
            <h2>Mari rancang merek yang hangat.</h2>
            <div class="bca-footer__act">
                <a class="bca-btn bca-btn--sun" href="{{ $r('janji') }}">Jadwalkan konsultasi</a>
                <a class="bca-btn bca-btn--ghost" href="https://wa.me/{{ $c['brand']['whatsapp'] }}?text={{ rawurlencode($c['brand']['wa_text']) }}" target="_blank" rel="noopener">Chat WhatsApp</a>
            </div>
        </div>
        <div class="bca-footer__grid">
            <div class="bca-footer__about">
                <a class="bca-logo bca-logo--light" href="{{ $r('home') }}" aria-label="{{ $c['brand']['name'] }}, ke beranda"><svg class="bca-logo__mark" viewBox="0 0 40 40" aria-hidden="true"><rect width="40" height="40" fill="#B05237"/><g class="sun"><circle cx="20" cy="19" r="9" fill="#EDB85A"/></g><path class="h1" d="M0 28c7-5 13-5 20 0s13 5 20 0v12H0Z"/><path class="h2" d="M0 33c7-4 13-4 20 0s13 4 20 0v7H0Z"/></svg><span class="bca-logo__t"><span class="bca-logo__n">{{ $c['brand']['short'] }}</span><span class="bca-logo__s">{{ $c['brand']['sub'] }}</span></span></a>
                <p>{{ $c['brand']['tagline'] }} dari Yogyakarta. Kami merancang identitas, kemasan, dan kampanye yang hangat dan diingat.</p>
            </div>
            <nav aria-label="Navigasi footer"><h3>Jelajahi</h3><ul class="bca-flinks">@foreach($c['footnav'] as $k)<li><a href="{{ $r($k) }}">{{ $c['pages'][$k]['label'] }}</a></li>@endforeach</ul></nav>
            <div>
                <h3>Hubungi</h3>
                <ul class="bca-fcontact">
                    <li><small>Email</small><a href="mailto:{{ $c['brand']['email'] }}">{{ $c['brand']['email'] }}</a></li>
                    <li><small>WhatsApp</small><a href="https://wa.me/{{ $c['brand']['whatsapp'] }}" target="_blank" rel="noopener">{{ $c['brand']['phone'] }}</a></li>
                    <li><small>Studio</small>{{ $c['brand']['address'] }}</li>
                    <li><small>Jam kerja</small>{{ $c['brand']['hours'] }}</li>
                </ul>
            </div>
        </div>
    </div>
    <p class="bca-footer__word" aria-hidden="true">{{ $c['brand']['short'] }}</p>
    <div class="bca-footer__credit"><div class="bca-wrap"><p>© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p><button class="bca-top" type="button" data-top>Kembali ke atas</button></div></div>
</footer>

{{-- DETAIL PROYEK --}}
<dialog class="bca-lb" id="bca-lb" aria-label="Detail proyek">
    <div class="bca-lb__in">
        <img src="" alt="" width="800" height="1000">
        <div class="bca-lb__t"><p class="bca-meta"></p><h2></h2><p class="bca-lead"></p><a class="bca-btn bca-btn--solid" href="{{ $r('brief') }}">Mulai proyek serupa</a></div>
    </div>
    <button class="bca-lb__x" type="button" aria-label="Tutup" data-lb-close>×</button>
</dialog>

{{-- WHATSAPP + ASISTEN AI --}}
<div class="bca-fab">
    <a class="bca-wa" href="https://wa.me/{{ $c['brand']['whatsapp'] }}?text={{ rawurlencode($c['brand']['wa_text']) }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp ke {{ $c['brand']['phone'] }}">
        <span class="bca-wa__ic" aria-hidden="true"><svg viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.8" d="M12 3a9 9 0 0 0-7.800 13.500L3 21l4.600-1.200A9 9 0 1 0 12 3z"/><path fill="currentColor" d="M17.500 14.400c-.3-.1-1.700-.8-2-.9-.3-.1-.5-.1-.7.1l-.9 1.100c-.2.2-.3.2-.6.1a7 7 0 0 1-3.500-3c-.3-.4.3-.4.8-1.400.1-.2 0-.4 0-.5l-.9-2c-.2-.5-.4-.4-.6-.4h-.5a1 1 0 0 0-.7.3 3 3 0 0 0-.9 2.200 5.200 5.200 0 0 0 1.100 2.700 11.900 11.900 0 0 0 4.600 4.100c1.700.7 2.400.8 3.200.7a2.700 2.700 0 0 0 1.800-1.300 2.200 2.200 0 0 0 .2-1.300c-.1-.1-.3-.2-.6-.3z"/></svg></span>
        <span class="bca-wa__t"><strong>Chat WhatsApp</strong><small>Biasanya balas dalam 1 jam</small></span>
    </a>
    <button class="bca-bot" type="button" aria-expanded="false" aria-controls="bca-chat" aria-label="Buka asisten AI Prisma" data-bca-chat-open>{!! $c['mascot'] !!}<span class="bca-bot__ai" aria-hidden="true">AI</span><span class="bca-bot__tip">Konsultasi dengan AI</span></button>
</div>
<section class="bca-chat" id="bca-chat" role="dialog" aria-label="Asisten AI {{ $c['brand']['name'] }}" data-wa="https://wa.me/{{ $c['brand']['whatsapp'] }}" data-u-layanan="{{ $r('layanan') }}" data-u-harga="{{ $r('harga') }}" data-u-janji="{{ $r('janji') }}" data-u-brief="{{ $r('brief') }}" hidden>
    <div class="bca-chat__head"><span class="bca-chat__av">{!! $c['mascot'] !!}</span><div><strong>{{ $c['faq']['bot']['name'] }}</strong><small>Asisten konsultasi AI, online</small></div><button class="bca-chat__x" type="button" aria-label="Tutup asisten" data-bca-chat-close>&times;</button></div>
    <div class="bca-chat__log" role="log" aria-live="polite"></div>
    <p class="bca-chat__lbl">Pertanyaan populer</p>
    <div class="bca-chat__chips"></div>
    <form class="bca-chat__form"><input type="text" placeholder="{{ $c['faq']['bot']['placeholder'] }}" aria-label="Pertanyaan Anda" maxlength="200" autocomplete="off"><button type="submit" aria-label="Kirim pertanyaan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg></button></form>
    <p class="bca-chat__wa">Lebih suka bicara dengan tim? <a href="https://wa.me/{{ $c['brand']['whatsapp'] }}" target="_blank" rel="noopener">Chat WhatsApp</a></p>
</section>
<script type="application/json" id="bca-faq-data">{!! json_encode($c['faq'], 257) !!}</script>
<script src="{{ $js }}" defer></script>
</body>
</html>
