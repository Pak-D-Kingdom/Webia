import { expect, test } from '@playwright/test';
import path from 'node:path';

const customerEmail = 'business-customer@webia.test';
const customerPassword = 'password123';

async function logout(page: import('@playwright/test').Page): Promise<void> {
    await page.goto('/dashboard');
    await page.getByRole('button', { name: 'Keluar' }).click();
}

async function login(page: import('@playwright/test').Page, email: string, password: string): Promise<void> {
    await page.goto('/login');
    await page.getByLabel('Email').fill(email);
    await page.getByLabel('Password').fill(password);
    await page.getByRole('button', { name: 'Masuk' }).click();
}

test('paid order collects business data and tracks delivery progress', async ({ page }) => {
    test.setTimeout(90_000);

    await page.goto('/register');
    await page.getByLabel('Nama').fill('Business Customer');
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

    await page.getByLabel(/Bukti transfer/).setInputFiles(path.join(process.cwd(), 'tests', 'E2E', 'fixtures', 'receipt.png'));
    await page.getByRole('button', { name: 'Kirim bukti' }).click();
    await expect(page.getByRole('heading', { name: 'Menunggu verifikasi' })).toBeVisible();

    await logout(page);
    await login(page, 'admin@webia.test', 'password');
    await page.goto(`/admin/orders/${orderId}`);
    await page.getByRole('button', { name: 'Terima pembayaran' }).click();
    await expect(page.getByText('Status pembayaran berhasil diperbarui.')).toBeVisible();

    await logout(page);
    await login(page, customerEmail, customerPassword);
    await page.goto(`/orders/${orderId}`);
    await expect(page.getByRole('heading', { name: 'Data bisnis', exact: true })).toBeVisible();

    await page.getByLabel('Nama usaha').fill('Salon Ayu Test');
    await page.getByLabel('Nomor WhatsApp (opsional)').fill('+62 812-0000-0000');
    await page.getByLabel('Deskripsi usaha (opsional)').fill('Nail art home service test.');
    await page.getByRole('button', { name: 'Simpan data bisnis' }).click();
    await expect(page.getByText('Data bisnis berhasil disimpan.')).toBeVisible();
    await expect(page.getByText('Salon Ayu Test')).toBeVisible();
    await expect(page.locator('.order-steps li[aria-current="step"]')).toHaveText(/Dibayar/);

    await logout(page);
    await login(page, 'admin@webia.test', 'password');
    await page.goto(`/admin/orders/${orderId}`);
    await expect(page.getByText('Salon Ayu Test')).toBeVisible();
    await page.getByRole('button', { name: 'Mulai kerjakan' }).click();
    await expect(page.getByRole('button', { name: 'Tandai selesai' })).toBeVisible();
    await page.getByRole('button', { name: 'Tandai selesai' }).click();
    await expect(page.getByText('Progres pengerjaan berhasil diperbarui.')).toBeVisible();
    await expect(page.locator('p:has-text("Status pengerjaan:")')).toContainText('Delivered');
    await expect(page.getByRole('button', { name: 'Tandai selesai' })).toBeHidden();
});
