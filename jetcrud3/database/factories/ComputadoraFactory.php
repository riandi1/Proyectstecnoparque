<?php

namespace Database\Factories;

use App\Models\Computadora;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ComputadoraFactory extends Factory
{
    protected $model = Computadora::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'description' => $this->faker->name,
			'sunrise' => $this->faker->name,
			'is_online' => $this->faker->name,
        ];
    }
}
