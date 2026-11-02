(function(){
var $=function(s){return document.querySelector(s)};
var b=$('#burger'),m=$('#menu');
b.onclick=function(){var o=m.classList.toggle('show');b.setAttribute('aria-expanded',o)};
m.addEventListener('click',function(){m.classList.remove('show')});
var chat=$('#chat'),log=$('#log');
function tog(){chat.classList.toggle('open')}
$('#aib').onclick=tog;$('#x').onclick=tog;
function say(t,c){var d=document.createElement('div');d.className='m '+c;d.textContent=t;log.appendChild(d);log.scrollTop=log.scrollHeight}
var R=[
[/menu|rekomendasi|makan|enak|favorit/,'Favorit tamu: Tenderloin Steak (Rp 135.000), Spaghetti Bolognese (Rp 68.000), dan Choco Cherry Cake untuk penutup.'],
[/jam|buka|tutup/,'Kami buka setiap hari pukul 10.00–22.00 WIB. Pesanan terakhir masuk dapur pukul 21.15.'],
[/reservasi|booking|meja|pesan/,'Reservasi paling cepat lewat tombol WhatsApp hijau di pojok layar. Sebutkan tanggal, jam, dan jumlah tamu ya.'],
[/vegetarian|vegan|sayur/,'Pilihan vegetarian: Sup Krim Jamur, Pasta Aglio Olio, dan Salad Kebun.'],
[/halal/,'Semua menu kami halal dan bebas alkohol.'],
[/harga|murah|budget/,'Menu mulai dari Rp 38.000. Rata-rata satu orang sekitar Rp 80.000–150.000.'],
[/alamat|lokasi|dimana|di mana/,'Kami ada di Jl. Raya Darmo No. 88, Surabaya.']];
function ask(t){t=t.trim();if(!t)return;say(t,'u');var l=t.toLowerCase(),a='Maaf, saya belum paham. Coba tanya soal menu, jam buka, harga, atau reservasi, atau hubungi kami lewat WhatsApp.';
for(var i=0;i<R.length;i++){if(R[i][0].test(l)){a=R[i][1];break}}
setTimeout(function(){say(a,'b')},450)}
$('#f').onsubmit=function(e){e.preventDefault();ask($('#q').value);$('#q').value=''};
document.querySelectorAll('.qs button').forEach(function(x){x.onclick=function(){ask(x.textContent)}});
document.querySelectorAll('.add').forEach(function(x){x.onclick=function(){
window.open('https://wa.me/6281234567890?text='+encodeURIComponent('Halo, saya ingin memesan '+x.dataset.n+'.'),'_blank')}});
})();
