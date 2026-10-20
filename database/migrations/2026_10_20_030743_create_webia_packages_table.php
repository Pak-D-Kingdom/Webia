<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webia_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description', 500);
            $table->unsignedBigInteger('old_price')->nullable();
            $table->unsignedBigInteger('price');
            $table->boolean('cms_enabled')->default(false);
            $table->unsignedInteger('chatbot_monthly_quota')->default(0);
            $table->json('features');
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webia_packages');
    }
};
