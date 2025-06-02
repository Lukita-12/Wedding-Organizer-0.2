<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [1, 2, 'Hani', 'Perempuan', "0815-7832-8739", 'hani12@gmail.com', 'Jalan Sepakat Rt 33 No 12 Kelurahan, Pemurus Dalam, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70236'],
        ])->each(function ($item) {
            Pelanggan::factory()->create([
                'id'                => $item[0],
                'user_id'           => $item[1],
                'nama_pelanggan'    => $item[2],
                'jk_pelanggan'      => $item[3],
                'noTelp_pelanggan'  => $item[4],
                'email_pelanggan'   => $item[5],
                'alamat_pelanggan'  => $item[6],
            ]);
        });
    }
}
