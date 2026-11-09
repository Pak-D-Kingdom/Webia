@php
    $dir = 'website-bisnis/template/wedding-event/bold/event-organizer-sunset-gradient';
    $img = fn ($f) => asset("images/{$dir}/{$f}");
    $u   = fn ($p = null) => $p ? route('webia.event-organizer', ['page' => $p]) : route('webia.event-organizer');
    $cur = $page ?: 'beranda';
    $ct  = $c['contact'];
    $tel = preg_replace('/[^\d+]/', '', $ct['phone']);
    $wa  = 'https://wa.me/' . $ct['wa'] . '?text=' . rawurlencode('Halo Eventora, saya ingin bertanya tentang layanan event.');

    $I = [
        'pin'    => '<path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>',
        'phone'  => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/>',
        'mail'   => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'ig'     => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.5 6.5h.01"/>',
        'yt'     => '<rect x="2" y="5" width="20" height="14" rx="4"/><path d="M10 9l5 3-5 3z" fill="currentColor"/>',
        'tt'     => '<path d="M9 12a4 4 0 1 0 4 4V3a5 5 0 0 0 5 5"/>',
        'in'     => '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2zM4 2a2 2 0 1 1 0 4 2 2 0 0 1 0-4z"/>',
        'wa'     => '<path d="M3 21l1.7-5A8.5 8.5 0 1 1 8 19.3L3 21z"/><path d="M9 9c0 3 3 6 6 6l1.5-1.5-2-1-1 .8c-1-.4-2-1.4-2.4-2.4l.8-1-1-2L9 9z"/>',
        'search' => '<circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/>',
        'chat'   => '<path d="M21 12a8 8 0 0 1-11.5 7.2L3 21l1.8-5.5A8 8 0 1 1 21 12z"/>',
        'cal'    => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
        'brief'  => '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        'users'  => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8"/>',
        'star'   => '<path d="M12 2l3.1 6.3 6.9 1-5 4.8 1.2 6.9L12 17.8 5.8 21l1.2-6.9-5-4.8 6.9-1z"/>',
        'arrow'  => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'play'   => '<path d="M8 5l11 7-11 7z" fill="currentColor"/>',
        'chev'   => '<path d="m9 6 6 6-6 6"/>',
        'left'   => '<path d="m15 6-6 6 6 6"/>',
        'right'  => '<path d="m9 6 6 6-6 6"/>',
        'check'  => '<path d="M20 6 9 17l-5-5"/>',
        'x'      => '<path d="M18 6 6 18M6 6l12 12"/>',
        'send'   => '<path d="M22 2 11 13M22 2l-7 20-4-9-9-4z"/>',
        'pen'    => '<path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/>',
        'box'    => '<path d="M21 8l-9-5-9 5v8l9 5 9-5zM3 8l9 5 9-5M12 13v9"/>',
        'spark'  => '<path d="M12 3l1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8z"/>',
    ];
    $ic = fn ($n, $cl = '') => new \Illuminate\Support\HtmlString(
        '<svg class="ic ' . $cl . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $I[$n] . '</svg>'
    );

    $chatData = [
        'wa'   => $ct['wa'],
        'faq'  => array_map(fn ($f) => ['q' => $f[0], 'k' => $f[1], 'a' => $f[2], 'url' => $u($f[3])], $c['faq']),
    ];
    $cats = array_values(array_unique(array_column($c['portfolio'], 2)));
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page ? $c['pages'][$page][1] . ' — ' : '' }}Eventora · Event Organizer &amp; Planner</title>
    <meta name="description" content="Eventora — event organizer profesional untuk wedding, corporate event, konser, dan pameran.">
    <link rel="icon" type="image/svg+xml" href="{{ $img('logo-mark.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Playfair+Display:wght@700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/' . $dir . '/event-organizer.css') }}">
