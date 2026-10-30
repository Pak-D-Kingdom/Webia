<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('webia_orders', function (Blueprint $table) {
            // Akun baru dibuat setelah pembayaran lunas; sebelum itu identitas pemesan disimpan di order.
            $table->string('guest_name')->nullable()->after('user_id');
            $table->string('guest_email')->nullable()->index()->after('guest_name');
            $table->string('credential_status', 20)->default('pending')->index()->after('status');
            // Password plaintext terenkripsi hanya sampai email kredensial berhasil, lalu dihapus.
            $table->text('credential_password')->nullable()->after('credential_status');
        });
    }

    public function down(): void
    {
        Schema::table('webia_orders', function (Blueprint $table) {
            $table->dropIndex(['guest_email']);
            $table->dropColumn(['guest_name', 'guest_email', 'credential_status', 'credential_password']);
        });
    }
};
