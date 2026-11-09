<?php

namespace App\Http\Controllers;

use App\Models\HostingInvoice;
use App\Models\HostingPayment;
use App\Services\HostingMidtrans;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use RuntimeException;

class HostingInvoiceController extends Controller
{
    public function __construct(private HostingMidtrans $midtrans) {}

    public function index(Request $request): View
    {
        $invoices = HostingInvoice::query()
            ->whereHas('service', fn ($query) => $query->whereBelongsTo($request->user()))
            ->with('service')
            ->latest('period_start')
            ->paginate(20);

        return view('hosting-invoices.index', compact('invoices'));
    }

    public function show(Request $request, HostingInvoice $hostingInvoice): View
    {
        $this->ensureOwner($request, $hostingInvoice);
        $hostingInvoice->load(['service', 'payments' => fn ($query) => $query->latest('id')]);

        return view('hosting-invoices.show', ['invoice' => $hostingInvoice]);
    }

    public function pay(Request $request, HostingInvoice $hostingInvoice): RedirectResponse
    {
        $this->ensureOwner($request, $hostingInvoice);
        abort_unless(in_array($hostingInvoice->status, ['unpaid', 'overdue'], true) && $hostingInvoice->amount > 0, 422);

        try {
            $payment = DB::transaction(function () use ($hostingInvoice): HostingPayment {
                $invoice = HostingInvoice::whereKey($hostingInvoice->id)->lockForUpdate()->firstOrFail();
                abort_unless(in_array($invoice->status, ['unpaid', 'overdue'], true), 422);

                $existing = $invoice->payments()->where('status', 'created')->whereNotNull('snap_redirect_url')->where('expires_at', '>', now())->latest()->first();

                return $existing ?? $this->midtrans->createTransaction($invoice, 'HST-'.$invoice->id.'-'.str_pad((string) ($invoice->payments()->count() + 1), 2, '0', STR_PAD_LEFT));
            });
        } catch (RuntimeException $exception) {
            report($exception);

            return back()->with('status', 'Pembayaran Midtrans gagal dibuat. Coba lagi sebentar.');
        }

        return $payment->snap_redirect_url
            ? redirect()->away($payment->snap_redirect_url)
            : back()->with('status', 'Pembayaran Midtrans gagal dibuat. Coba lagi sebentar.');
    }

    private function ensureOwner(Request $request, HostingInvoice $invoice): void
    {
        abort_unless($invoice->service->user_id === $request->user()->id, 404);
    }
}