</head>
<body class="eo eo-{{ $cur }}">
<a class="skip" href="#main">Lewati ke konten</a>

{{-- ============ TOPBAR ============ --}}
<div class="topbar">
    <div class="wrap topbar-in">
        <ul class="tb-info">
            <li>{{ $ic('pin') }}<span>{{ $ct['city'] }}</span></li>
            <li><a href="tel:{{ $tel }}">{{ $ic('phone') }}<span>{{ $ct['phone'] }}</span></a></li>
            <li><a href="mailto:{{ $ct['email'] }}">{{ $ic('mail') }}<span>{{ $ct['email'] }}</span></a></li>
        </ul>
        <div class="tb-right">
            <ul class="socials">
                @foreach (['ig' => 'Instagram', 'yt' => 'YouTube', 'tt' => 'TikTok', 'in' => 'LinkedIn'] as $k => $name)
                    <li><a href="#" aria-label="{{ $name }}">{{ $ic($k) }}</a></li>
                @endforeach
            </ul>
            <span class="lang">ID <svg class="ic xs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg></span>
        </div>
    </div>
</div>

<div class="stage">
    {{-- ============ NAVBAR ============ --}}
    <header class="nav" id="nav">
        <div class="wrap nav-in">
            <a class="brand" href="{{ $u() }}" aria-label="Eventora — beranda">
                <img src="{{ $img('logo-mark.svg') }}" alt="" width="46" height="46">
                <span><b>Eventora</b><small>Event Organizer &amp; Planner</small></span>
            </a>
            <nav class="menu" id="menu" aria-label="Menu utama">
                <a href="{{ $u() }}" @class(['is-on' => $cur === 'beranda'])>Beranda</a>
                @foreach ($c['nav'] as $slug)
                    <a href="{{ $u($slug) }}" @class(['is-on' => $cur === $slug])>{{ $c['pages'][$slug][0] }}</a>
                @endforeach
                <a class="btn btn-sun menu-cta" href="{{ $u('penawaran') }}">Dapatkan Penawaran {{ $ic('arrow') }}</a>
            </nav>
            <div class="nav-act">
                <button class="icon-btn" type="button" data-chat-open aria-label="Cari jawaban di FAQ event">{{ $ic('search') }}</button>
                <a class="btn btn-sun nav-cta" href="{{ $u('penawaran') }}">Dapatkan Penawaran {{ $ic('arrow') }}</a>
                <button class="burger" id="burger" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="menu"><span></span><span></span><span></span></button>
            </div>
        </div>
    </header>

    {{-- ============ HERO / PAGE HEAD ============ --}}
    @if (! $page)
        <section class="hero" aria-labelledby="hero-title">
            <div class="hero-media" aria-hidden="true"><img src="{{ $img('hero-ballroom.svg') }}" alt="" width="1600" height="900" fetchpriority="high"></div>
            <div class="sparks" data-sparks aria-hidden="true"></div>
            <div class="wrap hero-grid">
                <div class="hero-copy">
                    <p class="kicker">CREATE • PLAN • CELEBRATE</p>
                    <h1 id="hero-title">Your Perfect Event<br><span class="grad">Our Expertise</span></h1>
                    <p class="lead">Wujudkan acara impian Anda dengan layanan event organizer profesional, kreatif, dan penuh dedikasi.</p>
                    <ul class="chips">
                        @foreach ($c['chips'] as $chip)
                            <li>{{ $ic($chip[0]) }}<span>{{ $chip[1] }}<br>{{ $chip[2] }}</span></li>
                        @endforeach
                    </ul>
                    <div class="hero-cta">
                        <a class="btn btn-sun btn-lg" href="{{ $u('layanan') }}">Jelajahi Layanan {{ $ic('arrow') }}</a>
                        <a class="play" href="{{ $u('portofolio') }}"><i>{{ $ic('play') }}</i><span>Tonton Profil Kami</span></a>
                    </div>
                </div>

                <aside class="ai-panel" aria-label="AI Assistant">
                    <div class="ai-top">
                        <div class="ai-bubble"><strong>{{ $ic('spark', 'sm') }} AI Assistant</strong><span>Ada yang bisa kami bantu tentang event Anda?</span></div>
                        <img class="ai-bot" src="{{ $img('robot.svg') }}" alt="Maskot robot AI Eventora" width="150" height="150">
                    </div>
                    <ul class="ai-list">
                        @foreach ($c['faq'] as $i => $f)
                            <li><button type="button" data-faq="{{ $i }}"><i>{{ $ic('brief') }}</i><span>{{ $f[0] }}</span>{{ $ic('chev', 'xs') }}</button></li>
                        @endforeach
                    </ul>
                    <button class="btn btn-sun ai-cta" type="button" data-chat-open>Chat Sekarang {{ $ic('arrow') }}</button>
                </aside>
            </div>
        </section>
    @else
        <section class="pagehead">
            <div class="sparks" data-sparks aria-hidden="true"></div>
            <div class="wrap">
                <p class="crumb"><a href="{{ $u() }}">Beranda</a> <span>/</span> {{ $c['pages'][$page][0] }}</p>
                <h1>{{ $c['pages'][$page][1] }}</h1>
                <p class="lead">{{ $c['pages'][$page][2] }}</p>
            </div>
        </section>
    @endif
