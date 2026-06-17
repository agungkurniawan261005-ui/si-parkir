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
        Schema::create('slot_parkir', function (Blueprint $table) {
            $table->increments('id_slot');
            $table->string('kode_slot', 20)->unique();
            $table->enum('status', ['kosong', 'terisi'])->default('kosong')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slot_parkir');
    }
};
