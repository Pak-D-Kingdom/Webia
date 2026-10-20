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
