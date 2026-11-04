@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="color-scheme" content="dark">
<title>NOIR Atelier – Luxury Auto Detailing</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Syncopate:wght@400;700&family=Cormorant+Garamond:ital,wght@0,500;1,500;1,600&family=Manrope:wght@400;500;700&display=swap">
<style>
:root{--bg:#08080A;--s:#121216;--s2:#1B1B21;--ink:#ECECEF;--mute:#ECECEF99;--line:#ECECEF1f;--red:#E10B2D;--plat:#C9CED6;--d:'Syncopate','Arial Black',sans-serif;--i:'Cormorant Garamond',Georgia,serif;--b:'Manrope','Helvetica Neue',Arial,sans-serif;color-scheme:dark;box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
html{scroll-behavior:smooth;scroll-padding-top:74px}*{box-sizing:border-box;margin:0}
body{background:var(--bg);color:var(--ink);font:400 16px/1.7 var(--b);overflow-x:hidden}
a{color:inherit;text-decoration:none}button{font:inherit;color:inherit}
nav{position:fixed;top:0;left:0;right:0;z-index:70;background:#08080Af2;border-bottom:1px solid var(--line);padding-top:env(safe-area-inset-top,0px)}
nav::before{content:"";position:absolute;inset:0;z-index:0;backdrop-filter:blur(16px);pointer-events:none}
.bar{position:relative;z-index:1;display:flex;align-items:center;justify-content:space-between;padding:14px 4vw;gap:16px}
.logo{font:700 15px var(--d);letter-spacing:.3em}.logo i{color:var(--red);font-style:normal}
#menu{display:flex;gap:24px;font:500 11px var(--b);letter-spacing:.22em;text-transform:uppercase}
#menu a{padding:4px 0;color:var(--mute);border-bottom:1px solid transparent;transition:.25s}#menu a:hover,#menu a.on{color:var(--ink);border-color:var(--red)}
#prog{position:absolute;left:0;bottom:-1px;height:2px;width:0;background:var(--red)}
.btn{display:inline-block;border:1px solid var(--plat);background:none;padding:13px 30px;font:500 11px var(--b);letter-spacing:.24em;text-transform:uppercase;cursor:pointer;transition:.3s;color:var(--ink)}
.btn:hover{background:var(--ink);color:var(--bg)}.btn.r{background:var(--red);border-color:var(--red);color:#fff}.btn.r:hover{background:#fff;color:var(--red);border-color:#fff}
#burger{display:none;border:1px solid var(--line);background:none;padding:7px 14px;font:500 11px var(--b);letter-spacing:.2em;cursor:pointer}
section{padding:130px 4vw 40px;position:relative;max-width:1400px;margin:auto}
.kick{font:500 11px var(--b);letter-spacing:.34em;text-transform:uppercase;color:var(--red)}
h2{font:700 clamp(26px,4.4vw,60px)/1.12 var(--d);letter-spacing:.02em;margin:14px 0 18px;text-transform:uppercase}
h2 em{font:italic 500 1.12em var(--i);text-transform:none;color:var(--plat);letter-spacing:0}
.lead{max-width:56ch;color:var(--mute);font-size:18px}
/* hero */
#beranda{min-height:100svh;display:grid;grid-template-columns:1fr 1fr;align-items:center;gap:3vw;padding-top:110px;padding-bottom:70px;max-width:none}
.hl{position:absolute;top:34%;width:36vw;height:22vw;max-width:520px;background:radial-gradient(ellipse,#fff4 0,#E10B2D22 35%,transparent 70%);opacity:0;transition:opacity 1.2s;pointer-events:none;filter:blur(8px)}
.hl.a{left:-6vw}.hl.b{right:-6vw}body.on .hl{opacity:1}
.hero-t{position:relative;z-index:2;padding-left:2vw}
.hero-t h1{font:700 clamp(32px,5.6vw,84px)/1.04 var(--d);letter-spacing:.01em;text-transform:uppercase;margin:18px 0 24px}
.hero-t h1 em{display:block;font:italic 600 1.25em/.9 var(--i);text-transform:none;color:var(--plat)}
.hero-t p{max-width:42ch;color:var(--mute);font-size:18px}
.st{display:flex;align-items:center;gap:18px;margin-top:38px}
#start{width:104px;height:104px;border-radius:50%;border:2px solid var(--plat);background:radial-gradient(circle at 50% 35%,#2a2a31,#0c0c0f);cursor:pointer;font:700 10px var(--d);letter-spacing:.18em;line-height:1.5;position:relative;transition:.4s;box-shadow:0 0 0 7px #ffffff08}
#start::before{content:"";position:absolute;inset:-9px;border-radius:50%;border:1px solid var(--red);opacity:0;animation:pl 2.2s infinite}
@keyframes pl{0%{opacity:.9;transform:scale(.92)}100%{opacity:0;transform:scale(1.25)}}
body.on #start{border-color:var(--red);box-shadow:0 0 30px #E10B2D77;color:var(--red)}
.st span{font:italic 500 22px var(--i);color:var(--plat)}
.gauge{position:relative;z-index:2;width:min(86vw,560px);justify-self:center}
.gauge svg{width:100%;display:block;filter:drop-shadow(0 30px 50px #000)}
.nd{transform-box:view-box;transform-origin:200px 200px}
.rd{position:absolute;left:0;right:0;top:63%;text-align:center}
.rd b{font:700 clamp(30px,5vw,54px)/1 var(--d);letter-spacing:.04em;display:block}.rd small{font:500 10px var(--b);letter-spacing:.34em;color:var(--mute);text-transform:uppercase}
.tick{border-block:1px solid var(--line);overflow:hidden;white-space:nowrap;padding:16px 0;margin-top:60px}
.tick span{display:inline-block;font:italic 500 30px var(--i);color:var(--plat);animation:mq 40s linear infinite}
@keyframes mq{to{transform:translateX(-50%)}}
/* filosofi */
.fil{display:grid;grid-template-columns:1.1fr .9fr;gap:6vw;align-items:end}
.nums{display:grid;grid-template-columns:1fr 1fr;gap:1px;background:var(--line);border:1px solid var(--line)}
.nums div{background:var(--bg);padding:28px 24px}.nums b{display:block;font:700 clamp(28px,3.4vw,46px)/1 var(--d)}.nums span{font:500 10px var(--b);letter-spacing:.24em;text-transform:uppercase;color:var(--mute)}
/* konfigurator */
.cfg{display:grid;grid-template-columns:1.25fr 1fr;gap:3vw;margin-top:40px}
.stage{position:relative;background:radial-gradient(ellipse at 50% 20%,#34343c,#121216 70%);border:1px solid var(--line);aspect-ratio:1.28;display:grid;place-items:center;overflow:hidden}
.stage::after{content:"";position:absolute;left:8%;right:8%;bottom:16%;height:2px;background:linear-gradient(90deg,transparent,#fff3,transparent)}
.car{width:92%;--paint:#15161a;--gl:.55;--bead:0;--ppf:0;--rim:#6b6f78;transition:filter .5s}
.car .p{fill:var(--paint);transition:fill .6s}
.car .gl{opacity:var(--gl);transition:opacity .5s}.car .bd{opacity:var(--bead);transition:opacity .6s}
.car .pf{opacity:var(--ppf);transition:opacity .6s}.car .pf rect{animation:ps 3.4s ease-in-out infinite}
@keyframes ps{0%{transform:translateX(-300px)}60%,100%{transform:translateX(700px)}}
.car .rm{stroke:var(--rim);transition:stroke .5s}
.fl{position:absolute;left:18px;top:14px;font:500 10px var(--b);letter-spacing:.28em;text-transform:uppercase;color:var(--mute)}.fl b{color:var(--ink)}
.ctl h3{font:500 10px var(--b);letter-spacing:.3em;text-transform:uppercase;color:var(--mute);margin:0 0 12px}
.ctl>div{margin-bottom:30px}
.sw{display:flex;gap:12px;flex-wrap:wrap}
.sw button{width:42px;height:42px;border-radius:50%;border:2px solid var(--line);background:var(--c);cursor:pointer;transition:.3s}.sw button.on{border-color:var(--ink);transform:scale(1.14);box-shadow:0 0 0 4px var(--bg),0 0 0 5px var(--red)}
.fin{display:flex;border:1px solid var(--line)}.fin button{flex:1;background:none;border:0;border-right:1px solid var(--line);padding:11px;font:500 11px var(--b);letter-spacing:.2em;text-transform:uppercase;cursor:pointer}.fin button:last-child{border:0}.fin button.on{background:var(--ink);color:var(--bg)}
.ad{display:flex;justify-content:space-between;align-items:center;gap:14px;padding:13px 0;border-top:1px solid var(--line);cursor:pointer}
.ad:last-child{border-bottom:1px solid var(--line)}
.ad i{width:18px;height:18px;border:1px solid var(--plat);display:grid;place-items:center;font-style:normal;font-size:12px;flex:none;transition:.2s}.ad.on i{background:var(--red);border-color:var(--red)}
.ad span{flex:1;font-size:15px}.ad small{color:var(--mute);white-space:nowrap}
.tot{display:flex;justify-content:space-between;align-items:flex-end;margin-top:6px}.tot b{font:700 clamp(24px,3vw,36px) var(--d)}
/* proses */
.pr{display:grid;grid-template-columns:.8fr 1.2fr;gap:6vw;margin-top:30px}
.pr ol{list-style:none;padding:0}.pr li{display:grid;grid-template-columns:80px 1fr;gap:18px;padding:26px 0;border-top:1px solid var(--line);transition:.4s}.pr li:last-child{border-bottom:1px solid var(--line)}
.pr li:hover{padding-left:16px;background:linear-gradient(90deg,#E10B2D18,transparent)}
.pr li b{font:italic 600 52px/1 var(--i);color:var(--red)}.pr h3{font:700 14px var(--d);letter-spacing:.1em;text-transform:uppercase}.pr p{color:var(--mute);margin-top:6px;font-size:15px}
.pr .sticky{position:sticky;top:110px;align-self:start}
/* member */
.tiers{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1px;background:var(--line);border:1px solid var(--line);margin-top:40px}
.tier{background:var(--bg);padding:42px 30px;display:flex;flex-direction:column;transition:background .4s}.tier:hover{background:var(--s)}
.tier.k{background:linear-gradient(170deg,#1c0a0f,#08080A 60%)}
.tier h3{font:700 16px var(--d);letter-spacing:.2em;text-transform:uppercase}.tier .pc{font:italic 600 46px/1 var(--i);margin:18px 0 4px}.tier small{color:var(--mute)}
.tier ul{list-style:none;padding:0;margin:22px 0 30px;flex:1;display:grid;gap:10px;font-size:15px;color:var(--mute)}.tier li::before{content:"— ";color:var(--red)}
/* testi + faq */
.q{margin-top:30px;min-height:210px;position:relative}
.q blockquote{position:absolute;inset:0;opacity:0;transition:opacity .9s;font:italic 500 clamp(26px,3.6vw,48px)/1.2 var(--i)}
.q blockquote.on{opacity:1}.q cite{display:block;font:500 11px var(--b);letter-spacing:.26em;text-transform:uppercase;color:var(--mute);margin-top:18px;font-style:normal}
.dots{display:flex;gap:10px;margin-top:10px}.dots button{width:36px;height:3px;border:0;background:var(--line);cursor:pointer}.dots button.on{background:var(--red)}
details{border-top:1px solid var(--line);padding:22px 0}details:last-of-type{border-bottom:1px solid var(--line)}
summary{cursor:pointer;font:500 13px var(--d);letter-spacing:.06em;text-transform:uppercase;list-style:none;display:flex;justify-content:space-between;gap:16px}summary::after{content:"+";color:var(--red);font-size:22px;line-height:1;transition:transform .3s}details[open] summary::after{transform:rotate(45deg)}
details p{color:var(--mute);margin-top:12px;max-width:62ch}
/* kontak */
.ct{display:grid;grid-template-columns:1fr 1fr;gap:6vw;margin-top:30px}
.form{display:grid;gap:22px}.form label{font:500 10px var(--b);letter-spacing:.28em;text-transform:uppercase;color:var(--mute)}
.form input,.form select,.form textarea{width:100%;margin-top:6px;border:0;border-bottom:1px solid var(--plat);background:transparent;padding:10px 0;font:400 17px var(--b);color:var(--ink);border-radius:0;resize:none}
.form select option{background:#121216;color:#ECECEF}
footer{max-width:1400px;margin:90px auto 0;padding:30px 4vw 110px;border-top:1px solid var(--line);display:flex;justify-content:space-between;gap:20px;flex-wrap:wrap;font-size:12px;color:var(--mute);letter-spacing:.1em}
#bot{position:fixed;right:16px;bottom:calc(16px + env(safe-area-inset-bottom,0px));z-index:100}
#fab{width:66px;height:66px;border-radius:50%;border:1px solid var(--plat);background:#0c0c0fee;cursor:pointer;font:700 12px var(--d);letter-spacing:.1em;position:relative;box-shadow:0 12px 30px #000}
#fab::after{content:"";position:absolute;top:8px;right:8px;width:9px;height:9px;border-radius:50%;background:var(--red);box-shadow:0 0 12px var(--red)}
#box{display:none;position:absolute;right:0;bottom:82px;width:min(380px,calc(100vw - 32px));height:min(540px,72vh);background:var(--s);border:1px solid var(--plat);flex-direction:column;overflow:hidden;box-shadow:0 30px 80px #000}
#box.on{display:flex}
.hh{padding:16px 20px;border-bottom:1px solid var(--line);display:flex;justify-content:space-between;align-items:center}.hh b{font:700 11px var(--d);letter-spacing:.24em;text-transform:uppercase}.hh a{font:500 10px var(--b);letter-spacing:.2em;text-transform:uppercase;color:var(--red);border-bottom:1px solid var(--red)}
#log{flex:1;overflow:auto;padding:16px 20px;display:flex;flex-direction:column;gap:12px}
.m{max-width:88%;font-size:14.5px;line-height:1.55;white-space:pre-line;color:var(--mute);border-left:2px solid var(--red);padding-left:12px}
.m.u{align-self:flex-end;border:0;background:var(--ink);color:var(--bg);padding:8px 14px}
.qc{display:flex;flex-wrap:wrap;gap:6px;padding:0 20px 12px}.qc button{border:1px solid var(--line);background:none;padding:4px 12px;font:500 10px var(--b);letter-spacing:.14em;text-transform:uppercase;cursor:pointer}.qc button:hover{border-color:var(--red)}
#f{display:flex;border-top:1px solid var(--line)}#f input{flex:1;min-width:0;border:0;background:none;color:var(--ink);padding:15px 20px;font:16px var(--b)}#f input:focus{outline:0}#f button{border:0;background:none;color:var(--red);padding:0 20px;font:500 11px var(--b);letter-spacing:.2em;text-transform:uppercase;cursor:pointer}
:focus-visible{outline:2px solid var(--red);outline-offset:3px}
@media(max-width:960px){#burger{display:block}.nb{display:none}#menu{position:fixed;left:0;right:0;top:calc(58px + env(safe-area-inset-top,0px));bottom:0;height:calc(100dvh - 58px - env(safe-area-inset-top,0px));overflow-y:auto;background:var(--bg);flex-direction:column;gap:0;padding:20px 4vw;font:700 22px/1.2 var(--d);letter-spacing:.06em;transform:translateY(-110%);visibility:hidden;opacity:0;pointer-events:none;transition:transform .5s cubic-bezier(.7,0,.2,1),visibility .5s,opacity .2s;z-index:65}#menu.open{transform:none;visibility:visible;opacity:1;pointer-events:auto}#menu a{padding:16px 0;border-bottom:1px solid var(--line)}#beranda,.fil,.cfg,.pr,.ct{grid-template-columns:1fr}.pr .sticky{position:static}.hero-t{padding-left:0}}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}
</style>
</head>
<body>
<nav><div class="bar"><a class="logo" href="#beranda">NOIR<i>.</i>ATELIER</a>
  <div id="menu" aria-label="Menu utama" aria-hidden="true"><a href="#beranda">Beranda</a><a href="#filosofi">Filosofi</a><a href="#konfigurator">Konfigurator</a><a href="#proses">Proses</a><a href="#keanggotaan">Keanggotaan</a><a href="#faq">FAQ</a><a href="#kontak">Kontak</a></div>
  <a class="btn r nb" href="#kontak">Reservasi</a><button id="burger" aria-expanded="false" aria-controls="menu">MENU</button></div><div id="prog"></div></nav>

<div class="hl a"></div><div class="hl b"></div>
<section id="beranda">
  <div class="hero-t"><span class="kick">Luxury auto detailing · Surabaya</span>
    <h1>Seni merawat <em>yang tak terlihat.</em></h1>
    <p>Atelier privat untuk mobil yang layak diperlakukan seperti mahakarya. Satu mobil, satu teknisi utama, nol kompromi.</p>
    <div class="st"><button id="start" aria-label="Nyalakan mesin">PUSH<br>START</button><span id="stt">Tekan untuk menyalakan.</span></div></div>
  <div class="gauge"><svg viewBox="0 0 400 400" aria-hidden="true"><circle cx="200" cy="200" r="190" fill="#0c0c0f" stroke="#ECECEF33" stroke-width="2"/><circle cx="200" cy="200" r="178" fill="none" stroke="#ECECEF14" stroke-width="1"/><path id="rz" fill="none" stroke="#E10B2D" stroke-width="7"/><g id="tk"></g><g class="nd" id="nd"><path d="M200 196 L176 197 L176 203 L200 204Z M176 197 L340 199 L340 201 L176 203Z" fill="#E10B2D"/><circle cx="200" cy="200" r="16" fill="#1B1B21" stroke="#C9CED6" stroke-width="2"/></g></svg>
  <div class="rd"><b id="rpm">0</b><small>RPM</small></div></div>
  <div class="tick" style="grid-column:1/-1" aria-hidden="true"><span>Paint correction ✦ Ceramic coating ✦ Paint protection film ✦ Interior atelier ✦ Wheel &amp; caliper ✦ Paint correction ✦ Ceramic coating ✦ Paint protection film ✦ Interior atelier ✦ Wheel &amp; caliper ✦ </span></div>
</section>

<section id="filosofi"><div class="fil"><div><span class="kick">Filosofi</span><h2>Kemewahan ada pada <em>kesabaran.</em></h2><p class="lead">Kami tidak mengerjakan puluhan mobil sehari. Kami mengerjakan sedikit, dengan waktu yang cukup, di bawah cahaya studio yang tidak bisa menyembunyikan apa pun. Hasilnya bukan sekadar bersih, tetapi dalam.</p></div>
  <div class="nums"><div><b>9</b><span>Tahun berkarya</span></div><div><b>40</b><span>Titik inspeksi</span></div><div><b>1:1</b><span>Satu teknisi per mobil</span></div><div><b>5 th</b><span>Garansi coating</span></div></div></div></section>

<section id="konfigurator"><span class="kick">Konfigurator</span><h2>Rancang <em>perawatanmu.</em></h2><p class="lead">Pilih warna cat, finish, dan perlakuan. Pratinjau dan estimasi investasi langsung berubah.</p>
  <div class="cfg"><div class="stage"><div class="fl">Cat <b id="fc">Obsidian</b> · Finish <b id="ff">Gloss</b></div>
    <svg class="car" id="car" viewBox="0 0 600 240" aria-label="Pratinjau mobil"><defs><clipPath id="cb"><path id="bp" d="M24 170L24 150C24 140 34 134 52 131L128 124C160 96 214 76 286 74C352 72 404 86 440 112L520 124C556 128 578 138 580 152L580 170Z"/></clipPath><linearGradient id="g1" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fff" stop-opacity=".75"/><stop offset=".45" stop-color="#fff" stop-opacity=".05"/><stop offset=".5" stop-color="#000" stop-opacity=".25"/><stop offset="1" stop-color="#fff" stop-opacity=".18"/></linearGradient><pattern id="bd" width="22" height="22" patternUnits="userSpaceOnUse"><circle cx="6" cy="6" r="3" fill="#bfeeff" opacity=".8"/><circle cx="17" cy="15" r="2" fill="#fff" opacity=".8"/></pattern><linearGradient id="g2"><stop offset="0" stop-color="#fff" stop-opacity="0"/><stop offset=".5" stop-color="#fff" stop-opacity=".55"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient></defs>
    <ellipse cx="300" cy="196" rx="270" ry="12" fill="#000" opacity=".55"/>
    <path class="p" d="M24 170L24 150C24 140 34 134 52 131L128 124C160 96 214 76 286 74C352 72 404 86 440 112L520 124C556 128 578 138 580 152L580 170Z"/>
    <path d="M150 122C176 98 218 84 270 82L290 82L292 118ZM306 82C352 82 392 94 420 116L420 118L306 118Z" fill="#0b0f14" opacity=".88"/>
    <g clip-path="url(#cb)"><rect class="gl" width="600" height="240" fill="url(#g1)"/><rect class="bd" width="600" height="240" fill="url(#bd)"/><g class="pf"><rect x="0" y="60" width="80" height="120" fill="url(#g2)" transform="skewX(-20)"/></g></g>
    <path d="M24 170L580 170" stroke="#0006" stroke-width="3"/>
    <g><circle cx="140" cy="172" r="40" fill="#08080A"/><circle cx="140" cy="172" r="30" fill="#17171c"/><circle class="rm" cx="140" cy="172" r="22" fill="none" stroke-width="5"/><circle cx="460" cy="172" r="40" fill="#08080A"/><circle cx="460" cy="172" r="30" fill="#17171c"/><circle class="rm" cx="460" cy="172" r="22" fill="none" stroke-width="5"/></g>
    <rect x="556" y="140" width="20" height="8" rx="3" fill="#fff" opacity=".85"/><rect x="26" y="142" width="14" height="8" rx="3" fill="#E10B2D"/></svg></div>
  <div class="ctl"><div><h3>Warna cat</h3><div class="sw" id="sw"></div></div><div><h3>Finish</h3><div class="fin" id="fin"></div></div>
    <div><h3>Perlakuan tambahan</h3><div id="ads"></div></div>
    <div class="tot"><div><small style="color:var(--mute);font-size:11px;letter-spacing:.2em;text-transform:uppercase">Estimasi investasi</small><br><b id="tot">Rp0</b></div><button class="btn r" id="sendCfg">Kirim rancangan</button></div></div></div></section>

<section id="proses"><span class="kick">Proses</span><div class="pr"><div class="sticky"><h2>Lima babak <em>tanpa terburu-buru.</em></h2><p class="lead">Setiap mobil melewati tahapan yang sama, dicatat dan didokumentasikan.</p></div>
  <ol><li><b>I</b><div><h3>Inspeksi 40 titik</h3><p>Cat, kaca, trim, dan interior difoto dan dicatat sebelum pekerjaan dimulai.</p></div></li><li><b>II</b><div><h3>Dekontaminasi</h3><p>Busa pH netral, iron remover, dan clay mengangkat kotoran yang tertanam.</p></div></li><li><b>III</b><div><h3>Koreksi cat</h3><p>Poles bertahap dengan pengukur ketebalan cat agar aman untuk lapisan clear coat.</p></div></li><li><b>IV</b><div><h3>Proteksi</h3><p>Ceramic coating atau paint protection film diaplikasikan di ruang bebas debu.</p></div></li><li><b>V</b><div><h3>Serah terima</h3><p>Pemeriksaan akhir di bawah lampu studio dan buku panduan perawatan pribadi.</p></div></li></ol></div></section>

<section id="keanggotaan"><span class="kick">Keanggotaan</span><h2>Perawatan yang <em>berkelanjutan.</em></h2><div class="tiers" id="tiers"></div>
  <div class="q" id="q" style="margin-top:80px"></div><div class="dots" id="dots"></div></section>

<section id="faq"><span class="kick">FAQ</span><h2>Pertanyaan <em>yang sering diajukan.</em></h2>
  <div style="margin-top:34px"><details><summary>Berapa lama pengerjaan ceramic coating?</summary><p>Sekitar 3 hari: 1–2 hari untuk koreksi cat, lalu coating dan curing di ruang tertutup.</p></details>
  <details><summary>Apakah coating membuat mobil anti-goresan?</summary><p>Coating melindungi dari goresan halus, noda, dan sinar UV, tetapi tidak kebal terhadap benturan. Untuk perlindungan batu dan goresan dalam, kami sarankan paint protection film.</p></details>
  <details><summary>Apakah ada layanan antar-jemput?</summary><p>Ada. Anggota Platinum dan Black mendapat antar-jemput tertutup untuk area Surabaya dan Sidoarjo.</p></details>
  <details><summary>Bagaimana perawatan setelah coating?</summary><p>Cuci dengan sampo pH netral dan datang untuk maintenance wash berkala. Panduan lengkap kami berikan saat serah terima.</p></details></div></section>

<section id="kontak"><span class="kick">Reservasi</span><h2>Jadwalkan <em>kunjunganmu.</em></h2>
  <div class="ct"><div class="form"><label>Nama<input id="nm" placeholder="Nama lengkap"></label><label>Mobil<input id="mk" placeholder="Contoh: Porsche 911 Carrera 2022"></label>
    <label>Minat<select id="mi"></select></label><label>Tanggal yang diinginkan<input type="date" id="dt"></label><div><button class="btn r" id="go">Kirim ke WhatsApp</button></div></div>
  <div><p class="lead">Studio kami menerima kunjungan dengan janji temu agar setiap tamu mendapat perhatian penuh.</p><p style="margin-top:22px;color:var(--mute)">Surabaya, Jawa Timur<br>Senin–Sabtu, 09.00–17.00 WIB<br>Instagram @noir.atelier</p></div></div></section>

<footer><span>© 2026 NOIR ATELIER</span></footer>

<div id="bot"><div id="box" role="dialog" aria-label="Chat Concierge NOIR"><div class="hh"><b>Concierge NOIR</b><a href="#" id="toWA">Lanjut ke WA</a></div><div id="log"></div><div class="qc" id="chips"></div>
  <form id="f"><input id="in" placeholder="Tanya atau ketik “tambah ceramic”" autocomplete="off" aria-label="Pesan"><button>Kirim</button></form></div><button id="fab" aria-label="Buka chat">N</button></div>

<script>
/* ===== CONFIG ===== */
const WA="6281234567890"; // format 62..., tanpa + atau 0
const BASE=1200000; // Signature Detail
const AD=[{id:"koreksi",n:"Paint Correction",p:1500000,k:/koreksi|correction|swirl/},{id:"ceramic",n:"Ceramic Coating 9H",p:4000000,k:/ceramic|coating/},{id:"ppf",n:"Paint Protection Film",p:12000000,k:/ppf|film/},{id:"interior",n:"Interior Atelier",p:1800000,k:/interior|jok/},{id:"velg",n:"Wheel & Caliper Coating",p:1200000,k:/velg|wheel|caliper/}];
const C=[["Obsidian","#15161a"],["Nardo","#8a8d92"],["Rosso","#b3122b"],["Midnight","#14284f"],["Racing Green","#12392e"]];
const FN=[["Gloss",.55,1],["Satin",.22,.95],["Matte",0,.85]];
const T=[{id:"silver",n:"Silver",p:2500000,f:["4× maintenance wash per tahun","Diskon 10% semua layanan","Prioritas penjadwalan"]},{id:"platinum",n:"Platinum",p:7500000,f:["12× maintenance wash per tahun","Antar-jemput tertutup","Diskon 15% semua layanan","Inspeksi cat setiap kuartal"]},{id:"black",n:"Black",p:18000000,f:["Maintenance wash tanpa batas","Concierge pribadi 24 jam","Diskon 20% semua layanan","Garansi coating diperpanjang"],k:1}];
const QT=[["Mobil saya terlihat lebih baik dari saat keluar dealer.","Andre W., Porsche Macan"],["Mereka menolak mengerjakan kalau hasilnya tidak sempurna. Itu yang saya cari.","Dr. Lestari, Mercedes E-Class"],["Layanan antar-jemputnya terasa seperti valet hotel bintang lima.","Hendra S., BMW 7 Series"]];
const rp=n=>"Rp"+Math.round(n).toLocaleString("id-ID"),$=s=>document.querySelector(s);
const wa=t=>"https://wa.me/"+WA+"?text="+encodeURIComponent(t);
/* nav */
$("#burger").onclick=()=>{const menu=$("#menu"),open=menu.classList.toggle("open");$("#burger").setAttribute("aria-expanded",String(open));menu.setAttribute("aria-hidden",String(!open))};
$("#menu").onclick=e=>{if(e.target.closest("a")&&innerWidth<=960){$("#menu").classList.remove("open");$("#menu").setAttribute("aria-hidden","true");$("#burger").setAttribute("aria-expanded","false")}};
addEventListener("keydown",e=>{if(e.key==="Escape"){$("#menu").classList.remove("open");$("#menu").setAttribute("aria-hidden","true");$("#burger").setAttribute("aria-expanded","false")}});
const links=[...document.querySelectorAll("#menu a")];
new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)links.forEach(a=>a.classList.toggle("on",a.getAttribute("href")=="#"+e.target.id))}),{rootMargin:"-45% 0px -50% 0px"}).observe&&document.querySelectorAll("section").forEach(s=>new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)links.forEach(a=>a.classList.toggle("on",a.getAttribute("href")=="#"+s.id))}),{rootMargin:"-45% 0px -50% 0px"}).observe(s));
addEventListener("scroll",()=>{$("#prog").style.width=scrollY/(document.documentElement.scrollHeight-innerHeight)*100+"%"},{passive:true});
/* tachometer */
const pt=(v,r)=>{const a=(135+v*33.75)*Math.PI/180;return[200+r*Math.cos(a),200+r*Math.sin(a)]};
const tk=document.getElementById("tk"),ns="http://www.w3.org/2000/svg";tk.replaceChildren(...Array.from({length:17},(_,i)=>{const v=i/2,M=i%2==0,[x1,y1]=pt(v,M?158:166),[x2,y2]=pt(v,176),[lx,ly]=pt(v,134),line=document.createElementNS(ns,"line");line.setAttribute("x1",x1);line.setAttribute("y1",y1);line.setAttribute("x2",x2);line.setAttribute("y2",y2);line.setAttribute("stroke",v>=6.5?"#E10B2D":"#ECECEF");line.setAttribute("stroke-width",M?3:1.5);if(M){const text=document.createElementNS(ns,"text");text.setAttribute("x",lx);text.setAttribute("y",ly+6);text.setAttribute("text-anchor","middle");text.setAttribute("fill","#ECECEF");text.setAttribute("font-family","Syncopate,sans-serif");text.setAttribute("font-size","17");text.setAttribute("font-weight","700");text.textContent=v;return [line,text]}return [line]}).flat());
const[ax,ay]=pt(6.5,184),[bx,by]=pt(8,184);$("#rz").setAttribute("d",`M${ax} ${ay}A184 184 0 0 1 ${bx} ${by}`);
let rv=0;const setR=v=>{rv=v;$("#nd").style.transform=`rotate(${135+v*33.75}deg)`;$("#rpm").textContent=Math.round(v*1000).toLocaleString("id-ID")};setR(0);
function tween(to,ms,cb){const f=rv,t0=performance.now();(function s(t){const k=Math.min(1,(t-t0)/ms),e=1-Math.pow(1-k,3);setR(f+(to-f)*e);k<1?requestAnimationFrame(s):cb&&cb()})(t0)}
$("#start").onclick=()=>{document.body.classList.add("on");$("#stt").textContent="Mesin menyala.";tween(7.6,1300,()=>tween(.9,1600,()=>{$("#stt").textContent="Siap. Mari mulai dengan konfigurator."}))};
/* konfigurator */
const st={c:0,f:0,a:new Set()};
$("#sw").replaceChildren(...C.map((c,i)=>{const b=document.createElement("button");b.type="button";b.style.setProperty("--c",c[1]);b.dataset.c=i;b.setAttribute("aria-label",c[0]);b.className=i?"":"on";return b;}));
$("#fin").replaceChildren(...FN.map((f,i)=>{const b=document.createElement("button");b.type="button";b.dataset.f=i;b.className=i?"":"on";b.textContent=f[0];return b;}));
$("#ads").replaceChildren(...AD.map(a=>{const row=document.createElement("div"),icon=document.createElement("i"),name=document.createElement("span"),price=document.createElement("small");row.className="ad";row.dataset.a=a.id;row.setAttribute("role","checkbox");row.setAttribute("aria-checked","false");row.tabIndex=0;name.textContent=a.n;price.textContent="+"+rp(a.p);row.append(icon,name,price);return row;}));
let shown=0;
function draw(){const car=$("#car"),f=FN[st.f],s=car.style;s.setProperty("--paint",C[st.c][1]);s.setProperty("--gl",f[1]);s.filter=`brightness(${f[2]}) saturate(${f[2]})`;
 s.setProperty("--bead",st.a.has("ceramic")?.9:0);s.setProperty("--ppf",st.a.has("ppf")?1:0);s.setProperty("--rim",st.a.has("velg")?"#E10B2D":"#6b6f78");
 $("#fc").textContent=C[st.c][0];$("#ff").textContent=f[0];
 document.querySelectorAll(".sw button").forEach((b,i)=>b.classList.toggle("on",i==st.c));document.querySelectorAll(".fin button").forEach((b,i)=>b.classList.toggle("on",i==st.f));
 document.querySelectorAll(".ad").forEach(d=>{const o=st.a.has(d.dataset.a);d.classList.toggle("on",o);d.setAttribute("aria-checked",o);d.querySelector("i").textContent=o?"✓":""});
 const to=total(),from=shown,t0=performance.now();(function s2(t){const k=Math.min(1,(t-t0)/500);shown=from+(to-from)*k;$("#tot").textContent=rp(shown);if(k<1)requestAnimationFrame(s2)})(t0)}
const total=()=>BASE+AD.filter(a=>st.a.has(a.id)).reduce((s,a)=>s+a.p,0);
const summary=()=>"Cat: "+C[st.c][0]+", finish "+FN[st.f][0]+"\nPerlakuan: Signature Detail"+AD.filter(a=>st.a.has(a.id)).map(a=>", "+a.n).join("")+"\nEstimasi: "+rp(total());
$("#sw").onclick=e=>{const b=e.target.closest("button");if(b){st.c=+b.dataset.c;draw()}};
$("#fin").onclick=e=>{const b=e.target.closest("button");if(b){st.f=+b.dataset.f;draw()}};
const tg=id=>{st.a.has(id)?st.a.delete(id):st.a.add(id);draw()};
$("#ads").onclick=e=>{const d=e.target.closest(".ad");if(d)tg(d.dataset.a)};
$("#ads").onkeydown=e=>{if(e.key==" "||e.key=="Enter"){e.preventDefault();const d=e.target.closest(".ad");if(d)tg(d.dataset.a)}};
draw();
/* member */
$("#tiers").replaceChildren(...T.map(t=>{const tier=document.createElement("div"),title=document.createElement("h3"),price=document.createElement("div"),small=document.createElement("small"),list=document.createElement("ul"),link=document.createElement("a");tier.className="tier"+(t.k?" k":"");title.textContent=t.n;price.className="pc";price.textContent=rp(t.p);small.textContent="per tahun";t.f.forEach(x=>{const li=document.createElement("li");li.textContent=x;list.appendChild(li)});link.className="btn"+(t.k?" r":"");link.href="#kontak";link.dataset.t=t.id;link.textContent="Pilih "+t.n;tier.append(title,price,small,list,link);return tier;}));
$("#mi").replaceChildren(...[{v:"konf",n:"Rancangan dari konfigurator"},...T.map(t=>({v:t.id,n:"Keanggotaan "+t.n})),{v:"k",n:"Konsultasi umum"}].map(o=>{const option=document.createElement("option");option.value=o.v;option.textContent=o.n;return option;}));
$("#tiers").onclick=e=>{const a=e.target.closest("[data-t]");if(a)$("#mi").value=a.dataset.t};
$("#sendCfg").onclick=()=>{$("#mi").value="konf";location.hash="kontak"};
/* testimoni */
$("#q").replaceChildren(...QT.map((q,i)=>{const quote=document.createElement("blockquote"),cite=document.createElement("cite");quote.className=i?"":"on";quote.append(document.createTextNode("“"+q[0]+"”"),cite);cite.textContent=q[1];return quote;}));
$("#dots").replaceChildren(...QT.map((_,i)=>{const b=document.createElement("button");b.type="button";b.className=i?"":"on";b.dataset.i=i;b.setAttribute("aria-label","Testimoni "+(i+1));return b;}));
let qi=0;const showQ=i=>{qi=i;document.querySelectorAll(".q blockquote").forEach((b,k)=>b.classList.toggle("on",k==i));document.querySelectorAll("#dots button").forEach((b,k)=>b.classList.toggle("on",k==i))};
$("#dots").onclick=e=>{const b=e.target.closest("button");if(b)showQ(+b.dataset.i)};setInterval(()=>showQ((qi+1)%QT.length),6000);
/* reservasi */
$("#go").onclick=()=>{const d=$("#dt").value,m=$("#mi").value,t=T.find(x=>x.id==m);
 window.open(wa("Halo NOIR Atelier, saya ingin reservasi.\nMobil: "+($("#mk").value||"-")+"\nMinat: "+(m=="konf"?"Rancangan konfigurator\n"+summary():t?"Keanggotaan "+t.n+" ("+rp(t.p)+"/tahun)":"Konsultasi umum")+"\nTanggal: "+(d?new Date(d).toLocaleDateString("id-ID",{day:"numeric",month:"long",year:"numeric"}):"belum pasti")+"\nNama: "+($("#nm").value||"-")),"_blank","noopener,noreferrer")};
/* ===== Chatbot ===== */
const box=$("#box"),log=$("#log"),inp=$("#in"),hist=[];let hi=false;
const go=id=>{location.hash=id};
const KB=[
 [/harga|biaya|tarif|berapa/,()=>"Signature Detail mulai "+rp(BASE)+". Tambahan:\n"+AD.map(a=>"• "+a.n+" +"+rp(a.p)).join("\n")+"\nCoba konfigurator untuk estimasi lengkap."],
 [/konfigur|rancang|desain|warna/,()=>{go("konfigurator");return"Kubuka konfigurator. Kamu juga bisa bilang “tambah ceramic” atau “warna rosso” dan saya yang mengaturnya."}],
 [/member|anggota|langgan|tier/,()=>{go("keanggotaan");return"Ada tiga tingkat: Silver "+rp(T[0].p)+", Platinum "+rp(T[1].p)+", Black "+rp(T[2].p)+" per tahun."}],
 [/garansi|tahan|awet/,()=>"Ceramic coating bergaransi 5 tahun dengan maintenance wash berkala. PPF bergaransi sesuai pabrikan."],
 [/lama|durasi|hari|selesai/,()=>"Signature Detail 1 hari, Paint Correction 1–2 hari, Ceramic 3 hari, PPF full body 4–5 hari."],
 [/antar|jemput|valet|area|alamat|lokasi/,()=>"Studio di Surabaya. Antar-jemput tertutup gratis untuk anggota Platinum dan Black di Surabaya dan Sidoarjo."],
 [/proses|tahap|cara kerja/,()=>{go("proses");return"Kubuka bagian Proses: lima babak dari inspeksi 40 titik sampai serah terima."}],
 [/dp|bayar|reservasi|booking|jadwal/,()=>"Reservasi dengan DP 30%, pelunasan saat serah terima. Isi form Reservasi atau tekan “Lanjut ke WA”."],
 [/halo|hai|hi\b|pagi|siang|malam/,()=>"Selamat datang di NOIR Atelier. Ada yang bisa saya bantu?"]
];
function add(t,u){const d=document.createElement("div");d.className="m"+(u?" u":"");d.textContent=t;log.appendChild(d);log.scrollTop=log.scrollHeight}
function ask(t){if(!t.trim())return;add(t,1);hist.push("Saya: "+t);const l=t.toLowerCase();let a;
 const ad=AD.find(x=>x.k.test(l)),cl=C.findIndex(c=>l.includes(c[0].toLowerCase().split(" ")[0])),fi=FN.findIndex(f=>l.includes(f[0].toLowerCase()));
 if(ad&&/tambah|pasang|mau|ingin|pakai/.test(l)){st.a.add(ad.id);draw();go("konfigurator");a=ad.n+" kutambahkan ke rancanganmu. Total sekarang "+rp(total())+"."}
 else if(ad&&/hapus|batal|tanpa|lepas/.test(l)){st.a.delete(ad.id);draw();a=ad.n+" kuhapus. Total sekarang "+rp(total())+"."}
 else if(cl>=0&&/warna|cat|ganti/.test(l)){st.c=cl;draw();go("konfigurator");a="Warna "+C[cl][0]+" kupasang. Cantik, bukan?"}
 else if(fi>=0&&/finish|ganti/.test(l)){st.f=fi;draw();a="Finish "+FN[fi][0]+" diterapkan."}
 else if(ad)a=ad.n+": +"+rp(ad.p)+". Bilang “tambah "+ad.id+"” untuk memasukkannya ke konfigurator."
 else{const k=KB.find(([r])=>r.test(l));a=k?k[1]():"Pertanyaan itu paling pas dijawab tim kami langsung. Tekan “Lanjut ke WA” di atas."}
 setTimeout(()=>{add(a);hist.push("Concierge: "+a)},450)}
$("#fab").onclick=()=>{if(box.classList.toggle("on")&&!hi){hi=true;add("Selamat datang di NOIR Atelier. Saya dapat menjelaskan layanan, mengatur konfigurator untuk Anda, atau membantu reservasi.");$("#chips").replaceChildren(...["Harga","Tambah ceramic","Keanggotaan","Garansi","Antar jemput"].map(c=>{const b=document.createElement("button");b.type="button";b.textContent=c;return b;}));}};
$("#chips").onclick=e=>{if(e.target.tagName=="BUTTON")ask(e.target.textContent)};
$("#f").onsubmit=e=>{e.preventDefault();ask(inp.value);inp.value=""};
$("#toWA").onclick=e=>{e.preventDefault();window.open(wa("Halo NOIR Atelier, saya lanjut dari chat website:\n"+(hist.slice(-6).join("\n")||"Saya ingin konsultasi.")+"\n\nRancangan saat ini:\n"+summary()),"_blank","noopener,noreferrer")};
</script>
</body>
</html>
@endverbatim
