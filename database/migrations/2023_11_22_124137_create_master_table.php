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
        Schema::create('master', function (Blueprint $table) {
            $table->id();
            $table->string('merek_mobil');
            $table->string('model_mobil');
            $table->string('plat_mobil');
            $table->string('stock_mobil');
            $table->string('tarif_sewa');
            $table->string('jenis_mobil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master');
    }
};
