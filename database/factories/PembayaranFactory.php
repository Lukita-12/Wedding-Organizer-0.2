<?php

namespace Database\Factories;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pesanan_id'            => Pesanan::factory(),
            'tgl_pembayaran'        => fake()->date(),
            'bukti_pembayaran_dp'   => 'https://picsum.photos/400/400',
            'bukti_pembayaran_lunas'=> 'https://picsum.photos/400/400',
            'bayar_dp'              => fake()->randomElement(['Belum dibayar', 'Sudah dibayar']),
            'bayar_lunas'           => fake()->randomElement(['Belum dibayar', 'Sudah dibayar']),
        ];
    }
}
