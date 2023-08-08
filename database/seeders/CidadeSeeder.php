<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Cidade::factory()->create([
            "nome" => "Pelotas",
            "estado"=> "Rio Grande do Sul"
        ]);

        \App\Models\Cidade::factory()->create([
            "nome"=> "São Paulo",
            "estado"=> "São Paulo"
        ]);

         \App\Models\Cidade::factory()->create([
            "nome"=>"Curitiba",
            "estado"=> "Paraná"
        ]);

    }
}