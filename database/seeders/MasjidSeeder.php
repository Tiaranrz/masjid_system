<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Superadmin\Masjid;

class MasjidSeeder extends Seeder
{
    public function run(): void
    {
        Masjid::create([
            'nama_masjid' => 'Masjid Agung Kota',
            'alamat' => 'Jl. Raya Utama No. 1, Jakarta',
            'kontak' => '081234567890',
            'email' => 'masjidagung@mail.com',
            'deskripsi' => 'Masjid terbesar di pusat kota, digunakan untuk kegiatan ibadah dan kajian rutin.'
        ]);

        Masjid::create([
            'nama_masjid' => 'Masjid Al-Falah',
            'alamat' => 'Jl. Merdeka No. 25, Bandung',
            'kontak' => '082233445566',
            'email' => 'alfalah@mail.com',
            'deskripsi' => 'Masjid dengan kapasitas 2000 jamaah, aktif dalam kegiatan sosial dan pendidikan.'
        ]);

        Masjid::create([
            'nama_masjid' => 'Masjid Nurul Iman',
            'alamat' => 'Jl. Melati No. 10, Surabaya',
            'kontak' => '08199887766',
            'email' => 'nuruliman@mail.com',
            'deskripsi' => 'Masjid lingkungan dengan program kajian anak muda dan remaja.'
        ]);
    }
}
