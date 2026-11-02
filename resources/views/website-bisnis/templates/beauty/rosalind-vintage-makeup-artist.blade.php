@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Rosalind & Co. – Salon de Maquillage Vintage</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Limelight&family=Pinyon+Script&family=Josefin+Sans:ital,wght@0,400;0,600;1,400&display=swap">
<style>
:root{--bg:#F8EBD6;--ink:#0E3B3A;--ruby:#C4122F;--gold:#D9B56B;--blush:#F2C6C2;--lip:#C4122F;--d:'Limelight','Georgia',serif;--s:'Pinyon Script','Snell Roundhand',cursive;--b:'Josefin Sans','Century Gothic',Arial,sans-serif;box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]){--bg:#0E3B3A;--ink:#F8EBD6}}
:root[data-theme="dark"]{--bg:#0E3B3A;--ink:#F8EBD6}
html{scroll-behavior:smooth}*{box-sizing:border-box;margin:0}
body{background:var(--bg);color:var(--ink);font:400 17px/1.65 var(--b);overflow-x:hidden}
body::after{content:"";position:fixed;inset:0;pointer-events:none;z-index:90;background:radial-gradient(ellipse at center,transparent 55%,#0006 130%)}
a{color:inherit;text-decoration:none}
nav{display:flex;justify-content:space-between;align-items:center;padding:calc(20px + env(safe-area-inset-top,0px)) 5vw 0}
.logo{font:400 22px var(--d);letter-spacing:.04em}nav div{display:flex;gap:28px;font-size:14px;letter-spacing:.22em;text-transform:uppercase}
.hero{display:grid;grid-template-columns:1fr 1fr;gap:4vw;align-items:center;padding:50px 5vw 100px;max-width:1280px;margin:auto}
.pre{font:400 34px var(--s);color:var(--ruby)}
.hero h1{font:400 clamp(46px,7vw,104px)/.98 var(--d);margin:6px 0 20px}
.hero h1 em{font-style:normal;color:var(--ruby);display:block}
.hero p{max-width:40ch;font-size:18px}
.btns{display:flex;gap:14px;flex-wrap:wrap;margin-top:30px}
.btn{display:inline-block;border:2px solid var(--ink);padding:14px 30px;font:600 14px var(--b);letter-spacing:.22em;text-transform:uppercase;cursor:pointer;background:none;color:var(--ink);transition:background .3s,color .3s;position:relative}
.btn::after{content:"";position:absolute;inset:4px;border:1px solid currentColor;opacity:.5;pointer-events:none}
.btn.r{background:var(--ruby);border-color:var(--ruby);color:#FFF6E5}.btn:hover{background:var(--ink);color:var(--bg)}.btn.r:hover{background:var(--gold);border-color:var(--gold);color:#0E3B3A}
.stage{display:grid;justify-items:center;gap:56px}
.mir{position:relative;width:min(78vw,380px);height:min(100vw,500px);border-radius:999px 999px 18px 18px;background:radial-gradient(ellipse at 50% 30%,#2c7a73,#0b2e2d 70%);border:8px solid var(--gold);box-shadow:inset 0 0 40px #000a,0 30px 60px -20px #0009,0 0 0 4px #0b2e2d;display:grid;place-items:center;align-content:center;text-align:center;color:#F8EBD6}
.mir::before{content:"";position:absolute;inset:6% 12% auto auto;width:60px;height:160px;background:linear-gradient(120deg,#fff4,transparent);transform:rotate(24deg);border-radius:30px;pointer-events:none}
.bulb{position:absolute;width:15px;height:15px;margin:-7.5px;border-radius:50%;background:radial-gradient(circle at 35% 30%,#fff,#FFE9A0 45%,#E0A83B);box-shadow:0 0 10px 3px #FFD76688;animation:ch 1.6s infinite}
@keyframes ch{0%,100%{opacity:.35;box-shadow:0 0 3px 0 #FFD76644}50%{opacity:1}}
.lips{width:78%;filter:drop-shadow(0 10px 14px #0008);transition:transform .4s}
.lips path:first-child{fill:var(--lip);transition:fill .5s}.mir:hover .lips{transform:scale(1.06) rotate(-2deg)}
.shade{font:400 38px/1 var(--s);margin-top:12px;color:var(--gold)}.mir small{font-size:12px;letter-spacing:.3em;text-transform:uppercase;opacity:.8;margin-top:8px}
.tubes{display:flex;gap:18px}
.tube{border:0;background:none;cursor:pointer;display:grid;justify-items:center;gap:0;transition:transform .3s;color:var(--ink);font:600 11px var(--b);letter-spacing:.16em}
.tube i{display:block;width:30px;height:30px;background:var(--c);clip-path:polygon(0 100%,0 40%,50% 0,100% 40%,100% 100%);margin-bottom:-2px}
.tube b{display:block;width:38px;height:56px;background:linear-gradient(90deg,#8d6c2a,#F4DC9A 40%,#8d6c2a);border-radius:3px 3px 8px 8px}
.tube span{margin-top:6px}.tube:hover{transform:translateY(-8px)}.tube.on{transform:translateY(-14px)}.tube.on span{color:var(--ruby)}
.sign{background:var(--ruby);color:#FFF6E5;overflow:hidden;white-space:nowrap;padding:14px 0;border-block:4px double var(--gold)}
.sign span{display:inline-block;font:400 24px var(--d);letter-spacing:.2em;animation:mq 30s linear infinite}
@keyframes mq{to{transform:translateX(-50%)}}
.prog{background:var(--ink);color:var(--bg);padding:110px 5vw;position:relative;overflow:hidden}
.prog::before{content:"";position:absolute;left:50%;top:-40%;width:200%;height:200%;margin-left:-100%;background:repeating-conic-gradient(from 0deg at 50% 50%,#ffffff0a 0 4deg,transparent 4deg 12deg);pointer-events:none}
.frame{position:relative;max-width:900px;margin:auto;padding:60px 5vw;border:2px solid var(--gold);outline:2px solid var(--gold);outline-offset:8px;text-align:center}
.frame h2{font:400 clamp(34px,5.4vw,70px)/1.05 var(--d)}
.orn{font:400 30px var(--s);color:var(--gold);margin:8px 0 34px}
.item{display:grid;grid-template-columns:auto 1fr auto;gap:10px;align-items:baseline;text-align:left;padding:18px 0;cursor:pointer;border:0;border-top:1px solid #D9B56B55;width:100%;background:none;color:inherit;font:inherit;transition:padding .3s}
.item:hover{padding-left:14px;color:var(--gold)}
.item h3{font:400 26px/1.1 var(--d)}.item em{display:block;font:italic 400 15px var(--b);opacity:.75;margin-top:4px;max-width:36ch}
.item .dots{border-bottom:2px dotted currentColor;opacity:.45;transform:translateY(-8px)}
.item b{font:400 22px var(--d);color:var(--gold);white-space:nowrap}
.arch{display:flex;gap:30px;flex-wrap:wrap;justify-content:center;padding:100px 5vw 20px}
.arch div{width:min(250px,76vw);text-align:center}
.arch i{display:grid;place-items:end center;height:330px;border-radius:999px 999px 6px 6px;border:6px double var(--gold);background:var(--g);padding-bottom:36%;transition:transform .5s}
.arch div:hover i{transform:translateY(-10px)}
.arch svg{width:44%}.arch span{display:block;font:400 34px var(--s);color:var(--ruby);margin-top:10px}
.book{padding:110px 5vw 120px}
.ticket{position:relative;max-width:860px;margin:36px auto 0;display:grid;grid-template-columns:1fr 200px;background:#FFF6E5;color:#0E3B3A;border:3px solid var(--gold);box-shadow:0 20px 50px -20px #000a}
.ticket::before,.ticket::after{content:"";position:absolute;width:30px;height:30px;border-radius:50%;background:var(--bg);left:calc(100% - 215px);border:3px solid var(--gold)}
.ticket::before{top:-18px}.ticket::after{bottom:-18px}
.tf{padding:34px;display:grid;gap:16px;grid-template-columns:1fr 1fr}
.tf label{font:600 12px var(--b);letter-spacing:.22em;text-transform:uppercase}
.tf input,.tf select{width:100%;margin-top:4px;border:0;border-bottom:2px solid #0E3B3A;background:transparent;padding:8px 0;font:400 17px var(--b);color:#0E3B3A;border-radius:0}
.tf .full{grid-column:1/-1}
.stub{border-left:3px dashed #0E3B3A;padding:30px 20px;text-align:center;display:grid;align-content:center;gap:10px;background:var(--blush)}
.stub b{font:400 24px/1 var(--d);color:var(--ruby)}.stub small{letter-spacing:.3em;font-size:11px;text-transform:uppercase}
.book h2{font:400 clamp(34px,5.4vw,70px)/1.05 var(--d);text-align:center}
.book .pre{text-align:center;display:block}
footer{text-align:center;padding:30px 5vw 110px;font:400 28px var(--s);color:var(--gold)}
#bot{position:fixed;right:16px;bottom:calc(16px + env(safe-area-inset-bottom,0px));z-index:100}
#fab{width:74px;height:74px;border-radius:50%;border:3px double #0E3B3A;background:radial-gradient(circle at 35% 30%,#FFF1C2,#D9B56B 55%,#8d6c2a);cursor:pointer;font:400 28px var(--s);color:#0E3B3A;box-shadow:0 8px 20px #0007;animation:gl 3s ease-in-out infinite}
@keyframes gl{50%{box-shadow:0 8px 20px #0007,0 0 0 10px #D9B56B33}}
#box{display:none;position:absolute;right:0;bottom:90px;width:min(370px,calc(100vw - 32px));height:min(540px,72vh);background:#FFF6E5;color:#0E3B3A;border:3px solid #D9B56B;outline:2px solid #0E3B3A;outline-offset:-9px;overflow:hidden;flex-direction:column;box-shadow:0 30px 60px -15px #000b}
#box.on{display:flex}
.hd{background:#0E3B3A;color:#F8EBD6;padding:16px 22px;display:flex;justify-content:space-between;align-items:center}
.hd b{font:400 19px var(--d)}.hd a{font:600 12px var(--b);letter-spacing:.18em;text-transform:uppercase;background:#D9B56B;color:#0E3B3A;padding:5px 11px}
#log{flex:1;overflow:auto;padding:16px 22px;display:flex;flex-direction:column;gap:10px}
.m{max-width:88%;font-size:15px;line-height:1.5;white-space:pre-line;background:#F2C6C2;padding:9px 14px}
.m.u{align-self:flex-end;background:#0E3B3A;color:#F8EBD6}
.chips{display:flex;flex-wrap:wrap;gap:6px;padding:0 22px 10px}
.chips button{border:1px solid #0E3B3A;background:none;color:#0E3B3A;padding:3px 12px;font:600 12px var(--b);letter-spacing:.08em;cursor:pointer}
.chips button:hover{background:#C4122F;color:#fff;border-color:#C4122F}
#f{display:flex;margin:0 22px 22px;border-bottom:2px solid #0E3B3A}
#f input{flex:1;min-width:0;border:0;background:none;padding:10px 0;font:16px var(--b);color:#0E3B3A}
#f input:focus{outline:0}#f button{border:0;background:none;color:#C4122F;font:600 13px var(--b);letter-spacing:.18em;text-transform:uppercase;cursor:pointer}
:focus-visible{outline:3px solid var(--ruby);outline-offset:3px}
@media(max-width:860px){.hero{grid-template-columns:1fr}.ticket{grid-template-columns:1fr}.ticket::before,.ticket::after{display:none}.stub{border-left:0;border-top:3px dashed #0E3B3A}.tf{grid-template-columns:1fr}.item{grid-template-columns:1fr auto}.item .dots{display:none}nav div{gap:14px}.tubes{gap:12px}}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}
</style>
</head>
<body>
<nav><a class="logo" href="#">Rosalind &amp; Co.</a><div><a href="#program">Program</a><a href="#book">Tiket</a></div></nav>

<header class="hero">
  <div>
    <span class="pre">Salon de Maquillage · sejak 1954</span>
    <h1>Glamour yang <em>tak lekang waktu.</em></h1>
    <p>Riasan klasik ala bintang film era keemasan: kulit berpendar, alis tegas, dan bibir merah yang dikenang. Oleh Madame Rima, makeup artist di Surabaya.</p>
    <div class="btns"><a class="btn r" href="#book">Pesan tiket rias</a><a class="btn" href="#" data-wa="Halo Rosalind &amp; Co., saya ingin konsultasi riasan.">Konsultasi WA</a></div>
  </div>
  <div class="stage">
    <div class="mir" id="mir">
      <svg class="lips" viewBox="0 0 200 100" aria-hidden="true"><path d="M8 50C38 28 70 12 100 32C130 12 162 28 192 50C162 88 130 94 100 94C70 94 38 88 8 50Z"/><path d="M8 50C60 62 140 62 192 50" fill="none" stroke="#0007" stroke-width="3"/><ellipse cx="72" cy="30" rx="18" ry="5" fill="#fff" opacity=".35" transform="rotate(-14 72 30)"/></svg>
      <div class="shade" id="sn">Rouge Dahlia</div><small id="sd">Merah klasik bersinar</small>
    </div>
    <div class="tubes" id="tubes" role="group" aria-label="Pilih warna lipstik"></div>
  </div>
</header>

<div class="sign" aria-hidden="true"><span>★ Kini menerima booking ★ Bridal ★ Akad ★ Wisuda ★ Photoshoot ★ Kini menerima booking ★ Bridal ★ Akad ★ Wisuda ★ Photoshoot ★ </span></div>

<section class="prog" id="program">
  <div class="frame">
    <h2>Program Rias</h2><div class="orn">~ pilih pertunjukanmu ~</div>
    <div id="items"></div>
  </div>
</section>

<section class="arch" aria-hidden="true">
  <div><i style="--g:linear-gradient(170deg,#F2C6C2,#c9857f)"><svg viewBox="0 0 200 100"><path d="M8 50C38 28 70 12 100 32C130 12 162 28 192 50C162 88 130 94 100 94C70 94 38 88 8 50Z" fill="#C4122F"/></svg></i><span>Look Dahlia</span></div>
  <div><i style="--g:linear-gradient(170deg,#e9d7b3,#b8955a)"><svg viewBox="0 0 200 100"><path d="M8 50C38 28 70 12 100 32C130 12 162 28 192 50C162 88 130 94 100 94C70 94 38 88 8 50Z" fill="#E0587A"/></svg></i><span>Look Melati</span></div>
  <div><i style="--g:linear-gradient(170deg,#3a8a82,#0b2e2d)"><svg viewBox="0 0 200 100"><path d="M8 50C38 28 70 12 100 32C130 12 162 28 192 50C162 88 130 94 100 94C70 94 38 88 8 50Z" fill="#8E0F2A"/></svg></i><span>Look Kenanga</span></div>
</section>

<section class="book" id="book">
  <span class="pre">tiket masuk ke hari istimewamu</span>
  <h2>Reservasi</h2>
  <div class="ticket">
    <div class="tf">
      <label class="full">Pertunjukan (layanan)<select id="sv"></select></label>
      <label>Tanggal acara<input type="date" id="dt"></label>
      <label>Nama<input id="nm" placeholder="Nama lengkap"></label>
      <label class="full">Lokasi acara<input id="lc" placeholder="Kota atau venue"></label>
    </div>
    <div class="stub"><small>Admit One</small><b id="stn">Bridal Glamour</b><button class="btn r" id="go" style="padding:12px 10px">Kirim ke WA</button></div>
  </div>
</section>
<footer> © 2026 Rosalind &amp; Co.</footer>

<div id="bot">
  <div id="box" role="dialog" aria-label="Chat Rosalind">
    <div class="hd"><b>Concierge Rosalind</b><a href="#" id="toWA">Lanjut ke WA</a></div>
    <div id="log"></div><div class="chips" id="chips"></div>
    <form id="f"><input id="in" placeholder="Tanya layanan, harga, jadwal..." autocomplete="off" aria-label="Pesan"><button>Kirim</button></form>
  </div>
  <button id="fab" aria-label="Buka chat">R</button>
</div>

<script>
/* ===== CONFIG ===== */
const WA="6281234567890"; // format 62..., tanpa + atau 0
const S=[
 {id:"bridal",n:"Bridal Glamour",d:"Akad dan resepsi, uji coba look, touch-up sepanjang acara.",p:3500000,u:"mulai"},
 {id:"akad",n:"Akad dan Lamaran",d:"Riasan klasik tahan 8 jam dengan bulu mata dan hairdo sederhana.",p:1800000,u:"mulai"},
 {id:"wisuda",n:"Wisuda dan Gala",d:"Look elegan untuk malam penting, selesai dalam 90 menit.",p:750000,u:"mulai"},
 {id:"foto",n:"Photoshoot Retro",d:"Riasan bertema era 40-an hingga 60-an untuk sesi foto.",p:1200000,u:"mulai"},
 {id:"kelas",n:"Kelas Rias Privat",d:"Belajar menguasai bibir merah dan eyeliner klasik, 2 jam.",p:900000,u:"per sesi"}];
const SH=[{n:"Rouge Dahlia",c:"#C4122F",d:"Merah klasik bersinar"},{n:"Rosé Melati",c:"#E0587A",d:"Merah muda lembut dan manis"},{n:"Cherry Kenanga",c:"#8E0F2A",d:"Merah tua berani, cocok malam hari"},{n:"Koral Senja",c:"#F0644E",d:"Koral hangat ala musim panas"},{n:"Plum Anggrek",c:"#6B1F42",d:"Ungu anggur misterius dan dramatis"}];
const rp=n=>"Rp"+n.toLocaleString("id-ID"),$=s=>document.querySelector(s);
const wa=t=>"https://wa.me/"+WA+"?text="+encodeURIComponent(t);
/* bohlam cermin */
const mir=$("#mir");
function bulbs(){mir.querySelectorAll(".bulb").forEach(b=>b.remove());const W=mir.offsetWidth+16,H=mir.offsetHeight+16,R=W/2,cx=W/2-8,off=-8,L=2*(H-R)+Math.PI*R+W,n=Math.round(L/36),g=L/n;
 for(let i=0;i<n;i++){let d=i*g,x,y;const s1=H-R,s2=Math.PI*R;
  if(d<s1){x=off;y=off+H-d}else if(d<s1+s2){const a=Math.PI+(d-s1)/R;x=off+R+R*Math.cos(a);y=off+R+R*Math.sin(a)}else if(d<2*s1+s2){x=off+W;y=off+R+(d-s1-s2)}else{x=off+W-(d-2*s1-s2);y=off+H}
  const b=document.createElement("i");b.className="bulb";b.style.cssText=`left:${x}px;top:${y}px;animation-delay:${(i%4)*.4}s`;mir.appendChild(b)}}
bulbs();addEventListener("resize",bulbs);
/* lipstik */
SH.forEach((x,i)=>{const button=document.createElement("button");button.className="tube"+(i?"":" on");button.style.setProperty("--c",x.c);button.dataset.i=String(i);button.setAttribute("aria-label","Warna "+x.n);const color=document.createElement("i");const bar=document.createElement("b");const number=document.createElement("span");number.textContent="No."+(i+1);button.append(color,bar,number);$("#tubes").appendChild(button)});
$("#tubes").onclick=e=>{const b=e.target.closest(".tube");if(!b)return;const x=SH[b.dataset.i];document.querySelectorAll(".tube").forEach(t=>t.classList.toggle("on",t==b));
 document.documentElement.style.setProperty("--lip",x.c);$("#sn").textContent=x.n;$("#sd").textContent=x.d};
/* layanan */
S.forEach(x=>{const button=document.createElement("button");button.className="item";button.dataset.s=x.id;const copy=document.createElement("div");const title=document.createElement("h3");title.textContent=x.n;const description=document.createElement("em");description.textContent=x.d;copy.append(title,description);const dots=document.createElement("span");dots.className="dots";const price=document.createElement("b");price.textContent=rp(x.p);button.append(copy,dots,price);$("#items").appendChild(button)});
S.forEach(x=>{const option=document.createElement("option");option.value=x.id;option.textContent=x.n;$("#sv").appendChild(option)});
function pick(id){$("#sv").value=id;$("#stn").textContent=S.find(x=>x.id==id).n}
$("#items").onclick=e=>{const t=e.target.closest(".item");if(t){pick(t.dataset.s);$("#book").scrollIntoView({behavior:"smooth"})}};
$("#sv").onchange=e=>pick(e.target.value);
const sv=()=>S.find(x=>x.id==$("#sv").value);
$("#go").onclick=()=>{const d=$("#dt").value,s=sv();window.open(wa("Halo Rosalind & Co., saya mau reservasi makeup.\nLayanan: "+s.n+" ("+s.u+" "+rp(s.p)+")\nTanggal: "+(d?new Date(d).toLocaleDateString("id-ID",{day:"numeric",month:"long",year:"numeric"}):"belum pasti")+"\nLokasi: "+($("#lc").value||"-")+"\nNama: "+($("#nm").value||"-")+"\nApakah tanggal tersebut masih tersedia?"),"_blank","noopener,noreferrer")};
document.addEventListener("click",e=>{const a=e.target.closest("[data-wa]");if(a){e.preventDefault();window.open(wa(a.dataset.wa),"_blank","noopener,noreferrer")}});
/* ===== Chatbot ===== */
const box=$("#box"),log=$("#log"),inp=$("#in"),hist=[];let hi=false;
const KB=[
 [/layanan|jasa|paket|program/,()=>"Program kami:\n"+S.map(x=>"• "+x.n+" "+rp(x.p)).join("\n")+"\nKetik “saya mau bridal” untuk memilihnya."],
 [/harga|biaya|tarif|berapa/,()=>S.map(x=>x.n+": "+x.u+" "+rp(x.p)).join("\n")],
 [/dp|bayar|pembayaran|booking|reservasi/,()=>"Reservasi cukup DP 30% untuk mengunci tanggal, pelunasan H-3. Isi tiket Reservasi atau tekan “Lanjut ke WA”."],
 [/area|lokasi|datang|luar kota|home service|studio/,()=>"Kami melayani home service di Surabaya dan Sidoarjo, juga di studio. Luar kota bisa dengan biaya transport dan akomodasi."],
 [/produk|brand|halal|alergi|sensitif|kulit/,()=>"Produk halal, bebas paraben, dan disesuaikan dengan jenis kulitmu. Sampaikan alergi saat konsultasi ya."],
 [/tahan|awet|luntur|jam/,()=>"Riasan dirancang tahan hingga 8 jam, tahan keringat dan air mata. Paket Bridal sudah termasuk touch-up."],
 [/uji|trial|coba|konsultasi/,()=>"Uji coba look tersedia untuk Bridal dan Akad, 2–4 minggu sebelum acara. Konsultasi awal gratis lewat WhatsApp."],
 [/lipstik|bibir|warna|shade/,()=>"Koleksi bibir kami: "+SH.map(x=>x.n).join(", ")+". Coba satu per satu di cermin di halaman utama!"],
 [/rekomen|bingung|saran|cocok/,()=>"Ceritakan tema acara dan warna busanamu, Madame Rima akan memilihkan look terbaik. Mau dihubungkan ke WhatsApp?"],
 [/halo|hai|hi\b|pagi|siang|malam/,()=>"Selamat datang di Rosalind & Co. Acara istimewa apa yang sedang Anda siapkan?"]
];
function add(t,u){const d=document.createElement("div");d.className="m"+(u?" u":"");d.textContent=t;log.appendChild(d);log.scrollTop=log.scrollHeight}
function ask(t){if(!t.trim())return;add(t,1);hist.push("Saya: "+t);const l=t.toLowerCase();let a;
 const it=S.find(x=>l.includes(x.id)||l.includes(x.n.split(" ")[0].toLowerCase()));
 if(it&&/mau|ingin|pilih|booking|pesan|reservasi/.test(l)){pick(it.id);a=it.n+" sudah dipilih di tiket Reservasi. Lengkapi tanggal dan lokasi, atau tekan “Lanjut ke WA” untuk langsung berbincang dengan Madame Rima."}
 else if(it)a=it.n+": "+it.d+" "+it.u+" "+rp(it.p)+"."
 else{const k=KB.find(([r])=>r.test(l));a=k?k[1]():"Pertanyaan itu paling tepat dijawab Madame Rima langsung. Tekan “Lanjut ke WA” di atas."}
 setTimeout(()=>{add(a);hist.push("Concierge: "+a)},450)}
$("#fab").onclick=()=>{if(box.classList.toggle("on")&&!hi){hi=true;add("Selamat datang di Rosalind & Co. Saya dapat membantu soal program rias, harga, jadwal, atau reservasi.");["Lihat program","Harga","DP & booking","Area","Warna lipstik"].forEach(c=>{const button=document.createElement("button");button.type="button";button.textContent=c;$("#chips").appendChild(button)} )}};
$("#chips").onclick=e=>{if(e.target.tagName=="BUTTON")ask(e.target.textContent)};
$("#f").onsubmit=e=>{e.preventDefault();ask(inp.value);inp.value=""};
$("#toWA").onclick=e=>{e.preventDefault();window.open(wa("Halo Rosalind & Co., saya lanjut dari chat website:\n"+(hist.slice(-6).join("\n")||"Saya ingin konsultasi makeup.")+"\nLayanan terpilih: "+sv().n),"_blank","noopener,noreferrer")};
pick(S[0].id);
</script>
</body>
</html>

@endverbatim
