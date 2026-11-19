<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('webia_templates', function (Blueprint $table) {
            $table->string('site_config_path')->nullable()->after('template_url');
        });

        DB::table('webia_templates')
            ->where('slug', 'fnb-cafe-minimalis')
            ->update(['site_config_path' => 'f&b/minimalis/cafe-earthtone/cafe']);
    }

    public function down(): void
    {
        Schema::table('webia_templates', function (Blueprint $table) {
            $table->dropColumn('site_config_path');
        });
    }
};
