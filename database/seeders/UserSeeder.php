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
            [
                'name' => 'Admin',
                'email' => 'admin@maca.com',
                'nim' => 'J3C118124',
                'password' => bcrypt('adminmaca123'),
                'username' => 'admin',
                'civitas_id' => '1',
            ],
        ];
        foreach ($user as $u) {
            User::create($u);
        }
    }
}
