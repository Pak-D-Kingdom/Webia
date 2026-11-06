<?php

namespace App\Services;

use App\Models\HostingInvoice;
use App\Models\HostingService;
use Carbon\CarbonImmutable;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class HostingBilling
{
    public function processToday(): void
    {
        $today = CarbonImmutable::today();

        HostingService::query()
            ->whereDate('activation_date', '<=', $today)
            ->where(function ($query) use ($today): void {
                $query->whereNull('stopped_at')->orWhereDate('stopped_at', '>', $today);
            })
            ->orderBy('id')
            ->each(fn (HostingService $service) => $this->createInvoiceWhenDue($service, $today));

        HostingService::query()
            ->whereNotNull('stopped_at')
            ->whereDate('stopped_at', '<=', $today)
            ->where('billing_status', '!=', 'stopped')
            ->update(['billing_status' => 'stopped', 'operational_status' => 'stopped']);
    }

    private function createInvoiceWhenDue(HostingService $service, CarbonImmutable $today): void
    {
        $activation = CarbonImmutable::parse($service->activation_date);
        $periodStart = $this->cycleDate($activation, $today->year, $today->month, $service->billing_cycle_day);

        if (! $periodStart->isSameDay($today) || $periodStart->lessThan($activation)) {
            return;
        }

        try {
            DB::transaction(function () use ($service, $activation, $periodStart): void {
                $lockedService = HostingService::whereKey($service->id)->lockForUpdate()->firstOrFail();
                $isFreeMonth = $periodStart->isSameDay($activation);
                $nextPeriodStart = $this->nextCycleDate($periodStart, $lockedService->billing_cycle_day);

                $invoice = HostingInvoice::create([
                    'hosting_service_id' => $lockedService->id,
                    'period_start' => $periodStart,
                    'period_end' => $nextPeriodStart->subDay(),
                    'issued_at' => now(),
                    'due_at' => now()->addDays(7),
                    'amount' => $isFreeMonth ? 0 : $lockedService->monthly_price,
                    'label' => $isFreeMonth ? 'Bulan Pertama Gratis' : null,
                    'status' => $isFreeMonth ? 'paid' : 'unpaid',
                    'paid_at' => $isFreeMonth ? now() : null,
                ]);
                $invoice->update(['invoice_number' => 'HST-'.$periodStart->format('Ym').'-'.str_pad((string) $invoice->id, 6, '0', STR_PAD_LEFT)]);

                if ($lockedService->billing_status === 'scheduled') {
                    $lockedService->update(['billing_status' => 'active', 'operational_status' => 'active']);
                }
            });
        } catch (QueryException $exception) {
            if (! HostingInvoice::where('hosting_service_id', $service->id)->whereDate('period_start', $periodStart)->exists()) {
                throw $exception;
            }
        }
    }

    private function nextCycleDate(CarbonImmutable $date, int $cycleDay): CarbonImmutable
    {
        $nextMonth = $date->startOfMonth()->addMonth();

        return $this->cycleDate($date, $nextMonth->year, $nextMonth->month, $cycleDay);
    }

    private function cycleDate(CarbonImmutable $anchor, int $year, int $month, int $cycleDay): CarbonImmutable
    {
        $monthStart = $anchor->setDate($year, $month, 1)->startOfDay();

        return $monthStart->day(min($cycleDay, $monthStart->daysInMonth));
    }
}
