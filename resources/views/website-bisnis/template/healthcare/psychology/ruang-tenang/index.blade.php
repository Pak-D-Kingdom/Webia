<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Ruang Tenang — Psikologi & Konseling</title>
<style>
:root{--bg:#f7f4ee;--surface:#ece8de;--card:#fffefb;--text:#34312b;--muted:#75705f;--accent:#7d8f6e;--accent-d:#5f7352;--line:#ddd8c9;--wa:#2f9e5b;color-scheme:light;box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]){--bg:#1c1d18;--surface:#25271f;--card:#22241d;--text:#ece9df;--muted:#a9a692;--accent:#a3b592;--accent-d:#b7c8a6;--line:#343629;--wa:#4cae6c;color-scheme:dark}}
:root[data-theme="dark"]{--bg:#1c1d18;--surface:#25271f;--card:#22241d;--text:#ece9df;--muted:#a9a692;--accent:#a3b592;--accent-d:#b7c8a6;--line:#343629;--wa:#4cae6c;color-scheme:dark}
html{scroll-padding-top:calc(72px + env(safe-area-inset-top,0px));scroll-behavior:smooth}
*{box-sizing:border-box}
body{margin:0;background:var(--bg);color:var(--text);font-family:Georgia,'Times New Roman',serif;line-height:1.7}
h1,h2,h3{font-weight:500;line-height:1.25;margin:0}
p{margin:0}
.sans,nav,button,.btn,summary,footer{font-family:'Helvetica Neue',Arial,sans-serif}
.wrap{max-width:1040px;margin:0 auto;padding:0 24px}
nav{position:sticky;top:env(safe-area-inset-top,0px);z-index:20;background:var(--bg);border-bottom:1px solid var(--line)}
nav .wrap{display:flex;align-items:center;justify-content:space-between;height:64px}
.logo{font-family:Georgia,serif;font-size:20px;color:var(--text);text-decoration:none}
.logo span{color:var(--accent)}
.links{display:flex;gap:28px;align-items:center}
.links a{color:var(--muted);text-decoration:none;font-size:14px}
.links a:hover{color:var(--text)}
.btn{display:inline-block;background:var(--accent-d);color:#fff;padding:12px 24px;border-radius:999px;text-decoration:none;font-size:14px;border:0;cursor:pointer}
.btn.ghost{background:transparent;color:var(--text);border:1px solid var(--line)}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]) .btn{color:#1c1d18}}
.menu{display:none;background:none;border:1px solid var(--line);color:var(--text);border-radius:8px;padding:6px 12px;font-size:14px}
.hero{padding:96px 0 80px}
.hero .wrap{display:grid;grid-template-columns:1.2fr 1fr;gap:56px;align-items:center}
.eyebrow{font-size:13px;letter-spacing:.14em;text-transform:uppercase;color:var(--accent);margin-bottom:18px;font-family:'Helvetica Neue',Arial,sans-serif}
.hero h1{font-size:clamp(34px,5vw,54px);margin-bottom:20px}
.hero p.lead{color:var(--muted);font-size:18px;max-width:480px;margin-bottom:32px}
.cta{display:flex;gap:12px;flex-wrap:wrap}
.blob{aspect-ratio:1;border-radius:46% 54% 50% 50%/55% 45% 55% 45%;background:linear-gradient(145deg,var(--surface),var(--line));display:grid;place-items:center;font-size:84px}
section{padding:72px 0}
.alt{background:var(--surface)}
h2{font-size:clamp(26px,3.4vw,36px);margin-bottom:12px}
.sub{color:var(--muted);margin-bottom:40px;max-width:520px}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.card{background:var(--card);border:1px solid var(--line);border-radius:16px;padding:28px}
.card h3{font-size:19px;margin:10px 0 8px}
.card p{color:var(--muted);font-size:15px}
.faq{max-width:720px}
details{border-bottom:1px solid var(--line);padding:20px 0}
summary{cursor:pointer;font-size:16px;list-style:none;display:flex;justify-content:space-between;gap:16px}
summary::-webkit-details-marker{display:none}
summary::after{content:"+";color:var(--accent);font-size:22px;line-height:1}
details[open] summary::after{content:"–"}
details p{color:var(--muted);margin-top:12px;font-size:15px}
footer{border-top:1px solid var(--line);padding:48px 0 96px;color:var(--muted);font-size:14px}
footer .wrap{display:flex;justify-content:space-between;gap:32px;flex-wrap:wrap}
footer a{color:var(--muted);text-decoration:none;display:block;margin-top:6px}
footer b{color:var(--text);font-weight:600}
.fab{position:fixed;right:20px;z-index:30;display:flex;align-items:center;gap:8px;border:0;border-radius:999px;padding:14px 20px;font-size:14px;color:#fff;cursor:pointer;text-decoration:none;box-shadow:0 6px 20px rgba(40,50,30,.22)}
.fab.wa{bottom:calc(20px + env(safe-area-inset-bottom,0px));background:var(--wa)}
.fab.ai{bottom:calc(76px + env(safe-area-inset-bottom,0px));background:var(--accent-d)}
.chat{position:fixed;right:20px;bottom:calc(132px + env(safe-area-inset-bottom,0px));width:min(340px,calc(100vw - 40px));background:var(--card);border:1px solid var(--line);border-radius:18px;box-shadow:0 12px 36px rgba(60,40,20,.25);z-index:30;display:none;flex-direction:column;overflow:hidden;font-family:'Helvetica Neue',Arial,sans-serif}
.chat.open{display:flex}
.chat header{padding:14px 18px;background:var(--surface);font-size:14px;font-weight:600;border-bottom:1px solid var(--line)}
.msgs{padding:16px;display:flex;flex-direction:column;gap:10px;max-height:260px;overflow-y:auto;font-size:14px}
.m{padding:10px 14px;border-radius:14px;max-width:85%;line-height:1.5}
.m.bot{background:var(--surface);align-self:flex-start}
.m.me{background:var(--accent-d);color:#fff;align-self:flex-end}
.chips{display:flex;flex-wrap:wrap;gap:8px;padding:0 16px 16px}
.chips button{background:transparent;border:1px solid var(--line);color:var(--text);border-radius:999px;padding:7px 12px;font-size:13px;cursor:pointer}
@media (max-width:760px){
.links{display:none;position:absolute;top:64px;left:0;right:0;background:var(--bg);flex-direction:column;align-items:flex-start;padding:20px 24px;border-bottom:1px solid var(--line);gap:16px}
.links.open{display:flex}
.menu{display:block}
.hero{padding:56px 0}
.hero .wrap{grid-template-columns:1fr}
.blob{max-width:240px}
.grid{grid-template-columns:1fr}
section{padding:56px 0}
}
.stats{border-top:1px solid var(--line);border-bottom:1px solid var(--line);padding:36px 0}
.stats .wrap{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;text-align:center}
.stats b{display:block;font-size:30px;font-weight:500;color:var(--accent-d)}
.stats span{font-size:13px;color:var(--muted);font-family:'Helvetica Neue',Arial,sans-serif}
.team .card{text-align:center}
.av{width:72px;height:72px;border-radius:50%;background:var(--surface);border:1px solid var(--line);display:grid;place-items:center;margin:0 auto 14px;font-size:22px;color:var(--accent-d)}
.alt .av{background:var(--bg)}
.role{font-size:13px;color:var(--accent);font-family:'Helvetica Neue',Arial,sans-serif;margin-bottom:10px}
.tags{display:flex;gap:6px;flex-wrap:wrap;justify-content:center;margin-top:14px}
.tags i{font-style:normal;font-size:12px;border:1px solid var(--line);border-radius:999px;padding:3px 10px;color:var(--muted);font-family:'Helvetica Neue',Arial,sans-serif}
.price{font-size:28px;margin:6px 0 4px}
.price small{font-size:13px;color:var(--muted);font-family:'Helvetica Neue',Arial,sans-serif}
.card ul{list-style:none;padding:0;margin:16px 0 0;font-size:14px;color:var(--muted);font-family:'Helvetica Neue',Arial,sans-serif}
.card li{padding:6px 0;border-top:1px solid var(--line)}
.card.hl{border-color:var(--accent);box-shadow:0 0 0 1px var(--accent)}
.badge{font-size:11px;letter-spacing:.1em;text-transform:uppercase;color:var(--accent);font-family:'Helvetica Neue',Arial,sans-serif}
.quote{font-size:16px;color:var(--text)!important;font-style:italic}
.who{margin-top:16px;font-size:13px;color:var(--muted);font-family:'Helvetica Neue',Arial,sans-serif}
.band{text-align:center;padding:72px 0}
.band p{color:var(--muted);margin:0 auto 28px;max-width:460px}
@media (max-width:760px){.stats .wrap{grid-template-columns:repeat(2,1fr)}}
</style>
</head>
<body>

<nav>
  <div class="wrap">
    <a class="logo" href="#top">Ruang<span>Tenang</span></a>
    <div class="links" id="links">
      <a href="#layanan">Layanan</a>
      <a href="#pendekatan">Pendekatan</a>
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
      <div class="eyebrow">Psikologi &amp; Konseling</div>
      <h1>Ruang yang aman untuk didengar, dipahami, dan pulih.</h1>
      <p class="lead">Bersama psikolog klinis berlisensi, kami menemani Anda melewati kecemasan, stres, hubungan, dan masa-masa sulit — tanpa penghakiman.</p>
      <div class="cta">
        <a class="btn" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi" target="_blank" rel="noopener">Mulai Konsultasi</a>
        <a class="btn ghost" href="#layanan">Lihat Layanan</a>
      </div>
    </div>
    <div class="blob" aria-hidden="true">🌿</div>
  </div>
</header>

<div class="stats">
  <div class="wrap">
    <div><b>2.500+</b><span>Sesi terlaksana</span></div>
    <div><b>8 th</b><span>Pengalaman klinis</span></div>
    <div><b>98%</b><span>Klien merasa terbantu</span></div>
    <div><b>SIPP</b><span>Psikolog berlisensi</span></div>
  </div>
</div>

<section class="alt" id="layanan">
  <div class="wrap">
    <h2>Layanan kami</h2>
    <p class="sub">Pilih format yang paling nyaman, tatap muka maupun online.</p>
    <div class="grid">
      <div class="card"><div>◯</div><h3>Konseling Individu</h3><p>Sesi privat 1:1 untuk kecemasan, depresi ringan, trauma, dan pengembangan diri.</p></div>
      <div class="card"><div>◯◯</div><h3>Konseling Pasangan &amp; Keluarga</h3><p>Membangun komunikasi yang sehat dan menyelesaikan konflik bersama.</p></div>
      <div class="card"><div>◇</div><h3>Asesmen Psikologis</h3><p>Tes minat, kepribadian, dan kesehatan mental dengan laporan yang jelas.</p></div>
    </div>
  </div>
</section>

<section id="pendekatan">
  <div class="wrap">
    <h2>Pendekatan yang tenang &amp; terukur</h2>
    <p class="sub">Setiap sesi dirancang mengikuti ritme Anda, dengan metode berbasis bukti.</p>
    <div class="grid">
      <div class="card"><h3>1. Kenali</h3><p>Sesi awal untuk memahami cerita dan kebutuhan Anda.</p></div>
      <div class="card"><h3>2. Rancang</h3><p>Menyusun tujuan dan rencana terapi bersama.</p></div>
      <div class="card"><h3>3. Pulih</h3><p>Sesi berkala dengan evaluasi progres yang jelas.</p></div>
    </div>
  </div>
</section>

<section class="alt team" id="tim">
  <div class="wrap">
    <h2>Kenali psikolog kami</h2>
    <p class="sub">Tim kecil yang berfokus pada kualitas, bukan kuantitas.</p>
    <div class="grid">
      <div class="card"><div class="av">AR</div><h3>Anisa Rahma, M.Psi.</h3><div class="role">Psikolog Klinis</div><p>Kecemasan, trauma, dan regulasi emosi dewasa.</p><div class="tags"><i>CBT</i><i>EMDR</i></div></div>
      <div class="card"><div class="av">DP</div><h3>Dimas Pratama, M.Psi.</h3><div class="role">Psikolog Keluarga</div><p>Dinamika pasangan, pola asuh, dan konflik keluarga.</p><div class="tags"><i>Couple</i><i>Family</i></div></div>
      <div class="card"><div class="av">SW</div><h3>Sekar Wulandari, M.Psi.</h3><div class="role">Psikolog Remaja</div><p>Remaja, mahasiswa, dan transisi karier awal.</p><div class="tags"><i>Teen</i><i>Karier</i></div></div>
    </div>
  </div>
</section>

<section id="paket">
  <div class="wrap">
    <h2>Paket sesi</h2>
    <p class="sub">Harga transparan, tanpa biaya tersembunyi.</p>
    <div class="grid">
      <div class="card"><h3>Sesi Tunggal</h3><div class="price">Rp350rb <small>/ sesi</small></div><ul><li>50–60 menit</li><li>Tatap muka atau online</li><li>Ringkasan sesi</li></ul></div>
      <div class="card hl"><div class="badge">Paling dipilih</div><h3>Paket 4 Sesi</h3><div class="price">Rp1,2jt <small>/ 4 sesi</small></div><ul><li>Rencana terapi personal</li><li>Evaluasi progres</li><li>Chat dukungan antar sesi</li></ul></div>
      <div class="card"><h3>Asesmen</h3><div class="price">Rp750rb <small>/ paket</small></div><ul><li>Tes psikologis lengkap</li><li>Laporan tertulis</li><li>Sesi umpan balik</li></ul></div>
    </div>
  </div>
</section>

<section class="alt" id="testimoni">
  <div class="wrap">
    <h2>Cerita klien</h2>
    <p class="sub">Dibagikan dengan izin, identitas disamarkan.</p>
    <div class="grid">
      <div class="card"><p class="quote">“Pertama kalinya saya merasa benar-benar didengar tanpa dihakimi.”</p><div class="who">R., 29 tahun</div></div>
      <div class="card"><p class="quote">“Sesi online-nya nyaman. Saya jadi lebih paham pemicu kecemasan saya.”</p><div class="who">M., 34 tahun</div></div>
      <div class="card"><p class="quote">“Komunikasi kami sebagai pasangan membaik jauh setelah beberapa sesi.”</p><div class="who">D. &amp; A., 31 tahun</div></div>
    </div>
  </div>
</section>

<section id="faq">
  <div class="wrap">
    <h2>Pertanyaan umum</h2>
    <p class="sub">Belum menemukan jawabannya? Tanyakan lewat WhatsApp.</p>
    <div class="faq">
      <details><summary>Apakah isi sesi dijamin rahasia?</summary><p>Ya. Seluruh cerita Anda dijaga kerahasiaannya sesuai kode etik psikologi, kecuali dalam kondisi darurat yang membahayakan keselamatan.</p></details>
      <details><summary>Berapa lama satu sesi berlangsung?</summary><p>Satu sesi umumnya 50–60 menit. Frekuensi disesuaikan dengan kebutuhan, biasanya mingguan atau dua mingguan.</p></details>
      <details><summary>Apakah tersedia sesi online?</summary><p>Tersedia melalui video call yang aman, dengan kualitas layanan yang sama seperti tatap muka.</p></details>
      <details><summary>Bagaimana cara membuat janji?</summary><p>Klik tombol WhatsApp, pilih jadwal yang tersedia, dan tim kami akan mengonfirmasi dalam 1×24 jam.</p></details>
      <details><summary>Apakah ini layanan gawat darurat?</summary><p>Bukan. Bila Anda dalam kondisi krisis atau berpikir menyakiti diri, segera hubungi layanan darurat setempat atau orang terdekat.</p></details>
    </div>
  </div>
</section>

<section class="alt band">
  <div class="wrap">
    <h2>Langkah pertama tidak harus besar.</h2>
    <p>Cukup kirim satu pesan. Kami akan membantu menemukan jadwal dan psikolog yang tepat.</p>
    <a class="btn" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20membuat%20janji" target="_blank" rel="noopener">Jadwalkan Sesi Pertama</a>
  </div>
</section>

<footer>
  <div class="wrap">
    <div><b>RuangTenang</b><p style="margin-top:6px;max-width:260px">Layanan psikologi &amp; konseling yang hangat, profesional, dan berlisensi.</p></div>
    <div><b>Menu</b><a href="#layanan">Layanan</a><a href="#pendekatan">Pendekatan</a><a href="#faq">FAQ</a></div>
    <div><b>Kontak</b><a href="#">halo@ruangtenang.id</a><a href="#">+62 812-3456-7890</a><a href="#">Senin–Sabtu, 09.00–18.00</a></div>
  </div>
  <div class="wrap" style="margin-top:32px"><span>© 2026 RuangTenang. Semua hak dilindungi.</span></div>
</footer>

<div class="chat" id="chat" role="dialog" aria-label="Asisten AI">
  <header>Asisten AI RuangTenang</header>
  <div class="msgs" id="msgs"><div class="m bot">Halo, saya asisten virtual. Ada yang bisa saya bantu? Pilih topik di bawah ya.</div></div>
  <div class="chips" id="chips">
    <button data-q="layanan">Layanan</button>
    <button data-q="jadwal">Jadwal &amp; janji</button>
    <button data-q="rahasia">Kerahasiaan</button>
    <button data-q="online">Sesi online</button>
  </div>
</div>
<button class="fab ai" id="aiBtn" aria-label="Buka asisten AI">✦ Tanya AI</button>
<a class="fab wa" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi" target="_blank" rel="noopener" aria-label="Chat WhatsApp">WhatsApp</a>

<script>
document.getElementById('menu').onclick=function(){document.getElementById('links').classList.toggle('open')};
document.querySelectorAll('#links a').forEach(function(a){a.addEventListener('click',function(){document.getElementById('links').classList.remove('open')})});
var chat=document.getElementById('chat');
document.getElementById('aiBtn').onclick=function(){chat.classList.toggle('open')};
var A={layanan:['Layanan','Kami menyediakan konseling individu, konseling pasangan & keluarga, serta asesmen psikologis.'],
jadwal:['Jadwal & janji','Senin–Sabtu pukul 09.00–18.00. Klik tombol WhatsApp untuk memilih jadwal dan konfirmasi dalam 1×24 jam.'],
rahasia:['Kerahasiaan','Semua isi sesi dijaga kerahasiaannya sesuai kode etik psikologi.'],
online:['Sesi online','Tersedia via video call yang aman, dengan kualitas layanan setara tatap muka.']};
var msgs=document.getElementById('msgs');
function add(t,c){var d=document.createElement('div');d.className='m '+c;d.textContent=t;msgs.appendChild(d);msgs.scrollTop=msgs.scrollHeight}
document.querySelectorAll('#chips button').forEach(function(b){b.onclick=function(){var r=A[b.dataset.q];add(r[0],'me');setTimeout(function(){add(r[1],'bot')},300)}});
</script>
</body>
</html>
