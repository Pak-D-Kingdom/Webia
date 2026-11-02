<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('webia_orders', function (Blueprint $table) {
            $table->string('site_slug')->nullable()->unique();
        });
    }

    public function down(): void
    {
        Schema::table('webia_orders', function (Blueprint $table) {
            $table->dropColumn('site_slug');
        });
    }
};
