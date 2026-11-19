<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HostingInvoice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HostingInvoiceController extends Controller
{
    public function cancel(Request $request, HostingInvoice $hostingInvoice): RedirectResponse
    {
        $validated = $request->validate(['cancellation_reason' => ['required', 'string', 'max:1000']]);

        DB::transaction(function () use ($request, $hostingInvoice, $validated): void {
            $invoice = HostingInvoice::whereKey($hostingInvoice->id)->lockForUpdate()->firstOrFail();
            abort_unless(in_array($invoice->status, ['unpaid', 'overdue'], true), 422);
            $invoice->update([
                'status' => 'cancelled',
                'cancelled_at' => now(),
                'cancelled_by' => $request->user()->id,
                'cancellation_reason' => $validated['cancellation_reason'],
            ]);
            $invoice->payments()->where('status', 'created')->update(['status' => 'cancelled']);
        });

        return back()->with('status', 'Tagihan dibatalkan dan tetap disimpan dalam riwayat.');
    }

    public function replace(Request $request, HostingInvoice $hostingInvoice): RedirectResponse
    {
        $validated = $request->validate(['amount' => ['required', 'integer', 'min:1']]);

        DB::transaction(function () use ($hostingInvoice, $validated): void {
            $cancelled = HostingInvoice::whereKey($hostingInvoice->id)->lockForUpdate()->firstOrFail();
            abort_unless($cancelled->status === 'cancelled' && ! $cancelled->replacement()->exists(), 422);

            $replacement = HostingInvoice::create([
                'hosting_service_id' => $cancelled->hosting_service_id,
                'billing_key' => 'replacement:'.$cancelled->id.':'.Str::uuid(),
                'period_start' => $cancelled->period_start,
                'period_end' => $cancelled->period_end,
                'issued_at' => now(),
                'due_at' => now()->addDays(7),
                'amount' => $validated['amount'],
                'status' => 'unpaid',
                'replacement_for_id' => $cancelled->id,
            ]);
            $replacement->update([
                'invoice_number' => 'HST-'.$replacement->period_start->format('Ym').'-'.str_pad((string) $replacement->id, 6, '0', STR_PAD_LEFT),
            ]);
        });

        return back()->with('status', 'Tagihan pengganti berhasil diterbitkan.');
    }
}
