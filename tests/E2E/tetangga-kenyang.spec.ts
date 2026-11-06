import { expect, test } from '@playwright/test';

test('Tetangga Kenyang cart updates quantities and sends an encoded WhatsApp order safely', async ({ page }) => {
    await page.addInitScript(() => {
        window.name = '';
        window.open = (url, target, features) => {
            window.name = JSON.stringify({
                url: String(url),
                target,
                features,
            });
            return null;
        };
    });
    await page.emulateMedia({ reducedMotion: 'reduce' });
    await page.goto('/webia/template/tetangga-kenyang-friendly');

    const products = page.locator('#grid .card');
    await expect(products).toHaveCount(4);
    await expect(products.nth(0)).toContainText('Dimsum Ayam Udang');
    await expect(products.nth(1)).toContainText('Bakso Aci Pedas');
    await expect(products.nth(2)).toContainText('Sambal Bawang Mama');
    await expect(products.nth(3)).toContainText('Brownies Kukus Lumer');

    await products.nth(0).getByRole('button', { name: 'Tambah Dimsum Ayam Udang' }).click();
    await products.nth(0).getByRole('button', { name: 'Tambah Dimsum Ayam Udang' }).click();
    await expect(page.locator('#cnt')).toHaveText('2');
    await page.locator('#cartBtn').click();
    await expect(page.locator('#dr')).toHaveClass(/on/);
    await expect(page.locator('#lines')).toContainText('2× Dimsum Ayam Udang');
    await expect(page.locator('#lines')).toContainText('Rp90.000');

    const unsafeName = '<script>alert(1)</script>';
    const unsafeAddress = '<img src=x onerror=alert(1)>';
    await page.locator('#nm').fill(unsafeName);
    await page.locator('#ad').fill(unsafeAddress);
    await page.locator('#go').click();

    const openedWhatsApp = JSON.parse(await page.evaluate(() => window.name));
    expect(openedWhatsApp.url).toMatch(/^https:\/\/wa\.me\/6281234567890\?/);
    expect(openedWhatsApp.url).toContain(encodeURIComponent(unsafeName));
    expect(openedWhatsApp.url).toContain(encodeURIComponent(unsafeAddress));
    expect(openedWhatsApp.target).toBe('_blank');
    expect(openedWhatsApp.features).toBe('noopener,noreferrer');
    await expect(page.locator('#dr')).toHaveClass(/on/);
    await expect(page.locator('#lines img, #lines script')).toHaveCount(0);
});

test('Tetangga Kenyang assistant displays free-text messages as text', async ({ page }) => {
    let dialogOpened = false;
    page.on('dialog', async (dialog) => {
        dialogOpened = true;
        await dialog.accept();
    });

    await page.emulateMedia({ reducedMotion: 'reduce' });
    await page.goto('/webia/template/tetangga-kenyang-friendly');
    await page.locator('#fab').click({ force: true });

    const userInput = '<img src=x onerror=alert(1)>';
    await page.locator('#in').fill(userInput);
    await page.locator('#f').evaluate((form: HTMLFormElement) => form.requestSubmit());

    const userMessage = page.locator('#log .m.u').last();
    await expect(userMessage).toHaveText(userInput);
    await expect(userMessage.locator('img')).toHaveCount(0);
    expect(dialogOpened).toBe(false);
});

test('Tetangga Kenyang appears when F&B and Food Product filters are selected', async ({ page }) => {
    await page.emulateMedia({ reducedMotion: 'reduce' });
    await page.goto('/webia/koleksi');

    const templateCard = page.locator('.webia-template-card[data-template-url="/webia/template/tetangga-kenyang-friendly"]');

    await page.locator('#webia-category-options input[value="fnb"]').evaluate((input: HTMLInputElement) => input.click());
    await page.locator('#webia-subcategory-options label')
        .filter({ hasText: 'Food Product' })
        .locator('input')
        .evaluate((input: HTMLInputElement) => input.click());

    await expect(templateCard).toBeVisible();
});
