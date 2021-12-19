<?php

namespace Database\Seeders;

use App\Models\curso;
use App\Models\image;
use Illuminate\Database\Seeder;

class cursoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursos = curso::factory(100)->create();

        foreach ($cursos as $curso) {
            image::factory(1)->create([
                'imageable_id' => $curso->id,
                'imageable_type' => curso::class
            ]);
        }
    }
}
