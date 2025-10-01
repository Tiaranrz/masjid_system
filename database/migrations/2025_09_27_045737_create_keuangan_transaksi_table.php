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
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id();

            // Kolom Type: Hanya menerima 'donasi' atau 'ziswaf'
            $table->enum('type', ['donasi', 'ziswaf']);

            $table->string('description')->nullable(); // Keterangan transaksi
            $table->decimal('amount', 15, 2); // Jumlah uang (memakai decimal untuk presisi)
            $table->date('transaction_date'); // Tanggal transaksi

            // Opsional: FK ke tabel yang menyimpan data pengurus/admin yang mencatat transaksi
            $table->foreignId('recorded_by_user_id')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keuangan');
    }
};
