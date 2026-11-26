import { expect, test } from '@playwright/test';

test.describe('Photography chatbot contract', () => {
    test('published photography preview templates expose the standard AI controls', async ({ page }) => {
        await page.goto('/webia/template/lumiere-photography-studio');
        await expect(page.locator('[data-webia-ai-input]')).toBeVisible();
        await expect(page.locator('[data-webia-ai-send]')).toBeVisible();
        await expect(page.locator('[data-webia-ai-messages]')).toHaveCount(1);

        await page.goto('/webia/template/noir-studio-photography');
        await expect(page.locator('[data-webia-ai-input]')).toBeVisible();
        await expect(page.locator('[data-webia-ai-send]')).toBeVisible();

        await page.goto('/webia/template/peachy-studio');
        await expect(page.locator('[data-webia-ai-trigger]')).toBeVisible();
    });
});
