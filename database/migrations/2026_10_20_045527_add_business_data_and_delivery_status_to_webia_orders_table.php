<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('webia_orders', function (Blueprint $table) {
            $table->json('business_data')->nullable();
            $table->string('delivery_status', 40)->default('not_started')->index();
        });
    }

    public function down(): void
    {
        Schema::table('webia_orders', function (Blueprint $table) {
            $table->dropIndex(['delivery_status']);
            $table->dropColumn(['business_data', 'delivery_status']);
        });
    }
};
