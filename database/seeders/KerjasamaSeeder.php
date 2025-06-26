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
            ['1', '-', '0821 5483 5452', '-', 'Jl. Perdagangan, RT.22/RW.008, rumah pagar, stainles, Kota Banjarmasin, Kalimantan Selatan 70124', 750000.00, 'Kue 3 tingkat', 1300000.00, 'Kue 4 tingkat',],
            ['2', '-', '089691706577', 'Nijhumhossain84@gmail.com', 'Jl. Perdagangan No.179, Alalak Utara, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70124', 1100000.00, 'Full 1 hari fotografer dan cetak album', '500000.00', 'Foto dan videografer',],
            ['3', '-', '0831-2533-3629', 'raditharv@gmail.com', 'Jl. Batu Benawa Raya No.19A, Tlk. Dalam, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70117', 9000000.00, 'Menyewakan Sound System,Electone (Organ Tunggal),Akustik Band,Full Band,Panting, etc.', 0.00, '-',],
            ['4', '-', '082154468667', '-', 'Jl. Sultan Adam Komp. Mandiri IV, Surgi Mufti, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70122', 500000.00, 'Make up pengantin wanita dan pria', 1400000.00, 'Make up pengantin dan orang tua pengantin'],
            ['5', '-', '0813-4950-0959', 'ayucatring23@gamil.com', 'KOMPLEK.HERLINA, Jl. Hksn No.19 BLOK A, RT.12/RW.2, Alalak Sel., Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70126', 6000000.00, '300 porsi dengan Rp. 20.000 per porsi. 300 porsi x 20 ribu', 0.00, '-'],
            ['6', '-', '0811 507 2255', '-', 'Jl. Sungai Miai Dalam, RT.6/RW.no 35, Sungai Miai, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70117', 8000000.00, 'Dekorasi pernikahan', 0.00, '-'],
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
