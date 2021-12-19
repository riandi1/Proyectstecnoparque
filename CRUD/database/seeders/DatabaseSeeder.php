<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\promotion;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('cursos');
        Storage::makeDirectory('cursos');

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        category::factory(4)->create();
        promotion::factory(10)->create();
        $this->call(cursoSeeder::class);
    }
}
