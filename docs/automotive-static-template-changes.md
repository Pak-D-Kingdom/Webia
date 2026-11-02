Dokumentasi perubahan template automotive

Tanggal: 2026-10-28

Ringkasan

Template berikut sekarang berdiri sendiri sebagai halaman landing page statis:

- Artistic: Tidal Detail Co.
- Luxury: Noir Atelier
- Minimal: FORM / Auto Care

Perubahan yang dilakukan

1. Setiap template menjadi file Blade mandiri

   File yang diubah:

   - resources/views/website-bisnis/templates/automotive/artistic.blade.php
   - resources/views/website-bisnis/templates/automotive/luxury.blade.php
   - resources/views/website-bisnis/templates/automotive/minimal.blade.php

   Masing-masing file sekarang berisi struktur HTML lengkap: head, header, hero, services, selected work, packages, contact form, footer, stylesheet, dan JavaScript.

2. Menghapus ketergantungan halaman terhadap view bersama

   Sebelumnya tiga entry point hanya mengisi $themeKey lalu menjalankan:

   @include('website-bisnis.templates.automotive.show', ...)

   Sekarang tidak ada lagi include tersebut. Setiap halaman memiliki konten dan konfigurasi tampilannya sendiri sehingga perubahan pada satu template tidak mengubah dua template lainnya.

3. Mengubah konten dinamis menjadi konten statis

   Data yang sebelumnya diambil dari config/automotive.php dan dirender dengan @foreach sekarang ditulis langsung di masing-masing halaman, termasuk:

   - nama brand dan label tema
   - judul hero, deskripsi, jadwal, dan accent label
   - statistik
   - daftar services dan harga
   - portfolio / selected work
   - paket dan daftar fitur
   - pilihan layanan pada form
   - identitas footer

   Halaman tetap menggunakan asset() untuk memuat file CSS, JavaScript, dan gambar dari folder public Laravel. Ini hanya membantu resolusi URL asset; isi halaman tidak mengambil data dari database atau konfigurasi tema.

4. Setiap template hanya memiliki satu halaman

   Navigasi internal memakai anchor (#services, #packages, #work, dan #contact). Tidak ada route tambahan untuk katalog, detail, gallery, atau halaman turunan pada tiga template ini.

5. Fitur interaksi yang tetap dipertahankan

   - menu mobile pada layar kecil
   - smooth scroll melalui CSS
   - validasi form lokal melalui automotive.js
   - status validasi form tanpa request ke backend
   - tombol WhatsApp dan Google Maps

   Form tetap bersifat demo. Data tidak disimpan dan tidak dikirim ke server.

Route halaman

- /webia/template/tidal-detail-artistic-automotive
- /webia/template/noir-atelier-luxury-automotive
- /webia/template/form-auto-care-minimal-automotive

CSS dan JavaScript

Tidak ada perubahan pada asset bersama. Ketiga halaman tetap menggunakan:

- public/css/website-bisnis/templates/automotive/automotive.css
- public/js/website-bisnis/templates/automotive/automotive.js

Penghapusan view bersama

File resources/views/website-bisnis/templates/automotive/show.blade.php telah dihapus. Ketiga template sekarang sepenuhnya mandiri dan tidak bergantung pada view bersama tersebut.

config/automotive.php masih tersedia untuk kompatibilitas dengan bagian aplikasi lain, tetapi tidak digunakan oleh tiga halaman statis ini.
