<?php
// database/seeders/TenantSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TenantSeeder extends Seeder
{
    public function run()
    {
        DB::table('tenants')->insert([
            [
                'id' => 'masjid1',
                'name' => 'Masjid Al-Ikhlas',
                'address' => 'Jl. Merdeka No. 123, Jakarta Pusat',
                'geo_location' => '-6.2088,106.8456',
                'phone' => '+62 21 1234567',
                'email' => 'masjid.al.ikhlas@example.com',
                'established_date' => '1980-05-15',
                'status' => 'active',
                'data' => json_encode(['capacity' => 500, 'facilities' => ['parking', 'library']]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'masjid2',
                'name' => 'Masjid An-Nur',
                'address' => 'Jl. Damai No. 456, Bandung',
                'geo_location' => '-6.9175,107.6191',
                'phone' => '+62 22 7654321',
                'email' => 'masjid.an.nur@example.com',
                'established_date' => '1995-08-20',
                'status' => 'active',
                'data' => json_encode(['capacity' => 300, 'facilities' => ['parking', 'canteen']]),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
