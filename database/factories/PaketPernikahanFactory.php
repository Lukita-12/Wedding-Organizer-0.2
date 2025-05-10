<?php

namespace Database\Factories;

use App\Models\Kerjasama;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaketPernikahan>
 */
class PaketPernikahanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_paket'        => fake()->word(),
            
            'venue'             => Kerjasama::factory(),
            'dekorasi'          => Kerjasama::factory(),
            'tata_rias'         => Kerjasama::factory(),
            'catering'          => Kerjasama::factory(),
            'kue_pernikahan'    => Kerjasama::factory(),
            'fotografer'        => Kerjasama::factory(),
            'entertainment'     => Kerjasama::factory(),

            'staff_acara'       => fake()->numberBetween([1, 15]),
            'hargaDP_paket'     => fake()->numberBetween([1000000, 999999999]),
            'hargaLunas_paket'  => fake()->numberBetween([1000000, 999999999]),
            'status_paket',
        ];
    }
}
