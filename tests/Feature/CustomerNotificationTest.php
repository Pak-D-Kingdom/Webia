<?php

namespace Tests\Feature;

use App\Models\HostingInvoice;
use App\Models\User;
use App\Notifications\HostingInvoiceReminder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_sees_only_own_notifications_and_can_mark_one_read(): void
    {
        $customer = User::factory()->create();
        $invoice = HostingInvoice::factory()->create();
        $invoice->service->update(['user_id' => $customer->id]);
        $customer->notifyNow(new HostingInvoiceReminder($invoice, 'due_tomorrow'), ['database']);

        $other = User::factory()->create();
        $otherInvoice = HostingInvoice::factory()->create();
        $otherInvoice->service->update(['user_id' => $other->id]);
        $other->notifyNow(new HostingInvoiceReminder($otherInvoice, 'due_tomorrow'), ['database']);

        $notification = $customer->notifications()->sole();
        $this->actingAs($customer)->get(route('notifications.index'))
            ->assertOk()
            ->assertSee($invoice->invoice_number)
            ->assertDontSee($otherInvoice->invoice_number);

        $this->actingAs($customer)->post(route('notifications.read', $notification->id))
            ->assertRedirect(route('hosting-invoices.show', $invoice));
        $this->assertNotNull($notification->fresh()->read_at);
    }

    public function test_customer_cannot_mark_another_users_notification_read(): void
    {
        $owner = User::factory()->create();
        $invoice = HostingInvoice::factory()->create();
        $invoice->service->update(['user_id' => $owner->id]);
        $owner->notifyNow(new HostingInvoiceReminder($invoice, 'due_today'), ['database']);

        $this->actingAs(User::factory()->create())
            ->post(route('notifications.read', $owner->notifications()->sole()->id))
            ->assertNotFound();
    }

    public function test_customer_can_delete_own_notification(): void
    {
        $customer = User::factory()->create();
        $invoice = HostingInvoice::factory()->create();
        $invoice->service->update(['user_id' => $customer->id]);
        $customer->notifyNow(new HostingInvoiceReminder($invoice, 'issued'), ['database']);

        $notification = $customer->notifications()->sole();

        $this->actingAs($customer)->get(route('notifications.index'))
            ->assertOk()
            ->assertSee('notif-delete-'.$notification->id, false)
            ->assertSee('Tidak dapat dipulihkan');

        $this->actingAs($customer)->delete(route('notifications.destroy', $notification->id))
            ->assertRedirect(route('notifications.index'))
            ->assertSessionHas('status', 'Notifikasi dihapus.');
        $this->assertDatabaseCount('notifications', 0);
    }

    public function test_customer_cannot_delete_another_users_notification(): void
    {
        $owner = User::factory()->create();
        $invoice = HostingInvoice::factory()->create();
        $invoice->service->update(['user_id' => $owner->id]);
        $owner->notifyNow(new HostingInvoiceReminder($invoice, 'issued'), ['database']);

        $this->actingAs(User::factory()->create())
            ->delete(route('notifications.destroy', $owner->notifications()->sole()->id))
            ->assertNotFound();
        $this->assertDatabaseCount('notifications', 1);
    }
}
