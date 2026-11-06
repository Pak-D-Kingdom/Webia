@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>VOLTRIX Garage – Modifikasi Kendaraan Masa Depan</title>
<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--bg:#E6ECF3;--pn:#F7FAFD;--ink:#0B0F14;--cy:#00A8C6;--cy2:#00E5FF;--or:#FF5B1F;--gr:#667180;--ln:rgba(11,15,20,.14);--glow:#00E5FF;
--d:'Chakra Petch',system-ui,sans-serif;--m:'JetBrains Mono',ui-monospace,monospace;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth;scroll-padding-top:70px}
body{margin:0;background:var(--bg);color:var(--ink);font:400 16px/1.6 var(--d);overflow-x:hidden;
background-image:linear-gradient(var(--ln) 1px,transparent 1px),linear-gradient(90deg,var(--ln) 1px,transparent 1px);background-size:56px 56px;background-attachment:fixed}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
.ch{clip-path:polygon(16px 0,100% 0,100% calc(100% - 16px),calc(100% - 16px) 100%,0 100%,0 16px)}
.lab{font:500 11px var(--m);letter-spacing:.14em;text-transform:uppercase;color:var(--cy)}
.btn{display:inline-flex;align-items:center;gap:10px;padding:13px 24px;background:var(--ink);color:#fff;border:0;font:600 14px var(--d);letter-spacing:.1em;text-transform:uppercase;cursor:pointer;clip-path:polygon(10px 0,100% 0,100% calc(100% - 10px),calc(100% - 10px) 100%,0 100%,0 10px);transition:.25s}
.btn:hover,.btn:focus-visible{background:var(--or);outline:none}
.btn.o{background:var(--or)}.btn.o:hover{background:var(--ink)}
/* bar */
.bar{position:sticky;top:env(safe-area-inset-top,0px);z-index:50;display:flex;align-items:center;justify-content:space-between;gap:16px;padding:12px 20px;background:rgba(247,250,253,.9);backdrop-filter:blur(10px);border-bottom:1px solid var(--ln)}
.logo{font:700 20px var(--d);letter-spacing:.08em;display:flex;align-items:center;gap:10px}
.logo i{width:22px;height:22px;background:var(--or);clip-path:polygon(50% 0,100% 100%,0 100%)}
.bar nav{display:flex;gap:26px;font:500 13px var(--m);letter-spacing:.06em;text-transform:uppercase}
.bar nav a:hover{color:var(--or)}
.st{font:400 11px var(--m);color:var(--gr);display:flex;gap:8px;align-items:center}
.st::before{content:"";width:8px;height:8px;border-radius:50%;background:#19C37D;animation:bl 1.6s infinite}
@keyframes bl{50%{opacity:.25}}
@media(max-width:860px){.bar nav,.st{display:none}}
/* configurator */
.cfg{display:grid;grid-template-columns:270px 1fr 290px;gap:16px;padding:20px;min-height:calc(100vh - 60px)}
.pn{background:var(--pn);padding:22px 20px;position:relative}
.pn::before{content:"";position:absolute;top:0;left:16px;right:0;height:3px;background:var(--cy)}
.pn h2{font:700 18px var(--d);letter-spacing:.06em;text-transform:uppercase;margin:4px 0 14px}
.grp{margin-bottom:18px}
.grp h3{font:500 11px var(--m);letter-spacing:.12em;text-transform:uppercase;color:var(--gr);margin-bottom:8px}
.opts{display:flex;flex-wrap:wrap;gap:6px}
.o{display:flex;align-items:center;gap:8px;padding:7px 11px;border:1px solid var(--ln);background:#fff;font:500 13px var(--d);cursor:pointer;color:var(--ink);transition:.2s;text-align:left}
.o:hover{border-color:var(--cy)}
.o[aria-pressed=true]{border-color:var(--or);box-shadow:inset 3px 0 0 var(--or);background:#FFF4EE}
.o i{width:14px;height:14px;border-radius:50%;border:1px solid var(--ink);flex:none}
.stage{position:relative;background:radial-gradient(120% 90% at 50% 55%,#16222E,#06090D 70%);overflow:hidden;min-height:520px;display:flex;align-items:center;--glow:#00E5FF}
.floor{position:absolute;left:-20%;right:-20%;bottom:-6%;height:52%;background:linear-gradient(rgba(0,229,255,.28) 1px,transparent 1px) 0 0/100% 36px,linear-gradient(90deg,rgba(0,229,255,.28) 1px,transparent 1px) 0 0/52px 100%;transform:perspective(520px) rotateX(64deg);-webkit-mask-image:linear-gradient(transparent,#000 45%);mask-image:linear-gradient(transparent,#000 45%);animation:fl 2.4s linear infinite}
@keyframes fl{to{background-position:0 36px,0 0}}
.ring{position:absolute;left:50%;top:48%;width:min(78%,640px);aspect-ratio:1;transform:translate(-50%,-50%);animation:rot 40s linear infinite;opacity:.55}
@keyframes rot{to{transform:translate(-50%,-50%) rotate(360deg)}}
.scan{position:absolute;top:0;bottom:0;width:90px;background:linear-gradient(90deg,transparent,rgba(0,229,255,.18),transparent);animation:sc 5s ease-in-out infinite}
@keyframes sc{0%{left:-10%}50%{left:90%}100%{left:-10%}}
#car{position:relative;width:100%;z-index:2;filter:drop-shadow(0 20px 20px rgba(0,0,0,.55))}
.sp{transform-box:fill-box;transform-origin:center;animation:spin 4s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}
.hudt{position:absolute;left:24px;top:20px;z-index:3;color:#fff;max-width:420px}
.hudt h1{font:700 clamp(26px,3.6vw,46px)/1 var(--d);letter-spacing:.02em;text-transform:uppercase}
.hudt h1 b{color:var(--cy2);font-weight:700}
.hudt p{font:400 12px var(--m);color:#9FB1C2;margin-top:10px}
.crn{position:absolute;width:26px;height:26px;border:2px solid var(--cy2);z-index:3}
.crn.a{right:16px;top:16px;border-left:0;border-bottom:0}.crn.b{left:16px;bottom:16px;border-right:0;border-top:0}.crn.c{right:16px;bottom:16px;border-left:0;border-top:0}
.cap{position:absolute;left:0;right:0;bottom:22px;text-align:center;font:400 11px var(--m);color:var(--cy2);z-index:3;letter-spacing:.08em}
@media(max-width:1060px){.cfg{grid-template-columns:1fr}.stage{order:-1;min-height:380px}.hudt{position:relative;left:0;top:0;padding:20px;z-index:3}.stage{flex-direction:column;align-items:stretch;justify-content:center}}
/* sheet */
.gg{position:relative;margin:4px 0 12px}
.gg svg{width:100%;display:block}
.gg b{position:absolute;left:0;right:0;bottom:0;text-align:center;font:700 21px var(--d)}
.gg small{display:block;font:400 11px var(--m);color:var(--gr);text-align:center;margin-top:4px}
.ln{display:flex;justify-content:space-between;gap:10px;padding:8px 0;border-top:1px dashed var(--ln);font-size:13.5px}
.ln span:last-child{font:500 12px var(--m);white-space:nowrap}
.ln.e{color:var(--gr)}
.note{font:400 11px/1.5 var(--m);color:var(--gr);margin:12px 0 16px}
/* sections */
section.s{padding:80px 20px}
.hd{max-width:760px;margin-bottom:40px}
.hd h2{font:700 clamp(30px,4.6vw,58px)/1 var(--d);text-transform:uppercase;letter-spacing:-.005em;margin:10px 0 12px}
.hd p{color:var(--gr)}
.mods{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.mod{background:var(--pn);padding:26px 22px;position:relative;overflow:hidden;transition:.3s;min-height:190px}
.mod::after{content:"";position:absolute;left:0;top:0;width:3px;height:0;background:var(--or);transition:.4s}
.mod:hover::after{height:100%}.mod:hover{background:#fff;transform:translateY(-4px)}
.mod span{font:500 12px var(--m);color:var(--cy)}
.mod h3{font:700 22px var(--d);text-transform:uppercase;margin:8px 0}
.mod p{font-size:14.5px;color:var(--gr)}
@media(max-width:900px){.mods{grid-template-columns:1fr 1fr}}@media(max-width:560px){.mods{grid-template-columns:1fr}}
.trk{background:var(--ink);color:#fff;padding:36px;max-width:980px}
.trk .lab{color:var(--cy2)}
.trk form{display:flex;gap:10px;flex-wrap:wrap;margin:18px 0 6px}
.trk input,.bk input,.bk textarea{background:transparent;border:1px solid rgba(255,255,255,.3);color:#fff;padding:13px 14px;font:500 15px var(--m);outline:none;flex:1;min-width:180px}
.trk input:focus{border-color:var(--cy2)}
.tr{display:grid;grid-template-columns:repeat(5,1fr);margin-top:28px;position:relative}
.tr::before{content:"";position:absolute;left:10%;right:10%;top:13px;height:2px;background:rgba(255,255,255,.2)}
.tr div{text-align:center;font:400 12px var(--m);color:#8A97A6;position:relative;padding-top:38px}
.tr div::before{content:"";position:absolute;left:50%;top:6px;width:16px;height:16px;transform:translateX(-50%) rotate(45deg);background:var(--ink);border:2px solid #4B5663}
.tr div.dn{color:#fff}.tr div.dn::before{background:var(--cy2);border-color:var(--cy2)}
.tr div.cu{color:var(--or)}.tr div.cu::before{background:var(--or);border-color:var(--or);animation:bl 1s infinite}
.rs{margin-top:22px;font:400 14px var(--m);color:#CBD5DF;min-height:22px}
@media(max-width:620px){.tr{grid-template-columns:1fr;gap:12px}.tr::before{display:none}.tr div{text-align:left;padding:0 0 0 34px}.tr div::before{left:8px;top:2px;transform:rotate(45deg)}}
.bkw{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.bk{background:var(--pn);padding:30px}
.bk label{display:block;font:500 11px var(--m);letter-spacing:.12em;text-transform:uppercase;color:var(--gr);margin:14px 0 6px}
.bk input,.bk textarea,.bk select{width:100%;background:#fff;border:1px solid var(--ln);color:var(--ink);padding:12px;font:500 15px var(--d);outline:none;border-radius:0}
.bk input:focus,.bk textarea:focus{border-color:var(--cy)}
.bk .sm{font:400 13px/1.7 var(--m);white-space:pre-wrap;color:var(--ink);background:#fff;padding:14px;border:1px dashed var(--ln);min-height:120px}
@media(max-width:860px){.bkw{grid-template-columns:1fr}}
footer{background:var(--ink);color:#8A97A6;padding:30px 20px;font:400 12px/1.7 var(--m)}
footer b{color:var(--cy2);font-weight:500}
/* chat */
#fab{position:fixed;left:20px;bottom:calc(20px + env(safe-area-inset-bottom,0px));z-index:70;background:var(--ink);color:var(--cy2);border:1px solid var(--cy2);padding:12px 18px;font:500 13px var(--m);cursor:pointer;letter-spacing:.06em;clip-path:polygon(10px 0,100% 0,100% calc(100% - 10px),calc(100% - 10px) 100%,0 100%,0 10px)}
#fab::after{content:"_";animation:bl 1s infinite;margin-left:2px}
#fab:hover{background:var(--cy2);color:var(--ink)}
#chat{position:fixed;left:20px;bottom:calc(74px + env(safe-area-inset-bottom,0px));z-index:70;width:min(400px,calc(100vw - 40px));height:min(520px,66vh);display:none;flex-direction:column;background:#06090D;color:#D5E2EE;border:1px solid var(--cy2);box-shadow:0 0 40px rgba(0,229,255,.25)}
#chat.open{display:flex;animation:up .3s}
@keyframes up{from{opacity:0;transform:translateY(20px)}}
#chat header{padding:11px 14px;border-bottom:1px solid rgba(0,229,255,.4);display:flex;justify-content:space-between;font:500 12px var(--m);color:var(--cy2);letter-spacing:.08em}
#chat header button{background:none;border:0;color:var(--cy2);cursor:pointer;font:500 12px var(--m)}
#msgs{flex:1;overflow-y:auto;padding:14px;display:flex;flex-direction:column;gap:12px;font:400 13.5px/1.55 var(--m)}
.m.b::before{content:"◆ voltrix ";color:var(--or)}
.m.u{color:var(--cy2)}.m.u::before{content:"> "}
.cps{display:flex;flex-wrap:wrap;gap:6px;padding:0 14px 10px}
.cps button{font:400 12px var(--m);padding:6px 10px;background:none;border:1px solid var(--cy2);color:var(--cy2);cursor:pointer}
.cps button:hover{background:var(--cy2);color:var(--ink)}
#cf{display:flex;border-top:1px solid rgba(0,229,255,.4)}
#cf span{padding:13px 0 0 14px;color:var(--or);font:500 14px var(--m)}
#cf input{flex:1;padding:13px 10px;background:none;border:0;color:#fff;font:400 14px var(--m);outline:none;min-width:0}
#cf button{padding:0 16px;background:none;border:0;color:var(--cy2);cursor:pointer;font-size:16px}
#wa{display:block;text-align:center;padding:10px;background:#1FA855;color:#fff;font:600 13px var(--d);letter-spacing:.06em}
:focus-visible{outline:2px solid var(--or);outline-offset:2px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}
</style>
</head>
<body>
<header class="bar"><a class="logo" href="#top"><i></i>VOLTRIX</a><span class="st">SISTEM ONLINE · BENGKEL BUKA</span>
<nav><a href="#top">Konfigurator</a><a href="#lini">Lini</a><a href="#lacak">Lacak</a><a href="#jadwal">Jadwal</a></nav>
<a class="btn" href="#jadwal">Booking</a></header>

<main id="top">
<div class="cfg">
<aside class="pn ch" id="ctl"><span class="lab">// 01 kontrol</span><h2>Rancang build</h2><div id="gr"></div></aside>
<div class="stage ch">
<div class="floor"></div><div class="scan"></div>
<svg class="ring" viewBox="0 0 200 200" fill="none" stroke="#00E5FF" aria-hidden="true"><circle cx="100" cy="100" r="96" stroke-dasharray="2 6"/><circle cx="100" cy="100" r="84" stroke-opacity=".5"/><path d="M100 4v10M100 186v10M4 100h10M186 100h10" stroke-width="2"/></svg>
<div class="hudt"><span class="lab" style="color:var(--cy2)">// voltrix garage · modifikasi kendaraan</span><h1>Rancang. Lihat. <b>Pasang.</b></h1><p>Atur velg, warna, body kit, dan lampu pada mobil ilustrasi. Hasilnya langsung menjadi estimasi biaya dan bisa dikirim ke tim kami.</p></div>
<svg id="car" viewBox="0 0 880 340" role="img" aria-label="Ilustrasi mobil yang berubah sesuai pilihan Anda"></svg>
<span class="crn a"></span><span class="crn b"></span><span class="crn c"></span>
<div class="cap" id="cap"></div>
</div>
<aside class="pn ch"><span class="lab">// 02 lembar build</span><h2>Estimasi</h2>
<div class="gg"><svg viewBox="0 0 200 112" fill="none"><path d="M20 100A80 80 0 0 1 180 100" stroke="#D5DCE4" stroke-width="12"/><path id="ga" d="M20 100A80 80 0 0 1 180 100" stroke="#FF5B1F" stroke-width="12" stroke-dasharray="0 252" style="transition:.6s"/></svg><b id="tt">Rp 0</b><small>estimasi total · ilustrasi ±</small></div>
<div id="ls"></div>
<p class="note">Harga contoh dan dapat berbeda per model kendaraan. Modifikasi sebaiknya mengikuti aturan lalu lintas dan uji tipe setempat.</p>
<a class="btn o" id="sb" href="#" style="width:100%;justify-content:center">Kirim build ke WA</a>
<button class="btn" id="rs" style="width:100%;justify-content:center;margin-top:8px;background:#fff;color:var(--ink);border:1px solid var(--ln)">Reset</button>
</aside>
</div>

<section class="s" id="lini">
<div class="hd"><span class="lab">// 03 lini modifikasi</span><h2>Enam modul untuk satu kendaraan</h2><p>Dari tampilan sampai kenyamanan, semua dikerjakan teknisi bersertifikat di bengkel kami.</p></div>
<div class="mods">
<div class="mod ch"><span>MOD-01</span><h3>Velg dan ban</h3><p>Ukuran dan model sesuai bodi, termasuk balancing dan alignment.</p></div>
<div class="mod ch"><span>MOD-02</span><h3>Body kit dan aero</h3><p>Splitter, skirt, diffuser, dan spoiler yang dipasang presisi.</p></div>
<div class="mod ch"><span>MOD-03</span><h3>Wrap dan cat</h3><p>Warna baru dengan finishing glossy, doff, atau satin.</p></div>
<div class="mod ch"><span>MOD-04</span><h3>Pencahayaan</h3><p>Headlamp, lampu belakang, dan underglow dengan kabel rapi.</p></div>
<div class="mod ch"><span>MOD-05</span><h3>Audio dan interior</h3><p>Head unit, speaker, peredam, dan jok sesuai kebutuhan.</p></div>
<div class="mod ch"><span>MOD-06</span><h3>Knalpot dan intake</h3><p>Pilihan aksesori yang tetap memperhatikan batas kebisingan.</p></div>
</div></section>

<section class="s" id="lacak" style="padding-top:0">
<div class="trk ch"><span class="lab">// 04 lacak pengerjaan</span><h2 style="font:700 clamp(26px,3.6vw,42px)/1.05 var(--d);text-transform:uppercase;margin-top:8px">Pantau kendaraanmu secara langsung</h2>
<form id="tf"><input id="tc" placeholder="Masukkan kode, contoh: MOD-2026" aria-label="Kode pengerjaan"><button class="btn o">Lacak</button></form>
<div class="tr" id="tr"></div><div class="rs" id="rr">Kode contoh untuk demo: MOD-2026 atau MOD-1001.</div></div>
</section>

<section class="s" id="jadwal" style="padding-top:0">
<div class="hd"><span class="lab">// 05 jadwalkan pemasangan</span><h2>Booking slot bengkel</h2></div>
<div class="bkw">
<div class="bk ch"><label for="bn">Nama</label><input id="bn" placeholder="Nama lengkap"><label for="bc">Kendaraan</label><input id="bc" placeholder="Contoh: Honda Civic 2019"><label for="bd">Tanggal pemasangan</label><input id="bd" type="date"><label for="bm">Catatan</label><textarea id="bm" rows="3" placeholder="Opsional"></textarea></div>
<div class="bk ch"><span class="lab">ringkasan pesan</span><div class="sm" id="sm" style="margin-top:12px"></div><a class="btn o" id="bb" href="#" style="margin-top:16px">Kirim booking ke WhatsApp</a></div>
</div></section>
</main>
<footer><b>VOLTRIX GARAGE</b> · Template contoh, ganti nama, harga, kontak, dan kode pelacakan dengan data bengkel Anda. Ilustrasi mobil bersifat umum. Pastikan seluruh modifikasi sesuai peraturan lalu lintas dan uji tipe yang berlaku.</footer>

<button id="fab">&gt; TANYA ASISTEN</button>
<div id="chat" role="dialog" aria-label="Asisten Voltrix"><header><span>ASISTEN://VOLTRIX</span><button id="x">[tutup]</button></header>
<div id="msgs"></div><div class="cps" id="cps"></div><a id="wa" href="#">LANJUT KE WHATSAPP →</a>
<form id="cf"><span>&gt;</span><input id="ci" placeholder="ketik pertanyaan…" autocomplete="off"><button aria-label="Kirim">⏎</button></form></div>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="VOLTRIX Garage";
const $=id=>document.getElementById(id),rp=n=>"Rp "+n.toLocaleString("id-ID"),wl=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t);
const G=[
["Warna dan wrap","col",[["Abu Perak (asli)",0,"#9AA3AE"],["Merah Racing",12e6,"#D91E2A"],["Putih Mutiara",12e6,"#F2F4F7"],["Biru Elektrik",12e6,"#1747E0"],["Hitam Doff",14e6,"#24272C"],["Hijau Neon",12e6,"#3CE06B"],["Oranye Solar",12e6,"#FF6A13"]]],
["Model velg","wh",[["Mesh Sport",9.5e6],["Turbine",12e6],["Deep Dish",15e6]]],
["Ukuran velg","sz",[["17 inci",0],["18 inci",2e6],["19 inci",4e6]]],
["Body kit","kit",[["Tanpa",0],["Sport",6.5e6],["Aggressive",11e6]]],
["Spoiler","sp",[["Tanpa",0],["Ducktail",1.8e6],["GT Wing",4.5e6]]],
["Underglow","gl",[["Mati",0,null],["Cyan",2.5e6,"#00E5FF"],["Magenta",2.5e6,"#FF2E93"],["Lime",2.5e6,"#B6FF00"]]]];
const D={col:0,wh:0,sz:0,kit:0,sp:0,gl:1},S={...D},MAX=55e6;
gr.innerHTML=G.map(([t,k,o])=>`<div class="grp"><h3>${t}</h3><div class="opts">${o.map((v,i)=>`<button type="button" class="o" data-k="${k}" data-i="${i}" aria-pressed="false">${v[2]?`<i style="background:${v[2]}"></i>`:""}${v[0]}</button>`).join("")}</div></div>`).join("");
gr.onclick=e=>{const b=e.target.closest(".o");if(b){S[b.dataset.k]=+b.dataset.i;draw()}};
rs.onclick=()=>{Object.assign(S,D);draw()};
const SZ=[.92,1,1.08];
function wheel(cx){const R=50*SZ[S.sz],r=R*.72;let w=`<circle cx="${cx}" cy="225" r="${R}" fill="#0E1116"/><g class="sp"><circle cx="${cx}" cy="225" r="${r}" fill="#1A1F26" stroke="#CBD3DC" stroke-width="5"/>`;
if(S.wh===0)for(let k=0;k<12;k++){const a=k*Math.PI/6;w+=`<line x1="${cx}" y1="225" x2="${cx+Math.cos(a)*r}" y2="${225+Math.sin(a)*r}" stroke="#8D96A3" stroke-width="1.6"/>`}
if(S.wh===1)for(let k=0;k<5;k++)w+=`<path transform="rotate(${k*72} ${cx} 225)" d="M${cx} 225L${cx+r*.92} ${217}L${cx+r*.92} ${236}Z" fill="#CBD3DC"/>`;
if(S.wh===2){w+=`<circle cx="${cx}" cy="225" r="${r*.8}" fill="none" stroke="#8D96A3" stroke-width="2"/><circle cx="${cx}" cy="225" r="${r*.55}" fill="none" stroke="#CBD3DC" stroke-width="3"/>`;for(let k=0;k<6;k++){const a=k*Math.PI/3;w+=`<line x1="${cx}" y1="225" x2="${cx+Math.cos(a)*r*.9}" y2="${225+Math.sin(a)*r*.9}" stroke="#CBD3DC" stroke-width="6"/>`}}
return w+`<circle cx="${cx}" cy="225" r="${r*.18}" fill="#FF5B1F"/></g>`}
const BODY="M60 215C60 190 90 180 140 172L250 150C290 110 340 90 420 88C500 88 560 110 600 150L700 165C745 172 755 195 750 215L735 228L75 228Z";
function car(){const c=G[0][2][S.col][2],gc=G[5][2][S.gl][2];let s=`<defs><linearGradient id="sh" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fff" stop-opacity=".28"/><stop offset=".5" stop-color="#000" stop-opacity="0"/><stop offset="1" stop-color="#000" stop-opacity=".45"/></linearGradient><linearGradient id="bmx"><stop offset="0" stop-color="${gc||"#FFF6D0"}" stop-opacity="${gc?.7:.45}"/><stop offset="1" stop-color="${gc||"#FFF6D0"}" stop-opacity="0"/></linearGradient><filter id="bl"><feGaussianBlur stdDeviation="9"/></filter></defs><g transform="translate(40 0)">`;
if(gc)s+=`<ellipse cx="400" cy="252" rx="350" ry="15" fill="${gc}" filter="url(#bl)"/><rect x="95" y="247" width="610" height="3" rx="2" fill="${gc}"/>`;
s+=`<polygon points="735,184 840,140 840,235" fill="url(#bmx)"/>`;
if(S.sp===1)s+=`<path d="M62 184Q58 166 84 166L124 169L118 178Z" fill="#0B0F14"/>`;
if(S.sp===2)s+=`<path d="M86 142V182M130 142V176" stroke="#0B0F14" stroke-width="6"/><path d="M50 126L192 118L188 134L54 142Z" fill="#0B0F14" stroke="#FF5B1F" stroke-width="2"/>`;
s+=`<path d="${BODY}" fill="${c}"/><path d="${BODY}" fill="url(#sh)"/><path d="M250 150C290 112 345 94 420 92" fill="none" stroke="#fff" stroke-opacity=".4" stroke-width="3"/>`;
s+=`<path d="M262 150C300 118 345 104 410 102V150Z" fill="#0F1A24" opacity=".92"/><path d="M428 102C480 104 530 120 575 150H428Z" fill="#0F1A24" opacity=".92"/><path d="M419 100V222" stroke="#000" stroke-opacity=".35"/>`;
s+=`<circle cx="195" cy="225" r="62" fill="#07090C"/><circle cx="645" cy="225" r="62" fill="#07090C"/>`;
if(S.kit>=1)s+=`<path d="M258 226H585L580 213H264Z" fill="#0B0F14"/><path d="M712 228H776L764 217H718Z" fill="#0B0F14"/>`;
if(S.kit===2)s+=`<path d="M72 228H142L132 212H74Z" fill="#0B0F14"/><path d="M129 225A66 66 0 0 1 261 225M579 225A66 66 0 0 1 711 225" fill="none" stroke="#0B0F14" stroke-width="8"/>`;
s+=wheel(195)+wheel(645)+`<path d="M722 182L748 190L722 198Z" fill="${gc||"#FFF6D0"}"/><rect x="62" y="190" width="14" height="10" rx="2" fill="#FF2A2A"/></g>`;
return s}
function draw(){const m=G[0][2][S.col];stage_(m);car_.innerHTML=car();let tot=0,L="",cp=[];
document.querySelectorAll(".o").forEach(b=>b.setAttribute("aria-pressed",S[b.dataset.k]==b.dataset.i));
G.forEach(([t,k,o])=>{const v=o[S[k]];tot+=v[1];L+=`<div class="ln${v[1]?"":" e"}"><span>${t}: ${v[0]}</span><span>${v[1]?(v[1]/1e6)+" jt":"-"}</span></div>`;if(v[1])cp.push(`${t}: ${v[0]}`)});
ls.innerHTML=L;tt.textContent=rp(tot);ga.style.strokeDasharray=`${Math.min(1,tot/MAX)*251.3} 252`;
cap.textContent=`[ ${m[0].toUpperCase()} · ${G[1][2][S.wh][0].toUpperCase()} ${G[2][2][S.sz][0].toUpperCase()} · UNDERGLOW ${G[5][2][S.gl][0].toUpperCase()} ]`;
const msg=`Halo ${BRAND}, saya ingin konsultasi build: ${G.map(([t,k,o])=>t+" "+o[S[k]][0]).join(", ")}. Estimasi ${rp(tot)}. Mohon info ketersediaan dan harga final untuk kendaraan saya.`;
sb.href=wl(msg);sb.target="_blank";sb.rel="noopener noreferrer";bk()}
const car_=$("car"),stg=document.querySelector(".stage");function stage_(m){stg.style.setProperty("--glow",G[5][2][S.gl][2]||"#00E5FF")}
/* tracker */
const ST=["Diterima","Pembongkaran","Pemasangan","Quality check","Siap diambil"],TD={"MOD-2026":{c:"Honda Civic Turbo",s:2,t:"Pemasangan velg dan body kit sedang berlangsung."},"MOD-1001":{c:"Toyota GR86",s:4,t:"Pengerjaan selesai. Kendaraan siap diambil di bengkel."}};
function trk(s){tr.innerHTML=ST.map((n,i)=>`<div class="${s===null?"":i<s||s===4?"dn":i===s?"cu":""}">${n}</div>`).join("")}trk(null);
tf.onsubmit=e=>{e.preventDefault();const k=tc.value.trim().toUpperCase(),d=TD[k];if(d){trk(d.s);rr.textContent=`${d.c}: ${d.t}`}else{trk(null);rr.replaceChildren(document.createTextNode("Kode tidak ditemukan. Periksa kembali atau "));const a=document.createElement("a");a.href=wl("Halo "+BRAND+", saya ingin menanyakan status pengerjaan kendaraan saya.");a.target="_blank";a.rel="noopener noreferrer";a.style.color="var(--cy2)";a.style.textDecoration="underline";a.textContent="tanya tim lewat WhatsApp";rr.append(a,document.createTextNode("."))}};
/* booking */
const dt=new Date();dt.setDate(dt.getDate()+1);bd.min=dt.toISOString().slice(0,10);
function bk(){const tot=G.reduce((a,[,k,o])=>a+o[S[k]][1],0),d=bd.value?new Date(bd.value+"T00:00").toLocaleDateString("id-ID",{weekday:"long",day:"numeric",month:"long",year:"numeric"}):"(belum dipilih)";
const t=`Nama: ${bn.value||"-"}\nKendaraan: ${bc.value||"-"}\nTanggal: ${d}\nBuild: ${G.map(([t,k,o])=>o[S[k]][0]).join(" / ")}\nEstimasi: ${rp(tot)}${bm.value?"\nCatatan: "+bm.value:""}`;
sm.textContent=t;bb.href=wl(`Halo ${BRAND}, saya ingin booking pemasangan.\n`+t);bb.target="_blank";bb.rel="noopener noreferrer"}
[bn,bc,bd,bm].forEach(e=>e.oninput=bk);
/* chatbot */
const KB=[
[/harga|biaya|tarif|berapa/,()=>"Estimasi di halaman ini bersifat contoh: wrap mulai "+rp(12e6)+", velg "+rp(9.5e6)+" sampai "+rp(15e6)+", body kit "+rp(6.5e6)+" sampai "+rp(11e6)+". Harga final tergantung model kendaraan.",["Aturan modifikasi","Booking","Lacak status"]],
[/aturan|legal|razia|tilang|uji tipe|surat|stnk|kir/,()=>"Modifikasi sebaiknya mengikuti aturan lalu lintas dan uji tipe setempat. Tim kami membantu memilih part yang sesuai, dan perubahan tertentu mungkin perlu pengesahan administrasi.",["Booking","Harga"]],
[/velg|ban|wheel/,()=>"Tersedia tiga model velg (Mesh Sport, Turbine, Deep Dish) dengan ukuran 17 sampai 19 inci. Ukuran akhir disesuaikan dengan spesifikasi kendaraan Anda.",["Harga","Booking"]],
[/wrap|cat|warna|doff/,()=>"Tersedia wrap dan cat dengan finishing glossy, doff, atau satin. Coba pilihan warna di konfigurator untuk melihat gambaran awalnya.",["Harga","Booking"]],
[/body ?kit|spoiler|aero|diffuser/,()=>"Body kit tersedia level Sport dan Aggressive, spoiler dari Ducktail sampai GT Wing. Kecocokan ditentukan model kendaraan.",["Harga","Booking"]],
[/underglow|lampu|led|headlamp/,()=>"Underglow tersedia warna cyan, magenta, dan lime. Pemasangan dengan kabel rapi dan sesuai aturan penggunaan lampu setempat.",["Aturan modifikasi","Harga"]],
[/lacak|status|progress|kode/,()=>"Gunakan bagian Lacak pengerjaan di halaman ini dengan kode dari bengkel. Kalau belum punya kode, tim kami bisa membantu lewat WhatsApp.",["Lanjut ke WhatsApp"]],
[/booking|jadwal|reserv|pasang|daftar|durasi|lama/,()=>"Isi bagian Booking di halaman ini, atau lanjut ke WhatsApp. Lama pengerjaan bergantung paket, dan tim akan memberi estimasi saat konfirmasi.",["Lanjut ke WhatsApp"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Halo, selamat datang di VOLTRIX Garage. Ada yang ingin ditanyakan soal modifikasi?",["Harga","Aturan modifikasi","Booking","Lacak status"]]];
const log=[],cps=$("cps");
function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;msgs.append(d);msgs.scrollTop=1e9;if(c==="u")log.push(t)}
function chips(a){cps.innerHTML="";a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>ask(v);cps.append(b)})}
function waU(){const w=$("wa");w.href=wl(`Halo ${BRAND}, saya menghubungi dari website.`+(log.length?` Pertanyaan saya: ${log.join("; ")}.`:" Saya ingin konsultasi modifikasi."));w.target="_blank";w.rel="noopener noreferrer"}
function ask(q){say(q,"u");if(/whatsapp|\bwa\b|admin|manusia|teknisi/i.test(q)){setTimeout(()=>{say("Siap, tekan tombol hijau di bawah. Pertanyaan Anda ikut terkirim.","b");waU()},350);return}
const m=KB.find(([r])=>r.test(q.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab teknisi kami. Tekan tombol WhatsApp di bawah, pertanyaan Anda ikut terkirim.","b");chips(["Harga","Aturan modifikasi","Booking"])}waU()},400)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let first=true;function tg(){chat.classList.toggle("open");if(chat.classList.contains("open")&&first){first=false;say("Selamat datang. Saya asisten virtual VOLTRIX untuk info modifikasi, harga, dan booking. Harga di sini contoh dan bukan penawaran final.","b");chips(["Harga","Aturan modifikasi","Booking","Lacak status"]);waU()}}
fab.onclick=tg;x.onclick=tg;draw();
</script>
</body>
</html>
@endverbatim
