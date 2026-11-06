document.getElementById('menu').onclick=function(){document.getElementById('links').classList.toggle('open')};
document.querySelectorAll('#links a').forEach(function(a){a.addEventListener('click',function(){document.getElementById('links').classList.remove('open')})});
var els=document.querySelectorAll('.card,.tile,.pc,.stats div,.hud,details,h2,.sub,.label,.checks li');
if('IntersectionObserver' in window&&!matchMedia('(prefers-reduced-motion:reduce)').matches){var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.12});els.forEach(function(el,i){el.classList.add('rv');el.style.animationDelay=((i%4)*80)+'ms';io.observe(el)})}
window.addEventListener('scroll',function(){document.querySelector('nav').classList.toggle('sc',window.scrollY>10)});
setInterval(function(){document.getElementById('bpm').textContent=(82+Math.floor(Math.random()*6))+' bpm'},1500);
var chat=document.getElementById('chat');
document.getElementById('aiBtn').onclick=function(){chat.classList.toggle('open')};
var A={layanan:['Layanan','Kami menyediakan klinik & vaksin, grooming, penitipan, dan pet taxi untuk anjing, kucing, serta hewan kecil.'],
harga:['Harga','Grooming Basic mulai Rp120rb, Health Check Plus Rp450rb, dan Boarding Premium Rp180rb per malam.'],
boarding:['Penitipan','Kamar ber-AC dengan CCTV, laporan foto harian, dan jam bermain terjadwal. Bukti vaksin dasar diperlukan.'],
jadwal:['Jam buka','Kami buka Senin–Minggu pukul 08.00–20.00. Klik tombol WhatsApp untuk booking jadwal.']};
var msgs=document.getElementById('msgs');
function add(t,c){var d=document.createElement('div');d.className='m '+c;d.textContent=t;msgs.appendChild(d);msgs.scrollTop=msgs.scrollHeight}
document.querySelectorAll('.chips button').forEach(function(b){b.onclick=function(){var r=A[b.dataset.q];add(r[0],'me');setTimeout(function(){add(r[1],'bot')},300)}});
