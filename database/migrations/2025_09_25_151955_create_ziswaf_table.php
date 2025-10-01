<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ziswaf', function (Blueprint $table) {
            $table->id();

            // Lebih jelas pakai length di string (misal max 100)
            $table->string('nama', 100)->comment('Nama muzakki/donatur');

            // Enum tetap oke, tapi biasanya lebih fleksibel pakai string
            // supaya kalau ada tambahan jenis baru tidak perlu ubah migration lama
            $table->enum('jenis', ['zakat', 'infak', 'sedekah', 'wakaf'])
                  ->comment('Jenis donasi: zakat/infak/sedekah/wakaf');

            // Decimal sudah tepat, tambahkan default biar aman
            $table->decimal('jumlah', 15, 2)->default(0)->comment('Nominal donasi');

            $table->text('keterangan')->nullable()->comment('Catatan tambahan');

            // tracking siapa yang input (opsional, kalau mau multi-user)
            // $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ziswaf');
    }
};
