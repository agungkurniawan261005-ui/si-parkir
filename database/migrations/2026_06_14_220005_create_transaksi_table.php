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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->unsignedInteger('id_kendaraan');
            $table->unsignedInteger('id_slot');
            $table->unsignedInteger('id_user');
            $table->datetime('waktu_masuk')->useCurrent()->index();
            $table->datetime('waktu_keluar')->nullable();
            $table->integer('total_bayar')->default(0);
            $table->enum('status', ['masuk', 'keluar'])->default('masuk')->index();

            // Foreign key ke tabel kendaraan
            $table->foreign('id_kendaraan')
                  ->references('id_kendaraan')
                  ->on('kendaraan')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            // Foreign key ke tabel slot_parkir
            $table->foreign('id_slot')
                  ->references('id_slot')
                  ->on('slot_parkir')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            // Foreign key ke tabel users
            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
