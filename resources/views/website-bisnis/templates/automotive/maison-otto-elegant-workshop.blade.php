@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Maison Otto – Perawatan Kendaraan yang Dikerjakan dengan Ketelitian</title>
<link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Display&family=Hanken+Grotesk:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
:root{--cr:#F7EFE5;--sd:#E9D8C3;--tc:#B85C38;--tc2:#8E3F22;--um:#2B1A14;--cl:#D9A58B;--mu:#7A665B;--ln:rgba(43,26,20,.16);--s:'Libre Caslon Display',Georgia,serif;--h:'Hanken Grotesk',system-ui,sans-serif;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth;scroll-padding-top:90px}
body{margin:0;background:var(--cr);color:var(--um);font:300 17px/1.7 var(--h);overflow-x:hidden}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
.ey{font:500 12px var(--h);letter-spacing:.24em;text-transform:uppercase;color:var(--tc)}
.btn{display:inline-block;padding:15px 34px;border:1px solid var(--um);background:none;color:var(--um);font:500 13px var(--h);letter-spacing:.16em;text-transform:uppercase;cursor:pointer;transition:.35s}
.btn:hover,.btn:focus-visible{background:var(--um);color:var(--cr);outline:none}
.btn.f{background:var(--tc);border-color:var(--tc);color:#fff}.btn.f:hover{background:var(--tc2);border-color:var(--tc2)}
nav{position:sticky;top:env(safe-area-inset-top,0px);z-index:50;background:var(--cr);border-bottom:1px solid var(--ln);display:grid;grid-template-columns:1fr auto 1fr;align-items:center;padding:16px 4vw}
nav .l,nav .r{display:flex;gap:30px;font:500 12px var(--h);letter-spacing:.18em;text-transform:uppercase}
nav .r{justify-content:flex-end}
nav a:hover{color:var(--tc)}
#maison-menu-button{display:none;background:var(--cr);border:1px solid var(--um);width:46px;height:46px;color:var(--um);font:400 22px var(--h);cursor:pointer}
#maison-menu{position:fixed;left:0;right:0;top:calc(74px + env(safe-area-inset-top,0px));bottom:0;z-index:45;background:var(--cr);border-bottom:1px solid var(--ln);padding:24px 4vw;overflow-y:auto;visibility:hidden;opacity:0;pointer-events:none;transform:translateY(-110%);transition:.35s}
#maison-menu.open{visibility:visible;opacity:1;pointer-events:auto;transform:none}
#maison-menu a{display:block;padding:16px 0;border-bottom:1px solid var(--ln);font:400 24px var(--s)}
.lg{font:400 28px var(--s);letter-spacing:.04em;text-align:center}.lg small{display:block;font:500 9.5px var(--h);letter-spacing:.4em;color:var(--tc);text-transform:uppercase;margin-top:-2px}
@media(max-width:860px){nav{grid-template-columns:1fr auto}nav .l{display:none}nav .r{display:none}#maison-menu-button{display:block}}
/* hero */
.hero{text-align:center;padding:90px 4vw 40px}
.hero h1{font:400 clamp(42px,7vw,104px)/1 var(--s);letter-spacing:-.01em;max-width:1100px;margin:22px auto}
.hero h1 em{font-style:normal;color:var(--tc);border-bottom:2px solid var(--cl)}
.hero p{max-width:520px;margin:0 auto 30px;color:var(--mu);font-size:18px}
.pn{display:flex;gap:12px;height:480px;margin:56px auto 0;max-width:1300px}
.p{flex:1;position:relative;overflow:hidden;cursor:pointer;color:#fff;background:var(--bg);transition:flex .7s cubic-bezier(.3,.8,.2,1);text-align:left;border:0;padding:0;font:inherit;border-radius:200px 200px 0 0}
.p.on{flex:3.6;border-radius:30px 30px 0 0}
.p::before{content:"";position:absolute;inset:0;background:radial-gradient(circle at 30% 20%,rgba(255,255,255,.18),transparent 55%)}
.p svg{position:absolute;left:50%;top:38px;width:62px;transform:translateX(-50%);stroke:#fff;fill:none;stroke-width:1.5;transition:.6s}
.p.on svg{left:38px;transform:none;width:54px}
.p .t{position:absolute;left:50%;bottom:30px;transform:translateX(-50%);writing-mode:vertical-rl;rotate:180deg;font:400 26px var(--s);letter-spacing:.06em;white-space:nowrap;transition:.4s}
.p.on .t{opacity:0}
.p .d{position:absolute;left:38px;right:38px;bottom:34px;opacity:0;transform:translateY(20px);transition:.5s;min-width:260px}
.p.on .d{opacity:1;transform:none;transition-delay:.3s}
.d h3{font:400 clamp(30px,3.4vw,46px)/1.05 var(--s)}
.d p{margin:10px 0 14px;color:rgba(255,255,255,.88);font-size:15.5px;max-width:420px}
.d b{font:500 13px var(--h);letter-spacing:.14em;text-transform:uppercase;border-bottom:1px solid #fff;padding-bottom:3px}
@media(max-width:860px){.pn{flex-direction:column;height:auto}.p{height:84px;border-radius:40px}.p.on{height:310px;border-radius:30px}.p svg{top:20px;left:24px;transform:none;width:42px}.p .t{writing-mode:horizontal-tb;rotate:none;left:84px;transform:none;bottom:auto;top:24px}.p .d{left:24px;right:24px;bottom:22px}.p.on svg{left:24px;top:22px;width:42px}}
section{padding:120px 4vw}
.hd{text-align:center;max-width:700px;margin:0 auto 60px}
.hd h2{font:400 clamp(36px,5vw,70px)/1.02 var(--s);margin:14px 0}
.hd p{color:var(--mu)}
.rule{display:flex;align-items:center;gap:14px;justify-content:center;color:var(--tc)}.rule::before,.rule::after{content:"";height:1px;width:70px;background:var(--cl)}
/* passport */
.ps{display:grid;grid-template-columns:1fr 1fr;gap:6vw;align-items:center;max-width:1150px;margin:auto}
.ps h2{font:400 clamp(36px,5vw,66px)/1.02 var(--s);margin:14px 0 18px}
.ps p{color:var(--mu);max-width:420px}
.ps form{display:flex;margin:26px 0 8px;border-bottom:1px solid var(--um);max-width:420px}
.ps input{flex:1;padding:14px 0;background:none;border:0;font:400 22px var(--s);letter-spacing:.08em;text-transform:uppercase;outline:none;color:var(--um);min-width:0}
.ps form button{background:none;border:0;font:500 12px var(--h);letter-spacing:.16em;text-transform:uppercase;color:var(--tc);cursor:pointer}
.ps small{color:var(--mu);font-size:13px}
.bkw{perspective:1400px;width:min(100%,400px);aspect-ratio:3/4;margin:auto;position:relative;filter:drop-shadow(0 30px 40px rgba(43,26,20,.25))}
.pg,.cv{position:absolute;inset:0;border-radius:4px 16px 16px 4px}
.pg{background:#fff;padding:30px 26px;overflow:auto;border:1px solid var(--ln);font-size:14px}
.pg h3{font:400 26px var(--s);color:var(--tc);margin-bottom:2px}
.pg .m{color:var(--mu);font-size:13px;margin-bottom:12px}
.rc{display:grid;grid-template-columns:78px 1fr;gap:2px 10px;padding:10px 0;border-top:1px solid var(--ln)}
.rc span{color:var(--mu);font-size:12.5px}.rc b{font-weight:500}.rc em{font-style:normal;grid-column:2;color:var(--tc);font-size:13px}
.cv{background:linear-gradient(145deg,var(--tc),var(--tc2));transform-origin:left center;transition:transform 1.1s cubic-bezier(.5,0,.2,1);backface-visibility:hidden;-webkit-backface-visibility:hidden;display:grid;place-content:center;text-align:center;color:#F3D9C4;border-left:8px solid rgba(0,0,0,.25)}
.cv::before{content:"";position:absolute;inset:16px;border:1px solid rgba(243,217,196,.5);border-radius:2px 10px 10px 2px}
.cv svg{width:90px;margin:0 auto 18px;stroke:#F3D9C4;fill:none;stroke-width:1.4}
.cv b{font:400 30px var(--s);letter-spacing:.14em;text-transform:uppercase;font-weight:400}.cv small{display:block;font:500 10px var(--h);letter-spacing:.4em;margin-top:6px}
.bkw.open .cv{transform:rotateY(-168deg)}
@media(max-width:860px){.ps{grid-template-columns:1fr}}
/* planner */
.pl{max-width:1200px;margin:auto;background:var(--sd);padding:clamp(28px,5vw,70px)}
.ct{display:grid;grid-template-columns:repeat(3,1fr);gap:30px;margin-bottom:46px}
.ct label{display:block;font:500 12px var(--h);letter-spacing:.2em;text-transform:uppercase;color:var(--tc2);margin-bottom:10px}
.ct select{width:100%;padding:13px;background:var(--cr);border:1px solid var(--um);border-radius:0;font:400 16px var(--h);color:var(--um)}
.ct input{width:100%;accent-color:var(--tc)}.ct output{font:400 28px var(--s);display:block}
@media(max-width:800px){.ct{grid-template-columns:1fr}}
.tl{display:grid;grid-template-columns:repeat(12,1fr);border-top:1px solid var(--um)}
.mo{padding:16px 6px 20px;border-right:1px solid var(--ln);min-height:170px;position:relative}
.mo:last-child{border:0}
.mo b{font:500 11px var(--h);letter-spacing:.14em;text-transform:uppercase;color:var(--mu);display:block;margin-bottom:12px}
.mo i{display:block;font-style:normal;font-size:11.5px;line-height:1.25;background:var(--tc);color:#fff;padding:5px 6px;margin-bottom:5px}
.mo i.a{background:var(--um)}.mo i.b{background:var(--cl);color:var(--um)}.mo i.c{background:transparent;color:var(--tc2);border:1px solid var(--tc2)}
@media(max-width:860px){.tl{grid-template-columns:1fr 1fr}.mo{min-height:0;border-bottom:1px solid var(--ln)}}
.sm{display:flex;justify-content:space-between;align-items:end;gap:20px;flex-wrap:wrap;margin-top:34px}
.sm .tt{font:400 clamp(38px,5vw,64px)/1 var(--s);color:var(--tc2)}.sm small{display:block;color:var(--mu);font-size:13px;margin-top:4px}
/* konsierge */
.cn{max-width:1000px;margin:auto;display:grid;grid-template-columns:1fr 1fr;gap:0;border:1px solid var(--um)}
.cn>div{padding:clamp(26px,4vw,50px)}
.cn .l{background:var(--um);color:var(--cr)}.cn .l h2{font:400 clamp(34px,4vw,54px)/1.05 var(--s);margin:14px 0}.cn .l .ey{color:var(--cl)}.cn .l p{color:#CDB9A9;font-size:15.5px}
.cn .l ul{list-style:none;padding:0;margin:22px 0 0}.cn .l li{padding:10px 0;border-top:1px solid rgba(247,239,229,.2);font-size:15px}.cn .l li::before{content:"◆";color:var(--cl);font-size:9px;margin-right:12px;vertical-align:2px}
.cn label{display:block;font:500 11px var(--h);letter-spacing:.2em;text-transform:uppercase;color:var(--mu);margin:16px 0 4px}
.cn input,.cn select{width:100%;padding:11px 0;background:none;border:0;border-bottom:1px solid var(--um);font:400 16px var(--h);color:var(--um);outline:none;border-radius:0}
.cn input:focus,.cn select:focus{border-color:var(--tc)}
.sg{display:flex;border:1px solid var(--um);margin-top:6px}.sg button{flex:1;padding:12px;background:none;border:0;font:500 13px var(--h);cursor:pointer;color:var(--um)}.sg button[aria-pressed=true]{background:var(--tc);color:#fff}
#al{display:none}#al.on{display:block}
.cn .btn{margin-top:26px;width:100%;text-align:center}
@media(max-width:800px){.cn{grid-template-columns:1fr}}
.qs{display:grid;grid-template-columns:repeat(3,1fr);gap:50px;max-width:1200px;margin:auto;text-align:center}
.qs blockquote{margin:0;font:400 23px/1.35 var(--s)}.qs cite{display:block;margin-top:16px;font:500 11.5px var(--h);letter-spacing:.2em;text-transform:uppercase;color:var(--tc);font-style:normal}
@media(max-width:860px){.qs{grid-template-columns:1fr}}
footer{background:var(--um);color:#CDB9A9;padding:70px 4vw 36px;text-align:center}
footer .lg{color:var(--cr);font-size:44px}
footer .g{display:grid;grid-template-columns:repeat(3,1fr);gap:30px;max-width:900px;margin:40px auto 0;font-size:15px}footer .g b{display:block;font:500 11px var(--h);letter-spacing:.24em;text-transform:uppercase;color:var(--cl);margin-bottom:6px}
footer .cp{font-size:12.5px;opacity:.6;margin:40px auto 0;max-width:760px}
@media(max-width:760px){footer .g{grid-template-columns:1fr}}
/* chat */
#tb{position:fixed;left:0;top:50%;z-index:70;transform:translateY(-50%);writing-mode:vertical-rl;rotate:180deg;padding:22px 12px;background:var(--tc);color:#fff;border:0;font:500 12px var(--h);letter-spacing:.3em;text-transform:uppercase;cursor:pointer;transition:.3s}
#tb:hover{background:var(--um);padding-right:16px}
#chat{position:fixed;left:0;top:50%;z-index:80;width:min(380px,100vw);height:min(560px,80vh);background:var(--cr);border:1px solid var(--um);border-left:0;display:flex;flex-direction:column;transform:translate(-104%,-50%);transition:transform .6s cubic-bezier(.6,0,.2,1);box-shadow:20px 20px 60px rgba(43,26,20,.2)}
#chat.open{transform:translate(0,-50%)}
#chat header{padding:20px 24px;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid var(--ln)}
#chat header b{font:400 26px var(--s)}#chat header small{display:block;font:500 10px var(--h);letter-spacing:.3em;color:var(--tc);text-transform:uppercase}
#chat header button{background:none;border:0;font-size:26px;cursor:pointer;color:var(--um)}
#ms{flex:1;overflow-y:auto;padding:20px 24px;display:flex;flex-direction:column;gap:14px;font-size:15px}
.m{max-width:90%;line-height:1.55;animation:in .4s}@keyframes in{from{opacity:0;transform:translateY(8px)}}
.m.b{border-left:2px solid var(--tc);padding-left:14px}.m.u{align-self:flex-end;background:var(--um);color:var(--cr);padding:8px 16px;font-size:14px}
.cs{display:flex;flex-wrap:wrap;gap:8px;padding:0 24px 14px}.cs button{padding:6px 14px;background:none;border:1px solid var(--um);font:400 13px var(--h);cursor:pointer;color:var(--um)}.cs button:hover{background:var(--tc);color:#fff;border-color:var(--tc)}
#cf{display:flex;border-top:1px solid var(--um)}#cf input{flex:1;padding:16px 24px;background:none;border:0;font:400 15px var(--h);outline:none;min-width:0;color:var(--um)}#cf button{padding:0 22px;background:var(--um);color:var(--cr);border:0;cursor:pointer}
#wa{display:block;text-align:center;padding:11px;background:var(--tc2);color:#fff;font:500 12px var(--h);letter-spacing:.16em;text-transform:uppercase}
:focus-visible{outline:2px solid var(--tc);outline-offset:3px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}
</style>
</head>
<body>
<nav><div class="l"><a href="#layanan">Layanan</a><a href="#paspor">Paspor servis</a></div><a href="#top" class="lg">Maison Otto<small>Perawatan kendaraan</small></a><div class="r"><a href="#rencana">Rencana</a><a href="#jemput">Antar-jemput</a><a class="btn" href="#jemput">Reservasi</a></div><button type="button" id="maison-menu-button" aria-expanded="false" aria-controls="maison-menu" aria-label="Buka menu">☰</button></nav>
<div id="maison-menu" aria-label="Menu utama" aria-hidden="true"><a href="#layanan">Layanan</a><a href="#paspor">Paspor servis</a><a href="#rencana">Rencana</a><a href="#jemput">Antar-jemput</a><a href="#jemput">Reservasi</a></div>

<header class="hero" id="top"><span class="ey">Bengkel premium · Servis berkala · Antar-jemput</span>
<h1>Perawatan kendaraan yang dikerjakan dengan <em>ketelitian.</em></h1><p>Setiap mobil kami perlakukan seperti milik sendiri: diperiksa rinci, dijelaskan jujur, dan dikembalikan tepat waktu.</p>
<a class="btn f" href="#jemput">Reservasi servis</a>
<div class="pn" id="layanan"></div></header>

<section id="paspor"><div class="ps"><div><span class="ey">Paspor servis digital</span><h2>Seluruh riwayat kendaraanmu, dalam satu halaman.</h2><p>Masukkan nomor polisi untuk melihat riwayat servis, kilometer terakhir, dan jadwal perawatan berikutnya.</p>
<form id="pf"><input id="pi" placeholder="L 1234 AB" aria-label="Nomor polisi" autocomplete="off"><button>Buka →</button></form><small id="ph">Untuk demo, coba L 1234 AB atau N 5678 CD.</small></div>
<div class="bkw" id="bw"><div class="pg" id="pg"><h3>Belum dibuka</h3><p class="m">Riwayat akan tampil di sini.</p></div>
<div class="cv"><div><svg viewBox="0 0 100 60" aria-hidden="true"><path d="M8 42c0-8 6-11 16-13l14-4c6-9 16-14 30-14h4c10 2 16 8 22 16l4 1c4 1 6 4 6 8v8H8z"/><circle cx="30" cy="46" r="8"/><circle cx="76" cy="46" r="8"/></svg><b>Paspor</b><small>SERVIS KENDARAAN</small></div></div></div></div></section>

<section id="rencana" style="background:var(--sd);padding:0"><div style="padding:120px 4vw"><div class="hd"><div class="rule">◆</div><span class="ey">Rencana perawatan</span><h2>Dua belas bulan ke depan, sudah terpetakan.</h2><p>Atur profil kendaraan, kami gambarkan kapan sebaiknya servis dan berapa kira-kira biayanya.</p></div>
<div class="pl" style="background:var(--cr)"><div class="ct"><div><label for="pt">Jenis kendaraan</label><select id="pt"><option value="1">Hatchback atau city car</option><option value="1.1">Sedan</option><option value="1.15">MPV</option><option value="1.25">SUV</option></select></div><div><label for="pu">Usia kendaraan</label><select id="pu"><option value="0">Kurang dari 3 tahun</option><option value="1">3 sampai 6 tahun</option><option value="2">Lebih dari 6 tahun</option></select></div><div><label for="pk">Pemakaian per bulan</label><output id="po"></output><input type="range" id="pk" min="500" max="3000" step="250" value="1250"></div></div>
<div class="tl" id="tl"></div><div class="sm"><div><div class="tt" id="tt"></div><small>estimasi biaya perawatan 12 bulan</small></div><a class="btn f" id="pb" href="#" target="_blank" rel="noopener">Kirim rencana ke WhatsApp</a></div></div></div></section>

<section id="jemput"><div class="cn"><div class="l"><span class="ey">Layanan konsierge</span><h2>Kami jemput, kami kerjakan, kami antar kembali.</h2><p>Untuk kamu yang tidak sempat ke bengkel. Biaya jemput mengikuti jarak dan dikonfirmasi tim kami.</p><ul><li>Penjemputan oleh staf berseragam</li><li>Foto progres pengerjaan lewat WhatsApp</li><li>Kendaraan dikembalikan dalam keadaan bersih</li></ul></div>
<div><label for="cn_">Nama</label><input id="cn_" placeholder="Nama lengkap"><label for="cv_">Kendaraan</label><input id="cv_" placeholder="Contoh: Honda Civic 2019"><label for="cs_">Layanan</label><select id="cs_"></select>
<label>Cara servis</label><div class="sg" id="sg"><button type="button" aria-pressed="true" data-j="0">Antar sendiri</button><button type="button" aria-pressed="false" data-j="1">Jemput di alamat</button></div>
<div id="al"><label for="ca">Alamat jemput</label><input id="ca" placeholder="Alamat lengkap"></div>
<label for="cd">Tanggal</label><input id="cd" type="date"><label for="cj">Jam</label><select id="cj"><option>09.00 sampai 12.00</option><option>12.00 sampai 15.00</option><option>15.00 sampai 17.00</option></select>
<a class="btn f" id="cb" href="#" target="_blank" rel="noopener">Kirim reservasi ke WhatsApp</a></div></div></section>

<section style="padding-top:20px"><div class="qs"><blockquote>“Teknisinya menjelaskan setiap temuan dengan jujur.”<cite>Rizky · Honda Civic</cite></blockquote><blockquote>“Layanan jemputnya benar-benar menghemat waktu.”<cite>Dewi · Toyota Avanza</cite></blockquote><blockquote>“Riwayat servis jadi rapi dan mudah dicek.”<cite>Hendra · Suzuki Ertiga</cite></blockquote></div></section>

<footer><div class="lg">Maison Otto</div><div class="g"><div><b>Alamat</b>Alamat bengkel (ganti)</div><div><b>Jam buka</b>Senin sampai Sabtu, 08.00 sampai 17.00 (contoh)</div><div><b>Kontak</b>WhatsApp (ganti)</div></div><p class="cp">Template contoh. Harga, riwayat servis, dan data lainnya adalah contoh. Interval perawatan bersifat umum dan perlu disesuaikan dengan buku servis kendaraan, serta dikonfirmasi teknisi.</p></footer>

<button id="tb">Concierge</button>
<aside id="chat" role="dialog" aria-label="Concierge Maison Otto"><header><div><b>Concierge</b><small>Maison Otto</small></div><button id="x" aria-label="Tutup">×</button></header><div id="ms"></div><div class="cs" id="cs"></div><a id="wa" href="#" target="_blank" rel="noopener">Lanjut ke WhatsApp →</a><form id="cf"><input id="ci" placeholder="Tulis pertanyaan Anda…" autocomplete="off" aria-label="Pertanyaan"><button aria-label="Kirim">→</button></form></aside>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="Maison Otto";
const $=i=>document.getElementById(i),rp=n=>"Rp "+Math.round(n).toLocaleString("id-ID"),wl=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t);
const element=(tag,className,text)=>{const node=document.createElement(tag);if(className)node.className=className;if(text!==undefined)node.textContent=text;return node};
const menu=$("maison-menu"),menuButton=$("maison-menu-button");
function setMenu(open){menu.classList.toggle("open",open);menu.setAttribute("aria-hidden",String(!open));menuButton.setAttribute("aria-expanded",String(open));menuButton.textContent=open?"✕":"☰"}
menuButton.onclick=()=>setMenu(!menu.classList.contains("open"));
menu.querySelectorAll("a").forEach(link=>link.onclick=()=>setMenu(false));
addEventListener("keydown",event=>{if(event.key==="Escape")setMenu(false)});
/* panel layanan */
const IC=['<path d="M32 6C20 22 14 30 14 40a18 18 0 0 0 36 0C50 30 44 22 32 6z"/><path d="M24 42a8 8 0 0 0 8 8"/>','<circle cx="32" cy="32" r="24"/><circle cx="32" cy="32" r="7"/><path d="M32 8v10M32 46v10M8 32h10M46 32h10"/>','<path d="M32 6v52M10 19l44 26M10 45l44-26"/><path d="M26 10l6 6 6-6M26 54l6-6 6 6"/>','<circle cx="32" cy="32" r="25"/><circle cx="32" cy="32" r="14"/><path d="M32 7v11M32 46v11M7 32h11M46 32h11"/>'];
const PN=[["Servis berkala","Oli, filter, dan pemeriksaan menyeluruh sesuai kilometer kendaraanmu.","mulai Rp 450.000","#B85C38"],["Rem dan suspensi","Kampas, piringan, minyak rem, dan kenyamanan berkendara yang dipulihkan.","mulai Rp 600.000","#9C4A2C"],["AC dan kelistrikan","Freon, filter kabin, aki, dan sistem pengisian diperiksa dengan alat ukur.","mulai Rp 550.000","#C97B56"],["Ban dan kaki-kaki","Rotasi, balancing, dan spooring agar kendaraan stabil dan ban awet.","mulai Rp 400.000","#7E3A20"]];
layanan.replaceChildren(...PN.map((p,i)=>{const button=element("button","p"+(i?"":" on"));button.style.setProperty("--bg",p[3]);button.dataset.i=String(i);const svg=document.createElementNS("http://www.w3.org/2000/svg","svg");svg.setAttribute("viewBox","0 0 64 64");svg.setAttribute("aria-hidden","true");const shape=document.createElementNS("http://www.w3.org/2000/svg","circle");shape.setAttribute("cx","32");shape.setAttribute("cy","32");shape.setAttribute("r","22");svg.append(shape);const detail=element("div","d");detail.append(element("h3","",p[0]),element("p","",p[1]),element("b","",p[2]));button.append(svg,element("span","t",p[0]),detail);return button}));
const pp=()=>[...layanan.children];
layanan.onmouseover=e=>{const b=e.target.closest(".p");if(b&&matchMedia("(hover:hover)").matches)on(b)};
layanan.onclick=e=>{const b=e.target.closest(".p");if(b)on(b)};
function on(b){pp().forEach(x=>x.classList.toggle("on",x===b))}
/* paspor */
const RC={"L1234AB":{c:"Toyota Avanza 2018",k:"58.200 km",n:"Servis besar sekitar 60.000 km",r:[["12 Agu 2026","Servis berkala 55.000 km","Rp 1.250.000"],["03 Mar 2026","Servis AC dan filter kabin","Rp 550.000"],["10 Nov 2025","Ganti oli dan filter","Rp 450.000"]]},
"N5678CD":{c:"Honda Civic 2019",k:"41.800 km",n:"Servis sedang sekitar 50.000 km",r:[["21 Sep 2026","Spooring dan balancing","Rp 400.000"],["14 Mei 2026","Servis berkala 40.000 km","Rp 1.900.000"]]}};
pf.onsubmit=e=>{e.preventDefault();const k=pi.value.replace(/\s/g,"").toUpperCase(),d=RC[k];
if(d){const meters=element("div","m");meters.append(document.createTextNode(`Kilometer terakhir ${d.k}`),document.createElement("br"),document.createTextNode(`Berikutnya: ${d.n}`));const rows=d.r.map(r=>{const row=element("div","rc");row.append(element("span","",r[0]),element("b","",r[1]),element("em","",r[2]));return row});pg.replaceChildren(element("h3","",d.c),meters,...rows);bw.classList.add("open");ph.textContent="Riwayat ditemukan (data contoh)."}
else{bw.classList.remove("open");pg.replaceChildren(element("h3","","Tidak ditemukan"),element("p","m","Periksa nomor polisi atau hubungi kami."));ph.replaceChildren(document.createTextNode("Tidak ditemukan. "),Object.assign(element("a","", "Tanya lewat WhatsApp"),{href:wl(`Halo ${BRAND}, saya ingin menanyakan riwayat servis kendaraan saya.`),target:"_blank",rel:"noopener"}));ph.lastElementChild.style.color="var(--tc)";ph.lastElementChild.style.textDecoration="underline";ph.append(document.createTextNode("."))}};
/* rencana */
const MN=["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"];
function plan(){const km=+pk.value,tp=+pt.value,ag=+pu.value;po.textContent=km.toLocaleString("id-ID")+" km";
const oil=Math.max(2,Math.min(6,Math.round(5000/km))),big=Math.max(3,Math.min(12,Math.round(10000/km)));let tot=0;const sn=new Date().getMonth(),timelineNodes=[];
for(let m=1;m<=12;m++){const ev=[];
if(m%big===0)ev.push(["Servis berkala",850000,"a"]);else if(m%oil===0)ev.push(["Ganti oli",350000,""]);
if(m%6===0)ev.push(["Cek rem",150000,"b"]);if(m===3||m===9)ev.push(["Rotasi ban",250000,"c"]);if(m===8)ev.push(["Servis AC",550000,"b"]);
if(ag===2&&m===6)ev.push(["Cek suspensi",400000,"a"]);if(ag===2&&m===3)ev.push(["Cek aki",150000,"c"]);if(ag===1&&m===12)ev.push(["Cek aki",150000,"c"]);
ev.forEach(e=>tot+=e[1]*tp);const month=element("div","mo");month.append(element("b","",MN[(sn+m)%12]));ev.forEach(e=>month.append(element("i",e[2],e[0])));timelineNodes.push(month)}
tl.replaceChildren(...timelineNodes);tt.textContent=rp(tot);
const T=pt.options[pt.selectedIndex].text,A=pu.options[pu.selectedIndex].text;
pb.href=wl(`Halo ${BRAND}, saya ingin rencana perawatan 12 bulan untuk ${T}, usia ${A}, pemakaian ${km} km/bulan. Estimasi ${rp(tot)}. Mohon masukan teknisi.`)}
[pt,pu,pk].forEach(e=>e.oninput=plan);plan();
/* konsierge */
["Servis berkala","Ganti oli","Servis rem","Servis AC","Spooring dan balancing","Aki dan kelistrikan","Scan diagnostik","Konsultasi dulu"].forEach(s=>cs_.add(new Option(s)));
let J=0;const dt=new Date();dt.setDate(dt.getDate()+1);cd.min=dt.toISOString().slice(0,10);
sg.onclick=e=>{const b=e.target.closest("button");if(b){J=+b.dataset.j;sg.querySelectorAll("button").forEach(x=>x.setAttribute("aria-pressed",+x.dataset.j===J));al.classList.toggle("on",J===1);cw()}};
function cw(){const d=cd.value?new Date(cd.value+"T00:00").toLocaleDateString("id-ID",{weekday:"long",day:"numeric",month:"long"}):"(belum dipilih)";
cb.href=wl(`Halo ${BRAND}, saya ${cn_.value||"calon pelanggan"} dengan kendaraan ${cv_.value||"(belum diisi)"}. Saya ingin ${cs_.value}. ${J?"Mohon dijemput di: "+(ca.value||"(alamat belum diisi)"):"Saya akan datang sendiri"}. Jadwal: ${d}, ${cj.value}. Mohon konfirmasi.`)}
[cn_,cv_,cs_,ca,cd,cj].forEach(e=>e.oninput=cw);cw();
/* chat */
const KB=[
[/harga|biaya|berapa|tarif/,()=>"Servis mulai "+rp(450000)+", rem "+rp(600000)+", AC "+rp(550000)+", spooring dan balancing "+rp(400000)+". Harga final setelah pemeriksaan.",["Antar-jemput","Rencana perawatan"]],
[/jemput|antar|konsierge|concierge/,()=>"Kami menyediakan layanan jemput dan antar kembali. Pilih Jemput di alamat pada bagian Antar-jemput. Biaya mengikuti jarak dan dikonfirmasi tim.",["Harga","Lanjut ke WhatsApp"]],
[/paspor|riwayat|history|plat|nopol/,()=>"Masukkan nomor polisi di bagian Paspor servis untuk melihat riwayat. Saat ini data demo, dan nanti diganti dengan data bengkel Anda.",["Rencana perawatan"]],
[/rencana|jadwal servis|kapan servis|berkala|km/,()=>"Atur profil kendaraan di bagian Rencana perawatan, nanti terlihat kapan sebaiknya servis dalam 12 bulan. Untuk jadwal resmi, ikuti buku servis kendaraanmu.",["Harga","Antar-jemput"]],
[/rem|blong|asap|gosong|darurat/,()=>"Jika rem terasa blong atau ada asap dan bau gosong, hentikan kendaraan di tempat aman dan jangan dilanjutkan. Hubungi kami atau layanan derek.",["Lanjut ke WhatsApp"]],
[/jam|buka|lokasi|alamat/,()=>"Jam buka dan alamat ada di bagian bawah halaman, dan akan diganti sesuai data bengkel.",["Antar-jemput"]],
[/garansi|klaim/,()=>"Ketentuan garansi berbeda tiap jenis pekerjaan, dan akan dijelaskan sebelum Anda menyetujui pengerjaan.",["Lanjut ke WhatsApp"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Selamat datang di Maison Otto. Ada yang bisa kami bantu?",["Harga","Antar-jemput","Rencana perawatan"]]];
const lg=[];function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;ms.append(d);ms.scrollTop=1e9;if(c==="u")lg.push(t)}
function chips(a){$("cs").replaceChildren(...a.map(v=>{const button=element("button","",v);button.onclick=()=>ask(v);return button}))}
function waU(){wa.href=wl(`Halo ${BRAND}, saya menghubungi dari website.`+(lg.length?` Pertanyaan saya: ${lg.join("; ")}.`:" Saya ingin konsultasi."))}
function ask(t){say(t,"u");if(/whatsapp|\bwa\b|admin|manusia|teknisi/i.test(t)){setTimeout(()=>{say("Baik, silakan klik tombol WhatsApp di bawah. Pertanyaan Anda ikut terkirim.","b");waU()},300);return}
const m=KB.find(([r])=>r.test(t.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab teknisi kami. Klik WhatsApp di bawah, pertanyaan Anda ikut terkirim.","b");chips(["Harga","Antar-jemput","Rencana perawatan"])}waU()},350)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let fi=true;function tg(){chat.classList.toggle("open");if(chat.classList.contains("open")&&fi){fi=false;say("Selamat datang di Maison Otto. Saya concierge virtual, siap membantu soal layanan, harga, dan reservasi. Saya tidak memberi diagnosis pasti.","b");chips(["Harga","Antar-jemput","Rencana perawatan"]);waU()}}
tb.onclick=tg;x.onclick=tg;
</script>
</body>
</html>

@endverbatim
