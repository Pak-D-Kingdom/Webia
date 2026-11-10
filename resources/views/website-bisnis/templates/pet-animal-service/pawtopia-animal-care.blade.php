<!doctype html>
<html lang="id">
<head><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Pawtopia — Animal Care Masa Depan</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=JetBrains+Mono:wght@500&display=swap">
<link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/pet-animal-service/pawtopia-animal-care.css') }}">
</head>
<body class="pawtopia-template{{ request()->boolean('preview') ? ' pawtopia-template-preview' : '' }}">
<nav>
  <div class="wrap">
    <a class="logo" href="#top"><i>🐾</i>Pawtopia</a>
    <div class="links" id="links">
      <a href="#layanan">Layanan</a>
      <a href="#teknologi">Teknologi</a>
      <a href="#tim">Tim</a>
      <a href="#adopsi">Adopsi</a>
      <a href="#paket">Paket</a>
      <a href="#testimoni">Testimoni</a>
      <a href="#faq">FAQ</a>
      <a class="btn" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20booking%20layanan%20hewan" target="_blank" rel="noopener">Booking</a>
    </div>
    <button class="menu" id="menu" aria-label="Menu">Menu</button>
  </div>
</nav>

<header class="hero" id="top">
  <div class="wrap">
    <div>
      <div class="eyebrow"><span class="dot"></span>Smart Animal Care</div>
      <h1>Perawatan hewan kesayangan, <span>dirancang untuk masa depan.</span></h1>
      <p class="lead">Klinik, grooming, dan penitipan dengan teknologi pemantauan kesehatan real-time, ditangani dokter hewan dan groomer bersertifikat.</p>
      <div class="cta">
        <a class="btn lime" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi%20untuk%20hewan%20saya" target="_blank" rel="noopener">Booking Sekarang</a>
        <a class="btn ghost" href="#layanan">Lihat Layanan</a>
      </div>
    </div>
    <div class="hud"><span class="fb f1">✓ Vaksin lengkap</span><span class="fb f2">📹 CCTV 24/7</span>
      <div class="top"><span>PAW·SCAN v2.0</span><span>● LIVE</span></div>
      <div class="pet">
        <div class="ring"><b>92</b></div>
        <div><h3>Milo</h3><p>Golden Retriever · 3 tahun</p></div>
      </div>
      <div class="row"><span>Detak jantung</span><b id="bpm">84 bpm</b></div>
      <div class="row"><span>Suhu tubuh</span><b>38,4 °C</b></div>
      <div class="row"><span>Aktivitas hari ini</span><b>92%</b></div>
      <div class="row"><span>Status</span><b>SEHAT</b></div>
    </div>
  </div>
</header>

<div class="stats">
  <div class="wrap">
    <div><b>12.000+</b><span>Hewan terlayani</span></div>
    <div><b>15</b><span>Dokter hewan &amp; groomer</span></div>
    <div><b>24/7</b><span>Pemantauan penitipan</span></div>
    <div><b>4,9★</b><span>Rating pemilik hewan</span></div>
  </div>
</div>

<div class="marq"><div><span>🐾 Klinik</span><span>✦ Grooming</span><span>🐾 Penitipan</span><span>✦ Pet Taxi</span><span>🐾 Vaksin</span><span>✦ Adopsi</span><span>🐾 Konsultasi Nutrisi</span><span>✦ Pelatihan Perilaku</span><span>🐾 Klinik</span><span>✦ Grooming</span><span>🐾 Penitipan</span><span>✦ Pet Taxi</span><span>🐾 Vaksin</span><span>✦ Adopsi</span><span>🐾 Konsultasi Nutrisi</span><span>✦ Pelatihan Perilaku</span></div></div>

<section id="layanan">
  <div class="wrap">
    <div class="label">Layanan</div>
    <h2>Semua kebutuhan hewan, satu tempat</h2>
    <p class="sub">Untuk anjing, kucing, kelinci, dan hewan peliharaan eksotis.</p>
    <div class="grid g4">
      <div class="card"><div class="ic">🩺</div><h3>Klinik &amp; Vaksin</h3><p>Pemeriksaan, vaksinasi, sterilisasi, dan perawatan gigi.</p></div>
      <div class="card"><div class="ic">✂️</div><h3>Grooming</h3><p>Mandi, potong bulu, dan spa dengan produk aman.</p></div>
      <div class="card"><div class="ic">🏡</div><h3>Penitipan</h3><p>Kamar ber-AC dengan CCTV dan laporan harian.</p></div>
      <div class="card"><div class="ic">🚐</div><h3>Pet Taxi</h3><p>Antar-jemput nyaman dengan kendaraan khusus.</p></div>
    </div>
  </div>
