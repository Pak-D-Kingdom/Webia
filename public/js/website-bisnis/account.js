document.addEventListener('DOMContentLoaded', function () {
  const toggleBtn = document.querySelector('[data-sidebar-toggle]');
  const sidebar = document.getElementById('admin-sidebar');
  const scrim = document.querySelector('[data-sidebar-close]');
  if (!toggleBtn || !sidebar) return;

  function openSidebar() {
    sidebar.classList.add('open');
    toggleBtn.setAttribute('aria-expanded', 'true');
    // focus first link
    const firstLink = sidebar.querySelector('a');
    if (firstLink) firstLink.focus();
  }

  function closeSidebar() {
    sidebar.classList.remove('open');
    toggleBtn.setAttribute('aria-expanded', 'false');
    toggleBtn.focus();
  }

  toggleBtn.addEventListener('click', function () {
    if (sidebar.classList.contains('open')) {
      closeSidebar();
    } else {
      openSidebar();
    }
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && sidebar.classList.contains('open')) {
      closeSidebar();
    }
  });
    scrim.addEventListener('click', closeSidebar);
  }
});