</div>

{{-- ============ MAIN ============ --}}
<main id="main" class="wrap {{ $page ? 'inner' : 'home' }}">
@if (! $page)

    <div class="row-a">
        <section class="card card-svc" aria-labelledby="h-svc">
            <header class="card-h">
                <div><h2 id="h-svc">Layanan Event</h2><p>Solusi lengkap untuk setiap acara spesial Anda.</p></div>
                <a class="more" href="{{ $u('layanan') }}">Lihat Semua Layanan {{ $ic('arrow', 'xs') }}</a>
            </header>
            <div class="svc-tiles">
                @foreach ($c['services'] as $s)
                    <a class="tile" href="{{ $u('layanan') }}">
                        <img src="{{ $img($s['img']) }}" alt="{{ $s['title'] }}" width="480" height="560" loading="lazy">
                        <span class="tile-l">{{ $s['title'] }}</span>
                        <i class="go">{{ $ic('arrow', 'xs') }}</i>
                    </a>
                @endforeach
            </div>
        </section>

        <section class="card card-port" aria-labelledby="h-port">
            <header class="card-h">
                <div><h2 id="h-port">Portofolio Kami</h2><p>Berbagai acara sukses yang telah kami selenggarakan.</p></div>
                <a class="more" href="{{ $u('portofolio') }}">Lihat Semua Portofolio {{ $ic('arrow', 'xs') }}</a>
            </header>
            <div class="slider" data-slider>
                @foreach (array_slice($c['portfolio'], 0, 4) as $i => $p)
                    <figure class="slide {{ $i === 0 ? 'is-on' : '' }}">
                        <img src="{{ $img($p[3]) }}" alt="{{ $p[0] }}" width="1000" height="560" loading="lazy">
                        <figcaption><b>{{ $p[0] }}</b><span>{{ $p[1] }}</span></figcaption>
                    </figure>
                @endforeach
                <button class="sl-btn prev" type="button" data-prev aria-label="Sebelumnya">{{ $ic('left') }}</button>
                <button class="sl-btn next" type="button" data-next aria-label="Berikutnya">{{ $ic('right') }}</button>
                <a class="btn btn-sun sl-detail" href="{{ $u('portofolio') }}">Lihat Detail {{ $ic('arrow', 'xs') }}</a>
            </div>
        </section>

        <section class="card card-pack" aria-labelledby="h-pack">
            <img class="pack-img" src="{{ $img('packages-corporate.svg') }}" alt="" width="900" height="560" loading="lazy">
            <div class="pack-in">
                <h2 id="h-pack">Paket Corporate &amp; Private Event</h2>
                <p>Pilihan paket eksklusif untuk acara perusahaan maupun acara pribadi Anda.</p>
                <a class="btn btn-sun" href="{{ $u('paket') }}">Lihat Paket {{ $ic('arrow', 'xs') }}</a>
            </div>
        </section>
    </div>

    <div class="row-b">
        <section class="card card-proc" aria-labelledby="h-proc">
            <div class="proc-h"><h2 id="h-proc">Proses Perencanaan Event</h2><p>Langkah mudah untuk mewujudkan acara impian Anda.</p></div>
            <ol class="proc-steps">
                @foreach ($c['process'] as $i => $st)
                    <li><span class="p-ico">{{ $ic($st[0]) }}<em>0{{ $i + 1 }}</em></span><b>{{ $st[1] }}</b><small>{{ $st[2] }}</small></li>
                @endforeach
            </ol>
            <a class="more" href="{{ $u('proses') }}">Lihat Proses {{ $ic('arrow', 'xs') }}</a>
        </section>

        <section class="card card-quote" aria-labelledby="h-quote">
            <div>
                <h2 id="h-quote">Minta Penawaran Sekarang</h2>
                <p>Dapatkan penawaran terbaik untuk acara Anda.</p>
                <a class="btn btn-gold" href="{{ $u('penawaran') }}">Hubungi Kami {{ $ic('arrow', 'xs') }}</a>
            </div>
            <img class="gift" src="{{ $img('gift.svg') }}" alt="" width="220" height="220" loading="lazy">
        </section>
    </div>

    <section class="card card-proj" aria-labelledby="h-proj">
        <header class="card-h">
            <div><h2 id="h-proj">Proyek Kami</h2><p>Acara-acara yang sudah kami wujudkan bersama klien.</p></div>
            <a class="more" href="{{ $u('proyek') }}">Lihat Semua Proyek {{ $ic('arrow', 'xs') }}</a>
        </header>
        <div class="proj-row">
            @foreach (array_slice($c['projects'], 0, 3) as $p)
                <a class="proj" href="{{ $u('proyek') }}">
                    <img src="{{ $img($p[5]) }}" alt="{{ $p[0] }}" width="1000" height="560" loading="lazy">
                    <span><b>{{ $p[0] }}</b><small>{{ $p[1] }} · {{ $p[2] }}</small></span>
                </a>
            @endforeach
        </div>
    </section>

    <section class="card card-cli" aria-labelledby="h-cli">
        <div class="cli-h">
            <h2 id="h-cli">Klien Kami</h2>
            <p>Dipercaya oleh berbagai perusahaan dan institusi ternama.</p>
            <a class="more" href="{{ $u('klien') }}">Lihat Semua Klien {{ $ic('arrow', 'xs') }}</a>
        </div>
        <ul class="logos">
            @foreach ($c['clients'] as $cl)
                <li><img src="{{ $img($cl[1]) }}" alt="{{ $cl[0] }}" width="160" height="64" loading="lazy"></li>
            @endforeach
        </ul>
    </section>

