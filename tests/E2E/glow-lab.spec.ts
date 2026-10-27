import { expect, test } from '@playwright/test';

test('Glow Lab ritual builder and before-and-after slider respond to input', async ({ page }) => {
    await page.goto('/webia/template/glow-lab-creative-beauty-clinic');

    await expect(page.locator('#tt')).toHaveText('Rp 0');
    await page.getByRole('button', { name: /Deep Cleanse Facial/ }).click();
    await page.getByRole('button', { name: /Acne Clear Session/ }).click();
    await page.getByRole('button', { name: /LED Glow Mask/ }).click();
    await page.locator('#kd').check();

    await expect(page.locator('#tt')).toHaveText('Rp 1.000.000');
    await expect(page.locator('#rb')).toHaveAttribute('rel', 'noopener noreferrer');
    await expect(page.locator('#rb')).toHaveAttribute('href', /wa\.me\/6281234567890/);

    await page.locator('#rg').evaluate((element: HTMLInputElement) => {
        element.value = '75';
        element.dispatchEvent(new Event('input', { bubbles: true }));
    });
    await expect(page.locator('#gw')).toHaveCSS('--p', '75%');
});

test('Glow Lab chatbot renders free-text messages without interpreting HTML', async ({ page }) => {
    let dialogOpened = false;
    page.on('dialog', async (dialog) => {
        dialogOpened = true;
        await dialog.accept();
    });

    await page.goto('/webia/template/glow-lab-creative-beauty-clinic');
    await page.locator('#fab').click();

    const userInput = '<img src=x onerror=alert(1)>';
    await page.locator('#ci').fill(userInput);
    await page.locator('#cf button').click();

    const userMessage = page.locator('#msgs .m.u').last();
    await expect(userMessage).toHaveText(userInput);
    await expect(userMessage.locator('img')).toHaveCount(0);
    expect(dialogOpened).toBe(false);
});

test('Glow Lab appears when Beauty and Beauty Clinic filters are selected', async ({ page }) => {
    await page.goto('/webia/koleksi');

    const glowLabCard = page.locator('.webia-gallery-card').filter({ hasText: 'GLOW LAB — Creative Beauty Clinic' });

    await page.locator('#webia-category-options label').filter({ hasText: 'Beauty' }).locator('input').check();
    await page.locator('#webia-subcategory-options label').filter({ hasText: 'Beauty Clinic' }).locator('input').check();

    await expect(glowLabCard).toBeVisible();
});
