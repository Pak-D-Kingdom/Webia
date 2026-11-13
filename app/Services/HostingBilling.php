<?php

namespace App\Services;

use App\Models\HostingInvoice;
use App\Models\HostingService;
use App\Models\HostingTask;
use App\Models\User;
use App\Notifications\HostingInvoiceReminder;
use App\Notifications\HostingTaskCreated;
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

        HostingInvoice::query()
            ->where('status', 'unpaid')
            ->where('due_at', '<', $today)
            ->update(['status' => 'overdue']);

        HostingService::query()
            ->whereHas('invoices', fn ($query) => $query->where('status', 'overdue')->where('due_at', '<=', $today->subDays(7)))
            ->whereNotIn('billing_status', ['suspended', 'stopped'])
            ->orderBy('id')
            ->each(function (HostingService $service): void {
                $service->update(['billing_status' => 'suspended', 'operational_status' => 'pending_suspension']);
                $task = HostingTask::firstOrCreate([
                    'hosting_service_id' => $service->id,
                    'type' => 'suspend_hosting',
                    'status' => 'pending',
                ]);

                if ($task->wasRecentlyCreated) {
                    User::where('role', 'admin')->each(fn (User $admin) => $admin->notify(new HostingTaskCreated($task)));
                }
            });

        HostingService::query()
            ->whereNotNull('stopped_at')
            ->whereDate('stopped_at', '<=', $today)
            ->where('billing_status', '!=', 'stopped')
            ->update(['billing_status' => 'stopped', 'operational_status' => 'stopped']);

        $this->sendReminders($today);
    }

    private function sendReminders(CarbonImmutable $today): void
    {
        HostingInvoice::query()
            ->whereIn('status', ['unpaid', 'overdue'])
            ->whereHas('service', fn ($query) => $query->whereNull('stopped_at')->orWhereDate('stopped_at', '>', $today))
            ->with('service.user')
            ->orderBy('id')
            ->each(function (HostingInvoice $invoice) use ($today): void {
                $dueDate = $invoice->due_at->toImmutable()->startOfDay();
                $overdueDays = (int) $dueDate->diffInDays($today);
                $type = match (true) {
                    $invoice->issued_at->isSameDay($today) => 'issued',
                    $dueDate->isSameDay($today->addDays(3)) => 'due_in_3_days',
                    $dueDate->isSameDay($today->addDay()) => 'due_tomorrow',
                    $dueDate->isSameDay($today) => 'due_today',
                    $dueDate->isBefore($today) && $overdueDays === 3 => 'overdue_3_days',
                    $dueDate->isBefore($today) && $overdueDays === 7 => 'suspended',
                    $dueDate->isBefore($today) && $overdueDays > 7 && $overdueDays % 7 === 0 => 'weekly_overdue',
                    default => null,
                };

                if ($type === null) {
                    return;
                }

                $event = $invoice->notificationEvents()->firstOrCreate([
                    'type' => $type,
                    'scheduled_for' => $today,
                ]);

                if ($event->dispatched_at !== null) {
                    return;
                }

                $invoice->service->user->notify((new HostingInvoiceReminder($invoice, $type))->afterCommit());
                $event->update(['dispatched_at' => now()]);
            });
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
                    'billing_key' => $lockedService->id.':'.$periodStart->toDateString().':automatic',
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
                    $lockedService->update(['billing_status' => 'active']);
                }
            });
        } catch (QueryException $exception) {
            $billingKey = $service->id.':'.$periodStart->toDateString().':automatic';

            if (! HostingInvoice::where('billing_key', $billingKey)->exists()) {
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
