<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHostingServiceRequest;
use App\Models\HostingPriceChange;
use App\Models\HostingService;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $hostingService->load(['user', 'invoices' => fn ($query) => $query->with('replacement')->latest('period_start'), 'priceChanges.actor', 'tasks']);

        return view('admin.hosting-services.show', ['service' => $hostingService]);
    }

    public function updatePrice(Request $request, HostingService $hostingService): RedirectResponse
    {
        $validated = $request->validate(['monthly_price' => ['required', 'integer', 'min:1']]);

        DB::transaction(function () use ($request, $hostingService, $validated): void {
            $service = HostingService::whereKey($hostingService->id)->lockForUpdate()->firstOrFail();
            HostingPriceChange::create([
                'hosting_service_id' => $service->id,
                'changed_by' => $request->user()->id,
                'old_price' => $service->monthly_price,
                'new_price' => $validated['monthly_price'],
            ]);
            $service->update(['monthly_price' => $validated['monthly_price']]);
        });

        return back()->with('status', 'Harga baru berlaku pada tagihan berikutnya.');
    }

    public function stop(Request $request, HostingService $hostingService): RedirectResponse
    {
        $validated = $request->validate(['stopped_at' => ['required', 'date', 'after_or_equal:today']]);
        $hostingService->update(['stopped_at' => $validated['stopped_at']]);

        return back()->with('status', 'Tanggal berhenti layanan berhasil ditetapkan.');
    }
}
