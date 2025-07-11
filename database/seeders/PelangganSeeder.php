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
            [1, 1,  'Hanni Aulia',              'Perempuan', '+17173759044',        'hanni27@gmail.com', 'Jalan Sepakat Rt 33 No 12 Kelurahan, Pemurus Dalam, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70236'],
            [2, 2,  'Syahji Mahrajadin',        'Laki-laki', '(615) 378-1238',      'mahrajadinsyahji@gmail.com', '410 Renner Mount Apt. 588 East Gayle, ND 11108-8395'],
            [3, 3,  'Muhammad Luqman Alkatiri', 'Laki-laki', '207.514.4023',        'mluqmanalkatiri@gmail.com', '714 Dane Crest Suite 968 West Jovannyside, SC 68561'],
            [4, 4,  'Tasya Musyaraffah',        'Perempuan', '1-909-276-5179',      'tasyamusya@gmail.com', '6466 Tiffany Union Suite 893 New Austin, AK 41356'],
            [5, 5,  'Yuanita Dian',             'Perempuan', '+1.564.218.6398',     'yuanita7274@gmail.com', '924 Abernathy Spurs Apt. 696 West Arielle, OH 94213'],
            [6, 6,  'Jihad Thamrin',            'Laki-laki', '+1 (321) 808-9682',   'jihadthamrin234@gmail.com', '140 McLaughlin Mills North Ricky, CO 36537-8830'],

            [7, 7,  'Megawati Putri',           'Perempuan', '+17173759044',        'hanni27@gmail.com', 'Jalan Sepakat Rt 33 No 12 Kelurahan, Pemurus Dalam, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70236'],
            [8, 8,  'Sela Venna',               'Laki-laki','(615) 378-1238',       'mahrajadinsyahji@gmail.com', '410 Renner Mount Apt. 588 East Gayle, ND 11108-8395'],
            [9, 9,  'Muhammad Luqman Alkatiri', 'Laki-laki', '207.514.4023',        'mluqmanalkatiri@gmail.com', '714 Dane Crest Suite 968 West Jovannyside, SC 68561'],
            [10, 10,'Ily Fitriah',              'Perempuan', '1-909-276-5179',      'tasyamusya@gmail.com', '6466 Tiffany Union Suite 893 New Austin, AK 41356'],
            [11, 11,'Aulia Rahmat',             'Perempuan', '+1.564.218.6398',     'yuanita7274@gmail.com', '924 Abernathy Spurs Apt. 696 West Arielle, OH 94213'],
            [12, 12,'Niza Raufa',               'Laki-laki', '+1 (321) 808-9682',   'jihadthamrin234@gmail.com', '140 McLaughlin Mills North Ricky, CO 36537-8830'],
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
