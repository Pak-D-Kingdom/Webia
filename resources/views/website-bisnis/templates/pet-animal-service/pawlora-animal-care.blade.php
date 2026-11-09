@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Pawlora — Perawatan Hewan yang Hangat & Alami</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Nunito:wght@400;600;700&display=swap">
<style>
:root{--bg:#f5fffd;--surface:#e4f8f4;--card:#ffffff;--text:#12324a;--muted:#4f6f84;--accent:#0b7f74;--line:#cfeee8;--btn-bg:#2b6fd6;--btn-fg:#fff;--hero1:#c9f4ee;--hero2:#f5fffd;--wa:#25a05c;--tq:#1fc8b6;--bl:#2b6fd6;--pk:#ff7aa8;--lm:#ffe66d;--ink:#12324a;color-scheme:light;box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]){--bg:#0b2030;--surface:#102c3e;--card:#143549;--text:#eaf8f6;--muted:#a7c4cc;--accent:#4ee3d1;--line:#1f4a5f;--btn-bg:#4ee3d1;--btn-fg:#0b2030;--hero1:#0f3a4a;--hero2:#0b2030;--wa:#3fb36c;color-scheme:dark}}
:root[data-theme="dark"]{--bg:#0b2030;--surface:#102c3e;--card:#143549;--text:#eaf8f6;--muted:#a7c4cc;--accent:#4ee3d1;--line:#1f4a5f;--btn-bg:#4ee3d1;--btn-fg:#0b2030;--hero1:#0f3a4a;--hero2:#0b2030;--wa:#3fb36c;color-scheme:dark}
html{scroll-padding-top:calc(84px + env(safe-area-inset-top,0px));scroll-behavior:smooth}
*{box-sizing:border-box}
body{margin:0;background:var(--bg);color:var(--text);font-family:'Nunito',system-ui,Arial,sans-serif;line-height:1.7;font-size:16px;overflow-x:hidden}
h1,h2,h3{font-family:'Fraunces',Georgia,serif;font-weight:700;line-height:1.15;margin:0}
p{margin:0}
.wrap{max-width:1120px;margin:0 auto;padding:0 24px}
nav{position:sticky;top:env(safe-area-inset-top,0px);z-index:20;padding:12px 0}
nav .wrap{display:flex;align-items:center;justify-content:space-between;height:62px;background:color-mix(in srgb,var(--card) 88%,transparent);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border:1px solid var(--line);border-radius:999px;padding:0 14px 0 22px;box-shadow:0 8px 24px rgba(18,50,74,.08)}
.logo{display:flex;align-items:center;gap:9px;text-decoration:none;color:var(--text);font-family:'Fraunces',Georgia,serif;font-size:22px;font-weight:700}
.logo i{width:34px;height:34px;border-radius:58% 42% 55% 45%;background:linear-gradient(135deg,var(--tq),var(--bl));display:grid;place-items:center;font-style:normal;font-size:16px}
.links{display:flex;gap:24px;align-items:center}
.links a{color:var(--muted);text-decoration:none;font-size:14px;font-weight:700}
.links a:hover{color:var(--accent)}
.btn{display:inline-block;background:var(--btn-bg);color:var(--btn-fg)!important;padding:13px 26px;border-radius:999px;text-decoration:none;font-size:14px;font-weight:700;border:0;cursor:pointer;transition:transform .2s,box-shadow .2s;font-family:inherit}
.btn:hover{transform:translateY(-3px) rotate(-1deg);box-shadow:0 10px 22px rgba(43,111,214,.28)}
.btn.pink{background:var(--pk);color:var(--ink)!important}
.btn.lemon{background:var(--lm);color:var(--ink)!important}
.btn.ghost{background:transparent;border:2px solid var(--accent);color:var(--accent)!important}
.menu{display:none;background:var(--surface);border:0;color:var(--text);border-radius:999px;padding:9px 16px;font-size:14px;font-weight:700;font-family:inherit}
.hero{position:relative;background:linear-gradient(180deg,var(--hero1),var(--hero2));padding:40px 0 120px;margin-top:-74px;padding-top:128px;overflow:hidden}
.hero .wrap{display:grid;grid-template-columns:1.1fr 1fr;gap:48px;align-items:center;position:relative;z-index:1}
.tag{display:inline-block;background:var(--lm);color:var(--ink);font-weight:700;font-size:13px;padding:6px 16px;border-radius:999px;margin-bottom:20px;transform:rotate(-2deg)}
.hero h1{font-size:clamp(36px,5.4vw,62px);margin-bottom:20px}
.hero h1 em{font-style:normal;color:var(--accent);position:relative}
.hero h1 em::after{content:"";position:absolute;left:0;right:0;bottom:2px;height:12px;background:var(--pk);opacity:.45;border-radius:99px;z-index:-1}
.lead{color:var(--muted);font-size:18px;max-width:500px;margin-bottom:32px}
.cta{display:flex;gap:12px;flex-wrap:wrap}
.scene{position:relative;aspect-ratio:1;max-width:460px;margin:0 auto;width:100%}
.big{position:absolute;inset:6%;background:linear-gradient(145deg,var(--tq),var(--bl));border-radius:63% 37% 54% 46%/55% 48% 52% 45%;display:grid;place-items:center;font-size:clamp(110px,18vw,170px);animation:morph 9s ease-in-out infinite;box-shadow:0 30px 60px rgba(43,111,214,.25)}
@keyframes morph{50%{border-radius:40% 60% 46% 54%/48% 56% 44% 52%}}
.st{position:absolute;background:var(--card);color:var(--text);border-radius:18px;padding:10px 16px;font-size:13px;font-weight:700;box-shadow:0 10px 24px rgba(18,50,74,.15);animation:fl 5s ease-in-out infinite}
.st b{display:block;font-family:'Fraunces',serif;font-size:18px;color:var(--accent)}
.s1{top:2%;left:-2%}.s2{bottom:10%;right:-3%;background:var(--pk);color:var(--ink);animation-delay:1.2s}.s2 b{color:var(--ink)}
.s3{bottom:-2%;left:8%;background:var(--lm);color:var(--ink);animation-delay:2.4s}.s3 b{color:var(--ink)}
.lf{position:absolute;font-size:34px;animation:fl 6s ease-in-out infinite}
@keyframes fl{50%{transform:translateY(-9px) rotate(3deg)}}
.wave{position:absolute;left:0;right:0;bottom:-1px;line-height:0}
.wave svg{display:block;width:100%;height:70px}
.stats{padding:8px 0 56px}
.stats .wrap{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
.stat{border-radius:28px 56px 28px 56px;padding:26px 20px;text-align:center;color:var(--ink)}
.stat:nth-child(1){background:#bff3ec}.stat:nth-child(2){background:#fff3a8;border-radius:56px 28px 56px 28px}.stat:nth-child(3){background:#ffd3e2}.stat:nth-child(4){background:#cfe0ff;border-radius:56px 28px 56px 28px}
.stat b{display:block;font-family:'Fraunces',serif;font-size:34px}
.stat span{font-size:13px;font-weight:700}
section{padding:80px 0}
.alt{background:var(--surface)}
.kicker{font-weight:700;font-size:14px;color:var(--accent);margin-bottom:8px}
.kicker::before{content:"🌿 "}
h2{font-size:clamp(28px,3.6vw,42px);margin-bottom:12px}
.sub{color:var(--muted);margin-bottom:44px;max-width:560px}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.g4{grid-template-columns:repeat(4,1fr)}
.card{background:var(--card);border:1px solid var(--line);border-radius:28px 56px 28px 56px;padding:30px;transition:transform .3s,box-shadow .3s}
.card:nth-child(even){border-radius:56px 28px 56px 28px}
.card:hover{transform:translateY(-6px) rotate(-.6deg);box-shadow:0 18px 36px rgba(18,50,74,.12)}
.card h3{font-size:20px;margin:14px 0 8px}
.card p{color:var(--muted);font-size:15px}
.ic{width:62px;height:62px;display:grid;place-items:center;font-size:28px;border-radius:58% 42% 55% 45%;background:var(--tq)}
.card:nth-child(4n+2) .ic{background:var(--lm);border-radius:42% 58% 45% 55%}
.card:nth-child(4n+3) .ic{background:var(--pk)}
.card:nth-child(4n) .ic{background:#9cc0ff;border-radius:45% 55% 58% 42%}
.chips{display:flex;flex-wrap:wrap;gap:12px}
.pill{background:var(--card);border:2px solid var(--line);border-radius:999px;padding:12px 22px;font-weight:700;font-size:15px;transition:transform .2s,background .2s}
.pill:hover{transform:translateY(-3px) rotate(-2deg);background:var(--lm);color:var(--ink)}
.steps{display:grid;grid-template-columns:repeat(4,1fr);gap:22px;counter-reset:s}
.step{text-align:center;padding:0 8px}
.step::before{counter-increment:s;content:counter(s);display:grid;place-items:center;width:70px;height:70px;margin:0 auto 16px;font-family:'Fraunces',serif;font-size:28px;font-weight:700;color:var(--ink);background:var(--tq);border-radius:58% 42% 55% 45%}
.step:nth-child(2)::before{background:var(--lm)}.step:nth-child(3)::before{background:var(--pk)}.step:nth-child(4)::before{background:#9cc0ff}
.step h3{font-size:18px;margin-bottom:6px}.step p{color:var(--muted);font-size:14.5px}
.gal{display:grid;grid-template-columns:repeat(4,1fr);grid-auto-rows:150px;gap:16px}
.gt{border-radius:30px;display:flex;flex-direction:column;justify-content:flex-end;padding:16px 18px;position:relative;overflow:hidden;color:var(--ink);font-weight:700;font-size:14px;transition:transform .3s}
.gt:hover{transform:scale(1.03) rotate(-1deg)}
.gt span{position:absolute;top:10px;right:14px;font-size:54px}
.gt.w{grid-column:span 2}.gt.t{grid-row:span 2}
.c1{background:#bff3ec}.c2{background:#fff3a8}.c3{background:#ffd3e2}.c4{background:#cfe0ff}.c5{background:#9fe9df}.c6{background:#ffe3a0}
.av{width:90px;height:90px;border-radius:58% 42% 55% 45%;margin:0 auto 14px;display:grid;place-items:center;font-size:42px;background:var(--tq)}
.ctr{text-align:center}
.card:nth-child(2) .av{background:var(--pk);border-radius:42% 58% 45% 55%}.card:nth-child(3) .av{background:var(--lm)}
.role{color:var(--accent);font-weight:700;font-size:14px}
.price{font-family:'Fraunces',serif;font-size:34px;color:var(--accent);margin:8px 0 2px}
.price small{font-family:'Nunito',sans-serif;font-size:13px;color:var(--muted);font-weight:600}
.pl{list-style:none;padding:0;margin:16px 0 0;font-size:14.5px;color:var(--muted)}
.pl li{padding:9px 0 9px 28px;border-top:1px dashed var(--line);position:relative}
.pl li::before{content:"🐾";position:absolute;left:0;font-size:13px;top:11px}
.hl{border:3px solid var(--tq);position:relative}
.badge{position:absolute;top:-14px;left:30px;background:var(--lm);color:var(--ink);font-size:12px;font-weight:700;padding:5px 14px;border-radius:999px;transform:rotate(-3deg)}
.promo{background:var(--lm);color:var(--ink);border-radius:60px 30px 60px 30px;padding:48px;display:grid;grid-template-columns:1.4fr 1fr;gap:28px;align-items:center;position:relative;overflow:hidden}
.promo h2{margin-bottom:8px}
.promo .em{font-size:110px;text-align:center;animation:fl 5s ease-in-out infinite}
.quote{font-size:16px;color:var(--text)!important}
.who{margin-top:16px;font-size:14px;font-weight:700;color:var(--accent)}
.who::before{content:"★★★★★ ";color:#f5a623;letter-spacing:2px}
.faq{max-width:780px}
details{background:var(--card);border:1px solid var(--line);border-radius:24px;padding:20px 26px;margin-bottom:12px}
summary{cursor:pointer;font-weight:700;font-size:16px;list-style:none;display:flex;justify-content:space-between;gap:16px;align-items:center}
summary::-webkit-details-marker{display:none}
summary::after{content:"+";display:grid;place-items:center;width:30px;height:30px;border-radius:50%;background:var(--lm);color:var(--ink);font-size:20px;flex:none}
details[open] summary::after{content:"–";background:var(--pk)}
details p{color:var(--muted);margin-top:12px;font-size:15px}
.band{position:relative;background:linear-gradient(135deg,var(--tq),var(--bl));color:#fff;text-align:center;padding:84px 0;margin-top:40px}
.band::before{content:"";position:absolute;left:0;right:0;top:-1px;height:40px;background:var(--bg);border-radius:0 0 50% 50%/0 0 100% 100%}
.band .wrap{position:relative}
.band p{margin:12px auto 28px;max-width:480px;opacity:.95}
footer{background:#0d3558;color:#b9d4e6;padding:56px 0 100px;font-size:14px}
footer .wrap{display:grid;grid-template-columns:1.5fr 1fr 1fr;gap:40px}
footer b{color:#fff;display:block;margin-bottom:8px;font-family:'Fraunces',serif;font-size:18px}
footer a{color:inherit;text-decoration:none;display:block;margin-top:6px}
footer a:hover{color:var(--lm)}
footer .copy{grid-column:1/-1;border-top:1px solid rgba(255,255,255,.15);padding-top:20px;font-size:13px}
.fab{position:fixed;right:20px;z-index:30;display:flex;align-items:center;gap:8px;border:0;border-radius:999px;padding:14px 22px;font-size:14px;font-weight:700;cursor:pointer;text-decoration:none;box-shadow:0 8px 22px rgba(18,50,74,.3);font-family:inherit;transition:transform .2s}
.fab:hover{transform:scale(1.06)}
.fab.wa{bottom:calc(20px + env(safe-area-inset-bottom,0px));background:var(--wa);color:#fff}
.fab.ai{bottom:calc(76px + env(safe-area-inset-bottom,0px));background:var(--pk);color:var(--ink)}
.chat{position:fixed;right:20px;bottom:calc(132px + env(safe-area-inset-bottom,0px));width:min(350px,calc(100vw - 40px));background:var(--card);border:1px solid var(--line);border-radius:28px;box-shadow:0 14px 40px rgba(18,50,74,.28);z-index:30;display:none;flex-direction:column;overflow:hidden}
.chat.open{display:flex}
.chat header{padding:16px 20px;background:linear-gradient(135deg,var(--tq),var(--bl));color:#fff;font-weight:700;font-size:15px}
.msgs{padding:16px;display:flex;flex-direction:column;gap:10px;max-height:260px;overflow-y:auto;font-size:14px}
.m{padding:10px 15px;border-radius:20px;max-width:86%;line-height:1.5}
.m.bot{background:var(--surface);align-self:flex-start;border-bottom-left-radius:6px}
.m.me{background:var(--btn-bg);color:var(--btn-fg);align-self:flex-end;border-bottom-right-radius:6px}
.cq{display:flex;flex-wrap:wrap;gap:8px;padding:0 16px 16px}
.cq button{background:var(--lm);border:0;color:var(--ink);border-radius:999px;padding:8px 14px;font-size:13px;font-weight:700;cursor:pointer;font-family:inherit}
.rv{opacity:0}
.rv.in{opacity:1;animation:up .7s ease backwards}
@keyframes up{from{opacity:0;transform:translateY(26px)}to{opacity:1;transform:none}}
@media (prefers-reduced-motion:reduce){.big,.st,.lf,.promo .em{animation:none}}
@media (max-width:900px){
.links{display:none;position:absolute;top:76px;left:24px;right:24px;background:var(--card);border:1px solid var(--line);border-radius:28px;flex-direction:column;align-items:flex-start;padding:22px 26px;gap:16px;box-shadow:0 14px 30px rgba(18,50,74,.15)}
.links.open{display:flex}
.menu{display:block}
.hero .wrap,.promo{grid-template-columns:1fr}
.hero{padding-bottom:96px}
.grid,.g4,.steps{grid-template-columns:1fr}
.stats .wrap{grid-template-columns:repeat(2,1fr)}
.gal{grid-template-columns:repeat(2,1fr)}.gt.w{grid-column:span 2}
.promo{padding:32px}
section{padding:56px 0}
footer .wrap{grid-template-columns:1fr}
.s1{left:0}.s2{right:0}
}

#pg{position:fixed;top:0;left:0;height:4px;width:0;background:linear-gradient(90deg,var(--tq),var(--bl),var(--pk),var(--lm));z-index:60;transition:width .1s}
.hero::before,.hero::after{content:"";position:absolute;border-radius:50%;filter:blur(70px);pointer-events:none}
.hero::before{width:420px;height:420px;background:var(--pk);opacity:.28;left:-130px;top:70px}
.hero::after{width:380px;height:380px;background:var(--lm);opacity:.35;right:-100px;bottom:20px}
.rot{display:inline-block;min-width:.4em;border-right:3px solid var(--pk);padding-right:4px;animation:blink .8s infinite}
@keyframes blink{50%{border-color:transparent}}
.scene{transform:perspective(900px) rotateX(var(--rx,0deg)) rotateY(var(--ry,0deg));transition:transform .18s ease-out}
.orbit{position:absolute;inset:-5%;border:2px dashed rgba(31,200,182,.55);border-radius:50%;animation:spin 32s linear infinite}
.orbit span{position:absolute;font-size:30px;animation:spin 32s linear infinite reverse;background:var(--card);border-radius:50%;width:50px;height:50px;display:grid;place-items:center;box-shadow:0 6px 16px rgba(18,50,74,.18)}
.orbit span:nth-child(1){top:-25px;left:calc(50% - 25px)}.orbit span:nth-child(2){right:-25px;top:calc(50% - 25px)}.orbit span:nth-child(3){bottom:-25px;left:calc(50% - 25px)}.orbit span:nth-child(4){left:-25px;top:calc(50% - 25px)}
@keyframes spin{to{transform:rotate(360deg)}}
.bp{display:inline-block;animation:pop .6s cubic-bezier(.3,1.6,.5,1)}
@keyframes pop{from{transform:scale(.3) rotate(-25deg);opacity:0}to{transform:none;opacity:1}}
.paw{position:fixed;pointer-events:none;font-size:18px;z-index:55;animation:pawf 1s ease-out forwards}
@keyframes pawf{from{opacity:.9;transform:translateY(0) scale(1)}to{opacity:0;transform:translateY(-22px) scale(.6)}}
.btn{position:relative;overflow:hidden}
.btn::after{content:"";position:absolute;top:0;left:-70%;width:45%;height:100%;background:linear-gradient(120deg,transparent,rgba(255,255,255,.55),transparent);transform:skewX(-20deg);transition:left .6s}
.btn:hover::after{left:130%}
.mq{overflow:hidden;background:#0d3558;padding:16px 0;transform:rotate(-1.2deg);margin:14px -20px 6px}
.mq div{display:flex;gap:44px;width:max-content;animation:mqs 34s linear infinite}
.mq span{white-space:nowrap;font-weight:700;font-size:15px;color:#fff}
.mq span:nth-child(4n+1){color:#4ee3d1}.mq span:nth-child(4n+2){color:#ffe66d}.mq span:nth-child(4n+3){color:#ff9ec0}.mq span:nth-child(4n){color:#9cc0ff}
@keyframes mqs{to{transform:translateX(-50%)}}
.alt{position:relative}
.alt::before{content:"";position:absolute;top:-39px;left:0;right:0;height:40px;background:var(--surface);-webkit-mask:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 40' preserveAspectRatio='none'><path d='M0 40 C240 0 480 0 720 20 C960 40 1200 40 1440 8 L1440 40 Z'/></svg>") 0 0/100% 100%;mask:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 40' preserveAspectRatio='none'><path d='M0 40 C240 0 480 0 720 20 C960 40 1200 40 1440 8 L1440 40 Z'/></svg>") 0 0/100% 100%}
.est{background:linear-gradient(135deg,#bff3ec,#cfe0ff);color:var(--ink);position:relative;overflow:hidden}
.est::after{content:"🐾";position:absolute;font-size:220px;right:-30px;bottom:-60px;opacity:.12;transform:rotate(-20deg)}
.est .sub{color:#3c5c72}.est .kicker{color:#0b6b62}
.box{position:relative;z-index:1;background:#fff;color:var(--ink);border-radius:40px 70px 40px 70px;padding:34px;display:grid;grid-template-columns:1.3fr 1fr;gap:34px;box-shadow:0 24px 50px rgba(18,50,74,.18)}
.q{font-weight:700;font-size:14px;margin:16px 0 8px;color:#4f6f84}
.q:first-child{margin-top:0}
.opts{display:flex;flex-wrap:wrap;gap:8px}
.opts button{border:2px solid #cfeee8;background:#fff;color:var(--ink);border-radius:999px;padding:10px 18px;font-weight:700;font-size:14px;cursor:pointer;font-family:inherit;transition:transform .2s,background .2s}
.opts button:hover{transform:translateY(-2px)}
.opts button.on{background:var(--tq);border-color:var(--tq)}
.nights{display:flex;align-items:center;gap:12px;margin-top:16px;font-weight:700}
.nights[hidden]{display:none}
.nights button{width:36px;height:36px;border-radius:50%;border:0;background:var(--lm);font-size:18px;font-weight:700;cursor:pointer;color:var(--ink)}
.res{background:linear-gradient(145deg,var(--tq),var(--bl));border-radius:50px 28px 50px 28px;padding:30px;color:#fff;text-align:center;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px}
.big2{font-family:'Fraunces',serif;font-size:clamp(40px,6vw,60px);line-height:1}
.res small{opacity:.92;font-size:12px}
.res .btn{background:var(--lm);color:var(--ink)!important}
@media (prefers-reduced-motion:reduce){.orbit,.orbit span,.mq div,.rot,.bp{animation:none}}
@media (max-width:900px){.box{grid-template-columns:1fr;padding:24px}.mq{margin:14px -30px 6px}}
body.pawlora-template-preview > :not(nav):not(#top) { display: none !important; }
body.pawlora-template-preview #top { min-height: 650px; }
</style>
</head>
@endverbatim
<body class="pawlora-template{{ request()->boolean('preview') ? ' pawlora-template-preview' : '' }}">
@verbatim
<div id="pg"></div>

<nav>
  <div class="wrap">
    <a class="logo" href="#top"><i>🐾</i>Pawlora</a>
    <div class="links" id="links">
      <a href="#layanan">Layanan</a>
      <a href="#estimasi">Estimasi</a>
      <a href="#galeri">Galeri</a>
      <a href="#tim">Tim</a>
      <a href="#paket">Paket</a>
      <a href="#faq">FAQ</a>
      <a class="btn" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20booking%20layanan%20hewan" target="_blank" rel="noopener">Booking</a>
    </div>
    <button class="menu" id="menu" aria-label="Menu">Menu</button>
  </div>
</nav>

<header class="hero" id="top">
  <div class="wrap">
    <div>
      <span class="tag">🌴 Perawatan hewan yang hangat &amp; alami</span>
      <h1>Bikin si bulu selalu <em><span id="rot" class="rot">sehat</span></em></h1>
      <p class="lead">Klinik, grooming, dan penitipan dengan produk organik serta tim yang benar-benar mencintai hewan, agar si kecil sehat, bersih, dan bahagia.</p>
      <div class="cta">
        <a class="btn" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi" target="_blank" rel="noopener">Booking Sekarang</a>
        <a class="btn ghost" href="#layanan">Lihat Layanan</a>
      </div>
    </div>
    <div class="scene">
      <div class="orbit"><span>🐈</span><span>🦜</span><span>🐇</span><span>🐹</span></div><div class="big"><span id="bigpet" class="bp">🐕</span></div>
      <div class="st s1"><b>12.000+</b>hewan bahagia</div>
      <div class="st s2"><b>💗 24 jam</b>dokter hewan siaga</div>
      <div class="st s3"><b>100%</b>produk organik</div>
      <span class="lf" style="top:-2%;right:12%">🌿</span><span class="lf" style="bottom:30%;left:-4%;animation-delay:1s">🌺</span>
    </div>
  </div>
  <div class="wave"><svg viewBox="0 0 1440 70" preserveAspectRatio="none"><path d="M0 40 C240 90 480 0 720 30 C960 60 1200 10 1440 40 L1440 70 L0 70 Z" fill="var(--bg)"/></svg></div>
</header>

<div class="stats">
  <div class="wrap">
    <div class="stat"><b>12.000+</b><span>Hewan terlayani</span></div>
    <div class="stat"><b>18</b><span>Dokter &amp; groomer</span></div>
    <div class="stat"><b>4,9 ★</b><span>Rating pemilik</span></div>
    <div class="stat"><b>9 th</b><span>Berpengalaman</span></div>
  </div>
</div>

<div class="mq"><div><span>★ 4,9 rating pelanggan</span><span>🐾 12.000+ hewan bahagia</span><span>🌿 Produk 100% organik</span><span>💗 Dokter hewan siaga 24 jam</span><span>🚐 Antar-jemput gratis</span><span>📸 Laporan foto harian</span><span>★ 4,9 rating pelanggan</span><span>🐾 12.000+ hewan bahagia</span><span>🌿 Produk 100% organik</span><span>💗 Dokter hewan siaga 24 jam</span><span>🚐 Antar-jemput gratis</span><span>📸 Laporan foto harian</span></div></div>

<section id="layanan">
  <div class="wrap">
    <div class="kicker">Layanan kami</div>
    <h2>Semua kebutuhan si bulu, dalam satu rumah</h2>
    <p class="sub">Dirawat lembut dengan bahan alami dan penuh perhatian.</p>
    <div class="grid g4">
      <div class="card"><div class="ic">🩺</div><h3>Klinik &amp; Vaksin</h3><p>Pemeriksaan, vaksinasi, sterilisasi, dan perawatan gigi.</p></div>
      <div class="card"><div class="ic">🛁</div><h3>Grooming &amp; Spa</h3><p>Mandi dengan sampo herbal, potong bulu, dan pijat relaksasi.</p></div>
      <div class="card"><div class="ic">🏡</div><h3>Penitipan</h3><p>Kamar nyaman dengan taman bermain dan laporan foto harian.</p></div>
      <div class="card"><div class="ic">🚐</div><h3>Pet Taxi</h3><p>Antar-jemput aman dan nyaman untuk kunjungan ke klinik.</p></div>
    </div>
  </div>
</section>

<section class="alt" id="hewan">
  <div class="wrap">
    <div class="kicker">Jenis hewan</div>
    <h2>Ramah untuk semua keluarga berbulu</h2>
    <p class="sub">Setiap spesies punya ruang dan penanganan khusus.</p>
    <div class="chips">
      <span class="pill">🐕 Anjing</span><span class="pill">🐈 Kucing</span><span class="pill">🐇 Kelinci</span><span class="pill">🐹 Hamster</span><span class="pill">🦜 Burung</span><span class="pill">🦎 Reptil</span><span class="pill">🐢 Kura-kura</span><span class="pill">🐠 Ikan hias</span>
    </div>
  </div>
</section>

<section id="proses">
  <div class="wrap">
    <div class="kicker">Cara kerja</div>
    <h2>Semudah empat langkah</h2>
    <p class="sub">Tanpa antre panjang, tanpa ribet.</p>
    <div class="steps">
      <div class="step"><h3>Chat WhatsApp</h3><p>Ceritakan kebutuhan hewan Anda.</p></div>
      <div class="step"><h3>Pilih jadwal</h3><p>Datang langsung atau pakai pet taxi.</p></div>
      <div class="step"><h3>Dirawat penuh cinta</h3><p>Tim kami menangani dengan sabar.</p></div>
      <div class="step"><h3>Terima laporan</h3><p>Foto dan catatan kesehatan dikirim ke ponsel.</p></div>
    </div>
  </div>
</section>

<section class="est" id="estimasi">
  <div class="wrap">
    <div class="kicker">Kalkulator perawatan</div>
    <h2>Hitung estimasi dalam 3 klik</h2>
    <p class="sub">Pilih hewan, ukuran, dan layanan. Harga langsung muncul, lalu pesan lewat WhatsApp.</p>
    <div class="box">
      <div>
        <div class="q">1 · Jenis hewan</div>
        <div class="opts" data-k="pet"><button class="on" data-v="1" data-n="Anjing">🐕 Anjing</button><button data-v=".9" data-n="Kucing">🐈 Kucing</button><button data-v=".8" data-n="Kelinci">🐇 Kelinci</button><button data-v=".7" data-n="Burung">🦜 Burung</button></div>
        <div class="q">2 · Ukuran</div>
        <div class="opts" data-k="size"><button data-v=".8" data-n="Kecil">Kecil</button><button class="on" data-v="1" data-n="Sedang">Sedang</button><button data-v="1.4" data-n="Besar">Besar</button></div>
        <div class="q">3 · Layanan</div>
        <div class="opts" data-k="svc"><button class="on" data-v="120" data-n="Mandi Segar">🛁 Mandi</button><button data-v="260" data-n="Spa Lengkap">💆 Spa</button><button data-v="150" data-n="Menginap" data-night="1">🏡 Menginap</button></div>
        <div class="nights" id="nights" hidden>Jumlah malam <button id="nm" aria-label="Kurangi">–</button><b id="nv">1</b><button id="np" aria-label="Tambah">+</button></div>
      </div>
      <div class="res">
        <span class="tag" style="background:var(--lm);margin:0">Estimasi harga</span>
        <div class="big2" id="total">Rp120rb</div>
        <p id="sum">Anjing · Sedang · Mandi Segar</p>
        <a class="btn" id="estwa" href="https://wa.me/6281234567890" target="_blank" rel="noopener">Pesan via WhatsApp</a>
        <small>*Estimasi, harga final dikonfirmasi tim kami.</small>
      </div>
    </div>
  </div>
</section>

<section class="alt" id="galeri">
  <div class="wrap">
    <div class="kicker">Galeri</div>
    <h2>Momen bahagia di Pawlora</h2>
    <p class="sub">Sekilas suasana hari-hari kami bersama pelanggan berbulu.</p>
    <div class="gal">
      <div class="gt c1 w">Waktu bermain di taman<span>🐕</span></div>
      <div class="gt c3 t">Spa relaksasi<span>🛁</span></div>
      <div class="gt c2">Kucing manja<span>🐈</span></div>
      <div class="gt c4">Hari vaksin<span>💉</span></div>
      <div class="gt c5">Kelinci lucu<span>🐇</span></div>
      <div class="gt c6 w">Tidur siang nyaman<span>😴</span></div>
    </div>
  </div>
</section>

<section id="tim">
  <div class="wrap">
    <div class="kicker">Tim</div>
    <h2>Kenalan dengan orang-orang kami</h2>
    <p class="sub">Dokter hewan dan groomer bersertifikat yang sabar dan penuh kasih.</p>
    <div class="grid">
      <div class="card ctr"><div class="av">👨‍⚕️</div><h3>drh. Andi Wijaya</h3><div class="role">Dokter hewan umum</div><p style="margin-top:8px">Bedah ringan, vaksin, dan pemeriksaan rutin.</p></div>
      <div class="card ctr"><div class="av">👩‍⚕️</div><h3>drh. Sinta Maharani</h3><div class="role">Spesialis kucing</div><p style="margin-top:8px">Perawatan kucing dari kitten hingga senior.</p></div>
      <div class="card ctr"><div class="av">✂️</div><h3>Rudi Hartono</h3><div class="role">Head groomer</div><p style="margin-top:8px">Potongan rapi dengan sentuhan lembut.</p></div>
    </div>
  </div>
</section>

<section class="alt" id="paket">
  <div class="wrap">
    <div class="kicker">Paket</div>
    <h2>Harga jelas, hati senang</h2>
    <p class="sub">Harga untuk ukuran hewan sedang, menyesuaikan jenis dan berat.</p>
    <div class="grid">
      <div class="card"><h3>Mandi Segar</h3><div class="price">Rp120rb <small>/ sesi</small></div><ul class="pl"><li>Sampo herbal</li><li>Potong kuku &amp; bersih telinga</li><li>Parfum hewan aman</li></ul></div>
      <div class="card hl"><span class="badge">Favorit pelanggan</span><h3>Spa Lengkap</h3><div class="price">Rp260rb <small>/ sesi</small></div><ul class="pl"><li>Mandi &amp; potong bulu</li><li>Pijat relaksasi</li><li>Sikat gigi &amp; masker bulu</li></ul></div>
      <div class="card"><h3>Menginap Nyaman</h3><div class="price">Rp150rb <small>/ malam</small></div><ul class="pl"><li>Kamar bersih ber-AC</li><li>Laporan foto harian</li><li>Jam bermain di taman</li></ul></div>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="promo">
      <div>
        <div class="tag" style="background:var(--pk)">🎁 Promo pelanggan baru</div>
        <h2>Diskon 20% untuk grooming pertama</h2>
        <p style="margin-bottom:22px">Tunjukkan pesan ini saat datang. Berlaku untuk semua ukuran hewan.</p>
        <a class="btn pink" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20mau%20klaim%20promo%2020%25" target="_blank" rel="noopener" style="background:var(--ink);color:#fff!important">Klaim Promo</a>
      </div>
      <div class="em">🐩</div>
    </div>
  </div>
</section>

<section class="alt" id="testimoni">
  <div class="wrap">
    <div class="kicker">Testimoni</div>
    <h2>Cerita dari pemilik bulu</h2>
    <p class="sub">Dibagikan dengan senang hati oleh pelanggan kami.</p>
    <div class="grid">
      <div class="card"><p class="quote">“Luna pulang dalam keadaan wangi dan tenang. Staffnya sabar sekali.”</p><div class="who">Rina · pemilik kucing</div></div>
      <div class="card"><p class="quote">“Laporan foto harian saat menitipkan Milo bikin saya tenang selama dinas.”</p><div class="who">Bayu · pemilik anjing</div></div>
      <div class="card"><p class="quote">“Produk organiknya aman untuk kulit sensitif Coco. Sangat direkomendasikan.”</p><div class="who">Dewi · pemilik kelinci</div></div>
    </div>
  </div>
</section>

<section id="faq">
  <div class="wrap">
    <div class="kicker">FAQ</div>
    <h2>Pertanyaan yang sering ditanyakan</h2>
    <p class="sub">Belum menemukan jawabannya? Tanyakan lewat WhatsApp.</p>
    <div class="faq">
      <details><summary>Hewan apa saja yang dilayani?</summary><p>Anjing, kucing, kelinci, hamster, burung, reptil, dan ikan hias tertentu. Hubungi kami untuk memastikan jenis hewan Anda.</p></details>
      <details><summary>Apakah produk grooming aman untuk kulit sensitif?</summary><p>Ya. Kami memakai sampo dan perawatan berbahan alami, serta bisa menyesuaikan produk untuk kulit sensitif.</p></details>
      <details><summary>Apakah wajib vaksin untuk penitipan?</summary><p>Ya. Demi keamanan bersama, kami meminta bukti vaksin dasar yang masih berlaku saat check-in.</p></details>
      <details><summary>Bagaimana saya tahu kabar hewan saat dititipkan?</summary><p>Kami mengirim foto dan catatan harian lewat WhatsApp, dan Anda boleh menanyakan kabarnya kapan saja.</p></details>
      <details><summary>Bagaimana cara booking?</summary><p>Klik tombol WhatsApp, pilih layanan dan jadwal, lalu tim kami akan mengonfirmasi dalam hitungan menit.</p></details>
    </div>
  </div>
</section>

<section class="band">
  <div class="wrap">
    <h2>Yuk, manjakan si kecil hari ini!</h2>
    <p>Booking mudah lewat WhatsApp. Tim kami siap membantu.</p>
    <a class="btn lemon" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20booking" target="_blank" rel="noopener">Booking via WhatsApp</a>
  </div>
</section>

<footer>
  <div class="wrap">
    <div><b>🐾 Pawlora</b><p style="max-width:300px">Perawatan hewan yang hangat dan alami: klinik, grooming, dan penitipan penuh kasih.</p></div>
    <div><b>Menu</b><a href="#layanan">Layanan</a><a href="#galeri">Galeri</a><a href="#tim">Tim</a><a href="#paket">Paket</a><a href="#faq">FAQ</a></div>
    <div><b>Kontak</b><a href="#">halo@pawlora.id</a><a href="#">+62 812-3456-7890</a><a href="#">Setiap hari, 08.00–20.00</a></div>
    <div class="copy">© 2026 Pawlora. Semua hak dilindungi. &nbsp;·&nbsp; Instagram &nbsp;·&nbsp; TikTok &nbsp;·&nbsp; YouTube</div>
  </div>
</footer>

<div class="chat" id="chat" role="dialog" aria-label="Asisten AI">
  <header>🐾 Asisten Pawlora</header>
  <div class="msgs" id="msgs"><div class="m bot">Halo! Saya asisten virtual Pawlora. Mau tanya apa hari ini? 🌴</div></div>
  <div class="cq">
    <button data-q="layanan">Layanan</button>
    <button data-q="harga">Harga</button>
    <button data-q="boarding">Penitipan</button>
    <button data-q="jam">Jam buka</button>
  </div>
</div>
<button class="fab ai" id="aiBtn" aria-label="Buka asisten AI">✦ Tanya AI</button>
<a class="fab wa" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi" target="_blank" rel="noopener" aria-label="Chat WhatsApp">WhatsApp</a>

<script>
document.getElementById('menu').onclick=function(){document.getElementById('links').classList.toggle('open')};
document.querySelectorAll('#links a').forEach(function(a){a.addEventListener('click',function(){document.getElementById('links').classList.remove('open')})});
var els=document.querySelectorAll('.card,.stat,.pill,.step,.gt,details,.promo,.box,h2,.sub,.kicker');
if('IntersectionObserver' in window&&!matchMedia('(prefers-reduced-motion:reduce)').matches){var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.1});els.forEach(function(el,i){el.classList.add('rv');el.style.animationDelay=((i%4)*80)+'ms';io.observe(el)})}
var rm=matchMedia('(prefers-reduced-motion:reduce)').matches,fine=matchMedia('(pointer:fine)').matches;
window.addEventListener('scroll',function(){var h=document.documentElement.scrollHeight-innerHeight;document.getElementById('pg').style.width=(h>0?scrollY/h*100:0)+'%'});
var rt=document.getElementById('rot');
if(rm){rt.textContent='sehat'}else{var W=['sehat','bersih','wangi','bahagia','manja'],wi=0,ci=0,del=false;(function t(){var w=W[wi];ci+=del?-1:1;rt.textContent=w.slice(0,ci);var d=del?60:120;if(!del&&ci===w.length){del=true;d=1400}else if(del&&ci===0){del=false;wi=(wi+1)%W.length;d=300}setTimeout(t,d)})()}
var bp=document.getElementById('bigpet'),PL=['🐕','🐈','🐇','🦜','🐹'],pi=0;
if(!rm)setInterval(function(){pi=(pi+1)%PL.length;bp.textContent=PL[pi];bp.style.animation='none';void bp.offsetWidth;bp.style.animation=''},2600);
var hero=document.getElementById('top'),sc=document.querySelector('.scene');
if(fine&&!rm){hero.addEventListener('mousemove',function(e){var r=hero.getBoundingClientRect();var x=(e.clientX-r.left)/r.width-.5,y=(e.clientY-r.top)/r.height-.5;sc.style.setProperty('--ry',(x*14)+'deg');sc.style.setProperty('--rx',(-y*12)+'deg')});hero.addEventListener('mouseleave',function(){sc.style.setProperty('--ry','0deg');sc.style.setProperty('--rx','0deg')});
var lastP=0;document.addEventListener('mousemove',function(e){var n=Date.now();if(n-lastP<110)return;lastP=n;var p=document.createElement('span');p.className='paw';p.textContent='🐾';p.style.left=e.clientX+'px';p.style.top=e.clientY+'px';p.style.transform='rotate('+(Math.random()*60-30)+'deg)';document.body.appendChild(p);setTimeout(function(){p.remove()},1000)})}
var cio=new IntersectionObserver(function(es){es.forEach(function(e){if(!e.isIntersecting)return;cio.unobserve(e.target);var el=e.target,m=el.textContent.match(/^([\d.,]+)(.*)$/);if(!m||rm)return;var dec=m[1].indexOf(',')>-1?1:0,to=parseFloat(m[1].replace(/\./g,'').replace(',','.')),suf=m[2],t0=performance.now();(function f(t){var k=Math.min(1,(t-t0)/1400),v=to*(1-Math.pow(1-k,3));el.textContent=v.toLocaleString('id-ID',{minimumFractionDigits:dec,maximumFractionDigits:dec})+suf;if(k<1)requestAnimationFrame(f)})(t0)})},{threshold:.6});
document.querySelectorAll('.stat b').forEach(function(b){cio.observe(b)});
var sel={pet:{v:1,n:'Anjing'},size:{v:1,n:'Sedang'},svc:{v:120,n:'Mandi Segar',night:0}},nights=1;
function fmt(k){if(k>=1000){return 'Rp'+(k/1000).toFixed(1).replace('.',',').replace(',0','')+'jt'}return 'Rp'+k+'rb'}
function calc(){var k=Math.round(sel.svc.v*sel.pet.v*sel.size.v*(sel.svc.night?nights:1)/5)*5;document.getElementById('total').textContent=fmt(k);var t=sel.pet.n+' · '+sel.size.n+' · '+sel.svc.n+(sel.svc.night?' · '+nights+' malam':'');document.getElementById('sum').textContent=t;document.getElementById('nights').hidden=!sel.svc.night;document.getElementById('nv').textContent=nights;document.getElementById('estwa').href='https://wa.me/6281234567890?text='+encodeURIComponent('Halo, saya ingin '+t+' (estimasi '+fmt(k)+')')}
document.querySelectorAll('.opts').forEach(function(g){g.addEventListener('click',function(e){var b=e.target.closest('button');if(!b)return;g.querySelectorAll('button').forEach(function(x){x.classList.remove('on')});b.classList.add('on');sel[g.dataset.k]={v:parseFloat(b.dataset.v),n:b.dataset.n,night:b.dataset.night?1:0};calc()})});
document.getElementById('nm').onclick=function(){nights=Math.max(1,nights-1);calc()};
document.getElementById('np').onclick=function(){nights=Math.min(14,nights+1);calc()};
calc();
var chat=document.getElementById('chat');
document.getElementById('aiBtn').onclick=function(){chat.classList.toggle('open')};
var A={layanan:['Layanan','Kami punya klinik & vaksin, grooming & spa, penitipan, dan pet taxi untuk berbagai jenis hewan.'],
harga:['Harga','Mandi Segar Rp120rb, Spa Lengkap Rp260rb, dan Menginap Nyaman Rp150rb per malam. Ada diskon 20% untuk grooming pertama!'],
boarding:['Penitipan','Kamar bersih ber-AC, taman bermain, dan laporan foto harian. Bukti vaksin dasar diperlukan.'],
jam:['Jam buka','Kami buka setiap hari pukul 08.00–20.00. Klik tombol WhatsApp untuk booking jadwal.']};
var msgs=document.getElementById('msgs');
function add(t,c){var d=document.createElement('div');d.className='m '+c;d.textContent=t;msgs.appendChild(d);msgs.scrollTop=msgs.scrollHeight}
document.querySelectorAll('.cq button').forEach(function(b){b.onclick=function(){var r=A[b.dataset.q];add(r[0],'me');setTimeout(function(){add(r[1],'bot')},300)}});
</script>
</body>
</html>
@endverbatim
