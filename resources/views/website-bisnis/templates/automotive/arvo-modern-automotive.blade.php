@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>ARVO Motor Studio – Modifikasi Kendaraan Modern</title>
<link href="https://fonts.googleapis.com/css2?family=Onest:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{--bg:#F4F2EE;--ink:#111317;--bl:#2540FF;--bl2:#E5E9FF;--mu:#6B6F78;--ln:#E4E1DA;--r:26px;--f:'Onest',system-ui,sans-serif;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth;scroll-padding-top:80px}
body{margin:0;background:var(--bg);color:var(--ink);font:400 16px/1.6 var(--f);overflow-x:hidden}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
.btn{display:inline-flex;align-items:center;gap:8px;padding:14px 24px;background:var(--ink);color:#fff;border:0;border-radius:99px;font:600 15px var(--f);cursor:pointer;transition:.25s}
.btn:hover,.btn:focus-visible{background:var(--bl);outline:none;transform:translateY(-2px)}
.btn.o{background:transparent;color:var(--ink);box-shadow:inset 0 0 0 1.5px var(--ink)}
.btn.o:hover{background:var(--ink);color:#fff}
.btn.b{background:var(--bl)}.btn.b:hover{background:var(--ink)}
.ann{background:var(--ink);color:#fff;text-align:center;font-size:13px;padding:8px 12px}
.ann b{color:#9DB0FF;font-weight:600}
nav{position:sticky;top:env(safe-area-inset-top,0px);z-index:40;background:rgba(244,242,238,.88);backdrop-filter:blur(14px);border-bottom:1px solid var(--ln)}
nav .w{display:flex;align-items:center;justify-content:space-between;padding:14px 4vw;max-width:1360px;margin:auto}
.lg{font:700 22px var(--f);letter-spacing:-.04em;display:flex;align-items:center;gap:8px}
.lg i{width:20px;height:20px;border-radius:6px;background:var(--bl);transform:rotate(45deg)}
nav ul{display:flex;gap:6px;list-style:none;margin:0;padding:0}
nav ul a{padding:8px 16px;border-radius:99px;font-size:14.5px;font-weight:500;color:var(--mu)}
nav ul a:hover{background:#fff;color:var(--ink)}
@media(max-width:820px){nav ul{display:none}}
.wrap{max-width:1360px;margin:auto;padding:0 4vw}
.bn{display:grid;gap:14px;grid-template-columns:repeat(12,1fr);grid-template-areas:"a a a a a a a b b b b b" "a a a a a a a b b b b b" "d d d e e e e c c c c c";padding-top:18px}
.tl{background:#fff;border:1px solid var(--ln);border-radius:var(--r);padding:34px;position:relative;overflow:hidden}
.ta{grid-area:a;display:flex;flex-direction:column;justify-content:space-between;gap:40px;min-height:430px}
.tb{grid-area:b;background:var(--bl2);border-color:transparent;display:flex;flex-direction:column;justify-content:space-between;padding:26px}
.tc{grid-area:c;padding:20px 22px;display:flex;flex-direction:column;min-height:380px}
.td{grid-area:d;background:var(--ink);color:#fff;border-color:var(--ink);display:flex;flex-direction:column;justify-content:space-between}
.te{grid-area:e;background:var(--bl);color:#fff;border-color:var(--bl);display:flex;flex-direction:column;justify-content:space-between;gap:14px}
@media(max-width:960px){.bn{grid-template-columns:1fr;grid-template-areas:"a" "b" "c" "d" "e"}.ta{min-height:0}}
.pill{display:inline-flex;gap:8px;align-items:center;padding:6px 14px;background:var(--bg);border-radius:99px;font-size:13px;font-weight:500;color:var(--mu);width:fit-content}
.pill::before{content:"";width:8px;height:8px;border-radius:50%;background:var(--bl)}
.ta h1{font:600 clamp(42px,6.2vw,92px)/.96 var(--f);letter-spacing:-.05em;margin:20px 0}
.hl{background:linear-gradient(transparent 62%,var(--bl2) 62%);color:var(--bl)}
.ta p{max-width:480px;color:var(--mu);font-size:18px}
.cta{display:flex;gap:10px;flex-wrap:wrap}
.tr{display:flex;gap:22px;flex-wrap:wrap;font-size:14px;color:var(--mu)}
.tr span::before{content:"✓";color:var(--bl);font-weight:700;margin-right:6px}
.fc{animation:fl 6s ease-in-out infinite}
@keyframes fl{50%{transform:translateY(-8px)}}
.tb svg,.mc svg{width:100%;display:block}
.dots{display:flex;gap:10px;align-items:center;font-size:13px;color:var(--mu)}
.dots button{width:26px;height:26px;border-radius:50%;border:3px solid #fff;box-shadow:0 0 0 1.5px var(--ln);cursor:pointer;padding:0}
.dots button[aria-pressed=true]{box-shadow:0 0 0 2px var(--ink)}
.td b{font:600 clamp(54px,6vw,84px)/1 var(--f);letter-spacing:-.05em;display:block}
.td small,.te small{font-size:13px;opacity:.7}
.te h3{font:600 28px/1.1 var(--f);letter-spacing:-.03em}
.te .btn{background:#fff;color:var(--bl);width:fit-content}
.te .btn:hover{background:var(--ink);color:#fff}
.ch{display:flex;justify-content:space-between;align-items:center;font-weight:600;font-size:15px;padding-bottom:12px;border-bottom:1px solid var(--ln)}
.ch span{font-size:12px;color:var(--mu);font-weight:400;display:flex;gap:6px;align-items:center}
.ch span::before{content:"";width:7px;height:7px;border-radius:50%;background:#19B36B}
#ms{flex:1;overflow-y:auto;padding:14px 0;display:flex;flex-direction:column;gap:9px;font-size:14.5px;min-height:150px;max-height:210px}
.m{padding:9px 14px;border-radius:16px;max-width:88%;line-height:1.45;animation:in .3s}
@keyframes in{from{opacity:0;transform:translateY(8px)}}
.m.b{background:var(--bg);align-self:flex-start;border-bottom-left-radius:4px}
.m.u{background:var(--bl);color:#fff;align-self:flex-end;border-bottom-right-radius:4px}
.cs{display:flex;flex-wrap:wrap;gap:6px;margin-bottom:10px}
.cs button{padding:6px 12px;border:1px solid var(--ln);background:#fff;border-radius:99px;font:500 12.5px var(--f);cursor:pointer}
.cs button:hover{border-color:var(--bl);color:var(--bl)}
#cf{display:flex;gap:8px;background:var(--bg);border-radius:99px;padding:5px 5px 5px 16px}
#cf input{flex:1;border:0;background:none;font:400 14.5px var(--f);outline:none;min-width:0}
#cf button{border:0;background:var(--ink);color:#fff;border-radius:50%;width:36px;height:36px;cursor:pointer}
.wa{font-size:12.5px;margin-top:8px;color:var(--mu);text-align:center}.wa a{color:#0E9B4E;font-weight:600}
section{padding:110px 0}
.eb{font:600 13px var(--f);color:var(--bl);letter-spacing:.04em}
h2{font:600 clamp(34px,4.8vw,66px)/1 var(--f);letter-spacing:-.045em;margin:10px 0 0}
/* layanan */
.sv{display:grid;grid-template-columns:.8fr 1.2fr;gap:6vw}
.sv .st{position:sticky;top:110px;align-self:start}
.sv .st p{color:var(--mu);margin:18px 0 26px;max-width:380px}
.sr{display:grid;grid-template-columns:60px 1fr auto;gap:10px 18px;align-items:baseline;padding:30px 0;border-top:1px solid var(--ink);cursor:default;transition:.3s}
.sr:last-child{border-bottom:1px solid var(--ink)}
.sr:hover{padding-left:16px;background:#fff}
.sr span{font:500 13px var(--f);color:var(--mu)}
.sr h3{font:600 clamp(24px,2.8vw,38px)/1.05 var(--f);letter-spacing:-.035em}
.sr p{grid-column:2/-1;color:var(--mu);max-width:520px;font-size:15px}
.sr em{font-style:normal;font-size:12px;border:1px solid var(--ln);padding:3px 12px;border-radius:99px;color:var(--mu)}
@media(max-width:860px){.sv{grid-template-columns:1fr}.sv .st{position:static}.sr{grid-template-columns:40px 1fr}.sr em{display:none}}
/* garasi */
.gr{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:44px}
.pj{background:#fff;border:1px solid var(--ln);border-radius:var(--r);padding:0;cursor:pointer;text-align:left;font:inherit;color:inherit;transition:.3s;overflow:hidden}
.pj:hover{transform:translateY(-6px);box-shadow:0 24px 50px -24px rgba(17,19,23,.35)}
.pj .im{padding:30px 24px 6px;background:var(--bg)}
.pj .tx{padding:20px 24px 24px}
.pj h3{font:600 21px/1.15 var(--f);letter-spacing:-.025em}
.pj small{color:var(--mu);font-size:13.5px;display:block;margin:2px 0 12px}
.tg{display:flex;gap:6px;flex-wrap:wrap}.tg i{font-style:normal;font-size:12px;padding:3px 10px;border-radius:99px;background:var(--bl2);color:var(--bl);font-weight:500}
@media(max-width:960px){.gr{grid-template-columns:1fr 1fr}}@media(max-width:600px){.gr{grid-template-columns:1fr}}
#mo{position:fixed;inset:0;z-index:90;background:rgba(17,19,23,.55);backdrop-filter:blur(6px);display:none;place-items:center;padding:16px}
#mo.on{display:grid}
.mc{background:#fff;border-radius:30px;width:min(900px,100%);max-height:92vh;overflow:auto;display:grid;grid-template-columns:1.1fr .9fr;animation:in .35s}
.mc .l{background:var(--bg);padding:30px;display:grid;align-content:center}
.mc .r{padding:34px;position:relative}
.mc h3{font:600 30px/1.05 var(--f);letter-spacing:-.04em;margin:8px 0 4px}
.mc ul{padding-left:18px;margin:16px 0;color:var(--mu)}.mc ul li{margin:4px 0}
.mc .kv{display:flex;gap:26px;margin:14px 0 20px}.mc .kv b{display:block;font-size:19px}.mc .kv small{color:var(--mu)}
.xx{position:absolute;right:16px;top:14px;width:38px;height:38px;border-radius:50%;border:0;background:var(--bg);font-size:20px;cursor:pointer}
@media(max-width:700px){.mc{grid-template-columns:1fr}}
/* planner */
.pln{background:var(--ink);color:#fff;border-radius:34px;padding:clamp(28px,5vw,64px);margin-top:0;display:grid;grid-template-columns:.8fr 1.2fr;gap:5vw}
.pln h2{color:#fff}.pln .eb{color:#9DB0FF}
.pln p{color:#A9ADB6;margin-top:16px;max-width:360px}
.pg{display:flex;gap:6px;margin:22px 0}
.pg i{height:4px;flex:1;border-radius:4px;background:#2c2f36}.pg i.on{background:#9DB0FF}
.op{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin:18px 0}
.op button{padding:18px;border-radius:18px;border:1.5px solid #2c2f36;background:none;color:#fff;text-align:left;font:500 16px var(--f);cursor:pointer;transition:.2s}
.op button:hover{border-color:#9DB0FF}.op button small{display:block;color:#8A8F99;font-weight:400;font-size:13px;margin-top:2px}
.pln .q{font:600 24px var(--f);letter-spacing:-.03em}
.sl{width:100%;accent-color:#9DB0FF;margin:24px 0 8px}
.big{font:600 52px var(--f);letter-spacing:-.04em}
.rs h3{font:600 30px var(--f);letter-spacing:-.03em;margin:6px 0}
.rs ul{padding:0;margin:16px 0;list-style:none}.rs li{padding:11px 0;border-top:1px solid #2c2f36}.rs li::before{content:"✓";color:#9DB0FF;margin-right:10px}
.bk{background:none;border:0;color:#9DB0FF;cursor:pointer;font:500 14px var(--f);padding:0;margin-top:6px}
@media(max-width:900px){.pln{grid-template-columns:1fr}}
/* kalender */
.cal{overflow-x:auto;margin-top:40px;background:#fff;border:1px solid var(--ln);border-radius:var(--r);padding:20px}
.cg{display:grid;grid-template-columns:90px repeat(6,minmax(96px,1fr));gap:8px;min-width:760px}
.cg div.h{font:600 14px var(--f);text-align:center;padding:6px 0;line-height:1.2}.cg div.h small{display:block;font-weight:400;color:var(--mu);font-size:12px}
.cg div.s{font:500 13px var(--f);color:var(--mu);align-self:center}
.sl2{padding:16px 6px;border-radius:14px;border:1.5px solid var(--ln);background:#fff;font:500 13px var(--f);cursor:pointer;transition:.2s}
.sl2:hover:not(:disabled){border-color:var(--bl)}
.sl2.l{background:#FFF5E3;border-color:#F3D9A4}.sl2.f{background:var(--bg);color:#aaa;cursor:not-allowed;text-decoration:line-through}
.sl2[aria-pressed=true]{background:var(--bl);color:#fff;border-color:var(--bl)}
.lgd{display:flex;gap:18px;margin-top:16px;font-size:13px;color:var(--mu);flex-wrap:wrap}.lgd i{display:inline-block;width:12px;height:12px;border-radius:4px;margin-right:6px;vertical-align:-1px;border:1.5px solid var(--ln)}
.bf{display:grid;grid-template-columns:1fr 1fr auto;gap:10px;margin-top:16px;align-items:center}
.bf input{padding:15px 18px;border-radius:99px;border:1.5px solid var(--ln);background:#fff;font:400 15px var(--f);outline:none;min-width:0}
.bf input:focus{border-color:var(--bl)}
.sm{margin-top:14px;font-weight:500}
@media(max-width:760px){.bf{grid-template-columns:1fr}}
footer{background:var(--ink);color:#fff;padding:70px 0 30px;margin-top:60px}
.fg{display:grid;grid-template-columns:1.4fr 1fr 1fr;gap:40px}
footer h3{font:600 14px var(--f);color:#9DB0FF;margin-bottom:12px}
footer p,footer li{font-size:14.5px;color:#A9ADB6}footer ul{list-style:none;padding:0;margin:0}footer li{margin:6px 0}
.fb{font:700 clamp(46px,8vw,110px)/1 var(--f);letter-spacing:-.06em;margin-bottom:18px}
.cp{font-size:12.5px;color:#7a7f89;margin-top:40px;padding-top:20px;border-top:1px solid #2c2f36;max-width:760px}
@media(max-width:760px){.fg{grid-template-columns:1fr}}
:focus-visible{outline:2px solid var(--bl);outline-offset:3px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}
</style>
</head>
<body>
<div class="ann">Slot pemasangan terdekat: <b id="ns">-</b></div>
<nav><div class="w"><a href="#top" class="lg"><i></i>arvo</a><ul><li><a href="#layanan">Layanan</a></li><li><a href="#garasi">Garasi</a></li><li><a href="#planner">Planner</a></li><li><a href="#jadwal">Jadwal</a></li></ul><a class="btn" href="#jadwal">Booking slot</a></div></nav>

<main class="wrap" id="top">
<div class="bn">
<div class="tl ta"><div><span class="pill">Studio modifikasi kendaraan</span><h1>Modifikasi yang rapi, jujur, dan <span class="hl">terukur.</span></h1><p>Dari velg sampai audio, setiap pekerjaan diawali estimasi yang jelas dan diakhiri serah terima yang rapi.</p></div>
<div><div class="cta"><a class="btn b" href="#planner">Rencanakan build →</a><a class="btn o" href="#garasi">Lihat proyek</a></div><div class="tr" style="margin-top:22px"><span>Estimasi di awal</span><span>Kecocokan part dicek</span><span>Foto progres via WA</span></div></div></div>
<div class="tl tb"><div class="fc" id="hc"></div><div class="dots">Warna <span id="dl" style="display:flex;gap:8px"></span></div></div>
<div class="tl td"><div><b id="cnt">0</b><small>kendaraan sudah dikerjakan (angka contoh)</small></div><small>Rata-rata 2 sampai 5 hari kerja per proyek</small></div>
<div class="tl te"><div><small>Slot terdekat</small><h3 id="nx">-</h3></div><a class="btn" href="#jadwal">Ambil slot →</a></div>
<div class="tl tc"><div class="ch">Tanya asisten ARVO<span>online</span></div><div id="ms"></div><div class="cs" id="cs"></div><form id="cf"><input id="ci" placeholder="Tulis pertanyaan…" autocomplete="off" aria-label="Pertanyaan"><button aria-label="Kirim">↑</button></form><div class="wa">atau <a id="wa" href="#" target="_blank" rel="noopener noreferrer">lanjut ke WhatsApp</a></div></div>
</div>

<section id="layanan"><div class="sv"><div class="st"><span class="eb">Layanan</span><h2>Enam hal yang kami kerjakan dengan baik</h2><p>Kami tidak mengambil semua pekerjaan. Hanya yang bisa kami selesaikan rapi dan bertanggung jawab.</p><a class="btn o" href="#planner">Hitung kebutuhanmu</a></div>
<div id="sr"></div></div></section>

<section id="garasi" style="padding-top:0"><span class="eb">Garasi proyek</span><h2>Hasil kerja yang bisa<br>kamu lihat detailnya</h2><div class="gr" id="gr"></div></section>

<section id="planner" style="padding-top:0"><div class="pln"><div><span class="eb">Build planner</span><h2>Bingung mulai dari mana?</h2><p>Jawab tiga pertanyaan singkat, kami susun gambaran awal paket yang cocok. Harga final ditentukan setelah inspeksi.</p></div><div id="pl"></div></div></section>

<section id="jadwal" style="padding-top:0"><span class="eb">Jadwal pemasangan</span><h2>Pilih slot yang kosong</h2>
<div class="cal"><div class="cg" id="cg"></div><div class="lgd"><span><i style="background:#fff"></i>Tersedia</span><span><i style="background:#FFF5E3;border-color:#F3D9A4"></i>Terbatas</span><span><i style="background:var(--bg)"></i>Penuh</span><span>Data slot hanya contoh.</span></div></div>
<div class="bf"><input id="bn" placeholder="Nama Anda" aria-label="Nama"><input id="bc" placeholder="Kendaraan, contoh: Honda Civic 2019" aria-label="Kendaraan"><a class="btn b" id="bb" href="#" target="_blank" rel="noopener noreferrer">Kirim booking ke WhatsApp</a></div><div class="sm" id="sm"></div></section>
</main>

<div id="mo" role="dialog" aria-modal="true" aria-label="Detail proyek"><div class="mc" id="mc"></div></div>

<footer><div class="wrap"><div class="fb">arvo.</div><div class="fg"><div><p>Studio modifikasi dan aksesori kendaraan. Template contoh, ganti seluruh isi dengan data bisnis Anda.</p></div><div><h3>Menu</h3><ul><li><a href="#layanan">Layanan</a></li><li><a href="#garasi">Garasi</a></li><li><a href="#planner">Planner</a></li><li><a href="#jadwal">Jadwal</a></li></ul></div><div><h3>Kontak</h3><ul><li>Alamat bengkel (ganti)</li><li>Senin sampai Sabtu, 09.00 sampai 17.00 (contoh)</li><li>WhatsApp (ganti)</li></ul></div></div><p class="cp">Seluruh angka, harga, dan data slot adalah contoh. Kecocokan part dan perubahan kendaraan harus mengikuti peraturan lalu lintas dan uji tipe yang berlaku, dan dikonfirmasi teknisi sebelum pengerjaan.</p></div></footer>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="ARVO Motor Studio";
const $=i=>document.getElementById(i),wl=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t);
let uid=0;
function car(o){const i="c"+uid++,B="M30 150C30 132 44 126 66 122L130 112C150 78 190 58 250 56L330 56C380 58 410 78 436 108L474 116C492 120 498 132 498 150V166H30Z";
let s=`<svg viewBox="0 0 520 220" aria-hidden="true"><defs><clipPath id="${i}"><path d="${B}"/></clipPath></defs><ellipse cx="264" cy="206" rx="220" ry="9" fill="#111317" opacity=".12"/>`;
if(o.rk)s+=`<path d="M200 56V45H350V56M215 45V56M335 45V56" stroke="#111317" stroke-width="5" fill="none" stroke-linecap="round"/>`;
if(o.sp)s+=`<path d="M46 120V96" stroke="#111317" stroke-width="5"/><rect x="24" y="86" width="68" height="9" rx="3" fill="#111317"/>`;
s+=`<path d="${B}" fill="${o.c}"/><g clip-path="url(#${i})"><rect y="136" width="520" height="40" fill="#000" opacity=".12"/><rect y="50" width="520" height="30" fill="#fff" opacity=".14"/>${o.st?`<rect y="126" width="520" height="8" fill="${o.st}"/>`:""}</g>`;
s+=`<path d="M148 112C166 86 196 72 240 70V112ZM256 70H330C366 72 392 90 410 112H256Z" fill="#DCE6F7"/><path d="M248 70V152" stroke="#000" stroke-opacity=".18"/><path d="M468 120L492 124V134H474Z" fill="#fff"/><rect x="30" y="128" width="12" height="9" rx="2" fill="#FF4D4D"/>`;
[120,410].forEach(x=>{s+=`<circle cx="${x}" cy="166" r="41" fill="#16181c"/><circle cx="${x}" cy="166" r="34" fill="#2a2d33"/><circle cx="${x}" cy="166" r="23" fill="#D6D9DF"/>`;
if(o.w===0)for(let k=0;k<5;k++){const a=k*Math.PI*2/5;s+=`<path d="M${x} 166L${x+Math.cos(a)*22} ${166+Math.sin(a)*22}" stroke="#8A8F99" stroke-width="5"/>`}
if(o.w===1)s+=`<circle cx="${x}" cy="166" r="14" fill="none" stroke="#8A8F99" stroke-width="3"/><circle cx="${x}" cy="166" r="8" fill="#8A8F99"/>`;
if(o.w===2)for(let k=0;k<8;k++){const a=k*Math.PI/4;s+=`<path d="M${x} 166L${x+Math.cos(a)*22} ${166+Math.sin(a)*22}" stroke="#8A8F99" stroke-width="2.5"/>`}
s+=`<circle cx="${x}" cy="166" r="5" fill="#2540FF"/>`});
return s+"</svg>"}
/* hero car */
const CL=[["#2540FF","Biru"],["#F2F0EA","Putih"],["#E5483A","Merah"],["#1E2025","Hitam"]];
function hero(i){hc.innerHTML=car({c:CL[i][0],w:2,sp:i===2,st:i===0?"#fff":null});dl.querySelectorAll("button").forEach((b,j)=>b.setAttribute("aria-pressed",j===i))}
dl.innerHTML=CL.map((c,i)=>`<button style="background:${c[0]}" aria-label="${c[1]}" aria-pressed="false" data-i="${i}"></button>`).join("");
dl.onclick=e=>{const b=e.target.closest("button");if(b)hero(+b.dataset.i)};hero(0);
/* count */
(function(){const t=1200,s=performance.now();(function f(n){const p=Math.min(1,(n-s)/1400);cnt.textContent=Math.round(t*(1-Math.pow(1-p,3))).toLocaleString("id-ID")+"+";if(p<1)requestAnimationFrame(f)})(s)})();
/* layanan */
const SV=[["Velg dan ban","Pilihan ukuran dan model yang aman untuk bodi, termasuk balancing dan alignment.","Part + pasang"],["Body kit dan eksterior","Spoiler, skirt, splitter, dan diffuser dengan pemasangan presisi.","Estetika"],["Wrap dan detailing","Perubahan warna, proteksi cat, dan pemolesan agar tampil seperti baru.","Estetika"],["Audio dan interior","Head unit, speaker, peredam kabin, jok, dan setir untuk perjalanan nyaman.","Kenyamanan"],["Lampu dan kelistrikan","Headlamp, DRL, dan instalasi kabel yang rapi serta aman.","Keselamatan"],["Aksesori harian","Dashcam, sensor parkir, karpet, dan perlengkapan sehari-hari.","Praktis"]];
sr.innerHTML=SV.map((s,i)=>`<div class="sr"><span>0${i+1}</span><h3>${s[0]}</h3><em>${s[2]}</em><p>${s[1]}</p></div>`).join("");
/* garasi */
const PJ=[
{n:"Civic Turbo",v:"Honda Civic 2019",o:{c:"#2540FF",w:2,sp:1,st:"#fff"},t:["Velg 18 inci","Body kit","Wrap aksen"],p:["Velg 18 inci dan ban","Spoiler ducktail","Garis aksen wrap satin","Headlamp LED"],d:"4 hari",b:"mulai Rp 38 jt"},
{n:"Xpander Family Plus",v:"Mitsubishi Xpander 2021",o:{c:"#E4DFD3",w:1,rk:1},t:["Roof rack","Interior","Audio"],p:["Roof rack aluminium","Peredam kabin","Head unit 10 inci","Karpet karet"],d:"3 hari",b:"mulai Rp 21 jt"},
{n:"Jimny Trail Ready",v:"Suzuki Jimny 2022",o:{c:"#3F7D50",w:0,rk:1},t:["Roof rack","Velg","Lampu"],p:["Velg 16 inci off-road","Roof rack","Lampu tambahan LED","Perlindungan kolong"],d:"5 hari",b:"mulai Rp 33 jt"},
{n:"Brio City Sport",v:"Honda Brio 2020",o:{c:"#E5483A",w:2,sp:1,st:"#fff"},t:["Spoiler","Velg 16 inci","Wrap"],p:["Velg 16 inci","Spoiler","Wrap aksen","DRL sequential"],d:"2 hari",b:"mulai Rp 17 jt"},
{n:"Fortuner Executive",v:"Toyota Fortuner 2020",o:{c:"#1E2025",w:1,st:"#2540FF"},t:["Proteksi cat","Jok","Kaca film"],p:["Paint protection film","Jok kulit sport","Kaca film","Dashcam depan-belakang"],d:"6 hari",b:"mulai Rp 45 jt"},
{n:"Ertiga Silent Cruise",v:"Suzuki Ertiga 2021",o:{c:"#8E9AAF",w:0},t:["Audio","Peredam","Dashcam"],p:["Speaker component","Peredam kabin","Dashcam 4K","Sensor parkir"],d:"2 hari",b:"mulai Rp 14 jt"}];
gr.innerHTML=PJ.map((p,i)=>`<button class="pj" data-i="${i}"><div class="im">${car(p.o)}</div><div class="tx"><h3>${p.n}</h3><small>${p.v}</small><div class="tg">${p.t.map(x=>`<i>${x}</i>`).join("")}</div></div></button>`).join("");
gr.onclick=e=>{const b=e.target.closest(".pj");if(!b)return;const p=PJ[b.dataset.i];
mc.innerHTML=`<div class="l">${car(p.o)}</div><div class="r"><button class="xx" aria-label="Tutup" id="xx">×</button><span class="eb">${p.v}</span><h3>${p.n}</h3><ul>${p.p.map(x=>`<li>${x}</li>`).join("")}</ul><div class="kv"><div><small>Durasi</small><b>${p.d}</b></div><div><small>Biaya (contoh)</small><b>${p.b}</b></div></div><a class="btn b" target="_blank" rel="noopener noreferrer" href="${wl(`Halo ${BRAND}, saya tertarik dengan build seperti ${p.n} (${p.v}). Mohon info biaya dan jadwal untuk kendaraan saya.`)}">Tanya build serupa</a></div>`;
mo.classList.add("on");$("xx").onclick=()=>mo.classList.remove("on")};
mo.onclick=e=>{if(e.target===mo)mo.classList.remove("on")};addEventListener("keydown",e=>{if(e.key==="Escape")mo.classList.remove("on")});
/* planner */
const GO=[["Tampilan","velg, body kit, wrap"],["Kenyamanan","audio, jok, peredam"],["Aksesori harian","dashcam, sensor, proteksi"],["Kombinasi","campuran sesuai anggaran"]];
const VE=[["Hatchback atau city car",""],["Sedan",""],["MPV",""],["SUV",""]];
const IT={0:["Velg dan ban","Body kit ringan","Wrap aksen","Lampu LED"],1:["Peredam kabin","Audio upgrade","Jok dan setir","Kaca film"],2:["Dashcam","Karpet dan pelindung","Sensor parkir","Paint protection"],3:["Velg dan ban","Audio upgrade","Dashcam","Paint protection"]};
const TI=[["Starter Refresh",2,"1 sampai 2 hari"],["Plus Upgrade",3,"2 sampai 4 hari"],["Signature Build",4,"4 sampai 7 hari"]];
let ST=0,PL={g:0,v:0,b:25};
function pl_(){const bar=`<div class="pg">${[0,1,2,3].map(i=>`<i class="${i<=ST?"on":""}"></i>`).join("")}</div>`;let h=bar;
if(ST===0)h+=`<div class="q">Apa tujuan utamamu?</div><div class="op">${GO.map((g,i)=>`<button data-g="${i}">${g[0]}<small>${g[1]}</small></button>`).join("")}</div>`;
if(ST===1)h+=`<div class="q">Jenis kendaraanmu?</div><div class="op">${VE.map((g,i)=>`<button data-v="${i}">${g[0]}</button>`).join("")}</div><button class="bk" data-s="0">← Kembali</button>`;
if(ST===2)h+=`<div class="q">Kira-kira anggaranmu?</div><div class="big" id="bv">Rp ${PL.b} jt</div><input class="sl" type="range" min="5" max="100" step="5" value="${PL.b}" id="bs" aria-label="Anggaran dalam juta rupiah"><button class="btn" style="background:#fff;color:var(--ink);margin-top:14px" data-s="3">Lihat gambaran →</button><br><button class="bk" data-s="1">← Kembali</button>`;
if(ST===3){const t=PL.b<15?0:PL.b<40?1:2,T=TI[t],it=IT[PL.g].slice(0,T[1]);h+=`<div class="rs"><span class="eb">Gambaran awal</span><h3>${T[0]}</h3><div style="color:#A9ADB6;font-size:14px">${GO[PL.g][0]} · ${VE[PL.v][0]} · anggaran Rp ${PL.b} jt · estimasi ${T[2]}</div><ul>${it.map(x=>`<li>${x}</li>`).join("")}</ul><a class="btn" style="background:#fff;color:var(--ink)" target="_blank" rel="noopener noreferrer" href="${wl(`Halo ${BRAND}, hasil planner saya: paket ${T[0]} untuk tujuan ${GO[PL.g][0]}, kendaraan ${VE[PL.v][0]}, anggaran sekitar Rp ${PL.b} jt (${it.join(", ")}). Mohon inspeksi dan penawaran final.`)}">Kirim ke WhatsApp</a><br><button class="bk" data-s="0">Ulangi dari awal</button><div style="font-size:12px;color:#8A8F99;margin-top:12px">Gambaran awal, bukan penawaran. Harga final setelah inspeksi.</div></div>`}
pl.innerHTML=h;const s=$("bs");if(s)s.oninput=()=>{PL.b=+s.value;$("bv").textContent="Rp "+PL.b+" jt"}}
pl.onclick=e=>{const b=e.target.closest("button");if(!b)return;const d=b.dataset;if(d.g!==undefined){PL.g=+d.g;ST=1}else if(d.v!==undefined){PL.v=+d.v;ST=2}else if(d.s!==undefined)ST=+d.s;else return;pl_()};pl_();
/* kalender */
const SS=["09:00","13:00","16:00"],DN=["Min","Sen","Sel","Rab","Kam","Jum","Sab"],DS=[];
for(let i=1;DS.length<6;i++){const d=new Date();d.setDate(d.getDate()+i);if(d.getDay()!==0)DS.push(d)}
const sta=(d,s)=>(d.getDate()*7+s*3+d.getMonth())%5;let sel=null;
const fmt=(d,s)=>d.toLocaleDateString("id-ID",{weekday:"long",day:"numeric",month:"long"})+", "+SS[s];
function cal(){let h=`<div></div>`+DS.map(d=>`<div class="h">${DN[d.getDay()]}<small>${d.getDate()}/${d.getMonth()+1}</small></div>`).join("");
SS.forEach((t,s)=>{h+=`<div class="s">${t}</div>`+DS.map((d,i)=>{const k=sta(d,s),c=k===0?"f":k===1?"l":"";return `<button class="sl2 ${c}" ${k===0?"disabled":""} data-i="${i}" data-s="${s}" aria-pressed="${sel&&sel[0]==i&&sel[1]==s}">${k===0?"Penuh":k===1?"Terbatas":"Kosong"}</button>`}).join("")});
cg.innerHTML=h;bk()}
cg.onclick=e=>{const b=e.target.closest(".sl2");if(b&&!b.disabled){sel=[+b.dataset.i,+b.dataset.s];cal()}};
[bn,bc].forEach(e=>e.oninput=bk);
function bk(){const t=sel?fmt(DS[sel[0]],sel[1]):"belum dipilih";sm.textContent="Slot terpilih: "+t;bb.href=wl(`Halo ${BRAND}, saya ${bn.value||"calon pelanggan"} dengan kendaraan ${bc.value||"(belum diisi)"}. Saya ingin booking slot: ${t}. Mohon konfirmasi.`)}
let nx0=null;outer:for(let i=0;i<DS.length;i++)for(let s=0;s<3;s++)if(sta(DS[i],s)!==0){nx0=[i,s];break outer}
if(nx0){const t=fmt(DS[nx0[0]],nx0[1]);ns.textContent=t;nx.textContent=t}
cal();
/* chat */
const KB=[
[/harga|biaya|berapa|tarif/,()=>"Harga bergantung kendaraan dan part. Contoh proyek di Garasi menunjukkan kisaran Rp 14 jt sampai Rp 45 jt. Gunakan Build planner untuk gambaran awal, dan harga final kami beri setelah inspeksi.",["Build planner","Jadwal","Lanjut ke WhatsApp"]],
[/cocok|kompatibel|model|tahun|tipe/,()=>"Kami cek kecocokan part dengan model dan tahun kendaraan sebelum pemasangan. Sebutkan kendaraanmu lewat WhatsApp agar dicek teknisi.",["Lanjut ke WhatsApp"]],
[/lama|durasi|berapa hari|pengerjaan/,()=>"Rata-rata 2 sampai 5 hari kerja, tergantung jenis pekerjaan. Estimasi pasti disampaikan di awal.",["Jadwal","Garansi"]],
[/garansi|retur|klaim/,()=>"Ketentuan garansi berbeda per produk dan jenis pekerjaan. Tim kami menjelaskannya sebelum kamu setuju.",["Lanjut ke WhatsApp"]],
[/jadwal|slot|booking|reserv|tanggal/,()=>"Pilih slot yang kosong di bagian Jadwal. Slot terdekat saat ini: "+(nx0?fmt(DS[nx0[0]],nx0[1]):"-")+".",["Lanjut ke WhatsApp"]],
[/planner|bingung|rekomendasi|paket/,()=>"Coba Build planner: tiga pertanyaan singkat, lalu kamu dapat gambaran paket awal.",["Harga","Jadwal"]],
[/aturan|legal|razia|tilang|uji tipe|surat|stnk/,()=>"Modifikasi sebaiknya mengikuti aturan lalu lintas dan uji tipe setempat. Teknisi kami membantu memilih part yang sesuai.",["Cocok untuk kendaraan saya?"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Halo, selamat datang di ARVO. Ada yang bisa dibantu?",["Harga","Jadwal","Build planner"]]];
const lg=[];function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;ms.append(d);ms.scrollTop=1e9;if(c==="u")lg.push(t)}
function chips(a){cs.innerHTML="";a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>ask(v);cs.append(b)})}
function waU(){wa.href=wl(`Halo ${BRAND}, saya menghubungi dari website.`+(lg.length?` Pertanyaan saya: ${lg.join("; ")}.`:" Saya ingin konsultasi."))}
function ask(t){say(t,"u");if(/whatsapp|\bwa\b|admin|manusia|teknisi/i.test(t)){setTimeout(()=>{say("Baik, klik tautan WhatsApp di bawah. Pertanyaanmu ikut terkirim.","b");waU()},300);return}
const m=KB.find(([r])=>r.test(t.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab teknisi kami. Klik WhatsApp di bawah, pertanyaanmu ikut terkirim.","b");chips(["Harga","Jadwal","Build planner"])}waU()},350)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
say("Halo, saya asisten virtual ARVO. Tanyakan soal harga, jadwal, atau kecocokan part. Angka di sini contoh dan bukan penawaran final.","b");chips(["Harga","Jadwal","Build planner","Aturan modifikasi"]);waU();
</script>
</body>
</html>
@endverbatim
