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
            $table->string('type'); // Pode ser 'aggregated', 'autonomous' ou 'fleet'
            $table->string('flagProduct')->nullable();
            $table->string('codCCD')->nullable();
            $table->string('codCCT')->nullable();
            $table->string('codCCV')->nullable();
            $table->string('codCCN')->nullable();
            $table->string('codPrecification')->nullable();
            $table->boolean('flagSpecialAnalysis')->nullable();
            $table->string('cpf')->nullable();
            $table->string('name')->nullable();
            $table->string('motherName')->nullable();
            $table->date('birthDate')->nullable();
            $table->string('rgNumber')->nullable();
            $table->string('rgUf')->nullable();
            $table->string('cnhRegisterNumber')->nullable();
            $table->string('cnhSecurityNumber')->nullable();
            $table->string('cnhUf')->nullable();
            $table->text('cnhBase64Document')->nullable();
            $table->boolean('personFlagAntt')->nullable();
            $table->boolean('vehicleFlagSpecialAnalysis01')->nullable();
            $table->string('vehiclePlate01')->nullable();
            $table->string('vehicleRenavam01')->nullable();
            $table->string('vehicleUf01')->nullable();
            $table->string('vehicleOwnerDocument01')->nullable();
            $table->string('vehiclePossesionDocument01')->nullable();
            $table->text('vehicleBase64Document01')->nullable();
            $table->string('vehicleRntrcNumber01')->nullable();
            $table->boolean('vehicleFlagAntt01')->nullable();
            $table->boolean('dProcessOnVehicle01')->nullable();
            $table->boolean('vehicleFlagSpecialAnalysis02')->nullable();
            $table->string('vehiclePlate02')->nullable();
            $table->string('vehicleRenavam02')->nullable();
            $table->string('vehicleUf02')->nullable();
            $table->string('vehicleOwnerDocument02')->nullable();
            $table->string('vehiclePossesionDocument02')->nullable();
            $table->text('vehicleBase64Document02')->nullable();
            $table->string('vehicleRntrcNumber02')->nullable();
            $table->boolean('vehicleFlagAntt02')->nullable();
            $table->boolean('dProcessOnVehicle02')->nullable();
            $table->boolean('vehicleFlagSpecialAnalysis03')->nullable();
            $table->string('vehiclePlate03')->nullable();
            $table->string('vehicleRenavam03')->nullable();
            $table->string('vehicleUf03')->nullable();
            $table->string('vehicleOwnerDocument03')->nullable();
            $table->string('vehiclePossesionDocument03')->nullable();
            $table->text('vehicleBase64Document03')->nullable();
            $table->string('vehicleRntrcNumber03')->nullable();
            $table->boolean('vehicleFlagAntt03')->nullable();
            $table->boolean('dProcessOnVehicle03')->nullable();
            $table->boolean('vehicleFlagSpecialAnalysis04')->nullable();
            $table->string('vehiclePlate04')->nullable();
            $table->string('vehicleRenavam04')->nullable();
            $table->string('vehicleUf04')->nullable();
            $table->string('vehicleOwnerDocument04')->nullable();
            $table->string('vehiclePossesionDocument04')->nullable();
            $table->text('vehicleBase64Document04')->nullable();
            $table->string('vehicleRntrcNumber04')->nullable();
            $table->boolean('vehicleFlagAntt04')->nullable();
            $table->boolean('dProcessOnVehicle04')->nullable();
            $table->bigInteger('profileCode')->nullable();
            $table->string('regionOrigin')->nullable();
            $table->string('regionDestiny')->nullable();
            $table->foreignId('query_id')->constrained()->onDelete('cascade');
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
