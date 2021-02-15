<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'password' => bcrypt('1'),
        ];
        User::insert($user);
    }
}
