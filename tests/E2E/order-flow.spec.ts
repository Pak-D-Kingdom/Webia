import { expect, test } from '@playwright/test';
import path from 'node:path';

const customerEmail = 'order-customer@webia.test';
const customerPassword = 'password123';

async function registerCustomer(page: import('@playwright/test').Page): Promise<void> {
    await page.goto('/register');
    await page.getByLabel('Nama').fill('Order Customer');
    await page.getByLabel('Email').fill(customerEmail);
    await page.getByLabel('Password', { exact: true }).fill(customerPassword);
    await page.getByLabel('Ulangi password').fill(customerPassword);
    await page.getByRole('button', { name: 'Buat akun' }).click();
    await expect(page).toHaveURL(/\/dashboard$/);
}

async function login(page: import('@playwright/test').Page, email: string, password: string): Promise<void> {
    await page.goto('/login');
    await page.getByLabel('Email').fill(email);
    await page.getByLabel('Password').fill(password);
    await page.getByRole('button', { name: 'Masuk' }).click();
}

async function logout(page: import('@playwright/test').Page): Promise<void> {
    await page.goto('/dashboard');
    await page.getByRole('button', { name: 'Keluar' }).click();
}

test('template checkout opens order form directly and embeds Midtrans without page scroll', async ({ page }) => {
    await page.route('**/snap/snap.js', async (route) => {
        await route.fulfill({
            contentType: 'application/javascript',
            body: `window.snap = { embed(token, options) {
                window.__snapToken = token;
                window.__snapEmbedId = options.embedId;
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
            }),
        });
    });
    await page.route('**/orders/999/payment-status?signature=e2e', async (route) => {
        await route.fulfill({ json: { status: 'created', terminal: false, sync_failed: false } });
    });
    await page.goto('/webia/koleksi');

    const orderButton = page.getByRole('button', { name: /Pesan template/ }).first();
    await orderButton.scrollIntoViewIfNeeded();
    await orderButton.click();

    const dialog = page.getByRole('dialog', { name: 'Buat Pesanan' });
    await expect(dialog).toBeVisible();
    await expect(dialog.locator('input[name="package_id"]').first()).toBeVisible();
    await expect(page.getByText('Pilih Paket Website')).toHaveCount(0);

    await page.getByLabel('Nama lengkap').fill('Checkout Guest');
    await page.getByLabel('Email').fill('checkout-guest@webia.test');
    await page.locator('input[name="package_id"]').first().check();
    await page.getByRole('button', { name: 'Lanjut ke pembayaran' }).click();
    await expect(page.getByRole('button', { name: 'Bayar sekarang' })).toBeVisible();

    const scrollBeforePayment = await page.evaluate(() => window.scrollY);
    await page.getByRole('button', { name: 'Bayar sekarang' }).click();
    await expect(page.getByTestId('snap-payment-methods')).toBeVisible();
    const scrollAfterPayment = await page.evaluate(() => window.scrollY);
    expect(scrollAfterPayment).toBe(scrollBeforePayment);

    const [embeddedToken, embeddedId] = await page.evaluate(() => [
        (window as typeof window & { __snapToken?: string }).__snapToken ?? '',
        (window as typeof window & { __snapEmbedId?: string }).__snapEmbedId ?? '',
    ]);
    expect(embeddedToken).not.toBe('');
    expect(embeddedId).toBe('webia-snap-container');
});

test('customer order can be rejected, reuploaded, and approved by admin', async ({ page }) => {
    test.setTimeout(60_000);
    await registerCustomer(page);

    await page.goto('/orders/create?package=pixel');
    await expect(page.getByLabel('Paket website')).toHaveValue(/.+/);
    await page.getByLabel('Kategori bisnis (opsional)').fill('beauty');
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
    await expect(page.getByText('paid', { exact: true })).toBeVisible();
});
