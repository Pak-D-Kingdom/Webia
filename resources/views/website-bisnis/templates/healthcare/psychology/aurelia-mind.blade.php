@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Aurelia Mind — Psikologi & Konseling Eksklusif</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500&family=Jost:wght@300;400;500&display=swap">
<style>
:root{--bg:#fbf6f3;--surface:#f4e8e2;--card:#fffdfb;--text:#2d1f22;--muted:#7b6568;--accent:#9c5a64;--line:#ead7cf;--rg1:#b76e79;--rg2:#e8b4a0;--rg3:#f4dcd6;--rgg:linear-gradient(135deg,#e8b4a0,#cf8f8a 50%,#e8b4a0);--deep:#1c1215;--cream:#f7ebe4;--wa:#2f9e5b;color-scheme:light;box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]){--bg:#181012;--surface:#21161a;--card:#271a1f;--text:#f5e9e4;--muted:#bfa7a6;--accent:#e8b4a0;--line:#3b292e;--wa:#3fb36c;color-scheme:dark}}
:root[data-theme="dark"]{--bg:#181012;--surface:#21161a;--card:#271a1f;--text:#f5e9e4;--muted:#bfa7a6;--accent:#e8b4a0;--line:#3b292e;--wa:#3fb36c;color-scheme:dark}
html{scroll-padding-top:calc(80px + env(safe-area-inset-top,0px));scroll-behavior:smooth}
*{box-sizing:border-box}
body{margin:0;background:var(--bg);color:var(--text);font-family:'Jost','Helvetica Neue',Arial,sans-serif;font-weight:300;line-height:1.8;letter-spacing:.01em;overflow-x:hidden}
h1,h2,h3{font-family:'Cormorant Garamond',Georgia,serif;font-weight:600;line-height:1.1;margin:0}
p{margin:0}
.wrap{max-width:1140px;margin:0 auto;padding:0 28px}
#pg{position:fixed;top:0;left:0;height:3px;width:0;background:var(--rgg);z-index:60}
nav{position:sticky;top:env(safe-area-inset-top,0px);z-index:20;background:color-mix(in srgb,var(--bg) 85%,transparent);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border-bottom:1px solid var(--line);transition:box-shadow .3s}
nav.sc{box-shadow:0 8px 30px rgba(120,60,70,.12)}
nav .wrap{display:flex;align-items:center;justify-content:space-between;height:76px}
.logo{display:flex;align-items:center;gap:12px;text-decoration:none;color:var(--text);font-family:'Cormorant Garamond',Georgia,serif;font-size:26px;font-weight:600;letter-spacing:.04em}
.logo i{width:36px;height:36px;border-radius:50%;border:1px solid var(--rg1);display:grid;place-items:center;font-style:normal;font-size:15px;color:var(--rg1)}
.links{display:flex;gap:30px;align-items:center}
.links a{color:var(--muted);text-decoration:none;font-size:12.5px;text-transform:uppercase;letter-spacing:.18em;font-weight:400;transition:color .2s}
.links a:hover{color:var(--accent)}
.btn{position:relative;overflow:hidden;display:inline-block;background:var(--rgg);color:#2a1a1d!important;padding:15px 34px;text-decoration:none;font-size:12.5px;font-weight:500;letter-spacing:.18em;text-transform:uppercase;border:0;cursor:pointer;font-family:inherit;border-radius:2px;transition:transform .3s,box-shadow .3s}
.btn:hover{transform:translateY(-3px);box-shadow:0 14px 30px rgba(183,110,121,.35)}
.btn::after{content:"";position:absolute;top:0;left:-70%;width:40%;height:100%;background:linear-gradient(120deg,transparent,rgba(255,255,255,.6),transparent);transform:skewX(-20deg);transition:left .7s}
.btn:hover::after{left:140%}
.btn.ghost{background:transparent;color:var(--cream)!important;border:1px solid rgba(232,180,160,.6)}
.btn.sm{padding:11px 22px}
.menu{display:none;background:none;border:1px solid var(--line);color:var(--text);padding:9px 16px;font-size:12px;letter-spacing:.14em;text-transform:uppercase;font-family:inherit;border-radius:2px}
.eyebrow{display:inline-flex;align-items:center;gap:14px;font-size:11.5px;letter-spacing:.3em;text-transform:uppercase;color:var(--accent);font-weight:400;margin-bottom:20px}
.eyebrow::before,.eyebrow::after{content:"";width:34px;height:1px;background:var(--rg1)}
.hero .eyebrow{color:var(--rg2)}
.rg{background:linear-gradient(135deg,#e8b4a0,#b76e79 55%,#e8b4a0);-webkit-background-clip:text;background-clip:text;color:transparent;font-style:italic}
.hero{position:relative;background:radial-gradient(900px 500px at 80% 10%,#4a2a33,transparent 60%),var(--deep);color:var(--cream);padding:110px 0 120px;overflow:hidden}
.hero .glow{position:absolute;inset:0;background:radial-gradient(520px circle at var(--mx,70%) var(--my,30%),rgba(232,180,160,.16),transparent 60%);pointer-events:none}
.hero .wrap{position:relative;display:grid;grid-template-columns:1.15fr 1fr;gap:64px;align-items:center}
.hero h1{font-size:clamp(44px,6.4vw,82px);margin-bottom:24px;font-weight:500}
.hero .lead{color:#d6c3bd;font-size:18px;max-width:500px;margin-bottom:38px}
.cta{display:flex;gap:14px;flex-wrap:wrap}
.trust{display:flex;gap:26px;flex-wrap:wrap;margin-top:44px;padding-top:26px;border-top:1px solid rgba(232,180,160,.25);font-size:12px;letter-spacing:.14em;text-transform:uppercase;color:#bfa7a6}
.trust span::before{content:"◆ ";color:var(--rg2)}
.arch{position:relative;max-width:420px;margin:0 auto;aspect-ratio:3/4;border-radius:999px 999px 24px 24px;border:1px solid rgba(232,180,160,.55);padding:14px}
.arch .in{width:100%;height:100%;border-radius:999px 999px 14px 14px;background:linear-gradient(170deg,#5a3340,#2a171d 70%);display:grid;place-items:center;overflow:hidden;position:relative}
.arch svg{width:78%;animation:spin 60s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}
.fc{position:absolute;background:rgba(255,248,245,.1);border:1px solid rgba(232,180,160,.45);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);padding:13px 18px;font-size:12.5px;letter-spacing:.06em;color:var(--cream);animation:fl 6s ease-in-out infinite}
.fc b{display:block;font-family:'Cormorant Garamond',serif;font-size:22px;color:var(--rg2);font-weight:600}
.f1{left:-34px;top:16%}.f2{right:-30px;bottom:14%;animation-delay:1.8s}
@keyframes fl{50%{transform:translateY(-10px)}}
.mq{overflow:hidden;background:var(--rgg);padding:15px 0}
.mq div{display:flex;gap:46px;width:max-content;animation:mqs 38s linear infinite}
.mq span{white-space:nowrap;font-family:'Cormorant Garamond',serif;font-style:italic;font-size:21px;color:#2a1a1d}
@keyframes mqs{to{transform:translateX(-50%)}}
section{padding:104px 0}
.alt{background:var(--surface)}
h2{font-size:clamp(34px,4.4vw,54px);margin-bottom:16px;font-weight:500}
.sub{color:var(--muted);max-width:560px;margin-bottom:56px}
.ctrh{text-align:center}.ctrh .sub{margin-left:auto;margin-right:auto}
.about{display:grid;grid-template-columns:.9fr 1.1fr;gap:72px;align-items:center}
.arch2{max-width:380px;aspect-ratio:3/4;border-radius:999px 999px 20px 20px;background:linear-gradient(160deg,var(--rg3),var(--rg2) 60%,#cf8f8a);position:relative;display:grid;place-items:center;font-size:110px;box-shadow:0 30px 60px rgba(183,110,121,.25)}
.arch2::after{content:"";position:absolute;inset:-14px;border:1px solid var(--rg1);border-radius:999px 999px 30px 30px;opacity:.6}
.nums{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:40px;padding-top:30px;border-top:1px solid var(--line)}
.nums b{display:block;font-family:'Cormorant Garamond',serif;font-size:48px;font-weight:600;color:var(--accent);line-height:1}
.nums span{font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--muted)}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
.card{position:relative;background:var(--card);border:1px solid var(--line);padding:42px 34px;transition:transform .4s,box-shadow .4s,border-color .4s;overflow:hidden}
.card::before{content:"";position:absolute;left:0;top:0;height:2px;width:100%;background:var(--rgg);transform:scaleX(0);transform-origin:left;transition:transform .5s}
.card:hover{transform:translateY(-8px);box-shadow:0 26px 50px rgba(120,60,70,.14);border-color:var(--rg2)}
.card:hover::before{transform:scaleX(1)}
.num{font-family:'Cormorant Garamond',serif;font-size:44px;color:var(--rg2);font-style:italic;line-height:1;margin-bottom:18px}
.card h3{font-size:26px;margin-bottom:10px}
.card p{color:var(--muted);font-size:15px}
.tl{position:relative;max-width:760px;margin:0 auto;padding-left:44px}
.tl::before{content:"";position:absolute;left:11px;top:6px;bottom:6px;width:1px;background:linear-gradient(var(--rg2),var(--rg1),var(--rg2))}
.ti{position:relative;margin-bottom:42px}
.ti::before{content:"";position:absolute;left:-40px;top:8px;width:15px;height:15px;border-radius:50%;background:var(--bg);border:2px solid var(--rg1);box-shadow:0 0 0 5px var(--rg3)}
.alt .ti::before{background:var(--surface)}
.ti small{font-size:11.5px;letter-spacing:.25em;text-transform:uppercase;color:var(--accent)}
.ti h3{font-size:30px;margin:4px 0 6px}.ti p{color:var(--muted)}
.ck{display:grid;grid-template-columns:1.2fr 1fr;gap:0;background:var(--card);border:1px solid var(--line);box-shadow:0 30px 60px rgba(120,60,70,.1)}
.ck .l{padding:48px}
.q{font-size:11.5px;letter-spacing:.25em;text-transform:uppercase;color:var(--accent);margin:26px 0 12px}
.q:first-child{margin-top:0}
.moods{display:flex;gap:10px;flex-wrap:wrap}
.moods button{width:58px;height:58px;border-radius:50%;border:1px solid var(--line);background:var(--bg);font-size:26px;cursor:pointer;transition:transform .25s,border-color .25s,background .25s}
.moods button:hover{transform:translateY(-4px) scale(1.06)}
.moods button.on,.opts button.on{border-color:var(--rg1);background:var(--rg3);color:#2a1a1d}
.opts{display:flex;gap:10px;flex-wrap:wrap}
.opts button{border:1px solid var(--line);background:var(--bg);color:var(--text);padding:10px 20px;font-family:inherit;font-size:14px;cursor:pointer;border-radius:999px;transition:all .25s;font-weight:400}
.opts button:hover{border-color:var(--rg1)}
.ck .r{background:linear-gradient(160deg,#3a2229,var(--deep));color:var(--cream);padding:48px 40px;display:flex;flex-direction:column;justify-content:center;gap:14px}
.ck .r .k{font-size:11px;letter-spacing:.28em;text-transform:uppercase;color:var(--rg2)}
.ck .r h3{font-size:32px;color:#fff}
.ck .r p{color:#d6c3bd;font-size:15px}
.ck .r small{color:#a98f8e;font-size:12px;line-height:1.6}
.ck .r .sf{border-left:2px solid var(--rg1);padding-left:12px;color:#f0d8d2}
.team .card{text-align:center;padding-top:36px}
.pt{width:130px;height:160px;margin:0 auto 22px;border-radius:999px 999px 14px 14px;background:linear-gradient(160deg,var(--rg3),var(--rg2));display:grid;place-items:center;font-family:'Cormorant Garamond',serif;font-size:40px;font-weight:600;color:#6a3a43;border:1px solid var(--rg1);outline:1px solid var(--rg2);outline-offset:6px}
.role{font-size:11.5px;letter-spacing:.2em;text-transform:uppercase;color:var(--accent);margin:4px 0 12px}
.gal{display:grid;grid-template-columns:repeat(4,1fr);grid-auto-rows:170px;gap:16px}
.gt{position:relative;overflow:hidden;display:flex;align-items:flex-end;padding:20px;color:#fff;font-family:'Cormorant Garamond',serif;font-size:22px;font-weight:600;transition:transform .5s}
.gt::before{content:"";position:absolute;inset:0;background:linear-gradient(to top,rgba(28,18,21,.75),transparent 60%)}
.gt span{position:absolute;top:14px;right:18px;font-size:44px;opacity:.9;transition:transform .5s}
.gt:hover span{transform:scale(1.25) rotate(8deg)}
.gt b{position:relative;font-weight:600}
.gt.w{grid-column:span 2}.gt.t{grid-row:span 2}
.g1{background:linear-gradient(135deg,#c98a8a,#8d4f5c)}.g2{background:linear-gradient(135deg,#e8b4a0,#b76e79)}.g3{background:linear-gradient(135deg,#a56a73,#4a2a33)}.g4{background:linear-gradient(135deg,#dba296,#9c5a64)}
.price{font-family:'Cormorant Garamond',serif;font-size:46px;color:var(--accent);margin:10px 0 2px;line-height:1}
.price small{font-family:'Jost',sans-serif;font-size:13px;color:var(--muted)}
.pl{list-style:none;padding:0;margin:22px 0 28px;font-size:14.5px;color:var(--muted)}
.pl li{padding:11px 0 11px 26px;border-top:1px solid var(--line);position:relative}
.pl li::before{content:"◆";position:absolute;left:0;color:var(--rg1);font-size:9px;top:17px}
.hl{background:linear-gradient(180deg,var(--card),var(--rg3));border-color:var(--rg1);transform:translateY(-14px)}
:root[data-theme="dark"] .hl{background:linear-gradient(180deg,var(--card),#3a2229)}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]) .hl{background:linear-gradient(180deg,var(--card),#3a2229)}}
.badge{position:absolute;top:0;right:0;background:var(--rgg);color:#2a1a1d;font-size:10.5px;letter-spacing:.2em;text-transform:uppercase;padding:7px 16px;font-weight:500}
.pv{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;text-align:center}
.pv div{padding:10px 20px}
.pv i{font-style:normal;font-size:32px;display:block;margin-bottom:10px}
.pv h3{font-size:24px;margin-bottom:6px}.pv p{color:var(--muted);font-size:14.5px}
.tm{max-width:800px;margin:0 auto;text-align:center;position:relative;min-height:230px}
.tm .qm{font-family:'Cormorant Garamond',serif;font-size:90px;line-height:.6;color:var(--rg2);display:block}
.ts{position:absolute;left:0;right:0;top:56px;opacity:0;transition:opacity .8s;pointer-events:none}
.ts.on{opacity:1;pointer-events:auto}
.ts p{font-family:'Cormorant Garamond',serif;font-size:clamp(22px,2.8vw,32px);font-style:italic;line-height:1.4;color:var(--text);font-weight:500}
.ts b{display:block;margin-top:20px;font-size:12px;letter-spacing:.22em;text-transform:uppercase;color:var(--accent);font-weight:400}
.dots{display:flex;gap:10px;justify-content:center;margin-top:20px}
.dots button{width:34px;height:3px;border:0;background:var(--line);cursor:pointer;padding:0;transition:background .3s}
.dots button.on{background:var(--rg1)}
.faq{max-width:800px;margin:0 auto}
details{border-bottom:1px solid var(--line);padding:24px 0}
summary{cursor:pointer;font-family:'Cormorant Garamond',serif;font-size:24px;font-weight:600;list-style:none;display:flex;justify-content:space-between;gap:20px;align-items:center}
summary::-webkit-details-marker{display:none}
summary::after{content:"+";color:var(--rg1);font-size:30px;line-height:1;font-weight:300;transition:transform .3s}
details[open] summary::after{transform:rotate(45deg)}
details p{color:var(--muted);margin-top:14px;max-width:660px}
.band{background:var(--rgg);color:#2a1a1d;text-align:center;padding:100px 0;position:relative;overflow:hidden}
.band::before{content:"❀";position:absolute;font-size:340px;left:-50px;top:-80px;opacity:.12}
.band .wrap{position:relative}
.band h2{color:#2a1a1d}.band p{max-width:500px;margin:0 auto 34px;color:#4a2f33}
.band .btn{background:#2a1a1d;color:var(--cream)!important}
footer{background:var(--deep);color:#bfa7a6;padding:72px 0 110px;font-size:14px}
footer .wrap{display:grid;grid-template-columns:1.5fr 1fr 1fr;gap:48px}
footer b{display:block;color:var(--rg2);font-size:11.5px;letter-spacing:.25em;text-transform:uppercase;font-weight:400;margin-bottom:14px}
footer .lg{font-family:'Cormorant Garamond',serif;font-size:30px;color:var(--cream);margin-bottom:12px;letter-spacing:.04em}
footer a{color:inherit;text-decoration:none;display:block;margin-top:8px;transition:color .2s}
footer a:hover{color:var(--rg2)}
footer .copy{grid-column:1/-1;border-top:1px solid rgba(232,180,160,.2);padding-top:24px;font-size:12px;line-height:1.7}
.fab{position:fixed;right:22px;z-index:30;display:flex;align-items:center;gap:8px;border:0;padding:15px 24px;font-size:12px;font-weight:500;letter-spacing:.16em;text-transform:uppercase;cursor:pointer;text-decoration:none;box-shadow:0 10px 28px rgba(28,18,21,.35);font-family:inherit;border-radius:999px;transition:transform .25s}
.fab:hover{transform:scale(1.05)}
.fab.wa{bottom:calc(22px + env(safe-area-inset-bottom,0px));background:var(--wa);color:#fff}
.fab.ai{bottom:calc(80px + env(safe-area-inset-bottom,0px));background:var(--deep);color:var(--rg2);border:1px solid var(--rg1)}
.chat{position:fixed;right:22px;bottom:calc(138px + env(safe-area-inset-bottom,0px));width:min(360px,calc(100vw - 44px));background:var(--card);border:1px solid var(--rg2);box-shadow:0 20px 50px rgba(28,18,21,.35);z-index:30;display:none;flex-direction:column;overflow:hidden}
.chat.open{display:flex}
.chat header{padding:18px 22px;background:var(--deep);color:var(--rg2);font-family:'Cormorant Garamond',serif;font-size:22px;font-weight:600;letter-spacing:.04em}
.msgs{padding:18px;display:flex;flex-direction:column;gap:10px;max-height:260px;overflow-y:auto;font-size:14px}
.m{padding:11px 15px;max-width:88%;line-height:1.55}
.m.bot{background:var(--surface);align-self:flex-start}
.m.me{background:var(--rgg);color:#2a1a1d;align-self:flex-end}
.cq{display:flex;flex-wrap:wrap;gap:8px;padding:0 18px 18px}
.cq button{background:transparent;border:1px solid var(--rg2);color:var(--text);padding:8px 15px;font-size:12.5px;cursor:pointer;font-family:inherit;border-radius:999px}
.cq button:hover{background:var(--rg3);color:#2a1a1d}
.rv{opacity:0}
.rv.in{opacity:1;animation:up .9s ease backwards}
@keyframes up{from{opacity:0;transform:translateY(34px)}to{opacity:1;transform:none}}
@media (prefers-reduced-motion:reduce){.arch svg,.fc,.mq div{animation:none}}
@media (max-width:900px){
.links{display:none;position:absolute;top:76px;left:0;right:0;background:var(--bg);flex-direction:column;align-items:flex-start;padding:24px 28px;border-bottom:1px solid var(--line);gap:18px}
.links.open{display:flex}
.menu{display:block}
.hero{padding:64px 0 80px}
.hero .wrap,.about,.ck{grid-template-columns:1fr;gap:44px}
.ck{gap:0}.ck .l,.ck .r{padding:32px 26px}
.grid,.pv{grid-template-columns:1fr}
.gal{grid-template-columns:repeat(2,1fr)}.gt.w{grid-column:span 2}
.hl{transform:none}
.f1{left:-8px}.f2{right:-8px}
section{padding:68px 0}
footer .wrap{grid-template-columns:1fr}
}
body.aurelia-mind-template-preview > :not(nav):not(#top) { display: none !important; }
body.aurelia-mind-template-preview #top { min-height: 650px; }
</style>
</head>
@endverbatim
<body class="aurelia-mind-template{{ request()->boolean('preview') ? ' aurelia-mind-template-preview' : '' }}">
@verbatim
<div id="pg"></div>

<nav>
  <div class="wrap">
    <a class="logo" href="#top"><i>✦</i>Aurelia Mind</a>
    <div class="links" id="links">
      <a href="#layanan">Layanan</a>
      <a href="#checkin">Check-in</a>
      <a href="#tim">Tim</a>
      <a href="#paket">Paket</a>
      <a href="#faq">FAQ</a>
      <a class="btn sm" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20reservasi%20sesi%20konseling" target="_blank" rel="noopener">Reservasi</a>
    </div>
    <button class="menu" id="menu" aria-label="Menu">Menu</button>
  </div>
</nav>

<header class="hero" id="top">
  <div class="glow"></div>
  <div class="wrap">
    <div>
      <div class="eyebrow">Psikologi &amp; Konseling Eksklusif</div>
      <h1>Ruang privat untuk pulih, tumbuh, dan <span class="rg">bersinar.</span></h1>
      <p class="lead">Pendampingan psikologis yang personal, tenang, dan elegan oleh psikolog berlisensi, dalam ruang yang dirancang untuk membuat Anda merasa benar-benar aman.</p>
      <div class="cta">
        <a class="btn" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi" target="_blank" rel="noopener">Reservasi Sesi</a>
        <a class="btn ghost" href="#checkin">Check-in Diri</a>
      </div>
      <div class="trust"><span>Berlisensi</span><span>100% Privat</span><span>Terenkripsi</span></div>
    </div>
    <div class="arch">
      <div class="in">
        <svg viewBox="0 0 200 200" fill="none" stroke="url(#g)" stroke-width="1.2">
          <defs><linearGradient id="g" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#f4dcd6"/><stop offset=".5" stop-color="#e8b4a0"/><stop offset="1" stop-color="#b76e79"/></linearGradient></defs>
          <g transform="translate(0,0)">
            <ellipse cx="100" cy="58" rx="16" ry="42"/><ellipse cx="100" cy="58" rx="16" ry="42" transform="rotate(45 100 100)"/><ellipse cx="100" cy="58" rx="16" ry="42" transform="rotate(90 100 100)"/><ellipse cx="100" cy="58" rx="16" ry="42" transform="rotate(135 100 100)"/><ellipse cx="100" cy="58" rx="16" ry="42" transform="rotate(180 100 100)"/><ellipse cx="100" cy="58" rx="16" ry="42" transform="rotate(225 100 100)"/><ellipse cx="100" cy="58" rx="16" ry="42" transform="rotate(270 100 100)"/><ellipse cx="100" cy="58" rx="16" ry="42" transform="rotate(315 100 100)"/>
            <circle cx="100" cy="100" r="22"/><circle cx="100" cy="100" r="50" stroke-dasharray="2 5"/><circle cx="100" cy="100" r="92" stroke-opacity=".5"/>
          </g>
        </svg>
      </div>
      <div class="fc f1"><b>1:1</b>Sesi privat</div>
      <div class="fc f2"><b>2.800+</b>sesi terlaksana</div>
    </div>
  </div>
</header>

<div class="mq"><div><span>Konseling Individu</span><span>✦</span><span>Terapi Pasangan</span><span>✦</span><span>Asesmen Psikologis</span><span>✦</span><span>Mindfulness</span><span>✦</span><span>Konseling Karier</span><span>✦</span><span>Konseling Individu</span><span>✦</span><span>Terapi Pasangan</span><span>✦</span><span>Asesmen Psikologis</span><span>✦</span><span>Mindfulness</span><span>✦</span><span>Konseling Karier</span><span>✦</span></div></div>

<section id="tentang">
  <div class="wrap about">
    <div class="arch2">🌸</div>
    <div>
      <div class="eyebrow">Tentang Kami</div>
      <h2>Kemewahan sejati adalah <span class="rg">ketenangan.</span></h2>
      <p style="color:var(--muted)">Aurelia Mind hadir bagi mereka yang menghargai privasi, kualitas, dan perhatian penuh. Setiap sesi dirancang eksklusif: ruang yang hangat, waktu yang tidak terburu-buru, dan psikolog yang benar-benar hadir untuk Anda.</p>
      <div class="nums">
        <div><b>2.800+</b><span>Sesi</span></div>
        <div><b>12</b><span>Psikolog</span></div>
        <div><b>4,9</b><span>Rating</span></div>
      </div>
    </div>
  </div>
</section>

<section class="alt" id="layanan">
  <div class="wrap">
    <div class="ctrh"><div class="eyebrow">Layanan</div><h2>Pendampingan yang <span class="rg">menyeluruh</span></h2><p class="sub">Dari konseling pribadi hingga asesmen formal, ditangani dengan standar tertinggi.</p></div>
    <div class="grid">
      <div class="card"><div class="num">01</div><h3>Konseling Individu</h3><p>Kecemasan, depresi ringan, trauma, burnout, dan pertumbuhan diri.</p></div>
      <div class="card"><div class="num">02</div><h3>Pasangan &amp; Keluarga</h3><p>Komunikasi, konflik, pola asuh, serta persiapan pranikah.</p></div>
      <div class="card"><div class="num">03</div><h3>Asesmen Psikologis</h3><p>Kepribadian, minat bakat, dan kesehatan mental dengan laporan resmi.</p></div>
      <div class="card"><div class="num">04</div><h3>Konseling Karier</h3><p>Arah karier, transisi profesional, dan kepemimpinan yang seimbang.</p></div>
      <div class="card"><div class="num">05</div><h3>Mindfulness &amp; Relaksasi</h3><p>Teknik napas, meditasi terpandu, dan manajemen stres harian.</p></div>
      <div class="card"><div class="num">06</div><h3>Sesi Online Privat</h3><p>Video call terenkripsi dengan kenyamanan setara sesi tatap muka.</p></div>
    </div>
  </div>
</section>

<section id="perjalanan">
  <div class="wrap">
    <div class="ctrh"><div class="eyebrow">Perjalanan</div><h2>Empat langkah menuju <span class="rg">pulih</span></h2><p class="sub">Proses yang lembut dan terarah, mengikuti ritme Anda.</p></div>
    <div class="tl">
      <div class="ti"><small>Langkah 01</small><h3>Konsultasi Awal</h3><p>Percakapan hangat untuk memahami cerita dan harapan Anda.</p></div>
      <div class="ti"><small>Langkah 02</small><h3>Rencana Personal</h3><p>Kami menyusun tujuan dan pendekatan yang paling sesuai.</p></div>
      <div class="ti"><small>Langkah 03</small><h3>Sesi Berkala</h3><p>Pendampingan rutin di ruang yang aman dan tanpa penghakiman.</p></div>
      <div class="ti"><small>Langkah 04</small><h3>Evaluasi &amp; Tumbuh</h3><p>Kami mengukur progres bersama dan merayakan setiap kemajuan.</p></div>
    </div>
  </div>
</section>

<section class="alt" id="checkin">
  <div class="wrap">
    <div class="ctrh"><div class="eyebrow">Check-in Diri</div><h2>Bagaimana kabar <span class="rg">hati Anda?</span></h2><p class="sub">Dua pertanyaan singkat untuk membantu kami menyarankan layanan yang paling sesuai.</p></div>
    <div class="ck">
      <div class="l">
        <div class="q">1 · Suasana hati minggu ini</div>
        <div class="moods" id="moods"><button data-m="1" aria-label="Sangat berat">😞</button><button data-m="2" aria-label="Kurang baik">🙁</button><button data-m="3" aria-label="Biasa saja">😐</button><button data-m="4" aria-label="Baik">🙂</button><button data-m="5" aria-label="Sangat baik">😊</button></div>
        <div class="q">2 · Yang paling terasa</div>
        <div class="opts" id="foc"><button data-f="cemas">Cemas</button><button data-f="lelah">Lelah &amp; jenuh</button><button data-f="sedih">Sedih</button><button data-f="hubungan">Hubungan</button><button data-f="karier">Karier</button></div>
      </div>
      <div class="r" id="res">
        <div class="k">Saran untuk Anda</div>
        <h3 id="rt">Pilih dua hal di samping</h3>
        <p id="rp">Hasil akan muncul di sini dan Anda bisa langsung mereservasi sesi.</p>
        <a class="btn" id="rwa" href="https://wa.me/6281234567890" target="_blank" rel="noopener" style="align-self:flex-start">Reservasi via WhatsApp</a>
        <div class="sf" id="rsf" hidden>Jika Anda merasa tidak aman atau berpikir menyakiti diri, segera hubungi layanan darurat setempat atau orang terdekat. Anda tidak sendirian.</div>
        <small>Ini bukan alat diagnosis dan tidak menggantikan penilaian profesional.</small>
      </div>
    </div>
  </div>
</section>

<section class="team" id="tim">
  <div class="wrap">
    <div class="ctrh"><div class="eyebrow">Tim</div><h2>Psikolog <span class="rg">pilihan</span></h2><p class="sub">Berlisensi, berpengalaman, dan menjalani supervisi klinis berkala.</p></div>
    <div class="grid">
      <div class="card"><div class="pt">AK</div><h3>Dr. Alina Kusuma, M.Psi.</h3><div class="role">Psikolog Klinis</div><p>Trauma, kecemasan, dan regulasi emosi dewasa.</p></div>
      <div class="card"><div class="pt">RP</div><h3>Raka Pradipta, M.Psi.</h3><div class="role">Pasangan &amp; Keluarga</div><p>Dinamika relasi, komunikasi, dan pola asuh.</p></div>
      <div class="card"><div class="pt">NS</div><h3>Nadira Salsabila, M.Psi.</h3><div class="role">Dewasa Muda &amp; Karier</div><p>Transisi hidup, burnout, dan pengembangan diri.</p></div>
    </div>
  </div>
</section>

<section class="alt" id="ruang">
  <div class="wrap">
    <div class="ctrh"><div class="eyebrow">Ruang Kami</div><h2>Dirancang untuk <span class="rg">merasa aman</span></h2><p class="sub">Setiap sudut dibuat menenangkan: pencahayaan lembut, aroma alami, dan privasi penuh.</p></div>
    <div class="gal">
      <div class="gt g1 w t"><span>🛋️</span><b>Ruang Konsultasi Privat</b></div>
      <div class="gt g2"><span>🕯️</span><b>Lounge Tenang</b></div>
      <div class="gt g3"><span>🌿</span><b>Taman Refleksi</b></div>
      <div class="gt g4 w"><span>💻</span><b>Suite Sesi Online</b></div>
    </div>
  </div>
</section>

<section id="paket">
  <div class="wrap">
    <div class="ctrh"><div class="eyebrow">Paket</div><h2>Investasi untuk <span class="rg">ketenangan</span></h2><p class="sub">Harga transparan, dengan prioritas jadwal pada paket tertentu.</p></div>
    <div class="grid">
      <div class="card"><h3>Essence</h3><div class="price">Rp450rb <small>/ sesi</small></div><ul class="pl"><li>Sesi 60 menit</li><li>Tatap muka atau online</li><li>Ringkasan sesi</li></ul><a class="btn sm" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20paket%20Essence" target="_blank" rel="noopener">Pilih Paket</a></div>
      <div class="card hl"><span class="badge">Pilihan utama</span><h3>Signature</h3><div class="price">Rp1,6jt <small>/ 4 sesi</small></div><ul class="pl"><li>Rencana terapi personal</li><li>Evaluasi progres berkala</li><li>Chat dukungan antar sesi</li></ul><a class="btn sm" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20paket%20Signature" target="_blank" rel="noopener">Pilih Paket</a></div>
      <div class="card"><h3>Elite</h3><div class="price">Rp3,0jt <small>/ 8 sesi</small></div><ul class="pl"><li>Prioritas jadwal &amp; psikolog senior</li><li>1 sesi pasangan atau keluarga</li><li>Asesmen psikologis lengkap</li></ul><a class="btn sm" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20paket%20Elite" target="_blank" rel="noopener">Pilih Paket</a></div>
    </div>
  </div>
</section>

<section class="alt">
  <div class="wrap pv">
    <div><i>🔒</i><h3>Kerahasiaan Etik</h3><p>Seluruh isi sesi dijaga sesuai kode etik psikologi.</p></div>
    <div><i>🎓</i><h3>Psikolog Berlisensi</h3><p>Terdaftar resmi dan menjalani supervisi klinis rutin.</p></div>
    <div><i>🛡️</i><h3>Sesi Terenkripsi</h3><p>Video call privat dengan perlindungan data berlapis.</p></div>
  </div>
</section>

<section id="testimoni">
  <div class="wrap">
    <div class="ctrh"><div class="eyebrow">Testimoni</div><h2>Kata <span class="rg">mereka</span></h2></div>
    <div class="tm" id="tm">
      <span class="qm">“</span>
      <div class="ts on"><p>Untuk pertama kalinya saya merasa benar-benar didengar, tanpa terburu-buru dan tanpa dihakimi.</p><b>R. — Klien individu</b></div>
      <div class="ts"><p>Ruangnya tenang dan privat. Saya jadi lebih berani membuka diri sejak sesi pertama.</p><b>M. — Klien konseling</b></div>
      <div class="ts"><p>Komunikasi kami sebagai pasangan berubah jauh lebih baik setelah beberapa sesi.</p><b>D. &amp; A. — Klien pasangan</b></div>
      <div class="ts"><p>Laporan asesmennya sangat rinci, jelas, dan membantu saya menentukan arah karier.</p><b>T. — Klien asesmen</b></div>
    </div>
    <div class="dots" id="dots"><button class="on"></button><button></button><button></button><button></button></div>
  </div>
</section>

<section class="alt" id="faq">
  <div class="wrap">
    <div class="ctrh"><div class="eyebrow">FAQ</div><h2>Pertanyaan <span class="rg">umum</span></h2><p class="sub">Belum menemukan jawabannya? Tanyakan lewat WhatsApp.</p></div>
    <div class="faq">
      <details><summary>Apakah isi sesi dijamin rahasia?</summary><p>Ya. Seluruh informasi dijaga sesuai kode etik psikologi. Pengecualian hanya berlaku pada kondisi yang membahayakan keselamatan atau atas perintah hukum.</p></details>
      <details><summary>Berapa lama satu sesi berlangsung?</summary><p>Satu sesi berlangsung sekitar 60 menit. Frekuensi disesuaikan dengan kebutuhan, biasanya mingguan atau dua mingguan.</p></details>
      <details><summary>Apakah tersedia sesi online?</summary><p>Tersedia melalui video call terenkripsi dengan kualitas layanan setara tatap muka.</p></details>
      <details><summary>Bagaimana cara melakukan reservasi?</summary><p>Klik tombol WhatsApp, pilih jadwal yang tersedia, dan tim kami akan mengonfirmasi dalam 1×24 jam.</p></details>
      <details><summary>Apakah ini layanan gawat darurat?</summary><p>Bukan. Dalam kondisi krisis atau berpikir menyakiti diri, segera hubungi layanan darurat setempat atau orang terdekat.</p></details>
    </div>
  </div>
</section>

<section class="band">
  <div class="wrap">
    <h2>Langkah pertama menuju ketenangan.</h2>
    <p>Satu pesan sudah cukup. Kami akan mencocokkan Anda dengan psikolog dan jadwal yang tepat.</p>
    <a class="btn" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20membuat%20janji" target="_blank" rel="noopener">Reservasi Sekarang</a>
  </div>
</section>

<footer>
  <div class="wrap">
    <div><div class="lg">Aurelia Mind</div><p style="max-width:320px">Psikologi dan konseling eksklusif yang personal, tenang, dan elegan.</p></div>
    <div><b>Menu</b><a href="#layanan">Layanan</a><a href="#checkin">Check-in</a><a href="#tim">Tim</a><a href="#paket">Paket</a><a href="#faq">FAQ</a></div>
    <div><b>Kontak</b><a href="#">halo@aureliamind.id</a><a href="#">+62 812-3456-7890</a><a href="#">Senin–Sabtu, 09.00–20.00</a></div>
    <div class="copy">© 2026 Aurelia Mind. Semua hak dilindungi. Layanan ini bukan layanan gawat darurat. Jika Anda dalam kondisi krisis, hubungi layanan darurat setempat.</div>
  </div>
</footer>

<div class="chat" id="chat" role="dialog" aria-label="Asisten AI">
  <header>Concierge Aurelia</header>
  <div class="msgs" id="msgs"><div class="m bot">Selamat datang di Aurelia Mind. Ada yang bisa kami bantu? Silakan pilih topik di bawah.</div></div>
  <div class="cq">
    <button data-q="layanan">Layanan</button>
    <button data-q="harga">Harga</button>
    <button data-q="privasi">Privasi</button>
    <button data-q="jadwal">Jadwal</button>
  </div>
</div>
<button class="fab ai" id="aiBtn" aria-label="Buka asisten AI">✦ Tanya AI</button>
<a class="fab wa" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi" target="_blank" rel="noopener" aria-label="Chat WhatsApp">WhatsApp</a>

<script>
var rm=matchMedia('(prefers-reduced-motion:reduce)').matches,fine=matchMedia('(pointer:fine)').matches;
document.getElementById('menu').onclick=function(){document.getElementById('links').classList.toggle('open')};
document.querySelectorAll('#links a').forEach(function(a){a.addEventListener('click',function(){document.getElementById('links').classList.remove('open')})});
window.addEventListener('scroll',function(){var h=document.documentElement.scrollHeight-innerHeight;document.getElementById('pg').style.width=(h>0?scrollY/h*100:0)+'%';document.querySelector('nav').classList.toggle('sc',scrollY>10)});
var els=document.querySelectorAll('.card,.ti,.ck,.gt,.pv>div,details,.arch2,.nums>div,h2,.sub,.eyebrow');
if('IntersectionObserver' in window&&!rm){var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.12});els.forEach(function(el,i){el.classList.add('rv');el.style.animationDelay=((i%3)*110)+'ms';io.observe(el)})}
var hero=document.getElementById('top');
if(fine&&!rm){hero.addEventListener('mousemove',function(e){var r=hero.getBoundingClientRect();hero.style.setProperty('--mx',(e.clientX-r.left)+'px');hero.style.setProperty('--my',(e.clientY-r.top)+'px')})}
var cio=new IntersectionObserver(function(es){es.forEach(function(e){if(!e.isIntersecting)return;cio.unobserve(e.target);var el=e.target,m=el.textContent.match(/^([\d.,]+)(.*)$/);if(!m||rm)return;var dec=m[1].indexOf(',')>-1?1:0,to=parseFloat(m[1].replace(/\./g,'').replace(',','.')),suf=m[2],t0=performance.now();(function f(t){var k=Math.min(1,(t-t0)/1500),v=to*(1-Math.pow(1-k,3));el.textContent=v.toLocaleString('id-ID',{minimumFractionDigits:dec,maximumFractionDigits:dec})+suf;if(k<1)requestAnimationFrame(f)})(t0)})},{threshold:.6});
document.querySelectorAll('.nums b').forEach(function(b){cio.observe(b)});
var ts=document.querySelectorAll('.ts'),dt=document.querySelectorAll('#dots button'),ti=0,tt;
function show(i){ti=i;ts.forEach(function(x,k){x.classList.toggle('on',k===i)});dt.forEach(function(x,k){x.classList.toggle('on',k===i)})}
dt.forEach(function(b,i){b.onclick=function(){show(i);clearInterval(tt);if(!rm)tt=setInterval(function(){show((ti+1)%ts.length)},6500)}});
if(!rm)tt=setInterval(function(){show((ti+1)%ts.length)},6500);
var mood=0,foc='',F={cemas:['Konseling Kecemasan & Stres','Teknik regulasi emosi dan strategi menghadapi pikiran yang berlarian.'],lelah:['Konseling Burnout & Keseimbangan','Memulihkan energi dan membangun batas yang sehat antara kerja dan hidup.'],sedih:['Konseling Individu: Suasana Hati','Ruang aman untuk memahami perasaan dan menemukan kembali semangat Anda.'],hubungan:['Konseling Pasangan & Keluarga','Memperbaiki komunikasi dan membangun hubungan yang lebih hangat.'],karier:['Asesmen & Konseling Karier','Menemukan arah karier yang selaras dengan nilai dan potensi Anda.']};
function T(m){return m<=2?'Terima kasih sudah jujur. Anda tidak perlu menghadapinya sendirian. ':m===3?'Wajar jika perasaan naik turun. ':'Senang mendengarnya. Sesi rutin bisa membantu menjaga keseimbangan. '}
function upd(){if(!mood||!foc)return;var f=F[foc];document.getElementById('rt').textContent=f[0];document.getElementById('rp').textContent=T(mood)+f[1];document.getElementById('rsf').hidden=mood!==1;document.getElementById('rwa').href='https://wa.me/6281234567890?text='+encodeURIComponent('Halo, saya mengisi check-in (suasana hati '+mood+'/5, fokus: '+foc+'). Saya ingin konsultasi: '+f[0]+'.')}
document.getElementById('moods').addEventListener('click',function(e){var b=e.target.closest('button');if(!b)return;this.querySelectorAll('button').forEach(function(x){x.classList.remove('on')});b.classList.add('on');mood=+b.dataset.m;upd()});
document.getElementById('foc').addEventListener('click',function(e){var b=e.target.closest('button');if(!b)return;this.querySelectorAll('button').forEach(function(x){x.classList.remove('on')});b.classList.add('on');foc=b.dataset.f;upd()});
var chat=document.getElementById('chat');
document.getElementById('aiBtn').onclick=function(){chat.classList.toggle('open')};
var A={layanan:['Layanan','Kami menyediakan konseling individu, pasangan & keluarga, asesmen psikologis, konseling karier, mindfulness, dan sesi online privat.'],
harga:['Harga','Essence Rp450rb per sesi, Signature Rp1,6jt untuk 4 sesi, dan Elite Rp3,0jt untuk 8 sesi dengan prioritas jadwal.'],
privasi:['Privasi','Seluruh isi sesi dijaga sesuai kode etik psikologi, dan sesi online memakai video call terenkripsi.'],
jadwal:['Jadwal','Kami buka Senin–Sabtu pukul 09.00–20.00. Klik tombol WhatsApp untuk reservasi; konfirmasi dalam 1×24 jam.']};
var msgs=document.getElementById('msgs');
function add(t,c){var d=document.createElement('div');d.className='m '+c;d.textContent=t;msgs.appendChild(d);msgs.scrollTop=msgs.scrollHeight}
document.querySelectorAll('.cq button').forEach(function(b){b.onclick=function(){var r=A[b.dataset.q];add(r[0],'me');setTimeout(function(){add(r[1],'bot')},300)}});
</script>
</body>
</html>
@endverbatim
