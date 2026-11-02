const $=s=>document.querySelector(s);
$('#menuBtn').onclick=e=>{const o=$('#nav').classList.toggle('open');e.currentTarget.setAttribute('aria-expanded',o)};
document.querySelectorAll('#nav a').forEach(a=>a.onclick=()=>$('#nav').classList.remove('open'));
$('#aiBtn').onclick=()=>$('#chat').classList.toggle('open');
$('#closeChat').onclick=()=>$('#chat').classList.remove('open');
const KB=[
 [/biaya|harga|spp|paket/,'Biaya bergantung paket (setengah hari, penuh, penuh plus). Rincian lengkap kami kirim setelah kunjungan atau lewat WhatsApp.'],
 [/usia|umur|bayi/,'Kami menerima anak usia 3 bulan sampai 6 tahun, dengan kelas terpisah per tahap usia.'],
 [/jam|buka|operasional/,'Senin–Jumat 06.30–17.30, Sabtu 07.00–12.00.'],
 [/kunjung|visit|jadwal|daftar/,'Kunjungan 30 menit tersedia setiap hari kerja. Tekan tombol WhatsApp untuk memilih jam.'],
 [/makan|alergi|menu/,'Menu disusun ahli gizi dan kami menyiapkan pengganti untuk anak dengan alergi.']
];
function ask(q){
  const add=(c,t)=>{const d=document.createElement('div');d.className='m '+c;d.textContent=t;$('#msgs').append(d);$('#msgs').scrollTop=1e5};
  add('me',q);
  const hit=KB.find(k=>k[0].test(q.toLowerCase()));
  setTimeout(()=>add('bot',hit?hit[1]:'Untuk pertanyaan ini, tim kami siap membantu langsung lewat WhatsApp.'),350);
}
$('#chips').onclick=e=>{if(e.target.tagName==='BUTTON')ask(e.target.textContent)};
