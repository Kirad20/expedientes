<?php

namespace Database\Factories;

use App\Models\Expediente;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpedienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expediente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'apellido' => $this->faker->lastname,
            'curp' => $this->faker->text(20),
            'ine' => $this->faker->text(20),
            'domicilio' => $this->faker->text,
            'documento' => $this->faker->text(50),
            'beneficiario' => $this->faker->text(100),
            'municipio' => $this->faker->text(100),
            'clabe' => $this->faker->text(15),
            'tipo' => 'Hectareas',
            'total' => $this->faker->randomFloat(2, 0, 9999),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
