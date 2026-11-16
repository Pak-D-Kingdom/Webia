document.addEventListener('DOMContentLoaded', function () {
  // Modal portal konsumen: satu overlay aktif, Escape/scrim menutup, fokus dipenjara lalu dikembalikan.
  const openModals = [];
  const openerByModal = new WeakMap();
  const FOCUSABLE = 'a[href], button:not([disabled]), input:not([type="hidden"]):not([disabled]), select, textarea, [tabindex]:not([tabindex="-1"])';

  const openModal = function (modal, opener) {
    if (!modal || openModals.includes(modal)) return;
    modal.classList.add('is-open');
    openerByModal.set(modal, opener || null);
    openModals.push(modal);
    const target = modal.querySelector('[data-modal-autofocus]') || modal.querySelector(FOCUSABLE);
    if (target) target.focus();
  };

  const closeModal = function (modal) {
    const index = openModals.indexOf(modal);
    if (index === -1) return;
    openModals.splice(index, 1);
    modal.classList.remove('is-open');
    const opener = openerByModal.get(modal) || modal.querySelector('a[href], button:not([disabled])');
    openerByModal.delete(modal);
    if (opener) opener.focus();
  };

  document.querySelectorAll('[data-modal-open]').forEach(function (trigger) {
    trigger.addEventListener('click', function (event) {
      event.preventDefault();
      openModal(document.getElementById(trigger.getAttribute('data-modal-open').slice(1)), trigger);
    });
  });

  document.querySelectorAll('.customer-modal').forEach(function (modal) {
    modal.querySelectorAll('[data-modal-close]').forEach(function (el) {
      el.addEventListener('click', function () {
        closeModal(modal);
      });
    });

    modal.addEventListener('keydown', function (event) {
      if (event.key !== 'Tab') return;
      const focusable = Array.from(modal.querySelectorAll(FOCUSABLE)).filter((el) => el.offsetParent !== null);
      if (focusable.length === 0) return;
      const first = focusable[0];
      const last = focusable[focusable.length - 1];
      if (event.shiftKey && document.activeElement === first) {
        event.preventDefault();
        last.focus();
      } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault();
        first.focus();
      }
    });
  });

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape' && openModals.length) closeModal(openModals[openModals.length - 1]);
  });

  const autoOpen = document.querySelector('[data-modal-autoopen]');
  if (autoOpen) openModal(autoOpen, null);

  // Modal upload bukti: pilih file, tinjau (nama + ukuran), lalu hapus file kembali ke pilih.
  const uploadInput = document.querySelector('[data-upload-modal] input[type="file"]');
  if (uploadInput) {
    const formatSize = (bytes) => (bytes / 1048576).toFixed(1).replace('.', ',') + ' MB';
    const setUploadState = function (review) {
      uploadModal.querySelectorAll('[data-upload-pick]').forEach(function (el) {
        el.hidden = review;
      });
      uploadModal.querySelectorAll('[data-upload-review]').forEach(function (el) {
        el.hidden = !review;
      });
      uploadModal.querySelectorAll('[data-upload-review-only]').forEach(function (el) {
        el.hidden = !review;
      });
    };
    const uploadModal = uploadInput.closest('.customer-modal');
    uploadInput.addEventListener('change', function () {
      const file = uploadInput.files && uploadInput.files[0];
      document.querySelectorAll('[data-upload-name]').forEach(function (el) {
        el.textContent = file ? file.name : '-';
      });
      document.querySelectorAll('[data-upload-size]').forEach(function (el) {
        el.textContent = file ? formatSize(file.size) : '-';
      });
      setUploadState(Boolean(file));
      const target = file ? uploadModal.querySelector('[data-upload-review-only]:not([hidden])') : uploadInput;
      if (target) target.focus();
    });
    document.querySelectorAll('[data-upload-clear]').forEach(function (button) {
      button.addEventListener('click', function () {
        const target = document.getElementById(button.getAttribute('data-upload-clear').slice(1));
        const input = target && target.querySelector('input[type="file"]');
        if (input) {
          input.value = '';
          input.dispatchEvent(new Event('change'));
        }
      });
    });
  }

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

    // Modal konfirmasi checkout: submit dicegat sekali, tombol di modal melanjutkan submit asli.
    const confirmModal = form.dataset.confirmCheckout ? document.getElementById(form.dataset.confirmCheckout) : null;
    if (confirmModal) {
      form.addEventListener('submit', function (event) {
        if (form.dataset.confirmed === '1') {
          delete form.dataset.confirmed;
          return;
        }
        if (!form.querySelector('input[name="package_id"]:checked')) return;
        event.preventDefault();
        const pkgTarget = confirmModal.querySelector('[data-confirm-package]');
        const totalTarget = confirmModal.querySelector('[data-confirm-total]');
        if (pkgTarget) pkgTarget.textContent = (pkgNameEl ? pkgNameEl.textContent : '').trim();
        if (totalTarget) totalTarget.textContent = (totalEl ? totalEl.textContent : '').trim();
        openModal(confirmModal, submitBtn);
      });
      const confirmBtn = confirmModal.querySelector('[data-confirm-submit]');
      if (confirmBtn) confirmBtn.addEventListener('click', function () {
        form.dataset.confirmed = '1';
        closeModal(confirmModal);
        if (form.requestSubmit) form.requestSubmit(submitBtn); else form.submit();
      });
    }

    // Modal keluar: nav link & logout dicegat hanya kalau ada pilihan yang tersimpan di form.
    const leaveModal = form.dataset.leaveGuard ? document.getElementById(form.dataset.leaveGuard) : null;
    if (leaveModal) {
      let pendingNav = null;
      const isDirty = function () {
        return !!form.querySelector('input[name="package_id"]:checked')
          || form.querySelectorAll('input[name="addon_ids[]"]:checked').length > 0;
      };
      const fillLeave = function () {
        const templateTarget = leaveModal.querySelector('[data-leave-template]');
        if (templateTarget) templateTarget.textContent = (document.querySelector('.customer-create-template-body h3') || {}).textContent?.trim() || 'Belum dipilih';
        const pkgTarget = leaveModal.querySelector('[data-leave-package]');
        if (pkgTarget) pkgTarget.textContent = (pkgNameEl ? pkgNameEl.textContent : '').trim();
        const addonTarget = leaveModal.querySelector('[data-leave-addons]');
        if (addonTarget) {
          const names = [...form.querySelectorAll('input[name="addon_ids[]"]:checked')]
            .map((input) => input.closest('label').querySelector('[data-addon-name]').textContent.trim());
          addonTarget.textContent = names.length ? names.join(', ') : 'Tidak ada';
        }
      };
      document.querySelectorAll('a[href]').forEach(function (link) {
        if (link.closest('.customer-modal') || link.getAttribute('href').startsWith('#')) return;
        link.addEventListener('click', function (event) {
          if (!isDirty() || pendingNav) return;
          event.preventDefault();
          pendingNav = { href: link.href };
          fillLeave();
          openModal(leaveModal, link);
        });
      });
      const logoutForm = document.querySelector('form[action*="logout"]');
      if (logoutForm) logoutForm.addEventListener('submit', function (event) {
        if (pendingNav || !isDirty()) return;
        event.preventDefault();
        pendingNav = { form: logoutForm };
        fillLeave();
        openModal(leaveModal, logoutForm.querySelector('button'));
      });
      const leaveBtn = leaveModal.querySelector('[data-leave-confirm]');
      if (leaveBtn) leaveBtn.addEventListener('click', function () {
        closeModal(leaveModal);
        const target = pendingNav;
        pendingNav = null;
        if (target && target.form) target.form.submit();
        else if (target) window.location.href = target.href;
      });
    }

    // Tombol "Pilih paket" / "Tambahkan" di modal detail: pilih opsi lalu tutup modal.
    document.querySelectorAll('[data-select-package]').forEach(function (button) {
      button.addEventListener('click', function () {
        const input = form.querySelector('input[name="package_id"][value="' + button.getAttribute('data-select-package') + '"]');
        if (input) {
          input.checked = true;
          input.dispatchEvent(new Event('change', { bubbles: true }));
        }
        const host = button.closest('.customer-modal');
        if (host) closeModal(host);
      });
    });
    document.querySelectorAll('[data-select-addon]').forEach(function (button) {
      button.addEventListener('click', function () {
        const input = form.querySelector('input[name="addon_ids[]"][value="' + button.getAttribute('data-select-addon') + '"]');
        if (input) {
          input.checked = true;
          input.dispatchEvent(new Event('change', { bubbles: true }));
        }
        const host = button.closest('.customer-modal');
        if (host) closeModal(host);
      });
    });
  };

  // Expose untuk halaman yang memuat form pesanan ke modal (koleksi publik).
  window.webiaInitOrderForm = initOrderForm;
  const orderForm = document.querySelector('.customer-order-form, .customer-create-grid');
  if (orderForm) initOrderForm(orderForm);

  const paymentStatusPanel = document.querySelector('[data-payment-status-url]');
  if (paymentStatusPanel) {
    const statusNote = paymentStatusPanel.querySelector('[data-payment-status-note]');
    let paymentStatusRequest = false;
    const checkPaymentStatus = async function () {
      if (paymentStatusRequest || document.hidden) return;
      paymentStatusRequest = true;
      try {
        const response = await fetch(paymentStatusPanel.dataset.paymentStatusUrl, {
          headers: { Accept: 'application/json' },
        });
        if (!response.ok) throw new Error('Payment status request failed');
        const payment = await response.json();
        if (payment.terminal) {
          window.location.reload();
          return;
        }
        if (statusNote) {
          statusNote.textContent = payment.sync_failed
            ? 'Konfirmasi Midtrans tertunda. Sistem akan mencoba lagi otomatis.'
            : 'Status pembayaran diperiksa otomatis.';
        }
      } catch {
        if (statusNote) statusNote.textContent = 'Status belum bisa diperiksa. Sistem akan mencoba lagi otomatis.';
      } finally {
        paymentStatusRequest = false;
      }
    };
    checkPaymentStatus();
    window.setInterval(checkPaymentStatus, 10000);
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
