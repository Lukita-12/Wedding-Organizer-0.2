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
        PaketPernikahan::factory(10)->create();
    }
}
