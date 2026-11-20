
/* ===== KONFIGURASI: nomor WA format internasional tanpa + dan tanpa 0 di depan ===== */
const WA_NUMBER="6281234567890",BRAND="Zamrud Karya";
const $=i=>document.getElementById(i),wl=t=>"https://wa.me/"+WA_NUMBER+"?text="+encodeURIComponent(t);
function replaceMarkup(el,markup){const range=document.createRange();range.selectNodeContents(el);range.deleteContents();el.append(range.createContextualFragment(markup))}
function escapeHtml(value){const node=document.createElement("span");node.textContent=String(value);return node.innerHTML}
const MAT=[["Marmer putih","#EDE9E1","Terang, bersih, dan lapang. Cocok untuk hunian bergaya kontemporer.",1.35],["Travertine","#D9C9A8","Hangat dan bertekstur alami, menua dengan anggun.",1.2],["Kayu walnut","#6B4A32","Pekat, akrab, dan berkarakter kuat.",1.25],["Andesit gelap","#3A3F3E","Kokoh dan modern, kontras indah dengan kaca.",1.1]];
const ACC=[["Kuningan","#B89B72",1.1],["Hitam doff","#1B1B1B",1],["Tembaga","#B56B45",1.12]];
const VAR=[
[["m",110,235,360,95],["g",130,250,200,70],["s",100,225,380,10],["m",230,150,400,70],["g",250,165,260,45],["s",220,140,420,10],["p",500,300,230,34]],
[["m",90,250,500,80],["g",110,262,300,58],["s",80,240,520,10],["m",300,190,240,50],["g",315,200,150,32],["s",290,180,260,10],["p",610,305,150,26]],
[["m",80,230,250,100],["g",95,245,150,75],["s",70,220,270,10],["m",400,200,300,130],["g",420,215,180,100],["s",390,190,320,10],["m",150,150,160,70],["s",140,140,180,10]],
[["m",60,240,680,90],["g",80,255,420,65],["s",50,230,700,10],["m",200,170,300,60],["g",215,182,180,40],["s",190,160,320,10],["p",540,300,200,28]],
[["m",300,80,200,250],["g",320,100,80,70],["g",320,200,80,90],["s",290,70,220,10],["m",160,250,140,80],["g",172,262,80,56],["s",150,240,160,10],["m",500,230,140,100]]];
let gid=0;
function villa(mode,f,a,v){const id="g"+gid++,B=mode==="line",st="#B89B72";let s=`<svg viewBox="0 0 800 400" preserveAspectRatio="xMidYMid meet" aria-hidden="true"><defs><linearGradient id="${id}" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#8FD3BF"/><stop offset="1" stop-color="#1F6F5C"/></linearGradient></defs>`;
if(B)s+=`<g fill="none" stroke="${st}" stroke-width="1.2"><path d="M20 330H780"/>`;else s+=`<rect x="0" y="330" width="800" height="70" fill="#06241C"/><ellipse cx="400" cy="334" rx="360" ry="9" fill="#000" opacity=".35"/><g>`;
[[58,300],[752,300]].forEach(t=>{s+=B?`<circle cx="${t[0]}" cy="${t[1]-26}" r="30"/><path d="M${t[0]} 330V${t[1]}"/>`:`<path d="M${t[0]} 330V${t[1]}" stroke="#3b2a1d" stroke-width="5"/><circle cx="${t[0]}" cy="${t[1]-26}" r="30" fill="#1E7A5E"/><circle cx="${t[0]-10}" cy="${t[1]-34}" r="16" fill="#2E946F" opacity=".7"/>`});
VAR[v].forEach(r=>{const [t,x,y,w,h]=r;
if(B){s+=`<rect x="${x}" y="${y}" width="${w}" height="${h}"/>`;if(t==="g")for(let k=1;k<Math.floor(w/40);k++)s+=`<path d="M${x+k*40} ${y}V${y+h}"/>`;if(t==="p")s+=`<path d="M${x+10} ${y+10}H${x+w-10}M${x+10} ${y+20}H${x+w-30}" stroke-opacity=".6"/>`}
else{const fl=t==="m"?f:t==="s"?"#141414":t==="g"?`url(#${id})`:"#7BD5CF";s+=`<rect x="${x}" y="${y}" width="${w}" height="${h}" fill="${fl}" stroke="${t==="p"?"#EDE9E1":"none"}"/>`;
if(t==="m"&&w>180)for(let k=x+14;k<x+w-8;k+=26)s+=`<rect x="${k}" y="${y+5}" width="3" height="${h-10}" fill="${a}" opacity=".55"/>`;
if(t==="g")s+=`<path d="M${x+w*.2} ${y}L${x+w*.45} ${y+h}" stroke="#fff" stroke-opacity=".22" stroke-width="9"/>`}});
return s+"</g></svg>"}
/* beranda */
replaceMarkup(sl,villa("line",0,0,0));replaceMarkup(rd,villa("r","#EDE9E1","#B89B72",0));
rg.oninput=()=>hero.style.setProperty("--p",rg.value+"%");
addEventListener("scroll",()=>hn.classList.toggle("s",scrollY>40),{passive:true});
const PJ=[
{n:"Villa Tirta Lembah",k:"Hunian tepi lembah",l:"650 m²",d:"14 bulan",y:"2025",v:0,m:1,a:0,ds:"Villa dua massa dengan kolam yang mengalir mengikuti kontur lahan.",mt:["Fasad travertine","Aksen kuningan","Kaca rendah emisi","Lantai batu alam"],tc:["Kontur lahan curam membutuhkan pondasi bertingkat","Bentang kaca lebar dengan struktur tersembunyi"]},
{n:"Rumah Pavilion Selatan",k:"Rumah satu lantai panjang",l:"420 m²",d:"11 bulan",y:"2025",v:1,m:0,a:2,ds:"Rumah pavilion rendah dengan taman dalam dan sirkulasi udara silang.",mt:["Fasad marmer putih","Aksen tembaga","Plafon kayu","Taman dalam"],tc:["Atap datar tipis dengan drainase tersembunyi","Ventilasi silang tanpa kehilangan privasi"]},
{n:"Residensi Taman Kembar",k:"Dua unit berdampingan",l:"900 m²",d:"16 bulan",y:"2024",v:2,m:3,a:1,ds:"Dua hunian berdampingan dengan halaman bersama yang tetap menjaga privasi.",mt:["Fasad andesit gelap","Aksen hitam doff","Kaca laminasi","Lansekap terpadu"],tc:["Dinding pemisah akustik antar unit","Sistem utilitas terpisah untuk tiap unit"]},
{n:"Clubhouse Riverside",k:"Fasilitas klub privat",l:"1.400 m²",d:"18 bulan",y:"2025",v:3,m:1,a:0,ds:"Clubhouse bentang lebar dengan kolam, ruang pertemuan, dan teras terbuka.",mt:["Fasad travertine","Aksen kuningan","Lantai marmer","Plafon akustik"],tc:["Bentang lebar tanpa kolom di ruang utama","Pengendalian kelembapan di area kolam"]},
{n:"Penthouse Renovasi Total",k:"Renovasi hunian vertikal",l:"280 m²",d:"6 bulan",y:"2024",v:4,m:2,a:0,ds:"Perombakan total penthouse dengan tata ruang baru dan material pilihan.",mt:["Panel kayu walnut","Aksen kuningan","Lantai marmer","Pencahayaan tersembunyi"],tc:["Material diangkut dengan jadwal ketat gedung","Pekerjaan senyap agar penghuni lain tidak terganggu"]}];
replaceMarkup(hs,PJ.map((p,i)=>`<a class="cd" href="#proyek-${i+1}"><div class="im">${villa("r",MAT[p.m][1],ACC[p.a][1],p.v)}</div><h3>${p.n}</h3><small>${p.k} · ${p.l}</small></a>`).join(""));
pa.onclick=()=>hs.scrollBy({left:-420,behavior:"smooth"});na.onclick=()=>hs.scrollBy({left:420,behavior:"smooth"});
let dn=0,sx=0,sl0=0;hs.onpointerdown=e=>{if(e.pointerType==="mouse"){dn=1;sx=e.clientX;sl0=hs.scrollLeft}};hs.onpointermove=e=>{if(dn){hs.classList.add("dg");hs.scrollLeft=sl0-(e.clientX-sx)}};addEventListener("pointerup",()=>{dn=0;hs.classList.remove("dg")});
hs.addEventListener("click",e=>{if(Math.abs(hs.scrollLeft-sl0)>6&&dn===0&&hs.dataset.m==="1")e.preventDefault()});
replaceMarkup(sw,MAT.map((m,i)=>`<button data-i="${i}"><div class="sc" style="--c:${m[1]}"></div><b>${m[0]}</b><small>Coba di studio →</small></button>`).join(""));
let MS={f:0,a:0};sw.onclick=e=>{const b=e.target.closest("button");if(b){MS.f=+b.dataset.i;location.hash="material"}};
/* subhalaman */
const bk=(h,t)=>`<button class="bk" data-back="${h}">← ${t}</button>`;
function dp(i){const p=PJ[i],pv=PJ[(i+4)%5],nx=PJ[(i+1)%5];
replaceMarkup($("v-detail"),`<div class="sp"><div class="w">${bk("beranda","Semua karya")}<div class="dh"><div><span class="lb">${p.k} · ${p.y}</span><h1>${p.n}</h1><p>${p.ds}</p><div style="margin-top:34px"><a class="bt f" target="_blank" rel="noopener" href="${wl(`Halo ${BRAND}, saya tertarik dengan karya seperti "${p.n}". Mohon jadwal konsultasi privat.`)}">Diskusikan proyek serupa</a></div></div><div class="im2">${villa("r",MAT[p.m][1],ACC[p.a][1],p.v)}</div></div>
<div class="fx"><div><small>Luas</small><b>${p.l}</b></div><div><small>Durasi</small><b>${p.d}</b></div><div><small>Tahun</small><b>${p.y}</b></div><div><small>Material utama</small><b>${MAT[p.m][0]}</b></div></div>
<div class="cl"><h2>Material pilihan</h2><ul>${p.mt.map(x=>`<li>${x}</li>`).join("")}</ul></div><div class="cl"><h2>Tantangan dan solusi</h2><ul>${p.tc.map(x=>`<li>${x}</li>`).join("")}</ul></div>
<div class="gl"><div></div><div></div><div></div></div><p class="lb" style="margin-top:14px">Ruang untuk foto proyek</p>
<div class="pn"><a class="ul" href="#proyek-${(i+4)%5+1}">← ${pv.n}</a><a class="ul" href="#proyek-${(i+1)%5+1}">${nx.n} →</a></div></div></div>`);
document.addEventListener("click",e=>{const back=e.target.closest("[data-back],[data-hash]");if(back)location.hash=back.dataset.back||back.dataset.hash})}
function mp(){const f=MAT[MS.f],a=ACC[MS.a],base=9e6,lo=base*f[3]*a[2]*.9/1e6,hi=base*f[3]*a[2]*1.2/1e6;
replaceMarkup($("v-material"),`<div class="sp"><div class="w">${bk("beranda","Beranda")}<span class="lb">Material studio</span><h1 style="font:400 clamp(38px,5.4vw,78px)/1 var(--d);letter-spacing:-.02em;margin:16px 0 40px">Rancang <em>karakter</em> rumahmu.</h1>
<div class="mg"><div class="im2">${villa("r",f[1],a[1],0)}</div><div class="cn2"><h3>Material fasad</h3><div class="sr" id="sf">${MAT.map((m,i)=>`<button style="--c:${m[1]}" data-i="${i}" aria-pressed="${i===MS.f}" aria-label="${m[0]}"></button>`).join("")}</div><h3>Aksen</h3><div class="sr" id="sa">${ACC.map((m,i)=>`<button style="--c:${m[1]}" data-i="${i}" aria-pressed="${i===MS.a}" aria-label="${m[0]}"></button>`).join("")}</div>
<div class="pf"><b>${f[0]} + ${a[0]}</b><p>${f[2]}</p><span class="lb">Investasi indikatif (contoh)</span><div class="rg">Rp ${lo.toFixed(1).replace(".",",")} – ${hi.toFixed(1).replace(".",",")} jt / m²</div><small>Kisaran awal untuk pekerjaan keseluruhan pada kelas hunian eksklusif. Angka final mengikuti desain, lokasi, dan spesifikasi.</small>
<a class="bt f" target="_blank" rel="noopener" href="${wl(`Halo ${BRAND}, saya tertarik dengan kombinasi material: fasad ${f[0]} dengan aksen ${a[0]}. Mohon konsultasi.`)}">Diskusikan kombinasi ini</a><div style="margin-top:20px"><a class="ul" href="#privat">Atau jadwalkan konsultasi privat</a></div></div></div></div></div></div>`); 
$("sf").onclick=e=>{const b=e.target.closest("button");if(b){MS.f=+b.dataset.i;mp()}};$("sa").onclick=e=>{const b=e.target.closest("button");if(b){MS.a=+b.dataset.i;mp()}}}
const PR=[["Pertemuan pertama","Kami mendengarkan cara Anda hidup, bukan hanya ruang yang Anda butuhkan.","Catatan gaya hidup"],["Telaah lahan","Kondisi tanah, arah matahari, dan batasan peraturan dikaji menyeluruh.","Laporan lahan"],["Konsep desain","Arsitek menyajikan gagasan massa, denah, dan suasana ruang.","Konsep dan visual"],["Rincian dan RAB","Gambar kerja, spesifikasi material, dan anggaran dirinci tertulis.","Gambar kerja dan RAB"],["Kontrak","Lingkup, jadwal, dan termin pembayaran dikunci bersama.","Kontrak kerja"],["Pembangunan","Pelaksanaan dengan laporan berkala, kunjungan lokasi, dan kendali mutu.","Laporan dan foto progres"],["Serah terima","Pemeriksaan akhir bersama, lalu masa pemeliharaan dimulai.","Berita acara dan panduan hunian"]];
function pp(){replaceMarkup($("v-proses"),`<div class="sp"><div class="w">${bk("beranda","Beranda")}<div style="text-align:center;max-width:760px;margin:auto"><span class="lb">Perjalanan klien</span><h1 style="font:400 clamp(38px,5.4vw,78px)/1 var(--d);letter-spacing:-.02em;margin:16px 0 20px">Tujuh tahap, tanpa <em>kejutan.</em></h1><p style="color:var(--mu)">Setiap tahap punya hasil yang bisa Anda pegang sebelum melangkah ke tahap berikutnya.</p></div>
<div class="tl" style="margin-top:80px">${PR.map((s,i)=>`<div class="st"><div><span class="nm">0${i+1}</span><h3>${s[0]}</h3><p>${s[1]}</p><small>Anda menerima: ${s[2]}</small></div></div>`).join("")}</div>
<div style="text-align:center;margin-top:50px"><a class="bt f" href="#privat">Mulai dari pertemuan pertama →</a></div></div></div>`)}
let PV={w:0};
function vp(){replaceMarkup($("v-privat"),`<div class="sp"><div class="w">${bk("beranda","Beranda")}<div class="pv"><div><span class="lb">Konsultasi privat</span><h1>Satu percakapan, tanpa <em>kewajiban.</em></h1><p class="nt">Ceritakan rencana Anda. Kami mendengarkan, lalu menyampaikan pandangan jujur tentang kelayakan dan langkah berikutnya.</p><ul><li>Seluruh informasi dijaga kerahasiaannya</li><li>Respons dalam satu hari kerja (contoh)</li><li>Konsultasi awal dengan arsitek pendamping</li></ul></div>
<div class="fm"><label for="fn">Nama</label><input id="fn" placeholder="Nama lengkap"><label for="fc">Kontak (WhatsApp atau email)</label><input id="fc" placeholder="Nomor atau alamat email"><label for="ft">Jenis proyek</label><select id="ft"><option>Hunian baru di lahan sendiri</option><option>Renovasi total</option><option>Villa atau rumah peristirahatan</option><option>Klub atau fasilitas privat</option></select>
<div class="r2"><div><label for="fl">Luas lahan (m²)</label><input id="fl" placeholder="Perkiraan"></div><div><label for="fb">Rentang investasi</label><select id="fb"><option>Di atas Rp 3 miliar</option><option>Rp 3 sampai 6 miliar</option><option>Rp 6 sampai 12 miliar</option><option>Di atas Rp 12 miliar</option></select></div></div>
<label>Waktu konsultasi</label><div class="pl" id="pl">${["Pagi","Siang","Sore"].map((x,i)=>`<button type="button" data-i="${i}" aria-pressed="${i===PV.w}">${x}</button>`).join("")}</div><label for="fd">Tanggal</label><input id="fd" type="date"><label for="fm">Catatan</label><textarea id="fm" rows="2" placeholder="Opsional"></textarea><a class="bt f" id="fw" href="#" target="_blank" rel="noopener">Kirim permintaan ke WhatsApp</a></div></div></div></div>`); 
const dd=new Date();dd.setDate(dd.getDate()+1);$("fd").min=dd.toISOString().slice(0,10);
const up=()=>{const T=["pagi","siang","sore"],d=$("fd").value?new Date($("fd").value+"T00:00").toLocaleDateString("id-ID",{weekday:"long",day:"numeric",month:"long"}):"belum dipilih";
$("fw").href=wl(`Halo ${BRAND}, saya ${$("fn").value||"calon klien"}. Saya ingin konsultasi privat untuk: ${$("ft").value}. Luas lahan: ${$("fl").value||"-"} m². Rentang investasi: ${$("fb").value}. Waktu: ${T[PV.w]}, ${d}. Kontak: ${$("fc").value||"-"}.${$("fm").value?" Catatan: "+$("fm").value:""}`)};
["fn","fc","ft","fl","fb","fd","fm"].forEach(i=>$(i).oninput=up);$("pl").onclick=e=>{const b=e.target.closest("button");if(b){PV.w=+b.dataset.i;$("pl").querySelectorAll("button").forEach(x=>x.setAttribute("aria-pressed",x===b));up()}};up()}
/* router */
let pend=null;
function route(){let h=location.hash.slice(1)||"beranda",v="beranda",m,t="Zamrud Karya – Kontraktor Hunian Eksklusif";
if(m=h.match(/^proyek-(\d+)$/)){if(PJ[+m[1]-1]){dp(+m[1]-1);v="detail";t=PJ[+m[1]-1].n}}else if(h==="material"){mp();v="material";t="Material studio"}else if(h==="proses"){pp();v="proses";t="Perjalanan klien"}else if(h==="privat"){vp();v="privat";t="Konsultasi privat"}
document.querySelectorAll(".view").forEach(e=>e.classList.toggle("on",e.id==="v-"+v));document.title=v==="beranda"?t:t+" – Zamrud Karya";
if(typeof closeZamrudMenu==="function")closeZamrudMenu();
if(pend&&v==="beranda"){const el=$(pend);pend=null;setTimeout(()=>el&&el.scrollIntoView(),60)}else window.scrollTo(0,0)}
addEventListener("hashchange",route);
document.querySelectorAll(".nl button").forEach(b=>b.onclick=()=>{if($("v-beranda").classList.contains("on"))$(b.dataset.s).scrollIntoView();else{pend=b.dataset.s;location.hash="beranda"}});route();
const zamrudMenuButton=$("zamrud-menu-button"),zamrudMenu=$("zamrud-menu");
function closeZamrudMenu(){zamrudMenu.classList.remove("open");zamrudMenu.setAttribute("aria-hidden","true");zamrudMenuButton.setAttribute("aria-expanded","false");zamrudMenuButton.setAttribute("aria-label","Buka menu navigasi")}
function toggleZamrudMenu(){const open=!zamrudMenu.classList.contains("open");zamrudMenu.classList.toggle("open",open);zamrudMenu.setAttribute("aria-hidden",open?"false":"true");zamrudMenuButton.setAttribute("aria-expanded",open?"true":"false");zamrudMenuButton.setAttribute("aria-label",open?"Tutup menu navigasi":"Buka menu navigasi")}
zamrudMenuButton.onclick=toggleZamrudMenu;
zamrudMenu.querySelectorAll("button").forEach(button=>button.onclick=()=>{closeZamrudMenu();if($("v-beranda").classList.contains("on"))$(button.dataset.s).scrollIntoView();else{pend=button.dataset.s;location.hash="beranda"}});
addEventListener("keydown",e=>{if(e.key==="Escape"){closeZamrudMenu();cn.classList.remove("on")}});
/* concierge */
const KB=[
[/harga|biaya|berapa|investasi|anggaran/,()=>"Investasi bergantung desain, lokasi, dan material. Di Material studio tersedia kisaran indikatif per meter persegi. Angka final kami sampaikan setelah survei dan gambar kerja.",["Konsultasi privat","Durasi"]],
[/material|marmer|kayu|travertine|batu/,()=>"Silakan jelajahi Material studio untuk mencoba kombinasi fasad dan aksen pada rumah ilustrasi.",["Konsultasi privat"]],
[/lama|durasi|waktu|selesai/,()=>"Hunian eksklusif umumnya memerlukan 11 sampai 18 bulan, bergantung luas dan kompleksitas. Jadwal pasti ditetapkan dalam kontrak.",["Perjalanan klien"]],
[/proses|tahap|perjalanan|cara kerja/,()=>"Kami bekerja dalam tujuh tahap, dari pertemuan pertama sampai serah terima. Detailnya ada di halaman Perjalanan klien.",["Konsultasi privat"]],
[/konsultasi|jadwal|survei|bertemu/,()=>"Konsultasi privat dapat dijadwalkan lewat halaman Konsultasi privat atau WhatsApp. Kami merespons dalam satu hari kerja.",["Lanjut ke WhatsApp"]],
[/bayar|pembayaran|termin/,()=>"Pembayaran bertahap sesuai progres, dan disepakati tertulis dalam kontrak.",["Durasi"]],
[/izin|pbg|legal/,()=>"Pendampingan perizinan sesuai ketentuan setempat dapat disediakan dan dibahas saat konsultasi.",["Konsultasi privat"]],
[/rahasia|privasi|privat/,()=>"Proyek privat ditangani dengan diskresi penuh. Informasi Anda tidak dibagikan tanpa persetujuan.",["Konsultasi privat"]],
[/halo|hai|hi\b|pagi|siang|malam/,()=>"Selamat datang di Zamrud Karya. Bagaimana kami dapat membantu Anda hari ini?",["Investasi","Material","Perjalanan klien","Konsultasi privat"]]];
const lg=[];function say(t,c){const d=document.createElement("div");d.className="m "+c;d.textContent=t;ms.append(d);ms.scrollTop=1e9;if(c==="u")lg.push(t)}
function chips(a){cs.replaceChildren();a.forEach(v=>{const b=document.createElement("button");b.textContent=v;b.onclick=()=>ask(v);cs.append(b)})}
function waU(){cw.href=wl(`Halo ${BRAND}, saya menghubungi dari website.`+(lg.length?` Pertanyaan saya: ${lg.join("; ")}.`:" Saya ingin konsultasi proyek."))}
function ask(t){say(t,"u");if(/whatsapp|\bwa\b|admin|manusia|arsitek/i.test(t)){setTimeout(()=>{say("Baik, tekan tautan WhatsApp di bawah. Pertanyaan Anda ikut terkirim.","b");waU()},300);return}
const m=KB.find(([r])=>r.test(t.toLowerCase()));setTimeout(()=>{if(m){say(m[1](),"b");chips(m[2])}else{say("Pertanyaan ini lebih tepat dijawab tim kami langsung. Silakan lanjutkan ke WhatsApp, pertanyaan Anda ikut terkirim.","b");chips(["Investasi","Material","Konsultasi privat"])}waU()},400)}
cf.onsubmit=e=>{e.preventDefault();const v=ci.value.trim();if(v){ci.value="";ask(v)}};
let fi=true;cb.onclick=()=>{cn.classList.add("on");if(fi){fi=false;say("Selamat datang di Zamrud Karya. Saya concierge virtual, siap membantu soal karya, material, dan konsultasi. Angka di sini bersifat contoh.","b");chips(["Investasi","Material","Perjalanan klien","Konsultasi privat"]);waU()}setTimeout(()=>ci.focus(),100)};x.onclick=()=>cn.classList.remove("on");
addEventListener("keydown",e=>{if(e.key==="Escape")cn.classList.remove("on")});
