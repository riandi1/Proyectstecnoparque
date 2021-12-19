<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\curso;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class cursoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = curso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'extract' => $this->faker->text(250),
            'body' => $this->faker->text(2000),
            'status' => $this->faker->randomElement([1,2]),
            'category_id' => category::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
