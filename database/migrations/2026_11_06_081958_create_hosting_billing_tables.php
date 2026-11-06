<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hosting_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->string('website_name');
            $table->string('domain');
            $table->unsignedBigInteger('monthly_price');
            $table->date('activation_date');
            $table->unsignedTinyInteger('billing_cycle_day');
            $table->date('stopped_at')->nullable();
            $table->string('billing_status', 20)->default('scheduled')->index();
            $table->string('operational_status', 30)->default('pending_activation');
            $table->timestamps();
        });

        Schema::create('hosting_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hosting_service_id')->constrained()->cascadeOnDelete();
            $table->string('invoice_number', 24)->nullable()->unique();
            $table->string('label')->nullable();
            $table->date('period_start');
            $table->date('period_end');
            $table->timestamp('issued_at');
            $table->timestamp('due_at');
            $table->unsignedBigInteger('amount');
            $table->string('status', 20)->default('unpaid')->index();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->foreignId('cancelled_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('cancellation_reason')->nullable();
            $table->foreignId('replacement_for_id')->nullable()->constrained('hosting_invoices')->nullOnDelete();
            $table->timestamps();

            $table->unique(['hosting_service_id', 'period_start']);
        });

        Schema::create('hosting_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hosting_invoice_id')->constrained()->cascadeOnDelete();
            $table->string('provider', 20)->default('midtrans');
            $table->string('midtrans_order_id', 64)->unique();
            $table->string('snap_token', 100)->nullable();
            $table->string('snap_redirect_url', 500)->nullable();
            $table->string('status', 20)->default('created')->index();
            $table->json('payload')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });

        Schema::create('hosting_price_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hosting_service_id')->constrained()->cascadeOnDelete();
            $table->foreignId('changed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->unsignedBigInteger('old_price');
            $table->unsignedBigInteger('new_price');
            $table->timestamps();
        });

        Schema::create('hosting_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hosting_service_id')->constrained()->cascadeOnDelete();
            $table->string('type', 30);
            $table->string('status', 20)->default('pending')->index();
            $table->foreignId('completed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
        });

        Schema::create('hosting_notification_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hosting_invoice_id')->constrained()->cascadeOnDelete();
            $table->string('type', 30);
            $table->date('scheduled_for');
            $table->timestamp('dispatched_at')->nullable();
            $table->timestamps();

            $table->unique(['hosting_invoice_id', 'type', 'scheduled_for']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hosting_notification_events');
        Schema::dropIfExists('hosting_tasks');
        Schema::dropIfExists('hosting_price_changes');
        Schema::dropIfExists('hosting_payments');
        Schema::dropIfExists('hosting_invoices');
        Schema::dropIfExists('hosting_services');
    }
};
