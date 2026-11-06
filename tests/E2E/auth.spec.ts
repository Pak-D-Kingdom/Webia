import { expect, test } from '@playwright/test';

const customerEmail = 'customer@webia.test';
const customerPassword = 'password123';

test('customer can register, log out, reject wrong password, and log in', async ({ page }) => {
    await page.goto('/register');
    await page.getByLabel('Nama').fill('Customer WEBIA');
    await page.getByLabel('Email').fill(customerEmail);
    await page.getByLabel('Password', { exact: true }).fill(customerPassword);
    await page.getByLabel('Ulangi password').fill(customerPassword);
    await page.getByRole('button', { name: 'Buat akun' }).click();

    await expect(page).toHaveURL(/\/dashboard$/);
    await expect(page.getByRole('heading', { name: 'Halo, Customer WEBIA' })).toBeVisible();

    await page.getByRole('button', { name: 'Keluar' }).click();
    await expect(page).toHaveURL(/\/$/);

    await page.goto('/login');
    await page.getByLabel('Email').fill(customerEmail);
    await page.getByLabel('Password').fill('wrong-password');
    await page.getByRole('button', { name: 'Masuk' }).click();
    await expect(page.getByText('Email atau password tidak sesuai.')).toBeVisible();

    await page.getByLabel('Password').fill(customerPassword);
    await page.getByRole('button', { name: 'Masuk' }).click();
    await expect(page).toHaveURL(/\/dashboard$/);
});
