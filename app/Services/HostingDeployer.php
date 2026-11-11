<?php

namespace App\Services;

use App\Models\HostingService;
use Illuminate\Support\Facades\Process;
use RuntimeException;

class HostingDeployer
{
    public function deploy(HostingService $service): void
    {
        $configuration = config('webia.hosting.ssh');

        foreach (['binary', 'host', 'user', 'private_key', 'known_hosts', 'deploy_command'] as $key) {
            if (blank($configuration[$key] ?? null)) {
                throw new RuntimeException("Konfigurasi hosting SSH [{$key}] belum tersedia.");
            }
        }

        $payload = json_encode([
            'domain' => $service->domain,
            'order_number' => $service->order?->order_number,
            'site_config_path' => $service->order?->siteConfigPath(),
        ], JSON_THROW_ON_ERROR);

        $result = Process::input($payload)
            ->timeout((int) $configuration['timeout'])
            ->run([
                (string) $configuration['binary'],
                '-p', (string) $configuration['port'],
                '-i', (string) $configuration['private_key'],
                '-o', 'BatchMode=yes',
                '-o', 'StrictHostKeyChecking=yes',
                '-o', 'UserKnownHostsFile='.$configuration['known_hosts'],
                '--', $configuration['user'].'@'.$configuration['host'],
                (string) $configuration['deploy_command'],
            ]);

        if ($result->failed()) {
            throw new RuntimeException('Deploy website gagal: '.trim($result->errorOutput() ?: $result->output()));
        }
    }
}
