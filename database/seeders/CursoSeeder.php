<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursos= [
            [
                'nome' => 'Bacharelado em Administração',
                'tipo' => 'Superior',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Bacharelado em Ciência da Computação',
                'tipo' => 'Superior',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Bacharelado em Engenharia Elétrica',
                'tipo' => 'Superior',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Licenciatura em Matemática',
                'tipo' => 'Superior',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Técnico em Administração',
                'tipo' => 'Técnico',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Técnico em Eletroténica',
                'tipo' => 'Técnico',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Técnico em Informática',
                'tipo' => 'Técnico',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Curso::insert($cursos);
    }
}
