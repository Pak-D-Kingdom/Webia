<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebiaOrder;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $counts = [
            'verification' => WebiaOrder::where('status', 'payment_uploaded')->count(),
            'in_progress' => WebiaOrder::where('delivery_status', 'in_progress')->count(),
            'active' => WebiaOrder::where('delivery_status', '!=', 'delivered')->count(),
            'delivered' => WebiaOrder::where('delivery_status', 'delivered')->count(),
        ];

        $paidLast30 = WebiaOrder::where('status', 'paid')
            ->where('paid_at', '>=', now()->subDays(29)->startOfDay())
            ->get(['paid_at', 'total_price']);

        $revenueByDay = $paidLast30
            ->groupBy(fn (WebiaOrder $order): string => $order->paid_at->toDateString())
            ->map(fn ($orders): int => (int) $orders->sum('total_price'));

        $chart = collect(range(29, 0))
            ->map(fn (int $daysAgo): array => [
                'date' => now()->subDays($daysAgo)->startOfDay(),
                'total' => $revenueByDay->get(now()->subDays($daysAgo)->toDateString(), 0),
            ]);

        return view('admin.dashboard', [
            'attention' => WebiaOrder::where('status', 'payment_uploaded')
                ->with(['package', 'user'])
                ->latest()
                ->take(3)
                ->get(),
            'recent' => WebiaOrder::with(['package', 'user'])->latest()->take(5)->get(),
            'counts' => $counts,
            'revenue30' => (int) $paidLast30->sum('total_price'),
            'paidCount30' => $paidLast30->count(),
            'chart' => $chart,
        ]);
    }
}
