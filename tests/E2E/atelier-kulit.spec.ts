import { expect, test } from '@playwright/test';

test('Atelier Kulit skin composer and appointment links respond to changes', async ({ page }) => {
    await page.goto('/webia/template/atelier-kulit-creative-beauty-clinic');

    await expect(page.locator('#v1')).toHaveText('50');
    await expect(page.locator('#v2')).toHaveText('50');
    await expect(page.locator('#v3')).toHaveText('50');
    await expect(page.locator('#cb')).toHaveAttribute('rel', 'noopener noreferrer');

    await page.locator('#r1').evaluate((element: HTMLInputElement) => {
        element.value = '80';
        element.dispatchEvent(new Event('input', { bubbles: true }));
    });
    await expect(page.locator('#v1')).toHaveText('80');

    await page.locator('#nm').fill('Ayu');
    await page.locator('#ts').selectOption('Hydra Facial');
    await expect(page.locator('#sb')).toHaveAttribute('rel', 'noopener noreferrer');
    await expect(page.locator('#sb')).toHaveAttribute('href', /Ayu/);
});

test('Atelier Kulit chatbot renders user content as text', async ({ page }) => {
    let dialogOpened = false;
    page.on('dialog', async (dialog) => {
        dialogOpened = true;
        await dialog.accept();
    });

    await page.goto('/webia/template/atelier-kulit-creative-beauty-clinic');
    await page.locator('#fab').click();

    const userInput = '<img src=x onerror=alert(1)>';
    await page.locator('#ci').fill(userInput);
    await page.locator('#cf button').click();

    const userMessage = page.locator('#msgs .m.u').last();
    await expect(userMessage).toHaveText(userInput);
    await expect(userMessage.locator('img')).toHaveCount(0);
    expect(dialogOpened).toBe(false);
    await expect(page.locator('#wa')).toHaveAttribute('rel', 'noopener noreferrer');
});

test('Atelier Kulit appears when Beauty and Beauty Clinic filters are selected', async ({ page }) => {
    await page.goto('/webia/koleksi');

    const atelierCard = page.locator('.webia-gallery-card').filter({ hasText: 'Atelier Kulit — Creative Beauty Clinic' });

    await page.locator('#webia-category-options input[value="beauty"]').evaluate((input: HTMLInputElement) => input.click());
    await page.locator('#webia-subcategory-options label').filter({ hasText: 'Beauty Clinic' }).locator('input').evaluate((input: HTMLInputElement) => input.click());

    await expect(atelierCard).toBeVisible();
});
