// Dashboard admin (design Stitch): jam sinkron, refresh, tab chart, antrean verifikasi,
// modal slip, filter/pencarian tabel, export CSV, toast.

let adminClockTimer;
let adminShellInitialized = false;
let adminToastTimer;
let adminPageController;

function initializeAdminPage() {
  const page = document.querySelector('#main-content > div');
  if (!page || page.dataset.adminInitialized === 'true') return;
  page.dataset.adminInitialized = 'true';
  adminPageController?.abort();
  adminPageController = new AbortController();
  const listenerOptions = { signal: adminPageController.signal };

  // Jam sinkron real-time (WIB asumsi jam klien sesuai).
  const clockEl = document.getElementById('syncTimestamp');

  function updateClock() {
    if (!clockEl) return;
    const now = new Date();
    const options = { day: 'numeric', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
    clockEl.innerText = 'Sinkron: ' + now.toLocaleDateString('id-ID', options) + ' WIB';
  }

  updateClock();
  clearInterval(adminClockTimer);
  if (clockEl) adminClockTimer = setInterval(updateClock, 1000);

  // Toast.
  const toast = document.getElementById('toastNotification');
  const toastMsg = document.getElementById('toastMessage');
  const toastIcon = document.getElementById('toastIcon');
  function showToast(message) {
    if (!toast || !toastMsg) return;
    toastMsg.innerText = message;
    toast.classList.remove('hidden');
    toast.classList.add('flex');
    clearTimeout(adminToastTimer);
    adminToastTimer = setTimeout(() => {
      toast.classList.add('hidden');
      toast.classList.remove('flex');
    }, 3200);
  }

  document.querySelectorAll('[data-toast]').forEach((btn) => {
    btn.addEventListener('click', () => showToast(btn.dataset.toast), listenerOptions);
  });

  // Refresh data.
  document.getElementById('btnRefreshData')?.addEventListener('click', function () {
    const icon = this.querySelector('.material-symbols-outlined');
    if (icon) icon.classList.add('animate-spin');
    setTimeout(() => location.reload(), 500);
  }, listenerOptions);

  // Dropdown rentang waktu custom (listbox).
  const rangeRoot = document.querySelector('[data-range-dropdown]');
  if (rangeRoot) {
    const rangeToggle = rangeRoot.querySelector('[data-range-toggle]');
    const rangeMenu = rangeRoot.querySelector('[data-range-menu]');
    const rangeLabel = rangeRoot.querySelector('[data-range-label]');
    const rangeChevron = rangeRoot.querySelector('[data-range-chevron]');

    function setRange(open) {
      rangeMenu.classList.toggle('hidden', !open);
      rangeChevron.classList.toggle('rotate-180', open);
      rangeToggle.setAttribute('aria-expanded', String(open));
      if (open) rangeMenu.querySelector('[data-range-option]:not([disabled])')?.focus();
    }

    function selectRange(option) {
      rangeMenu.querySelectorAll('[data-range-option]').forEach((opt) => {
        const selected = opt === option;
        opt.setAttribute('aria-selected', String(selected));
        opt.classList.toggle('font-bold', selected);
        opt.classList.toggle('text-primary', selected);
        opt.classList.toggle('text-on-surface', !selected);
        opt.querySelector('.material-symbols-outlined')?.classList.toggle('invisible', !selected);
      });
      rangeLabel.innerText = option.querySelector('[data-range-text]').innerText;
      setRange(false);
    }

    // Opsi awal (satu-satunya) diberi state terpilih sesuai label default.
    const initial = rangeMenu.querySelector('[data-range-option]');
    initial.classList.add('font-bold', 'text-primary');

    rangeToggle.addEventListener('click', () => setRange(rangeMenu.classList.contains('hidden')), listenerOptions);
    rangeMenu.querySelectorAll('[data-range-option]').forEach((option, index) => {
      option.addEventListener('click', () => selectRange(option), listenerOptions);
      option.addEventListener('keydown', (event) => {
        const options = Array.from(rangeMenu.querySelectorAll('[data-range-option]'));
        if (event.key === 'ArrowDown') {
          event.preventDefault();
          options[(index + 1) % options.length].focus();
        } else if (event.key === 'ArrowUp') {
          event.preventDefault();
          options[(index - 1 + options.length) % options.length].focus();
        }
      }, listenerOptions);
    });
    rangeToggle.addEventListener('keydown', (event) => {
      if (event.key === 'ArrowDown' || event.key === 'ArrowUp') {
        event.preventDefault();
        setRange(true);
      }
    }, listenerOptions);
    document.addEventListener('click', (event) => {
      if (!rangeMenu.classList.contains('hidden') && !rangeRoot.contains(event.target)) setRange(false);
    }, listenerOptions);
    document.addEventListener('keydown', (event) => {
      if (event.key === 'Escape' && !rangeMenu.classList.contains('hidden')) {
        setRange(false);
        rangeToggle.focus();
      }
    }, listenerOptions);
  }

  // Mobile drawer sidebar.
  const sidebar = document.querySelector('[data-admin-sidebar]');
  const toggle = document.querySelector('[data-sidebar-toggle]');
  const scrim = document.querySelector('[data-sidebar-scrim]');

  function setSidebar(open) {
    if (!sidebar) return;
    sidebar.classList.toggle('-translate-x-full', !open);
    sidebar.classList.toggle('translate-x-0', open);
    if (scrim) {
      scrim.style.display = open ? 'block' : 'none';
      scrim.classList.toggle('opacity-100', open);
      scrim.classList.toggle('pointer-events-auto', open);
    }
    if (toggle) toggle.setAttribute('aria-expanded', String(open));
  }

  if (!adminShellInitialized) {
    toggle?.addEventListener('click', () => setSidebar(!sidebar.classList.contains('translate-x-0')));
    sidebar?.querySelector('[data-sidebar-close]')?.addEventListener('click', () => setSidebar(false));
    window.matchMedia('(min-width: 768px)').addEventListener('change', () => setSidebar(false));
    scrim?.addEventListener('click', () => setSidebar(false));
    document.addEventListener('keydown', (event) => {
      if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'k') {
        event.preventDefault();
        document.getElementById('adminTopbarSearch')?.focus();
      }
    });
    adminShellInitialized = true;
  }

  // Tab chart Pendapatan / Volume.
  const tabRevenue = document.getElementById('tabRevenue');
  const tabVolume = document.getElementById('tabVolume');
  const svgs = document.querySelectorAll('.is-chart-svg');
  let chartMode = 'revenue';

  function showChart(name) {
    chartMode = name;
    svgs.forEach((svg) => svg.classList.toggle('hidden', svg.dataset.chart !== name));
  }

  tabRevenue?.addEventListener('click', () => {
    tabRevenue.className = 'rounded px-3 py-1 font-label-sm text-label-sm font-bold bg-surface-container-lowest text-primary shadow-sm transition-all';
    tabVolume.className = 'rounded px-3 py-1 font-label-sm text-label-sm transition-all text-on-surface-variant hover:text-on-surface';
    showChart('revenue');
  }, listenerOptions);

  tabVolume?.addEventListener('click', () => {
    tabVolume.className = 'rounded px-3 py-1 font-label-sm text-label-sm font-bold bg-surface-container-lowest text-primary shadow-sm transition-all';
    tabRevenue.className = 'rounded px-3 py-1 font-label-sm text-label-sm transition-all text-on-surface-variant hover:text-on-surface';
    showChart('volume');
  }, listenerOptions);

  // Hover riwayat harian: tooltip + garis panduan mengikuti titik data terdekat.
  const chartArea = document.querySelector('.is-chart-svg')?.parentElement;
  if (chartArea && Array.isArray(window.__adminChart) && window.__adminChart.length === 30) {
    const hoverTip = document.getElementById('chartHoverTip');
    const hoverLine = document.getElementById('chartHoverLine');
    const hoverDate = document.getElementById('chartHoverDate');
    const hoverValue = document.getElementById('chartHoverValue');
    const hoverCount = document.getElementById('chartHoverCount');
    const peakTip = document.getElementById('peakTip');

    const hideChartHover = () => {
      hoverTip?.classList.add('hidden');
      hoverTip?.classList.remove('flex');
      hoverLine?.classList.add('hidden');
      peakTip?.classList.remove('hidden');
    };

    chartArea.addEventListener('mousemove', (event) => {
      if (!hoverTip || !hoverLine || !hoverDate || !hoverValue || !hoverCount) return;
      const rect = chartArea.getBoundingClientRect();
      const idx = Math.min(29, Math.max(0, Math.round(((event.clientX - rect.left) / rect.width) * 29)));
      const point = window.__adminChart[idx];
      const leftPct = (idx * 100) / 29;
      peakTip?.classList.add('hidden');
      hoverTip.classList.remove('hidden');
      hoverTip.classList.add('flex');
      hoverTip.style.left = `${Math.min(92, Math.max(8, leftPct))}%`;
      hoverLine.classList.remove('hidden');
      hoverLine.style.left = `${leftPct}%`;
      hoverDate.textContent = point.d;
      if (point.count === 0) {
        hoverValue.textContent = '—';
        hoverCount.textContent = 'Tidak ada transaksi';
        return;
      }
      hoverValue.textContent = chartMode === 'revenue'
        ? `Rp ${point.total.toLocaleString('id-ID')}`
        : `${point.count} Pesanan`;
      hoverCount.textContent = chartMode === 'revenue'
        ? `${point.count} Pesanan Lunas`
        : `Rp ${point.total.toLocaleString('id-ID')}`;
    }, listenerOptions);
    chartArea.addEventListener('mouseleave', hideChartHover, listenerOptions);
  }

  // Verifikasi: helper fetch POST (CSRF dari form antrean).
  async function postVerify(url, action, note) {
    const csrf = document.querySelector('#actionQueueContainer input[name="_token"]');
    const body = new URLSearchParams({ action, _token: csrf ? csrf.value : '' });
    if (note !== undefined) body.set('note', note);
    const res = await fetch(url, {
      method: 'POST',
      headers: { 'X-Requested-With': 'XMLHttpRequest', Accept: 'application/json' },
      body,
    });
    return res.ok;
  }

  function queueForms() {
    return Array.from(document.querySelectorAll('#actionQueueContainer .js-approve-form'));
  }

  // Proses Semua Verifikasi: kirim semua form approve berurutan, lalu reload.
  document.getElementById('btnProsesSemua')?.addEventListener('click', async function () {
    const forms = queueForms();
    if (forms.length === 0) {
      showToast('Tidak ada antrean verifikasi');
      return;
    }
    const icon = this.querySelector('.material-symbols-outlined');
    if (icon) icon.classList.add('animate-spin');
    let ok = 0;
    for (const form of forms) {
      if (await postVerify(form.action, 'approve')) ok++;
    }
    if (icon) icon.classList.remove('animate-spin');
    showToast(ok + ' pembayaran diverifikasi & lisensi dirilis');
    setTimeout(() => location.reload(), 900);
  }, listenerOptions);

  // Tolak single: minta alasan (wajib backend), lalu submit form.
  document.querySelectorAll('[data-reject]').forEach((btn) => {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      const note = prompt('Alasan penolakan pembayaran ini:');
      if (note === null) return;
      if (!note.trim()) {
        showToast('Alasan penolakan wajib diisi');
        return;
      }
      const form = this.closest('form');
      form.querySelector('input[name="note"]').value = note.trim();
      form.submit();
    }, listenerOptions);
  });

  // Modal slip.
  const modal = document.getElementById('slipModal');
  let currentSlip = null; // { id, name, amount, approveUrl, rejectUrl }

  function closeSlipModal() {
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }

  document.querySelectorAll('[data-slip]').forEach((btn) => {
    btn.addEventListener('click', function () {
      const image = this.dataset.slipImage;
      if (!image) {
        showToast('Bukti transfer tidak tersedia');
        return;
      }
      currentSlip = {
        id: this.dataset.slipId,
        name: this.dataset.slipName,
        amount: this.dataset.slipAmount,
        approveUrl: this.closest('.rounded-lg.bg-surface-container-low')?.querySelector('.js-approve-form')?.action,
      };
      const img = document.getElementById('modalSlipImage');
      img.src = image;
      img.classList.toggle('hidden', image.toLowerCase().endsWith('.pdf'));
      document.getElementById('modalOrderId').innerText = '#' + this.dataset.slipId;
      document.getElementById('modalCustomerName').innerText = this.dataset.slipName;
      document.getElementById('modalAmount').innerText = this.dataset.slipAmount;
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }, listenerOptions);
  });

  document.querySelectorAll('[data-modal-close]').forEach((btn) => btn.addEventListener('click', closeSlipModal, listenerOptions));

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeSlipModal();
      setOrderModal(false);
      if (sidebar?.classList.contains('translate-x-0')) setSidebar(false);
    }
  }, listenerOptions);

  // Konfirmasi / tolak dari modal (fetch, tanpa reload).
  document.getElementById('btnModalApprove')?.addEventListener('click', async function () {
    if (!currentSlip?.approveUrl) return closeSlipModal();
    this.disabled = true;
    const ok = await postVerify(currentSlip.approveUrl, 'approve');
    this.disabled = false;
    closeSlipModal();
    showToast(ok ? 'Bukti transfer disetujui. Lisensi aktif!' : 'Gagal memverifikasi, coba dari antrean.');
    if (ok) setTimeout(() => location.reload(), 900);
  }, listenerOptions);

  document.getElementById('btnModalReject')?.addEventListener('click', async function () {
    if (!currentSlip?.approveUrl) return closeSlipModal();
    const note = prompt('Alasan penolakan slip transfer:');
    if (note === null) return;
    if (!note.trim()) {
      showToast('Alasan penolakan wajib diisi');
      return;
    }
    this.disabled = true;
    const ok = await postVerify(currentSlip.approveUrl, 'reject', note.trim());
    this.disabled = false;
    closeSlipModal();
    showToast(ok ? 'Bukti transfer ditolak.' : 'Gagal menolak, coba dari antrean.');
    if (ok) setTimeout(() => location.reload(), 900);
  }, listenerOptions);

  // Modal detail pesanan: fetch halaman show lalu inject konten #orderDetailContent.
  const orderModal = document.querySelector('[data-order-modal]');
  const orderModalBody = document.getElementById('orderModalBody');
  const orderModalTitle = document.getElementById('orderModalTitle');
  let orderModalReturnFocus = null;
  let orderModalCloseTimer;

  function setOrderModal(open) {
    if (!orderModal) return;
    clearTimeout(orderModalCloseTimer);
    if (open) {
      orderModal.classList.remove('hidden', 'modal-exit');
      orderModal.classList.add('flex');
      document.body.classList.toggle('overflow-hidden', true);
      orderModal.querySelector('[data-order-modal-close]')?.focus();
    } else {
      // Tahan hidden selama animasi keluar (160ms) supaya tutup ikut beranimasi.
      orderModal.classList.add('modal-exit');
      document.body.classList.remove('overflow-hidden');
      orderModalReturnFocus?.focus();
      orderModalReturnFocus = null;
      orderModalCloseTimer = setTimeout(() => {
        orderModal.classList.add('hidden');
        orderModal.classList.remove('flex', 'modal-exit');
      }, 160);
    }
  }

  async function openOrderModal(link) {
    orderModalReturnFocus = link;
    orderModalBody.innerHTML = '<div class="grid place-items-center p-gutter text-on-surface-variant"><span class="material-symbols-outlined animate-spin text-3xl">progress_activity</span></div>';
    setOrderModal(true);
    try {
      const res = await fetch(link.href, { headers: { Accept: 'text/html' } });
      const doc = new DOMParser().parseFromString(await res.text(), 'text/html');
      const content = doc.getElementById('orderDetailContent');
      if (!content) throw new Error('detail tidak ditemukan');
      orderModalBody.innerHTML = content.innerHTML;
      orderModalTitle.innerText = 'Detail ' + (doc.getElementById('admin-order-number')?.innerText.trim() || 'Pesanan');
    } catch {
      setOrderModal(false);
      showToast('Gagal memuat detail pesanan');
    }
  }

  document.querySelectorAll('[data-order-detail]').forEach((link) => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      openOrderModal(this);
    }, listenerOptions);
  });

  orderModal?.querySelector('[data-order-modal-close]')?.addEventListener('click', () => setOrderModal(false), listenerOptions);
  orderModal?.querySelector('[data-order-modal-scrim]')?.addEventListener('click', () => setOrderModal(false), listenerOptions);

  // Tombol salin (di halaman & di dalam modal).
  document.addEventListener('click', (e) => {
    const btn = e.target instanceof Element && e.target.closest('[data-copy-text]');
    if (!btn) return;
    navigator.clipboard?.writeText(btn.dataset.copyText).then(() => showToast(btn.dataset.copyMessage || 'Disalin ke clipboard'));
  }, listenerOptions);

  // Filter & pencarian tabel.
  const searchInput = document.getElementById('tableSearch');
  const filterButtons = document.querySelectorAll('.filter-tab');
  const tableRows = document.querySelectorAll('#ordersTable tbody tr:not(#tableEmptyState), .order-row');
  const emptyState = document.getElementById('tableEmptyState');
  const visibleCounter = document.getElementById('visibleRowCount');
  let currentFilter = 'all';
  let currentDeliveryFilter = '';

  // Saat filter aktif, baris bisa disembunyikan.
  function filterTable() {
    const query = (searchInput?.value || '').toLowerCase().trim();
    let matchCount = 0;

    tableRows.forEach((row) => {
      const matchesQuery = !query || row.innerText.toLowerCase().includes(query);
      const matchesStatus = currentFilter === 'all' || currentFilter === '' || row.getAttribute('data-status') === currentFilter;
      const matchesDelivery = currentDeliveryFilter === '' || row.getAttribute('data-delivery') === currentDeliveryFilter;
      const visible = matchesQuery && matchesStatus && matchesDelivery;
      row.style.display = visible ? '' : 'none';
      if (visible) matchCount++;
    });

    if (visibleCounter) visibleCounter.innerText = matchCount;

    if (emptyState) {
      emptyState.style.display = matchCount === 0 ? '' : 'none';
      emptyState.classList.toggle('hidden', matchCount !== 0);
      // flex hanya untuk div kosong dashboard; tr kosong cukup via style display.
      if (emptyState.tagName !== 'TR') emptyState.classList.toggle('flex', matchCount === 0);
    }
  }

  searchInput?.addEventListener('input', filterTable, listenerOptions);

  filterButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      filterButtons.forEach((b) => {
        b.className = 'filter-tab rounded px-2.5 py-1 font-label-sm text-label-sm transition-all text-on-surface-variant hover:text-on-surface';
      });
      btn.className = 'filter-tab rounded px-2.5 py-1 font-label-sm text-label-sm font-bold bg-surface-container-lowest text-primary shadow-sm';
      currentFilter = btn.getAttribute('data-filter') || 'all';
      filterTable();
    }, listenerOptions);
  });

  document.getElementById('btnResetFilter')?.addEventListener('click', () => {
    if (searchInput) searchInput.value = '';
    currentFilter = 'all';
    filterButtons.forEach((b) => {
      b.className = 'filter-tab rounded px-2.5 py-1 font-label-sm text-label-sm transition-all text-on-surface-variant hover:text-on-surface';
    });
    filterButtons[0]?.click();
  }, listenerOptions);

  // Filter instan pesanan (status & pengerjaan): klik tab langsung menyaring baris
  // tanpa berpindah halaman; URL di-replaceState agar refresh/deep-link konsisten.
  const ordersFilterNavs = document.querySelectorAll('nav[aria-label="Filter status pembayaran"], nav[aria-label="Filter status pengerjaan"]');

  function setOrdersTabState(tab, on) {
    tab.classList.toggle('bg-primary-container', on);
    tab.classList.toggle('font-bold', on);
    tab.classList.toggle('text-on-primary', on);
    tab.classList.toggle('shadow-sm', on);
    tab.classList.toggle('bg-surface-container-low', !on);
    tab.classList.toggle('text-on-surface-variant', !on);
    tab.classList.toggle('hover:bg-surface-container-high', !on);
    tab.classList.toggle('hover:text-on-surface', !on);
    if (on) tab.setAttribute('aria-current', 'page');
    else tab.removeAttribute('aria-current');
  }

  if (ordersFilterNavs.length) {
    ordersFilterNavs.forEach((nav, index) => {
      const type = index === 0 ? 'status' : 'delivery';
      nav.addEventListener('click', (event) => {
        const tab = event.target instanceof Element && event.target.closest('a[data-filter-type]');
        if (!tab) return;
        event.preventDefault();
        if (type === 'status') currentFilter = tab.dataset.filterValue || '';
        else currentDeliveryFilter = tab.dataset.filterValue || '';
        nav.querySelectorAll('[data-filter-type]').forEach((t) => setOrdersTabState(t, t === tab));
        filterTable();
        history.replaceState({}, '', tab.href);
      }, listenerOptions);
    });

    document.querySelector('[data-filter-reset]')?.addEventListener('click', (event) => {
      event.preventDefault();
      currentFilter = 'all';
      currentDeliveryFilter = '';
      ordersFilterNavs.forEach((nav) => {
        nav.querySelectorAll('[data-filter-type]').forEach((t) => setOrdersTabState(t, (t.dataset.filterValue || '') === ''));
      });
      if (searchInput) searchInput.value = '';
      filterTable();
      history.replaceState({}, '', event.currentTarget.href);
    }, listenerOptions);
  }

  // Search topbar: hanya memfilter tabel pesanan bila tersedia.
  document.getElementById('adminTopbarSearch')?.addEventListener('input', function () {
    const t = document.getElementById('tableSearch');
    if (t) {
      t.value = this.value;
      filterTable();
    }
  }, listenerOptions);

  // Export CSV dari tabel (client-side, generik utk dashboard & daftar pesanan).
  document.getElementById('btnExportCsv')?.addEventListener('click', () => {
    // Teks cell bersih: buang glyph material icon lalu padatkan whitespace.
    const cellText = (td) => {
      const clone = td.cloneNode(true);
      clone.querySelectorAll('.material-symbols-outlined').forEach((el) => el.remove());
      return clone.innerText.split('\n').map((s) => s.trim()).filter(Boolean).join(' - ');
    };
    const heads = Array.from(document.querySelectorAll('#ordersTable thead th')).slice(0, -1);
    const rows = Array.from(document.querySelectorAll('#ordersTable tbody tr')).filter((tr) => tr.style.display !== 'none');
    const lines = [heads.map((th) => th.innerText.trim())];
    rows.forEach((tr) => {
      lines.push(heads.map((_, i) => {
        const td = tr.querySelectorAll('td')[i];
        if (!td) return '';
        const text = cellText(td);
        // Nominal "Rp 499.000" → "499000" supaya bisa dijumlahkan di Excel.
        return /^Rp /i.test(text) ? text.replace(/\D/g, '') : text;
      }));
    });
    const csv = lines.map((r) => r.map((c) => '"' + String(c).replaceAll('"', '""') + '"').join(';')).join('\r\n');
    const blob = new Blob(["\uFEFF" + csv], { type: 'text/csv;charset=utf-8' });
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = 'daftar-pesanan.csv';
    a.click();
    URL.revokeObjectURL(a.href);
    showToast(lines.length - 1 + ' pesanan diekspor ke CSV');
  }, listenerOptions);

  // ===== Halaman Paket & Lisensi =====
  const packageTable = document.getElementById('packagesTable');
  if (packageTable) {
    const pkgTbody = packageTable.tBodies[0];
    const pkgRows = Array.from(pkgTbody.querySelectorAll('tr[data-package-id]'));
    const pkgSearch = document.getElementById('packageSearch');
    const pkgFilterStatus = document.getElementById('packageFilterStatus');
    const pkgSortBy = document.getElementById('packageSortBy');
    const pkgCounter = document.getElementById('packagesVisibleCount');
    const pkgTotal = document.getElementById('packagesTotalCount');
    const pkgEmpty = document.getElementById('packagesEmptyState');
    const pkgDrawerRoot = document.getElementById('packageDrawerRoot');
    const pkgDrawer = document.getElementById('packageDrawer');
    const pkgForm = document.getElementById('packageForm');
    const pkgFormMethod = document.getElementById('packageFormMethod');
    const pkgFeatureList = document.getElementById('packageFeatureList');
    const pkgFeatureCount = document.getElementById('packageFeatureCount');
    const pkgDeleteModal = document.getElementById('packageDeleteModal');
    let pkgDrawerReturnFocus = null;
    let pkgDeleteReturnFocus = null;

    // Filter + pencarian instan.
    function applyPackagesFilter() {
      const query = (pkgSearch?.value || '').toLowerCase().trim();
      const status = pkgFilterStatus?.value || 'all';
      let visible = 0;
      pkgRows.forEach((row) => {
        const matchesQuery = !query || row.innerText.toLowerCase().includes(query);
        const matchesStatus = status === 'all' || row.dataset.active === status;
        const show = matchesQuery && matchesStatus;
        row.style.display = show ? '' : 'none';
        if (show) visible++;
      });
      if (pkgCounter) pkgCounter.innerText = visible;
      if (pkgEmpty) pkgEmpty.classList.toggle('hidden', visible !== 0);
      if (pkgTotal) pkgTotal.classList.toggle('hidden', Boolean(query) || status !== 'all');
    }
    pkgSearch?.addEventListener('input', applyPackagesFilter, listenerOptions);
    pkgFilterStatus?.addEventListener('change', applyPackagesFilter, listenerOptions);

    // Urutkan ulang baris menurut kriteria terpilih.
    const pkgSorters = {
      order: (a, b) => a.dataset.sortOrder - b.dataset.sortOrder,
      price_asc: (a, b) => a.dataset.price - b.dataset.price,
      price_desc: (a, b) => b.dataset.price - a.dataset.price,
      orders: (a, b) => b.dataset.orders - a.dataset.orders,
    };
    pkgSortBy?.addEventListener('change', () => {
      const sorter = pkgSorters[pkgSortBy.value];
      if (!sorter) return;
      pkgEmpty?.remove();
      pkgRows.sort(sorter).forEach((row) => pkgTbody.appendChild(row));
      if (pkgEmpty) pkgTbody.appendChild(pkgEmpty);
    }, listenerOptions);

    // Toggle aktif/nonaktif via fetch — update row & KPI tanpa reload.
    document.querySelectorAll('form[data-package-toggle]').forEach((form) => {
      form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const button = form.querySelector('button[type="submit"]');
        if (!button || button.disabled) return;
        button.disabled = true;
        try {
          const res = await fetch(form.action, {
            method: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest', Accept: 'application/json' },
            body: new FormData(form),
          });
          const json = await res.json();
          if (!res.ok) throw new Error();
          const row = form.closest('tr[data-package-id]');
          const active = Boolean(json.is_active);
          row.dataset.active = active ? '1' : '0';
          const track = form.querySelector('span.relative');
          const knob = track.querySelector('span');
          const label = form.querySelector('span.font-label-sm');
          track.classList.toggle('bg-secondary', active);
          track.classList.toggle('bg-surface-container-highest', !active);
          knob.classList.toggle('translate-x-4', active);
          label.innerText = active ? 'Aktif' : 'Nonaktif';
          label.classList.toggle('text-secondary', active);
          label.classList.toggle('text-on-surface-variant', !active);
          form.setAttribute('title', active ? 'Nonaktifkan paket' : 'Aktifkan paket');
          const iconWrap = row.querySelector('td .h-9.w-9');
          if (iconWrap) {
            iconWrap.classList.toggle('bg-primary-fixed', active);
            iconWrap.classList.toggle('text-primary', active);
            iconWrap.classList.toggle('bg-surface-container', !active);
            iconWrap.classList.toggle('text-outline', !active);
          }
          const nameSpan = row.querySelector('td span.font-label-lg');
          if (nameSpan) {
            nameSpan.classList.toggle('text-on-surface', active);
            nameSpan.classList.toggle('text-on-surface-variant', !active);
          }
          const descSpan = row.querySelector('td span.font-caption');
          if (descSpan) {
            descSpan.classList.toggle('text-on-surface-variant', active);
            descSpan.classList.toggle('text-outline', !active);
          }
          const packageRows = Array.from(document.querySelectorAll('#packagesTable tbody tr[data-package-id]'));
          const activeCount = packageRows.filter((r) => r.dataset.active === '1').length;
          document.getElementById('packagesActiveBadge').innerText = activeCount + ' Paket Aktif';
          document.getElementById('kpiActiveCount').innerText = activeCount;
          document.getElementById('kpiInactiveCount').innerText = packageRows.length - activeCount;
          applyPackagesFilter();
          showToast(json.message);
        } catch {
          showToast('Gagal mengubah status paket');
        } finally {
          button.disabled = false;
        }
      }, listenerOptions);
    });

    // Drawer tambah/edit.
    function createFeatureInput(value = '') {
      const item = document.createElement('div');
      item.className = 'flex items-center gap-2 rounded-lg bg-surface-container-low p-2 shadow-sm';
      item.innerHTML =
        '<span aria-hidden="true" class="material-symbols-outlined select-none text-lg text-outline">menu</span>' +
        '<input type="text" data-feature-input aria-label="Isi fitur paket" placeholder="Tuliskan fitur yang diperoleh klien..." class="min-w-0 flex-1 bg-transparent font-body-sm text-body-sm text-on-surface focus:outline-none">' +
        '<button type="button" aria-label="Hapus fitur" title="Hapus fitur" class="rounded p-1 text-outline transition-colors hover:text-error"><span class="material-symbols-outlined text-base">close</span></button>';
      if (value) item.querySelector('input').value = value;
      item.querySelector('input').addEventListener('input', updateFeatureCount, listenerOptions);
      item.querySelector('button').addEventListener('click', () => {
        item.remove();
        updateFeatureCount();
      }, listenerOptions);
      return item;
    }

    function updateFeatureCount() {
      if (!pkgFeatureCount || !pkgFeatureList) return;
      pkgFeatureCount.innerText = pkgFeatureList.querySelectorAll('input[data-feature-input]').length + ' fitur terdaftar';
    }

    function openPackageDrawer(mode, row) {
      const isEdit = mode === 'edit' && row;
      pkgForm.action = isEdit ? row.dataset.updateUrl : pkgForm.dataset.storeUrl;
      pkgFormMethod.value = isEdit ? 'PUT' : 'POST';
      const title = document.getElementById('packageDrawerTitle');
      const subtitle = document.getElementById('packageDrawerSubtitle');
      if (title) title.innerText = isEdit ? 'Edit Paket: ' + row.dataset.name : 'Tambah Paket Baru';
      if (subtitle) subtitle.innerText = isEdit
        ? 'ID: #' + row.dataset.packageId + ' · digunakan di ' + row.dataset.orders + ' pesanan'
        : 'Paket baru tersedia saat pemesanan';
      if (isEdit) {
        document.getElementById('packageName').value = row.dataset.name;
        document.getElementById('packageSlug').value = row.dataset.slug;
        document.getElementById('packageDescription').value = row.dataset.description;
        document.getElementById('packagePrice').value = row.dataset.price;
        document.getElementById('packageOldPrice').value = row.dataset.oldPrice;
        document.getElementById('packageQuota').value = row.dataset.quota;
        document.getElementById('packageSort').value = row.dataset.sortOrder;
        document.getElementById('packageCmsEnabled').checked = row.dataset.cms === '1';
        document.getElementById('packagePublishActive').checked = row.dataset.active === '1';
        document.getElementById('packagePublishDraft').checked = row.dataset.active !== '1';
      } else {
        pkgForm.reset();
        document.getElementById('packagePublishActive').checked = true;
        document.getElementById('packageSort').value = String(pkgRows.reduce((max, r) => Math.max(max, Number(r.dataset.sortOrder)), 0) + 1);
      }
      pkgFeatureList.replaceChildren();
      const features = isEdit ? row.dataset.features.split('\n').map((s) => s.trim()).filter(Boolean) : [''];
      features.forEach((feature) => pkgFeatureList.appendChild(createFeatureInput(feature)));
      document.getElementById('packageFormErrors').classList.add('hidden');
      updateFeatureCount();
      pkgDrawerReturnFocus = document.querySelector('[data-package-drawer-create]');
      pkgDrawerRoot.classList.remove('hidden');
      requestAnimationFrame(() => pkgDrawer.classList.remove('translate-x-full'));
      document.getElementById('packageName').focus();
    }

    function closePackageDrawer() {
      if (!pkgDrawerRoot || pkgDrawerRoot.classList.contains('hidden')) return;
      if (document.activeElement && pkgDrawer.contains(document.activeElement)) pkgDrawerReturnFocus?.focus();
      pkgDrawer.classList.add('translate-x-full');
      setTimeout(() => pkgDrawerRoot.classList.add('hidden'), 300);
    }

    document.querySelector('[data-package-drawer-create]')?.addEventListener('click', () => openPackageDrawer('create'), listenerOptions);
    document.querySelectorAll('[data-package-edit]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const row = btn.closest('tr[data-package-id]');
        if (row) openPackageDrawer('edit', row);
      }, listenerOptions);
    });
    pkgDrawerRoot?.querySelectorAll('[data-package-drawer-close]').forEach((el) => {
      el.addEventListener('click', closePackageDrawer, listenerOptions);
    });

    document.getElementById('btnAddPackageFeature')?.addEventListener('click', () => {
      const input = createFeatureInput();
      pkgFeatureList.appendChild(input);
      input.querySelector('input').focus();
    }, listenerOptions);

    // Simpan paket via fetch agar validasi tetap tampil di dalam drawer.
    function showPackageFormErrors(errors) {
      const box = document.getElementById('packageFormErrors');
      if (!box) return;
      box.replaceChildren();
      const list = errors && typeof errors === 'object' && Object.keys(errors).length ? errors : { form: ['Gagal menyimpan paket, coba lagi.'] };
      Object.entries(list).forEach(([field, messages]) => {
        messages.forEach((message) => {
          const p = document.createElement('p');
          p.className = 'font-label-md font-semibold text-label-md';
          p.innerText = field.charAt(0).toUpperCase() + field.slice(1) + ': ' + message;
          box.appendChild(p);
        });
      });
      box.classList.remove('hidden');
      box.scrollIntoView({ block: 'nearest' });
    }

    pkgForm?.addEventListener('submit', async (event) => {
      event.preventDefault();
      const featureValues = Array.from(pkgFeatureList.querySelectorAll('input[data-feature-input]')).map((i) => i.value.trim()).filter(Boolean);
      if (featureValues.length === 0) {
        showPackageFormErrors({ features: ['Isi minimal satu fitur paket.'] });
        return;
      }
      document.getElementById('packageFeaturesValue').value = featureValues.join('\n');
      const saveBtn = document.getElementById('btnSavePackage');
      saveBtn.disabled = true;
      try {
        const res = await fetch(pkgForm.action, {
          method: 'POST',
          headers: { 'X-Requested-With': 'XMLHttpRequest', Accept: 'application/json' },
          body: new FormData(pkgForm),
        });
        if (res.ok) {
          showToast('Paket berhasil disimpan');
          setTimeout(() => location.reload(), 700);
          return;
        }
        let json = null;
        try {
          json = await res.json();
        } catch {}
        showPackageFormErrors(json?.errors);
      } catch {
        showPackageFormErrors(null);
      } finally {
        saveBtn.disabled = false;
      }
    }, listenerOptions);

    // Modal konfirmasi hapus.
    let pkgDeleteUrl = '';
    function openPackageDelete(row) {
      pkgDeleteUrl = row.dataset.deleteUrl;
      document.getElementById('packageDeleteName').innerText = '"' + row.dataset.name + '"';
      const count = Number(row.dataset.orders);
      document.getElementById('packageDeleteImpact').innerText = count > 0
        ? count + ' pesanan terkait menggunakan tier paket ini.'
        : 'Belum ada pesanan yang memakai paket ini.';
      pkgDeleteReturnFocus = row;
      pkgDeleteModal.classList.remove('hidden');
      pkgDeleteModal.classList.add('flex');
      document.getElementById('btnCancelPackageDelete')?.focus();
    }

    function closePackageDelete() {
      if (!pkgDeleteModal || pkgDeleteModal.classList.contains('hidden')) return;
      pkgDeleteModal.classList.add('hidden');
      pkgDeleteModal.classList.remove('flex');
      pkgDeleteReturnFocus?.focus();
      pkgDeleteReturnFocus = null;
    }

    document.querySelectorAll('[data-package-delete]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const row = btn.closest('tr[data-package-id]');
        if (row) openPackageDelete(row);
      }, listenerOptions);
    });
    pkgDeleteModal?.querySelectorAll('[data-package-delete-close]').forEach((el) => {
      el.addEventListener('click', closePackageDelete, listenerOptions);
    });

    document.getElementById('packageDeleteForm')?.addEventListener('submit', async (event) => {
      event.preventDefault();
      const confirmBtn = document.getElementById('btnConfirmPackageDelete');
      confirmBtn.disabled = true;
      try {
        const res = await fetch(pkgDeleteUrl, {
          method: 'POST',
          headers: { 'X-Requested-With': 'XMLHttpRequest', Accept: 'application/json' },
          body: new FormData(event.currentTarget),
        });
        if (res.ok) {
          closePackageDelete();
          showToast('Paket berhasil dihapus');
          setTimeout(() => location.reload(), 700);
          return;
        }
        let json = null;
        try {
          json = await res.json();
        } catch {}
        closePackageDelete();
        showToast(json?.errors?.package?.[0] || json?.message || 'Paket tidak dapat dihapus.');
      } catch {
        showToast('Gagal menghapus paket, coba lagi.');
      } finally {
        confirmBtn.disabled = false;
      }
    }, listenerOptions);

    // Escape menutup modal hapus lalu drawer (diutamakan modal di atas).
    document.addEventListener('keydown', (event) => {
      if (event.key !== 'Escape') return;
      if (pkgDeleteModal && !pkgDeleteModal.classList.contains('hidden')) {
        closePackageDelete();
        return;
      }
      if (pkgDrawerRoot && !pkgDrawerRoot.classList.contains('hidden')) closePackageDrawer();
    }, listenerOptions);
  }
}

document.addEventListener('DOMContentLoaded', initializeAdminPage);
document.addEventListener('admin:navigated', initializeAdminPage);
