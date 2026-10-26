@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>GLOW LAB – Klinik Kecantikan</title>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,600;12..96,800&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
<style>
:root{--ink:#241A2E;--cr:#FFF3E4;--co:#FF5A4D;--pk:#FF9EC4;--bt:#FFD84A;--tl:#1FB59A;
--sans:'Bricolage Grotesque',system-ui,sans-serif;--ser:'Instrument Serif',Georgia,serif;--mono:ui-monospace,Menlo,monospace;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth;scroll-padding-top:90px}
body{margin:0;background:var(--cr);color:var(--ink);font:400 17px/1.6 var(--sans);overflow-x:hidden}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
em{font-family:var(--ser);font-style:italic;font-weight:400}
.btn{display:inline-block;padding:15px 28px;border:2.5px solid var(--ink);border-radius:999px;font:600 16px var(--sans);background:var(--bt);color:var(--ink);cursor:pointer;box-shadow:4px 4px 0 var(--ink);transition:.15s}
.btn:hover,.btn:focus-visible{transform:translate(2px,2px);box-shadow:2px 2px 0 var(--ink);outline:none}
.btn.pk{background:var(--pk)}.btn.co{background:var(--co);color:#fff}
.pill{position:fixed;top:calc(14px + env(safe-area-inset-top,0px));left:50%;transform:translateX(-50%);z-index:50;display:flex;align-items:center;gap:6px;padding:7px 8px 7px 20px;background:var(--cr);border:2.5px solid var(--ink);border-radius:999px;box-shadow:4px 4px 0 var(--ink);white-space:nowrap}
.pill b{font:800 20px var(--sans);letter-spacing:-.03em;margin-right:12px}
.pill a.l{padding:8px 12px;font-size:15px;font-weight:600;border-radius:999px}
.pill a.l:hover{background:var(--pk)}
.pill .btn{padding:9px 18px;font-size:14px;box-shadow:none;margin-left:6px}
@media(max-width:760px){.pill a.l{display:none}}
/* hero */
.hero{min-height:100vh;padding:130px 5vw 90px;position:relative;display:grid;grid-template-columns:1.25fr .75fr;align-items:center;gap:10px}
.hero h1{font-size:clamp(70px,15vw,230px);font-weight:800;line-height:.82;letter-spacing:-.06em;color:var(--co)}
.hero h1 span{display:block}
.hero h1 .s2{font:italic 400 .34em/1 var(--ser);letter-spacing:0;color:var(--ink);margin:.1em 0 .1em .3em;transform:rotate(-3deg)}
.hero h1 .s3{font-size:.4em;letter-spacing:-.04em;color:var(--ink);-webkit-text-stroke:0;line-height:1}
.hero p{max-width:440px;margin:30px 0;font-size:19px}
.fw{position:relative;width:min(100%,420px);margin:auto}
.fw svg.f{width:100%;display:block;filter:drop-shadow(8px 10px 0 var(--ink));--f:#FFD0B3;--sp:0;--gl:.5}
.blob{position:absolute;border-radius:50%;border:2.5px solid var(--ink);z-index:-1}
.stk{position:absolute;right:-6%;bottom:6%;width:128px;height:128px;border-radius:50%;background:var(--bt);border:2.5px solid var(--ink);display:grid;place-items:center;text-align:center;font:800 15px/1.1 var(--sans);transform:rotate(12deg);animation:wob 5s ease-in-out infinite}
@keyframes wob{50%{transform:rotate(-8deg) scale(1.06)}}
.spk{position:absolute;color:var(--ink);font-size:34px;animation:tw 2.4s ease-in-out infinite}
@keyframes tw{50%{transform:scale(.4) rotate(40deg);opacity:.4}}
.in{opacity:0;transform:translateY(24px) rotate(-1deg);animation:in .8s cubic-bezier(.2,.8,.2,1) forwards}
.d1{animation-delay:.12s}.d2{animation-delay:.28s}.d3{animation-delay:.45s}
@keyframes in{to{opacity:1;transform:none}}
@media(max-width:820px){.hero{grid-template-columns:1fr;padding-top:110px}.fw{width:min(78%,340px)}}
/* band */
.band{background:var(--ink);color:var(--bt);transform:rotate(-2deg);margin:20px -4vw;overflow:hidden;white-space:nowrap;padding:16px 0;border-block:3px solid var(--co)}
.band div{display:inline-block;animation:mq 30s linear infinite;font:800 clamp(26px,4vw,44px) var(--sans);letter-spacing:-.02em}
.band i{font:italic 400 1em var(--ser);color:var(--pk);margin:0 .5em}
@keyframes mq{to{transform:translateX(-50%)}}
section{padding:100px 5vw}
.eyebrow{display:inline-block;font:600 14px var(--mono);background:var(--pk);border:2px solid var(--ink);padding:4px 12px;border-radius:6px;transform:rotate(-2deg);margin-bottom:18px}
h2{font-size:clamp(38px,6vw,86px);font-weight:800;letter-spacing:-.045em;line-height:.95;max-width:900px}
.sub{max-width:520px;margin-top:18px;font-size:18px}
/* builder */
.bld{display:grid;grid-template-columns:1fr 360px;gap:46px;margin-top:50px;align-items:start}
.stp{margin-bottom:34px}
.stp h3{font:800 26px var(--sans);letter-spacing:-.03em;display:flex;align-items:center;gap:12px;margin-bottom:14px}
.stp h3 i{width:36px;height:36px;border-radius:50%;border:2.5px solid var(--ink);display:grid;place-items:center;font:800 16px var(--sans);font-style:normal}
.opts{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.opt{text-align:left;padding:18px;border:2.5px solid var(--ink);border-radius:20px;background:#fff;cursor:pointer;font:inherit;color:var(--ink);transition:.2s;position:relative;min-height:128px;display:flex;flex-direction:column;justify-content:space-between}
.opt:hover{transform:translateY(-4px) rotate(-1deg)}
.opt b{font:600 17px/1.2 var(--sans)}.opt small{font:400 13px var(--mono)}
.opt[aria-pressed=true]{background:var(--c);box-shadow:5px 5px 0 var(--ink);transform:translate(-2px,-2px) rotate(1deg)}
.opt[aria-pressed=true]::after{content:"✓";position:absolute;top:10px;right:14px;font-weight:800}
.rc{position:sticky;top:90px;background:#fff;border:2.5px solid var(--ink);padding:28px 24px 34px;font:400 14px/1.5 var(--mono);transform:rotate(1.2deg);box-shadow:6px 6px 0 var(--ink);
-webkit-mask:conic-gradient(from -45deg at bottom,#0000,#000 1deg 89deg,#0000 90deg) 50%/18px 100%;mask:conic-gradient(from -45deg at bottom,#0000,#000 1deg 89deg,#0000 90deg) 50%/18px 100%;padding-bottom:44px}
.rc h3{font:800 22px var(--sans);letter-spacing:-.02em;text-align:center}
.rc .c{text-align:center;font-size:12px;opacity:.7;margin-bottom:14px}
.rc .ln{display:flex;justify-content:space-between;gap:12px;padding:7px 0;border-bottom:1.5px dashed var(--ink)}
.rc .ln.e{opacity:.4}
.rc .tot{display:flex;justify-content:space-between;font:800 24px var(--sans);margin:16px 0 4px}
.rc .btn{display:block;text-align:center;margin-top:16px;font-size:15px}
.ck{display:flex;gap:10px;align-items:center;margin:14px 0 0;font:400 13px var(--mono);cursor:pointer}
.ck input{width:18px;height:18px;accent-color:var(--co)}
@media(max-width:960px){.bld{grid-template-columns:1fr}.rc{position:static;transform:none;max-width:420px}.opts{grid-template-columns:1fr}.opt{min-height:0;gap:8px}}
/* slider */
.sl{background:var(--pk);border-block:3px solid var(--ink)}
.glw{position:relative;max-width:560px;aspect-ratio:1;margin:46px auto 0;border:3px solid var(--ink);border-radius:36px;overflow:hidden;background:var(--cr);box-shadow:8px 8px 0 var(--ink);touch-action:pan-y}
.glw>div{position:absolute;inset:0;display:grid;place-items:center}
.glw svg{width:72%}
.glw .af{background:radial-gradient(circle at 50% 45%,#FFF0A8,#FFC9A8 70%);clip-path:inset(0 0 0 var(--p,50%))}
.glw .bf{background:#C9B8A8}
.glw .bf svg{--f:#CFA98C;--sp:1;--gl:0}.glw .af svg{--f:#FFD3B8;--sp:0;--gl:.9}
.glw .hd{position:absolute;top:0;bottom:0;left:var(--p,50%);width:4px;background:var(--ink);transform:translateX(-2px);pointer-events:none}
.glw .hd::after{content:"⇄";position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:50px;height:50px;border-radius:50%;background:var(--bt);border:3px solid var(--ink);display:grid;place-items:center;font-weight:800;font-size:20px}
.glw input{position:absolute;inset:0;width:100%;height:100%;opacity:0;cursor:ew-resize;margin:0}
.glw .lb{position:absolute;top:16px;font:600 13px var(--mono);background:#fff;border:2px solid var(--ink);padding:3px 10px;border-radius:99px}
.cap{text-align:center;font:400 13px var(--mono);margin-top:18px}
/* notes */
.nt{display:grid;grid-template-columns:repeat(3,1fr);gap:26px;margin-top:56px}
.nt div{padding:28px;border:2.5px solid var(--ink);box-shadow:5px 5px 0 var(--ink);font:italic 400 24px/1.25 var(--ser);position:relative}
.nt div:nth-child(1){background:var(--bt);transform:rotate(-2deg)}.nt div:nth-child(2){background:#fff;transform:rotate(1.5deg) translateY(16px)}.nt div:nth-child(3){background:var(--tl);color:#fff;transform:rotate(-1deg)}
.nt cite{display:block;font:600 14px var(--mono);font-style:normal;margin-top:14px}
@media(max-width:860px){.nt{grid-template-columns:1fr}.nt div{transform:none!important}}
.tm{display:flex;gap:16px;flex-wrap:wrap;margin-top:44px}
.tm div{display:flex;align-items:center;gap:12px;padding:8px 22px 8px 8px;border:2.5px solid var(--ink);border-radius:99px;background:#fff;font:600 16px var(--sans)}
.tm i{width:48px;height:48px;border-radius:50%;border:2.5px solid var(--ink);display:grid;place-items:center;font:800 15px var(--sans);font-style:normal;background:var(--c)}
.tm small{display:block;font:400 12px var(--mono);opacity:.7;line-height:1.2}
.fin{background:var(--co);color:#fff;text-align:center;border-top:3px solid var(--ink)}
.fin h2{margin:0 auto 28px;color:var(--cr)}
.fin .btn{background:var(--bt);color:var(--ink)}
footer{padding:26px 5vw;font:400 13px var(--mono);background:var(--ink);color:var(--cr);text-align:center}
/* chat */
#fab{position:fixed;left:50%;bottom:calc(18px + env(safe-area-inset-bottom,0px));transform:translateX(-50%);z-index:70;padding:14px 26px;border:2.5px solid var(--ink);border-radius:999px;background:var(--tl);color:#fff;font:700 16px var(--sans);cursor:pointer;box-shadow:4px 4px 0 var(--ink);display:flex;gap:10px;align-items:center}
#fab:hover{transform:translateX(-50%) translateY(2px)}
#fab b{width:10px;height:10px;border-radius:50%;background:var(--bt);animation:bl 1.4s infinite}
@keyframes bl{50%{opacity:.2}}
#chat{position:fixed;left:50%;bottom:calc(84px + env(safe-area-inset-bottom,0px));transform:translateX(-50%);z-index:70;width:min(400px,calc(100vw - 28px));height:min(540px,68vh);display:none;flex-direction:column;background:var(--cr);border:3px solid var(--ink);border-radius:26px;box-shadow:7px 7px 0 var(--ink);overflow:hidden}
#chat.open{display:flex;animation:pp .35s cubic-bezier(.2,1.2,.3,1)}
@keyframes pp{from{opacity:0;transform:translateX(-50%) translateY(30px) scale(.9)}}
#chat header{padding:14px 18px;background:var(--pk);border-bottom:3px solid var(--ink);display:flex;justify-content:space-between;align-items:center}
#chat header b{font:800 20px var(--sans);letter-spacing:-.02em}
#chat header button{background:none;border:0;font-size:26px;cursor:pointer;color:var(--ink)}
#msgs{flex:1;overflow-y:auto;padding:16px;display:flex;flex-direction:column;gap:10px}
.m{max-width:84%;padding:10px 14px;font-size:15px;line-height:1.45;border:2px solid var(--ink);border-radius:18px;animation:pp2 .3s}
@keyframes pp2{from{opacity:0;transform:translateY(10px)}}
.m.b{background:#fff;align-self:flex-start;border-bottom-left-radius:4px}
.m.u{background:var(--bt);align-self:flex-end;border-bottom-right-radius:4px}
.cps{display:flex;flex-wrap:wrap;gap:7px;padding:0 16px 12px}
.cps button{font:600 13px var(--sans);padding:7px 13px;background:#fff;border:2px solid var(--ink);color:var(--ink);cursor:pointer;border-radius:99px}
.cps button:hover{background:var(--pk)}
#cf{display:flex;border-top:3px solid var(--ink);background:#fff}
#cf input{flex:1;padding:14px;background:none;border:0;font:inherit;font-size:15px;outline:none;min-width:0;color:var(--ink)}
#cf button{padding:0 20px;background:var(--co);color:#fff;border:0;border-left:3px solid var(--ink);cursor:pointer;font-size:18px}
#wa{display:block;text-align:center;padding:11px;background:#1FA855;color:#fff;font-weight:600;font-size:15px;border-top:3px solid var(--ink)}
:focus-visible{outline:3px solid var(--tl);outline-offset:3px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}.in{opacity:1;transform:none}}
</style>
</head>
<body>
<svg width="0" height="0" style="position:absolute" aria-hidden="true"><defs>
<radialGradient id="gl" cx="50%" cy="40%" r="60%"><stop offset="0" stop-color="#fff" stop-opacity=".95"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></radialGradient>
<symbol id="face" viewBox="0 0 300 340"><path d="M52 150c0-86 44-130 98-130s98 44 98 130c0 86-40 150-98 150S52 236 52 150z" fill="var(--f)" stroke="#241A2E" stroke-width="5"/>
<path d="M44 160C34 70 90 8 152 8s122 62 104 152c-8-50-30-84-62-96-34 24-90 30-150 96z" fill="#241A2E"/>
<g fill="#241A2E" opacity="var(--sp)"><circle cx="102" cy="190" r="4"/><circle cx="118" cy="214" r="3"/><circle cx="196" cy="186" r="4"/><circle cx="184" cy="216" r="3"/><circle cx="150" cy="132" r="3"/><circle cx="212" cy="160" r="3"/></g>
<path d="M92 150q18 14 38 0M170 150q18 14 38 0" fill="none" stroke="#241A2E" stroke-width="5" stroke-linecap="round"/>
<path d="M150 160v34l-10 6" fill="none" stroke="#241A2E" stroke-width="4" stroke-linecap="round" opacity=".6"/>
<circle cx="96" cy="202" r="17" fill="#FF9EC4" opacity=".75"/><circle cx="204" cy="202" r="17" fill="#FF9EC4" opacity=".75"/>
<path d="M122 236q28 26 56 0q-28-6-56 0z" fill="#FF5A4D" stroke="#241A2E" stroke-width="4" stroke-linejoin="round"/>
<ellipse cx="150" cy="150" rx="96" ry="130" fill="url(#gl)" opacity="var(--gl)"/></symbol></defs></svg>

<nav class="pill"><b>glow lab</b><a class="l" href="#ritual">Ritual</a><a class="l" href="#glow">Glow</a><a class="l" href="#cerita">Cerita</a><a class="btn" href="#" data-wa="Halo GLOW LAB, saya ingin konsultasi kulit.">Chat WA</a></nav>

<header class="hero">
<div>
<h1><span class="in">glow</span><span class="s2 in d1">itu proses,</span><span class="s3 in d2">bukan keajaiban.</span></h1>
<p class="in d3">Klinik kecantikan dengan dokter spesialis kulit. Racik sendiri ritual perawatanmu, lalu kami cocokkan dengan kondisi kulitmu saat konsultasi.</p>
<div class="in d3" style="display:flex;gap:14px;flex-wrap:wrap"><a class="btn co" href="#ritual">Racik ritualmu</a><a class="btn pk" href="#" data-wa="Halo GLOW LAB, saya ingin reservasi konsultasi.">Reservasi konsultasi</a></div>
</div>
<div class="fw in d2">
<div class="blob" style="width:85%;height:85%;left:12%;top:8%;background:var(--pk)"></div>
<div class="blob" style="width:26%;height:26%;left:-4%;top:6%;background:var(--bt)"></div>
<svg class="f" viewBox="0 0 300 340" aria-hidden="true"><use href="#face"/></svg>
<div class="stk">dokter<br>spesialis<br>kulit ✿</div>
<span class="spk" style="left:2%;bottom:20%">✦</span><span class="spk" style="right:4%;top:6%;animation-delay:.8s">✦</span>
</div>
</header>

<div class="band" aria-hidden="true"><div id="bd"></div></div>

<section id="ritual">
<span class="eyebrow">fitur: ritual builder</span>
<h2>Racik <em>ritual</em> glow-mu sendiri</h2>
<p class="sub">Pilih satu perawatan di setiap langkah. Struk di samping menghitung perkiraan biayanya. Dokter akan menyesuaikannya dengan kondisi kulitmu.</p>
<div class="bld">
<div id="steps"></div>
<aside class="rc" aria-live="polite"><h3>STRUK GLOW</h3><div class="c">GLOW LAB · ritual buatanmu</div><div id="lines"></div>
<label class="ck"><input type="checkbox" id="kd"> Tambah konsultasi dokter (+Rp 150.000)</label>
<div class="tot"><span>TOTAL</span><span id="tt">Rp 0</span></div><div style="font-size:12px;opacity:.7">perkiraan, final setelah pemeriksaan dokter</div>
<a class="btn co" id="rb" href="#">Kirim ritual ke WhatsApp</a></aside>
</div></section>

<section class="sl" id="glow">
<span class="eyebrow" style="background:var(--bt)">fitur: glow slider</span>
<h2>Geser untuk <em>rasakan</em> bedanya</h2>
<p class="sub">Ilustrasi tentang tampilan kulit sebelum dan sesudah rangkaian perawatan.</p>
<div class="glw" id="gw"><div class="bf"><svg class="f" viewBox="0 0 300 340" aria-hidden="true"><use href="#face"/></svg></div><div class="af"><svg class="f" viewBox="0 0 300 340" aria-hidden="true"><use href="#face"/></svg></div>
<span class="lb" style="left:16px">sebelum</span><span class="lb" style="right:16px">sesudah</span><div class="hd"></div>
<input type="range" min="0" max="100" value="50" id="rg" aria-label="Geser perbandingan sebelum dan sesudah"></div>
<p class="cap">* Ilustrasi, bukan foto hasil pasien. Hasil perawatan berbeda pada tiap orang.</p>
</section>

<section id="cerita">
<span class="eyebrow">cerita kulit</span>
<h2>Kata mereka yang sudah <em>mampir</em></h2>
<div class="nt">
<div>Akhirnya ada klinik yang menjelaskan dulu, bukan langsung jualan.<cite>Dinda, 27</cite></div>
<div>Aku suka bisa pilih ritual sendiri, tapi tetap dicek dokter dulu.<cite>Maya, 31</cite></div>
<div>Ruangannya nyaman dan jadwalnya tepat waktu.<cite>Rani, 24</cite></div>
</div>
<div class="tm">
<div style="--c:var(--pk)"><i>AR</i><span>dr. Anindya R., Sp.DVE<small>kepala klinik</small></span></div>
<div style="--c:var(--bt)"><i>BP</i><span>dr. Bima P., Sp.DVE<small>jerawat dan kulit sensitif</small></span></div>
<div style="--c:var(--tl)"><i>CL</i><span>dr. Citra L., Sp.DVE<small>laser dan pengencangan</small></span></div>
</div></section>

<section class="fin"><h2>Yuk, mulai <em>glow</em>-mu</h2><a class="btn" href="#" data-wa="Halo GLOW LAB, saya ingin cek jadwal dokter.">Cek jadwal lewat WhatsApp</a></section>
<footer>© 2026 GLOW LAB. Template contoh, ganti nama, dokter, harga, dan kontak sesuai klinik Anda.</footer>

<button id="fab"><b></b>Tanya Glo</button>
<div id="chat" role="dialog" aria-label="Asisten Glo">
<header><b>Glo, asisten klinik ✿</b><button id="x" aria-label="Tutup">×</button></header>
<div id="msgs"></div><div class="cps" id="cps"></div>
<a id="wa" href="#">Lanjut ngobrol di WhatsApp</a>
<form id="cf"><input id="ci" placeholder="Tanya apa saja…" autocomplete="off"><button aria-label="Kirim">➤</button></form>
</div>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="GLOW LAB";
const rp=n=>"Rp "+n.toLocaleString("id-ID");
const waLink=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t);
document.querySelectorAll("[data-wa]").forEach(a=>{a.href=waLink(a.dataset.wa);a.target="_blank";a.rel="noopener noreferrer"});
bd.innerHTML=("Facial <i>✦</i> Laser Toning <i>✦</i> Acne Care <i>✦</i> LED Glow <i>✦</i> RF Lift <i>✦</i> Konsultasi Dokter <i>✦</i> ").repeat(4);
const STEPS=[
{t:"Bersihkan",c:"var(--pk)",o:[["Deep Cleanse Facial","60 mnt",250000],["Hydra Glow Facial","75 mnt",450000],["Enzyme Peel Lembut","45 mnt",350000]]},
{t:"Rawat",c:"var(--bt)",o:[["Acne Clear Session","60 mnt",400000],["Brightening Laser Toning","45 mnt",650000],["Serum Infusion","50 mnt",500000]]},
{t:"Bercahaya",c:"var(--tl)",o:[["LED Glow Mask","30 mnt",200000],["Collagen Mask Ritual","30 mnt",180000],["RF Glow Lift","75 mnt",900000]]}];
const sel=[null,null,null];
steps.innerHTML=STEPS.map((s,i)=>`<div class="stp"><h3><i style="background:${s.c}">${i+1}</i>${s.t}</h3><div class="opts">${s.o.map((o,j)=>`<button type="button" class="opt" style="--c:${s.c}" aria-pressed="false" data-i="${i}" data-j="${j}"><b>${o[0]}</b><small>${o[1]} · ${rp(o[2])}</small></button>`).join("")}</div></div>`).join("");
steps.querySelectorAll(".opt").forEach(b=>b.onclick=()=>{const i=+b.dataset.i,j=+b.dataset.j;sel[i]=sel[i]===j?null:j;steps.querySelectorAll(`.opt[data-i="${i}"]`).forEach(x=>x.setAttribute("aria-pressed",+x.dataset.j===sel[i]));rc()});
function rc(){let tot=0,L=[],tx=[];STEPS.forEach((s,i)=>{if(sel[i]===null)L.push(`<div class="ln e"><span>${i+1}. ${s.t}</span><span>-</span></div>`);else{const o=s.o[sel[i]];tot+=o[2];tx.push(o[0]);L.push(`<div class="ln"><span>${i+1}. ${o[0]}</span><span>${(o[2]/1000)}k</span></div>`)}});
if(kd.checked){tot+=150000;tx.push("Konsultasi dokter");L.push(`<div class="ln"><span>+ Konsultasi dokter</span><span>150k</span></div>`)}
lines.innerHTML=L.join("");tt.textContent=rp(tot);
rb.href=waLink(tx.length?`Halo ${BRAND}, saya ingin merancang ritual: ${tx.join(", ")} (estimasi ${rp(tot)}). Mohon info jadwal dan penyesuaian dokter.`:`Halo ${BRAND}, saya ingin konsultasi untuk menyusun ritual perawatan.`);rb.target="_blank";rb.rel="noopener noreferrer"}
kd.onchange=rc;rc();
rg.oninput=()=>gw.style.setProperty("--p",rg.value+"%");
/* chatbot */
const KB=[
[/harga|biaya|tarif|berapa/,()=>"Perawatan kami mulai dari "+rp(180000)+" untuk mask ritual sampai "+rp(900000)+" untuk RF Glow Lift. Coba ritual builder di halaman ini untuk hitung estimasimu.",["Jerawat","Kulit sensitif","Reservasi"]],
[/jerawat|acne|bruntusan/,()=>"Untuk jerawat ada Acne Clear Session ("+rp(400000)+"). Dokter akan mengecek jenis jerawatmu dulu sebelum menentukan langkahnya.",["Harga","Reservasi"]],
[/sensitif|aman|sakit|efek|downtime/,()=>"Setiap tindakan didahului pemeriksaan dokter. Untuk kulit sensitif, LED Glow Mask bisa jadi pilihan yang lembut. Respons kulit tiap orang berbeda, jadi konsultasi tetap langkah pertama.",["Reservasi"]],
[/noda|flek|kusam|pigmen|laser/,()=>"Untuk noda dan kulit kusam ada Brightening Laser Toning dan Hydra Glow Facial. Dokter yang akan menentukan mana yang cocok.",["Harga","Reservasi"]],
[/jadwal|jam|buka|reserv|booking|daftar|konsul/,()=>"Untuk cek jadwal dokter dan reservasi, tekan tombol hijau di bawah. Pesanmu ikut terkirim ke tim kami.",["Lanjut ke WhatsApp"]],
[/dokter|spesialis/,()=>"Semua tindakan ditangani dokter spesialis kulit dan kelamin. Profil tim ada di bagian Cerita.",["Reservasi"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Hai! Aku Glo. Mau tanya soal perawatan, harga, atau reservasi?",["Harga","Jerawat","Kulit sensitif","Reservasi"]]];
const log=[],cps=document.getElementById("cps");
function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;msgs.append(d);msgs.scrollTop=1e9;if(c==="u")log.push(t)}
function chips(a){cps.innerHTML="";a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>ask(v);cps.append(b)})}
function waUpd(){const w=document.getElementById("wa");w.href=waLink(`Halo ${BRAND}, saya menghubungi dari website.`+(log.length?` Pertanyaan saya: ${log.join("; ")}.`:" Saya ingin berkonsultasi."));w.target="_blank";w.rel="noopener noreferrer"}
function ask(q){say(q,"u");if(/whatsapp|\bwa\b|admin|manusia/i.test(q)){setTimeout(()=>{say("Siap! Tekan tombol hijau di bawah, pertanyaanmu ikut terkirim.","b");waUpd()},400);return}
const m=KB.find(([r])=>r.test(q.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab tim medis kami. Tekan tombol WhatsApp di bawah, pertanyaanmu ikut terkirim.","b");chips(["Harga","Jerawat","Reservasi"])}waUpd()},450)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let first=true;
function toggle(){chat.classList.toggle("open");if(chat.classList.contains("open")&&first){first=false;say("Hai! Aku Glo, asisten virtual GLOW LAB. Aku bisa bantu info perawatan, harga, dan reservasi. Aku tidak memberi diagnosis medis ya.","b");chips(["Harga","Jerawat","Kulit sensitif","Reservasi"]);waUpd()}}
fab.onclick=toggle;x.onclick=toggle;
</script>
</body>
</html>
@endverbatim
