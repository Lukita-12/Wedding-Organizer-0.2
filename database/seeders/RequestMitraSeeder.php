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
            ['1', '1', 'HanniCake', 'Kue Pernikahan', 'Hanni', 'Diterima'],
            ['2', '1', 'BeePicture', 'Fotografer', 'Rizal', 'Diterima'],
            ['3', '1', 'V Five', 'Entertainment', 'Maria', 'Diterima'],
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
