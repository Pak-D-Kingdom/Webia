<?php

namespace App\Notifications;

use App\Models\HostingInvoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HostingInvoiceReminder extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public HostingInvoice $invoice, public string $type) {}

    /** @return array<int, string> */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->subject())
            ->greeting('Halo, '.$notifiable->name)
            ->line($this->message())
            ->line('Nomor tagihan: '.$this->invoice->invoice_number)
            ->line('Nominal: Rp'.number_format($this->invoice->amount, 0, ',', '.'))
            ->action('Lihat tagihan', route('hosting-invoices.show', $this->invoice));
    }

    /** @return array<string, mixed> */
    public function toArray(object $notifiable): array
    {
        return [
            'hosting_invoice_id' => $this->invoice->id,
            'invoice_number' => $this->invoice->invoice_number,
            'type' => $this->type,
            'message' => $this->message(),
            'url' => route('hosting-invoices.show', $this->invoice),
        ];
    }

    private function subject(): string
    {
        return match ($this->type) {
            'issued' => 'Tagihan hosting baru',
            'due_in_3_days' => 'Tagihan hosting jatuh tempo dalam 3 hari',
            'due_tomorrow' => 'Tagihan hosting jatuh tempo besok',
            'due_today' => 'Tagihan hosting jatuh tempo hari ini',
            'overdue_3_days' => 'Tagihan hosting melewati jatuh tempo',
            'suspended' => 'Layanan hosting masuk status suspended',
            default => 'Pengingat tunggakan hosting',
        };
    }

    private function message(): string
    {
        return match ($this->type) {
            'issued' => 'Tagihan hosting baru telah diterbitkan.',
            'due_in_3_days' => 'Tagihan hosting akan jatuh tempo dalam 3 hari.',
            'due_tomorrow' => 'Tagihan hosting akan jatuh tempo besok.',
            'due_today' => 'Tagihan hosting jatuh tempo hari ini.',
            'overdue_3_days' => 'Tagihan hosting telah melewati jatuh tempo selama 3 hari.',
            'suspended' => 'Masa tenggang berakhir dan layanan hosting masuk status suspended.',
            default => 'Tagihan hosting masih belum dibayar.',
        };
    }
}
