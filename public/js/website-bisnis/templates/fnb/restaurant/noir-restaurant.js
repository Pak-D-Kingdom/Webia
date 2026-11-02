const menuToggle = document.getElementById('menuToggle');
    const navLinks = document.getElementById('navLinks');
    menuToggle.addEventListener('click', () => {
      const isOpen = navLinks.classList.toggle('show');
      menuToggle.setAttribute('aria-expanded', String(isOpen));
      menuToggle.textContent = isOpen ? '×' : '☰';
    });
    navLinks.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
      navLinks.classList.remove('show');
      menuToggle.setAttribute('aria-expanded', 'false');
      menuToggle.textContent = '☰';
    }));

    document.querySelectorAll('.faq-question').forEach(button => {
      button.addEventListener('click', () => {
        const item = button.closest('.faq-item');
        const isOpen = item.classList.toggle('open');
        button.setAttribute('aria-expanded', String(isOpen));
      });
    });

    const chatPanel = document.getElementById('chatPanel');
    const toast = document.getElementById('toast');
    let toastTimer;
    function showToast(message) {
      toast.textContent = message;
      toast.classList.add('show');
      clearTimeout(toastTimer);
      toastTimer = setTimeout(() => toast.classList.remove('show'), 3500);
    }
    document.getElementById('aiOpen').addEventListener('click', () => chatPanel.classList.toggle('show'));
    document.getElementById('aiClose').addEventListener('click', () => chatPanel.classList.remove('show'));
    document.getElementById('chatSend').addEventListener('click', () => {
      const question = document.getElementById('chatQuestion').value.trim();
      if (!question) {
        showToast('Silakan tulis pertanyaan terlebih dahulu.');
        return;
      }
      const encoded = encodeURIComponent('Halo NOIR, saya ingin bertanya: ' + question);
      window.open('https://wa.me/6281234567890?text=' + encoded, '_blank', 'noopener');
      showToast('Pertanyaan akan diteruskan ke tim NOIR melalui WhatsApp.');
      chatPanel.classList.remove('show');
    });
    document.getElementById('chatQuestion').addEventListener('keydown', event => {
      if (event.key === 'Enter') document.getElementById('chatSend').click();
    });
    document.getElementById('year').textContent = new Date().getFullYear();
