import { expect, test } from '@playwright/test';

const templates = [
    {
        url: '/webia/template/home-services/organic/home-renovation-repair-sage-green',
        form: '[data-webia-ai-form="home-services"]',
        input: '[data-webia-ai-input="home-services"]',
        log: '[data-webia-ai-log="home-services"]',
    },
    {
        url: '/webia/template/nonprofit-community/professional/foundation-classic-trust',
        form: '[data-webia-ai-form="nonprofit"]',
        input: '[data-webia-ai-input="nonprofit"]',
        log: '[data-webia-ai-log="nonprofit"]',
    },
    {
        url: '/webia/template/travel-tourism/classic/umrah-haji-emerald-green',
        form: '[data-webia-ai-form="travel"]',
        input: '[data-webia-ai-input="travel"]',
        log: '[data-webia-ai-log="travel"]',
    },
    {
        url: '/webia/template/interior-architecture/rustic/architecture-building-design-chocolate-luxe',
        form: '[data-webia-ai-form="architecture"]',
        input: '[data-webia-ai-input="architecture"]',
        log: '[data-webia-ai-log="architecture"]',
    },
];

test.describe('Native chatbot contract', () => {
    for (const template of templates) {
        test(`${template.url} exposes its AI controls`, async ({ page }) => {
            await page.goto(template.url);

            await expect(page.locator(template.form)).toHaveCount(1);
            await expect(page.locator(template.input)).toHaveCount(1);
            await expect(page.locator(template.log)).toHaveCount(1);
        });
    }
});
