<?php

namespace App\Models;

use Database\Factories\WebiaOrderFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Cache;

#[Fillable([
    'user_id', 'guest_name', 'guest_email', 'order_number', 'webia_package_id', 'package_snapshot', 'webia_template_id', 'template_snapshot', 'category_slug',
    'addon_ids', 'addon_snapshot', 'status', 'credential_status', 'credential_requires_password_setup', 'total_price', 'payment_receipt_path', 'payment_note', 'paid_at',
    'business_data', 'delivery_status', 'site_slug', 'customer_ai_knowledge_editable',
])]
class WebiaOrder extends Model
{
    /** @use HasFactory<WebiaOrderFactory> */
    use HasFactory;

    protected static function booted(): void
    {
        static::saved(function (WebiaOrder $order): void {
            self::flushCustomerSiteCache($order->site_slug);
            $originalSlug = $order->getOriginal('site_slug');
            if ($originalSlug && $originalSlug !== $order->site_slug) {
                self::flushCustomerSiteCache($originalSlug);
            }
        });

        static::deleted(function (WebiaOrder $order): void {
            self::flushCustomerSiteCache($order->site_slug);
        });
    }

    public static function flushCustomerSiteCache(?string $siteSlug): void
    {
        if (blank($siteSlug)) {
            return;
        }

        $verKey = "webia_site_ver:{$siteSlug}";
        Cache::forever($verKey, ((int) Cache::get($verKey, 1)) + 1);
    }

    public static function flushAllCustomerSiteCaches(): void
    {
        $verKey = 'webia_site_global_ver';
        Cache::forever($verKey, ((int) Cache::get($verKey, 1)) + 1);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(WebiaPackage::class, 'webia_package_id');
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(WebiaTemplate::class, 'webia_template_id');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(WebiaOrderLog::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(WebiaPayment::class);
    }

    public function hostingService(): HasOne
    {
        return $this->hasOne(HostingService::class);
    }

    public function siteConfigPath(): ?string
    {
        return $this->template_snapshot['site_config_path']
            ?? $this->template?->site_config_path
            ?? ($this->delivery_status === 'delivered' ? 'f&b/minimalis/cafe-earthtone/cafe' : null);
    }

    public function supportsCustomerSite(): bool
    {
        return filled($this->site_slug) || filled($this->siteConfigPath());
    }

    public function getProgressIndexAttribute(): int
    {
        return match (true) {
            $this->delivery_status === 'delivered' => 4,
            $this->delivery_status === 'in_progress' => 3,
            $this->status === 'paid' => 2,
            $this->status === 'payment_uploaded' => 1,
            default => 0,
        };
    }

    protected function casts(): array
    {
        return [
            'package_snapshot' => 'array',
            'template_snapshot' => 'array',
            'addon_ids' => 'array',
            'addon_snapshot' => 'array',
            'business_data' => 'array',
            'paid_at' => 'datetime',
            'credential_requires_password_setup' => 'boolean',
            'customer_ai_knowledge_editable' => 'boolean',
        ];
    }
}
