<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('query_values', function (Blueprint $table) {
            $table->boolean('autonomous_recurring')->default(true)->after('autonomous_validity');
            $table->boolean('aggregated_recurring')->default(true)->after('aggregated_validity');
            $table->boolean('fleet_recurring')->default(true)->after('fleet_validity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('query_values', function (Blueprint $table) {
            $table->dropColumn('autonomous_recurring');
            $table->dropColumn('aggregated_recurring');
            $table->dropColumn('fleet_recurring');
        });
    }
};
