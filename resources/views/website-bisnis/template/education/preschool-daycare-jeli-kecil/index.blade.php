<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Jeli Kecil – Preschool & Daycare</title>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<style>
:root{--grape:#6B3FA0;--grape-d:#4B2879;--lilac:#C9B6F2;--lilac-l:#EFE8FC;--pink:#FFB8D9;--pink-l:#FFE6F2;--blue:#BFE3FF;--blue-l:#E4F3FF;--bg:#FBF8FF;--card:#fff;--ink:#2A1B45;--mute:#645580;--on-grape:#fff;--sh:0 6px 0 rgba(107,63,160,.18);
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]){--bg:#1D1230;--card:#2B1D45;--ink:#F3ECFF;--mute:#BFB0DB;--lilac-l:#3A2A5C;--pink-l:#4A2A47;--blue-l:#243A56;--sh:0 6px 0 rgba(0,0,0,.35);--grape:#B79CF0;--grape-d:#D9C8FF;--on-grape:#1D1230}}
:root[data-theme="dark"]{--bg:#1D1230;--card:#2B1D45;--ink:#F3ECFF;--mute:#BFB0DB;--lilac-l:#3A2A5C;--pink-l:#4A2A47;--blue-l:#243A56;--sh:0 6px 0 rgba(0,0,0,.35);--grape:#B79CF0;--grape-d:#D9C8FF;--on-grape:#1D1230}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth;scroll-padding-top:calc(env(safe-area-inset-top,0px) + 84px)}
body{margin:0;background:var(--bg);color:var(--ink);font:400 17px/1.65 Nunito,system-ui,sans-serif;overflow-x:hidden}
h1,h2,h3{font-family:Fredoka,Nunito,sans-serif;line-height:1.15;margin:0 0 .5em}
h1{font-size:clamp(2.4rem,6vw,4.2rem);font-weight:700}h2{font-size:clamp(1.8rem,4vw,2.6rem);font-weight:600}h3{font-size:1.3rem;font-weight:600}
p{margin:0 0 1em;max-width:62ch}a{color:inherit}
:focus-visible{outline:3px solid var(--grape);outline-offset:3px}
.wrap{max-width:1120px;margin:0 auto;padding:0 20px}
section{padding:72px 0}
.btn{display:inline-block;font:600 1.05rem Fredoka,sans-serif;padding:14px 28px;border-radius:999px;border:0;cursor:pointer;text-decoration:none;background:var(--grape);color:var(--on-grape);box-shadow:var(--sh);transition:transform .15s}
.btn:hover{transform:translateY(-2px) scale(1.03)}.btn:active{transform:translateY(3px);box-shadow:0 2px 0 rgba(107,63,160,.2)}
.btn.pink{background:var(--pink);color:#4B2879}.btn.ghost{background:var(--card);color:var(--grape-d)}
/* topbar */
.top{background:var(--grape);color:var(--on-grape);font-size:.9rem;text-align:center;padding:8px 12px}
header{position:sticky;top:0;z-index:20;background:var(--bg);border-bottom:3px dashed var(--lilac)}
.nav{display:flex;align-items:center;justify-content:space-between;height:68px}
.logo{font:700 1.5rem Fredoka;text-decoration:none;color:var(--grape-d);display:flex;align-items:center;gap:8px}
.logo i{width:34px;height:34px;border-radius:50% 50% 45% 55%;background:linear-gradient(135deg,var(--pink),var(--lilac));display:inline-block}
nav ul{display:flex;gap:6px;list-style:none;margin:0;padding:0}
nav a{display:block;padding:8px 14px;border-radius:999px;text-decoration:none;font-weight:700}
nav a:hover{background:var(--lilac-l)}
.burger{display:none;background:var(--lilac-l);border:0;border-radius:14px;width:44px;height:44px;font-size:1.4rem;cursor:pointer;color:var(--ink)}
@media(max-width:860px){.burger{display:block}nav{position:absolute;left:0;right:0;top:100%;background:var(--bg);padding:10px 20px 18px;display:none;border-bottom:3px dashed var(--lilac)}nav.open{display:block}nav ul{flex-direction:column}.nav .btn.cta{display:none}}
/* hero */
.hero{position:relative;overflow:hidden;padding:64px 0 90px;background:radial-gradient(circle at 85% 20%,var(--blue-l),transparent 45%),radial-gradient(circle at 5% 90%,var(--pink-l),transparent 45%)}
.hero .wrap{display:grid;grid-template-columns:1.1fr .9fr;gap:40px;align-items:center}
.tag{display:inline-block;background:var(--pink);color:#4B2879;font-weight:700;padding:6px 16px;border-radius:999px;margin-bottom:18px}
.hero h1 span{display:block;color:var(--grape)}
.cta-row{display:flex;gap:14px;flex-wrap:wrap;margin:26px 0}
.stats{display:flex;gap:12px;flex-wrap:wrap}.stats div{background:var(--card);border-radius:20px;padding:10px 18px;box-shadow:var(--sh)}.stats b{font:700 1.4rem Fredoka;color:var(--grape);display:block}
.jelly{position:relative;aspect-ratio:1;max-width:440px;margin:auto;width:100%}
.blob{position:absolute;border-radius:48% 52% 55% 45%/50% 45% 55% 50%;display:grid;place-items:center;font-size:3.4rem;box-shadow:inset -10px -14px 0 rgba(0,0,0,.08),inset 10px 12px 0 rgba(255,255,255,.45);cursor:pointer;border:0;animation:wob 5s ease-in-out infinite}
.blob:active{transform:scale(.88)}
.b1{inset:6% 22% 30% 4%;background:var(--lilac);font-size:5rem}.b2{inset:44% 2% 4% 36%;background:var(--pink);animation-delay:-1.5s}.b3{inset:0 0 62% 62%;background:var(--blue);animation-delay:-3s}.b4{inset:62% 66% 6% 4%;background:var(--grape);animation-delay:-2s;color:#fff}
@keyframes wob{50%{border-radius:55% 45% 45% 55%/45% 55% 45% 55%;transform:translateY(-8px) rotate(2deg)}}
@media(max-width:860px){.hero .wrap{grid-template-columns:1fr}}
/* cards */
.head{text-align:center;margin-bottom:40px}.head p{margin:0 auto}
.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));gap:22px}
.card{background:var(--card);border-radius:28px;padding:26px;box-shadow:var(--sh)}
.card .ic{width:62px;height:62px;border-radius:45% 55% 50% 50%;display:grid;place-items:center;font-size:1.9rem;margin-bottom:14px}
.c-l .ic{background:var(--lilac)}.c-p .ic{background:var(--pink)}.c-b .ic{background:var(--blue)}
.card .meta{font-weight:700;color:var(--grape)}
.alt{background:var(--lilac-l)}
.time{list-style:none;margin:0 auto;padding:0;max-width:680px;border-left:5px dotted var(--grape);padding-left:28px}
.time li{position:relative;background:var(--card);border-radius:20px;padding:14px 20px;margin-bottom:14px;box-shadow:var(--sh)}
.time li::before{content:"";position:absolute;left:-43px;top:20px;width:20px;height:20px;border-radius:50%;background:var(--pink);border:4px solid var(--grape)}
.time b{font-family:Fredoka;color:var(--grape)}
.gal{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.gal div{border-radius:30px;display:grid;place-items:center;font-size:3rem;min-height:140px;text-align:center;font-family:Fredoka;font-size:1rem;padding:10px;color:#2A1B45}
.gal span{font-size:3rem;display:block}.gal .w{grid-column:span 2}
@media(max-width:700px){.gal{grid-template-columns:repeat(2,1fr)}}
.price .card{text-align:center}.price .big{font:700 2.2rem Fredoka;color:var(--grape)}.price ul{list-style:none;padding:0;margin:14px 0;text-align:left}.price li::before{content:"✿ ";color:var(--pink)}
.price .pop{outline:4px solid var(--grape)}
.quote{font-size:1.05rem}.quote b{display:block;margin-top:10px;font-family:Fredoka;color:var(--grape)}
/* form */
.form{max-width:640px;margin:auto;background:var(--card);padding:30px;border-radius:32px;box-shadow:var(--sh)}
label{display:block;font-weight:700;margin:12px 0 4px}
input,select,textarea{width:100%;font:inherit;padding:12px 16px;border:3px solid var(--lilac);border-radius:18px;background:var(--bg);color:var(--ink)}
.note{font-size:.9rem;color:var(--mute);margin-top:12px}
/* FAQ */
details{background:var(--card);border-radius:22px;padding:4px 22px;margin:0 auto 12px;max-width:760px;box-shadow:var(--sh)}
summary{font:600 1.1rem Fredoka;padding:14px 0;cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:12px}
summary::after{content:"+";color:var(--grape);font-size:1.5rem;line-height:1}details[open] summary::after{content:"–"}
details p{color:var(--mute)}
/* footer */
footer{background:var(--grape-d);color:#fff;padding:56px 0 100px;border-radius:48px 48px 0 0}
:root[data-theme="dark"] footer{color:#1D1230}
footer .g{display:grid;grid-template-columns:2fr 1fr 1fr;gap:30px}footer h3{margin-bottom:.4em}footer ul{list-style:none;padding:0;margin:0}footer a{text-decoration:none;opacity:.9}footer a:hover{text-decoration:underline}
@media(prefers-color-scheme:dark){:root:not([data-theme="light"]) footer{color:#1D1230}}
@media(max-width:700px){footer .g{grid-template-columns:1fr}}
.copy{border-top:2px dashed rgba(255,255,255,.3);margin-top:28px;padding-top:16px;font-size:.9rem}
/* floating */
.fab{position:fixed;right:18px;z-index:30;width:60px;height:60px;border-radius:50%;border:0;display:grid;place-items:center;font-size:1.8rem;cursor:pointer;box-shadow:0 6px 0 rgba(0,0,0,.2);text-decoration:none}
.wa{bottom:calc(env(safe-area-inset-bottom,0px) + 18px);background:#25D366;color:#fff}
.ai{bottom:calc(env(safe-area-inset-bottom,0px) + 90px);background:var(--grape);color:var(--on-grape)}
.ai::after{content:"AI";position:absolute;top:-4px;right:-4px;background:var(--pink);color:#4B2879;font:700 .7rem Fredoka;padding:2px 7px;border-radius:999px}
.chat{position:fixed;right:18px;bottom:calc(env(safe-area-inset-bottom,0px) + 162px);z-index:30;width:min(360px,calc(100vw - 36px));background:var(--card);border-radius:28px;box-shadow:0 12px 40px rgba(60,20,110,.35);display:none;flex-direction:column;overflow:hidden;max-height:min(520px,calc(100vh - 220px))}
.chat.open{display:flex}
.chat header{position:static;background:var(--grape);color:var(--on-grape);padding:14px 18px;border:0;font:600 1.1rem Fredoka;display:flex;justify-content:space-between}
.chat header button{background:none;border:0;color:inherit;font-size:1.3rem;cursor:pointer}
#msgs{padding:14px;overflow:auto;flex:1;display:flex;flex-direction:column;gap:8px}
.m{padding:10px 14px;border-radius:18px;max-width:86%;font-size:.95rem;line-height:1.45}
.m.bot{background:var(--lilac-l);align-self:flex-start}.m.me{background:var(--pink);color:#2A1B45;align-self:flex-end}
.chips{display:flex;flex-wrap:wrap;gap:6px;padding:0 14px 10px}.chips button{border:2px solid var(--lilac);background:var(--bg);color:var(--ink);border-radius:999px;padding:5px 12px;font:600 .85rem Nunito;cursor:pointer}
.chat form{display:flex;gap:8px;padding:10px;border-top:2px dashed var(--lilac)}.chat input{padding:10px 14px}.chat form button{width:auto;padding:0 18px;border-radius:18px;border:0;background:var(--grape);color:var(--on-grape);font:700 1rem Fredoka;cursor:pointer}
/* extra colorful */
.top{background:linear-gradient(90deg,#6B3FA0,#E86BB0,#4DA8E8,#6B3FA0)}
.hero{background:radial-gradient(circle at 12% 18%,var(--pink) 0 6px,transparent 7px),radial-gradient(circle at 48% 8%,#FFE7A3 0 7px,transparent 8px),radial-gradient(circle at 78% 72%,var(--lilac) 0 8px,transparent 9px),radial-gradient(circle at 94% 10%,var(--blue) 0 10px,transparent 11px),radial-gradient(circle at 30% 92%,#BDF0D8 0 7px,transparent 8px),radial-gradient(circle at 85% 20%,var(--blue-l),transparent 45%),radial-gradient(circle at 5% 90%,var(--pink-l),transparent 45%)}
.stk{position:absolute;font-size:2.3rem;animation:fl 4s ease-in-out infinite;pointer-events:none}
@keyframes fl{50%{transform:translateY(-12px) rotate(10deg)}}
.s-pink,.s-blue{border-radius:56px;margin:0 10px}.s-pink{background:var(--pink-l)}.s-blue{background:var(--blue-l)}
.head h2::after{content:"";display:block;width:140px;height:12px;margin:10px auto 0;background:radial-gradient(circle,var(--pink) 4px,transparent 5px) 0 0/28px 12px repeat-x,radial-gradient(circle,var(--blue) 4px,transparent 5px) 14px 0/28px 12px repeat-x}
.card{border:3px solid transparent}.c-l{background:var(--lilac-l);border-color:var(--lilac)}.c-p{background:var(--pink-l);border-color:var(--pink)}.c-b{background:var(--blue-l);border-color:var(--blue)}
.card .ic{width:80px;height:80px;font-size:2.6rem;transform:rotate(-7deg);box-shadow:inset -5px -7px 0 rgba(0,0,0,.08)}.card:nth-child(even) .ic{transform:rotate(7deg)}
.card:hover .ic{animation:fl 1s ease-in-out}
.band{overflow:hidden;background:var(--grape);padding:14px 0;transform:rotate(-1.2deg);margin:-26px -10px 20px;position:relative;z-index:2}
.track{display:flex;gap:14px;width:max-content;animation:run 28s linear infinite}
.track span{font:600 1.1rem Fredoka;padding:6px 18px;border-radius:999px;color:#2A1B45;white-space:nowrap}
.track span:nth-child(4n+1){background:var(--pink)}.track span:nth-child(4n+2){background:var(--blue)}.track span:nth-child(4n+3){background:var(--lilac)}.track span:nth-child(4n){background:#FFE7A3}
@keyframes run{to{transform:translateX(-50%)}}
.mates{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:22px}
.mate{border-radius:40px;padding:24px 16px;text-align:center;font-family:Fredoka;color:#2A1B45;box-shadow:var(--sh);transition:transform .2s}
.mate:hover{transform:rotate(-3deg) scale(1.04)}
.mate span{display:grid;place-items:center;font-size:4.2rem;width:112px;height:112px;margin:0 auto 12px;background:rgba(255,255,255,.6);border-radius:50%}
.mate b{display:block;font-size:1.25rem}.mate small{font:600 .95rem Nunito}
.mate:nth-child(1){background:var(--pink)}.mate:nth-child(2){background:var(--blue)}.mate:nth-child(3){background:#FFE7A3}.mate:nth-child(4){background:#BDF0D8}
.gal div{box-shadow:var(--sh);transition:transform .2s}.gal div:hover{transform:rotate(-2deg) scale(1.03)}.gal span{font-size:3.6rem}
.av{float:left;display:grid;place-items:center;font-size:2rem;width:56px;height:56px;border-radius:50%;background:var(--pink);margin:0 14px 6px 0}
.card.quote:nth-child(2) .av{background:var(--blue)}.card.quote:nth-child(3) .av{background:var(--lilac)}
@media(prefers-reduced-motion:reduce){*{animation:none!important;scroll-behavior:auto!important;transition:none!important}}
</style>
</head>
<body>
<div class="top">🎈 Pendaftaran tahun ajaran baru dibuka – kuota kelas terbatas, kunjungi sekolah gratis!</div>
<header>
<div class="wrap nav">
<a class="logo" href="#home"><i></i>Jeli Kecil</a>
<nav id="menu" aria-label="Menu utama"><ul>
<li><a href="#program">Program</a></li><li><a href="#jadwal">Jadwal</a></li><li><a href="#fasilitas">Fasilitas</a></li><li><a href="#galeri">Galeri</a></li><li><a href="#biaya">Biaya</a></li><li><a href="#faq">FAQ</a></li>
</ul></nav>
<a class="btn cta" href="#daftar">Daftar sekarang</a>
<button class="burger" id="burger" aria-label="Buka menu" aria-expanded="false">☰</button>
</div>
</header>

<main id="home">
<section class="hero"><div class="wrap">
<div>
<span class="tag">Preschool & Daycare · usia 6 bulan – 6 tahun</span>
<h1>Tempat main yang bikin anak <span>betah belajar</span></h1>
<p>Belajar lewat bermain, guru yang sabar, dan laporan harian untuk orang tua. Anak tumbuh ceria, Ayah dan Bunda tenang bekerja.</p>
<div class="cta-row"><a class="btn" href="#daftar">Jadwalkan kunjungan</a><a class="btn pink" href="https://wa.me/6281234567890?text=Halo%20Jeli%20Kecil%2C%20saya%20ingin%20bertanya" target="_blank" rel="noopener">Chat WhatsApp</a></div>
<div class="stats"><div><b>12 tahun</b>pengalaman</div><div><b>1 : 6</b>guru dan anak</div><div><b>07.00–17.30</b>jam layanan</div></div>
</div>
<div class="jelly" aria-hidden="true">
<button class="blob b1" tabindex="-1">🧸</button><button class="blob b2" tabindex="-1">🎨</button><button class="blob b3" tabindex="-1">⭐</button><button class="blob b4" tabindex="-1">📚</button>
<span class="stk" style="left:-4%;top:-2%">🌈</span><span class="stk" style="right:-2%;top:40%;animation-delay:-1s">🎈</span><span class="stk" style="left:40%;top:-6%;animation-delay:-2s">☁️</span><span class="stk" style="left:-6%;top:48%;animation-delay:-3s">🦋</span><span class="stk" style="right:30%;bottom:-6%;animation-delay:-1.5s">🍭</span><span class="stk" style="right:6%;bottom:2%;animation-delay:-2.5s">🐥</span>
</div>
</div></section>

<div class="band" aria-hidden="true"><div class="track"><span>🌈 Belajar sambil bermain</span><span>🎨 Seni dan kreasi</span><span>🎶 Musik dan lagu</span><span>🌱 Berkebun</span><span>📖 Dongeng seru</span><span>🧩 Puzzle</span><span>🌈 Belajar sambil bermain</span><span>🎨 Seni dan kreasi</span><span>🎶 Musik dan lagu</span><span>🌱 Berkebun</span><span>📖 Dongeng seru</span><span>🧩 Puzzle</span></div></div>

<section><div class="wrap">
<div class="head"><h2>Kenalan dengan kelas kami</h2><p>Setiap kelas punya maskot lucu yang menemani anak belajar.</p></div>
<div class="mates">
<div class="mate"><span>🐘</span><b>Kelas Gajah</b><small>6 – 24 bulan</small></div>
<div class="mate"><span>🐰</span><b>Kelas Kelinci</b><small>2 – 3 tahun</small></div>
<div class="mate"><span>🦁</span><b>Kelas Singa</b><small>3 – 4 tahun</small></div>
<div class="mate"><span>🦉</span><b>Kelas Burung Hantu</b><small>5 – 6 tahun</small></div>
</div></div></section>

<section id="program" class="s-pink"><div class="wrap">
<div class="head"><h2>Program untuk setiap usia</h2><p>Kurikulum dibagi sesuai tahap perkembangan, dari bayi sampai siap masuk SD.</p></div>
<div class="grid">
<div class="card c-p"><div class="ic">🍼</div><h3>Daycare Bayi</h3><p>Perawatan penuh kasih, stimulasi sensori, dan jadwal tidur serta makan sesuai kebiasaan di rumah.</p><span class="meta">6 – 24 bulan</span></div>
<div class="card c-b"><div class="ic">🚂</div><h3>Toddler Playgroup</h3><p>Belajar bicara, jalan, dan berbagi lewat permainan sensori dan lagu.</p><span class="meta">2 – 3 tahun</span></div>
<div class="card c-l"><div class="ic">🎨</div><h3>Preschool</h3><p>Mengenal huruf, angka, seni, dan sains sederhana dengan proyek tematik.</p><span class="meta">3 – 4 tahun</span></div>
<div class="card c-p"><div class="ic">🎒</div><h3>Kindergarten</h3><p>Persiapan membaca, menulis, dan berhitung agar percaya diri masuk SD.</p><span class="meta">5 – 6 tahun</span></div>
</div>
</div></section>

<section id="jadwal" class="alt"><div class="wrap">
<div class="head"><h2>Satu hari di Jeli Kecil</h2></div>
<ol class="time">
<li><b>07.00</b> – Anak datang, salam pagi, dan bermain bebas</li>
<li><b>08.30</b> – Lingkaran pagi: doa, lagu, dan cerita</li>
<li><b>09.30</b> – Sesi belajar tematik dan seni</li>
<li><b>10.30</b> – Makan siang sehat dan gosok gigi</li>
<li><b>12.00</b> – Tidur siang di ruang tenang</li>
<li><b>14.30</b> – Bermain luar ruang dan sensori</li>
<li><b>16.00</b> – Camilan, laporan harian, dan jemput</li>
</ol>
</div></section>

<section id="fasilitas" class="s-blue"><div class="wrap">
<div class="head"><h2>Aman dan nyaman untuk si kecil</h2></div>
<div class="grid">
<div class="card c-b"><div class="ic">📹</div><h3>CCTV dan akses orang tua</h3><p>Pantau kegiatan anak lewat aplikasi selama jam sekolah.</p></div>
<div class="card c-l"><div class="ic">🥗</div><h3>Katering sehat</h3><p>Menu disusun ahli gizi, bebas pemanis buatan, aman untuk alergi.</p></div>
<div class="card c-p"><div class="ic">🛝</div><h3>Taman bermain</h3><p>Area pasir, air, dan panjat dengan lantai empuk.</p></div>
<div class="card c-b"><div class="ic">🩺</div><h3>Cek kesehatan</h3><p>Pemeriksaan rutin dan protokol kebersihan setiap hari.</p></div>
</div>
</div></section>

<section id="galeri" class="alt"><div class="wrap">
<div class="head"><h2>Galeri keseruan</h2><p>Ganti dengan foto asli kegiatan sekolah Anda.</p></div>
<div class="gal">
<div class="w" style="background:var(--lilac)"><span>🎨</span>Hari melukis</div>
<div style="background:var(--pink)"><span>🌱</span>Berkebun</div>
<div style="background:var(--blue)"><span>🎶</span>Musik</div>
<div style="background:var(--blue)"><span>🧩</span>Puzzle</div>
<div class="w" style="background:var(--pink)"><span>🎉</span>Pentas seni</div>
<div style="background:var(--lilac)"><span>🏃</span>Outbound</div>
<div style="background:#FFE7A3"><span>🐣</span>Kenal hewan</div>
</div>
</div></section>

<section id="biaya" class="s-pink"><div class="wrap price">
<div class="head"><h2>Paket dan biaya</h2><p>Harga contoh, sesuaikan dengan sekolah Anda. Uang pangkal sudah termasuk seragam.</p></div>
<div class="grid">
<div class="card c-b"><h3>Half Day</h3><div class="big">Rp1,6 jt<small>/bln</small></div><ul><li>07.30 – 12.00</li><li>Makan siang</li><li>Laporan harian</li></ul><a class="btn ghost" href="#daftar">Pilih paket</a></div>
<div class="card c-l pop"><h3>Full Day</h3><div class="big">Rp2,4 jt<small>/bln</small></div><ul><li>07.00 – 16.00</li><li>2x makan + camilan</li><li>Tidur siang</li><li>Akses CCTV</li></ul><a class="btn" href="#daftar">Pilih paket</a></div>
<div class="card c-p"><h3>Extended Daycare</h3><div class="big">Rp3,1 jt<small>/bln</small></div><ul><li>07.00 – 17.30</li><li>Les seni atau musik</li><li>Antar jemput opsional</li></ul><a class="btn ghost" href="#daftar">Pilih paket</a></div>
</div>
</div></section>

<section class="alt"><div class="wrap">
<div class="head"><h2>Kata orang tua</h2></div>
<div class="grid">
<div class="card quote"><span class="av">👩</span>“Anak saya yang tadinya pemalu sekarang berani maju bernyanyi. Laporan hariannya detail sekali.”<b>Bunda Sinta, ibu Kayla</b></div>
<div class="card quote"><span class="av">👨</span>“Saya tenang kerja karena bisa lihat CCTV. Gurunya hangat dan sabar.”<b>Ayah Dimas, ayah Raka</b></div>
<div class="card quote"><span class="av">👩‍🦱</span>“Menu makannya sehat, dan anak jadi mau makan sayur.”<b>Bunda Lia, ibu Naura</b></div>
</div>
</div></section>

<section id="daftar" class="s-blue"><div class="wrap">
<div class="head"><h2>Daftar atau jadwalkan kunjungan</h2><p>Isi formulir, pesan akan terkirim ke WhatsApp admin kami.</p></div>
<form class="form" id="reg">
<label for="n">Nama orang tua</label><input id="n" required placeholder="Contoh: Bunda Rina">
<label for="a">Usia anak</label>
<select id="a" required><option value="">Pilih usia</option><option>6 – 24 bulan</option><option>2 – 3 tahun</option><option>3 – 4 tahun</option><option>5 – 6 tahun</option></select>
<label for="p">Paket yang diminati</label>
<select id="p"><option>Half Day</option><option>Full Day</option><option>Extended Daycare</option><option>Belum tahu</option></select>
<label for="t">Pesan (opsional)</label><textarea id="t" rows="3" placeholder="Alergi, jam kunjungan, dll."></textarea>
<p></p><button class="btn" type="submit">Kirim lewat WhatsApp</button>
<p class="note">Data hanya dipakai untuk menghubungi Anda.</p>
</form>
</div></section>

<section id="faq" class="alt"><div class="wrap">
<div class="head"><h2>Pertanyaan yang sering ditanyakan</h2></div>
<details open><summary>Usia berapa anak boleh mulai?</summary><p>Daycare menerima mulai usia 6 bulan. Program preschool mulai 3 tahun.</p></details>
<details><summary>Apakah ada masa adaptasi?</summary><p>Ya, minggu pertama anak datang bertahap dan boleh ditemani orang tua.</p></details>
<details><summary>Bagaimana jika anak punya alergi?</summary><p>Beri tahu kami saat mendaftar. Menu dan camilan disesuaikan, dan guru tahu cara menanganinya.</p></details>
<details><summary>Apakah ada laporan perkembangan?</summary><p>Laporan harian dikirim lewat aplikasi, dan rapor perkembangan dibagikan setiap semester.</p></details>
<details><summary>Boleh kunjungan sebelum mendaftar?</summary><p>Tentu. Jadwalkan lewat formulir atau WhatsApp, kunjungan gratis tanpa kewajiban mendaftar.</p></details>
</div></section>
</main>

<footer>
<div class="wrap">
<div class="g">
<div><div class="logo" style="color:inherit"><i></i>Jeli Kecil</div><p>Preschool & Daycare yang ceria, aman, dan penuh kasih. Belajar lewat bermain setiap hari.</p></div>
<div><h3>Menu</h3><ul><li><a href="#program">Program</a></li><li><a href="#biaya">Biaya</a></li><li><a href="#daftar">Pendaftaran</a></li><li><a href="#faq">FAQ</a></li></ul></div>
<div><h3>Kontak</h3><ul><li>Jl. Pelangi No. 12</li><li>0812-3456-7890</li><li>hai@jelikecil.id</li><li>Senin – Jumat, 07.00 – 17.30</li></ul></div>
</div>
<div class="copy">© 2026 Jeli Kecil. Semua hak dilindungi.</div>
</div>
</footer>

<div class="chat" id="chat" role="dialog" aria-label="Asisten AI Jeli Kecil">
<header><span>🤖 Asisten Jeli</span><button id="x" aria-label="Tutup">✕</button></header>
<div id="msgs"></div>
<div class="chips" id="chips"></div>
<form id="cf"><input id="ci" placeholder="Tanya apa saja…" aria-label="Pesan"><button>Kirim</button></form>
</div>
<button class="fab ai" id="aib" aria-label="Buka asisten AI">✨</button>
<a class="fab wa" href="https://wa.me/6281234567890?text=Halo%20Jeli%20Kecil%2C%20saya%20ingin%20bertanya" target="_blank" rel="noopener" aria-label="Chat WhatsApp">💬</a>

<script>
const $=id=>document.getElementById(id),WA="6281234567890";
$("burger").onclick=()=>{const o=$("menu").classList.toggle("open");$("burger").setAttribute("aria-expanded",o)};
$("menu").onclick=e=>{if(e.target.tagName==="A")$("menu").classList.remove("open")};
$("reg").onsubmit=e=>{e.preventDefault();const t=`Halo Jeli Kecil, saya ${$("n").value}. Anak saya usia ${$("a").value}, tertarik paket ${$("p").value}. ${$("t").value}`;window.open(`https://wa.me/${WA}?text=${encodeURIComponent(t)}`,"_blank")};
/* Asisten AI (demo berbasis aturan; sambungkan ke API untuk jawaban nyata) */
const msgs=$("msgs"),chips=$("chips");
const add=(t,c)=>{const d=document.createElement("div");d.className="m "+c;d.textContent=t;msgs.appendChild(d);msgs.scrollTop=msgs.scrollHeight};
const KB=[
[/bayi|bulan|0|baby/,"Untuk usia 6–24 bulan, cocok Daycare Bayi dengan paket Full Day atau Extended."],
[/biaya|harga|bayar|paket/,"Half Day Rp1,6 jt, Full Day Rp2,4 jt, Extended Daycare Rp3,1 jt per bulan (contoh harga)."],
[/jam|buka|jadwal/,"Kami buka Senin–Jumat 07.00–17.30. Kunjungan bisa dijadwalkan lewat formulir."],
[/alergi|makan|menu/,"Menu disusun ahli gizi dan bisa disesuaikan untuk alergi. Beri tahu kami saat mendaftar."],
[/daftar|kunjung|tour/,"Isi formulir di bagian Daftar, atau tekan tombol WhatsApp untuk bicara dengan admin."]];
const rec=a=>({"1":"Usia 6–24 bulan: Daycare Bayi, paket Full Day.","2":"Usia 2–3 tahun: Toddler Playgroup, paket Half Day atau Full Day.","3":"Usia 3–4 tahun: Preschool, paket Full Day.","5":"Usia 5–6 tahun: Kindergarten, paket Full Day agar siap masuk SD."})[a];
function ans(q){q=q.toLowerCase();const m=q.match(/(\d+)\s*(tahun|th)/);
 if(m){const n=+m[1];return rec(n<2?"1":n<3?"2":n<5?"3":"5")}
 if(/rekomendasi|cocok/.test(q))return "Berapa usia anak Anda? Contoh: “anak saya 3 tahun”.";
 for(const [r,a] of KB)if(r.test(q))return a;
 return "Maaf, saya belum paham. Coba tanya soal biaya, jam buka, atau usia anak, atau chat admin lewat WhatsApp."}
function ask(q){add(q,"me");setTimeout(()=>add(ans(q),"bot"),350)}
["Rekomendasi program","Berapa biaya?","Jam buka","Soal alergi"].forEach(t=>{const b=document.createElement("button");b.textContent=t;b.onclick=()=>ask(t);chips.appendChild(b)});
add("Halo! Saya asisten Jeli Kecil. Ceritakan usia anak Anda, saya bantu pilih program yang cocok. 🧸","bot");
$("aib").onclick=()=>$("chat").classList.toggle("open");$("x").onclick=()=>$("chat").classList.remove("open");
$("cf").onsubmit=e=>{e.preventDefault();const v=$("ci").value.trim();if(v){ask(v);$("ci").value=""}};
</script>
</body>
</html>
