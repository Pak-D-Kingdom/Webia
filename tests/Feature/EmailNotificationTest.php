<?php

namespace Tests\Feature;

use App\Mail\OrderStatusMail;
use App\Models\User;
use App\Models\WebiaOrder;
use App\Models\WebiaPayment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EmailNotificationTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        config(['webia.midtrans.server_key' => 'SB-Mid-server-test-key']);
        $this->admin = User::factory()->create(['role' => 'admin']);
    }

    public function test_midtrans_settlement_emails_customer_paid(): void
    {
        Mail::fake();
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01']);

        $payload = ['order_id' => 'WEB-'.$order->id.'-01', 'status_code' => '200', 'gross_amount' => '499000', 'transaction_status' => 'settlement'];
        $this->postJson(route('payments.midtrans.notify'), $payload + ['signature_key' => $this->signature($payload)])->assertOk();

        Mail::assertSent(fn (OrderStatusMail $mail): bool => $mail->type === 'paid'
            && str_contains($mail->envelope()->subject, $order->order_number));
    }

    public function test_duplicate_settlement_does_not_email_again(): void
    {
        Mail::fake();
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);
        WebiaPayment::factory()->create(['webia_order_id' => $order->id, 'midtrans_order_id' => 'WEB-'.$order->id.'-01']);

        $payload = ['order_id' => 'WEB-'.$order->id.'-01', 'status_code' => '200', 'gross_amount' => '499000', 'transaction_status' => 'settlement'];
        $this->postJson(route('payments.midtrans.notify'), $payload + ['signature_key' => $this->signature($payload)])->assertOk();
        $this->postJson(route('payments.midtrans.notify'), $payload + ['signature_key' => $this->signature($payload)])->assertOk();

        Mail::assertSentCount(1);
    }

    public function test_uploading_receipt_notifies_admins(): void
    {
        Mail::fake();
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);

        $this->actingAs($order->user)
            ->post(route('orders.receipt', $order), ['payment_receipt' => UploadedFile::fake()->image('receipt.jpg')])
            ->assertSessionHasNoErrors();

        Mail::assertSent(fn (OrderStatusMail $mail): bool => $mail->type === 'admin_verify'
            && $mail->hasTo($this->admin->email));
    }

    public function test_admin_verification_emails_customer(): void
    {
        Mail::fake();
        $order = WebiaOrder::factory()->create(['status' => 'payment_uploaded', 'payment_receipt_path' => 'payment-receipts/x.jpg']);

        // Approve → email 'paid' ke customer.
        $this->actingAs($this->admin)->post(route('admin.orders.verify', $order), ['action' => 'approve'])->assertRedirect();
        Mail::assertSent(fn (OrderStatusMail $mail): bool => $mail->type === 'paid' && $mail->hasTo($order->user->email));

        // Reject → email 'rejected' setelah admin mengembalikan status.
        WebiaOrder::whereKey($order->id)->update(['status' => 'payment_uploaded', 'paid_at' => null]);
        $this->actingAs($this->admin)->post(route('admin.orders.verify', $order), ['action' => 'reject', 'note' => 'bukti buram'])->assertRedirect();
        Mail::assertSent(fn (OrderStatusMail $mail): bool => $mail->type === 'rejected' && $mail->hasTo($order->user->email));
    }

    public function test_delivery_progress_emails_customer(): void
    {
        Mail::fake();
        $order = WebiaOrder::factory()->create(['status' => 'paid', 'delivery_status' => 'not_started']);

        $this->actingAs($this->admin)->post(route('admin.orders.progress', $order), ['action' => 'start']);
        $this->actingAs($this->admin)->post(route('admin.orders.progress', $order), ['action' => 'finish']);

        Mail::assertSent(fn (OrderStatusMail $mail): bool => $mail->type === 'in_progress' && $mail->hasTo($order->user->email));
        Mail::assertSent(fn (OrderStatusMail $mail): bool => $mail->type === 'delivered' && $mail->hasTo($order->user->email));
    }

    public function test_email_body_links_to_order_page(): void
    {
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);

        $html = (new OrderStatusMail($order, 'paid'))->render();

        $this->assertStringContainsString($order->order_number, $html);
        $this->assertStringContainsString(route('orders.show', $order), $html);
    }

    private function signature(array $payload): string
    {
        return hash('sha512', $payload['order_id'].$payload['status_code'].$payload['gross_amount'].'SB-Mid-server-test-key');
    }
}
