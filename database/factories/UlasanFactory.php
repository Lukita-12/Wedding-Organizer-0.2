<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ulasan>
 */
class UlasanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'       => User::factory(),
            'upload_file'   => 'images/ulasan/images/FhejTjS8APyHUBFcy57tgmkdPm17lgJTPLp5ueKP.jpg',
            'ulasan'        => fake()->sentence(),
        ];
    }
}
