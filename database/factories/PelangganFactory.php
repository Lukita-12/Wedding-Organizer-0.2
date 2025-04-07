<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'           => User::factory(),
            'nama_pelanggan'    => fake()->name(),
            'jk_pelanggan'      => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'noTelp_pelanggan'  => fake()->phoneNumber(),
            'email_pelanggan'   => fake()->unique()->safeEmail(),
            'alamat_pelanggan'  => fake()->address(),
        ];
    }
}
