(function(){
 var $=function(s){return document.querySelector(s)};
 var burger=$('#burger'),menu=$('#menu');
 burger.onclick=function(){var o=menu.classList.toggle('open');burger.setAttribute('aria-expanded',o)};
 menu.addEventListener('click',function(e){if(e.target.tagName==='A'){menu.classList.remove('open')}});
 var WA='6281234567890';
 $('#f').onsubmit=function(e){e.preventDefault();var d=new FormData(e.target);
  var t='Halo Rumah Latte, saya '+d.get('n')+' (WA '+d.get('w')+'). Anak usia '+d.get('u')+', tertarik paket '+d.get('p')+'. '+(d.get('c')||'');
  $('#ok').style.display='block';window.open('https://wa.me/'+WA+'?text='+encodeURIComponent(t),'_blank')};
 var chat=$('#chat'),msgs=$('#msgs'),qr=$('#qr'),started=false;
 function say(t,c){var d=document.createElement('div');d.className='m '+c;d.textContent=t;msgs.appendChild(d);msgs.scrollTop=msgs.scrollHeight}
 function chips(a){qr.innerHTML='';a.forEach(function(x){var b=document.createElement('button');b.type='button';b.textContent=x;b.onclick=function(){ask(x)};qr.appendChild(b)})}
 var base=['Anak saya 1 tahun','Anak saya 3 tahun','Biaya','Jam buka'];
 function reply(q){q=q.toLowerCase();var m=q.match(/(\d+)\s*(bulan|bln|tahun|thn)/),age=null;
  if(m){age=+m[1];if(/bulan|bln/.test(m[2]))age/=12}
  if(age!==null){
   if(age<1.5)return 'Untuk usia itu kami sarankan Baby Care: stimulasi sensorik dan rutinitas tidur. Paket Full day cocok bila orang tua bekerja.';
   if(age<3)return 'Program Toddler cocok: belajar bahasa, motorik kasar, dan makan mandiri. Mulai dari paket Half day Rp1.800.000/bulan.';
   if(age<4)return 'Playgroup pilihan tepat: seni, musik, dan bersosialisasi. Anak juga mulai dilatih mandiri ke toilet.';
   return 'Kindergarten Prep menyiapkan anak masuk SD lewat pra-baca dan pra-hitung dengan cara bermain.';}
  if(/biaya|harga|bayar|spp/.test(q))return 'Half day Rp1.800.000, Full day Rp2.900.000 per bulan, drop-in Rp175.000 per hari. Pendaftaran Rp500.000 sekali bayar.';
  if(/jam|buka|jemput/.test(q))return 'Kami buka Senin–Jumat 07.00–17.30 dan Sabtu 07.00–12.00.';
  if(/alergi|makan|menu/.test(q))return 'Menu disusun ahli gizi. Beri tahu alergi anak saat mendaftar dan kami siapkan menu terpisah.';
  if(/daftar|kunjung|visit|coba/.test(q))return 'Isi formulir “Daftar kunjungan” di halaman ini. Hari percobaan pertama gratis.';
  return 'Saya belum yakin jawabannya. Tanyakan langsung ke tim kami lewat tombol WhatsApp, atau sebutkan usia anak untuk rekomendasi program.'}
 function ask(t){say(t,'me');setTimeout(function(){say(reply(t),'bot');chips(base)},350)}
 function open(o){chat.classList.toggle('open',o);$('#aiBtn').setAttribute('aria-expanded',o);
  if(o&&!started){started=true;say('Halo! Saya asisten Rumah Latte. Sebutkan usia anak Anda dan saya carikan program yang cocok.','bot');chips(base)}
  if(o)$('#ci').focus()}
 $('#aiBtn').onclick=function(){open(!chat.classList.contains('open'))};
 $('#x').onclick=function(){open(false)};
 $('#cf').onsubmit=function(e){e.preventDefault();var v=$('#ci').value.trim();if(v){$('#ci').value='';ask(v)}};
 document.querySelectorAll('.slot').forEach(function(s){
  var inp=document.createElement('input');inp.type='file';inp.accept='image/*';inp.hidden=true;s.appendChild(inp);
  var b=document.createElement('span');b.className='add';b.textContent='+ Foto';s.appendChild(b);
  s.tabIndex=0;s.setAttribute('role','button');s.setAttribute('aria-label','Tambah foto');
  s.addEventListener('click',function(e){if(e.target!==inp)inp.click()});
  s.addEventListener('keydown',function(e){if(e.key==='Enter'||e.key===' '){e.preventDefault();inp.click()}});
  inp.onchange=function(){var f=inp.files[0];if(!f)return;var r=new FileReader();
   r.onload=function(){var im=s.querySelector('img');if(!im){im=document.createElement('img');im.alt='Foto sekolah';s.insertBefore(im,s.firstChild)}
    im.src=r.result;s.classList.add('filled');b.textContent='Ganti'};r.readAsDataURL(f)}});
})();
