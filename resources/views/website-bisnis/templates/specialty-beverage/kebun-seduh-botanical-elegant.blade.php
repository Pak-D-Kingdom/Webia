@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Kebun Seduh – Langganan Teh Spesialti</title>
<link href="https://fonts.googleapis.com/css2?family=Gilda+Display&family=Lora:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
<style>
:root{--sg:#9DB08A;--sg2:#E4EAD9;--sg3:#C6D3B6;--dk:#3E5038;--ink:#27321F;--cr:#F6F3EA;--wh:#FCFBF6;--tc:#C48B6A;--mu:#74806C;--ln:#D5DDC8;--d:'Gilda Display',Georgia,serif;--b:'Lora',Georgia,serif;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth}
body{margin:0;background:var(--wh);color:var(--ink);font:400 17px/1.75 var(--b);overflow-x:hidden}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
em{font-style:italic}
.w{max-width:1160px;margin:auto;padding:0 28px}
.lb{font:italic 400 15px var(--b);color:var(--tc);letter-spacing:.04em}
.bt{display:inline-flex;align-items:center;gap:10px;padding:14px 32px;background:var(--dk);color:var(--wh);border:1px solid var(--dk);border-radius:99px;font:500 15px var(--b);cursor:pointer;transition:.35s}.bt:hover,.bt:focus-visible{background:var(--sg);border-color:var(--sg);color:var(--ink);outline:none}
.bt.o{background:transparent;color:var(--dk)}.bt.o:hover{background:var(--dk);color:var(--wh);border-color:var(--dk)}
.ul{background:none;border:0;border-bottom:1px solid var(--tc);padding:0 0 2px;font:italic 400 16px var(--b);color:var(--dk);cursor:pointer}.ul:hover{color:var(--tc)}
header.n{position:sticky;top:env(safe-area-inset-top,0px);z-index:50;background:rgba(252,251,246,.92);border-bottom:1px solid var(--ln)}
header.n .w{display:grid;grid-template-columns:1fr auto 1fr;align-items:center;padding-top:14px;padding-bottom:14px}
.lg{font:400 26px var(--d);color:var(--dk);display:flex;align-items:center;gap:10px;justify-content:center}.lg svg{width:24px}
.nl{display:flex;gap:28px;font:italic 400 16px var(--b)}.nl.r{justify-content:flex-end}.nl button{background:none;border:0;font:inherit;color:var(--mu);cursor:pointer;padding:0}.nl button:hover{color:var(--dk)}
@media(max-width:760px){.nl:not(.r){display:none}header.n .w{grid-template-columns:1fr auto}.lg{justify-content:flex-start}}
.view{display:none}.view.on{display:block;animation:fd .8s}@keyframes fd{from{opacity:0;transform:translateY(12px)}}
/* hero */
.hero{padding:60px 0 90px;position:relative;overflow:hidden}
.hero .w{display:grid;grid-template-columns:1fr 1fr;gap:50px;align-items:center}
.hero h1{font:400 clamp(40px,5.8vw,82px)/1.04 var(--d);color:var(--dk);margin:16px 0 22px;letter-spacing:-.01em}.hero h1 em{color:var(--tc)}
.hero p{max-width:440px;color:var(--mu);font-size:18px}
.hc{display:flex;gap:18px;align-items:center;flex-wrap:wrap;margin-top:34px}
.ha{position:relative;max-width:520px;margin-left:auto;width:100%}.ha svg{width:100%;display:block;overflow:visible}
.sw{animation:sw 6s ease-in-out infinite;transform-origin:50% 100%;transform-box:fill-box}.sw:nth-child(2){animation-delay:-2s}.sw:nth-child(3){animation-delay:-4s}@keyframes sw{50%{transform:rotate(2.5deg)}}
@media(max-width:860px){.hero .w{grid-template-columns:1fr}.ha{max-width:380px;margin:0 auto}}
.mq{border-block:1px solid var(--ln);background:var(--sg2);overflow:hidden;white-space:nowrap;padding:14px 0}.mq div{display:inline-block;animation:mq 40s linear infinite;font:italic 400 22px var(--b);color:var(--dk)}.mq i{color:var(--tc);font-style:normal;margin:0 .8em}@keyframes mq{to{transform:translateX(-50%)}}
section.s{padding:110px 0 30px}
.sh{text-align:center;max-width:620px;margin:0 auto 56px}.sh h2{font:400 clamp(32px,4.4vw,58px)/1.06 var(--d);color:var(--dk);margin:12px 0}.sh p{color:var(--mu)}
.rule{display:flex;align-items:center;gap:14px;justify-content:center;color:var(--sg);margin-bottom:6px}.rule::before,.rule::after{content:"";height:1px;width:60px;background:var(--sg3)}
/* kotak */
.bx{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;background:var(--sg2);border-radius:44px;padding:clamp(30px,5vw,70px)}
.bx h2{font:400 clamp(30px,4vw,52px)/1.08 var(--d);color:var(--dk);margin:10px 0 14px}.bx p{color:var(--mu);max-width:400px}
.st{position:relative;aspect-ratio:1;max-width:460px;margin:auto;width:100%}
.bb{position:absolute;left:12%;right:12%;bottom:6%;height:34%;background:var(--dk);border-radius:4px 4px 14px 14px;z-index:3;box-shadow:0 20px 30px -14px rgba(39,50,31,.5)}
.bb::after{content:"Kebun Seduh";position:absolute;inset:0;display:grid;place-items:center;font:400 22px var(--d);color:var(--sg3);letter-spacing:.1em}
.lid{position:absolute;left:8%;right:8%;bottom:38%;height:12%;background:#4B6043;border-radius:6px;z-index:4;transform-origin:left bottom;transition:transform .9s cubic-bezier(.3,1.2,.4,1)}
.st.o .lid{transform:rotate(-24deg) translate(-8%,-30%)}
.cd{position:absolute;left:50%;bottom:34%;width:34%;aspect-ratio:3/4;background:var(--wh);border:1px solid var(--sg3);border-radius:6px;z-index:2;padding:6px;text-align:center;transform:translate(-50%,0) scale(.6);opacity:0;transition:transform .9s cubic-bezier(.3,1.2,.4,1),opacity .6s;cursor:pointer;box-shadow:0 14px 24px -14px rgba(39,50,31,.5)}
.cd svg{width:100%;height:62%}.cd b{display:block;font:400 12px var(--d);color:var(--dk);line-height:1.1}
.st.o .cd{opacity:1;transition-delay:calc(var(--i)*.14s)}
.st.o .cd:nth-of-type(1){transform:translate(-148%,-92%) rotate(-10deg)}.st.o .cd:nth-of-type(2){transform:translate(-62%,-118%) rotate(-3deg)}.st.o .cd:nth-of-type(3){transform:translate(24%,-110%) rotate(4deg)}.st.o .cd:nth-of-type(4){transform:translate(110%,-86%) rotate(11deg)}
.st.o .cd:hover{z-index:6;scale:1.08}
@media(max-width:860px){.bx{grid-template-columns:1fr;gap:20px}.cd{width:30%}}
/* herbarium */
.hb{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.sp{background:var(--cr);border:1px solid var(--ln);padding:26px 26px 22px;text-align:left;font:inherit;color:inherit;cursor:pointer;position:relative;transition:.4s}
.sp::before,.sp::after{content:"";position:absolute;width:20px;height:20px;border:1.5px solid var(--sg)}.sp::before{left:10px;top:10px;border-right:0;border-bottom:0}.sp::after{right:10px;bottom:10px;border-left:0;border-top:0}
.sp:hover{transform:translateY(-6px);box-shadow:0 26px 40px -26px rgba(62,80,56,.6);background:#fff}.sp svg{width:100%;height:210px;display:block;margin-bottom:10px;transition:.5s}.sp:hover svg{transform:rotate(-2deg) scale(1.04)}
.sp small{font:italic 400 14px var(--b);color:var(--tc)}.sp h3{font:400 24px/1.1 var(--d);color:var(--dk);margin:2px 0 4px}.sp p{font-size:14.5px;color:var(--mu)}.sp .no{position:absolute;right:16px;top:12px;font:400 13px var(--d);color:var(--sg)}
@media(max-width:900px){.hb{grid-template-columns:1fr 1fr}}@media(max-width:560px){.hb{grid-template-columns:1fr}}
.cr3{display:grid;grid-template-columns:repeat(3,1fr);gap:0;border-top:1px solid var(--ln)}.cr3 div{padding:40px 30px 10px;border-right:1px solid var(--ln);text-align:center}.cr3 div:last-child{border:0}.cr3 svg{width:64px;stroke:var(--dk);fill:none;stroke-width:1.4;stroke-linecap:round;stroke-linejoin:round;margin-bottom:16px}.cr3 b{font:400 24px var(--d);color:var(--dk);display:block}.cr3 p{color:var(--mu);font-size:15.5px;margin-top:6px}
@media(max-width:760px){.cr3{grid-template-columns:1fr}.cr3 div{border:0;border-bottom:1px solid var(--ln)}}
.pl{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.pc{background:var(--cr);border:1px solid var(--ln);border-radius:28px;padding:34px 30px;text-align:left;font:inherit;color:inherit;cursor:pointer;transition:.4s;position:relative}.pc:hover,.pc.f{background:var(--dk);color:var(--wh)}.pc:hover p,.pc.f p,.pc:hover li,.pc.f li{color:#C6D3B6}
.pc.f::before{content:"Paling disukai";position:absolute;top:-12px;left:30px;background:var(--tc);color:#fff;font:italic 13px var(--b);padding:2px 14px;border-radius:99px}
.pc h3{font:400 28px var(--d)}.pc .pr{font:400 36px var(--d);margin:10px 0 4px}.pc .pr small{font:italic 14px var(--b);color:var(--mu)}.pc ul{padding-left:18px;margin:14px 0 0;font-size:15px}.pc p{font-size:15px;color:var(--mu)}
@media(max-width:860px){.pl{grid-template-columns:1fr}}
.qt{text-align:center;padding:110px 0 60px}.qt blockquote{margin:0 auto;max-width:780px;font:italic 400 clamp(24px,3.2vw,38px)/1.4 var(--b);color:var(--dk)}.qt cite{display:block;margin-top:18px;font:italic 15px var(--b);color:var(--tc);font-style:normal}
.ct{text-align:center;background:var(--sg2);border-radius:44px;padding:90px 30px;margin-top:30px}.ct h2{font:400 clamp(30px,4.6vw,62px)/1.06 var(--d);color:var(--dk);max-width:720px;margin:12px auto 28px}
footer{padding:60px 0 40px;margin-top:70px;border-top:1px solid var(--ln);font-size:14.5px;color:var(--mu)}footer .w{display:flex;justify-content:space-between;gap:30px;flex-wrap:wrap}footer p{max-width:600px;font-size:13px;line-height:1.7;margin-top:10px}footer button{background:none;border:0;font:inherit;color:inherit;cursor:pointer;margin-right:20px;padding:0}footer button:hover{color:var(--dk)}
/* subhalaman */
.sb{padding:50px 0 30px}.cr{font:italic 400 15px var(--b);color:var(--mu);margin-bottom:34px}.cr a{color:var(--dk);border-bottom:1px solid var(--sg)}
.th{display:grid;grid-template-columns:1fr 1fr;gap:70px;align-items:center}
.pt{background:var(--cr);border:1px solid var(--ln);padding:34px;position:relative;max-width:460px;width:100%}.pt svg{width:100%;display:block}.pt::before,.pt::after{content:"";position:absolute;width:30px;height:30px;border:2px solid var(--sg)}.pt::before{left:12px;top:12px;border-right:0;border-bottom:0}.pt::after{right:12px;bottom:12px;border-left:0;border-top:0}
.pt .lb2{margin-top:10px;padding-top:10px;border-top:1px solid var(--ln);display:flex;justify-content:space-between;font:italic 14.5px var(--b);color:var(--mu)}
.th h1{font:400 clamp(36px,5vw,68px)/1.04 var(--d);color:var(--dk);margin:10px 0 8px}.th .lt{font:italic 400 19px var(--b);color:var(--tc);margin-bottom:20px}.th p{color:var(--mu);max-width:460px}
.nb{margin:30px 0;max-width:420px}.nb div{display:grid;grid-template-columns:90px 1fr;gap:14px;align-items:center;padding:7px 0;font:italic 15.5px var(--b)}.nb i{display:flex;gap:6px}.nb i b{width:100%;height:3px;border-radius:3px;background:var(--ln);flex:1}.nb i b.on{background:var(--sg)}
.bw{display:grid;grid-template-columns:repeat(3,1fr);gap:0;border:1px solid var(--ln);max-width:460px;margin:28px 0}.bw div{padding:14px 16px;border-right:1px solid var(--ln)}.bw div:last-child{border:0}.bw small{display:block;font:italic 13.5px var(--b);color:var(--mu)}.bw b{font:400 19px var(--d);color:var(--dk)}
.tg{display:inline-block;font:italic 14px var(--b);padding:3px 14px;border-radius:99px;background:var(--sg2);color:var(--dk);margin-right:6px}
@media(max-width:860px){.th{grid-template-columns:1fr;gap:34px}.pt{margin:auto}}
.pnv{display:flex;justify-content:space-between;gap:20px;margin-top:70px;padding-top:26px;border-top:1px solid var(--ln);flex-wrap:wrap}
.tt{text-align:center;max-width:720px;margin:0 auto 50px}.tt h1{font:400 clamp(36px,5vw,66px)/1.05 var(--d);color:var(--dk);margin:12px 0}.tt p{color:var(--mu)}
.bk{display:grid;grid-template-columns:1fr 1fr;gap:34px;align-items:start}
@media(max-width:860px){.bk{grid-template-columns:1fr}}
.fm label{display:block;font:italic 400 15px var(--b);color:var(--tc);margin:22px 0 8px}.fm label:first-child{margin-top:0}
.fm select,.fm input[type=text],.fm input[type=date],.fm textarea{width:100%;padding:12px 16px;border:1px solid var(--ln);border-radius:14px;background:#fff;font:400 16px var(--b);color:var(--ink);outline:none}.fm input:focus,.fm select:focus,.fm textarea:focus{border-color:var(--sg)}
.ch{display:flex;flex-wrap:wrap;gap:8px}.ch button{padding:10px 20px;border:1px solid var(--ln);border-radius:99px;background:#fff;font:400 15px var(--b);cursor:pointer;color:var(--ink);transition:.25s}.ch button:hover{border-color:var(--sg)}.ch button[aria-pressed=true]{background:var(--dk);border-color:var(--dk);color:var(--wh)}
.sm{background:var(--sg2);border-radius:28px;padding:32px;position:sticky;top:90px}.sm h3{font:400 28px var(--d);color:var(--dk)}.sm .pr{font:400 clamp(34px,4vw,46px)/1 var(--d);color:var(--dk);margin:10px 0 4px}.sm small{display:block;color:var(--mu);font-size:14px}.sm ul{list-style:none;padding:0;margin:18px 0}.sm li{display:flex;justify-content:space-between;gap:10px;padding:8px 0;border-top:1px solid var(--sg3);font-size:15.5px}.sm li span{font-style:italic;color:var(--mu)}
@media(max-width:860px){.sm{position:static}}
.gc{aspect-ratio:3/4;max-width:340px;margin:auto;border-radius:6px;padding:34px 28px;position:relative;overflow:hidden;box-shadow:0 30px 50px -26px rgba(39,50,31,.55);display:flex;flex-direction:column;justify-content:flex-end;transition:.5s}
.gc svg{position:absolute;right:-30px;top:-20px;width:70%;opacity:.9}.gc b{font:400 26px var(--d);position:relative;line-height:1.1}.gc p{font:italic 400 18px/1.5 var(--b);margin:12px 0 18px;position:relative;min-height:5em;word-break:break-word}.gc small{font:400 13px var(--b);position:relative;opacity:.8}
.pnl{position:sticky;top:90px}
@media(max-width:860px){.pnl{position:static}}
/* chat */
#fab{position:fixed;left:22px;bottom:calc(22px + env(safe-area-inset-bottom,0px));z-index:80;width:62px;height:62px;border-radius:50%;border:0;background:var(--dk);cursor:pointer;display:grid;place-items:center;box-shadow:0 14px 30px -10px rgba(39,50,31,.6);transition:.4s}#fab:hover{transform:rotate(-12deg) scale(1.06)}#fab svg{width:30px}
#cp{position:fixed;left:22px;bottom:calc(98px + env(safe-area-inset-bottom,0px));z-index:80;width:min(370px,calc(100vw - 44px));height:min(500px,70vh);background:var(--cr);border:1px solid var(--sg);display:none;flex-direction:column;box-shadow:0 30px 70px -20px rgba(39,50,31,.5);border-radius:6px}#cp.on{display:flex;animation:fd .5s}
#cp::before{content:"";position:absolute;inset:7px;border:1px solid var(--sg3);pointer-events:none;border-radius:2px}
#cp header{padding:18px 24px 12px;display:flex;justify-content:space-between;align-items:center}#cp header b{font:400 22px var(--d);color:var(--dk)}#cp header small{display:block;font:italic 13px var(--b);color:var(--tc)}#cp header button{background:none;border:0;font-size:22px;cursor:pointer;color:var(--mu);position:relative;z-index:2}
#ms{flex:1;overflow-y:auto;padding:6px 26px;display:flex;flex-direction:column;gap:14px;font-size:15.5px;line-height:1.65;position:relative}
.m{animation:fd .5s}.m.b{color:var(--ink)}.m.u{align-self:flex-end;font:italic 400 14.5px var(--b);color:var(--mu);text-align:right}
.cs{display:flex;flex-wrap:wrap;gap:6px 14px;padding:8px 26px 0;position:relative}.cs button{background:none;border:0;border-bottom:1px solid var(--tc);font:italic 400 14px var(--b);color:var(--dk);cursor:pointer;padding:0}.cs button:hover{color:var(--tc)}
#cf{display:flex;margin:12px 20px 12px;border:1px solid var(--sg3);border-radius:99px;background:#fff;overflow:hidden;position:relative}#cf input{flex:1;padding:12px 18px;border:0;font:400 15px var(--b);outline:none;min-width:0;background:none}#cf button{padding:0 18px;background:none;border:0;color:var(--dk);cursor:pointer;font-size:18px}
#cw{display:block;text-align:center;padding:11px;background:var(--dk);color:var(--wh);font:italic 15px var(--b);position:relative;z-index:2}
:focus-visible{outline:2px solid var(--tc);outline-offset:3px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}
#kebun-menu-button{display:none;width:44px;height:44px;border:1px solid var(--ln);border-radius:50%;background:var(--wh);color:var(--dk);font-size:20px;cursor:pointer}#kebun-menu{position:fixed;inset:73px 0 0;z-index:55;background:var(--wh);padding:18px 28px;visibility:hidden;opacity:0;pointer-events:none;transform:translateY(-110%);transition:.35s}#kebun-menu.open{visibility:visible;opacity:1;pointer-events:auto;transform:none}#kebun-menu button{display:block;width:100%;padding:16px 0;border:0;border-bottom:1px solid var(--ln);background:none;text-align:left;font:italic 17px var(--b);color:var(--dk);cursor:pointer}@media(max-width:760px){header.n .w{grid-template-columns:1fr auto}header.n .nl{display:none!important}#kebun-menu-button{display:block}}</style>
</head>
<body>
<header class="n"><div class="w"><div class="nl"><button data-s="kotak">Kotak bulan ini</button><button data-s="herbarium">Herbarium</button></div><a class="lg" href="#beranda" id="lgo"></a><div class="nl r"><button data-s="cara">Cara kerja</button><button data-s="kontak">Kontak</button></div><button id="kebun-menu-button" type="button" aria-expanded="false" aria-controls="kebun-menu" aria-label="Buka menu navigasi">☰</button></div></header><nav id="kebun-menu" aria-hidden="true"><button type="button" data-s="kotak">Kotak bulan ini</button><button type="button" data-s="herbarium">Herbarium</button><button type="button" data-s="cara">Cara kerja</button><button type="button" data-s="kontak">Kontak</button></nav>

<main>
<div class="view" id="v-beranda">
<section class="hero"><div class="w"><div><span class="lb">Langganan teh spesialti</span><h1>Kebun kecil di cangkirmu, <em>setiap bulan.</em></h1><p>Empat sampai delapan teh pilihan, dikemas dalam kotak yang cantik dan diantar ke rumah. Tinggal buka, seduh, dan nikmati jedanya.</p><div class="hc"><a class="bt" href="#langganan">Mulai berlangganan</a><a class="ul" href="#hadiah">Atau beri sebagai hadiah</a></div></div><div class="ha" id="ha"></div></div></section>
<div class="mq" aria-hidden="true"><div id="mq"></div></div>
<section class="s" id="kotak"><div class="w"><div class="bx"><div><span class="lb">Kotak bulan ini</span><h2 id="bt2"></h2><p id="bd2"></p><div class="hc"><button class="bt" id="ob">Buka kotaknya</button><a class="ul" href="#kotak-1" style="text-decoration:none">Lihat isi lengkap</a></div></div><div class="st" id="st"></div></div></div></section>
<section class="s" id="herbarium"><div class="w"><div class="sh"><div class="rule">❦</div><h2>Herbarium kami</h2><p>Setiap teh punya lembar spesimennya sendiri. Pilih salah satu untuk mengenalnya lebih dekat.</p></div><div class="hb" id="hb"></div></div></section>
<section class="s" id="cara"><div class="w"><div class="sh"><div class="rule">❦</div><h2>Tiga langkah sederhana</h2></div><div class="cr3"><div><svg viewBox="0 0 64 64"><path d="M12 22h40v32H12zM8 22l8-12h32l8 12M32 22v32"/></svg><b>Pilih paket</b><p>Tentukan jumlah teh dan preferensi kafeinmu.</p></div><div><svg viewBox="0 0 64 64"><path d="M6 40h34V18H6zM40 26h12l6 8v6H40zM18 46a5 5 0 1 0 .1 0M48 46a5 5 0 1 0 .1 0"/></svg><b>Diantar ke rumah</b><p>Kotak baru tiba setiap bulan atau dua bulan sekali.</p></div><div><svg viewBox="0 0 64 64"><path d="M12 24h32v10a16 16 0 0 1-32 0zM44 28h4a6 6 0 0 1 0 12h-4M22 10c0 4 4 4 4 8M32 10c0 4 4 4 4 8"/></svg><b>Seduh dan nikmati</b><p>Setiap teh dilengkapi panduan suhu dan waktu seduh.</p></div></div></div></section>
<section class="s" id="paket"><div class="w"><div class="sh"><div class="rule">❦</div><h2>Pilih ritmemu</h2><p>Tiga paket, bisa dijeda atau dihentikan sesuai ketentuan.</p></div><div class="pl" id="pl"></div></div></section>
<section class="qt"><div class="w"><blockquote>“Setiap awal bulan terasa seperti membuka hadiah kecil dari kebun.”</blockquote><cite>Pelanggan contoh</cite></div></section>
<section id="kontak"><div class="w"><div class="ct"><span class="lb">Siap mencoba?</span><h2>Biarkan kebun kecil ini mampir ke rumahmu.</h2><div class="hc" style="justify-content:center"><a class="bt" href="#langganan">Mulai berlangganan</a><a class="bt o" href="#hadiah">Beri hadiah</a></div></div></div></section>
</div>
<div class="view" id="v-sub"></div>
</main>
<footer><div class="w"><div><span class="lg" style="justify-content:flex-start" id="lg2"></span><p>Template contoh. Seluruh nama, harga, dan isi kotak adalah contoh dan perlu diganti. Periksa komposisi dan kandungan alergen tiap produk sebelum dikonsumsi. Ketentuan langganan, jeda, dan pembatalan dijelaskan saat pendaftaran.</p></div><div><button data-hash="langganan">Langganan</button><button data-hash="hadiah">Hadiah</button><button data-hash="kotak-1">Kotak bulan ini</button></div></div></footer>
<button id="fab" aria-label="Tanya Kebun Seduh"></button>
<aside id="cp" role="dialog" aria-label="Tanya Kebun Seduh"><header><div><b>Tanya Kebun</b><small>Lembar bantuan</small></div><button id="x" aria-label="Tutup">×</button></header><div id="ms"></div><div class="cs" id="cs"></div><form id="cf"><input id="ci" placeholder="Tulis pertanyaanmu…" autocomplete="off" aria-label="Pertanyaan"><button aria-label="Kirim">→</button></form><a id="cw" href="#" target="_blank" rel="noopener">Lanjutkan ke WhatsApp →</a></aside>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="Kebun Seduh";
function replaceMarkup(el,markup){const range=document.createRange();range.selectNodeContents(el);range.deleteContents();el.append(range.createContextualFragment(markup))}
const $=i=>document.getElementById(i),wl=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t),rp=n=>"Rp "+Math.round(n).toLocaleString("id-ID");
/* botani */
const LC=["#8FA67A","#A7BB94","#6E8A5F","#B6C7A3"];
const leaf=(l,w,f)=>`<path d="M0 0C${l*.25} ${-w} ${l*.75} ${-w} ${l} 0C${l*.75} ${w} ${l*.25} ${w} 0 0Z" fill="${f}"/><path d="M0 0H${l*.9}" stroke="rgba(39,50,31,.35)" stroke-width="1"/>`;
function plant(t,k,sz){const c=LC[k%4],c2=LC[(k+2)%4];let s=`<svg viewBox="0 0 200 260" ${sz?`style="${sz}"`:""} aria-hidden="true"><path d="M100 252C96 180 106 110 100 ${t==="daisy"?62:t==="spike"?40:34}" fill="none" stroke="#5F7A52" stroke-width="3" stroke-linecap="round"/>`;
if(t==="sprig")for(let i=0;i<7;i++){const y=226-i*27,l=62-i*5,w=15-i;s+=`<g transform="translate(100 ${y}) rotate(-32)">${leaf(l,w,i%2?c:c2)}</g><g transform="translate(100 ${y-12}) rotate(-148)">${leaf(l,w,i%2?c2:c)}</g>`}
if(t==="daisy"){s+=`<g transform="translate(100 210) rotate(-30)">${leaf(54,13,c)}</g><g transform="translate(100 180) rotate(-150)">${leaf(50,12,c2)}</g><g transform="translate(100 60)">${[...Array(12)].map((_,i)=>`<ellipse cx="0" cy="-26" rx="8" ry="22" transform="rotate(${i*30})" fill="#fff" stroke="#C6D3B6" stroke-width="1.2"/>`).join("")}<circle r="13" fill="#D9A55B"/></g>`}
if(t==="spike"){s+=`<g transform="translate(100 220) rotate(-30)">${leaf(50,8,c)}</g><g transform="translate(100 196) rotate(-150)">${leaf(46,8,c2)}</g>`;for(let i=0;i<13;i++){const y=44+i*9,x=(i%2?7:-7);s+=`<ellipse cx="${100+x}" cy="${y}" rx="6" ry="9" fill="${i%3?"#A99BBF":"#8F80AB"}" transform="rotate(${i%2?25:-25} ${100+x} ${y})"/>`}}
return s+"</svg>"}
const TP=["sprig","sprig","daisy","spike","sprig","sprig"];
const logo=`<svg viewBox="0 0 24 24" fill="none" stroke="#3E5038" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 19C5 9 12 4 20 4c0 9-5 15-15 15zM5 19L14 10"/></svg>`;
replaceMarkup($("lgo"),logo+"Kebun Seduh");replaceMarkup($("lg2"),logo+"Kebun Seduh");replaceMarkup($("fab"),`<svg viewBox="0 0 32 32" fill="none" stroke="#E4EAD9" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 14h18v3a9 9 0 0 1-18 0zM24 16h2a3 3 0 0 1 0 6h-2M12 6c0 2 2 2 2 4M17 6c0 2 2 2 2 4"/></svg>`);
replaceMarkup($("ha"),`<svg viewBox="0 0 520 520"><circle cx="260" cy="270" r="210" fill="#E4EAD9"/><circle cx="260" cy="270" r="170" fill="none" stroke="#C6D3B6" stroke-dasharray="3 7"/><g class="sw"><svg x="40" y="120" width="230" height="300" viewBox="0 0 200 260">${plant("sprig",0).replace(/^<svg[^>]*>|<\/svg>$/g,"")}</svg></g><g class="sw"><svg x="200" y="60" width="270" height="340" viewBox="0 0 200 260">${plant("daisy",1).replace(/^<svg[^>]*>|<\/svg>$/g,"")}</svg></g><g class="sw"><svg x="150" y="210" width="230" height="300" viewBox="0 0 200 260">${plant("spike",2).replace(/^<svg[^>]*>|<\/svg>$/g,"")}</svg></g></svg>`);
replaceMarkup($("mq"),("Teh hijau<i>❦</i>Teh hitam<i>❦</i>Oolong<i>❦</i>Rempah dan bunga<i>❦</i>Herbal kebun<i>❦</i>").repeat(5));
/* data */
const TE=[
{n:"Melati Hijau",lt:"Camellia sinensis · Jasminum sambac",ty:"Teh hijau",kf:"Sedang",d:"Teh hijau segar yang diselimuti aroma bunga melati. Ringan, harum, dan bersih di akhir seruputan.",nt:[4,2,1,5],su:"80°C",wk:"2 sampai 3 menit",tk:"2 g per 200 ml"},
{n:"Peppermint Kebun",lt:"Mentha × piperita",ty:"Herbal",kf:"Tanpa kafein",d:"Daun peppermint kering dengan rasa dingin yang segar dan manis alami. Enak panas maupun dingin.",nt:[1,2,0,5],su:"95°C",wk:"5 sampai 7 menit",tk:"2 g per 200 ml"},
{n:"Chamomile Madu",lt:"Matricaria chamomilla",ty:"Herbal",kf:"Tanpa kafein",d:"Bunga chamomile utuh dengan sentuhan manis seperti madu dan apel. Lembut dan hangat untuk sore atau malam hari.",nt:[5,4,0,2],su:"95°C",wk:"5 sampai 7 menit",tk:"2 g per 200 ml"},
{n:"Lavender Earl Grey",lt:"Camellia sinensis · Lavandula angustifolia",ty:"Teh hitam",kf:"Sedang sampai tinggi",d:"Teh hitam berpadu bergamot dan kuncup lavender. Aromatik, elegan, dan pas untuk teman sore.",nt:[5,2,3,3],su:"95°C",wk:"3 sampai 4 menit",tk:"2 g per 200 ml"},
{n:"Oolong Susu",lt:"Camellia sinensis",ty:"Oolong",kf:"Sedang",d:"Oolong dengan karakter lembut seperti krim dan sedikit bunga. Halus di lidah dan manis di belakang.",nt:[3,3,0,4],su:"90°C",wk:"3 sampai 4 menit",tk:"2,5 g per 200 ml"},
{n:"Rooibos Jahe",lt:"Aspalathus linearis · Zingiber officinale",ty:"Herbal",kf:"Tanpa kafein",d:"Rooibos yang manis dan bersahaja, dengan hangat pedas jahe. Pas untuk hari hujan.",nt:[2,4,0,2],su:"100°C",wk:"5 sampai 7 menit",tk:"2 g per 200 ml"}];
const NT=["Aroma","Manis","Pahit","Segar"];
const BX=[{n:"Kotak November",tm:"Hangat di musim hujan",t:[5,2,3,4],d:"Teh-teh hangat yang pas ditemani hujan dan buku."},{n:"Kotak Oktober",tm:"Segar dan cerah",t:[0,1,4,3],d:"Pilihan segar untuk hari-hari yang masih terik."},{n:"Kotak September",tm:"Pagi yang ringan",t:[0,4,1,2],d:"Teh lembut untuk memulai hari dengan tenang."}];
/* beranda */
const T1=BX[0];$("bt2").textContent=T1.tm;$("bd2").textContent=T1.d+" Klik kotak untuk membukanya.";
replaceMarkup($("st"),`${T1.t.map((j,i)=>`<div class="cd" style="--i:${i}" data-j="${j}">${plant(TP[j],j)}<b>${TE[j].n}</b></div>`).join("")}<div class="bb"></div><div class="lid"></div>`);
ob.onclick=()=>{const o=st.classList.toggle("o");ob.textContent=o?"Tutup kotaknya":"Buka kotaknya"};st.onclick=e=>{const c=e.target.closest(".cd");if(c&&st.classList.contains("o"))location.hash="teh-"+(+c.dataset.j+1)};
replaceMarkup(hb,TE.map((t,i)=>`<button class="sp" data-i="${i}"><span class="no">No. 0${i+1}</span>${plant(TP[i],i)}<small>${t.lt.split(" · ")[0]}</small><h3>${t.n}</h3><p>${t.ty} · ${t.kf}</p></button>`).join("")),
hb.onclick=e=>{const b=e.target.closest(".sp");if(b)location.hash="teh-"+(+b.dataset.i+1)};
const PL=[["Cicip","3 teh · 20 g",99000,["Tiga teh pilihan setiap kotak","Cocok untuk mencoba","Kartu panduan seduh"]],["Rutin","5 teh · 30 g",165000,["Lima teh pilihan setiap kotak","Pilih preferensi kafein","Kartu panduan seduh"]],["Kolektor","8 teh · 30 g",275000,["Delapan teh pilihan setiap kotak","Teh edisi terbatas","Aksesori seduh sesekali"]]];
replaceMarkup(pl,PL.map((p,i)=>`<button class="pc${i===1?" f":""}" data-i="${i}"><h3>${p[0]}</h3><p>${p[1]} per kotak</p><div class="pr">${rp(p[2])}<small> / kotak (contoh)</small></div><ul>${p[3].map(x=>`<li>${x}</li>`).join("")}</ul></button>`).join("")),
pl.onclick=e=>{const b=e.target.closest(".pc");if(b){PB.p=+b.dataset.i;location.hash="langganan"}};
/* subhalaman */
const cr=(...a)=>`<div class="cr"><a href="#beranda">Beranda</a>${a.map(x=>" / "+x).join("")}</div>`;
function teh(i){const t=TE[i],nx=(i+1)%6,inB=BX.map((b,j)=>[b,j]).filter(([b])=>b.t.includes(i));
return `<div class="w sb">${cr("Herbarium",t.n)}<div class="th"><div class="pt">${plant(TP[i],i)}<div class="lb2"><span>Lembar No. 0${i+1}</span><span>${t.lt.split(" · ")[0]}</span></div></div><div><span class="lb">${t.ty}</span><h1>${t.n}</h1><div class="lt">${t.lt}</div><p>${t.d}</p><div class="nb">${NT.map((n,j)=>`<div><span>${n}</span><i>${[0,1,2,3,4].map(k=>`<b class="${k<t.nt[j]?"on":""}"></b>`).join("")}</i></div>`).join("")}</div><span class="tg">${t.ty}</span><span class="tg">Kafein: ${t.kf}</span>
<div class="bw"><div><small>Suhu air</small><b>${t.su}</b></div><div><small>Waktu</small><b>${t.wk.replace(" sampai ","–").replace(" menit","′")}</b></div><div><small>Takaran</small><b>${t.tk.split(" per ")[0]}</b></div></div><p style="font-size:14.5px"><b style="font-weight:500">Takaran:</b> ${t.tk}. Sesuaikan dengan selera. Periksa komposisi sebelum dikonsumsi bila Anda memiliki alergi.</p>
<p style="margin:20px 0 6px;font-size:15px">Ada di: ${inB.map(([b,j])=>`<a class="ul" href="#kotak-${j+1}" style="text-decoration:none">${b.n}</a>`).join(", ")||"edisi mendatang"}</p><div class="hc"><a class="bt" href="#langganan">Dapatkan lewat langganan</a></div></div></div><div class="pnv"><a class="ul" href="#beranda" style="text-decoration:none">← Beranda</a><a class="ul" href="#teh-${nx+1}" style="text-decoration:none">${TE[nx].n} →</a></div></div>`}
function kotak(i){const b=BX[i],nx=(i+1)%3;return `<div class="w sb">${cr("Kotak",b.n)}<div class="tt"><span class="lb">${b.n}</span><h1>${b.tm}</h1><p>${b.d}</p></div><div class="hb" style="grid-template-columns:repeat(4,1fr)">${b.t.map(j=>`<a class="sp" href="#teh-${j+1}" style="display:block">${plant(TP[j],j)}<small>${TE[j].ty}</small><h3 style="font-size:21px">${TE[j].n}</h3><p>Kafein: ${TE[j].kf}</p></a>`).join("")}</div><style>@media(max-width:900px){#v-sub .hb{grid-template-columns:1fr 1fr!important}}#kebun-menu-button{display:none;width:44px;height:44px;border:1px solid var(--ln);border-radius:50%;background:var(--wh);color:var(--dk);font-size:20px;cursor:pointer}#kebun-menu{position:fixed;inset:73px 0 0;z-index:55;background:var(--wh);padding:18px 28px;visibility:hidden;opacity:0;pointer-events:none;transform:translateY(-110%);transition:.35s}#kebun-menu.open{visibility:visible;opacity:1;pointer-events:auto;transform:none}#kebun-menu button{display:block;width:100%;padding:16px 0;border:0;border-bottom:1px solid var(--ln);background:none;text-align:left;font:italic 17px var(--b);color:var(--dk);cursor:pointer}@media(max-width:760px){header.n .w{grid-template-columns:1fr auto}header.n .nl{display:none!important}#kebun-menu-button{display:block}}</style><div class="hc" style="justify-content:center;margin-top:44px"><a class="bt" href="#langganan">Mulai berlangganan</a><a class="bt o" target="_blank" rel="noopener" href="${wl(`Halo ${BRAND}, saya ingin memesan ${b.n} (tema "${b.tm}") sebagai pembelian satuan. Mohon info ketersediaan.`)}">Tanya pembelian satuan</a></div><div class="pnv"><a class="ul" href="#beranda" style="text-decoration:none">← Beranda</a><a class="ul" href="#kotak-${nx+1}" style="text-decoration:none">${BX[nx].n} →</a></div></div>`}
let PB={p:1,f:0,c:0,k:[],m:0,gift:false};
const FQ=["Setiap bulan","Dua bulan sekali"],CM=[["Bulan ke bulan",0],["3 bulan",.05],["6 bulan",.08],["12 bulan",.12]],KF=["Campur","Rendah kafein","Tanpa kafein (herbal)"],TY=["Teh hijau","Teh hitam","Oolong","Herbal"];
function langganan(){return `<div class="w sb">${cr("Langganan")}<div class="tt"><span class="lb">Langganan</span><h1>Rancang kotak tehmu.</h1><p>Pilih paket, ritme, dan preferensi. Harga dan isi langsung terlihat.</p></div><div class="bk"><div class="fm"><label>Paket</label><div class="ch" id="lp">${PL.map((p,i)=>`<button data-i="${i}">${p[0]} · ${p[1].split(" · ")[0]}</button>`).join("")}</div><label>Pengiriman</label><div class="ch" id="lf">${FQ.map((x,i)=>`<button data-i="${i}">${x}</button>`).join("")}</div><label>Komitmen</label><div class="ch" id="lc">${CM.map((x,i)=>`<button data-i="${i}">${x[0]}${x[1]?" (hemat "+Math.round(x[1]*100)+"%)":""}</button>`).join("")}</div><label>Preferensi kafein</label><div class="ch" id="lk">${KF.map((x,i)=>`<button data-i="${i}">${x}</button>`).join("")}</div><label>Jenis favorit (boleh lebih dari satu)</label><div class="ch" id="lt">${TY.map((x,i)=>`<button data-i="${i}">${x}</button>`).join("")}</div><label for="ln">Nama</label><input type="text" id="ln" placeholder="Nama lengkap"><label for="la">Alamat pengiriman</label><textarea id="la" rows="2" placeholder="Alamat lengkap"></textarea><label for="lc2">Catatan alergi atau pantangan</label><input type="text" id="lc2" placeholder="Opsional, contoh: alergi bunga tertentu"></div><div class="sm" id="sm"></div></div></div>`}
function lcalc(){[["lp","p"],["lf","f"],["lc","c"],["lk","k2"]].forEach(([id,k])=>$(id).querySelectorAll("button").forEach(b=>b.setAttribute("aria-pressed",+b.dataset.i===(k==="k2"?PB.m:PB[k]))));$("lt").querySelectorAll("button").forEach(b=>b.setAttribute("aria-pressed",PB.k.includes(+b.dataset.i)));
const p=PL[PB.p],dc=CM[PB.c][1],per=p[2]*(1-dc),n=[3,5,8][PB.p],mo=[1,3,6,12][PB.c];
const pool=TE.filter(t=>(PB.m===0||(PB.m===1?t.kf!=="Sedang sampai tinggi":t.kf==="Tanpa kafein"))&&(!PB.k.length||PB.k.some(j=>[["Teh hijau"],["Teh hitam"],["Oolong"],["Herbal"]][j][0]===t.ty))),ex=(pool.length?pool:TE).slice(0,Math.min(n,6));
replaceMarkup($("sm"),`<span class="lb">Ringkasan langgananmu</span><h3>Paket ${p[0]}</h3><div class="pr">${rp(per)}</div><small>per kotak${dc?` · hemat ${Math.round(dc*100)}% (contoh)`:""} · ${FQ[PB.f].toLowerCase()}</small><small style="margin-top:6px">Komitmen ${CM[PB.c][0].toLowerCase()}${mo>1?`: sekitar ${rp(per*(PB.f?Math.ceil(mo/2):mo))} total`:""}</small><ul>${ex.map(t=>`<li>${t.n}<span>${t.ty}</span></li>`).join("")}${n>ex.length?`<li><span>dan ${n-ex.length} teh kejutan lainnya</span></li>`:""}</ul><small>Contoh isi, kotak sebenarnya mengikuti tema bulanan.</small><a class="bt" style="width:100%;justify-content:center;margin-top:18px" id="lw" href="#" target="_blank" rel="noopener">Daftar lewat WhatsApp</a><p style="text-align:center;margin-top:14px;font-size:14.5px"><a class="ul" href="#hadiah" style="text-decoration:none">Atau kirim sebagai hadiah</a></p><small style="margin-top:14px">Harga contoh. Ongkos kirim, ketentuan jeda dan pembatalan dikonfirmasi saat pendaftaran.</small>`);
$("lw").href=wl(`Halo ${BRAND}, saya ${$("ln").value||"calon pelanggan"} ingin berlangganan paket ${p[0]} (${p[1]}), pengiriman ${FQ[PB.f].toLowerCase()}, komitmen ${CM[PB.c][0].toLowerCase()}. Preferensi: ${KF[PB.m]}${PB.k.length?", favorit "+PB.k.map(j=>TY[j]).join(", "):""}. ${$("lc2").value?"Catatan alergi: "+$("lc2").value+". ":""}Estimasi ${rp(per)} per kotak. Alamat: ${$("la").value||"(belum diisi)"}.`)}
function lbind(){const t=(id,fn)=>$(id).onclick=e=>{const b=e.target.closest("button");if(b){fn(+b.dataset.i);lcalc()}};t("lp",i=>PB.p=i);t("lf",i=>PB.f=i);t("lc",i=>PB.c=i);t("lk",i=>PB.m=i);t("lt",i=>{const x=PB.k.indexOf(i);x<0?PB.k.push(i):PB.k.splice(x,1)});["ln","la","lc2"].forEach(i=>$(i).oninput=lcalc);lcalc()}
const GS=[["Sage","#9DB08A","#27321F"],["Krem","#F6F3EA","#3E5038"],["Mawar","#EBCFC4","#5B3A2C"]];let GF={s:0,p:1};
function hadiah(){return `<div class="w sb">${cr("Hadiah")}<div class="tt"><span class="lb">Beri hadiah</span><h1>Kirim kebun kecil untuk seseorang.</h1><p>Tulis pesanmu, pilih gaya kartu, dan lihat hasilnya langsung.</p></div><div class="bk"><div class="fm"><label for="gf">Dari</label><input type="text" id="gf" placeholder="Namamu"><label for="gt">Untuk</label><input type="text" id="gt" placeholder="Nama penerima"><label for="gm">Pesan (maksimal 140 karakter)</label><textarea id="gm" rows="3" maxlength="140" placeholder="Selamat ulang tahun. Semoga setiap bulan terasa tenang."></textarea><label>Gaya kartu</label><div class="ch" id="gs">${GS.map((g,i)=>`<button data-i="${i}">${g[0]}</button>`).join("")}</div><label>Paket</label><div class="ch" id="gp">${PL.map((p,i)=>`<button data-i="${i}">${p[0]}</button>`).join("")}</div><label for="gc">Lama hadiah</label><select id="gc"><option>Satu kotak</option><option>3 bulan</option><option>6 bulan</option><option>12 bulan</option></select><label for="ga">Alamat penerima (opsional, bisa menyusul)</label><textarea id="ga" rows="2"></textarea><a class="bt" id="gw" href="#" target="_blank" rel="noopener" style="margin-top:26px">Pesan hadiah lewat WhatsApp</a></div><div class="pnl"><div class="gc" id="gc2"></div><p style="text-align:center;margin-top:18px;color:var(--mu);font-size:14.5px" id="gh"></p></div></div></div>`}
function gcalc(){const g=GS[GF.s],p=PL[GF.p];$("gs").querySelectorAll("button").forEach(b=>b.setAttribute("aria-pressed",+b.dataset.i===GF.s));$("gp").querySelectorAll("button").forEach(b=>b.setAttribute("aria-pressed",+b.dataset.i===GF.p));
$("gc2").style.cssText=`background:${g[1]};color:${g[2]}`;replaceMarkup($("gc2"),`${plant("daisy",1).replace('<svg ','<svg style="position:absolute;right:-30px;top:-20px;width:70%;opacity:.9" ')}<b>Untuk ${$("gt").value||"kamu"}</b><p>${($("gm").value||"Semoga setiap bulan terasa tenang dan harum.").replace(/</g,"&lt;")}</p><small>Dari ${$("gf").value||"seseorang yang menyayangimu"} · Kebun Seduh</small>`);
$("gh").textContent=`Paket ${p[0]} · ${$("gc").value} · mulai ${rp(p[2])} per kotak (contoh)`;
$("gw").href=wl(`Halo ${BRAND}, saya ${$("gf").value||"pemesan"} ingin mengirim hadiah langganan teh untuk ${$("gt").value||"(nama penerima)"}. Paket ${p[0]}, lama ${$("gc").value}. Pesan kartu: "${$("gm").value||"-"}". Gaya kartu ${g[0]}. ${$("ga").value?"Alamat penerima: "+$("ga").value+".":"Alamat penerima menyusul."} Mohon konfirmasi.`)}
function gbind(){$("gs").onclick=e=>{const b=e.target.closest("button");if(b){GF.s=+b.dataset.i;gcalc()}};$("gp").onclick=e=>{const b=e.target.closest("button");if(b){GF.p=+b.dataset.i;gcalc()}};["gf","gt","gm","gc","ga"].forEach(i=>$(i).oninput=gcalc);gcalc()}
/* router */
let pend=null;
function route(){let h=location.hash.slice(1)||"beranda",m,html=null,t="Kebun Seduh – Langganan Teh Spesialti",af=null;
if(m=h.match(/^teh-(\d)$/)){if(TE[m[1]-1]){html=teh(m[1]-1);t=TE[m[1]-1].n}}
else if(m=h.match(/^kotak-(\d)$/)){if(BX[m[1]-1]){html=kotak(m[1]-1);t=BX[m[1]-1].n}}
else if(h==="langganan"){html=langganan();t="Langganan";af=lbind}else if(h==="hadiah"){html=hadiah();t="Beri hadiah";af=gbind}
const sub=$("v-sub");
if(html){replaceMarkup(sub,html);sub.classList.add("on");$("v-beranda").classList.remove("on");if(af)af();document.title=t+" – Kebun Seduh";window.scrollTo(0,0)}
else{sub.classList.remove("on");$("v-beranda").classList.add("on");document.title=t;if(pend){const el=$(pend);pend=null;setTimeout(()=>el&&el.scrollIntoView(),60)}else window.scrollTo(0,0)}}
addEventListener("hashchange",route);
document.querySelectorAll("[data-s]").forEach(b=>b.onclick=()=>{if($("v-beranda").classList.contains("on"))$(b.dataset.s).scrollIntoView();else{pend=b.dataset.s;location.hash="beranda"}});route();
/* chat */
const KB=[
[/kafein|herbal|tanpa kafein|malam|tidur/,()=>"Tersedia pilihan tanpa kafein (herbal seperti peppermint, chamomile, dan rooibos). Saat berlangganan, pilih preferensi kafeinmu dan kami menyesuaikan isi kotak.",["Mulai langganan","Lihat herbarium"]],
[/harga|berapa|biaya|paket/,()=>"Paket mulai Rp 99.000 per kotak (contoh): Cicip (3 teh), Rutin (5 teh), dan Kolektor (8 teh). Komitmen lebih lama bisa lebih hemat.",["Mulai langganan"]],
[/kirim|ongkir|kapan|tanggal|antar/,()=>"Kotak dikirim awal setiap bulan atau dua bulan sekali, sesuai pilihanmu. Ongkos kirim dan jadwal pasti dikonfirmasi saat pendaftaran.",["Mulai langganan"]],
[/jeda|pause|berhenti|batal|skip|cancel/,()=>"Langganan dapat dijeda atau dihentikan sesuai ketentuan yang dijelaskan saat pendaftaran. Hubungi kami lewat WhatsApp untuk mengaturnya.",["Lanjut ke WhatsApp"]],
[/hadiah|kado|gift/,()=>"Kamu bisa mengirim langganan sebagai hadiah lengkap dengan kartu pesan. Rancang kartunya di halaman Hadiah.",["Beri hadiah"]],
[/alergi|bahan|komposisi|vegan/,()=>"Tulis catatan alergi saat mendaftar, dan periksa komposisi tiap teh sebelum dikonsumsi. Untuk kondisi tertentu, konsultasikan dengan tenaga kesehatan.",["Lanjut ke WhatsApp"]],
[/seduh|suhu|menit|cara|takaran/,()=>"Setiap halaman teh di Herbarium memuat suhu, waktu, dan takaran seduh. Umumnya teh hijau 80°C, teh hitam dan herbal 95°C atau lebih.",["Lihat herbarium"]],
[/simpan|awet/,()=>"Simpan dalam wadah tertutup rapat, di tempat sejuk dan gelap, jauh dari bau tajam dan kelembapan.",["Lihat herbarium"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Halo, selamat datang di Kebun Seduh. Ada yang bisa dibantu?",["Mulai langganan","Beri hadiah","Lihat herbarium"]]];
const lg=[];function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;ms.append(d);ms.scrollTop=1e9;if(c==="u")lg.push(t)}
function chips(a){cs.replaceChildren();a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>{const go=h=>{cp.classList.remove("on");location.hash=h};if(v==="Mulai langganan")go("langganan");else if(v==="Beri hadiah")go("hadiah");else if(v==="Lihat herbarium"){cp.classList.remove("on");if($("v-beranda").classList.contains("on"))$("herbarium").scrollIntoView();else{pend="herbarium";location.hash="beranda"}}else ask(v)};cs.append(b)})}
function waU(){cw.href=wl(`Halo ${BRAND}, saya menghubungi dari website.`+(lg.length?` Pertanyaan saya: ${lg.join("; ")}.`:" Saya ingin bertanya."))}
function ask(t){say(t,"u");if(/whatsapp|\bwa\b|admin|manusia/i.test(t)){setTimeout(()=>{say("Baik, tekan tombol hijau di bawah. Pertanyaanmu ikut terkirim.","b");waU()},300);return}
const m=KB.find(([r])=>r.test(t.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab tim kami. Tekan WhatsApp di bawah, pertanyaanmu ikut terkirim.","b");chips(["Mulai langganan","Lihat herbarium"])}waU()},400)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let fi=true;fab.onclick=()=>{cp.classList.toggle("on");if(cp.classList.contains("on")&&fi){fi=false;say("Selamat datang di Kebun Seduh. Saya bisa membantu soal langganan, pilihan teh, dan hadiah.","b");chips(["Mulai langganan","Beri hadiah","Lihat herbarium"]);waU()}};x.onclick=()=>cp.classList.remove("on");
const kebunMenuButton=$("kebun-menu-button"),kebunMenu=$("kebun-menu");
function closeKebunMenu(){kebunMenu.classList.remove("open");kebunMenu.setAttribute("aria-hidden","true");kebunMenuButton.setAttribute("aria-expanded","false");kebunMenuButton.setAttribute("aria-label","Buka menu navigasi")}
function toggleKebunMenu(){const open=!kebunMenu.classList.contains("open");kebunMenu.classList.toggle("open",open);kebunMenu.setAttribute("aria-hidden",open?"false":"true");kebunMenuButton.setAttribute("aria-expanded",open?"true":"false");kebunMenuButton.setAttribute("aria-label",open?"Tutup menu navigasi":"Buka menu navigasi")}
kebunMenuButton.onclick=toggleKebunMenu;
kebunMenu.querySelectorAll("button[data-s]").forEach(button=>button.onclick=()=>{closeKebunMenu();if($("v-beranda").classList.contains("on"))$(button.dataset.s).scrollIntoView({behavior:"smooth"});else{pend=button.dataset.s;location.hash="beranda"}});
addEventListener("keydown",event=>{if(event.key==="Escape")closeKebunMenu()});
addEventListener("hashchange",()=>closeKebunMenu());
document.querySelectorAll("[data-hash]").forEach(button=>button.onclick=()=>{location.hash=button.dataset.hash});
</script>
</body>
</html>

@endverbatim
