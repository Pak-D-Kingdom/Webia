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

        return view('dashboard', compact('orders', 'activeOrder', 'deliveredSite', 'hostingInvoices'));
    }
}
