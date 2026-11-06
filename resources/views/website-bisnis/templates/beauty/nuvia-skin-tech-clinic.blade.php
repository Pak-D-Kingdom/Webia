@verbatim
<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>NUVIA Skin Tech Clinic</title>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--g:#23262B;--g2:#181A1E;--g3:#2E3238;--l:#B9A7E0;--l2:#D9CFF2;--m:#BFE3D3;--w:#fff;--mut:#9AA0AA;--line:rgba(255,255,255,.1);--text:#E7E9ED;--rail-glass:rgba(24,26,30,.92);--tag-glass:rgba(24,26,30,.85);--accent-ink:#181A1E;
--sans:'Space Grotesk',system-ui,sans-serif;--mono:'IBM Plex Mono',ui-monospace,monospace;color-scheme:dark;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
html[data-theme="bright"]{--g:#fff;--g2:#F7F5FA;--g3:#EBE7F1;--l:#7756A7;--l2:#624493;--m:#39785F;--mut:#606773;--line:rgba(35,38,43,.14);--text:#23262B;--rail-glass:rgba(247,245,250,.94);--tag-glass:rgba(247,245,250,.94);color-scheme:light}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth;scroll-padding-top:20px}
body{margin:0;background:var(--g2);color:var(--text);font:300 16px/1.7 var(--sans)}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
.lab{font:500 12px var(--mono);letter-spacing:.08em;color:var(--l);text-transform:uppercase}
.app{display:grid;grid-template-columns:250px 1fr;min-height:100vh}
.rail{position:sticky;top:0;height:100vh;padding:34px 26px;border-right:1px solid var(--line);display:flex;flex-direction:column;background:var(--g2)}
.brand{font:700 22px var(--sans);letter-spacing:.02em;display:flex;align-items:center;gap:10px}
.brand i{width:14px;height:14px;border-radius:50%;background:radial-gradient(circle at 35% 35%,var(--l2),var(--l) 60%,#6c58a8)}
.brand small{display:block;font:400 11px var(--mono);color:var(--mut);letter-spacing:.06em}
.rail ol{list-style:none;padding:0;margin:56px 0 0;display:flex;flex-direction:column;gap:6px}
.rail a{display:flex;gap:14px;padding:10px 0;color:var(--mut);transition:.3s;font-size:15px;align-items:baseline}
.rail a span{font:400 12px var(--mono)}
.rail a:hover,.rail a.on{color:var(--text)}
.rail a.on span{color:var(--l)}
.rail a.on{transform:translateX(6px)}
.rail .btn{margin-top:auto}
.btn{display:inline-flex;align-items:center;gap:10px;padding:14px 22px;border-radius:999px;font:500 14px var(--sans);border:1px solid var(--l);color:var(--l2);background:none;cursor:pointer;transition:.3s}
.btn:hover,.btn:focus-visible{background:var(--l);color:var(--accent-ink);outline:none}
.btn.fill{background:var(--l);color:var(--accent-ink)}
.btn.fill:hover{background:var(--m);border-color:var(--m)}
.theme-toggle{margin-top:28px;padding:9px 12px;border-color:var(--line);background:var(--g);color:var(--text);font-size:12px}
.theme-toggle:hover,.theme-toggle:focus-visible{border-color:var(--l)}
.theme-toggle span:first-child{font-size:16px;line-height:1}
main{min-width:0}
section{padding:90px 6vw;border-bottom:1px solid var(--line)}
.hero{min-height:100vh;display:grid;grid-template-columns:1.2fr .8fr;gap:30px;align-items:center;padding-top:60px}
.hero h1{font-size:clamp(40px,6.2vw,92px);font-weight:300;letter-spacing:-.035em;line-height:1}
.hero h1 b{font-weight:700;color:var(--l)}
.hero p{max-width:470px;color:var(--mut);font-size:17px;margin:26px 0 34px}
.stats{display:flex;gap:34px;flex-wrap:wrap;margin-top:44px}
.stats b{display:block;font:300 36px var(--sans);color:var(--text)}
.stats span{font:400 12px var(--mono);color:var(--mut)}
.scan{position:relative;width:min(100%,340px);margin:auto;aspect-ratio:300/380}
.scan svg{width:100%;height:100%;overflow:visible}
.scan .ln{position:absolute;left:-8%;right:-8%;height:2px;background:linear-gradient(90deg,transparent,var(--m),transparent);box-shadow:0 0 18px var(--m);animation:sc 4.2s ease-in-out infinite}
@keyframes sc{0%,100%{top:6%}50%{top:94%}}
.tag{position:absolute;font:400 11px var(--mono);padding:5px 10px;border:1px solid var(--l);border-radius:4px;background:var(--tag-glass);color:var(--l2);white-space:nowrap}
.tag::before{content:"";display:inline-block;width:6px;height:6px;border-radius:50%;background:var(--m);margin-right:7px;animation:bl 1.6s infinite}
@keyframes bl{50%{opacity:.2}}
.in{opacity:0;transform:translateY(20px);animation:in .9s cubic-bezier(.2,.7,.2,1) forwards}
.d1{animation-delay:.12s}.d2{animation-delay:.3s}.d3{animation-delay:.5s}
@keyframes in{to{opacity:1;transform:none}}
h2{font-size:clamp(30px,4vw,54px);font-weight:300;letter-spacing:-.025em;line-height:1.1;margin:12px 0 14px}
.sub{color:var(--mut);max-width:560px}
/* map */
.map{display:grid;grid-template-columns:.9fr 1.1fr;gap:50px;margin-top:46px;align-items:center}
.map svg{width:min(100%,360px);margin:auto;display:block;overflow:visible}
.z{cursor:pointer;fill:rgba(185,167,224,.05);stroke:var(--l);stroke-width:1.2;stroke-dasharray:4 5;transition:.3s}
.z:hover,.z:focus{fill:rgba(185,167,224,.22);outline:none}
.z.on{fill:rgba(191,227,211,.28);stroke:var(--m);stroke-dasharray:none}
.panel{border:1px solid var(--line);background:var(--g);border-radius:18px;padding:34px;min-height:330px}
.panel h3{font-size:30px;font-weight:500;margin:8px 0 14px}
.panel ul{list-style:none;padding:0;margin:14px 0 22px}
.panel li{display:flex;justify-content:space-between;gap:14px;padding:11px 0;border-top:1px solid var(--line);font-size:15px}
.panel li span{font:400 13px var(--mono);color:var(--m)}
.chips{display:flex;flex-wrap:wrap;gap:8px}
.chip{font:400 12px var(--mono);padding:5px 11px;border-radius:999px;background:var(--g3);color:var(--l2)}
.note{font-size:13px;color:var(--mut);margin-top:16px}
@media(max-width:900px){.map{grid-template-columns:1fr}}
/* tech rows */
.rows{margin-top:44px;border-top:1px solid var(--line)}
.row{border-bottom:1px solid var(--line);padding:26px 0;cursor:pointer;display:grid;grid-template-columns:70px 1fr auto;gap:10px 20px;align-items:baseline}
.row .n{font:400 13px var(--mono);color:var(--l)}
.row h3{font-size:clamp(24px,3.4vw,42px);font-weight:300;transition:.3s}
.row:hover h3,.row.open h3{color:var(--l2);transform:translateX(10px)}
.row .pl{font:300 28px var(--sans);color:var(--l);transition:.3s}
.row.open .pl{transform:rotate(45deg)}
.row p{grid-column:2;max-height:0;overflow:hidden;color:var(--mut);transition:max-height .5s,margin .3s;max-width:620px}
.row.open p{max-height:200px;margin-top:6px}
/* doctors */
.docs{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:44px}
.doc{border:1px solid var(--line);border-radius:18px;padding:28px;background:var(--g);transition:.3s}
.doc:hover{border-color:var(--l);transform:translateY(-4px)}
.av{width:62px;height:62px;border-radius:50%;display:grid;place-items:center;font:500 20px var(--sans);color:var(--accent-ink);background:conic-gradient(from 200deg,var(--l),var(--m),var(--l2),var(--l));margin-bottom:18px}
.doc h3{font-size:20px;font-weight:500}.doc small{display:block;font:400 12px var(--mono);color:var(--m);margin:4px 0 12px}
.doc p{font-size:14.5px;color:var(--mut)}
@media(max-width:900px){.docs{grid-template-columns:1fr}}
/* booking */
.book{display:grid;grid-template-columns:1fr 1fr;gap:40px;margin-top:44px}
.book label,.book .fl{display:block;font:500 12px var(--mono);color:var(--l);margin:0 0 10px;letter-spacing:.06em;text-transform:uppercase}
.book select,.book input[type=text]{width:100%;padding:14px;background:var(--g);border:1px solid var(--line);border-radius:10px;color:var(--text);font:inherit;margin-bottom:24px}
.dts,.tms{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:24px}
.dts button,.tms button{font:400 13px var(--mono);padding:10px 14px;border-radius:10px;background:var(--g);border:1px solid var(--line);color:var(--text);cursor:pointer;transition:.2s}
.dts button:hover,.tms button:hover{border-color:var(--l)}
.dts button[aria-pressed=true],.tms button[aria-pressed=true]{background:var(--l);color:var(--accent-ink);border-color:var(--l)}
.sum{background:var(--g);border:1px solid var(--l);border-radius:18px;padding:34px;display:flex;flex-direction:column;gap:12px;align-self:start}
.sum dl{margin:0;display:grid;grid-template-columns:auto 1fr;gap:10px 18px;font-size:15px}
.sum dt{font:400 12px var(--mono);color:var(--mut);padding-top:3px}.sum dd{margin:0}
.sum .tt{font:300 38px var(--sans);color:var(--m);margin-top:6px}
@media(max-width:900px){.book{grid-template-columns:1fr}}
footer{padding:30px 6vw;font-size:13px;color:var(--mut)}
/* mobile */
@media(max-width:960px){.app{grid-template-columns:1fr}.rail{position:sticky;top:0;z-index:40;height:auto;flex-direction:row;align-items:center;justify-content:space-between;padding:12px 18px;border:0;border-bottom:1px solid var(--line);background:var(--rail-glass);backdrop-filter:blur(10px)}.rail ol{display:none}.rail .btn{margin:0;padding:9px 16px;font-size:13px}.rail .theme-toggle{margin:0;padding:8px 10px}.hero{grid-template-columns:1fr;padding-top:40px}.scan{width:min(70%,300px)}}
@media(max-width:480px){.theme-toggle span:last-child{display:none}}
/* chat */
#fab{position:fixed;right:20px;bottom:calc(20px + env(safe-area-inset-bottom,0px));z-index:70;width:60px;height:60px;border-radius:50%;border:0;background:linear-gradient(135deg,var(--l),var(--m));color:var(--accent-ink);cursor:pointer;font-size:24px;box-shadow:0 8px 30px rgba(0,0,0,.5)}
#fab::after{content:"";position:absolute;inset:-6px;border-radius:50%;border:1px solid var(--l);animation:pl 2.6s infinite}
@keyframes pl{from{transform:scale(.9);opacity:.9}to{transform:scale(1.35);opacity:0}}
#chat{position:fixed;right:20px;bottom:calc(92px + env(safe-area-inset-bottom,0px));z-index:70;width:min(380px,calc(100vw - 40px));height:min(560px,70vh);display:none;flex-direction:column;background:var(--g2);border:1px solid var(--l);border-radius:20px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.6)}
#chat.open{display:flex;animation:pop .3s cubic-bezier(.2,.8,.2,1)}
@keyframes pop{from{opacity:0;transform:scale(.9) translateY(16px)}}
#chat header{padding:14px 18px;background:var(--g3);display:flex;justify-content:space-between;align-items:center}
#chat header b{font-weight:500}#chat header small{display:block;font:400 11px var(--mono);color:var(--m)}
#chat header button{background:none;border:0;color:var(--text);font-size:22px;cursor:pointer}
#msgs{flex:1;overflow-y:auto;padding:16px;display:flex;flex-direction:column;gap:10px}
.m{max-width:86%;padding:10px 14px;font-size:14.5px;line-height:1.5;animation:pop .25s;border-radius:14px}
.m.b{background:var(--g3);align-self:flex-start;border-bottom-left-radius:4px}
.m.u{background:var(--l);color:var(--accent-ink);align-self:flex-end;border-bottom-right-radius:4px}
.cps{display:flex;flex-wrap:wrap;gap:6px;padding:0 16px 10px}
.cps button{font:400 12px var(--mono);padding:7px 12px;background:none;border:1px solid var(--l);color:var(--l2);cursor:pointer;border-radius:999px}
.cps button:hover{background:var(--l);color:var(--accent-ink)}
#cf{display:flex;border-top:1px solid var(--line)}
#cf input{flex:1;padding:14px;background:none;border:0;color:var(--text);font:inherit;font-size:14.5px;outline:none;min-width:0}
#cf button{padding:0 18px;background:none;border:0;color:var(--l);cursor:pointer;font-size:18px}
#wa{display:block;text-align:center;padding:11px;background:#1FA855;color:#fff;font-size:14px;font-weight:400}
:focus-visible{outline:2px solid var(--m);outline-offset:3px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}.in{opacity:1;transform:none}}
</style>
</head>
<body>
<div class="app">
<aside class="rail">
<a href="#top" class="brand"><i></i><span>NUVIA<small>SKIN TECH CLINIC</small></span></a>
<button type="button" class="btn theme-toggle" id="theme-toggle" aria-label="Aktifkan bright mode" aria-pressed="false"><span data-theme-icon aria-hidden="true">☼</span><span data-theme-label>Bright mode</span></button>
<ol id="nv"><li><a href="#top" class="on"><span>01</span>Beranda</a></li><li><a href="#peta"><span>02</span>Peta wajah</a></li><li><a href="#teknologi"><span>03</span>Teknologi</a></li><li><a href="#dokter"><span>04</span>Tim medis</a></li><li><a href="#booking"><span>05</span>Reservasi</a></li></ol>
<a class="btn fill" href="#booking">Reservasi</a>
</aside>
<main>
<section class="hero" id="top">
<div>
<div class="lab in">Klinik dermatologi dan estetika</div>
<h1 class="in d1" style="margin-top:16px">Kulit sehat, <b>dibaca</b> dengan presisi.</h1>
<p class="in d2">Perawatan berbasis teknologi dan pemeriksaan dokter spesialis. Kami mulai dari konsultasi, bukan dari janji instan.</p>
<div class="in d3" style="display:flex;gap:12px;flex-wrap:wrap"><a class="btn fill" href="#peta">Temukan perawatan Anda</a><a class="btn" href="#booking">Reservasi konsultasi</a></div>
<div class="stats in d3"><div><b>8 tahun</b><span>PRAKTIK KLINIK</span></div><div><b>3 dokter</b><span>SPESIALIS KULIT</span></div><div><b>1:1</b><span>KONSULTASI PRIBADI</span></div></div>
</div>
<div class="scan in d2" aria-hidden="true">
<svg viewBox="0 0 300 380" fill="none" stroke="#B9A7E0" stroke-width="1.2"><path d="M150 14c-62 0-92 48-92 112 0 74 30 128 92 150 62-22 92-76 92-150 0-64-30-112-92-112z" stroke-opacity=".7"/><path d="M96 130c14-8 30-8 42 0M162 130c12-8 28-8 42 0M150 140v40l-14 12h28M120 232c20 12 40 12 60 0" stroke-opacity=".45"/><circle cx="150" cy="190" r="170" stroke-opacity=".12" stroke-dasharray="2 8"/><path d="M20 190h18M262 190h18M150 4v16M150 360v16" stroke-opacity=".5"/></svg>
<div class="ln"></div>
<span class="tag" style="left:-14%;top:30%">hidrasi</span><span class="tag" style="right:-12%;top:48%">tekstur</span><span class="tag" style="left:-6%;bottom:18%">pigmen</span>
</div>
</section>

<section id="peta">
<div class="lab">02 / Peta wajah</div>
<h2>Sentuh area yang ingin Anda perhatikan</h2>
<p class="sub">Pilih satu area wajah untuk melihat keluhan umum dan perawatan yang biasa dipertimbangkan dokter kami. Ini panduan awal, bukan diagnosis.</p>
<div class="map">
<svg viewBox="0 0 300 380" aria-label="Peta wajah interaktif">
<path d="M150 14c-62 0-92 48-92 112 0 74 30 128 92 150 62-22 92-76 92-150 0-64-30-112-92-112z" fill="var(--g)" stroke="var(--l)" stroke-opacity=".5"/>
<path class="z" data-z="dahi" tabindex="0" role="button" aria-label="Dahi" d="M84 96c10-44 40-66 66-66s56 22 66 66c-40-16-92-16-132 0z"/>
<g class="z" data-z="mata" tabindex="0" role="button" aria-label="Area mata" style="fill:none"><ellipse cx="108" cy="134" rx="34" ry="16"/><ellipse cx="192" cy="134" rx="34" ry="16"/></g>
<path class="z" data-z="pipi" tabindex="0" role="button" aria-label="Pipi" d="M70 170c14 6 34 10 50 8v52c-26-2-44-18-50-60zM230 170c-14 6-34 10-50 8v52c26-2 44-18 50-60z"/>
<path class="z" data-z="rahang" tabindex="0" role="button" aria-label="Rahang dan dagu" d="M96 252c30 14 78 14 108 0-14 38-36 52-54 62-18-10-40-24-54-62z"/>
<path d="M150 150v38l-12 10h24M128 234c14 7 30 7 44 0" fill="none" stroke="#B9A7E0" stroke-opacity=".4"/>
</svg>
<div class="panel" id="pn" aria-live="polite"></div>
</div></section>

<section id="teknologi">
<div class="lab">03 / Teknologi</div>
<h2>Alat yang dipilih dokter, bukan sekadar yang terbaru</h2>
<div class="rows" id="rows"></div>
</section>

<section id="dokter">
<div class="lab">04 / Tim medis</div>
<h2>Ditangani langsung oleh dokter spesialis</h2>
<p class="sub">Setiap rencana perawatan dimulai dari pemeriksaan dan ditentukan oleh dokter.</p>
<div class="docs">
<div class="doc"><div class="av">AR</div><h3>dr. Anindya R., Sp.DVE</h3><small>KEPALA KLINIK</small><p>Fokus pada dermatologi estetika, peremajaan kulit, dan perawatan pigmentasi.</p></div>
<div class="doc"><div class="av">BP</div><h3>dr. Bima P., Sp.DVE</h3><small>DERMATOLOGI KLINIS</small><p>Menangani jerawat, kulit sensitif, dan perawatan pasca tindakan.</p></div>
<div class="doc"><div class="av">CL</div><h3>dr. Citra L., Sp.DVE</h3><small>LASER DAN KONTUR</small><p>Berpengalaman dengan tindakan laser dan pengencangan kulit non-bedah.</p></div>
</div></section>

<section id="booking">
<div class="lab">05 / Reservasi</div>
<h2>Pilih jadwal, kami konfirmasi lewat WhatsApp</h2>
<div class="book">
<div>
<label for="bt">Perawatan</label><select id="bt"></select>
<span class="fl">Tanggal</span><div class="dts" id="dts"></div>
<span class="fl">Jam</span><div class="tms" id="tms"></div>
<label for="bn">Nama Anda</label><input type="text" id="bn" placeholder="Nama lengkap">
</div>
<div class="sum"><span class="lab">Ringkasan reservasi</span>
<dl><dt>PERAWATAN</dt><dd id="s1"></dd><dt>JADWAL</dt><dd id="s2"></dd><dt>ATAS NAMA</dt><dd id="s3"></dd></dl>
<div class="tt" id="s4"></div><span class="note" style="margin:0">Harga mulai dari dan dapat berubah sesuai hasil pemeriksaan dokter. Jadwal final dikonfirmasi tim kami.</span>
<a class="btn fill" id="bb" href="#" style="justify-content:center;margin-top:8px">Kirim reservasi ke WhatsApp</a></div>
</div></section>
<footer>© 2026 NUVIA Skin Tech Clinic. Template contoh, ganti seluruh nama, dokter, harga, dan kontak sesuai klinik Anda. Hasil perawatan bervariasi pada setiap individu.</footer>
</main></div>

<button id="fab" aria-label="Buka asisten chat">✦</button>
<div id="chat" role="dialog" aria-label="Asisten NUVIA">
<header><div><b>Asisten NUVIA</b><small>ONLINE</small></div><button id="x" aria-label="Tutup">×</button></header>
<div id="msgs"></div><div class="cps" id="cps"></div>
<a id="wa" href="#">Lanjutkan ke WhatsApp</a>
<form id="cf"><input id="ci" placeholder="Tulis pertanyaan Anda…" autocomplete="off"><button aria-label="Kirim">➤</button></form>
</div>

<script>
/* ===== KONFIGURASI: nomor WA format internasional, tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="NUVIA Skin Tech Clinic";
const TR={"Konsultasi Dokter":150000,"Hydra Facial":450000,"Laser Toning":650000,"Microneedling RF":1200000,"Acne Clear Program":750000,"RF Skin Tightening":1800000,"LED Light Therapy":350000,"Eye Revitalize":550000};
const ZONES={
dahi:{t:"Dahi",c:["Garis halus","Tekstur tidak rata","Kulit kusam"],r:[["Microneedling RF","60 mnt"],["LED Light Therapy","30 mnt"]]},
mata:{t:"Area mata",c:["Lingkar mata gelap","Kantung mata","Garis halus"],r:[["Eye Revitalize","45 mnt"],["LED Light Therapy","30 mnt"]]},
pipi:{t:"Pipi",c:["Noda dan pigmen","Pori tampak besar","Warna kulit tidak merata"],r:[["Laser Toning","45 mnt"],["Hydra Facial","60 mnt"]]},
rahang:{t:"Rahang dan dagu",c:["Jerawat hormonal","Kulit mulai kendur","Kontur kurang tegas"],r:[["Acne Clear Program","60 mnt"],["RF Skin Tightening","75 mnt"]]}};
const rp=n=>"Rp "+n.toLocaleString("id-ID");
const waLink=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t);
/* rail scroll spy */
const links=[...document.querySelectorAll("#nv a")];
document.querySelectorAll("main section").forEach(s=>new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)links.forEach(a=>a.classList.toggle("on",a.getAttribute("href")==="#"+s.id))}),{rootMargin:"-40% 0px -55% 0px"}).observe(s));
/* peta wajah */
const pn=document.getElementById("pn");
function zone(k){document.querySelectorAll(".z").forEach(z=>z.classList.toggle("on",z.dataset.z===k));
if(!k){pn.innerHTML='<span class="lab">Panduan awal</span><h3>Pilih area wajah</h3><p class="sub">Sentuh salah satu area bergaris pada gambar untuk melihat keluhan umum dan perawatan yang relevan.</p>';return}
const z=ZONES[k];pn.innerHTML=`<span class="lab">Area terpilih</span><h3>${z.t}</h3><div class="chips">${z.c.map(x=>`<span class="chip">${x}</span>`).join("")}</div><ul>${z.r.map(([n,d])=>`<li>${n}<span>${d} · ${rp(TR[n])}</span></li>`).join("")}</ul><button class="btn fill" data-pick="${z.r[0][0]}">Reservasi ${z.r[0][0]}</button><p class="note">Rekomendasi akhir ditentukan dokter setelah pemeriksaan kulit.</p>`;
pn.querySelector("[data-pick]").onclick=e=>{bt.value=e.target.dataset.pick;book();document.getElementById("booking").scrollIntoView()}}
document.querySelectorAll(".z").forEach(z=>{z.onclick=()=>zone(z.dataset.z);z.onkeydown=e=>{if(e.key==="Enter"||e.key===" "){e.preventDefault();zone(z.dataset.z)}}});zone(null);
/* teknologi */
const TK=[["Laser Toning","Cahaya laser berenergi rendah yang dipakai dokter untuk membantu meratakan tampilan warna kulit dan pori."],["Microneedling RF","Kombinasi jarum mikro dan energi radiofrekuensi untuk merangsang pembentukan kolagen dan memperhalus tekstur."],["Hydra Facial","Pembersihan, eksfoliasi lembut, dan infus serum dalam satu sesi, cocok untuk kulit kusam dan dehidrasi."],["LED Light Therapy","Terapi cahaya tanpa rasa sakit untuk menenangkan kulit sensitif dan mendukung pemulihan setelah tindakan."]];
rows.innerHTML=TK.map((t,i)=>`<div class="row" tabindex="0" role="button" aria-expanded="false"><span class="n">0${i+1}</span><h3>${t[0]}</h3><span class="pl">+</span><p>${t[1]}</p></div>`).join("");
rows.querySelectorAll(".row").forEach(r=>{const f=()=>{const o=r.classList.toggle("open");r.setAttribute("aria-expanded",o)};r.onclick=f;r.onkeydown=e=>{if(e.key==="Enter"||e.key===" "){e.preventDefault();f()}}});
rows.firstChild.classList.add("open");
/* reservasi */
Object.entries(TR).forEach(([n,p])=>bt.add(new Option(n+" · mulai "+rp(p),n)));
let sd=null,st=null;const days=[];
for(let i=1;i<=7;i++){const d=new Date();d.setDate(d.getDate()+i);days.push(d)}
dts.innerHTML=days.map((d,i)=>`<button type="button" aria-pressed="false" data-i="${i}">${d.toLocaleDateString("id-ID",{weekday:"short",day:"numeric",month:"short"})}</button>`).join("");
tms.innerHTML=["10:00","11:30","13:00","14:30","16:00","18:00"].map(t=>`<button type="button" aria-pressed="false">${t}</button>`).join("");
function pick(box,fn){box.querySelectorAll("button").forEach(b=>b.onclick=()=>{box.querySelectorAll("button").forEach(x=>x.setAttribute("aria-pressed","false"));b.setAttribute("aria-pressed","true");fn(b);book()})}
pick(dts,b=>sd=days[+b.dataset.i]);pick(tms,b=>st=b.textContent);
function book(){const t=bt.value,p=TR[t],ds=sd?sd.toLocaleDateString("id-ID",{weekday:"long",day:"numeric",month:"long"}):null,nm=bn.value.trim();
s1.textContent=t;s2.textContent=(ds&&st)?ds+", "+st:"Pilih tanggal dan jam";s3.textContent=nm||"-";s4.textContent="mulai "+rp(p);
bb.href=waLink(`Halo ${BRAND}, saya ${nm||"calon pasien"}. Saya ingin reservasi ${t}`+((ds&&st)?` pada ${ds} pukul ${st}.`:".")+" Mohon konfirmasi ketersediaan jadwal.");bb.target="_blank";bb.rel="noopener noreferrer"}
bt.oninput=book;bn.oninput=book;book();
/* chatbot */
const KB=[
[/harga|biaya|tarif|berapa|price/,()=>"Harga mulai dari: "+Object.entries(TR).map(([n,p])=>n+" "+rp(p)).join(", ")+". Harga final mengikuti hasil pemeriksaan dokter.",["Jadwal praktik","Aman untuk kulit sensitif?","Lanjut ke WhatsApp"]],
[/jerawat|acne|bruntusan/,()=>"Untuk jerawat, dokter biasanya memulai dari pemeriksaan jenis dan penyebabnya. Program kami: Acne Clear Program, mulai "+rp(TR["Acne Clear Program"])+".",["Reservasi","Harga perawatan"]],
[/noda|flek|pigmen|kusam|melasma|laser/,()=>"Untuk noda dan warna kulit tidak merata, tersedia Laser Toning dan Hydra Facial. Dokter menentukan mana yang cocok setelah melihat kondisi kulit Anda.",["Harga perawatan","Reservasi"]],
[/sensitif|aman|efek|sakit|downtime|pemulihan/,()=>"Setiap tindakan didahului pemeriksaan dokter. Untuk kulit sensitif, kami bisa merekomendasikan LED Light Therapy yang tanpa rasa sakit. Respons kulit tiap orang berbeda, jadi konsultasi tetap langkah pertama.",["Reservasi","Konsultasi dokter"]],
[/jadwal|jam|buka|praktik|tutup/,()=>"Reservasi bisa dipilih langsung di bagian Reservasi pada halaman ini, tersedia slot 7 hari ke depan. Tim kami akan mengonfirmasi lewat WhatsApp.",["Reservasi","Lanjut ke WhatsApp"]],
[/reserv|booking|daftar|konsul|appointment/,()=>"Silakan pilih perawatan, tanggal, dan jam di bagian Reservasi, lalu tekan kirim ke WhatsApp. Saya juga bisa meneruskan pertanyaan Anda ke tim kami.",["Lanjut ke WhatsApp"]],
[/dokter|spesialis|sertifikat|izin/,()=>"Seluruh tindakan ditangani dokter spesialis kulit dan kelamin. Profil tim ada di bagian Tim medis.",["Reservasi"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Halo, selamat datang di NUVIA. Ada keluhan kulit yang ingin Anda tanyakan?",["Harga perawatan","Jerawat","Noda dan pigmen","Reservasi"]]];
const log=[],cps=document.getElementById("cps");
function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;msgs.append(d);msgs.scrollTop=1e9;if(c==="u")log.push(t)}
function chips(a){cps.innerHTML="";a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>ask(v);cps.append(b)})}
function waUpd(){const w=document.getElementById("wa");w.href=waLink(`Halo ${BRAND}, saya menghubungi dari website.`+(log.length?` Pertanyaan saya: ${log.join("; ")}.`:" Saya ingin berkonsultasi."));w.target="_blank";w.rel="noopener noreferrer"}
function ask(q){say(q,"u");if(/whatsapp|\bwa\b|admin|manusia|dokter langsung/i.test(q)){setTimeout(()=>{say("Baik, tekan tombol hijau di bawah untuk melanjutkan ke WhatsApp. Pertanyaan Anda ikut terkirim.","b");waUpd()},400);return}
const m=KB.find(([r])=>r.test(q.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih baik dijawab tim medis kami langsung. Tekan tombol WhatsApp di bawah, pertanyaan Anda ikut terkirim.","b");chips(["Harga perawatan","Jerawat","Reservasi"])}waUpd()},450)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let first=true;
function toggle(){chat.classList.toggle("open");if(chat.classList.contains("open")&&first){first=false;say("Selamat datang di NUVIA. Saya asisten virtual untuk pertanyaan seputar perawatan, harga, dan reservasi. Saya tidak memberikan diagnosis medis.","b");chips(["Harga perawatan","Jerawat","Noda dan pigmen","Reservasi"]);waUpd()}}
fab.onclick=toggle;x.onclick=toggle;
const themeToggle=document.getElementById("theme-toggle");
themeToggle.addEventListener("click",()=>{
const theme=document.documentElement.dataset.theme==="bright"?"dark":"bright";
const isBright=theme==="bright";
document.documentElement.dataset.theme=theme;
themeToggle.setAttribute("aria-pressed",String(isBright));
themeToggle.setAttribute("aria-label",`Aktifkan ${isBright?"dark":"bright"} mode`);
themeToggle.querySelector("[data-theme-icon]").textContent=isBright?"☾":"☼";
themeToggle.querySelector("[data-theme-label]").textContent=isBright?"Dark mode":"Bright mode";
});
</script>
</body>
</html>
@endverbatim
