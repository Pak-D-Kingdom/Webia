@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="color-scheme" content="dark">
<title>NIGHTSHIFT Auto – Modifikasi dan Aksesori Kendaraan</title>
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@500;700;900&family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">
<style>
:root{--bg:#0A0A0B;--sf:#141416;--sf2:#1C1C1F;--ln:rgba(255,255,255,.1);--tx:#EDEAE4;--mu:#8C8A86;--rd:#FF2D2D;--wm:#FFD9A0;
--h:'Big Shoulders Display',Impact,sans-serif;--b:'Manrope',system-ui,sans-serif;color-scheme:dark;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth;scroll-padding-top:70px}
body{margin:0;background:var(--bg);color:var(--tx);font:400 16px/1.65 var(--b);overflow-x:hidden}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:13px 26px;background:var(--rd);color:#fff;border:0;border-radius:4px;font:700 14px var(--b);letter-spacing:.04em;cursor:pointer;transition:.25s}
.btn:hover,.btn:focus-visible{background:#fff;color:var(--bg);outline:none}
.btn.g{background:transparent;border:1px solid var(--ln);color:var(--tx)}
.btn.g:hover{border-color:var(--rd);background:transparent;color:var(--rd)}
nav.t{position:fixed;top:env(safe-area-inset-top,0px);left:0;right:0;z-index:50;display:flex;align-items:center;justify-content:space-between;padding:16px 4vw;transition:.35s}
nav.t.s{background:rgba(10,10,11,.88);backdrop-filter:blur(12px);border-bottom:1px solid var(--ln);padding:10px 4vw}
.logo{font:900 26px var(--h);letter-spacing:.06em;text-transform:uppercase}.logo b{color:var(--rd)}
nav.t ul{display:flex;gap:30px;list-style:none;margin:0;padding:0;font-size:14px;font-weight:500;color:var(--mu)}
nav.t ul a:hover{color:var(--tx)}
.nr{display:flex;gap:10px;align-items:center}
.ask{display:flex;align-items:center;gap:10px;padding:9px 14px;background:var(--sf);border:1px solid var(--ln);border-radius:8px;color:var(--mu);font:500 13px var(--b);cursor:pointer}
.ask kbd{font:500 11px var(--b);padding:2px 6px;border:1px solid var(--ln);border-radius:4px}
.ask:hover{border-color:var(--rd);color:var(--tx)}
.cb{position:relative;padding:9px 16px}
.cb i{font-style:normal;background:#fff;color:var(--bg);border-radius:99px;min-width:20px;height:20px;display:inline-grid;place-items:center;font-size:12px}
@media(max-width:820px){nav.t ul,.ask kbd{display:none}}
/* hero */
.hero{position:relative;height:100vh;min-height:680px;overflow:hidden;--x:68%;--y:58%}
.sc{position:absolute;inset:0;display:grid;place-items:end center;padding-bottom:22vh}
.sc svg{width:min(1000px,94vw);height:auto}
.lit{-webkit-mask-image:radial-gradient(circle 250px at var(--x) var(--y),#000 15%,rgba(0,0,0,.5) 55%,transparent 100%);mask-image:radial-gradient(circle 250px at var(--x) var(--y),#000 15%,rgba(0,0,0,.5) 55%,transparent 100%)}
.hz{position:absolute;inset:0;background:radial-gradient(circle 320px at var(--x) var(--y),rgba(255,217,160,.13),transparent);pointer-events:none;mix-blend-mode:screen}
.ht{position:absolute;left:4vw;top:19vh;z-index:3;max-width:760px;pointer-events:none}
.ht .k{font:600 12px var(--b);letter-spacing:.24em;text-transform:uppercase;color:var(--rd)}
.ht h1{font:900 clamp(64px,11vw,170px)/.84 var(--h);text-transform:uppercase;letter-spacing:-.01em;margin:14px 0 18px}
.ht h1 span{color:transparent;-webkit-text-stroke:1.5px var(--tx)}
.ht p{max-width:430px;color:var(--mu)}
.hint{position:absolute;right:4vw;top:19vh;font:500 12px var(--b);color:var(--mu);letter-spacing:.14em;text-transform:uppercase;display:flex;gap:10px;align-items:center;z-index:3}
.hint::before{content:"";width:9px;height:9px;border-radius:50%;background:var(--wm);box-shadow:0 0 14px var(--wm);animation:bl 1.8s infinite}
@keyframes bl{50%{opacity:.3}}
.fd{position:absolute;left:4vw;right:4vw;bottom:5vh;z-index:5;display:grid;grid-template-columns:auto 1fr 1fr auto;gap:12px;align-items:center;padding:14px 16px 14px 24px;background:rgba(20,20,22,.82);backdrop-filter:blur(14px);border:1px solid var(--ln);border-radius:14px}
.fd b{font:700 22px var(--h);letter-spacing:.06em;text-transform:uppercase;padding-right:14px;border-right:1px solid var(--ln)}
.fd select{width:100%;padding:13px;background:var(--bg);border:1px solid var(--ln);border-radius:8px;color:var(--tx);font:500 15px var(--b)}
.fd select:focus{border-color:var(--rd);outline:none}
@media(max-width:860px){.fd{grid-template-columns:1fr 1fr;padding:14px}.fd b{grid-column:1/-1;border:0;padding:0}.fd .btn{grid-column:1/-1}.ht{top:14vh}.hint{top:auto;bottom:34vh;right:4vw}.sc{padding-bottom:36vh}.hero{min-height:760px}}
.in{opacity:0;transform:translateY(30px);animation:in 1s cubic-bezier(.2,.8,.2,1) forwards}
.d1{animation-delay:.15s}.d2{animation-delay:.3s}
@keyframes in{to{opacity:1;transform:none}}
.mq{border-block:1px solid var(--ln);overflow:hidden;white-space:nowrap;padding:14px 0;background:var(--sf)}
.mq div{display:inline-block;animation:mq 34s linear infinite;font:700 30px var(--h);letter-spacing:.1em;text-transform:uppercase;color:var(--mu)}
.mq i{color:var(--rd);font-style:normal;margin:0 .8em}
@keyframes mq{to{transform:translateX(-50%)}}
section{padding:100px 4vw}
.eb{font:600 12px var(--b);letter-spacing:.24em;text-transform:uppercase;color:var(--rd)}
h2{font:900 clamp(44px,7vw,104px)/.88 var(--h);text-transform:uppercase;margin:12px 0 0}
.hr{display:flex;justify-content:space-between;align-items:end;gap:30px;flex-wrap:wrap}
.cc{display:flex;gap:8px;flex-wrap:wrap;margin:36px 0 10px}
.ch{padding:9px 18px;border:1px solid var(--ln);border-radius:99px;background:none;color:var(--mu);font:500 14px var(--b);cursor:pointer;transition:.2s}
.ch:hover{color:var(--tx);border-color:var(--mu)}
.ch[aria-pressed=true]{background:var(--tx);color:var(--bg);border-color:var(--tx)}
.fl{min-height:30px;font-size:14px;color:var(--mu);margin-bottom:22px;display:flex;gap:10px;align-items:center;flex-wrap:wrap}
.fl button{background:none;border:1px solid var(--rd);color:var(--rd);border-radius:99px;padding:3px 12px;cursor:pointer;font:600 12px var(--b)}
.gr{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.pr{background:var(--sf);border:1px solid var(--ln);border-radius:16px;overflow:hidden;display:flex;flex-direction:column;transition:.3s}
.pr:hover{border-color:rgba(255,45,45,.6);transform:translateY(-5px);box-shadow:0 18px 40px -18px rgba(255,45,45,.4)}
.pi{aspect-ratio:16/10;display:grid;place-items:center;background:radial-gradient(circle at 50% 60%,#26262B,var(--sf) 70%);color:var(--tx);position:relative}
.pi svg{width:42%;stroke:currentColor;fill:none;stroke-width:1.6;transition:.4s}
.pr:hover .pi svg{color:var(--wm);transform:scale(1.08) rotate(-4deg)}
.pi em{position:absolute;left:14px;top:12px;font:600 11px var(--b);font-style:normal;letter-spacing:.14em;text-transform:uppercase;color:var(--mu)}
.pb{padding:20px;display:flex;flex-direction:column;gap:10px;flex:1}
.pb h3{font:700 24px/1.05 var(--h);text-transform:uppercase;letter-spacing:.02em}
.fit{font-size:12.5px;color:var(--mu)}
.pf{display:flex;justify-content:space-between;align-items:center;margin-top:auto;padding-top:6px}
.pf b{font:700 20px var(--h);letter-spacing:.03em}
.pf .btn{padding:9px 16px;font-size:13px}
.em{grid-column:1/-1;text-align:center;padding:60px;color:var(--mu);border:1px dashed var(--ln);border-radius:16px}
@media(max-width:960px){.gr{grid-template-columns:1fr 1fr}}@media(max-width:600px){.gr{grid-template-columns:1fr}}
.qt{text-align:center;background:var(--sf);border-block:1px solid var(--ln)}
.qt blockquote{margin:30px auto 0;max-width:900px;font:700 clamp(30px,4.6vw,60px)/1.02 var(--h);text-transform:uppercase;min-height:3.2em;transition:opacity .4s}
.qt cite{display:block;font:500 14px var(--b);color:var(--mu);font-style:normal;margin-top:20px}
.dts{display:flex;gap:8px;justify-content:center;margin-top:24px}
.dts button{width:34px;height:4px;border:0;background:var(--ln);cursor:pointer;padding:0}.dts .on{background:var(--rd)}
.sv{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--ln);border:1px solid var(--ln);margin-top:46px}
.sv div{background:var(--bg);padding:34px 28px}
.sv b{font:900 56px/1 var(--h);color:transparent;-webkit-text-stroke:1.2px var(--rd);display:block}
.sv h3{font:700 26px var(--h);text-transform:uppercase;margin:8px 0 6px}.sv p{color:var(--mu);font-size:15px}
@media(max-width:800px){.sv{grid-template-columns:1fr}}
footer{padding:50px 4vw 30px;border-top:1px solid var(--ln);overflow:hidden}
footer .w{font:900 clamp(70px,18vw,280px)/.8 var(--h);text-transform:uppercase;color:transparent;-webkit-text-stroke:1.5px #2c2c30;white-space:nowrap}
footer p{font-size:12.5px;color:var(--mu);max-width:700px;margin-top:24px}
/* cart */
.ov{position:fixed;inset:0;background:rgba(0,0,0,.65);backdrop-filter:blur(4px);z-index:90;opacity:0;pointer-events:none;transition:.3s}
.ov.on{opacity:1;pointer-events:auto}
#cart{position:fixed;top:0;right:0;bottom:0;z-index:100;width:min(440px,100vw);background:var(--sf);border-left:1px solid var(--ln);transform:translateX(102%);transition:transform .5s cubic-bezier(.7,0,.2,1);display:flex;flex-direction:column;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
#cart.on{transform:none}
#cart header{padding:22px 24px;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid var(--ln)}
#cart header h3{font:900 30px var(--h);text-transform:uppercase}
.x{background:none;border:0;color:var(--tx);font-size:26px;cursor:pointer}
#cl{flex:1;overflow-y:auto;padding:10px 24px}
.ci{display:grid;grid-template-columns:1fr auto;gap:4px 14px;padding:16px 0;border-bottom:1px solid var(--ln)}
.ci b{font:700 19px var(--h);text-transform:uppercase}.ci small{color:var(--mu)}
.qy{display:flex;align-items:center;gap:10px;grid-column:1/-1;margin-top:6px}
.qy button{width:28px;height:28px;border-radius:50%;border:1px solid var(--ln);background:none;color:var(--tx);cursor:pointer}
.qy button:hover{border-color:var(--rd)}
.cf2{padding:18px 24px 22px;border-top:1px solid var(--ln);background:var(--bg)}
.cf2 label{display:block;font:600 11px var(--b);letter-spacing:.16em;text-transform:uppercase;color:var(--mu);margin:10px 0 5px}
.cf2 select{width:100%;padding:11px;background:var(--sf);border:1px solid var(--ln);border-radius:8px;color:var(--tx);font:500 14px var(--b)}
.tot{display:flex;justify-content:space-between;align-items:baseline;margin-top:16px;font:900 34px var(--h)}
.tot span:first-child{font:600 12px var(--b);letter-spacing:.16em;color:var(--mu)}
.cn{font-size:12px;color:var(--mu);margin:4px 0 14px}
/* assistant palette */
#cmd{position:fixed;inset:0;z-index:110;display:none;align-items:flex-start;justify-content:center;padding:12vh 14px 14px;background:rgba(0,0,0,.7);backdrop-filter:blur(6px)}
#cmd.on{display:flex}
.pl{width:min(640px,100%);background:var(--sf);border:1px solid var(--ln);border-radius:16px;box-shadow:0 30px 80px rgba(0,0,0,.7);overflow:hidden;animation:in .3s forwards;opacity:0}
.pl form{display:flex;align-items:center;gap:12px;padding:6px 18px;border-bottom:1px solid var(--ln)}
.pl form span{color:var(--rd);font-size:20px}
.pl input{flex:1;padding:16px 0;background:none;border:0;color:var(--tx);font:500 18px var(--b);outline:none;min-width:0}
.pl kbd{font:500 11px var(--b);color:var(--mu);border:1px solid var(--ln);padding:2px 6px;border-radius:4px}
#ms{max-height:44vh;overflow-y:auto;padding:16px 20px;display:flex;flex-direction:column;gap:12px;font-size:15px}
.m.u{align-self:flex-end;background:var(--rd);padding:7px 14px;border-radius:99px;font-weight:700;font-size:14px}
.m.b{color:var(--tx)}.m.b::before{content:"NIGHTSHIFT";display:block;font:700 10px var(--b);letter-spacing:.2em;color:var(--rd);margin-bottom:2px}
.cs{display:flex;flex-wrap:wrap;gap:8px;padding:0 20px 16px}
.cs button{padding:7px 14px;background:var(--sf2);border:1px solid var(--ln);border-radius:99px;color:var(--tx);font:500 13px var(--b);cursor:pointer}
.cs button:hover{border-color:var(--rd)}
#wa{display:block;padding:13px;text-align:center;background:#1FA855;color:#fff;font-weight:700;font-size:14px}
:focus-visible{outline:2px solid var(--wm);outline-offset:3px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}.in{opacity:1;transform:none}}
</style>
</head>
<body>
<nav class="t" id="nav"><a class="logo" href="#top">Night<b>shift</b></a>
<ul><li><a href="#katalog">Katalog</a></li><li><a href="#layanan">Layanan</a></li><li><a href="#ulasan">Ulasan</a></li></ul>
<div class="nr"><button class="ask" id="oa">Tanya asisten <kbd>Ctrl K</kbd></button><button class="btn cb" id="oc">Keranjang <i id="cn">0</i></button></div></nav>

<header class="hero" id="top">
<div class="sc" id="dim"></div><div class="sc lit" id="lit"></div><div class="hz"></div>
<div class="ht"><div class="k in">Modifikasi dan aksesori kendaraan</div><h1 class="in d1">Malam adalah <span>panggung</span> terbaik</h1><p class="in d2">Velg, lampu, body kit, sampai interior. Cari part yang sesuai kendaraanmu, pesan, lalu pasang di bengkel kami.</p></div>
<div class="hint">gerakkan kursor atau jari untuk menyalakan lampu</div>
<div class="fd"><b>Cari part</b><select id="bs" aria-label="Merek"><option value="">Semua merek</option></select><select id="ms_" aria-label="Model"><option value="">Semua model</option></select><button class="btn" id="go">Lihat part →</button></div>
</header>
<div class="mq" aria-hidden="true"><div id="mq"></div></div>

<section id="katalog">
<div class="hr"><div><span class="eb">01 / Katalog</span><h2>Part yang<br>siap dipasang</h2></div></div>
<div class="cc" id="cc" role="group" aria-label="Kategori"></div>
<div class="fl" id="fl"></div>
<div class="gr" id="gr"></div>
</section>

<section class="qt" id="ulasan"><span class="eb">02 / Ulasan</span><blockquote id="q"></blockquote><cite id="qc"></cite><div class="dts" id="dts"></div></section>

<section id="layanan"><span class="eb">03 / Layanan</span><h2>Beli, pasang,<br>selesai</h2>
<div class="sv"><div><b>01</b><h3>Konsultasi kecocokan</h3><p>Teknisi memeriksa kecocokan part dengan model dan tahun kendaraanmu sebelum dipesan.</p></div><div><b>02</b><h3>Pemasangan di bengkel</h3><p>Dikerjakan teknisi berpengalaman, lengkap dengan pengecekan akhir sebelum diserahkan.</p></div><div><b>03</b><h3>Kirim atau ambil</h3><p>Part tertentu bisa dikirim, atau diambil langsung di cabang pilihanmu.</p></div></div></section>

<footer><div class="w">nightshift</div><p>© 2026 NIGHTSHIFT Auto. Template contoh, ganti nama, katalog, harga, cabang, dan kontak sesuai bisnis Anda. Kecocokan part bersifat umum dan harus dikonfirmasi teknisi. Pastikan modifikasi sesuai peraturan lalu lintas dan uji tipe yang berlaku.</p></footer>

<div class="ov" id="ov"></div>
<aside id="cart" aria-label="Keranjang"><header><h3>Keranjang</h3><button class="x" id="xc" aria-label="Tutup">×</button></header><div id="cl"></div>
<div class="cf2"><label for="sv_">Layanan</label><select id="sv_"><option>Pasang di bengkel</option><option>Ambil sendiri di cabang</option><option>Kirim ke alamat</option></select>
<label for="br">Cabang</label><select id="br"><option>Cabang Pusat</option><option>Cabang Selatan</option><option>Cabang Barat</option></select>
<label for="tn">Simulasi pembayaran</label><select id="tn"><option value="0">Tunai</option><option value="3">Cicilan 3 bulan</option><option value="6">Cicilan 6 bulan</option><option value="12">Cicilan 12 bulan</option></select>
<div class="tot"><span>TOTAL</span><span id="ct">Rp 0</span></div><div class="cn" id="cm"></div>
<a class="btn" id="cw" href="#" style="width:100%">Kirim pesanan ke WhatsApp</a></div></aside>

<div id="cmd" role="dialog" aria-label="Asisten NIGHTSHIFT"><div class="pl"><form id="cf"><span>›</span><input id="ci" placeholder="Tanya soal part, harga, pemasangan…" autocomplete="off"><kbd>Esc</kbd></form>
<div id="ms"></div><div class="cs" id="cs"></div><a id="wa" href="#">Lanjutkan ke WhatsApp →</a></div></div>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="NIGHTSHIFT Auto",RATE=.012;
const $=i=>document.getElementById(i),rp=n=>"Rp "+Math.round(n).toLocaleString("id-ID"),wl=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t);
const BR={Toyota:["Avanza","Fortuner","Yaris"],Honda:["Brio","Civic","HR-V"],Mitsubishi:["Xpander","Pajero Sport"],Suzuki:["Ertiga","Jimny"],Daihatsu:["Xenia","Terios"]};
const CT=[["velg","Velg"],["lamp","Pencahayaan"],["ext","Eksterior"],["int","Interior"],["elec","Audio dan Elektronik"],["exh","Knalpot"],["prot","Proteksi"]];
const IC={velg:'<circle cx="50" cy="50" r="40"/><circle cx="50" cy="50" r="12"/><path d="M50 10v28M50 62v28M10 50h28M62 50h28M22 22l20 20M58 58l20 20M78 22L58 42M42 58L22 78"/>',
lamp:'<path d="M14 50c0-20 14-30 32-30 10 0 18 6 18 30S56 80 46 80C28 80 14 70 14 50z"/><circle cx="40" cy="50" r="10"/><path d="M72 36l20-8M74 50h20M72 64l20 8"/>',
ext:'<path d="M8 58l62-12 22 4-2 10L12 72z"/><path d="M30 64v18M66 56v18"/>',
int:'<circle cx="50" cy="50" r="40"/><circle cx="50" cy="50" r="9"/><path d="M10 50h31M59 50h31M50 59v31"/>',
elec:'<rect x="12" y="22" width="76" height="48" rx="6"/><circle cx="50" cy="46" r="10"/><path d="M34 82h32"/>',
exh:'<path d="M8 38h50a16 16 0 1 1 0 32H8z"/><ellipse cx="62" cy="54" rx="9" ry="12"/>',
prot:'<path d="M50 8l34 12v30c0 22-18 36-34 42C34 86 16 72 16 50V20z"/><path d="M36 50l10 10 18-20"/>'};
const P=[
["Velg Racing 17 inci Hitam Doff","velg",7.8e6,null],["Velg Forged 18 inci Bronze","velg",14.5e6,["Honda","Toyota","Mitsubishi"]],
["Headlamp Projector Bi-LED","lamp",3.2e6,null],["Lampu DRL dan Sein Sequential","lamp",.85e6,null],
["Spoiler Ducktail ABS","ext",1.9e6,["Honda","Toyota"]],["Side Skirt Carbon-look","ext",2.6e6,["Honda","Toyota","Suzuki"]],
["Setir Racing Suede 350 mm","int",1.2e6,null],["Jok Kulit Sport (set depan)","int",3.9e6,["Honda","Toyota","Mitsubishi","Daihatsu"]],
["Head Unit Android 10 inci","elec",2.8e6,null],["Dashcam 4K Depan-Belakang","elec",1.4e6,null],
["Knalpot Sport Stainless Catback","exh",4.5e6,["Honda","Toyota","Suzuki","Mitsubishi"]],["Paint Protection Film (kap mesin)","prot",5.5e6,null]];
const F={b:"",m:"",c:""},C={};
/* hero flashlight */
function suv(b){const k=b?"#F3EEE6":"#26262B",w=b?1.7:1.2;let s=`<svg viewBox="0 0 860 300" fill="none" stroke="${k}" stroke-width="${w}" stroke-linejoin="round" aria-hidden="true">`;
if(b)s+=`<defs><linearGradient id="bq" x1="0" x2="1"><stop offset="0" stop-color="#FFD9A0" stop-opacity=".7"/><stop offset="1" stop-color="#FFD9A0" stop-opacity="0"/></linearGradient><filter id="gb"><feGaussianBlur stdDeviation="7"/></filter></defs><polygon points="752,178 860,136 860,232" fill="url(#bq)" stroke="none"/><ellipse cx="748" cy="186" rx="14" ry="10" fill="#FFD9A0" stroke="none" filter="url(#gb)"/><rect x="66" y="172" width="12" height="22" fill="#FF2D2D" stroke="none" filter="url(#gb)"/>`;
s+=`<path d="M70 232V172Q70 152 92 150L190 146L232 94Q238 86 250 86H560Q576 86 584 96L626 148L722 158Q750 162 750 188V232Z"/><path d="M254 98L230 142H396V98ZM412 98V142H612L572 98Z"/><path d="M398 98V232M70 198H750M262 72H552M278 72V86M536 72V86"/>`;
[190,632].forEach(c=>{s+=`<circle cx="${c}" cy="232" r="52" stroke-opacity=".5"/><circle cx="${c}" cy="232" r="42"/><circle cx="${c}" cy="232" r="14" ${b?'fill="#FF2D2D" stroke="none"':""}/>`;for(let i=0;i<6;i++){const a=i*Math.PI/3;s+=`<path d="M${c+Math.cos(a)*14} ${232+Math.sin(a)*14}L${c+Math.cos(a)*42} ${232+Math.sin(a)*42}"/>`}});
return s+"</svg>"}
dim.innerHTML=suv(0);lit.innerHTML=suv(1);
const hero=$("top");let act=false;function sp(x,y){hero.style.setProperty("--x",x+"px");hero.style.setProperty("--y",y+"px")}
["pointermove","pointerdown"].forEach(t=>hero.addEventListener(t,e=>{act=true;const r=hero.getBoundingClientRect();sp(e.clientX-r.left,e.clientY-r.top)}));
(function idle(t){if(!act){const r=hero.getBoundingClientRect();sp(r.width*(.62+.22*Math.sin(t/1700)),r.height*(.6+.1*Math.sin(t/1100)))}requestAnimationFrame(idle)})(0);
addEventListener("scroll",()=>nav.classList.toggle("s",scrollY>40),{passive:true});
mq.innerHTML=("Toyota<i>■</i>Honda<i>■</i>Mitsubishi<i>■</i>Suzuki<i>■</i>Daihatsu<i>■</i>").repeat(6);
/* finder + katalog */
Object.keys(BR).forEach(b=>bs.add(new Option(b,b)));
bs.onchange=()=>{F.b=bs.value;F.m="";ms_.length=1;(BR[F.b]||[]).forEach(m=>ms_.add(new Option(m,m)));cat()};ms_.onchange=()=>{F.m=ms_.value;cat()};
go.onclick=()=>{cat();$("katalog").scrollIntoView()};
cc.innerHTML=[["","Semua"],...CT].map(([k,n])=>`<button class="ch" data-c="${k}" aria-pressed="${k===""}">${n}</button>`).join("");
cc.onclick=e=>{const b=e.target.closest(".ch");if(b){F.c=b.dataset.c;cat()}};
function cat(){cc.querySelectorAll(".ch").forEach(b=>b.setAttribute("aria-pressed",b.dataset.c===F.c));
const L=P.map((p,i)=>[p,i]).filter(([p])=>(!F.c||p[1]===F.c)&&(!F.b||!p[3]||p[3].includes(F.b)));
const v=[F.b,F.m].filter(Boolean).join(" ");
fl.replaceChildren();
if(v){fl.append(document.createTextNode("Menampilkan part yang umumnya cocok untuk "));
const vehicle=document.createElement("b");vehicle.style.color="var(--tx)";vehicle.textContent=v;fl.append(vehicle,document.createTextNode(" "));
const clear=document.createElement("button");clear.id="rf";clear.textContent="Hapus filter ✕";clear.onclick=()=>{F.b=F.m="";bs.value="";ms_.length=1;cat()};fl.append(clear)}
else{fl.textContent=`${L.length} produk`}
gr.innerHTML=L.length?L.map(([p,i])=>`<article class="pr"><div class="pi"><em>${CT.find(c=>c[0]===p[1])[1]}</em><svg viewBox="0 0 100 100">${IC[p[1]]}</svg></div><div class="pb"><h3>${p[0]}</h3><div class="fit">${p[3]?"Umumnya cocok: "+p[3].join(", "):"Universal"}</div><div class="pf"><b>${rp(p[2])}</b><button class="btn" data-a="${i}">Tambah +</button></div></div></article>`).join(""):`<div class="em">Belum ada part untuk kombinasi ini. Tanyakan ke teknisi kami lewat asisten atau WhatsApp.</div>`}
gr.onclick=e=>{const b=e.target.closest("[data-a]");if(b){C[b.dataset.a]=(C[b.dataset.a]||0)+1;cartU();b.textContent="Ditambahkan ✓";setTimeout(()=>b.textContent="Tambah +",1100)}};
/* cart */
const op=()=>{cart.classList.add("on");ov.classList.add("on")},cl_=()=>{cart.classList.remove("on");ov.classList.remove("on");cmd.classList.remove("on")};
oc.onclick=op;xc.onclick=cl_;ov.onclick=cl_;
cl.onclick=e=>{const b=e.target.closest("[data-q]");if(!b)return;const i=b.dataset.i;C[i]=(C[i]||0)+ +b.dataset.q;if(C[i]<=0)delete C[i];cartU()};
[sv_,br,tn].forEach(e=>e.onchange=cartU);
function cartU(){const ids=Object.keys(C);let tot=0,n=0;
cl.innerHTML=ids.length?ids.map(i=>{const p=P[i],q=C[i];tot+=p[2]*q;n+=q;return `<div class="ci"><b>${p[0]}</b><b style="color:var(--rd)">${rp(p[2]*q)}</b><small>${rp(p[2])} / unit</small><span></span><div class="qy"><button data-i="${i}" data-q="-1" aria-label="Kurangi">−</button>${q}<button data-i="${i}" data-q="1" aria-label="Tambah">+</button></div></div>`}).join(""):`<p style="color:var(--mu);padding:30px 0">Keranjang masih kosong. Pilih part dari katalog.</p>`;
cn.textContent=n;ct.textContent=rp(tot);const t=+tn.value,mo=t?tot*(1+RATE*t)/t:0;
cm.textContent=t&&tot?`Simulasi: sekitar ${rp(mo)} per bulan selama ${t} bulan. Angka contoh, bukan penawaran final.`:"Harga final dan ketersediaan dikonfirmasi tim kami.";
const v=[F.b,F.m].filter(Boolean).join(" ")||"(belum dipilih)";
const txt=ids.length?`Halo ${BRAND}, saya ingin memesan:\n${ids.map(i=>`- ${C[i]}x ${P[i][0]} (${rp(P[i][2]*C[i])})`).join("\n")}\nKendaraan: ${v}\nLayanan: ${sv_.value}\nCabang: ${br.value}\nTotal: ${rp(tot)}${t?`\nSimulasi cicilan ${t} bulan: sekitar ${rp(mo)}/bulan`:""}\nMohon konfirmasi kecocokan dan ketersediaan.`:`Halo ${BRAND}, saya ingin konsultasi memilih part.`;
cw.href=wl(txt);cw.target="_blank";cw.rel="noopener noreferrer"}
/* ulasan */
const QS=[["Velg dan lampunya terpasang rapi, dan teknisinya cek kecocokan dulu sebelum pasang.","Rizky, pemilik Honda Civic"],["Proses pesan lewat WhatsApp jelas. Harga sesuai yang disepakati di awal.","Dewi, pemilik Toyota Avanza"],["Dashcam dan head unit dipasang di hari yang sama. Kabel rapi, tidak berantakan.","Hendra, pemilik Suzuki Ertiga"]];let qi=0,tm;
dts.innerHTML=QS.map((_,i)=>`<button aria-label="Ulasan ${i+1}" data-i="${i}"></button>`).join("");
function sq(i){qi=i;q.style.opacity=0;setTimeout(()=>{q.textContent="“"+QS[i][0]+"”";qc.textContent=QS[i][1];q.style.opacity=1;[...dts.children].forEach((d,j)=>d.className=j===i?"on":"")},300);clearTimeout(tm);tm=setTimeout(()=>sq((i+1)%QS.length),6000)}
dts.onclick=e=>{const b=e.target.closest("button");if(b)sq(+b.dataset.i)};sq(0);
/* asisten ctrl+k */
const KB=[
[/harga|biaya|berapa/,()=>"Harga part di katalog mulai "+rp(.85e6)+" sampai "+rp(14.5e6)+", dan harga pemasangan dikonfirmasi tim. Semua angka di halaman ini contoh.",["Cocok untuk mobil saya?","Cicilan","Pemasangan"]],
[/cocok|kompatibel|tipe|tahun|model|fit/,()=>"Pilih merek dan model di bar Cari part, lalu katalog menyaring part yang umumnya cocok. Kecocokan final tetap dicek teknisi sebelum pesanan diproses.",["Pemasangan","Lanjut ke WhatsApp"]],
[/pasang|bengkel|instal|pengerjaan|lama|durasi/,()=>"Pemasangan dilakukan teknisi di cabang pilihanmu. Lama pengerjaan bergantung jenis part, dan estimasinya disampaikan saat konfirmasi.",["Garansi","Cabang"]],
[/cicil|kredit|angsur|dp|bayar/,()=>"Di keranjang ada simulasi cicilan 3, 6, atau 12 bulan sebagai gambaran. Skema pembayaran resmi dikonfirmasi tim kami.",["Harga","Lanjut ke WhatsApp"]],
[/garansi|retur|klaim/,()=>"Ketentuan garansi dan retur berbeda per produk. Tim kami akan menjelaskannya saat konfirmasi pesanan.",["Lanjut ke WhatsApp"]],
[/kirim|ongkir|antar|ambil/,()=>"Tersedia opsi ambil di cabang, pasang di bengkel, atau kirim ke alamat untuk part tertentu. Pilih di keranjang.",["Cabang","Harga"]],
[/cabang|lokasi|alamat|jam|buka/,()=>"Ada tiga cabang contoh di keranjang. Alamat dan jam buka akan diganti sesuai data bisnis Anda.",["Pemasangan"]],
[/aturan|legal|razia|tilang|uji tipe|surat|stnk/,()=>"Modifikasi sebaiknya mengikuti aturan lalu lintas dan uji tipe setempat. Teknisi kami membantu memilih part yang sesuai.",["Cocok untuk mobil saya?"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Halo, selamat datang di NIGHTSHIFT. Ada yang bisa dibantu?",["Harga","Cocok untuk mobil saya?","Pemasangan","Cicilan"]]];
const lg=[];function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;ms.append(d);ms.scrollTop=1e9;if(c==="u")lg.push(t)}
function chips(a){cs.innerHTML="";a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>ask(v);cs.append(b)})}
function waU(){wa.href=wl(`Halo ${BRAND}, saya menghubungi dari website.`+(lg.length?` Pertanyaan saya: ${lg.join("; ")}.`:" Saya ingin konsultasi."));wa.target="_blank";wa.rel="noopener noreferrer"}
function ask(t){say(t,"u");if(/whatsapp|\bwa\b|admin|manusia|teknisi/i.test(t)){setTimeout(()=>{say("Baik, tekan tombol hijau di bawah. Pertanyaanmu ikut terkirim.","b");waU()},300);return}
const m=KB.find(([r])=>r.test(t.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab teknisi kami. Tekan tombol WhatsApp di bawah, pertanyaanmu ikut terkirim.","b");chips(["Harga","Pemasangan","Cicilan"])}waU()},350)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let fi=true;function oa_(){ov.classList.remove("on");cart.classList.remove("on");cmd.classList.add("on");if(fi){fi=false;say("Selamat datang. Saya asisten virtual NIGHTSHIFT untuk info part, kecocokan, dan pemesanan. Angka di sini contoh dan bukan penawaran final.","b");chips(["Harga","Cocok untuk mobil saya?","Pemasangan","Cicilan"]);waU()}setTimeout(()=>ci.focus(),50)}
oa.onclick=oa_;cmd.onclick=e=>{if(e.target===cmd)cmd.classList.remove("on")};
addEventListener("keydown",e=>{if((e.ctrlKey||e.metaKey)&&e.key.toLowerCase()==="k"){e.preventDefault();oa_()}if(e.key==="Escape")cl_()});
cat();cartU();
</script>
</body>
</html>
@endverbatim
