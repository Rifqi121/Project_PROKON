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
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->string('judul_laporan');
        $table->date('tanggal_laporan');
        $table->decimal('jumlah_laporan', 10, 2)->default(0.00);
        $table->enum('jenis_laporan', ['Pendapatan', 'Pengeluaran', 'Transaksi']);
        $table->timestamps();

        $table->index('tanggal_laporan');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};