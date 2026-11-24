// Explicit DOM references: avoid depending on browser named-element globals.
window.addEventListener('error', function(ev){ var box=document.getElementById('volta-runtime-warning'); if(box){box.hidden=false;box.textContent='Sebagian fitur interaktif belum dapat dimuat. Silakan refresh halaman atau hubungi admin.';} });
var cat = document.getElementById('cat');
var co = document.getElementById('co');
var sf = document.getElementById('sf');
var df = document.getElementById('df');
var sc = document.getElementById('sc');
var fc = document.getElementById('fc');
var rsf = document.getElementById('rsf');
var rdt = document.getElementById('rdt');
var rsl = document.getElementById('rsl');
var rtt = document.getElementById('rtt');
var rwa = document.getElementById('rwa');
var st = document.getElementById('st');
var wb = document.getElementById('wb');
var nx = document.getElementById('nx');
var pv = document.getElementById('pv');
var cq = document.getElementById('cq');
var aib = document.getElementById('aib');
var ch = document.getElementById('ch');
var VOLTA_WHATSAPP_NUMBER = (document.body.dataset.whatsappNumber || '6281234567890').replace(/\D/g, '');
var waLink = 'https://wa.me/' + VOLTA_WHATSAPP_NUMBER;
function voltaTodayLocal(){ var d=new Date(); return d.getFullYear()+'-'+String(d.getMonth()+1).padStart(2,'0')+'-'+String(d.getDate()).padStart(2,'0'); }
if (rdt) { rdt.min=voltaTodayLocal(); if (!rdt.value || rdt.value < rdt.min) rdt.value=rdt.min; }
document.querySelectorAll('.wa').forEach(function(link){ link.href = waLink; });

