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
        Schema::table('enterprises', function (Blueprint $table) {
            $table->string('state_registration', 20)->nullable();
            $table->string('address');
            $table->string('number', 10);
            $table->string('uf', 2);
            $table->string('complement')->nullable();
            $table->string('cep', 15);
            $table->string('district');
            $table->string('city');
            $table->foreignId('user_id')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enterprises', function (Blueprint $table) {
            $table->dropColumn([
                'state_registration',
                'address',
                'number',
                'uf',
                'complement',
                'cep',
                'district',
                'city',
                'user_id'
            ]);
        });
    }
};
