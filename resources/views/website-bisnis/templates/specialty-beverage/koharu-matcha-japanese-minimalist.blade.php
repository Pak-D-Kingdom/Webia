@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Koharu Matcha – Satu Cangkir Ketenangan</title>
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;700&family=Zen+Kaku+Gothic+New:wght@300;400;500&display=swap" rel="stylesheet">
<style>
:root{--pk:#F3DCDD;--pk2:#FAEEEC;--pk3:#E3B0B4;--wh:#FFFDFB;--br:#5B4338;--br2:#7A5C4A;--ink:#3B2A22;--mu:#8C766B;--ln:#EAD8D4;--m:'Shippori Mincho','Hiragino Mincho ProN',serif;--g:'Zen Kaku Gothic New',system-ui,sans-serif;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth}
body{margin:0;background:var(--wh);color:var(--ink);font:300 16.5px/1.9 var(--g);overflow-x:hidden;letter-spacing:.02em}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
.w{max-width:1120px;margin:auto;padding:0 32px}
.lb{font:400 11.5px var(--g);letter-spacing:.3em;text-transform:uppercase;color:var(--mu)}
.ln{background:none;border:0;border-bottom:1px solid var(--br);padding:0 0 3px;font:400 14px var(--g);letter-spacing:.14em;color:var(--br);cursor:pointer;transition:.3s}.ln:hover{color:var(--pk3);border-color:var(--pk3)}
.bt{display:inline-block;padding:15px 38px;border:1px solid var(--br);background:var(--br);color:var(--wh);font:400 13.5px var(--g);letter-spacing:.2em;cursor:pointer;transition:.4s}.bt:hover,.bt:focus-visible{background:transparent;color:var(--br);outline:none}
.bt.o{background:transparent;color:var(--br)}.bt.o:hover{background:var(--br);color:var(--wh)}
header.n{position:sticky;top:env(safe-area-inset-top,0px);z-index:50;background:rgba(255,253,251,.9);backdrop-filter:blur(8px)}
header.n .w{display:flex;justify-content:space-between;align-items:center;padding-top:22px;padding-bottom:22px}
.lg{display:flex;align-items:center;gap:12px;font:500 19px var(--m);letter-spacing:.2em}.hk{width:26px;height:26px;background:var(--pk3);color:#fff;display:grid;place-items:center;font:700 13px var(--m);letter-spacing:0;border-radius:2px;transform:rotate(-4deg)}
.nl{display:flex;gap:34px;font:400 13px var(--g);letter-spacing:.2em}.nl button{background:none;border:0;font:inherit;letter-spacing:inherit;color:var(--br2);cursor:pointer;padding:0}.nl button:hover{color:var(--ink)}
@media(max-width:600px){.nl{gap:18px}}
.view{display:none}.view.on{display:block;animation:fd .9s}@keyframes fd{from{opacity:0;transform:translateY(12px)}}
/* hero */
.hero{padding:70px 0 100px;min-height:84vh;display:flex;align-items:center}
.hero .w{display:grid;grid-template-columns:1.1fr .9fr;gap:60px;align-items:center;width:100%}
.hero h1{font:500 clamp(40px,6.4vw,92px)/1.12 var(--m);letter-spacing:.04em;margin:26px 0 18px}
.hero .sb{font:400 clamp(17px,2vw,22px) var(--m);color:var(--br2);letter-spacing:.14em;margin-bottom:30px}
.hero p{max-width:400px;color:var(--mu)}
.hc{display:flex;gap:34px;align-items:center;flex-wrap:wrap;margin-top:44px}
.es{position:relative;aspect-ratio:1;max-width:420px;margin-left:auto;width:100%}
.es svg{width:100%;height:100%;overflow:visible}
.en{stroke-dasharray:1;stroke-dashoffset:1;animation:dr 3s cubic-bezier(.5,0,.2,1) .4s forwards}@keyframes dr{to{stroke-dashoffset:0}}
.es .vt{position:absolute;right:-6%;top:6%;writing-mode:vertical-rl;font:500 clamp(34px,5vw,64px)/1 var(--m);letter-spacing:.3em;color:var(--br)}
.es .vs{position:absolute;left:-4%;bottom:0;writing-mode:vertical-rl;font:400 12px var(--g);letter-spacing:.4em;color:var(--mu)}
@media(max-width:860px){.hero .w{grid-template-columns:1fr}.es{max-width:300px;margin:0 auto}}
.bar{height:1px;background:var(--ln);margin:0 32px}
section.s{padding:120px 0 40px}
.sh{display:grid;grid-template-columns:140px 1fr;gap:40px;margin-bottom:60px;align-items:start}
.sh .vt{writing-mode:vertical-rl;font:500 28px var(--m);letter-spacing:.4em;color:var(--pk3)}
.sh h2{font:500 clamp(28px,3.6vw,48px)/1.25 var(--m);letter-spacing:.04em}.sh p{color:var(--mu);margin-top:12px;max-width:440px}
@media(max-width:700px){.sh{grid-template-columns:1fr;gap:10px}.sh .vt{writing-mode:horizontal-tb;font-size:20px}}
/* produk */
.pg{display:grid;grid-template-columns:repeat(5,1fr);gap:0;border-top:1px solid var(--ln)}
.pc{background:none;border:0;border-right:1px solid var(--ln);padding:36px 20px 30px;text-align:center;font:inherit;color:inherit;cursor:pointer;transition:.5s;position:relative}.pc:last-child{border:0}
.pc:hover{background:var(--pk2)}.pc svg{width:70%;max-width:130px;margin:0 auto 20px;display:block;transition:.5s}.pc:hover svg{transform:translateY(-10px)}
.pc b{display:block;font:500 20px var(--m);letter-spacing:.1em}.pc small{display:block;color:var(--mu);font-size:13.5px;letter-spacing:.08em;margin-top:2px}.pc span{display:block;margin-top:14px;font:400 12.5px var(--g);letter-spacing:.16em;color:var(--br2)}
@media(max-width:960px){.pg{grid-template-columns:1fr 1fr 1fr}.pc{border-bottom:1px solid var(--ln)}}@media(max-width:600px){.pg{grid-template-columns:1fr 1fr}}
/* peta rasa */
.tm{display:grid;grid-template-columns:1fr .8fr;gap:70px;align-items:center}
.mp{position:relative;aspect-ratio:1;max-width:480px;width:100%;border:1px solid var(--br);background:linear-gradient(var(--ln) 1px,transparent 1px) 0 0/50% 50%,linear-gradient(90deg,var(--ln) 1px,transparent 1px) 0 0/50% 50%,var(--pk2);touch-action:none;cursor:crosshair;margin:0 0 0 auto}
.mp .ax{position:absolute;font:400 11.5px var(--g);letter-spacing:.2em;color:var(--mu)}
.mp .dt{position:absolute;width:12px;height:12px;border-radius:50%;background:var(--br);transform:translate(-50%,-50%);transition:.4s}.mp .dt.on{background:var(--pk3);transform:translate(-50%,-50%) scale(1.8)}
.mp .dl{position:absolute;font:400 12px var(--g);letter-spacing:.08em;transform:translate(10px,-50%);white-space:nowrap;color:var(--br2);pointer-events:none}
.mp .pn{position:absolute;width:30px;height:30px;border:1.5px solid var(--br);border-radius:50%;transform:translate(-50%,-50%);display:grid;place-items:center;background:rgba(255,253,251,.7);outline:none}.mp .pn::after{content:"";width:6px;height:6px;border-radius:50%;background:var(--br)}
.rs h3{font:500 clamp(26px,3vw,38px)/1.2 var(--m);letter-spacing:.06em;margin:12px 0 10px}.rs p{color:var(--mu);margin-bottom:24px;max-width:380px}
@media(max-width:860px){.tm{grid-template-columns:1fr;gap:40px}.mp{margin:0 auto}}
/* ritual */
.rt{display:grid;grid-template-columns:repeat(3,1fr);border-block:1px solid var(--ln);margin-bottom:40px}.rt div{padding:50px 30px;border-right:1px solid var(--ln);display:grid;gap:14px;justify-items:start}.rt div:last-child{border:0}.rt .vt{writing-mode:vertical-rl;font:500 44px/1 var(--m);color:var(--pk3);letter-spacing:.2em;height:120px}.rt b{font:500 20px var(--m);letter-spacing:.08em}.rt p{color:var(--mu);font-size:15px}
@media(max-width:760px){.rt{grid-template-columns:1fr}.rt div{border:0;border-bottom:1px solid var(--ln)}}
.qt{padding:140px 0 80px;text-align:center}.qt blockquote{margin:0 auto;max-width:700px;font:400 clamp(22px,3vw,36px)/1.9 var(--m);letter-spacing:.08em}.qt .hc{justify-content:center}
.ct{background:var(--pk);padding:100px 0;margin-top:50px}.ct .w{display:flex;justify-content:space-between;align-items:center;gap:40px;flex-wrap:wrap}.ct h2{font:500 clamp(28px,3.6vw,48px)/1.3 var(--m);letter-spacing:.05em;max-width:560px}.ct small{display:block;margin-top:14px;color:var(--br2);font-size:14px}
footer{padding:50px 0 44px;font-size:13.5px;color:var(--mu)}footer .w{display:flex;justify-content:space-between;gap:30px;flex-wrap:wrap}footer p{max-width:600px;font-size:12.5px;line-height:1.8;margin-top:10px}footer button{background:none;border:0;font:inherit;color:inherit;cursor:pointer;margin-right:22px;padding:0;letter-spacing:.08em}footer button:hover{color:var(--ink)}
/* subhalaman */
.sp{padding:50px 0 40px}.cr{font:400 12.5px var(--g);letter-spacing:.2em;color:var(--mu);margin-bottom:50px}.cr a{color:var(--br);border-bottom:1px solid var(--pk3)}
.pd{display:grid;grid-template-columns:.9fr 1.1fr;gap:80px;align-items:center}
.ph{position:relative;aspect-ratio:1;max-width:460px;width:100%}.ph::before{content:"";position:absolute;inset:8%;border-radius:50%;background:var(--pk)}.ph svg{position:relative;width:60%;display:block;margin:0 auto;top:10%}
.pd h1{font:500 clamp(36px,5vw,66px)/1.1 var(--m);letter-spacing:.06em;margin:16px 0 6px}.pd .jp{font:400 20px var(--m);letter-spacing:.3em;color:var(--pk3);margin-bottom:24px}.pd p{color:var(--mu);max-width:460px}
.tn{margin:34px 0;max-width:420px}.tn div{display:grid;grid-template-columns:90px 1fr;gap:14px;align-items:center;padding:7px 0;font-size:14px;letter-spacing:.1em}.tn i{display:flex;gap:6px}.tn i b{width:26px;height:2px;background:var(--ln)}.tn i b.on{background:var(--br)}
.sz{display:flex;gap:10px;margin:26px 0 8px}.sz button{padding:12px 26px;border:1px solid var(--ln);background:none;font:400 14px var(--g);letter-spacing:.1em;cursor:pointer;color:var(--br);transition:.3s}.sz button[aria-pressed=true]{border-color:var(--br);background:var(--pk2)}
.pr{font:500 30px var(--m);letter-spacing:.06em;margin:10px 0 28px}.pr small{font:300 13px var(--g);color:var(--mu)}
.gh{display:flex;gap:24px;flex-wrap:wrap;align-items:center}.ok{display:none;margin-top:16px;font-size:14px;color:var(--br2)}.ok.on{display:block}
@media(max-width:860px){.pd{grid-template-columns:1fr;gap:40px}.ph{margin:auto;max-width:320px}}
.tt{max-width:760px;margin:0 auto 60px;text-align:center}.tt h1{font:500 clamp(34px,5vw,64px)/1.15 var(--m);letter-spacing:.06em;margin:16px 0}.tt p{color:var(--mu);max-width:480px;margin:0 auto}
.bw{display:grid;grid-template-columns:1fr 1fr;gap:70px;align-items:start;max-width:960px;margin:auto}
.fm label{display:block;font:400 11.5px var(--g);letter-spacing:.28em;text-transform:uppercase;color:var(--mu);margin:26px 0 8px}.fm label:first-child{margin-top:0}
.fm select,.fm input[type=text],.fm textarea{width:100%;padding:12px 0;border:0;border-bottom:1px solid var(--br);background:none;font:400 17px var(--g);color:var(--ink);outline:none;border-radius:0}.fm select option{background:var(--wh)}.fm input:focus,.fm select:focus,.fm textarea:focus{border-color:var(--pk3)}
.sg{display:flex;align-items:center;gap:20px;font:500 28px var(--m)}.sg button{width:44px;height:44px;border-radius:50%;border:1px solid var(--br);background:none;color:var(--br);font-size:20px;cursor:pointer;transition:.3s}.sg button:hover{background:var(--br);color:var(--wh)}
.rcp{border:1px solid var(--ln);padding:40px;background:var(--pk2)}.rcp .big{font:500 clamp(34px,4.4vw,52px)/1.1 var(--m);letter-spacing:.06em}.rcp dl{display:grid;grid-template-columns:auto 1fr;gap:10px 24px;margin:26px 0;font-size:15.5px}.rcp dt{color:var(--mu);letter-spacing:.1em}.rcp dd{margin:0;text-align:right;font-weight:500}.rcp ol{padding-left:20px;font-size:15px;color:var(--mu)}.rcp li{margin:6px 0}
.tmr{display:flex;align-items:center;gap:26px;margin-top:30px;padding-top:30px;border-top:1px solid var(--ln)}.tmr svg{width:96px;flex:none;transform:rotate(-90deg)}.tmr circle{fill:none;stroke-width:5}.tmr .t{font:500 28px var(--m);min-width:2em}
@media(max-width:860px){.bw{grid-template-columns:1fr;gap:44px}}
.ol{border-top:1px solid var(--ln)}.ol .r{display:grid;grid-template-columns:1fr auto auto;gap:14px 24px;align-items:center;padding:20px 0;border-bottom:1px solid var(--ln)}.ol b{font:500 19px var(--m);letter-spacing:.08em}.ol small{display:block;color:var(--mu);font-size:13px}.ol select{border:0;border-bottom:1px solid var(--ln);background:none;font:400 14px var(--g);padding:6px 0;color:var(--br)}
.ol .sg{font-size:20px;gap:12px}.ol .sg button{width:34px;height:34px;font-size:16px}
@media(max-width:620px){.ol .r{grid-template-columns:1fr auto}.ol .r>:nth-child(2){grid-row:2}}
.tot{display:flex;justify-content:space-between;align-items:baseline;padding:26px 0;font:500 34px var(--m);letter-spacing:.05em}.tot span{font:400 13px var(--g);letter-spacing:.2em;color:var(--mu)}
.cl{display:grid;grid-template-columns:repeat(4,1fr);gap:0;border-top:1px solid var(--ln);max-width:1000px;margin:60px auto 0}.cl div{padding:40px 24px 20px;border-right:1px solid var(--ln)}.cl div:last-child{border:0}.cl .vt{writing-mode:vertical-rl;font:500 40px/1 var(--m);color:var(--pk3);letter-spacing:.2em;height:110px;margin-bottom:10px}.cl b{font:500 18px var(--m);letter-spacing:.08em;display:block}.cl p{color:var(--mu);font-size:14.5px;margin-top:6px}
@media(max-width:800px){.cl{grid-template-columns:1fr 1fr}.cl div{border-bottom:1px solid var(--ln)}}
.ps{max-width:680px;margin:90px auto 0;text-align:center;font:400 clamp(22px,2.8vw,32px)/1.9 var(--m);letter-spacing:.08em}
.pnv{display:flex;justify-content:space-between;gap:20px;margin-top:80px;padding-top:26px;border-top:1px solid var(--ln);flex-wrap:wrap}
/* chat */
#fab{position:fixed;right:24px;bottom:calc(24px + env(safe-area-inset-bottom,0px));z-index:80;width:60px;height:60px;border-radius:50%;border:1px solid var(--br);background:var(--wh);cursor:pointer;display:grid;place-items:center;transition:.4s;box-shadow:0 12px 30px -12px rgba(91,67,56,.5)}#fab:hover{background:var(--pk);transform:rotate(-8deg)}#fab svg{width:28px;stroke:var(--br);fill:none;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round}
#cp{position:fixed;right:24px;bottom:calc(96px + env(safe-area-inset-bottom,0px));z-index:80;width:min(360px,calc(100vw - 48px));height:min(480px,68vh);background:var(--wh);border:1px solid var(--br);display:none;flex-direction:column;box-shadow:0 30px 70px -24px rgba(91,67,56,.45)}#cp.on{display:flex;animation:fd .5s}
#cp header{padding:18px 24px;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid var(--ln)}#cp header b{font:500 18px var(--m);letter-spacing:.2em}#cp header button{background:none;border:0;font-size:22px;cursor:pointer;color:var(--mu)}
#ms{flex:1;overflow-y:auto;padding:18px 24px;display:flex;flex-direction:column;gap:16px;font-size:15px;line-height:1.8}
.m{animation:fd .5s}.m.b{font-family:var(--m);color:var(--ink)}.m.u{align-self:flex-end;text-align:right;color:var(--mu);font-size:13.5px;letter-spacing:.06em}
.cs{display:flex;flex-wrap:wrap;gap:6px 16px;padding:8px 24px 0}.cs button{background:none;border:0;border-bottom:1px solid var(--pk3);font:400 13px var(--g);letter-spacing:.06em;color:var(--br);cursor:pointer;padding:0}.cs button:hover{background:var(--pk)}
#cf{display:flex;border-top:1px solid var(--ln);margin-top:12px}#cf input{flex:1;padding:16px 24px;border:0;background:none;font:400 15px var(--g);outline:none;min-width:0}#cf button{padding:0 22px;background:none;border:0;color:var(--br);font-size:18px;cursor:pointer}
#cw{display:block;text-align:center;padding:12px;background:var(--br);color:var(--wh);font:400 12.5px var(--g);letter-spacing:.2em}
:focus-visible{outline:2px solid var(--pk3);outline-offset:3px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}.en{stroke-dashoffset:0}}
</style>
</head>
<body>
<header class="n"><div class="w"><a class="lg" href="#beranda"><span class="hk">小</span>KOHARU</a><div class="nl"><button data-s="produk">KOLEKSI</button><button data-s="rasa">PETA RASA</button><button data-s="kontak">KONTAK</button></div></div></header>

<main>
<div class="view" id="v-beranda">
<section class="hero"><div class="w"><div><span class="lb">Matcha dan teh spesialti</span><h1>一服の、<br>静けさ。</h1><div class="sb">Satu cangkir ketenangan</div><p>Bubuk matcha dan teh pilihan, digiling halus dan dikemas dalam kaleng kecil, untuk jeda yang pelan di sela hari.</p><div class="hc"><a class="bt" href="#pesan">PESAN SEKARANG</a><button class="ln" data-s="produk">LIHAT KOLEKSI</button></div></div>
<div class="es"><svg viewBox="0 0 300 300" fill="none" aria-hidden="true"><circle cx="156" cy="152" r="86" fill="#F3DCDD"/><path class="en" pathLength="1" d="M158 24C86 20 26 78 30 150C34 226 104 282 180 274C252 266 286 196 274 128C264 72 222 34 162 30" stroke="#5B4338" stroke-width="9" stroke-linecap="round"/></svg><div class="vt">抹茶</div><div class="vs">小春 · KOHARU</div></div></div></section>
<div class="bar"></div>
<section class="s" id="produk"><div class="w"><div class="sh"><div class="vt">茶葉</div><div><h2>五つの茶、<br>それぞれの時間。</h2><p>Lima pilihan, tiap-tiap punya waktunya sendiri.</p></div></div><div class="pg" id="pg"></div></div></section>
<section class="s" id="rasa"><div class="w"><div class="sh"><div class="vt">味</div><div><h2>あなたの味を、<br>探す。</h2><p>Geser penanda pada peta untuk menemukan teh yang paling dekat dengan seleramu.</p></div></div>
<div class="tm"><div class="mp" id="mp" aria-label="Peta rasa interaktif"></div><div class="rs" id="rs"></div></div></div></section>
<section class="s" id="ritual"><div class="w"><div class="sh"><div class="vt">作法</div><div><h2>三つの所作。</h2><p>Tiga gerakan sederhana untuk menyeduh matcha.</p></div></div><div class="rt"><div><span class="vt">篩</span><b>Ayak</b><p>Ayak bubuk agar halus dan tidak menggumpal.</p></div><div><span class="vt">点</span><b>Kocok</b><p>Kocok dengan gerakan zig-zag hingga berbusa tipis.</p></div><div><span class="vt">味</span><b>Nikmati</b><p>Minum pelan selagi hangat, tanpa terburu-buru.</p></div></div><a class="bt o" href="#seduh">MULAI RITUAL SEDUH</a></div></section>
<section class="qt"><div class="w"><blockquote>Ketenangan tidak dicari jauh-jauh. Ia ada di antara dua tarikan napas, dan satu cangkir hangat.</blockquote><div class="hc"><a class="ln" href="#cerita" style="text-decoration:none">KISAH KAMI</a></div></div></section>
<section class="ct" id="kontak"><div class="w"><div><h2>Pesan, atau berlangganan setiap bulan.</h2><small>Alamat kedai (ganti) · Setiap hari, 10.00 sampai 20.00 (contoh)</small></div><a class="bt" href="#pesan">BUAT PESANAN</a></div></section>
</div>
<div class="view" id="v-sub"></div>
</main>
<footer><div class="w"><div><span class="lg"><span class="hk">小</span>KOHARU</span><p>Template contoh. Seluruh nama, harga, asal, dan data lainnya adalah contoh dan perlu diganti. Matcha mengandung kafein. Pengiriman dan ketentuan produk mengikuti kebijakan toko.</p></div><div><button data-hash="seduh">Ritual seduh</button><button data-hash="cerita">Kisah kami</button><button data-hash="pesan">Pesan</button></div></div></footer>
<button id="fab" aria-label="Tanya Koharu"><svg viewBox="0 0 32 32"><path d="M6 12h18v3a9 9 0 0 1-18 0zM24 14h2a3 3 0 0 1 0 6h-2M12 6c0 2 2 2 2 4M17 6c0 2 2 2 2 4"/></svg></button>
<aside id="cp" role="dialog" aria-label="Tanya Koharu"><header><b>問い</b><button id="x" aria-label="Tutup">×</button></header><div id="ms"></div><div class="cs" id="cs"></div><form id="cf"><input id="ci" placeholder="Tanyakan sesuatu…" autocomplete="off" aria-label="Pertanyaan"><button aria-label="Kirim">→</button></form><a id="cw" href="#" target="_blank" rel="noopener">LANJUT KE WHATSAPP</a></aside>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="Koharu Matcha";
function replaceMarkup(el,markup){const range=document.createRange();range.selectNodeContents(el);range.deleteContents();el.append(range.createContextualFragment(markup))}
const $=i=>document.getElementById(i),wl=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t),rp=n=>"Rp "+Math.round(n).toLocaleString("id-ID");
/* kaleng */
const TC=[["#E3B0B4","雅"],["#F3E6D6","和"],["#C99A8A","雫"],["#7A5C4A","焙"],["#F3DCDD","米"]];
function tin(i){const [c,k]=TC[i],dk=i===3?"#F3E6D6":"#5B4338";return `<svg viewBox="0 0 120 150" aria-hidden="true"><ellipse cx="60" cy="140" rx="40" ry="6" fill="#5B4338" opacity=".12"/><rect x="22" y="30" width="76" height="106" rx="6" fill="${c}" stroke="#5B4338" stroke-width="1.4"/><ellipse cx="60" cy="30" rx="38" ry="9" fill="${c}" stroke="#5B4338" stroke-width="1.4"/><ellipse cx="60" cy="27" rx="30" ry="6" fill="#fff" opacity=".35"/><rect x="34" y="58" width="52" height="56" fill="#FFFDFB" opacity=".92"/><text x="60" y="96" text-anchor="middle" font-size="30" fill="${i===3?"#7A5C4A":dk}" font-family="Shippori Mincho,serif">${k}</text><text x="60" y="73" text-anchor="middle" font-size="6.5" letter-spacing="2" fill="#5B4338" font-family="Zen Kaku Gothic New,sans-serif">KOHARU</text><path d="M34 106H86" stroke="#5B4338" stroke-width=".8"/></svg>`}
/* data */
const PR=[
{n:"Seremonial",jp:"雅",d:"Matcha kelas tertinggi, untuk diseduh murni tanpa susu. Manis lembut, umami dalam, nyaris tanpa pahit.",t:[5,4,1,0],cp:"Penikmat teh yang ingin merasakan matcha apa adanya.",px:.74,py:.28,z:[185000,520000],cat:"Usucha dan koicha"},
{n:"Harian",jp:"和",d:"Seimbang dan bersahabat untuk diseduh tiap hari, dengan rasa segar dan pahit yang halus.",t:[3,3,2,0],cp:"Rutinitas pagi dan sore, dinikmati hangat atau dingin.",px:.5,py:.5,z:[95000,260000],cat:"Usucha dan latte"},
{n:"Latte",jp:"雫",d:"Dirancang untuk dipadukan dengan susu: rasanya cukup pekat agar tetap terasa di balik kelembutan susu.",t:[3,2,3,0],cp:"Pencinta matcha latte panas maupun dingin.",px:.7,py:.62,z:[70000,190000],cat:"Latte"},
{n:"Hojicha",jp:"焙",d:"Teh hijau yang dipanggang, beraroma kacang dan karamel, nyaris tanpa pahit, dan ramah di sore hingga malam hari.",t:[1,4,0,5],cp:"Peminum teh yang menyukai aroma hangat dan lembut.",px:.24,py:.34,z:[60000,165000],cat:"Seduh dan latte"},
{n:"Genmaicha",jp:"米",d:"Teh hijau dengan beras panggang, segar, gurih, dan ringan untuk menemani makan.",t:[2,2,1,4],cp:"Teman makan siang dan makan malam.",px:.3,py:.72,z:[55000,150000],cat:"Seduh"}];
const TN=["Umami","Manis","Pahit","Panggang"];
const CRT={};let SZ=[0,0,0,0,0];
/* beranda */
replaceMarkup(pg,PR.map((p,i)=>`<button class="pc" data-i="${i}">${tin(i)}<b>${p.jp} ${p.n}</b><small>${p.cat}</small><span>MULAI ${rp(p.z[0]).replace("Rp ","Rp")}</span></button>`).join(""));
pg.onclick=e=>{const b=e.target.closest(".pc");if(b)location.hash="produk-"+(+b.dataset.i+1)};
/* peta rasa */
let mh=`<span class="ax" style="left:12px;bottom:8px">RINGAN</span><span class="ax" style="right:12px;bottom:8px">PEKAT</span><span class="ax" style="left:12px;top:8px">MANIS · LEMBUT</span><span class="ax" style="left:12px;bottom:28px">SEGAR · PAHIT</span>`;
PR.forEach((p,i)=>mh+=`<i class="dt" data-i="${i}" style="left:${p.px*100}%;top:${p.py*100}%"></i><span class="dl" style="left:${p.px*100}%;top:${p.py*100}%">${p.jp} ${p.n}</span>`);
replaceMarkup(mp,mh+`<div class="pn" id="pn" tabindex="0" role="slider" aria-label="Penanda selera" style="left:50%;top:50%"></div>`);
let TP={x:.5,y:.5};
function near(){let b=0,bd=9;PR.forEach((p,i)=>{const d=Math.hypot(p.px-TP.x,p.py-TP.y);if(d<bd){bd=d;b=i}});mp.querySelectorAll(".dt").forEach((d,i)=>d.classList.toggle("on",i===b));const p=PR[b];
$("pn").style.left=TP.x*100+"%";$("pn").style.top=TP.y*100+"%";
replaceMarkup(rs,`<span class="lb">Paling dekat denganmu</span><h3>${p.jp} ${p.n}</h3><p>${p.d}</p><a class="bt" href="#produk-${b+1}">LIHAT DETAIL</a>`)}
const mv=e=>{const r=mp.getBoundingClientRect();TP.x=Math.max(0,Math.min(1,(e.clientX-r.left)/r.width));TP.y=Math.max(0,Math.min(1,(e.clientY-r.top)/r.height));near()};
let dg=false;mp.onpointerdown=e=>{dg=true;mp.setPointerCapture(e.pointerId);mv(e)};mp.onpointermove=e=>{if(dg)mv(e)};mp.onpointerup=()=>dg=false;
$("pn").onkeydown=e=>{const s=.04,k={ArrowLeft:[-s,0],ArrowRight:[s,0],ArrowUp:[0,-s],ArrowDown:[0,s]}[e.key];if(k){e.preventDefault();TP.x=Math.max(0,Math.min(1,TP.x+k[0]));TP.y=Math.max(0,Math.min(1,TP.y+k[1]));near()}};near();
/* subhalaman */
const cr=(...a)=>`<div class="cr"><a href="#beranda">BERANDA</a>${a.map(x=>" / "+x).join("")}</div>`;
function produk(i){const p=PR[i],nx=(i+1)%5,s=SZ[i];
return `<div class="w sp">${cr("KOLEKSI",p.n.toUpperCase())}<div class="pd"><div class="ph">${tin(i)}</div><div><span class="lb">${p.cat}</span><h1>${p.n}</h1><div class="jp">${p.jp}</div><p>${p.d}</p><div class="tn">${TN.map((t,j)=>`<div><span>${t}</span><i>${[0,1,2,3,4].map(k=>`<b class="${k<p.t[j]?"on":""}"></b>`).join("")}</i></div>`).join("")}</div><p style="font-size:14.5px"><b style="font-weight:500">Cocok untuk:</b> ${p.cp}</p>
<div class="sz" id="sz"><button data-s="0" aria-pressed="${s===0}">30 g</button><button data-s="1" aria-pressed="${s===1}">100 g</button></div><div class="pr" id="ppr">${rp(p.z[s])}<small> · harga contoh</small></div>
<div class="gh"><button class="bt" id="ad">TAMBAH KE PESANAN</button><a class="ln" href="#seduh" style="text-decoration:none">CARA MENYEDUH</a></div><div class="ok" id="ok">Ditambahkan. <a class="ln" href="#pesan" style="text-decoration:none">Lihat pesanan →</a></div></div></div>
<div class="pnv"><a class="ln" href="#beranda" style="text-decoration:none">← BERANDA</a><a class="ln" href="#produk-${nx+1}" style="text-decoration:none">${PR[nx].jp} ${PR[nx].n.toUpperCase()} →</a></div></div>`}
function pbind(i){$("sz").onclick=e=>{const b=e.target.closest("button");if(b){SZ[i]=+b.dataset.s;$("sz").querySelectorAll("button").forEach(x=>x.setAttribute("aria-pressed",x===b));replaceMarkup($("ppr"),rp(PR[i].z[SZ[i]])+"<small> · harga contoh</small>")}};
$("ad").onclick=()=>{const k=i+"-"+SZ[i];CRT[k]=(CRT[k]||0)+1;$("ok").classList.add("on")}}
const RC={usucha:["Usucha (teh tipis)",2,70,80,15,"",["Ayak matcha ke dalam mangkuk.","Tuang air panas sekitar 80°C.","Kocok zig-zag cepat hingga berbusa tipis.","Minum selagi hangat."]],koicha:["Koicha (teh pekat)",4,40,80,25,"",["Ayak matcha, tuang air sekitar 80°C.","Aduk pelan, jangan terlalu berbusa.","Hasilnya kental seperti krim.","Nikmati dalam beberapa tegukan."]],lh:["Latte panas",3,40,80,15,"160 ml susu panas",["Ayak matcha, tuang sedikit air panas sekitar 80°C.","Kocok hingga halus tanpa gumpalan.","Tuang susu panas perlahan.","Aduk dan nikmati."]],li:["Latte dingin",3,40,80,15,"150 ml susu dingin + es",["Ayak matcha, tuang sedikit air panas sekitar 80°C.","Kocok hingga halus tanpa gumpalan.","Isi gelas dengan es dan susu dingin.","Tuang matcha di atasnya."]]};
let BR={t:"usucha",q:1},tmI=null;
function seduh(){return `<div class="w sp">${cr("RITUAL SEDUH")}<div class="tt"><span class="lb">Ritual seduh</span><h1>一服を、<br>ていねいに。</h1><p>Pilih jenis seduhan dan jumlah porsi. Takaran dan penghitung waktu kocok langsung menyesuaikan.</p></div><div class="bw"><div class="fm"><label for="bt">Jenis seduhan</label><select id="bt">${Object.entries(RC).map(([k,v])=>`<option value="${k}">${v[0]}</option>`).join("")}</select><label>Jumlah porsi</label><div class="sg"><button id="bm" aria-label="Kurangi">−</button><span id="bq"></span><button id="bp" aria-label="Tambah">+</button></div><p style="margin-top:34px;font-size:14px;color:var(--mu)">Perlengkapan dasar: mangkuk lebar, pengocok bambu (chasen), dan ayakan kecil. Ukuran takaran bersifat panduan, sesuaikan dengan selera.</p><p style="margin-top:20px"><a class="ln" href="#pesan" style="text-decoration:none">PESAN MATCHA →</a></p></div><div class="rcp" id="rcp"></div></div></div>`}
function bcalc(){const r=RC[BR.t],q=BR.q;$("bq").textContent=q;replaceMarkup($("rcp"),`<span class="lb">Takaran</span><div class="big">${r[1]*q} g matcha</div><dl><dt>AIR 80°C</dt><dd>${r[2]*q} ml</dd>${r[5]?`<dt>TAMBAHAN</dt><dd>${r[5].replace(/\d+/,m=>m*q)}</dd>`:""}<dt>KOCOK</dt><dd>${r[4]} detik</dd></dl><ol>${r[6].map(x=>`<li>${x}</li>`).join("")}</ol><div class="tmr"><svg viewBox="0 0 100 100"><circle cx="50" cy="50" r="44" stroke="#EAD8D4"/><circle id="tc" cx="50" cy="50" r="44" stroke="#5B4338" stroke-dasharray="276.5" stroke-dashoffset="0" stroke-linecap="round"/></svg><div><div class="t" id="tt">${r[4]}s</div><button class="ln" id="tg">MULAI KOCOK</button></div></div>`);
$("tg").onclick=()=>{clearInterval(tmI);let s=r[4];$("tt").textContent=s+"s";$("tc").style.transition="none";$("tc").setAttribute("stroke-dashoffset",0);requestAnimationFrame(()=>{$("tc").style.transition=`stroke-dashoffset ${r[4]}s linear`;$("tc").setAttribute("stroke-dashoffset",276.5)});tmI=setInterval(()=>{s--;if(s<=0){clearInterval(tmI);$("tt").textContent="完";$("tg").textContent="ULANGI"}else $("tt").textContent=s+"s"},1000)}}
function pesan(){return `<div class="w sp">${cr("PESAN")}<div class="tt"><span class="lb">Pesanan</span><h1>お茶を、<br>お届けします。</h1><p>Pilih teh dan ukuran, lalu kirim pesanan lewat WhatsApp untuk dikonfirmasi.</p></div><div style="max-width:760px;margin:auto" class="fm"><div class="ol" id="ol"></div><div class="tot"><span>PERKIRAAN TOTAL</span><b id="ot">Rp 0</b></div><label for="on">Nama</label><input type="text" id="on" placeholder="Nama lengkap"><label for="oa">Alamat atau catatan pengiriman</label><textarea id="oa" rows="2" placeholder="Opsional"></textarea><label class="ck" style="display:flex;gap:12px;align-items:center;letter-spacing:.04em;text-transform:none;font-size:15px;color:var(--ink);cursor:pointer"><input type="checkbox" id="os" style="accent-color:#5B4338;width:17px;height:17px">Saya tertarik berlangganan bulanan</label><div style="margin-top:30px"><a class="bt" id="ow" href="#" target="_blank" rel="noopener">KIRIM PESANAN</a></div><p style="font-size:12.5px;color:var(--mu);margin-top:18px">Harga contoh. Ongkos kirim, ketersediaan, dan skema langganan dikonfirmasi tim kami.</p></div></div>`}
function pcalc(){const rows=[];PR.forEach((p,i)=>[0,1].forEach(s=>{const q=CRT[i+"-"+s];if(q)rows.push([i,s,q])}));let tot=0;
replaceMarkup($("ol"),PR.map((p,i)=>{const s=[0,1].find(s=>CRT[i+"-"+s])??SZ[i],q=CRT[i+"-"+s]||0;return `<div class="r"><div><b>${p.jp} ${p.n}</b><small>${rp(p.z[s])} · contoh</small></div><div><select data-i="${i}" aria-label="Ukuran ${p.n}"><option value="0" ${s===0?"selected":""}>30 g</option><option value="1" ${s===1?"selected":""}>100 g</option></select></div><div class="sg"><button data-i="${i}" data-d="-1" aria-label="Kurangi">−</button><span>${q}</span><button data-i="${i}" data-d="1" aria-label="Tambah">+</button></div></div>`}).join(""));
rows.forEach(([i,s,q])=>tot+=PR[i].z[s]*q);$("ot").textContent=rp(tot);
const L=rows.map(([i,s,q])=>`- ${q}x ${PR[i].n} ${s?"100 g":"30 g"} (${rp(PR[i].z[s]*q)})`).join("\n");
$("ow").href=wl(rows.length?`Halo ${BRAND}, saya ${$("on").value||"calon pelanggan"} ingin memesan:\n${L}\nPerkiraan total ${rp(tot)}.${$("oa").value?"\nCatatan: "+$("oa").value:""}${$("os").checked?"\nSaya tertarik berlangganan bulanan.":""}\nMohon konfirmasi ketersediaan dan ongkir.`:`Halo ${BRAND}, saya ingin bertanya tentang pemesanan.`)}
function pbind2(){$("ol").onclick=e=>{const b=e.target.closest("[data-d]");if(!b)return;const i=+b.dataset.i,s=[0,1].find(s=>CRT[i+"-"+s])??SZ[i],k=i+"-"+s;CRT[k]=Math.max(0,(CRT[k]||0)+ +b.dataset.d);if(!CRT[k])delete CRT[k];pcalc()};
$("ol").onchange=e=>{const t=e.target.closest("select");if(!t)return;const i=+t.dataset.i,o=[0,1].find(s=>CRT[i+"-"+s]);SZ[i]=+t.value;if(o!==undefined&&o!==+t.value){CRT[i+"-"+t.value]=CRT[i+"-"+o];delete CRT[i+"-"+o]}pcalc()};
["on","oa","os"].forEach(i=>$(i).oninput=pcalc);pcalc()}
function cerita(){const S=[["陰","Dinaungi","Beberapa minggu sebelum panen, tanaman teh ditutup agar daun lebih manis dan kaya umami."],["摘","Dipetik","Hanya pucuk muda terbaik yang dipetik, pada waktu yang tepat."],["蒸","Dikukus","Daun segera dikukus sebentar untuk menjaga warna dan rasa segarnya."],["挽","Digiling","Daun yang sudah dikeringkan digiling perlahan hingga menjadi bubuk sehalus debu."]];
return `<div class="w sp">${cr("KISAH KAMI")}<div class="tt"><span class="lb">Kisah kami</span><h1>畑から、<br>一杯まで。</h1><p>Dari ladang ke cangkir, melalui empat tahap yang dikerjakan dengan sabar.</p></div><div class="cl">${S.map(s=>`<div><span class="vt">${s[0]}</span><b>${s[1]}</b><p>${s[2]}</p></div>`).join("")}</div><div class="ps">Kami tidak ingin membuat teh yang ramai. Kami ingin membuat jeda yang tenang.</div><p style="text-align:center;color:var(--mu);font-size:13px;margin-top:30px">Deskripsi proses bersifat umum. Ganti dengan cerita asal dan produksi merek Anda.</p><div class="pnv"><a class="ln" href="#beranda" style="text-decoration:none">← BERANDA</a><a class="bt" href="#pesan">PESAN TEH</a></div></div>`}
/* router */
let pend=null;
function route(){let h=location.hash.slice(1)||"beranda",m,html=null,t="Koharu Matcha – Satu Cangkir Ketenangan",af=null;clearInterval(tmI);
if(m=h.match(/^produk-(\d)$/)){if(PR[m[1]-1]){html=produk(m[1]-1);t=PR[m[1]-1].n;af=()=>pbind(m[1]-1)}}
else if(h==="seduh"){html=seduh();t="Ritual seduh";af=()=>{$("bt").value=BR.t;$("bt").onchange=e=>{BR.t=e.target.value;bcalc()};$("bm").onclick=()=>{BR.q=Math.max(1,BR.q-1);bcalc()};$("bp").onclick=()=>{BR.q=Math.min(6,BR.q+1);bcalc()};bcalc()}}
else if(h==="pesan"){html=pesan();t="Pesan";af=pbind2}else if(h==="cerita"){html=cerita();t="Kisah kami"}
const sub=$("v-sub");
if(html){replaceMarkup(sub,html);sub.classList.add("on");$("v-beranda").classList.remove("on");if(af)af();document.title=t+" – Koharu Matcha";window.scrollTo(0,0)}
else{sub.classList.remove("on");$("v-beranda").classList.add("on");document.title=t;if(pend){const el=$(pend);pend=null;setTimeout(()=>el&&el.scrollIntoView(),60)}else window.scrollTo(0,0)}}
addEventListener("hashchange",route);
document.querySelectorAll("[data-s]").forEach(b=>b.onclick=()=>{if($("v-beranda").classList.contains("on"))$(b.dataset.s).scrollIntoView();else{pend=b.dataset.s;location.hash="beranda"}});route();
/* chat */
const KB=[
[/seduh|cara|suhu|panas|kocok|takaran/,()=>"Matcha umumnya diseduh dengan air sekitar 80°C, bukan air mendidih. Buka halaman Ritual seduh untuk takaran dan penghitung waktu kocok.",["Ritual seduh","Pesan"]],
[/beda|perbedaan|grade|kelas|pilih|rekomendasi|cocok/,()=>"Seremonial untuk diseduh murni, Harian untuk keseharian, dan Latte untuk campuran susu. Coba Peta rasa di beranda untuk menemukan yang paling dekat dengan seleramu.",["Lihat peta rasa","Pesan"]],
[/susu|latte|oat/,()=>"Untuk latte, pilih Matcha Latte. Rasanya lebih pekat sehingga tetap terasa di balik susu.",["Ritual seduh"]],
[/simpan|awet|kadaluarsa|tahan/,()=>"Simpan dalam kaleng tertutup rapat, di tempat sejuk dan gelap, jauh dari cahaya dan kelembapan. Setelah dibuka, sebaiknya dihabiskan dalam satu sampai dua bulan.",["Pesan"]],
[/kafein|hamil|aman/,()=>"Matcha mengandung kafein. Jika Anda sensitif terhadap kafein, sedang hamil, atau punya kondisi kesehatan tertentu, sebaiknya konsultasikan konsumsinya dengan tenaga kesehatan.",["Hojicha"]],
[/harga|berapa|biaya/,()=>"Harga mulai Rp 55.000 untuk 30 g, bergantung jenisnya. Semua harga di halaman ini contoh.",["Pesan"]],
[/langganan|subscribe|bulanan/,()=>"Berminat langganan bulanan? Centang pilihan langganan di halaman Pesan, dan tim kami menjelaskan skemanya.",["Pesan"]],
[/kirim|ongkir|antar/,()=>"Pengiriman dan ongkos dikonfirmasi tim kami setelah pesanan dikirim lewat WhatsApp.",["Pesan"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Selamat datang di Koharu. Ada yang ingin kamu tanyakan tentang teh kami?",["Cara menyeduh","Lihat peta rasa","Pesan"]]];
const lg=[];function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;ms.append(d);ms.scrollTop=1e9;if(c==="u")lg.push(t)}
function chips(a){cs.replaceChildren();a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>{const go=h=>{cp.classList.remove("on");location.hash=h};if(v==="Ritual seduh")go("seduh");else if(v==="Pesan")go("pesan");else if(v==="Hojicha")go("produk-4");else if(v==="Lihat peta rasa"){cp.classList.remove("on");if($("v-beranda").classList.contains("on"))$("rasa").scrollIntoView();else{pend="rasa";location.hash="beranda"}}else ask(v)};cs.append(b)})}
function waU(){cw.href=wl(`Halo ${BRAND}, saya menghubungi dari website.`+(lg.length?` Pertanyaan saya: ${lg.join("; ")}.`:" Saya ingin bertanya."))}
function ask(t){say(t,"u");if(/whatsapp|\bwa\b|admin|manusia/i.test(t)){setTimeout(()=>{say("Baik, tekan tombol di bawah. Pertanyaanmu ikut terkirim.","b");waU()},300);return}
const m=KB.find(([r])=>r.test(t.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab tim kami. Tekan WhatsApp di bawah, pertanyaanmu ikut terkirim.","b");chips(["Cara menyeduh","Pesan"])}waU()},400)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let fi=true;fab.onclick=()=>{cp.classList.toggle("on");if(cp.classList.contains("on")&&fi){fi=false;say("Selamat datang di Koharu. Saya bisa membantu soal pilihan teh, cara menyeduh, dan pemesanan.","b");chips(["Cara menyeduh","Lihat peta rasa","Pesan"]);waU()}};x.onclick=()=>cp.classList.remove("on");
document.querySelectorAll("[data-hash]").forEach(button=>button.onclick=()=>{location.hash=button.dataset.hash});
</script>
</body>
</html>
@endverbatim
