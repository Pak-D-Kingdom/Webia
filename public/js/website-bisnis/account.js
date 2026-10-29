document.addEventListener('DOMContentLoaded', function () {
  // Drawer sidebar: satu pasang toggle/scrim, id sidebar dari aria-controls toggle.
  const toggleBtn = document.querySelector('[data-sidebar-toggle]');
  const sidebar = toggleBtn && document.getElementById(toggleBtn.getAttribute('aria-controls'));
  const scrim = document.querySelector('[data-sidebar-scrim]');
  const closeBtn = document.querySelector('[data-sidebar-close]');

  if (toggleBtn && sidebar) {
    const openSidebar = () => {
      sidebar.classList.add('open');
      toggleBtn.setAttribute('aria-expanded', 'true');
      const firstLink = sidebar.querySelector('a');
      if (firstLink) firstLink.focus();
    };

    const closeSidebar = () => {
      if (!sidebar.classList.contains('open')) return;
      sidebar.classList.remove('open');
      toggleBtn.setAttribute('aria-expanded', 'false');
      toggleBtn.focus();
    };

    toggleBtn.addEventListener('click', function () {
      sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeSidebar();
    });

    if (scrim) scrim.addEventListener('click', closeSidebar);
    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
  }

  // Buat Pesanan: total = harga paket terpilih + add-on tercentang (data-price).
  const totalEl = document.querySelector('[data-total]');
  const priceInputs = document.querySelectorAll('[data-price]');

  if (totalEl && priceInputs.length) {
    const formatRupiah = (value) => 'Rp' + value.toLocaleString('id-ID');

    const recalcTotal = function () {
      let total = 0;
      document.querySelectorAll('[data-price]').forEach(function (input) {
        if (input.checked) total += Number(input.dataset.price) || 0;
      });
      totalEl.textContent = formatRupiah(total);
    };

    priceInputs.forEach(function (input) {
      input.addEventListener('change', recalcTotal);
    });
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
