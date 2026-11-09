<?php

namespace App\Console\Commands;

use App\Services\HostingBilling;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('hosting:process-billing')]
#[Description('Menerbitkan dan memperbarui tagihan hosting yang jatuh pada hari ini')]
class ProcessHostingBilling extends Command
{
    public function handle(HostingBilling $billing): int
    {
        $billing->processToday();
        $this->info('Tagihan hosting berhasil diproses.');

        return self::SUCCESS;
    }
}
