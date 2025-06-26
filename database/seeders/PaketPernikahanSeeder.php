<?php

namespace Database\Seeders;

use App\Models\PaketPernikahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketPernikahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['9', 'Silver', '', '6', '4', '', '1', '2', '', 8, 20000000, 50000000, 'tersedia'],
            ['2', 'Golden', '', '6', '4', '5', '1', '2', '', 10, 80000000, 100000000, 'tersedia'],
            ['4', 'Diamond', '', '6', '4', '5', '1', '2', '3', 12 , 120000000, 150000000, 'tersedia'],
        ])->each(function ($item) {
            PaketPernikahan::factory()->create([
                'id'        => $item[0],
                'nama_paket'=> $item[1],

                'venue'         => !empty($item[2]) ? $item[2] : null,
                'dekorasi'      => !empty($item[3]) ? $item[3] : null,
                'tata_rias'     => !empty($item[4]) ? $item[4] : null,
                'catering'      => !empty($item[5]) ? $item[5] : null,
                'kue_pernikahan'=> !empty($item[6]) ? $item[6] : null,
                'fotografer'    => !empty($item[7]) ? $item[7] : null,
                'entertainment' => !empty($item[8]) ? $item[8] : null,

                'staff_acara'       => !empty($item[9]) ? $item[9] : null,
                'hargaDP_paket'     => $item[10],
                'hargaLunas_paket'  => $item[11],
                'status_paket'      => $item[12],
            ]);
        });
    }
}
