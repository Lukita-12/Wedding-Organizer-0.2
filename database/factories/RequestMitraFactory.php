<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestMitra>
 */
class RequestMitraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pelanggan_id'  => Pelanggan::factory(),
            'nama_usaha'    => fake()->company(),
            'jenis_usaha'   => fake()->randomElement(['Venue', 'Dekorasi', 'Tata rias', 'Catering', 'Kue pernikahan', 'Fotografer', 'Esntertainment']),
            'nama_pemilik'  => fake()->name(),
        ];
    }
}
