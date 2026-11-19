import { expect, test } from '@playwright/test';
import path from 'node:path';

const customerEmail = 'order-customer@webia.test';
const customerPassword = 'password123';

async function registerCustomer(page: import('@playwright/test').Page): Promise<void> {
    // /register tak ada lagi; customer dibuat E2ETestSeeder.
    await page.goto('/login');
    await page.getByLabel('Email').fill(customerEmail);
    await page.getByLabel('Kata Sandi').fill(customerPassword);
    await page.getByRole('button', { name: 'Masuk' }).click();
    await expect(page).toHaveURL(/\/dashboard$/);
}

async function login(page: import('@playwright/test').Page, email: string, password: string): Promise<void> {
    await page.goto('/login');
    await page.getByLabel('Email').fill(email);
    await page.getByLabel('Kata Sandi').fill(password);
    await page.getByRole('button', { name: 'Masuk' }).click();
}

async function logout(page: import('@playwright/test').Page): Promise<void> {
    await page.goto('/dashboard');
    await page.getByRole('button', { name: 'Keluar' }).click();
}

test('template checkout opens order form directly and embeds Midtrans without page scroll', async ({ page }) => {
    test.setTimeout(60_000);
    await page.route('**/snap/snap.js', async (route) => {
        await route.fulfill({
            contentType: 'application/javascript',
            body: `window.snap = { embed(token, options) {
                window.__snapToken = token;
                window.__snapEmbedId = options.embedId;
                window.__snapOptions = options;
                window.scrollTo(0, 0);
                document.getElementById(options.embedId).innerHTML = '<div data-testid="snap-payment-methods">Metode pembayaran Midtrans</div>';
            }};`,
        });
    });
    await page.route('**/orders', async (route) => {
        if (route.request().method() !== 'POST') {
            await route.continue();
            return;
        }
        await route.fulfill({
            status: 201,
            contentType: 'application/json',
            body: JSON.stringify({
                order_number: 'WEB-E2E-001',
                email: 'checkout-guest@webia.test',
                status: 'awaiting_payment',
                snap_token: 'snap-e2e-token',
                snap_redirect_url: 'https://app.sandbox.midtrans.com/snap/v4/redirection/test',
                simulate_url: null,
                payment_ready: true,
                payment_status_url: '/orders/999/payment-status?signature=e2e',
                login_url: '/login',
                package_name: 'Website Bisnis Pro',
                addons: [{ name: 'SEO Dasar', price: 150000 }],
                total_price: 2499000,
                expires_at: new Date(Date.now() + 86_400_000).toISOString(),
            }),
        });
    });
    await page.route('**/orders/999/payment-status?signature=e2e', async (route) => {
        await route.fulfill({ json: { status: 'created', terminal: false, sync_failed: false } });
    });
    await page.goto('/webia/koleksi');
    await page.request.get('/orders/create?template=4&category=automotive');

    const orderButton = page.getByRole('button', { name: /Pesan template/ }).first();
    await orderButton.scrollIntoViewIfNeeded();
    await orderButton.click();

    const dialog = page.locator('#webia-order-dialog');
    await expect(page.getByRole('dialog', { name: 'Buat Pesanan' })).toBeVisible();
    await expect(dialog.locator('input[name="package_id"]').first()).toBeVisible({ timeout: 15_000 });
    await expect(page.getByText('Pilih Paket Website')).toHaveCount(0);

    await page.getByLabel('Nama lengkap').fill('Checkout Guest');
    await page.getByLabel('Email').fill('checkout-guest@webia.test');
    await page.locator('input[name="package_id"]').first().check();
    await page.getByRole('button', { name: 'Lanjut ke pembayaran' }).click();
    await expect(page.getByRole('heading', { name: 'Pesanan siap dibayar' })).toBeVisible();
    await expect(dialog.locator('.customer-verify-icon .material-symbols-outlined')).toHaveText('account_balance_wallet');
    await expect(dialog.getByText(/akun WEBIA otomatis dibuat/i)).toHaveCount(0);
    await expect(dialog.getByText('Website Bisnis Pro')).toBeVisible();
    await expect(dialog.getByText('SEO Dasar')).toBeVisible();
    await expect(dialog.locator('[data-payment-panel]').getByText('Rp2.499.000')).toBeVisible();
    await expect(dialog.getByText('Batas waktu bayar')).toBeVisible();
    await expect(page.getByRole('button', { name: 'Bayar sekarang' })).toBeVisible();
    const copyButton = dialog.locator('[data-copy-order]');
    const checkStatusButton = dialog.locator('[data-check-status]');
    await expect(copyButton).toBeVisible();
    await expect(checkStatusButton).toBeVisible();
    await page.evaluate(() => {
        Object.defineProperty(navigator, 'clipboard', {
            configurable: true,
            value: { writeText: (value: string) => { (window as typeof window & { __copiedOrder?: string }).__copiedOrder = value; return Promise.resolve(); } },
        });
    });
    await copyButton.click();
    await expect(copyButton).toHaveAttribute('aria-label', 'Nomor pesanan tersalin');
    await expect(copyButton).toContainText('Tersalin');
    const copyBox = await copyButton.boundingBox();
    expect(copyBox?.height).toBeGreaterThanOrEqual(44);
    expect(await page.evaluate(() => (window as typeof window & { __copiedOrder?: string }).__copiedOrder)).toBe('WEB-E2E-001');

    let statusChecks = 0;
    await page.route('**/orders/999/payment-status?signature=e2e', async (route) => {
        statusChecks++;
        await new Promise((resolve) => setTimeout(resolve, 400));
        await route.fulfill({ json: { status: 'pending', terminal: false, sync_failed: false } });
    });
    await checkStatusButton.click();
    await expect(checkStatusButton).toBeDisabled();
    await expect(checkStatusButton).toContainText('Memeriksa transaksi…');
    await expect(dialog.getByText('Pembayaran sedang diproses')).toBeVisible();
    await expect(checkStatusButton).toBeEnabled();
    expect(statusChecks).toBeGreaterThan(0);

    const scrollBeforePayment = await page.evaluate(() => Math.abs(Number.parseFloat(document.body.style.top)));
    expect(scrollBeforePayment).toBeGreaterThan(0);
    await page.getByRole('button', { name: 'Bayar sekarang' }).click();
    await expect(page.getByTestId('snap-payment-methods')).toBeVisible();
    await expect(dialog.locator('[data-payment-panel]')).toBeHidden();
    const snapPanel = dialog.locator('[data-snap-panel]');
    await expect(snapPanel).toBeVisible();
    await expect(snapPanel.getByText('Rp2.499.000')).toBeVisible();
    await expect(snapPanel.getByText('WEB-E2E-001')).toBeVisible();
    await expect(snapPanel.getByRole('button', { name: /Kembali/ })).toBeVisible();
    await expect(dialog.getByText('PEMBAYARAN AMAN')).toHaveCount(0);
    await expect(dialog.getByRole('heading', { name: 'Pilih metode pembayaran' })).toHaveCount(0);
    await expect(dialog.getByText('Diproses oleh Midtrans')).toHaveCount(0);
    const [dialogBox, snapBox] = await Promise.all([dialog.boundingBox(), snapPanel.boundingBox()]);
    expect(dialogBox).not.toBeNull();
    expect(snapBox).not.toBeNull();
    expect(Math.abs((snapBox!.x + snapBox!.width / 2) - (dialogBox!.x + dialogBox!.width / 2))).toBeLessThan(2);
    const scrollAfterPayment = await page.evaluate(() => Math.abs(Number.parseFloat(document.body.style.top)));
    expect(scrollAfterPayment).toBe(scrollBeforePayment);

    const [embeddedToken, embeddedId] = await page.evaluate(() => [
        (window as typeof window & { __snapToken?: string }).__snapToken ?? '',
        (window as typeof window & { __snapEmbedId?: string }).__snapEmbedId ?? '',
    ]);
    expect(embeddedToken).not.toBe('');
    expect(embeddedId).toBe('webia-snap-container');

    await page.route('**/orders/999/payment-status?signature=e2e', async (route) => {
        await route.fulfill({ json: { status: 'paid', terminal: false, credential_status: 'pending', sync_failed: false } });
    });
    await page.evaluate(() => {
        const snapOptions = (window as typeof window & { __snapOptions?: { onSuccess?: () => void } }).__snapOptions;
        snapOptions?.onSuccess?.();
    });
    await expect(page.getByRole('heading', { name: 'Pembayaran kamu sudah diterima' })).toBeVisible();
    const provisioningStatus = dialog.getByText('Akun WEBIA sedang disiapkan');
    await expect(provisioningStatus).toBeVisible();
    await expect(dialog.getByText(/Proses tetap berjalan jika modal ditutup/)).toBeVisible();
    await expect(dialog.locator('.customer-verify-icon .material-symbols-outlined')).toHaveText('manage_accounts');
    expect(await provisioningStatus.evaluate((element) => Number.parseFloat(getComputedStyle(element).fontSize))).toBeGreaterThanOrEqual(20);
    await expect(snapPanel).toBeHidden();
    const closeButton = dialog.getByRole('button', { name: 'Tutup' }).first();
    await expect(closeButton).toBeEnabled();
    await expect(page.getByRole('button', { name: 'Periksa status pembayaran' })).toBeHidden();
    await page.setViewportSize({ width: 320, height: 700 });
    expect(await page.evaluate(() => document.documentElement.scrollWidth)).toBeLessThanOrEqual(320);

    await page.route('**/orders/999/payment-status?signature=e2e', async (route) => {
        await route.fulfill({ json: { status: 'paid', terminal: true, credential_status: 'sent', email: 'checkout-guest@webia.test', sync_failed: false } });
    });
    await page.evaluate(() => {
        const snapOptions = (window as typeof window & { __snapOptions?: { onSuccess?: () => void } }).__snapOptions;
        snapOptions?.onSuccess?.();
    });
    await expect(dialog.getByText('Akun siap & kredensial terkirim')).toBeVisible();
    await expect(dialog.getByText('checkout-guest@webia.test')).toBeVisible();
    await expect(dialog.locator('.customer-verify-icon .material-symbols-outlined')).toHaveText('verified');
    await expect(closeButton).toBeEnabled();

    await closeButton.click();
    await expect(dialog).toBeHidden();
    await expect.poll(() => page.evaluate((expectedScrollY) => Math.abs(window.scrollY - expectedScrollY), scrollBeforePayment)).toBeLessThanOrEqual(1);
});

