<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Dueños;
use Illuminate\Database\Eloquent\Factories\Factory;

class DueñosFactory extends Factory
{
    protected $model = Dueños::class;

    public function definition()
    {
        return [
            'name'        => $this->faker->word,
            'description' => $this->faker->sentence,
            'creator_id'  => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
