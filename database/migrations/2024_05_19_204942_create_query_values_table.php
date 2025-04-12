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
        Schema::create('query_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enterprise_id')->constrained();

            // Preços para pesquisas individuais
            $table->decimal('individual_driver_price', 10, 2)->nullable();
            $table->decimal('individual_vehicle_price', 10, 2)->nullable();

            // Preços para pesquisas unificadas
            $table->decimal('unified_price', 10, 2)->nullable();

            // Validade das pesquisas
            $table->integer('validity_days')->nullable();

            // Campos de recorrência
            $table->boolean('individual_driver_recurring')->default(true);
            $table->boolean('individual_vehicle_recurring')->default(true);
            $table->boolean('unified_recurring')->default(true);

            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('query_values');
    }
};
