@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lumière Studio | Product Photography & Videography</title>
<style>
:root{--teal:#073b3e;--deep:#03292c;--ocean:#0e7778;--mint:#dcebea;--cream:#f7f7f2;--ink:#123c3e;--muted:#587477;--line:#d8e4e1}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--cream);color:var(--ink);font-family:Arial,Helvetica,sans-serif;line-height:1.65}a{color:inherit;text-decoration:none}button{font:inherit;cursor:pointer}.container{width:min(1180px,91%);margin:auto}
.topbar{background:#021f22;color:#d9e9e7;font-size:12px;padding:7px 0}.topbar .container{display:flex;justify-content:space-between;gap:16px}
header{position:sticky;top:0;z-index:10;background:rgba(3,41,44,.97);color:white;border-bottom:1px solid #ffffff18;backdrop-filter:blur(10px)}
.nav{height:76px;display:flex;align-items:center;justify-content:space-between;gap:22px}.logo{font-family:Georgia,serif;font-size:29px;letter-spacing:2px;line-height:1}.logo small{display:block;font-family:Arial,sans-serif;font-size:9px;letter-spacing:3px;text-align:center;margin-top:7px}.navlinks{display:flex;gap:26px;font-size:13px}.navlinks a:hover{color:#81d0cb}.navcta,.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;border-radius:99px;padding:12px 22px;font-size:13px;font-weight:700;border:1px solid transparent;transition:.2s}.navcta,.btn.light{background:#f8f8f2;color:var(--teal)}.btn.primary{background:var(--ocean);color:white}.btn.outline{border-color:#b6d1ce;color:white;background:transparent}.btn:hover,.navcta:hover{transform:translateY(-2px);filter:brightness(1.08)}
.menu{display:none;background:transparent;color:white;border:1px solid #ffffff55;border-radius:8px;padding:8px 12px}
.hero{position:relative;min-height:530px;color:white;display:flex;align-items:center;overflow:hidden;background:linear-gradient(90deg,rgba(2,31,34,.96) 0%,rgba(3,41,44,.78) 43%,rgba(3,41,44,.12) 100%),url('https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=2000&q=85') center/cover}
.hero-content{max-width:570px;padding:75px 0}.eyebrow{font-size:11px;letter-spacing:2px;text-transform:uppercase;color:#70c7c2;font-weight:700}.hero h1,.section-title{font-family:Georgia,'Times New Roman',serif;font-weight:400;letter-spacing:-1.6px;line-height:1.08}.hero h1{font-size:clamp(44px,6vw,76px);margin:18px 0}.hero p{max-width:490px;color:#d7e7e4;font-size:15px}.actions{display:flex;gap:12px;flex-wrap:wrap;margin-top:28px}.hero-note{position:absolute;right:5%;bottom:32px;font-size:11px;letter-spacing:2px;color:#d3e8e5;writing-mode:vertical-rl}
.services{background:#f0f3ee;padding:28px 0}.service-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:0}.service{padding:16px 20px;text-align:center;border-right:1px solid var(--line)}.service:last-child{border:0}.service .symbol{font-size:27px;color:var(--ocean)}.service h3{font-family:Georgia,serif;font-size:17px;font-weight:400;margin:5px 0}.service p{font-size:12px;color:var(--muted);margin:0}
.section{padding:78px 0}.about-grid{display:grid;grid-template-columns:1fr 1fr;gap:70px;align-items:center}.image-collage{display:grid;grid-template-columns:1.2fr .8fr;grid-template-rows:180px 180px;gap:10px}.image-collage img{width:100%;height:100%;object-fit:cover;border-radius:3px}.image-collage img:first-child{grid-row:span 2}.section-title{font-size:clamp(34px,4vw,49px);margin:12px 0 18px}.copy{color:var(--muted);font-size:15px}.about .btn{margin-top:14px}
.portfolio{background:var(--deep);color:white}.portfolio-head{display:flex;justify-content:space-between;align-items:end;gap:30px;margin-bottom:30px}.portfolio-head p{color:#b9d1ce;max-width:350px}.portfolio-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}.work img{width:100%;height:240px;object-fit:cover;border-radius:4px;display:block;transition:transform .3s}.work{overflow:hidden}.work:hover img{transform:scale(1.03)}.work h3{font-family:Georgia,serif;font-weight:400;font-size:18px;margin:12px 0 0}.work p{font-size:12px;color:#a8c8c4;margin:0}
.faq-grid{display:grid;grid-template-columns:.8fr 1.2fr;gap:65px}.faq-list details{border:1px solid var(--line);border-radius:5px;margin-bottom:9px;background:#fbfcf8}.faq-list summary{cursor:pointer;list-style:none;padding:17px 18px;font-family:Georgia,serif;font-size:16px;display:flex;justify-content:space-between;gap:20px}.faq-list summary::-webkit-details-marker{display:none}.faq-list summary:after{content:'+';font-family:Arial;color:var(--ocean);font-size:20px}.faq-list details[open] summary:after{content:'−'}.faq-list details p{padding:0 18px 18px;margin:0;color:var(--muted);font-size:14px}
.location{background:#e3efec}.location-grid{display:grid;grid-template-columns:.8fr 1.25fr .9fr;gap:22px;align-items:stretch}.contact-lines{font-size:13px;color:var(--muted)}.contact-lines p{margin:12px 0}.map{min-height:280px;border:0;width:100%;height:100%;border-radius:6px;background:#d1e1df}.contact-card{background:linear-gradient(145deg,#0c6263,#073638);color:white;padding:28px;border-radius:7px;display:flex;flex-direction:column;justify-content:center}.contact-card h3{font-family:Georgia,serif;font-size:27px;line-height:1.2;font-weight:400;margin:0 0 12px}.contact-card p{font-size:13px;color:#d0e4e1}
footer{background:#021f22;color:#d5e7e4;padding:30px 0}.footer-row{display:flex;align-items:center;justify-content:space-between;gap:24px}.footer-links{display:flex;gap:20px;font-size:12px}.copyright{font-size:11px;color:#91b2af}
.floating{position:fixed;right:18px;bottom:22px;z-index:20;display:flex;flex-direction:column;gap:10px}.float-btn{border:0;border-radius:99px;color:white;padding:12px 17px;box-shadow:0 5px 20px #001c1e30;font-size:13px;font-weight:700}.float-ai{background:#087eb0}.float-wa{background:#0a9c76}.chat-panel{display:none;position:fixed;right:20px;bottom:142px;width:min(330px,calc(100vw - 40px));background:white;z-index:25;border-radius:12px;box-shadow:0 12px 45px #002b2d35;overflow:hidden;border:1px solid var(--line)}.chat-panel.active{display:block}.chat-head{background:var(--teal);color:white;padding:15px;font-weight:700;display:flex;justify-content:space-between}.chat-body{padding:16px;font-size:13px;color:var(--muted)}.chat-body input{width:100%;padding:11px;border:1px solid var(--line);border-radius:7px;margin:8px 0}.chat-body button{border:0;border-radius:7px;background:var(--ocean);color:white;padding:10px 14px}
@media(max-width:850px){.navlinks{display:none;position:absolute;top:76px;left:0;right:0;background:var(--deep);padding:20px 5%;flex-direction:column;gap:14px}.navlinks.open{display:flex}.menu{display:block}.navcta{display:none}.service-grid{grid-template-columns:repeat(2,1fr)}.service{border-bottom:1px solid var(--line)}.about-grid,.faq-grid{grid-template-columns:1fr;gap:35px}.portfolio-grid{grid-template-columns:repeat(2,1fr)}.location-grid{grid-template-columns:1fr 1fr}.contact-card{grid-column:span 2}.hero{min-height:500px}.hero-content{padding:65px 0}.footer-row{flex-wrap:wrap}.footer-links{flex-wrap:wrap}}
@media(max-width:540px){.topbar .container span:last-child{display:none}.nav{height:68px}.logo{font-size:24px}.hero{min-height:520px;background-position:58% center}.hero h1{font-size:47px}.hero-note{display:none}.service-grid{grid-template-columns:1fr 1fr}.service{padding:14px 9px}.section{padding:55px 0}.image-collage{grid-template-rows:140px 140px}.portfolio-head{display:block}.portfolio-grid{grid-template-columns:1fr 1fr;gap:10px}.work img{height:175px}.faq-grid{gap:20px}.location-grid{grid-template-columns:1fr}.contact-card{grid-column:auto}.map{min-height:270px}.footer-row{align-items:flex-start;flex-direction:column}.footer-links{gap:13px}.floating{right:12px;bottom:12px}.float-btn{padding:11px 13px}.copyright{line-height:1.8}}
</style>
</head>
<body>
<div class="topbar"><div class="container"><span>Visual storytelling for ambitious brands</span><span>Surabaya, Indonesia &nbsp; · &nbsp; Senin–Sabtu, 09.00–18.00</span></div></div>
<header><nav class="nav container">
<a class="logo" href="#home">LUMIÈRE<small>PHOTO &amp; VIDEO STUDIO</small></a>
<div class="navlinks" id="navlinks"><a href="#home">Home</a><a href="#about">Tentang</a><a href="#services">Layanan</a><a href="#portfolio">Portfolio</a><a href="#faq">FAQ</a><a href="#contact">Kontak</a></div>
<a class="navcta" href="#contact">Minta Penawaran ↗</a><button class="menu" id="menuBtn" aria-label="Buka menu">☰</button>
</nav></header>
<main>
<section class="hero" id="home"><div class="container"><div class="hero-content">
<div class="eyebrow">Product photography &amp; videography</div>
<h1>Bring Your Product<br>to Life.</h1>
<p>Kami membantu brand tampil lebih profesional dengan foto dan video produk berkualitas tinggi, berkonsep kreatif, dan siap untuk berbagai kebutuhan marketing.</p>
<div class="actions"><a class="btn primary" href="#portfolio">Lihat Portfolio ↗</a><a class="btn outline" href="#contact">Hubungi Kami</a></div>
</div></div><div class="hero-note">CRAFTED WITH CREATIVE INTENTION · 01 / 04</div></section>
<section class="services" id="services"><div class="container service-grid">
<div class="service"><div class="symbol">◎</div><h3>Product Photography</h3><p>Foto produk yang detail, estetik, dan profesional.</p></div>
<div class="service"><div class="symbol">▷</div><h3>Video Product</h3><p>Video promosi yang menarik dan meningkatkan penjualan.</p></div>
<div class="service"><div class="symbol">✧</div><h3>Creative Concept</h3><p>Ide kreatif sesuai karakter brand Anda.</p></div>
<div class="service"><div class="symbol">▱</div><h3>Professional Team</h3><p>Tim berpengalaman di bidang fotografi &amp; videografi.</p></div>
<div class="service"><div class="symbol">◷</div><h3>On-Time Delivery</h3><p>Hasil sesuai jadwal dengan kualitas terbaik.</p></div>
</div></section>
<section class="section about" id="about"><div class="container about-grid">
<div class="image-collage">
<img src="https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?auto=format&fit=crop&w=800&q=85" alt="Botol skincare dalam pemotretan produk">
<img src="https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=500&q=85" alt="Inspirasi visual produk minuman" onerror="this.src='https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=500&q=85'">
<img src="https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=500&q=85" alt="Produk perawatan kulit">
</div>
<div><div class="eyebrow">About us</div><h2 class="section-title">More Than Just Photos,<br>It’s Your Brand Story.</h2><p class="copy">Lumière Studio adalah creative studio yang fokus pada product photography &amp; videography. Kami percaya bahwa setiap produk memiliki cerita, dan kami siap membantu Anda menyampaikannya melalui visual yang kuat dan berkesan.</p><a class="btn primary" href="#contact">Tentang Kami ↗</a></div>
</div></section>
<section class="section portfolio" id="portfolio"><div class="container">
<div class="portfolio-head"><div><div class="eyebrow">Our works</div><h2 class="section-title">Portfolio.</h2></div><div><p>Beberapa hasil karya kami untuk berbagai brand dan industri.</p><a class="btn outline" href="#contact">Diskusikan Proyek ↗</a></div></div>
<div class="portfolio-grid">
<a class="work" href="#contact"><img src="https://images.unsplash.com/photo-1547887538-e3a2f32cb1cc?auto=format&fit=crop&w=700&q=85" alt="Pemotretan produk parfum"><h3>Beauty &amp; Skincare ↗</h3><p>Product Photography</p></a>
<a class="work" href="#contact"><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=700&q=85" alt="Pemotretan produk sepatu"><h3>Fashion &amp; Apparel ↗</h3><p>Product Photography</p></a>
<a class="work" href="#contact"><img src="https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=700&q=85" alt="Pemotretan minuman kopi"><h3>Food &amp; Beverage ↗</h3><p>Product Videography</p></a>
<a class="work" href="#contact"><img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=700&q=85" alt="Pemotretan produk teknologi" onerror="this.src='https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=700&q=85';this.onerror=function(){this.src='https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=700&q=85'}"><h3>Tech &amp; Gadget ↗</h3><p>Product Photography</p></a>
</div></div></section>
<section class="section" id="faq"><div class="container faq-grid"><div><div class="eyebrow">FAQ</div><h2 class="section-title">Pertanyaan yang<br>Sering Diajukan.</h2><p class="copy">Temukan jawaban untuk pertanyaan yang sering ditanyakan seputar layanan kami.</p></div>
<div class="faq-list">
<details><summary>Berapa lama proses pengerjaan?</summary><p>Waktu pengerjaan bergantung pada jumlah produk dan jenis layanan. Setelah brief disepakati, kami akan memberikan estimasi jadwal yang jelas.</p></details>
<details><summary>Apakah bisa request konsep sendiri?</summary><p>Tentu. Anda bisa mengirimkan referensi visual, moodboard, dan arahan brand. Tim kami juga dapat membantu mengembangkan konsepnya.</p></details>
<details><summary>Apakah tersedia layanan datang ke lokasi?</summary><p>Ya, layanan on-location dapat didiskusikan sesuai kebutuhan proyek dan area pemotretan.</p></details>
<details><summary>Bagaimana dengan revisi?</summary><p>Ketentuan revisi akan disampaikan dalam penawaran agar ekspektasi, hasil akhir, dan jadwal tetap jelas.</p></details>
<details><summary>Metode pembayaran apa saja yang tersedia?</summary><p>Metode pembayaran dan termin dapat dikonfirmasi saat konsultasi dan dicantumkan pada penawaran proyek.</p></details>
</div></div></section>
<section class="section location" id="contact"><div class="container location-grid">
<div><div class="eyebrow">Get in touch</div><h2 class="section-title">Lokasi Kami.</h2><div class="contact-lines"><p>⌖ &nbsp; Jl. Raya Kertajaya No.123<br>&nbsp;&nbsp;&nbsp;&nbsp; Surabaya, Jawa Timur 60219</p><p>☎ &nbsp; +62 812 3456 7890</p><p>✉ &nbsp; hello@lumiere.studio</p><p>◷ &nbsp; Senin–Sabtu, 09.00–18.00</p></div></div>
<iframe class="map" title="Peta lokasi studio di Surabaya" loading="lazy" src="https://maps.google.com/maps?q=Kertajaya%2C%20Surabaya%2C%20Indonesia&t=&z=14&ie=UTF8&iwloc=&output=embed" allowfullscreen></iframe>
<div class="contact-card"><h3>Siap Wujudkan<br>Karya Terbaik Anda?</h3><p>Hubungi kami sekarang untuk konsultasi atau pemesanan layanan fotografi &amp; videografi.</p><a class="btn light" href="https://wa.me/6281234567890?text=Halo%20Lumi%C3%A8re%20Studio%2C%20saya%20ingin%20konsultasi%20layanan%20foto%20produk." target="_blank" rel="noopener">Hubungi Kami ↗</a></div>
</div></section>
</main>
<footer><div class="container footer-row"><a class="logo" href="#home">LUMIÈRE<small>PHOTO &amp; VIDEO STUDIO</small></a><div class="footer-links"><a href="#home">Home</a><a href="#about">Tentang</a><a href="#services">Layanan</a><a href="#portfolio">Portfolio</a><a href="#faq">FAQ</a><a href="#contact">Kontak</a></div><div class="copyright">© 2026 Lumière Studio. All rights reserved.</div></div></footer>
<div class="floating"><button class="float-btn float-ai" id="aiBtn">✦ &nbsp; AI Assistant</button><a class="float-btn float-wa" href="https://wa.me/6281234567890?text=Halo%20Lumi%C3%A8re%20Studio%2C%20saya%20ingin%20bertanya%20tentang%20layanan." target="_blank" rel="noopener">◉ &nbsp; WhatsApp</a></div>
<div class="chat-panel" id="chatPanel"><div class="chat-head">Lumière AI Assistant <button id="closeChat" style="background:none;color:white;border:0;font-size:20px">×</button></div><div class="chat-body"><p>Halo! Saya asisten virtual Lumière Studio. Ada yang ingin Anda tanyakan tentang foto produk atau video promosi?</p><input id="chatInput" type="text" placeholder="Tulis pertanyaan Anda..."><button id="sendChat">Kirim pertanyaan</button><p id="chatReply" aria-live="polite"></p></div></div>
<script>
const menuBtn=document.getElementById('menuBtn'), navlinks=document.getElementById('navlinks');
menuBtn.addEventListener('click',()=>navlinks.classList.toggle('open'));
navlinks.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>navlinks.classList.remove('open')));
const panel=document.getElementById('chatPanel');
document.getElementById('aiBtn').addEventListener('click',()=>panel.classList.toggle('active'));
document.getElementById('closeChat').addEventListener('click',()=>panel.classList.remove('active'));
document.getElementById('sendChat').addEventListener('click',()=>{
 const q=document.getElementById('chatInput').value.trim(), reply=document.getElementById('chatReply');
 if(!q){reply.textContent='Silakan tulis pertanyaan terlebih dahulu.';return}
 reply.textContent='Terima kasih! Untuk informasi harga dan jadwal yang akurat, silakan lanjutkan konsultasi melalui WhatsApp kami.';
});
</script>
</body></html>
@endverbatim
