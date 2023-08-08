<?php

namespace Database\Factories;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $especialidade = array('Dermatologia', 'Neurologia', 'Oftalmologia');
        return [
            'nome' => fake()->name,
            'especialidade' => $this->faker->randomElement($especialidade),
            'cidade_id' => $this->faker->randomElement(Cidade::pluck('id'))
        ];
    }
}
