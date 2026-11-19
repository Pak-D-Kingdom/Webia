<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('webia_orders', function (Blueprint $table): void {
            $table->boolean('credential_requires_password_setup')->default(false)->after('credential_status');
            $table->dropColumn('credential_password');
        });
    }

    public function down(): void
    {
        Schema::table('webia_orders', function (Blueprint $table): void {
            $table->text('credential_password')->nullable()->after('credential_status');
            $table->dropColumn('credential_requires_password_setup');
        });
    }
};
