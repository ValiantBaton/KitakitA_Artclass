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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas', 255);
            $table->foreignId('id_pengajar')->constrained('users')->cascadeOnDelete();
            $table->enum('tipe', ['privat', 'kelompok']);
            $table->enum('paket', ['reguler', 'plus']);
            $table->enum('status', ['berjalan', 'libur']);
            $table->text('alasan_libur')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
