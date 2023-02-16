<?php

namespace Database\Seeders;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'rafael.cardoso@ifmg.edu.br',
            'password' => Hash::make('admin123'),
            'perfil' => Perfil::ADMIN->name
        ]);
    }
}
