import { expect, test } from '@playwright/test';

test('admin menu changes content without a full page reload and supports browser history', async ({ page }) => {
    const consoleErrors: string[] = [];
    page.on('console', (message) => {
        if (message.type() === 'error') {
            consoleErrors.push(message.text());
        }
    });

    await page.goto('/login');
    await page.getByLabel('Email').fill('admin@webia.test');
    await page.getByLabel('Kata Sandi').fill('password');
    await page.getByRole('button', { name: 'Masuk' }).click();
    await page.goto('/admin');

    await expect(page.getByText('Ctrl K', { exact: true })).toBeVisible();
    await page.keyboard.press('Control+K');
    await expect(page.getByPlaceholder('Cari pesanan, invoice, atau pelanggan...')).toBeFocused();

    await page.evaluate(() => {
        window.name = 'admin-ajax-navigation';
        document.documentElement.dataset.navigationSentinel = 'alive';
    });

    const adminNav = page.getByRole('navigation', { name: 'Navigasi admin' });
    await adminNav.getByRole('link', { name: /Pesanan/ }).click();

    await expect(page).toHaveURL(/\/admin\/orders$/);
    await expect(page.getByRole('heading', { name: 'Daftar Pesanan' })).toBeVisible();
    await expect(page.locator('html')).toHaveAttribute('data-navigation-sentinel', 'alive');
    await expect(adminNav.getByRole('link', { name: /Pesanan/ })).toHaveAttribute('aria-current', 'page');

    await adminNav.getByRole('link', { name: /Paket/ }).click();
    await expect(page).toHaveURL(/\/admin\/packages$/);
    await expect(page.getByRole('heading', { name: 'Paket Lisensi' })).toBeVisible();
    await expect(page.locator('html')).toHaveAttribute('data-navigation-sentinel', 'alive');

    await page.getByRole('link', { name: 'Tambah paket' }).click();
    await expect(page).toHaveURL(/\/admin\/packages\/create$/);
    await expect(page.getByRole('heading', { name: 'Tambah paket' })).toBeVisible();
    await page.goBack();
    await expect(page).toHaveURL(/\/admin\/packages$/);

    await adminNav.getByRole('link', { name: /Add-on/ }).click();
    await expect(page).toHaveURL(/\/admin\/addons$/);
    await expect(page.getByRole('heading', { name: 'Add-on Layanan' })).toBeVisible();

    await adminNav.getByRole('link', { name: 'Dashboard' }).click();
    await expect(page).toHaveURL(/\/admin$/);
    await expect(page.getByRole('heading', { name: 'Dashboard Operasional' })).toBeVisible();
    await page.getByRole('button', { name: 'Volume Pesanan' }).click();
    await expect(page.locator('[data-chart="volume"]')).toBeVisible();

    await page.goBack();
    await expect(page).toHaveURL(/\/admin\/addons$/);
    await expect(page.getByRole('heading', { name: 'Add-on Layanan' })).toBeVisible();
    await page.goForward();
    await expect(page).toHaveURL(/\/admin$/);
    await expect(page.getByRole('heading', { name: 'Dashboard Operasional' })).toBeVisible();
    await expect(page.locator('#main-content')).toBeFocused();
    await page.getByRole('button', { name: 'Volume Pesanan' }).click();
    await expect(page.locator('[data-chart="volume"]')).toBeVisible();
    await expect(page.locator('html')).toHaveAttribute('data-navigation-sentinel', 'alive');

    await page.setViewportSize({ width: 390, height: 844 });
    await page.getByRole('button', { name: 'Buka navigasi' }).click();
    await expect(page.getByRole('button', { name: 'Buka navigasi' })).toHaveAttribute('aria-expanded', 'true');
    await adminNav.getByRole('link', { name: /Pesanan/ }).click();
    await expect(page).toHaveURL(/\/admin\/orders$/);
    await expect(page.getByRole('button', { name: 'Buka navigasi' })).toHaveAttribute('aria-expanded', 'false');
    await expect(page.locator('[data-admin-sidebar]')).toHaveClass(/(?:^|\s)-translate-x-full(?:\s|$)/);
    await expect(page.locator('[data-sidebar-scrim]')).toHaveCSS('display', 'none');
    expect(consoleErrors).toEqual([]);
});