</section>

<section class="alt" id="hewan">
  <div class="wrap">
    <div class="label">Jenis hewan</div>
    <h2>Ramah untuk semua keluarga berbulu</h2>
    <p class="sub">Ruang dan perawatan dibedakan sesuai kebutuhan tiap spesies.</p>
    <div class="pets">
      <div class="pc"><span>🐕</span><b>Anjing</b><small>Semua ras</small></div>
      <div class="pc"><span>🐈</span><b>Kucing</b><small>Cat-friendly room</small></div>
      <div class="pc"><span>🐇</span><b>Kelinci</b><small>Small animal</small></div>
      <div class="pc"><span>🦜</span><b>Burung</b><small>Avian care</small></div>
      <div class="pc"><span>🦎</span><b>Reptil</b><small>Eksotis</small></div>
      <div class="pc"><span>🐹</span><b>Hamster</b><small>Pengerat</small></div>
    </div>
  </div>
</section>

<section id="teknologi">
  <div class="wrap tech">
    <div>
      <div class="label">Teknologi</div>
      <h2>Perawatan berbasis data, bukan tebakan</h2>
      <p class="sub" style="margin-bottom:0">Setiap hewan punya profil digital yang membantu tim kami memberi perawatan yang tepat.</p>
      <ul class="checks">
        <li>Rekam medis digital yang bisa diakses pemilik</li>
        <li>Pelacak aktivitas &amp; vital sign selama penitipan</li>
        <li>Streaming CCTV agar Anda bisa memantau kapan saja</li>
        <li>Pengingat vaksin dan kontrol otomatis via WhatsApp</li>
      </ul>
    </div>
    <div class="grid" style="grid-template-columns:1fr">
      <div class="card"><div class="step">STEP 01</div><h3>Booking via WhatsApp</h3><p>Pilih layanan dan jadwal dalam hitungan menit.</p></div>
      <div class="card"><div class="step">STEP 02</div><h3>Pemeriksaan &amp; profil digital</h3><p>Kami mencatat kondisi dan kebutuhan hewan Anda.</p></div>
      <div class="card"><div class="step">STEP 03</div><h3>Pantau &amp; terima laporan</h3><p>Foto, video, dan ringkasan kesehatan langsung ke ponsel Anda.</p></div>
    </div>
  </div>
</section>

<section class="alt" id="aplikasi">
  <div class="wrap">
    <div class="label">Dashboard pemilik</div>
    <h2>Pantau semuanya dari satu layar</h2>
    <p class="sub">Cuplikan fitur yang Anda dapat selama hewan dalam perawatan kami.</p>
    <div class="bento">
      <div class="tile big"><div class="tag">Live CCTV</div><h3>Lihat Milo bermain, kapan saja</h3><p>Streaming kamar penitipan dengan akses khusus pemilik.</p><div class="cam"><i>● REC · CAM 03</i>🐕<em>Kamar Boarding A</em></div></div>
      <div class="tile"><div class="tag">Aktivitas</div><h3>7 hari terakhir</h3><div class="bars"><span style="height:55%"></span><span style="height:72%"></span><span style="height:48%"></span><span style="height:88%"></span><span style="height:65%"></span><span style="height:94%"></span><span style="height:80%"></span></div></div>
      <div class="tile"><div class="tag">Pengingat</div><h3>Jadwal kesehatan</h3><div class="rm"><span>Vaksin rabies</span><b>12 DES</b></div><div class="rm"><span>Obat cacing</span><b>03 JAN</b></div><div class="rm"><span>Kontrol gigi</span><b>20 JAN</b></div></div>
      <div class="tile wide"><div class="tag">Laporan harian</div><h3>Pesan dari tim perawat</h3><div class="bub">“Milo makan lahap, bermain 40 menit di taman, dan tidur nyenyak. 📸 3 foto baru.”</div></div>
    </div>
  </div>
</section>

<section id="tim">
  <div class="wrap">
    <div class="label">Tim</div>
    <h2>Orang-orang di balik perawatan</h2>
    <p class="sub">Dokter hewan dan groomer bersertifikat yang benar-benar mencintai hewan.</p>
    <div class="grid g4">
      <div class="card ctr"><div class="av">👨‍⚕️</div><h3>drh. Andi Wijaya</h3><p>Dokter hewan umum</p><span class="chip">Bedah</span><span class="chip">Vaksin</span></div>
      <div class="card ctr"><div class="av">👩‍⚕️</div><h3>drh. Sinta Maharani</h3><p>Spesialis kucing</p><span class="chip">Feline</span><span class="chip">Gigi</span></div>
      <div class="card ctr"><div class="av">✂️</div><h3>Rudi Hartono</h3><p>Head groomer</p><span class="chip">Show cut</span><span class="chip">Spa</span></div>
      <div class="card ctr"><div class="av">🎓</div><h3>Maya Putri</h3><p>Perilaku hewan</p><span class="chip">Training</span><span class="chip">Anxiety</span></div>
    </div>
  </div>
