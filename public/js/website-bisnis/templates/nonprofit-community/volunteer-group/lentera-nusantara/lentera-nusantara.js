// Lentera Nusantara — refined interactions
document.addEventListener('DOMContentLoaded', () => {
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');

  if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
      mobileMenuBtn.setAttribute('aria-expanded', String(!mobileMenu.classList.contains('hidden')));
    });
    mobileMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => mobileMenu.classList.add('hidden'));
    });
  }

  // Close modal by clicking the backdrop or pressing Escape.
  document.querySelectorAll('[id^="modal-"]').forEach(modal => {
    modal.addEventListener('click', event => {
      if (event.target === modal) modal.classList.add('hidden');
    });
  });
  document.addEventListener('keydown', event => {
    if (event.key === 'Escape') {
      document.querySelectorAll('[id^="modal-"]').forEach(modal => modal.classList.add('hidden'));
      const chat = document.getElementById('ai-chat-window');
      if (chat) chat.classList.add('hidden');
    }
  });

  // Animate counters once when they enter the viewport (keeps final values if unsupported).
  const counters = document.querySelectorAll('[data-count]');
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const target = Number(el.dataset.count || 0);
        const suffix = el.dataset.suffix || '';
        const duration = 1100;
        const start = performance.now();
        const tick = now => {
          const progress = Math.min((now - start) / duration, 1);
          el.textContent = Math.floor(target * (1 - Math.pow(1 - progress, 3))).toLocaleString('id-ID') + suffix;
          if (progress < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
        observer.unobserve(el);
      });
    }, { threshold: .45 });
    counters.forEach(el => observer.observe(el));
  }
});

function filterSkills(category, trigger = null) {
  const cards = document.querySelectorAll('.skill-card');
  const buttons = document.querySelectorAll('.skill-btn');
  buttons.forEach(button => {
    button.classList.remove('active', 'bg-brand-emerald', 'text-brand-gold');
    button.classList.add('bg-white', 'text-brand-emerald');
  });
  const active = trigger || Array.from(buttons).find(button => (button.getAttribute('onclick') || '').includes(`'${category}'`));
  if (active) {
    active.classList.add('active');
    active.classList.remove('bg-white', 'text-brand-emerald');
    active.classList.add('bg-brand-emerald', 'text-brand-gold');
  }
  cards.forEach(card => {
    card.hidden = !(category === 'all' || card.classList.contains(category));
  });
}

function toggleFaq(button) {
  const content = button?.nextElementSibling;
  const icon = button?.querySelector('i');
  if (!content) return;
  content.classList.toggle('hidden');
  if (icon) icon.classList.toggle('rotate-180');
  button.setAttribute('aria-expanded', String(!content.classList.contains('hidden')));
}

function openModal(id, eventTitle = '') {
  const modal = document.getElementById(id);
  if (!modal) return;
  modal.classList.remove('hidden');
  document.body.classList.add('modal-open');
  const eventInput = document.getElementById('gathering-event');
  if (eventInput && eventTitle) eventInput.value = eventTitle;
}
function closeModal(id) {
  const modal = document.getElementById(id);
  if (modal) modal.classList.add('hidden');
  if (!document.querySelector('[id^="modal-"]:not(.hidden)')) document.body.classList.remove('modal-open');
}

function handleFormSubmit(event, type) {
  event.preventDefault();
  const form = event.currentTarget || event.target;
  if (!form || !form.reportValidity()) return;
  const entries = Array.from(new FormData(form).entries())
    .filter(([, value]) => String(value).trim() !== '')
    .map(([key, value]) => `• ${key}: ${value}`)
    .join('\n');
  const message = `Halo Admin Lentera Nusantara, saya ingin mengirim ${type}.\n\n${entries}\n\nMohon informasi langkah selanjutnya. Terima kasih.`;
  const adminNumber = '6281234567890'; // Ganti dengan nomor WhatsApp admin resmi.
  window.open(`https://wa.me/${adminNumber}?text=${encodeURIComponent(message)}`, '_blank', 'noopener,noreferrer');
  form.reset();
  const modal = form.closest('[id^="modal-"]');
  if (modal) closeModal(modal.id);
}

function toggleAiChat() {
  const chat = document.getElementById('ai-chat-window');
  if (chat) chat.classList.toggle('hidden');
}
function handleAiSubmit(event) {
  if (event?.preventDefault) event.preventDefault();
  const input = document.getElementById('ai-input');
  const query = input?.value.trim();
  if (!query) return;
  appendMessage(query, 'user');
  input.value = '';
  window.setTimeout(() => {
    let reply = "Terima kasih atas pertanyaannya. Untuk informasi lengkap, silakan mendaftar melalui tombol Daftar Relawan atau hubungi koordinator lapangan melalui WhatsApp posko kami.";
    const q = query.toLowerCase();
    if (q.includes('syarat') || q.includes('cara')) {
      reply = "Syarat utama: berusia minimal 18 tahun, berkomitmen menjaga kode etik adat, dan bersedia mengikuti pembekalan pra-ekspedisi.";
    } else if (q.includes('biaya') || q.includes('akomodasi')) {
      reply = "Detail akomodasi dan biaya dapat berbeda di setiap desa dampingan. Silakan hubungi admin agar mendapat informasi sesuai misi yang dipilih.";
    } else if (q.includes('durasi') || q.includes('lama')) {
      reply = "Durasi kegiatan menyesuaikan misi. Ada kegiatan singkat beberapa hari, program fleksibel, hingga magang adat 1–2 minggu.";
    }
    appendMessage(reply, 'bot');
  }, 450);
}
function quickAsk(text) {
  const input = document.getElementById('ai-input');
  if (!input) return;
  input.value = text;
  handleAiSubmit({ preventDefault() {} });
}
function appendMessage(text, sender) {
  const container = document.getElementById('ai-messages');
  if (!container) return;
  const bubble = document.createElement('div');
  bubble.className = sender === 'user'
    ? 'bg-brand-gold text-brand-dark p-3 rounded-2xl rounded-tr-none max-w-[85%] ml-auto font-medium'
    : 'bg-brand-emerald/90 text-brand-cream p-3 rounded-2xl rounded-tl-none border border-brand-gold/20 max-w-[85%]';
  bubble.textContent = text;
  container.appendChild(bubble);
  container.scrollTop = container.scrollHeight;
}
