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

        return view('admin.dashboard', [
            'attention' => WebiaOrder::where('status', 'payment_uploaded')
                ->with(['package', 'user'])
                ->latest()
                ->take(3)
                ->get(),
            'recent' => WebiaOrder::with(['package', 'user'])->latest()->take(5)->get(),
            'counts' => $counts,
        ]);
    }
}
