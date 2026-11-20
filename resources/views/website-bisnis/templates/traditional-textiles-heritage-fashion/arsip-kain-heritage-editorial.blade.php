@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Arsip Kain – Layanan Konservasi Tekstil Warisan</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,700;0,900;1,400;1,700&family=Source+Serif+4:ital,wght@0,300;0,400;0,600;1,400&family=Cutive+Mono&display=swap" rel="stylesheet">
<style>
:root{--pa:#FBF6F0;--pk:#F4D3DB;--pk2:#FAE8EC;--ch:#A63D5C;--ch2:#7A2540;--br:#4A2A2F;--ink:#2B1D20;--mu:#7D6A6E;--ru:#D9C6C9;--d:'Playfair Display',Georgia,serif;--s:'Source Serif 4',Georgia,serif;--m:'Cutive Mono',ui-monospace,monospace;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth}
body{margin:0;background:var(--pa);color:var(--ink);font:400 18px/1.7 var(--s);overflow-x:hidden}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
.w{max-width:1180px;margin:auto;padding:0 28px}
.kk{font:400 13px var(--m);letter-spacing:.14em;text-transform:uppercase;color:var(--ch)}
.btn{display:inline-block;padding:14px 28px;background:var(--ch2);color:#fff;border:1px solid var(--ch2);font:600 14px var(--s);letter-spacing:.1em;text-transform:uppercase;cursor:pointer;transition:.3s}
.btn:hover,.btn:focus-visible{background:var(--ch);border-color:var(--ch);outline:none}
.btn.o{background:transparent;color:var(--ch2)}.btn.o:hover{background:var(--ch2);color:#fff}
.ul{border-bottom:1px solid var(--ch);color:var(--ch2);font-weight:600;padding-bottom:1px;cursor:pointer;background:none;border-top:0;border-left:0;border-right:0;font-family:inherit;font-size:inherit}.ul:hover{background:var(--pk)}
header.n{position:sticky;top:env(safe-area-inset-top,0px);z-index:60;background:rgba(251,246,240,.95);backdrop-filter:blur(8px);border-bottom:3px double var(--br)}
header.n .w{display:flex;align-items:center;justify-content:space-between;padding-top:14px;padding-bottom:14px;gap:20px}
.lg{font:900 22px var(--d);letter-spacing:.02em}.lg i{font-style:italic;font-weight:400;color:var(--ch)}
.nl{display:flex;gap:26px;font:400 13px var(--m);letter-spacing:.12em;text-transform:uppercase}.nl button{background:none;border:0;font:inherit;letter-spacing:inherit;text-transform:inherit;color:var(--br);cursor:pointer;padding:0}.nl button:hover{color:var(--ch)}
@media(max-width:700px){.nl{gap:14px}.nl button:nth-child(3){display:none}}
.view{display:none}.view.on{display:block;animation:fd .7s}@keyframes fd{from{opacity:0;transform:translateY(10px)}}
/* masthead */
.ms{text-align:center;padding:34px 0 16px;border-bottom:1px solid var(--br)}
.ms .t{display:flex;justify-content:space-between;font:400 12px var(--m);letter-spacing:.16em;text-transform:uppercase;color:var(--mu);padding-bottom:12px;border-bottom:1px solid var(--ru);gap:10px;flex-wrap:wrap}
.ms h1{font:900 clamp(54px,12vw,170px)/.9 var(--d);letter-spacing:-.02em;margin:22px 0 8px;color:var(--br)}
.ms p{font:italic 400 clamp(16px,2vw,22px) var(--d);color:var(--ch)}
/* hero */
.hero{position:relative;padding:50px 0 70px;overflow:hidden}
.hero .w{display:grid;grid-template-columns:1.5fr 1fr;gap:50px;align-items:start;position:relative}
.hero h2{font:900 clamp(34px,5vw,70px)/1.02 var(--d);letter-spacing:-.025em;margin:14px 0 22px}.hero h2 em{font-weight:400;color:var(--ch)}
.dk{font:italic 400 clamp(19px,2.2vw,25px)/1.45 var(--d);color:var(--br);max-width:620px;margin-bottom:12px}
.by{font:400 13px var(--m);letter-spacing:.1em;text-transform:uppercase;color:var(--mu);margin:20px 0 28px;padding-top:12px;border-top:1px solid var(--ru);max-width:620px}
.hc{display:flex;gap:14px;flex-wrap:wrap;align-items:center}
.fg{margin:0}.fg figcaption{font:italic 400 14px var(--s);color:var(--mu);margin-top:10px;padding-top:8px;border-top:1px solid var(--ru)}
.tx{position:relative;border:8px solid #fff;box-shadow:0 20px 40px -20px rgba(74,42,47,.5);aspect-ratio:300/380;background:#fff}
.tx>div{position:absolute;inset:0;transition:opacity 1.1s}.tx .a{opacity:0}.tx.on .a{opacity:1}.tx svg{width:100%;height:100%;display:block}
.tg{display:flex;gap:0;margin-top:12px;border:1px solid var(--br);width:fit-content}.tg button{padding:7px 18px;background:none;border:0;font:400 12.5px var(--m);letter-spacing:.1em;text-transform:uppercase;cursor:pointer;color:var(--br)}.tg button[aria-pressed=true]{background:var(--br);color:var(--pa)}
@media(max-width:860px){.hero .w{grid-template-columns:1fr}.fg{max-width:360px}}
.bl{position:absolute;right:-30px;top:-20px;width:min(46vw,460px);opacity:.9;pointer-events:none}
.pt{position:absolute;top:-30px;width:16px;height:12px;background:var(--pk);border-radius:70% 0 70% 0;opacity:.85;animation:fa linear infinite;pointer-events:none}
@keyframes fa{0%{transform:translate(0,-20px) rotate(0)}100%{transform:translate(-90px,620px) rotate(540deg);opacity:.2}}
.ix{border-block:3px double var(--br);margin:0}.ix .w{display:grid;grid-template-columns:repeat(4,1fr)}
.ix button{background:none;border:0;border-right:1px solid var(--ru);padding:22px 20px;text-align:left;font:inherit;color:inherit;cursor:pointer;transition:.3s}.ix button:last-child{border:0}.ix button:hover{background:var(--pk2)}
.ix b{font:900 36px/1 var(--d);color:var(--pk);-webkit-text-stroke:1px var(--ch);display:block}.ix span{font:600 15px var(--s)}.ix small{display:block;color:var(--mu);font-size:14px}
@media(max-width:760px){.ix .w{grid-template-columns:1fr 1fr}}
section.s{padding:90px 0 20px}
.sh{display:flex;justify-content:space-between;align-items:end;gap:20px;border-bottom:3px double var(--br);padding-bottom:16px;margin-bottom:36px;flex-wrap:wrap}
.sh h2{font:900 clamp(30px,4.4vw,58px)/1 var(--d);letter-spacing:-.02em}.sh h2 em{font-weight:400;color:var(--ch)}
.sv{border-top:1px solid var(--br)}.sv div{display:grid;grid-template-columns:70px 1fr 2fr auto;gap:20px;padding:24px 0;border-bottom:1px solid var(--ru);align-items:baseline}
.sv b{font:900 28px var(--d);color:var(--ch)}.sv h3{font:700 22px/1.15 var(--d)}.sv p{color:var(--mu);font-size:16.5px}.sv small{font:400 13px var(--m);color:var(--ch2);white-space:nowrap}
@media(max-width:760px){.sv div{grid-template-columns:44px 1fr;gap:8px 14px}.sv p,.sv small{grid-column:2}}
.kc{display:grid;grid-template-columns:1.4fr 1fr 1fr;gap:26px}
.kd{display:flex;flex-direction:column;gap:10px;background:none;border:0;text-align:left;font:inherit;color:inherit;cursor:pointer;padding:0}
.kd .tx{border-width:6px;transition:.4s}.kd:hover .tx{transform:translateY(-6px) rotate(-.6deg)}.kd:hover .tx .a{opacity:1}.kd:first-child{grid-row:span 2}
.kd small{font:400 12.5px var(--m);letter-spacing:.1em;text-transform:uppercase;color:var(--ch)}.kd h3{font:700 clamp(19px,2vw,26px)/1.15 var(--d)}.kd:first-child h3{font-size:clamp(24px,3vw,38px)}.kd p{font-size:15.5px;color:var(--mu)}.kd em{font:600 14px var(--s);font-style:normal;color:var(--ch2)}
@media(max-width:860px){.kc{grid-template-columns:1fr 1fr}.kd:first-child{grid-column:1/-1;grid-row:auto}}@media(max-width:520px){.kc{grid-template-columns:1fr}}
.qt{margin:90px 0 0;background:var(--pk);padding:70px 0;border-block:1px solid var(--br)}.qt blockquote{margin:0;max-width:900px;font:italic 400 clamp(26px,3.6vw,48px)/1.2 var(--d);color:var(--ch2);position:relative;padding-left:60px}.qt blockquote::before{content:"“";position:absolute;left:0;top:-14px;font:900 120px/1 var(--d);color:var(--ch)}.qt cite{display:block;margin-top:18px;font:400 13px var(--m);letter-spacing:.12em;text-transform:uppercase;font-style:normal;color:var(--br)}
.pg{display:grid;grid-template-columns:repeat(3,1fr);gap:0;border-top:1px solid var(--br)}
.pa{background:none;border:0;border-right:1px solid var(--ru);padding:30px 26px 30px 0;margin-right:26px;text-align:left;font:inherit;color:inherit;cursor:pointer}.pa:last-child{border:0;margin:0}
.pa small{font:400 12.5px var(--m);letter-spacing:.1em;text-transform:uppercase;color:var(--ch)}.pa h3{font:700 clamp(22px,2.4vw,30px)/1.12 var(--d);margin:10px 0 12px}.pa p{color:var(--mu);font-size:16px}.pa p::first-letter{font:900 50px/.8 var(--d);float:left;padding:6px 8px 0 0;color:var(--ch)}.pa em{display:block;margin-top:14px;font-style:normal;font-weight:600;color:var(--ch2);font-size:15px}.pa:hover h3{color:var(--ch)}
@media(max-width:860px){.pg{grid-template-columns:1fr}.pa{border:0;border-bottom:1px solid var(--ru);margin:0;padding:24px 0}}
.ct{text-align:center;padding:100px 0 60px}.ct h2{font:900 clamp(34px,5.4vw,76px)/1.02 var(--d);letter-spacing:-.025em;max-width:880px;margin:14px auto 30px}.ct h2 em{font-weight:400;color:var(--ch)}.ct .hc{justify-content:center}
footer{border-top:3px double var(--br);padding:34px 0 40px;font-size:14.5px;color:var(--mu)}footer .w{display:grid;grid-template-columns:1.4fr 1fr 1fr;gap:30px}footer b{font:400 12.5px var(--m);letter-spacing:.14em;text-transform:uppercase;color:var(--ch);display:block;margin-bottom:6px}footer .cp{grid-column:1/-1;font-size:12.5px;line-height:1.6;max-width:820px;border-top:1px solid var(--ru);padding-top:16px}footer button{display:block;background:none;border:0;font:inherit;color:inherit;cursor:pointer;padding:2px 0}footer button:hover{color:var(--ch)}
@media(max-width:700px){footer .w{grid-template-columns:1fr}}
/* subhalaman */
.ar{padding:50px 0 20px}.cr{font:400 13px var(--m);letter-spacing:.1em;text-transform:uppercase;color:var(--mu);margin-bottom:26px}.cr a{color:var(--ch);border-bottom:1px solid var(--ch)}
.ah{max-width:900px;border-bottom:3px double var(--br);padding-bottom:26px;margin-bottom:40px}.ah h1{font:900 clamp(34px,5.2vw,72px)/1.02 var(--d);letter-spacing:-.025em;margin:14px 0 18px}.ah .dk{margin:0}
.ag{display:grid;grid-template-columns:1fr 300px;gap:60px;align-items:start}.ag.f{grid-template-columns:1fr 360px}
@media(max-width:900px){.ag,.ag.f{grid-template-columns:1fr;gap:34px}}
.bd{max-width:720px}.bd h2{font:700 28px/1.15 var(--d);margin:40px 0 12px}.bd p{margin-bottom:18px}.bd>p:first-of-type::first-letter{font:900 82px/.8 var(--d);float:left;padding:8px 12px 0 0;color:var(--ch)}
.bd ul,.bd ol{padding-left:22px;margin:0 0 18px}.bd li{margin:8px 0}.bd li::marker{color:var(--ch)}
.sd{border-top:3px double var(--br);padding-top:18px;position:sticky;top:90px}.sd h3{font:400 13px var(--m);letter-spacing:.14em;text-transform:uppercase;color:var(--ch);margin-bottom:10px}.sd dl{margin:0 0 22px}.sd dt{font:400 12px var(--m);letter-spacing:.1em;text-transform:uppercase;color:var(--mu);margin-top:12px}.sd dd{margin:0;font:700 19px var(--d)}
.pn{display:flex;justify-content:space-between;gap:20px;margin-top:60px;padding-top:24px;border-top:1px solid var(--br);flex-wrap:wrap}
.fm label{display:block;font:400 12.5px var(--m);letter-spacing:.12em;text-transform:uppercase;color:var(--ch);margin:24px 0 6px}.fm label:first-child{margin-top:0}
.fm select,.fm input[type=text],.fm input[type=date],.fm textarea{width:100%;padding:11px 0;border:0;border-bottom:1px solid var(--br);background:none;font:400 18px var(--s);color:var(--ink);outline:none;border-radius:0}.fm select option{background:var(--pa)}
.fm select:focus,.fm input:focus,.fm textarea:focus{border-color:var(--ch);background:var(--pk2)}
.ck{display:flex;gap:12px;align-items:center;padding:9px 0;border-bottom:1px solid var(--ru);cursor:pointer;font-size:17px;text-transform:none;letter-spacing:0;font-family:var(--s);color:var(--ink);margin:0!important}.ck input{width:18px;height:18px;accent-color:var(--ch)}
.rs{background:#fff;border:1px solid var(--br);padding:28px;position:sticky;top:90px;box-shadow:8px 8px 0 var(--pk)}
.rs .lv{display:inline-block;font:700 15px var(--d);padding:4px 16px;border:1.5px solid var(--c);color:var(--c);margin:8px 0 14px}
.rs h3{font:900 24px/1.1 var(--d);margin:4px 0 8px}.rs ul{padding-left:20px;margin:8px 0 16px;font-size:16px}.rs li{margin:6px 0}.rs .no{background:var(--pk2);padding:12px 14px;font-size:15px;margin:14px 0}.rs dl{display:grid;grid-template-columns:auto 1fr;gap:6px 14px;font-size:15.5px;margin:0 0 14px}.rs dt{color:var(--mu)}.rs dd{margin:0;text-align:right;font-weight:600}.rs small{display:block;color:var(--mu);font-size:13px;line-height:1.5;margin-top:12px}
@media(max-width:900px){.sd,.rs{position:static}}
.st{counter-reset:s;list-style:none;padding:0}.st li{counter-increment:s;padding:16px 0 16px 56px;border-top:1px solid var(--ru);position:relative}.st li::before{content:counter(s);position:absolute;left:0;top:12px;font:900 30px var(--d);color:var(--pk);-webkit-text-stroke:1px var(--ch)}
/* chat */
#fab{position:fixed;right:22px;bottom:calc(22px + env(safe-area-inset-bottom,0px));z-index:80;padding:12px 22px;background:#fff;border:1px solid var(--br);box-shadow:4px 4px 0 var(--pk);font:400 14px var(--m);letter-spacing:.06em;cursor:pointer;color:var(--br);transform:rotate(-1deg);transition:.25s}#fab:hover{transform:rotate(0) translateY(-2px);background:var(--pk2)}
#cp{position:fixed;right:22px;bottom:calc(84px + env(safe-area-inset-bottom,0px));z-index:80;width:min(370px,calc(100vw - 44px));height:min(500px,70vh);background:#FFFDF9;border:1px solid var(--br);box-shadow:10px 10px 0 var(--pk),0 30px 60px rgba(74,42,47,.25);display:none;flex-direction:column;transform:rotate(-.5deg)}#cp.on{display:flex;animation:fd .4s}
#cp header{padding:14px 20px;border-bottom:3px double var(--br);display:flex;justify-content:space-between;align-items:center}#cp header b{font:900 18px var(--d)}#cp header small{display:block;font:400 11.5px var(--m);letter-spacing:.1em;color:var(--ch);text-transform:uppercase}#cp header button{background:none;border:0;font-size:22px;cursor:pointer;color:var(--br)}
#ms{flex:1;overflow-y:auto;padding:12px 20px;font:400 14.5px/28px var(--m);background:repeating-linear-gradient(transparent 0 27px,var(--ru) 27px 28px)}
.m{animation:fd .4s;margin-bottom:6px}.m.b::before{content:"Konservator: ";color:var(--ch)}.m.u::before{content:"Anda: ";color:var(--mu)}.m.u{color:var(--br)}
.cs{display:flex;flex-wrap:wrap;gap:6px 14px;padding:10px 20px 0}.cs button{background:none;border:0;border-bottom:1px solid var(--ch);font:400 13px var(--m);color:var(--ch2);cursor:pointer;padding:0}.cs button:hover{background:var(--pk)}
#cf{display:flex;border-top:1px solid var(--br);margin-top:10px}#cf input{flex:1;padding:14px 20px;border:0;background:none;font:400 14.5px var(--m);outline:none;min-width:0}#cf button{padding:0 18px;background:var(--br);color:#fff;border:0;cursor:pointer}
#cw{display:block;text-align:center;padding:10px;background:#1FA855;color:#fff;font:600 13px var(--s)}
:focus-visible{outline:2px solid var(--ch);outline-offset:3px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}.pt{display:none}}
</style>
</head>
<body>
<header class="n"><div class="w"><a class="lg" href="#beranda">Arsip <i>Kain</i></a><div class="nl"><button data-s="layanan">Layanan</button><button data-s="kasus">Kasus</button><button data-s="panduan">Panduan</button><button data-s="kontak">Kontak</button></div></div></header>

<main>
<div class="view" id="v-beranda">
<div class="w"><div class="ms"><div class="t"><span id="ed"></span><span>Vol. I · No. 1</span><span>Konservasi tekstil warisan</span></div><h1>Arsip Kain</h1><p>Merawat ingatan yang tertenun</p></div></div>
<section class="hero"><svg class="bl" viewBox="0 0 420 300" fill="none" aria-hidden="true"><path d="M420 20C330 40 270 70 200 110S80 170 10 270" stroke="#4A2A2F" stroke-width="5" stroke-linecap="round"/><path d="M300 56C280 90 260 100 226 108M180 126C170 160 150 176 120 190M120 190C100 200 80 210 70 236" stroke="#4A2A2F" stroke-width="3" stroke-linecap="round"/><g id="bs"></g></svg><span id="ptl"></span>
<div class="w"><div><span class="kk">Konservasi · Warisan tekstil</span><h2>Setiap helai kain menyimpan ingatan yang <em>layak dirawat.</em></h2><p class="dk">Batik, songket, tenun, dan kebaya warisan keluarga ditangani dengan teliti oleh konservator, dengan prinsip sentuhan seminimal mungkin dan dapat dikembalikan.</p><div class="by">Oleh tim konservator Arsip Kain</div><div class="hc"><a class="btn" href="#kondisi">Periksa kondisi kain</a><a class="ul" href="#titip">Ajukan penerimaan koleksi →</a></div></div>
<figure class="fg"><div class="tx auto" id="hx"></div><div class="tg" id="tg"><button aria-pressed="true" data-i="0">Sebelum</button><button aria-pressed="false" data-i="1">Sesudah</button></div><figcaption>Gbr. 1. Kain panjang batik sebelum dan sesudah penanganan (ilustrasi).</figcaption></figure></div></section>
<div class="ix"><div class="w"><button data-s="layanan"><b>01</b><span>Layanan</span><small>Apa yang kami kerjakan</small></button><button data-s="kasus"><b>02</b><span>Kasus</span><small>Dari meja konservasi</small></button><button data-s="panduan"><b>03</b><span>Panduan</span><small>Merawat di rumah</small></button><button data-hash="kondisi"><b>04</b><span>Cek kondisi</span><small>Penilaian awal</small></button></div></div>
<section class="s" id="layanan"><div class="w"><div class="sh"><h2>Yang kami <em>kerjakan.</em></h2><span class="kk">Lima layanan</span></div><div class="sv" id="sv"></div></div></section>
<section class="s" id="kasus"><div class="w"><div class="sh"><h2>Dari meja <em>konservasi.</em></h2><span class="kk">Empat berkas kasus</span></div><div class="kc" id="kc"></div></div></section>
<div class="qt"><div class="w"><blockquote>Tugas kami bukan membuat kain tampak baru, melainkan membuatnya mampu bertahan satu generasi lagi.<cite>Prinsip kerja kami</cite></blockquote></div></div>
<section class="s" id="panduan"><div class="w"><div class="sh"><h2>Panduan <em>merawat.</em></h2><span class="kk">Tiga tulisan</span></div><div class="pg" id="pg"></div></div></section>
<section class="ct" id="kontak"><div class="w"><span class="kk">Mulai dari satu pertanyaan</span><h2>Bawa kainmu, kami <em>baca</em> kondisinya.</h2><div class="hc"><a class="btn" href="#titip">Ajukan penerimaan koleksi</a><a class="btn o" href="#kondisi">Periksa kondisi dulu</a></div></div></section>
</div>
<div class="view" id="v-sub"></div>
</main>
<footer><div class="w"><div><b>Arsip Kain</b>Layanan konservasi tekstil warisan. Template contoh, ganti seluruh isi dengan data studio Anda.</div><div><b>Studio</b>Alamat studio (ganti)<br>Selasa sampai Sabtu, 09.00 sampai 16.00 (contoh)<br>WhatsApp (ganti)</div><div><b>Halaman</b><button data-hash="kondisi">Cek kondisi kain</button><button data-hash="titip">Penerimaan koleksi</button></div><p class="cp">Seluruh kasus, harga, durasi, dan data adalah contoh. Penilaian daring bersifat awal dan bukan pengganti pemeriksaan fisik oleh konservator. Biaya dan rencana penanganan ditetapkan setelah pemeriksaan langsung dan persetujuan pemilik.</p></div></footer>
<button id="fab">✎ Tanya konservator</button>
<aside id="cp" role="dialog" aria-label="Tanya konservator"><header><div><b>Surat Pembaca</b><small>Tanya konservator</small></div><button id="x" aria-label="Tutup">×</button></header><div id="ms2"></div><div class="cs" id="cs"></div><form id="cf"><input id="ci" placeholder="Tulis pertanyaan Anda…" autocomplete="off" aria-label="Pertanyaan"><button aria-label="Kirim">→</button></form><a id="cw" href="#" target="_blank" rel="noopener">Lanjutkan ke WhatsApp →</a></aside>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="Arsip Kain";
function replaceMarkup(el,markup){const range=document.createRange();range.selectNodeContents(el);range.deleteContents();el.append(range.createContextualFragment(markup))}
const $=i=>document.getElementById(i),wl=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t);
/* dekorasi */
$("ed").textContent="Edisi "+new Date().toLocaleDateString("id-ID",{month:"long",year:"numeric"});
let bs="";[[300,56],[226,108],[120,190],[70,236],[350,36],[170,128]].forEach(([x,y],i)=>{bs+=`<g transform="translate(${x} ${y}) rotate(${i*40})">${[0,72,144,216,288].map(a=>`<ellipse cx="0" cy="-9" rx="6.5" ry="10" transform="rotate(${a})" fill="#F4D3DB" stroke="#A63D5C" stroke-width="1"/>`).join("")}<circle r="3" fill="#A63D5C"/></g>`});replaceMarkup($("bs"),bs);
replaceMarkup($("ptl"),[...Array(9)].map((_,i)=>`<i class="pt" style="left:${8+i*10}%;animation-duration:${9+i%4*3}s;animation-delay:${-i*1.7}s"></i>`).join(""));
/* kain */
let uid=0;const PAL=[["#EBD9B9","#7A4A2B","#26345A","#26345A","kawung"],["#6E1F2F","#C8A24A","#C8A24A","#3A0F18","diamond"],["#F2EBE0","#B9A68E","#D9CBB5","#8C7A64","kawung"],["#26345A","#E9E1CE","#E9E1CE","#141C34","chevron"]];
function textile(p,st){const [bg,fg,ac,ed,k]=PAL[p],id="t"+uid++,b=st==="b",P=k==="kawung"?`<g fill="none" stroke="${fg}" stroke-width="2.4"><circle cx="0" cy="0" r="24"/><circle cx="60" cy="0" r="24"/><circle cx="0" cy="60" r="24"/><circle cx="60" cy="60" r="24"/></g><circle cx="30" cy="30" r="11" fill="${ac}"/>`:k==="diamond"?`<path d="M30 4L56 30L30 56L4 30Z" fill="none" stroke="${fg}" stroke-width="2.4"/><path d="M30 17L43 30L30 43L17 30Z" fill="${ac}"/><circle cx="0" cy="0" r="3" fill="${fg}"/><circle cx="60" cy="60" r="3" fill="${fg}"/>`:`<path d="M0 20L15 8L30 20L45 8L60 20M0 44L15 32L30 44L45 32L60 44" fill="none" stroke="${fg}" stroke-width="5"/>`;
let s=`<svg viewBox="0 0 300 380" preserveAspectRatio="xMidYMid slice" aria-hidden="true"><defs><pattern id="${id}" width="60" height="60" patternUnits="userSpaceOnUse">${P}</pattern></defs><rect width="300" height="380" fill="${bg}"/><rect width="300" height="380" fill="url(#${id})" opacity="${b?.5:1}"/><rect width="300" height="34" fill="${ed}"/><rect y="346" width="300" height="34" fill="${ed}"/><path d="M0 34H300M0 346H300" stroke="${fg}" stroke-width="2"/>`;
if(b){s+=`<rect width="300" height="380" fill="#B88A3E" opacity=".22"/><g fill="#6B3A1E"><ellipse cx="90" cy="120" rx="46" ry="30" opacity=".32"/><ellipse cx="210" cy="250" rx="36" ry="48" opacity=".28"/><ellipse cx="220" cy="90" rx="22" ry="16" opacity=".3"/></g><g fill="#5F6E56" opacity=".55"><circle cx="60" cy="260" r="7"/><circle cx="76" cy="272" r="4"/><circle cx="48" cy="276" r="5"/><circle cx="130" cy="300" r="4"/></g><path d="M300 150L262 160L276 178L250 190L268 206L236 214L300 230Z" fill="#FBF6F0"/><path d="M262 160L276 178L250 190L268 206L236 214" stroke="#6B3A1E" stroke-width="1.4" fill="none" opacity=".6"/><path d="M0 200q30 8 40-4M20 260q20-14 44-6" stroke="${fg}" stroke-width="1.2" fill="none"/>`}
return s+"</svg>"}
const tx=(p,cls)=>`<div class="tx ${cls||""}"><div class="b">${textile(p,"b")}</div><div class="a">${textile(p,"a")}</div></div>`;
replaceMarkup(hx,`<div class="b">${textile(0,"b")}</div><div class="a">${textile(0,"a")}</div>`);
let hv=0,ht;const setH=v=>{hv=v;hx.classList.toggle("on",!!v);tg.querySelectorAll("button").forEach((b,i)=>b.setAttribute("aria-pressed",i===v))};
tg.onclick=e=>{const b=e.target.closest("button");if(b){clearInterval(ht);setH(+b.dataset.i)}};ht=setInterval(()=>setH(hv?0:1),4200);
/* data */
const SV=[["Penilaian dan dokumentasi","Pemeriksaan kondisi, pencatatan, dan foto sebelum penanganan apa pun.","mulai Rp 250.000"],["Pembersihan","Pembersihan kering atau basah terkontrol sesuai jenis serat dan pewarna.","mulai Rp 400.000"],["Stabilisasi dan perbaikan","Penguatan area robek atau rapuh dengan jahitan dan kain pendukung konservasi.","mulai Rp 600.000"],["Penyimpanan dan pembingkaian arsip","Kemasan dan pembingkaian bahan bebas asam untuk penyimpanan jangka panjang.","mulai Rp 500.000"],["Konsultasi koleksi","Pendampingan kolektor, keluarga, dan museum kecil dalam merawat koleksi.","sesuai kebutuhan"]];
replaceMarkup(sv,SV.map((s,i)=>`<div><b>0${i+1}</b><h3>${s[0]}</h3><p>${s[1]}</p><small>${s[2]} (contoh)</small></div>`).join(""));
const KS=[
{n:"Kain panjang batik pesisir dengan noda karat",j:"Batik tulis",p:0,y:"2025",d:"5 minggu",l:"Kain warisan keluarga disimpan puluhan tahun di lemari berkait logam.",kd:["Noda cokelat karat di dua area","Warna soga memudar tidak merata","Lipatan tajam di tengah"],tn:["Dokumentasi dan uji kestabilan warna","Pembersihan basah terkontrol per area","Pengeringan datar dan pelurusan lipatan","Penyimpanan digulung dengan kertas bebas asam"],h:"Noda karat berkurang signifikan tanpa mengubah warna dasar. Kain kini disimpan digulung, bukan dilipat."},
{n:"Songket pernikahan dengan benang emas longgar",j:"Songket",p:1,y:"2025",d:"7 minggu",l:"Songket dipakai tiga generasi pada upacara pernikahan keluarga.",kd:["Benang logam longgar dan menggulung","Bagian tepi mulai berumbai","Kusam akibat debu dan minyak tangan"],tn:["Pembersihan kering dengan penyedot mikro","Pengikatan benang logam yang longgar","Penguatan tepi dengan jahitan tipis","Pembungkus kain katun dan kemasan arsip"],h:"Motif benang emas kembali stabil dan siap dipajang. Tepi kain diperkuat tanpa mengubah tampilan aslinya."},
{n:"Kebaya renda warisan dengan jamur dan serat rapuh",j:"Kebaya renda",p:2,y:"2024",d:"10 minggu",l:"Kebaya disimpan dalam plastik tertutup di lemari lembap.",kd:["Bercak jamur pada bagian ketiak dan punggung","Serat renda rapuh","Bau apek dan menguning"],tn:["Isolasi dari koleksi lain dan pengeringan terkendali","Pembersihan jamur bertahap oleh konservator","Penyangga penuh pada area rapuh","Rekomendasi penyimpanan dengan boneka penyangga"],h:"Jamur tidak aktif dan serat rapuh tersangga. Kebaya disimpan tanpa plastik, dengan kertas bebas asam."},
{n:"Tenun ikat koleksi museum kecil dengan bekas serangga",j:"Tenun ikat",p:3,y:"2025",d:"8 minggu",l:"Koleksi sebuah museum komunitas yang tersimpan di gudang terbuka.",kd:["Lubang-lubang kecil bekas serangga","Debu tebal dan serat kaku","Pewarna indigo sedikit luntur di tepi"],tn:["Karantina dan pemeriksaan keaktifan serangga","Pembersihan kering dengan penyedot mikro","Penambalan lubang dengan kain pendukung","Panduan penyimpanan dan pemantauan hama"],h:"Tidak ada aktivitas serangga lanjutan. Koleksi kini disimpan datar di kotak arsip dengan pemantauan berkala."}];
const PG=[
{n:"Menyimpan batik tanpa merusaknya",k:"Penyimpanan",lead:"Sebagian besar kerusakan kain warisan bukan terjadi karena dipakai, melainkan karena cara menyimpannya bertahun-tahun.",b:["Simpan datar jika memungkinkan. Bila harus digulung, gunakan gulungan berlapis kertas bebas asam dan gulung dengan sisi motif di luar.","Hindari kantong plastik. Plastik memerangkap kelembapan dan memicu jamur. Gunakan kain katun putih bersih atau kertas bebas asam sebagai pembungkus.","Jauhkan dari sinar matahari langsung dan lampu terang. Cahaya memudarkan pewarna dan melemahkan serat.","Jaga ruang simpan tetap kering dan stabil. Kelembapan sekitar 45 sampai 55 persen umumnya dianggap aman untuk tekstil.","Hindari kapur barus dan pewangi yang menempel langsung. Periksa kain secara berkala sambil memastikan tidak ada serangga."]},
{n:"Kain bernoda: apa yang jangan dilakukan",k:"Penanganan darurat",lead:"Naluri pertama saat melihat noda adalah menggosok atau mencuci. Pada kain warisan, itu sering menjadi kesalahan yang tidak bisa dibatalkan.",b:["Jangan menggosok. Gosokan mendorong noda lebih dalam dan merusak serat. Bila noda masih basah, tekan perlahan dengan kain putih bersih.","Jangan memakai pemutih, deterjen keras, atau pelarut rumah tangga. Pewarna alami dan serat tua sangat sensitif terhadap bahan kimia.","Jangan menyetrika atau menjemur kain bernoda di bawah matahari langsung. Panas dapat mengikat noda secara permanen.","Foto noda dari beberapa sisi, catat kapan dan bagaimana noda muncul, lalu hubungi konservator sebelum melakukan apa pun."]},
{n:"Tanda-tanda kain Anda perlu konservator",k:"Mengenali masalah",lead:"Tidak semua masalah terlihat jelas. Beberapa tanda kecil berikut menandakan bahwa kain sebaiknya diperiksa ahli.",b:["Warna memudar tidak merata, terutama pada bagian lipatan atau yang terkena cahaya.","Serat terasa kaku, getas, atau berderak saat disentuh pelan.","Bercak berwarna, bau apek, atau bintik kehijauan atau keabuan yang menandakan jamur.","Lubang-lubang kecil atau serbuk halus di sekitar kain yang menandakan serangga.","Benang logam, renda, atau payet yang mulai terlepas atau menggulung."]}];
replaceMarkup(kc,KS.map((c,i)=>`<button class="kd" data-i="${i}">${tx(c.p)}<small>${c.j} · ${c.y}</small><h3>${c.n}</h3><p>${c.l}</p><em>Baca berkas kasus →</em></button>`).join(""));
kc.onclick=e=>{const b=e.target.closest(".kd");if(b)location.hash="kasus-"+(+b.dataset.i+1)};
replaceMarkup(pg,PG.map((p,i)=>`<button class="pa" data-i="${i}"><small>${p.k}</small><h3>${p.n}</h3><p>${p.lead}</p><em>Baca selengkapnya →</em></button>`).join(""));
pg.onclick=e=>{const b=e.target.closest(".pa");if(b)location.hash="panduan-"+(+b.dataset.i+1)};
/* subhalaman */
const cr=(...a)=>`<div class="cr"><a href="#beranda">Beranda</a>${a.map(x=>" / "+x).join("")}</div>`;
function kasus(i){const c=KS[i],nx=(i+1)%4;return `<div class="w ar">${cr("Kasus",c.j)}<div class="ah"><span class="kk">${c.j} · ${c.y}</span><h1>${c.n}</h1><p class="dk">${c.l}</p></div>
<div class="ag f"><div class="bd"><p>${c.h}</p><h2>Kondisi awal</h2><ul>${c.kd.map(x=>`<li>${x}</li>`).join("")}</ul><h2>Tindakan konservasi</h2><ol>${c.tn.map(x=>`<li>${x}</li>`).join("")}</ol><p style="font-size:14px;color:var(--mu)">Kasus contoh untuk tampilan template. Ilustrasi bukan foto hasil kerja sebenarnya.</p></div>
<aside class="sd"><h3>Sebelum dan sesudah</h3><div class="tx" id="kx"><div class="b">${textile(c.p,"b")}</div><div class="a">${textile(c.p,"a")}</div></div><div class="tg" id="kt"><button aria-pressed="true" data-i="0">Sebelum</button><button aria-pressed="false" data-i="1">Sesudah</button></div><dl><dt>Jenis</dt><dd>${c.j}</dd><dt>Durasi penanganan</dt><dd>${c.d}</dd></dl><a class="btn" href="#kondisi">Periksa kain Anda</a></aside></div>
<div class="pn"><a class="ul" href="#beranda">← Beranda</a><a class="ul" href="#kasus-${nx+1}">${KS[nx].n} →</a></div></div>`}
function panduan(i){const p=PG[i],nx=(i+1)%3;return `<div class="w ar">${cr("Panduan",p.k)}<div class="ah"><span class="kk">${p.k}</span><h1>${p.n}</h1><p class="dk">${p.lead}</p></div><div class="ag"><div class="bd"><p>${p.lead}</p><h2>Yang perlu diingat</h2><ol class="st">${p.b.map(x=>`<li>${x}</li>`).join("")}</ol><p style="font-size:14px;color:var(--mu)">Panduan umum. Untuk kain yang sangat tua, rapuh, atau bernilai tinggi, konsultasikan dulu dengan konservator.</p></div><aside class="sd"><h3>Butuh penilaian?</h3><p style="font-size:16px;margin-bottom:16px">Gunakan alat penilaian awal untuk mengetahui apakah kain Anda perlu ditangani.</p><a class="btn" href="#kondisi">Periksa kondisi kain</a></aside></div>
<div class="pn"><a class="ul" href="#beranda">← Beranda</a><a class="ul" href="#panduan-${nx+1}">${PG[nx].n} →</a></div></div>`}
const TY=["Batik tulis atau cap","Songket","Tenun ikat","Kebaya renda atau brokat","Ulos atau tekstil adat","Tekstil antik lainnya"],AG=[["Kurang dari 25 tahun",0],["25 sampai 50 tahun",0],["50 sampai 100 tahun",1],["Lebih dari 100 tahun",2]],IS=[["Noda",1,"Noda diidentifikasi dulu sebelum dibersihkan, lalu ditangani bertahap dan diuji di area kecil."],["Robek atau berlubang",2,"Distabilkan dengan jahitan konservasi dan kain pendukung yang sesuai."],["Jamur atau bercak lembap",3,"Dipisahkan dari koleksi lain, dikeringkan terkendali, lalu dibersihkan oleh konservator."],["Warna luntur",2,"Kestabilan warna diuji sebelum perlakuan basah apa pun."],["Bekas serangga",3,"Dikarantina dan diperiksa untuk memastikan serangga tidak lagi aktif."],["Kaku atau rapuh",3,"Ditangani minimal dengan penyangga penuh. Jangan dilipat atau digulung ulang sendiri."],["Bau apek",1,"Biasanya terkait kelembapan atau penyimpanan, perlu dicari penyebabnya."]],SO=[["Lemari tertutup, kering",0,""],["Lemari kayu, cenderung lembap",2,"Pindahkan ke tempat yang lebih kering dan stabil."],["Dilipat lama dalam plastik",1,"Pindahkan dari plastik ke kertas bebas asam atau kain katun bersih."],["Digantung",1,"Hindari menggantung kain berat atau rapuh. Simpan datar."]];
let A={t:0,a:1,i:new Set(),s:0};
function kondisi(){return `<div class="w ar">${cr("Cek kondisi kain")}<div class="ah"><span class="kk">Penilaian awal</span><h1>Seberapa perlu kain Anda ditangani?</h1><p class="dk">Jawab beberapa pertanyaan. Hasilnya gambaran awal, bukan diagnosis.</p></div><div class="ag f"><div class="fm"><label for="at">Jenis kain</label><select id="at">${TY.map((x,i)=>`<option value="${i}">${x}</option>`).join("")}</select><label for="aa">Perkiraan usia</label><select id="aa">${AG.map((x,i)=>`<option value="${i}">${x[0]}</option>`).join("")}</select><label>Masalah yang terlihat</label>${IS.map((x,i)=>`<label class="ck"><input type="checkbox" data-i="${i}">${x[0]}</label>`).join("")}<label for="as">Cara menyimpan selama ini</label><select id="as">${SO.map((x,i)=>`<option value="${i}">${x[0]}</option>`).join("")}</select></div><div class="rs" id="rs"></div></div></div>`}
function acalc(){A.t=+$("at").value;A.a=+$("aa").value;A.s=+$("as").value;A.i=new Set([...document.querySelectorAll(".fm [data-i]:checked")].map(c=>+c.dataset.i));
let sc=AG[A.a][1]+SO[A.s][1];A.i.forEach(i=>sc+=IS[i][1]);const L=sc<=3?["Cenderung stabil","#2E7D5B","1 sampai 2 minggu","Rp 300.000 sampai 800.000"]:sc<=7?["Perlu perhatian","#B7791F","3 sampai 6 minggu","Rp 800.000 sampai 3.000.000"]:["Rentan","#A63D5C","2 sampai 4 bulan","Rp 3.000.000 sampai 12.000.000"];
const rec=[...A.i].map(i=>IS[i][2]);if(SO[A.s][2])rec.push(SO[A.s][2]);
replaceMarkup($("rs"),`<span class="kk">Hasil penilaian awal</span><div><span class="lv" style="--c:${L[1]}">${L[0]}</span></div><h3>${TY[A.t]}</h3><p style="color:var(--mu);font-size:15.5px">${AG[A.a][0]}${A.i.size?` · ${A.i.size} masalah dipilih`:" · belum ada masalah dipilih"}</p>${rec.length?`<h3 style="font-size:18px;margin-top:16px">Penanganan yang mungkin</h3><ul>${rec.map(r=>`<li>${r}</li>`).join("")}</ul>`:""}<div class="no"><b>Sebelum konsultasi, hindari:</b> mencuci sendiri, menyetrika, memakai pemutih atau pewangi, dan menjemur di bawah matahari langsung.</div><dl><dt>Perkiraan durasi</dt><dd>${L[2]}</dd><dt>Kisaran biaya awal</dt><dd>${L[3]}</dd></dl><a class="btn" target="_blank" rel="noopener" style="width:100%;text-align:center" href="${wl(`Halo ${BRAND}, saya ingin berkonsultasi. Kain: ${TY[A.t]}, usia ${AG[A.a][0]}, masalah: ${[...A.i].map(i=>IS[i][0]).join(", ")||"belum ada"}, penyimpanan: ${SO[A.s][0]}. Hasil penilaian awal: ${L[0]}. Saya akan kirim foto kain.`)}">Kirim hasil ke WhatsApp</a><p style="text-align:center;margin-top:12px"><a class="ul" href="#titip">Atau ajukan penerimaan koleksi</a></p><small>Estimasi contoh dan bukan penawaran. Pemeriksaan fisik oleh konservator diperlukan untuk menentukan penanganan, durasi, dan biaya yang sebenarnya.</small>`)}
function titip(){return `<div class="w ar">${cr("Penerimaan koleksi")}<div class="ah"><span class="kk">Penerimaan koleksi</span><h1>Titipkan kain Anda dengan tenang.</h1><p class="dk">Isi data singkat. Kami menghubungi untuk mengatur serah terima dan meminta foto kain.</p></div><div class="ag f"><div class="fm"><label for="tn">Nama</label><input type="text" id="tn" placeholder="Nama lengkap"><label for="tc">Kontak (WhatsApp atau email)</label><input type="text" id="tc" placeholder="Kontak yang bisa dihubungi"><label for="tj">Jenis koleksi</label><select id="tj">${TY.map(x=>`<option>${x}</option>`).join("")}</select><label for="tm">Jumlah item</label><input type="text" id="tm" placeholder="Contoh: 2 kain panjang"><label for="tr">Cerita atau asal kain</label><textarea id="tr" rows="3" placeholder="Warisan siapa, dipakai untuk apa (opsional)"></textarea><label for="tp">Cara serah terima</label><select id="tp"><option>Saya antar ke studio</option><option>Mohon dijemput</option><option>Kirim lewat ekspedisi (dibahas dulu)</option></select><label for="td">Tanggal kunjungan diinginkan</label><input type="date" id="td"><label class="ck"><input type="checkbox" id="to">Saya pemilik kain atau berwenang menitipkannya</label><a class="btn" id="tw" href="#" target="_blank" rel="noopener" style="margin-top:28px">Kirim ke WhatsApp</a></div>
<aside class="sd"><h3>Setelah Anda kirim</h3><ol class="st" style="font-size:16px"><li>Kami menghubungi dan meminta foto</li><li>Janji serah terima diatur</li><li>Kain didokumentasikan dan dinilai</li><li>Rencana dan biaya Anda setujui dulu</li><li>Penanganan dimulai, dengan kabar berkala</li></ol></aside></div></div>`}
function tupd(){const d=$("td").value?new Date($("td").value+"T00:00").toLocaleDateString("id-ID",{weekday:"long",day:"numeric",month:"long"}):"belum dipilih";$("tw").href=wl(`Halo ${BRAND}, saya ${$("tn").value||"calon klien"}. Saya ingin menitipkan: ${$("tj").value}, ${$("tm").value||"jumlah belum diisi"}. ${$("tr").value?"Cerita: "+$("tr").value+". ":""}Serah terima: ${$("tp").value}. Tanggal kunjungan: ${d}. ${$("to").checked?"Saya pemilik atau berwenang. ":""}Kontak: ${$("tc").value||"-"}.`)}
/* router */
let pend=null;
function route(){let h=location.hash.slice(1)||"beranda",m,html=null,t="Arsip Kain – Layanan Konservasi Tekstil Warisan",af=null;
if(m=h.match(/^kasus-(\d)$/)){if(KS[m[1]-1]){html=kasus(m[1]-1);t=KS[m[1]-1].n;af=()=>{const kx=$("kx"),kt=$("kt");kt.onclick=e=>{const b=e.target.closest("button");if(b){kx.classList.toggle("on",b.dataset.i==="1");kt.querySelectorAll("button").forEach(x=>x.setAttribute("aria-pressed",x===b))}}}}}
else if(m=h.match(/^panduan-(\d)$/)){if(PG[m[1]-1]){html=panduan(m[1]-1);t=PG[m[1]-1].n}}
else if(h==="kondisi"){html=kondisi();t="Cek kondisi kain";af=()=>{document.querySelectorAll(".fm select,.fm input").forEach(e=>e.oninput=acalc);acalc()}}
else if(h==="titip"){html=titip();t="Penerimaan koleksi";af=()=>{document.querySelectorAll(".fm input,.fm select,.fm textarea").forEach(e=>e.oninput=tupd);tupd()}}
const sub=$("v-sub");
if(html){replaceMarkup(sub,html);sub.classList.add("on");$("v-beranda").classList.remove("on");if(af)af();document.title=t+" – Arsip Kain";window.scrollTo(0,0)}
else{sub.classList.remove("on");$("v-beranda").classList.add("on");document.title=t;if(pend){const el=$(pend);pend=null;setTimeout(()=>el&&el.scrollIntoView(),60)}else window.scrollTo(0,0)}}
addEventListener("hashchange",route);
document.querySelectorAll("[data-s]").forEach(b=>b.onclick=()=>{if($("v-beranda").classList.contains("on"))$(b.dataset.s).scrollIntoView();else{pend=b.dataset.s;location.hash="beranda"}});route();
/* chat */
const KB=[
[/biaya|harga|tarif|berapa/,()=>"Biaya bergantung jenis kain dan tingkat kerusakan, dan baru bisa dipastikan setelah pemeriksaan fisik. Alat Cek kondisi memberi kisaran awal.",["Cek kondisi","Titip koleksi"]],
[/cuci|laundry|dry clean|setrika|pemutih|noda|bersih/,()=>"Sebaiknya jangan mencuci, menyetrika, atau memakai pemutih pada kain warisan sebelum diperiksa. Tekan perlahan jika noda masih basah, lalu hubungi kami.",["Panduan merawat","Cek kondisi"]],
[/simpan|penyimpanan|lemari|plastik|lipat/,()=>"Simpan datar atau digulung dengan kertas bebas asam, hindari plastik, dan jauhkan dari cahaya serta kelembapan. Detailnya ada di Panduan.",["Panduan merawat"]],
[/jamur|serangga|rayap|kutu|bolong|lubang/,()=>"Jamur dan serangga perlu penanganan segera. Pisahkan kain dari koleksi lain, jangan dicuci sendiri, dan hubungi kami.",["Titip koleksi","Cek kondisi"]],
[/lama|durasi|berapa minggu/,()=>"Durasi sangat bervariasi, dari 1 sampai 2 minggu untuk kasus sederhana hingga beberapa bulan untuk kain rapuh. Kepastian setelah pemeriksaan.",["Cek kondisi"]],
[/titip|antar|jemput|serah|kirim/,()=>"Ajukan lewat halaman Penerimaan koleksi. Kami menghubungi untuk mengatur serah terima dan meminta foto kain.",["Titip koleksi"]],
[/foto/,()=>"Kirim foto dari beberapa sisi (depan, belakang, detail kerusakan, label atau tepi) lewat WhatsApp. Gunakan cahaya terang tanpa flash langsung.",["Lanjut ke WhatsApp"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Selamat datang di Arsip Kain. Ada kain yang ingin Anda tanyakan?",["Cek kondisi","Panduan merawat","Titip koleksi"]]];
const lg=[];function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;ms2.append(d);ms2.scrollTop=1e9;if(c==="u")lg.push(t)}
function chips(a){cs.replaceChildren();a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>{if(v==="Cek kondisi"){cp.classList.remove("on");location.hash="kondisi"}else if(v==="Titip koleksi"){cp.classList.remove("on");location.hash="titip"}else if(v==="Panduan merawat"){cp.classList.remove("on");location.hash="panduan-1"}else ask(v)};cs.append(b)})}
function waU(){cw.href=wl(`Halo ${BRAND}, saya menghubungi dari website.`+(lg.length?` Pertanyaan saya: ${lg.join("; ")}.`:" Saya ingin berkonsultasi."))}
function ask(t){say(t,"u");if(/whatsapp|\bwa\b|admin|manusia|konservator/i.test(t)){setTimeout(()=>{say("Baik, tekan tombol hijau di bawah. Pertanyaan Anda ikut terkirim.","b");waU()},300);return}
const m=KB.find(([r])=>r.test(t.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab konservator kami langsung. Tekan WhatsApp di bawah, pertanyaan Anda ikut terkirim.","b");chips(["Cek kondisi","Titip koleksi"])}waU()},350)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let fi=true;fab.onclick=()=>{cp.classList.toggle("on");if(cp.classList.contains("on")&&fi){fi=false;say("Selamat datang. Saya asisten virtual Arsip Kain. Saya bisa menjelaskan layanan dan perawatan dasar, tetapi tidak menggantikan pemeriksaan konservator.","b");chips(["Cek kondisi","Panduan merawat","Titip koleksi"]);waU()}};x.onclick=()=>cp.classList.remove("on");
document.querySelectorAll("[data-hash]").forEach(button=>button.onclick=()=>{location.hash=button.dataset.hash});
</script>
</body>
</html>

@endverbatim
