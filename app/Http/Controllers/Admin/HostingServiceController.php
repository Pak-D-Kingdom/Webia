<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHostingServiceRequest;
use App\Models\HostingService;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HostingServiceController extends Controller
{
    public function index(): View
    {
        $services = HostingService::with('user')->latest('id')->paginate(20);

        return view('admin.hosting-services.index', compact('services'));
    }

    public function create(): View
    {
        $customers = User::where('role', '!=', 'admin')->orderBy('name')->get(['id', 'name', 'email']);

        return view('admin.hosting-services.create', compact('customers'));
    }

    public function store(StoreHostingServiceRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['billing_cycle_day'] = (int) date('j', strtotime($validated['activation_date']));

        $service = HostingService::create($validated);

        return redirect()->route('admin.hosting-services.show', $service)->with('status', 'Layanan hosting berhasil dijadwalkan.');
    }

    public function show(HostingService $hostingService): View
    {
        $hostingService->load(['user', 'invoices' => fn ($query) => $query->latest('period_start'), 'priceChanges.actor', 'tasks']);

        return view('admin.hosting-services.show', ['service' => $hostingService]);
    }
}
