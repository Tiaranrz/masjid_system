<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Masjid;
use Illuminate\Support\Str;

class MasjidSeeder extends Seeder
{
    public function run(): void
    {
        // Kumpulan data masjid
        $masjid_data = [
            [
                'name'          => 'Masjid Agung Kota',
                'address'       => 'Jl. Raya Utama No. 1, Jakarta',
                'contact_person'=> 'Ustadz Ahmad',
                'phone'         => '081234567890',
                'email'         => 'masjidagung@mail.com',
                'description'   => 'Masjid terbesar di pusat kota, digunakan untuk kegiatan ibadah dan kajian rutin.',
                'status'        => 'active',
            ],
            [
                'name'          => 'Masjid Al-Furqon',
                'address'       => 'Jl. Pendidikan No. 45, Bandung',
                'contact_person'=> 'H. Ridwan',
                'phone'         => '082233445566',
                'email'         => 'alfurqon@mail.com',
                'description'   => 'Masjid dengan kegiatan kajian rutin setiap pekan.',
                'status'        => 'active',
            ],
        ];

        foreach ($masjid_data as $data) {
            // Tambahkan slug ke data
            $data['slug'] = Str::slug($data['name']);

            // Gunakan firstOrCreate: Cek apakah slug sudah ada. Jika ada, abaikan. Jika belum ada, buat.
            Masjid::firstOrCreate(
                ['slug' => $data['slug']], // Kriteria pencarian (harus unik)
                $data                     // Data yang akan dibuat jika tidak ditemukan
            );
        }
    }
}
