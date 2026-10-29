@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Mitra Jiwa — Psikologi & Konseling Profesional</title>
<style>
:root{--bg:#faf6ee;--surface:#f3ece0;--card:#ffffff;--text:#2b1d20;--muted:#6f5d60;--burg:#6d1f2f;--burg-d:#511523;--rose:#c9a0a4;--rose-l:#ead8d8;--line:#e4d9ca;--hero:#6d1f2f;--hero-t:#faf6ee;--btn-bg:#6d1f2f;--btn-fg:#fff;--wa:#2f9e5b;color-scheme:light;box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]){--bg:#1a1214;--surface:#241a1c;--card:#2a1e21;--text:#f3ebe6;--muted:#bba9aa;--burg:#e0a3ac;--burg-d:#efbcc3;--rose:#b98a90;--rose-l:#3a2629;--line:#3d2c2f;--hero:#4a1420;--hero-t:#faf6ee;--btn-bg:#e0a3ac;--btn-fg:#2b1218;--wa:#4cae6c;color-scheme:dark}}
:root[data-theme="dark"]{--bg:#1a1214;--surface:#241a1c;--card:#2a1e21;--text:#f3ebe6;--muted:#bba9aa;--burg:#e0a3ac;--burg-d:#efbcc3;--rose:#b98a90;--rose-l:#3a2629;--line:#3d2c2f;--hero:#4a1420;--hero-t:#faf6ee;--btn-bg:#e0a3ac;--btn-fg:#2b1218;--wa:#4cae6c;color-scheme:dark}
html{scroll-padding-top:calc(76px + env(safe-area-inset-top,0px));scroll-behavior:smooth}
*{box-sizing:border-box}
body{margin:0;background:var(--bg);color:var(--text);font-family:'Helvetica Neue',Arial,sans-serif;line-height:1.65;font-size:16px}
h1,h2,h3{font-family:Georgia,'Times New Roman',serif;font-weight:600;line-height:1.2;margin:0}
p{margin:0}
.wrap{max-width:1120px;margin:0 auto;padding:0 24px}
.topbar{background:var(--burg-d);color:#f3e6e6;font-size:12.5px;padding:8px 0}
.topbar .wrap{display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap}
.topbar a{color:inherit;text-decoration:none}
nav{position:sticky;top:env(safe-area-inset-top,0px);z-index:20;background:var(--card);border-bottom:1px solid var(--line)}
nav .wrap{display:flex;align-items:center;justify-content:space-between;height:68px}
.logo{display:flex;align-items:center;gap:10px;text-decoration:none;color:var(--text);font-family:Georgia,serif;font-size:21px;font-weight:600}
.logo i{width:34px;height:34px;background:var(--burg);color:var(--btn-fg);display:grid;place-items:center;border-radius:4px;font-style:normal;font-size:16px}
.links{display:flex;gap:26px;align-items:center}
.links a{color:var(--muted);text-decoration:none;font-size:14px;font-weight:500}
.links a:hover{color:var(--burg)}
.btn{display:inline-block;background:var(--btn-bg);color:var(--btn-fg)!important;padding:13px 26px;border-radius:4px;text-decoration:none;font-size:14px;font-weight:600;border:1px solid var(--btn-bg);cursor:pointer}
.btn.ghost{background:transparent;border-color:rgba(250,246,238,.55);color:var(--hero-t)!important}
.btn.light{background:#faf6ee;border-color:#faf6ee;color:#511523!important}
.menu{display:none;background:none;border:1px solid var(--line);color:var(--text);border-radius:4px;padding:7px 13px;font-size:14px}
.hero{background:var(--hero);color:var(--hero-t);padding:88px 0 80px}
.hero .wrap{display:grid;grid-template-columns:1.3fr 1fr;gap:56px;align-items:center}
.eyebrow{font-size:12px;letter-spacing:.16em;text-transform:uppercase;color:var(--rose);margin-bottom:18px;font-weight:600}
.hero h1{font-size:clamp(32px,4.6vw,50px);margin-bottom:20px}
.hero .lead{color:#e9dbd8;font-size:17px;max-width:520px;margin-bottom:32px}
.cta{display:flex;gap:12px;flex-wrap:wrap}
.panel{background:var(--card);color:var(--text);border-radius:6px;padding:30px;border-top:4px solid var(--rose)}
.panel h3{font-size:20px;margin-bottom:6px}
.panel p{color:var(--muted);font-size:14px;margin-bottom:18px}
.panel li{list-style:none;padding:11px 0;border-top:1px solid var(--line);font-size:14px;display:flex;gap:10px}
.panel li b{color:var(--burg)}
.panel ul{margin:0;padding:0}
.stats{background:var(--card);border-bottom:1px solid var(--line)}
.stats .wrap{display:grid;grid-template-columns:repeat(4,1fr)}
.stats div{padding:30px 16px;text-align:center;border-left:1px solid var(--line)}
.stats div:first-child{border-left:0}
.stats b{display:block;font-family:Georgia,serif;font-size:32px;color:var(--burg);font-weight:600}
.stats span{font-size:13px;color:var(--muted)}
section{padding:80px 0}
.alt{background:var(--surface)}
.label{font-size:12px;letter-spacing:.16em;text-transform:uppercase;color:var(--burg);font-weight:700;margin-bottom:10px}
h2{font-size:clamp(26px,3.2vw,36px);margin-bottom:12px}
.sub{color:var(--muted);margin-bottom:44px;max-width:560px}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.card{background:var(--card);border:1px solid var(--line);border-radius:6px;padding:28px}
.card h3{font-size:19px;margin:14px 0 8px}
.card p{color:var(--muted);font-size:14.5px}
.ic{width:44px;height:44px;border-radius:4px;background:var(--rose-l);color:var(--burg);display:grid;place-items:center;font-size:18px;font-weight:700}
.split{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
.checks{margin:24px 0 0;padding:0;list-style:none}
.checks li{padding:12px 0 12px 34px;position:relative;border-top:1px solid var(--line);font-size:15px}
.checks li::before{content:"✓";position:absolute;left:0;top:11px;width:22px;height:22px;border-radius:50%;background:var(--burg);color:var(--btn-fg);font-size:12px;display:grid;place-items:center}
.team .card{text-align:center}
.av{width:76px;height:76px;border-radius:50%;background:var(--rose-l);border:2px solid var(--rose);display:grid;place-items:center;margin:0 auto 14px;font-family:Georgia,serif;font-size:22px;color:var(--burg)}
.role{font-size:12px;letter-spacing:.08em;text-transform:uppercase;color:var(--burg);font-weight:600;margin-bottom:10px}
.price{font-family:Georgia,serif;font-size:30px;color:var(--burg);margin:8px 0 2px}
.price small{font-family:'Helvetica Neue',Arial,sans-serif;font-size:13px;color:var(--muted)}
.card ul.pl{list-style:none;padding:0;margin:16px 0 0;font-size:14px;color:var(--muted)}
.card ul.pl li{padding:8px 0;border-top:1px solid var(--line)}
.card.hl{border:2px solid var(--burg);position:relative}
.badge{position:absolute;top:-12px;left:24px;background:var(--burg);color:var(--btn-fg);font-size:11px;letter-spacing:.1em;text-transform:uppercase;padding:4px 12px;border-radius:3px;font-weight:600}
.quote{font-family:Georgia,serif;font-size:17px;color:var(--text)!important;font-style:italic}
.who{margin-top:16px;font-size:13px;color:var(--muted);border-top:1px solid var(--line);padding-top:12px}
.clients{display:flex;flex-wrap:wrap;gap:12px 36px;justify-content:center;color:var(--muted);font-family:Georgia,serif;font-size:18px;letter-spacing:.04em;margin-top:8px}
.faq{max-width:760px}
details{border-bottom:1px solid var(--line);padding:20px 0}
summary{cursor:pointer;font-size:16px;font-weight:600;list-style:none;display:flex;justify-content:space-between;gap:16px}
summary::-webkit-details-marker{display:none}
summary::after{content:"+";color:var(--burg);font-size:22px;line-height:1}
details[open] summary::after{content:"–"}
details p{color:var(--muted);margin-top:12px;font-size:15px}
.band{background:var(--hero);color:var(--hero-t);text-align:center;padding:72px 0}
.band p{color:#e9dbd8;margin:12px auto 28px;max-width:480px}
footer{background:var(--burg-d);color:#d9c6c6;padding:56px 0 100px;font-size:14px}
footer .wrap{display:grid;grid-template-columns:1.5fr 1fr 1fr;gap:40px}
footer b{color:#fff;display:block;margin-bottom:8px;font-family:Georgia,serif;font-size:16px;font-weight:600}
footer a{color:inherit;text-decoration:none;display:block;margin-top:6px}
footer .copy{grid-column:1/-1;border-top:1px solid rgba(255,255,255,.15);padding-top:20px;font-size:13px}
.fab{position:fixed;right:20px;z-index:30;display:flex;align-items:center;gap:8px;border:0;border-radius:999px;padding:14px 20px;font-size:14px;font-weight:600;color:#fff;cursor:pointer;text-decoration:none;box-shadow:0 6px 20px rgba(40,10,20,.3)}
.fab.wa{bottom:calc(20px + env(safe-area-inset-bottom,0px));background:var(--wa)}
.fab.ai{bottom:calc(76px + env(safe-area-inset-bottom,0px));background:var(--burg-d);color:#fff}
.chat{position:fixed;right:20px;bottom:calc(132px + env(safe-area-inset-bottom,0px));width:min(350px,calc(100vw - 40px));background:var(--card);border:1px solid var(--line);border-radius:8px;box-shadow:0 12px 36px rgba(40,10,20,.3);z-index:30;display:none;flex-direction:column;overflow:hidden}
.chat.open{display:flex}
.chat header{padding:14px 18px;background:var(--burg-d);color:#fff;font-size:14px;font-weight:600}
.msgs{padding:16px;display:flex;flex-direction:column;gap:10px;max-height:260px;overflow-y:auto;font-size:14px}
.m{padding:10px 14px;border-radius:8px;max-width:86%;line-height:1.5}
.m.bot{background:var(--surface);align-self:flex-start}
.m.me{background:var(--burg-d);color:#fff;align-self:flex-end}
.chips{display:flex;flex-wrap:wrap;gap:8px;padding:0 16px 16px}
.chips button{background:transparent;border:1px solid var(--rose);color:var(--text);border-radius:999px;padding:7px 12px;font-size:13px;cursor:pointer}
@media (max-width:860px){
.links{display:none;position:absolute;top:68px;left:0;right:0;background:var(--card);flex-direction:column;align-items:flex-start;padding:20px 24px;border-bottom:1px solid var(--line);gap:16px}
.links.open{display:flex}
.menu{display:block}
.topbar .wrap span:last-child{display:none}
.hero{padding:56px 0}
.hero .wrap,.split{grid-template-columns:1fr;gap:36px}
.grid{grid-template-columns:1fr}
.stats .wrap{grid-template-columns:repeat(2,1fr)}
.stats div:nth-child(3){border-left:0}
.stats div:nth-child(n+3){border-top:1px solid var(--line)}
section{padding:56px 0}
footer .wrap{grid-template-columns:1fr}
}
.hero{position:relative;overflow:hidden;background:radial-gradient(900px 480px at 85% 0%,rgba(201,160,164,.30),transparent 60%),linear-gradient(135deg,var(--hero),#3f111c)}
.hero::before{content:"";position:absolute;width:540px;height:540px;border-radius:50%;border:1px solid rgba(201,160,164,.28);right:-150px;top:-190px}
.hero::after{content:"";position:absolute;width:340px;height:340px;border-radius:50%;background:rgba(201,160,164,.09);left:-120px;bottom:-160px}
.hero .wrap{position:relative;z-index:1}
.hero h1 em{font-style:italic;color:var(--rose)}
.panel{box-shadow:0 24px 50px rgba(20,4,10,.35)}
.pill{display:inline-block;background:var(--rose-l);color:var(--burg);font-size:12px;font-weight:700;padding:5px 12px;border-radius:999px;margin-bottom:14px}
.label::before{content:"";display:inline-block;width:28px;height:2px;background:var(--rose);vertical-align:middle;margin-right:10px}
.btn{transition:transform .2s,box-shadow .2s}
.btn:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(40,10,20,.28)}
.card{transition:transform .25s,box-shadow .25s,border-color .25s}
.card:hover{transform:translateY(-5px);box-shadow:0 16px 34px rgba(80,20,35,.14);border-color:var(--rose)}
.ic{width:54px;height:54px;border-radius:14px;font-size:24px;background:linear-gradient(135deg,var(--rose-l),var(--rose))}
.av{background:linear-gradient(135deg,var(--rose-l),var(--rose));border-color:var(--card);box-shadow:0 0 0 2px var(--rose)}
.card.hl{background:linear-gradient(180deg,var(--rose-l),var(--card) 50%);box-shadow:0 14px 34px rgba(80,20,35,.16)}
.who::before{content:"★★★★★  ";color:var(--rose);letter-spacing:2px}
.stats b{font-size:36px}
.band{background:radial-gradient(700px 320px at 15% 0%,rgba(201,160,164,.28),transparent 60%),linear-gradient(135deg,var(--hero),#3f111c)}
nav.sc{box-shadow:0 4px 18px rgba(60,15,25,.14)}
.rv{opacity:0}
.rv.in{opacity:1;animation:up .7s ease backwards}
@keyframes up{from{opacity:0;transform:translateY(26px)}to{opacity:1;transform:none}}
</style>
</head>
<body>

<div class="topbar"><div class="wrap"><span>Layanan psikologi berlisensi · Individu &amp; Korporat</span><span><a href="tel:+6281234567890">+62 812-3456-7890</a> · Senin–Sabtu 08.00–19.00</span></div></div>

<nav>
  <div class="wrap">
    <a class="logo" href="#top"><i>M</i>Mitra Jiwa</a>
    <div class="links" id="links">
      <a href="#layanan">Layanan</a>
      <a href="#korporat">Korporat</a>
      <a href="#tim">Tim</a>
      <a href="#paket">Paket</a>
      <a href="#faq">FAQ</a>
      <a class="btn" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20membuat%20janji%20konseling" target="_blank" rel="noopener">Buat Janji</a>
    </div>
    <button class="menu" id="menu" aria-label="Menu">Menu</button>
  </div>
</nav>

<header class="hero" id="top">
  <div class="wrap">
    <div>
      <div class="eyebrow">Psikologi &amp; Konseling Profesional</div>
      <h1>Kesehatan mental yang <em>terjaga</em>, kinerja yang berkelanjutan.</h1>
      <p class="lead">Layanan konseling dan asesmen psikologis oleh psikolog berlisensi untuk individu, keluarga, dan perusahaan, dengan standar etik dan kerahasiaan yang ketat.</p>
      <div class="cta">
        <a class="btn light" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi" target="_blank" rel="noopener">Konsultasi Sekarang</a>
        <a class="btn ghost" href="#korporat">Program Korporat</a>
      </div>
    </div>
    <div class="panel">
      <span class="pill">★ 4,9/5 · 1.200+ ulasan klien</span>
      <h3>Mulai dalam 3 langkah</h3>
      <p>Proses sederhana, tanpa antrean panjang.</p>
      <ul>
        <li><b>01</b> Hubungi kami via WhatsApp</li>
        <li><b>02</b> Pilih psikolog &amp; jadwal</li>
        <li><b>03</b> Sesi pertama dalam 48 jam</li>
      </ul>
    </div>
  </div>
</header>

<div class="stats">
  <div class="wrap">
    <div><b>3.000+</b><span>Sesi terlaksana</span></div>
    <div><b>40+</b><span>Perusahaan mitra</span></div>
    <div><b>10 th</b><span>Pengalaman klinis</span></div>
    <div><b>100%</b><span>Psikolog berlisensi</span></div>
  </div>
</div>

<section id="layanan">
  <div class="wrap">
    <div class="label">Layanan</div>
    <h2>Dukungan psikologis yang menyeluruh</h2>
    <p class="sub">Dari konseling pribadi hingga asesmen formal, ditangani oleh tenaga profesional.</p>
    <div class="grid">
      <div class="card"><div class="ic">🧠</div><h3>Konseling Individu</h3><p>Kecemasan, depresi, trauma, burnout, dan pengembangan diri.</p></div>
      <div class="card"><div class="ic">👨‍👩‍👧</div><h3>Pasangan &amp; Keluarga</h3><p>Komunikasi, konflik, pola asuh, dan persiapan pranikah.</p></div>
      <div class="card"><div class="ic">📋</div><h3>Asesmen Psikologis</h3><p>Tes kepribadian, minat bakat, IQ, dan psikotes rekrutmen dengan laporan resmi.</p></div>
    </div>
  </div>
</section>

<section class="alt" id="korporat">
  <div class="wrap split">
    <div>
      <div class="label">Program Korporat</div>
      <h2>Employee Assistance Program untuk perusahaan Anda</h2>
      <p class="sub" style="margin-bottom:0">Karyawan yang sehat secara mental lebih produktif dan bertahan lebih lama.</p>
      <ul class="checks">
        <li>Konseling rahasia bagi karyawan dan keluarga</li>
        <li>Workshop manajemen stres &amp; kepemimpinan</li>
        <li>Asesmen rekrutmen dan pengembangan talenta</li>
        <li>Laporan agregat anonim untuk HR</li>
      </ul>
    </div>
    <div class="card" style="padding:36px">
      <div class="label">Dipercaya oleh</div>
      <div class="clients"><span>Nusantara Bank</span><span>Arunika Group</span><span>Medika Corp</span><span>Cakra Energi</span></div>
      <a class="btn" style="margin-top:28px" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20program%20korporat" target="_blank" rel="noopener">Minta Proposal</a>
    </div>
  </div>
</section>

<section class="team" id="tim">
  <div class="wrap">
    <div class="label">Tim</div>
    <h2>Psikolog berpengalaman &amp; berlisensi</h2>
    <p class="sub">Setiap psikolog terdaftar dan menjalani supervisi klinis berkala.</p>
    <div class="grid">
      <div class="card"><div class="av">AR</div><div class="role">Psikolog Klinis</div><h3>Anisa Rahma, M.Psi.</h3><p style="margin-top:8px">Kecemasan, trauma, dan regulasi emosi dewasa.</p></div>
      <div class="card"><div class="av">DP</div><div class="role">Psikolog Keluarga</div><h3>Dimas Pratama, M.Psi.</h3><p style="margin-top:8px">Pasangan, pola asuh, dan konflik keluarga.</p></div>
      <div class="card"><div class="av">SW</div><div class="role">Psikolog Industri</div><h3>Sekar Wulandari, M.Psi.</h3><p style="margin-top:8px">Burnout, asesmen karier, dan pengembangan SDM.</p></div>
    </div>
  </div>
</section>

<section class="alt" id="paket">
  <div class="wrap">
    <div class="label">Paket</div>
    <h2>Investasi yang jelas dan transparan</h2>
    <p class="sub">Harga sudah termasuk ruang konsultasi atau platform video call aman.</p>
    <div class="grid">
      <div class="card"><h3>Sesi Tunggal</h3><div class="price">Rp350rb <small>/ sesi</small></div><ul class="pl"><li>50–60 menit</li><li>Tatap muka atau online</li><li>Ringkasan sesi</li></ul></div>
      <div class="card hl"><span class="badge">Paling dipilih</span><h3>Paket 4 Sesi</h3><div class="price">Rp1,2jt <small>/ 4 sesi</small></div><ul class="pl"><li>Rencana terapi personal</li><li>Evaluasi progres</li><li>Dukungan chat antar sesi</li></ul></div>
      <div class="card"><h3>Asesmen</h3><div class="price">Rp750rb <small>/ paket</small></div><ul class="pl"><li>Tes psikologis lengkap</li><li>Laporan tertulis resmi</li><li>Sesi umpan balik</li></ul></div>
    </div>
  </div>
</section>

<section id="testimoni">
  <div class="wrap">
    <div class="label">Testimoni</div>
    <h2>Dipercaya individu dan perusahaan</h2>
    <p class="sub">Dibagikan dengan izin, identitas disamarkan.</p>
    <div class="grid">
      <div class="card"><p class="quote">“Prosesnya profesional dan sangat menjaga kerahasiaan. Saya merasa aman bercerita.”</p><div class="who">R., Klien individu</div></div>
      <div class="card"><p class="quote">“Program EAP menurunkan angka burnout di tim kami dalam enam bulan.”</p><div class="who">HR Manager, Perusahaan jasa keuangan</div></div>
      <div class="card"><p class="quote">“Laporan asesmennya jelas, rinci, dan mudah dipahami.”</p><div class="who">D., Klien asesmen</div></div>
    </div>
  </div>
</section>

<section class="alt" id="faq">
  <div class="wrap">
    <div class="label">FAQ</div>
    <h2>Pertanyaan umum</h2>
    <p class="sub">Belum menemukan jawabannya? Tanyakan lewat WhatsApp.</p>
    <div class="faq">
      <details><summary>Apakah isi sesi dijamin rahasia?</summary><p>Ya. Seluruh informasi dijaga sesuai kode etik psikologi. Pengecualian hanya berlaku pada kondisi yang membahayakan keselamatan atas perintah hukum.</p></details>
      <details><summary>Apakah perusahaan dapat melihat isi sesi karyawan?</summary><p>Tidak. Perusahaan hanya menerima laporan agregat anonim tanpa identitas maupun isi percakapan.</p></details>
      <details><summary>Berapa lama satu sesi berlangsung?</summary><p>Umumnya 50–60 menit, dengan frekuensi mingguan atau dua mingguan sesuai kebutuhan.</p></details>
      <details><summary>Apakah tersedia sesi online?</summary><p>Tersedia melalui video call terenkripsi dengan kualitas layanan yang setara tatap muka.</p></details>
      <details><summary>Apakah ini layanan gawat darurat?</summary><p>Bukan. Dalam kondisi krisis atau berpikir menyakiti diri, segera hubungi layanan darurat setempat atau orang terdekat.</p></details>
    </div>
  </div>
</section>

<section class="band">
  <div class="wrap">
    <h2>Siap membuat langkah pertama?</h2>
    <p>Tim kami akan mencocokkan Anda dengan psikolog dan jadwal yang tepat.</p>
    <a class="btn light" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20membuat%20janji" target="_blank" rel="noopener">Jadwalkan Sesi Pertama</a>
  </div>
</section>

<footer>
  <div class="wrap">
    <div><b>Mitra Jiwa</b><p style="max-width:300px">Layanan psikologi dan konseling profesional untuk individu, keluarga, dan perusahaan.</p></div>
    <div><b>Menu</b><a href="#layanan">Layanan</a><a href="#korporat">Korporat</a><a href="#tim">Tim</a><a href="#paket">Paket</a><a href="#faq">FAQ</a></div>
    <div><b>Kontak</b><a href="#">halo@mitrajiwa.id</a><a href="#">+62 812-3456-7890</a><a href="#">Jl. Contoh No. 12, Surabaya</a></div>
    <div class="copy">© 2026 Mitra Jiwa. Semua hak dilindungi.</div>
  </div>
</footer>

<div class="chat" id="chat" role="dialog" aria-label="Asisten AI">
  <header>Asisten AI Mitra Jiwa</header>
  <div class="msgs" id="msgs"><div class="m bot">Halo, saya asisten virtual Mitra Jiwa. Silakan pilih topik di bawah.</div></div>
  <div class="chips">
    <button data-q="layanan">Layanan</button>
    <button data-q="korporat">Program korporat</button>
    <button data-q="jadwal">Jadwal &amp; janji</button>
    <button data-q="rahasia">Kerahasiaan</button>
  </div>
</div>
<button class="fab ai" id="aiBtn" aria-label="Buka asisten AI">✦ Tanya AI</button>
<a class="fab wa" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi" target="_blank" rel="noopener" aria-label="Chat WhatsApp">WhatsApp</a>

<script>
document.getElementById('menu').onclick=function(){document.getElementById('links').classList.toggle('open')};
document.querySelectorAll('#links a').forEach(function(a){a.addEventListener('click',function(){document.getElementById('links').classList.remove('open')})});
var els=document.querySelectorAll('.card,.stats div,.panel,details,h2,.sub,.label,.checks li');
if('IntersectionObserver' in window&&!matchMedia('(prefers-reduced-motion:reduce)').matches){var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.12});els.forEach(function(el,i){el.classList.add('rv');el.style.animationDelay=((i%3)*90)+'ms';io.observe(el)})}
window.addEventListener('scroll',function(){document.querySelector('nav').classList.toggle('sc',window.scrollY>10)});
var chat=document.getElementById('chat');
document.getElementById('aiBtn').onclick=function(){chat.classList.toggle('open')};
var A={layanan:['Layanan','Kami menyediakan konseling individu, konseling pasangan & keluarga, serta asesmen psikologis.'],
korporat:['Program korporat','Program EAP mencakup konseling karyawan, workshop, asesmen rekrutmen, dan laporan agregat anonim untuk HR.'],
jadwal:['Jadwal & janji','Senin–Sabtu pukul 08.00–19.00. Klik tombol WhatsApp untuk memilih jadwal; sesi pertama biasanya dalam 48 jam.'],
rahasia:['Kerahasiaan','Seluruh isi sesi dijaga sesuai kode etik psikologi dan tidak dibagikan ke pihak ketiga.']};
var msgs=document.getElementById('msgs');
function add(t,c){var d=document.createElement('div');d.className='m '+c;d.textContent=t;msgs.appendChild(d);msgs.scrollTop=msgs.scrollHeight}
document.querySelectorAll('.chips button').forEach(function(b){b.onclick=function(){var r=A[b.dataset.q];add(r[0],'me');setTimeout(function(){add(r[1],'bot')},300)}});
</script>
</body>
</html>
@endverbatim
