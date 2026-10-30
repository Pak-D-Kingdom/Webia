<?php

return [
    'dkreasi_url' => env('DKREASI_URL'),

    /*
    | Rekening transfer manual yang tampil pada instruksi pembayaran customer di halaman order.
    | Dummy awal: ganti dengan rekening aktif WEBIA sebelum production.
    */
    'payment_accounts' => [
        ['bank' => 'BCA', 'number' => '0000000000', 'holder' => 'WEBIA (dummy)'],
        ['bank' => 'Mandiri', 'number' => '1234567890', 'holder' => 'WEBIA (dummy)'],
    ],

    // Catatan opsional di bawah daftar rekening, misal: "Nama penerima harus sesuai."
    'payment_note' => null,

    /*
    | Midtrans Snap — pembayaran online di atas transfer manual.
    | Tanpa server_key, percobaan pembayaran disimulasikan lokal (dev/E2E).
    | Isi MIDTRANS_MERCHANT_ID + MIDTRANS_SERVER_KEY dari dashboard Midtrans sebelum production.
    */
    'midtrans' => [
        'merchant_id' => env('MIDTRANS_MERCHANT_ID'),
        'server_key' => env('MIDTRANS_SERVER_KEY'),
        // Client key dibutuhkan snap.js untuk popup pembayaran inline di halaman kita.
        'client_key' => env('MIDTRANS_CLIENT_KEY'),
        'is_production' => env('MIDTRANS_ENV', 'sandbox') === 'production',
    ],
];
