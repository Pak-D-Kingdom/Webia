import { expect, test } from '@playwright/test';

test('Kusuma Ningrat demo renders chatbot input as text', async ({ page }) => {
    let dialogOpened = false;

    page.on('dialog', async (dialog) => {
        dialogOpened = true;
        await dialog.accept();
    });

    await page.goto('/webia/template/kusuma-ningrat-royal-heritage');
    await page.getByRole('button', { name: 'Abdi Dalem AI' }).click();

    const userInput = '<img src=x onerror=alert(1)>';
    await page.locator('#chatInput').fill(userInput);
    await page.locator('#chatInput').press('Enter');

    const userMessage = page.locator('#chatMessages > div').filter({ hasText: userInput });

    await expect(userMessage).toHaveCount(1);
    await expect(userMessage).toHaveText(userInput);
    await expect(userMessage.locator('img')).toHaveCount(0);
    expect(dialogOpened).toBe(false);
});
