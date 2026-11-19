
const AETHERION_WA_NUMBER = "6281234567890"; // Ganti dengan nomor WhatsApp admin

const $=s=>document.querySelector(s),ic=s=>`<svg><use href="#${s}"/></svg>`,rp=n=>"Rp "+n.toFixed(1).replace(".",",")+" jt";
const waLink = document.querySelector(".wa"); if (waLink) waLink.href = `https://wa.me/${AETHERION_WA_NUMBER}`;
function sendToWhatsApp(message){
  const url = `https://wa.me/${AETHERION_WA_NUMBER}?text=${encodeURIComponent(message)}`;
  window.open(url, "_blank", "noopener");
}
function sendProductInquiry(name, category){
  sendToWhatsApp(`Halo AETHERION, saya ingin bertanya tentang ${name}. Kategori: ${category}. Mohon informasi spesifikasi, harga terbaru, ketersediaan, dan garansi.`);
}
function sendBuildRequest(){
  const lines = pk.map(k => `${k}: ${sl[k]?.[0] || "-"}`);
  const total = $("#tt")?.textContent || "-";
  const compatibility = [...document.querySelectorAll("#cp .ok")].map(x=>x.textContent.trim()).join("\n");
  sendToWhatsApp(`Halo AETHERION, saya ingin mengajukan custom PC build.\n${lines.join("\n")}\nEstimasi: ${total}\nValidasi kompatibilitas:\n${compatibility}\nMohon konsultasi dan konfirmasi harga/stok.`);
}
// cube
function mk(el,s,lb){el.style.width=el.style.height=s+"px";const T=["","rotateY(180deg)","rotateY(90deg)","rotateY(-90deg)","rotateX(90deg)","rotateX(-90deg)"];el.innerHTML=T.map((t,i)=>`<div class="f" style="transform:${t} translateZ(${s/2}px)">${lb&&lb[i]?`<span>${lb[i]}</span>`:""}</div>`).join("")}
const HL=["CPU","GPU","AI","NET","SSD","RAM"];mk($("#hc"),230,HL);mk($("#m1"),46);mk($("#m2"),34);mk($("#m3"),28);
const GO={GPU:["Radeon-X Ultra","16GB GDDR7 · 360W · 3 kipas — render 4K ray tracing tanpa kompromi.",["GPU","16GB","PCIe 5","360W","3 FAN","RGB"]],CPU:["Quantum 9 CPU","24 core · 5.8GHz · LGA1851 — workstation tercepat di kelasnya.",["CPU","24C","5.8GHz","125W","LGA","AI"]],SSD:["NVMe Gen5 Pro","14GB/s baca · 4TB — loading instan.",["SSD","4TB","14GB/s","Gen5","M.2","TLC"]],Router:["Wi-Fi 7 Router","BE19000 · 46Gbps · mesh ready.",["Wi-Fi 7","46G","MESH","10G","VPN","QoS"]]};
let gk="GPU",gr=true,gy=20,gx=-18,dr=false,px=0,py=0,mx=0,my=0;
$("#gt").innerHTML=Object.keys(GO).map(k=>`<button class="${k==gk?"on":""}">${k}</button>`).join("");
function gs(){const o=GO[gk];mk($("#gc"),200,o[2]);$("#gn").textContent=o[0];$("#gd").textContent=o[1];document.querySelectorAll("#gt button").forEach(b=>b.classList.toggle("on",b.textContent==gk))}gs();
$("#gt").onclick=e=>{if(e.target.tagName=="BUTTON"){gk=e.target.textContent;gs()}};$("#ar").onclick=()=>{gr=!gr;$("#ar").textContent="Auto-rotate: "+(gr?"ON":"OFF")};
const dg=$("#dg");dg.onpointerdown=e=>{dr=1;px=e.clientX;py=e.clientY;dg.setPointerCapture(e.pointerId)};dg.onpointerup=()=>dr=0;dg.onpointermove=e=>{if(dr){gy+=(e.clientX-px)*.6;gx-=(e.clientY-py)*.6;px=e.clientX;py=e.clientY}};
let hy=0;(function lp(){hy+=.35;$("#hc").style.transform=`rotateX(${-22+my*14}deg) rotateY(${hy+mx*30}deg)`;if(gr&&!dr)gy+=.5;$("#gc").style.transform=`rotateX(${gx}deg) rotateY(${gy}deg)`;requestAnimationFrame(lp)})();
addEventListener("mousemove",e=>{mx=e.clientX/innerWidth-.5;my=e.clientY/innerHeight-.5});
// cards
const C=(id,a)=>$(id).innerHTML=a.map(o=>`<div class="cd gl rv">${o[3]?`<span class="bd">${o[3]}</span>`:""}<div class="ic">${ic(o[0])}</div><h3>${o[1]}</h3><p>${o[2]}</p><button class="btn o inq" type="button" onclick="sendProductInquiry(${JSON.stringify(o[1])},${JSON.stringify(id.replace("#",""))})">Tanya detail</button></div>`).join("");
const UN={Komputer:[["cpu","Processor","Core Ultra, Ryzen, Xeon — 6 hingga 96 core.","HOT"],["gpu","Graphics Card","RTX & Radeon untuk gaming dan AI.",""],["ssd","Storage NVMe","Gen4/Gen5 hingga 8TB.",""],["cod","Workstation","Dirakit untuk render, coding & AI/ML.","NEW"]],Jaringan:[["net","Router &amp; Wi-Fi 7","Mesh, 10G, VPN bawaan.","NEW"],["srv","Switch &amp; Core","PoE+, 10/25G, managed.",""],["shd","Firewall","Next-gen firewall & IPS.",""],["off","Access Point","Ceiling AP Wi-Fi 6E/7.",""]],Server:[["srv","Rack Server","1U/2U Xeon & EPYC.","HOT"],["ssd","Storage Array","NAS & SAN enterprise.",""],["gpu","GPU Server","Hingga 8× GPU AI.","NEW"],["shd","Backup &amp; DR","Replikasi dan pemulihan bencana.",""]]};
$("#ut").innerHTML=Object.keys(UN).map((k,i)=>`<button class="${i?"":"on"}">${k}</button>`).join("");
function un(k){C("#up",UN[k]);document.querySelectorAll("#ut button").forEach(b=>b.classList.toggle("on",b.textContent==k));rv()}
$("#ut").onclick=e=>e.target.tagName=="BUTTON"&&un(e.target.textContent);
// architecture
const AN={CPU:[400,210,"Otak sistem: mengeksekusi instruksi, mengatur semua komponen lewat chipset.","Clock · Core · Cache"],RAM:[170,90,"Memori kerja super cepat. CPU membaca data aktif dari RAM, bukan dari SSD.","Bandwidth 51 GB/s"],GPU:[630,90,"Memproses grafis dan AI paralel lewat jalur PCIe langsung ke CPU.","PCIe 5.0 x16"],SSD:[170,330,"Penyimpanan permanen; data dimuat ke RAM saat program dibuka.","NVMe 14 GB/s"],COOLER:[630,330,"Membuang panas CPU/GPU agar performa tidak turun (throttling).","TDP 250W"],PSU:[400,385,"Mengubah listrik AC menjadi DC stabil untuk seluruh komponen.","850W · 80+ Gold"]};
$("#ad").innerHTML=Object.keys(AN).filter(k=>k!="CPU").map((k,i)=>`<path class="ln" d="M400 210L${AN[k][0]} ${AN[k][1]}"/><circle r="5" fill="#2563ff"><animateMotion dur="${2+i*.4}s" repeatCount="indefinite" path="M400 210L${AN[k][0]} ${AN[k][1]}"/></circle>`).join("")+Object.keys(AN).map(k=>`<g class="nd" data-k="${k}"><rect x="${AN[k][0]-52}" y="${AN[k][1]-22}" width="104" height="44"/><text x="${AN[k][0]}" y="${AN[k][1]+5}">${k}</text></g>`).join("");
function an(k){const o=AN[k];$("#an").textContent=k;$("#ap").textContent=o[2];$("#am").innerHTML=`<div class="ok">${o[3]}</div>`;document.querySelectorAll(".nd[data-k]").forEach(n=>n.classList.toggle("on",n.dataset.k==k))}
$("#ad").onclick=e=>{const n=e.target.closest(".nd");n&&an(n.dataset.k)};an("CPU");
C("#ft",[["cpu","NPU On-Device","Chip AI lokal untuk inferensi tanpa cloud.","2026"],["net","Wi-Fi 7 &amp; 8","Multi-link operation, latensi sub-milidetik.","2026"],["ssd","PCIe 6.0 SSD","28 GB/s — dua kali Gen5.","2027"],["srv","Optical Interconnect","Transfer data antar chip dengan cahaya.","2028"],["gpu","Neural GPU","Rendering berbasis AI real-time.","2027"],["shd","Post-Quantum Security","Enkripsi tahan komputer kuantum.","2028"]]);
// studio
const P={CPU:[["Ryzen 7 9700X",5.2,"AM5",65,60],["Ryzen 9 9950X",10.2,"AM5",170,90],["Core i7-14700K",6.4,"LGA",125,75]],GPU:[["RTX 4070 Super",9.8,"",650,70],["RTX 5080",20,"",750,90],["RX 9070 XT",11.6,"",700,78]],RAM:[["32GB DDR5",2.1,"",0,40],["64GB DDR5",4.2,"",0,60]],Board:[["B650 WiFi",2.4,"AM5",0,0],["Z790 Pro",3.6,"LGA",0,0]],Storage:[["2TB NVMe Gen4",2,"",0,20],["4TB NVMe Gen5",5.5,"",0,35]],PSU:[["750W Gold",1.5,"",750,0],["1000W Platinum",2.8,"",1000,0]]};
const pk=Object.keys(P),sl={};$("#cs").innerHTML=pk.map(k=>`<div class="row"><span>${k}</span><select data-p="${k}">${P[k].map((o,i)=>`<option value="${i}">${o[0]} — ${rp(o[1])}</option>`).join("")}</select></div>`).join("");
function cf(){let t=0,pf=0;pk.forEach(k=>{sl[k]=P[k][document.querySelector(`[data-p=${k}]`).value];t+=sl[k][1];pf+=sl[k][4]});pf=Math.min(100,pf/2.4);$("#tt").textContent=rp(t);$("#pb").style.width=pf+"%";const a=sl.CPU[2]==sl.Board[2],b=sl.PSU[3]>=sl.GPU[3]+sl.CPU[3]+150;$("#cp").innerHTML=[[a,a?"CPU cocok dengan motherboard":"Soket CPU tidak cocok dengan motherboard"],[b,b?"PSU memadai untuk beban puncak":"PSU kurang — butuh ≥ "+(sl.GPU[3]+sl.CPU[3]+150)+"W"]].map(c=>`<div class="ok ${c[0]?"":"x"}">${c[0]?"✔":"✖"} ${c[1]}</div>`).join("")}
document.querySelectorAll("select[data-p]").forEach(s=>s.onchange=cf);cf();
const SM={Gaming:["Gaming Rig","FPS 4K Ultra","165 FPS",[95,88,70]],"AI Workstation":["AI Workstation","Training LLM","12× lebih cepat",[70,98,90]],"Content Creation":["Creator Studio","Render 4K","3 menit / klip",[85,90,80]],Enterprise:["Enterprise Compute","Pengguna bersamaan","2.400 user",[80,60,98]]};let sk="Gaming";
$("#st").innerHTML=Object.keys(SM).map(k=>`<button class="${k==sk?"on":""}">${k}</button>`).join("");
function sm(){const o=SM[sk];$("#sc").innerHTML=`<div>${o[0]}<br><span style="font-size:14px;color:#bfe0ff">${o[1]}: ${o[2]}</span></div>`;$("#sm").innerHTML=["Performa CPU","Performa GPU","Kapasitas Memori"].map((l,i)=>`<div style="font-weight:700;font-size:14px">${l} · ${o[3][i]}%</div><div class="bar"><i style="width:${o[3][i]}%"></i></div>`).join("")+`<a class="btn" href="#proposal">Konsultasikan Setup Ini</a>`;document.querySelectorAll("#st button").forEach(b=>b.classList.toggle("on",b.textContent==sk))}sm();
$("#st").onclick=e=>{if(e.target.tagName=="BUTTON"){sk=e.target.textContent;sm()}};
// network
const NN={Internet:[400,36,"Jaringan publik penyedia layanan; semua trafik masuk dari sini.","ISP Dual-WAN"],Firewall:[400,110,"Memfilter trafik, mendeteksi dan memblokir ancaman sebelum masuk jaringan.","IPS aktif"],Router:[400,184,"Mengarahkan paket antar jaringan dan mengelola VPN.","10 Gbps"],Switch:[400,258,"Menghubungkan semua perangkat kabel dengan PoE+.","48 port PoE+"],Server:[170,350,"Aplikasi, database, dan file kantor; di-backup otomatis.","99,9% uptime"],AP:[400,350,"Pemancar Wi-Fi 7 untuk laptop, ponsel, dan IoT.","46 Gbps"],CCTV:[630,350,"Kamera IP terhubung via PoE dan terekam ke server.","24 kamera"]};
const NL=[["Internet","Firewall"],["Firewall","Router"],["Router","Switch"],["Switch","Server"],["Switch","AP"],["Switch","CCTV"]];let sec=false;
function nt(){$("#nt").innerHTML=NL.map((l,i)=>{const a=NN[l[0]],b=NN[l[1]],d=`M${a[0]} ${a[1]}L${b[0]} ${b[1]}`;return `<path class="ln" d="${d}"/><circle r="5" fill="#2563ff"><animateMotion dur="${2+i*.3}s" repeatCount="indefinite" path="${d}"/></circle>`}).join("")+(sec?[0,1,2].map(i=>`<circle r="6" fill="#ff3d9a"><animateMotion dur="2s" begin="${i*.6}s" repeatCount="indefinite" path="M400 36L400 100"/><animate attributeName="opacity" values="1;1;0" dur="2s" begin="${i*.6}s" repeatCount="indefinite"/></circle>`).join("")+`<text x="470" y="75" font-family="Sora" font-size="12" fill="#ff3d9a" font-weight="700">ANCAMAN DIBLOKIR</text>`:"")+Object.keys(NN).map(k=>`<g class="nd" data-k="${k}"><rect x="${NN[k][0]-50}" y="${NN[k][1]-20}" width="100" height="40"/><text x="${NN[k][0]}" y="${NN[k][1]+5}">${k}</text></g>`).join("")}
function nn(k){const o=NN[k];$("#nn").textContent=k;$("#np").innerHTML=o[2]+`<br><br><span class="ok" style="display:inline-block">${o[3]}</span>`;document.querySelectorAll(".nd[data-k]").forEach(n=>n.classList.toggle("on",n.dataset.k==k&&n.closest("#nt")))}
$("#nt").onclick=e=>{const n=e.target.closest(".nd");n&&nn(n.dataset.k)};$("#sec").onclick=()=>{sec=!sec;$("#sec").textContent="Mode Keamanan: "+(sec?"ON":"OFF");nt()};nt();nn("Router");
C("#sol",[["shd","Network Security","Firewall, IPS, segmentasi VLAN, zero-trust."],["srv","System Integration","Integrasi server, aplikasi, dan jaringan end-to-end."],["off","Smart Office","Ruang kerja terhubung: AP, IoT, meeting room."],["net","Infra Monitoring","Pantau jaringan 24/7 dengan alert real-time."],["cod","Automation","Otomasi provisioning dan backup."],["ssd","Data Center","Rack, UPS, cooling, dan kabel terstruktur."]]);
$("#tl").innerHTML=[[1971,"Intel 4004","Mikroprosesor pertama"],[1999,"GPU Modern","GeForce 256 mengubah grafis"],[2007,"SSD Konsumen","Era penyimpanan flash"],[2017,"Multi-Core","Ryzen memicu perlombaan core"],[2022,"DDR5 &amp; PCIe 5","Bandwidth berlipat"],[2026,"NPU &amp; Wi-Fi 7","AI on-device"]].map(o=>`<div class="cd gl rv"><div class="y">${o[0]}</div><h3>${o[1]}</h3><p>${o[2]}</p></div>`).join("");
const LB={Memori:["DDR4-3200","DDR5-6400",25,51,"GB/s"],Storage:["NVMe Gen3","NVMe Gen5",3.5,14,"GB/s"],"Wi-Fi":["Wi-Fi 6","Wi-Fi 7",9.6,46,"Gbps"]};let lk="Memori";
$("#lt").innerHTML=Object.keys(LB).map(k=>`<button class="${k==lk?"on":""}">${k}</button>`).join("");
function lb(){const o=LB[lk],m=Math.max(o[2],o[3]);$("#lb").innerHTML=[[0,2],[1,3]].map(x=>`<div style="font-weight:700">${o[x[0]]} · ${o[x[1]]} ${o[4]}</div><div class="bar"><i style="width:${o[x[1]]/m*100}%"></i></div>`).join("")+`<div class="big">${(o[3]/o[2]).toFixed(1)}×</div><small style="color:var(--mut)">lebih cepat</small>`;document.querySelectorAll("#lt button").forEach(b=>b.classList.toggle("on",b.textContent==lk))}lb();
$("#lt").onclick=e=>{if(e.target.tagName=="BUTTON"){lk=e.target.textContent;lb()}};
$("#sp").innerHTML=[["Quantum 9 CPU",[["Core",96],["Clock",92],["Cache",80]],"Rp 12,5 jt"],["Radeon-X Ultra",[["VRAM",75],["Ray Tracing",95],["Efisiensi",82]],"Rp 21 jt"]].map(o=>`<div class="cd gl rv"><h3>${o[0]}</h3>${o[1].map(r=>`<small>${r[0]}</small><div class="bar"><i style="width:${r[1]}%"></i></div>`).join("")}<b class="u" style="color:var(--b)">${o[2]}</b></div>`).join("");
C("#lim",[["cpu","Quantum 9 Founders","Edisi 100 unit · tersisa 37","LIMITED"],["gpu","Radeon-X Ice Edition","Pendingin transparan · tersisa 12","LIMITED"],["net","Wi-Fi 7 Titan Mesh","Koleksi unggulan bulan ini","FEATURED"]]);
C("#cs2",[["off","Smart Office 120 Pegawai","Jaringan, AP, dan CCTV terintegrasi — downtime turun 92%."],["srv","Data Center Kampus","Migrasi 40 server, latensi turun 60%."],["gpu","Studio Render Animasi","12 workstation GPU — render 5× lebih cepat."]]);
// misc
function ts(m){const t=$("#ts");t.textContent=m;t.style.display="block";setTimeout(()=>t.style.display="none",2200)}
function sub(e,f){
  e.preventDefault();
  const data = new FormData(f);
  const title = f.querySelector("h3")?.textContent || "Permintaan AETHERION";
  const details = [...data.entries()].map(([k,v])=>`${k}: ${v}`).join("\\n");
  sendToWhatsApp(`Halo AETHERION, saya mengirim ${title}.\\n${details}\\nMohon konfirmasi dan tindak lanjutnya.`);
  ts("Permintaan disiapkan. Silakan kirim pesan WhatsApp untuk konfirmasi.");
  return false;
}
$("#mq").innerHTML=Array(8).fill("DIGITAL HARDWARE UNIVERSE ✦ PC · SERVER · NETWORK ✦ WI-FI 7 ✦ AI WORKSTATION ✦ ").join("");
function rv(){document.querySelectorAll(".rv:not(.in)").forEach(e=>io.observe(e))}const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add("in");io.unobserve(e.target)}}),{threshold:.1});
un("Komputer");rv();
// cursor
const cb=$("#cb"),cd=$("#cd");let cx=0,cy=0,tx=0,ty=0;
if(matchMedia("(pointer:fine)").matches){addEventListener("mousemove",e=>{if(!cb.f){cb.f=1;cx=e.clientX;cy=e.clientY;document.body.classList.add("cc")}tx=e.clientX;ty=e.clientY;cd.style.transform=`translate(${tx}px,${ty}px)`});(function f(){cx+=(tx-cx)*.16;cy+=(ty-cy)*.16;cb.style.transform=`translate(${cx}px,${cy}px)`;requestAnimationFrame(f)})();
addEventListener("mouseover",e=>{const h=e.target.closest("a,button,select,summary,.dg,.nd");cb.classList.toggle("h",!!h);cb.textContent=h?(e.target.closest(".dg")?"↔":"↗"):""})}else{cb.style.display=cd.style.display="none"}
// AI
const ai=$("#aib");for(let i=0;i<10;i++){const p=document.createElement("i");p.className="p "+["","t","d"][i%3];const a=i*36*Math.PI/180;p.style.cssText=`--x:${Math.cos(a)*56}px;--y:${Math.sin(a)*56}px;animation-delay:${i*.22}s`;ai.appendChild(p)}
addEventListener("mousemove",e=>{const r=ai.getBoundingClientRect(),dx=e.clientX-(r.left+38),dy=e.clientY-(r.top+38),d=Math.hypot(dx,dy);ai.style.transform=d<150?`translate(${dx*.18}px,${dy*.18}px) scale(1.08)`:""});
const A={"Rekomendasi PC":"Untuk AI/render: Ryzen 9 + RTX 5080 + 64GB RAM. Coba Configuration Studio di atas.","Rancang jaringan kantor":"Kami buat topologi, instalasi, dan monitoring. Lihat Network Explorer.","Cek kompatibilitas":"Studio otomatis mengecek soket CPU dan kebutuhan watt PSU.","Booking konsultasi":"Isi form booking di bagian proposal atau tekan tombol WhatsApp."};
$("#qr").innerHTML=Object.keys(A).map(k=>`<button>${k}</button>`).join("");
$("#qr").onclick=e=>{if(e.target.tagName!="BUTTON")return;const m=$("#ms");m.innerHTML+=`<div class="m u">${e.target.textContent}</div>`;m.scrollTop=1e5;setTimeout(()=>{m.innerHTML+=`<div class="m">${A[e.target.textContent]}</div>`;m.scrollTop=1e5},500)};
ai.onclick=()=>$("#chat").classList.toggle("open");
$("#mb").onclick=()=>document.querySelector("nav .l").classList.toggle("open");document.querySelectorAll("nav .l a").forEach(a=>a.addEventListener("click",()=>document.querySelector("nav .l").classList.remove("open")));
const pg=document.createElement("div");pg.id="pg";document.body.appendChild(pg);addEventListener("scroll",()=>pg.style.width=scrollY/(document.body.scrollHeight-innerHeight)*100+"%");
