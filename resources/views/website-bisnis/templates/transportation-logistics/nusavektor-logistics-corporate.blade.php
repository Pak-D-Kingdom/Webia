@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>NusaVektor Logistics – Rantai Pasok Tepat Waktu</title>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Source+Sans+3:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root{--nv:#0A1428;--nv2:#101C38;--nv3:#16264A;--sk:#4DA3FF;--am:#F5A524;--lt:#F3F6FB;--ink:#0F1B33;--mu:#5E6C86;--mu2:#9AA9C4;--ln:#DDE5F0;--ln2:rgba(154,169,196,.22);--h:'Sora',system-ui,sans-serif;--b:'Source Sans 3',system-ui,sans-serif;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth}
body{margin:0;background:#fff;color:var(--ink);font:400 17px/1.65 var(--b);overflow-x:hidden}
a{color:inherit;text-decoration:none}
h1,h2,h3,h4,p{margin:0}
.w{max-width:1200px;margin:auto;padding:0 24px}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:14px 26px;border-radius:8px;border:0;background:var(--am);color:var(--nv);font:600 15px var(--h);cursor:pointer;transition:.25s}
.btn:hover,.btn:focus-visible{background:#fff;outline:none;transform:translateY(-2px)}
.btn.s{background:var(--nv);color:#fff}.btn.s:hover{background:var(--sk);color:var(--nv)}
.btn.o{background:transparent;color:#fff;box-shadow:inset 0 0 0 1.5px var(--mu2)}.btn.o:hover{background:#fff;color:var(--nv)}
.ey{font:600 12px var(--h);letter-spacing:.16em;text-transform:uppercase;color:var(--sk)}
.mo{font-family:ui-monospace,Menlo,monospace}
header.n{position:sticky;top:env(safe-area-inset-top,0px);z-index:60;background:rgba(10,20,40,.94);border-bottom:1px solid var(--ln2);color:#fff}
header.n .w{display:flex;align-items:center;justify-content:space-between;padding-top:16px;padding-bottom:16px;gap:20px}
.lg{font:700 20px var(--h);letter-spacing:.02em;display:flex;align-items:center;gap:10px}
.lg i{width:26px;height:26px;background:var(--am);clip-path:polygon(0 0,100% 50%,0 100%,22% 50%)}
.nl{display:flex;gap:30px;font:500 14.5px var(--b)}.nl button{background:none;border:0;color:#C3CFE4;font:inherit;cursor:pointer;padding:0}.nl button:hover{color:#fff}
.hl{font-size:13px;color:var(--mu2)}.hl b{color:var(--am);font-weight:600}
@media(max-width:860px){.nl{display:none}}@media(max-width:560px){.hl{display:none}}
.view{display:none}.view.on{display:block;animation:fd .5s}@keyframes fd{from{opacity:0;transform:translateY(10px)}}
.map{width:100%;display:block}
.map .dt{stroke:#2A4A80;stroke-width:3.4;stroke-linecap:round;opacity:.9}
.rt{fill:none;stroke:var(--sk);stroke-width:1.6;stroke-dasharray:5 7;animation:da 2.4s linear infinite;opacity:.8}.rt.h{stroke:var(--am);stroke-width:2.6;opacity:1}
@keyframes da{to{stroke-dashoffset:-48}}
.nd{fill:var(--am)}.pl{fill:none;stroke:var(--am);stroke-width:1.4;animation:pu 2.4s ease-out infinite;transform-box:fill-box;transform-origin:center}
@keyframes pu{from{transform:scale(.6);opacity:1}to{transform:scale(2.6);opacity:0}}
.nt{font:600 11px var(--h);fill:#C3CFE4;letter-spacing:.04em}
.hit{fill:transparent;cursor:pointer}
/* hero */
.hero{background:radial-gradient(90% 100% at 80% 20%,var(--nv3),var(--nv) 70%);color:#fff;position:relative;overflow:hidden;padding:80px 0 110px}
.hero .bg{position:absolute;right:-4%;bottom:-6%;width:66%;opacity:.6;pointer-events:none}
.hero .w{position:relative;display:grid;grid-template-columns:1.1fr .9fr;gap:50px;align-items:center}
.hero h1{font:700 clamp(36px,5vw,68px)/1.04 var(--h);letter-spacing:-.035em;margin:16px 0 20px}.hero h1 span{color:var(--am)}
.hero p{max-width:500px;color:#B5C2DB;font-size:18px}
.hc{display:flex;gap:12px;flex-wrap:wrap;margin-top:30px}
.tc{background:#fff;color:var(--ink);border-radius:18px;padding:30px;box-shadow:0 40px 80px -30px rgba(0,0,0,.6)}
.tc h2{font:700 22px var(--h);letter-spacing:-.02em}.tc p{color:var(--mu);font-size:15px;margin:4px 0 16px}
.tc form{display:flex;gap:8px}.tc input{flex:1;padding:14px;border:1.5px solid var(--ln);border-radius:8px;font:500 16px ui-monospace,Menlo,monospace;text-transform:uppercase;outline:none;min-width:0;color:var(--ink)}.tc input:focus{border-color:var(--sk)}
.ex{display:flex;gap:6px;flex-wrap:wrap;margin:12px 0 18px;font-size:13px;color:var(--mu);align-items:center}.ex button{background:var(--lt);border:0;border-radius:6px;padding:4px 10px;font:500 12.5px ui-monospace,Menlo,monospace;cursor:pointer;color:var(--ink)}.ex button:hover{background:var(--sk);color:#fff}
.tc hr{border:0;border-top:1px solid var(--ln);margin:6px 0 18px}
.tc .sec{display:flex;justify-content:space-between;align-items:center;gap:12px;font-size:15px}.tc .sec a{font:600 14.5px var(--h);color:var(--nv);border-bottom:2px solid var(--am)}
@media(max-width:900px){.hero .w{grid-template-columns:1fr}.hero .bg{width:120%;right:-20%;opacity:.35}}
.kp{background:var(--nv2);color:#fff;border-top:1px solid var(--ln2)}.kp .w{display:grid;grid-template-columns:repeat(4,1fr)}
.kp div{padding:34px 24px;border-right:1px solid var(--ln2)}.kp div:last-child{border:0}.kp b{display:block;font:700 clamp(30px,3.6vw,46px)/1 var(--h);letter-spacing:-.03em}.kp b em{font-style:normal;color:var(--am)}.kp span{font-size:14px;color:var(--mu2)}
@media(max-width:700px){.kp .w{grid-template-columns:1fr 1fr}.kp div:nth-child(2){border:0}}
section.s{padding:100px 0}
.sh{max-width:700px;margin-bottom:44px}.sh h2{font:700 clamp(28px,3.6vw,46px)/1.08 var(--h);letter-spacing:-.03em;margin:10px 0 12px}.sh p{color:var(--mu)}
.dk{background:var(--nv);color:#fff}.dk .sh p{color:#B5C2DB}
.sv{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
.sc{background:#fff;border:1px solid var(--ln);border-radius:14px;padding:26px;text-align:left;font:inherit;color:inherit;cursor:pointer;transition:.3s;display:flex;flex-direction:column;gap:8px}
.sc:hover{border-color:var(--sk);box-shadow:0 24px 50px -26px rgba(10,20,40,.5);transform:translateY(-5px)}
.sc svg{width:44px;stroke:var(--nv);fill:none;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round;margin-bottom:8px}.sc:hover svg{stroke:var(--am)}
.sc h3{font:700 19px var(--h);letter-spacing:-.02em}.sc p{color:var(--mu);font-size:15px}.sc em{margin-top:auto;padding-top:10px;font:600 14px var(--h);font-style:normal;color:var(--sk)}
@media(max-width:960px){.sv{grid-template-columns:1fr 1fr}}@media(max-width:560px){.sv{grid-template-columns:1fr}}
.nw{display:grid;grid-template-columns:.8fr 1.2fr;gap:50px;align-items:center}
.nw ul{list-style:none;padding:0;margin:22px 0 28px}.nw li{display:flex;justify-content:space-between;padding:12px 0;border-top:1px solid var(--ln2);color:#C3CFE4;font-size:16px}.nw li b{color:var(--am);font-family:var(--h);font-weight:600;font-size:14px}
@media(max-width:900px){.nw{grid-template-columns:1fr}}
.cs{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.cc{background:var(--lt);border-radius:14px;padding:30px;display:flex;flex-direction:column;gap:10px;transition:.3s;border:1px solid transparent;text-align:left;font:inherit;color:inherit;cursor:pointer}
.cc:hover{border-color:var(--sk);background:#fff;transform:translateY(-5px);box-shadow:0 24px 50px -26px rgba(10,20,40,.5)}
.cc b{font:700 44px/1 var(--h);letter-spacing:-.04em;color:var(--nv)}.cc small{font-size:13px;color:var(--mu)}.cc h3{font:700 19px var(--h)}.cc p{color:var(--mu);font-size:15px}.cc em{margin-top:auto;font:600 14px var(--h);font-style:normal;color:var(--sk)}
@media(max-width:860px){.cs{grid-template-columns:1fr}}
.cl{display:flex;gap:38px;flex-wrap:wrap;margin-top:50px;padding-top:30px;border-top:1px solid var(--ln);font:700 18px var(--h);color:#B3BED2;letter-spacing:.04em}
.ct{background:linear-gradient(120deg,var(--nv),var(--nv3));color:#fff;border-radius:22px;padding:clamp(30px,5vw,60px);display:flex;justify-content:space-between;align-items:center;gap:30px;flex-wrap:wrap}.ct h2{font:700 clamp(26px,3.4vw,42px)/1.08 var(--h);letter-spacing:-.03em;max-width:560px}
footer{background:var(--nv);color:#9AA9C4;padding:60px 0 30px;margin-top:20px}.fg{display:grid;grid-template-columns:1.4fr 1fr 1fr;gap:40px}footer h4{font:600 12.5px var(--h);letter-spacing:.14em;text-transform:uppercase;color:var(--am);margin-bottom:10px}footer p,footer li{font-size:14.5px}footer ul{list-style:none;padding:0;margin:0}footer li{margin:6px 0}footer button{background:none;border:0;color:inherit;font:inherit;cursor:pointer;padding:0}footer button:hover{color:#fff}
.cp{font-size:12.5px;margin-top:34px;padding-top:20px;border-top:1px solid var(--ln2);max-width:860px;color:#7585A3}
@media(max-width:760px){.fg{grid-template-columns:1fr}}
/* subpages */
.ph{background:linear-gradient(160deg,var(--nv),var(--nv3));color:#fff;padding:56px 0 50px}
.ph h1{font:700 clamp(30px,4.4vw,56px)/1.05 var(--h);letter-spacing:-.035em;margin:12px 0}.ph p{max-width:620px;color:#B5C2DB}
.cr{font-size:13.5px;color:var(--mu2);margin-bottom:14px}.cr a{color:var(--sk);font-weight:600}.cr a:hover{text-decoration:underline}
.sp{padding:50px 0 20px}
.tg{display:grid;grid-template-columns:1.1fr .9fr;gap:30px;align-items:start}
.cd{border:1px solid var(--ln);border-radius:16px;padding:28px;background:#fff}
.fa{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--ln);border:1px solid var(--ln);border-radius:12px;overflow:hidden;margin-bottom:26px}.fa div{background:#fff;padding:16px 18px}.fa small{display:block;font:600 11px var(--h);letter-spacing:.12em;text-transform:uppercase;color:var(--mu)}.fa b{font:600 17px var(--h)}
.tl{position:relative;padding-left:32px}.tl::before{content:"";position:absolute;left:9px;top:8px;bottom:8px;width:2px;background:var(--ln)}
.ev{position:relative;padding:0 0 22px}.ev::before{content:"";position:absolute;left:-30px;top:5px;width:14px;height:14px;border-radius:50%;background:#fff;border:2px solid var(--ln)}
.ev.d::before{background:var(--sk);border-color:var(--sk)}.ev.c::before{background:var(--am);border-color:var(--am);box-shadow:0 0 0 6px rgba(245,165,36,.25)}.ev.d:not(:last-child)::after{content:"";position:absolute;left:-23px;top:19px;bottom:-5px;width:2px;background:var(--sk)}
.ev b{display:block;font:600 16px var(--h)}.ev small{color:var(--mu);font-size:14px}.ev.p{opacity:.5}
.mp{background:var(--nv);border-radius:16px;padding:18px;position:sticky;top:90px}
.st{display:inline-flex;gap:8px;align-items:center;font:600 13px var(--h);padding:5px 14px;border-radius:99px;background:rgba(245,165,36,.18);color:#B97709}.st.ok{background:rgba(46,158,107,.15);color:#1E7A52}
.cn{display:grid;grid-template-columns:1fr 1fr;gap:40px}
.ft label{display:block;font:600 12px var(--h);letter-spacing:.1em;text-transform:uppercase;color:var(--mu);margin:16px 0 6px}.ft label:first-child{margin-top:0}
.ft select,.ft input[type=text],.ft input[type=number],.ft textarea,.ft input[type=email]{width:100%;padding:13px 14px;border:1.5px solid var(--ln);border-radius:8px;font:400 16px var(--b);background:#fff;color:var(--ink);outline:none}
.ft select:focus,.ft input:focus,.ft textarea:focus{border-color:var(--sk)}.ft .r2{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.ft .ck{display:flex;gap:10px;align-items:center;margin-top:8px;font-size:15.5px;cursor:pointer}.ft .ck input{width:18px;height:18px;accent-color:var(--nv)}
.rs{background:var(--nv);color:#fff;border-radius:16px;padding:32px;position:sticky;top:90px}.rs small{color:var(--mu2)}.rs .pr{font:700 clamp(30px,4vw,46px)/1.05 var(--h);letter-spacing:-.03em;margin:6px 0 4px;color:var(--am)}.rs .tr{font:600 16px var(--h);margin-bottom:22px}.rs dl{margin:0 0 22px;display:grid;grid-template-columns:auto 1fr;gap:8px 16px;font-size:15px}.rs dt{color:var(--mu2)}.rs dd{margin:0;text-align:right}.rs .nt2{font-size:12.5px;color:var(--mu2);margin-top:14px;line-height:1.5}
@media(max-width:900px){.tg,.cn{grid-template-columns:1fr}.mp,.rs{position:static}}
.fl{display:grid;grid-template-columns:.8fr 1.2fr;gap:50px;margin-top:70px}.fl h2{font:700 26px var(--h);letter-spacing:-.02em}.fl ul{list-style:none;padding:0;margin:0}.fl li{padding:13px 0 13px 28px;border-top:1px solid var(--ln);position:relative}.fl li::before{content:"";position:absolute;left:0;top:21px;width:13px;height:7px;border-left:2.5px solid var(--sk);border-bottom:2.5px solid var(--sk);transform:rotate(-45deg)}
@media(max-width:860px){.fl{grid-template-columns:1fr;gap:20px}}
.hb{background:var(--lt);border-radius:16px;padding:28px}.hb h3{font:700 24px var(--h);letter-spacing:-.02em;margin:6px 0 12px}.hb dl{display:grid;grid-template-columns:auto 1fr;gap:8px 20px;margin:0}.hb dt{color:var(--mu)}.hb dd{margin:0;font-weight:600}
.mt{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin:34px 0}.mt div{background:var(--lt);border-radius:12px;padding:22px}.mt b{display:block;font:700 34px/1 var(--h);letter-spacing:-.03em;color:var(--nv)}.mt small{color:var(--mu);font-size:13.5px}
.pn{display:flex;justify-content:space-between;gap:16px;margin-top:60px;padding-top:24px;border-top:1px solid var(--ln);flex-wrap:wrap}
/* chat */
#fab{position:fixed;right:22px;bottom:calc(22px + env(safe-area-inset-bottom,0px));z-index:80;display:flex;align-items:center;gap:10px;padding:14px 22px;border-radius:99px;border:0;background:var(--am);color:var(--nv);font:700 14.5px var(--h);cursor:pointer;box-shadow:0 14px 34px -8px rgba(10,20,40,.55);transition:.25s}#fab:hover{transform:translateY(-3px)}
#cp{position:fixed;right:22px;bottom:calc(82px + env(safe-area-inset-bottom,0px));z-index:80;width:min(380px,calc(100vw - 44px));height:min(520px,72vh);background:#fff;border-radius:18px;box-shadow:0 30px 80px rgba(10,20,40,.45);display:none;flex-direction:column;overflow:hidden}
#cp.on{display:flex;animation:fd .35s}
#cp header{background:var(--nv);color:#fff;padding:16px 20px;display:flex;justify-content:space-between;align-items:center}#cp header b{font:700 16px var(--h)}#cp header small{display:block;color:#7FE0B0;font-size:12px}#cp header button{background:none;border:0;color:#fff;font-size:24px;cursor:pointer}
#ms{flex:1;overflow-y:auto;padding:16px;display:flex;flex-direction:column;gap:10px;background:var(--lt);font-size:15px}
.m{max-width:88%;padding:10px 14px;border-radius:14px;line-height:1.5;animation:fd .3s}.m.b{background:#fff;border:1px solid var(--ln);align-self:flex-start;border-bottom-left-radius:4px}.m.u{background:var(--nv);color:#fff;align-self:flex-end;border-bottom-right-radius:4px}
.cps{display:flex;flex-wrap:wrap;gap:6px;padding:10px 16px 0}.cps button{padding:6px 12px;border:1.5px solid var(--sk);background:#fff;color:var(--nv);border-radius:99px;font:600 12.5px var(--h);cursor:pointer}.cps button:hover{background:var(--sk);color:#fff}
#cf{display:flex;gap:8px;padding:12px 16px}#cf input{flex:1;padding:12px 14px;border:1.5px solid var(--ln);border-radius:8px;font:400 15px var(--b);outline:none;min-width:0}#cf button{padding:0 18px;border:0;border-radius:8px;background:var(--nv);color:#fff;cursor:pointer}
#cw{display:block;text-align:center;padding:11px;background:#1FA855;color:#fff;font:600 14px var(--h)}
:focus-visible{outline:2px solid var(--sk);outline-offset:3px}#nusavektor-menu-button{display:none;background:transparent;border:1px solid var(--ln2);border-radius:8px;width:44px;height:44px;color:#fff;font-size:22px;cursor:pointer}#nusavektor-menu{position:fixed;left:0;right:0;top:76px;bottom:0;z-index:55;background:var(--nv);padding:18px 24px 28px;overflow-y:auto;visibility:hidden;opacity:0;pointer-events:none;transform:translateY(-110%);transition:.35s}#nusavektor-menu.open{visibility:visible;opacity:1;pointer-events:auto;transform:none}#nusavektor-menu button{display:block;width:100%;padding:16px 0;border:0;border-bottom:1px solid var(--ln2);background:none;text-align:left;color:#fff;font:500 18px var(--b);cursor:pointer}@media(max-width:860px){.nl{display:none!important}#nusavektor-menu-button{display:block}}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}
</style>
</head>
<body>
<header class="n"><div class="w"><a class="lg" href="#beranda"><i></i>NUSAVEKTOR</a><div class="nl"><button data-s="layanan">Layanan</button><button data-s="jaringan">Jaringan</button><button data-s="studi">Studi kasus</button><button data-s="kontak">Kontak</button></div><span class="hl">Hotline 24/7: <b>ganti nomor</b></span><button id="nusavektor-menu-button" type="button" aria-expanded="false" aria-controls="nusavektor-menu" aria-label="Buka menu navigasi">☰</button></div></header><nav id="nusavektor-menu" aria-hidden="true"><button type="button" data-s="layanan">Layanan</button><button type="button" data-s="jaringan">Jaringan</button><button type="button" data-s="studi">Studi kasus</button><button type="button" data-s="kontak">Kontak</button></nav>

<main>
<div class="view" id="v-beranda">
<section class="hero"><div class="bg" id="hb"></div><div class="w"><div><span class="ey">Logistik dan rantai pasok</span><h1>Rantai pasok yang bergerak <span>tepat waktu.</span></h1><p>Dari gudang ke pintu pelanggan, lewat darat, laut, dan udara. Dengan visibilitas penuh di setiap titik perjalanan.</p><div class="hc"><a class="btn" href="#korporat">Solusi untuk perusahaan</a><a class="btn o" href="#jaringan-peta">Lihat jaringan kami</a></div></div>
<div class="tc"><h2>Lacak kiriman</h2><p>Masukkan nomor resi untuk melihat posisi dan riwayat perjalanan.</p><form id="tf"><input id="ti" placeholder="NV2026001" aria-label="Nomor resi" autocomplete="off"><button class="btn s">Lacak</button></form><div class="ex">Contoh: <button data-r="NV2026001">NV2026001</button><button data-r="NV2026002">NV2026002</button><button data-r="NV2026003">NV2026003</button></div><hr><div class="sec"><span>Butuh ongkos kirim?</span><a href="#tarif">Cek tarif →</a></div></div></div></section>
<div class="kp"><div class="w"><div><b data-n="340">0</b><span>armada aktif (contoh)</span></div><div><b data-n="28">0</b><span>gudang dan hub</span></div><div><b data-n="420">0</b><span>kota terjangkau</span></div><div><b data-n="98">0<em>%</em></b><span>pengiriman tepat waktu</span></div></div></div>
<section class="s" id="layanan"><div class="w"><div class="sh"><span class="ey">Layanan</span><h2>Empat layanan, satu jaringan terpadu.</h2><p>Pilih layanan untuk melihat cakupan dan cara memesannya.</p></div><div class="sv" id="sv"></div></div></section>
<section class="s dk" id="jaringan"><div class="w nw"><div><span class="ey">Jaringan nasional</span><div class="sh" style="margin:12px 0 0"><h2>Hub di titik-titik terpenting.</h2></div><ul><li>Hub utama<b>7 kota</b></li><li>Kapasitas gudang<b>contoh 90.000 m²</b></li><li>Rute aktif<b>7 koridor</b></li></ul><a class="btn" href="#jaringan-peta">Jelajahi jaringan →</a></div><div id="hm"></div></div></section>
<section class="s" id="studi"><div class="w"><div class="sh"><span class="ey">Studi kasus</span><h2>Hasil nyata untuk rantai pasok klien.</h2></div><div class="cs" id="cs"></div><div class="cl"><span>MITRA CONTOH A</span><span>MITRA CONTOH B</span><span>MITRA CONTOH C</span><span>MITRA CONTOH D</span></div></div></section>
<section class="s" id="kontak" style="padding-top:10px"><div class="w"><div class="ct"><h2>Butuh solusi logistik untuk perusahaan Anda?</h2><div style="display:flex;gap:12px;flex-wrap:wrap"><a class="btn" href="#korporat">Minta penawaran korporat</a><a class="btn o" href="#tarif">Cek tarif</a></div></div></div></section>
</div>
<div class="view" id="v-sub"></div>
</main>
<footer><div class="w"><div class="fg"><div><div class="lg" style="color:#fff"><i></i>NUSAVEKTOR</div><p style="margin-top:12px;max-width:340px">Penyedia layanan logistik dan rantai pasok. Template contoh, ganti seluruh isi dengan data perusahaan Anda.</p></div><div><h4>Layanan</h4><ul><li><button data-hash="layanan-1">Trucking dan distribusi</button></li><li><button data-hash="layanan-2">Kargo laut</button></li><li><button data-hash="layanan-3">Kargo udara</button></li><li><button data-hash="layanan-4">Pergudangan</button></li></ul></div><div><h4>Kontak</h4><ul><li>Alamat kantor pusat (ganti)</li><li>Hotline 24/7 (ganti)</li><li>Email dan WhatsApp (ganti)</li></ul></div></div><p class="cp">Seluruh angka, rute, tarif, dan data pengiriman adalah contoh. Estimasi bukan penawaran, dan tarif serta waktu tempuh final dikonfirmasi tim kami. Pengiriman barang tertentu tunduk pada ketentuan dan peraturan yang berlaku.</p></div></footer>

<button id="fab"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5h16v11H9l-5 4z"/></svg>Customer care</button>
<aside id="cp" role="dialog" aria-label="Customer care"><header><div><b>Customer Care</b><small>● online · bisa lacak resi</small></div><button id="x" aria-label="Tutup">×</button></header><div id="ms"></div><div class="cps" id="cps"></div><form id="cf"><input id="ci" placeholder="Tulis pertanyaan atau nomor resi…" autocomplete="off" aria-label="Pesan"><button aria-label="Kirim">➤</button></form><a id="cw" href="#" target="_blank" rel="noopener">Lanjutkan ke WhatsApp →</a></aside>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="NusaVektor Logistics";
function replaceMarkup(el,markup){const range=document.createRange();range.selectNodeContents(el);range.deleteContents();el.append(range.createContextualFragment(markup))}
const $=i=>document.getElementById(i),wl=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t),rp=n=>"Rp "+Math.round(n).toLocaleString("id-ID");
/* peta titik */
const HB=[{n:"Medan",x:72,y:48,la:3.6,lo:98.7,c:"6.000 m²"},{n:"Jakarta",x:229,y:244,la:-6.2,lo:106.8,c:"28.000 m²"},{n:"Surabaya",x:344,y:266,la:-7.3,lo:112.7,c:"22.000 m²"},{n:"Denpasar",x:393,y:294,la:-8.7,lo:115.2,c:"5.000 m²"},{n:"Balikpapan",x:424,y:144,la:-1.2,lo:116.8,c:"8.000 m²"},{n:"Makassar",x:475,y:222,la:-5.1,lo:119.4,c:"14.000 m²"},{n:"Sorong",x:708,y:138,la:-.9,lo:131.3,c:"7.000 m²"}];
const RT=[[1,2],[1,0],[2,5],[2,3],[5,4],[5,6],[1,4]];
const LAND=[[105,120,150,30,48],[290,268,95,14,11],[370,120,92,78,0],[500,112,38,9,-25],[507,150,9,40,0],[520,200,28,8,15],[540,185,8,22,30],[800,185,100,45,-10],[400,292,24,6,0],[455,300,60,6,5],[600,140,22,16,0],[640,185,16,12,0]];
let dots="";for(let x=6;x<900;x+=10)for(let y=6;y<340;y+=10)if(LAND.some(([cx,cy,rx,ry,a])=>{const r=a*Math.PI/180,dx=x-cx,dy=y-cy,u=dx*Math.cos(r)+dy*Math.sin(r),v=-dx*Math.sin(r)+dy*Math.cos(r);return u*u/(rx*rx)+v*v/(ry*ry)<=1}))dots+=`M${x} ${y}h.01`;
const cv=(a,b)=>{const A=HB[a],B=HB[b],mx=(A.x+B.x)/2,my=(A.y+B.y)/2,k=.16,cx=mx-(B.y-A.y)*k,cy=my+(B.x-A.x)*k;return{d:`M${A.x} ${A.y}Q${cx.toFixed(1)} ${cy.toFixed(1)} ${B.x} ${B.y}`,cx,cy,A,B}};
function map(o={}){let s=`<svg class="map" viewBox="0 0 900 340" aria-hidden="true"><path class="dt" d="${dots}" fill="none"/>`;
if(o.routes!==false)RT.forEach(r=>s+=`<path class="rt" d="${cv(r[0],r[1]).d}"/>`);
if(o.hl){const c=cv(o.hl[0],o.hl[1]);s+=`<path class="rt h" d="${c.d}"/>`;if(o.pg!==undefined){const t=o.pg,x=(1-t)*(1-t)*c.A.x+2*(1-t)*t*c.cx+t*t*c.B.x,y=(1-t)*(1-t)*c.A.y+2*(1-t)*t*c.cy+t*t*c.B.y;s+=`<circle cx="${x.toFixed(1)}" cy="${y.toFixed(1)}" r="9" fill="#fff" stroke="#F5A524" stroke-width="4"/>`}}
HB.forEach((h,i)=>{const on=!o.hl||o.hl.includes(i);s+=`<g ${o.click?`data-i="${i}"`:""}><circle class="pl" cx="${h.x}" cy="${h.y}" r="6" style="animation-delay:${i*.3}s"/><circle class="nd" cx="${h.x}" cy="${h.y}" r="${on?5.5:4}" opacity="${on?1:.55}"/><text class="nt" x="${h.x+9}" y="${h.y+4}">${h.n}</text>${o.click?`<circle class="hit" cx="${h.x}" cy="${h.y}" r="20"/>`:""}</g>`});
return s+"</svg>"}
replaceMarkup($("hb"),map({routes:true}));replaceMarkup($("hm"),map({click:false}));
/* data */
const SVC=[
{n:"Trucking dan distribusi",ic:'<path d="M3 16V7h11v9M14 10h4l3 3v3h-3"/><circle cx="7" cy="17.5" r="2"/><circle cx="17" cy="17.5" r="2"/>',d:"Pengiriman darat dari first mile sampai last mile, dari paket kecil sampai muatan penuh.",ft:["Armada beragam dari van sampai trailer","Pelacakan posisi berkala","Jadwal pengambilan terencana","Layanan multi-drop untuk distribusi"],cp:"Distributor, retail, dan manufaktur dengan pengiriman rutin antar kota.",ca:0},
{n:"Kargo laut",ic:'<path d="M3 15l2 4h14l2-4zM6 15V9h9v6M10 9V5h3v4"/>',d:"Pengiriman volume besar antar pulau dengan biaya efisien, baik kontainer penuh maupun konsolidasi.",ft:["FCL dan LCL antar pulau","Penanganan pelabuhan dan dokumen","Konsolidasi muatan","Pemantauan jadwal kapal"],cp:"Perusahaan dengan barang berat atau bervolume besar yang tidak mendesak.",ca:1},
{n:"Kargo udara",ic:'<path d="M2 14l9-2 5-8 2 1-2 8 5 2v2l-6-1-4 4-2-1 1-5-8 1z"/>',d:"Pengiriman cepat untuk barang bernilai tinggi atau sensitif waktu.",ft:["Jadwal penerbangan harian","Penanganan barang khusus","Layanan door to door","Prioritas untuk kiriman mendesak"],cp:"Pengirim barang bernilai tinggi, suku cadang kritis, atau barang cepat rusak.",ca:2},
{n:"Pergudangan dan fulfillment",ic:'<path d="M3 21V9l9-5 9 5v12M7 21v-8h10v8M10 17h4"/>',d:"Penyimpanan, pengelolaan stok, pengemasan, dan pengiriman pesanan dalam satu alur.",ft:["Gudang dengan sistem manajemen stok","Pick, pack, dan pengiriman pesanan","Pelaporan stok berkala","Ruang fleksibel sesuai volume"],cp:"Pelaku e-commerce dan merek yang ingin menyerahkan operasional gudang.",ca:2}];
const CS=[
{n:"Distribusi FMCG antar pulau",k:"Distribusi barang konsumsi",m:["-28%","lead time pengiriman"],m2:["99%","pengiriman tepat waktu"],m3:["3","koridor baru dibuka"],tc:"Distribusi ke banyak kota dengan jadwal tidak konsisten dan stok sering kosong di sebagian cabang.",sl:"Rute konsolidasi mingguan, hub transit di dua kota, dan pelacakan terpusat untuk seluruh pengiriman.",sv:[0,1]},
{n:"Pasokan bahan baku manufaktur",k:"Inbound logistics pabrik",m:["-18%","biaya logistik per ton"],m2:["0","penghentian produksi"],m3:["12","pemasok terintegrasi"],tc:"Keterlambatan bahan baku mengganggu jadwal produksi dan menimbulkan biaya tinggi.",sl:"Penjadwalan kedatangan terpusat, kargo laut untuk volume besar, dan stok penyangga di gudang dekat pabrik.",sv:[1,3]},
{n:"Fulfillment e-commerce nasional",k:"Pergudangan dan last mile",m:["24 jam","dari pesanan ke pengiriman"],m2:["-35%","kesalahan pengiriman"],m3:["2","gudang regional"],tc:"Lonjakan pesanan saat promo membuat proses pengemasan dan pengiriman kewalahan.",sl:"Fulfillment di gudang regional dengan sistem pick and pack, serta integrasi kurir untuk last mile.",sv:[3,0]}];
const ST=["Pesanan diterima","Dijemput kurir","Tiba di hub asal","Dalam perjalanan","Tiba di hub tujuan","Diantar ke penerima","Diterima"];
const SH={"NV2026001":{o:1,d:2,s:"Reguler Darat",kg:12,st:3,pg:.55,eta:"besok pukul 14.00"},"NV2026002":{o:2,d:5,s:"Kargo Laut",kg:420,st:6,pg:1,eta:"sudah diterima"},"NV2026003":{o:1,d:0,s:"Ekspres Udara",kg:5,st:2,pg:0,eta:"lusa pukul 10.00"}};
const tm=h=>new Date(Date.now()-h*36e5).toLocaleString("id-ID",{day:"numeric",month:"short",hour:"2-digit",minute:"2-digit"});
/* beranda */
replaceMarkup(sv,SVC.map((s,i)=>`<button class="sc" data-i="${i}"><svg viewBox="0 0 24 24">${s.ic}</svg><h3>${s.n}</h3><p>${s.d.split(",")[0].replace(/\.$/,"")}.</p><em>Selengkapnya →</em></button>`).join(""));
sv.onclick=e=>{const b=e.target.closest(".sc");if(b)location.hash="layanan-"+(+b.dataset.i+1)};
replaceMarkup(cs,CS.map((c,i)=>`<button class="cc" data-i="${i}"><small>${c.k}</small><b>${c.m[0]}</b><small>${c.m[1]} (contoh)</small><h3>${c.n}</h3><em>Baca studi kasus →</em></button>`).join(""));
cs.onclick=e=>{const b=e.target.closest(".cc");if(b)location.hash="studi-"+(+b.dataset.i+1)};
tf.onsubmit=e=>{e.preventDefault();const v=ti.value.trim().toUpperCase().replace(/[^A-Z0-9]/g,"");if(v)location.hash="lacak-"+v};
document.querySelector(".ex").onclick=e=>{const b=e.target.closest("button");if(b)location.hash="lacak-"+b.dataset.r};
document.querySelectorAll("[data-n]").forEach(el=>{const to=+el.dataset.n,em=el.querySelector("em"),s0=performance.now();(function f(n){const p=Math.min(1,(n-s0)/1400);el.firstChild.textContent=Math.round(to*(1-Math.pow(1-p,3)));if(p<1)requestAnimationFrame(f)})(s0)});
/* subhalaman */
const crumb=(...a)=>`<div class="cr"><a href="#beranda">Beranda</a>${a.map(x=>" / "+x).join("")}</div>`;
const head=(c,e,t,p)=>`<div class="ph"><div class="w">${c}<span class="ey">${e}</span><h1>${t}</h1>${p?`<p>${p}</p>`:""}</div></div>`;
function lacak(id){const s=SH[id];
if(!s)return head(crumb("Pelacakan"),"Pelacakan kiriman","Resi tidak ditemukan",`Nomor ${id} belum terdaftar. Periksa kembali atau hubungi customer care.`)+`<div class="w sp"><div class="cd"><p>Coba contoh: <a class="mo" href="#lacak-NV2026001" style="color:var(--sk);font-weight:600">NV2026001</a>, <a class="mo" href="#lacak-NV2026002" style="color:var(--sk);font-weight:600">NV2026002</a>, atau <a class="mo" href="#lacak-NV2026003" style="color:var(--sk);font-weight:600">NV2026003</a>.</p><p style="margin-top:14px"><a class="btn s" target="_blank" rel="noopener" href="${wl("Halo "+BRAND+", saya ingin menanyakan status resi "+id+".")}">Tanya customer care</a></p></div></div>`;
const done=s.st===6,ev=ST.map((t,i)=>{const c=i<s.st||done?"d":i===s.st?"c":"p";return `<div class="ev ${c}"><b>${t}</b><small>${i<=s.st?tm((s.st-i)*5+1)+" · "+(i<2?HB[s.o].n:i<4?HB[s.o].n:HB[s.d].n):"Estimasi "+s.eta}</small></div>`}).join("");
return head(crumb("Pelacakan",id),"Pelacakan kiriman",`<span class="mo">${id}</span>`,`${HB[s.o].n} → ${HB[s.d].n} · ${s.s}`)+`<div class="w sp"><div class="tg"><div class="cd"><div class="fa"><div><small>Status</small><b><span class="st${done?" ok":""}">${done?"Diterima":ST[s.st]}</span></b></div><div><small>Layanan</small><b>${s.s}</b></div><div><small>Berat</small><b>${s.kg} kg</b></div></div><h3 style="font:700 20px var(--h);margin-bottom:18px">Riwayat perjalanan</h3><div class="tl">${ev}</div><p style="margin-top:12px;color:var(--mu);font-size:14px">Estimasi tiba: <b>${s.eta}</b>. Data demo.</p></div>
<div><div class="mp">${map({routes:false,hl:[s.o,s.d],pg:s.pg})}</div><div style="margin-top:16px;display:flex;gap:10px;flex-wrap:wrap"><a class="btn s" target="_blank" rel="noopener" href="${wl("Halo "+BRAND+", saya ingin menanyakan resi "+id+".")}">Tanya customer care</a><a class="btn s" href="#tarif" style="background:#fff;color:var(--nv);box-shadow:inset 0 0 0 1.5px var(--ln)">Cek tarif</a></div></div></div></div>`}
function layanan(i){const s=SVC[i];return head(crumb("Layanan",s.n),"Layanan",s.n,s.d)+`<div class="w sp"><div class="fl" style="margin-top:20px"><h2>Yang termasuk</h2><ul>${s.ft.map(x=>`<li>${x}</li>`).join("")}</ul></div><div class="fl"><h2>Cocok untuk</h2><p style="color:var(--mu)">${s.cp}</p></div><div class="fl"><h2>Studi kasus terkait</h2><ul><li><a href="#studi-${s.ca+1}" style="color:var(--sk);font-weight:600">${CS[s.ca].n} →</a></li></ul></div>
<div class="pn"><a class="btn s" href="#tarif">Cek tarif →</a><a class="btn s" href="#korporat" style="background:#fff;color:var(--nv);box-shadow:inset 0 0 0 1.5px var(--ln)">Minta penawaran korporat</a></div></div>`}
function studi(i){const c=CS[i],nx=(i+1)%3;return head(crumb("Studi kasus",c.n),c.k,c.n)+`<div class="w sp"><div class="mt"><div><b>${c.m[0]}</b><small>${c.m[1]}</small></div><div><b>${c.m2[0]}</b><small>${c.m2[1]}</small></div><div><b>${c.m3[0]}</b><small>${c.m3[1]}</small></div></div><p style="color:var(--mu);font-size:13.5px;margin-top:-14px">Angka contoh untuk tampilan template.</p>
<div class="fl"><h2>Tantangan</h2><p style="color:var(--mu)">${c.tc}</p></div><div class="fl"><h2>Solusi</h2><p style="color:var(--mu)">${c.sl}</p></div><div class="fl"><h2>Layanan yang digunakan</h2><ul>${c.sv.map(j=>`<li><a href="#layanan-${j+1}" style="color:var(--sk);font-weight:600">${SVC[j].n} →</a></li>`).join("")}</ul></div>
<div class="pn"><a class="btn s" href="#korporat">Diskusikan kebutuhan serupa →</a><a class="btn s" href="#studi-${nx+1}" style="background:#fff;color:var(--nv);box-shadow:inset 0 0 0 1.5px var(--ln)">${CS[nx].n} →</a></div></div>`}
const SR=[["Reguler",2500,6,"darat dan laut"],["Ekspres",9000,18,"udara"],["Kargo curah",1200,3,"laut, minimal 100 kg"]];
const dist=(a,b)=>{const R=6371,t=x=>x*Math.PI/180,A=HB[a],B=HB[b],dl=t(B.la-A.la),dn=t(B.lo-A.lo),h=Math.sin(dl/2)**2+Math.cos(t(A.la))*Math.cos(t(B.la))*Math.sin(dn/2)**2;return 2*R*Math.asin(Math.sqrt(h))};
let TF={o:1,d:2,s:0,k:10,v:0};
function tarif(){const opts=HB.map((h,i)=>`<option value="${i}">${h.n}</option>`).join("");
return head(crumb("Cek tarif"),"Kalkulator tarif","Berapa ongkos kirim Anda?","Pilih rute, layanan, dan ukuran kiriman untuk perkiraan tarif dan waktu tempuh.")+`<div class="w sp"><div class="cn"><div class="ft cd"><label for="to">Kota asal</label><select id="to">${opts}</select><label for="td">Kota tujuan</label><select id="td">${opts}</select><label for="ts">Layanan</label><select id="ts">${SR.map((s,i)=>`<option value="${i}">${s[0]} (${s[3]})</option>`).join("")}</select><div class="r2"><div><label for="tk">Berat (kg)</label><input type="number" id="tk" min="1" value="${TF.k}"></div><div><label for="tv">Volume (m³, opsional)</label><input type="number" id="tv" min="0" step="0.1" value="${TF.v}"></div></div></div>
<div class="rs" id="rs"></div></div></div>`}
function tcalc(){const o=+$("to").value,d=+$("td").value,s=+$("ts").value,k=Math.max(1,+$("tk").value||1),v=Math.max(0,+$("tv").value||0);TF={o,d,s,k,v};
const dk=dist(o,d),S=SR[s];let ch=Math.max(k,v*250);if(s===2)ch=Math.max(ch,100);let pr=o===d?0:ch*(S[1]+dk*S[2]);pr=o===d?0:Math.max(pr,[15000,40000,0][s]);
const dy=o===d?1:s===0?Math.ceil(dk/500)+1:s===1?(dk>1500?2:1):Math.ceil(dk/300)+3;
replaceMarkup($("rs"),`<small>Perkiraan ongkos</small><div class="pr">${o===d?"Pilih rute berbeda":rp(pr)}</div><div class="tr">Estimasi ${dy} ${s===1&&dy<=2?"hari":"hari kerja"}</div><dl><dt>Rute</dt><dd>${HB[o].n} → ${HB[d].n}</dd><dt>Jarak</dt><dd>±${Math.round(dk).toLocaleString("id-ID")} km</dd><dt>Berat dikenakan</dt><dd>${Math.round(ch)} kg</dd><dt>Layanan</dt><dd>${S[0]}</dd></dl><a class="btn" target="_blank" rel="noopener" style="width:100%" href="${wl(`Halo ${BRAND}, saya ingin kirim barang ${HB[o].n} ke ${HB[d].n}, layanan ${S[0]}, berat ${k} kg${v?`, volume ${v} m³`:""}. Estimasi ${rp(pr)}, sekitar ${dy} hari. Mohon konfirmasi tarif dan jadwal pengambilan.`)}">Pesan lewat WhatsApp</a><p class="nt2">Estimasi kasar berdasarkan tarif contoh. Tarif final dikonfirmasi tim kami, dan dapat dipengaruhi jenis barang, kemasan, dan biaya tambahan.</p>`)}
function jaringan(){return head(crumb("Jaringan"),"Jaringan nasional","Hub kami di seluruh nusantara","Klik salah satu titik pada peta untuk melihat detail hub dan koridor yang terhubung.")+`<div class="w sp"><div class="tg" style="grid-template-columns:1.4fr .6fr"><div class="mp" id="jm" style="position:static">${map({click:true})}</div><div class="hb" id="jh"></div></div></div>`}
function hub(i){const h=HB[i],lk=RT.filter(r=>r.includes(i)).map(r=>HB[r[0]===i?r[1]:r[0]].n);replaceMarkup($("jh"),`<span class="ey">Hub</span><h3>${h.n}</h3><dl><dt>Kapasitas gudang</dt><dd>${h.c} (contoh)</dd><dt>Jam operasional</dt><dd>24 jam (contoh)</dd><dt>Terhubung ke</dt><dd>${lk.join(", ")||"-"}</dd></dl><p style="margin-top:18px"><a class="btn s" href="#tarif">Cek tarif dari ${h.n}</a></p>`);}
function korporat(){return head(crumb("Penawaran korporat"),"Solusi korporat","Rancang kerja sama logistik Anda","Ceritakan kebutuhan pengiriman rutin perusahaan. Account manager kami akan menghubungi dalam satu hari kerja.")+`<div class="w sp"><div class="cn"><div class="ft cd"><label for="kp">Perusahaan</label><input type="text" id="kp" placeholder="Nama perusahaan"><label for="kn">Nama PIC</label><input type="text" id="kn" placeholder="Nama lengkap"><label for="kc">WhatsApp atau email</label><input type="text" id="kc" placeholder="Kontak yang bisa dihubungi"><label for="kv">Volume per bulan</label><select id="kv"><option>Di bawah 1 ton</option><option>1 sampai 10 ton</option><option>10 sampai 100 ton</option><option>Di atas 100 ton</option></select><label for="kr">Rute utama</label><input type="text" id="kr" placeholder="Contoh: Jakarta ke Surabaya"><label>Layanan yang dibutuhkan</label>${["Trucking dan distribusi","Kargo laut","Kargo udara","Pergudangan dan fulfillment"].map((x,i)=>`<label class="ck"><input type="checkbox" data-k="${x}" ${i===0?"checked":""}>${x}</label>`).join("")}<a class="btn" id="kw" href="#" target="_blank" rel="noopener" style="width:100%;margin-top:24px">Kirim permintaan ke WhatsApp</a></div>
<div class="fl" style="grid-template-columns:1fr;margin-top:0;gap:14px"><h2>Yang Anda dapatkan</h2><ul><li>Account manager khusus</li><li>Kesepakatan tingkat layanan (SLA) tertulis</li><li>Laporan pengiriman berkala</li><li>Penagihan terpusat dengan invoice resmi</li></ul></div></div></div>`}
function kupd(){const l=[...document.querySelectorAll("[data-k]:checked")].map(c=>c.dataset.k).join(", ");$("kw").href=wl(`Halo ${BRAND}, saya ${$("kn").value||"calon klien"} dari ${$("kp").value||"(perusahaan)"}. Kami membutuhkan ${l||"layanan logistik"}, volume ${$("kv").value}, rute utama ${$("kr").value||"-"}. Kontak: ${$("kc").value||"-"}. Mohon penawaran korporat.`)}
/* router */
let pend=null;
function route(){let h=location.hash.slice(1)||"beranda",m,html=null,t="NusaVektor Logistics – Rantai Pasok Tepat Waktu";
if(m=h.match(/^lacak-([A-Za-z0-9]+)$/)){html=lacak(m[1].toUpperCase());t="Lacak "+m[1].toUpperCase()}
else if(m=h.match(/^layanan-(\d)$/)){if(SVC[m[1]-1]){html=layanan(m[1]-1);t=SVC[m[1]-1].n}}
else if(m=h.match(/^studi-(\d)$/)){if(CS[m[1]-1]){html=studi(m[1]-1);t=CS[m[1]-1].n}}
else if(h==="tarif"){html=tarif();t="Cek tarif"}else if(h==="jaringan-peta"){html=jaringan();t="Jaringan"}else if(h==="korporat"){html=korporat();t="Penawaran korporat"}
const sub=$("v-sub");
if(html){replaceMarkup(sub,html);sub.classList.add("on");$("v-beranda").classList.remove("on");
if(h==="tarif"){const f=()=>tcalc();["to","td","ts","tk","tv"].forEach(i=>$(i).oninput=f);$("to").value=TF.o;$("td").value=TF.d;$("ts").value=TF.s;f()}
if(h==="jaringan-peta"){hub(2);$("jm").onclick=e=>{const g=e.target.closest("[data-i]");if(g)hub(+g.dataset.i)}}
if(h==="korporat"){document.querySelectorAll(".ft input,.ft select").forEach(e=>e.oninput=kupd);kupd()}
document.title=t+" – NusaVektor";window.scrollTo(0,0)}
else{sub.classList.remove("on");$("v-beranda").classList.add("on");document.title=t;if(pend){const el=$(pend);pend=null;setTimeout(()=>el&&el.scrollIntoView(),60)}else window.scrollTo(0,0)}}
addEventListener("hashchange",route);
document.querySelectorAll(".nl button").forEach(b=>b.onclick=()=>{if($("v-beranda").classList.contains("on"))$(b.dataset.s).scrollIntoView();else{pend=b.dataset.s;location.hash="beranda"}});route();
/* chat */
const KB=[
[/tarif|ongkir|ongkos|biaya|harga|berapa/,()=>"Gunakan kalkulator Cek tarif untuk perkiraan ongkos dan waktu tempuh berdasarkan rute, layanan, dan berat. Tarif final dikonfirmasi tim kami.",["Cek tarif","Penawaran korporat"]],
[/laut|kontainer|fcl|lcl/,()=>"Kargo laut cocok untuk volume besar antar pulau dengan biaya efisien. Detailnya ada di halaman layanan Kargo laut.",["Cek tarif","Penawaran korporat"]],
[/udara|pesawat|cepat|ekspres/,()=>"Kargo udara dan layanan ekspres tersedia untuk kiriman mendesak atau bernilai tinggi.",["Cek tarif"]],
[/gudang|fulfillment|stok/,()=>"Kami menyediakan pergudangan dan fulfillment: penyimpanan, pick and pack, sampai pengiriman pesanan.",["Penawaran korporat"]],
[/korporat|perusahaan|kontrak|sla|b2b/,()=>"Untuk kebutuhan rutin perusahaan, ajukan penawaran korporat. Account manager kami menghubungi dalam satu hari kerja.",["Penawaran korporat"]],
[/jaringan|hub|cakupan|kota|jangkau/,()=>"Hub utama kami tersebar di tujuh kota. Lihat peta jaringan untuk detail tiap hub.",["Lihat jaringan"]],
[/larang|dilarang|barang berbahaya|aturan/,()=>"Pengiriman barang tertentu tunduk pada ketentuan dan peraturan yang berlaku. Sebutkan jenis barang Anda ke customer care agar dicek lebih dulu.",["Lanjut ke WhatsApp"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Halo, selamat datang di NusaVektor. Ketik nomor resi untuk melacak, atau tanyakan tentang layanan.",["Cek tarif","Penawaran korporat","Lacak NV2026001"]]];
const lg=[];function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;ms.append(d);ms.scrollTop=1e9;if(c==="u")lg.push(t)}
function chips(a){cps.replaceChildren();a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>{const l=v.match(/^Lihat jaringan$/),c=v==="Cek tarif",k=v==="Penawaran korporat";if(l){cp.classList.remove("on");location.hash="jaringan-peta"}else if(c){cp.classList.remove("on");location.hash="tarif"}else if(k){cp.classList.remove("on");location.hash="korporat"}else if(/^Buka pelacakan /.test(v)){cp.classList.remove("on");location.hash="lacak-"+v.split(" ").pop()}else ask(v.replace("Lacak ","").trim())};cps.append(b)})}
function waU(){cw.href=wl(`Halo ${BRAND}, saya menghubungi dari website.`+(lg.length?` Pertanyaan saya: ${lg.join("; ")}.`:" Saya ingin konsultasi."))}
function ask(t){say(t,"u");const r=t.toUpperCase().match(/NV\d{7}/);
if(r){setTimeout(()=>{const s=SH[r[0]];if(s){say(`Resi ${r[0]}: ${HB[s.o].n} ke ${HB[s.d].n}, status saat ini "${s.st===6?"Diterima":ST[s.st]}". Estimasi tiba: ${s.eta}. (Data demo)`,"b");chips(["Buka pelacakan "+r[0],"Cek tarif"])}else{say(`Resi ${r[0]} belum ditemukan. Periksa kembali nomornya, atau lanjut ke WhatsApp untuk dibantu tim kami.`,"b");chips(["Lacak NV2026001"])}waU()},350);return}
if(/whatsapp|\bwa\b|admin|manusia|cs\b|petugas/i.test(t)){setTimeout(()=>{say("Baik, tekan tombol hijau di bawah. Pertanyaan Anda ikut terkirim.","b");waU()},300);return}
const m=KB.find(([x])=>x.test(t.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab tim kami langsung. Tekan WhatsApp di bawah, pertanyaan Anda ikut terkirim.","b");chips(["Cek tarif","Penawaran korporat"])}waU()},350)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let fi=true;fab.onclick=()=>{cp.classList.toggle("on");if(cp.classList.contains("on")&&fi){fi=false;say("Halo, saya asisten virtual NusaVektor. Saya bisa melacak resi (contoh: NV2026001), menjelaskan layanan, dan mengarahkan ke kalkulator tarif.","b");chips(["Cek tarif","Penawaran korporat","Lacak NV2026001"]);waU()}};x.onclick=()=>cp.classList.remove("on");
const nusavektorMenuButton=$("nusavektor-menu-button"),nusavektorMenu=$("nusavektor-menu");
function closeNusavektorMenu(){nusavektorMenu.classList.remove("open");nusavektorMenu.setAttribute("aria-hidden","true");nusavektorMenuButton.setAttribute("aria-expanded","false");nusavektorMenuButton.setAttribute("aria-label","Buka menu navigasi")}
function toggleNusavektorMenu(){const open=!nusavektorMenu.classList.contains("open");nusavektorMenu.classList.toggle("open",open);nusavektorMenu.setAttribute("aria-hidden",open?"false":"true");nusavektorMenuButton.setAttribute("aria-expanded",open?"true":"false");nusavektorMenuButton.setAttribute("aria-label",open?"Tutup menu navigasi":"Buka menu navigasi")}
nusavektorMenuButton.onclick=toggleNusavektorMenu;
nusavektorMenu.querySelectorAll("button[data-s]").forEach(button=>button.onclick=()=>{closeNusavektorMenu();if($("v-beranda").classList.contains("on")){$(button.dataset.s).scrollIntoView({behavior:"smooth"})}else{pend=button.dataset.s;location.hash="beranda"}});
addEventListener("keydown",event=>{if(event.key==="Escape")closeNusavektorMenu()});
addEventListener("hashchange",()=>closeNusavektorMenu());
document.querySelectorAll("[data-hash]").forEach(button=>button.onclick=()=>{location.hash=button.dataset.hash});
</script>
</body>
</html>

@endverbatim
