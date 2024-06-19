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
        Schema::table('driver_licenses', function (Blueprint $table) {
            $table->string('cpf');
            $table->string('uf_license');
            $table->string('license_number');
            $table->string('security_code');
            $table->foreignId('query_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('driver_licenses', function (Blueprint $table) {
            $table->dropColumn('cpf');
            $table->dropColumn('uf_license');
            $table->dropColumn('license_number');
            $table->dropColumn('security_code');
            $table->dropForeign(['query_id']);
            $table->dropColumn('query_id');
        });
    }
};
