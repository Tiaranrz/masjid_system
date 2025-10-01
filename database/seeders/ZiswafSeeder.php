<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Ziswaf;

class ZiswafSeeder extends Seeder
{
    public function run(): void
    {
        Ziswaf::create([
            'nama' => 'Ahmad',
            'jenis' => 'zakat',
            'jumlah' => 500000,
            'keterangan' => 'Zakat fitrah'
        ]);

        Ziswaf::create([
            'nama' => 'Fatimah',
            'jenis' => 'sedekah',
            'jumlah' => 250000,
            'keterangan' => 'Sedekah rutin Jumat'
        ]);
    }
}
