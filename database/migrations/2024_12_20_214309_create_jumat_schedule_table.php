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
        Schema::create('jumat_schedule', function (Blueprint $table) {
            $table->id();
            $table->string('khotib_jadwal_jumat');
            $table->string('muadzin_jadwal_jumat');
            $table->date('tanggal_jadwal_jumat')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jumat_schedule');
    }
};