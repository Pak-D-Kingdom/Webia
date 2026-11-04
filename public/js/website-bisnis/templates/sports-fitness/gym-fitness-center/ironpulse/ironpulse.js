const $=s=>document.querySelector(s),g=(c,h)=>{$(c).innerHTML=h},G=(a,f)=>a.map(f).join('');
const grad=(a,b)=>`background:linear-gradient(135deg,${a},${b})`;
$('#bg').onclick=()=>$('#lk').classList.toggle('show');
$('#lk').onclick=()=>$('#lk').classList.remove('show');
function tabs(el,items,cb){g(el,G(items,(t,i)=>`<button class="pill${i?'':' on'}" data-i="${i}">${t}</button>`));$(el).onclick=e=>{const b=e.target.closest('.pill');if(!b)return;$(el).querySelectorAll('.pill').forEach(x=>x.classList.remove('on'));b.classList.add('on');cb(+b.dataset.i)};cb(0)}
// zona
const Z=[['Strength','#7c6cf0','#5b4bd6','Barbell, power rack, dumbbell hingga 60 kg, dan platform deadlift.'],['Cardio','#f06fa8','#d6408b','Treadmill, assault bike, rowing, dan stair climber dengan layar interaktif.'],['Functional','#1fb5a0','#0e8a7a','Sled, battle rope, kettlebell, TRX, dan area turf 20 meter.'],['Boxing','#e45bb8','#a8338a','Heavy bag, speed bag, ring sparring, dan pelatih tinju.'],['Recovery','#4db3f0','#2b84d6','Sauna, ice bath, foam roller, dan area stretching.']];
tabs('#zt',Z.map(z=>z[0]),i=>{const z=Z[i];$('#zv').setAttribute('style',grad(z[1],z[2]));$('#zv').textContent=z[0]+' Zone';g('#zi',`<h3>${z[0]} Zone</h3><p>${z[3]}</p><br><a class="btn" href="#daftar">Coba Zona Ini</a>`)});
// program
const P=[['Strength Building','Naikkan beban angkatan dengan progresi terukur.','💪'],['Muscle Development','Hipertrofi terstruktur: split, volume, dan nutrisi.','🏋️'],['Fat Loss','Kombinasi kekuatan dan kardio untuk bakar lemak.','🔥'],['Endurance','Tingkatkan stamina lewat interval dan base training.','🏃'],['Athletic Performance','Power, kecepatan, dan kelincahan ala atlet.','⚡']];
g('#pg',G(P,p=>`<div class="card"><div class="ic" style="font-size:2rem">${p[2]}</div><h3>${p[0]}</h3><p>${p[1]}</p></div>`));
// tier
const T=[['Basic','Rp299rb',['Akses area gym & cardio','Jam 06.00–17.00','Locker harian']],['Pro','Rp499rb',['Semua zona latihan','Kelas grup unlimited','1x sesi PT/bulan','Akses 05.00–23.00']],['Elite','Rp899rb',['Semua fasilitas Pro','Sauna & recovery','4x sesi PT/bulan','Bawa 1 teman/bulan']]];
g('#tr',G(T,(t,i)=>`<div class="card tier${i==1?' hot':''}">${i==1?'<span class="badge">TERPOPULER</span>':''}<h3>${t[0]}</h3><div class="pr">${t[1]}<small> /bulan</small></div><ul style="padding:10px 0 16px">${G(t[2],x=>`<li>${x}</li>`)}</ul><a class="btn" href="#daftar">Pilih ${t[0]}</a></div>`));
// goal
const GL={'Naik Otot':['Muscle Development + Pro','4x/minggu split latihan, kelas mobility, dan panduan nutrisi.'],'Turun Berat Badan':['Fat Loss + Pro','Kombinasi strength, HIIT, dan cardio terjadwal 4–5x/minggu.'],'Lebih Kuat':['Strength Building + Pro','Latihan beban berat dengan progresi mingguan dan coaching teknik.'],'Stamina':['Endurance + Basic','Cardio dan interval bertahap, cocok untuk pemula.'],'Performa Atlet':['Athletic Performance + Elite','Power, speed, recovery, dan 4x sesi PT bulanan.']};
tabs('#gb',Object.keys(GL),i=>{const k=Object.keys(GL)[i];g('#gr',`<h3>${GL[k][0]}</h3><p>${GL[k][1]}</p>`)});
// trainer
const TR=[['Rama Pratama','Strength & Powerlifting','NSCA-CPT • 8 tahun','#7c6cf0'],['Dinda Safira','Fat Loss & Functional','ACE-CPT • 6 tahun','#f06fa8'],['Bayu Wirawan','Boxing & Conditioning','Pelatih tinju nasional • 10 tahun','#1fb5a0']];
g('#tn',G(TR,t=>`<div class="card" style="padding:0"><div style="height:140px;${grad(t[3],'var(--bg2)')}"></div><div style="padding:18px"><h3>${t[0]}</h3><p><b style="color:var(--ac)">${t[1]}</b></p><p>${t[2]}</p></div></div>`));
// jadwal
const D={Sen:[['06.00','HIIT Burn'],['18.30','Powerlifting Clinic']],Sel:[['07.00','Boxing Basics'],['19.00','Functional Circuit']],Rab:[['06.00','Mobility & Core'],['18.00','Strength 5x5']],Kam:[['17.30','Spin Rush'],['19.00','Kettlebell Fury']],Jum:[['06.00','Sunrise Cardio'],['18.30','Boxing Sparring']],Sab:[['08.00','Team WOD Challenge'],['10.00','Open Gym Battle']],Min:[['09.00','Yoga & Recovery']]};
tabs('#dt',Object.keys(D),i=>g('#ds',G(D[Object.keys(D)[i]],c=>`<div class="row"><span>${c[1]}</span><b>${c[0]}</b></div>`)));
// pulse
const H=[10,12,15,20,28,40,55,70,92,85,60,30];const hrs=['05','07','09','11','13','15','16','17','18','19','20','22'];
const nowi=Math.max(0,Math.min(11,Math.floor(new Date().getHours()/2)-2));
function bars(){g('#bars',G(H,(v,i)=>{const w=Math.max(6,Math.min(100,v+Math.round(Math.random()*8-4)));return`<i class="${i==nowi?'now':''}" style="height:${w}%" title="${hrs[i]}.00"></i>`}));const v=H[nowi];$('#pl').innerHTML='<span class="hb">❤</span> Perkiraan sekarang (demo): '+(v>70?'Ramai 🔥':v>40?'Sedang':'Lengang ✅')}
bars();
// progress
g('#pr',`<h3>Milestone 12 Minggu</h3>`+G([['Target Kekuatan',78],['Konsistensi Hadir',92],['Target Lemak Tubuh',55]],p=>`<p style="margin-top:12px">${p[0]} <b style="color:var(--ac)">${p[1]}%</b></p><div class="meter"><i data-w="${p[1]}"></i></div>`));
new IntersectionObserver((es,o)=>es.forEach(e=>{if(e.isIntersecting){e.target.querySelectorAll('[data-w]').forEach(m=>m.style.width=m.dataset.w+'%');o.unobserve(e.target)}})).observe($('#pr'));
// story
g('#st',G([['Andi, 29','-14 kg dalam 6 bulan','Mulai dari nol, sekarang rutin lari 10K.'],['Sari, 34','+6 kg massa otot','Ibu dua anak, kini juara kelas Strength.'],['Doni, 41','Deadlift 160 kg','Cedera punggung pulih lewat program recovery.']],s=>`<div class="card"><div style="height:90px;margin-bottom:12px;${grad('var(--ac2)','var(--ac)')};opacity:.8"></div><h3>${s[0]}</h3><p><b style="color:var(--ac)">${s[1]}</b></p><p>${s[2]}</p></div>`));
// fasilitas
g('#fc',G(['Smith Machine & Power Rack','Dumbbell 2–60 kg','Treadmill & Assault Bike','Ring Tinju','Sauna & Ice Bath','Locker & Shower Premium','Cafe Protein Bar','Parkir Luas'],f=>`<div class="card"><h3 style="font-size:1.2rem">${f}</h3></div>`));
// galeri
g('#gl',G([['Main Floor','#7c6cf0','#5b4bd6'],['Cardio Deck','#f06fa8','#d6408b'],['Boxing Ring','#e45bb8','#a8338a'],['Turf Area','#1fb5a0','#0e8a7a'],['Recovery Lounge','#4db3f0','#2b84d6']],x=>`<div style="${grad(x[1],x[2])}">${x[0]}</div>`));
// forms
let mode='trial';
document.querySelectorAll('[data-f]').forEach(b=>b.onclick=()=>{mode=b.dataset.f;document.querySelectorAll('[data-f]').forEach(x=>x.classList.toggle('on',x==b));const r=mode=='reg';$('#em').style.display=$('#pk').style.display=r?'block':'none';$('#dd').style.display=r?'none':'block';$('#sb').textContent=r?'Daftar Sekarang':'Booking Trial Gratis';$('#ok').textContent=''});
$('#fm').onsubmit=e=>{
 e.preventDefault(); const form=e.currentTarget; const fd=new FormData(form);
 const nama=(fd.get('n')||'').trim(), whatsapp=(fd.get('w')||'').trim(), email=(fd.get('e')||'').trim(), tanggal=(fd.get('d')||'').trim(), paket=$('#pk').value;
 const adminNumber=window.IRONPULSE_WA_ADMIN||'6281234567890';
 const lines=mode==='reg'?['Halo Admin IRONPULSE, saya ingin mendaftar membership.','',`Nama: ${nama}`,`No. WhatsApp: ${whatsapp}`,`Email: ${email}`,`Paket: ${paket}`,'','Mohon informasi proses konfirmasi dan pembayaran.']:['Halo Admin IRONPULSE, saya ingin booking Free Trial.','',`Nama: ${nama}`,`No. WhatsApp: ${whatsapp}`,`Tanggal kunjungan: ${tanggal}`,'','Mohon konfirmasi ketersediaan jadwal trial.'];
 $('#ok').textContent='Menyiapkan WhatsApp untuk mengirim permintaan Anda…'; window.open(`https://wa.me/${adminNumber}?text=${encodeURIComponent(lines.join('\n'))}`,'_blank','noopener,noreferrer');
};
// komunitas
g('#cm',G([['@fitrahman','PR deadlift baru! Makasih coach Rama 🔥'],['@nadiaruns','Kelas HIIT pagi paling bikin semangat.'],['@gymbro_sby','Komunitasnya solid, semua saling support.'],['@liaafit','Bulan ketiga, turun 7 kg. Ayo gabung!']],c=>`<div class="card"><p>“${c[1]}”</p><p><b style="color:var(--ac)">${c[0]}</b></p></div>`));
// event
g('#ev',G([['15 Nov','Ironpulse Powerlifting Cup'],['29 Nov','Fun Run 5K Komunitas'],['13 Des','Boxing Night Sparring'],['31 Des','Year-End WOD Challenge']],e=>`<div class="row"><span>${e[1]}</span><b>${e[0]}</b></div>`));
// faq
g('#fq',G([['Apakah pemula boleh bergabung?','Tentu. Ada orientasi gratis dan program khusus pemula.'],['Apakah ada kontrak minimum?','Tidak. Semua paket bisa bulanan dan dihentikan kapan saja.'],['Bisa trial dulu?','Bisa. Tersedia 7 hari trial gratis lewat form booking.'],['Apakah ada loker dan shower?','Ya, tersedia untuk semua member.']],f=>`<details><summary>${f[0]}</summary><p>${f[1]}</p></details>`));
// chatbot
const R=['Basic Rp299rb, Pro Rp499rb, Elite Rp899rb per bulan (demo).','Senin–Jumat 05.00–23.00, Sabtu–Minggu 06.00–21.00.','Untuk pemula kami sarankan Fat Loss atau Strength Building + orientasi gratis.'];
$('#ab').onclick=()=>$('#ch').classList.toggle('open');
$('#ch').onclick=e=>{const b=e.target.closest('[data-q]');if(!b)return;const m=$('#ms');m.insertAdjacentHTML('beforeend',`<p class="u">${b.textContent}</p><p>${R[b.dataset.q]}</p>`);m.scrollTop=m.scrollHeight};
$('#mqi').textContent='STRENGTH ✦ CARDIO ✦ BOXING ✦ FUNCTIONAL ✦ RECOVERY ✦ NO EXCUSES ✦ '.repeat(8);
document.querySelectorAll('[data-n]').forEach(el=>{const n=+el.dataset.n,t0=performance.now();(function f(t){const p=Math.min(1,(t-t0)/1800);el.textContent=Math.round(n*(1-Math.pow(1-p,3))).toLocaleString('id-ID')+(el.dataset.s||'');if(p<1)requestAnimationFrame(f)})(t0)});
const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('vis');io.unobserve(e.target);setTimeout(()=>e.target.style.transitionDelay='',1000)}}),{threshold:.12});
document.querySelectorAll('section>h2,section>.tag,section>.sub,.grid>.card,#ev .row,#fq details,.mani').forEach(el=>{el.classList.add('rv');el.style.transitionDelay=(Array.prototype.indexOf.call(el.parentNode.children,el)%6)*70+'ms';io.observe(el)});
$('#tg').onclick=()=>{const d=document.documentElement,c=d.dataset.theme||(matchMedia('(prefers-color-scheme:dark)').matches?'dark':'light');d.dataset.theme=c=='dark'?'light':'dark'};
