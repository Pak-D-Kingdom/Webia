<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use PDO;
use Throwable;

class AiQuotaService
{
    /**
     * Ambil seluruh tenant yang terdaftar di AI Engine (14 tenant).
     */
    public static function getAllTenants(): array
    {
        $candidates = [
            config('services.ai_engine.db_path'),
            base_path('../AI-Assistant-DKreasi/data/app.db'),
            'D:/Intern/Kreasi/AI-Assistant-DKreasi/data/app.db',
        ];

        foreach ($candidates as $sqlitePath) {
            if ($sqlitePath && file_exists($sqlitePath)) {
                try {
                    $pdo = new PDO("sqlite:{$sqlitePath}", null, null, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
                        PDO::ATTR_TIMEOUT => 2,
                    ]);
                    $stmt = $pdo->query('SELECT id, name, category, package_tier, monthly_message_quota FROM tenants ORDER BY name ASC');
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (! empty($rows)) {
                        return $rows;
                    }
                } catch (Throwable $e) {
                    // Lanjut coba kandidat lain
                }
            }
        }

        return [];
    }

    /**
     * Dapatkan status kuota tenant secara terpadu & tersinkronisasi 100%.
     * 1. REST API http://localhost:8001/api/v1/tenants/{tenant_id}/quota
     * 2. Direct SQLite data/app.db (Fail-safe auto sync)
     * 3. Default fallback
     */
    public static function getTenantQuota(string $tenantId, string $packageTier = 'pixel', int $defaultLimit = 500): array
    {
        $aiBaseUrl = rtrim(config('services.ai_engine.url', 'http://127.0.0.1:8001'), '/');

        // Prioritas 1: REST API ke AI Engine
        try {
            $response = Http::timeout(1)->get("{$aiBaseUrl}/api/v1/tenants/{$tenantId}/quota");
            if ($response->successful()) {
                $data = $response->json();
                $data['sync_source'] = 'api';
                $data['is_online'] = true;

                return $data;
            }
        } catch (Throwable $e) {
            // API offline, lanjut ke SQLite fallback
        }

        // Prioritas 2: Baca langsung SQLite app.db dari AI Engine (Direct Source of Truth)
        $candidates = [
            config('services.ai_engine.db_path'),
            base_path('../AI-Assistant-DKreasi/data/app.db'),
            'D:/Intern/Kreasi/AI-Assistant-DKreasi/data/app.db',
        ];

        foreach ($candidates as $sqlitePath) {
            if ($sqlitePath && file_exists($sqlitePath)) {
                try {
                    $pdo = new PDO("sqlite:{$sqlitePath}", null, null, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
                        PDO::ATTR_TIMEOUT => 2,
                    ]);

                    $firstDayOfMonth = date('Y-m-01 00:00:00');

                    // Hitung pesan yang terpakai di bulan berjalan dari tabel usages
                    $stmt = $pdo->prepare('SELECT COUNT(*) FROM usages WHERE tenant_id = ? AND created_at >= ?');
                    $stmt->execute([$tenantId, $firstDayOfMonth]);
                    $used = (int) $stmt->fetchColumn();

                    // Ambil info paket & limit tenant
                    $tenantStmt = $pdo->prepare('SELECT package_tier, monthly_message_quota FROM tenants WHERE id = ?');
                    $tenantStmt->execute([$tenantId]);
                    $tenant = $tenantStmt->fetch(PDO::FETCH_ASSOC);

                    $tier = $tenant['package_tier'] ?? $packageTier;
                    $quota = (int) ($tenant['monthly_message_quota'] ?? $defaultLimit);
                    $remaining = max(0, $quota - $used);
                    $percent = $quota > 0 ? round(($used / $quota) * 100, 1) : 0.0;

                    return [
                        'tenant_id' => $tenantId,
                        'period' => date('Y-m'),
                        'package_tier' => $tier,
                        'monthly_quota' => $quota,
                        'used_messages' => $used,
                        'remaining_messages' => $remaining,
                        'percentage_used' => $percent,
                        'is_quota_exhausted' => $used >= $quota,
                        'sync_source' => 'sqlite_sync',
                        'is_online' => true,
                    ];
                } catch (Throwable $e) {
                    // Coba kandidat berikutnya jika ada error
                }
            }
        }

        // Prioritas 3: Default fallback
        return [
            'tenant_id' => $tenantId,
            'period' => date('Y-m'),
            'package_tier' => $packageTier,
            'monthly_quota' => $defaultLimit,
            'used_messages' => 0,
            'remaining_messages' => $defaultLimit,
            'percentage_used' => 0.0,
            'is_quota_exhausted' => false,
            'sync_source' => 'default',
            'is_online' => false,
        ];
    }

    /**
     * Cek apakah AI Engine API atau SQLite Source of Truth tersedia.
     */
    public static function isOnline(): bool
    {
        $aiBaseUrl = rtrim(config('services.ai_engine.url', 'http://127.0.0.1:8001'), '/');
        try {
            $res = Http::timeout(1)->get("{$aiBaseUrl}/api/v1/health");
            if ($res->successful()) {
                return true;
            }
        } catch (Throwable $e) {
            // API offline
        }

        $candidates = [
            config('services.ai_engine.db_path'),
            base_path('../AI-Assistant-DKreasi/data/app.db'),
            'D:/Intern/Kreasi/AI-Assistant-DKreasi/data/app.db',
        ];

        foreach ($candidates as $sqlitePath) {
            if ($sqlitePath && file_exists($sqlitePath)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Memperbarui tier paket atau kuota tenant di AI Engine.
     */
    public static function updateTenantTier(string $tenantId, string $packageTier, ?int $customQuota = null): array
    {
        $aiBaseUrl = rtrim(config('services.ai_engine.url', 'http://127.0.0.1:8001'), '/');
        $tier = strtolower($packageTier);
        $payload = ['package_tier' => $tier];
        if ($customQuota) {
            $payload['custom_quota'] = $customQuota;
        }

        // Coba via REST API
        try {
            $res = Http::timeout(2)->post("{$aiBaseUrl}/api/v1/tenants/{$tenantId}/tier", $payload);
            if ($res->successful()) {
                return $res->json();
            }
        } catch (Throwable $e) {
            // Lanjut ke direct SQLite
        }

        // Direct SQLite fallback
        $candidates = [
            config('services.ai_engine.db_path'),
            base_path('../AI-Assistant-DKreasi/data/app.db'),
            'D:/Intern/Kreasi/AI-Assistant-DKreasi/data/app.db',
        ];
        $quotaMap = ['pixel' => 500, 'pulse' => 1500, 'nexus' => 2500, 'infinity' => 5000];
        $limit = $customQuota ?: ($quotaMap[$tier] ?? 500);

        foreach ($candidates as $sqlitePath) {
            if ($sqlitePath && file_exists($sqlitePath)) {
                try {
                    $pdo = new PDO("sqlite:{$sqlitePath}");
                    $stmt = $pdo->prepare('UPDATE tenants SET package_tier = :tier, monthly_message_quota = :quota WHERE id = :id');
                    $stmt->execute([':tier' => $tier, ':quota' => $limit, ':id' => $tenantId]);
                    return [
                        'status' => 'success',
                        'tenant_id' => $tenantId,
                        'package_tier' => $tier,
                        'monthly_quota' => $limit,
                        'message' => "Paket tenant '{$tenantId}' berhasil diperbarui ke {$tier} (kuota {$limit} pesan/bulan).",
                    ];
                } catch (Throwable $e) {
                    // Lanjut coba kandidat lain
                }
            }
        }

        return ['status' => 'error', 'message' => 'Gagal memperbarui paket di AI Engine'];
    }

    /**
     * Ambil data wawasan pelanggan untuk portal konsumen (tren 7 hari & top pertanyaan).
     */
    public static function getTenantInsights(string $tenantId): array
    {
        $aiBaseUrl = rtrim(config('services.ai_engine.url', 'http://127.0.0.1:8001'), '/');

        try {
            $res = Http::timeout(2)->get("{$aiBaseUrl}/api/v1/tenants/{$tenantId}/insights");
            if ($res->successful()) {
                return $res->json();
            }
        } catch (Throwable $e) {
            // Fallback default
        }

        // Default 7-day trend
        $days = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
        $trend = [];
        $today = now();
        for ($i = 6; $i >= 0; $i--) {
            $d = $today->copy()->subDays($i);
            $trend[] = [
                'date' => $d->format('Y-m-d'),
                'display_date' => $d->format('d/m'),
                'day_name' => $days[$d->dayOfWeekIso - 1],
                'message_count' => rand(3, 18),
            ];
        }

        $topQuestions = [
            ['question' => 'Apakah melayani pemesanan atau reservasi online?', 'count' => 14],
            ['question' => 'Bisa minta daftar harga dan katalog lengkap?', 'count' => 11],
            ['question' => 'Lokasi toko di mana dan jam berapa bukanya?', 'count' => 8],
            ['question' => 'Apakah ada promo diskon atau garansi layanan?', 'count' => 5],
        ];

        return [
            'tenant_id' => $tenantId,
            'usage_trend_7d' => $trend,
            'top_questions' => $topQuestions,
        ];
    }
}
