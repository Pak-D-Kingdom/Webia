// SplashKids Swim School — frontend interactions extracted from the supplied reference.
const ages = document.getElementById('ages');
const agedet = document.getElementById('agedet');
const plv = document.getElementById('plv');
const sg = document.getElementById('sg');
const st = document.getElementById('st');
const wb = document.getElementById('wb');
const nx = document.getElementById('nx');
const pv = document.getElementById('pv');
const aib = document.getElementById('aib');
const ch = document.getElementById('ch');
var A=[["🐣","Baby","6–24 bln","Min. 6 bulan, wajib didampingi orang tua, sesi 30 menit, rasio 1 instruktur : 4 bayi."],["🧸","Toddler","2–4 th","Pengenalan air lewat permainan, sesi 30 menit, rasio 1:4."],["🛟","Kids","5–12 th","Kelas per usia, kemampuan, dan kepercayaan diri di air; sesi 45 menit."],["🕶️","Teen","13–17 th","Teknik 4 gaya dan stamina, sesi 60 menit."],["🏊","Adult","18+ th","Kelas pemula, teknik, stamina, dan private lesson."]],ai=2;
function ra(){ages.innerHTML=A.map(function(a,i){return '<div class="buoy '+(i==ai?"on":"")+'" onclick="ai=+'+i+';ra()"><i>'+a[0]+'</i><h3>'+a[1]+'</h3>'+a[2]+'</div>'}).join("");agedet.innerHTML="<b>"+A[ai][1]+" Swimming:</b> "+A[ai][3]}ra();
var Q=document.querySelectorAll(".pq");function pl(){var n=0;Q.forEach(function(q){if(q.checked)n++});plv.textContent=["Beginner","Beginner","Basic","Intermediate","Advanced","Professional"][n]}Q.forEach(function(q){q.onchange=pl});pl();
var D=["Semua","Sen","Rab","Jum","Sab"],S=[["Sen","16.00","Kids","Basic",6,8],["Sen","17.00","Baby","Beginner",3,4],["Rab","16.00","Toddler","Beginner",2,6],["Rab","19.00","Adult","Intermediate",5,8],["Jum","16.00","Kids","Beginner",7,8],["Sab","08.00","Teen","Advanced",4,8],["Sab","09.00","Baby","Beginner",4,4]],df="Semua";
function rs(){document.getElementById("df").innerHTML=D.map(function(d){return '<button class="'+(d==df?"on":"")+'" onclick="df=\''+d+'\';rs()">'+d+'</button>'}).join("");
sg.innerHTML=S.filter(function(s){return df=="Semua"||s[0]==df}).map(function(s){var p=s[4]/s[5]*100;return '<div class="card" style="color:#0b3b3a"><b>'+s[0]+' · '+s[1]+'</b><br>'+s[2]+' · '+s[3]+'<div class="bar"><i style="width:'+p+'%"></i></div><small>'+(s[5]-s[4]>0?"Sisa "+(s[5]-s[4])+" slot":"Penuh")+'</small></div>'}).join("")}rs();
var W={n:0,d:{kat:"Kids",lv:"Beginner",jd:"Sen 16.00",nm:"",tl:"",wt:"",pk:"Regular",pr:720000}},N=7;
function opt(k,a){return '<select onchange="W.d.'+k+'=this.value">'+a.map(function(x){return '<option '+(W.d[k]==x?"selected":"")+'>'+x+'</option>'}).join("")+'</select>'}
function rw(){st.innerHTML=Array.from({length:N},function(_,i){return '<i class="'+(i<=W.n?"on":"")+'"></i>'}).join("");var d=W.d,h="";
if(W.n==0)h="<label>1. Kategori peserta</label>"+opt("kat",["Baby","Toddler","Kids","Teens","Adults"]);
if(W.n==1)h="<label>2. Program & level</label>"+opt("lv",["Beginner","Basic","Intermediate","Advanced","Professional","Private","Group"]);
if(W.n==2)h="<label>3. Jadwal & instruktur</label>"+opt("jd",["Sen 16.00 · Coach Reza","Rab 16.00 · Coach Nadia","Rab 19.00 · Coach Dimas","Sab 08.00 · Coach Reza"]);
if(W.n==3)h='<label>4. Nama peserta</label><input value="'+d.nm+'" oninput="W.d.nm=this.value"><label>Tanggal lahir</label><input type="date" value="'+d.tl+'" oninput="W.d.tl=this.value"><label>Nama orang tua/wali / WhatsApp / pengalaman</label><input value="'+d.wt+'" oninput="W.d.wt=this.value" placeholder="Bu Sari / 0812... / pemula">';
if(W.n==4)h="<label>5. Paket</label>"+'<select onchange="W.d.pk=this.value">'+[["Trial Class",75000],["Regular",720000],["Private Lesson",200000],["Group Class",95000],["Monthly Membership",650000]].map(function(x){return '<option value="'+x[0]+'" '+(d.pk==x[0]?"selected":"")+'>'+x[0]+' · Rp'+x[1].toLocaleString("id-ID")+'</option>'}).join("")+'</select>';
if(W.n==5)h="<b>6. Ringkasan</b><p>"+sm()+"</p>";
if(W.n==6){var _wa=window.SPLASHKIDS_WA_NUMBER||window.WEBIA_WA_ADMIN||'6281234567890';h='<b>7. Kirim via WhatsApp</b><p>Data dirangkum otomatis jadi pesan untuk admin.</p><a class="btn" target="_blank" href="https://wa.me/'+_wa+'?text='+encodeURIComponent(sm())+'">Kirim ke WhatsApp 💬</a>';}
wb.innerHTML=h;nx.style.display=W.n==N-1?"none":"inline-block"}
function sm(){var d=W.d,p={"Trial Class":75000,"Regular":720000,"Private Lesson":200000,"Group Class":95000,"Monthly Membership":650000}[d.pk];return "Pendaftaran SplashKids: "+d.kat+" / "+d.lv+" / "+d.jd+" / Peserta: "+d.nm+" (lahir "+d.tl+") / Kontak: "+d.wt+" / Paket: "+d.pk+" / Estimasi Rp"+p.toLocaleString("id-ID")}
nx.onclick=function(){if(W.n<N-1){W.n++;rw()}};pv.onclick=function(){if(W.n>0){W.n--;rw()}};rw();
aib.onclick=function(){ch.classList.toggle("open")};
var H=document.querySelector(".hero"),CL=["#FFE18A","#FF8066","#fff","#8CE0D5"];
for(var i=0;i<26;i++){var c=document.createElement("i");c.className="cf";c.style.cssText="left:"+Math.random()*100+"%;background:"+CL[i%4]+";animation-delay:-"+Math.random()*6+"s;animation-duration:"+(5+Math.random()*4)+"s";H.appendChild(c)}
["🐠","🐟","🐢","🐬"].forEach(function(e,i){var f=document.createElement("div");f.className="fish";f.textContent=e;f.style.bottom=(4+i*10)+"%";f.style.animationDuration=(9+i*3)+"s";f.style.animationDelay="-"+i*3+"s";H.appendChild(f)});
if ('IntersectionObserver' in window) { var so=new IntersectionObserver(function(e){e.forEach(function(x){if(x.isIntersecting){var b=x.target,n=+b.dataset.n,t=0,id=setInterval(function(){t+=Math.ceil(n/40);if(t>=n){t=n;clearInterval(id)}b.textContent=t},30);so.unobserve(b)}})});document.querySelectorAll("[data-n]").forEach(function(b){so.observe(b)}); } else { document.querySelectorAll('[data-n]').forEach(function(b){b.textContent=b.dataset.n}); }
if ('IntersectionObserver' in window) { var io=new IntersectionObserver(function(e){e.forEach(function(x){if(x.isIntersecting)x.target.classList.add("on")})},{threshold:.1});document.querySelectorAll(".rv").forEach(function(e){io.observe(e)}); } else { document.querySelectorAll('.rv').forEach(function(e){e.classList.add('on')}); }
