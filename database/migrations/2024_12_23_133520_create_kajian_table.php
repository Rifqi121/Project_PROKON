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
        Schema::create('kajian', function (Blueprint $table) {
            $table->id();
            $table->text('judul_jadwal_kajian');  // Gunakan text untuk judul jika panjang lebih dari 255 karakter
            $table->date('tanggal_jadwal_kajian');
            $table->string('pengisi_jadwal_kajian');
            $table->text('deskripsi_jadwal_kajian');  // Gunakan text untuk deskripsi agar lebih fleksibel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kajian');
    }
};