@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Pawstead — Rumah Kedua untuk Si Bulu</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Bitter:wght@400;600;700&family=Caveat:wght@600;700&display=swap">
<style>
:root{--bg:#f7edda;--surface:#efdfc2;--card:#fffaf0;--text:#2b1b14;--muted:#6e5545;--acc:#6a1fd8;--line:#d9c3a0;--ink:#2b1b14;--pk:#ff2e93;--or:#ff5a1f;--yl:#ffc21a;--vi:#7a2cff;--wa:#2f9e5b;--wood:#8a5a2b;color-scheme:light;box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]){--bg:#1b1020;--surface:#26172b;--card:#2f1d35;--text:#fbeee0;--muted:#cdb8c9;--acc:#ffc21a;--line:#4a3050;--ink:#0f0714;--wa:#3fb36c;color-scheme:dark}}
:root[data-theme="dark"]{--bg:#1b1020;--surface:#26172b;--card:#2f1d35;--text:#fbeee0;--muted:#cdb8c9;--acc:#ffc21a;--line:#4a3050;--ink:#0f0714;--wa:#3fb36c;color-scheme:dark}
html{scroll-padding-top:calc(84px + env(safe-area-inset-top,0px));scroll-behavior:smooth}
*{box-sizing:border-box}
body{margin:0;background:var(--bg) radial-gradient(rgba(120,80,40,.08) 1px,transparent 1px) 0 0/6px 6px;color:var(--text);font-family:'Bitter',Georgia,serif;line-height:1.7;overflow-x:hidden}
h1,h2,h3{font-family:'Alfa Slab One',Georgia,serif;font-weight:400;line-height:1.1;margin:0;letter-spacing:.01em}
p{margin:0}
.hand{font-family:'Caveat',cursive;font-weight:700}
.wrap{max-width:1140px;margin:0 auto;padding:0 24px}
#pg{position:fixed;top:0;left:0;height:5px;width:0;background:linear-gradient(90deg,var(--pk),var(--or),var(--yl),var(--vi));z-index:60}
nav{position:sticky;top:env(safe-area-inset-top,0px);z-index:20;background:var(--card);border-bottom:4px solid var(--ink)}
nav .wrap{display:flex;align-items:center;justify-content:space-between;height:70px}
.logo{display:flex;align-items:center;gap:10px;text-decoration:none;color:var(--text);font-family:'Alfa Slab One',serif;font-size:23px}
.logo i{width:42px;height:42px;border-radius:50%;background:var(--yl);border:3px solid var(--ink);display:grid;place-items:center;font-style:normal;font-size:19px;transform:rotate(-8deg);box-shadow:3px 3px 0 var(--ink)}
.links{display:flex;gap:24px;align-items:center}
.links a{color:var(--text);text-decoration:none;font-size:14px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;position:relative}
.links a:not(.btn)::after{content:"";position:absolute;left:0;right:100%;bottom:-4px;height:4px;background:var(--pk);transition:right .25s}
.links a:not(.btn):hover::after{right:0}
.btn{display:inline-block;background:var(--or);color:#1a0f10!important;padding:13px 26px;border:3px solid var(--ink);border-radius:10px;box-shadow:5px 5px 0 var(--ink);text-decoration:none;font-weight:700;font-size:14px;text-transform:uppercase;letter-spacing:.06em;cursor:pointer;font-family:inherit;transition:transform .15s,box-shadow .15s}
.btn:hover{transform:translate(-2px,-2px);box-shadow:7px 7px 0 var(--ink)}
.btn:active{transform:translate(4px,4px);box-shadow:1px 1px 0 var(--ink)}
.btn.pk{background:var(--pk)}.btn.yl{background:var(--yl)}.btn.vi{background:var(--vi);color:#fff!important}
.menu{display:none;background:var(--yl);border:3px solid var(--ink);color:#1a0f10;border-radius:10px;padding:8px 14px;font-weight:700;font-family:inherit;box-shadow:3px 3px 0 var(--ink)}
.bunting{height:46px;background:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 240 50' width='240' height='50'><path d='M0 0h60L30 44z' fill='%23ff2e93'/><path d='M60 0h60L90 44z' fill='%23ff5a1f'/><path d='M120 0h60L150 44z' fill='%23ffc21a'/><path d='M180 0h60L210 44z' fill='%237a2cff'/><path d='M0 1.5H240' stroke='%232b1b14' stroke-width='3'/></svg>") repeat-x 0 0/240px 50px}
.hero{position:relative;background:radial-gradient(circle at 1px 1px,rgba(255,255,255,.16) 1.5px,transparent 0) 0 0/22px 22px,linear-gradient(160deg,#7a2cff,#4b14b8);color:#fff8ee;padding:70px 0 100px;overflow:hidden}
.hero::after{content:"";position:absolute;width:480px;height:480px;border-radius:50%;background:var(--pk);right:-140px;bottom:-200px;opacity:.9}
.hero .wrap{position:relative;z-index:1;display:grid;grid-template-columns:1.1fr 1fr;gap:40px;align-items:center}
.kick{display:inline-block;background:var(--yl);color:#1a0f10;border:3px solid var(--ink);padding:5px 16px;font-weight:700;font-size:13px;text-transform:uppercase;letter-spacing:.08em;transform:rotate(-2deg);box-shadow:4px 4px 0 var(--ink);margin-bottom:22px}
.hero h1{font-size:clamp(40px,6vw,76px);margin-bottom:22px;text-shadow:4px 4px 0 rgba(0,0,0,.28)}
.hero h1 mark{background:var(--yl);color:#1a0f10;padding:0 12px;display:inline-block;transform:rotate(-2deg);text-shadow:none;border:3px solid var(--ink)}
.hero .lead{font-size:18px;max-width:500px;margin-bottom:34px;color:#f1e4ff}
.cta{display:flex;gap:16px;flex-wrap:wrap;align-items:center}
.arrow{font-size:28px;color:var(--yl);transform:rotate(-6deg)}
.stack{position:relative;height:470px}
.pol{position:absolute;background:#fffdf7;padding:12px 12px 52px;box-shadow:8px 10px 0 rgba(0,0,0,.28);transform:rotate(var(--r,0deg));transition:transform .35s cubic-bezier(.3,1.5,.5,1),z-index 0s;color:#2b1b14}
.pol:hover{transform:rotate(0deg) scale(1.08);z-index:5}
.pol .ph{display:grid;place-items:center;font-size:86px;background:var(--c,#ffd0e6);aspect-ratio:1;width:100%}
.pol .cap{position:absolute;left:0;right:0;bottom:12px;text-align:center;font-family:'Caveat',cursive;font-weight:700;font-size:24px}
.p1{--r:-8deg;--c:#ffd0e6;left:0;top:30px;width:230px}.p2{--r:6deg;--c:#ffe08a;right:0;top:0;width:240px;z-index:2}.p3{--r:-3deg;--c:#cdb4ff;left:60px;bottom:0;width:240px;z-index:3}
.p3 .ph{font-size:96px}
.burst{position:absolute;right:6px;bottom:30px;width:128px;height:128px;background:var(--or);color:#1a0f10;display:grid;place-items:center;text-align:center;font-family:'Alfa Slab One',serif;font-size:19px;line-height:1.05;clip-path:polygon(50% 0%,61% 12%,75% 6%,79% 21%,94% 25%,89% 39%,100% 50%,89% 61%,94% 75%,79% 79%,75% 94%,61% 88%,50% 100%,39% 88%,25% 94%,21% 79%,6% 75%,11% 61%,0% 50%,11% 39%,6% 25%,21% 21%,25% 6%,39% 12%);animation:spin 14s linear infinite;z-index:6}
.burst span{animation:spin 14s linear infinite reverse;display:block}
@keyframes spin{to{transform:rotate(360deg)}}
.mq{overflow:hidden;background:var(--yl);border-block:4px solid var(--ink);padding:12px 0;transform:rotate(-1deg);margin:-26px -20px 0;position:relative;z-index:3}
.mq div{display:flex;gap:40px;width:max-content;animation:mqs 30s linear infinite}
.mq span{white-space:nowrap;font-family:'Alfa Slab One',serif;font-size:19px;color:#1a0f10}
@keyframes mqs{to{transform:translateX(-50%)}}
section{padding:96px 0}
.alt{background:var(--surface);border-block:4px solid var(--ink)}
h2{font-size:clamp(32px,4.4vw,52px);margin-bottom:12px}
h2 u{text-decoration:none;background:linear-gradient(transparent 58%,var(--pk) 58%);padding:0 4px}
.sub{color:var(--muted);max-width:560px;margin-bottom:58px;font-size:17px}
.sec-t{margin-bottom:6px;color:var(--acc);font-size:30px}
.stats{padding:120px 0 40px}
.stats .wrap{display:grid;grid-template-columns:repeat(4,1fr);gap:26px}
.sign{position:relative;border:4px solid var(--ink);border-radius:14px;padding:30px 16px;text-align:center;color:#1a0f10;box-shadow:6px 6px 0 var(--ink);animation:sw 4s ease-in-out infinite;transform-origin:50% -26px}
.sign::before,.sign::after{content:"";position:absolute;top:-30px;width:4px;height:30px;background:var(--wood)}
.sign::before{left:22%}.sign::after{right:22%}
.sign:nth-child(1){background:var(--pk)}.sign:nth-child(2){background:var(--yl);animation-delay:.5s}.sign:nth-child(3){background:var(--or);animation-delay:1s}.sign:nth-child(4){background:#b995ff;animation-delay:1.5s}
@keyframes sw{50%{transform:rotate(1.8deg)}}
.sign b{display:block;font-family:'Alfa Slab One',serif;font-size:38px;font-weight:400}
.sign span{font-weight:700;font-size:14px}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:30px}
.tagc{position:relative;background:var(--card);border:4px solid var(--ink);border-radius:18px;padding:44px 28px 28px;box-shadow:6px 6px 0 var(--ink);transform-origin:50% -18px;transition:transform .3s,box-shadow .3s}
.tagc::before{content:"";position:absolute;top:14px;left:50%;margin-left:-11px;width:22px;height:22px;border-radius:50%;background:var(--bg);border:4px solid var(--ink)}
.tagc:hover{animation:swing .8s ease-in-out;box-shadow:9px 9px 0 var(--ink)}
@keyframes swing{25%{transform:rotate(4deg)}50%{transform:rotate(-3deg)}75%{transform:rotate(1.5deg)}}
.tagc .em{font-size:50px;line-height:1;display:block;margin-bottom:10px}
.tagc h3{font-size:24px;margin-bottom:8px}
.tagc p{color:var(--muted);font-size:15px}
.pr{display:inline-block;margin-top:14px;background:var(--yl);color:#1a0f10;border:3px solid var(--ink);padding:3px 12px;font-weight:700;font-size:13px;transform:rotate(-2deg)}
.tagc:nth-child(3n+2) .pr{background:var(--pk)}.tagc:nth-child(3n) .pr{background:#b995ff}
.mk{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
.fl{font-weight:700;font-size:13px;text-transform:uppercase;letter-spacing:.1em;margin:20px 0 8px;color:var(--acc)}
.fl:first-of-type{margin-top:0}
.inp{width:100%;padding:14px 16px;border:3px solid var(--ink);border-radius:10px;font-size:18px;font-family:inherit;background:var(--card);color:var(--text);box-shadow:4px 4px 0 var(--ink)}
.inp:focus{outline:3px solid var(--pk);outline-offset:2px}
.opts{display:flex;flex-wrap:wrap;gap:10px}
.opts button{border:3px solid var(--ink);background:var(--card);color:var(--text);border-radius:999px;padding:9px 18px;font-weight:700;font-size:15px;cursor:pointer;font-family:inherit;box-shadow:3px 3px 0 var(--ink);transition:transform .15s}
.opts button:hover{transform:translateY(-2px)}
.opts button.on{background:var(--yl);color:#1a0f10}
.sw{display:flex;gap:12px}
.sw button{width:44px;height:44px;border-radius:50%;border:3px solid var(--ink);cursor:pointer;box-shadow:3px 3px 0 var(--ink);transition:transform .15s}
.sw button.on{transform:scale(1.2);outline:3px solid var(--text);outline-offset:2px}
.prev{display:grid;place-items:center;min-height:380px;background:repeating-linear-gradient(45deg,transparent 0 14px,rgba(0,0,0,.04) 14px 28px)}
.card3{position:relative;width:min(300px,100%);background:var(--tc,#ffc21a);color:#1a0f10;border:4px solid var(--ink);border-radius:22px;padding:56px 24px 24px;text-align:center;box-shadow:10px 10px 0 var(--ink);transform:rotate(3deg);animation:sw 5s ease-in-out infinite;transform-origin:50% 0}
.card3::before{content:"";position:absolute;top:16px;left:50%;margin-left:-15px;width:30px;height:30px;border-radius:50%;background:var(--bg);border:4px solid var(--ink)}
.card3 .big{font-size:82px;line-height:1.1}
.card3 .nm{font-family:'Alfa Slab One',serif;font-size:34px;word-break:break-word;margin:6px 0 2px}
.card3 .id{font-weight:700;letter-spacing:.14em;font-size:13px}
.card3 .bar{height:34px;margin-top:16px;background:repeating-linear-gradient(90deg,#1a0f10 0 3px,transparent 3px 6px,#1a0f10 6px 7px,transparent 7px 12px)}
.card3 .hand{font-size:22px;margin-top:10px}
.gal{display:grid;grid-template-columns:repeat(3,1fr);gap:40px 28px;padding:8px}
.gal .pol{position:relative;transform:rotate(var(--r));width:100%}
.gal .pol:nth-child(1){--r:-3deg}.gal .pol:nth-child(2){--r:2.5deg}.gal .pol:nth-child(3){--r:-2deg}.gal .pol:nth-child(4){--r:3deg}.gal .pol:nth-child(5){--r:-3.5deg}.gal .pol:nth-child(6){--r:2deg}
.gal .pol::before{content:"📌";position:absolute;top:-16px;left:50%;margin-left:-12px;font-size:26px;z-index:2}
.gal .ph{font-size:70px;aspect-ratio:4/3}
.steps{display:grid;grid-template-columns:repeat(4,1fr);gap:26px}
.stp{text-align:center;position:relative}
.stp .nb{width:84px;height:84px;margin:0 auto 16px;border-radius:50%;border:4px solid var(--ink);display:grid;place-items:center;font-family:'Alfa Slab One',serif;font-size:36px;color:#1a0f10;box-shadow:5px 5px 0 var(--ink);background:var(--pk)}
.stp:nth-child(2) .nb{background:var(--or)}.stp:nth-child(3) .nb{background:var(--yl)}.stp:nth-child(4) .nb{background:#b995ff}
.stp:not(:last-child)::after{content:"";position:absolute;top:42px;left:62%;width:76%;border-top:4px dashed var(--wood)}
.stp h3{font-size:20px;margin-bottom:6px}.stp p{color:var(--muted);font-size:15px}
.crew{background:#e9d3a5;color:#2b1b14;border:4px solid var(--ink);padding:26px 22px 28px;text-align:center;box-shadow:7px 7px 0 var(--ink);position:relative;transform:rotate(var(--r,0deg));transition:transform .3s}
.crew:nth-child(1){--r:-1.5deg}.crew:nth-child(2){--r:1.2deg}.crew:nth-child(3){--r:-1deg}
.crew:hover{transform:rotate(0) translateY(-6px)}
.crew::before{content:"TIM KAMI";display:block;font-family:'Alfa Slab One',serif;font-size:15px;letter-spacing:.3em;border-bottom:3px double #2b1b14;padding-bottom:8px;margin-bottom:16px}
.crew .face{width:130px;height:130px;margin:0 auto 14px;border:4px solid #2b1b14;background:var(--cc,#ffc21a);display:grid;place-items:center;font-size:66px;filter:sepia(.1)}
.crew:nth-child(2) .face{--cc:#ff8ac1}.crew:nth-child(3) .face{--cc:#b995ff}
.crew h3{font-size:22px;margin-bottom:4px}.crew .rl{font-weight:700;font-size:13px;text-transform:uppercase;letter-spacing:.1em;color:#a1123f;margin-bottom:8px}.crew p{font-size:14.5px}
.cb{background:#2b2a26;color:#f5f1e6;border:8px solid var(--wood);border-radius:10px;padding:34px 28px;position:relative;box-shadow:inset 0 0 40px rgba(0,0,0,.5),6px 6px 0 var(--ink)}
.cb h3{font-family:'Caveat',cursive;font-weight:700;font-size:38px;color:var(--yl)}
.cb .pc{font-family:'Caveat',cursive;font-weight:700;font-size:54px;color:#fff;line-height:1.1;margin:6px 0}
.cb .pc small{font-size:22px;color:#d9d3c2}
.cb ul{list-style:none;padding:0;margin:14px 0 24px;font-size:15.5px;color:#e7e1d2}
.cb li{padding:8px 0;border-bottom:2px dashed rgba(255,255,255,.2)}
.cb li::before{content:"✦ ";color:var(--pk)}
.cb.hot{transform:scale(1.05) rotate(-1deg);border-color:var(--or)}
.stamp{position:absolute;top:-18px;right:-12px;background:var(--pk);color:#1a0f10;border:3px solid var(--ink);padding:6px 14px;font-family:'Alfa Slab One',serif;font-size:15px;transform:rotate(8deg);box-shadow:3px 3px 0 var(--ink)}
.cpn{position:relative;background:var(--yl);color:#1a0f10;border:4px dashed var(--ink);border-radius:18px;padding:40px;display:grid;grid-template-columns:1.3fr 1fr;gap:30px;align-items:center;box-shadow:8px 8px 0 var(--ink)}
.cpn::before{content:"✂ potong di sini";position:absolute;top:-17px;left:34px;background:var(--bg);color:var(--text);font-family:'Caveat',cursive;font-weight:700;font-size:22px;padding:0 12px}
.cpn h2{margin-bottom:8px}
.code{display:flex;align-items:center;justify-content:center;gap:12px;flex-wrap:wrap;background:#fffdf7;border:4px solid var(--ink);padding:18px;text-align:center}
.code b{font-family:'Alfa Slab One',serif;font-size:26px;letter-spacing:.06em}
.notes{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;padding:8px}
.note{position:relative;padding:34px 20px 22px;color:#2b1b14;box-shadow:6px 8px 0 rgba(0,0,0,.2);transform:rotate(var(--r));transition:transform .3s;font-size:15px}
.note:hover{transform:rotate(0) scale(1.05)}
.note::before{content:"📌";position:absolute;top:-12px;left:50%;margin-left:-12px;font-size:24px}
.note:nth-child(1){background:#ffe27a;--r:-3deg}.note:nth-child(2){background:#ff9fcb;--r:2deg}.note:nth-child(3){background:#ffab80;--r:-2deg}.note:nth-child(4){background:#cdb4ff;--r:3deg}
.note b{display:block;margin-top:14px;font-family:'Caveat',cursive;font-size:22px}
.faq{max-width:800px;margin:0 auto}
details{background:var(--card);border:4px solid var(--ink);border-radius:14px;padding:18px 24px;margin-bottom:16px;box-shadow:5px 5px 0 var(--ink)}
summary{cursor:pointer;font-family:'Alfa Slab One',serif;font-size:18px;list-style:none;display:flex;justify-content:space-between;gap:16px;align-items:center}
summary::-webkit-details-marker{display:none}
summary::after{content:"+";display:grid;place-items:center;width:34px;height:34px;border-radius:50%;background:var(--yl);color:#1a0f10;border:3px solid var(--ink);font-size:22px;font-family:'Bitter',serif;font-weight:700;flex:none;transition:transform .3s}
details[open] summary::after{transform:rotate(45deg);background:var(--pk)}
details p{color:var(--muted);margin-top:12px}
.band{background:linear-gradient(135deg,var(--pk),var(--or));border-block:4px solid var(--ink);text-align:center;color:#1a0f10;position:relative;overflow:hidden;padding:90px 0}
.band::before{content:"🐾 🐾 🐾 🐾 🐾 🐾 🐾 🐾 🐾 🐾 🐾 🐾";position:absolute;inset:0;font-size:60px;letter-spacing:40px;line-height:1.9;opacity:.14;word-break:break-all;transform:rotate(-8deg) scale(1.3)}
.band .wrap{position:relative}
.band p{max-width:480px;margin:12px auto 30px;font-weight:600}
footer{background:repeating-linear-gradient(90deg,#3a2314 0 38px,#33200f 38px 40px);color:#e6d3b8;padding:64px 0 110px;font-size:15px;border-top:4px solid var(--ink)}
footer .wrap{display:grid;grid-template-columns:1.5fr 1fr 1fr;gap:44px}
footer h4{font-family:'Alfa Slab One',serif;font-weight:400;font-size:18px;color:var(--yl);margin:0 0 12px}
footer .lg{font-family:'Alfa Slab One',serif;font-size:30px;color:#fff;margin-bottom:10px}
footer a{color:inherit;text-decoration:none;display:block;margin-top:8px}
footer a:hover{color:var(--pk)}
footer .copy{grid-column:1/-1;border-top:3px dashed rgba(255,255,255,.25);padding-top:22px;font-size:13px}
.fab{position:fixed;right:20px;z-index:30;display:flex;align-items:center;gap:8px;padding:13px 22px;font-size:14px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;cursor:pointer;text-decoration:none;font-family:inherit;border:3px solid var(--ink);border-radius:999px;box-shadow:5px 5px 0 var(--ink);transition:transform .15s,box-shadow .15s}
.fab:hover{transform:translate(-2px,-2px);box-shadow:7px 7px 0 var(--ink)}
.fab.wa{bottom:calc(20px + env(safe-area-inset-bottom,0px));background:var(--wa);color:#fff}
.fab.ai{bottom:calc(78px + env(safe-area-inset-bottom,0px));background:var(--vi);color:#fff}
.chat{position:fixed;right:20px;bottom:calc(136px + env(safe-area-inset-bottom,0px));width:min(350px,calc(100vw - 40px));background:var(--card);border:4px solid var(--ink);border-radius:18px;box-shadow:8px 8px 0 var(--ink);z-index:30;display:none;flex-direction:column;overflow:hidden}
.chat.open{display:flex}
.chat header{padding:14px 18px;background:var(--yl);color:#1a0f10;font-family:'Alfa Slab One',serif;font-size:17px;border-bottom:4px solid var(--ink)}
.msgs{padding:16px;display:flex;flex-direction:column;gap:10px;max-height:250px;overflow-y:auto;font-size:14px}
.m{padding:10px 14px;border:3px solid var(--ink);border-radius:14px;max-width:88%;line-height:1.5}
.m.bot{background:var(--surface);align-self:flex-start}
.m.me{background:var(--pk);color:#1a0f10;align-self:flex-end;font-weight:600}
.cq{display:flex;flex-wrap:wrap;gap:8px;padding:0 16px 16px}
.cq button{background:var(--card);border:3px solid var(--ink);color:var(--text);border-radius:999px;padding:6px 13px;font-size:13px;font-weight:700;cursor:pointer;font-family:inherit;box-shadow:2px 2px 0 var(--ink)}
.cq button:hover{background:var(--yl);color:#1a0f10}
.cf{position:fixed;width:10px;height:14px;pointer-events:none;z-index:70;animation:cfa .9s cubic-bezier(.2,.8,.3,1) forwards}
@keyframes cfa{to{transform:translate(var(--dx),var(--dy)) rotate(var(--rt));opacity:0}}
.rv{opacity:0}
.rv.in{opacity:1;animation:up .7s cubic-bezier(.3,1.4,.5,1) backwards}
@keyframes up{from{opacity:0;transform:translateY(40px) rotate(-1.5deg)}to{opacity:1;transform:none}}
@media (prefers-reduced-motion:reduce){.sign,.burst,.burst span,.mq div,.card3{animation:none}}
@media (max-width:900px){
.links{display:none;position:absolute;top:70px;left:0;right:0;background:var(--card);flex-direction:column;align-items:flex-start;padding:22px 24px;border-bottom:4px solid var(--ink);gap:16px}
.links.open{display:flex}
.menu{display:block}
.hero{padding:50px 0 90px}
.hero .wrap,.mk,.cpn{grid-template-columns:1fr}
.stack{height:400px;max-width:420px;margin:0 auto;width:100%}
.p1{width:170px}.p2{width:180px}.p3{width:185px;left:30px}.pol .ph{font-size:62px}
.stats .wrap,.steps,.notes{grid-template-columns:repeat(2,1fr)}
.grid{grid-template-columns:1fr}
.gal{grid-template-columns:repeat(2,1fr)}
.stp:not(:last-child)::after{display:none}
.cb.hot{transform:none}
.mq{margin:-20px -30px 0}
.cpn{padding:30px 22px}
section{padding:64px 0}
footer .wrap{grid-template-columns:1fr}
}
@media (max-width:520px){.notes{grid-template-columns:1fr}}
</style>
</head>
<body>
<div id="pg"></div>

<nav>
  <div class="wrap">
    <a class="logo" href="#top"><i>🐾</i>Pawstead</a>
    <div class="links" id="links">
      <a href="#layanan">Layanan</a>
      <a href="#member">Kartu Member</a>
      <a href="#tim">Tim</a>
      <a href="#paket">Paket</a>
      <a href="#faq">FAQ</a>
      <a class="btn" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20booking%20layanan%20hewan" target="_blank" rel="noopener">Booking</a>
    </div>
    <button class="menu" id="menu" aria-label="Menu">Menu</button>
  </div>
</nav>
<div class="bunting"></div>

<header class="hero" id="top">
  <div class="wrap">
    <div>
      <span class="kick">★ Perawatan hewan ala desa ★</span>
      <h1>Rumah kedua yang <mark>seru</mark> untuk si bulu!</h1>
      <p class="lead">Klinik, grooming, dan penitipan dengan suasana hangat ala pedesaan dan tim yang menyayangi hewan seperti keluarga sendiri.</p>
      <div class="cta">
        <a class="btn yl" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20booking" target="_blank" rel="noopener">Booking Sekarang</a>
        <a class="btn pk" href="#member">Buat Kartu Member</a>
        <span class="arrow hand">← diskon 20%!</span>
      </div>
    </div>
    <div class="stack">
      <div class="pol p1"><div class="ph">🐕</div><div class="cap">si Bruno</div></div>
      <div class="pol p2"><div class="ph">🐈</div><div class="cap">Mochi manja</div></div>
      <div class="pol p3"><div class="ph">🐇</div><div class="cap">Coco gemes</div></div>
      <div class="burst"><span>BUKA<br>TIAP<br>HARI!</span></div>
    </div>
  </div>
</header>

<div class="mq"><div><span>🐾 KLINIK</span><span>★ GROOMING</span><span>🐾 PENITIPAN</span><span>★ PET TAXI</span><span>🐾 PELATIHAN</span><span>★ PET SHOP</span><span>🐾 KLINIK</span><span>★ GROOMING</span><span>🐾 PENITIPAN</span><span>★ PET TAXI</span><span>🐾 PELATIHAN</span><span>★ PET SHOP</span></div></div>

<div class="stats">
  <div class="wrap">
    <div class="sign"><b>15.000+</b><span>Hewan terlayani</span></div>
    <div class="sign"><b>22</b><span>Dokter &amp; groomer</span></div>
    <div class="sign"><b>4,9 ★</b><span>Rating pemilik</span></div>
    <div class="sign"><b>12 th</b><span>Melayani dengan hati</span></div>
  </div>
</div>

<section id="layanan">
  <div class="wrap">
    <div class="sec-t hand">Layanan kami</div>
    <h2>Semua kebutuhan si bulu, <u>satu kandang!</u></h2>
    <p class="sub">Dari periksa sampai bermain, kami urus semuanya dengan sepenuh hati.</p>
    <div class="grid">
      <div class="tagc"><span class="em">🩺</span><h3>Klinik &amp; Vaksin</h3><p>Pemeriksaan, vaksinasi, sterilisasi, dan perawatan gigi oleh dokter hewan.</p><span class="pr">mulai Rp150rb</span></div>
      <div class="tagc"><span class="em">🛁</span><h3>Grooming Seru</h3><p>Mandi sampo herbal, potong bulu, dan spa wangi sampai ke ujung ekor.</p><span class="pr">mulai Rp120rb</span></div>
      <div class="tagc"><span class="em">🏡</span><h3>Penitipan</h3><p>Kandang bersih, halaman bermain luas, dan laporan foto setiap hari.</p><span class="pr">Rp150rb / malam</span></div>
      <div class="tagc"><span class="em">🚐</span><h3>Pet Taxi</h3><p>Antar-jemput aman dengan kendaraan khusus hewan.</p><span class="pr">mulai Rp50rb</span></div>
      <div class="tagc"><span class="em">🎾</span><h3>Pelatihan Perilaku</h3><p>Latihan dasar, sosialisasi, dan atasi kebiasaan buruk dengan positif.</p><span class="pr">Rp200rb / sesi</span></div>
      <div class="tagc"><span class="em">🥩</span><h3>Pet Shop &amp; Nutrisi</h3><p>Makanan sehat, camilan alami, dan konsultasi gizi harian.</p><span class="pr">konsultasi gratis</span></div>
    </div>
  </div>
</section>

<section class="alt" id="member">
  <div class="wrap">
    <div class="sec-t hand">Seru nih!</div>
    <h2>Bikin <u>Kartu Member</u> si bulu</h2>
    <p class="sub">Isi nama dan pilih gaya. Kartu langsung jadi, lalu klaim diskon member 15% lewat WhatsApp.</p>
    <div class="mk">
      <div>
        <div class="fl">1 · Nama si bulu</div>
        <input class="inp" id="pn" maxlength="12" placeholder="Contoh: Mochi" autocomplete="off">
        <div class="fl">2 · Jenis hewan</div>
        <div class="opts" id="pe"><button class="on" data-e="🐕" data-n="Anjing">🐕 Anjing</button><button data-e="🐈" data-n="Kucing">🐈 Kucing</button><button data-e="🐇" data-n="Kelinci">🐇 Kelinci</button><button data-e="🦜" data-n="Burung">🦜 Burung</button><button data-e="🐹" data-n="Hamster">🐹 Hamster</button></div>
        <div class="fl">3 · Warna kartu</div>
        <div class="sw" id="pc"><button class="on" data-c="#ffc21a" style="background:#ffc21a" aria-label="Kuning"></button><button data-c="#ff2e93" style="background:#ff2e93" aria-label="Pink"></button><button data-c="#ff5a1f" style="background:#ff5a1f" aria-label="Oranye"></button><button data-c="#b995ff" style="background:#b995ff" aria-label="Violet"></button></div>
        <a class="btn pk" id="mwa" style="margin-top:30px" href="https://wa.me/6281234567890" target="_blank" rel="noopener">Klaim Diskon Member 15%</a>
      </div>
      <div class="prev">
        <div class="card3" id="c3"><div class="big" id="ce">🐕</div><div class="nm" id="cn">Nama Si Bulu</div><div class="id" id="cid">MEMBER #0426</div><div class="bar"></div><div class="hand">Pawstead Club · 2026</div></div>
      </div>
    </div>
  </div>
</section>

<section id="galeri">
  <div class="wrap">
    <div class="sec-t hand">Album kenangan</div>
    <h2>Momen <u>paling gemes</u></h2>
    <p class="sub">Potret harian para tamu berbulu kami.</p>
    <div class="gal">
      <div class="pol"><div class="ph" style="background:#ffd0e6">🐕</div><div class="cap">main di halaman</div></div>
      <div class="pol"><div class="ph" style="background:#ffe08a">🛁</div><div class="cap">habis mandi wangi</div></div>
      <div class="pol"><div class="ph" style="background:#cdb4ff">😴</div><div class="cap">tidur siang</div></div>
      <div class="pol"><div class="ph" style="background:#ffbf9e">🐈</div><div class="cap">si manja Luna</div></div>
      <div class="pol"><div class="ph" style="background:#ffd0e6">🦴</div><div class="cap">waktunya camilan</div></div>
      <div class="pol"><div class="ph" style="background:#ffe08a">🐇</div><div class="cap">Coco makan wortel</div></div>
    </div>
  </div>
</section>

<section class="alt" id="proses">
  <div class="wrap">
    <div class="sec-t hand">Gampang banget</div>
    <h2>Empat langkah, <u>beres!</u></h2>
    <p class="sub">Tanpa antre panjang, tanpa ribet.</p>
    <div class="steps">
      <div class="stp"><div class="nb">1</div><h3>Chat kami</h3><p>Cerita kebutuhan si bulu lewat WhatsApp.</p></div>
      <div class="stp"><div class="nb">2</div><h3>Pilih jadwal</h3><p>Datang langsung atau panggil pet taxi.</p></div>
      <div class="stp"><div class="nb">3</div><h3>Kami rawat</h3><p>Ditangani sabar oleh tim berpengalaman.</p></div>
      <div class="stp"><div class="nb">4</div><h3>Terima kabar</h3><p>Foto dan catatan dikirim ke ponsel Anda.</p></div>
    </div>
  </div>
</section>

<section id="tim">
  <div class="wrap">
    <div class="sec-t hand">Kenalan yuk</div>
    <h2>Orang-orang di <u>balik kandang</u></h2>
    <p class="sub">Dokter hewan dan groomer bersertifikat yang cinta mati sama hewan.</p>
    <div class="grid">
      <div class="crew"><div class="face">👨‍⚕️</div><h3>drh. Andi Wijaya</h3><div class="rl">Dokter hewan umum</div><p>Bedah ringan, vaksin, dan pemeriksaan rutin.</p></div>
      <div class="crew"><div class="face">👩‍⚕️</div><h3>drh. Sinta Maharani</h3><div class="rl">Spesialis kucing</div><p>Dari kitten mungil sampai kucing senior.</p></div>
      <div class="crew"><div class="face">✂️</div><h3>Rudi Hartono</h3><div class="rl">Head groomer</div><p>Potongan rapi dengan sentuhan lembut.</p></div>
    </div>
  </div>
</section>

<section class="alt" id="paket">
  <div class="wrap">
    <div class="sec-t hand">Papan menu</div>
    <h2>Harga jelas, <u>tanpa drama</u></h2>
    <p class="sub">Harga untuk ukuran hewan sedang, menyesuaikan jenis dan berat.</p>
    <div class="grid">
      <div class="cb"><h3>Mandi Seru</h3><div class="pc">Rp120rb <small>/ sesi</small></div><ul><li>Sampo herbal</li><li>Potong kuku &amp; bersih telinga</li><li>Parfum hewan aman</li></ul><a class="btn yl" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20mau%20paket%20Mandi%20Seru" target="_blank" rel="noopener">Ambil</a></div>
      <div class="cb hot"><span class="stamp">FAVORIT!</span><h3>Spa Juara</h3><div class="pc">Rp260rb <small>/ sesi</small></div><ul><li>Mandi &amp; potong bulu</li><li>Pijat relaksasi</li><li>Sikat gigi &amp; masker bulu</li></ul><a class="btn pk" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20mau%20paket%20Spa%20Juara" target="_blank" rel="noopener">Ambil</a></div>
      <div class="cb"><h3>Menginap Ceria</h3><div class="pc">Rp150rb <small>/ malam</small></div><ul><li>Kandang bersih ber-AC</li><li>Laporan foto harian</li><li>Main di halaman luas</li></ul><a class="btn yl" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20mau%20paket%20Menginap%20Ceria" target="_blank" rel="noopener">Ambil</a></div>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="cpn">
      <div>
        <h2>DISKON 20% grooming pertama!</h2>
        <p style="font-weight:600">Salin kodenya, kirim lewat WhatsApp saat booking. Berlaku untuk semua ukuran hewan.</p>
      </div>
      <div class="code"><b id="cd">BULUBAHAGIA</b><button class="btn vi" id="cp">Salin</button></div>
    </div>
  </div>
</section>

<section class="alt" id="testimoni">
  <div class="wrap">
    <div class="sec-t hand">Kata mereka</div>
    <h2>Tempelan <u>hati pelanggan</u></h2>
    <p class="sub">Pesan-pesan manis dari pemilik bulu.</p>
    <div class="notes">
      <div class="note">“Luna pulang wangi dan tenang. Stafnya sabar banget!”<b>— Rina, kucing</b></div>
      <div class="note">“Laporan fotonya bikin saya tenang selama dinas luar kota.”<b>— Bayu, anjing</b></div>
      <div class="note">“Produknya aman buat kulit sensitif Coco. Mantap!”<b>— Dewi, kelinci</b></div>
      <div class="note">“Kartu membernya lucu, diskonnya juga lumayan.”<b>— Arif, hamster</b></div>
    </div>
  </div>
</section>

<section id="faq">
  <div class="wrap">
    <div class="sec-t hand">Tanya jawab</div>
    <h2>Yang sering <u>ditanyakan</u></h2>
    <p class="sub">Belum ketemu jawabannya? Tanya lewat WhatsApp.</p>
    <div class="faq">
      <details><summary>Hewan apa saja yang dilayani?</summary><p>Anjing, kucing, kelinci, hamster, burung, dan beberapa reptil. Hubungi kami untuk memastikan jenis hewan Anda.</p></details>
      <details><summary>Apakah wajib vaksin untuk penitipan?</summary><p>Ya. Demi keamanan semua tamu berbulu, kami meminta bukti vaksin dasar yang masih berlaku saat check-in.</p></details>
      <details><summary>Apakah produk grooming aman?</summary><p>Aman. Kami memakai sampo berbahan alami dan bisa menyesuaikan untuk kulit sensitif.</p></details>
      <details><summary>Bagaimana saya tahu kabar hewan saat dititipkan?</summary><p>Kami mengirim foto dan catatan harian lewat WhatsApp. Anda juga boleh menanyakan kabarnya kapan saja.</p></details>
      <details><summary>Bagaimana cara booking?</summary><p>Klik tombol WhatsApp, pilih layanan dan jadwal, lalu tim kami mengonfirmasi dalam hitungan menit.</p></details>
    </div>
  </div>
</section>

<section class="band">
  <div class="wrap">
    <h2>Yuk, manjakan si bulu hari ini!</h2>
    <p>Booking gampang lewat WhatsApp. Tim kami siap membantu.</p>
    <a class="btn yl" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20booking" target="_blank" rel="noopener">Booking via WhatsApp</a>
  </div>
</section>

<footer>
  <div class="wrap">
    <div><div class="lg">🐾 Pawstead</div><p style="max-width:300px">Perawatan hewan ala desa: klinik, grooming, dan penitipan yang hangat seperti rumah sendiri.</p></div>
    <div><h4>Menu</h4><a href="#layanan">Layanan</a><a href="#member">Kartu Member</a><a href="#tim">Tim</a><a href="#paket">Paket</a><a href="#faq">FAQ</a></div>
    <div><h4>Kontak</h4><a href="#">halo@pawstead.id</a><a href="#">+62 812-3456-7890</a><a href="#">Setiap hari, 08.00–20.00</a></div>
    <div class="copy">© 2026 Pawstead. Semua hak dilindungi. &nbsp;·&nbsp; Instagram &nbsp;·&nbsp; TikTok &nbsp;·&nbsp; YouTube</div>
  </div>
</footer>

<div class="chat" id="chat" role="dialog" aria-label="Asisten AI">
  <header>🐾 Asisten Pawstead</header>
  <div class="msgs" id="msgs"><div class="m bot">Halo! Saya asisten virtual Pawstead. Mau tanya apa nih? 🐕</div></div>
  <div class="cq">
    <button data-q="layanan">Layanan</button>
    <button data-q="harga">Harga</button>
    <button data-q="inap">Penitipan</button>
    <button data-q="jam">Jam buka</button>
  </div>
</div>
<button class="fab ai" id="aiBtn" aria-label="Buka asisten AI">✦ Tanya AI</button>
<a class="fab wa" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi" target="_blank" rel="noopener" aria-label="Chat WhatsApp">WhatsApp</a>

<script>
var rm=matchMedia('(prefers-reduced-motion:reduce)').matches;
document.getElementById('menu').onclick=function(){document.getElementById('links').classList.toggle('open')};
document.querySelectorAll('#links a').forEach(function(a){a.addEventListener('click',function(){document.getElementById('links').classList.remove('open')})});
window.addEventListener('scroll',function(){var h=document.documentElement.scrollHeight-innerHeight;document.getElementById('pg').style.width=(h>0?scrollY/h*100:0)+'%'});
var els=document.querySelectorAll('.tagc,.sign,.crew,.cb,.note,.stp,details,.gal .pol,.cpn,.mk>div,h2,.sub,.sec-t');
if('IntersectionObserver' in window&&!rm){var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.12});els.forEach(function(el,i){el.classList.add('rv');el.style.animationDelay=((i%3)*90)+'ms';io.observe(el)})}
var cio=new IntersectionObserver(function(es){es.forEach(function(e){if(!e.isIntersecting)return;cio.unobserve(e.target);var el=e.target,m=el.textContent.match(/^([\d.,]+)(.*)$/);if(!m||rm)return;var dec=m[1].indexOf(',')>-1?1:0,to=parseFloat(m[1].replace(/\./g,'').replace(',','.')),suf=m[2],t0=performance.now();(function f(t){var k=Math.min(1,(t-t0)/1400),v=to*(1-Math.pow(1-k,3));el.textContent=v.toLocaleString('id-ID',{minimumFractionDigits:dec,maximumFractionDigits:dec})+suf;if(k<1)requestAnimationFrame(f)})(t0)})},{threshold:.6});
document.querySelectorAll('.sign b').forEach(function(b){cio.observe(b)});
var CC=['#ff2e93','#ff5a1f','#ffc21a','#7a2cff'];
function burst(x,y){if(rm)return;for(var i=0;i<16;i++){var s=document.createElement('span');s.className='cf';s.style.left=x+'px';s.style.top=y+'px';s.style.background=CC[i%4];var a=Math.random()*6.28,d=60+Math.random()*90;s.style.setProperty('--dx',Math.cos(a)*d+'px');s.style.setProperty('--dy',(Math.sin(a)*d-30)+'px');s.style.setProperty('--rt',(Math.random()*720-360)+'deg');document.body.appendChild(s);(function(n){setTimeout(function(){n.remove()},950)})(s)}}
document.addEventListener('click',function(e){if(e.target.closest('.btn,.fab,.opts button,.cq button'))burst(e.clientX,e.clientY)});
var pn=document.getElementById('pn'),pet={e:'🐕',n:'Anjing'},col='#ffc21a',num=String(Math.floor(100+Math.random()*900)).padStart(4,'0');
function card(){var nm=pn.value.trim()||'Nama Si Bulu';document.getElementById('cn').textContent=nm;document.getElementById('ce').textContent=pet.e;document.getElementById('c3').style.setProperty('--tc',col);document.getElementById('cid').textContent='MEMBER #'+num;document.getElementById('mwa').href='https://wa.me/6281234567890?text='+encodeURIComponent('Halo Pawstead! Saya mau klaim diskon member 15% untuk '+(pn.value.trim()||'si bulu')+' ('+pet.n+'), kartu #'+num+'.')}
pn.addEventListener('input',card);
document.getElementById('pe').addEventListener('click',function(e){var b=e.target.closest('button');if(!b)return;this.querySelectorAll('button').forEach(function(x){x.classList.remove('on')});b.classList.add('on');pet={e:b.dataset.e,n:b.dataset.n};card()});
document.getElementById('pc').addEventListener('click',function(e){var b=e.target.closest('button');if(!b)return;this.querySelectorAll('button').forEach(function(x){x.classList.remove('on')});b.classList.add('on');col=b.dataset.c;card()});
card();
document.getElementById('cp').onclick=function(){var b=this,t=document.getElementById('cd').textContent;function ok(){b.textContent='Tersalin!';setTimeout(function(){b.textContent='Salin'},1600)}
if(navigator.clipboard&&navigator.clipboard.writeText){navigator.clipboard.writeText(t).then(ok,function(){fb()})}else fb();
function fb(){var a=document.createElement('textarea');a.value=t;a.style.position='fixed';a.style.opacity='0';document.body.appendChild(a);a.select();try{document.execCommand('copy')}catch(x){}a.remove();ok()}};
var chat=document.getElementById('chat');
document.getElementById('aiBtn').onclick=function(){chat.classList.toggle('open')};
var A={layanan:['Layanan','Kami punya klinik & vaksin, grooming, penitipan, pet taxi, pelatihan perilaku, serta pet shop.'],
harga:['Harga','Mandi Seru Rp120rb, Spa Juara Rp260rb, Menginap Ceria Rp150rb per malam. Pakai kode BULUBAHAGIA untuk diskon 20% grooming pertama!'],
inap:['Penitipan','Kandang bersih ber-AC, halaman bermain luas, dan laporan foto harian. Bukti vaksin dasar diperlukan.'],
jam:['Jam buka','Kami buka setiap hari pukul 08.00–20.00. Klik tombol WhatsApp untuk booking.']};
var msgs=document.getElementById('msgs');
function add(t,c){var d=document.createElement('div');d.className='m '+c;d.textContent=t;msgs.appendChild(d);msgs.scrollTop=msgs.scrollHeight}
document.querySelectorAll('.cq button').forEach(function(b){b.onclick=function(){var r=A[b.dataset.q];add(r[0],'me');setTimeout(function(){add(r[1],'bot')},300)}});
</script>
</body>
</html>
@endverbatim
