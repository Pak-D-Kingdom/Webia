<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webia_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('order_number')->unique();
            $table->foreignId('webia_package_id')->constrained()->restrictOnDelete();
            $table->foreignId('webia_template_id')->nullable()->constrained()->nullOnDelete();
            $table->string('category_slug', 80)->nullable();
            $table->json('addon_ids')->nullable();
            $table->string('status', 40)->default('awaiting_payment')->index();
            $table->unsignedBigInteger('total_price');
            $table->string('payment_receipt_path')->nullable();
            $table->string('payment_note', 500)->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webia_orders');
    }
};
