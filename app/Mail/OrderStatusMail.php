<?php

namespace App\Mail;

use App\Models\WebiaOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var array<string, array{subject: string, heading: string, intro: string}> */
    public const TYPES = [
        'paid' => [
            'subject' => 'Pembayaran dikonfirmasi',
            'heading' => 'Pembayaran kamu dikonfirmasi 🎉',
            'intro' => 'Terima kasih! Pesanan kamu sudah kami terima dan akan mulai kami kerjakan.',
        ],
        'rejected' => [
            'subject' => 'Pembayaran ditolak',
            'heading' => 'Pembayaran kamu ditolak',
            'intro' => 'Mohon periksa bukti pembayarannya lalu unggah ulang, atau hubungi kami.',
        ],
        'in_progress' => [
            'subject' => 'Pesanan mulai dikerjakan',
            'heading' => 'Pesanan kamu mulai dikerjakan',
            'intro' => 'Tim kami sudah mulai mengerjakan website kamu. Pantau progresnya di dashboard.',
        ],
        'delivered' => [
            'subject' => 'Website kamu selesai',
            'heading' => 'Website kamu selesai 🎉',
            'intro' => 'Website kamu sudah selesai dikerjakan. Silakan periksa hasilnya.',
        ],
        'admin_verify' => [
            'subject' => 'Verifikasi pembayaran diperlukan',
            'heading' => 'Bukti pembayaran baru menunggu verifikasi',
            'intro' => 'Seorang customer mengunggah bukti transfer dan menunggu diverifikasi.',
        ],
    ];

    public function __construct(
        public WebiaOrder $order,
        public string $type,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: self::TYPES[$this->type]['subject'].' — '.$this->order->order_number,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-status',
            with: [
                'heading' => self::TYPES[$this->type]['heading'],
                'intro' => self::TYPES[$this->type]['intro'],
                'url' => in_array($this->type, ['admin_verify'], true)
                    ? route('admin.orders.show', $this->order)
                    : route('orders.show', $this->order),
            ],
        );
    }
}