@elseif ($page === 'layanan')

    <div class="grid-4">
        @foreach ($c['services'] as $s)
            <article class="svc-card" data-reveal>
                <div class="svc-img"><img src="{{ $img($s['img']) }}" alt="{{ $s['title'] }}" width="480" height="560" loading="lazy"></div>
                <div class="svc-body">
                    <h2>{{ $s['title'] }}</h2>
                    <p>{{ $s['desc'] }}</p>
                    <ul class="ticks">@foreach ($s['features'] as $ft)<li>{{ $ic('check', 'xs') }}{{ $ft }}</li>@endforeach</ul>
                    <a class="btn btn-sun" href="{{ $u('penawaran') }}">Minta Penawaran {{ $ic('arrow', 'xs') }}</a>
                </div>
            </article>
        @endforeach
    </div>

@elseif ($page === 'portofolio')

    <div class="filters" role="group" aria-label="Filter portofolio">
        <button type="button" class="is-on" data-filter="all">Semua</button>
        @foreach ($cats as $cat)
            <button type="button" data-filter="{{ $cat }}">{{ $cat }}</button>
        @endforeach
    </div>
    <div class="gallery">
        @foreach ($c['portfolio'] as $p)
            <figure class="g-item" data-cat="{{ $p[2] }}" data-reveal>
                <img src="{{ $img($p[3]) }}" alt="{{ $p[0] }}" width="1000" height="560" loading="lazy">
                <figcaption><b>{{ $p[0] }}</b><span>{{ $p[1] }} · {{ $p[2] }}</span></figcaption>
            </figure>
        @endforeach
    </div>

