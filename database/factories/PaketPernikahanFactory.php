<?php

namespace Database\Factories;

use App\Models\Kerjasama;
use App\Models\User;
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
        $statusPaket = $this->faker->randomElement(['Tersedia', 'Tidak tersedia', 'Eksklusif']);

        return [
            'nama_paket'        => fake()->word(),
            
            'venue'             => $this->getKerjasamaId('venue'),
            'dekorasi'          => $this->getKerjasamaId('dekorasi'),
            'tata_rias'         => $this->getKerjasamaId('tata_rias'),
            'catering'          => $this->getKerjasamaId('catering'),
            'kue_pernikahan'    => $this->getKerjasamaId('kue_pernikahan'),
            'fotografer'        => $this->getKerjasamaId('fotografer'),
            'entertainment'     => $this->getKerjasamaId('entertainment'),

            'staff_acara'       => fake()->numberBetween(1, 15),
            'hargaDP_paket'     => fake()->numberBetween([1000000, 999999999]),
            'hargaLunas_paket'  => fake()->numberBetween([1000000, 999999999]),
            'status_paket'      => $statusPaket,
            'user_id'           => $statusPaket === 'Eksklusif' ? $this->getUserId() : null,
        ];
    }

    // Dapatkan kerjasama id berdasarkan jenis usaha nya
    protected function getKerjasamaId(string $jenisUsaha): ?int
    {
        return Kerjasama::whereHas('requestMitra', function ($query) use ($jenisUsaha) {
            $query->where('jenis_usaha', $jenisUsaha)
                  ->where('status_request', 'Diterima');
        })->inRandomOrder()->value('id'); // ambil ID secara acak jika ada
    }

    protected function getUserId(): ?int
    {
        return User::where('role', 'customer')->inRandomOrder()->value('id');
    }
}
