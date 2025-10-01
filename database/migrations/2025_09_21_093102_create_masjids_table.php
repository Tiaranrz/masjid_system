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
        Schema::create('masjids', function (Blueprint $table) {
            $table->id();
            $table->string('name');                     // Nama masjid
            $table->string('slug')->unique();           // Slug unik
            $table->string('address')->nullable();      // Alamat masjid
            $table->string('contact_person')->nullable(); // Penanggung jawab
            $table->string('phone')->nullable();        // Nomor telepon
            $table->string('email')->nullable();        // Email
            $table->text('description')->nullable();    // Deskripsi
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status aktif/tidak
            $table->timestamps();
            $table->softDeletes();                      // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masjids');
    }
};
