import { expect, test } from '@playwright/test';

test('Voltrix configurator updates the estimate and resets the build', async ({ page }) => {
    await page.goto('/webia/template/voltrix-futuristic-automotive');

    await expect(page.locator('#tt')).toHaveText('Rp 12.000.000');
    await page.locator('#gr [data-k="col"][data-i="1"]').click();
    await expect(page.locator('#tt')).toHaveText('Rp 24.000.000');
    await expect(page.locator('#sb')).toHaveAttribute('rel', 'noopener noreferrer');
    await expect(page.locator('#sb')).toHaveAttribute('href', /wa\.me\/6281234567890/);

    await page.locator('#gr [data-k="wh"][data-i="1"]').click();
    await expect(page.locator('#tt')).toHaveText('Rp 26.500.000');

    await page.locator('#rs').click();
    await expect(page.locator('#tt')).toHaveText('Rp 12.000.000');
});

test('Voltrix tracker and booking links handle user input safely', async ({ page }) => {
    await page.goto('/webia/template/voltrix-futuristic-automotive');

    await page.locator('#tc').fill('MOD-1001');
    await page.locator('#tf button').click();
    await expect(page.locator('#rr')).toContainText('Toyota GR86');

    await page.locator('#tc').fill('<img src=x onerror=alert(1)>');
    await page.locator('#tf button').click();
    await expect(page.locator('#rr')).toContainText('Kode tidak ditemukan.');
    await expect(page.locator('#rr img')).toHaveCount(0);
    await expect(page.locator('#rr a')).toHaveAttribute('rel', 'noopener noreferrer');

    await page.locator('#bn').fill('Ayu <script>alert(1)</script>');
    await page.locator('#bc').fill('Honda Civic');
    await page.locator('#bm').fill('Tolong cek <img src=x>');
    await expect(page.locator('#sm')).toContainText('Ayu <script>alert(1)</script>');
    await expect(page.locator('#sm img')).toHaveCount(0);
    await expect(page.locator('#bb')).toHaveAttribute('rel', 'noopener noreferrer');
    await expect(page.locator('#bb')).toHaveAttribute('href', /Ayu%20%3Cscript%3E/);
});

test('Voltrix chatbot renders free-text messages without interpreting HTML', async ({ page }) => {
    let dialogOpened = false;
    page.on('dialog', async (dialog) => {
        dialogOpened = true;
        await dialog.accept();
    });

    await page.goto('/webia/template/voltrix-futuristic-automotive');
    await page.locator('#fab').click();

    const userInput = '<img src=x onerror=alert(1)>';
    await page.locator('#ci').fill(userInput);
    await page.locator('#cf button').click();

    const userMessage = page.locator('#msgs .m.u').last();
    await expect(userMessage).toHaveText(userInput);
    await expect(userMessage.locator('img')).toHaveCount(0);
    await expect(page.locator('#wa')).toHaveAttribute('rel', 'noopener noreferrer');
    expect(dialogOpened).toBe(false);
});

test('Voltrix appears when Automotive and modification filters are selected', async ({ page }) => {
    await page.goto('/webia/koleksi');

    const voltrixCard = page.locator('.webia-template-card[data-template-url="/webia/template/voltrix-futuristic-automotive"]');

    await page.locator('#webia-category-options input[value="automotive"]').evaluate((input: HTMLInputElement) => input.click());
    await page.locator('#webia-subcategory-options label')
        .filter({ hasText: 'Modifikasi & Aksesori Kendaraan' })
        .locator('input')
        .evaluate((input: HTMLInputElement) => input.click());

    await expect(voltrixCard).toBeVisible();
});
