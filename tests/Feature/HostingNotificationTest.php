<?php

namespace Tests\Feature;

use App\Models\HostingInvoice;
use App\Notifications\HostingInvoiceReminder;
use App\Services\HostingBilling;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class HostingNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_due_reminder_is_sent_once_by_email_and_database(): void
    {
        $this->travelTo('2026-03-14 08:00:00');
        $invoice = HostingInvoice::factory()->create([
            'status' => 'unpaid',
            'issued_at' => '2026-03-10',
            'due_at' => '2026-03-17',
        ]);
        Notification::fake([HostingInvoiceReminder::class]);

        app(HostingBilling::class)->processToday();
        app(HostingBilling::class)->processToday();

        Notification::assertSentToTimes($invoice->service->user, HostingInvoiceReminder::class, 1);
        $this->assertDatabaseCount('hosting_notification_events', 1);
    }

    public function test_paid_invoice_receives_no_reminder(): void
    {
        $this->travelTo('2026-03-14 08:00:00');
        HostingInvoice::factory()->create(['status' => 'paid', 'due_at' => '2026-03-17']);
        Notification::fake([HostingInvoiceReminder::class]);

        app(HostingBilling::class)->processToday();

        Notification::assertNothingSent();
        $this->assertDatabaseCount('hosting_notification_events', 0);
    }
}
