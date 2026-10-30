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

  // Buat Pesanan: ringkasan pesanan, total, dan validasi paket (data-price).
  const initOrderForm = function (form) {
    const totalEl = form.querySelector('[data-total]');
    const pkgNameEl = form.querySelector('[data-summary-package]');
    const pkgPriceEl = form.querySelector('[data-summary-package-price]');
    const addonListEl = form.querySelector('[data-summary-addons]');
    const submitBtn = form.querySelector('[data-submit]');
    const submitNote = form.querySelector('[data-submit-note]');
    const submitCaption = form.querySelector('[data-submit-caption]');
    const formatRupiah = (value) => 'Rp' + value.toLocaleString('id-ID');

    const recalcOrder = function () {
      const pkg = form.querySelector('input[name="package_id"]:checked');
      let total = pkg ? Number(pkg.dataset.price) || 0 : 0;

      if (pkgNameEl) {
        const name = pkg ? pkg.closest('label').querySelector('[data-pkg-name]').textContent.trim() : null;
        pkgNameEl.textContent = name || 'Belum dipilih';
        pkgNameEl.classList.toggle('is-unset', !name);
      }
      if (pkgPriceEl) {
        pkgPriceEl.textContent = pkg ? formatRupiah(Number(pkg.dataset.price) || 0) : '-';
        pkgPriceEl.classList.toggle('is-unset', !pkg);
      }

      const chosenAddons = [];
      form.querySelectorAll('input[name="addon_ids[]"]').forEach(function (input) {
        if (!input.checked) return;
        const price = Number(input.dataset.price) || 0;
        total += price;
        chosenAddons.push({
          name: input.closest('label').querySelector('[data-addon-name]').textContent.trim(),
          hasPrice: input.dataset.price !== '' && Number(input.dataset.price) > 0,
          price: price,
        });
      });

      if (addonListEl) {
        addonListEl.textContent = '';
        const emptyNote = document.createElement('span');
        emptyNote.className = 'is-unset';
        emptyNote.textContent = 'Tidak ada add-on';
        emptyNote.hidden = chosenAddons.length > 0;
        addonListEl.appendChild(emptyNote);
        chosenAddons.forEach(function (addon) {
          const row = document.createElement('span');
          row.className = 'customer-create-addon-row';
          const name = document.createElement('span');
          name.textContent = addon.name;
          const price = document.createElement('span');
          price.textContent = addon.hasPrice ? formatRupiah(addon.price) : 'Konsultasi';
          row.append(name, price);
          addonListEl.appendChild(row);
        });
      }

      if (totalEl) totalEl.textContent = formatRupiah(total);
      if (submitBtn) submitBtn.disabled = !pkg;
      if (submitNote) submitNote.hidden = !!pkg;
      if (submitCaption) submitCaption.hidden = !pkg;
    };

    form.addEventListener('change', recalcOrder);
    recalcOrder();
  };

  // Expose untuk halaman yang memuat form pesanan ke modal (koleksi publik).
  window.webiaInitOrderForm = initOrderForm;
  const orderForm = document.querySelector('.customer-order-form, .customer-create-grid');
  if (orderForm) initOrderForm(orderForm);

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
