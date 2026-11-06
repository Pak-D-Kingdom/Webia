@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>ATELIER KULIT – Klinik Estetika sebagai Karya</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;800&family=Fraunces:ital,opsz,wght@0,9..144,300;1,9..144,300;1,9..144,500&display=swap" rel="stylesheet">
<style>
:root{--bone:#EFEBE3;--ink:#0E0E0E;--lime:#C6FF2D;--gr:#8B887F;
--d:'Syne',system-ui,sans-serif;--s:'Fraunces',Georgia,serif;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth}
body{margin:0;background:var(--bone);color:var(--ink);font:400 17px/1.65 var(--d);overflow-x:hidden}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
em{font:italic 300 1em var(--s)}
::selection{background:var(--lime)}
.top{position:fixed;top:env(safe-area-inset-top,0px);left:0;right:0;z-index:60;display:flex;justify-content:space-between;padding:22px 3.5vw;color:#fff;mix-blend-mode:difference;font:600 14px var(--d);letter-spacing:.06em;text-transform:uppercase;pointer-events:none}
.top a{pointer-events:auto}
.top nav{display:flex;gap:26px}
.top nav a:hover{text-decoration:line-through}
@media(max-width:700px){.top nav a:not(:last-child){display:none}}
#cur{position:fixed;left:0;top:0;width:18px;height:18px;border-radius:50%;background:var(--lime);mix-blend-mode:difference;pointer-events:none;z-index:99;transition:width .25s,height .25s,margin .25s;display:none}
@media(pointer:fine){#cur{display:block}}
#cur.big{width:70px;height:70px;margin:-26px 0 0 -26px}
/* hero */
.hero{min-height:100vh;position:relative;padding:0 3.5vw 5vh;display:flex;flex-direction:column;justify-content:flex-end;overflow:hidden}
.hero h1{position:relative;z-index:3;color:#fff;mix-blend-mode:difference;font:800 clamp(84px,21vw,330px)/.8 var(--d);letter-spacing:-.06em;text-transform:uppercase}
.hero h1 span{display:block}
.hero h1 .as{font:italic 300 .2em/1 var(--s);text-transform:none;letter-spacing:0;margin:.4em 0 .5em 1.2em}
.hero h1 .ar{text-align:right}
.art{position:absolute;right:4vw;top:9vh;width:min(46vw,560px);z-index:1}
.art svg{width:100%;display:block;overflow:visible}
.art g{transition:transform .5s cubic-bezier(.2,.8,.2,1)}
.side{position:absolute;left:3.5vw;top:50%;writing-mode:vertical-rl;transform:rotate(180deg) translateY(50%);font:400 13px var(--d);letter-spacing:.2em;text-transform:uppercase;z-index:3}
.intro{position:relative;z-index:3;max-width:360px;font-size:16px;margin:26px 0 0 0}
.intro a{display:inline-block;margin-top:14px;border-bottom:2px solid var(--ink);font-weight:600;padding-bottom:2px}
.intro a:hover{background:var(--lime)}
.in{opacity:0;transform:translateY(40px);animation:in 1.1s cubic-bezier(.2,.8,.2,1) forwards}
.d1{animation-delay:.15s}.d2{animation-delay:.3s}.d3{animation-delay:.5s}
@keyframes in{to{opacity:1;transform:none}}
@media(max-width:800px){.art{width:80vw;top:12vh;right:-8vw}.side{display:none}}
.mq{background:var(--ink);color:var(--bone);overflow:hidden;white-space:nowrap;padding:14px 0;font:400 26px var(--s);font-style:italic}
.mq div{display:inline-block;animation:mq 40s linear infinite}
.mq b{color:var(--lime);font-style:normal;margin:0 .6em}
@keyframes mq{to{transform:translateX(-50%)}}
section{padding:110px 3.5vw}
.no{font:600 13px var(--d);letter-spacing:.14em;text-transform:uppercase;display:flex;gap:14px;align-items:center;margin-bottom:26px}
.no::after{content:"";height:1.5px;width:90px;background:var(--ink)}
h2{font:800 clamp(44px,8.5vw,128px)/.88 var(--d);letter-spacing:-.05em;text-transform:uppercase}
h2 em{text-transform:none;letter-spacing:-.02em}
/* gallery */
.gal{margin:60px -3.5vw 0;display:flex;gap:30px;overflow-x:auto;padding:10px 3.5vw 40px;scroll-snap-type:x proximity;scrollbar-width:thin;scrollbar-color:var(--ink) transparent;cursor:grab}
.gal.drag{cursor:grabbing;scroll-snap-type:none}
.pc{flex:0 0 min(340px,78vw);scroll-snap-align:start}
.pc:nth-child(even){margin-top:60px}
.pc svg{width:100%;display:block;border:1.5px solid var(--ink)}
.pl{padding:14px 0;border-bottom:1.5px solid var(--ink);display:grid;grid-template-columns:1fr auto;gap:2px 14px;font-size:14px}
.pl b{font:800 22px var(--d);letter-spacing:-.03em;text-transform:uppercase;grid-column:1/-1;line-height:1.05}
.pl small{color:var(--gr);font-size:13px;line-height:1.4}
.pl button{grid-row:3;grid-column:2;align-self:end;background:none;border:1.5px solid var(--ink);border-radius:99px;padding:6px 16px;font:600 13px var(--d);cursor:pointer;transition:.2s}
.pl button:hover{background:var(--lime)}
/* composer */
.cmp{background:var(--ink);color:var(--bone)}
.cmp .no::after{background:var(--bone)}
.cg{display:grid;grid-template-columns:1fr 1fr;gap:6vw;margin-top:60px;align-items:center}
.cg svg{width:100%;max-width:480px;display:block;border:1.5px solid var(--bone);margin:auto}
.sli{margin-bottom:34px}
.sli label{display:flex;justify-content:space-between;font:600 14px var(--d);letter-spacing:.12em;text-transform:uppercase;margin-bottom:10px}
.sli label span{font:italic 300 22px var(--s);color:var(--lime);letter-spacing:0;text-transform:none}
.sli input{width:100%;appearance:none;height:2px;background:var(--bone);outline-offset:10px}
.sli input::-webkit-slider-thumb{appearance:none;width:26px;height:26px;border-radius:50%;background:var(--lime);border:0;cursor:pointer}
.sli input::-moz-range-thumb{width:26px;height:26px;border-radius:50%;background:var(--lime);border:0;cursor:pointer}
.out{border-top:1.5px solid var(--bone);padding-top:20px;font:300 22px/1.35 var(--s)}
.out small{display:block;font:400 13px var(--d);color:var(--gr);margin-top:10px}
.lnk{display:inline-block;margin-top:20px;background:var(--lime);color:var(--ink);padding:14px 26px;border-radius:99px;font:600 15px var(--d);transition:.2s}
.lnk:hover{transform:translateX(8px)}
@media(max-width:860px){.cg{grid-template-columns:1fr}}
/* manifesto */
.mf p{font:300 clamp(30px,5.4vw,78px)/1.08 var(--s);letter-spacing:-.02em;max-width:1200px}
.mf span{color:rgba(14,14,14,.16);transition:color .3s}
.mf span.on{color:var(--ink)}
.mf span.on.i{background:var(--lime)}
/* invite */
.inv{border-top:1.5px solid var(--ink)}
.mad{font:300 clamp(30px,5vw,72px)/1.3 var(--s);max-width:1150px}
.mad input,.mad select{font:inherit;font-style:italic;border:0;border-bottom:2px solid var(--ink);background:transparent;padding:0 6px;color:var(--ink);border-radius:0;max-width:100%;outline:none}
.mad input{width:7.5em}.mad input::placeholder{color:var(--gr)}
.mad input:focus,.mad select:focus{background:var(--lime)}
.send{margin-top:46px;display:inline-flex;gap:14px;align-items:center;background:var(--ink);color:var(--bone);padding:20px 38px;border-radius:99px;font:600 17px var(--d);transition:.25s}
.send:hover{background:var(--lime);color:var(--ink);gap:26px}
footer{background:var(--ink);color:var(--bone);padding:60px 3.5vw 30px;overflow:hidden}
footer .w{font:800 clamp(60px,18vw,300px)/.8 var(--d);letter-spacing:-.06em;text-transform:uppercase;color:var(--lime);white-space:nowrap}
footer p{font-size:13px;color:var(--gr);margin-top:30px;max-width:640px}
/* chat drawer */
#fab{position:fixed;left:3.5vw;bottom:calc(22px + env(safe-area-inset-bottom,0px));z-index:70;background:var(--lime);border:1.5px solid var(--ink);border-radius:99px;padding:12px 22px;font:600 14px var(--d);cursor:pointer;color:var(--ink)}
#fab:hover{background:var(--ink);color:var(--lime)}
#chat{position:fixed;top:0;right:0;bottom:0;z-index:80;width:min(420px,100vw);background:var(--bone);border-left:1.5px solid var(--ink);transform:translateX(102%);transition:transform .55s cubic-bezier(.7,0,.2,1);display:flex;flex-direction:column;padding-top:env(safe-area-inset-top,0px)}
#chat.open{transform:none}
#chat header{padding:22px 24px;display:flex;justify-content:space-between;align-items:baseline;border-bottom:1.5px solid var(--ink)}
#chat header b{font:italic 300 30px var(--s)}
#chat header button{background:none;border:0;font:600 14px var(--d);cursor:pointer;text-transform:uppercase;letter-spacing:.08em}
#msgs{flex:1;overflow-y:auto;padding:22px 24px;display:flex;flex-direction:column;gap:16px}
.m{font:300 19px/1.4 var(--s);max-width:90%;animation:in .5s forwards;opacity:0;transform:translateY(10px)}
.m.u{align-self:flex-end;font:600 15px var(--d);background:var(--ink);color:var(--bone);padding:9px 16px;border-radius:99px}
.m.b::before{content:"— kurator";display:block;font:600 11px var(--d);letter-spacing:.14em;text-transform:uppercase;color:var(--gr);margin-bottom:3px}
.cps{display:flex;flex-wrap:wrap;gap:8px;padding:0 24px 14px}
.cps button{font:600 13px var(--d);padding:7px 14px;background:none;border:1.5px solid var(--ink);border-radius:99px;cursor:pointer;color:var(--ink)}
.cps button:hover{background:var(--lime)}
#cf{display:flex;border-top:1.5px solid var(--ink)}
#cf input{flex:1;padding:18px 24px;background:none;border:0;font:italic 300 19px var(--s);outline:none;min-width:0;color:var(--ink)}
#cf button{padding:0 24px;background:var(--ink);color:var(--lime);border:0;cursor:pointer;font-size:18px}
#wa{display:block;text-align:center;padding:13px;background:var(--lime);font-weight:600;font-size:15px;border-top:1.5px solid var(--ink)}
:focus-visible{outline:2px solid var(--ink);outline-offset:3px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}.in,.m{opacity:1;transform:none}}
</style>
</head>
<body>
<div id="cur"></div>
<div class="top"><a href="#top">Atelier Kulit®</a><nav><a href="#galeri">Galeri</a><a href="#komposer">Komposer</a><a href="#manifesto">Manifesto</a><a href="#undangan">Undangan</a></nav></div>

<header class="hero" id="top">
<div class="side in d3">Klinik estetika · Edisi 2026</div>
<div class="art in d1" id="art" aria-hidden="true">
<svg viewBox="0 0 520 620" fill="none">
<rect x="0" y="0" width="520" height="620" fill="#0E0E0E"/>
<g style="transform:translate(calc(var(--mx,0)*18px),calc(var(--my,0)*18px))"><circle cx="300" cy="260" r="170" fill="#EFEBE3"/></g>
<g style="transform:translate(calc(var(--mx,0)*-26px),calc(var(--my,0)*-26px))"><path d="M70 620c0-150 80-220 190-220s190 70 190 220z" fill="#8B887F"/><path d="M180 250c0-80 50-130 120-130s120 50 120 130c0 80-50 140-120 140s-120-60-120-140z" fill="#0E0E0E"/></g>
<g style="transform:translate(calc(var(--mx,0)*40px),calc(var(--my,0)*40px))"><circle cx="400" cy="130" r="44" fill="#C6FF2D"/><path d="M262 250q22 -16 44 0" stroke="#EFEBE3" stroke-width="5" stroke-linecap="round"/></g>
<g stroke="#EFEBE3" stroke-width="1.2" opacity=".6"><circle cx="300" cy="260" r="230"/><circle cx="300" cy="260" r="260" stroke-dasharray="3 9"/></g>
<text x="24" y="44" fill="#EFEBE3" font-family="Syne" font-size="14" letter-spacing="3">N°01 — POTRET KULIT</text>
</svg></div>
<h1><span class="in">skin</span><span class="as in d1">sebagai</span><span class="ar in d2">art</span></h1>
<div class="intro in d3">Kami memperlakukan kulit seperti kanvas: dibaca dulu, baru dirawat. Setiap rencana dirancang oleh dokter spesialis kulit.<br><a href="#galeri">Masuk ke galeri →</a></div>
</header>
<div class="mq" aria-hidden="true"><div id="mq"></div></div>

<section id="galeri">
<div class="no">01 — Galeri perawatan</div>
<h2>Enam <em>karya</em>,<br>satu kulit.</h2>
<div class="gal" id="gal"></div>
</section>

<section class="cmp" id="komposer">
<div class="no">02 — Komposer kulit</div>
<h2>Lukis <em>kulitmu</em><br>hari ini.</h2>
<div class="cg">
<svg id="cv" viewBox="0 0 360 360" role="img" aria-label="Karya generatif dari tiga geseran"></svg>
<div>
<div class="sli"><label for="r1">Pancaran <span id="v1"></span></label><input type="range" id="r1" min="0" max="100" value="50"></div>
<div class="sli"><label for="r2">Kehalusan <span id="v2"></span></label><input type="range" id="r2" min="0" max="100" value="50"></div>
<div class="sli"><label for="r3">Ketenangan <span id="v3"></span></label><input type="range" id="r3" min="0" max="100" value="50"></div>
<div class="out" id="ot"></div>
<a class="lnk" id="cb" href="#">Kirim komposisiku →</a>
</div></div></section>

<section class="mf" id="manifesto">
<div class="no">03 — Manifesto</div>
<p id="mp">Kami percaya kulit bukan masalah yang harus dihapus, melainkan kanvas yang perlu dibaca dengan teliti. Dokter kami menggambar rencana, bukan menjanjikan keajaiban.</p>
</section>

<section class="inv" id="undangan">
<div class="no">04 — Undangan</div>
<div class="mad">Halo, namaku <input id="nm" placeholder="nama" aria-label="Nama">, aku tertarik dengan <select id="ts"></select>, dan paling nyaman datang di <select id="tw"><option>hari kerja pagi</option><option>hari kerja siang</option><option>hari kerja sore</option><option>akhir pekan</option></select>.</div>
<a class="send" id="sb" href="#">Kirim undangan <span>→</span></a>
</section>

<footer><div class="w">atelier</div><p>© 2026 Atelier Kulit. Template contoh, ganti nama, dokter, harga, dan kontak sesuai klinik Anda. Hasil perawatan berbeda pada setiap individu dan ditentukan setelah pemeriksaan dokter.</p></footer>

<button id="fab">✺ Tanya kurator</button>
<aside id="chat" aria-label="Kurator Atelier">
<header><b>Tanya kurator</b><button id="x">Tutup</button></header>
<div id="msgs"></div><div class="cps" id="cps"></div>
<a id="wa" href="#">Lanjutkan di WhatsApp →</a>
<form id="cf"><input id="ci" placeholder="Tulis pertanyaanmu…" autocomplete="off"><button aria-label="Kirim">→</button></form>
</aside>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="Atelier Kulit";
const rp=n=>"Rp "+n.toLocaleString("id-ID");
const waLink=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t);
const $=id=>document.getElementById(id);
mq.innerHTML=("Hydra Facial <b>✺</b> Laser Toning <b>✺</b> Microneedling RF <b>✺</b> Acne Clear <b>✺</b> RF Lift <b>✺</b> LED Therapy <b>✺</b> ").repeat(4);
/* kursor */
const cur=$("cur");addEventListener("pointermove",e=>{cur.style.transform=`translate(${e.clientX-9}px,${e.clientY-9}px)`;if(e.target.closest("a,button,select,input"))cur.classList.add("big");else cur.classList.remove("big");
const h=$("top");if(scrollY<innerHeight){h.style.setProperty("--mx",(e.clientX/innerWidth-.5).toFixed(3));h.style.setProperty("--my",(e.clientY/innerHeight-.5).toFixed(3))}});
/* galeri */
const W=[["Hydra Facial","air, serum, vakum","60 menit",450000],["Laser Toning","cahaya laser berenergi rendah","45 menit",650000],["Microneedling RF","jarum mikro dan radiofrekuensi","60 menit",1200000],["Acne Clear Program","ekstraksi dan terapi terarah","60 menit",750000],["RF Skin Tightening","energi radiofrekuensi","75 menit",1800000],["LED Light Therapy","terapi cahaya lembut","30 menit",350000]];
const PL=[["#0E0E0E","#EFEBE3","#C6FF2D"],["#EFEBE3","#0E0E0E","#C6FF2D"],["#C6FF2D","#0E0E0E","#EFEBE3"]];
let sd=7;const rnd=()=>(sd=(sd*9301+49297)%233280)/233280;
function art(i){const [bg,fg,ac]=PL[i%3];let s=`<svg viewBox="0 0 340 420" aria-hidden="true"><rect width="340" height="420" fill="${bg}"/>`;sd=i*13+5;
if(i===0)for(let k=1;k<12;k++)s+=`<circle cx="170" cy="220" r="${k*16}" fill="none" stroke="${k===4?ac:fg}" stroke-width="${k===4?5:1.2}"/>`;
if(i===1){for(let k=0;k<22;k++)s+=`<line x1="-10" y1="${k*20}" x2="350" y2="${k*20+120}" stroke="${fg}" stroke-width="1.2"/>`;s+=`<polygon points="0,150 340,300 340,330 0,180" fill="${ac}"/>`}
if(i===2)for(let a=0;a<10;a++)for(let b=0;b<12;b++){const d=Math.hypot(a-4.5,b-5.5);s+=`<circle cx="${35+a*30}" cy="${35+b*32}" r="${Math.max(1.5,11-d*1.6)}" fill="${d<2?ac:fg}"/>`}
if(i===3){for(let k=0;k<46;k++)s+=`<circle cx="${rnd()*320+10}" cy="${rnd()*400+10}" r="${rnd()*14+2}" fill="none" stroke="${fg}" stroke-width="1.3"/>`;s+=`<circle cx="210" cy="190" r="34" fill="${ac}"/>`}
if(i===4){for(let k=0;k<12;k++)s+=`<path d="M20 ${360-k*24}Q170 ${300-k*34} 320 ${360-k*24}" fill="none" stroke="${k===8?ac:fg}" stroke-width="${k===8?5:1.4}"/>`}
if(i===5){for(let k=0;k<36;k++){const a=k*Math.PI/18;s+=`<line x1="${170+Math.cos(a)*40}" y1="${220+Math.sin(a)*40}" x2="${170+Math.cos(a)*(150+(k%3)*30)}" y2="${220+Math.sin(a)*(150+(k%3)*30)}" stroke="${fg}" stroke-width="1.3"/>`}s+=`<circle cx="170" cy="220" r="32" fill="${ac}"/>`}
return s+`<text x="16" y="404" font-family="Syne" font-size="12" letter-spacing="2" fill="${fg}">N°0${i+1}</text></svg>`}
gal.innerHTML=W.map((w,i)=>`<div class="pc">${art(i)}<div class="pl"><b>${w[0]}</b><small>medium: ${w[1]}<br>durasi: ${w[2]}</small><span style="grid-row:2;grid-column:2;font-weight:600">${rp(w[3])}</span><button data-i="${i}">Pilih →</button></div></div>`).join("");
W.forEach(w=>ts.add(new Option(w[0],w[0])));ts.add(new Option("konsultasi dokter","konsultasi dokter"));
gal.querySelectorAll("button").forEach(b=>b.onclick=()=>{ts.value=W[b.dataset.i][0];inv();$("undangan").scrollIntoView()});
let dn=0,sx=0,sl=0;gal.onpointerdown=e=>{if(e.pointerType==="mouse"){dn=1;sx=e.clientX;sl=gal.scrollLeft;gal.classList.add("drag")}};
addEventListener("pointerup",()=>{dn=0;gal.classList.remove("drag")});gal.onpointermove=e=>{if(dn)gal.scrollLeft=sl-(e.clientX-sx)};
/* komposer */
function comp(){const r=+r1.value,t=+r2.value,c=+r3.value;v1.textContent=r;v2.textContent=t;v3.textContent=c;sd=r*7+t*3+c+11;
let s=`<rect width="360" height="360" fill="#0E0E0E"/>`;const n=3+Math.round(r/12);
for(let i=n;i>=1;i--)s+=`<circle cx="180" cy="150" r="${20+i*(130/n)}" fill="none" stroke="#C6FF2D" stroke-opacity="${.25+r/140}" stroke-width="1.4"/>`;
s+=`<circle cx="180" cy="150" r="${10+r*.42}" fill="#C6FF2D"/>`;
for(let k=0;k<Math.round((100-t)*1.4);k++)s+=`<circle cx="${rnd()*340+10}" cy="${rnd()*340+10}" r="${rnd()*2.6+.8}" fill="#EFEBE3" opacity=".8"/>`;
const A=(100-c)*.45;for(let w=0;w<3;w++){let p=`M0 ${290+w*22}`;for(let x=0;x<=360;x+=12)p+=`L${x} ${290+w*22+Math.sin(x/(22-c*.12)+w)*A}`;s+=`<path d="${p}" fill="none" stroke="#EFEBE3" stroke-width="1.4"/>`}
s+=`<text x="14" y="346" font-family="Syne" font-size="11" letter-spacing="2" fill="#8B887F">KOMPOSISI NO.${r+t+c}</text>`;cv.innerHTML=s;
const L=[[r,"kecerahan dan hidrasi","Hydra Facial atau Laser Toning"],[t,"tekstur dan pori","Microneedling RF atau Acne Clear Program"],[c,"menenangkan kulit","LED Light Therapy dan konsultasi untuk kulit sensitif"]].sort((a,b)=>a[0]-b[0])[0];
ot.innerHTML=L[0]>=70?`Kulitmu terasa seimbang. Perawatan pemeliharaan biasanya cukup, dan dokter tetap perlu memeriksanya.<small>Panduan awal berdasarkan penilaianmu sendiri, bukan diagnosis.</small>`:`Perhatian utama: <em>${L[1]}</em>. Biasanya dipertimbangkan: ${L[2]}.<small>Panduan awal berdasarkan penilaianmu sendiri, bukan diagnosis. Dokter yang menentukan.</small>`;
cb.href=waLink(`Halo ${BRAND}, komposisi kulit saya: pancaran ${r}, kehalusan ${t}, ketenangan ${c} (skala 0-100). Saya ingin konsultasi.`);cb.target="_blank";cb.rel="noopener noreferrer"}
[r1,r2,r3].forEach(e=>e.oninput=comp);comp();
/* manifesto */
const mp=$("mp");mp.innerHTML=mp.textContent.split(" ").map(w=>`<span${/kanvas|keajaiban/.test(w)?' class="i"':""}>${w}</span>`).join(" ");
const sp=[...mp.querySelectorAll("span")];function mfs(){const r=mp.getBoundingClientRect(),p=Math.min(1,Math.max(0,(innerHeight*.85-r.top)/(r.height+innerHeight*.3)));sp.forEach((s,i)=>s.classList.toggle("on",i/sp.length<p*1.1))}
addEventListener("scroll",mfs,{passive:true});mfs();
/* undangan */
function inv(){const t=`Halo ${BRAND}, namaku ${nm.value.trim()||"(belum diisi)"}, aku tertarik dengan ${ts.value}, dan paling nyaman datang di ${tw.value}. Mohon info jadwal dokter.`;sb.href=waLink(t);sb.target="_blank";sb.rel="noopener noreferrer"}
[nm,ts,tw].forEach(e=>e.oninput=inv);inv();
/* chatbot */
const KB=[
[/harga|biaya|tarif|berapa/,()=>"Karya kami berkisar "+rp(350000)+" sampai "+rp(1800000)+" per sesi, tergantung perawatan. Harga final mengikuti pemeriksaan dokter.",["Jerawat","Kulit sensitif","Reservasi"]],
[/jerawat|acne|bruntusan/,()=>"Untuk jerawat tersedia Acne Clear Program ("+rp(750000)+"). Dokter menentukan dulu jenis jerawatnya.",["Harga","Reservasi"]],
[/sensitif|aman|sakit|efek|downtime/,()=>"Setiap tindakan diawali pemeriksaan dokter. Untuk kulit sensitif, LED Light Therapy yang lembut sering dipertimbangkan. Respons tiap orang berbeda.",["Reservasi"]],
[/noda|flek|kusam|pigmen|laser/,()=>"Untuk noda dan kulit kusam tersedia Laser Toning dan Hydra Facial. Coba juga Komposer kulit di halaman ini sebagai panduan awal.",["Harga","Reservasi"]],
[/jadwal|jam|buka|reserv|booking|daftar|konsul|undangan/,()=>"Isi Undangan di bagian bawah halaman, atau tekan tombol WhatsApp di bawah agar pertanyaanmu langsung diteruskan ke tim kami.",["Lanjut ke WhatsApp"]],
[/dokter|spesialis/,()=>"Seluruh tindakan ditangani dokter spesialis kulit dan kelamin. Isi profil dokter dapat disesuaikan dengan klinik Anda.",["Reservasi"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Selamat datang di Atelier Kulit. Ada yang ingin kamu tanyakan?",["Harga","Jerawat","Kulit sensitif","Reservasi"]]];
const log=[],cps=$("cps");
function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;msgs.append(d);msgs.scrollTop=1e9;if(c==="u")log.push(t)}
function chips(a){cps.innerHTML="";a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>ask(v);cps.append(b)})}
function waUpd(){const w=$("wa");w.href=waLink(`Halo ${BRAND}, saya menghubungi dari website.`+(log.length?` Pertanyaan saya: ${log.join("; ")}.`:" Saya ingin berkonsultasi."));w.target="_blank";w.rel="noopener noreferrer"}
function ask(q){say(q,"u");if(/whatsapp|\bwa\b|admin|manusia/i.test(q)){setTimeout(()=>{say("Baik, tekan tombol WhatsApp di bawah. Pertanyaanmu ikut terkirim.","b");waUpd()},400);return}
const m=KB.find(([r])=>r.test(q.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab tim medis kami. Tekan tombol WhatsApp di bawah, pertanyaanmu ikut terkirim.","b");chips(["Harga","Jerawat","Reservasi"])}waUpd()},450)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let first=true;
function toggle(){chat.classList.toggle("open");if(chat.classList.contains("open")&&first){first=false;say("Selamat datang. Saya kurator virtual Atelier Kulit, bisa membantu soal perawatan, harga, dan jadwal. Saya tidak memberi diagnosis medis.","b");chips(["Harga","Jerawat","Kulit sensitif","Reservasi"]);waUpd()}}
fab.onclick=toggle;x.onclick=toggle;
</script>
</body>
</html>
@endverbatim
