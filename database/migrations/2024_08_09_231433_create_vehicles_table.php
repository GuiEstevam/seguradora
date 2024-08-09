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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehiclePlate01')->nullable();
            $table->string('vehicleRenavam01')->nullable();
            $table->string('vehicleUf01')->nullable();
            $table->string('vehicleOwnerDocument01')->nullable();
            $table->string('vehicleRntrcNumber01')->nullable();
            $table->string('vehicleFlagAntt01')->nullable();
            $table->string('dProcessOnVehicle01')->nullable();
            $table->foreignId('query_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
