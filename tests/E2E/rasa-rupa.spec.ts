import { expect, test } from '@playwright/test';

test('Rasa Rupa menu renders products and opens WhatsApp safely', async ({ page }) => {
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
    await page.goto('/webia/template/rasa-rupa-artistik');

    const products = page.locator('#grid .card');
    await expect(products).toHaveCount(4);
    await expect(products.nth(0)).toContainText('Sambal Matah Api');
    await expect(products.nth(1)).toContainText('Kopi Tubruk Kintamani');
    await expect(products.nth(2)).toContainText('Tempe Emas Crispy');
    await expect(products.nth(3)).toContainText('Bumbu Rendang Pusaka');

    await page.locator('#fab').click({ force: true });
    await expect(page.locator('#box')).toHaveClass(/on/);
    await page.locator('#fab').click({ force: true });
    await expect(page.locator('#box')).not.toHaveClass(/on/);

    await products.nth(0).getByRole('link', { name: 'Pesan' }).click({ force: true });

    const openedWhatsApp = JSON.parse(await page.evaluate(() => window.name));
    expect(openedWhatsApp.url).toMatch(/^https:\/\/wa\.me\/6281234567890\?/);
    expect(openedWhatsApp.target).toBe('_blank');
    expect(openedWhatsApp.features).toBe('noopener,noreferrer');
    await expect(page.locator('#box')).not.toHaveClass(/on/);
});

test('Rasa Rupa assistant displays user messages as text, not markup', async ({ page }) => {
    let dialogOpened = false;
    page.on('dialog', async (dialog) => {
        dialogOpened = true;
        await dialog.accept();
    });

    await page.emulateMedia({ reducedMotion: 'reduce' });
    await page.goto('/webia/template/rasa-rupa-artistik');
    await page.locator('#fab').click({ force: true });

    const userInput = '<img src=x onerror=alert(1)>';
    await page.locator('#in').fill(userInput);
    await page.locator('#f').evaluate((form: HTMLFormElement) => form.requestSubmit());

    const userMessage = page.locator('#log .m.u').last();
    await expect(userMessage).toHaveText(userInput);
    await expect(userMessage.locator('img')).toHaveCount(0);
    expect(dialogOpened).toBe(false);
});

test('Rasa Rupa appears when F&B and Food Product filters are selected', async ({ page }) => {
    await page.emulateMedia({ reducedMotion: 'reduce' });
    await page.goto('/webia/koleksi');

    const rasaRupaCard = page.locator('.webia-template-card[data-template-url="/webia/template/rasa-rupa-artistik"]');

    await page.locator('#webia-category-options input[value="fnb"]').evaluate((input: HTMLInputElement) => input.click());
    await page.locator('#webia-subcategory-options label')
        .filter({ hasText: 'Food Product' })
        .locator('input')
        .evaluate((input: HTMLInputElement) => input.click());

    await expect(rasaRupaCard).toBeVisible();
});
