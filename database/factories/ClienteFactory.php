<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\clientes>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_usuario' => rand(1,10),
            'nombre' => fake()->name(),
            'empresa' => fake()->company(),
            'email' => fake()->safeEmail(),
            'nif_cif' => fake()->word(),
            'telefono' => fake()->phoneNumber(),
            'direccion' => fake()->address(),
            'ciudad' => fake()->city(),
            'provincia' => fake()->word,
            'pais' => fake()->country(),
        ];
    }
}
