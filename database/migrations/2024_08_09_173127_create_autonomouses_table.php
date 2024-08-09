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
        Schema::create('autonomouses', function (Blueprint $table) {
            $table->id();
            $table->string('flagProduct')->nullable();
            $table->string('codCCD')->nullable();
            $table->string('codCCT')->nullable();
            $table->string('codCCV')->nullable();
            $table->string('codPrecification')->nullable();
            $table->string('cpf')->nullable();
            $table->string('name')->nullable();
            $table->string('motherName')->nullable();
            $table->date("birthDate")->nullable();
            $table->string('rgNumber')->nullable();
            $table->string('rgUf')->nullable();
            $table->string('cnhRegisterNumber')->nullable();
            $table->string('cnhSecurityNumber')->nullable();
            $table->string('cnhUf')->nullable();
            $table->string('personFlagAntt')->nullable();
            $table->string('vehiclePlate01')->nullable();
            $table->string('vehicleRenavam01')->nullable();
            $table->string('vehicleUf01')->nullable();
            $table->string('vehicleOwnerDocument01')->nullable();
            $table->string('vehicleRntrcNumber01')->nullable();
            $table->string('vehicleFlagAntt01')->nullable();
            $table->string('dProcessOnVehicle01')->nullable();
            $table->string('vehiclePlate02')->nullable();
            $table->string('vehicleRenavam02')->nullable();
            $table->string('vehicleUf02')->nullable();
            $table->string('vehicleOwnerDocument02')->nullable();
            $table->string('vehicleRntrcNumber02')->nullable();
            $table->string('vehicleFlagAntt02')->nullable();
            $table->string('dProcessOnVehicle02')->nullable();
            $table->string('vehiclePlate03')->nullable();
            $table->string('vehicleRenavam03')->nullable();
            $table->string('vehicleUf03')->nullable();
            $table->string('vehicleOwnerDocument03')->nullable();
            $table->string('vehicleRntrcNumber03')->nullable();
            $table->string('vehicleFlagAntt03')->nullable();
            $table->string('dProcessOnVehicle03')->nullable();
            $table->string('vehiclePlate04')->nullable();
            $table->string('vehicleRenavam04')->nullable();
            $table->string('vehicleUf04')->nullable();
            $table->string('vehicleOwnerDocument04')->nullable();
            $table->string('vehicleRntrcNumber04')->nullable();
            $table->string('vehicleFlagAntt04')->nullable();
            $table->string('dProcessOnVehicle04')->nullable();
            $table->foreignId('query_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autonomouses');
    }
};
