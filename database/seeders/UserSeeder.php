<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Pastikan tabel genders ada isinya
        DB::table('genders')->insertOrIgnore([
            ['id' => 1, 'name' => 'Laki-laki', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Perempuan', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ✅ Insert user admin
        DB::table('users')->insert([
            'name'        => 'Masjid Al-Furqan',
            'email'       => 'adminalfurqon@example.com',
            'password'    => Hash::make('password123'),
            'phone_number'=> '081623008188',
            'role'        => 'admin',
            'gender_id'   => 1, // sesuai dengan genders.id
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }
}
