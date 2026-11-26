<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('webia_orders', function (Blueprint $table) {
            $table->boolean('customer_ai_knowledge_editable')->default(true)->after('site_slug');
        });
    }

    public function down(): void
    {
        Schema::table('webia_orders', function (Blueprint $table) {
            $table->dropColumn('customer_ai_knowledge_editable');
        });
    }
};
