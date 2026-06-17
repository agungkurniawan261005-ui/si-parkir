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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->increments('id_kendaraan');
            $table->string('plat_nomor', 20)->unique();
            $table->string('jenis_kendaraan', 50);
            $table->string('pemilik', 100);
            $table->unsignedInteger('id_tarif');

            // Foreign key ke tabel tarif
            $table->foreign('id_tarif')
                  ->references('id_tarif')
                  ->on('tarif')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
