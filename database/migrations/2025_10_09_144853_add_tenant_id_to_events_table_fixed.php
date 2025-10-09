<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inventory', function (Blueprint $table) {
            // Tambahkan kolom tenant_id
            $table->string('tenant_id')->after('id')->default('masjid1');

            // Ubah kolom name menjadi asset_name untuk konsistensi
            $table->renameColumn('name', 'asset_name');

            // Ubah kolom price menjadi asset_price untuk konsistensi
            $table->renameColumn('price', 'asset_price');

            // Ubah kolom quantity menjadi unit untuk konsistensi
            $table->renameColumn('quantity', 'unit');

            // Ubah enum status dan condition
            $table->enum('condition', ['Baik', 'Rusak Ringan', 'Rusak Berat'])->default('Baik')->change();
            $table->enum('status', ['Tersedia', 'Dipinjam', 'Rusak', 'Dalam Perbaikan'])->default('Tersedia')->change();

            // Buat index untuk tenant_id
            $table->index('tenant_id');

            // Foreign key constraint
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('inventory', function (Blueprint $table) {
            // Hapus foreign key dan index
            $table->dropForeign(['tenant_id']);
            $table->dropIndex(['tenant_id']);

            // Kembalikan nama kolom
            $table->renameColumn('asset_name', 'name');
            $table->renameColumn('asset_price', 'price');
            $table->renameColumn('unit', 'quantity');

            // Kembalikan enum
            $table->enum('status', ['baik', 'rusak', 'perbaikan', 'hilang'])->default('baik')->change();
            $table->enum('condition', ['Baik', 'Rusak Ringan', 'Rusak Berat'])->nullable()->change();

            // Hapus kolom tenant_id
            $table->dropColumn('tenant_id');
        });
    }
};
