<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('webia_packages', function (Blueprint $table) {
            $table->unsignedBigInteger('hosting_monthly_price')->default(0)->after('price');
        });

        Schema::table('hosting_services', function (Blueprint $table) {
            $table->foreignId('webia_order_id')->nullable()->after('user_id')->constrained()->nullOnDelete();
        });

        DB::table('webia_packages')->where('slug', 'pixel')->update(['hosting_monthly_price' => 150000]);
        DB::table('webia_packages')->where('slug', 'pulse')->update(['hosting_monthly_price' => 175000]);
        DB::table('webia_packages')->where('slug', 'nexus')->update(['hosting_monthly_price' => 225000]);
        DB::table('webia_packages')->where('slug', 'infinity')->update(['hosting_monthly_price' => 300000]);

        Schema::table('hosting_services', function (Blueprint $table) {
            $table->unique('webia_order_id');
        });
    }

    public function down(): void
    {
        Schema::table('hosting_services', function (Blueprint $table) {
            $table->dropConstrainedForeignId('webia_order_id');
        });

        Schema::table('webia_packages', function (Blueprint $table) {
            $table->dropColumn('hosting_monthly_price');
        });
    }
};
