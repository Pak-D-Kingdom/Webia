<?php

namespace App\Http\Controllers;

use App\Models\HostingInvoice;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $orders = $request->user()->orders()
            ->with('package')
            ->latest()
            ->take(5)
            ->get();
        $activeOrder = $request->user()->orders()
            ->where('delivery_status', '!=', 'delivered')
            ->with('package')
            ->latest()
            ->first();
        $deliveredSite = $request->user()->orders()
            ->where('delivery_status', 'delivered')
            ->whereNotNull('site_slug')
            ->with('package')
            ->latest()
            ->first();
        $hostingInvoices = HostingInvoice::query()
            ->whereIn('status', ['unpaid', 'overdue'])
            ->whereHas('service', fn ($query) => $query->whereBelongsTo($request->user())->where('billing_status', '!=', 'stopped'))
            ->with('service')
            ->orderBy('due_at')
            ->take(5)
            ->get();

        $aiQuotaAlert = null;
        if ($deliveredSite && $deliveredSite->site_slug) {
            $quota = \App\Services\AiQuotaService::getTenantQuota(
                $deliveredSite->site_slug,
                $deliveredSite->package?->slug ?? 'pixel',
                (int) ($deliveredSite->package?->chatbot_monthly_quota ?? 500)
            );
            if (!empty($quota['is_quota_exhausted'])) {
                $aiQuotaAlert = [
                    'type' => 'exhausted',
                    'title' => 'Kuota Pesan Asisten AI Habis (100%)',
                    'message' => 'Chatbot website Anda saat ini mengalihkan pengunjung ke WhatsApp karena kuota bulanan telah habis (' . number_format($quota['used_messages'], 0, ',', '.') . '/' . number_format($quota['monthly_quota'], 0, ',', '.') . ' pesan). Hubungi Admin Webia via WhatsApp untuk top-up atau upgrade paket.',
                ];
            } elseif (($quota['percentage_used'] ?? 0) >= 80) {
                $aiQuotaAlert = [
                    'type' => 'warning',
                    'title' => 'Peringatan: Kuota AI Tersisa Sedikit (' . $quota['percentage_used'] . '%)',
                    'message' => 'Kuota pesan Asisten AI website Anda telah terpakai ' . $quota['percentage_used'] . '% (' . number_format($quota['used_messages'], 0, ',', '.') . '/' . number_format($quota['monthly_quota'], 0, ',', '.') . ' pesan). Disarankan upgrade atau tambah kuota agar bot tetap melayani pengunjung tanpa jeda.',
                ];
            }
        }

        return view('dashboard', compact('orders', 'activeOrder', 'deliveredSite', 'hostingInvoices', 'aiQuotaAlert'));
    }
}
