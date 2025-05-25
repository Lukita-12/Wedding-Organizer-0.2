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
            ['Rinne', 'rinne@example.com', 'qwertyui', 'admin', 'images/profile/images/profile-ad.png'],
            ['Rie', 'rie@example.com', 'qwertyui', 'customer', 'images/profile/images/cat-girl.jpg']
        ])->each(function ($item) {
            User::factory()->create([
                'name'          => $item[0],
                'email'         => $item[1],
                'password'      => $item[2],
                'role'          => $item[3],
                'profile_pic'   => $item[4],
            ]);
        });
    }
}