@elseif ($page === 'paket')

    <div class="pack-grid">
        @foreach ($c['packages'] as $p)
            @php $feat = ! empty($p['featured']); @endphp
            <article class="pack-card {{ $feat ? 'is-feat' : '' }}" data-reveal>
                <h2>{{ $p['name'] }}</h2>
                <p class="for">{{ $p['for'] }}</p>
                <ul class="ticks">@foreach ($p['features'] as $ft)<li>{{ $ic('check', 'xs') }}{{ $ft }}</li>@endforeach</ul>
                <a class="btn {{ $feat ? 'btn-gold' : 'btn-sun' }}" href="{{ $u('penawaran') }}?paket={{ urlencode($p['name']) }}">Minta Penawaran {{ $ic('arrow', 'xs') }}</a>
            </article>
        @endforeach
    </div>

@elseif ($page === 'proyek')

    <div class="proj-list">
        @foreach ($c['projects'] as $p)
            <article class="proj-item" data-reveal>
                <img src="{{ $img($p[5]) }}" alt="{{ $p[0] }}" width="1000" height="560" loading="lazy">
                <div>
                    <h2>{{ $p[0] }}</h2>
                    <p>{{ $p[4] }}</p>
                    <dl><div><dt>Klien</dt><dd>{{ $p[1] }}</dd></div><div><dt>Tahun</dt><dd>{{ $p[2] }}</dd></div><div><dt>Lokasi</dt><dd>{{ $p[3] }}</dd></div></dl>
                </div>
            </article>
        @endforeach
    </div>

@elseif ($page === 'klien')

    <ul class="logos logos-lg">
        @foreach ($c['clients'] as $cl)
            <li data-reveal><img src="{{ $img($cl[1]) }}" alt="{{ $cl[0] }}" width="160" height="64" loading="lazy"></li>
        @endforeach
    </ul>

@elseif ($page === 'proses')

    <ol class="steps-v">
        @foreach ($c['process'] as $i => $st)
            <li data-reveal>
                <span class="p-ico">{{ $ic($st[0]) }}<em>0{{ $i + 1 }}</em></span>
                <div><h2>{{ $st[1] }}</h2><p class="sub">{{ $st[2] }}</p><p>{{ $st[3] }}</p></div>
            </li>
        @endforeach
    </ol>
    <p class="center"><a class="btn btn-sun btn-lg" href="{{ $u('penawaran') }}">Mulai Konsultasi {{ $ic('arrow', 'xs') }}</a></p>

