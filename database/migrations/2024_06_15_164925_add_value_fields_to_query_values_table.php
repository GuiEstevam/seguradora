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
            Schema::table('query_values', function (Blueprint $table) {
                // Valor Agregado
                $table->decimal('aggregated_base', 8, 2)->nullable();
                $table->decimal('aggregated_additional', 8, 2)->nullable();
                $table->integer('aggregated_validity')->nullable();

                // Valor Autônomo
                $table->decimal('autonomous_base', 8, 2)->nullable();
                $table->decimal('autonomous_additional', 8, 2)->nullable();
                $table->integer('autonomous_validity')->nullable();

                // Valor Frota
                $table->decimal('fleet_base', 8, 2)->nullable();
                $table->decimal('fleet_additional', 8, 2)->nullable();
                $table->integer('fleet_validity')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('query_values', function (Blueprint $table) {
            $table->dropColumn(['aggregated_base', 'aggregated_additional', 'aggregated_validity']);
            $table->dropColumn(['autonomous_base', 'autonomous_additional', 'autonomous_validity']);
            $table->dropColumn(['fleet_base', 'fleet_additional', 'fleet_validity']);
        });
    }
};
