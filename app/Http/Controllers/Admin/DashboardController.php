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
            'awaiting' => WebiaOrder::where('status', 'awaiting_payment')->count(),
            'awaitingTotal' => (int) WebiaOrder::where('status', 'awaiting_payment')->sum('total_price'),
            'in_progress' => WebiaOrder::where('delivery_status', 'in_progress')->count(),
            'new_today' => WebiaOrder::whereDate('created_at', today())->count(),
        ];

        // Dua jendela 30 hari: periode aktif + periode pembanding (garis ghost).
        $paidWindow = WebiaOrder::where('status', 'paid')
            ->whereBetween('paid_at', [now()->subDays(59)->startOfDay(), now()->endOfDay()])
            ->get(['paid_at', 'total_price']);

        $current = $paidWindow->filter(fn (WebiaOrder $o) => $o->paid_at->gte(now()->subDays(29)->startOfDay()));
        $previous = $paidWindow->filter(fn (WebiaOrder $o) => $o->paid_at->lt(now()->subDays(29)->startOfDay()));

        $chart = collect(range(29, 0))
            ->map(function (int $daysAgo) use ($current): array {
                $date = now()->subDays($daysAgo)->startOfDay();
                $day = $current->filter(fn (WebiaOrder $o) => $o->paid_at->gte($date) && $o->paid_at->lt($date->copy()->addDay()));

                return [
                    'date' => $date,
                    'total' => (int) $day->sum('total_price'),
                    'count' => $day->count(),
                ];
            });

        $prevChart = collect(range(29, 0))
            ->map(function (int $daysAgo) use ($previous): int {
                $date = now()->subDays($daysAgo)->startOfDay();
                $day = $previous->filter(fn (WebiaOrder $o) => $o->paid_at->gte($date) && $o->paid_at->lt($date->copy()->addDay()));

                return (int) $day->sum('total_price');
            });

        $revenueMonth = (int) WebiaOrder::where('status', 'paid')
            ->whereMonth('paid_at', now()->month)->whereYear('paid_at', now()->year)
            ->sum('total_price');
        $revenuePrevMonth = (int) WebiaOrder::where('status', 'paid')
            ->whereMonth('paid_at', now()->subMonth()->month)->whereYear('paid_at', now()->subMonth()->year)
            ->sum('total_price');

        $paidCount30 = $current->count();
        $revenue30 = (int) $current->sum('total_price');
        $createdCount30 = WebiaOrder::where('created_at', '>=', now()->subDays(29)->startOfDay())->count();

        return view('admin.dashboard', [
            'attention' => WebiaOrder::where('status', 'payment_uploaded')
                ->with(['package', 'user'])
                ->latest()
                ->take(3)
                ->get(),
            'recent' => WebiaOrder::with(['package', 'user'])->latest()->take(5)->get(),
            'counts' => $counts,
            'chart' => $chart,
            'prevChart' => $prevChart,
            'revenue30' => $revenue30,
            'revenueMonth' => $revenueMonth,
            'revenueDelta' => $revenuePrevMonth > 0 ? round(($revenueMonth - $revenuePrevMonth) / $revenuePrevMonth * 100, 1) : null,
            'paidCount30' => $paidCount30,
            'createdCount30' => $createdCount30,
            'totalOrders' => WebiaOrder::count(),
        ]);
    }
}