@elseif ($page === 'penawaran')

    <div class="quote-grid">
        <form class="qform" id="qform" novalidate data-wa="{{ $ct['wa'] }}">
            <div class="f"><label for="q-nama">Nama lengkap</label><input id="q-nama" name="nama" type="text" required autocomplete="name"></div>
            <div class="f"><label for="q-hp">Nomor WhatsApp</label><input id="q-hp" name="hp" type="tel" required autocomplete="tel" inputmode="tel"></div>
            <div class="f"><label for="q-email">Email</label><input id="q-email" name="email" type="email" autocomplete="email"></div>
            <div class="f"><label for="q-jenis">Jenis acara</label>
                <select id="q-jenis" name="jenis" required>
                    <option value="">Pilih jenis acara</option>
                    @foreach ($c['event_types'] as $t)<option>{{ $t }}</option>@endforeach
                </select></div>
            <div class="f"><label for="q-paket">Paket</label>
                <select id="q-paket" name="paket">
                    <option value="">Belum menentukan</option>
                    @foreach ($c['packages'] as $p)<option>{{ $p['name'] }}</option>@endforeach
                </select></div>
            <div class="f"><label for="q-tgl">Tanggal acara</label><input id="q-tgl" name="tgl" type="date"></div>
            <div class="f"><label for="q-tamu">Perkiraan jumlah tamu</label><input id="q-tamu" name="tamu" type="number" min="1" inputmode="numeric"></div>
            <div class="f"><label for="q-lokasi">Lokasi acara</label><input id="q-lokasi" name="lokasi" type="text"></div>
            <div class="f full"><label for="q-pesan">Catatan</label><textarea id="q-pesan" name="pesan" rows="4"></textarea></div>
            <div class="f full">
                <button class="btn btn-sun btn-lg" type="submit">Kirim lewat WhatsApp {{ $ic('send', 'xs') }}</button>
                <p class="note" id="qnote" role="status"></p>
            </div>
        </form>
        <aside class="qside">
            <img src="{{ $img('gift.svg') }}" alt="" width="220" height="220" loading="lazy">
            <h2>Minta Penawaran Sekarang</h2>
            <p>Isi detail acara Anda. Pesan akan terbuka di WhatsApp dan tim kami membalas secepatnya.</p>
            <ul class="f-contact">
                <li>{{ $ic('phone', 'xs') }}{{ $ct['phone'] }}</li>
                <li>{{ $ic('mail', 'xs') }}{{ $ct['email'] }}</li>
                <li>{{ $ic('pin', 'xs') }}{{ $ct['city'] }}</li>
            </ul>
        </aside>
    </div>

@elseif ($page === 'ai-chatbot')

    <div class="bot-page">
        <div class="bot-hero">
            <img src="{{ $img('robot.svg') }}" alt="Maskot robot AI Eventora" width="220" height="220">
            <div><h2>Tanya seputar layanan event</h2><p>Pilih pertanyaan di bawah atau mulai obrolan langsung.</p>
                <button class="btn btn-sun" type="button" data-chat-open>Chat Sekarang {{ $ic('arrow', 'xs') }}</button></div>
        </div>
        <div class="faq-list">
            @foreach ($c['faq'] as $f)
                <details><summary>{{ $f[0] }}{{ $ic('chev', 'xs') }}</summary><p>{{ $f[2] }}</p><a class="more" href="{{ $u($f[3]) }}">Buka halaman terkait {{ $ic('arrow', 'xs') }}</a></details>
            @endforeach
        </div>
    </div>

@endif
</main>

