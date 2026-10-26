import { expect, test } from '@playwright/test';

test('ARVO project details and planner build a WhatsApp consultation', async ({ page }) => {
    await page.goto('/webia/template/arvo-modern-automotive');

    await page.locator('#gr .pj').first().click();
    await expect(page.locator('#mo')).toHaveClass(/on/);
    await expect(page.locator('#mc')).toContainText('Civic Turbo');
    await expect(page.locator('#mc a')).toHaveAttribute('rel', 'noopener noreferrer');
    await page.locator('#xx').click();
    await expect(page.locator('#mo')).not.toHaveClass(/on/);

    await page.locator('#pl [data-g="0"]').click();
    await page.locator('#pl [data-v="1"]').click();
    await page.locator('#pl #bs').fill('50');
    await expect(page.locator('#pl #bv')).toHaveText('Rp 50 jt');
    await page.locator('#pl [data-s="3"]').click();
    await expect(page.locator('#pl')).toContainText('Signature Build');
    await expect(page.locator('#pl a')).toHaveAttribute('rel', 'noopener noreferrer');
    await expect(page.locator('#pl a')).toHaveAttribute('href', /Signature%20Build/);
});

test('ARVO calendar booking and assistant keep free text out of rendered HTML', async ({ page }) => {
    await page.goto('/webia/template/arvo-modern-automotive');

    await page.locator('#cg .sl2:not(:disabled)').first().click();
    await page.locator('#bn').fill('Ayu <script>alert(1)</script>');
    await page.locator('#bc').fill('Honda Civic <img src=x>');
    await expect(page.locator('#sm')).toContainText('Ayu <script>alert(1)</script>');
    await expect(page.locator('#sm img')).toHaveCount(0);
    await expect(page.locator('#bb')).toHaveAttribute('rel', 'noopener noreferrer');
    await expect(page.locator('#bb')).toHaveAttribute('href', /Ayu%20%3Cscript%3E/);

    const userInput = '<img src=x onerror=alert(1)>';
    await page.locator('#ci').fill(userInput);
    await page.locator('#cf').evaluate((form: HTMLFormElement) => form.requestSubmit());

    const userMessage = page.locator('#ms .m.u').last();
    await expect(userMessage).toHaveText(userInput);
    await expect(userMessage.locator('img')).toHaveCount(0);
    await expect(page.locator('#wa')).toHaveAttribute('rel', 'noopener noreferrer');
});

test('ARVO appears when Automotive and modification filters are selected', async ({ page }) => {
    await page.goto('/webia/koleksi');

    const arvoCard = page.locator('.webia-template-card[data-template-url="/webia/template/arvo-modern-automotive"]');

    await page.locator('#webia-category-options input[value="automotive"]').evaluate((input: HTMLInputElement) => input.click());
    await page.locator('#webia-subcategory-options label')
        .filter({ hasText: 'Modifikasi & Aksesori Kendaraan' })
        .locator('input')
        .evaluate((input: HTMLInputElement) => input.click());

    await expect(arvoCard).toBeVisible();
});