</section>

<section class="alt" id="adopsi">
  <div class="wrap">
    <div class="label">Adopsi</div>
    <h2>Temukan teman baru di rumahmu</h2>
    <p class="sub">Semua hewan sudah divaksin, disterilkan, dan menjalani pemeriksaan kesehatan.</p>
    <div class="grid g4 adopt">
      <div class="card ctr"><div class="em">🐕</div><h3>Bruno</h3><p>Mixed breed · 2 tahun</p><span class="chip">Aktif</span><span class="chip">Ramah anak</span><br><a class="more" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20mengadopsi%20Bruno" target="_blank" rel="noopener">Tanya adopsi →</a></div>
      <div class="card ctr"><div class="em">🐈</div><h3>Mochi</h3><p>Domestik · 1 tahun</p><span class="chip">Manja</span><span class="chip">Tenang</span><br><a class="more" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20mengadopsi%20Mochi" target="_blank" rel="noopener">Tanya adopsi →</a></div>
      <div class="card ctr"><div class="em">🐇</div><h3>Coco</h3><p>Holland lop · 8 bulan</p><span class="chip">Lembut</span><span class="chip">Penasaran</span><br><a class="more" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20mengadopsi%20Coco" target="_blank" rel="noopener">Tanya adopsi →</a></div>
      <div class="card ctr"><div class="em">🦜</div><h3>Kiwi</h3><p>Lovebird · 1 tahun</p><span class="chip">Cerewet</span><span class="chip">Ceria</span><br><a class="more" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20mengadopsi%20Kiwi" target="_blank" rel="noopener">Tanya adopsi →</a></div>
    </div>
  </div>
</section>

<section id="paket">
  <div class="wrap">
    <div class="label">Paket</div>
    <h2>Harga jelas, tanpa kejutan</h2>
    <p class="sub">Harga untuk ukuran hewan sedang, menyesuaikan jenis dan berat.</p>
    <div class="grid">
      <div class="card"><h3>Grooming Basic</h3><div class="price">Rp120rb <small>/ sesi</small></div><ul class="pl"><li>Mandi &amp; pengeringan</li><li>Potong kuku &amp; bersih telinga</li><li>Parfum hewan aman</li></ul></div>
      <div class="card hl"><span class="badge">Paling dipilih</span><h3>Health Check Plus</h3><div class="price">Rp450rb <small>/ kunjungan</small></div><ul class="pl"><li>Pemeriksaan dokter hewan</li><li>Profil kesehatan digital</li><li>Rencana vaksin &amp; nutrisi</li></ul></div>
      <div class="card"><h3>Boarding Premium</h3><div class="price">Rp180rb <small>/ malam</small></div><ul class="pl"><li>Kamar ber-AC &amp; CCTV</li><li>Laporan foto harian</li><li>Jam bermain terjadwal</li></ul></div>
    </div>
  </div>
</section>

<section class="alt" id="testimoni">
  <div class="wrap">
    <div class="label">Testimoni</div>
    <h2>Dipercaya pemilik hewan</h2>
    <p class="sub">Cerita dari keluarga berbulu yang kami rawat.</p>
    <div class="grid">
      <div class="card"><p class="quote">“Laporan foto harian saat menitipkan Luna bikin saya tenang selama perjalanan dinas.”</p><div class="who">Rina, pemilik kucing</div></div>
      <div class="card"><p class="quote">“Dokternya sabar dan rekam medis digitalnya sangat memudahkan jadwal vaksin.”</p><div class="who">Bayu, pemilik anjing</div></div>
      <div class="card"><p class="quote">“Hasil grooming rapi dan Milo tidak stres sama sekali. Pasti balik lagi.”</p><div class="who">Dewi, pemilik golden retriever</div></div>
    </div>
  </div>
</section>

<section id="tips">
  <div class="wrap">
    <div class="label">Tips perawatan</div>
    <h2>Belajar merawat lebih baik</h2>
    <p class="sub">Artikel singkat dari dokter hewan dan groomer kami.</p>
    <div class="grid">
      <div class="card"><span class="tag">Perilaku · 4 mnt</span><h3>5 tanda anjing Anda sedang stres</h3><p>Kenali sinyal halus yang sering terlewat sebelum berubah jadi masalah perilaku.</p><a class="more" href="#">Baca →</a></div>
      <div class="card"><span class="tag">Kesehatan · 3 mnt</span><h3>Jadwal vaksin kucing dari usia 8 minggu</h3><p>Panduan vaksin inti dan waktu terbaik untuk booster tahunan.</p><a class="more" href="#">Baca →</a></div>
      <div class="card"><span class="tag">Nutrisi · 5 mnt</span><h3>Menu harian kelinci yang seimbang</h3><p>Hay, sayur, dan pelet: porsi yang tepat agar pencernaan tetap sehat.</p><a class="more" href="#">Baca →</a></div>
    </div>
  </div>
