document.addEventListener('DOMContentLoaded', function () {
  // Sidebar drawer (mobile): buka/tutup via tombol & tutupan scrim.
  const toggleBtn = document.querySelector('[data-sidebar-toggle]');
  const sidebar = document.getElementById('admin-sidebar');
  const scrim = document.querySelector('[data-sidebar-close]');

  if (toggleBtn && sidebar) {
    const openSidebar = () => {
      sidebar.classList.add('open');
      toggleBtn.setAttribute('aria-expanded', 'true');
      const firstLink = sidebar.querySelector('a');
      if (firstLink) firstLink.focus();
    };

    const closeSidebar = () => {
      sidebar.classList.remove('open');
      toggleBtn.setAttribute('aria-expanded', 'false');
    };

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

    if (scrim) scrim.addEventListener('click', closeSidebar);
  }

  // Dashboard: tab switch grafik Pendapatan / Volume.
  document.querySelectorAll('[data-series]').forEach(function (tab) {
    tab.addEventListener('click', function () {
      const cards = document.querySelectorAll('.ops-grid');
      cards.forEach(function (card) {
        card.querySelectorAll('.ops-tab').forEach(function (t) {
          t.classList.toggle('is-active', t === tab);
        });
        card.querySelectorAll('.ops-svg').forEach(function (svg) {
          svg.classList.toggle('is-active', svg.dataset.svg === tab.dataset.series);
        });
      });
    });
  });

  // Dashboard: filter & pencarian tabel "Pesanan Terkini" (client-side).
  const search = document.getElementById('opsTableSearch');
  const rows = document.querySelectorAll('#opsOrdersTable .ops-row');
  const emptyState = document.querySelector('.ops-table-empty');
  const counter = document.querySelector('[data-ops-visible]');
  let currentFilter = 'all';

  function applyFilter() {
    const query = (search ? search.value : '').toLowerCase().trim();
    let visible = 0;

    rows.forEach(function (row) {
      const matchesQuery = !query || row.textContent.toLowerCase().includes(query);
      const matchesFilter = currentFilter === 'all' || row.dataset.status === currentFilter;
      row.hidden = !(matchesQuery && matchesFilter);
      if (!row.hidden) visible++;
    });

    if (counter) counter.textContent = String(visible);
    if (emptyState) emptyState.hidden = visible !== 0;
  }

  if (search) search.addEventListener('input', applyFilter);

  document.querySelectorAll('.ops-tabs-table .ops-tab').forEach(function (tab) {
    tab.addEventListener('click', function () {
      document.querySelectorAll('.ops-tabs-table .ops-tab').forEach(function (t) {
        t.classList.toggle('is-active', t === tab);
      });
      currentFilter = tab.dataset.filter || 'all';
      applyFilter();
    });
  });
});
