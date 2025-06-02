<?php

namespace Database\Seeders;

use App\Models\Kerjasama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KerjasamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['2', '-', '0815-9283-8240', 'beegalery@gmail.com', 'Jalan Sepakat Rt 33 No 12 Kelurahan, Pemurus Dalam, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70236.', 250000.00, 'Full 1 hari fotografer', '500000.00', 'Foto dan videografer',],
            ['3', '-', '0852-8421-2865', 'fiveband@gmail.com', 'Jalan Sepakat Rt 33 No 12 Kelurahan, Pemurus Dalam, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70236.', 800000.00, 'Musik', 0.00, '-',],
            ['1', '-', '0815-7382-9210', 'hanni@gmail.com', 'Jalan Sepakat Rt 33 No 12 Kelurahan, Pemurus Dalam, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70236.', 400000.00, 'Kue 3 tingkat', 0.00, '-',],
        ])->each(function ($item) {
            Kerjasama::factory()->create([
                'request_mitra_id'  => $item[0],
                'upload_file'       => $item[1],
                'noTelp_usaha'      => $item[2],
                'email_usaha'       => $item[3],
                'alamat_usaha'      => $item[4],
                'harga01'           => $item[5],
                'ket_harga01'       => $item[6],
                'harga02'           => $item[7],
                'ket_harga02'       => $item[8],
            ]);
        });
    }
}
