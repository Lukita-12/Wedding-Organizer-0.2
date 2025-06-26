<?php

namespace Database\Seeders;

use App\Models\RequestMitra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestMitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['1', '1', 'Hanin Cake Wedding & Birthday', 'Kue Pernikahan', 'Hanni', 'Diterima'],
            ['2', '2', 'Sora Pictures', 'Fotografer', 'Syahji Mahrajadin', 'Diterima'],
            ['3', '3', 'Big Boss Entertainment', 'Entertainment', 'Muhammad Luqman Alkatiri', 'Diterima'],
            ['4', '4', 'Mega Wedding', 'Tata rias', 'Tasya Musyaraffah', 'Diterima'],
            ['5', '5', 'Ayu Catering', 'Catering', 'Yuanita Dian', 'Diterima'],
            ['6', '6', 'Dawis Dekorasi', 'Dekorasi', 'Jihad Thamrin', 'Diterima'],
        ])->each(function ($item) {
            RequestMitra::factory()->create([
                'id'            => $item[0],
                'pelanggan_id'  => $item[1],
                'nama_usaha'    => $item[2],
                'jenis_usaha'   => $item[3],
                'nama_pemilik'  => $item[4],
                'status_request'=> $item[5],
            ]);
        });
    }
}
