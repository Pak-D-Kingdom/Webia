<?php

namespace App\Http\Controllers;

use App\Models\WebiaOrder;
use App\Models\WebiaPackage;
use App\Models\WebiaTemplate;
use App\Services\AiQuotaService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CustomerAiController extends Controller
{
    /**
     * Tampilkan halaman monitoring Asisten AI & Kuota Pesan untuk konsumen.
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        // 1. Ambil website milik akun konsumen sendiri yang sudah memiliki site_slug
        $order = WebiaOrder::whereBelongsTo($user)
            ->whereNotNull('site_slug')
            ->with(['package', 'template'])
            ->latest()
            ->first();

        // Fallback jika belum memiliki order ber-site_slug (misal masih draft/pending)
        if (! $order) {
            $order = WebiaOrder::whereBelongsTo($user)
                ->with(['package', 'template'])
                ->latest()
                ->first();
        }

        // Tentukan status kelayakan AI murni dari akun pengguna sendiri (TIDAK ADA mode demo/dummy)
        $hasOrder = ($order !== null);
        $isDelivered = $hasOrder && $order->delivery_status === 'delivered' && $order->status === 'paid' && !empty($order->site_slug);

        $tenantId = $isDelivered ? $order->site_slug : null;
        $tierSlug = $order?->package?->slug ?? 'pixel';
        $monthlyLimit = (int) ($order?->package?->chatbot_monthly_quota ?? 500);

        // Ambil data kuota tersinkronisasi HANYA jika akun ini memiliki website yang sudah aktif
        $quotaData = $tenantId
            ? AiQuotaService::getTenantQuota($tenantId, $tierSlug, $monthlyLimit)
            : null;

        $aiOnline = AiQuotaService::isOnline();
        $aiError = null;

        // Ambil wawasan analitik HANYA jika akun ini memiliki website yang sudah aktif
        $insights = $tenantId ? AiQuotaService::getTenantInsights($tenantId) : [];
        $usageTrend = $insights['usage_trend_7d'] ?? [];
        $topQuestions = $insights['top_questions'] ?? [];
        $registeredWhatsApp = $order?->business_data['whatsapp'] ?? ($user?->phone ?? '081234567890');

        $endOfMonth = Carbon::now()->endOfMonth();
        $resetDateFormatted = $endOfMonth->locale('id')->isoFormat('D MMMM Y');
        $daysUntilReset = max(1, (int) Carbon::now()->diffInDays($endOfMonth, false));

        return view('customer.ai', compact(
            'order',
            'hasOrder',
            'isDelivered',
            'quotaData',
            'aiOnline',
            'aiError',
            'resetDateFormatted',
            'daysUntilReset',
            'usageTrend',
            'topQuestions',
            'registeredWhatsApp',
            'tenantId'
        ));
    }
}
