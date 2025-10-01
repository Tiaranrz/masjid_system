<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // ✅ Model User sudah diimpor

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Pastikan tabel genders punya data dasar
        DB::table('genders')->insertOrIgnore([
            ['id' => 1, 'name' => 'Laki-laki', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Perempuan', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ✅ Insert atau update Super Admin
        User::updateOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name'       => 'Super Admin',
                'password'   => Hash::make('superadmin123'),
                'role'       => 'superadmin', // Role sesuai kebutuhan
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // ✅ Insert atau update Admin Masjid
        User::updateOrCreate(
            ['email' => 'adminalfurqon@example.com'],
            [
                'name'        => 'Masjid Al-Furqan',
                'password'    => Hash::make('alfurqon123'),
                'phone_number'=> '081623008188',
                'role'        => 'admin_masjid',
                'gender_id'   => 1, // Laki-laki
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        );
    }
}
