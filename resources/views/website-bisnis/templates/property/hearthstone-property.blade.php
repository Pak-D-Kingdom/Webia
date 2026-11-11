@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Hearthstone Property — Rumah Hangat untuk Hidup Anda</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Lora:wght@400;500;600&family=Caveat:wght@600;700&display=swap">
<style>
:root{--bg:#fbf5e9;--surface:#f3e6cd;--card:#fffdf7;--text:#3a2c1e;--muted:#7a6650;--acc:#8a5d14;--line:#e6d4b3;--gold:#d4af6a;--gold2:#b8893d;--champ:#f7e7ce;--wood:#6b4a2b;--deep:#2a1d12;--gg:linear-gradient(135deg,#f6e2ae,#d4af6a 50%,#b8893d);--glow:rgba(212,175,106,.45);--wa:#2f9e5b;color-scheme:light;box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]){--bg:#1c140d;--surface:#251a11;--card:#2d2015;--text:#f7ead2;--muted:#c9b594;--acc:#e6c27a;--line:#46341f;--wa:#3fb36c;color-scheme:dark}}
:root[data-theme="dark"]{--bg:#1c140d;--surface:#251a11;--card:#2d2015;--text:#f7ead2;--muted:#c9b594;--acc:#e6c27a;--line:#46341f;--wa:#3fb36c;color-scheme:dark}
html{scroll-padding-top:calc(84px + env(safe-area-inset-top,0px));scroll-behavior:smooth}
*{box-sizing:border-box}
body{margin:0;background:var(--bg) radial-gradient(rgba(107,74,43,.07) 1px,transparent 1px) 0 0/5px 5px;color:var(--text);font-family:'Lora',Georgia,serif;line-height:1.75;overflow-x:hidden}
h1,h2,h3{font-family:'DM Serif Display',Georgia,serif;font-weight:400;line-height:1.12;margin:0}
p{margin:0}
.hand{font-family:'Caveat',cursive;font-weight:700}
.wrap{max-width:1140px;margin:0 auto;padding:0 24px}
#pg{position:fixed;top:0;left:0;height:4px;width:0;background:var(--gg);z-index:60;box-shadow:0 0 12px var(--glow)}
nav{position:sticky;top:env(safe-area-inset-top,0px);z-index:20;background:color-mix(in srgb,var(--card) 92%,transparent);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);border-bottom:5px solid var(--wood);transition:box-shadow .3s}
nav.sc{box-shadow:0 8px 28px rgba(60,35,10,.2)}
nav .wrap{display:flex;align-items:center;justify-content:space-between;height:72px}
.logo{display:flex;align-items:center;gap:11px;text-decoration:none;color:var(--text);font-family:'DM Serif Display',serif;font-size:24px}
.logo i{width:40px;height:40px;background:var(--gg);border:2px solid var(--wood);border-radius:8px 8px 8px 20px;display:grid;place-items:center;font-style:normal;font-size:19px;box-shadow:0 0 16px var(--glow)}
.links{display:flex;gap:26px;align-items:center}
.links a{color:var(--muted);text-decoration:none;font-size:14px;font-weight:600;position:relative;transition:color .2s}
.links a:not(.btn):hover{color:var(--acc)}
.links a:not(.btn)::after{content:"";position:absolute;left:0;right:100%;bottom:-6px;height:2px;background:var(--gold2);transition:right .25s}
.links a:not(.btn):hover::after{right:0}
.btn{position:relative;overflow:hidden;display:inline-block;background:var(--gg);color:#2a1d12!important;padding:14px 30px;border:2px solid var(--wood);border-radius:6px;font-weight:600;font-size:14px;letter-spacing:.04em;text-decoration:none;cursor:pointer;font-family:inherit;box-shadow:0 4px 0 var(--wood),0 0 22px var(--glow);transition:transform .15s,box-shadow .15s}
.btn:hover{transform:translateY(-2px);box-shadow:0 6px 0 var(--wood),0 0 32px var(--glow)}
.btn:active{transform:translateY(3px);box-shadow:0 1px 0 var(--wood)}
.btn::after{content:"";position:absolute;top:0;left:-70%;width:40%;height:100%;background:linear-gradient(120deg,transparent,rgba(255,255,255,.6),transparent);transform:skewX(-20deg);transition:left .7s}
.btn:hover::after{left:140%}
.btn.dk{background:var(--deep);color:#f6e2ae!important;border-color:var(--gold2)}
.btn.out{background:transparent;color:#f6e2ae!important;border-color:rgba(246,226,174,.7);box-shadow:none}
.btn.sm{padding:10px 18px;font-size:13px}
.menu{display:none;background:var(--surface);border:2px solid var(--wood);color:var(--text);padding:8px 14px;font-weight:600;font-family:inherit;border-radius:6px}
.hero{position:relative;background:radial-gradient(700px 420px at 78% 40%,rgba(212,175,106,.28),transparent 65%),repeating-linear-gradient(90deg,rgba(0,0,0,.2) 0 2px,transparent 2px 120px),linear-gradient(160deg,#3a2616,#1f150c);color:#f7ead2;padding:84px 0 130px;overflow:hidden}
.hero .wrap{position:relative;display:grid;grid-template-columns:1.1fr 1fr;gap:56px;align-items:center}
.pre{font-size:28px;color:var(--gold);margin-bottom:6px}
.hero h1{font-size:clamp(42px,6vw,78px);margin-bottom:22px;text-shadow:0 0 40px rgba(212,175,106,.35)}
.hero h1 em{font-style:italic;background:linear-gradient(135deg,#f6e2ae,#d4af6a,#f6e2ae);-webkit-background-clip:text;background-clip:text;color:transparent}
.hero .lead{font-size:18px;color:#dcc9a4;max-width:500px;margin-bottom:34px}
.cta{display:flex;gap:14px;flex-wrap:wrap}
.frame{position:relative;max-width:440px;margin:0 auto;border:10px solid var(--wood);border-radius:200px 200px 14px 14px;box-shadow:0 0 0 3px var(--gold2),0 30px 70px rgba(0,0,0,.5),0 0 80px rgba(212,175,106,.25);overflow:hidden;background:#1f150c}
.frame svg{display:block;width:100%;height:auto}
.fc{position:absolute;background:rgba(255,248,232,.12);border:1px solid rgba(246,226,174,.55);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);padding:11px 16px;font-size:13px;color:#fff3d6;animation:fl 6s ease-in-out infinite;z-index:2}
.fc b{display:block;font-family:'DM Serif Display',serif;font-size:24px;color:var(--gold);font-weight:400}
.fa{left:-24px;top:34%}.fb{right:-22px;bottom:12%;animation-delay:2s}
.fw{position:relative}
@keyframes fl{50%{transform:translateY(-10px)}}
.win{animation:wg 3.2s ease-in-out infinite}.win2{animation-delay:1.1s}
@keyframes wg{50%{opacity:.55}}
.sm{animation:sk 5s ease-out infinite;transform-origin:center;transform-box:fill-box}
.sm2{animation-delay:1.6s}.sm3{animation-delay:3.2s}
@keyframes sk{0%{transform:translate(0,0) scale(.5);opacity:0}20%{opacity:.7}100%{transform:translate(18px,-60px) scale(1.8);opacity:0}}
.tw{animation:wg 2.4s ease-in-out infinite}
.search{position:relative;z-index:5;margin-top:-76px}
.sbox{background:var(--card);border:3px solid var(--wood);border-radius:12px;box-shadow:0 20px 50px rgba(60,35,10,.28),0 0 50px var(--glow);padding:26px}
.tabs{display:flex;gap:6px;margin-bottom:18px}
.tabs button{border:2px solid var(--line);background:var(--bg);color:var(--text);padding:9px 24px;font-family:inherit;font-weight:600;font-size:14px;cursor:pointer;border-radius:6px;transition:all .2s}
.tabs button.on{background:var(--gg);border-color:var(--wood);color:#2a1d12;box-shadow:0 3px 0 var(--wood)}
.srow{display:grid;grid-template-columns:1.6fr 1fr auto;gap:14px;align-items:center}
.inp,.sel{width:100%;padding:14px 16px;border:2px solid var(--line);border-radius:6px;background:var(--bg);color:var(--text);font-family:inherit;font-size:15px}
.inp:focus,.sel:focus{outline:3px solid var(--glow);border-color:var(--gold2)}
section{padding:92px 0}
.alt{background:var(--surface);border-block:5px solid var(--wood)}
.sec-t{font-size:28px;color:var(--acc);margin-bottom:4px}
h2{font-size:clamp(32px,4.2vw,50px);margin-bottom:12px}
.sub{color:var(--muted);max-width:580px;margin-bottom:46px}
.rope{height:12px;background:repeating-linear-gradient(135deg,#b3834a 0 6px,#8c6330 6px 12px);border-radius:6px;margin:0 0 40px;box-shadow:0 2px 0 rgba(0,0,0,.2)}
.chips{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:34px;align-items:center}
.chips button{border:2px solid var(--line);background:var(--card);color:var(--text);padding:9px 20px;border-radius:999px;font-family:inherit;font-weight:600;font-size:14px;cursor:pointer;transition:all .2s}
.chips button:hover{border-color:var(--gold2)}
.chips button.on{background:var(--gg);border-color:var(--wood);color:#2a1d12}
.chips .cnt{margin-left:auto;color:var(--muted);font-size:14px}
.lg{display:grid;grid-template-columns:repeat(3,1fr);gap:28px}
.ls{background:var(--card);border:2px solid var(--line);border-radius:10px;overflow:hidden;transition:transform .3s,box-shadow .3s,border-color .3s;position:relative}
.ls:hover{transform:translateY(-8px);border-color:var(--gold2);box-shadow:0 22px 44px rgba(60,35,10,.2),0 0 36px var(--glow)}
.ph{position:relative;height:200px;display:grid;place-items:center;font-size:84px;border-bottom:5px solid var(--wood);background:linear-gradient(135deg,var(--c1),var(--c2));overflow:hidden}
.ph::after{content:"";position:absolute;inset:10px;border:2px dashed rgba(255,255,255,.55);pointer-events:none}
.bd{position:absolute;top:14px;left:14px;background:var(--deep);color:#f6e2ae;font-size:12px;font-weight:600;padding:4px 12px;border-radius:4px;letter-spacing:.06em;z-index:1}
.hrt{position:absolute;top:10px;right:10px;width:38px;height:38px;border-radius:50%;border:2px solid var(--wood);background:rgba(255,253,247,.92);font-size:18px;cursor:pointer;z-index:2;line-height:1;transition:transform .2s;color:#6b4a2b}
.hrt:hover{transform:scale(1.15)}.hrt.on{background:#ffd9d9;color:#c0392b;animation:pop .4s}
@keyframes pop{50%{transform:scale(1.35)}}
.pt{position:absolute;left:-6px;bottom:18px;background:#e6c98a;color:#2a1d12;border:2px solid var(--wood);padding:5px 16px 5px 14px;font-family:'DM Serif Display',serif;font-size:20px;transform:rotate(-2deg);clip-path:polygon(0 0,100% 0,94% 50%,100% 100%,0 100%);z-index:1;box-shadow:2px 3px 0 rgba(0,0,0,.2)}
.lb{padding:22px 22px 24px}
.lb h3{font-size:23px;margin-bottom:4px}
.lc{color:var(--muted);font-size:14px;margin-bottom:14px}
.sp{display:flex;gap:16px;padding:12px 0;border-block:1px dashed var(--line);font-size:14px;margin-bottom:16px;flex-wrap:wrap}
.sp span b{color:var(--acc)}
.empty{grid-column:1/-1;text-align:center;padding:50px;color:var(--muted);border:2px dashed var(--line);border-radius:10px}
.kp{display:grid;grid-template-columns:1.1fr 1fr;gap:0;background:var(--card);border:4px solid var(--wood);border-radius:12px;overflow:hidden;box-shadow:0 24px 50px rgba(60,35,10,.2)}
.kp .l{padding:40px}
.fld{margin-bottom:22px}
.fld label{display:flex;justify-content:space-between;font-weight:600;font-size:14px;margin-bottom:8px}
.fld label b{color:var(--acc);font-family:'DM Serif Display',serif;font-size:20px;font-weight:400}
input[type=range]{width:100%;height:8px;border-radius:99px;background:var(--line);appearance:none;-webkit-appearance:none;outline:none}
input[type=range]::-webkit-slider-thumb{-webkit-appearance:none;width:26px;height:26px;border-radius:50%;background:var(--gg);border:3px solid var(--wood);cursor:pointer;box-shadow:0 0 14px var(--glow)}
input[type=range]::-moz-range-thumb{width:22px;height:22px;border-radius:50%;background:#d4af6a;border:3px solid var(--wood);cursor:pointer}
.kp .r{background:radial-gradient(400px 300px at 50% 0%,rgba(212,175,106,.3),transparent 70%),linear-gradient(160deg,#3a2616,#1f150c);color:#f7ead2;padding:40px;display:flex;flex-direction:column;justify-content:center;gap:14px}
.kp .k{font-size:13px;letter-spacing:.2em;text-transform:uppercase;color:var(--gold)}
.kp .big{font-family:'DM Serif Display',serif;font-size:clamp(40px,5vw,60px);line-height:1;background:linear-gradient(135deg,#f6e2ae,#d4af6a);-webkit-background-clip:text;background-clip:text;color:transparent}
.kp .big small{font-size:18px;-webkit-text-fill-color:#dcc9a4}
.bar{display:flex;height:14px;border-radius:99px;overflow:hidden;margin-top:6px;border:1px solid rgba(246,226,174,.4)}
.bar i{display:block;transition:width .4s}
.lgd{display:grid;gap:6px;font-size:13.5px;color:#dcc9a4}
.lgd span::before{content:"";display:inline-block;width:11px;height:11px;border-radius:50%;margin-right:8px;background:var(--cl)}
.lgd b{float:right;color:#fff3d6}
.kp small.n{font-size:12px;color:#a8946f}
.gl{display:grid;grid-template-columns:repeat(4,1fr);grid-auto-rows:190px;gap:18px}
.ar{position:relative;display:flex;align-items:flex-end;padding:20px;color:#fff;border:3px solid var(--wood);overflow:hidden;font-family:'DM Serif Display',serif;font-size:24px;transition:transform .4s;background:linear-gradient(135deg,var(--a),var(--b))}
.ar::before{content:"";position:absolute;inset:0;background:linear-gradient(to top,rgba(30,18,8,.82),transparent 62%)}
.ar span{position:absolute;top:12px;right:16px;font-size:44px;transition:transform .4s}
.ar small{display:block;font-family:'Lora',serif;font-size:13px;opacity:.9}
.ar div{position:relative}
.ar:hover{transform:translateY(-6px)}.ar:hover span{transform:scale(1.25) rotate(6deg)}
.ar.w{grid-column:span 2}.ar.t{grid-row:span 2}
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;text-align:center}
.stt{background:var(--card);border:3px solid var(--wood);border-radius:10px;padding:30px 14px;position:relative}
.stt::before,.stt::after{content:"";position:absolute;top:10px;width:9px;height:9px;border-radius:50%;background:var(--gold2);box-shadow:inset -1px -1px 0 rgba(0,0,0,.3)}
.stt::before{left:10px}.stt::after{right:10px}
.stt b{display:block;font-family:'DM Serif Display',serif;font-size:42px;color:var(--acc);line-height:1.1;font-weight:400}
.stt span{font-size:14px;color:var(--muted)}
.ag{display:grid;grid-template-columns:repeat(3,1fr);gap:28px}
.agc{background:var(--card);border:2px solid var(--line);border-radius:10px;padding:34px 24px;text-align:center;transition:transform .3s,box-shadow .3s}
.agc:hover{transform:translateY(-8px);box-shadow:0 22px 44px rgba(60,35,10,.18),0 0 36px var(--glow)}
.av{width:112px;height:112px;margin:0 auto 18px;border-radius:50%;background:var(--gg);border:4px solid var(--wood);display:grid;place-items:center;font-family:'DM Serif Display',serif;font-size:38px;color:#3a2616;box-shadow:0 0 0 4px var(--card),0 0 0 6px var(--gold2),0 0 30px var(--glow)}
.agc h3{font-size:24px;margin-bottom:2px}
.rl{color:var(--acc);font-weight:600;font-size:13px;letter-spacing:.14em;text-transform:uppercase;margin-bottom:10px}
.agc p{color:var(--muted);font-size:15px;margin-bottom:18px}
.tl{display:grid;grid-template-columns:repeat(4,1fr);gap:24px}
.st{text-align:center;position:relative}
.st .ky{width:84px;height:84px;margin:0 auto 14px;border-radius:50%;background:var(--gg);border:4px solid var(--wood);display:grid;place-items:center;font-size:36px;box-shadow:0 5px 0 var(--wood),0 0 28px var(--glow)}
.st:not(:last-child)::after{content:"";position:absolute;top:40px;left:62%;width:76%;border-top:4px dashed var(--gold2)}
.st h3{font-size:22px;margin-bottom:6px}.st p{color:var(--muted);font-size:15px}
.tm{max-width:800px;margin:0 auto;text-align:center;position:relative;min-height:240px}
.tm .qm{font-family:'DM Serif Display',serif;font-size:100px;line-height:.6;color:var(--gold);display:block}
.ts{position:absolute;left:0;right:0;top:60px;opacity:0;transition:opacity .8s;pointer-events:none}
.ts.on{opacity:1;pointer-events:auto}
.ts p{font-family:'DM Serif Display',serif;font-size:clamp(22px,2.8vw,31px);line-height:1.4;font-style:italic}
.ts b{display:block;margin-top:18px;font-family:'Caveat',cursive;font-size:26px;color:var(--acc)}
.dots{display:flex;gap:10px;justify-content:center;margin-top:16px}
.dots button{width:36px;height:5px;border:0;border-radius:99px;background:var(--line);cursor:pointer;padding:0;transition:background .3s}
.dots button.on{background:var(--gold2)}
.vl{display:grid;grid-template-columns:1.1fr 1fr;gap:48px;align-items:center;background:var(--deep);color:#f7ead2;border:5px solid var(--wood);border-radius:14px;padding:50px;box-shadow:0 0 70px var(--glow);position:relative;overflow:hidden}
.vl::before{content:"🏡";position:absolute;font-size:300px;right:-40px;bottom:-90px;opacity:.07}
.vl h2{color:#fff3d6}.vl .sub{color:#d6c29b;margin-bottom:0}
.vf{position:relative;display:grid;gap:12px}
.vf .inp,.vf .sel{background:#fff8ea;color:#2a1d12;border-color:#d4af6a}
.vr{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.faq{max-width:800px;margin:0 auto}
details{background:var(--card);border:2px solid var(--line);border-left:6px solid var(--gold2);border-radius:8px;padding:18px 24px;margin-bottom:14px;transition:box-shadow .3s}
details[open]{box-shadow:0 0 30px var(--glow)}
summary{cursor:pointer;font-family:'DM Serif Display',serif;font-size:21px;list-style:none;display:flex;justify-content:space-between;gap:16px;align-items:center}
summary::-webkit-details-marker{display:none}
summary::after{content:"+";display:grid;place-items:center;width:32px;height:32px;border-radius:50%;background:var(--gg);border:2px solid var(--wood);font-family:'Lora',serif;font-size:20px;font-weight:600;color:#2a1d12;flex:none;transition:transform .3s}
details[open] summary::after{transform:rotate(45deg)}
details p{color:var(--muted);margin-top:12px}
.band{position:relative;background:var(--gg);color:#2a1d12;text-align:center;padding:92px 0;border-block:5px solid var(--wood);overflow:hidden}
.band::before{content:"🏡 🌲 🏠 🌲 🏡 🌲 🏠 🌲 🏡 🌲 🏠 🌲";position:absolute;inset:0;font-size:56px;letter-spacing:38px;line-height:1.9;opacity:.13;word-break:break-all;transform:rotate(-6deg) scale(1.3)}
.band .wrap{position:relative}
.band p{max-width:500px;margin:12px auto 30px;font-weight:500}
footer{background:repeating-linear-gradient(90deg,#3a2616 0 38px,#33200f 38px 40px);color:#dcc9a4;padding:66px 0 112px;font-size:15px;border-top:5px solid var(--gold2)}
footer .wrap{display:grid;grid-template-columns:1.5fr 1fr 1fr;gap:46px}
footer h4{font-family:'DM Serif Display',serif;font-weight:400;font-size:20px;color:var(--gold);margin:0 0 12px}
footer .lgo{font-family:'DM Serif Display',serif;font-size:32px;color:#fff3d6;margin-bottom:10px}
footer a{color:inherit;text-decoration:none;display:block;margin-top:8px;transition:color .2s}
footer a:hover{color:var(--gold)}
footer .copy{grid-column:1/-1;border-top:2px dashed rgba(246,226,174,.25);padding-top:22px;font-size:13px;line-height:1.7}
.fab{position:fixed;right:20px;z-index:30;display:flex;align-items:center;gap:8px;padding:13px 22px;font-size:14px;font-weight:600;cursor:pointer;text-decoration:none;font-family:inherit;border:2px solid var(--wood);border-radius:999px;box-shadow:0 4px 0 var(--wood),0 10px 24px rgba(0,0,0,.3);transition:transform .15s}
.fab:hover{transform:translateY(-2px)}
.fab.wa{bottom:calc(22px + env(safe-area-inset-bottom,0px));background:var(--wa);color:#fff}
.fab.ai{bottom:calc(80px + env(safe-area-inset-bottom,0px));background:var(--deep);color:var(--gold);border-color:var(--gold2);box-shadow:0 4px 0 var(--wood),0 0 24px var(--glow)}
.chat{position:fixed;right:20px;bottom:calc(138px + env(safe-area-inset-bottom,0px));width:min(350px,calc(100vw - 40px));background:var(--card);border:3px solid var(--wood);border-radius:14px;box-shadow:0 18px 44px rgba(0,0,0,.4),0 0 40px var(--glow);z-index:30;display:none;flex-direction:column;overflow:hidden}
.chat.open{display:flex}
.chat header{padding:14px 18px;background:var(--deep);color:var(--gold);font-family:'DM Serif Display',serif;font-size:19px;border-bottom:3px solid var(--gold2)}
.msgs{padding:16px;display:flex;flex-direction:column;gap:10px;max-height:250px;overflow-y:auto;font-size:14px}
.m{padding:10px 14px;border-radius:10px;max-width:88%;line-height:1.55}
.m.bot{background:var(--surface);align-self:flex-start}
.m.me{background:var(--gg);color:#2a1d12;align-self:flex-end;font-weight:600}
.cq{display:flex;flex-wrap:wrap;gap:8px;padding:0 16px 16px}
.cq button{background:var(--card);border:2px solid var(--gold2);color:var(--text);border-radius:999px;padding:6px 14px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit}
.cq button:hover{background:var(--gg);color:#2a1d12}
.rv{opacity:0}
.rv.in{opacity:1;animation:up .8s ease backwards}
@keyframes up{from{opacity:0;transform:translateY(36px)}to{opacity:1;transform:none}}
@media (prefers-reduced-motion:reduce){.fc,.win,.sm,.tw{animation:none}}
@media (max-width:900px){
.links{display:none;position:absolute;top:72px;left:0;right:0;background:var(--card);flex-direction:column;align-items:flex-start;padding:22px 24px;border-bottom:5px solid var(--wood);gap:16px}
.links.open{display:flex}
.menu{display:block}
.hero{padding:56px 0 110px}
.hero .wrap,.kp,.vl{grid-template-columns:1fr;gap:40px}
.fa{left:-6px}.fb{right:-6px}
.srow{grid-template-columns:1fr}
.lg,.ag{grid-template-columns:1fr}
.gl{grid-template-columns:repeat(2,1fr)}.ar.w{grid-column:span 2}
.stats,.tl{grid-template-columns:repeat(2,1fr)}
.st:not(:last-child)::after{display:none}
.kp .l,.kp .r{padding:28px 22px}
.vl{padding:30px 22px}.vr{grid-template-columns:1fr}
.chips .cnt{margin-left:0;width:100%}
section{padding:62px 0}
footer .wrap{grid-template-columns:1fr}
}
@media (max-width:520px){.stats,.tl{grid-template-columns:1fr}}
</style>
</head>
<body>
<div id="pg"></div>

<nav>
  <div class="wrap">
    <a class="logo" href="#top"><i>🏡</i>Hearthstone</a>
    <div class="links" id="links">
      <a href="#listing">Properti</a>
      <a href="#kpr">Simulasi KPR</a>
      <a href="#agen">Agen</a>
      <a href="#kawasan">Kawasan</a>
      <a href="#faq">FAQ</a>
      <a class="btn sm" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi%20properti" target="_blank" rel="noopener">Konsultasi</a>
    </div>
    <button class="menu" id="menu" aria-label="Menu">Menu</button>
  </div>
</nav>

<header class="hero" id="top">
  <div class="wrap">
    <div>
      <div class="pre hand">Selamat pulang ke rumah ✦</div>
      <h1>Temukan rumah yang terasa <em>hangat</em> sejak pintu pertama.</h1>
      <p class="lead">Agen properti terpercaya untuk rumah, villa, tanah, dan apartemen, dengan pendampingan jujur dari survei hingga serah terima kunci.</p>
      <div class="cta">
        <a class="btn" href="#listing">Lihat Properti</a>
        <a class="btn out" href="#kpr">Hitung KPR</a>
      </div>
    </div>
    <div class="fw">
      <div class="frame">
        <svg viewBox="0 0 400 480" aria-hidden="true">
          <defs>
            <linearGradient id="sky" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#2a1d36"/><stop offset=".45" stop-color="#8a4f45"/><stop offset=".8" stop-color="#f1b97a"/><stop offset="1" stop-color="#f7dba0"/></linearGradient>
            <radialGradient id="sun" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="#fff3c9"/><stop offset=".4" stop-color="#f7d58b" stop-opacity=".8"/><stop offset="1" stop-color="#f7d58b" stop-opacity="0"/></radialGradient>
            <radialGradient id="wg" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="#ffe9a8"/><stop offset="1" stop-color="#ffb84d" stop-opacity="0"/></radialGradient>
          </defs>
          <rect width="400" height="480" fill="url(#sky)"/>
          <circle cx="200" cy="310" r="150" fill="url(#sun)"/>
          <g fill="#fff3c9"><circle class="tw" cx="60" cy="50" r="1.6"/><circle class="tw" cx="130" cy="90" r="1.2" style="animation-delay:.8s"/><circle class="tw" cx="300" cy="60" r="1.8" style="animation-delay:1.4s"/><circle class="tw" cx="350" cy="130" r="1.2" style="animation-delay:.4s"/><circle class="tw" cx="230" cy="40" r="1.4" style="animation-delay:1.9s"/></g>
          <path d="M0 330 Q70 270 140 320 T280 300 T400 320 V480 H0Z" fill="#5a3b2a"/>
          <path d="M0 370 Q90 320 180 365 T400 350 V480 H0Z" fill="#3b2517"/>
          <g fill="#23301f"><path d="M40 380l22-70 22 70z"/><path d="M48 350l14-46 14 46z" fill="#2c3b26"/><path d="M330 385l20-62 20 62z"/><path d="M336 358l14-44 14 44z" fill="#2c3b26"/><path d="M95 395l16-48 16 48z"/><path d="M285 400l14-40 14 40z"/></g>
          <path d="M0 405 Q200 385 400 410 V480 H0Z" fill="#2a1b10"/>
          <rect x="262" y="278" width="22" height="48" fill="#4a2f1b"/>
          <circle class="sm" cx="273" cy="272" r="8" fill="#f4e4c8" opacity=".6"/><circle class="sm sm2" cx="273" cy="272" r="8" fill="#f4e4c8" opacity=".6"/><circle class="sm sm3" cx="273" cy="272" r="8" fill="#f4e4c8" opacity=".6"/>
          <rect x="130" y="340" width="150" height="80" fill="#7a5230"/>
          <g stroke="#5c3b1f" stroke-width="2"><path d="M130 356h150M130 372h150M130 388h150M130 404h150"/></g>
          <path d="M115 345 L205 270 L295 345Z" fill="#3b2616"/>
          <path d="M115 345 L205 270 L295 345" fill="none" stroke="#d4af6a" stroke-width="2.5"/>
          <rect x="190" y="372" width="30" height="48" rx="3" fill="#3b2616"/><circle cx="214" cy="397" r="2" fill="#d4af6a"/>
          <circle class="win" cx="156" cy="372" r="24" fill="url(#wg)"/><rect class="win" x="144" y="362" width="24" height="22" fill="#ffd77a"/>
          <circle class="win win2" cx="254" cy="372" r="24" fill="url(#wg)"/><rect class="win win2" x="242" y="362" width="24" height="22" fill="#ffd77a"/>
          <g stroke="#5c3b1f" stroke-width="2"><path d="M156 362v22M144 373h24M254 362v22M242 373h24"/></g>
          <circle class="win" cx="205" cy="316" r="9" fill="#ffd77a"/>
        </svg>
      </div>
      <div class="fc fa"><b>480+</b>properti terjual</div>
      <div class="fc fb"><b>★ 4,9</b>rating klien</div>
    </div>
  </div>
</header>

<div class="search">
  <div class="wrap">
    <div class="sbox">
      <div class="tabs" id="mt"><button class="on" data-m="all">Semua</button><button data-m="jual">Dijual</button><button data-m="sewa">Disewa</button></div>
      <div class="srow">
        <input class="inp" id="q" placeholder="Cari lokasi atau nama properti…" autocomplete="off">
        <select class="sel" id="ty"><option value="all">Semua tipe</option><option value="rumah">Rumah</option><option value="villa">Villa</option><option value="apartemen">Apartemen</option><option value="tanah">Tanah</option></select>
        <button class="btn" id="go">Cari Properti</button>
      </div>
    </div>
  </div>
</div>

<section id="listing">
  <div class="wrap">
    <div class="sec-t hand">Pilihan kurasi</div>
    <h2>Properti <em style="color:var(--acc)">unggulan</em> minggu ini</h2>
    <p class="sub">Setiap properti sudah kami survei langsung. Simpan favorit Anda dengan ikon hati.</p>
    <div class="rope"></div>
    <div class="chips" id="tc"><button class="on" data-t="all">Semua</button><button data-t="rumah">Rumah</button><button data-t="villa">Villa</button><button data-t="apartemen">Apartemen</button><button data-t="tanah">Tanah</button><span class="cnt" id="cnt"></span></div>
    <div class="lg" id="lg"></div>
  </div>
</section>

<section class="alt" id="kpr">
  <div class="wrap">
    <div class="sec-t hand">Hitung sendiri</div>
    <h2>Simulasi <em style="color:var(--acc)">cicilan KPR</em></h2>
    <p class="sub">Geser pengaturan di bawah dan lihat estimasi cicilan bulanan Anda secara langsung.</p>
    <div class="kp">
      <div class="l">
        <div class="fld"><label>Harga properti <b id="vh"></b></label><input type="range" id="h" min="300" max="10000" step="50" value="2000"></div>
        <div class="fld"><label>Uang muka (DP) <b id="vd"></b></label><input type="range" id="d" min="10" max="50" step="5" value="20"></div>
        <div class="fld"><label>Tenor <b id="vt"></b></label><input type="range" id="t" min="5" max="30" step="1" value="20"></div>
        <div class="fld" style="margin-bottom:0"><label>Suku bunga per tahun <b id="vb"></b></label><input type="range" id="b" min="3" max="15" step="0.25" value="7.5"></div>
      </div>
      <div class="r">
        <div class="k">Estimasi cicilan per bulan</div>
        <div class="big" id="cic">Rp0</div>
        <div class="bar"><i id="b1" style="background:#f6e2ae"></i><i id="b2" style="background:#d4af6a"></i><i id="b3" style="background:#8a5d14"></i></div>
        <div class="lgd"><span style="--cl:#f6e2ae">Uang muka<b id="l1"></b></span><span style="--cl:#d4af6a">Pokok pinjaman<b id="l2"></b></span><span style="--cl:#8a5d14">Total bunga<b id="l3"></b></span></div>
        <a class="btn" id="kwa" href="https://wa.me/6281234567890" target="_blank" rel="noopener" style="align-self:flex-start;margin-top:6px">Konsultasi KPR</a>
        <small class="n">*Estimasi dengan bunga tetap sepanjang tenor. Ketentuan bank dapat berbeda.</small>
      </div>
    </div>
  </div>
</section>

<section id="kawasan">
  <div class="wrap">
    <div class="sec-t hand">Jelajahi</div>
    <h2>Kawasan <em style="color:var(--acc)">favorit</em></h2>
    <p class="sub">Dari pegunungan sejuk hingga pusat kota, kami kenal setiap sudutnya.</p>
    <div class="gl">
      <div class="ar w t" style="--a:#c98d4a;--b:#6b4a2b"><span>⛰️</span><div>Lembang &amp; Bandung Utara<small>Villa &amp; rumah kayu · 48 properti</small></div></div>
      <div class="ar" style="--a:#e0b26a;--b:#8a5d14"><span>🌴</span><div>Ubud, Bali<small>32 properti</small></div></div>
      <div class="ar" style="--a:#b98a5a;--b:#4a2f1b"><span>🏯</span><div>Yogyakarta<small>27 properti</small></div></div>
      <div class="ar w" style="--a:#d9a45c;--b:#7a5230"><span>🏙️</span><div>BSD &amp; Jakarta Selatan<small>Townhouse &amp; apartemen · 61 properti</small></div></div>
    </div>
  </div>
</section>

<section class="alt" id="angka">
  <div class="wrap">
    <div class="stats">
      <div class="stt"><b>480+</b><span>Properti terjual</span></div>
      <div class="stt"><b>12 th</b><span>Pengalaman</span></div>
      <div class="stt"><b>98%</b><span>Klien puas</span></div>
      <div class="stt"><b>2,1 M</b><span>Nilai transaksi</span></div>
    </div>
  </div>
</section>

<section id="agen">
  <div class="wrap">
    <div class="sec-t hand">Kenalan yuk</div>
    <h2>Agen <em style="color:var(--acc)">berpengalaman</em></h2>
    <p class="sub">Jujur, responsif, dan paham kebutuhan keluarga Anda.</p>
    <div class="ag">
      <div class="agc"><div class="av">AW</div><h3>Arga Wicaksono</h3><div class="rl">Rumah &amp; Villa</div><p>Spesialis properti hunian premium dengan lebih dari 150 transaksi.</p><a class="btn sm" href="https://wa.me/6281234567890?text=Halo%20Arga%2C%20saya%20ingin%20konsultasi%20properti" target="_blank" rel="noopener">Chat Arga</a></div>
      <div class="agc"><div class="av">SD</div><h3>Sekar Dewanti</h3><div class="rl">Apartemen &amp; Sewa</div><p>Ahli hunian perkotaan dan investasi properti sewa.</p><a class="btn sm" href="https://wa.me/6281234567890?text=Halo%20Sekar%2C%20saya%20ingin%20konsultasi%20properti" target="_blank" rel="noopener">Chat Sekar</a></div>
      <div class="agc"><div class="av">BR</div><h3>Bagas Ramadhan</h3><div class="rl">Tanah &amp; Investasi</div><p>Pendamping legalitas, sertifikat, dan kavling bernilai tumbuh.</p><a class="btn sm" href="https://wa.me/6281234567890?text=Halo%20Bagas%2C%20saya%20ingin%20konsultasi%20properti" target="_blank" rel="noopener">Chat Bagas</a></div>
    </div>
  </div>
</section>

<section class="alt" id="proses">
  <div class="wrap">
    <div class="sec-t hand">Langkah mudah</div>
    <h2>Dari ide sampai <em style="color:var(--acc)">kunci di tangan</em></h2>
    <p class="sub">Prosesnya kami dampingi penuh agar Anda tenang.</p>
    <div class="tl">
      <div class="st"><div class="ky">💬</div><h3>Konsultasi</h3><p>Ceritakan kebutuhan dan anggaran Anda.</p></div>
      <div class="st"><div class="ky">🔍</div><h3>Survei</h3><p>Kunjungi properti pilihan bersama agen.</p></div>
      <div class="st"><div class="ky">🤝</div><h3>Negosiasi</h3><p>Kami bantu cek legalitas dan tawar harga.</p></div>
      <div class="st"><div class="ky">🔑</div><h3>Serah Kunci</h3><p>Transaksi aman, kunci pun di tangan Anda.</p></div>
    </div>
  </div>
</section>

<section id="testimoni">
  <div class="wrap">
    <div class="sec-t hand" style="text-align:center">Cerita pemilik baru</div>
    <h2 style="text-align:center;margin-bottom:34px">Kata <em style="color:var(--acc)">klien kami</em></h2>
    <div class="tm" id="tm">
      <span class="qm">“</span>
      <div class="ts on"><p>Agennya sabar menemani survei berkali-kali dan jujur soal kondisi rumah. Kami merasa aman.</p><b>Keluarga Hartono, pembeli rumah</b></div>
      <div class="ts"><p>Proses KPR dibantu dari awal sampai akad. Tidak ada kejutan biaya di tengah jalan.</p><b>Dita &amp; Rangga, pasangan muda</b></div>
      <div class="ts"><p>Rumah lama saya terjual lebih cepat dari perkiraan dengan harga yang adil.</p><b>Bu Lestari, penjual</b></div>
      <div class="ts"><p>Villa sewa saya selalu terisi berkat foto dan pemasaran yang rapi.</p><b>Pak Anton, investor</b></div>
    </div>
    <div class="dots" id="dots"><button class="on"></button><button></button><button></button><button></button></div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="vl">
      <div style="position:relative">
        <div class="sec-t hand" style="color:var(--gold)">Mau jual atau sewakan?</div>
        <h2>Dapatkan taksiran harga gratis</h2>
        <p class="sub">Isi data singkat properti Anda. Agen kami akan menghubungi lewat WhatsApp dengan penilaian yang transparan.</p>
      </div>
      <div class="vf">
        <select class="sel" id="vt1"><option>Rumah</option><option>Villa</option><option>Apartemen</option><option>Tanah</option></select>
        <input class="inp" id="vlk" placeholder="Lokasi properti" autocomplete="off">
        <div class="vr"><input class="inp" id="vlt" placeholder="Luas tanah (m²)" inputmode="numeric"><input class="inp" id="vlb" placeholder="Luas bangunan (m²)" inputmode="numeric"></div>
        <a class="btn" id="vwa" href="https://wa.me/6281234567890" target="_blank" rel="noopener">Minta Taksiran via WhatsApp</a>
      </div>
    </div>
  </div>
</section>

<section class="alt" id="faq">
  <div class="wrap">
    <div class="sec-t hand" style="text-align:center">Tanya jawab</div>
    <h2 style="text-align:center;margin-bottom:34px">Pertanyaan <em style="color:var(--acc)">umum</em></h2>
    <div class="faq">
      <details><summary>Apakah konsultasi dan survei dikenakan biaya?</summary><p>Konsultasi dan jadwal survei tidak dikenakan biaya. Biaya jasa dan komisi baru berlaku saat transaksi disepakati dan akan dijelaskan di awal.</p></details>
      <details><summary>Apakah legalitas properti dicek?</summary><p>Ya. Kami membantu memeriksa sertifikat, IMB atau PBG, dan status pajak sebelum Anda mengambil keputusan.</p></details>
      <details><summary>Apakah Anda membantu pengajuan KPR?</summary><p>Kami mendampingi persiapan dokumen dan simulasi cicilan, serta menghubungkan Anda dengan bank rekanan. Keputusan akhir tetap pada pihak bank.</p></details>
      <details><summary>Bagaimana cara menjual properti saya?</summary><p>Isi formulir taksiran harga atau hubungi kami lewat WhatsApp. Agen akan survei, menentukan harga wajar, lalu memasarkannya.</p></details>
      <details><summary>Bisakah saya survei secara virtual?</summary><p>Bisa. Kami menyediakan video walkthrough dan video call langsung dari lokasi bagi pembeli yang berada di luar kota.</p></details>
    </div>
  </div>
</section>

<section class="band">
  <div class="wrap">
    <h2>Siap menemukan rumah impian?</h2>
    <p>Satu pesan WhatsApp sudah cukup. Agen kami akan membantu menemukan yang paling cocok.</p>
    <a class="btn dk" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20mencari%20properti" target="_blank" rel="noopener">Chat via WhatsApp</a>
  </div>
</section>

<footer>
  <div class="wrap">
    <div><div class="lgo">🏡 Hearthstone</div><p style="max-width:310px">Agen properti hangat dan terpercaya untuk rumah, villa, tanah, dan apartemen.</p></div>
    <div><h4>Menu</h4><a href="#listing">Properti</a><a href="#kpr">Simulasi KPR</a><a href="#agen">Agen</a><a href="#kawasan">Kawasan</a><a href="#faq">FAQ</a></div>
    <div><h4>Kontak</h4><a href="#">halo@hearthstone.id</a><a href="#">+62 812-3456-7890</a><a href="#">Senin–Minggu, 09.00–19.00</a></div>
    <div class="copy">© 2026 Hearthstone Property. Semua hak dilindungi. Informasi harga dan ketersediaan dapat berubah sewaktu-waktu. Simulasi KPR hanya estimasi.</div>
  </div>
</footer>

<div class="chat" id="chat" role="dialog" aria-label="Asisten AI">
  <header>Asisten Hearthstone</header>
  <div class="msgs" id="msgs"><div class="m bot">Selamat datang di Hearthstone! Ada yang bisa saya bantu terkait properti? 🏡</div></div>
  <div class="cq">
    <button data-q="properti">Cari properti</button>
    <button data-q="kpr">KPR</button>
    <button data-q="survei">Jadwal survei</button>
    <button data-q="jual">Jual properti</button>
  </div>
</div>
<button class="fab ai" id="aiBtn" aria-label="Buka asisten AI">✦ Tanya AI</button>
<a class="fab wa" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi%20properti" target="_blank" rel="noopener" aria-label="Chat WhatsApp">WhatsApp</a>

<script>
var rm=matchMedia('(prefers-reduced-motion:reduce)').matches;
document.getElementById('menu').onclick=function(){document.getElementById('links').classList.toggle('open')};
document.querySelectorAll('#links a').forEach(function(a){a.addEventListener('click',function(){document.getElementById('links').classList.remove('open')})});
window.addEventListener('scroll',function(){var h=document.documentElement.scrollHeight-innerHeight;document.getElementById('pg').style.width=(h>0?scrollY/h*100:0)+'%';document.querySelector('nav').classList.toggle('sc',scrollY>10)});
function fmtP(p){if(p>=1e9){return 'Rp'+(p/1e9).toFixed(2).replace(/0+$/,'').replace(/\.$/,'').replace('.',',')+' M'}return 'Rp'+Math.round(p/1e6).toLocaleString('id-ID')+' jt'}
var L=[
{n:'Rumah Kayu Lembang',loc:'Lembang, Bandung',t:'villa',m:'jual',p:2850000000,kt:3,km:2,lt:320,e:'🏡',c:['#e8c98a','#b8893d'],tag:'Premium'},
{n:'Cabin Retreat Ubud',loc:'Ubud, Bali',t:'villa',m:'sewa',p:18000000,per:' / bln',kt:2,km:2,lt:180,e:'🛖',c:['#d9b27a','#8a5d14'],tag:'Disewa'},
{n:'Rumah Joglo Klasik',loc:'Yogyakarta',t:'rumah',m:'jual',p:3400000000,kt:4,km:3,lt:450,e:'🏯',c:['#cfa15e','#6b4a2b'],tag:'Eksklusif'},
{n:'Townhouse Hangat',loc:'BSD, Tangerang',t:'rumah',m:'jual',p:1650000000,kt:3,km:2,lt:96,e:'🏠',c:['#ecd09a','#b98a4a'],tag:'Baru'},
{n:'Kavling Kebun Pinus',loc:'Batu, Malang',t:'tanah',m:'jual',p:950000000,kt:0,km:0,lt:600,e:'🌲',c:['#b9c28a','#6c7a3f'],tag:'Investasi'},
{n:'Loft Industrial',loc:'Jakarta Selatan',t:'apartemen',m:'sewa',p:9500000,per:' / bln',kt:1,km:1,lt:48,e:'🏢',c:['#d6b98a','#7a5230'],tag:'Disewa'}];
var mode='all',tipe='all',q='',fav={};
function render(){var g=document.getElementById('lg'),r=L.filter(function(x){return(mode==='all'||x.m===mode)&&(tipe==='all'||x.t===tipe)&&(!q||(x.n+' '+x.loc).toLowerCase().indexOf(q)>-1)});
document.getElementById('cnt').textContent=r.length+' properti ditemukan';
g.innerHTML=r.length?r.map(function(x){var i=L.indexOf(x),s=x.t==='tanah'?'<span>LT <b>'+x.lt+' m²</b></span>':'<span>KT <b>'+x.kt+'</b></span><span>KM <b>'+x.km+'</b></span><span>LT <b>'+x.lt+' m²</b></span>';
return '<div class="ls"><div class="ph" style="--c1:'+x.c[0]+';--c2:'+x.c[1]+'"><span class="bd">'+x.tag+'</span><button class="hrt'+(fav[i]?' on':'')+'" data-i="'+i+'" aria-label="Simpan favorit">'+(fav[i]?'♥':'♡')+'</button>'+x.e+'<span class="pt">'+fmtP(x.p)+(x.per||'')+'</span></div><div class="lb"><h3>'+x.n+'</h3><div class="lc">📍 '+x.loc+'</div><div class="sp">'+s+'</div><a class="btn sm" target="_blank" rel="noopener" href="https://wa.me/6281234567890?text='+encodeURIComponent('Halo, saya tertarik survei: '+x.n+' ('+x.loc+')')+'">Jadwalkan Survei</a></div></div>'}).join(''):'<div class="empty">Belum ada properti yang cocok. Coba ubah kata kunci atau filter.</div>'}
document.getElementById('lg').addEventListener('click',function(e){var b=e.target.closest('.hrt');if(!b)return;var i=b.dataset.i;fav[i]=!fav[i];b.classList.toggle('on',!!fav[i]);b.textContent=fav[i]?'♥':'♡'});
function sync(){document.querySelectorAll('#mt button').forEach(function(b){b.classList.toggle('on',b.dataset.m===mode)});document.querySelectorAll('#tc button').forEach(function(b){b.classList.toggle('on',b.dataset.t===tipe)});document.getElementById('ty').value=tipe}
document.getElementById('mt').addEventListener('click',function(e){var b=e.target.closest('button');if(!b)return;mode=b.dataset.m;sync();render()});
document.getElementById('tc').addEventListener('click',function(e){var b=e.target.closest('button');if(!b)return;tipe=b.dataset.t;sync();render()});
document.getElementById('ty').onchange=function(){tipe=this.value;sync();render()};
document.getElementById('q').addEventListener('input',function(){q=this.value.trim().toLowerCase();render()});
document.getElementById('go').onclick=function(){q=document.getElementById('q').value.trim().toLowerCase();render();document.getElementById('listing').scrollIntoView({behavior:rm?'auto':'smooth'})};
render();
function idr(n){return 'Rp'+Math.round(n).toLocaleString('id-ID')}
function kp(){var h=+document.getElementById('h').value*1e6,d=+document.getElementById('d').value,t=+document.getElementById('t').value,b=+document.getElementById('b').value;
var dp=h*d/100,ln=h-dp,r=b/100/12,n=t*12,c=r?ln*r/(1-Math.pow(1+r,-n)):ln/n,tot=c*n,bg=tot-ln;
document.getElementById('vh').textContent=fmtP(h);document.getElementById('vd').textContent=d+'% ('+fmtP(dp)+')';document.getElementById('vt').textContent=t+' tahun';document.getElementById('vb').textContent=String(b).replace('.',',')+'%';
document.getElementById('cic').innerHTML=fmtP(c).replace(' jt','<small> jt</small>').replace(' M','<small> M</small>')+'<small> / bulan</small>';
var all=dp+ln+bg;document.getElementById('b1').style.width=(dp/all*100)+'%';document.getElementById('b2').style.width=(ln/all*100)+'%';document.getElementById('b3').style.width=(bg/all*100)+'%';
document.getElementById('l1').textContent=fmtP(dp);document.getElementById('l2').textContent=fmtP(ln);document.getElementById('l3').textContent=fmtP(bg);
document.getElementById('kwa').href='https://wa.me/6281234567890?text='+encodeURIComponent('Halo, saya ingin konsultasi KPR. Simulasi: harga '+fmtP(h)+', DP '+d+'%, tenor '+t+' tahun, bunga '+b+'%, cicilan sekitar '+fmtP(c)+' per bulan.')}
['h','d','t','b'].forEach(function(i){document.getElementById(i).addEventListener('input',kp)});kp();
function vw(){var m='Halo, saya ingin minta taksiran harga: '+document.getElementById('vt1').value+' di '+(document.getElementById('vlk').value||'(lokasi belum diisi)')+', LT '+(document.getElementById('vlt').value||'-')+' m², LB '+(document.getElementById('vlb').value||'-')+' m².';document.getElementById('vwa').href='https://wa.me/6281234567890?text='+encodeURIComponent(m)}
['vt1','vlk','vlt','vlb'].forEach(function(i){document.getElementById(i).addEventListener('input',vw)});vw();
var els=document.querySelectorAll('.stt,.agc,.st,.ar,.kp,.vl,details,.sbox,h2,.sub,.sec-t');
if('IntersectionObserver' in window&&!rm){var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.1});els.forEach(function(el,i){el.classList.add('rv');el.style.animationDelay=((i%3)*100)+'ms';io.observe(el)})}
var cio=new IntersectionObserver(function(es){es.forEach(function(e){if(!e.isIntersecting)return;cio.unobserve(e.target);var el=e.target,m=el.textContent.match(/^([\d.,]+)(.*)$/);if(!m||rm)return;var dec=m[1].indexOf(',')>-1?1:0,to=parseFloat(m[1].replace(/\./g,'').replace(',','.')),suf=m[2],t0=performance.now();(function f(t){var k=Math.min(1,(t-t0)/1500),v=to*(1-Math.pow(1-k,3));el.textContent=v.toLocaleString('id-ID',{minimumFractionDigits:dec,maximumFractionDigits:dec})+suf;if(k<1)requestAnimationFrame(f)})(t0)})},{threshold:.6});
document.querySelectorAll('.stt b').forEach(function(b){cio.observe(b)});
var ts=document.querySelectorAll('.ts'),dt=document.querySelectorAll('#dots button'),ti=0,tt;
function show(i){ti=i;ts.forEach(function(x,k){x.classList.toggle('on',k===i)});dt.forEach(function(x,k){x.classList.toggle('on',k===i)})}
dt.forEach(function(b,i){b.onclick=function(){show(i);clearInterval(tt);if(!rm)tt=setInterval(function(){show((ti+1)%ts.length)},6500)}});
if(!rm)tt=setInterval(function(){show((ti+1)%ts.length)},6500);
var chat=document.getElementById('chat');
document.getElementById('aiBtn').onclick=function(){chat.classList.toggle('open')};
var A={properti:['Cari properti','Kami punya rumah, villa, apartemen, dan tanah. Gunakan kotak pencarian di atas, atau ceritakan kebutuhan Anda lewat WhatsApp.'],
kpr:['KPR','Coba simulasi KPR di halaman ini untuk estimasi cicilan. Kami juga membantu persiapan dokumen dan menghubungkan Anda dengan bank rekanan.'],
survei:['Jadwal survei','Survei dijadwalkan Senin–Minggu pukul 09.00–19.00. Klik “Jadwalkan Survei” pada properti pilihan Anda.'],
jual:['Jual properti','Isi formulir taksiran harga gratis di halaman ini. Agen kami akan menghubungi Anda lewat WhatsApp.']};
var msgs=document.getElementById('msgs');
function add(t,c){var d=document.createElement('div');d.className='m '+c;d.textContent=t;msgs.appendChild(d);msgs.scrollTop=msgs.scrollHeight}
document.querySelectorAll('.cq button').forEach(function(b){b.onclick=function(){var r=A[b.dataset.q];add(r[0],'me');setTimeout(function(){add(r[1],'bot')},300)}});
</script>
</body>
</html>
@endverbatim
