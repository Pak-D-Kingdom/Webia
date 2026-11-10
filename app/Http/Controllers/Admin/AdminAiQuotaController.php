<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebiaOrder;
use App\Models\WebiaPackage;
use App\Services\AiQuotaService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminAiQuotaController extends Controller
{
    /**
     * Helper untuk mengambil dan menyusun data klien tenant terintegrasi.
     */
    private function getClientsData(): array
    {
        $orders = WebiaOrder::with(['user', 'package', 'template'])
            ->whereNotNull('site_slug')
            ->orWhere('status', 'paid')
            ->get()
            ->keyBy('site_slug');

        $tenants = AiQuotaService::getAllTenants();
        $clients = [];

        foreach ($tenants as $tenant) {
            $tenantId = $tenant['id'];
            $matchedOrder = $orders->get($tenantId);

            $tierSlug = $matchedOrder?->package?->slug ?? ($tenant['package_tier'] ?? 'pixel');
            $monthlyLimit = (int) ($matchedOrder?->package?->chatbot_monthly_quota ?? ($tenant['monthly_message_quota'] ?? 500));

            $quotaStats = AiQuotaService::getTenantQuota($tenantId, $tierSlug, $monthlyLimit);

            $percentage = (float) ($quotaStats['percentage_used'] ?? 0);
            $isExhausted = ! empty($quotaStats['is_quota_exhausted']) || $percentage >= 100;
            $isWarning = $percentage >= 80 && ! $isExhausted;
            $statusCategory = $isExhausted ? 'habis' : ($isWarning ? 'waspada' : 'aman');

            $bizName = $matchedOrder?->business_data['business_name'] ?? $tenant['name'];
            $clientName = $matchedOrder?->user?->name ?? ('Klien ' . ucfirst($tenant['category'] ?? 'Bisnis'));
            $clientEmail = $matchedOrder?->user?->email ?? (strtolower(str_replace(' ', '', $tenant['name'])) . '@example.com');
            $phone = $matchedOrder?->business_data['whatsapp'] ?? '081234567890';
            $templateName = $matchedOrder?->template?->name ?? $matchedOrder?->template_snapshot['name'] ?? (ucwords($tenant['category'] ?? 'General') . ' Template');

            $clients[] = [
                'order' => $matchedOrder,
                'tenant_id' => $tenantId,
                'client_name' => $clientName,
                'client_email' => $clientEmail,
                'business_name' => $bizName,
                'whatsapp' => $phone,
                'package_name' => ucfirst($tierSlug),
                'package_tier' => $tierSlug,
                'template_name' => $templateName,
                'monthly_quota' => (int) ($quotaStats['monthly_quota'] ?? $monthlyLimit),
                'used_messages' => (int) ($quotaStats['used_messages'] ?? 0),
                'remaining_messages' => (int) ($quotaStats['remaining_messages'] ?? 0),
                'percentage' => $percentage,
                'status_category' => $statusCategory,
                'is_exhausted' => $isExhausted,
                'is_warning' => $isWarning,
            ];
        }

        return $clients;
    }

    /**
     * Tampilkan monitoring kuota AI seluruh klien untuk Superadmin Webia.
     */
    public function index(Request $request): View
    {
        $statusFilter = $request->query('status', 'semua');
        $search = strtolower(trim((string) $request->query('q', '')));

        $clients = $this->getClientsData();
        $aiOnline = AiQuotaService::isOnline();

        // Hitung ringkasan KPI untuk Superadmin
        $totalClients = count($clients);
        $exhaustedCount = collect($clients)->where('status_category', 'habis')->count();
        $warningCount = collect($clients)->where('status_category', 'waspada')->count();
        $criticalCount = $exhaustedCount + $warningCount;
        $safeCount = collect($clients)->where('status_category', 'aman')->count();

        $totalUsedMessages = collect($clients)->sum('used_messages');
        $totalQuotaMessages = collect($clients)->sum('monthly_quota');

        // Terapkan filter & pencarian jika ada
        $filteredClients = collect($clients)->filter(function ($c) use ($statusFilter, $search) {
            $matchStatus = true;
            if ($statusFilter === 'habis') {
                $matchStatus = $c['status_category'] === 'habis';
            } elseif ($statusFilter === 'waspada') {
                $matchStatus = $c['status_category'] === 'waspada';
            } elseif ($statusFilter === 'kritis') {
                $matchStatus = in_array($c['status_category'], ['habis', 'waspada']);
            } elseif ($statusFilter === 'aman') {
                $matchStatus = $c['status_category'] === 'aman';
            }

            $matchSearch = true;
            if (! empty($search)) {
                $matchSearch = str_contains(strtolower($c['business_name']), $search)
                    || str_contains(strtolower($c['client_name']), $search)
                    || str_contains(strtolower($c['tenant_id']), $search)
                    || str_contains(strtolower($c['package_name']), $search);
            }

            return $matchStatus && $matchSearch;
        })->values();

        $endOfMonth = Carbon::now()->endOfMonth();
        $resetDateFormatted = $endOfMonth->locale('id')->isoFormat('D MMMM Y');
        $daysUntilReset = max(1, (int) Carbon::now()->diffInDays($endOfMonth, false));
        $lastSyncedTime = Carbon::now()->locale('id')->format('H:i:s') . ' WIB';
        $cacheStats = AiQuotaService::getCacheStats();

        return view('admin.ai.index', compact(
            'filteredClients',
            'totalClients',
            'criticalCount',
            'exhaustedCount',
            'warningCount',
            'safeCount',
            'totalUsedMessages',
            'totalQuotaMessages',
            'statusFilter',
            'search',
            'aiOnline',
            'resetDateFormatted',
            'daysUntilReset',
            'lastSyncedTime',
            'cacheStats'
        ));
    }

    /**
     * Modal Action: Ubah Tier Paket / Top-Up Kuota Klien secara manual dari Superadmin.
     */
    public function updateTier(Request $request, string $tenantId): RedirectResponse
    {
        $request->validate([
            'package_tier' => 'required|in:pixel,pulse,nexus,infinity',
            'custom_quota' => 'nullable|integer|min:100',
        ]);

        $tier = strtolower($request->input('package_tier'));
        $customQuota = $request->input('custom_quota') ? (int) $request->input('custom_quota') : null;

        // 1. Update ke AI Engine (FastAPI & SQLite Source of Truth)
        $aiResult = AiQuotaService::updateTenantTier($tenantId, $tier, $customQuota);

        // 2. Update paket pada WebiaOrder jika ditemukan
        $order = WebiaOrder::where('site_slug', $tenantId)->first();
        if ($order) {
            $package = WebiaPackage::where('slug', $tier)->first();
            if ($package) {
                $order->webia_package_id = $package->id;
                $order->save();
            }
        }

        $tierLabel = ucfirst($tier);
        $quotaCount = $aiResult['monthly_quota'] ?? ($customQuota ?: 500);

        return redirect()->back()->with('success', "Berhasil memperbarui paket tenant '{$tenantId}' ke {$tierLabel} (Kuota {$quotaCount} pesan/bulan).");
    }

    /**
     * Ekspor Laporan Kuota Klien ke format CSV untuk audit manajemen.
     */
    public function export(Request $request): StreamedResponse
    {
        $clients = $this->getClientsData();
        $filename = 'laporan-kuota-ai-webia-' . Carbon::now()->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () use ($clients) {
            $handle = fopen('php://output', 'w');
            // UTF-8 BOM untuk Microsoft Excel compatibility
            fputs($handle, "\xEF\xBB\xBF");

            // Header baris CSV
            fputcsv($handle, [
                'Tenant ID',
                'Nama Bisnis',
                'Nama Klien',
                'Email',
                'WhatsApp',
                'Paket Tier',
                'Batas Kuota Bulanan',
                'Pesan Terpakai',
                'Sisa Kuota',
                'Persentase Terpakai (%)',
                'Status Kuota',
                'Tanggal Ekspor',
            ]);

            $nowStr = Carbon::now()->format('Y-m-d H:i:s');
            foreach ($clients as $c) {
                fputcsv($handle, [
                    $c['tenant_id'],
                    $c['business_name'],
                    $c['client_name'],
                    $c['client_email'],
                    $c['whatsapp'],
                    $c['package_name'],
                    $c['monthly_quota'],
                    $c['used_messages'],
                    $c['remaining_messages'],
                    $c['percentage'] . '%',
                    strtoupper($c['status_category']),
                    $nowStr,
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Mengambil seluruh berkas knowledge base dan analitik tenant untuk modal admin.
     */
    public function getKnowledge(string $tenantId): JsonResponse
    {
        $knowledge = AiQuotaService::getTenantKnowledge($tenantId);
        $insights = AiQuotaService::getTenantInsights($tenantId);

        return response()->json([
            'status' => 'success',
            'tenant_id' => $tenantId,
            'knowledge' => $knowledge,
            'insights' => $insights,
        ]);
    }

    /**
     * Menyimpan pembaruan dokumen knowledge base tenant dari Superadmin.
     */
    public function saveKnowledge(Request $request, string $tenantId): JsonResponse
    {
        $payload = $request->only(['profil', 'layanan', 'kebijakan', 'faq']);
        $result = AiQuotaService::saveTenantKnowledge($tenantId, $payload);

        return response()->json($result);
    }

    /**
     * Mengambil daftar pertanyaan yang belum terjawab / low-confidence untuk tenant tertentu.
     */
    public function getUnanswered(string $tenantId): JsonResponse
    {
        $unanswered = AiQuotaService::getTenantUnanswered($tenantId);

        return response()->json([
            'status' => 'success',
            'tenant_id' => $tenantId,
            'unanswered_queries' => $unanswered,
        ]);
    }
}
