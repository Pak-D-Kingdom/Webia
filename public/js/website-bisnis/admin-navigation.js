document.addEventListener('DOMContentLoaded', () => {
  const adminPath = (url) => url.pathname === '/admin' || url.pathname.startsWith('/admin/');
  const main = document.getElementById('main-content');
  const sidebar = document.querySelector('[data-admin-sidebar]');
  const sidebarToggle = document.querySelector('[data-sidebar-toggle]');
  const sidebarScrim = document.querySelector('[data-sidebar-scrim]');
  let pendingRequest;

  if (!main) return;

  function isAjaxLink(event, link) {
    if (event.defaultPrevented || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return false;
    if (link.target && link.target !== '_self') return false;
    if (link.hasAttribute('download') || link.hasAttribute('data-admin-native')) return false;

    const url = new URL(link.href, location.href);
    return url.origin === location.origin && adminPath(url) && !url.pathname.endsWith('/receipt');
  }

  function setLoading(loading) {
    main.toggleAttribute('aria-busy', loading);
    main.style.opacity = loading ? '0.55' : '';
    main.style.pointerEvents = loading ? 'none' : '';
  }

  function closeSidebar() {
    sidebar?.classList.remove('translate-x-0');
    sidebar?.classList.add('-translate-x-full');
    sidebarToggle?.setAttribute('aria-expanded', 'false');
    if (sidebarScrim) {
      sidebarScrim.style.display = 'none';
      sidebarScrim.classList.remove('opacity-100', 'pointer-events-auto');
    }
  }

  async function navigate(url, push = true) {
    pendingRequest?.abort();
    const request = new AbortController();
    pendingRequest = request;
    setLoading(true);

    try {
      const response = await fetch(url, {
        headers: {
          Accept: 'text/html',
          'X-Requested-With': 'XMLHttpRequest',
        },
        signal: request.signal,
      });
      const finalUrl = new URL(response.url);

      if (!response.ok || !adminPath(finalUrl)) {
        location.assign(response.url || url);
        return;
      }

      const nextDocument = new DOMParser().parseFromString(await response.text(), 'text/html');
      const nextMain = nextDocument.getElementById('main-content');
      const currentNav = document.querySelector('nav[aria-label="Navigasi admin"]');
      const nextNav = nextDocument.querySelector('nav[aria-label="Navigasi admin"]');
      const currentPageTitle = document.getElementById('admin-page-title');
      const nextPageTitle = nextDocument.getElementById('admin-page-title');

      if (!nextMain || !currentNav || !nextNav || !currentPageTitle || !nextPageTitle) {
        location.assign(response.url || url);
        return;
      }

      main.innerHTML = nextMain.innerHTML;
      currentNav.innerHTML = nextNav.innerHTML;
      currentPageTitle.textContent = nextPageTitle.textContent;
      document.title = nextDocument.title;

      if (push) history.pushState({}, '', finalUrl);
      document.dispatchEvent(new CustomEvent('admin:navigated'));
      closeSidebar();
      main.focus({ preventScroll: true });
      window.scrollTo({ top: 0, behavior: 'auto' });
    } catch (error) {
      if (error.name !== 'AbortError') location.assign(url);
    } finally {
      if (pendingRequest === request) {
        pendingRequest = undefined;
        setLoading(false);
      }
    }
  }

  document.addEventListener('click', (event) => {
    const link = event.target.closest('a[href]');
    if (!link || !isAjaxLink(event, link)) return;

    event.preventDefault();
    navigate(link.href);
  });

  window.addEventListener('popstate', () => {
    if (adminPath(new URL(location.href))) navigate(location.href, false);
  });
});
