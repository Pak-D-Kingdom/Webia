import { execFileSync } from 'node:child_process';
import { loadEnv } from 'vite';

export default function globalSetup(): void {
    const localEnv = loadEnv('e2e', process.cwd(), '');
    const databasePassword = process.env.WEBIA_DB_PASSWORD ?? localEnv.DB_PASSWORD;

    if (!databasePassword) {
        throw new Error('WEBIA_DB_PASSWORD atau DB_PASSWORD di .env wajib tersedia untuk menjalankan Playwright.');
    }

    execFileSync('php', ['artisan', 'migrate:fresh', '--seed', '--seeder=E2ETestSeeder', '--force', '--no-interaction'], {
        cwd: process.cwd(),
        env: {
            ...process.env,
            APP_ENV: 'e2e',
            DB_CONNECTION: 'pgsql',
            DB_HOST: '::1',
            DB_PORT: '5432',
            DB_DATABASE: 'webia_test_db',
            DB_USERNAME: 'postgres',
            DB_PASSWORD: databasePassword,
            CACHE_STORE: 'array',
            SESSION_DRIVER: 'file',
        },
        stdio: 'inherit',
    });
}
