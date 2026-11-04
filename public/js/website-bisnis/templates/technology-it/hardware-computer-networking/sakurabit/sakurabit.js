const SAKURABIT_WA_NUMBER = "6281234567890"; // Ganti nomor demo ini dengan nomor WhatsApp toko.
const R=n=>"Rp "+n.toLocaleString("id-ID"),$=s=>document.querySelector(s),G=["linear-gradient(135deg,#2b1f3f,#4a2a48)","linear-gradient(135deg,#16243f,#24407a)","linear-gradient(135deg,#142e33,#1f5a5a)","linear-gradient(135deg,#33232a,#5a3340)","linear-gradient(135deg,#1b1f36,#3a3f7a)","linear-gradient(135deg,#2a1d24,#6b3a4c)"];
const P={CPU:{i:"🧠",o:[["Ryzen 5 7600","6C/12T · 5.1GHz",3200000,"AM5",65,60],["Ryzen 7 7800X3D","8C/16T · 3D V-Cache",6500000,"AM5",120,95],["Core i5-13400F","10C/16T · 4.6GHz",3000000,"LGA",65,58]]},
GPU:{i:"🎮",o:[["RTX 4060","8GB GDDR6",5200000,"",550,50],["RTX 4070","12GB GDDR6X",9800000,"",650,75],["RX 7800 XT","16GB GDDR6",8900000,"",700,80]]},
RAM:{i:"💾",o:[["16GB DDR5 5600","2×8GB",1100000,"",0,10],["32GB DDR5 6000","2×16GB RGB",2100000,"",0,20]]},
Motherboard:{i:"🧩",o:[["B650M Sakura","AM5 · mATX",2200000,"AM5",0,0],["B760M Pro","LGA1700 · DDR5",2000000,"LGA",0,0],["Z790 Gaming","LGA1700 · WiFi 6E",3800000,"LGA",0,0]]},
SSD:{i:"💿",o:[["500GB NVMe","Gen3 · 3.5GB/s",650000,"",0,5],["1TB NVMe","Gen4 · 7GB/s",1100000,"",0,10],["2TB NVMe","Gen4 · 7.4GB/s",2000000,"",0,12]]},
PSU:{i:"🔋",o:[["550W Bronze","80+ Bronze",650000,"",550,0],["650W Gold","80+ Gold",1100000,"",650,0],["750W Gold","80+ Gold Modular",1500000,"",750,0]]},
Cooling:{i:"❄️",o:[["Air Cooler Mini","Tower 120mm",250000,"",0,0],["Sakura AIO 240","Liquid 240mm RGB",1300000,"",0,5],["AIO 360 Pro","Liquid 360mm",1900000,"",0,8]]}};
const ks=Object.keys(P),sel={};
$("#mq").innerHTML=Array(2).fill("❖ CPU ✦ GPU ✦ RAM ✦ SSD ✦ ROUTER ✦ WI-FI 6 ✦ CABLE ✦ GAMING ✦ RGB ✦ ").join("").repeat(3);
$("#cfg").innerHTML=ks.map(k=>`<div class="row"><span>${P[k].i} ${k}</span><select data-k="${k}">${P[k].o.map((o,i)=>`<option value="${i}">${o[0]} — ${R(o[2])}</option>`).join("")}</select></div>`).join("");
function calc(){let t=0,pf=0,C=[];ks.forEach(k=>{sel[k]=P[k].o[document.querySelector(`[data-k=${k}]`).value];t+=sel[k][2];pf+=sel[k][5]});
$("#tot").textContent=R(t);pf=Math.min(100,pf);$("#pb").style.width=pf+"%";$("#pf").textContent=pf>80?"Ultra 🔥":pf>55?"High ⚡":"Mantap 🌸";
const a=sel.CPU[3]==sel.Motherboard[3],b=sel.PSU[4]>=sel.GPU[4];
C.push([a,a?"CPU cocok dengan motherboard ("+sel.CPU[3]+")":"Soket CPU ("+sel.CPU[3]+") tidak cocok dengan motherboard"],[b,b?"PSU "+sel.PSU[4]+"W cukup untuk GPU":"PSU kurang watt, minimal "+sel.GPU[4]+"W"],[true,"RAM DDR5 didukung semua motherboard"]);
$("#cmp").innerHTML=C.map(c=>`<div class="ok ${c[0]?"":"bad"}">${c[0]?"✅":"⚠️"} ${c[1]}</div>`).join("");
$("#pv").innerHTML=ks.map(k=>`<span title="${sel[k][0]}">${P[k].i}</span>`).join("<small>+</small>");
window.bs=ks.map(k=>sel[k][0]).join(", ")+" = "+R(t)}
document.querySelectorAll("select[data-k]").forEach(s=>s.onchange=calc);calc();
$("#sendb").onclick=()=>{$("#bn").value="Build saya: "+bs}
function card(o,i,t){
    const productName=String(o[1]||o[0]).replace(/["'<>]/g,"");
    const priceText=String(o[3]||"").replace(/["'<>]/g,"");
    return `<div class="card">${o[4]?`<span class="tag">${o[4]}</span>`:""}<div class="img" style="background:${G[i%6]}"><b>${o[0]}</b></div><h3>${o[1]}</h3><div class="sp">${o[2]}</div><div class="pr">${o[3]}</div><button class="btn product-order" type="button" data-product="${productName}" data-price="${priceText}" style="margin-top:12px;padding:9px 16px;font-size:14px">Tanya / Pesan 🌸</button></div>`}
$("#tabs").innerHTML=ks.map((k,i)=>`<button class="${i?"":"on"}" data-t="${k}">${P[k].i} ${k}</button>`).join("");
function cat(k){$("#cat").innerHTML=P[k].o.map((o,i)=>card([P[k].i,o[0],o[1],R(o[2]),i==1?"Best":""],i)).join("");document.querySelectorAll("#tabs button").forEach(b=>b.classList.toggle("on",b.dataset.t==k))}
$("#tabs").onclick=e=>e.target.dataset.t&&cat(e.target.dataset.t);cat("CPU");
const L=(id,a)=>$(id).innerHTML=a.map((o,i)=>card(o,i)).join("");
L("#bun",[["🕹️","Sakura Starter","Ryzen 5 · RTX 4060 · 16GB · 500GB","Rp 11.900.000","Hot"],["🎮","Blossom Pro","Ryzen 7 · RTX 4070 · 32GB · 1TB","Rp 22.500.000","Best"],["🎬","Creator Cloud","i5 · 32GB · 2TB · Quiet Cooling","Rp 16.800.000",""],["📚","Study Petal","i3 · 8GB · 256GB · Office Ready","Rp 5.900.000","Hemat"]]);
L("#acc",[["⌨️","Mechanical Keyboard Obsidian","Hot-swap · RGB · Switch Blossom","Rp 650.000",""],["🖱️","Mouse Falcon Lite","59g · 26K DPI · Wireless","Rp 450.000","New"],["🎧","Headset Cloud 7.1","Surround · Mic Detach","Rp 580.000",""],["🖥️","Monitor 27\" 165Hz","IPS · 1ms · QHD","Rp 2.900.000","Promo"],["🪑","Gaming Chair Sakura","Ergonomis · Reclining","Rp 1.800.000",""],["🌸","Deskmat XXL","Anti-slip · 90×40cm","Rp 150.000",""]]);
L("#net",[["📡","Router Wi-Fi 6 AX3000","Dual band · 4 antena","Rp 750.000","Hot"],["🔀","Switch Gigabit 8-Port","Plug & play · metal case","Rp 320.000",""],["📶","Access Point Ceiling","PoE · 1800Mbps","Rp 980.000",""],["🔌","Kabel LAN Cat6 (30m)","Full copper · RJ45","Rp 120.000",""]]);
L("#pkg",[["🏠","Wi-Fi Rumah Basic","Survei + 1 router + setting","Rp 450.000",""],["🏢","Paket Kantor Kecil","1 router + 2 AP + switch + kabel","Rp 3.500.000","Best"],["🛰️","Mesh Full House","3 node mesh + optimasi sinyal","Rp 2.200.000",""]]);
L("#tip",[["📖","Cara Rakit PC Pertama","Panduan 10 langkah santai","Baca 5 mnt",""],["🌡️","Kenapa PC Panas?","Tips airflow & pasta thermal","Baca 4 mnt",""],["📶","Posisi Router Ideal","Sinyal merata tanpa blind spot","Baca 3 mnt",""],["💻","Belajar Ngoding Dasar","Setup PC untuk coding","Baca 6 mnt",""]]);
const gi=[["🖥️","Midnight Tower Build",150],["💻","Coding Station",190],["🎮","RGB Battle Station",230],["🌸","White &amp; Sakura PC",170],["⌨️","Minimal Desk",140],["🧠","Water-cooled Beast",210],["🖱️","Streamer Setup",180],["📡","Home Lab Rack",160]];
$("#gal").innerHTML=gi.map((o,i)=>`<div class="g" style="background:${G[i%6]};height:${o[2]}px">${o[0]}<span>${o[1]}</span></div>`).join("");
$("#cus").innerHTML=["Kak Rani","Dimas","Studio Nara","Kos Putri Mawar","Cafe Hijau","Rizky"].map((n,i)=>`<div class="g" style="background:${G[(i+2)%6]};height:${140+i%3*30}px">${["🏠","🎮","🎬","🏢","☕","💻"][i]}<span>${n} ⭐5.0</span></div>`).join("");
$("#stp").innerHTML=[["Tentukan Tujuan","Gaming, kerja, atau kuliah?"],["Pilih CPU &amp; Motherboard","Pastikan soketnya sama."],["Tambah GPU, RAM &amp; SSD","Seimbangkan budget."],["PSU &amp; Cooling","Jangan pelit di PSU!"]].map(s=>`<div class="card"><h3>${s[0]}</h3><p class="sp">${s[1]}</p></div>`).join("");
let end=Date.now()+3*864e5;setInterval(()=>{let d=end-Date.now(),f=n=>String(n).padStart(2,"0");$("#cd").textContent=`${Math.floor(d/864e5)}h ${f(Math.floor(d/36e5)%24)}:${f(Math.floor(d/6e4)%60)}:${f(Math.floor(d/1e3)%60)}`},1000);
function sub(e,f){
    e.preventDefault();
    const type=f.dataset.formType || "inquiry";
    const data=new FormData(f);
    const entries=[...data.entries()].filter(([k,v])=>String(v).trim()!=="");
    const heading=type==="custom-build"?"CUSTOM PC BUILD REQUEST":"PRODUCT INQUIRY";
    const body=entries.map(([k,v])=>`${k}: ${v}`).join("\n");
    const message=`Halo SakuraBit! Saya ingin menghubungi tim SakuraBit.\n\n${heading}\n${body}\n\nMohon info ketersediaan, estimasi, dan langkah selanjutnya.`;
    window.open(`https://wa.me/${SAKURABIT_WA_NUMBER}?text=${encodeURIComponent(message)}`,"_blank","noopener");
    return false;
}
// petals
for(let i=0;i<18;i++){const p=document.createElement("div");p.className="pet";p.style.cssText=`left:${Math.random()*100}vw;width:${8+Math.random()*9}px;height:${8+Math.random()*9}px;animation-duration:${8+Math.random()*10}s;animation-delay:-${Math.random()*12}s;--dx:${-80+Math.random()*160}px`;document.body.appendChild(p)}
// cursor
const cu=$("#cur");let lt=0;
if(matchMedia("(pointer:fine)").matches){addEventListener("mousemove",e=>{cu.style.transform=`translate(${e.clientX}px,${e.clientY}px)`;if(Date.now()-lt>60){lt=Date.now();const t=document.createElement("span");t.className="tr";t.textContent=["◆","✦","▪","❯"][Math.random()*4|0];t.style.cssText=`left:${e.clientX}px;top:${e.clientY}px;--x:${-20+Math.random()*40}px`;document.body.appendChild(t);setTimeout(()=>t.remove(),1000)}});
addEventListener("mouseover",e=>cu.classList.toggle("h",!!e.target.closest("a,button,select,summary")))}else cu.style.display="none";
// chat
const A={"Rekomendasi PC gaming":"Untuk budget ±Rp 12 jt, coba bundle Sakura Starter (Ryzen 5 + RTX 4060) 🎮","Cek kompatibilitas":"Pakai Build Your Dream PC di atas — aku cek soket & watt PSU otomatis ✅","Paket Wi-Fi rumah":"Paket Wi-Fi Rumah Basic mulai Rp 450 ribu, termasuk survei & setting 📶","Hubungi teknisi":"Klik tombol WhatsApp hijau di sebelahku ya 💚"};
$("#qr").innerHTML=Object.keys(A).map(k=>`<button>${k}</button>`).join("");
$("#qr").onclick=e=>{if(e.target.tagName!="BUTTON")return;const m=$("#ms");m.innerHTML+=`<div class="m u">${e.target.textContent}</div>`;setTimeout(()=>{m.innerHTML+=`<div class="m b">${A[e.target.textContent]}</div>`;m.scrollTop=1e5},500);m.scrollTop=1e5};
$("#aib").onclick=()=>$("#chat").classList.toggle("open");

// Product cards: direct WhatsApp inquiry, using the same centralized shop number.
document.addEventListener("click", event => {
    const button=event.target.closest(".product-order");
    if(!button) return;
    const message=`Halo SakuraBit! Saya tertarik dengan produk/paket berikut:\n${button.dataset.product}\nHarga referensi: ${button.dataset.price}\nMohon konfirmasi stok, detail spesifikasi, dan cara pemesanan.`;
    window.open(`https://wa.me/${SAKURABIT_WA_NUMBER}?text=${encodeURIComponent(message)}`,"_blank","noopener");
});

// Keep the floating WhatsApp destination consistent with the configured number.
document.querySelectorAll('.wa').forEach(link => {
    link.href = `https://wa.me/${SAKURABIT_WA_NUMBER}`;
});
