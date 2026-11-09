<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('webia_templates')
            ->where('slug', 'fnb-cafe-vintage')
            ->update(['site_config_path' => 'f&b/vintage/cafe-earthtone/cafe']);
    }

    public function down(): void
    {
        DB::table('webia_templates')
            ->where('slug', 'fnb-cafe-vintage')
            ->update(['site_config_path' => null]);
    }
};
