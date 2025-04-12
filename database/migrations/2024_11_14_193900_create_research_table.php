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
        Schema::create('researches', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'individual_driver', 'individual_vehicle', 'unified'
            $table->json('driver_data')->nullable(); // Dados do motorista (CPF, CNH, etc.)
            $table->json('vehicle_data')->nullable(); // Dados do veículo (placa, RENAVAM, etc.)
            $table->foreignId('query_id')->constrained()->onDelete('cascade'); // Relacionamento com queries
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('researches');
    }
};
