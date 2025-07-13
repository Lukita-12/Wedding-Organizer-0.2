<?php

namespace Database\Seeders;

use App\Models\Pesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * -
     * Full dekorasi
     * Pengantin, Orang Tua, dan 3 Orang masing-masing keluarga
     * 2500 Porsi
     * Kue dengan 4 Tingkat
     * 2 Album, foto bentuk file, & 2 foto dengan figura
     * Band banjarmasin
     */
    public function run(): void
    {
        collect([
            ['7',   '', '2024-06-25', 'Rois Noor Akbaruddin', 'Megawati Putri', '2024-07-01', '2024-08-06', '95000000', 'Selesai'],
            ['8',   '', '2024-01-06', 'Fery Darmawan', 'Sela Venna',            '2024-02-01', '2024-04-08', '850000000','Selesai'],
            ['9',   '', '2023-11-25', 'Muhammad Luqman Alkatiri', 'Yuanda',     '2023-12-01', '2024-01-09', '90000000', 'Selesai'],
            ['10',  '', '2023-06-19', 'M Rifaldi Ridho Safari', 'Ily Fitriah',  '2023-07-01', '2023-08-31', '50000000', 'Selesai'],
            ['11',  '', '2023-02-02', 'Aulia Rahmat', 'Ayu Aprina',             '2023-05-18', '2023-06-09', '70000000', 'Selesai'],
            ['12',  '', '2023-11-16', 'Niza Raufa', 'Nisa Ulqarimah',           '2022-12-01', '2023-01-22', '70000000', 'Selesai'],
        ])->each(function ($item) {
            Pesanan::factory()->create([
                'pelanggan_id'          => $item[0],
                'paket_pernikahan_id'   => !empty($item[1]) ? $item[1] : null,

                'tgl_pesanan'       => $item[2],
                'pengantin_pria'    => $item[3],
                'pengantin_wanita'  => $item[4],
                'tanggal_diskusi'   => $item[5],
                'tanggal_acara'     => $item[6],

                'total_harga_pesanan'   => $item[7],
                'status_pesanan'        => $item[8],
            ]);
        });
    }
}
