<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webia_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category_slug', 80)->index();
            $table->string('category_label', 120);
            $table->json('business_types');
            $table->string('design_style', 80)->index();
            $table->string('color_theme', 100)->nullable();
            $table->string('description', 500);
            $table->string('preview_style', 100)->default('preview-beauty');
            $table->string('eyebrow', 180)->nullable();
            $table->string('headline', 255)->nullable();
            $table->string('tag', 120)->nullable();
            $table->string('preview_folder')->nullable();
            $table->string('template_url')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webia_templates');
    }
};
