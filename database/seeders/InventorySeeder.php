<?php
// database/seeders/InventorySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        if (!Schema::hasTable('inventory')) {
            $this->command->error('❌ Tabel inventory tidak ditemukan!');
            return;
        }

        $this->command->info('🚀 Creating inventory items...');

        // Hapus data lama dulu (optional - HATI-HATI!)
        // DB::table('inventory')->truncate();

        $inventoryItems = [
            [
                'tenant_id' => 'masjid1',
                'name' => 'Karpet Sholat', // ← MASIH 'name' karena belum di-rename
                'category' => 'Perlengkapan Ibadah',
                'price' => 2500000, // ← MASIH 'price' karena belum di-rename
                'quantity' => 50, // ← MASIH 'quantity' karena belum di-rename
                'unit' => 'buah',
                'status' => 'baik',
                'location' => 'Ruang Utama',
                'acquisition_date' => '2024-01-15',
                'description' => 'Karpet sholat berkualitas tinggi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tenant_id' => 'masjid1',
                'name' => 'Speaker',
                'category' => 'Elektronik',
                'price' => 1500000,
                'quantity' => 2,
                'unit' => 'buah',
                'status' => 'baik',
                'location' => 'Mimbar',
                'acquisition_date' => '2024-02-20',
                'description' => 'Speaker untuk pengajian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tenant_id' => 'masjid2',
                'name' => 'Sound System',
                'category' => 'Elektronik',
                'price' => 3000000,
                'quantity' => 1,
                'unit' => 'set',
                'status' => 'baik',
                'location' => 'Aula Utama',
                'acquisition_date' => '2024-03-10',
                'description' => 'System sound lengkap',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tenant_id' => 'masjid2',
                'name' => 'Mikrofon Wireless',
                'category' => 'Elektronik',
                'price' => 800000,
                'quantity' => 4,
                'unit' => 'buah',
                'status' => 'baik',
                'location' => 'Mimbar',
                'acquisition_date' => '2024-03-15',
                'description' => 'Mikrofon wireless untuk khotbah',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        $createdCount = 0;
        foreach ($inventoryItems as $item) {
            try {
                DB::table('inventory')->insert($item);
                $createdCount++;
            } catch (\Exception $e) {
                $this->command->warn('⚠️ Gagal create inventory: ' . $e->getMessage());
            }
        }

        $this->command->info('✅ InventorySeeder completed!');
        $this->command->info('📦 Created ' . $createdCount . ' inventory items');

        // Summary
        $total = DB::table('inventory')->count();
        $masjid1Count = DB::table('inventory')->where('tenant_id', 'masjid1')->count();
        $masjid2Count = DB::table('inventory')->where('tenant_id', 'masjid2')->count();

        $this->command->info('📊 Total inventory: ' . $total . ' items');
        $this->command->info('🏢 Masjid 1: ' . $masjid1Count . ' items');
        $this->command->info('🏢 Masjid 2: ' . $masjid2Count . ' items');
    }
}
