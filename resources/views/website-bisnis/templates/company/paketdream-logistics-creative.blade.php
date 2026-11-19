@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>PaketDream – Kirim dengan Senyum</title>
<link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@500;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
:root{--pp:#6C3BE8;--dk:#1E0B4B;--dk2:#2A1259;--lv:#C9B6FF;--lv2:#EFE8FF;--pk:#FF7AC6;--bt:#FFE27A;--cr:#FBF7FF;--mu:#6F6593;--ln:#E3DAF7;--h:'Unbounded',system-ui,sans-serif;--b:'Outfit',system-ui,sans-serif;
--gr:linear-gradient(135deg,#2A1259,#6C3BE8 55%,#FF7AC6);
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth}
body{margin:0;background:var(--cr);color:var(--dk);font:400 17px/1.65 var(--b);overflow-x:hidden}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
.w{max-width:1160px;margin:auto;padding:0 24px}
.btn{display:inline-flex;align-items:center;gap:8px;padding:15px 28px;border-radius:99px;border:0;background:var(--pk);color:var(--dk);font:600 16px var(--b);cursor:pointer;transition:.3s;box-shadow:0 10px 24px -10px rgba(255,122,198,.9)}
.btn:hover,.btn:focus-visible{transform:translateY(-3px) rotate(-1deg);outline:none;background:var(--bt)}
.btn.v{background:var(--pp);color:#fff;box-shadow:0 10px 24px -10px rgba(108,59,232,.9)}.btn.v:hover{background:var(--dk)}
.btn.o{background:transparent;color:#fff;box-shadow:inset 0 0 0 2px rgba(255,255,255,.55)}.btn.o:hover{background:#fff;color:var(--pp)}
header.n{position:fixed;top:env(safe-area-inset-top,0px);left:0;right:0;z-index:60;transition:.35s}
header.n.s{background:rgba(30,11,75,.9);}
header.n .w{display:flex;justify-content:space-between;align-items:center;padding-top:16px;padding-bottom:16px;color:#fff}
.lg{font:800 20px var(--h);letter-spacing:-.04em;display:flex;align-items:center;gap:10px}.lg svg{width:30px}
.nl{display:flex;gap:6px}.nl button{background:none;border:0;color:#fff;font:500 15px var(--b);padding:9px 16px;border-radius:99px;cursor:pointer}.nl button:hover{background:rgba(255,255,255,.16)}
@media(max-width:700px){.nl button:nth-child(n+3){display:none}}
.view{display:none}.view.on{display:block;animation:fd .6s}@keyframes fd{from{opacity:0;transform:translateY(14px)}}
/* hero */
.hero{background:var(--gr);color:#fff;position:relative;overflow:hidden;padding:150px 0 130px;border-radius:0 0 60px 60px}
.hero::before{content:"";position:absolute;inset:0;background:radial-gradient(circle,rgba(255,255,255,.55) 1.2px,transparent 1.6px) 0 0/46px 46px,radial-gradient(circle,rgba(255,255,255,.3) 1px,transparent 1.4px) 23px 23px/46px 46px;opacity:.5}
.hero .w{position:relative;display:grid;grid-template-columns:1.15fr .85fr;gap:30px;align-items:center}
.hero h1{font:800 clamp(34px,5.2vw,74px)/1.02 var(--h);letter-spacing:-.045em;margin:0 0 22px}.hero h1 em{font-style:normal;color:var(--bt);display:inline-block;transform:rotate(-2deg)}
.hero p{max-width:480px;font-size:19px;color:#E8DEFF;margin-bottom:28px}
.tp{display:flex;background:#fff;border-radius:99px;padding:7px 7px 7px 24px;max-width:520px;box-shadow:0 20px 40px -16px rgba(0,0,0,.5)}
.tp input{flex:1;border:0;outline:none;font:500 17px var(--b);min-width:0;color:var(--dk);text-transform:uppercase;background:none}.tp input::placeholder{text-transform:none;color:#A89BD0}
.tp .btn{box-shadow:none;padding:13px 26px}
.ex{margin-top:12px;font-size:14px;color:#D8CBFF;display:flex;gap:8px;flex-wrap:wrap;align-items:center}.ex button{background:rgba(255,255,255,.18);border:0;color:#fff;padding:3px 12px;border-radius:99px;font:500 13px var(--b);cursor:pointer}.ex button:hover{background:#fff;color:var(--pp)}
.hc{display:flex;gap:12px;flex-wrap:wrap;margin-top:24px}
.fb{position:relative;aspect-ratio:1}
.fb svg{position:absolute;filter:drop-shadow(0 20px 20px rgba(30,11,75,.4));animation:fl 6s ease-in-out infinite}
@keyframes fl{50%{transform:translateY(-16px) rotate(3deg)}}
@media(max-width:900px){.hero .w{grid-template-columns:1fr}.fb{max-width:340px;margin:auto;width:100%}}
.mq{overflow:hidden;white-space:nowrap;padding:22px 0;margin-top:-1px}.mq div{display:inline-block;animation:mq 34s linear infinite;font:700 clamp(20px,3vw,34px) var(--h);letter-spacing:-.03em;color:var(--lv)}.mq i{color:var(--pk);font-style:normal;margin:0 .6em}
@keyframes mq{to{transform:translateX(-50%)}}
section.s{padding:100px 0}
.sh{text-align:center;max-width:640px;margin:0 auto 60px}.sh h2{font:800 clamp(28px,4vw,52px)/1.05 var(--h);letter-spacing:-.04em}.sh p{color:var(--mu);margin-top:12px}
.tg{display:inline-block;font:600 13px var(--b);padding:5px 16px;border-radius:99px;background:var(--lv2);color:var(--pp);margin-bottom:14px}
/* journey */
.jr{position:relative;max-width:1000px;margin:auto}
.rl{position:absolute;left:50%;top:0;bottom:0;width:0;border-left:3px dashed var(--lv);transform:translateX(-50%)}
.pc{position:absolute;left:50%;top:0;width:64px;transform:translate(-50%,-50%);z-index:2;transition:top .15s linear}.pc svg{width:100%;filter:drop-shadow(0 10px 12px rgba(108,59,232,.5));animation:wg 1.4s ease-in-out infinite}@keyframes wg{50%{transform:rotate(8deg)}}
.js{display:grid;grid-template-columns:1fr 1fr;gap:100px;min-height:64vh;align-items:center}
.js .c{background:#fff;border-radius:30px;padding:34px;box-shadow:0 24px 50px -28px rgba(108,59,232,.6);border:2px solid var(--ln);transition:.5s;opacity:.4;transform:scale(.96)}
.js.on .c{opacity:1;transform:none;border-color:var(--pp)}
.js:nth-child(odd) .c{grid-column:1}.js:nth-child(even) .c{grid-column:2}
.js .c b{font:800 52px/1 var(--h);color:var(--lv);letter-spacing:-.05em}.js.on .c b{color:var(--pk)}.js h3{font:700 24px/1.1 var(--h);letter-spacing:-.03em;margin:8px 0}.js p{color:var(--mu)}
@media(max-width:760px){.rl{left:22px}.pc{left:22px;width:46px}.js{grid-template-columns:1fr;gap:0;padding-left:56px;min-height:46vh}.js:nth-child(n) .c{grid-column:1}}
.sv{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.tk{background:#fff;border-radius:30px;padding:32px;text-align:left;font:inherit;color:inherit;cursor:pointer;border:2px solid var(--ln);position:relative;transition:.35s;overflow:hidden}
.tk::after{content:"";position:absolute;right:-30px;top:-30px;width:130px;height:130px;border-radius:50%;background:var(--c);opacity:.5;transition:.5s}
.tk:hover{transform:translateY(-8px) rotate(-1deg);border-color:var(--pp)}.tk:hover::after{transform:scale(1.6)}
.tk small{display:inline-block;background:var(--lv2);color:var(--pp);font:600 12.5px var(--b);padding:3px 12px;border-radius:99px}.tk h3{font:800 26px/1.05 var(--h);letter-spacing:-.04em;margin:16px 0 10px;position:relative}.tk p{color:var(--mu);font-size:15.5px;position:relative}.tk em{display:block;margin-top:18px;font:600 15px var(--b);font-style:normal;color:var(--pp);position:relative}
@media(max-width:860px){.sv{grid-template-columns:1fr}}
.cs{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.cc{border-radius:30px;padding:30px;color:#fff;text-align:left;font:inherit;border:0;cursor:pointer;background:var(--c);transition:.35s;display:flex;flex-direction:column;gap:10px;min-height:280px}
.cc:hover{transform:translateY(-8px) rotate(1deg)}.cc small{opacity:.85;font-weight:500}.cc h3{font:800 23px/1.1 var(--h);letter-spacing:-.04em}.cc q{font-size:15.5px;opacity:.92}.cc em{margin-top:auto;font:600 15px var(--b);font-style:normal}
@media(max-width:860px){.cs{grid-template-columns:1fr}}
.bd{background:var(--gr);color:#fff;border-radius:44px;padding:clamp(34px,6vw,70px);display:flex;justify-content:space-between;align-items:center;gap:30px;flex-wrap:wrap;position:relative;overflow:hidden}.bd h2{font:800 clamp(26px,3.6vw,46px)/1.05 var(--h);letter-spacing:-.04em;max-width:560px}.bd p{margin-top:12px;color:#E8DEFF;max-width:480px}
footer{padding:60px 0 40px;margin-top:70px;background:var(--dk);color:#B9ACE0}footer .w{display:flex;justify-content:space-between;gap:30px;flex-wrap:wrap}footer p{max-width:560px;font-size:13px;line-height:1.7;margin-top:10px}footer button{background:none;border:0;color:inherit;font:inherit;cursor:pointer;padding:0;margin-right:18px}footer button:hover{color:#fff}
/* subhalaman */
.ph{background:var(--gr);color:#fff;padding:140px 0 70px;border-radius:0 0 50px 50px;position:relative;overflow:hidden}
.ph::after{content:"";position:absolute;right:-60px;bottom:-80px;width:280px;height:280px;border-radius:50%;background:rgba(255,226,122,.25)}
.ph .w{position:relative}.cr{font-size:14px;color:#D8CBFF;margin-bottom:14px}.cr a{color:#fff;font-weight:600;text-decoration:underline}
.ph h1{font:800 clamp(30px,4.6vw,60px)/1.03 var(--h);letter-spacing:-.045em;margin:6px 0 14px}.ph p{max-width:600px;color:#E8DEFF;font-size:18px}
.sp{padding:56px 0 20px}
.cd{background:#fff;border:2px solid var(--ln);border-radius:30px;padding:30px}
.ln2{display:grid;grid-template-columns:1.1fr .9fr;gap:26px;align-items:start}
@media(max-width:900px){.ln2{grid-template-columns:1fr}}
.bt2{background:var(--dk);border-radius:30px;padding:20px;position:sticky;top:90px}.bt2 svg{width:100%;display:block;overflow:visible}
.ev{position:relative;padding:0 0 18px 34px}.ev::before{content:"";position:absolute;left:0;top:4px;width:18px;height:18px;border-radius:50%;background:#fff;border:3px solid var(--ln)}.ev.d::before{background:var(--pp);border-color:var(--pp)}.ev.c::before{background:var(--pk);border-color:var(--pk);box-shadow:0 0 0 7px rgba(255,122,198,.28)}.ev.p{opacity:.45}
.ev b{display:block;font:700 15.5px var(--b)}.ev small{color:var(--mu);font-size:14px}
.pl{display:inline-block;font:700 13.5px var(--b);padding:5px 16px;border-radius:99px;background:var(--lv2);color:var(--pp)}.pl.ok{background:#D8FFEF;color:#0F8A5A}
.fa{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:26px}.fa div{background:var(--lv2);border-radius:18px;padding:14px 16px}.fa small{display:block;font:600 11.5px var(--b);color:var(--mu);text-transform:uppercase;letter-spacing:.08em}.fa b{font:700 17px var(--b)}
.km{display:grid;grid-template-columns:1fr 1fr;gap:26px;align-items:start}@media(max-width:900px){.km{grid-template-columns:1fr}}
.fm label{display:block;font:600 14px var(--b);color:var(--mu);margin:20px 0 8px}.fm label:first-child{margin-top:0}
.fm select,.fm input[type=text],.fm input[type=number],.fm textarea{width:100%;padding:13px 16px;border-radius:16px;border:2px solid var(--ln);background:#fff;font:400 16px var(--b);color:var(--dk);outline:none}.fm select:focus,.fm input:focus,.fm textarea:focus{border-color:var(--pp)}
.pls{display:flex;flex-wrap:wrap;gap:8px}.pls button{padding:10px 18px;border-radius:99px;border:2px solid var(--ln);background:#fff;font:500 15px var(--b);cursor:pointer;color:var(--dk);transition:.2s}.pls button:hover{border-color:var(--pp)}.pls button[aria-pressed=true]{background:var(--pp);border-color:var(--pp);color:#fff}
.r2{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.vz{background:var(--lv2);border-radius:30px;padding:26px;text-align:center;position:sticky;top:90px}
.vz svg{width:70%;max-width:240px;display:block;margin:0 auto 6px;overflow:visible}
.vz .pr{font:800 clamp(30px,4vw,42px)/1.05 var(--h);letter-spacing:-.04em;color:var(--pp);margin:6px 0}.vz small{color:var(--mu)}
.mt{height:14px;border-radius:99px;background:#fff;overflow:hidden;margin:12px 0 6px}.mt i{display:block;height:100%;background:linear-gradient(90deg,var(--pk),var(--pp));border-radius:99px;transition:width .6s}
.wn{margin:12px 0;padding:10px 14px;border-radius:14px;font-size:14.5px;text-align:left}.wn.b{background:#FFF1C9;color:#7A5200}.wn.g{background:#D8FFEF;color:#0F6E4A}
.fl{display:grid;grid-template-columns:.7fr 1.3fr;gap:40px;margin-top:50px}.fl h2{font:800 22px var(--h);letter-spacing:-.03em}.fl ul{list-style:none;padding:0;margin:0}.fl li{padding:12px 0 12px 34px;position:relative;border-top:2px dashed var(--ln)}.fl li::before{content:"✦";position:absolute;left:4px;color:var(--pk)}.fl p{color:var(--mu)}
@media(max-width:800px){.fl{grid-template-columns:1fr;gap:12px}}
.mm{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin:10px 0}.mm div{background:var(--lv2);border-radius:22px;padding:22px}.mm b{font:800 32px/1 var(--h);letter-spacing:-.04em;color:var(--pp);display:block}.mm small{color:var(--mu)}
.pn{display:flex;justify-content:space-between;gap:14px;margin-top:50px;flex-wrap:wrap}
/* chat */
#fab{position:fixed;left:20px;bottom:calc(20px + env(safe-area-inset-bottom,0px));z-index:80;width:72px;height:72px;border-radius:50%;border:0;background:#fff;box-shadow:0 14px 30px -8px rgba(108,59,232,.7);cursor:pointer;padding:10px;animation:wg 2.4s ease-in-out infinite}#fab svg{width:100%}
#cp{position:fixed;left:20px;bottom:calc(104px + env(safe-area-inset-bottom,0px));z-index:80;width:min(370px,calc(100vw - 40px));height:min(500px,70vh);background:#fff;border-radius:28px 28px 28px 8px;box-shadow:0 30px 70px -10px rgba(30,11,75,.55);display:none;flex-direction:column;overflow:hidden}#cp.on{display:flex;animation:fd .4s}
#cp header{background:var(--gr);color:#fff;padding:16px 20px;display:flex;justify-content:space-between;align-items:center}#cp header b{font:700 16px var(--h);letter-spacing:-.03em}#cp header button{background:none;border:0;color:#fff;font-size:24px;cursor:pointer}
#ms{flex:1;overflow-y:auto;padding:16px;display:flex;flex-direction:column;gap:10px;background:var(--cr);font-size:15.5px}
.m{max-width:86%;padding:10px 16px;line-height:1.5;animation:fd .35s}.m.b{background:#fff;border:2px solid var(--ln);border-radius:20px 20px 20px 4px;align-self:flex-start}.m.u{background:var(--pp);color:#fff;border-radius:20px 20px 4px 20px;align-self:flex-end}
.cps{display:flex;flex-wrap:wrap;gap:6px;padding:10px 16px 0}.cps button{padding:6px 14px;border-radius:99px;border:2px solid var(--lv);background:#fff;color:var(--pp);font:600 13px var(--b);cursor:pointer}.cps button:hover{background:var(--pp);color:#fff;border-color:var(--pp)}
#cf{display:flex;gap:8px;padding:12px 16px}#cf input{flex:1;padding:12px 16px;border:2px solid var(--ln);border-radius:99px;font:400 15px var(--b);outline:none;min-width:0}#cf input:focus{border-color:var(--pp)}#cf button{width:44px;border:0;border-radius:50%;background:var(--pk);color:var(--dk);cursor:pointer;font-size:16px}
#cw{display:block;text-align:center;padding:11px;background:#1FA855;color:#fff;font:600 14px var(--b)}
:focus-visible{outline:3px solid var(--pk);outline-offset:3px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}
#paketdream-menu-button{display:none;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.35);border-radius:50%;width:44px;height:44px;color:#fff;font-size:22px;cursor:pointer}#paketdream-menu{position:fixed;inset:76px 0 0;z-index:55;background:var(--dk);padding:18px 24px 28px;overflow-y:auto;visibility:hidden;opacity:0;pointer-events:none;transform:translateY(-110%);transition:.35s}#paketdream-menu.open{visibility:visible;opacity:1;pointer-events:auto;transform:none}#paketdream-menu button{display:block;width:100%;padding:16px 0;border:0;border-bottom:1px solid rgba(255,255,255,.16);background:none;text-align:left;color:#fff;font:600 18px var(--b);cursor:pointer}@media(max-width:700px){.nl{display:none!important}#paketdream-menu-button{display:block}}</style>
</head>
<body>
<header class="n" id="hn"><div class="w"><a class="lg" href="#beranda" id="lgo"></a><div class="nl"><button data-s="perjalanan">Perjalanan</button><button data-s="layanan">Layanan</button><button data-s="kisah">Kisah</button><button data-s="kontak">Gabung</button></div><button id="paketdream-menu-button" type="button" aria-expanded="false" aria-controls="paketdream-menu" aria-label="Buka menu navigasi">☰</button></div></header><nav id="paketdream-menu" aria-hidden="true"><button type="button" data-s="perjalanan">Perjalanan</button><button type="button" data-s="layanan">Layanan</button><button type="button" data-s="kisah">Kisah</button><button type="button" data-s="kontak">Gabung</button></nav>

<main>
<div class="view" id="v-beranda">
<section class="hero"><div class="w"><div><h1>Kirim apa saja, sampai <em>dengan senyum.</em></h1><p>Paket kecil, pesanan toko, sampai kiriman besar. Dijemput, dilacak, dan diantar dengan cara yang menyenangkan.</p>
<form class="tp" id="tf"><input id="ti" placeholder="Masukkan nomor resi…" aria-label="Nomor resi" autocomplete="off"><button class="btn">Lacak</button></form>
<div class="ex" id="ex">Coba: <button data-r="PD2026001">PD2026001</button><button data-r="PD2026002">PD2026002</button><button data-r="PD2026003">PD2026003</button></div>
<div class="hc"><a class="btn" href="#kemas">Kemas dan hitung ongkir</a><a class="btn o" href="#mitra">Jadi mitra</a></div></div><div class="fb" id="fb"></div></div></section>
<div class="mq" aria-hidden="true"><div id="mq"></div></div>
<section class="s" id="perjalanan"><div class="w"><div class="sh"><span class="tg">Perjalanan sebuah paket</span><h2>Ikuti paketmu dari pintu ke pintu.</h2><p>Gulir ke bawah dan lihat paket kecil ini melewati empat pos perjalanannya.</p></div>
<div class="jr" id="jr"><div class="rl"></div><div class="pc" id="pcl"></div></div></div></section>
<section class="s" id="layanan" style="padding-top:20px"><div class="w"><div class="sh"><span class="tg">Layanan</span><h2>Pilih kecepatan yang pas.</h2></div><div class="sv" id="sv"></div></div></section>
<section class="s" id="kisah" style="padding-top:20px"><div class="w"><div class="sh"><span class="tg">Kisah pengirim</span><h2>Mereka tumbuh, paketnya ikut melaju.</h2></div><div class="cs" id="cs"></div></div></section>
<section id="kontak"><div class="w"><div class="bd"><div><h2>Punya kios atau toko? Jadi titik antar-jemput kami.</h2><p>Tambah penghasilan dengan melayani paket tetangga di sekitar Anda.</p></div><a class="btn" href="#mitra" style="background:var(--bt)">Gabung jadi mitra →</a></div></div></section>
</div>
<div class="view" id="v-sub"></div>
</main>
<footer><div class="w"><div><div class="lg" style="color:#fff"><span id="lg2"></span></div><p>Template contoh. Seluruh nama, angka, tarif, dan data pengiriman adalah contoh dan perlu diganti. Estimasi bukan penawaran, dan tarif serta waktu final dikonfirmasi tim kami. Pengiriman barang tertentu tunduk pada ketentuan yang berlaku.</p></div><div><button data-hash="kemas">Studio kemas</button><button data-hash="mitra">Jadi mitra</button></div></div></footer>

<button id="fab" aria-label="Tanya Pak Paket"></button>
<aside id="cp" role="dialog" aria-label="Pak Paket"><header><b>Pak Paket</b><button id="x" aria-label="Tutup">×</button></header><div id="ms"></div><div class="cps" id="cps"></div><form id="cf"><input id="ci" placeholder="Tanya atau ketik nomor resi…" autocomplete="off" aria-label="Pesan"><button aria-label="Kirim">➤</button></form><a id="cw" href="#" target="_blank" rel="noopener">Lanjut ke WhatsApp →</a></aside>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="PaketDream";
const replaceMarkup=(el,markup)=>{el.replaceChildren();const range=document.createRange();range.selectNode(el);el.append(range.createContextualFragment(markup))};const appendMarkup=(el,markup)=>{const range=document.createRange();range.selectNode(el);el.append(range.createContextualFragment(markup))};const $=i=>document.getElementById(i),wl=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t),rp=n=>"Rp "+Math.round(n).toLocaleString("id-ID");
/* gambar kotak */
const box=(c,w)=>`<svg viewBox="0 0 120 110" style="${w||""}" aria-hidden="true"><path d="M60 8L108 30V80L60 102L12 80V30Z" fill="${c}"/><path d="M60 8L108 30L60 52L12 30Z" fill="#fff" opacity=".28"/><path d="M60 52V102L12 80V30Z" fill="#000" opacity=".12"/><path d="M42 18L90 40V56L78 50V36L30 14Z" fill="#FFE27A"/><circle cx="46" cy="72" r="3" fill="#1E0B4B"/><circle cx="72" cy="78" r="3" fill="#1E0B4B"/><path d="M50 84q8 6 16 0" stroke="#1E0B4B" stroke-width="2.4" fill="none" stroke-linecap="round"/></svg>`;
replaceMarkup($("lgo"),box("#FF7AC6","width:30px")+"PAKETDREAM");replaceMarkup($("lg2"),"PAKETDREAM");replaceMarkup($("pcl"),box("#FF7AC6"));replaceMarkup($("fab"),box("#6C3BE8"));
replaceMarkup($("fb"),box("#FF7AC6","left:8%;top:22%;width:58%")+box("#FFE27A","right:0;top:0;width:36%;animation-delay:-2s")+box("#C9B6FF","right:6%;bottom:2%;width:44%;animation-delay:-4s"));
replaceMarkup($("mq"),("Jakarta<i>✦</i>Bandung<i>✦</i>Surabaya<i>✦</i>Medan<i>✦</i>Makassar<i>✦</i>Denpasar<i>✦</i>").repeat(5));
addEventListener("scroll",()=>hn.classList.toggle("s",scrollY>40),{passive:true});
/* data */
const HUB=[["Jakarta",-6.2,106.8],["Bandung",-6.9,107.6],["Surabaya",-7.3,112.7],["Medan",3.6,98.7],["Makassar",-5.1,119.4],["Denpasar",-8.7,115.2]];
const ST=["Pesanan dibuat","Dijemput kurir","Tiba di hub asal","Dalam perjalanan","Tiba di hub tujuan","Sedang diantar","Diterima"],SS=["Dibuat","Dijemput","Hub asal","Jalan","Hub tujuan","Diantar","Tiba"];
const SH={PD2026001:{o:0,d:1,s:"Reguler",kg:2,st:3,eta:"besok sore"},PD2026002:{o:2,d:5,s:"Kilat",kg:1,st:6,eta:"sudah diterima"},PD2026003:{o:3,d:0,s:"Reguler",kg:6,st:1,eta:"3 hari lagi"}};
const SVC=[{n:"Kilat",tg:"Hari yang sama",c:"#FFE27A",d:"Antar dalam kota di hari yang sama, cocok untuk kejutan, dokumen, dan pesanan mendadak.",ft:["Penjemputan dalam hitungan jam","Pelacakan langsung di halaman ini","Bukti terima dengan foto","Cocok untuk kiriman bernilai sentimental"],cp:"Pengirim yang butuh paket sampai hari ini juga.",ce:0},{n:"Reguler",tg:"Antar kota",c:"#C9B6FF",d:"Pengiriman antar kota dengan harga bersahabat dan jadwal yang jelas.",ft:["Jadwal berangkat harian","Konsolidasi di hub untuk menekan biaya","Opsi proteksi tambahan","Penjemputan ke alamat"],cp:"Penjual online dan pengirim rutin yang mengutamakan hemat.",ce:1},{n:"Kargo dan fulfillment",tg:"Untuk bisnis",c:"#FF7AC6",d:"Kiriman besar, penyimpanan, dan pengemasan pesanan untuk bisnis yang sedang tumbuh.",ft:["Kargo darat dan laut","Gudang dengan pengelolaan stok","Pick, pack, dan kirim pesanan","Laporan pengiriman berkala"],cp:"Brand dan toko online dengan pesanan harian yang terus bertambah.",ce:2}];
const CE=[{n:"Toko kue rumahan naik kelas",k:"UMKM kuliner",c:"#6C3BE8",q:"Kue tiba utuh dan cantik, pelanggan jadi berani pesan dari luar kota.",ch:"Kue mudah rusak, dan pembeli di luar kota ragu memesan karena takut penyok.",sl:"Kemasan berlapis dari studio kemas, pengiriman kilat untuk kota terdekat, dan pelacakan yang bisa dibagikan ke pembeli.",m:[["2x","pesanan antar kota"],["-60%","keluhan kemasan"],["1 hari","rata-rata sampai"]],sv:[0,1]},{n:"Brand fashion lokal melaju",k:"E-commerce fashion",c:"#E0509E",q:"Kami fokus mendesain, urusan gudang dan kirim sudah beres.",ch:"Pesanan melonjak saat promo dan tim kewalahan mengemas sendiri.",sl:"Fulfillment di gudang mitra: stok, pengemasan, dan pengiriman dilakukan dalam satu alur.",m:[["24 jam","dari pesanan ke kirim"],["3x","volume saat promo"],["-35%","salah kirim"]],sv:[2,1]},{n:"Pengrajin keramik tembus pasar baru",k:"Kerajinan",c:"#2F8F83",q:"Barang pecah belah kami akhirnya aman sampai ke tangan pembeli.",ch:"Keramik rawan pecah dan kerap rusak di perjalanan.",sl:"Kemasan proteksi maksimal, asuransi pengiriman, dan rute langsung tanpa banyak transit.",m:[["-80%","barang pecah"],["5","kota baru"],["4,9","kepuasan pembeli (contoh)"]],sv:[1,0]}];
const JS=[["Dijemput di depan pintumu","Kurir datang ke alamatmu, mencatat, dan menimbang paket di tempat."],["Disortir tanpa drama","Di hub, paket dipilah rapi dan diberi rute terbaik menuju kota tujuan."],["Meluncur lintas kota","Paket berpindah lewat jalur darat, laut, atau udara sesuai layananmu."],["Diantar dengan senyum","Kurir terakhir mengantar ke penerima dan mengabadikan bukti terima."]];
appendMarkup($("jr"),JS.map((j,i)=>`<div class="js"><div class="c"><b>0${i+1}</b><h3>${j[0]}</h3><p>${j[1]}</p></div></div>`).join(""));
function jp(){const r=jr.getBoundingClientRect(),p=Math.max(0,Math.min(1,(innerHeight*.55-r.top)/r.height));pcl.style.top=(p*100)+"%";const a=Math.min(3,Math.floor(p*4));jr.querySelectorAll(".js").forEach((e,i)=>e.classList.toggle("on",i===a))}
addEventListener("scroll",jp,{passive:true});jp();
replaceMarkup($("sv"),SVC.map((s,i)=>`<button class="tk" style="--c:${s.c}" data-i="${i}"><small>${s.tg}</small><h3>${s.n}</h3><p>${s.d.split(",")[0].replace(/\.$/,"")}.</p><em>Lihat detail →</em></button>`).join(""));
sv.onclick=e=>{const b=e.target.closest(".tk");if(b)location.hash="layanan-"+(+b.dataset.i+1)};
replaceMarkup($("cs"),CE.map((c,i)=>`<button class="cc" style="--c:${c.c}" data-i="${i}"><small>${c.k}</small><h3>${c.n}</h3><q>${c.q}</q><em>Baca kisahnya →</em></button>`).join(""));
cs.onclick=e=>{const b=e.target.closest(".cc");if(b)location.hash="cerita-"+(+b.dataset.i+1)};
tf.onsubmit=e=>{e.preventDefault();const v=ti.value.trim().toUpperCase().replace(/[^A-Z0-9]/g,"");if(v)location.hash="lacak-"+v};
ex.onclick=e=>{const b=e.target.closest("button");if(b)location.hash="lacak-"+b.dataset.r};
/* subhalaman */
const tm=h=>new Date(Date.now()-h*36e5).toLocaleString("id-ID",{day:"numeric",month:"short",hour:"2-digit",minute:"2-digit"});
const crumb=(...a)=>`<div class="cr"><a href="#beranda">Beranda</a>${a.map(x=>" / "+x).join("")}</div>`;
const head=(c,t,p)=>`<div class="ph"><div class="w">${c}<h1>${t}</h1>${p?`<p>${p}</p>`:""}</div></div>`;
function lacak(id){const s=SH[id];
if(!s)return head(crumb("Lacak"),"Resi belum ketemu",`Nomor ${id} belum terdaftar. Periksa lagi, atau tanya Pak Paket.`)+`<div class="w sp"><div class="cd"><p>Coba: <a href="#lacak-PD2026001" style="color:var(--pp);font-weight:600">PD2026001</a>, <a href="#lacak-PD2026002" style="color:var(--pp);font-weight:600">PD2026002</a>, atau <a href="#lacak-PD2026003" style="color:var(--pp);font-weight:600">PD2026003</a>.</p><p style="margin-top:16px"><a class="btn v" target="_blank" rel="noopener" href="${wl("Halo "+BRAND+", saya ingin menanyakan resi "+id+".")}">Tanya lewat WhatsApp</a></p></div></div>`;
const done=s.st===6,ev=ST.map((t,i)=>`<div class="ev ${i<s.st||done?"d":i===s.st?"c":"p"}"><b>${t}</b><small>${i<=s.st?tm((s.st-i)*5+1)+" · "+HUB[i<4?s.o:s.d][0]:"Perkiraan "+s.eta}</small></div>`).join("");
return head(crumb("Lacak",id),id,`${HUB[s.o][0]} → ${HUB[s.d][0]} · ${s.s}`)+`<div class="w sp"><div class="ln2"><div class="cd"><div class="fa"><div><small>Status</small><b><span class="pl${done?" ok":""}">${done?"Diterima":ST[s.st]}</span></b></div><div><small>Layanan</small><b>${s.s}</b></div><div><small>Berat</small><b>${s.kg} kg</b></div></div><h3 style="font:800 20px var(--h);letter-spacing:-.03em;margin-bottom:18px">Riwayat perjalanan</h3>${ev}<p style="color:var(--mu);font-size:14px">Perkiraan tiba: <b>${s.eta}</b>. Data demo.</p></div>
<div><div class="bt2" id="bt2"><svg viewBox="0 0 800 270" id="bsv"><path id="tp" d="M50 50H720Q760 50 760 90Q760 130 720 130H80Q40 130 40 170Q40 210 80 210H750" fill="none" stroke="#3B2776" stroke-width="14" stroke-linecap="round"/></svg></div><div style="margin-top:16px;display:flex;gap:10px;flex-wrap:wrap"><a class="btn v" target="_blank" rel="noopener" href="${wl("Halo "+BRAND+", saya ingin menanyakan resi "+id+".")}">Tanya Pak Paket</a><a class="btn" href="#kemas">Kirim paket baru</a></div></div></div></div>`}
function board(id){const s=SH[id],svg=$("bsv"),p=$("tp"),L=p.getTotalLength(),N="http://www.w3.org/2000/svg",pts=[...Array(7)].map((_,i)=>p.getPointAtLength(L*i/6)),mk=(t,a)=>{const e=document.createElementNS(N,t);for(const k in a)e.setAttribute(k,a[k]);return e};
const pr=mk("path",{d:p.getAttribute("d"),fill:"none",stroke:"#FF7AC6","stroke-width":14,"stroke-linecap":"round","stroke-dasharray":L,"stroke-dashoffset":L});svg.appendChild(pr);pr.style.transition="stroke-dashoffset 1.6s ease";requestAnimationFrame(()=>pr.setAttribute("stroke-dashoffset",L-L*s.st/6));
pts.forEach((q,i)=>{const on=i<=s.st;svg.appendChild(mk("circle",{cx:q.x,cy:q.y,r:12,fill:on?"#FFE27A":"#2A1259",stroke:"#fff","stroke-width":3}));const t=mk("text",{x:q.x,y:q.y+(i%2?-24:34),"text-anchor":"middle",fill:"#C9B6FF","font-size":15,"font-family":"Outfit"});t.textContent=SS[i];svg.appendChild(t)});
const g=mk("g",{transform:`translate(${pts[s.st].x-30} ${pts[s.st].y-66})`});appendMarkup(g,box("#FF7AC6",""));const inner=g.firstChild;inner.setAttribute("width",60);inner.setAttribute("height",55);svg.appendChild(g)}
function layanan(i){const s=SVC[i];return head(crumb("Layanan",s.n),s.n,s.d)+`<div class="w sp"><div class="fl" style="margin-top:0"><h2>Yang kamu dapat</h2><ul>${s.ft.map(x=>`<li>${x}</li>`).join("")}</ul></div><div class="fl"><h2>Cocok untuk</h2><p>${s.cp}</p></div><div class="fl"><h2>Kisah terkait</h2><ul><li><a href="#cerita-${s.ce+1}" style="color:var(--pp);font-weight:600">${CE[s.ce].n} →</a></li></ul></div><div class="pn"><a class="btn" href="#kemas">Hitung ongkir di studio kemas</a><a class="btn v" href="#mitra">Jadi mitra</a></div></div>`}
function cerita(i){const c=CE[i],nx=(i+1)%3;return head(crumb("Kisah",c.n),c.n,c.k)+`<div class="w sp"><div class="mm">${c.m.map(m=>`<div><b>${m[0]}</b><small>${m[1]}</small></div>`).join("")}</div><p style="color:var(--mu);font-size:13.5px">Angka contoh untuk tampilan template.</p><div class="fl"><h2>Tantangan</h2><p>${c.ch}</p></div><div class="fl"><h2>Solusi</h2><p>${c.sl}</p></div><div class="fl"><h2>Layanan yang dipakai</h2><ul>${c.sv.map(j=>`<li><a href="#layanan-${j+1}" style="color:var(--pp);font-weight:600">${SVC[j].n} →</a></li>`).join("")}</ul></div><div class="pn"><a class="btn v" href="#kemas">Coba studio kemas</a><a class="btn" href="#cerita-${nx+1}">${CE[nx].n} →</a></div></div>`}
/* studio kemas */
const SZ=[["S","Kecil · hingga 2 kg",12000,.9],["M","Sedang · hingga 5 kg",20000,1.05],["L","Besar · hingga 12 kg",35000,1.2],["XL","Jumbo · hingga 25 kg",60000,1.35]],IT=[["Pakaian",.2],["Makanan",.5],["Elektronik",.6],["Pecah belah",.9]];
let K={o:0,d:1,z:1,i:2,sp:0,b:false,c:false,a:false,v:500000};
const dist=(a,b)=>{const t=x=>x*Math.PI/180,A=HUB[a],B=HUB[b],dl=t(B[1]-A[1]),dn=t(B[2]-A[2]),h=Math.sin(dl/2)**2+Math.cos(t(A[1]))*Math.cos(t(B[1]))*Math.sin(dn/2)**2;return 12742*Math.asin(Math.sqrt(h))};
function kemas(){const op=HUB.map((h,i)=>`<option value="${i}">${h[0]}</option>`).join("");
return head(crumb("Studio kemas"),"Studio kemas dan ongkir","Susun kemasan, lihat ongkirnya, cek seberapa aman paketmu.")+`<div class="w sp"><div class="km"><div class="cd fm"><div class="r2"><div><label for="ko">Dari</label><select id="ko">${op}</select></div><div><label for="kd">Ke</label><select id="kd">${op}</select></div></div><label>Ukuran kotak</label><div class="pls" id="kz">${SZ.map((s,i)=>`<button type="button" data-i="${i}" title="${s[1]}">${s[0]} · ${s[1].split(" · ")[1]}</button>`).join("")}</div><label>Isi paket</label><div class="pls" id="ki">${IT.map((s,i)=>`<button type="button" data-i="${i}">${s[0]}</button>`).join("")}</div><label>Kecepatan</label><div class="pls" id="ks"><button type="button" data-i="0">Reguler</button><button type="button" data-i="1">Kilat</button></div><label>Perlindungan tambahan</label><div class="pls" id="kp"><button type="button" data-k="b">Bubble wrap</button><button type="button" data-k="c">Kardus ganda</button><button type="button" data-k="a">Asuransi</button></div><label for="kv">Nilai barang (Rp), untuk asuransi</label><input type="number" id="kv" min="0" step="50000" value="${K.v}"></div>
<div class="vz" id="vz"></div></div></div>`}
function kcalc(){$("ko").value=K.o;$("kd").value=K.d;
[["kz","z"],["ki","i"],["ks","sp"]].forEach(([id,k])=>$(id).querySelectorAll("button").forEach(b=>b.setAttribute("aria-pressed",+b.dataset.i===K[k])));$("kp").querySelectorAll("button").forEach(b=>b.setAttribute("aria-pressed",K[b.dataset.k]));
const dk=dist(K.o,K.d),z=SZ[K.z],it=IT[K.i],same=K.o===K.d;let pr=same?0:z[2]*(1+dk/1000*.9)*(K.sp?1.8:1);if(K.b)pr+=4000;if(K.c)pr+=6000;if(K.a)pr+=Math.max(0,K.v)*.015;if(same)pr=0;
const eta=same?"-":K.sp?(dk<150?"hari yang sama":Math.ceil(dk/900)+" hari"):Math.ceil(dk/600)+1+" hari";
const sc=Math.min(100,30+(K.b?25:0)+(K.c?20:0)+(K.a?20:0)),need=it[1]*100,ok=sc>=need;
replaceMarkup($("vz"),`<div style="position:relative">${box("#FF7AC6")}${K.b?`<svg viewBox="0 0 120 110" style="position:absolute;left:15%;top:0;width:70%;opacity:.7"><g fill="#fff">${[...Array(10)].map((_,i)=>`<circle cx="${20+(i%5)*20}" cy="${40+Math.floor(i/5)*22}" r="5"/>`).join("")}</g></svg>`:""}</div><small>${z[1]}${K.c?" · kardus ganda":""}</small><div class="pr">${same?"Pilih kota berbeda":rp(pr)}</div><small>Perkiraan tiba: ${eta} · ±${Math.round(dk)} km</small>
<div style="text-align:left;margin-top:16px;font:600 14px var(--b);display:flex;justify-content:space-between"><span>Skor perlindungan</span><span>${sc}/100</span></div><div class="mt"><i style="width:${sc}%"></i></div><div class="wn ${ok?"g":"b"}">${ok?`Perlindungan sudah cukup untuk ${it[0].toLowerCase()}.`:`${it[0]} butuh perlindungan lebih. Tambahkan bubble wrap, kardus ganda, atau asuransi.`}</div>
<a class="btn v" style="width:100%;justify-content:center;margin-top:8px" target="_blank" rel="noopener" href="${wl(`Halo ${BRAND}, saya ingin kirim ${it[0].toLowerCase()} dari ${HUB[K.o][0]} ke ${HUB[K.d][0]}, kotak ${z[0]}, ${K.sp?"Kilat":"Reguler"}${K.b?", bubble wrap":""}${K.c?", kardus ganda":""}${K.a?", asuransi (nilai "+rp(K.v)+")":""}. Estimasi ${rp(pr)}, tiba ${eta}. Mohon konfirmasi.`)}">Pesan lewat WhatsApp</a><p style="font-size:12px;color:var(--mu);margin-top:12px;line-height:1.5">Estimasi kasar dengan tarif contoh. Tarif final dikonfirmasi tim kami.</p>`);}
function kbind(){["ko","kd"].forEach((id,j)=>$(id).onchange=e=>{K[j?"d":"o"]=+e.target.value;kcalc()});$("kv").oninput=e=>{K.v=+e.target.value||0;kcalc()};
[["kz","z"],["ki","i"],["ks","sp"]].forEach(([id,k])=>$(id).onclick=e=>{const b=e.target.closest("button");if(b){K[k]=+b.dataset.i;kcalc()}});$("kp").onclick=e=>{const b=e.target.closest("button");if(b){K[b.dataset.k]=!K[b.dataset.k];kcalc()}};kcalc()}
function mitra(){return head(crumb("Mitra"),"Jadi titik antar-jemput","Punya kios, toko, atau ruko? Layani paket tetanggamu dan dapatkan penghasilan tambahan.")+`<div class="w sp"><div class="km"><div class="cd fm"><label for="mn">Nama</label><input type="text" id="mn" placeholder="Nama lengkap"><label for="mc">Kontak (WhatsApp)</label><input type="text" id="mc" placeholder="Nomor WhatsApp"><div class="r2"><div><label for="mk">Kota</label><input type="text" id="mk" placeholder="Kota"></div><div><label for="mt">Jenis tempat</label><select id="mt"><option>Kios atau warung</option><option>Toko</option><option>Ruko</option><option>Rumah</option></select></div></div><label for="mm">Ceritakan tempat Anda</label><textarea id="mm" rows="3" placeholder="Luas, jam buka, dan pengalaman (opsional)"></textarea><a class="btn v" id="mw" href="#" target="_blank" rel="noopener" style="margin-top:24px;width:100%;justify-content:center">Kirim minat ke WhatsApp</a></div>
<div class="fl" style="grid-template-columns:1fr;margin:0;gap:12px"><h2>Yang kamu dapat</h2><ul><li>Penghasilan dari setiap paket yang diterima dan dikirim</li><li>Pelatihan singkat dan perlengkapan awal</li><li>Aplikasi atau panel untuk mencatat paket</li><li>Dukungan tim lapangan</li></ul><p style="font-size:13px">Skema penghasilan dan syarat kemitraan dijelaskan lengkap saat diskusi.</p></div></div></div>`}
function mupd(){$("mw").href=wl(`Halo ${BRAND}, saya ${$("mn").value||"calon mitra"} dari ${$("mk").value||"(kota)"}. Saya tertarik jadi titik antar-jemput. Tempat: ${$("mt").value}.${$("mm").value?" Info: "+$("mm").value:""} Kontak: ${$("mc").value||"-"}.`)}
/* router */
let pend=null;
function route(){let h=location.hash.slice(1)||"beranda",m,html=null,t="PaketDream – Kirim dengan Senyum",after=null;
if(m=h.match(/^lacak-([A-Za-z0-9]+)$/)){const id=m[1].toUpperCase();html=lacak(id);t="Lacak "+id;if(SH[id])after=()=>board(id)}
else if(m=h.match(/^layanan-(\d)$/)){if(SVC[m[1]-1]){html=layanan(m[1]-1);t=SVC[m[1]-1].n}}
else if(m=h.match(/^cerita-(\d)$/)){if(CE[m[1]-1]){html=cerita(m[1]-1);t=CE[m[1]-1].n}}
else if(h==="kemas"){html=kemas();t="Studio kemas";after=kbind}else if(h==="mitra"){html=mitra();t="Jadi mitra";after=()=>{document.querySelectorAll(".fm input,.fm select,.fm textarea").forEach(e=>e.oninput=mupd);mupd()}}
const sub=$("v-sub");
if(html){replaceMarkup(sub,html);sub.classList.add("on");$("v-beranda").classList.remove("on");if(after)after();document.title=t+" – PaketDream";window.scrollTo(0,0)}
else{sub.classList.remove("on");$("v-beranda").classList.add("on");document.title=t;if(pend){const el=$(pend);pend=null;setTimeout(()=>el&&el.scrollIntoView(),60)}else window.scrollTo(0,0);jp()}}
addEventListener("hashchange",route);
document.querySelectorAll(".nl button").forEach(b=>b.onclick=()=>{if($("v-beranda").classList.contains("on"))$(b.dataset.s).scrollIntoView();else{pend=b.dataset.s;location.hash="beranda"}});route();
/* chat */
const KB=[
[/ongkir|ongkos|tarif|harga|biaya|berapa/,()=>"Coba Studio kemas: pilih kota, ukuran kotak, dan proteksi, lalu ongkir dan skor perlindungan paketmu langsung terlihat.",["Studio kemas","Jadi mitra"]],
[/kilat|same|hari yang sama|cepat/,()=>"Layanan Kilat mengantar dalam kota di hari yang sama. Untuk antar kota, estimasi mengikuti jarak.",["Studio kemas"]],
[/pecah|rapuh|kemas|packing|bubble|aman/,()=>"Untuk barang pecah belah, gunakan bubble wrap, kardus ganda, dan asuransi. Studio kemas akan menunjukkan skor perlindungannya.",["Studio kemas"]],
[/mitra|agen|drop|kios|franchise|gabung/,()=>"Punya kios atau toko? Kamu bisa jadi titik antar-jemput. Isi formulir di halaman Jadi mitra.",["Jadi mitra"]],
[/kargo|fulfillment|gudang|bisnis/,()=>"Untuk bisnis tersedia kargo dan fulfillment: penyimpanan, pengemasan, sampai pengiriman pesanan.",["Lanjut ke WhatsApp"]],
[/larang|dilarang|aturan|barang berbahaya/,()=>"Pengiriman barang tertentu tunduk pada ketentuan yang berlaku. Sebutkan jenis barangmu ke tim kami agar dicek lebih dulu.",["Lanjut ke WhatsApp"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Hai! Aku Pak Paket. Ketik nomor resi untuk melacak, atau tanya soal ongkir dan kemasan.",["Studio kemas","Jadi mitra","PD2026001"]]];
const lg=[];function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;ms.append(d);ms.scrollTop=1e9;if(c==="u")lg.push(t)}
function chips(a){cps.replaceChildren();a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>{if(v==="Studio kemas"){cp.classList.remove("on");location.hash="kemas"}else if(v==="Jadi mitra"){cp.classList.remove("on");location.hash="mitra"}else if(/^Buka /.test(v)){cp.classList.remove("on");location.hash="lacak-"+v.split(" ").pop()}else ask(v)};cps.append(b)})}
function waU(){cw.href=wl(`Halo ${BRAND}, saya menghubungi dari website.`+(lg.length?` Pertanyaan saya: ${lg.join("; ")}.`:" Saya ingin bertanya."))}
function ask(t){say(t,"u");const r=t.toUpperCase().match(/PD\d{7}/);
if(r){setTimeout(()=>{const s=SH[r[0]];if(s){say(`Resi ${r[0]}: ${HUB[s.o][0]} ke ${HUB[s.d][0]}, status "${s.st===6?"Diterima":ST[s.st]}". Perkiraan tiba: ${s.eta}. (Data demo)`,"b");chips(["Buka "+r[0],"Studio kemas"])}else{say(`Resi ${r[0]} belum ketemu. Cek lagi nomornya, atau lanjut ke WhatsApp ya.`,"b");chips(["PD2026001"])}waU()},350);return}
if(/whatsapp|\bwa\b|admin|manusia|cs\b/i.test(t)){setTimeout(()=>{say("Siap! Tekan tombol hijau di bawah, pertanyaanmu ikut terkirim.","b");waU()},300);return}
const m=KB.find(([x])=>x.test(t.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Hmm, ini lebih tepat dijawab tim kami. Tekan WhatsApp di bawah, pertanyaanmu ikut terkirim.","b");chips(["Studio kemas","Jadi mitra"])}waU()},350)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let fi=true;fab.onclick=()=>{cp.classList.toggle("on");if(cp.classList.contains("on")&&fi){fi=false;say("Hai! Aku Pak Paket, asisten virtual PaketDream. Aku bisa lacak resi (coba PD2026001), bantu soal ongkir, dan kemasan.","b");chips(["Studio kemas","Jadi mitra","PD2026001"]);waU()}};x.onclick=()=>cp.classList.remove("on");
const paketdreamMenuButton=$("paketdream-menu-button"),paketdreamMenu=$("paketdream-menu");
function closePaketDreamMenu(){paketdreamMenu.classList.remove("open");paketdreamMenu.setAttribute("aria-hidden","true");paketdreamMenuButton.setAttribute("aria-expanded","false");paketdreamMenuButton.setAttribute("aria-label","Buka menu navigasi")}
function togglePaketDreamMenu(){const open=!paketdreamMenu.classList.contains("open");paketdreamMenu.classList.toggle("open",open);paketdreamMenu.setAttribute("aria-hidden",open?"false":"true");paketdreamMenuButton.setAttribute("aria-expanded",open?"true":"false");paketdreamMenuButton.setAttribute("aria-label",open?"Tutup menu navigasi":"Buka menu navigasi")}
paketdreamMenuButton.onclick=togglePaketDreamMenu;
paketdreamMenu.querySelectorAll("button[data-s]").forEach(button=>button.onclick=()=>{closePaketDreamMenu();if($("v-beranda").classList.contains("on"))$(button.dataset.s).scrollIntoView({behavior:"smooth"});else{pend=button.dataset.s;location.hash="beranda"}});
addEventListener("keydown",event=>{if(event.key==="Escape")closePaketDreamMenu()});
addEventListener("hashchange",()=>closePaketDreamMenu());
document.querySelectorAll("[data-hash]").forEach(button=>button.onclick=()=>{location.hash=button.dataset.hash});
</script>
</body>
</html>
@endverbatim
