<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#171715">
  <title>NOIR — Restaurant & Dining</title>
  <meta name="description" content="NOIR Restaurant — seasonal dining, considered ingredients, and an unforgettable atmosphere.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/fnb/restaurant/noir-restaurant.css') }}">
</head>
<body>
  <div class="topbar"><span>Seasonal ingredients</span><span class="dot"></span><span>Thoughtfully prepared, always</span></div>

  <header class="navbar">
    <div class="nav-inner">
      <a class="brand" href="#home" aria-label="NOIR home">NOIR<small>RESTAURANT & DINING</small></a>
      <button class="menu-toggle" id="menuToggle" aria-label="Buka menu" aria-expanded="false">☰</button>
      <nav class="nav-links" id="navLinks" aria-label="Navigasi utama">
        <a href="#story">Our Story</a>
        <a href="#menu">The Menu</a>
        <a href="#faq">FAQ</a>
        <a class="btn" href="#reservation">Book a Table <span>↗</span></a>
      </nav>
    </div>
  </header>

  <main>
    <section class="hero" id="home">
      <div class="hero-copy">
        <div class="eyebrow">An intimate dining experience</div>
        <h1>Less, but<br><em>exceptional.</em></h1>
        <p>A modern expression of honest ingredients, quiet luxury, and the art of gathering around a table. Welcome to dining, thoughtfully reimagined.</p>
        <div class="hero-actions">
          <a class="btn" href="#reservation">Reserve Your Table <span>↗</span></a>
          <a class="btn btn-outline" href="#menu">Explore Menu</a>
        </div>
        <div class="hero-note"><span class="note-line"></span><span>Made with intention. Served with care.</span></div>
      </div>
      <div class="hero-image-wrap">
        <img class="hero-image" src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=1400&q=85" alt="Elegant restaurant table setting">
        <div class="image-caption"><strong>The art of dining</strong><span>Est. 2018 · Surabaya</span></div>
      </div>
    </section>

    <section class="section section-dark" id="menu">
      <div class="section-inner">
        <div class="section-heading">
          <div><div class="eyebrow">A taste of NOIR</div><h2>Our signature<br><em>selections.</em></h2></div>
          <p>A considered menu inspired by the season, shaped by technique, and made to be enjoyed slowly.</p>
        </div>
        <div class="menu-grid">
          <article class="menu-card">
            <img src="https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=900&q=80" alt="Seasonal starter dish" loading="lazy">
            <div class="menu-card-body"><div class="menu-card-top"><h3>Garden Prelude</h3><span class="price">Rp 85K</span></div><p>Seasonal greens, toasted seeds, delicate herb dressing.</p></div>
          </article>
          <article class="menu-card">
            <img src="https://images.unsplash.com/photo-1546833999-b9f581a1996d?auto=format&fit=crop&w=900&q=80" alt="Chef's signature main course" loading="lazy">
            <div class="menu-card-body"><div class="menu-card-top"><h3>The Main Affair</h3><span class="price">Rp 185K</span></div><p>Slow-cooked premium cut, roasted vegetables, house jus.</p></div>
          </article>
          <article class="menu-card">
            <img src="https://images.unsplash.com/photo-1488477181946-6428a0291777?auto=format&fit=crop&w=900&q=80" alt="Elegant dessert plating" loading="lazy">
            <div class="menu-card-body"><div class="menu-card-top"><h3>Midnight Sweet</h3><span class="price">Rp 65K</span></div><p>Dark chocolate, soft vanilla cream, a little sea salt.</p></div>
          </article>
        </div>
      </div>
    </section>

    <section class="section" id="story">
      <div class="section-inner story-grid">
        <img class="story-image" src="https://images.unsplash.com/photo-1559339352-11d035aa65de?auto=format&fit=crop&w=1200&q=85" alt="Warm, intimate restaurant interior" loading="lazy">
        <div class="story-copy">
          <div class="eyebrow">The philosophy</div>
          <h2>Good food.<br><em>Good company.</em></h2>
          <p>At NOIR, we believe the most memorable moments are often the simplest. A seasonal plate, a carefully chosen glass, and a space that invites you to stay a little longer.</p>
          <p>Our kitchen works closely with trusted local suppliers to celebrate quality over excess. Every detail has a purpose, and every visit has room to become a story.</p>
          <a class="btn btn-outline" href="#reservation">Come experience it <span>↗</span></a>
          <div class="stats">
            <div class="stat"><strong>Seasonal</strong><span>Thoughtful menu</span></div>
            <div class="stat"><strong>Local</strong><span>Trusted partners</span></div>
            <div class="stat"><strong>Personal</strong><span>Warm service</span></div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-dark">
      <div class="section-inner quote">
        <div class="quote-mark">“</div>
        <blockquote>“A beautiful meal is not just what is on the plate, but everything you feel around it.”</blockquote>
        <div class="quote-by">The NOIR philosophy</div>
      </div>
    </section>

    <section class="section" id="faq">
      <div class="section-inner faq-layout">
        <div class="faq-intro">
          <div class="eyebrow">Good to know</div>
          <h2>A few things<br><em>you may wonder.</em></h2>
          <p>Planning a visit? Here are a few details to help make your experience with us feel effortless.</p>
          <a href="#reservation" class="btn btn-outline">Make a Reservation <span>↗</span></a>
        </div>
        <div class="faq-list">
          <div class="faq-item open">
            <button class="faq-question" aria-expanded="true"><span>Do I need to make a reservation?</span><span>+</span></button>
            <div class="faq-answer">Reservations are recommended, especially for weekends and larger groups. You can contact our team through WhatsApp to check available times.</div>
          </div>
          <div class="faq-item">
            <button class="faq-question" aria-expanded="false"><span>Can you accommodate dietary needs?</span><span>+</span></button>
            <div class="faq-answer">Absolutely. Please let us know about allergies or dietary preferences when booking, so our team can advise on suitable menu options.</div>
          </div>
          <div class="faq-item">
            <button class="faq-question" aria-expanded="false"><span>Is the restaurant suitable for special occasions?</span><span>+</span></button>
            <div class="faq-answer">Yes. Whether it's a birthday, anniversary, or intimate gathering, tell us what you're celebrating and we'll help you plan the details.</div>
          </div>
          <div class="faq-item">
            <button class="faq-question" aria-expanded="false"><span>What are your opening hours?</span><span>+</span></button>
            <div class="faq-answer">Our sample hours are Tuesday–Sunday, 11.00–22.00 WIB. Please confirm the latest hours with our team before visiting.</div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-dark" id="reservation">
      <div class="section-inner reservation">
        <div><div class="eyebrow">Your table is waiting</div><h2>Make room for<br><em>something special.</em></h2><p>For reservations, private dining, or any questions, our team would love to hear from you.</p></div>
        <a class="btn btn-outline" href="https://wa.me/6281234567890?text=Halo%20NOIR%2C%20saya%20ingin%20reservasi%20meja." target="_blank" rel="noopener">Reserve via WhatsApp <span>↗</span></a>
      </div>
    </section>
  </main>

  <footer>
    <div class="footer-inner">
      <div class="footer-main">
        <div class="footer-about"><div class="footer-brand">NOIR</div><p>A modern restaurant for thoughtful food, meaningful moments, and the pleasure of being together.</p></div>
        <div class="footer-col"><h4>Explore</h4><div class="footer-links"><a href="#story">Our Story</a><a href="#menu">The Menu</a><a href="#faq">FAQ</a><a href="#reservation">Reservations</a></div></div>
        <div class="footer-col"><h4>Visit Us</h4><div class="footer-links"><span>Jl. Example No. 18</span><span>Surabaya, Indonesia</span><span>Tue–Sun · 11.00–22.00</span></div></div>
        <div class="footer-col"><h4>Get in Touch</h4><div class="footer-links"><a href="mailto:hello@noir.example">hello@noir.example</a><a href="https://instagram.com/" target="_blank" rel="noopener">Instagram ↗</a><a href="https://wa.me/6281234567890" target="_blank" rel="noopener">WhatsApp ↗</a></div></div>
      </div>
      <div class="footer-bottom"><span>© <span id="year"></span> NOIR Restaurant. All rights reserved.</span><span>Made with intention, served with care.</span></div>
    </div>
  </footer>

  <div class="floating-actions" aria-label="Quick contact">
    <button class="float-btn ai-btn" id="aiOpen" aria-label="Buka asisten AI"><span class="float-icon">✳</span><span class="float-label">Ask AI</span></button>
    <a class="float-btn wa-btn" href="https://wa.me/6281234567890?text=Halo%20NOIR%2C%20saya%20ingin%20bertanya." target="_blank" rel="noopener" aria-label="Hubungi melalui WhatsApp"><span class="float-icon">◉</span><span class="float-label">WhatsApp</span></a>
  </div>

  <aside class="chat-panel" id="chatPanel" aria-label="AI assistant">
    <div class="chat-head"><strong>NOIR Concierge</strong><button class="chat-close" id="aiClose" aria-label="Tutup chat">×</button></div>
    <div class="chat-content">
      <p>Hello, welcome to NOIR. I can help with menu questions, opening hours, and reservations. What would you like to know?</p>
      <label for="chatQuestion">Your question</label>
      <input id="chatQuestion" type="text" placeholder="e.g. Do you have vegetarian options?">
      <button class="btn" id="chatSend">Ask concierge ↗</button>
    </div>
  </aside>
  <div class="toast" id="toast" role="status" aria-live="polite"></div>

    <script src="{{ asset('js/website-bisnis/templates/fnb/restaurant/noir-restaurant.js') }}" defer></script>
</body>
</html>
