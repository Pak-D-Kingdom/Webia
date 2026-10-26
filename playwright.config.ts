import { defineConfig, devices } from '@playwright/test';
import { loadEnv } from 'vite';

const port = 8001;
const localEnv = loadEnv('e2e', process.cwd(), '');
const databasePassword = process.env.WEBIA_DB_PASSWORD ?? localEnv.DB_PASSWORD ?? '';

export default defineConfig({
    testDir: './tests/E2E',
    globalSetup: './tests/E2E/global-setup.ts',
    fullyParallel: false,
    workers: 1,
    retries: process.env.CI ? 2 : 0,
    reporter: [['list'], ['html', { open: 'never' }]],
    use: {
        baseURL: `http://127.0.0.1:${port}`,
        trace: 'on-first-retry',
        screenshot: 'only-on-failure',
        video: 'retain-on-failure',
    },
    projects: [
        {
            name: 'chromium',
            use: { ...devices['Desktop Chrome'] },
        },
    ],
    webServer: {
        command: `php artisan serve --host=127.0.0.1 --port=${port}`,
        url: `http://127.0.0.1:${port}/up`,
        reuseExistingServer: false,
        timeout: 120_000,
        env: {
            ...process.env,
            APP_ENV: 'e2e',
            APP_URL: `http://127.0.0.1:${port}`,
            DB_CONNECTION: 'pgsql',
            DB_HOST: process.env.DB_HOST ?? '::1',
            DB_PORT: '5432',
            DB_DATABASE: 'webia_test_db',
            DB_USERNAME: process.env.DB_USERNAME ?? 'postgres',
            DB_PASSWORD: databasePassword,
            CACHE_STORE: 'array',
            MAIL_MAILER: 'array',
            QUEUE_CONNECTION: 'sync',
            SESSION_DRIVER: 'file',
            // E2E tanpa kredensial Midtrans: paksa mode simulasi meski .env dev punya server key.
            MIDTRANS_SERVER_KEY: '',
            MIDTRANS_MERCHANT_ID: '',
        },
    },
});
