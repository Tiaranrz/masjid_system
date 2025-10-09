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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->nullable();   // ✅ untuk nomor telepon
            $table->string('role')->default('user');      // ✅ contoh: superadmin, admin_masjid, user
            $table->unsignedBigInteger('gender_id')->nullable(); // ✅ relasi ke tabel genders (opsional)
            $table->timestamps();

            // Relasi opsional ke tabel genders (kalau ada tabel genders)
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