{{-- ============ FOOTER ============ --}}
<footer class="foot">
    <div class="wrap foot-grid">
        <div class="f-brand">
            <a class="brand" href="{{ $u() }}"><img src="{{ $img('logo-mark.svg') }}" alt="" width="46" height="46"><span><b>Eventora</b><small>Event Organizer &amp; Planner</small></span></a>
        </div>
        <nav aria-label="Navigasi footer">
            <h3>Navigasi</h3>
            <ul>
                <li><a href="{{ $u() }}">Beranda</a></li>
                @foreach (['layanan', 'portofolio', 'paket'] as $s)<li><a href="{{ $u($s) }}">{{ $c['pages'][$s][0] }}</a></li>@endforeach
            </ul>
        </nav>
        <nav aria-label="Informasi">
            <h3>Informasi</h3>
            <ul>
                @foreach (['proyek', 'klien', 'proses', 'ai-chatbot'] as $s)<li><a href="{{ $u($s) }}">{{ $s === 'ai-chatbot' ? 'FAQ Event' : $c['pages'][$s][0] }}</a></li>@endforeach
            </ul>
        </nav>
        <div>
            <h3>Hubungi Kami</h3>
            <ul class="f-contact">
                <li>{{ $ic('phone', 'xs') }}<a href="tel:{{ $tel }}">{{ $ct['phone'] }}</a></li>
                <li>{{ $ic('mail', 'xs') }}<a href="mailto:{{ $ct['email'] }}">{{ $ct['email'] }}</a></li>
                <li>{{ $ic('pin', 'xs') }}{{ $ct['city'] }}</li>
            </ul>
        </div>
        <div>
            <h3>Ikuti Kami</h3>
            <ul class="socials">
                @foreach (['ig' => 'Instagram', 'yt' => 'YouTube', 'tt' => 'TikTok', 'in' => 'LinkedIn'] as $k => $name)
                    <li><a href="#" aria-label="{{ $name }}">{{ $ic($k) }}</a></li>
                @endforeach
            </ul>
        </div>
        <p class="script">Let’s Make<br>Your Event Unforgettable</p>
    </div>
    <div class="foot-bar">
        <div class="wrap foot-bar-in">
            <p>© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p>
            <p class="legal"><span>Syarat &amp; Ketentuan</span><span>Kebijakan Privasi</span></p>
        </div>
    </div>
</footer>

{{-- ============ FLOATING BUTTONS ============ --}}
<div class="float">
    <a class="fab fab-wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="ring" aria-hidden="true"></span>{{ $ic('wa') }}<b>WhatsApp</b>
    </a>
    <button class="fab fab-ai" type="button" data-chat-open aria-controls="chat" aria-expanded="false" aria-label="Buka AI Chat">
        <svg class="bot" viewBox="0 0 48 48" aria-hidden="true" focusable="false">
            <line x1="24" y1="4" x2="24" y2="10" stroke="#ff4f6d" stroke-width="3" stroke-linecap="round"/>
            <circle class="ant" cx="24" cy="4" r="3" fill="#ff4f6d"/>
            <rect x="6" y="10" width="36" height="30" rx="13" fill="#fff"/>
            <rect x="10" y="15" width="28" height="20" rx="9" fill="#14123a"/>
            <ellipse class="eye" cx="18" cy="25" rx="3" ry="4.5" fill="#5af0ff"/>
            <ellipse class="eye" cx="30" cy="25" rx="3" ry="4.5" fill="#5af0ff"/>
        </svg>
        <b>AI Chat</b><span class="ping" aria-hidden="true"></span>
    </button>
</div>

{{-- ============ AI CHATBOT (FAQ layanan event) ============ --}}
<section class="chat" id="chat" role="dialog" aria-label="AI Chat Eventora" hidden>
    <header class="chat-h">
        <span class="chat-av"><img src="{{ $img('robot.svg') }}" alt="" width="44" height="44"></span>
        <div><b>Eventora AI</b><small><i></i> FAQ layanan event</small></div>
        <button class="chat-x" type="button" data-chat-close aria-label="Tutup chat">{{ $ic('x') }}</button>
    </header>
    <div class="chat-log" id="chat-log" aria-live="polite"></div>
    <div class="chat-chips" id="chat-chips"></div>
    <form class="chat-form" id="chat-form" autocomplete="off">
        <input id="chat-in" type="text" maxlength="200" placeholder="Tulis pertanyaan Anda…" aria-label="Pertanyaan Anda">
        <button class="send" type="submit" aria-label="Kirim">{{ $ic('send') }}</button>
    </form>
</section>

<script type="application/json" id="eo-data">@json($chatData)</script>
<script src="{{ asset('js/' . $dir . '/event-organizer.js') }}" defer></script>
</body>
</html>