</section>

<section class="alt" id="faq">
  <div class="wrap">
    <div class="label">FAQ</div>
    <h2>Pertanyaan umum</h2>
    <p class="sub">Belum menemukan jawabannya? Tanyakan lewat WhatsApp.</p>
    <div class="faq">
      <details><summary>Hewan apa saja yang dilayani?</summary><p>Anjing, kucing, kelinci, hamster, dan beberapa hewan eksotis tertentu. Hubungi kami untuk memastikan jenis hewan Anda.</p></details>
      <details><summary>Apakah hewan wajib divaksin untuk penitipan?</summary><p>Ya. Demi keamanan semua hewan, kami meminta bukti vaksin dasar yang masih berlaku sebelum check-in.</p></details>
      <details><summary>Bagaimana cara memantau hewan saat dititipkan?</summary><p>Anda akan menerima laporan foto dan video harian, serta akses streaming CCTV selama masa penitipan.</p></details>
      <details><summary>Apakah ada layanan darurat?</summary><p>Tersedia konsultasi darurat via WhatsApp pada jam operasional. Untuk kondisi kritis di luar jam, segera bawa ke klinik hewan 24 jam terdekat.</p></details>
      <details><summary>Bagaimana cara membuat janji?</summary><p>Klik tombol WhatsApp, pilih layanan dan jadwal, lalu tim kami akan mengonfirmasi dalam hitungan menit.</p></details>
    </div>
  </div>
</section>

<section class="band">
  <div class="wrap">
    <h2>Beri mereka perawatan terbaik hari ini.</h2>
    <p>Booking mudah lewat WhatsApp, tim kami siap membantu.</p>
    <a class="btn lime" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20booking" target="_blank" rel="noopener">Booking via WhatsApp</a>
  </div>
</section>

<footer>
  <div class="wrap">
    <div><b>🐾 Pawtopia</b><p style="max-width:300px">Klinik, grooming, dan penitipan hewan berteknologi, dirawat dengan hati.</p></div>
    <div><b>Menu</b><a href="#layanan">Layanan</a><a href="#teknologi">Teknologi</a><a href="#paket">Paket</a><a href="#faq">FAQ</a></div>
    <div><b>Kontak</b><a href="#">halo@pawtopia.id</a><a href="#">+62 812-3456-7890</a><a href="#">Senin–Minggu, 08.00–20.00</a></div>
    <div class="copy">© 2026 Pawtopia. Semua hak dilindungi. &nbsp;·&nbsp; Instagram &nbsp;·&nbsp; TikTok &nbsp;·&nbsp; YouTube</div>
  </div>
</footer>

<div class="chat" id="chat" role="dialog" aria-label="Asisten AI">
  <header>● PAW-AI ONLINE</header>
  <div class="msgs" id="msgs"><div class="m bot">Halo! Saya asisten virtual Pawtopia. Pilih topik di bawah ya 🐾</div></div>
  <div class="chips">
    <button data-q="layanan">Layanan</button>
    <button data-q="harga">Harga</button>
    <button data-q="boarding">Penitipan</button>
    <button data-q="jadwal">Jam buka</button>
  </div>
</div>
<button class="fab ai" id="aiBtn" aria-label="Buka asisten AI">✦ Tanya AI</button>
<a class="fab wa" href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20konsultasi" target="_blank" rel="noopener" aria-label="Chat WhatsApp">WhatsApp</a>

<script>
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
document.querySelectorAll('.chips button').forEach(function(b){b.onclick=async function(){var r=A[b.dataset.q];var q=r[0];var fallback=r[1];add(q,'me');try{var tenantId=window.WEBIA_TENANT_ID||'tenant_pet_01';var res=await fetch('http://localhost:8001/api/v1/chat',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({message:q,tenant_id:tenantId,layer:'l4',stream:false})});if(res.ok){var data=await res.json();var reply=data.reply||data.response||(data.data&&data.data.reply)||fallback;add(reply,'bot');return;}}catch(e){}setTimeout(function(){add(fallback,'bot')},300)}});
</script>
<script src="{{ asset('js/website-bisnis/templates/pet-animal-service/pawtopia-animal-care.js') }}" defer></script>
</body>
</html>
