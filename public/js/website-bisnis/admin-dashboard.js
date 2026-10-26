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

  function showChart(name) {
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

  function setOrderModal(open) {
    if (!orderModal) return;
    orderModal.classList.toggle('hidden', !open);
    orderModal.classList.toggle('flex', open);
    document.body.classList.toggle('overflow-hidden', open);
    if (open) {
      orderModal.querySelector('[data-order-modal-close]')?.focus();
    } else {
      orderModalReturnFocus?.focus();
      orderModalReturnFocus = null;
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
  const tableRows = document.querySelectorAll('.order-row');
  const emptyState = document.getElementById('tableEmptyState');
  const visibleCounter = document.getElementById('visibleRowCount');
  let currentFilter = 'all';

  function filterTable() {
    const query = (searchInput?.value || '').toLowerCase().trim();
    let matchCount = 0;

    tableRows.forEach((row) => {
      const matchesQuery = !query || row.innerText.toLowerCase().includes(query);
      const matchesFilter = currentFilter === 'all' || row.getAttribute('data-status') === currentFilter;
      row.style.display = matchesQuery && matchesFilter ? '' : 'none';
      if (matchesQuery && matchesFilter) matchCount++;
    });

    if (visibleCounter) visibleCounter.innerText = matchCount;

    if (emptyState) {
      emptyState.classList.toggle('hidden', matchCount !== 0);
      emptyState.classList.toggle('flex', matchCount === 0);
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

  // Search topbar: hanya memfilter tabel pesanan bila tersedia.
  document.getElementById('adminTopbarSearch')?.addEventListener('input', function () {
    const t = document.getElementById('tableSearch');
    if (t) {
      t.value = this.value;
      filterTable();
    }
  }, listenerOptions);

  // Export CSV dari tabel (client-side).
  document.getElementById('btnExportCsv')?.addEventListener('click', () => {
    const rows = [['ID Pesanan', 'Konsumen & Brand', 'Template', 'Paket', 'Total', 'Status', 'Waktu']];
    document.querySelectorAll('#ordersTable .order-row').forEach((tr) => {
      if (tr.style.display === 'none') return;
      const tds = tr.querySelectorAll('td');
      rows.push(Array.from(tds).map((td) => td.innerText.replace(/\s+/g, ' ').trim()));
    });
    const csv = rows.map((r) => r.map((c) => '"' + String(c).replaceAll('"', '""') + '"').join(';')).join('\r\n');
    const blob = new Blob(["\uFEFF" + csv], { type: 'text/csv;charset=utf-8' });
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = 'pesanan-terkini.csv';
    a.click();
    URL.revokeObjectURL(a.href);
    showToast('CSV pesanan terkini diunduh');
  }, listenerOptions);
}

document.addEventListener('DOMContentLoaded', initializeAdminPage);
document.addEventListener('admin:navigated', initializeAdminPage);
