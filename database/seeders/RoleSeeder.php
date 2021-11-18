<?php

namespace Database\Seeders;

use App\Models\Civitas;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
        [
            'nama' => 'Admin',
        ],
        [
            'nama' => 'Dosen',
        ],
        [
            'nama' => 'Mahasiswa Akhir',
        ],
        [
            'nama' => 'Mahasiswa',
        ],
    ];
    foreach ($role as $r) {
        Civitas::create($r);
        }
    }
}
