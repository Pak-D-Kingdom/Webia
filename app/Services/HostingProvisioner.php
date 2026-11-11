<?php

namespace App\Services;

use App\Models\HostingService;
use App\Models\HostingTask;
use App\Models\WebiaOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HostingProvisioner
{
    public function provision(WebiaOrder $order): ?HostingService
    {
        $order->refresh();

        if ($order->user_id === null || $order->status !== 'paid') {
            return null;
        }

        $monthlyPrice = (int) data_get($order->package_snapshot, 'hosting_monthly_price', 0);
        if ($monthlyPrice < 1) {
            return null;
        }

        return DB::transaction(function () use ($order, $monthlyPrice): HostingService {
            $order = WebiaOrder::whereKey($order->id)->lockForUpdate()->firstOrFail();
            $service = HostingService::firstOrCreate(
                ['webia_order_id' => $order->id],
                [
                    'user_id' => $order->user_id,
                    'website_name' => data_get($order->business_data, 'business_name', data_get($order->template_snapshot, 'name', $order->order_number)),
                    'domain' => Str::slug($order->site_slug ?: $order->order_number).'.'.config('webia.hosting.site_domain'),
                    'monthly_price' => $monthlyPrice,
                    'activation_date' => today(),
                    'billing_cycle_day' => today()->day,
                    'billing_status' => 'scheduled',
                    'operational_status' => 'pending_activation',
                ],
            );

            HostingTask::firstOrCreate([
                'hosting_service_id' => $service->id,
                'type' => 'deploy_website',
                'status' => 'pending',
            ]);

            return $service;
        });
    }
}
