<?php

namespace Database\Factories;

use App\Models\Documento;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Documento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'path' => $this->faker->text(255),
            'tipo' => $this->faker->text(50),
            'expediente_id' => \App\Models\Expediente::factory(),
        ];
    }
}
