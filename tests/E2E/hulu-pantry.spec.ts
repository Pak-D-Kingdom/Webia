import { expect, test } from '@playwright/test';

test('Hulu catalog adds products to the cart and opens a safe WhatsApp order', async ({ page }) => {
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
    await page.goto('/webia/template/hulu-pantry-asal-usul');

    const products = page.locator('#list .row');
    await expect(products).toHaveCount(4);
    await expect(products.nth(0)).toContainText('Madu Hutan');
    await expect(products.nth(1)).toContainText('Vanili Flores');
    await expect(products.nth(2)).toContainText('Garam Madura');
    await expect(products.nth(3)).toContainText('Gula Aren');

    await products.nth(0).locator('[data-add="madu"]').click({ force: true });
    await products.nth(0).locator('[data-add="madu"]').click({ force: true });
    await expect(products.nth(0).locator('.add')).toHaveText('2 dipilih');
    await expect(page.locator('#bar')).toContainText('2 item');
    await expect(page.locator('#bt')).toContainText('Rp330.000');
    await page.locator('#go').click({ force: true });

    const openedWhatsApp = JSON.parse(await page.evaluate(() => window.name));
    expect(openedWhatsApp.url).toMatch(/^https:\/\/wa\.me\/6281234567890\?/);
    expect(openedWhatsApp.url).toContain(encodeURIComponent('2 × Madu Hutan'));
    expect(openedWhatsApp.url).toContain(encodeURIComponent('Rp330.000'));
    expect(openedWhatsApp.target).toBe('_blank');
    expect(openedWhatsApp.features).toBe('noopener,noreferrer');
});

test('Hulu concierge renders free text safely and can open WhatsApp without replacing the chat', async ({ page }) => {
    let dialogOpened = false;
    page.on('dialog', async (dialog) => {
        dialogOpened = true;
        await dialog.accept();
    });
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
    await page.goto('/webia/template/hulu-pantry-asal-usul');
    await page.locator('#fab').click({ force: true });

    const userInput = '<img src=x onerror=alert(1)>';
    await page.locator('#in').fill(userInput);
    await page.locator('#f').evaluate((form: HTMLFormElement) => form.requestSubmit());

    const userMessage = page.locator('#log .m.u').last();
    await expect(userMessage).toHaveText(userInput);
    await expect(userMessage.locator('img')).toHaveCount(0);
    expect(dialogOpened).toBe(false);

    await page.locator('#toWA').click({ force: true });

    const openedWhatsApp = JSON.parse(await page.evaluate(() => window.name));
    expect(openedWhatsApp.url).toMatch(/^https:\/\/wa\.me\/6281234567890\?/);
    expect(openedWhatsApp.features).toBe('noopener,noreferrer');
    await expect(page.locator('#box')).toHaveClass(/on/);
});

test('Hulu appears when F&B and Food Product filters are selected', async ({ page }) => {
    await page.emulateMedia({ reducedMotion: 'reduce' });
    await page.goto('/webia/koleksi');

    const huluCard = page.locator('.webia-template-card[data-template-url="/webia/template/hulu-pantry-asal-usul"]');

    await page.locator('#webia-category-options input[value="fnb"]').evaluate((input: HTMLInputElement) => input.click());
    await page.locator('#webia-subcategory-options label')
        .filter({ hasText: 'Food Product' })
        .locator('input')
        .evaluate((input: HTMLInputElement) => input.click());

    await expect(huluCard).toBeVisible();
});
