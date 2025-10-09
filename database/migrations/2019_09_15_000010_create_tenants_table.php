<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->string('id')->primary(); // Tenancy default
            $table->string('name', 100); // Nama masjid
            $table->text('address'); // Alamat masjid
            $table->string('geo_location', 255)->nullable(); // Titik koordinat
            $table->string('phone', 20)->nullable(); // No telepon
            $table->string('email', 100)->nullable()->unique(); // Email masjid
            $table->date('established_date')->nullable(); // Tanggal berdiri
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status masjid

            $table->timestamps();
            $table->json('data')->nullable(); // Tenancy default
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
}
