<?php

return [
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
];
