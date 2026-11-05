@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Langit Karya – Kontraktor</title>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root{--bb:#CFE6F7;--bb2:#EEF6FC;--bb3:#A9D1EE;--ink:#16222E;--mu:#6E8091;--ln:#DCE8F1;--f:'Instrument Sans',system-ui,sans-serif;
box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
*,*::before,*::after{box-sizing:inherit}
html{scroll-behavior:smooth}
body{margin:0;background:#fff;color:var(--ink);font:400 17px/1.65 var(--f);overflow-x:hidden;letter-spacing:-.005em}
a{color:inherit;text-decoration:none}
h1,h2,h3,p{margin:0}
.w{max-width:1100px;margin:auto;padding:0 28px}
.lb{font:500 11.5px var(--f);letter-spacing:.16em;text-transform:uppercase;color:var(--mu)}
.ul{border-bottom:1.5px solid var(--ink);padding-bottom:2px;transition:.2s;cursor:pointer;background:none;border-top:0;border-left:0;border-right:0;font:inherit;color:inherit;padding-left:0;padding-right:0}
.ul:hover{background:var(--bb);border-color:var(--ink)}
.bt{display:inline-flex;gap:10px;align-items:center;padding:15px 30px;background:var(--ink);color:#fff;border:0;border-radius:99px;font:500 15.5px var(--f);cursor:pointer;transition:.3s}
.bt:hover,.bt:focus-visible{background:var(--bb3);color:var(--ink);outline:none;gap:16px}
.bt.g{background:none;color:var(--ink);box-shadow:inset 0 0 0 1.5px var(--ink)}.bt.g:hover{background:var(--bb)}
header.n{position:sticky;top:env(safe-area-inset-top,0px);z-index:50;background:#fff;border-bottom:1px solid var(--ln)}
header.n .w{display:flex;justify-content:space-between;align-items:center;padding-top:22px;padding-bottom:22px}
#langit-menu-button{display:none;background:#fff;border:1.5px solid var(--ln);border-radius:99px;width:44px;height:44px;color:var(--ink);font-size:22px;cursor:pointer}
#langit-menu{position:fixed;left:0;right:0;top:calc(72px + env(safe-area-inset-top,0px));bottom:0;z-index:55;background:#fff;padding:18px 28px 28px;overflow-y:auto;visibility:hidden;opacity:0;pointer-events:none;transform:translateY(-110%);transition:.35s}
#langit-menu.open{visibility:visible;opacity:1;pointer-events:auto;transform:none}
#langit-menu button{display:block;width:100%;padding:16px 0;border:0;border-bottom:1px solid var(--ln);background:none;text-align:left;color:var(--ink);font:500 18px var(--f);cursor:pointer}
.lg{font:600 22px var(--f);letter-spacing:-.04em;display:flex;align-items:center;gap:8px}.lg::before{content:"";width:11px;height:11px;border-radius:50%;background:var(--bb3)}
.nl{display:flex;gap:30px;font-size:14.5px;color:var(--mu)}.nl button{background:none;border:0;font:inherit;color:inherit;cursor:pointer;padding:0}.nl button:hover{color:var(--ink)}
@media(max-width:600px){.nl{display:none}#langit-menu-button{display:block}}
.view{display:none}.view.on{display:block;animation:fd .6s}@keyframes fd{from{opacity:0;transform:translateY(10px)}}
.d{stroke-dasharray:1;stroke-dashoffset:1;animation:dr 1.5s cubic-bezier(.5,0,.2,1) forwards;animation-delay:var(--t,0s)}@keyframes dr{to{stroke-dashoffset:0}}
.art{background-color:var(--bb);background-image:linear-gradient(rgba(255,255,255,.55) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.55) 1px,transparent 1px);background-size:32px 32px;border-radius:6px;aspect-ratio:4/3;display:grid;place-items:center}
.art svg{width:90%}
/* hero */
.hero{padding:90px 0 80px}.hero .w{display:grid;grid-template-columns:1.1fr .9fr;gap:60px;align-items:center}
.hero h1{font:500 clamp(40px,5.8vw,84px)/1 var(--f);letter-spacing:-.05em;margin:22px 0 26px}
.hero p{max-width:440px;color:var(--mu);font-size:18px}
.hc{display:flex;gap:26px;align-items:center;flex-wrap:wrap;margin-top:38px}
@media(max-width:860px){.hero .w{grid-template-columns:1fr;gap:40px}}
.ss{border-block:1px solid var(--ln)}.ss .w{display:grid;grid-template-columns:repeat(3,1fr)}
.ss div{padding:34px 0;border-right:1px solid var(--ln);padding-left:28px}.ss div:first-child{padding-left:0}.ss div:last-child{border:0}
.ss b{display:block;font:500 clamp(32px,4vw,52px)/1 var(--f);letter-spacing:-.04em}.ss span{font-size:14px;color:var(--mu)}
@media(max-width:600px){.ss .w{grid-template-columns:1fr}.ss div{border:0;padding:16px 0;padding-left:0}}
section.s{padding:110px 0 20px}
.sh{display:flex;justify-content:space-between;align-items:end;gap:30px;margin-bottom:34px;flex-wrap:wrap}
.sh h2{font:500 clamp(30px,4vw,56px)/1.05 var(--f);letter-spacing:-.045em;max-width:620px}
/* index */
.ix{border-bottom:1px solid var(--ln)}
.ix a{display:grid;grid-template-columns:56px 1fr auto 30px;gap:18px;align-items:baseline;padding:28px 0;border-top:1px solid var(--ln);transition:.35s}
.ix a:hover{padding-left:16px;background:var(--bb2)}
.ix .n{font:400 13px var(--f);color:var(--mu)}.ix h3{font:500 clamp(22px,2.8vw,36px)/1.1 var(--f);letter-spacing:-.035em}.ix .m{font-size:14px;color:var(--mu)}.ix .ar{transition:.3s}.ix a:hover .ar{transform:translateX(6px)}
@media(max-width:700px){.ix a{grid-template-columns:36px 1fr 24px}.ix .m{display:none}}
#pv{position:fixed;left:0;top:0;width:280px;z-index:40;pointer-events:none;opacity:0;transition:opacity .25s;border-radius:6px;overflow:hidden;box-shadow:0 20px 50px -20px rgba(22,34,46,.4)}
#pv.on{opacity:1}#pv .art{border-radius:0}
@media(hover:none){#pv{display:none}}
.ct{padding:140px 0 100px;text-align:left}.ct h2{font:500 clamp(40px,6.4vw,100px)/.98 var(--f);letter-spacing:-.055em;max-width:900px}
.ct .hc{margin-top:40px}.ct small{display:block;margin-top:60px;font-size:14px;color:var(--mu);line-height:1.8}
footer{border-top:1px solid var(--ln);padding:34px 0 40px;font-size:13.5px;color:var(--mu)}
footer .w{display:flex;justify-content:space-between;gap:20px;flex-wrap:wrap}footer p{max-width:620px;font-size:12.5px;line-height:1.6;margin-top:10px}
footer button{background:none;border:0;font:inherit;color:inherit;cursor:pointer;margin-right:18px;padding:0}footer button:hover{color:var(--ink)}
/* subpages */
.sp{padding:50px 0 40px}
.bk{display:inline-flex;gap:8px;font-size:14.5px;color:var(--mu);margin-bottom:46px;cursor:pointer;background:none;border:0;font-family:var(--f);padding:0}.bk:hover{color:var(--ink)}
.dt{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center}
.dt h1{font:500 clamp(34px,5vw,70px)/1 var(--f);letter-spacing:-.05em;margin:16px 0 20px}.dt p{color:var(--mu);max-width:460px}
@media(max-width:860px){.dt{grid-template-columns:1fr;gap:34px}}
.fx{display:grid;grid-template-columns:repeat(4,1fr);border-block:1px solid var(--ln);margin-top:70px}
.fx div{padding:24px 0 24px 24px;border-left:1px solid var(--ln)}.fx div:first-child{border:0;padding-left:0}.fx small{display:block;font:500 11.5px var(--f);letter-spacing:.14em;text-transform:uppercase;color:var(--mu)}.fx b{font:500 22px var(--f);letter-spacing:-.02em}
@media(max-width:700px){.fx{grid-template-columns:1fr 1fr}.fx div:nth-child(3){border:0;padding-left:0}}
.cl{display:grid;grid-template-columns:.8fr 1.2fr;gap:60px;margin-top:80px}
.cl h2{font:500 clamp(24px,2.6vw,34px)/1.1 var(--f);letter-spacing:-.035em}
.cl ul{list-style:none;padding:0;margin:0}.cl li{padding:15px 0;border-top:1px solid var(--ln);display:flex;gap:16px}.cl li::before{content:"—";color:var(--bb3)}
.cl p{color:var(--mu);max-width:560px}
@media(max-width:860px){.cl{grid-template-columns:1fr;gap:20px}}
.gl{display:grid;grid-template-columns:2fr 1fr 1fr;gap:14px;margin-top:70px}.gl div{background:var(--bb);border-radius:6px;aspect-ratio:4/3}.gl div:nth-child(2){background:var(--bb2)}.gl div:nth-child(3){background:var(--bb3)}
.pn{display:flex;justify-content:space-between;gap:20px;margin-top:80px;padding-top:26px;border-top:1px solid var(--ln);flex-wrap:wrap}
.ph{display:grid;grid-template-columns:90px 1fr 1fr;gap:20px 40px;padding:36px 0;border-top:1px solid var(--ln)}
.ph .nm{font:500 clamp(40px,5vw,64px)/1 var(--f);letter-spacing:-.05em;color:var(--bb3)}.ph h3{font:500 clamp(24px,2.8vw,34px)/1.1 var(--f);letter-spacing:-.035em;margin-bottom:8px}.ph p{color:var(--mu)}.ph ul{list-style:none;padding:0;margin:0}.ph li{padding:6px 0;font-size:15.5px}.ph li::before{content:"+ ";color:var(--mu)}
@media(max-width:800px){.ph{grid-template-columns:50px 1fr}.ph>div:last-child{grid-column:2}}
/* wizard */
.wz{min-height:76vh;max-width:720px;margin:auto;padding:30px 28px 80px;display:flex;flex-direction:column}
.pg{display:flex;gap:6px;margin:10px 0 70px}.pg i{flex:1;height:2px;background:var(--ln);transition:.4s}.pg i.on{background:var(--ink)}
.wz h1{font:500 clamp(32px,5vw,58px)/1.05 var(--f);letter-spacing:-.05em;margin:12px 0 36px}
.op{display:flex;justify-content:space-between;align-items:center;width:100%;padding:22px 4px;border:0;border-top:1px solid var(--ln);background:none;font:500 clamp(18px,2.2vw,24px) var(--f);letter-spacing:-.02em;text-align:left;cursor:pointer;color:var(--ink);transition:.3s}
.op:last-of-type{border-bottom:1px solid var(--ln)}.op:hover{padding-left:16px;background:var(--bb2)}.op[aria-pressed=true]{background:var(--bb)}
.wz .big{font:500 clamp(54px,9vw,110px)/1 var(--f);letter-spacing:-.06em}
.wz input[type=range]{width:100%;accent-color:var(--ink);margin:30px 0}
.wz input[type=text],.wz textarea{width:100%;padding:14px 0;border:0;border-bottom:1.5px solid var(--ink);font:400 20px var(--f);outline:none;background:none;margin-bottom:22px;color:var(--ink)}
.wz input:focus,.wz textarea:focus{border-color:var(--bb3)}
.wz .ft{display:flex;justify-content:space-between;align-items:center;margin-top:44px}
.sm{border-top:1px solid var(--ln)}.sm div{display:flex;justify-content:space-between;gap:20px;padding:16px 0;border-bottom:1px solid var(--ln)}.sm span{color:var(--mu)}.sm b{font-weight:500;text-align:right}
/* chat */
#cb{position:fixed;right:22px;bottom:calc(22px + env(safe-area-inset-bottom,0px));z-index:70;padding:12px 22px;background:#fff;border:1.5px solid var(--ink);border-radius:99px;font:500 14.5px var(--f);cursor:pointer;color:var(--ink)}#cb:hover{background:var(--bb)}
#cp{position:fixed;right:22px;bottom:calc(78px + env(safe-area-inset-bottom,0px));z-index:70;width:min(360px,calc(100vw - 44px));height:min(440px,66vh);background:#fff;border:1px solid var(--ink);border-radius:10px;display:none;flex-direction:column;box-shadow:0 30px 70px -30px rgba(22,34,46,.5)}
#cp.on{display:flex;animation:fd .4s}
#cp header{padding:16px 20px;border-bottom:1px solid var(--ln);display:flex;justify-content:space-between;font-weight:500}#cp header button{background:none;border:0;font-size:20px;cursor:pointer;color:var(--mu)}
#ms{flex:1;overflow-y:auto;padding:6px 20px}
.m{padding:13px 0;border-bottom:1px solid var(--ln);font-size:15px;line-height:1.55;animation:fd .4s}.m.u{font-weight:600}.m.u::before{content:"— "}.m.b{color:var(--mu)}
.cs{display:flex;flex-wrap:wrap;gap:6px;padding:10px 20px 0}.cs button{padding:5px 12px;border:1px solid var(--ln);background:#fff;border-radius:99px;font:400 13px var(--f);cursor:pointer;color:var(--ink)}.cs button:hover{background:var(--bb)}
#cf{display:flex;border-top:1px solid var(--ln);margin-top:10px}#cf input{flex:1;padding:15px 20px;border:0;font:400 15px var(--f);outline:none;min-width:0}#cf button{padding:0 18px;border:0;background:none;font-size:18px;cursor:pointer}
#cw{display:block;padding:11px;text-align:center;background:var(--ink);color:#fff;font-size:14px;border-radius:0 0 9px 9px}
:focus-visible{outline:2px solid var(--bb3);outline-offset:3px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}.d{stroke-dashoffset:0}}
</style>
</head>
<body>
<header class="n"><div class="w"><a class="lg" href="#beranda">langit.</a><div class="nl"><button data-s="layanan">Layanan</button><button data-s="proyek">Proyek</button><button data-s="kontak">Kontak</button></div><button id="langit-menu-button" type="button" aria-controls="langit-menu" aria-expanded="false" aria-label="Buka menu navigasi">☰</button></div></header>
<nav id="langit-menu" aria-hidden="true"><button data-s="layanan">Layanan</button><button data-s="proyek">Proyek</button><button data-s="kontak">Kontak</button></nav>

<main>
<div class="view" id="v-beranda">
<section class="hero"><div class="w"><div><span class="lb">Kontraktor bangunan dan renovasi</span><h1>Bangunan yang tenang, dikerjakan dengan teliti.</h1><p>Perencanaan jelas, anggaran terbuka, dan pengerjaan tanpa drama. Dari rumah sampai gedung.</p>
<div class="hc"><a class="bt" href="#mulai">Mulai proyek <span>→</span></a><a class="ul" href="#metode">Cara kami bekerja</a></div></div><div class="art" id="ha"></div></div></section>
<div class="ss"><div class="w"><div><b>12 tahun</b><span>pengalaman membangun</span></div><div><b>150+</b><span>proyek terselesaikan</span></div><div><b>1 hari</b><span>penawaran awal dikirim</span></div></div></div>
<section class="s" id="layanan"><div class="w"><div class="sh"><h2>Empat bidang pekerjaan.</h2><span class="lb">Pilih untuk detailnya</span></div><div class="ix" id="ls"></div></div></section>
<section class="s" id="proyek"><div class="w"><div class="sh"><h2>Beberapa proyek terpilih.</h2><span class="lb">Arahkan kursor, klik untuk membuka</span></div><div class="ix" id="ps"></div></div></section>
<section class="ct" id="kontak"><div class="w"><span class="lb">Kontak</span><h2 style="margin-top:20px">Ada rencana? Mari mulai dengan satu percakapan.</h2><div class="hc"><a class="bt" href="#mulai">Mulai proyek <span>→</span></a><a class="ul" id="wl1" href="#" target="_blank" rel="noopener">Atau chat WhatsApp ↗</a></div><small>Alamat kantor (ganti dengan data Anda)<br>Senin sampai Jumat, 08.00 sampai 17.00 (contoh)</small></div></section>
</div>
<div class="view" id="v-detail"></div>
<div class="view" id="v-layanan"></div>
<div class="view" id="v-metode"></div>
<div class="view" id="v-mulai"></div>
</main>

<footer><div class="w"><div><b style="color:var(--ink);font-weight:600">langit.</b><p>Template contoh. Seluruh angka, proyek, dan data adalah contoh dan perlu diganti. Estimasi dan jadwal final ditentukan melalui survei dan kontrak tertulis. Perizinan dan keselamatan kerja mengikuti ketentuan yang berlaku.</p></div><div><button data-hash="metode">Cara kerja</button><button data-hash="mulai">Mulai proyek</button></div></div></footer>
<div id="pv"></div>
<button id="cb">Tanya ↗</button>
<aside id="cp" role="dialog" aria-label="Asisten Langit"><header><span>Asisten</span><button id="x" aria-label="Tutup">×</button></header><div id="ms"></div><div class="cs" id="cs"></div><form id="cf"><input id="ci" placeholder="Tulis pertanyaan…" autocomplete="off" aria-label="Pertanyaan"><button aria-label="Kirim">→</button></form><a id="cw" href="#" target="_blank" rel="noopener">Lanjut ke WhatsApp →</a></aside>

<script>
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="Langit Karya";
const $=i=>document.getElementById(i),wl=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t);
function replaceMarkup(el,markup){const range=document.createRange();range.selectNodeContents(el);range.deleteContents();el.append(range.createContextualFragment(markup))}
function escapeHtml(value){const node=document.createElement("span");node.textContent=String(value);return node.innerHTML}
wl1.href=wl("Halo "+BRAND+", saya ingin konsultasi proyek.");
/* gambar garis */
function art(t){let s="",i=0;const L=d=>{s+=`<path d="${d}" pathLength="1" class="d" style="--t:${(i++*.1).toFixed(2)}s"/>`},R=(x,y,w,h)=>L(`M${x} ${y}H${x+w}V${y+h}H${x}Z`);L("M20 250H380");
if(t==="rumah"){R(60,165,170,85);R(110,100,230,65);L("M100 94H350");R(80,185,40,30);R(140,185,40,30);R(130,118,50,32);R(205,118,50,32);R(280,118,40,32);R(192,205,28,45)}
if(t==="ruko"){R(100,60,200,190);L("M100 123H300");L("M100 186H300");for(let r=0;r<3;r++)for(let c=0;c<3;c++)R(114+c*62,75+r*63,40,34);R(180,208,42,42)}
if(t==="gudang"){R(40,150,320,100);L("M40 150L200 108L360 150");R(140,185,120,65);L("M140 217H260");L("M70 175H110M290 175H330")}
if(t==="kantor"){R(130,36,140,214);for(let y=70;y<250;y+=30)L(`M130 ${y}H270`);L("M165 36V250");L("M200 36V250");L("M235 36V250")}
if(t==="renov"){R(70,140,260,110);L("M70 140L200 88L330 140");R(100,170,50,40);R(250,170,50,40);L("M45 250V80M355 250V80");[80,130,180,230].forEach(y=>L(`M45 ${y}H355`))}
if(t==="industri"){R(40,165,250,85);L("M40 165L165 128L290 165");R(310,80,26,170);R(80,198,64,52);L("M300 80H346")}
return `<svg viewBox="0 0 400 300" fill="none" stroke="#16222E" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">${s}</svg>`}
const SV=[
{n:"Rumah tinggal",t:"rumah",d:"Membangun rumah dari tanah kosong sampai siap huni, termasuk desain, struktur, dan interior.",inc:["Konsultasi denah dan kebutuhan","Gambar kerja dan RAB tertulis","Struktur, arsitektur, dan instalasi","Finishing dan serah terima"],cp:"Keluarga yang ingin membangun rumah baru dengan anggaran dan jadwal yang jelas.",pj:[0]},
{n:"Renovasi",t:"renov",d:"Memperbarui bangunan lama dengan pembongkaran terkontrol, penguatan, dan penataan ulang.",inc:["Survei kondisi bangunan","Pembongkaran terkontrol","Penguatan struktur dan atap","Penataan ulang dan finishing"],cp:"Pemilik rumah atau toko yang ingin memperbarui tanpa membangun ulang.",pj:[2,5]},
{n:"Gedung komersial",t:"ruko",d:"Ruko, kantor, dan ruang usaha dengan perhatian pada fungsi, fasad, dan jadwal operasional.",inc:["Perencanaan fungsi ruang","Struktur dan fasad","Listrik, plumbing, dan tata udara","Interior dan lansekap"],cp:"Pelaku usaha yang membutuhkan ruang kerja atau tempat usaha yang siap beroperasi.",pj:[1,4]},
{n:"Industri",t:"gudang",d:"Gudang dan fasilitas pabrik dengan struktur berbentang lebar dan lantai kerja industri.",inc:["Pondasi dan struktur baja","Lantai kerja industri","Listrik dan proteksi kebakaran","Kantor dan fasilitas pekerja"],cp:"Perusahaan yang memerlukan gudang atau fasilitas produksi baru.",pj:[3]}];
const PJ=[
{n:"Rumah Tinggal Modern 2 Lantai",k:"Rumah",t:"rumah",l:"180 m²",d:"7 bulan",y:"2025",ds:"Rumah keluarga dua lantai dengan denah terbuka dan banyak cahaya alami.",kp:["Bukaan lebar di sisi timur untuk cahaya pagi","Struktur sederhana agar biaya terkendali","Material tahan cuaca untuk fasad"],sc:["Struktur beton bertulang","Arsitektur dan interior","Listrik dan plumbing","Taman dan carport"]},
{n:"Ruko Tiga Lantai",k:"Komersial",t:"ruko",l:"240 m²",d:"9 bulan",y:"2025",ds:"Ruko tiga lantai dengan area usaha di bawah dan hunian di atas.",kp:["Akses terpisah untuk usaha dan hunian","Fasad sederhana yang mudah dirawat","Instalasi listrik disiapkan untuk pengembangan"],sc:["Struktur dan fasad","Listrik tiga fase","Plumbing dan sanitasi","Finishing area usaha"]},
{n:"Renovasi Total Rumah Lama",k:"Renovasi",t:"renov",l:"120 m²",d:"4 bulan",y:"2024",ds:"Penataan ulang denah dan penggantian instalasi pada rumah yang sudah puluhan tahun.",kp:["Dinding non-struktural dibuka untuk ruang lebih lega","Atap dan plafon diganti menyeluruh","Instalasi lama diganti sebelum finishing"],sc:["Pembongkaran terkontrol","Penguatan struktur","Atap dan plafon","Finishing menyeluruh"]},
{n:"Gudang dan Kantor Pabrik",k:"Industri",t:"gudang",l:"1.200 m²",d:"10 bulan",y:"2025",ds:"Gudang berbentang lebar dengan area kantor dan fasilitas pendukung.",kp:["Bentang baja tanpa kolom di tengah","Lantai kerja dirancang untuk beban alat berat","Ventilasi alami untuk menghemat energi"],sc:["Pondasi dan struktur baja","Lantai industri","Listrik dan proteksi kebakaran","Kantor dan fasilitas pekerja"]},
{n:"Kantor Cabang Empat Lantai",k:"Komersial",t:"kantor",l:"900 m²",d:"12 bulan",y:"2024",ds:"Gedung kantor cabang dengan lobi, ruang rapat, dan area kerja terbuka.",kp:["Fasad kaca dengan pelindung panas","Denah fleksibel yang mudah diatur ulang","Lobi sebagai pusat sirkulasi"],sc:["Struktur beton dan fasad","Tata udara dan listrik","Interior lobi dan ruang rapat","Lansekap dan parkir"]},
{n:"Renovasi Fasad dan Interior Toko",k:"Renovasi",t:"renov",l:"150 m²",d:"3 bulan",y:"2025",ds:"Peremajaan tampilan toko dengan jadwal kerja malam agar usaha tetap berjalan.",kp:["Pekerjaan berisik dijadwalkan malam hari","Fasad baru dipasang per modul","Pencahayaan diganti untuk tampilan produk"],sc:["Fasad dan papan nama","Interior dan rak","Pencahayaan toko","Pekerjaan malam hari"]}];
/* beranda */
replaceMarkup(ha,art("rumah"));
replaceMarkup(ls,SV.map((s,i)=>`<a href="#layanan-${i+1}"><span class="n">0${i+1}</span><h3>${s.n}</h3><span class="m">Lihat detail</span><span class="ar">→</span></a>`).join(""));
replaceMarkup(ps,PJ.map((p,i)=>`<a href="#proyek-${i+1}" data-t="${p.t}"><span class="n">0${i+1}</span><h3>${p.n}</h3><span class="m">${p.k} · ${p.l}</span><span class="ar">→</span></a>`).join(""));
ps.onmousemove=e=>{const a=e.target.closest("a");if(!a){pv.classList.remove("on");return}if(pv.dataset.t!==a.dataset.t){pv.dataset.t=a.dataset.t;replaceMarkup(pv,`<div class="art">${art(a.dataset.t)}</div>`)}pv.classList.add("on");pv.style.transform=`translate(${Math.min(e.clientX+24,innerWidth-300)}px,${e.clientY-90}px)`};
ps.onmouseleave=()=>pv.classList.remove("on");
/* subhalaman */
const back=(h,t)=>`<button class="bk" data-back="${h}">← ${t}</button>`;
function dp(i){const p=PJ[i],pv_=PJ[(i+5)%6],nx=PJ[(i+1)%6];
replaceMarkup($("v-detail"),`<div class="sp"><div class="w">${back("beranda","Semua proyek")}<div class="dt"><div><span class="lb">${p.k} · ${p.y}</span><h1>${p.n}</h1><p>${p.ds}</p><div class="hc"><a class="bt" target="_blank" rel="noopener" href="${wl(`Halo ${BRAND}, saya tertarik dengan proyek seperti "${p.n}". Mohon konsultasi.`)}">Konsultasi proyek serupa</a></div></div><div class="art">${art(p.t)}</div></div>
<div class="fx"><div><small>Luas</small><b>${p.l}</b></div><div><small>Durasi</small><b>${p.d}</b></div><div><small>Kategori</small><b>${p.k}</b></div><div><small>Tahun</small><b>${p.y}</b></div></div>
<div class="cl"><h2>Keputusan desain</h2><ul>${p.kp.map(x=>`<li>${x}</li>`).join("")}</ul></div><div class="cl"><h2>Lingkup pekerjaan</h2><ul>${p.sc.map(x=>`<li>${x}</li>`).join("")}</ul></div>
<div class="gl"><div></div><div></div><div></div></div><p class="lb" style="margin-top:12px">Ruang untuk foto proyek</p>
<div class="pn"><a class="ul" href="#proyek-${(i+5)%6+1}">← ${pv_.n}</a><a class="ul" href="#proyek-${(i+1)%6+1}">${nx.n} →</a></div></div></div>`)}
function lp(i){const s=SV[i];replaceMarkup($("v-layanan"),`<div class="sp"><div class="w">${back("beranda","Semua layanan")}<div class="dt"><div><span class="lb">Layanan</span><h1>${s.n}</h1><p>${s.d}</p><div class="hc"><a class="bt" href="#mulai" data-i="${i}">Mulai proyek ini <span>→</span></a><a class="ul" href="#metode">Cara kami bekerja</a></div></div><div class="art">${art(s.t)}</div></div>
<div class="cl"><h2>Yang termasuk</h2><ul>${s.inc.map(x=>`<li>${x}</li>`).join("")}</ul></div><div class="cl"><h2>Cocok untuk</h2><p>${s.cp}</p></div>
<div class="cl"><h2>Proyek terkait</h2><ul>${s.pj.map(j=>`<li><a class="ul" href="#proyek-${j+1}">${PJ[j].n}</a></li>`).join("")}</ul></div></div></div>`)}
const MT=[["Konsultasi","Kami mendengarkan kebutuhan, lahan, dan anggaran Anda sebelum bicara angka.",["Catatan kebutuhan","Gambaran lingkup awal"]],["Survei dan pengukuran","Tim mengunjungi lokasi untuk memeriksa kondisi nyata.",["Data lapangan","Foto kondisi eksisting"]],["Desain dan RAB","Gambar kerja disusun dan biaya dirinci.",["Gambar kerja","RAB tertulis"]],["Kontrak","Lingkup, jadwal, dan termin pembayaran disepakati.",["Kontrak kerja","Jadwal pelaksanaan"]],["Pelaksanaan","Pekerjaan dimulai dengan laporan progres berkala.",["Laporan mingguan","Foto progres"]],["Serah terima","Pemeriksaan akhir dan masa pemeliharaan dimulai.",["Berita acara","Daftar perbaikan"]]];
function mp(){replaceMarkup($("v-metode"),`<div class="sp"><div class="w">${back("beranda","Beranda")}<span class="lb">Cara kami bekerja</span><h1 style="font:500 clamp(36px,5.4vw,78px)/1 var(--f);letter-spacing:-.05em;margin:16px 0 20px;max-width:800px">Enam tahap. Setiap tahap punya hasil yang bisa Anda pegang.</h1><p style="color:var(--mu);max-width:520px;margin-bottom:60px">Tidak ada pekerjaan yang dimulai sebelum lingkup, biaya, dan jadwal tertulis.</p>${MT.map((m,i)=>`<div class="ph"><span class="nm">0${i+1}</span><div><h3>${m[0]}</h3><p>${m[1]}</p></div><div><span class="lb">Anda menerima</span><ul>${m[2].map(x=>`<li>${x}</li>`).join("")}</ul></div></div>`).join("")}
<div class="pn"><a class="ul" href="#beranda">← Beranda</a><a class="bt" href="#mulai">Mulai dari tahap pertama <span>→</span></a></div></div></div>`)}
/* wizard */
const W0={s:0,t:null,l:150,a:null,w:null,n:"",c:"",m:""};let W={...W0};
const TP=["Rumah tinggal baru","Renovasi","Ruko atau gedung komersial","Gudang atau industri"],AN=["Di bawah Rp 500 juta","Rp 500 juta sampai Rp 1 miliar","Rp 1 miliar sampai Rp 5 miliar","Di atas Rp 5 miliar","Belum tahu"],WK=["Secepatnya","1 sampai 3 bulan lagi","3 sampai 6 bulan lagi","Masih merencanakan"];
function wz(){const Q=[["Proyek apa yang ingin Anda mulai?",TP,"t"],["Berapa kira-kira luasnya?",null,"l"],["Berapa anggaran yang Anda siapkan?",AN,"a"],["Kapan Anda ingin memulai?",WK,"w"],["Ke mana kami bisa menghubungi?",null,"c"]];
let h=`<div class="wz"><button class="bk" id="wb">← ${W.s?"Kembali":"Beranda"}</button><div class="pg">${[0,1,2,3,4].map(i=>`<i class="${i<=Math.min(W.s,4)?"on":""}"></i>`).join("")}</div>`;
if(W.s<5){const q=Q[W.s];h+=`<span class="lb">Pertanyaan ${W.s+1} dari 5</span><h1>${q[0]}</h1>`;
if(q[1])h+=q[1].map((o,i)=>`<button class="op" data-i="${i}" aria-pressed="${W[q[2]]===i}">${o}<span>→</span></button>`).join("");
else if(W.s===1)h+=`<div class="big" id="wl">${W.l.toLocaleString("id-ID")} m²</div><input type="range" id="wr" min="30" max="2000" step="10" value="${W.l}" aria-label="Luas bangunan"><div class="ft"><span></span><button class="bt" id="wn">Lanjut →</button></div>`;
else h+=`<input type="text" id="wn1" placeholder="Nama Anda" value="${escapeHtml(W.n)}" aria-label="Nama"><input type="text" id="wc" placeholder="Nomor WhatsApp atau email" value="${escapeHtml(W.c)}" aria-label="Kontak"><textarea id="wm" rows="2" placeholder="Catatan tambahan (opsional)">${escapeHtml(W.m)}</textarea><div class="ft"><span></span><button class="bt" id="wn">Lihat ringkasan →</button></div>`}
else{const safeName=escapeHtml(W.n),safeContact=escapeHtml(W.c);h+=`<span class="lb">Ringkasan</span><h1>Terima kasih${safeName?", "+safeName.split(" ")[0]:""}.</h1><div class="sm"><div><span>Proyek</span><b>${TP[W.t]||"-"}</b></div><div><span>Luas</span><b>${W.l.toLocaleString("id-ID")} m²</b></div><div><span>Anggaran</span><b>${AN[W.a]||"-"}</b></div><div><span>Mulai</span><b>${WK[W.w]||"-"}</b></div><div><span>Kontak</span><b>${safeContact||"-"}</b></div></div><div class="ft"><button class="ul" id="wr0">Ulangi dari awal</button><a class="bt" target="_blank" rel="noopener" href="${wl(`Halo ${BRAND}, saya ${W.n||"calon klien"}. Brief proyek: ${TP[W.t]||"-"}, luas ${W.l} m², anggaran ${AN[W.a]||"-"}, mulai ${WK[W.w]||"-"}.${W.c?" Kontak: "+W.c+".":""}${W.m?" Catatan: "+W.m:""} Mohon jadwal konsultasi dan survei.`)}">Kirim ke WhatsApp ↗</a></div>`}
replaceMarkup($("v-mulai"),h+"</div>");
const Qc=Q[W.s]&&Q[W.s][2];$("v-mulai").querySelectorAll(".op").forEach(b=>b.onclick=()=>{W[Qc]=+b.dataset.i;W.s++;wz()});
const r=$("wr");if(r)r.oninput=()=>{W.l=+r.value;$("wl").textContent=W.l.toLocaleString("id-ID")+" m²"};
const n=$("wn");if(n)n.onclick=()=>{if(W.s===4){W.n=$("wn1").value.trim();W.c=$("wc").value.trim();W.m=$("wm").value.trim()}W.s++;wz()};
$("wb").onclick=()=>{if(W.s>0){W.s--;wz()}else location.hash="beranda"};const z=$("wr0");if(z)z.onclick=()=>{W={...W0};wz()}}
document.addEventListener("click",e=>{const a=e.target.closest("a[data-i]");if(a&&a.getAttribute("href")==="#mulai"){W={...W0,t:+a.dataset.i}}});
document.addEventListener("click",e=>{
const backButton=e.target.closest("[data-back], [data-hash]");
if(backButton)location.hash=backButton.dataset.back||backButton.dataset.hash;
});
/* router */
let pend=null;
function route(){let h=location.hash.slice(1)||"beranda",v="beranda",m;
if(m=h.match(/^proyek-(\d+)$/)){if(PJ[+m[1]-1]){dp(+m[1]-1);v="detail"}}else if(m=h.match(/^layanan-(\d+)$/)){if(SV[+m[1]-1]){lp(+m[1]-1);v="layanan"}}else if(h==="metode"){mp();v="metode"}else if(h==="mulai"){if(W.s>=5)W={...W0};wz();v="mulai"}
if(typeof langitMenuButton!=="undefined"&&typeof langitMenu!=="undefined"&&typeof closeLangitMenu==="function"){closeLangitMenu()}
document.querySelectorAll(".view").forEach(e=>e.classList.toggle("on",e.id==="v-"+v));
document.title=({beranda:"Langit Karya – Kontraktor",detail:PJ[(m&&+m[1]-1)||0].n,layanan:"Layanan",metode:"Cara kerja",mulai:"Mulai proyek"})[v]+(v==="beranda"?"":" – Langit Karya");
if(pend&&v==="beranda"){const el=$(pend);pend=null;setTimeout(()=>el&&el.scrollIntoView(),50)}else window.scrollTo(0,0)}
addEventListener("hashchange",route);
document.querySelectorAll(".nl button").forEach(b=>b.onclick=()=>{const home=$("v-beranda").classList.contains("on");if(home)$(b.dataset.s).scrollIntoView();else{pend=b.dataset.s;location.hash="beranda"}});
const langitMenuButton=$("langit-menu-button"),langitMenu=$("langit-menu");
function closeLangitMenu(){langitMenu.classList.remove("open");langitMenu.setAttribute("aria-hidden","true");langitMenuButton.setAttribute("aria-expanded","false");langitMenuButton.setAttribute("aria-label","Buka menu navigasi")}
function toggleLangitMenu(){const open=!langitMenu.classList.contains("open");langitMenu.classList.toggle("open",open);langitMenu.setAttribute("aria-hidden",open?"false":"true");langitMenuButton.setAttribute("aria-expanded",open?"true":"false");langitMenuButton.setAttribute("aria-label",open?"Tutup menu navigasi":"Buka menu navigasi")}
langitMenuButton.onclick=toggleLangitMenu;
langitMenu.querySelectorAll("button").forEach(button=>button.onclick=()=>{
closeLangitMenu();
const home=$("v-beranda").classList.contains("on");
if(home)$(button.dataset.s).scrollIntoView();
else{pend=button.dataset.s;location.hash="beranda"}
});
addEventListener("keydown",e=>{if(e.key==="Escape")closeLangitMenu()});
route();
/* chat */
const KB=[
[/harga|biaya|berapa|anggaran|rab/,()=>"Biaya bergantung jenis bangunan, luas, dan spesifikasi. Kami menyusun RAB tertulis setelah survei. Untuk gambaran awal, mulai dari halaman Mulai proyek.",["Survei lokasi","Pembayaran"]],
[/survei|konsultasi|jadwal/,()=>"Konsultasi dan survei dijadwalkan lewat Mulai proyek atau WhatsApp. Tim kami menghubungi dalam satu hari kerja.",["Lanjut ke WhatsApp"]],
[/bayar|pembayaran|termin|dp/,()=>"Pembayaran umumnya bertahap (termin) sesuai progres, dan disepakati tertulis dalam kontrak.",["Durasi","Garansi"]],
[/lama|durasi|waktu|selesai/,()=>"Rumah dua lantai biasanya sekitar 7 bulan, renovasi 3 sampai 4 bulan. Jadwal pasti ditentukan setelah survei.",["Pembayaran"]],
[/izin|pbg|imb|legal/,()=>"Pendampingan perizinan bangunan sesuai ketentuan setempat dapat disediakan. Dibahas saat konsultasi.",["Survei lokasi"]],
[/garansi|pemeliharaan/,()=>"Masa pemeliharaan dan garansi pekerjaan dijelaskan tertulis dalam kontrak.",["Pembayaran"]],
[/proses|cara kerja|tahap|metode/,()=>"Kami bekerja dalam enam tahap, dari konsultasi sampai serah terima. Detailnya ada di halaman Cara kami bekerja.",["Survei lokasi"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Halo. Ada rencana proyek yang ingin dibicarakan?",["Biaya","Survei lokasi","Cara kerja"]]];
const lg=[];function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;ms.append(d);ms.scrollTop=1e9;if(c==="u")lg.push(t)}
function chips(a){cs.replaceChildren();a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>ask(v);cs.append(b)})}
function waU(){cw.href=wl(`Halo ${BRAND}, saya menghubungi dari website.`+(lg.length?` Pertanyaan saya: ${lg.join("; ")}.`:" Saya ingin konsultasi proyek."))}
function ask(t){say(t,"u");if(/whatsapp|\bwa\b|admin|manusia|sales/i.test(t)){setTimeout(()=>{say("Baik, tekan tombol di bawah. Pertanyaan Anda ikut terkirim.","b");waU()},300);return}
const m=KB.find(([r])=>r.test(t.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab tim kami langsung. Tekan WhatsApp di bawah, pertanyaan Anda ikut terkirim.","b");chips(["Biaya","Survei lokasi","Cara kerja"])}waU()},350)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let fi=true;cb.onclick=()=>{cp.classList.toggle("on");if(cp.classList.contains("on")&&fi){fi=false;say("Halo. Saya asisten virtual Langit Karya. Angka di sini contoh dan bukan penawaran final.","b");chips(["Biaya","Survei lokasi","Cara kerja"]);waU()}};x.onclick=()=>cp.classList.remove("on");
</script>
</body>
</html>
@endverbatim