function rk(t,c){var h={p:'<svg viewBox="0 0 100 135"><path d="M50 4c24 0 40 15 40 38 0 22-14 36-26 46H36C24 78 10 64 10 42 10 19 26 4 50 4z" fill="'+c+'" stroke="#222" stroke-width="3"/><path d="M50 4c24 0 40 15 40 38 0 22-14 36-26 46H36C24 78 10 64 10 42 10 19 26 4 50 4z" fill="url(#hl)"/><rect x="43" y="88" width="14" height="42" rx="6" fill="#222"/></svg>',b:'<svg viewBox="0 0 100 140"><ellipse cx="50" cy="40" rx="28" ry="36" fill="url(#sg)" stroke="'+c+'" stroke-width="6"/><rect x="47" y="76" width="6" height="30" fill="#bbb"/><rect x="43" y="104" width="14" height="32" rx="4" fill="#222"/></svg>',t:'<svg viewBox="0 0 100 145"><ellipse cx="50" cy="42" rx="32" ry="39" fill="url(#sg)" stroke="'+c+'" stroke-width="7"/><path d="M40 78l10 22 10-22" fill="'+c+'"/><rect x="44" y="98" width="12" height="42" rx="4" fill="#222"/></svg>',T:'<svg viewBox="0 0 100 130"><circle cx="50" cy="40" r="34" fill="'+c+'" stroke="#d9b38c" stroke-width="6"/><rect x="44" y="72" width="12" height="40" rx="4" fill="#d9b38c"/></svg>'};return h[t]}
function bl(t){return {p:'<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="11" fill="#D8F05B" stroke="#343A8F" stroke-width="1.5"/><path d="M3 8q9 8 0 8M21 8q-9 8 0 8" stroke="#fff" stroke-width="1.5" fill="none"/></svg>',b:'<svg viewBox="0 0 24 24" style="transform:rotate(-20deg)"><path d="M12 14L4 2h16z" fill="#fff" stroke="#343A8F" stroke-width="1.2"/><path d="M12 14V2M8 14L8 2M16 14L16 2" stroke="#343A8F" stroke-width=".6"/><circle cx="12" cy="17" r="5" fill="#FF6B8A" stroke="#343A8F" stroke-width="1.2"/></svg>',t:'<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="11" fill="#D8F05B" stroke="#343A8F" stroke-width="1.5"/><path d="M2 8q10 8 0 12M22 4q-10 8 0 12" stroke="#fff" stroke-width="2" fill="none"/></svg>',T:'<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9" fill="#fff" stroke="#343A8F" stroke-width="2"/></svg>'}[t]}
var S=[{n:"Padel",t:"p",col:"#7468E8",fg:"#fff",rc:"#D8F05B",h:"-80px",nt:54,rent:250,eq:"Raket padel &amp; bola (sewa Rp25.000)",ct:"20 x 10 m, dinding kaca",pr:["Beginner padel introduction","Padel technique &amp; tactics","Doubles strategy training","Private coaching","Court booking &amp; racket rental"]},
{n:"Badminton",t:"b",col:"#FF6B8A",fg:"#fff",rc:"#343A8F",h:"-120px",nt:60,rent:70,eq:"Raket &amp; shuttlecock disediakan saat kelas",ct:"13,4 x 6,1 m, lantai karpet",pr:["Footwork &amp; agility training","Basic strokes and serving","Singles &amp; doubles strategy","Junior athlete development","Sparring sessions"]},
{n:"Tennis",t:"t",col:"#343A8F",fg:"#fff",rc:"#D8F05B",h:"-90px",nt:48,rent:150,eq:"Raket &amp; bola disediakan (sewa Rp20.000)",ct:"23,77 x 10,97 m, hard court",pr:["Tennis fundamentals","Serve, forehand &amp; backhand","Match strategy","Junior tennis program","Private and group lessons"]},
{n:"Table Tennis",t:"T",col:"#D8F05B",fg:"#343A8F",rc:"#FF6B8A",h:"-46px",nt:26,rent:50,eq:"Bet &amp; bola disediakan",ct:"Meja 2,74 x 1,525 m, 8 meja",pr:["Grip and stance fundamentals","Spin and ball control","Footwork training","Competitive training","Match simulation"]}];
document.getElementById("ar").innerHTML=S.map(function(s){return '<div class="q" style="background-color:'+s.col+';--h:'+s.h+';--n:'+s.nt+'px"><b style="color:'+s.fg+'">'+s.n+'</b><span class="nt"></span><div class="rkt l">'+rk(s.t,s.rc)+'</div><div class="rkt r">'+rk(s.t,s.rc)+'</div><div class="bw"><div class="bl">'+bl(s.t)+'</div><span class="sd"></span></div></div>'}).join("");
var sp=0;
function rcat(){cat.innerHTML=S.map(function(s,i){return '<div class="pn '+(i==sp?"on":"")+'" style="background:'+s.col+';color:'+s.fg+'" onclick="sp='+i+';rcat()"><div class="rw">'+rk(s.t,s.rc)+'</div><h3>'+s.n+'</h3><div class="pd"><ul>'+s.pr.map(function(x){return "<li>"+x+"</li>"}).join("")+'</ul><p><b>Perlengkapan:</b> '+s.eq+'<br><b>Lapangan:</b> '+s.ct+'<br><b>Sewa lapangan:</b> Rp'+s.rent+'.000/jam</p><a class="btn l" href="#daftar" onclick="W.d.sp='+i+';rw()">Booking '+s.n+'</a></div></div>'}).join("")}
function bt(a,cur,fn){return a.map(function(x,i){return '<button class="'+(i==cur?"on":"")+'" onclick="'+fn+'('+i+')">'+x+'</button>'}).join("")}
var Q=document.querySelectorAll(".qz");function ql_(){var n=0;Q.forEach(function(q){if(q.checked)n++});document.getElementById("ql").textContent=["Beginner","Beginner","Intermediate","Intermediate","Advanced","Professional"][n]}Q.forEach(function(q){q.onchange=ql_});ql_();
var CO=[["Raka Pratama","Padel","Sertifikasi pelatih padel Level 2","8 th","Doubles &amp; taktik","Juara padel regional"],["Sinta Maharani","Badminton","Lisensi pelatih BWF Level 1","10 th","Footwork &amp; junior","Finalis kejurda"],["Marco Santoso","Tennis","Sertifikasi ITF Coaching","12 th","Serve &amp; strategi","Pelatih juara junior"],["Lin Wei","Table Tennis","Pelatih nasional bersertifikat","9 th","Spin &amp; ball control","Medali kejurnas"]],E=["🧢","🎽","🥎","🏓"];
co.innerHTML=CO.map(function(c,i){return '<div class="card"><div style="font-size:60px;animation:fl 3s '+(-i)+'s infinite;position:static">'+E[i]+'</div><h3>'+c[0]+'</h3><b>'+c[1]+'</b><br>'+c[2]+'<br>'+c[3]+' pengalaman · '+c[4]+'<br>🏆 '+c[5]+'<br><small>(data contoh)</small></div>'}).join("");
var SC=[[0,"Sen","17.00","Beginner",0,8,5],[0,"Rab","19.00","Intermediate",0,8,8],[1,"Sel","16.00","Kids",1,12,9],[1,"Kam","19.00","Advanced",1,10,6],[2,"Jum","16.00","Junior",2,8,7],[2,"Sab","09.00","Adult Beginner",2,8,4],[3,"Rab","17.00","Kids",3,10,6],[3,"Sab","15.00","Competitive",3,8,8],[0,"Sab","10.00","Adult",0,8,3],[1,"Min","09.00","Senior",1,10,5]],SF=["Semua","Padel","Badminton","Tennis","Table Tennis"],DF=["Semua","Sen","Sel","Rab","Kam","Jum","Sab","Min"],sfi=0,dfi=0;
function ssf(i){sfi=i;rs()}function sdf(i){dfi=i;rs()}
function rs(){sf.innerHTML=bt(SF,sfi,"ssf");df.innerHTML=bt(DF,dfi,"sdf");sc.innerHTML=SC.filter(function(s){return(!sfi||s[0]==sfi-1)&&(!dfi||s[1]==DF[dfi])}).map(function(s){var f=s[6]/s[5]*100;return '<div class="card"><h3>'+S[s[0]].n+'</h3><b>'+s[1]+' · '+s[2]+'</b><br>'+s[3]+' · '+CO[s[4]][0]+'<div class="bar"><i style="width:'+f+'%"></i></div><small>'+(s[5]-s[6]>0?"Sisa "+(s[5]-s[6])+" slot":"Penuh")+'</small></div>'}).join("")||"<p>Tidak ada jadwal di filter ini.</p>"}
var cd=['<rect x="10" y="10" width="180" height="90" fill="none" stroke="#fff" stroke-width="3"/><path d="M100 10v90M10 55h180" stroke="#fff" stroke-width="2"/><circle r="5" fill="#D8F05B"><animateMotion dur="2s" repeatCount="indefinite" path="M30 30L170 80L30 30"/></circle>','<rect x="30" y="10" width="140" height="90" fill="none" stroke="#fff" stroke-width="3"/><path d="M30 55h140M100 10v90M30 28h140M30 82h140" stroke="#fff" stroke-width="2"/><circle r="5" fill="#FF6B8A"><animateMotion dur="1.6s" repeatCount="indefinite" path="M60 25L140 85L60 25"/></circle>','<rect x="10" y="10" width="180" height="90" fill="none" stroke="#fff" stroke-width="3"/><path d="M100 10v90M40 25v60M160 25v60M40 55h120" stroke="#fff" stroke-width="2"/><circle r="5" fill="#D8F05B"><animateMotion dur="2.2s" repeatCount="indefinite" path="M25 40L175 70L25 40"/></circle>','<rect x="30" y="25" width="140" height="60" fill="none" stroke="#fff" stroke-width="3"/><path d="M100 25v60M30 55h140" stroke="#fff" stroke-width="2"/><circle r="4" fill="#fff"><animateMotion dur="1s" repeatCount="indefinite" path="M50 40L150 70L50 40"/></circle>'];
fc.innerHTML=S.map(function(s,i){return '<div class="card" style="background:'+s.col+';color:'+s.fg+'"><svg viewBox="0 0 200 110" style="width:100%">'+cd[i]+'</svg><h3>'+s.n+'</h3>'+s.ct+'<br>Sewa Rp'+s.rent+'.000/jam</div>'}).join("");
var R={s:0,sel:[]};
function srr(i){R.s=i;R.sel=[];rr()}function tg(h){var k=R.sel.indexOf(h);k<0?R.sel.push(h):R.sel.splice(k,1);rr()}
function rr(){rsf.innerHTML=bt(S.map(function(s){return s.n}),R.s,"srr");var d=rdt.value,dn=+d.slice(-2),h="";for(var x=8;x<=21;x++){var bk=(x*3+R.s*5+dn)%4==0;h+='<button class="'+(bk?"bk":R.sel.indexOf(x)>=0?"sel":"")+'" '+(bk?"":'onclick="tg('+x+')"')+'>'+(x<10?"0":"")+x+'.00</button>'}rsl.innerHTML=h;var c=R.sel.length*S[R.s].rent*1000;rtt.textContent=R.sel.length?R.sel.length+" jam · Rp"+c.toLocaleString("id-ID"):"Pilih jam yang tersedia (coret = terisi).";rwa.href=waLink+"?text="+encodeURIComponent("Reservasi lapangan "+S[R.s].n+" tanggal "+d+" jam "+R.sel.slice().sort(function(a,b){return a-b}).map(function(h){return (h<10?"0":"")+h+".00"}).join(", ")+" total Rp"+c.toLocaleString("id-ID"))}
var PK=[["Trial Class",50000],["Single Session",150000],["Monthly Training",800000],["Intensive Program",1400000],["Private Coaching",300000]],W={n:0,d:{sp:0,pg:"Beginner",lk:"Court A",tg:"2026-11-28",jm:"16.00",nm:"",tl:"",wa:"",ex:"Pemula",pm:0}},N=7;
function sel(k,a,f){return '<select onchange="W.d.'+k+'='+(f||"this.value")+'">'+a.map(function(x){return '<option value="'+x[0]+'" '+(W.d[k]==x[0]?"selected":"")+'>'+x[1]+'</option>'}).join("")+'</select>'}
function sm(){var d=W.d,c=CO[d.sp];return "Pendaftaran VOLTA Academy: "+S[d.sp].n+" / "+d.pg+" / Pelatih "+c[0]+" / "+d.lk+" / "+d.tg+" "+d.jm+" / Peserta: "+d.nm+" (lahir "+d.tl+") WA "+d.wa+" / Pengalaman: "+d.ex+" / Paket "+PK[d.pm][0]+" / Total Rp"+PK[d.pm][1].toLocaleString("id-ID")}
function rw(){st.innerHTML=Array.from({length:N},function(_,i){return '<i class="'+(i<=W.n?"on":"")+'"></i>'}).join("");var d=W.d,h="";
if(W.n==0)h="<label>1. Cabang olahraga</label>"+sel("sp",S.map(function(s,i){return[i,s.n]}),"+this.value");
if(W.n==1)h="<label>2. Program latihan</label>"+sel("pg",["Kids","Remaja","Adult","Senior","Beginner","Intermediate","Advanced","Private Coaching"].map(function(x){return[x,x]}));
if(W.n==2)h="<label>3. Pelatih</label><b>"+CO[d.sp][0]+"</b> ("+CO[d.sp][4]+")<label>Lokasi lapangan</label>"+sel("lk",["Court A","Court B","Court C"].map(function(x){return[x,x]}))+'<label>Tanggal</label><input data-booking-date type="date" value="'+d.tg+'" oninput="W.d.tg=this.value"><label>Waktu</label>'+sel("jm",["09.00","16.00","17.00","19.00"].map(function(x){return[x,x]}));
if(W.n==3)h='<label>4. Nama peserta</label><input id="volta-participant-name" required value="'+d.nm+'" oninput="W.d.nm=this.value" placeholder="Nama lengkap"><label>Tanggal lahir</label><input data-participant-birth type="date" required value="'+d.tl+'" oninput="W.d.tl=this.value"><label>WhatsApp</label><input id="volta-participant-wa" required inputmode="tel" value="'+d.wa+'" oninput="W.d.wa=this.value" placeholder="08xxxxxxxxxx"><label>Pengalaman bermain</label>'+sel("ex",["Pemula","1-2 tahun","3+ tahun","Pernah turnamen"].map(function(x){return[x,x]}));
if(W.n==4)h="<label>5. Paket</label>"+sel("pm",PK.map(function(p,i){return[i,p[0]+" · Rp"+p[1].toLocaleString("id-ID")]}),"+this.value");
if(W.n==5)h="<b>6. Ringkasan</b><p>"+sm()+"</p>";
if(W.n==6)h='<b>7. Kirim via WhatsApp</b><p>Data dirangkum otomatis untuk admin. Admin akan mengonfirmasi ketersediaan dan pendaftaran.</p><a class="btn" data-volta-booking-wa target="_blank" rel="noopener" href="#">Kirim Reservasi 💬</a>';
wb.innerHTML=h;
var classWaLink = wb.querySelector('[data-volta-booking-wa]');
if (classWaLink) classWaLink.href = waLink + '?text=' + encodeURIComponent(sm());
var birthInput = wb.querySelector('[data-participant-birth]');
if (birthInput) birthInput.max = voltaTodayLocal();
var bookingDate = wb.querySelector('[data-booking-date]');
if (bookingDate) bookingDate.min = voltaTodayLocal();
nx.style.display=W.n==N-1?"none":"inline-block";
}
nx.onclick=function(){
 if(W.n===2){
   if(!W.d.tg || W.d.tg < voltaTodayLocal()){alert('Pilih tanggal latihan hari ini atau setelahnya.');return;}
 }
 if(W.n===3){
   var name=(W.d.nm||'').trim(), phone=(W.d.wa||'').replace(/\D/g,'');
   if(!name || !W.d.tl || !phone){alert('Lengkapi nama, tanggal lahir, dan nomor WhatsApp terlebih dahulu.');return;}
   if(phone.length < 9){alert('Nomor WhatsApp belum valid.');return;}
 }
 if(W.n<N-1){W.n++;rw()}
};
pv.onclick=function(){if(W.n>0){W.n--;rw()}};
cq.innerHTML=S.map(function(s,i){return '<button onclick="sp='+i+';rcat();W.d.sp='+i+';ch.classList.remove(\'open\');location.hash=\'#cabang\'">'+s.n+'</button>'}).join("");
aib.onclick=function(){ch.classList.toggle("open")};
document.querySelectorAll(".ic").forEach(function(e){e.innerHTML=e.dataset.k=="r"?rk(e.dataset.t,e.dataset.c):bl(e.dataset.t)});
var DK=["p","b","t","T"],OC=["#7468E8","#FF6B8A","#D8F05B","#343A8F"];
document.querySelectorAll("section").forEach(function(s,i){for(var k=0;k<2;k++){var d=document.createElement("span");d.className="dc";d.innerHTML=bl(DK[(i+k)%4]);d.style.cssText="left:"+(k?90:2+(i*7)%8)+"%;top:"+(6+(i*13+k*40)%72)+"%;width:"+(30+k*14)+"px;animation-delay:-"+(i+k)+"s";s.appendChild(d)}var o=document.createElement("i");o.className="orb";o.style.cssText="width:260px;height:260px;background:"+OC[i%4]+";right:"+(i%2?-80:60)+"px;top:"+(i%3)*30+"%";s.appendChild(o)});
var rl=document.createElement("div");rl.className="rail";rl.innerHTML="<i></i>";document.body.appendChild(rl);addEventListener("scroll",function(){var m=document.documentElement;rl.firstChild.style.top=(m.scrollTop/((m.scrollHeight-innerHeight)||1))*100+"%";m.style.setProperty("--sy",m.scrollTop)},{passive:true});
var so=new IntersectionObserver(function(e){e.forEach(function(x){if(x.isIntersecting){var b=x.target,n=+b.dataset.n,t=0,id=setInterval(function(){t+=Math.ceil(n/40);if(t>=n){t=n;clearInterval(id)}b.textContent=t+(n>100?"+":"")},30);so.unobserve(b)}})});document.querySelectorAll("[data-n]").forEach(function(b){so.observe(b)});
rcat();rs();rr();rw();
if (rwa) rwa.addEventListener('click', function(event){
  if (!R.sel.length) { event.preventDefault(); alert('Pilih minimal satu slot jam yang tersedia.'); return; }
  if (!rdt.value || rdt.value < voltaTodayLocal()) { event.preventDefault(); alert('Pilih tanggal reservasi hari ini atau setelahnya.'); }
});
if ('IntersectionObserver' in window) {
  var io=new IntersectionObserver(function(e){e.forEach(function(x){if(x.isIntersecting){x.target.classList.add('on');x.target.classList.remove('reveal-pending');io.unobserve(x.target);}})},{threshold:.08});
  document.querySelectorAll('.rv').forEach(function(e){e.classList.add('reveal-pending');io.observe(e)});
}