test('customer order can be rejected, reuploaded, and approved by admin', async ({ page }) => {
    test.setTimeout(60_000);
    await registerCustomer(page);

    await page.goto('/orders/create?package=pixel');
    await expect(page.locator('input[name="package_id"]').first()).toBeChecked();
    await page.getByRole('button', { name: 'Lanjut ke pembayaran' }).click();

    await expect(page.getByRole('heading', { name: 'Pixel' })).toBeVisible();
    const orderId = new URL(page.url()).pathname.split('/').pop() as string;
    await page.getByLabel(/Bukti transfer/).setInputFiles(path.join(process.cwd(), 'tests', 'E2E', 'fixtures', 'receipt.png'));
    await page.getByLabel('Catatan (opsional)').fill('Transfer test Playwright.');
    await page.getByRole('button', { name: 'Kirim bukti' }).click();
    await expect(page.getByRole('heading', { name: 'Menunggu verifikasi' })).toBeVisible();

    await logout(page);
    await login(page, 'admin@webia.test', 'password');
    await page.goto(`/admin/orders/${orderId}`);
    await expect(page.getByText('Transfer test Playwright.')).toBeVisible();
    await page.getByLabel('Catatan').fill('Bukti kurang jelas.');
    await page.getByRole('button', { name: 'Tolak pembayaran' }).click();

    await logout(page);
    await login(page, customerEmail, customerPassword);
    await page.goto('/orders');
    await page.getByRole('link', { name: 'Lihat detail' }).click();
    await expect(page.getByText('Bukti kurang jelas.')).toBeVisible();
    await page.getByLabel(/Bukti transfer/).setInputFiles(path.join(process.cwd(), 'tests', 'E2E', 'fixtures', 'receipt.png'));
    await page.getByRole('button', { name: 'Kirim bukti' }).click();

    await logout(page);
    await login(page, 'admin@webia.test', 'password');
    await page.goto(`/admin/orders/${orderId}`);
    await page.getByRole('button', { name: 'Terima pembayaran' }).click();
    await expect(page.getByText('Lunas', { exact: true }).first()).toBeVisible();
});
