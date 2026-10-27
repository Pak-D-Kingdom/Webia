import { expect, test } from '@playwright/test';

test('NIGHTSHIFT product filters, cart quantities, and installment estimate respond to selections', async ({ page }) => {
    await page.goto('/webia/template/nightshift-dark-mode-automotive');

    await expect(page.locator('#gr .pr')).toHaveCount(12);
    await page.locator('#cc [data-c="velg"]').click();
    await expect(page.locator('#gr .pr')).toHaveCount(2);

    await page.locator('#bs').selectOption('Honda');
    await expect(page.locator('#gr .pr')).toHaveCount(2);

    await page.locator('#gr [data-a="1"]').click();
    await expect(page.locator('#cn')).toHaveText('1');
    await page.locator('#oc').click();
    await expect(page.locator('#ct')).toHaveText('Rp 14.500.000');
    await expect(page.locator('#cw')).toHaveAttribute('rel', 'noopener noreferrer');

    await page.locator('#tn').selectOption('3');
    await expect(page.locator('#cm')).toContainText('Rp 5.007.333 per bulan selama 3 bulan');

    await page.locator('#cl [data-q="1"]').click();
    await expect(page.locator('#cn')).toHaveText('2');
    await expect(page.locator('#ct')).toHaveText('Rp 29.000.000');
});

test('NIGHTSHIFT chatbot renders free-text messages without interpreting HTML', async ({ page }) => {
    let dialogOpened = false;
    page.on('dialog', async (dialog) => {
        dialogOpened = true;
        await dialog.accept();
    });

    await page.goto('/webia/template/nightshift-dark-mode-automotive');
    await page.locator('#oa').click();

    const userInput = '<img src=x onerror=alert(1)>';
    await page.locator('#ci').fill(userInput);
    await page.locator('#cf').evaluate((form: HTMLFormElement) => form.requestSubmit());

    const userMessage = page.locator('#ms .m.u').last();
    await expect(userMessage).toHaveText(userInput);
    await expect(userMessage.locator('img')).toHaveCount(0);
    await expect(page.locator('#wa')).toHaveAttribute('rel', 'noopener noreferrer');
    expect(dialogOpened).toBe(false);
});

test('NIGHTSHIFT appears when Automotive and modification filters are selected', async ({ page }) => {
    await page.goto('/webia/koleksi');

    const nightshiftCard = page.locator('.webia-template-card[data-template-url="/webia/template/nightshift-dark-mode-automotive"]');

    await page.locator('#webia-category-options input[value="automotive"]').evaluate((input: HTMLInputElement) => input.click());
    await page.locator('#webia-subcategory-options label')
        .filter({ hasText: 'Modifikasi & Aksesori Kendaraan' })
        .locator('input')
        .evaluate((input: HTMLInputElement) => input.click());

    await expect(nightshiftCard).toBeVisible();
});
