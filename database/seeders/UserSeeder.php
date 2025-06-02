<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [1, 'Rinne', 'rinne@example.com', 'qwertyui', 'admin', 'images/profile/images/profile-ad.png'],
            [2, 'Rie', 'rie@example.com', 'qwertyui', 'customer', 'images/profile/images/cat-girl.jpg']
        ])->each(function ($item) {
            User::factory()->create([
                'id'            => $item[0],
                'name'          => $item[1],
                'email'         => $item[2],
                'password'      => $item[3],
                'role'          => $item[4],
                'profile_pic'   => $item[5],
            ]);
        });
    }
}
