<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Andres Mauricio Rendon Diaz',
            'email' => 'rendondiaza@gmail.com',
            'password' => bcrypt('popolico')
        ]);

        User::factory(99)->create();
    }
}
