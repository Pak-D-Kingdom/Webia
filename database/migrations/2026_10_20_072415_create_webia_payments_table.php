<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webia_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('webia_order_id')->constrained('webia_orders')->cascadeOnDelete();
            $table->string('provider', 20)->default('midtrans');
            $table->string('midtrans_order_id', 64)->unique();
            $table->string('snap_token', 100)->nullable();
            $table->string('snap_redirect_url', 500)->nullable();
            $table->string('status', 20)->default('created')->index();
            $table->json('payload')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webia_payments');
    }
};
