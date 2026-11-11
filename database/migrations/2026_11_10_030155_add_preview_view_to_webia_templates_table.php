<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('webia_templates', function (Blueprint $table) {
            $table->string('preview_view')->nullable()->after('template_url');
        });
    }

    public function down(): void
    {
        Schema::table('webia_templates', function (Blueprint $table) {
            $table->dropColumn('preview_view');
        });
    }
};
