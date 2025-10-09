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
        // Cek dulu apakah tabel 'keuangan' sudah ada
        if (!Schema::hasTable('keuangan')) {
            Schema::create('keuangan', function (Blueprint $table) {
                $table->id();
                $table->string('jenis'); // donasi / ziswaf
                $table->string('nama_donatur');
                $table->decimal('jumlah', 15, 2);
                $table->date('tanggal');
                $table->string('metode_pembayaran')->nullable();
                $table->text('keterangan')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('keuangan')) {
            Schema::dropIfExists('keuangan');
        }
    }
};
