@verbatim
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Peachy Studio | Product Photography</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
<style>
:root{--coral:#F27868;--coral-dark:#E65F50;--peach:#FFD6C5;--light:#FFF7F2;--cream:#FFF0E7;--dark:#49352F;--muted:#88756D;--white:#fff}
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{font-family:'DM Sans',sans-serif;color:var(--dark);background:var(--light)}
a{text-decoration:none;color:inherit}button{font-family:inherit;cursor:pointer}
.container{width:88%;max-width:1180px;margin:auto}
.topbar{background:var(--dark);color:white;text-align:center;padding:10px;font-size:12px;letter-spacing:.5px}
nav{display:flex;align-items:center;justify-content:space-between;padding:20px 6%;background:var(--light);position:sticky;top:0;z-index:100;box-shadow:0 3px 15px #49352f0a}
.logo{font-size:25px;font-weight:800;color:var(--coral)}.logo span{color:var(--dark)}
.nav-links{display:flex;gap:30px;align-items:center;font-size:14px;font-weight:600}
.nav-links a:hover{color:var(--coral)}
.btn{display:inline-block;padding:13px 24px;border-radius:30px;background:var(--coral);color:white;font-weight:700;font-size:14px;border:0;transition:.3s}
.btn:hover{background:var(--coral-dark);transform:translateY(-3px)}
.btn-outline{border:1.5px solid var(--coral);color:var(--coral);background:transparent}
.menu-btn{display:none}
.hero{padding:75px 0 85px;background:var(--cream);overflow:hidden}
.hero-content{display:grid;grid-template-columns:1fr 1fr;gap:55px;align-items:center}
.tag{display:inline-block;background:#FAD3C4;color:#A74E43;padding:9px 17px;border-radius:30px;font-size:12px;font-weight:700;margin-bottom:22px}
.hero h1{font-family:'Playfair Display',serif;font-size:clamp(42px,5vw,65px);line-height:1.15;margin-bottom:22px}
.hero h1 span{color:var(--coral)}
.hero p{color:var(--muted);font-size:16px;line-height:1.9;max-width:480px;margin-bottom:30px}
.hero-buttons{display:flex;gap:14px;flex-wrap:wrap}
.hero-image{position:relative}
.hero-image img{width:100%;height:480px;object-fit:cover;border-radius:45% 45% 25px 25px}
.floating-note{position:absolute;bottom:25px;left:-30px;background:white;padding:18px 22px;border-radius:18px;box-shadow:0 10px 30px #49352f20;font-size:13px;font-weight:700}
section{padding:85px 0}
.section-heading{text-align:center;max-width:650px;margin:0 auto 45px}
.section-heading small{color:var(--coral);text-transform:uppercase;font-weight:800;letter-spacing:2px}
.section-heading h2{font-family:'Playfair Display',serif;font-size:38px;margin:12px 0}
.section-heading p{color:var(--muted);line-height:1.8;font-size:14px}
.services-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.service-card{background:white;padding:30px;border-radius:22px;transition:.3s}
.service-card:hover{transform:translateY(-7px);box-shadow:0 15px 35px #49352f12}
.service-icon{width:55px;height:55px;display:grid;place-items:center;background:var(--cream);border-radius:16px;font-size:25px;margin-bottom:20px}
.service-card h3{margin-bottom:12px}.service-card p{font-size:13px;color:var(--muted);line-height:1.8}
.portfolio{background:#FFF0E7}
.portfolio-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.portfolio-card{position:relative;height:330px;overflow:hidden;border-radius:20px;background:#FAD3C4}
.portfolio-card img{width:100%;height:100%;object-fit:cover;transition:.5s}
.portfolio-card:hover img{transform:scale(1.08)}
.portfolio-info{position:absolute;bottom:0;width:100%;padding:35px 20px 20px;color:white;background:linear-gradient(transparent,#291b18bd)}
.portfolio-info small{color:#FFD6C5}.portfolio-info h3{margin-top:5px}
.about-grid{display:grid;grid-template-columns:1fr 1fr;gap:55px;align-items:center}
.about-image img{width:100%;height:420px;object-fit:cover;border-radius:25px}
.about-text h2{font-family:'Playfair Display',serif;font-size:40px;margin:15px 0}
.about-text p{color:var(--muted);line-height:1.9;margin-bottom:20px;font-size:14px}
.stats{display:flex;gap:35px;margin-top:30px}.stats h3{color:var(--coral);font-size:28px}.stats small{color:var(--muted)}
.pricing{background:white}.price-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.price-card{border:1px solid #F4DDD2;padding:32px;border-radius:23px}
.price-card.featured{background:var(--cream);border:2px solid var(--coral);transform:translateY(-10px)}
.price-card h3{margin-bottom:12px}.price{font-size:32px;color:var(--coral);font-weight:800;margin:18px 0}
.price-card ul{list-style:none;margin:22px 0}.price-card li{padding:10px 0;font-size:13px;color:var(--muted);border-bottom:1px solid #eee1db}
.testimonial{background:var(--coral);color:white;text-align:center}
.testimonial h2{font-family:'Playfair Display',serif;font-size:38px;margin-bottom:25px}
.quote{max-width:700px;margin:auto;font-size:19px;line-height:1.8;font-style:italic}
.quote-name{margin-top:25px;font-weight:700}
.faq-list{max-width:800px;margin:auto}
.faq-item{background:white;border-radius:15px;margin-bottom:14px;padding:22px 25px}
.faq-question{display:flex;justify-content:space-between;align-items:center;gap:15px;font-weight:700;cursor:pointer}
.faq-question span{color:var(--coral);font-size:22px}
.faq-answer{display:none;color:var(--muted);font-size:14px;line-height:1.8;padding-top:15px}
.faq-item.active .faq-answer{display:block}
.cta{background:var(--cream);text-align:center;border-radius:30px;padding:65px 25px}
.cta h2{font-family:'Playfair Display',serif;font-size:38px;margin-bottom:15px}
.cta p{color:var(--muted);margin-bottom:25px}
footer{background:var(--dark);color:white;padding:60px 0 25px}
.footer-grid{display:grid;grid-template-columns:2fr 1fr 1fr;gap:40px;margin-bottom:40px}
.footer-grid p{color:#D3BFB6;font-size:13px;line-height:1.9;margin-top:15px}
.footer-grid h4{margin-bottom:18px}
.footer-grid a{display:block;color:#D3BFB6;font-size:13px;margin-bottom:12px}
.footer-grid a:hover{color:var(--peach)}
.copyright{border-top:1px solid #ffffff25;padding-top:22px;color:#D3BFB6;font-size:12px;text-align:center}
.floating-buttons{position:fixed;right:22px;bottom:22px;z-index:200;display:flex;flex-direction:column;gap:12px}
.float-btn{width:53px;height:53px;border-radius:50%;display:grid;place-items:center;color:white;font-size:23px;box-shadow:0 5px 18px #0002;border:none}
.ai-btn{background:var(--coral)}.wa-btn{background:#25D366}
@media(max-width:800px){
.nav-links{display:none;position:absolute;top:75px;left:0;width:100%;padding:25px;background:var(--light);flex-direction:column}
.nav-links.show{display:flex}.menu-btn{display:block;border:0;background:none;font-size:25px;color:var(--dark)}
.nav-contact{display:none}.hero-content,.about-grid{grid-template-columns:1fr}
.hero-image img{height:350px}.floating-note{left:10px}
.services-grid,.portfolio-grid,.price-grid{grid-template-columns:1fr 1fr}
.price-card.featured{transform:none}.footer-grid{grid-template-columns:1fr 1fr}
}
@media(max-width:550px){
section{padding:60px 0}
.services-grid,.portfolio-grid,.price-grid,.footer-grid{grid-template-columns:1fr}
.hero h1{font-size:43px}.section-heading h2,.about-text h2,.cta h2{font-size:31px}
.portfolio-card{height:300px}.stats{gap:20px}
}
</style>
</head>
<body>
<div class="topbar">✨ Make Your Products Look Beautiful | Booking Now Open!</div>
<nav>
<a href="#" class="logo">peachy<span>studio.</span></a>
<button class="menu-btn" onclick="toggleMenu()" aria-label="Buka menu">☰</button>
<div class="nav-links" id="navLinks">
<a href="#home">Home</a><a href="#services">Services</a><a href="#portfolio">Portfolio</a><a href="#about">About</a><a href="#pricing">Pricing</a><a href="#faq">FAQ</a>
</div>
<a href="#contact" class="btn nav-contact">Let's Collaborate ↗</a>
</nav>

<section class="hero" id="home">
<div class="container hero-content">
<div>
<span class="tag">📸 Creative Photography Studio</span>
<h1>Make Your Product <span>Look Irresistible.</span></h1>
<p>We turn ordinary products into extraordinary visuals. Creative photography and videography that make your brand stand out and capture everyone's attention.</p>
<div class="hero-buttons"><a href="#portfolio" class="btn">Explore Our Work ↗</a><a href="#services" class="btn btn-outline">Our Services</a></div>
</div>
<div class="hero-image">
<img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=900" alt="Contoh fotografi produk">
<div class="floating-note">♡ Creating beautiful visuals since 2020</div>
</div>
</div>
</section>

<section id="services"><div class="container">
<div class="section-heading"><small>What We Do</small><h2>Creative Services For Your Brand</h2><p>Everything your brand needs to create beautiful and memorable product visuals.</p></div>
<div class="services-grid">
<div class="service-card"><div class="service-icon">📸</div><h3>Product Photography</h3><p>Professional product photos with beautiful lighting, creative compositions and stunning details.</p></div>
<div class="service-card"><div class="service-icon">🎬</div><h3>Product Videography</h3><p>Engaging product videos that showcase your products through creative storytelling and motion.</p></div>
<div class="service-card"><div class="service-icon">🎨</div><h3>Creative Styling</h3><p>Unique concepts, props and artistic styling to create visuals that match your brand identity.</p></div>
</div></div></section>

<section class="portfolio" id="portfolio"><div class="container">
<div class="section-heading"><small>Our Portfolio</small><h2>A Little Peek Into Our Creativity</h2><p>Explore some of our favorite projects and visual stories.</p></div>
<div class="portfolio-grid">
<div class="portfolio-card"><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=700" alt="Fotografi sneakers"><div class="portfolio-info"><small>Fashion & Lifestyle</small><h3>Colorful Sneakers</h3></div></div>
<div class="portfolio-card"><img src="https://images.unsplash.com/photo-1547887538-e3a2f32cb1cc?w=700" alt="Fotografi parfum"><div class="portfolio-info"><small>Beauty & Skincare</small><h3>Beauty Essentials</h3></div></div>
<div class="portfolio-card"><img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?w=700" alt="Fotografi makanan"><div class="portfolio-info"><small>Food & Beverage</small><h3>Fresh Food Stories</h3></div></div>
<div class="portfolio-card"><img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=700" alt="Fotografi jam tangan"><div class="portfolio-info"><small>Product & Accessories</small><h3>Timeless Details</h3></div></div>
<div class="portfolio-card"><img src="https://images.unsplash.com/photo-1602143407151-7111542de6e8?w=700" alt="Fotografi botol minuman"><div class="portfolio-info"><small>Commercial Photography</small><h3>Everyday Objects</h3></div></div>
<div class="portfolio-card"><img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=700" alt="Fotografi fashion"><div class="portfolio-info"><small>Fashion Campaign</small><h3>Style & Stories</h3></div></div>
</div></div></section>

<section id="about"><div class="container about-grid">
<div class="about-image"><img src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=900" alt="Studio fotografi"></div>
<div class="about-text"><small style="color:var(--coral);font-weight:800;letter-spacing:2px">ABOUT OUR STUDIO</small><h2>We Love Making Things Look Beautiful.</h2>
<p>Peachy Studio is a creative photography and videography studio passionate about bringing brands to life through beautiful visuals.</p>
<p>From small businesses to growing brands, we create unique visual experiences that tell your story and connect with your audience.</p>
<a href="#contact" class="btn">Get to Know Us ↗</a>
<div class="stats"><div><h3>150+</h3><small>Projects Done</small></div><div><h3>80+</h3><small>Happy Clients</small></div><div><h3>5+</h3><small>Years Experience</small></div></div>
</div></div></section>

<section class="pricing" id="pricing"><div class="container">
<div class="section-heading"><small>Our Packages</small><h2>Simple Packages, Beautiful Results</h2><p>Choose the perfect package to bring your product vision to life.</p></div>
<div class="price-grid">
<div class="price-card"><h3>Starter Package</h3><p>Perfect for small businesses.</p><div class="price">Rp500K</div><ul><li>✓ 5 Edited Product Photos</li><li>✓ Basic Product Styling</li><li>✓ 1 Background Concept</li><li>✓ Digital Photo Delivery</li></ul><a href="#contact" class="btn btn-outline">Choose Package</a></div>
<div class="price-card featured"><span class="tag">⭐ Most Popular</span><h3>Growth Package</h3><p>For growing brands and businesses.</p><div class="price">Rp1.2M</div><ul><li>✓ 10 Edited Product Photos</li><li>✓ Creative Product Styling</li><li>✓ 1 Short Product Video</li><li>✓ 2 Background Concepts</li></ul><a href="#contact" class="btn">Choose Package</a></div>
<div class="price-card"><h3>Premium Package</h3><p>Complete visual branding experience.</p><div class="price">Rp2.5M</div><ul><li>✓ 20 Edited Product Photos</li><li>✓ 2 Professional Videos</li><li>✓ Premium Creative Styling</li><li>✓ 3 Background Concepts</li></ul><a href="#contact" class="btn btn-outline">Choose Package</a></div>
</div></div></section>

<section class="testimonial"><div class="container"><h2>Sweet Words From Our Clients ♡</h2><p class="quote">"The photos turned out even better than we imagined! The team was super friendly, creative and really understood our brand's personality."</p><div class="quote-name">Sarah M. · Small Business Owner</div></div></section>

<section id="faq"><div class="container">
<div class="section-heading"><small>Frequently Asked Questions</small><h2>Curious About Something?</h2><p>Here are some answers to help you get started with us.</p></div>
<div class="faq-list">
<div class="faq-item"><div class="faq-question" onclick="toggleFaq(this)">What types of products do you photograph? <span>+</span></div><div class="faq-answer">We photograph a wide range of products, including beauty, skincare, fashion, food, beverages, accessories and lifestyle products.</div></div>
<div class="faq-item"><div class="faq-question" onclick="toggleFaq(this)">How long does a photoshoot take? <span>+</span></div><div class="faq-answer">The duration depends on the selected package and number of products. We will provide an estimated schedule before the session.</div></div>
<div class="faq-item"><div class="faq-question" onclick="toggleFaq(this)">Can I request a custom photography concept? <span>+</span></div><div class="faq-answer">Absolutely! We welcome creative ideas and can customize the concept to match your brand identity.</div></div>
<div class="faq-item"><div class="faq-question" onclick="toggleFaq(this)">How do I book a photoshoot? <span>+</span></div><div class="faq-answer">Simply contact us through WhatsApp or our consultation button. Our team will help you choose the right package and schedule.</div></div>
<div class="faq-item"><div class="faq-question" onclick="toggleFaq(this)">Do you offer video production services? <span>+</span></div><div class="faq-answer">Yes! We provide product videography, promotional videos and short-form video content for social media.</div></div>
</div></div></section>

<section id="contact"><div class="container"><div class="cta"><h2>Let's Create Something Beautiful!</h2><p>Your products deserve to be seen. Let's make magic together.</p><a href="https://wa.me/6281234567890" class="btn">Book Your Session ♡</a></div></div></section>

<footer><div class="container">
<div class="footer-grid">
<div><div class="logo" style="color:#FFD6C5">peachy<span style="color:white">studio.</span></div><p>Making products look beautiful through creative photography and videography. Let's tell your brand story together!</p></div>
<div><h4>Quick Links</h4><a href="#home">Home</a><a href="#services">Services</a><a href="#portfolio">Portfolio</a><a href="#pricing">Pricing</a></div>
<div><h4>Get In Touch</h4><a href="mailto:hello@peachystudio.com">hello@peachystudio.com</a><a href="https://instagram.com/">Instagram</a><a href="https://wa.me/6281234567890">WhatsApp</a><a href="#contact">Surabaya, Indonesia</a></div>
</div><div class="copyright">© 2026 Peachy Studio. All Rights Reserved. Made with ♡</div>
</div></footer>

<div class="floating-buttons">
<button class="float-btn ai-btn" onclick="alert('Hi! Welcome to Peachy Studio. How can I help you today? 💗')" title="AI Assistant" aria-label="AI Assistant">✦</button>
<a href="https://wa.me/6281234567890" class="float-btn wa-btn" title="WhatsApp" aria-label="WhatsApp">☎</a>
</div>
<script>
function toggleMenu(){document.getElementById('navLinks').classList.toggle('show')}
function toggleFaq(element){
 const item=element.parentElement,active=item.classList.contains('active');
 document.querySelectorAll('.faq-item').forEach(el=>{el.classList.remove('active');el.querySelector('.faq-question span').textContent='+'});
 if(!active){item.classList.add('active');element.querySelector('span').textContent='−'}
}
</script>
</body>
</html>
@endverbatim
