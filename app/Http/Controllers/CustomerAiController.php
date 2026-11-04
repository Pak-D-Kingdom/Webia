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
        $isDemo = false;

        // 1. Ambil order aktif atau website milik konsumen
        $order = WebiaOrder::whereBelongsTo($user)
            ->whereNotNull('site_slug')
            ->with(['package', 'template'])
            ->latest()
            ->first();

        // Fallback jika belum memiliki order ber-site_slug
        if (! $order) {
            $order = WebiaOrder::whereBelongsTo($user)
                ->with(['package', 'template'])
                ->latest()
                ->first();
        }

        // Jika akun belum memiliki order website ATAU user membuka mode demo (?demo=1)
        if (! $order || $request->has('demo')) {
            $isDemo = true;
            $order = new WebiaOrder([
                'order_number' => 'WEB-261102-AUTO',
                'site_slug' => 'tenant_automotive_01',
                'delivery_status' => 'delivered',
                'status' => 'paid',
                'business_data' => [
                    'business_name' => 'Bengkel PakDe Motor Jaya',
                    'owner_name' => $user?->name ?? 'Pemilik Bisnis',
                    'whatsapp' => '081234567890',
                ],
            ]);
            $order->setRelation('package', new WebiaPackage([
                'name' => 'Pixel',
                'slug' => 'pixel',
                'chatbot_monthly_quota' => 500,
            ]));
            $order->setRelation('template', new WebiaTemplate([
                'name' => 'Pitstop Garage (Automotive)',
                'slug' => 'pitstop-garage',
            ]));
        }

        $tenantId = $order->site_slug ?: ('webia-order-'.$order->order_number);
        $tierSlug = $order->package?->slug ?? 'pixel';
        $monthlyLimit = (int) ($order->package?->chatbot_monthly_quota ?? 500);

        // Ambil data kuota tersinkronisasi 100% (REST API / SQLite Source of Truth)
        $quotaData = AiQuotaService::getTenantQuota($tenantId, $tierSlug, $monthlyLimit);
        $aiOnline = AiQuotaService::isOnline();
        $aiError = null;

        // Ambil wawasan analitik konsumen (tren 7 hari & top pertanyaan)
        $insights = AiQuotaService::getTenantInsights($tenantId);
        $usageTrend = $insights['usage_trend_7d'] ?? [];
        $topQuestions = $insights['top_questions'] ?? [];
        $registeredWhatsApp = $order->business_data['whatsapp'] ?? ($user?->phone ?? '081234567890');

        $endOfMonth = Carbon::now()->endOfMonth();
        $resetDateFormatted = $endOfMonth->locale('id')->isoFormat('D MMMM Y');
        $daysUntilReset = max(1, (int) Carbon::now()->diffInDays($endOfMonth, false));

        return view('customer.ai', compact(
            'order',
            'quotaData',
            'aiOnline',
            'aiError',
            'resetDateFormatted',
            'daysUntilReset',
            'isDemo',
            'usageTrend',
            'topQuestions',
            'registeredWhatsApp',
            'tenantId'
        ));
    }
}
