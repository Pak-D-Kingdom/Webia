<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('webia_orders', function (Blueprint $table) {
            $table->json('package_snapshot')->nullable()->after('webia_package_id');
            $table->json('addon_snapshot')->default('[]')->after('addon_ids');
        });
    }

    public function down(): void
    {
        Schema::table('webia_orders', function (Blueprint $table) {
            $table->dropColumn(['package_snapshot', 'addon_snapshot']);
        });
    }
};
