<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            // Sesuaikan tipe dengan tenants.id (string)
            $table->string('tenant_id');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');

            $table->string('judul_event', 500);
            $table->text('description')->nullable();
            $table->dateTime('event_date');
            $table->enum('status', ['upcoming', 'ongoing', 'finished'])->default('upcoming');
            $table->string('location', 500)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('events');
    }
};
