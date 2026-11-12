<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webia_package_template', function (Blueprint $table) {
            $table->foreignId('webia_package_id')->constrained()->cascadeOnDelete();
            $table->foreignId('webia_template_id')->constrained()->cascadeOnDelete();

            $table->primary(['webia_package_id', 'webia_template_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webia_package_template');
    }
};
