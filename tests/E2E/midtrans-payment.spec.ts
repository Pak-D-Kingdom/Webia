import { expect, test } from '@playwright/test';

const customerEmail = 'midtrans-customer@webia.test';
const customerPassword = 'password123';

test('customer pays an order via the Midtrans simulation page', async ({ page }) => {
    test.setTimeout(60_000);

    await page.goto('/register');
    await page.getByLabel('Nama').fill('Midtrans Customer');
    await page.getByLabel('Email').fill(customerEmail);
    await page.getByLabel('Password', { exact: true }).fill(customerPassword);
    await page.getByLabel('Ulangi password').fill(customerPassword);
    await page.getByRole('button', { name: 'Buat akun' }).click();
    await expect(page).toHaveURL(/\/dashboard$/);

    await page.goto('/orders/create?package=pixel');
    await page.getByLabel('Kategori bisnis (opsional)').fill('beauty');
    await page.getByRole('button', { name: 'Lanjut ke pembayaran' }).click();

    await expect(page.getByRole('heading', { name: 'Pixel' })).toBeVisible();
    const orderId = new URL(page.url()).pathname.split('/').pop() as string;

    // Tanpa kredensial Midtrans di lingkungan E2E, pembayaran menggunakan halaman simulasi lokal.
    await page.getByRole('button', { name: 'Bayar via Midtrans' }).click();
    await expect(page.getByRole('heading', { name: 'Simulasi pembayaran Midtrans' })).toBeVisible();

    await page.getByRole('button', { name: 'Selesaikan pembayaran (simulasi)' }).click();
    await expect(page.getByText('Pembayaran simulasi berhasil dikonfirmasi.')).toBeVisible();
    await expect(page.locator('.order-steps li[aria-current="step"]')).toHaveText(/Dibayar/);

    await page.goto(`/orders/${orderId}`);
    await expect(page.getByRole('heading', { name: 'Data bisnis', exact: true })).toBeVisible();
    await expect(page.locator('.order-summary')).toContainText('Paid');
});
