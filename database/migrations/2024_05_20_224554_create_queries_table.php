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
        Schema::create('queries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enterprise_id')->constrained();
            $table->string('type'); // Tipo da pesquisa (individual_driver, individual_vehicle, unified)
            $table->string('subtype')->nullable(); // Subtipo da pesquisa (driver, vehicle)
            $table->decimal('value', 10, 2)->nullable(); // Valor da pesquisa
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queries');
    }
};
