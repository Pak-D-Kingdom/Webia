<?php

namespace Database\Factories;

use App\Models\HostingInvoice;
use App\Models\HostingService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<HostingInvoice> */
class HostingInvoiceFactory extends Factory
{
    public function definition(): array
    {
        $periodStart = now()->startOfDay();

        return [
            'hosting_service_id' => HostingService::factory(),
            'invoice_number' => 'HST-'.$periodStart->format('Ym').'-'.Str::upper(Str::random(6)),
            'period_start' => $periodStart,
            'period_end' => $periodStart->copy()->addMonthNoOverflow()->subDay(),
            'issued_at' => $periodStart,
            'due_at' => $periodStart->copy()->addDays(7),
            'amount' => 150000,
            'status' => 'unpaid',
        ];
    }
}
