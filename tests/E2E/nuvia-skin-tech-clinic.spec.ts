import { expect, test } from '@playwright/test';

test('Nuvia demo switches between dark and bright themes', async ({ page }) => {
    await page.goto('/webia/template/nuvia-skin-tech-clinic');

    const themeToggle = page.getByRole('button', { name: 'Aktifkan bright mode' });
    await expect(page.locator('html')).toHaveAttribute('data-theme', 'dark');
    await expect(themeToggle).toHaveAttribute('aria-pressed', 'false');

    await themeToggle.click();
    await expect(page.locator('html')).toHaveAttribute('data-theme', 'bright');
    await expect(page.getByRole('button', { name: 'Aktifkan dark mode' })).toHaveAttribute('aria-pressed', 'true');

    await page.getByRole('button', { name: 'Aktifkan dark mode' }).click();
    await expect(page.locator('html')).toHaveAttribute('data-theme', 'dark');
});

test('Nuvia appears when Beauty and Beauty Clinic filters are selected', async ({ page }) => {
    await page.goto('/webia/koleksi');

    const nuviaCard = page.locator('.webia-gallery-card').filter({ hasText: 'NUVIA Skin Tech Clinic' });

    await page.locator('#webia-category-options label').filter({ hasText: 'Beauty' }).locator('input').check();
    await page.locator('#webia-subcategory-options label').filter({ hasText: 'Beauty Clinic' }).locator('input').check();

    await expect(nuviaCard).toBeVisible();
});
