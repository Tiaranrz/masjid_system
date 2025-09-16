<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('masjid', function (Blueprint $table) {
            $table->id('id_masjid');
            $table->string('nama_masjid', 255);
            $table->text('alamat');
            $table->string('kontak', 50)->nullable();
            $table->string('email', 255)->unique()->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('masjid');
    }
};
