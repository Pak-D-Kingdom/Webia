@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="color-scheme" content="dark">
<title>AURUM – Premium Auto Atelier</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Marcellus&family=Jost:wght@300;400;500&display=swap">
<style>
:root{--bg:#0A0A09;--s:#121210;--ink:#EDE6D6;--mute:#EDE6D694;--line:#C9A24B33;--gold:#C9A24B;--gl:#E8D199;--h:'Marcellus','Georgia',serif;--b:'Jost','Helvetica Neue',Arial,sans-serif;color-scheme:dark;box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
html{scroll-behavior:smooth;scroll-padding-top:20px}*{box-sizing:border-box;margin:0}
body{background:var(--bg);color:var(--ink);font:300 17px/1.75 var(--b);overflow-x:hidden}
a{color:inherit;text-decoration:none}button{font:inherit;color:inherit}
#rail{position:fixed;left:0;top:0;bottom:0;width:76px;border-right:1px solid var(--line);z-index:70;display:flex;flex-direction:column;align-items:center;justify-content:space-between;padding:26px 0;padding-top:calc(26px + env(safe-area-inset-top,0px));background:var(--bg)}
.mono{font:400 22px var(--h);border:1px solid var(--gold);width:42px;height:42px;display:grid;place-items:center;color:var(--gold)}
#rail nav{display:flex;flex-direction:column;gap:22px}
#rail nav a{position:relative;width:10px;height:10px;border:1px solid var(--mute);border-radius:50%;transition:.3s}
#rail nav a.on{background:var(--gold);border-color:var(--gold);transform:scale(1.35)}
#rail nav a::after{content:attr(data-l);position:absolute;left:28px;top:50%;transform:translateY(-50%);white-space:nowrap;font:400 11px var(--b);letter-spacing:.26em;text-transform:uppercase;background:var(--bg);padding:5px 12px;border:1px solid var(--line);opacity:0;pointer-events:none;transition:.3s}
#rail nav a:hover::after{opacity:1}
.vt{writing-mode:vertical-rl;transform:rotate(180deg);font:400 11px var(--b);letter-spacing:.36em;text-transform:uppercase;color:var(--gold);transition:color .3s}.vt:hover{color:var(--gl)}
#burger,#mm{display:none}
main{margin-left:76px}
.sec{padding:150px 6vw 40px;max-width:1240px;margin:auto;position:relative}
.lb{display:flex;align-items:center;gap:16px;font:400 11px var(--b);letter-spacing:.36em;text-transform:uppercase;color:var(--gold)}.lb::before{content:"";width:46px;height:1px;background:var(--gold)}
h1,h2{font:400 clamp(34px,6vw,88px)/1.04 var(--h);letter-spacing:-.01em}
h2{font-size:clamp(30px,4.6vw,64px);margin:22px 0 20px}
h1 em,h2 em{font-style:normal;color:var(--gold)}
.lead{max-width:52ch;color:var(--mute);font-size:18px}
.btn{display:inline-block;border:1px solid var(--gold);background:none;color:var(--gl);padding:15px 36px;font:400 11px var(--b);letter-spacing:.3em;text-transform:uppercase;cursor:pointer;transition:.4s;position:relative}
.btn:hover{background:var(--gold);color:#0A0A09}.btn.f{background:var(--gold);color:#0A0A09}.btn.f:hover{background:var(--gl)}
/* hero */
#beranda{min-height:100svh;display:flex;align-items:center;overflow:hidden;position:relative;max-width:none;padding:60px 6vw}
.hz{position:relative;z-index:2;max-width:640px}
.hz h1{margin:26px 0 26px}.hz p{max-width:44ch;color:var(--mute);font-size:18px}.hz .btn{margin:36px 18px 0 0}
.whl{position:absolute;right:-14vw;top:50%;width:min(66vw,820px);margin-top:calc(min(66vw,820px)/-2);z-index:1;opacity:.95;pointer-events:none}
.whl svg{width:100%;display:block}
.sc{position:absolute;bottom:26px;left:6vw;font:400 10px var(--b);letter-spacing:.34em;text-transform:uppercase;color:var(--mute);display:flex;align-items:center;gap:14px;z-index:2}.sc::after{content:"";width:60px;height:1px;background:var(--gold);transform-origin:left;animation:ln 2.6s ease-in-out infinite}
@keyframes ln{50%{transform:scaleX(.2)}}
/* koleksi */
.pk{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:1px;background:var(--line);border:1px solid var(--line);margin-top:56px}
.pc{background:var(--bg);padding:44px 30px 34px;display:flex;flex-direction:column;transition:background .5s;cursor:pointer;position:relative}
.pc:hover,.pc.on{background:var(--s)}.pc.on::before{content:"Pilihanmu";position:absolute;top:14px;right:16px;font:400 10px var(--b);letter-spacing:.26em;text-transform:uppercase;color:var(--gold)}
.pc b{font:400 14px var(--h);color:var(--gold);letter-spacing:.2em}
.pc h3{font:400 28px/1.15 var(--h);margin:16px 0 10px}.pc p{color:var(--mute);font-size:15px;flex:1}
.pc .pr{font:400 26px var(--h);color:var(--gl);margin-top:26px;border-top:1px solid var(--line);padding-top:18px}.pc small{display:block;color:var(--mute);font-size:12px;letter-spacing:.16em;text-transform:uppercase}
/* cek cat */
.chk{display:grid;grid-template-columns:1.2fr .8fr;gap:5vw;margin-top:50px;align-items:start}
.qs{border-top:1px solid var(--line)}
.q{padding:28px 0;border-bottom:1px solid var(--line)}.q h3{font:400 20px var(--h)}.q h3 span{color:var(--gold);margin-right:12px}
.op{display:flex;flex-wrap:wrap;gap:10px;margin-top:16px}
.op button{background:none;border:1px solid var(--line);padding:9px 20px;font:300 14px var(--b);cursor:pointer;transition:.3s}.op button:hover{border-color:var(--gold)}.op button.on{background:var(--gold);color:#0A0A09;border-color:var(--gold)}
.res{border:1px solid var(--gold);padding:38px 30px;text-align:center;position:sticky;top:30px;background:linear-gradient(170deg,#16140e,var(--bg))}
.ring{position:relative;width:170px;margin:0 auto 18px}.ring svg{width:100%;transform:rotate(-90deg)}
.ring b{position:absolute;inset:0;display:grid;place-items:center;font:400 44px var(--h);color:var(--gl)}
.res h3{font:400 24px var(--h)}.res p{color:var(--mute);font-size:15px;margin:10px 0 22px}
/* kalender */
.bk{display:grid;grid-template-columns:1fr 1fr;gap:6vw;margin-top:50px}
.cal{border:1px solid var(--line);padding:26px}
.ch{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}.ch b{font:400 22px var(--h)}.ch button{background:none;border:1px solid var(--line);width:36px;height:36px;cursor:pointer;color:var(--gold)}.ch button:hover{border-color:var(--gold)}
.cg{display:grid;grid-template-columns:repeat(7,1fr);gap:4px;text-align:center}
.cg i{font:400 10px var(--b);letter-spacing:.2em;color:var(--mute);font-style:normal;padding:6px 0;text-transform:uppercase}
.dy{aspect-ratio:1;border:0;background:none;cursor:pointer;position:relative;font:300 15px var(--b);transition:.25s}
.dy:not(:disabled):hover{background:#C9A24B22}
.dy.a::after{content:"";position:absolute;bottom:6px;left:50%;width:4px;height:4px;margin-left:-2px;border-radius:50%;background:var(--gold)}
.dy:disabled{color:#EDE6D640;cursor:not-allowed}.dy.fl{text-decoration:line-through}
.dy.sel{background:var(--gold);color:#0A0A09}.dy.sel::after{background:#0A0A09}
.lg{margin-top:14px;font-size:12px;color:var(--mute);letter-spacing:.1em}.lg span{color:var(--gold)}
.hrs{display:flex;gap:8px;flex-wrap:wrap;margin:18px 0}.hrs button{background:none;border:1px solid var(--line);padding:8px 16px;font:300 14px var(--b);cursor:pointer}.hrs button.on{border-color:var(--gold);color:var(--gl)}
.form{display:grid;gap:22px}.form label{font:400 10px var(--b);letter-spacing:.3em;text-transform:uppercase;color:var(--gold)}
.form input,.form select{width:100%;margin-top:6px;border:0;border-bottom:1px solid var(--line);background:transparent;padding:10px 0;font:300 17px var(--b);color:var(--ink);border-radius:0}.form input:focus,.form select:focus{outline:0;border-color:var(--gold)}
.form select option{background:#121210;color:#EDE6D6}
.sel-d{font:400 22px var(--h);color:var(--gl);min-height:34px}
/* proses */
.tl{list-style:none;padding:0;display:grid;grid-template-columns:repeat(5,1fr);gap:20px;margin-top:70px;position:relative}
.tl::before{content:"";position:absolute;top:7px;left:0;right:0;height:1px;background:var(--line)}
.tl li{position:relative;padding-top:38px;opacity:.35;transition:opacity .9s}.tl li.in{opacity:1}
.tl li::before{content:"";position:absolute;top:0;left:0;width:15px;height:15px;border:1px solid var(--gold);background:var(--bg);transform:rotate(45deg);transition:background .9s}.tl li.in::before{background:var(--gold)}
.tl h3{font:400 20px var(--h)}.tl p{color:var(--mute);font-size:14.5px;margin-top:8px}
.nm{display:flex;flex-wrap:wrap;gap:1px;background:var(--line);border:1px solid var(--line);margin-top:80px}.nm div{flex:1 1 180px;background:var(--bg);padding:30px 26px}.nm b{display:block;font:400 42px/1 var(--h);color:var(--gl)}.nm span{font-size:11px;letter-spacing:.24em;text-transform:uppercase;color:var(--mute)}
footer{margin:100px 0 0;padding:34px 6vw 110px;border-top:1px solid var(--line);display:flex;justify-content:space-between;gap:20px;flex-wrap:wrap;font-size:12px;letter-spacing:.14em;color:var(--mute)}
#bot{position:fixed;right:16px;bottom:calc(16px + env(safe-area-inset-bottom,0px));z-index:100}
#fab{width:62px;height:62px;border-radius:50%;border:1px solid var(--gold);background:#0A0A09;color:var(--gold);cursor:pointer;font:400 24px var(--h);transition:.4s;box-shadow:0 12px 30px #000}#fab:hover{background:var(--gold);color:#0A0A09}
#box{display:none;position:absolute;right:0;bottom:78px;width:min(380px,calc(100vw - 32px));height:min(540px,72vh);background:var(--s);border:1px solid var(--gold);flex-direction:column;overflow:hidden;box-shadow:0 30px 80px #000}
#box.on{display:flex}
.hh{padding:16px 22px;border-bottom:1px solid var(--line);display:flex;justify-content:space-between;align-items:center}.hh b{font:400 18px var(--h);letter-spacing:.06em}.hh a{font:400 10px var(--b);letter-spacing:.24em;text-transform:uppercase;color:var(--gold);border-bottom:1px solid var(--gold)}
#log{flex:1;overflow:auto;padding:18px 22px;display:flex;flex-direction:column;gap:12px}
.m{max-width:90%;font-size:15px;line-height:1.6;white-space:pre-line;color:var(--mute);border-left:1px solid var(--gold);padding-left:14px}
.m.u{align-self:flex-end;border:0;background:var(--gold);color:#0A0A09;padding:8px 16px}
.qc{display:flex;flex-wrap:wrap;gap:6px;padding:0 22px 12px}.qc button{border:1px solid var(--line);background:none;padding:4px 12px;font:400 10px var(--b);letter-spacing:.16em;text-transform:uppercase;cursor:pointer}.qc button:hover{border-color:var(--gold);color:var(--gl)}
#f{display:flex;border-top:1px solid var(--line)}#f input{flex:1;min-width:0;border:0;background:none;color:var(--ink);padding:16px 22px;font:300 16px var(--b)}#f input:focus{outline:0}#f button{border:0;background:none;color:var(--gold);padding:0 22px;font:400 11px var(--b);letter-spacing:.24em;text-transform:uppercase;cursor:pointer}
:focus-visible{outline:1px solid var(--gl);outline-offset:3px}
@media(max-width:860px){main{margin-left:0;padding-top:calc(58px + env(safe-area-inset-top,0px))}#rail{right:0;width:auto;bottom:auto;flex-direction:row;height:calc(58px + env(safe-area-inset-top,0px));border-right:0;border-bottom:1px solid var(--line);padding:0 4vw;padding-top:env(safe-area-inset-top,0px)}#rail nav,.vt{display:none}.mono{width:36px;height:36px;font-size:18px}#burger{display:block;background:none;border:1px solid var(--line);padding:6px 16px;font:400 11px var(--b);letter-spacing:.24em;cursor:pointer}
#mm{position:fixed;left:0;right:0;top:calc(58px + env(safe-area-inset-top,0px));bottom:0;height:calc(100dvh - 58px - env(safe-area-inset-top,0px));z-index:65;background:var(--bg);flex-direction:column;padding:24px 8vw;overflow-y:auto;display:flex;transform:translateY(-110%);visibility:hidden;opacity:0;pointer-events:none;transition:transform .5s cubic-bezier(.7,0,.2,1),visibility .5s,opacity .2s}#mm.open{transform:none;visibility:visible;opacity:1;pointer-events:auto}#mm a{font:400 30px/1 var(--h);padding:18px 0;border-bottom:1px solid var(--line)}
.sec{padding-top:100px}#beranda{padding-top:40px}.whl{right:-40vw;width:110vw;margin-top:-55vw;opacity:.3}.chk,.bk{grid-template-columns:1fr}.res{position:static}.tl{grid-template-columns:1fr}.tl::before{display:none}}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}
</style>
</head>
<body>
<aside id="rail"><a class="mono" href="#beranda" aria-label="AURUM">A</a>
  <nav id="rn"><a href="#beranda" data-l="Beranda" aria-label="Beranda"></a><a href="#koleksi" data-l="Koleksi" aria-label="Koleksi"></a><a href="#cek" data-l="Cek Cat" aria-label="Cek Cat"></a><a href="#jadwal" data-l="Jadwal" aria-label="Jadwal"></a><a href="#proses" data-l="Proses" aria-label="Proses"></a></nav>
  <a class="vt" href="#jadwal">Reservasi</a><button id="burger" aria-expanded="false" aria-controls="mm">MENU</button></aside>
<div id="mm" aria-label="Menu utama" aria-hidden="true"><a href="#beranda">Beranda</a><a href="#koleksi">Koleksi</a><a href="#cek">Cek Cat</a><a href="#jadwal">Jadwal</a><a href="#proses">Proses</a></div>

<main>
<section id="beranda"><div class="whl" aria-hidden="true"><svg id="wh" viewBox="0 0 400 400" fill="none" stroke="#C9A24B" stroke-width=".8"><circle cx="200" cy="200" r="196"/><circle cx="200" cy="200" r="186" stroke-width="2.4"/><circle cx="200" cy="200" r="168"/><circle cx="200" cy="200" r="110" opacity=".6"/><circle cx="200" cy="200" r="52" stroke-width="1.6"/><circle cx="200" cy="200" r="12" fill="#C9A24B"/><g id="sp"></g><g id="lg"></g></svg></div>
  <div class="hz"><span class="lb">Premium auto atelier · Surabaya</span><h1>Kesempurnaan, <em>diam-diam.</em></h1>
    <p>Tanpa gembar-gembor. Kami merawat cat, kaca, dan interior mobilmu sampai setiap permukaan terasa seperti baru dikeluarkan dari pabrik, lalu menjaganya tetap begitu.</p>
    <a class="btn f" href="#jadwal">Pilih tanggal</a><a class="btn" href="#cek">Cek kondisi cat</a></div>
  <div class="sc">Gulir, roda berputar</div></section>

<section class="sec" id="koleksi"><span class="lb">Koleksi</span><h2>Empat cara <em>merawat.</em></h2><p class="lead">Setiap paket dikerjakan satu teknisi utama dan didokumentasikan dengan foto sebelum dan sesudah.</p><div class="pk" id="pk"></div></section>

<section class="sec" id="cek"><span class="lb">Cek kesehatan cat</span><h2>Tiga pertanyaan, <em>satu rekomendasi.</em></h2>
  <div class="chk"><div class="qs" id="qs"></div>
  <div class="res" aria-live="polite"><div class="ring"><svg viewBox="0 0 120 120"><circle cx="60" cy="60" r="52" fill="none" stroke="#C9A24B33" stroke-width="3"/><circle id="rc" cx="60" cy="60" r="52" fill="none" stroke="#C9A24B" stroke-width="3" stroke-linecap="round" stroke-dasharray="326.7" stroke-dashoffset="326.7" style="transition:stroke-dashoffset 1.2s cubic-bezier(.2,.8,.2,1)"/></svg><b id="rs">—</b></div><h3 id="rt">Jawab ketiga pertanyaan</h3><p id="rd">Skor kesehatan cat dan paket yang paling sesuai akan muncul di sini.</p><button class="btn f" id="rb" style="display:none">Pakai rekomendasi ini</button></div></div></section>

<section class="sec" id="jadwal"><span class="lb">Jadwal &amp; reservasi</span><h2>Pilih hari <em>yang tersedia.</em></h2><p class="lead">Titik emas menandakan hari yang masih memiliki slot. Studio tutup setiap hari Minggu.</p>
  <div class="bk"><div class="cal"><div class="ch"><button id="pv" aria-label="Bulan sebelumnya">‹</button><b id="cm"></b><button id="nx" aria-label="Bulan berikutnya">›</button></div><div class="cg" id="cg"></div><div class="lg"><span>●</span> tersedia &nbsp; <s>penuh</s></div></div>
  <div class="form"><div><label>Tanggal terpilih</label><div class="sel-d" id="sd">Belum dipilih</div><div class="hrs" id="hrs"></div></div>
    <label>Paket<select id="sv"></select></label><label>Mobil<input id="mk" placeholder="Contoh: Lexus LX 570 2020"></label><label>Nama<input id="nm" placeholder="Nama lengkap"></label><div><button class="btn f" id="go">Kirim ke WhatsApp</button></div></div></div></section>

<section class="sec" id="proses"><span class="lb">Proses</span><h2>Lima langkah, <em>tanpa jalan pintas.</em></h2>
  <ol class="tl" id="tl"><li><h3>Inspeksi</h3><p>Foto dan catat kondisi 40 titik sebelum menyentuh mobil.</p></li><li><h3>Dekontaminasi</h3><p>Busa pH netral, iron remover, dan clay bar.</p></li><li><h3>Koreksi</h3><p>Poles bertahap dengan pengukur ketebalan cat.</p></li><li><h3>Proteksi</h3><p>Ceramic coating di ruang bebas debu.</p></li><li><h3>Serah terima</h3><p>Pemeriksaan di bawah lampu studio dan panduan perawatan.</p></li></ol>
  <div class="nm"><div><b>9</b><span>Tahun berkarya</span></div><div><b>1.200+</b><span>Mobil dirawat</span></div><div><b>5 th</b><span>Garansi coating</span></div><div><b>1:1</b><span>Teknisi per mobil</span></div></div></section>
</main>
<footer><span>© 2026 AURUM Auto Atelier · Surabaya · Senin–Sabtu 09.00–17.00 · @aurum.atelier</span><span>Ganti nomor WA dan harga di bagian CONFIG pada kode.</span></footer>

<div id="bot"><div id="box" role="dialog" aria-label="Chat Concierge Aurum"><div class="hh"><b>Concierge Aurum</b><a href="#" id="toWA">Lanjut ke WA</a></div><div id="log"></div><div class="qc" id="chips"></div>
  <form id="f"><input id="in" placeholder="Tanya, atau ketik “jadwal kosong”" autocomplete="off" aria-label="Pesan"><button>Kirim</button></form></div><button id="fab" aria-label="Buka chat">A</button></div>

<script>
/* ===== CONFIG ===== */
const WA="6281234567890"; // format 62..., tanpa + atau 0
const P=[
 {id:"signature",n:"Signature Care",p:950000,t:"6 jam",d:"Cuci presisi, dekontaminasi, interior bersih, dan sealant 6 bulan."},
 {id:"gold",n:"Gold Enhancement",p:3800000,t:"2 hari",d:"Poles satu tahap dan ceramic coating 9H dengan garansi 5 tahun."},
 {id:"grand",n:"Grand Restoration",p:9500000,t:"4 hari",d:"Koreksi cat multi-tahap, ceramic coating, dan PPF area depan."},
 {id:"interior",n:"Interior Atelier",p:1800000,t:"1 hari",d:"Steam, perawatan kulit, dan pemurnian kabin dari bau."}];
const Q=[["Berapa usia mobilmu?",["Kurang dari 1 tahun","1–3 tahun","3–6 tahun","Lebih dari 6 tahun"]],["Bagaimana kondisi catnya?",["Mulus","Swirl halus","Kusam dan goresan","Oksidasi atau baret dalam"]],["Di mana mobil biasa diparkir?",["Garasi tertutup","Carport","Outdoor","Outdoor, sering cuci otomatis"]]];
const HR=["09.00","11.00","13.00","15.00"],MN=["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
const rp=n=>"Rp"+n.toLocaleString("id-ID"),$=s=>document.querySelector(s);
const replaceChildren=(el,...nodes)=>{el.replaceChildren(...nodes)};
const element=(tag,className,text)=>{const node=document.createElement(tag);if(className)node.className=className;if(text!==undefined)node.textContent=text;return node};
const svgElement=(tag,attrs={})=>{const node=document.createElementNS("http://www.w3.org/2000/svg",tag);Object.entries(attrs).forEach(([key,value])=>node.setAttribute(key,value));return node};
const wa=t=>"https://wa.me/"+WA+"?text="+encodeURIComponent(t);
/* navigasi */
$("#burger").onclick=()=>{const menu=$("#mm"),open=menu.classList.toggle("open");$("#burger").setAttribute("aria-expanded",String(open));menu.setAttribute("aria-hidden",String(!open))};
$("#mm").onclick=e=>{if(e.target.closest("a")&&innerWidth<=860){$("#mm").classList.remove("open");$("#mm").setAttribute("aria-hidden","true");$("#burger").setAttribute("aria-expanded","false")}};
addEventListener("keydown",e=>{if(e.key==="Escape"){$("#mm").classList.remove("open");$("#mm").setAttribute("aria-hidden","true");$("#burger").setAttribute("aria-expanded","false")}});
const secs=document.querySelectorAll("section"),dots=[...document.querySelectorAll("#rn a")];
const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)dots.forEach(a=>a.classList.toggle("on",a.getAttribute("href")=="#"+e.target.id))}),{rootMargin:"-45% 0px -50% 0px"});secs.forEach(s=>io.observe(s));
/* roda */
replaceChildren($("#sp"),...Array.from({length:10},(_,i)=>{const a=i*36*Math.PI/180,p=(r,o)=>[(200+r*Math.cos(a+o)).toFixed(1),(200+r*Math.sin(a+o)).toFixed(1)];const A=p(54,-.09),B=p(166,-.05),C=p(166,.05),D=p(54,.09);return svgElement("path",{d:`M${A} L${B} L${C} L${D}Z`})}));
replaceChildren($("#lg"),...Array.from({length:5},(_,i)=>{const a=(i*72-90)*Math.PI/180;return svgElement("circle",{cx:(200+30*Math.cos(a)).toFixed(1),cy:(200+30*Math.sin(a)).toFixed(1),r:"4.5"})}));
addEventListener("scroll",()=>{$("#wh").style.transform=`rotate(${scrollY*.18}deg)`},{passive:true});
/* koleksi */
let sel="gold";
replaceChildren($("#pk"),...P.map((p,i)=>{const card=element("article","pc");card.dataset.s=p.id;card.append(element("b","",["I","II","III","IV"][i]),element("h3","",p.n),element("p","",p.d));const price=element("div","pr",rp(p.p));price.append(element("small","",`Estimasi ${p.t}`));card.append(price);return card}));
replaceChildren($("#sv"),...P.map(p=>{const option=element("option","",p.n);option.value=p.id;return option}));
function pick(id){sel=id;$("#sv").value=id;document.querySelectorAll(".pc").forEach(c=>c.classList.toggle("on",c.dataset.s==id))}
$("#pk").onclick=e=>{const c=e.target.closest(".pc");if(c){pick(c.dataset.s);$("#jadwal").scrollIntoView({behavior:"smooth"})}};
$("#sv").onchange=e=>pick(e.target.value);pick("gold");
/* cek cat */
const ans=[null,null,null];
replaceChildren($("#qs"),...Q.map((q,i)=>{const wrapper=element("div","q"),heading=element("h3","");heading.append(element("span","",`0${i+1}`),document.createTextNode(q[0]));const options=element("div","op");options.dataset.q=String(i);options.append(...q[1].map((label,k)=>{const button=element("button","",label);button.dataset.k=String(k);return button}));wrapper.append(heading,options);return wrapper}));
let rec="gold";
function result(){if(ans.includes(null))return;const sc=ans.reduce((a,b)=>a+b,0),h=Math.round(100-sc*9);rec=sc<=2?"signature":sc<=5?"gold":"grand";const p=P.find(x=>x.id==rec);
 $("#rc").style.strokeDashoffset=326.7*(1-h/100);$("#rs").textContent=h;$("#rt").textContent="Rekomendasi: "+p.n;
 $("#rd").textContent=sc<=2?"Cat kamu masih sehat. Perawatan rutin dan sealant cukup untuk menjaganya.":sc<=5?"Ada swirl dan paparan ringan. Poles satu tahap dan ceramic coating akan memulihkan kilau dan melindunginya.":"Cat membutuhkan pemulihan menyeluruh agar tetap terlindungi dalam jangka panjang.";$("#rb").style.display="inline-block"}
$("#qs").onclick=e=>{const b=e.target.closest("button");if(!b)return;const g=b.parentNode,i=+g.dataset.q;ans[i]=+b.dataset.k;g.querySelectorAll("button").forEach(x=>x.classList.toggle("on",x==b));result()};
$("#rb").onclick=()=>{pick(rec);$("#jadwal").scrollIntoView({behavior:"smooth"})};
/* kalender */
const today=new Date();today.setHours(0,0,0,0);let cy=today.getFullYear(),cm=today.getMonth(),chosen=null,hour=HR[1];
const ok=d=>d>=today&&d.getDay()!=0,free=d=>ok(d)&&(d.getDate()*7+d.getMonth()*3)%5!=0;
const fmt=d=>d.toLocaleDateString("id-ID",{weekday:"long",day:"numeric",month:"long",year:"numeric"});
function cal(){ $("#cm").textContent=MN[cm]+" "+cy;const f=(new Date(cy,cm,1).getDay()+6)%7,n=new Date(cy,cm+1,0).getDate(),nodes=[];
 ["Sen","Sel","Rab","Kam","Jum","Sab","Min"].forEach(label=>nodes.push(element("i","",label)));
 for(let i=0;i<f;i++)nodes.push(document.createElement("span"));
 for(let i=1;i<=n;i++){const d=new Date(cy,cm,i),fr=free(d),isel=chosen&&+chosen==+d,button=element("button","dy",String(i));button.classList.toggle("a",fr);button.classList.toggle("fl",ok(d)&&!fr);button.classList.toggle("sel",Boolean(isel));button.dataset.d=String(i);button.disabled=!fr;nodes.push(button)}
 replaceChildren($("#cg"),...nodes);$("#pv").disabled=cy==today.getFullYear()&&cm==today.getMonth()}
$("#pv").onclick=()=>{cm--;if(cm<0){cm=11;cy--}cal()};$("#nx").onclick=()=>{cm++;if(cm>11){cm=0;cy++}cal()};
function setD(d){chosen=d;cy=d.getFullYear();cm=d.getMonth();$("#sd").textContent=fmt(d)+" · "+hour;cal()}
$("#cg").onclick=e=>{const b=e.target.closest(".dy");if(b&&!b.disabled)setD(new Date(cy,cm,+b.dataset.d))};
replaceChildren($("#hrs"),...HR.map(h=>{const button=element("button",h==hour?"on":"",h);return button}));
$("#hrs").onclick=e=>{const b=e.target.closest("button");if(!b)return;hour=b.textContent;document.querySelectorAll("#hrs button").forEach(x=>x.classList.toggle("on",x==b));if(chosen)$("#sd").textContent=fmt(chosen)+" · "+hour};
cal();
const nextFree=n=>{const o=[],d=new Date(today);while(o.length<n){if(free(d))o.push(new Date(d));d.setDate(d.getDate()+1)}return o};
$("#go").onclick=()=>{if(!chosen){$("#sd").textContent="Pilih tanggal dulu di kalender ✦";return}const p=P.find(x=>x.id==sel);window.open(wa("Halo AURUM, saya ingin reservasi.\nPaket: "+p.n+" ("+rp(p.p)+")\nTanggal: "+fmt(chosen)+", pukul "+hour+"\nMobil: "+($("#mk").value||"-")+"\nNama: "+($("#nm").value||"-")+"\nMohon konfirmasi ketersediaan slot."),"_blank","noopener,noreferrer")};/* timeline */
const io2=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)e.target.classList.add("in")}),{threshold:.6});document.querySelectorAll("#tl li").forEach((l,i)=>{l.style.transitionDelay=i*.15+"s";io2.observe(l)});
/* ===== Chatbot ===== */
const box=$("#box"),log=$("#log"),inp=$("#in"),hist=[];let hi=false;
const KB=[
 [/harga|biaya|tarif|berapa|paket|koleksi/,()=>"Koleksi kami:\n"+P.map(x=>"• "+x.n+" "+rp(x.p)+" ("+x.t+")").join("\n")+"\nKetik “pilih gold” untuk memilihnya."],
 [/jadwal|kosong|tersedia|slot|kapan/,()=>"Tanggal terdekat yang tersedia:\n"+nextFree(4).map(d=>"• "+fmt(d)).join("\n")+"\nKetik “pilih tanggal 12” untuk memilih tanggal di bulan yang sedang tampil."],
 [/cek|cat|kondisi|kesehatan|rekomendasi/,()=>{$("#cek").scrollIntoView({behavior:"smooth"});return"Kubuka bagian Cek Cat. Jawab tiga pertanyaan dan kamu akan mendapat skor beserta rekomendasi paket."}],
 [/garansi|tahan|awet|coating/,()=>"Ceramic coating bergaransi 5 tahun dengan maintenance wash berkala. Detail garansi diberikan tertulis saat serah terima."],
 [/lama|durasi|hari|selesai/,()=>P.map(x=>x.n+": "+x.t).join("\n")],
 [/antar|jemput|area|alamat|lokasi/,()=>"Studio di Surabaya. Antar-jemput tersedia untuk area Surabaya dan Sidoarjo, biaya sesuai jarak."],
 [/proses|tahap|cara kerja/,()=>{$("#proses").scrollIntoView({behavior:"smooth"});return"Kubuka bagian Proses: lima langkah dari inspeksi sampai serah terima."}],
 [/dp|bayar|reservasi|booking/,()=>"Reservasi dengan DP 30%, pelunasan saat serah terima. Pilih tanggal di kalender lalu kirim lewat WhatsApp."],
 [/halo|hai|hi\b|pagi|siang|malam/,()=>"Selamat datang di AURUM. Ada yang bisa saya bantu?"]
];
function add(t,u){const d=document.createElement("div");d.className="m"+(u?" u":"");d.textContent=t;log.appendChild(d);log.scrollTop=log.scrollHeight}
function ask(t){if(!t.trim())return;add(t,1);hist.push("Saya: "+t);const l=t.toLowerCase();let a;
 const it=P.find(x=>l.includes(x.id)||l.includes(x.n.split(" ")[0].toLowerCase())),dm=l.match(/tanggal\s*(\d{1,2})/);
 if(dm&&/pilih|mau|ingin|booking/.test(l)){const d=new Date(cy,cm,+dm[1]);if(+dm[1]>=1&&+dm[1]<=new Date(cy,cm+1,0).getDate()&&free(d)){setD(d);$("#jadwal").scrollIntoView({behavior:"smooth"});a=fmt(d)+" kupilih. Lengkapi nama dan mobil, lalu kirim lewat WhatsApp."}else a="Tanggal itu penuh, tutup, atau sudah lewat. Ketik “jadwal kosong” untuk melihat tanggal terdekat."}
 else if(it&&/pilih|mau|ingin|booking|pesan/.test(l)){pick(it.id);$("#jadwal").scrollIntoView({behavior:"smooth"});a=it.n+" kupilih. Silakan tentukan tanggal di kalender."}
 else if(it)a=it.n+" ("+it.t+"): "+it.d+" "+rp(it.p)+"."
 else{const k=KB.find(([r])=>r.test(l));a=k?k[1]():"Pertanyaan itu paling pas dijawab tim kami langsung. Tekan “Lanjut ke WA” di atas."}
 setTimeout(()=>{add(a);hist.push("Concierge: "+a)},450)}
$("#fab").onclick=()=>{if(box.classList.toggle("on")&&!hi){hi=true;add("Selamat datang di AURUM. Saya dapat menjelaskan paket, mengecek tanggal yang tersedia, atau membantu reservasi.");replaceChildren($("#chips"),...["Lihat paket","Jadwal kosong","Cek cat","Garansi"].map(c=>{const button=element("button","",c);button.type="button";return button}))}};
$("#chips").onclick=e=>{if(e.target.tagName=="BUTTON")ask(e.target.textContent)};
$("#f").onsubmit=e=>{e.preventDefault();ask(inp.value);inp.value=""};
$("#toWA").onclick=e=>{e.preventDefault();window.open(wa("Halo AURUM, saya lanjut dari chat website:\n"+(hist.slice(-6).join("\n")||"Saya ingin konsultasi.")+"\nPaket terpilih: "+P.find(x=>x.id==sel).n+(chosen?"\nTanggal: "+fmt(chosen)+", "+hour:"")),"_blank","noopener,noreferrer")};
</script>
</body>
</html>

@endverbatim
