<?php

namespace App\Http\Controllers;

use App\Models\WebiaOrder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $orders = WebiaOrder::whereBelongsTo($request->user())
            ->with('package')
            ->latest()
            ->take(5)
            ->get();
        $activeOrder = WebiaOrder::whereBelongsTo($request->user())
            ->where('delivery_status', '!=', 'delivered')
            ->with('package')
            ->latest()
            ->first();
        $deliveredSite = WebiaOrder::whereBelongsTo($request->user())
            ->where('delivery_status', 'delivered')
            ->whereNotNull('site_slug')
            ->with('package')
            ->latest()
            ->first();

        return view('dashboard', compact('orders', 'activeOrder', 'deliveredSite'));
    }
}
